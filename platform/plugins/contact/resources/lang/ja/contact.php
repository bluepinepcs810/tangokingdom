<?php

return [
    'menu'                  => '問い合わせ',
    'edit'                  => '問い合わせ詳細',
    'tables'                => [
        'phone'     => '電話番号',
        'email'     => 'メールアドレス',
        'full_name' => '氏名',
        'time'      => '登録日付',
        'address'   => '住所',
        'subject'   => '件名',
        'content'   => '内容',
        'contact_company' => '御社名',
        'contact_name' => 'ご担当者様名',
        'name_kana' => '氏名（カナ）',
    ],
    'contact_information'   => '問い合わせ詳細',
    'replies'               => '返信一覧',
    'email'                 => [
        'header'  => 'メールアドレス',
        'title'   => '新規顧客',
        'success' => 'メッセージを送信しました。',
        'failed'  => 'メッセージを送信できません。後ほどまた試してください。',
    ],
    'form'                  => [
        'name'    => [
            'required' => 'ご担当者様名を入力してください。',
        ],
        'name_kana' => [
            'required' => 'ふりがなを入力してください。',
            'validation' => 'ふりがなを正しく入力してください。',
        ],
        'email'   => [
            'required' => 'メールアドレスを入力してください。',
            'email'    => 'メールアドレスを正しく入力してください。',
        ],
        'company' =>  [
            'required' => '御社名を入力してください。'
        ],
        'content' => [
            'required' => 'お問い合わせ内容を入力してください。',
        ],
        'phone' => [
            'required' => '電話番号を入力してください。',
            'validation' => '電話番号を正しく入力してください。'
        ],
        'subject' => [
            'required' => '件名を入力してください。'
        ],
        'privacy' => [
            'accepted' => '個人情報の取り扱いに同意してください。'
        ]
    ],
    'contact_sent_from'     => '問い合わせ情報：',
    'sender'                => '送信者',
    'sender_email'          => '送信者E-Mail',
    'sender_address'        => '住所',
    'sender_phone'          => '電話',
    'message_content'       => 'メッセージ内容',
    'sent_from'             => '送信者：',
    'form_name'             => '氏名',
    'form_email'            => 'メールアドレス',
    'form_address'          => '住所',
    'form_subject'          => '件名',
    'form_phone'            => '電話番号',
    'form_message'          => 'メッセージ',
    'required_field'        => 'フィールド（<span style="color: red">*</span>）は必須です。',
    'send_btn'              => 'メッセージを送信',
    'new_msg_notice'        => '新しいメッセージが<span class="bold">:count</span>件あります。',
    'view_all'              => 'もっと見る',
    'statuses'              => [
        'read'   => '既読',
        'unread' => '未読',
    ],
    'phone'                 => '電話',
    'address'               => '住所',
    'message'               => 'メッセージ',
    'settings'              => [
        'email' => [
            'title'       => '連絡先',
            'description' => '連絡先メール設定',
            'templates'   => [
                'notice_title'       => '管理者に通知',
                'notice_description' => '問い合わせがあった時に管理者へ通知するメールのテンプレートEmail template to send notice to administrator when system get new contact',
            ],
        ],
    ],
    'no_reply'              => '返答なし',
    'reply'                 => '返答',
    'send'                  => '送信',
    'shortcode_name' => '問い合わせフォーム',
    'shortcode_description' => '問い合わせフォームを追加',
    'shortcode_content_description' => 'ショットコード [contact-form][/contact-form] を追加しますか？',
    'message_sent_success'  => 'メッセージを送信しました。',
    'thank_you_contact' => 'お問い合わせありがとうございます。',
    'message_as_follows' => '問い合わせ内容は以下の通りです。',
];