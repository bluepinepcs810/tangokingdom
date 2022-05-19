@if (is_plugin_active('blog'))
    @php
        $active = true;
        $limit = 6;
        $featured = get_all_posts($active, $limit);
    @endphp
@if (!empty($featured))
<section class="sec02" id="sec02" style="margin-top: 70px;">
            <div class="container">
              <h2 class="head-h2">お知らせ</h2>
              <div class="article-list">
                @foreach ($featured as $featureItem)
                    @php 
                        $category_id = $featureItem->categories->first()->id;
                        if ($category_id == 24 || $category_id == 28) {
                            $category_class = "information";
                        } elseif ($category_id == 23 || $category_id == 30) {
                            $category_class = "press";
                        } else {
                            $category_class = "news";
                        }
                    @endphp
                    <article class="article-list__item">
                        <a href="{{ $featureItem->url }}">
                            <div class="img"><img src="{{ RvMedia::getImageUrl($featureItem->image, 'medium', false, RvMedia::getDefaultImage()) }}" alt="{{ $featureItem->name }}"></div>
                            <div class="meta">
                                <div class="meta__cat {{$category_class}}">
                                @if (!$featureItem->categories->isEmpty()){{ $featureItem->categories->first()->name }}@endif
                                </div>
                            <div class="meta__date">{{ $featureItem->published_at->format('Y.m.d') }}</div>
                            </div>
                            <div class="txt">
                                <p>{{ $featureItem->name }}</p>
                            </div>
                        </a>
                        <div class="tags">
                            <ul>
                                @foreach ($featureItem->tags as $tag_item)
                                    <li><a href="{{ $tag_item->url }}">#{{$tag_item->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </article>
                    @endforeach
              </div>
              <div class="more-btn"><a href="{{url('news')}}">お知らせをもっとみる</a></div>
            </div>
    </section>
    @endif
@endif
