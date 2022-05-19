<?php

namespace Botble\Contact\Http\Controllers;

use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Contact\Events\SentContactEvent;
use Botble\Contact\Http\Requests\ContactRequest;
use Botble\Contact\Models\ContactSubject;
use Botble\Contact\Repositories\Interfaces\ContactInterface;
use EmailHandler;
use Exception;
use Illuminate\Routing\Controller;

class PublicController extends Controller
{
    /**
     * @var ContactInterface
     */
    protected $contactRepository;

    /**
     * @param ContactInterface $contactRepository
     */
    public function __construct(ContactInterface $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    /**
     * @param ContactRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     * @throws \Throwable
     */
    public function postSendContact(ContactRequest $request, BaseHttpResponse $response)
    {
        try {
            $contact = $this->contactRepository->getModel();
            $this->getSubject($request);
            $contact->fill($request->input());
            $this->contactRepository->createOrUpdate($contact);
            event(new SentContactEvent($contact));

            EmailHandler::setModule(CONTACT_MODULE_SCREEN_NAME)
                ->setVariableValues([
                    'contact_company'   => $contact->company ?? 'N/A',
                    'contact_name'      => $contact->name ?? 'N/A',
                    'contact_name_kana' => $contact->name_kana ?? 'N/A',
                    'contact_subject'   => $contact->subject ?? 'N/A',
                    'contact_email'     => $contact->email ?? 'N/A',
                    'contact_phone'     => $contact->phone ?? 'N/A',
                    'contact_content'   => $contact->content ?? 'N/A',
                ])
                ->sendUsingTemplate('notice');

            //send temp reply email to customer;
            EmailHandler::setModule(CONTACT_MODULE_SCREEN_NAME)
            ->setVariableValues([
                'contact_company'   => $contact->company ?? 'N/A',
                'contact_name'      => $contact->name ?? 'N/A',
                'contact_name_kana' => $contact->name_kana ?? 'N/A',
                'contact_subject'   => $contact->subject ?? 'N/A',
                'contact_phone'     => $contact->phone ?? 'N/A',
                'contact_content'   => $contact->content ?? 'N/A',
                ])
                ->sendUsingTemplate('reply', $contact->email);

            return $response->setMessage(trans('plugins/contact::contact.email.success'));
        } catch (Exception $exception) {
            info($exception->getMessage());
            return $response
                ->setError()
                ->setMessage(trans('plugins/contact::contact.email.failed'));
        }
    }

    public function getSubject(ContactRequest $request)
    {
        if (!$request->input('subject_id')) {
            return;
        }
        $subject_id = $request->input('subject_id');
        $ContactSubject = ContactSubject::find($subject_id);
        if (!$ContactSubject) {
            return;
        }
        $request->merge(['subject' => $ContactSubject->name]);
        return;
    }
}
