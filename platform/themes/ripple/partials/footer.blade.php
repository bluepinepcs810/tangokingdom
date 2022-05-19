</div>
</main>
<div class="page-top">
<a href=""></a>
</div>
<footer class="footer" id="footer">
    <div class="container">
        <div class="footer__sns">
        <ul>
            <li><a href="https://www.facebook.com/tangooukoku/"><i class="fab fa-3x fa-facebook"></i></a></li>
            <li><a href="https://www.instagram.com/tango.kd/"><i class="fab fa-3x fa-instagram"></i></a></li>
        </ul>
        </div>
        <div class="footer__inner">
        <div class="footer__inner__box">
            <div class="footer__inner__box__cont"><img src="{!! Theme::asset()->url('images/logofooter.png') !!}" alt="丹後王国｜ロゴ">
            <div class="txt">
                <h3 class="head-h3">株式会社丹後王国ブルワリー<span>西日本最大級 道の駅 丹後王国「食のみやこ」内</span></h3>
            </div>
            </div>
            <div class="footer__inner__box__cont">
            <div class="footer__inner__box__cont__ctc">
                <p>
                    〒627-0133 京都府京丹後市弥栄町鳥取123　<br class="pc-br">TEL. 0772-65-4193　
                FAX. 0772-65-4194
                </p>
                <div class="footer__inner__box__cont__policy"><a href="/privacy">プライバシーポリシー</a></div>
            </div>
            </div>
            <div class="footer__inner__box__cont">
            <div class="footer__inner__box__cont__cpy">
                <p>京丹後市　地域商社支援事業<span>© 2020 株式会社丹後王国ブルワリー</span></p>
            </div>
            </div>
        </div>
        </div>
    </div>
</footer>


<!-- JS Library-->
{!! Theme::footer() !!}

@if (theme_option('facebook_comment_enabled_in_post', 'yes') == 'yes' || (theme_option('facebook_chat_enabled', 'yes') == 'yes' && theme_option('facebook_page_id')))
    <div id="fb-root"></div>
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml            : true,
                version          : 'v7.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

    @if (theme_option('facebook_chat_enabled', 'yes') == 'yes' && theme_option('facebook_page_id'))
        <div class="fb-customerchat"
             attribution="install_email"
             page_id="{{ theme_option('facebook_page_id') }}"
             theme_color="{{ theme_option('primary_color', '#ff2b4a') }}">
        </div>
    @endif
@endif
    </div>
</body>
</html>
