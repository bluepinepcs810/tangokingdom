<?php

namespace Botble\Contact\Http\Requests;

use Botble\Contact\Rules\Furigana;
use Botble\Contact\Rules\PhoneNumber;
use Botble\Support\Http\Requests\Request;

class ContactRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function rules()
    {
        if (setting('enable_captcha') && is_plugin_active('captcha')) {
            return [
                'name'                 => 'required',
                'name_kana'            => ['required', new Furigana],
                'email'                => 'required|email',
                'company'              => 'required',
                'phone'                => ['required', new PhoneNumber],
                'content'              => 'required',
                'g-recaptcha-response' => 'required|captcha',
                'subject_id'           => 'required|numeric',
                'subject'              => '',
                'privacy'              => 'accepted',
            ];
        }
        return [
            'name'       => 'required',
            'name_kana'  => ['required', new Furigana],
            'email'      => 'required|email',
            'company'    => 'required',
            'phone'      => ['required', new PhoneNumber],
            'content'    => 'required',
            'subject_id' => 'required|numeric',
            'subject'    => '',
            'privacy'    => 'accepted',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'name.required'         => trans('plugins/contact::contact.form.name.required'),
            'name_kana.required'    => trans('plugins/contact::contact.form.name_kana.required'),
            'email.required'        => trans('plugins/contact::contact.form.email.required'),
            'email.email'           => trans('plugins/contact::contact.form.email.email'),
            'company.required'      => trans('plugins/contact::contact.form.company.required'),
            'content.required'      => trans('plugins/contact::contact.form.content.required'),
            'phone.required'        => trans('plugins/contact::contact.form.phone.required'),
            'subject_id.required'   => trans('plugins/contact::contact.form.subject.required'),
            'privacy.accepted'      => trans('plugins/contact::contact.form.privacy.accepted'),
        ];
    }
}
