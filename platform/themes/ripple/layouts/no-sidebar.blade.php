{!! Theme::partial('header') !!}
@if (Theme::get('section-name'))
<section class="pankuzu">
    <div class="container">
        <div class="pankuzu__box">
            {!! Theme::breadcrumb()->render() !!}
        </div>
    </div>
</section>
@endif
@if (Theme::get('section-name') && !in_array(request()->getPathInfo(), ["/en/home", "/business/products/tangokingdombeer", "/business/products/sausage"]))
<section class="ttl">
    <div class="container">
        <h1 class="head-h1">{{ Theme::get('section-name') }}</h1>
    </div>
</section>
@endif
{!! Theme::content() !!}
{!! Theme::partial('footer') !!}


