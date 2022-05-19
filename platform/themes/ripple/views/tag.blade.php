@php Theme::set('section-name', $tag->name) @endphp

@php
    $active = true;
    $tags = get_all_tags($active); 
    
@endphp

<section class="cat">
    <div class="inner">
        <div class="cat__area">
            <div class="cat__area__cont"><a class="new" href="/news/category/information">新着情報</a></div>
            <div class="cat__area__cont"><a class="news" href="/news/category/news">ニュース</a></div>
            <div class="cat__area__cont"><a class="press" href="/news/category/press">プレスリリース</a></div>
            <div class="cat__area__cont"><a class="tango-kingdom" href="/news/category/tango-kingdom">丹後王国</a></div>
        </div>
    </div>
</section>
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
@if ($posts->count() > 0)
    <section class="sec02 page-news" id="sec02">
            <div class="container">
                <div class="article-list">
                @foreach ($posts as $post)
                    
                        <article class="article-list__item"><a href="{{ $post->url }}">
                            <div class="img"><img src="{{ RvMedia::getImageUrl($post->image, 'medium', false, RvMedia::getDefaultImage()) }}" alt="{{ $post->name }}"></div>
                            <div class="meta">
                                <div class="meta__cat">
                                @if (!$post->categories->isEmpty()){{ $post->categories()->first() ? $post->categories()->first()->name : __('Uncategorized') }}@endif
                                </div>
                            <div class="meta__date">{{ $post->published_at->format('Y.m.d') }}</div>
                            </div>
                            <div class="txt">
                            <p><a href="{{ $post->url }}">{{ $post->name }}</a></p>
                            </div></a>
                            <div class="tags">
                                <ul>
                                    @foreach ($post->tags as $tag_item)
                                        <li><a href="{{ $tag_item->url }}">#{{$tag_item->name}}</a></li>
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
@else
    <div class="alert alert-warning">
        <p>{{ __('There is no data to display!') }}</p>
    </div>
@endif