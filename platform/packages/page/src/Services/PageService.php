<?php

namespace Botble\Page\Services;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Page\Models\Page;
use Botble\Page\Repositories\Interfaces\PageInterface;
use Botble\SeoHelper\SeoOpenGraph;
use Eloquent;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use RvMedia;
use SeoHelper;
use SlugHelper;
use Theme;

class PageService
{
    /**
     * @param Eloquent $slug
     * @return array|Eloquent
     */
    public function handleFrontRoutes($slug)
    {
        if (!$slug instanceof Eloquent) {
            return $slug;
        }

        $condition = [
            'id'     => $slug->reference_id,
            'status' => BaseStatusEnum::PUBLISHED,
        ];

        if (Auth::check() && request()->input('preview')) {
            Arr::forget($condition, 'status');
        }

        if ($slug->reference_type !== Page::class) {
            return $slug;
        }

        $page = app(PageInterface::class)->getFirstBy($condition, ['*'], ['slugable']);

        $excludeUrls = ["/", "/en/home"];
        if (in_array(request()->getPathInfo(), $excludeUrls)) {
        } else {
            $relativePath = ltrim(request()->getPathInfo(), '/');
            $strEn = "";
            if (substr($relativePath, 0, 3) === "en/") {
                $strEn = "en/";        
                $relativePath = substr($relativePath, 3, );        
            }
            $prefix = "";
            Theme::breadcrumb()->add(__('Home'), url('/'));
            foreach(explode('/', $relativePath) as $pathStep){
                // $pathUrl = $pathUrl . '/' . $pathStep;
                // currently not considering 
                $slug = SlugHelper::getSlug($pathStep, $prefix, "Botble\Page\Models\Page");
                if ($pathStep == "") {
                    continue;
                }

                $condition = [
                    'id' => $slug->reference_id,
                    'status' => BaseStatusEnum::PUBLISHED,
                ];
                $pageForPath = app(PageInterface::class)->getFirstBy($condition, ['*'], ['slugable']);
                Theme::breadcrumb()->add($pageForPath->name, $pageForPath->url);
                $prefix = ltrim($prefix . "/" . $pathStep, '/');                                
            };
        }

        if (empty($page)) {
            abort(404);
        }

        SeoHelper::setTitle($page->name)
            ->setDescription($page->description);

        $meta = new SeoOpenGraph;
        if ($page->image) {
            $meta->setImage(RvMedia::getImageUrl($page->image));
        }
        $meta->setDescription($page->description);
        $meta->setUrl($page->url);
        $meta->setTitle($page->name);
        $meta->setType('article');

        SeoHelper::setSeoOpenGraph($meta);

        if ($page->template) {
            Theme::uses(Theme::getThemeName())
                ->layout($page->template);
        }

        if (function_exists('admin_bar') && Auth::check() && Auth::user()->hasPermission('pages.edit')) {
            admin_bar()
                ->registerLink(trans('packages/page::pages.edit_this_page'), route('pages.edit', $page->id));
        }

        do_action(BASE_ACTION_PUBLIC_RENDER_SINGLE, PAGE_MODULE_SCREEN_NAME, $page);

        return [
            'view'         => 'page',
            'default_view' => 'packages/page::themes.page',
            'data'         => compact('page'),
            'slug'         => $page->slug,
        ];
    }
}
