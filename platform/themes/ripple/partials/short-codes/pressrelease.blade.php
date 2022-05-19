@php
    $active = true;
    $limit = 7;
    $local_code = Language::getCurrentLocale();
    $category_id = 23;
    if ($local_code == 'ja') {
        $category_id = 23;
    } elseif ($local_code == 'en') {
        $category_id = 30;
    }
    $featured = get_posts_by_category($category_id, $limit);
    $baseUrl = URL::to('/') . "/";
@endphp

<section class="sec08">
        <div class="container">
            <div class="sec08__box">
            <div class="sec08__box__inner">
                <h2 class="head-h2">プレスリリース</h2>
                <div class="article-list">
                    @foreach ($featured as $featureItem)
                        <article class="article-list__item">
                            <div class="meta">
                            <div class="meta__cat press">プレスリリース</div>
                            <div class="meta__date">{{ $featureItem->created_at->format('Y.m.d') }}</div>
                            </div><a href=" {{ $featureItem->url }} ">
                            <p>{{ $featureItem->name }}</p></a>
                        </article>
                    @endforeach
                </div>
            </div>
            <div class="sec08__box__inner">
                <h2 class="head-h2">Facebookページ</h2><iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ftangooukoku%2F&tabs=timeline&width=500&height=519&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="500" height="519" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
            </div>
            </div>
        </div>
    </section>
