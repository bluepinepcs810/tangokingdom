{!! Theme::partial('header') !!}
<?php
use Botble\Slug\SlugHelper;
    $relativePath = ltrim(request()->getPathInfo(), '/');
    $arrSuburl = explode('/', $relativePath);
    $slugName = array_pop($arrSuburl);
    $prefix = implode('/', $arrSuburl);
    $slugHelper0 = new SlugHelper;
    $slug = $slugHelper0->getSlug($slugName, $prefix);
    $boolPost = false;
    if ($slug != null){
        $boolPost = $slug->reference_type == "Botble\Blog\Models\Post";
    }
?>
@if (Theme::get('section-name'))
    <section class="pankuzu">
        <div class="container">
            <div class="pankuzu__box">
                {!! Theme::breadcrumb()->render() !!}
            </div>
        </div>
    </section>
    @if (!$boolPost)
        <section class="ttl">
            <div class="container">
                <h1 class="head-h1">{{ Theme::get('section-name') }}</h1>
            </div>
        </section>
    @endif
@endif
<section class="section pt-50 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="page-content">
                    {!! Theme::content() !!}
                </div>
            </div>
        </div>
    </div>
</section>
{!! Theme::partial('footer') !!}


