@php
    $active = true;
    $limit = 8;
    $local_code = Language::getCurrentLocale();
    if ($local_code == 'ja') {
        $category_id = 32;
    } elseif ($local_code == 'en') {
        $category_id = 33;
    }
    
    $featured = get_posts_by_category($category_id, $limit);
    
@endphp
<section class="sec01" style="margin-top: 50px;">
    <div class="banner-slider">
    @foreach ($featured as $featureItem)
        <a class="banner-slide" href="{{ $featureItem->url }}">
            <img src="{{ RvMedia::getImageUrl($featureItem->image, 'featured', false, Theme::asset()->url('images/blog.jpg')) }}" alt="{{ $featureItem->name }}">
        </a>
    @endforeach
    </div>
</section>