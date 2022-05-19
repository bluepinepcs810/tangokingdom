@if (is_plugin_active('blog'))
    @php
        $active = true;
        $limit = 6;
        $posts = get_all_posts($active, $limit);
        $tags = get_all_tags($active);
    @endphp
@if ($posts->count() > 0)
<section class="tag sp-content">
    <div class="inner">
        <div class="tag__area">
        <div class="tag__area__cont">
            <div class="tag__area__cont__ttl">
            <p>タグ：</p>
            </div>
            <div class="tag__area__cont__list">
            <ul>
                @foreach ($tags as $tag)
                    <li><a href="{{ $tag->url }}">{{ $tag->name}}</a></li>
                @endforeach
            </ul>
            </div>
        </div>
        </div>
    </div>
</section>
<section class="sec02 page-news" id="sec02">
        <div class="container">
            <div class="article-list">
            @foreach ($posts as $post)
                @php 
                    $category_id = $post->categories->first()->id;
                    if ($category_id == 24) {
                        $category_class = "information";
                    } elseif ($category_id == 23) {
                        $category_class = "press";
                    } else {
                        $category_class = "news";
                    }
                @endphp
                <article class="article-list__item"><a href="{{ $post->url }}">
                    <div class="img"><img src="{{ RvMedia::getImageUrl($post->image, 'medium', false, RvMedia::getDefaultImage()) }}" alt="{{ $post->name }}"></div>
                    <div class="meta">
                        <div class="meta__cat {{$category_class}}">
                        @if (!$post->categories->isEmpty()){{ $post->categories->first()->name }}@endif
                        </div>
                    <div class="meta__date">{{ $post->published_at->format('Y.m.d') }}</div>
                    </div>
                    <div class="txt">
                    <p><a href="{{ $post->url }}">{{ $post->name }}</a></p>
                    </div></a>
                    <div class="tags">
                        <ul>
                            @foreach ($post->tags as $tag_item)
                                <li><a href="">#{{$tag_item->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </article>
            @endforeach
            </div>
        </div>
</section>
<section class="pagination">
    <div class="container">
        <div class="pagination__area">
        <div class="pagination__area__box">
            {!! $posts->withQueryString()->links() !!}
        </div>
        </div>
    </div>
</section>
<section class="tag pc-content">
    <div class="container">
        <div class="tag__area">
        <div class="tag__area__cont">
            <div class="tag__area__cont__ttl">
            <h3 class="head-h3">タグ</h3>
            </div>
            <div class="tag__area__cont__list">
                <ul>
                    @foreach ($tags as $tag)
                        <li><a href="{{ $tag->url }}">{{ $tag->name}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        </div>
    </div>
</section>  
    @endif
@endif
<style>
    .section.pt-50.pb-100 {
        background-color: #ecf0f1;
    }
</style>
