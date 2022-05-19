@if ($contact)
    <p>{{ trans('plugins/contact::contact.tables.time') }}：<i>{{ $contact->created_at }}</i></p>
    <p>{{ trans('plugins/contact::contact.tables.contact_company') }}：<i>{{ $contact->company }}</i></p>
    <p>{{ trans('plugins/contact::contact.tables.contact_name') }}：<i>{{ $contact->name }}</i></p>
    <p>{{ trans('plugins/contact::contact.tables.name_kana') }}：<i>{{ $contact->name_kana }}</i></p>
    <p>{{ trans('plugins/contact::contact.tables.email') }}：<i><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></i></p>
    <p>{{ trans('plugins/contact::contact.tables.phone') }}：<i>@if ($contact->phone) <a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a> @else N/A @endif</i></p>
    <p>{{ trans('plugins/contact::contact.tables.subject') }}：<i>{{ $contact->subject ? $contact->subject : 'N/A' }}</i></p>
    <p>{{ trans('plugins/contact::contact.tables.content') }}：</p>
    <pre class="message-content">{{ $contact->content ? $contact->content : '...' }}</pre>
@endif
