<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>@yield('title')</title>
        <meta name="description" content="@yield('description')">
        @yield('meta_tags')
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0">
        <meta name="format-detection" content="telephone=no">
        <meta property="og:image" content="{{ asset('images/ogp-image.png') }}" />
        <meta name="google-site-verification" content="SU15WuLBhwRRcdHsanX1bgkzekZWzf-43S2mwMFh2jk" />

        <link rel="icon" type="image/png" href="{{ asset('image/favicon/favicon-96x96.png') }}" sizes="96x96" />
        <link rel="icon" type="image/svg+xml" href="{{ asset('image/favicon/favicon.svg') }}" />
        <link rel="shortcut icon" href="{{ asset('image/favicon/favicon.ico') }}" />
        <link rel="apple-touch-icon" href="{{ asset('image/favicon/apple-touch-icon.png') }}" sizes="180x180" />
        <link rel="manifest" href="{{ asset('image/favicon/site.webmanifest') }}" />

        <style>
            @font-face {
                font-family: 'miniwa-lt-v3';
                src: url("{{ asset('fonts/MinIWA-Lt-V3-Regular.ttf') }}") format('truetype');
                font-weight: 400;
                font-style: normal;
                font-display: swap;
            }
            @font-face {
                font-family: 'miniwa-md-v3';
                src: url("{{ asset('fonts/MinIWA-Md-V3-Regular.ttf') }}") format('truetype');
                font-weight: 400;
                font-style: normal;
                font-display: swap;
            }
            @font-face {
                font-family: 'miniwa-bd-v3';
                src: url("{{ asset('fonts/MinIWA-Bd-V3-Regular.ttf') }}") format('truetype');
                font-weight: 400;
                font-style: normal;
                font-display: swap;
            }
            @font-face {
                font-family: 'miniwa-hv-v3';
                src: url("{{ asset('fonts/MinIWA-Hv-V3-Regular.ttf') }}") format('truetype');
                font-weight: 400;
                font-style: normal;
                font-display: swap;
            }

            @font-face {
                font-family: 'morfin';
                src: url("{{ asset('fonts/MorfinSans-Regular.ttf') }}") format('truetype');
                font-weight: 400;
                font-style: normal;
                font-display: swap;
            }
        </style>
        <script>
            (function(d) {
                var config = {
                    kitId: 'bqb4uzx',
                    scriptTimeout: 3000,
                    async: true
                },
                h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
            })(document);
        </script>
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-6YG7JZP17P"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'G-6YG7JZP17P');
        </script>

        <link href="{{ asset('css/reset.css') }}" rel='stylesheet' type='text/css' media='all'>
        @yield('css')
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Shalimar&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">
    </head>

    @yield('content_loader')

    <div id="wrap">
        <body>
            <header class="header-box">
                <a class="logo-box" href="{{ route('home') }}">
                    <img class="logo" src="{{ asset('image/top/logo.svg') }}" alt="">
                </a>
                <nav>
                    <ul>
                        <li>
                            <a href="{{ route('passion') }}">
                                <p class="en">PASSION</p>
                                <p class="jp">こだわり</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('menu') }}">
                                <p class="en">MENU</p>
                                <p class="jp">メニュー</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('info') }}">
                                <p class="en">INFO</p>
                                <p class="jp">店舗情報</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </header>
            <div id="cursor" class="cursor-box">
                <div class="inside">
                    <img class="circle" src="{{ asset('image/cursor-circle.svg') }}" alt="">
                    <img class="pasta-icon" src="{{ asset('image/pasta-icon.svg') }}" alt="">
                </div>
            </div>
            <canvas id="c"></canvas>
            @yield('content_sidebar')
            @if(!in_array(Route::currentRouteName(), ['voice', 'parking']) && (!empty($weeklyMenu['current']) || !empty($weeklyMenu['next'])))
                <link href="{{ asset('css/weekly-modal.css') }}" rel='stylesheet' type='text/css' media='all'>
                <div id="weekly-modal" class="modal">
                    <div class="md-overlay md-close basic-hover"></div>
                    <div class="md-contents">
                        <div class="md-inner basic-hover">
                            @if(!empty($weeklyMenu['current']))
                                <h3>今週：{{ $weeklyMenu['current'] }}</h3>
                            @endif
                            @if(!empty($weeklyMenu['next']))
                                <h3>来週：{{ $weeklyMenu['next'] }}</h3>
                                <p>{{ $weeklyMenu['start_day'] }}</p>
                            @endif
                            <img loading="lazy" class="close_btn" src="{{ asset('image/close-btn.svg') }}" alt="close">
                        </div>
                    </div>
                </div>
            @endif

            <main role="main">
                @yield('content')
            </main>
            <footer class="footer-box">
                <div class="content-box">
                    <div class="left-box click-canvas">
                        <a class="logo not-click-canvas" href="{{ route('home') }}">
                            <img src="{{ asset('image/top/logo.svg') }}" alt="">
                        </a>
                        <p class="zipcode"><span>〒</span>462 - 0853</p>
                        <p class="address">愛知県 名古屋市 北区 志賀本通 二丁目 48番地　1F北</p>
                        <div class="open-time-box">
                            <p class="tit">営業時間</p>
                            <p class="desc">：　11:00<span class="from">~</span><span class="end-time">（ ソースがなくなり次第終了 ）</span></p>
                        </div>
                        <div class="closed-day-box">
                            <p class="tit">定休日</p>
                            <p class="desc">：　第2, 4土曜日、日曜日、祝日</p>
                        </div>
                    </div>
                    <div class="right-box click-canvas">
                        <div class="sns-box">
                            <a class="insta-box" href="">
                                <img class="logo" src="{{ asset('image/sns-icon.svg') }}" alt="">
                            </a>
                            <a class="line-box" href="">
                                <img class="logo" src="{{ asset('image/sns-icon.svg') }}" alt="">
                            </a>
                            <a class="x-box" href="">
                                <img class="logo" src="{{ asset('image/sns-icon.svg') }}" alt="">
                            </a>
                        </div>
                        <div class="tel-box not-click-canvas">
                            <a class="inside-box" href="tel:052-938-3392">
                                <img class="icon" src="{{ asset('image/tel-icon.svg') }}" alt="">
                                <p>052 - 938 - 3392</p>
                            </a>
                        </div>
                        <div class="h-line"></div>
                        <nav class="link-box">
                            <ul>
                                <li class="not-click-canvas">
                                    <a href="{{ route('passion') }}">こだわり</a>
                                </li>
                                <li class="not-click-canvas">
                                    <a href="{{ route('menu') }}">メニュー</a>
                                </li>
                                <li class="not-click-canvas">
                                    <a href="{{ route('info') }}">店舗情報</a>
                                </li>
                            </ul>
                        </nav>
                        <a class="voice-link-box" href="{{ route('voice') }}" target="_blank" rel="noopener noreferrer">
                            <p>アンケート</p>
                            <img class="icon" src="{{ asset('image/external-link-icon.svg') }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="copyright-box">
                    <div class="corporate-box">
                        <a class="link-box" href="https://grow-no1.com" target="_blank" rel="noopener noreferrer">
                            <img class="logo" src="{{ asset('image/corporate-logo.svg') }}" alt="">
                        </a>
                        <div class="invoice-box">
                            <p class="tit">登録番号：</p>
                            <p class="num">T2180001104004</p>
                        </div>
                    </div>
                    <p class="copyright">
                        <span>©</span>
                        <?php
                            $currentYear = date('Y');
                            if ($currentYear == 2025) {
                                echo "2025 - grow KK. All rights reserved.";
                            } else {
                                echo "2025 - $currentYear grow KK. All rights reserved.";
                            }
                        ?>
                    </p>
                </div>
                @if (Route::currentRouteName() === 'home')
                    <a class="parking-link-btn" href="{{ route('parking') }}" target="_blank" rel="noopener noreferrer">
                        <p>コインパーキングのご案内</p>
                        <img class="icon" src="{{ asset('image/external-link-icon.svg') }}" alt="">
                    </a>
                @endif
            </footer>




            <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery@3/dist/jquery.min.js"></script><!-- jQuery -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.2/anime.min.js"></script><!-- animejs -->
            <script type="text/javascript">
                $(window).on("scroll", function() {
                    $(".header-box").toggleClass("is-scrolled", $(window).scrollTop() > 300);
                });
            </script>
            <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script><!-- swiper -->

            <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/gsap.min.js"></script><!-- GSAP -->
            <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/ScrollTrigger.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/ScrollToPlugin.min.js"></script>

            <script>
                document.oncontextmenu = function () {return false;}
                $(document).on('keydown', function(e) {
                    // Ctrl + Shift + I (開発者ツールの起動)
                    if ((e.ctrlKey || e.metaKey) && e.shiftKey && e.key === 'I') {
                        e.preventDefault();
                        // console.log('開発者ツールの起動を禁止しました。');
                    }
                    // F12キー (多くのブラウザで開発者ツールの起動)
                    if (e.key === 'F12') {
                        e.preventDefault();
                        // console.log('F12キーによる開発者ツールの起動を禁止しました。');
                    }
                    // Ctrl + U (Winソースコードの表示)
                    if ((e.ctrlKey || e.metaKey) && e.key === 'u') {
                        e.preventDefault();
                        // console.log('Winソースコードの表示を禁止しました。');
                    }
                    // Command + Option + U (Macソースコードの表示)
                    if (e.metaKey && e.altKey && e.key === 'u') {
                        e.preventDefault();
                        // console.log('Macソースコードの表示を禁止しました。');
                    }
                    // Command + Option + I (Mac開発者ツールの起動)
                    if (e.metaKey && e.altKey && e.key === 'I') {
                        e.preventDefault();
                        // console.log('Mac開発者ツールの起動を禁止しました。');
                    }
                });
                $(document).on('on', function(e) {
                    $("#weekly-modal").find('.md-overlay,.md-contents').fadeIn();
                });
                $('.md-close').on('click',function() {
                    $('.md-overlay,.md-contents').fadeOut();
                });
                $('.close_btn').on('click',function() {
                    $('.md-overlay,.md-contents').fadeOut();
                });
            </script>

            @yield('js')
            @vite([
                'resources/js/mouse.js',
                'resources/js/magnetic.js',
                'resources/js/myscript.js'
            ])
        </body>
    </div>
</html>
