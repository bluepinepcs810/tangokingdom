<?php

return [
    'settings'        => [
        'title'            => 'Captcha',
        'description'      => 'Google Captcha設定',
        'captcha_site_key' => 'Captchaサイトキー',
        'captcha_secret'   => 'Captchaシークレット',
        'enable_captcha'   => 'Captchaを利用',
        'helper'           => '接続情報はhttps://www.google.com/recaptcha/admin#listから取得してください。',
        'hide_badge'       => 'recaptchaバッジを隠す(v3)',
        'type'             => 'タイプ',
        'v2_description'   => 'V2 (Verify requests with a challenge)',
        'v3_description'   => 'V3 (Verify requests with a score)',
    ],
    'failed_validate' => 'Captcha検証が失敗しました。',
];
