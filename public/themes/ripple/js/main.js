$(function(){
    var slickbase = $('.main__slick');
    var timeline = 9000;

    // ズームさせるためのslick側の設定
    slickbase.slick({
        fade: true,              // fadeモードで動作させる
        autoplay: true,          // autoplayモードを有効化する
        autoplaySpeed: timeline, // [重要]画像の切り替えのタイミングをautoplaySpeedで取っておく
        speed: 2000,                // [重要]通常はスライド自体の速度をこのプロパティで設定するがゼロに設定する(タイミング制御はCSS側で設定するため)
        pauseOnHover: false,     // 徐々にズームをさせるために一時停止は意味を持たないため無効化
        pauseOnFocus: false,     // 上に同じ
        swipe: false,            // [重要]徐々にズームをかける都合上、組込側が想定している挙動にするため、スワイプは無効化
        swipeToSlide: false,     // 上に同じ
        slidesToShow: 1,         // スライド数は1
        slidesToScroll: 1,       // スライドのスクロール数は1
        dots: false,             // ページングは出したくないのでdotはfalseで
        arrows: false,           // ページャーも一応設定可能だが、今回は扱わない
        infinite: true,          // 永続させる
    }).on('beforeChange', function(event, slick, currentSlide){
        var slidebase = $(this).parents();
        // slick-activeを抜けた際にエフェクトの継続をかけるために付与
        slidebase.find('.slick-slide').removeClass('slick-continue');
        slidebase.find('.slick-active').addClass('slick-continue');
    });

    // 以下は初回表示の際にスライドをスタートさせるための設定
    var firstslide = slickbase.find('.slick-slide:nth-child(1)');
    firstslide.removeClass('slick-active');
    window.setTimeout(function(){
        firstslide.addClass('slick-active');
    }, 1);

});



$(function(){
    $('a[href^="#"]').click(function() {
        var speed = 400; 
        var href= $(this).attr("href");
        var target = $(href == "#" || href == "" ? 'html' : href);
        var position = target.offset().top;
        $('body,html').animate({scrollTop:position}, speed, 'swing');
        return false;
    });
});

$(function(){
    $('.banner-slider').slick({
        slidesToShow: 4,
        arrows: true,
        responsive:[
            {
                breakpoint: 991.98,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 767.98,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });
});

$(function(){
    $('.products-slick .big').each(function(key, item){
        var sliderIdName = 'slider' + key;
        var sliderNavIdName = 'sliderNav' + key;
        this.id = sliderIdName;
        $('.products-slick .small')[key].id = sliderNavIdName;

        var sliderId = '#' + sliderIdName;
        var sliderNavId = '#' + sliderNavIdName;
        $(sliderId).slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            autoplay: false,
            asNavFor: sliderNavId,
            responsive: [
                {
                    breakpoint: 767.98,
                    settings: {
                        asNavFor: null,
                        dots: true,
                    }
                }
            ],  
        });

        $(sliderNavId).slick({
            accessibility: true,
            autoplay: true,
            arrows: false,
            infinite: true,
            autoplay: false,
            slidesToShow: 3,
            slidesToScroll: 1,
            slidePerRow: 1,
            asNavFor: sliderId,
            focusOnSelect: true,
            responsive: [
                {
                    breakpoint: 767.98,
                    settings: {
                        asNavFor: null,
                    }
                }
            ],
        });
    });
    // $('.products-slick .big').slick({
    //     infinite: true,
    //     slidesToShow: 1,
    //     slidesToScroll: 1,
    //     arrows: false,
    //     fade: true,
    //     autoplay: false,
    //     asNavFor: '.products-slick .small',
    //     responsive: [
    //         {
    //             breakpoint: 767.98,
    //             settings: {
    //                 asNavFor: null,
    //                 dots: true,
    //             }
    //         }
    //     ],
    // });
});
// $(function(){
    // $('.products-slick .small').slick({
    //     accessibility: true,
    //     autoplay: true,
    //     arrows: false,
    //     infinite: true,
    //     autoplay: false,
    //     slidesToShow: 3,
    //     slidesToScroll: 1,
    //     slidePerRow: 1,
    //     asNavFor: '.products-slick .big',
    //     focusOnSelect: true,
    //     responsive: [
    //         {
    //             breakpoint: 767.98,
    //             settings: {
    //                 asNavFor: null,
    //             }
    //         }
    //     ],
    // });
// });

$(function(){
    var cancelFlag  = 0;

    $('a.sp-hum').on('click',function(){
        if(cancelFlag ==0 ){
            cancelFlag = 1;
            event.preventDefault();
            $('a.sp-hum span').toggleClass('closed');
            $('.sp-navigation').toggleClass('open');

            setTimeout(function(){
                cancelFlag = 0;
            }, 100);
        } else {
            event.preventDefault();
        }
    });
});

$(function(){

    $(function(){
    

    if (window.matchMedia( "(max-width: 767.98px)" ).matches){

        var height = $('#header__main').height();

        $('body').css('margin-top', height);
        $('.sp-navigation').css('margin-top', height);
        
    } else {



    }

    });
});

$(function(){
    var pagetop = $('.page-top');

        pagetop.hide();

    $(window).scroll(function(){
        if  ($(this).scrollTop() > 200 ){
            pagetop.fadeIn();
        } else {
            pagetop.fadeOut();
        }
    });

    pagetop.click(function(){
        $('body, html').animate({ scrollTop: 0 }, 500);
        return false;
    });

});

$(function(){
    $('.search-btn').on('click', tapHandler1);
    function tapHandler1(event) {
        $('.search-btn').toggle();
        $('.quick-search').toggle();
    }
});
$(function(){
    $('.close-search').on('click', tapHandler2);
    function tapHandler2(event) {
        $('.search-btn').toggle();
        $('.quick-search').toggle();
    }
});


