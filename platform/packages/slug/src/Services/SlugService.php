<?php

namespace Botble\Slug\Services;

use Botble\Slug\Repositories\Interfaces\SlugInterface;
use Illuminate\Support\Str;
use SlugHelper;

class SlugService
{
    /**
     * @var SlugInterface
     */
    protected $slugRepository;

    /**
     * SlugService constructor.
     * @param SlugInterface $slugRepository
     */
    public function __construct(SlugInterface $slugRepository)
    {
        $this->slugRepository = $slugRepository;
    }

    /**
     * @param string $name
     * @param int $slugId
     * @return int|string
     */
    public function create($name, $slugId = 0, $model = null)
    {
        $permalink = "";
        if ($model == "Botble\Page\Models\Page") {
            $arraySlug = explode('/', $name);
            foreach( $arraySlug as &$value) {
                $value = Str::slug($value);
            }
    
            $slug = array_pop($arraySlug);
            $permalink = implode('/', $arraySlug);
        }
        else {
            $slug = Str::slug($name);
        }

        $index = 1;
        $baseSlug = $slug;

        $prefix = null;
        if (!empty($model)) {
            $prefix = SlugHelper::getPrefix($model);
        }

        while ($this->checkIfExistedSlug($slug, $slugId, $prefix) && $permalink == "") {
            $slug = apply_filters(FILTER_SLUG_EXISTED_STRING, $baseSlug . '-' . $index++, $baseSlug, $index, $model);
        }

        if (empty($slug)) {
            $slug = time();
        }

        if ($permalink != "" && substr($permalink, 0, 1) != "/") {
            $slug = $permalink . "/" . $slug;
        }

        return apply_filters(FILTER_SLUG_STRING, $slug, $model);
    }

    /**
     * @param string $slug
     * @param string $slugId
     * @param string $prefix
     * @return bool
     */
    protected function checkIfExistedSlug($slug, $slugId, $prefix)
    {
        return $this->slugRepository
                ->getModel()
                ->where([
                    'key'    => $slug,
                    'prefix' => $prefix,
                ])
                ->where('id', '!=', $slugId)
                ->count() > 0;
    }
}
