<?php

return [
    'cache_management' => 'キャッシュ管理',
    'cache_commands'   => 'キャッシュクリアコマンド',
    'commands'         => [
        'clear_cms_cache'        => [
            'title'       => 'すべてのCMSキャッシュをクリア',
            'description' => 'Clear CMS caching: database caching, static blocks... Run this command when you don\'t see the changes after updating data.',
            'success_msg' => 'Cache cleaned',
        ],
        'refresh_compiled_views' => [
            'title'       => 'コンパイル済みビューをリフレッシュ',
            'description' => 'Clear compiled views to make views up to date.',
            'success_msg' => 'Cache view refreshed',
        ],
        'clear_config_cache'     => [
            'title'       => 'Configキャッシュをクリア',
            'description' => 'You might need to refresh the config caching when you change something on production environment.',
            'success_msg' => 'Config cache cleaned',
        ],
        'clear_route_cache'      => [
            'title'       => 'ルーティングキャッシュをクリア',
            'description' => 'Clear cache routing.',
            'success_msg' => 'The route cache has been cleaned',
        ],
        'clear_log'              => [
            'title'       => 'ローグをクリア',
            'description' => 'Clear system log files',
            'success_msg' => 'The system log has been cleaned',
        ],
    ],
];
