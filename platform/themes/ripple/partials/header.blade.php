<!DOCTYPE html>
<!--[if IE 7]><html class="ie ie7" lang="{{ app()->getLocale() }}"><![endif]-->
<!--[if IE 8]><html class="ie ie8" lang="{{ app()->getLocale() }}"><![endif]-->
<!--[if IE 9]><html class="ie ie9" lang="{{ app()->getLocale() }}"><![endif]-->
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=5, user-scalable=1" name="viewport"/>
        <meta name="format-detection" content="telephone=no">
        <meta name="apple-mobile-web-app-capable" content="yes">

        <!-- Fonts-->
        <link href="https://fonts.googleapis.com/css?family={{ urlencode(theme_option('primary_font', 'Roboto')) }}" rel="stylesheet" type="text/css">
        <!-- CSS Library-->
        
        <style>
            :root {
                --color-1st: {{ theme_option('primary_color', '#bead8e') }};
                --primary-font: '{{ theme_option('primary_font', 'Roboto') }}', sans-serif;
            }
        </style>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
        {!! Theme::header() !!}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous"></script>

        <!--HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
        <!--WARNING: Respond.js doesn't work if you view the page via file://-->
        <!--[if lt IE 9]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]-->
    </head>
    <!--[if IE 7]><body class="ie7 lt-ie8 lt-ie9 lt-ie10"><![endif]-->
    <!--[if IE 8]><body class="ie8 lt-ie9 lt-ie10"><![endif]-->
    <!--[if IE 9]><body class="ie9 lt-ie10"><![endif]-->
    <body @if (BaseHelper::siteLanguageDirection() == 'rtl') dir="rtl" @endif>
    <div id="app">
    <header class="header" id="header">
        <div id="header__main">
          <div class="container">
            <div id="header__main__inner">
              <h1 class="logo"> <a href="/">Tango Kingdom Brewery Inc.</a></h1>
              <div class="mini-menu">
                <ul class="sp-content">
                  <li><a href="/news/category/press">プレスリリース</a></li>
                  <li><a href="/recruit">リクルート</a></li>
                  <li><a href="/company#access_company">アクセス</a></li>
                </ul>
                {!! apply_filters('language_switcher') !!}
                <!-- SEARCH-->
                <div id="search-btn-pc">
                    <div class="search-btn c-search-toggler"><i class="fa fa-search"></i></div>
                    <form class="quick-search" action="{{ route('public.search') }}" style="display:none;">
                        <input type="text" name="q" placeholder="{{ __('Type to search...') }}" class="form-control search-input" autocomplete="off">
                        <i class="close-search fa fa-close"></i>
                    </form>
                </div>
                <a class="pc-content sp-hum p-rel" href=""><span></span><span></span></a>
              </div>
            </div>
          </div>
        </div>
    
    <div id="header__nav">
        <div class="container">
            <div id="header__nav__inner">
                <!-- MOBILE MENU-->
                <div class="navigation-toggle navigation-toggle--dark" style="display: none"><span></span></div>

                    <!-- NAVIGATION-->
                    <nav>
                        {!!
                            Menu::renderMenuLocation('main-menu', [
                                'options' => ['class' => 'menu sub-menu--slideLeft'],
                                'view'    => 'main-menu',
                            ])
                        !!}
                    </nav>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    </header>
    <div class="sp-navigation">
        <div class="container">
            <div class="sp-navigation__inner sp_inner">
                <!-- SEARCH-->
                <div id="search-btn-sp" style="margin:20px 0px;">
                    <div class="search-btn c-search-toggler"><i class="fa fa-search"></i></div>
                    <form class="quick-search" action="{{ route('public.search') }}" style="display:none;">
                        <input type="text" name="q" placeholder="{{ __('Type to search...') }}" class="form-control search-input" autocomplete="off">
                        <i class="close-search fa fa-close"></i>
                    </form>
                </div>
                <nav>
                    {!!
                        Menu::renderMenuLocation('main-menu', [
                            'options' => ['class' => 'menu sub-menu--slideLeft'],
                            'view'    => 'main-menu',
                        ])
                    !!}
                </nav>
                <div class="link-btns"><a class="link-btn" href="https://www.hotel-tango-kingdom.com/">ホテル丹後王国</a>
                <a class="link-btn" href="https://tango-kingdom-onlineshop.com/" target="_blank">オンラインショップ</a></div>
                {!! apply_filters('language_switcher') !!}
                </div>
        </div>
    </div>
    <main id="content">
   
