<?php

namespace Botble\Page\Http\Controllers;

use Botble\Page\Models\Page;
use Botble\Page\Services\PageService;
use Illuminate\Routing\Controller;
use Response;
use SlugHelper;
use Theme;

class PublicController extends Controller
{
    /**
     * @param string $slug
     * @param PageService $pageService
     * @return \Illuminate\Http\RedirectResponse|Response
     */
    public function getPage($slug, PageService $pageService)
    {
        $relativePath = request()->getPathInfo();
        if (substr($relativePath, 0, 4) === "/en/") {
            $relativePath = substr($relativePath, 3, );        
        }
        $prefixUrl = substr($relativePath, 1, (-1) * (strlen($slug) + 1));

         // $prefixUrl = substr(url()->current(), strlen(url()->to('/')) + 1, (-1) * (strlen($slug) + 1));
        $prefixUrl = rtrim($prefixUrl, '/');

        $slug = SlugHelper::getSlug($slug, $prefixUrl);

        if (!$slug) {
            abort(404);
        }


        $data = $pageService->handleFrontRoutes($slug);

        if (isset($data['slug']) && $data['slug'] !== $slug->key) {
            return redirect()->to(url(SlugHelper::getPrefix(Page::class) . '/' . $data['slug']));
        }

        return Theme::scope($data['view'], $data['data'], $data['default_view'])->render();
    }
}
