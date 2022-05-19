<?php

use Botble\Page\Models\Page;

Route::group(['namespace' => 'Botble\Page\Http\Controllers', 'middleware' => ['web', 'core']], function () {
    Route::group(['prefix' => BaseHelper::getAdminPrefix(), 'middleware' => 'auth'], function () {

        Route::group(['prefix' => 'pages', 'as' => 'pages.'], function () {
            Route::resource('', 'PageController')->parameters(['' => 'page']);

            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'PageController@deletes',
                'permission' => 'pages.destroy',
            ]);
        });
    });

    if (defined('THEME_MODULE_SCREEN_NAME')) {
        Route::group(apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, []), function () {
            $pagePrefixArray = SlugHelper::getPagePrefixList(Page::class);

            foreach ($pagePrefixArray as $pagePrefix) {
                if ($pagePrefix) {
                    Route::get('/' . $pagePrefix . '/{slug}', [
                        'uses' => 'PublicController@getPage',                 
                    ]);
                    Route::get('/en/' . $pagePrefix . '/{slug}', [
                        'uses' => 'PublicController@getPage',
                    ]);
                } 
            }
        });
    }
});
