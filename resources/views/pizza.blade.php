@extends('layouts.viewer')
@section('title', 'あんかけピザ｜あんかけハマちゃん')
@section('description', '名古屋の定番グルメ「 あんかけパスタ 」を楽しむなら、あんかけハマちゃんへ！スパイシーさに負けない“コク”のあるマイルドソースがやみつきに。安心・安全な料理をご提供します。')
@section('meta_tags')
    <meta name="robots" content="noindex, nofollow">
@stop

@section('css')
    <link href="{{ asset('/css/loading-other.css') }}" rel='stylesheet' type='text/css' media='all'>
    <link href="{{ asset('/css/mouse.css') }}" rel='stylesheet' type='text/css' media='all'>
    <link href="{{ asset('/css/common.css') }}" rel='stylesheet' type='text/css' media='all'>
    <link href="{{ asset('/css/pizza-sp.css') }}" rel='stylesheet' type='text/css' media='all and (max-width: 700px)'>
    <link href="{{ asset('/css/pizza.css') }}" rel='stylesheet' type='text/css' media='all and (min-width: 700px)'>
    <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:ital,opsz,wght@0,6..96,400..900;1,6..96,400..900&display=swap" rel="stylesheet">
@stop



@section('content_loader')
    <div id="loader-bg">
        <div class="overlay-circle"></div>
    </div>
@stop



@section('content_sidebar')
@stop




@section('content')
    <section id="first-view">
        <h1>メニュー</h1>
        <div class="desc-box">
            <p class="base pc">“あんハマ”の<span class="red-line">あんかけピザ</span>は、定番系と創作系</p>
            <p class="base sp">“あんハマ”の<span class="red-line">あんかけピザ</span>は<br>定番系と創作系</p>
            <p class="note">現代的な創作系は、随時追加される予定です。</p>
            <p class="note">こちらに掲載のメニューと店舗でのメニューが多少異なる場合があります。</p>
            <p class="note">あんかけピザは +150円 でお持ち帰りができます。</p>
        </div>
        <div class="standard-box">
            <div class="category-box">
                <div class="tit-box">
                    <h2>あんかけピザ</h2>
                </div>
            </div>
            <div class="nav-box">
                <a href="#mirakan">ミラカン</a>
                <a href="#miranezu">ミラネーズ</a>
                <a href="#mila-egg">ミラエッグ</a>
                <a href="#spinach">ポパイ</a>
                <a href="#hama-chan">ハマちゃん</a>
            </div>
            <div class="option-box">
                <div class="cat-box">
                    <p>オプション　　：</p>
                    <p>追加オリーブオイル　追加ソース　チーズ増量</p>
                </div>
                <div class="cat-box">
                    <p>フリー調味料　：</p>
                    <p>ブラックペッパー　タバスコ</p>
                </div>
            </div>
        </div>
    </section>

    <section class="category-sec-box standard">
        <div class="tit-box">
            <div class="top"></div>
            <p class="type">定番メニュー</p>
            <h2>あんかけピザ</h2>
            <div class="bottom"></div>
            <div class="center-circle"></div>
            <div class="dot left-top"></div>
            <div class="dot left-bottom"></div>
            <div class="dot right-top"></div>
            <div class="dot right-bottom"></div>
        </div>
        <div class="desc-box">
            <p>あんかけパスタの"あん"ソースをピザソースに</p>
            <p>直径24cmのオリジナルピザ</p>
        </div>
    </section>
    <section id="mirakan">
        <div class="top-content-box">
            <div class="img-box">
                <div class="base-box click-canvas">
                    <div class="ingredient-box">
                        <p>ウィンナー</p>
                    </div>
                    <div class="ingredient-box">
                        <p>ベーコン</p>
                    </div>
                    <div class="ingredient-box">
                        <p>玉ねぎ</p>
                    </div>
                    <div class="ingredient-box">
                        <p>マッシュルーム</p>
                    </div>
                    <div class="ingredient-box">
                        <p>ピーマン</p>
                    </div>
                    <div class="dish-box">
                        <div class="left-circle"></div>
                        <img class="dish" src="{{ asset('image/pizza/pizza1.webp') }}" alt="あんかけピザ ミラカン">
                    </div>
                    <img class="bg" src="{{ asset('image/pizza/pizza1-paint.svg') }}" alt="背景ペイント">
                </div>
                <div class="food-box">
                    <video preload="none" autoplay loop muted playsinline disablepictureinpicture>
                        <source src="{{ asset('movie/menu1.mp4') }}" type="video/mp4">
                    </video>
                </div>
                <div class="copy-box">
                    <h3>ミラカン</h3>
                    <p>1,000<span class="yen">円</span></p>
                </div>
            </div>
            <img class="name" src="{{ asset('image/pizza/pizza1-name.svg') }}" alt="あんかけピザ ミラカン">
            <img class="fork" src="{{ asset('image/pizza/fork.svg') }}" alt="フォーク">
            <img class="tricolore" src="{{ asset('image/pizza/tricolore.svg') }}" alt="トリコローレ">
            <img class="sauce" src="{{ asset('image/menu/sauce.webp') }}" alt="ソース">
        </div>
    </section>

    <section id="miranezu">
        <div class="top-content-box">
            <div class="img-box">
                <div class="base-box click-canvas">
                    <div class="ingredient-box">
                        <p>ウィンナー</p>
                    </div>
                    <div class="ingredient-box">
                        <p>ベーコン</p>
                    </div>
                    <div class="ingredient-box">
                        <p>肉そぼろ</p>
                    </div>
                    <div class="dish-box">
                        <div class="right-circle"></div>
                        <img class="dish" src="{{ asset('image/pizza/pizza2.webp') }}" alt="あんかけピザ ミラネーズ">
                    </div>
                    <img class="bg" src="{{ asset('image/pizza/pizza2-paint.svg') }}" alt="背景ペイント">
                </div>
                <div class="food-box">
                    <video preload="none" autoplay loop muted playsinline disablepictureinpicture>
                        <source src="{{ asset('movie/menu2.mp4') }}" type="video/mp4">
                    </video>
                </div>
                <div class="copy-box">
                    <h3>ミラネーズ</h3>
                    <p>1,000<span class="yen">円</span></p>
                </div>
            </div>
            <img class="name" src="{{ asset('image/pizza/pizza2-name.svg') }}" alt="あんかけピザ ミラネーズ">
            <img class="fork" src="{{ asset('image/pizza/fork.svg') }}" alt="フォーク">
            <img class="tricolore" src="{{ asset('image/pizza/tricolore.svg') }}" alt="トリコローレ">
            <img class="sauce" src="{{ asset('image/menu/sauce.webp') }}" alt="ソース">
        </div>
    </section>

    <section id="mila-egg">
        <div class="top-content-box">
            <div class="img-box">
                <div class="base-box click-canvas">
                    <div class="ingredient-box">
                        <p>ウィンナー</p>
                    </div>
                    <div class="ingredient-box">
                        <p>ベーコン</p>
                    </div>
                    <div class="ingredient-box">
                        <p>目玉焼き</p>
                    </div>
                    <div class="ingredient-box">
                        <p>卵そぼろ</p>
                    </div>
                    <div class="dish-box">
                        <div class="left-circle"></div>
                        <img class="dish" src="{{ asset('image/pizza/pizza3.webp') }}" alt="あんかけピザ ミラエッグ">
                    </div>
                    <img class="bg" src="{{ asset('image/pizza/pizza3-paint.svg') }}" alt="背景ペイント">
                </div>
                <div class="food-box">
                    <video preload="none" autoplay loop muted playsinline disablepictureinpicture>
                        <source src="{{ asset('movie/menu3.mp4') }}" type="video/mp4">
                    </video>
                </div>
                <div class="copy-box">
                    <h3>ミラエッグ</h3>
                    <p>1,000<span class="yen">円</span></p>
                </div>
            </div>
            <img class="name" src="{{ asset('image/pizza/pizza3-name.svg') }}" alt="あんかけピザ ミラエッグ">
            <img class="fork" src="{{ asset('image/pizza/fork.svg') }}" alt="フォーク">
            <img class="tricolore" src="{{ asset('image/pizza/tricolore.svg') }}" alt="トリコローレ">
            <img class="sauce" src="{{ asset('image/menu/sauce.webp') }}" alt="ソース">
        </div>
    </section>

    <section id="spinach">
        <div class="top-content-box">
            <div class="img-box">
                <div class="base-box click-canvas">
                    <div class="ingredient-box">
                        <p>ウィンナー</p>
                    </div>
                    <div class="ingredient-box">
                        <p>ベーコン</p>
                    </div>
                    <div class="ingredient-box">
                        <p>ほうれん草</p>
                    </div>
                    <div class="ingredient-box">
                        <p>コーン</p>
                    </div>
<!--                     <div class="ingredient-box">
                        <p>豆苗</p>
                    </div> -->
                    <div class="dish-box">
                        <div class="right-circle"></div>
                        <img class="dish" src="{{ asset('image/pizza/pizza4.webp') }}" alt="あんかけピザ ポパイ">
                    </div>
                    <img class="bg" src="{{ asset('image/pizza/pizza4-paint.svg') }}" alt="背景ペイント">
                </div>
                <div class="food-box">
                    <video preload="none" autoplay loop muted playsinline disablepictureinpicture>
                        <source src="{{ asset('movie/menu4.mp4') }}" type="video/mp4">
                    </video>
                </div>
                <div class="copy-box">
                    <h3>ポパイ</h3>
                    <p>1,000<span class="yen">円</span></p>
                </div>
            </div>
            <img class="name" src="{{ asset('image/pizza/pizza4-name.svg') }}" alt="あんかけピザ ポパイ">
            <img class="fork" src="{{ asset('image/pizza/fork.svg') }}" alt="フォーク">
            <img class="tricolore" src="{{ asset('image/pizza/tricolore.svg') }}" alt="トリコローレ">
            <img class="sauce" src="{{ asset('image/menu/sauce.webp') }}" alt="ソース">
        </div>
    </section>


    <section id="hama-chan">
        <div class="top-content-box">
            <div class="img-box">
                <div class="base-box click-canvas">
                    <div class="ingredient-box">
                        <p>ウィンナー</p>
                    </div>
                    <div class="ingredient-box">
                        <p>目玉焼き</p>
                    </div>
                    <div class="ingredient-box">
                        <p>卵そぼろ</p>
                    </div>
                    <div class="ingredient-box">
                        <p>週替りのプラスされる具材</p>
                    </div>
                    <div class="dish-box">
                        <div class="left-circle"></div>
                        <img class="dish" src="{{ asset('image/pizza/pizza5.webp') }}" alt="あんかけピザ ハマちゃん">
                    </div>
                    <img class="bg" src="{{ asset('image/pizza/pizza5-paint.svg') }}" alt="背景ペイント">
                </div>
                <div class="food-box">
                    <video preload="none" autoplay loop muted playsinline disablepictureinpicture>
                        <source src="{{ asset('movie/menu5.mp4') }}" type="video/mp4">
                    </video>
                </div>
                <div class="copy-box">
                    <h3>ハマちゃん<span class="weekly-menu">※ 週替りメニュー</span></h3>
                    <p>1,200<span class="yen">円</span></p>
                </div>
            </div>
            <img class="name" src="{{ asset('image/pizza/pizza5-name.svg') }}" alt="あんかけピザ ハマちゃん">
            <img class="fork" src="{{ asset('image/pizza/fork.svg') }}" alt="フォーク">
            <img class="tricolore" src="{{ asset('image/pizza/tricolore.svg') }}" alt="トリコローレ">
            <img class="sauce" src="{{ asset('image/menu/sauce.webp') }}" alt="ソース">
            <!-- <img class="hama-sauce" src="{{ asset('image/menu/sauce.webp') }}" alt="ソース"> -->
            <img class="addition" src="{{ asset('image/menu/addition.webp') }}" alt="">
        </div>
    </section>


    <section id="announcement">
        <div class="text">
            <div class="text__content">
                <h3 class="part-number">" 創作メニュー 第1弾 "</h3>
                <!-- <h3 class="pasta-name">つけかけパスタ  <span>－ Dip & Pour －</span></h3> -->
                <p><span>現在</span>開発中！<span>乞う</span>ご期待！</p>
            </div>
            <div class="text__overlay">
                <div class="text__lines">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="text__lines">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
<!--         <div class="flyin-box">
            <p>Dip it.</p>
            <p>Pour it.</p>
            <p>Wow!</p>
        </div> -->
    </section>

    <section id="gallery">
        <div class="img-box">
            <img src="{{ asset('image/pizza/scene1.webp') }}" alt="注文">
            <div class="overlay click-canvas"></div>
        </div>
        <div class="img-box">
            <img src="{{ asset('image/pizza/scene2.webp') }}" alt="料理運び">
            <div class="overlay click-canvas"></div>
        </div>
        <a class="menu-link-box" href="{{ route('menu') }}">
            <p>"あんかけパスタ"メニュー</p>
            <div class="arrow">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </a>
    </section>

    <section id="topping" class="is-show">
        <div class="outside-circle">
            <div class="inside-circle">
                <p>ハマちゃん<br>週替り<br>トッピング</p>
            </div>
        </div>
    </section>
@stop





@section('js')
    @vite('resources/js/pizza.js')
@stop