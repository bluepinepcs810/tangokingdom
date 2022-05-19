<?php
return [
    '401_title' => 'アクセス権限がありません。',
    '401_msg'   => '<li>You have not been granted access to the section by the administrator.</li>
	                <li>You may have the wrong account type.</li>
	                <li>You are not authorized to view the requested resource.</li>
	                <li>Your subscription may have expired.</li>',
    '404_title' => 'ページが見つかりません。',
    '404_msg'   => '<li>The page you requested does not exist.</li>
	                <li>The link you clicked is no longer.</li>
	                <li>The page may have moved to a new location.</li>
	                <li>An error may have occurred.</li>
	                <li>You are not authorized to view the requested resource.</li>',
    '500_title' => 'ページを読み込めません。',
    '500_msg'   => '<li>The page you requested does not exist.</li>
	                <li>The link you clicked is no longer.</li>
	                <li>The page may have moved to a new location.</li>
	                <li>An error may have occurred.</li>
	                <li>You are not authorized to view the requested resource.</li>',
    'reasons'   => 'This may have occurred because of several reasons',
    'try_again' => 'Please try again in a few minutes, or alternatively return to the homepage by <a href="' . route('dashboard.index') . '">clicking here</a>.',
    'not_found' => 'Not Found',
];
