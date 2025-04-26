@extends('layouts.viewer')
@section('title', 'メニュー｜あんかけハマちゃん')
@section('description', '名古屋の定番グルメ「 あんかけパスタ 」を楽しむなら、あんかけハマちゃんへ！スパイシーさに負けない“コク”のあるマイルドソースがやみつきに。安心・安全な料理をご提供します。')
@section('meta_tags')
@stop

@section('css')
    <link href="{{ asset('/css/loading-other.css') }}" rel='stylesheet' type='text/css' media='all'>
    <link href="{{ asset('/css/mouse.css') }}" rel='stylesheet' type='text/css' media='all'>
    <link href="{{ asset('/css/common.css') }}" rel='stylesheet' type='text/css' media='all'>
    <link href="{{ asset('/css/menu-sp.css') }}" rel='stylesheet' type='text/css' media='all and (max-width: 700px)'>
    <link href="{{ asset('/css/menu.css') }}" rel='stylesheet' type='text/css' media='all and (min-width: 700px)'>
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
            <p class="base">“あんハマ”のあんかけパスタは、定番系と創作系</p>
            <p class="note">現代的な創作系は、随時追加される予定です。</p>
            <p class="note">こちらに掲載のメニューと店舗でのメニューが多少異なる場合があります。</p>
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
                <p>プチご飯　追加ソース　粉チーズ</p>
            </div>
            <div class="cat-box">
                <p>フリー調味料　：</p>
                <p>ブラックペッパー　タバスコ</p>
            </div>
        </div>
    </section>

    <section id="mirakan">
        <div class="top-content-box">
            <div class="img-box">
                <div class="base-box click-canvas">
                    <img class="dish" src="{{ asset('image/menu/menu1.webp') }}" alt="">
                    <img class="bg" src="{{ asset('image/menu/menu1-paint.svg') }}" alt="">
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
                </div>
                <div class="food-box">
                    <video preload="none" autoplay loop muted playsinline disablepictureinpicture>
                        <source src="{{ asset('movie/menu1.mp4') }}" type="video/mp4">
                    </video>
                </div>
                <div class="copy-box">
                    <h3>ミラカン</h3>
                    <p>1,200<span class="yen">円</span></p>
                </div>
            </div>
            <img class="name" src="{{ asset('image/menu/menu1-name.svg') }}" alt="">
            <img class="fork" src="{{ asset('image/menu/fork.svg') }}" alt="">
            <img class="tricolore" src="{{ asset('image/menu/tricolore.svg') }}" alt="">
        </div>
        <div class="bottom-content-box">
            <div class="right-box">
                <div class="ele">
                    <div class="size-box">
                        <p class="desc">スモール</p>
                        <p class="gram">200g</p>
                    </div>
                    <div class="price-box">
                        <p class="desc">1,150</p>
                        <p class="yen">円</p>
                    </div>
                </div>
                <div class="ele">
                    <div class="size-box">
                        <p class="desc">レギュラー</p>
                        <p class="gram">300g</p>
                    </div>
                    <div class="price-box">
                        <p class="desc">1,200</p>
                        <p class="yen">円</p>
                    </div>
                </div>
                <div class="ele">
                    <div class="size-box">
                        <p class="desc">ラージ</p>
                        <p class="gram">400g</p>
                    </div>
                    <div class="price-box">
                        <p class="desc">1,300</p>
                        <p class="yen">円</p>
                    </div>
                </div>
                <div class="ele">
                    <div class="size-box">
                        <p class="desc">メガ</p>
                        <p class="gram">600g</p>
                    </div>
                    <div class="price-box">
                        <p class="desc">1,400</p>
                        <p class="yen">円</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="miranezu">
        <div class="top-content-box">
            <div class="img-box">
                <div class="base-box click-canvas">
                    <img class="dish" src="{{ asset('image/menu/menu2.webp') }}" alt="">
                    <img class="bg" src="{{ asset('image/menu/menu2-paint.svg') }}" alt="">
                    <div class="ingredient-box">
                        <p>ウィンナー</p>
                    </div>
                    <div class="ingredient-box">
                        <p>ベーコン</p>
                    </div>
                    <div class="ingredient-box">
                        <p>肉そぼろ</p>
                    </div>
                </div>
                <div class="food-box">
                    <video preload="none" autoplay loop muted playsinline disablepictureinpicture>
                        <source src="{{ asset('movie/menu2.mp4') }}" type="video/mp4">
                    </video>
                </div>
                <div class="copy-box">
                    <h3>ミラネーズ</h3>
                    <p>1,200<span class="yen">円</span></p>
                </div>
            </div>
            <img class="name" src="{{ asset('image/menu/menu2-name.svg') }}" alt="">
            <img class="fork" src="{{ asset('image/menu/fork.svg') }}" alt="">
            <img class="tricolore" src="{{ asset('image/menu/tricolore.svg') }}" alt="">
        </div>
        <div class="bottom-content-box">
            <div class="right-box">
                <div class="ele">
                    <div class="size-box">
                        <p class="desc">スモール</p>
                        <p class="gram">200g</p>
                    </div>
                    <div class="price-box">
                        <p class="desc">1,150</p>
                        <p class="yen">円</p>
                    </div>
                </div>
                <div class="ele">
                    <div class="size-box">
                        <p class="desc">レギュラー</p>
                        <p class="gram">300g</p>
                    </div>
                    <div class="price-box">
                        <p class="desc">1,200</p>
                        <p class="yen">円</p>
                    </div>
                </div>
                <div class="ele">
                    <div class="size-box">
                        <p class="desc">ラージ</p>
                        <p class="gram">400g</p>
                    </div>
                    <div class="price-box">
                        <p class="desc">1,300</p>
                        <p class="yen">円</p>
                    </div>
                </div>
                <div class="ele">
                    <div class="size-box">
                        <p class="desc">メガ</p>
                        <p class="gram">600g</p>
                    </div>
                    <div class="price-box">
                        <p class="desc">1,400</p>
                        <p class="yen">円</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="mila-egg">
        <div class="top-content-box">
            <div class="img-box">
                <div class="base-box click-canvas">
                    <img class="dish" src="{{ asset('image/menu/menu3.webp') }}" alt="">
                    <img class="bg" src="{{ asset('image/menu/menu3-paint.svg') }}" alt="">
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
                </div>
                <div class="food-box">
                    <video preload="none" autoplay loop muted playsinline disablepictureinpicture>
                        <source src="{{ asset('movie/menu3.mp4') }}" type="video/mp4">
                    </video>
                </div>
                <div class="copy-box">
                    <h3>ミラエッグ</h3>
                    <p>1,200<span class="yen">円</span></p>
                </div>
            </div>
            <img class="name" src="{{ asset('image/menu/menu3-name.svg') }}" alt="">
            <img class="fork" src="{{ asset('image/menu/fork.svg') }}" alt="">
            <img class="tricolore" src="{{ asset('image/menu/tricolore.svg') }}" alt="">
        </div>
        <div class="bottom-content-box">
            <div class="right-box">
                <div class="ele">
                    <div class="size-box">
                        <p class="desc">スモール</p>
                        <p class="gram">200g</p>
                    </div>
                    <div class="price-box">
                        <p class="desc">1,150</p>
                        <p class="yen">円</p>
                    </div>
                </div>
                <div class="ele">
                    <div class="size-box">
                        <p class="desc">レギュラー</p>
                        <p class="gram">300g</p>
                    </div>
                    <div class="price-box">
                        <p class="desc">1,200</p>
                        <p class="yen">円</p>
                    </div>
                </div>
                <div class="ele">
                    <div class="size-box">
                        <p class="desc">ラージ</p>
                        <p class="gram">400g</p>
                    </div>
                    <div class="price-box">
                        <p class="desc">1,300</p>
                        <p class="yen">円</p>
                    </div>
                </div>
                <div class="ele">
                    <div class="size-box">
                        <p class="desc">メガ</p>
                        <p class="gram">600g</p>
                    </div>
                    <div class="price-box">
                        <p class="desc">1,400</p>
                        <p class="yen">円</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="spinach">
        <div class="top-content-box">
            <div class="img-box">
                <div class="base-box click-canvas">
                    <img class="dish" src="{{ asset('image/menu/menu4.webp') }}" alt="">
                    <img class="bg" src="{{ asset('image/menu/menu4-paint.svg') }}" alt="">
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
                    <div class="ingredient-box">
                        <p>豆苗</p>
                    </div>
                </div>
                <div class="food-box">
                    <video preload="none" autoplay loop muted playsinline disablepictureinpicture>
                        <source src="{{ asset('movie/menu4.mp4') }}" type="video/mp4">
                    </video>
                </div>
                <div class="copy-box">
                    <h3>ポパイ</h3>
                    <p>1,200<span class="yen">円</span></p>
                </div>
            </div>
            <img class="name" src="{{ asset('image/menu/menu4-name.svg') }}" alt="">
            <img class="fork" src="{{ asset('image/menu/fork.svg') }}" alt="">
            <img class="tricolore" src="{{ asset('image/menu/tricolore.svg') }}" alt="">
        </div>
        <div class="bottom-content-box">
            <div class="right-box">
                <div class="ele">
                    <div class="size-box">
                        <p class="desc">スモール</p>
                        <p class="gram">200g</p>
                    </div>
                    <div class="price-box">
                        <p class="desc">1,150</p>
                        <p class="yen">円</p>
                    </div>
                </div>
                <div class="ele">
                    <div class="size-box">
                        <p class="desc">レギュラー</p>
                        <p class="gram">300g</p>
                    </div>
                    <div class="price-box">
                        <p class="desc">1,200</p>
                        <p class="yen">円</p>
                    </div>
                </div>
                <div class="ele">
                    <div class="size-box">
                        <p class="desc">ラージ</p>
                        <p class="gram">400g</p>
                    </div>
                    <div class="price-box">
                        <p class="desc">1,300</p>
                        <p class="yen">円</p>
                    </div>
                </div>
                <div class="ele">
                    <div class="size-box">
                        <p class="desc">メガ</p>
                        <p class="gram">600g</p>
                    </div>
                    <div class="price-box">
                        <p class="desc">1,400</p>
                        <p class="yen">円</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="hama-chan">
        <div class="top-content-box">
            <div class="img-box">
                <div class="base-box click-canvas">
                    <img class="dish" src="{{ asset('image/menu/menu5.webp') }}" alt="">
                    <img class="bg" src="{{ asset('image/menu/menu5-paint.svg') }}" alt="">
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
                </div>
                <div class="food-box">
                    <video preload="none" autoplay loop muted playsinline disablepictureinpicture>
                        <source src="{{ asset('movie/menu5.mp4') }}" type="video/mp4">
                    </video>
                </div>
                <div class="copy-box">
                    <h3>ハマちゃん</h3>
                    <p>1,500<span class="yen">円</span></p>
                </div>
            </div>
            <img class="name" src="{{ asset('image/menu/menu5-name.svg') }}" alt="">
            <img class="fork" src="{{ asset('image/menu/fork.svg') }}" alt="">
            <img class="tricolore" src="{{ asset('image/menu/tricolore.svg') }}" alt="">
            <img class="addition" src="{{ asset('image/menu/addition.webp') }}" alt="">
        </div>
        <div class="bottom-content-box">
            <div class="right-box">
                <div class="ele">
                    <div class="size-box">
                        <p class="desc">スモール</p>
                        <p class="gram">200g</p>
                    </div>
                    <div class="price-box">
                        <p class="desc">1,450</p>
                        <p class="yen">円</p>
                    </div>
                </div>
                <div class="ele">
                    <div class="size-box">
                        <p class="desc">レギュラー</p>
                        <p class="gram">300g</p>
                    </div>
                    <div class="price-box">
                        <p class="desc">1,500</p>
                        <p class="yen">円</p>
                    </div>
                </div>
                <div class="ele">
                    <div class="size-box">
                        <p class="desc">ラージ</p>
                        <p class="gram">400g</p>
                    </div>
                    <div class="price-box">
                        <p class="desc">1,600</p>
                        <p class="yen">円</p>
                    </div>
                </div>
                <div class="ele">
                    <div class="size-box">
                        <p class="desc">メガ</p>
                        <p class="gram">600g</p>
                    </div>
                    <div class="price-box">
                        <p class="desc">1,700</p>
                        <p class="yen">円</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="announcement">
        <div class="content-box">
            <p>" 創作系 "</p>
            <p>追加予定！</p>
            <p>乞うご期待！</p>
            <img src="{{ asset('image/menu/announcement-bg.webp') }}" alt="">
        </div>
    </section>

    <section id="gallery">
        <div class="img-box">
            <img src="{{ asset('image/menu/scene1.webp') }}" alt="">
            <div class="overlay click-canvas"></div>
        </div>
        <div class="img-box">
            <img src="{{ asset('image/menu/scene2.webp') }}" alt="">
            <div class="overlay click-canvas"></div>
        </div>
    </section>
@stop





@section('js')
    @vite('resources/js/menu.js')
@stop