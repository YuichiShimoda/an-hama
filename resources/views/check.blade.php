@extends('layouts.viewer')
@section('title', 'フジテレビ確認用ページ')
@section('description', '名古屋の定番グルメ「 あんかけパスタ 」を楽しむなら、あんかけハマちゃんへ！スパイシーさに負けない“コク”のあるマイルドソースがやみつきに。安心・安全な料理をご提供します。')
@section('meta_tags')
    <meta name="robots" content="noindex, nofollow">
    <script type="application/ld+json">
    {
        "@context":"https://schema.org",
        "@type":"Restaurant",
        "name":"あんかけハマちゃん",
        "address":{
            "@type":"PostalAddress",
            "streetAddress":"志賀本通２丁目48番地 1F北",
            "addressLocality":"名古屋市北区",
            "addressRegion":"愛知県",
            "postalCode":"462-0853",
            "addressCountry":"JP"
        },
        "geo":{
            "@type":"GeoCoordinates",
            "latitude":"35.196578",
            "longitude":"136.921385"
        },
        "telephone":"+81-52-938-3392",
        "servesCuisine": ["あんかけパスタ", "あんかけピザ", "つけかけパスタ"],
        "openingHoursSpecification":[
            {
                "@type":"OpeningHoursSpecification",
                "dayOfWeek":[
                    "Monday",
                    "Tuesday",
                    "Wednesday",
                    "Thursday",
                    "Friday",
                    "Saturday"
                ],
                "opens":"11:00",
                "closes":"15:00"
            }
        ],
        "image":[
            "https://an-hama.com/image/info/exterior.webp",
            "https://an-hama.com/image/passion/shop-center.webp",
            "https://an-hama.com/image/top/back-shot.webp",
            "https://an-hama.com/image/menu/menu1.webp",
            "https://an-hama.com/image/menu/sosaku1.webp",
            "https://an-hama.com/image/menu/sosaku2.webp",
            "https://an-hama.com/image/menu/sosaku3.webp",
            "https://an-hama.com/image/menu/sosaku4.webp",
            "https://an-hama.com/image/menu/sosaku5.webp",
            "https://an-hama.com/image/pizza/pizza1.webp"
        ],
        "url":"https://an-hama.com/",
        "menu": [
            "https://an-hama.com/menu",
            "https://an-hama.com/menu/pizza"
        ],
        "sameAs": [
            "https://www.instagram.com/ankake.hama.chan",
            "https://x.com/ankakeHamaChan"
        ]
    }
    </script>
@stop

@section('css')
    <link href="{{ asset('/css/loading.css') }}" rel='stylesheet' type='text/css' media='all'>
    <link href="{{ asset('/css/mouse.css') }}" rel='stylesheet' type='text/css' media='all'>
    <link href="{{ asset('/css/common.css') }}" rel='stylesheet' type='text/css' media='all'>
    <!-- <link href="{{ asset('/css/upload.css') }}" rel='stylesheet' type='text/css' media='all'> -->
    <link href="{{ asset('/css/check-sp.css') }}?v=" rel='stylesheet' type='text/css' media='all and (max-width: 700px)'>
    <link href="{{ asset('/css/check.css') }}?v=" rel='stylesheet' type='text/css' media='all and (min-width: 700px)'>
@stop



@section('content_loader')
    <div id="loader-bg">
        <div class="border"></div>
        <img class="logo" src="{{ asset('image/loading-logo.svg') }}" alt="ロゴ">
        <div class="overlay-top"></div>
        <div class="overlay-bottom"></div>
    </div>
@stop



@section('content_sidebar')
    <a class="side-bar" href="{{ route('voice') }}" target="_blank" rel="noopener noreferrer">
        <div class="icon-box">
            <img class="nomal" src="{{ asset('image/questionnaire.png') }}" alt="星">
            <img class="move" src="{{ asset('image/questionnaire.png') }}" alt="星">
        </div>
        <p>アンケート</p>
    </a>

    @if(!empty($movie))
        <section id="appeal" class="is-show">
            <div class="content-box">
                <div class="start-box">
                    <video class="thum lazyload" preload="none" autoplay loop muted playsinline disablepictureinpicture>
                        <source src="{{ asset('movie/btn1.mp4') }}" type="video/mp4">
                    </video>
                    <img class="thum-bg lazyload" data-src="{{ asset('image/movie/bg.webp') }}" alt="回転">
                    <div class="next-desc-box">
                        <p class="txt">重要なお知らせ</p>
                        <svg class="move-arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 137.29 246.79">
                            <path fill="#fff" d="M133.22,113.56L23.73,4.07C18.3-1.36,9.5-1.36,4.07,4.07c-5.43,5.43-5.43,14.23,0,19.66l99.66,99.66L4.07,223.06c-5.43,5.43-5.43,14.23,0,19.66,2.71,2.71,6.27,4.07,9.83,4.07s7.11-1.36,9.83-4.07l109.49-109.49c5.43-5.43,5.43-14.23,0-19.66Z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </section>
        <div id="movie" class="" data-initial-upload="{{ $movie->filename }}"></div>
    @endif
    <div id="broadcast"></div>
    <div id="location"></div>
@stop




@section('content')
    <section id="mv">
        <div class="video-box">
            <video preload="none" autoplay loop muted playsinline disablepictureinpicture>
                <source src="{{ asset('movie/top/mv.mp4') }}" type="video/mp4">
            </video>
        </div>
        <img class="mesh" src="{{ asset('image/top/mesh.png') }}" alt="メッシュ">
        <!-- <p class="center">キャッチコピーキャッチ<br>キャッチコピーキャッチコピー<br>キャッチコピー</p> -->
        <div class="center-box">
            <div class="inside">
                <img class="circle" src="{{ asset('image/cursor-circle.svg') }}" alt="円">
                <img class="pasta-icon" src="{{ asset('image/pasta-icon.svg') }}" alt="パスタ">
            </div>
        </div>
        <div class="info-box">
            <div class="time-box">
                <p class="tit">営業時間</p>
                <div class="open-time">
                    <p class="lunch">ランチ</p>
                    <div class="hour-box">
                        <span class="start-time">11:00 ~</span>
                        <span class="end-time">（ ソースがなくなり次第終了 ）</span>
                    </div>
                </div>
            </div>
            <div class="closed-box">
                <p class="tit">定休日</p>
                <p class="closed-day">第2, 4土曜日、日曜日、祝日</p>
            </div>
            <a class="tel" href="tel:052-938-3392">
                <p class="letter">0</p>
                <p class="letter">5</p>
                <p class="letter">2</p>
                <p class="letter">&nbsp;</p>
                <p class="letter">-</p>
                <p class="letter">&nbsp;</p>
                <p class="letter">9</p>
                <p class="letter">3</p>
                <p class="letter">8</p>
                <p class="letter">&nbsp;</p>
                <p class="letter">-</p>
                <p class="letter">&nbsp;</p>
                <p class="letter">3</p>
                <p class="letter">3</p>
                <p class="letter">9</p>
                <p class="letter">2</p>
            </a>
            <div class="tel-desc-box">
                <p class="desc">・接客対応中の場合、電話に出られない場合がございます。</p>
                <p class="desc">・臨時休業、貸し切りなどは下部のお知らせをご確認ください。</p>
            </div>
            <a class="parking-box" href="{{ route('parking') }}">
                <p>近隣駐車場</p>
            </a>
        </div>
    </section>
    <div id="loop-band">
        <ul class="word-box">
            <li><img class="lazyload" data-src="{{ asset('image/top/smile.svg') }}" alt="あんかけパスタは笑顔になるランチ"></li>
            <li><img class="lazyload" data-src="{{ asset('image/top/smile.svg') }}" alt="あんかけパスタは笑顔になるランチ"></li>
            <li><img class="lazyload" data-src="{{ asset('image/top/smile.svg') }}" alt="あんかけパスタは笑顔になるランチ"></li>
        </ul>
        <ul class="word-box">
            <li><img class="lazyload" data-src="{{ asset('image/top/smile.svg') }}" alt="あんかけパスタは笑顔になるランチ"></li>
            <li><img class="lazyload" data-src="{{ asset('image/top/smile.svg') }}" alt="あんかけパスタは笑顔になるランチ"></li>
            <li><img class="lazyload" data-src="{{ asset('image/top/smile.svg') }}" alt="あんかけパスタは笑顔になるランチ"></li>
        </ul>
    </div>
    <div id="sp-info">
        <div class="time-box">
            <p class="tit">営業時間</p>
            <div class="open-time">
                <p class="lunch">ランチ</p>
                <div class="hour-box">
                    <span class="start-time">11:00 ~</span>
                    <span class="end-time">（ ソースがなくなり次第終了 ）</span>
                </div>
            </div>
        </div>
        <div class="closed-box">
            <p class="tit">定休日</p>
            <p class="closed-day">第2, 4土曜日、日曜日、祝日</p>
        </div>
        <a class="tel" href="tel:052-938-3392">
            <p class="letter">0</p>
            <p class="letter">5</p>
            <p class="letter">2</p>
            <p class="letter">&nbsp;</p>
            <p class="letter">-</p>
            <p class="letter">&nbsp;</p>
            <p class="letter">9</p>
            <p class="letter">3</p>
            <p class="letter">8</p>
            <p class="letter">&nbsp;</p>
            <p class="letter">-</p>
            <p class="letter">&nbsp;</p>
            <p class="letter">3</p>
            <p class="letter">3</p>
            <p class="letter">9</p>
            <p class="letter">2</p>
        </a>
        <div class="tel-desc-box">
            <p class="desc">・接客対応中の場合、電話に出られない場合がございます。</p>
            <p class="desc">・臨時休業、貸し切りなどは下部のお知らせをご確認ください。</p>
        </div>
        <a class="parking-box" href="{{ route('parking') }}">
            <p>近隣駐車場</p>
        </a>
    </div>






<!--     <div id="confetti-wrapper">
        <canvas id="confetti-canvas"></canvas>
        <div class="content-box">
            <div class="anniversary-tit">
                <span class="txt">オープン</span>
                <span class="one">1</span>
                <span class="txt">周年</span>
                <div class="thanks-box">
                    <img class="thanks" src="{{ asset('image/anniversary/thanks.svg') }}" alt="おかげさまで">
                </div>
            </div>
            <div class="date-box">
                <div class="item-box">
                    <p class="num">2026</p>
                    <p class="unit">年</p>
                </div>
                <div class="item-box">
                    <p class="num">3</p>
                    <p class="unit">月</p>
                </div>
            //     <div class="item-box">
            //         <p class="num">10</p>
            //         <p class="unit">日</p>
            //     </div>
            </div>
            // <p class="gratitude">To our customers, with gratitude.</p>
            //        <div class="movie-btn">
            //     <p>動画を見る</p>
            // </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@latest/dist/confetti.browser.min.js"></script> -->
    <!-- confetti -->














    <section id="mezamashi">
        <div class="content-box">
            <div class="tit-box">
                <img class="left-img lazyload" data-src="{{ asset('image/mezamashi/nationwide.webp') }}" alt="全国放送">
                <div class="right-box">
                    <div class="top-txt">フジテレビ<div class="date-box">2026<span class="year">年</span>6<span class="month">月</span>13<span class="day">日</span></div>放送</div>
                    <div class="mid-txt1"><div class="program">めざましどようび</div></div>
                    <h2 class="mid-txt2">特集：進化した「 なごやめし 」</h2>
                    <h1 class="bottom-txt">あんかけハマちゃん が紹介されました！</h1>
                </div>
                <img class="clock-left lazyload" data-src="{{ asset('image/mezamashi/clock-left.webp') }}" alt="時計">
                <img class="clock-right lazyload" data-src="{{ asset('image/mezamashi/clock-right.webp') }}" alt="時計">
            </div>
            <div class="location-box">
                <div class="location-ele">
                    <div class="inside-box">
                        <div class="vignetting"></div>
                        <img class="cut lazyload" data-src="{{ asset('image/mezamashi/location1.webp') }}" alt="撮影カット1">
                        <video class="short-movie lazyload" preload="none" loop muted playsinline disablepictureinpicture>
                            <source src="{{ asset('movie/top/mezamashi/location1.mp4') }}" type="video/mp4">
                        </video>
                    </div>
                </div>
                <div class="location-ele">
                    <div class="inside-box">
                        <div class="vignetting"></div>
                        <img class="cut lazyload" data-src="{{ asset('image/mezamashi/location2.webp') }}" alt="撮影カット2">
                        <video class="short-movie lazyload" preload="none" loop muted playsinline disablepictureinpicture>
                            <source src="{{ asset('movie/top/mezamashi/location2.mp4') }}" type="video/mp4">
                        </video>
                    </div>
                </div>
                <div class="location-ele">
                    <div class="inside-box">
                        <div class="vignetting"></div>
                        <img class="cut lazyload" data-src="{{ asset('image/mezamashi/location3.webp') }}" alt="撮影カット3">
                        <video class="short-movie lazyload" preload="none" loop muted playsinline disablepictureinpicture>
                            <source src="{{ asset('movie/top/mezamashi/location3.mp4') }}" type="video/mp4">
                        </video>
                    </div>
                </div>
                <div class="location-ele fixed">
                    <div class="inside-box">
                        <div class="vignetting"></div>
                        <img class="cut lazyload" data-src="{{ asset('image/mezamashi/location4_check.webp') }}" alt="撮影カット4">
                        <video class="short-movie lazyload" preload="none" loop muted playsinline disablepictureinpicture>
                            <source src="{{ asset('movie/top/mezamashi/location4.mp4') }}" type="video/mp4">
                        </video>
                    </div>
                </div>
                <div class="location-ele">
                    <div class="inside-box">
                        <div class="vignetting"></div>
                        <img class="cut lazyload" data-src="{{ asset('image/mezamashi/location5.webp') }}" alt="撮影カット5">
                        <video class="short-movie lazyload" preload="none" loop muted playsinline disablepictureinpicture>
                            <source src="{{ asset('movie/top/mezamashi/location5.mp4') }}" type="video/mp4">
                        </video>
                    </div>
                </div>
                <div class="location-ele">
                    <div class="inside-box">
                        <div class="vignetting"></div>
                        <img class="cut lazyload" data-src="{{ asset('image/mezamashi/location6.webp') }}" alt="撮影カット6">
                        <video class="short-movie lazyload" preload="none" loop muted playsinline disablepictureinpicture>
                            <source src="{{ asset('movie/top/mezamashi/location6.mp4') }}" type="video/mp4">
                        </video>
                    </div>
                </div>
                <div class="location-ele">
                    <div class="inside-box">
                        <div class="vignetting"></div>
                        <img class="cut lazyload" data-src="{{ asset('image/mezamashi/location7.webp') }}" alt="撮影カット7">
                        <video class="short-movie lazyload" preload="none" loop muted playsinline disablepictureinpicture>
                            <source src="{{ asset('movie/top/mezamashi/location7.mp4') }}" type="video/mp4">
                        </video>
                    </div>
                </div>
                <p class="en">Media</p>
            </div>
            <div class="desc-box">
                <p class="txt1">“あんハマ” でしか食べられない</p>
                <h2 class="txt2">あんかけスパ<span>の</span>新形態</h2>
                <p class="txt3">つけかけパスタ - Dip & Pour -</p>
            </div>
            <div class="collection-box">
                <div class="sign-box">
                    <div class="head-box">
                        <img class="abe lazyload" data-src="{{ asset('image/mezamashi/abe.svg') }}" alt="阿部華也子">
                        <p>さんがご来店</p>
                    </div>
                    <div class="role-box">
                        <p>「 めざましどようび 」メインキャスター</p>
                        <p>「 めざましテレビ 」7代目お天気キャスター</p>
                    </div>
                    <h2>あんハマ発祥『 つけかけパスタ - Dip & Pour - 』<br>"カルボナーラ"をお召し上がりいただきました。</h2>
                    <p class="big-en">Talent</p>
                    <div class="colored-paper lazyload">
                        <div class="inside-box">
                            <h3 class="talent">阿部 華也子</h3>
                            <img class="img lazyload" data-src="{{ asset('image/mezamashi/colored-paper.webp') }}" alt="色紙">
                        </div>
                    </div>
                </div>
                <div id="tv" class="tv-box">
                    <div class="monitor-box">
                        <img class="play-icon lazyload" data-src="{{ asset('image/mezamashi/play.svg') }}" alt="再生">
                        <video class="loop-movie lazyload" preload="none" autoplay loop muted playsinline disablepictureinpicture>
                            <source src="{{ asset('movie/top/mezamashi/tv.mp4') }}" type="video/mp4">
                        </video>
                    </div>
                    <img class="icon lazyload" data-src="{{ asset('image/mezamashi/tv.svg') }}" alt="テレビ">
                </div>
                <div id="phone" class="phone-box">
                    <img class="play-icon lazyload" data-src="{{ asset('image/mezamashi/play.svg') }}" alt="再生">
                    <video class="loop-movie lazyload" preload="none" autoplay loop muted playsinline disablepictureinpicture>
                        <source src="{{ asset('movie/top/mezamashi/phone-check.mp4') }}" type="video/mp4">
                    </video>
                    <img class="icon lazyload" data-src="{{ asset('image/mezamashi/phone.svg') }}" alt="スマホ">
                </div>
                <img class="screenshot lazyload" data-src="{{ asset('image/mezamashi/screenshot.webp') }}" alt="スクリーンショット">
            </div>
            <div class="comment-box">
                <p>阿部 華也子さん、撮影スタッフの方々には<br>撮影外のメニューにまで<br>興味を持っていただき、大変嬉しく思います。</p>
                <p>ご来店ありがとうございました！</p>
            </div>
            <!-- <p class="note">※ 本セクションにおける映像および画像コンテンツは、取材責任者<br>の正式な許諾を得て撮影された、当店の一次著作物となります。</p> -->
        </div>
    </section>































    <section id="season">
        <div class="content-box">
            <div class="main-box">
                <div class="left-box">
                    <img class="pasta-line" src="{{ asset('image/season/pasta-line.svg') }}" alt="パスタ">
                    <img class="board" src="{{ asset('image/season/board.svg') }}" alt="あんハマ発祥つけかけパスタ 季節の限定メニュー">
                    <div class="illust-box">
                        <img class="plate-icon" src="{{ asset('image/season/plate-icon.svg') }}" alt="つけかけパスタ">
                        <img class="en-msg" src="{{ asset('image/season/en-msg.svg') }}" alt="Dip it. Pour it.">
                    </div>
                    <div class="label-box">
                        <!-- <img class="two-month" src="{{ asset('image/season/period3-4.svg') }}" alt="限定期間"> -->
                        <img class="two-month" src="{{ asset('image/season/period5-6.svg') }}" alt="限定期間">
                    </div>
                    <img class="label-bg" src="{{ asset('image/season/label-bg.webp') }}" alt="背景フレーム">
                </div>
                <div class="right-box">
                    <div class="img-box">
                        <!-- <img class="dish" src="{{ asset('image/season/season3-4.webp') }}" alt="あさりと桜えびのつけかけパスタ"> -->
                        <img class="dish" src="{{ asset('image/season/season5-6.webp') }}" alt="しらすとアスパラガスのつけかけパスタ">
                    </div>
                </div>
                <img class="jp-msg" src="{{ asset('image/season/jp-msg.svg') }}" alt="つけてもよし！かけてもよし！新感覚パスタ">
            </div>
            <div class="desc-box">
                <!-- <h2 class="ingredient">旬の食材　：　「 あさり 」「 桜えび 」</h2> -->
                <h2 class="ingredient">旬の食材　：　「 しらす 」「 アスパラガス 」</h2>
                <div class="info-box">
                    <div class="tit-box">
                        <div class="period-box">
                            <!-- <p>3月,4月限定</p> -->
                            <p>5月,6月限定</p>
                        </div>
                        <h2 class="menu-tit">季節のつけかけパスタ</h2>
                    </div>
                    <div class="price-box">
                        <div class="above-box">
                            <p class="size">レギュラー</p>
                            <p class="unit">300g</p>
                        </div>
                        <div class="below-box">
                            <p class="price">1,300</p>
                            <p class="yen">円</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="concept">
        <div class="content-box">
            <div class="img-box">
                <img src="{{ asset('image/top/concept-person.webp') }}" alt="女性スタッフ">
                <div class="v-txt-box">
                    <div class="reveal-box">
                        <h2>あんかけパスタ専門店</h2>
                    </div>
                    <div class="reveal-box">
                        <h2>あんかけハマちゃん</h2>
                    </div>
                </div>
            </div>
            <div class="txt-box">
                <h2>創作料理から始まる定番！</h2>
                <div class="first-desc-box">
                    <p>当店では、お客様を笑顔にすることを何より大切にしています。</p>
                    <p>伝統的な“あんかけスパゲッティ”を現代的な“あんかけパスタ”へ...</p>
                    <img src="{{ asset('image/top/concept-shop.webp') }}" alt="クロス">
                </div>
                <p class="second-desc-box">原点でもあるイタリアンパスタが浸透した時代だからこそ、新たな“名古屋のソウルフード”を目指して、日々“美味しい”を追求します。</p>
                <p class="second-desc-box">今は、様々なこだわりから一日に提供できる量に限りがありますが“あんハマ”のパスタをソースに絡めて、口に入れた瞬間の芳醇な味わいを得るための、量より質の選択です。</p>
                <p class="second-desc-box">お客様のご来店をスタッフ一同心よりお待ちしております。</p>
                <a class="link-btn" href="{{ route('passion') }}">
                    <p>詳細はこちら</p>
                    <img src="{{ asset('image/top/arrow.svg') }}" alt="矢印">
                </a>
            </div>
        </div>
    </section>
    <!-- <section id="interior"></section> -->
    <section id="back-shot">
        <img src="{{ asset('image/top/back-shot.webp') }}" alt="カウンター席">
    </section>
    <section id="news" data-total="{{ count($news) }}">
        <div class="content-box">
            <div class="top-box click-canvas">
                <div class="tit-box">
                    <p class="en">NEWS</p>
                    <p class="jp">お知らせ</p>
                </div>
                <div class="news-box">
                    @foreach($news as $index => $news_ele)
                        <div class="news-ele not-click-canvas" data-index="{{ $index }}" style="{{ $index >= 3 ? 'display:none;' : '' }}">
                            <div class="main-box">
                                <div class="cat-box">
                                    <p>Click</p>
                                    <p>{{ $news_ele->category }}</p>
                                </div>
                                <h3 class="tit">{{ $news_ele->title }}</h3>
                            </div>
                            <p class="time">{{ $news_ele->created_at->format('Y.m.d') }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="pagination-box">
                <button class="prev-btn"><p>&laquo;</p></button>
                <div class="page-numbers"></div>
                <button class="next-btn"><p>&raquo;</p></button>
            </div>
            <div class="bottom-box click-canvas">
                @foreach($news as $index => $news_ele)
                    <div class="detail-ele" data-index="{{ $index }}" style="{{ $index >= 3 ? 'display:none;' : '' }}">
                        @php
                            $text = explode("\n", $news_ele->body);
                        @endphp
                        @foreach ($text as $line)
                            @if(strlen(trim($line)) == 0)
                                <br>
                            @else
                                <p>{{ $line }}</p>
                            @endif
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
        <div class="back"></div>
    </section>
    <section id="chef">
        <div class="content-box">
            <div class="left-box">
                <img class="main" src="{{ asset('image/top/chef-left.webp') }}" alt="店長 ソース仕込み">
                <img class="sub1" src="{{ asset('image/top/chef-left-sub1.webp') }}" alt="卓上 楊枝">
                <img class="sub2" src="{{ asset('image/top/chef-left-sub2.webp') }}" alt="卓上 グラス">
                <p class="en">Special<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Moments</p>
            </div>
            <div class="right-box">
                <div class="img-box">
                    <img src="{{ asset('image/top/chef-right-top.webp') }}" alt="店長 オーダー確認">
                    <p class="en">Unique Experience</p>
                </div>
                <div class="txt-box">
                    <p>良い意味での現状維持！良い意味での現状打破！</p>
                    <p>季節に合わせて食材を厳選することから、様々な料理の法則まで、手間を惜しまず一日一日進化し続けること。</p>
                    <p>外食でも各種栄養素を満たすことはお客様への愛情。</p>
                    <p>“あんハマ”でしか味わえない“コク”を一皿に込めます。</p>
                </div>
                <div class="prof-box">
                    <img class="img" src="{{ asset('image/top/chef-right-bottom.webp') }}" alt="店長 インタビュー">
                    <div class="txt-box">
                        <p class="manager">店長</p>
                        <div class="name-box">
                            <img class="name" src="{{ asset('image/top/chef-name.svg') }}" alt="店長 名前">
                            <p class="role">Chef</p>
                        </div>
                        <div class="desc-box">
                            <p>あんかけスパゲッティが大好物のオーナー“濵﨑”こと“ハマちゃん”からの一言「 現代的な“あんかけパスタ”を作って！ 」からすべては始まりました。</p>
                            <p>“美味しい”と“健康”の両立、日々進化を続ける栄養学は勿論、日本料理などの五法・五味・五色・五感を概念的に捉えて応用し、お店全体で表現することを大切にしています。</p>
                            <p>料理を通じてお客様とつながることは私の喜びです。</p>
                            <p>ぜひ一度、私たちの情熱が詰まった“あんかけパスタ”をご賞味ください。</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="menu">
        <div class="content-box">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img class="lazyload" data-src="{{ asset('image/top/menu1.webp') }}" alt="あんかけパスタ ミラカン">
                    </div>
                    <div class="swiper-slide">
                        <img class="lazyload" data-src="{{ asset('image/top/menu2.webp') }}" alt="あんかけパスタ ミラネーズ">
                    </div>
                    <div class="swiper-slide">
                        <img class="lazyload" data-src="{{ asset('image/top/menu3.webp') }}" alt="あんかけパスタ ミラエッグ">
                    </div>
                    <div class="swiper-slide">
                        <img class="lazyload" data-src="{{ asset('image/top/menu4.webp') }}" alt="あんかけパスタ ポパイ">
                    </div>
                    <div class="swiper-slide">
                        <img class="lazyload" data-src="{{ asset('image/top/menu5.webp') }}" alt="あんかけパスタ ハマちゃん">
                    </div>
                    <div class="swiper-slide">
                        <img class="lazyload" data-src="{{ asset('image/top/sosaku1.webp') }}" alt="オイルパスタ ペペロンチーノ">
                    </div>
                    <div class="swiper-slide">
                        <img class="lazyload" data-src="{{ asset('image/top/sosaku2.webp') }}" alt="カレーパスタ インディアン">
                    </div>
                    <div class="swiper-slide">
                        <img class="lazyload" data-src="{{ asset('image/top/sosaku3.webp') }}" alt="バジルパスタ ジェノベーゼ">
                    </div>
                    <div class="swiper-slide">
                        <img class="lazyload" data-src="{{ asset('image/top/sosaku4.webp') }}" alt="チーズパスタ カルボナーラ">
                    </div>
                    <div class="swiper-slide">
                        <img class="lazyload" data-src="{{ asset('image/top/sosaku5.webp') }}" alt="和風パスタ カツオノリ">
                    </div>
                    <div class="swiper-slide">
                        <img class="lazyload" data-src="{{ asset('image/top/pizza1.webp') }}" alt="あんかけピザ ミラカン">
                    </div>
                    <div class="swiper-slide">
                        <img class="lazyload" data-src="{{ asset('image/top/pizza2.webp') }}" alt="あんかけピザ ミラネーズ">
                    </div>
                    <div class="swiper-slide">
                        <img class="lazyload" data-src="{{ asset('image/top/pizza3.webp') }}" alt="あんかけピザ ミラエッグ">
                    </div>
                    <div class="swiper-slide">
                        <img class="lazyload" data-src="{{ asset('image/top/pizza4.webp') }}" alt="あんかけピザ ポパイ">
                    </div>
                    <div class="swiper-slide">
                        <img class="lazyload" data-src="{{ asset('image/top/pizza5.webp') }}" alt="あんかけピザ ハマちゃん">
                    </div>
                </div>
                <div class="swiper-pagination"></div>
                <div class="color-top-layer"></div>
                <div class="color-bottom-layer"></div>
            </div>
            <img class="logo click-canvas" src="{{ asset('image/top/logo-white.svg') }}" alt="ロゴ">
            <div class="left-bottom-box click-canvas">
                <div class="info-box">
                    <div class="left-box">
                        <div class="free-box">
                            <p>あんかけパスタ</p>
                        </div>
                        <div class="price-box">
                            <p class="price">1,200</p>
                            <p class="unit">円~</p>
                            <p class="mark">※</p>
                        </div>
                    </div>
                    <div class="note-box">
                        <p class="note-ele">※ 表示は、税込価格です。</p>
                        <p class="note-ele">※ 料金の詳細は、メニューをご確認ください。</p>
                    </div>
                </div>
            </div>
            <div class="right-top-box click-canvas">
                <p>名古屋<span>を</span></p>
                <p>代表<span>する</span>グルメ</p>
            </div>
            <a class="right-bottom-box" href="{{ route('menu') }}">
                <div class="outside-box">
                    <img src="{{ asset('image/top/text-rotation.svg') }}" alt="名古屋パスタステーション">
                    <div class="inside-box">
                        <p>Menu</p>
                        <img src="{{ asset('image/top/arrow-white.svg') }}" alt="矢印">
                    </div>
                </div>
            </a>
        </div>
    </section>
    <section id="gallery" class="click-canvas">
        <div class="content-box">
            <div class="slider-box">
                <div class="block">
                    <img class="lazyload" data-src="{{ asset('image/top/top-slider1.webp') }}" alt="テーブル席 料理提供">
                    <div class="overlay"></div>
                </div>
                <div class="block">
                    <img class="lazyload" data-src="{{ asset('image/top/top-slider2.webp') }}" alt="カウンター席 サラリーマン">
                    <div class="overlay"></div>
                </div>
                <div class="block">
                    <img class="lazyload" data-src="{{ asset('image/top/top-slider3.webp') }}" alt="女性2人組">
                    <div class="overlay"></div>
                </div>
                <div class="block">
                    <img class="lazyload" data-src="{{ asset('image/top/top-slider4.webp') }}" alt="メガ盛り">
                    <div class="overlay"></div>
                </div>
                <div class="block">
                    <img class="lazyload" data-src="{{ asset('image/top/top-slider5.webp') }}" alt="会計">
                    <div class="overlay"></div>
                </div>
                <div class="block">
                    <img class="lazyload" data-src="{{ asset('image/top/top-slider6.webp') }}" alt="料理待ち 男性">
                    <div class="overlay"></div>
                </div>
                <div class="block">
                    <img class="lazyload" data-src="{{ asset('image/top/top-slider7.webp') }}" alt="料理待ち 女性">
                    <div class="overlay"></div>
                </div>
                <div class="block">
                    <img class="lazyload" data-src="{{ asset('image/top/top-slider8.webp') }}" alt="メニュー選び">
                    <div class="overlay"></div>
                </div>
            </div>
            <div class="slider-box">
                <div class="block">
                    <img class="lazyload" data-src="{{ asset('image/top/top-slider1.webp') }}" alt="テーブル席 料理提供">
                    <div class="overlay"></div>
                </div>
                <div class="block">
                    <img class="lazyload" data-src="{{ asset('image/top/top-slider2.webp') }}" alt="カウンター席 サラリーマン">
                    <div class="overlay"></div>
                </div>
                <div class="block">
                    <img class="lazyload" data-src="{{ asset('image/top/top-slider3.webp') }}" alt="女性2人組">
                    <div class="overlay"></div>
                </div>
                <div class="block">
                    <img class="lazyload" data-src="{{ asset('image/top/top-slider4.webp') }}" alt="メガ盛り">
                    <div class="overlay"></div>
                </div>
                <div class="block">
                    <img class="lazyload" data-src="{{ asset('image/top/top-slider5.webp') }}" alt="会計">
                    <div class="overlay"></div>
                </div>
                <div class="block">
                    <img class="lazyload" data-src="{{ asset('image/top/top-slider6.webp') }}" alt="料理待ち 男性">
                    <div class="overlay"></div>
                </div>
                <div class="block">
                    <img class="lazyload" data-src="{{ asset('image/top/top-slider7.webp') }}" alt="料理待ち 女性">
                    <div class="overlay"></div>
                </div>
                <div class="block">
                    <img class="lazyload" data-src="{{ asset('image/top/top-slider8.webp') }}" alt="メニュー選び">
                    <div class="overlay"></div>
                </div>
            </div>
        </div>
    </section>
    <section id="google-map">
        <div class="content-box">
            <iframe class="click-canvas" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d815.0998128093773!2d136.920703069664!3d35.19652289422062!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60037163548e0a55%3A0xd8991aa8f442760a!2z44GC44KT44GL44GR44OP44Oe44Gh44KD44KT!5e0!3m2!1sja!2sjp!4v1740651003193!5m2!1sja!2sjp" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <a class="link-btn" href="{{ route('info') }}">
                <p>詳細はこちら</p>
                <img src="{{ asset('image/top/arrow-white.svg') }}" alt="矢印">
            </a>
            <a class="parking-link-btn" href="{{ route('parking') }}" target="_blank" rel="noopener noreferrer">
                <p>コインパーキングのご案内</p>
                <img class="icon" src="{{ asset('image/external-link-icon.svg') }}" alt="リンク">
            </a>
        </div>
    </section>
@stop





@section('js')
    @vite('resources/js/check.js')
@stop