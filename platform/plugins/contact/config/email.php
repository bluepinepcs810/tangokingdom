<?php

return [
    'name'        => 'plugins/contact::contact.settings.email.title',
    'description' => 'plugins/contact::contact.settings.email.description',
    'templates'   => [
        'notice' => [
            'title'       => 'plugins/contact::contact.settings.email.templates.notice_title',
            'description' => 'plugins/contact::contact.settings.email.templates.notice_description',
            'subject'     => '{{ site_title }} お問い合わせ内容',
            'can_off'     => true,
        ],
        'reply' => [
            'title'       => 'plugins/contact::contact.settings.email.templates.notice_title',
            'description' => 'plugins/contact::contact.settings.email.templates.notice_description',
            'subject'     => '{{ site_title }} お問い合わせ内容',
            'can_off'     => true,
        ],
    ],
    'variables'   => [
        'contact_name'    => 'ご担当者様名',
        'contact_name_kana'    => 'ふりがな',
        'contact_subject' => 'お問い合わせ項目',
        'contact_email'   => 'メールアドレス',
        'contact_phone'   => '電話番号',
        'contact_address' => 'Contact address',
        'contact_content' => 'お問い合わせ内容',
        'contact_company' => '御社名'
    ],
];
