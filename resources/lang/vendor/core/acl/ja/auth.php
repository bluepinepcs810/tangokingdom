<?php

return [
    'login'                 => [
        'username'          => 'E-mail/ユーザ名',
        'email'             => 'E-mail',
        'password'          => 'パスワード',
        'title'             => 'ユーザログイン',
        'remember'          => 'オートログイン',
        'login'             => 'ログイン',
        'placeholder'       => [
            'username' => 'ユーザ名を入力してください。',
            'email'    => 'E-Mailを入力してください。',
        ],
        'success'           => 'ログイン成功！',
        'fail'              => 'ユーザ名またがパスワードが正しくありません。',
        'not_active'        => 'アカウントがまだ承認されていません。',
        'banned'            => 'アカウントが停止されました。',
        'logout_success'    => 'ログアウト成功！',
        'dont_have_account' => 'You don\'t have account on this system, please contact administrator for more information!',
    ],
    'forgot_password'       => [
        'title'   => 'パスワードをお忘れの方',
        'message' => '<p>パスワードをお忘れですか？</p><p>登録済みのメールアドレスを入力してください。システムからパスワード再設定用リンクをお送りいたします。</p>',
        'submit'  => '送信',
    ],
    'reset'                 => [
        'new_password'          => '新しいパスワード',
        'password_confirmation' => 'パスワード確認',
        'email'                 => 'E-Mail',
        'title'                 => 'パスワード再設定',
        'update'                => '変更',
        'wrong_token'           => 'リンクの有効期間が切れました。',
        'user_not_found'        => 'ご入力のユーザ名はすでに利用中です。',
        'success'               => 'パスワードを再設定しました。',
        'fail'                  => 'Token is invalid, the reset password link has been expired!',
        'reset'                 => [
            'title' => 'パスワード再設定リンクをメール送信',
        ],
        'send'                  => [
            'success' => 'お客様のメールアドレス宛にパスワード再設定リンクを送信しました。リンクをクリックしてこの操作を完了してください。',
            'fail'    => 'Can not send email in this time. Please try again later.',
        ],
        'new-password'          => '新しいパスワード',
    ],
    'email'                 => [
        'reminder' => [
            'title' => 'パスワード再設定リンクをメール送信',
        ],
    ],
    'password_confirmation' => 'パスワード確認',
    'failed'                => '失敗',
    'throttle'              => 'アクセス制限',
    'not_member'            => 'アカウントを持ってない方',
    'register_now'          => '会員登録',
    'lost_your_password'    => 'パスワードをお忘れの方',
    'login_title'           => '管理者',
    'login_via_social'      => 'ソーシャルログイン',
    'back_to_login'         => 'ログインページへ',
    'sign_in_below'         => 'ログイン',
    'languages'             => '言語',
    'reset_password'        => 'パスワード再設定',
];
