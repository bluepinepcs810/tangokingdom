@php Theme::set('section-name', $post->name) @endphp
@php
    $category = $post->categories->first();
    if ($category->id == 24) {
        $category_class = "information";
    } elseif ($category->id == 23) {
        $category_class = "press";
    } else {
        $category_class = "news";
    }
@endphp
<article class="post post--single">
    <header class="post__header" style="margin-top: 20px;">
        <div class="post__meta article-list__item" style="width: 100%;">
                @if (!$post->categories->isEmpty())
                    <span class="post-category meta__cat {{$category_class}}"><i class="ion-cube"></i>
                        <a href="{{ $post->categories->first()->url }}" style="color: white;">{{ $post->categories->first()->name }}</a>
                    </span>
                @endif
                <span class="post__created-at" style="float:right;"><i class="ion-clock"></i>{{ $post->published_at->format('Y.m.d') }}</span>
        </div>    
        <h2 class="post__title" style="text-align:center; margin-top: 40px;">{{ $post->name }}</h2>
    </header>
    <div class="post__content">
        @if (defined('GALLERY_MODULE_SCREEN_NAME') && !empty($galleries = gallery_meta_data($post)))
            {!! render_object_gallery($galleries, ($post->categories()->first() ? $post->categories()->first()->name : __('Uncategorized'))) !!}
        @endif
        {!! $post->content !!}
    </div>
    <div class="article-list__item" style="margin-top:80px;">
        <div class="tags">
            <ul>
                @foreach ($post->tags as $tag_item)
                    <li><a href="{{ $tag_item->url }}">#{{$tag_item->name}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="back-to-news" style="text-align: center; padding-top: 40px;">
        <a href="/news" style="text-decoration: underline;">お知らせー覧に戻る</a>
    </div>
</article>
