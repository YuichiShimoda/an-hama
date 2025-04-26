@extends('layouts.viewer')
@section('title', 'コインパーキング｜あんかけハマちゃん')
@section('description', '名古屋の定番グルメ「 あんかけパスタ 」を楽しむなら、あんかけハマちゃんへ！スパイシーさに負けない“コク”のあるマイルドソースがやみつきに。安心・安全な料理をご提供します。')
@section('meta_tags')
    <meta name="robots" content="noindex, nofollow">
@stop

@section('css')
    <link href="{{ asset('/css/loading-other.css') }}" rel='stylesheet' type='text/css' media='all'>
    <link href="{{ asset('/css/mouse.css') }}" rel='stylesheet' type='text/css' media='all'>
    <link href="{{ asset('/css/common.css') }}" rel='stylesheet' type='text/css' media='all'>
    <link href="{{ asset('/css/info-sp.css') }}" rel='stylesheet' type='text/css' media='all and (max-width: 700px)'>
    <link href="{{ asset('/css/info.css') }}" rel='stylesheet' type='text/css' media='all and (min-width: 700px)'>
@stop



@section('content_loader')
@stop



@section('content_sidebar')
@stop




@section('content')
    <section id="first-view">
        <h1>コインパーキングのご案内</h1>
        <div class="desc-box">
            <p class="note">※ A～Lを押すと詳細が表示されます。</p>
        </div>
    </section>

    <section id="parking-map">
        <div class="pc-content-box">
            <div class="inside">
                <img src="{{ asset('image/info/pc-parking-map.webp') }}" alt="">
            </div>
            <div class="ripple-box parking1" data-target="modal1">
                <div class="ripple-btn"></div>
            </div>
            <div class="ripple-box parking2" data-target="modal2">
                <div class="ripple-btn"></div>
            </div>
            <div class="ripple-box parking3" data-target="modal3">
                <div class="ripple-btn"></div>
            </div>
            <div class="ripple-box parking4" data-target="modal4">
                <div class="ripple-btn"></div>
            </div>
            <div class="ripple-box parking5" data-target="modal5">
                <div class="ripple-btn"></div>
            </div>
            <div class="ripple-box parking6" data-target="modal6">
                <div class="ripple-btn"></div>
            </div>
            <div class="ripple-box parking7" data-target="modal7">
                <div class="ripple-btn"></div>
            </div>
            <div class="ripple-box parking8" data-target="modal8">
                <div class="ripple-btn"></div>
            </div>
            <div class="ripple-box parking9" data-target="modal9">
                <div class="ripple-btn"></div>
            </div>
            <div class="ripple-box parking10" data-target="modal10">
                <div class="ripple-btn"></div>
            </div>
            <div class="ripple-box parking11" data-target="modal11">
                <div class="ripple-btn"></div>
            </div>
            <div class="ripple-box parking12" data-target="modal12">
                <div class="ripple-btn"></div>
            </div>
        </div>
        <div class="sp-content-box">
            <div class="inside">
                <img src="{{ asset('image/info/sp-parking-map.webp') }}" alt="">
            </div>
            <div class="ripple-box parking1" data-target="modal1">
                <div class="ripple-btn"></div>
            </div>
            <div class="ripple-box parking2" data-target="modal2">
                <div class="ripple-btn"></div>
            </div>
            <div class="ripple-box parking3" data-target="modal3">
                <div class="ripple-btn"></div>
            </div>
            <div class="ripple-box parking4" data-target="modal4">
                <div class="ripple-btn"></div>
            </div>
            <div class="ripple-box parking5" data-target="modal5">
                <div class="ripple-btn"></div>
            </div>
            <div class="ripple-box parking6" data-target="modal6">
                <div class="ripple-btn"></div>
            </div>
            <div class="ripple-box parking7" data-target="modal7">
                <div class="ripple-btn"></div>
            </div>
            <div class="ripple-box parking8" data-target="modal8">
                <div class="ripple-btn"></div>
            </div>
            <div class="ripple-box parking9" data-target="modal9">
                <div class="ripple-btn"></div>
            </div>
            <div class="ripple-box parking10" data-target="modal10">
                <div class="ripple-btn"></div>
            </div>
            <div class="ripple-box parking11" data-target="modal11">
                <div class="ripple-btn"></div>
            </div>
            <div class="ripple-box parking12" data-target="modal12">
                <div class="ripple-btn"></div>
            </div>
        </div>
        <div class="desc-box">
            <p>・掲載情報は、2025年4月時点の情報です。</p>
            <p>・掲載のパーキングをご利用の際は、必ず現地にて料金体系および利用規約をご確認ください。</p>
            <p>・駐車料金は、30分換算の料金を記載しております。（ 駐車料金の時間区切りはそれぞれ異なります。 ）</p>
            <p>・掲載のパーキングは、当店の提携駐車場ではありません。（ ご利用は自己責任にてお願い申し上げます。 )</p>
        </div>
        <a class="download-btn" href="{{ asset('image/info/an-hama-parking.png') }}" download>
            <span>ダウンロードする</span>
        </a>
        <div id="modal1" class="modal">
            <div class="md-overlay md-close basic-hover"></div>
            <div class="md-contents">
                <div class="md-inner basic-hover">
                    <img loading="lazy" class="fig" src="{{ asset('image/info/parking/a.webp') }}" alt="">
                    <p class="note">※ 掲載情報は、変更になる場合があります。</p>
                    <img loading="lazy" class="close_btn" src="{{ asset('image/info/close-btn.svg') }}" alt="close">
                </div>
            </div>
        </div>
        <div id="modal2" class="modal">
            <div class="md-overlay md-close basic-hover"></div>
            <div class="md-contents">
                <div class="md-inner basic-hover">
                    <img loading="lazy" class="fig" src="{{ asset('image/info/parking/b.webp') }}" alt="">
                    <p class="note">※ 掲載情報は、変更になる場合があります。</p>
                    <img loading="lazy" class="close_btn" src="{{ asset('image/info/close-btn.svg') }}" alt="close">
                </div>
            </div>
        </div>
        <div id="modal3" class="modal">
            <div class="md-overlay md-close basic-hover"></div>
            <div class="md-contents">
                <div class="md-inner basic-hover">
                    <img loading="lazy" class="fig" src="{{ asset('image/info/parking/c.webp') }}" alt="">
                    <p class="note">※ 掲載情報は、変更になる場合があります。</p>
                    <img loading="lazy" class="close_btn" src="{{ asset('image/info/close-btn.svg') }}" alt="close">
                </div>
            </div>
        </div>
        <div id="modal4" class="modal">
            <div class="md-overlay md-close basic-hover"></div>
            <div class="md-contents">
                <div class="md-inner basic-hover">
                    <img loading="lazy" class="fig" src="{{ asset('image/info/parking/d.webp') }}" alt="">
                    <p class="note">※ 掲載情報は、変更になる場合があります。</p>
                    <img loading="lazy" class="close_btn" src="{{ asset('image/info/close-btn.svg') }}" alt="close">
                </div>
            </div>
        </div>
        <div id="modal5" class="modal">
            <div class="md-overlay md-close basic-hover"></div>
            <div class="md-contents">
                <div class="md-inner basic-hover">
                    <img loading="lazy" class="fig" src="{{ asset('image/info/parking/e.webp') }}" alt="">
                    <p class="note">※ 掲載情報は、変更になる場合があります。</p>
                    <img loading="lazy" class="close_btn" src="{{ asset('image/info/close-btn.svg') }}" alt="close">
                </div>
            </div>
        </div>
        <div id="modal6" class="modal">
            <div class="md-overlay md-close basic-hover"></div>
            <div class="md-contents">
                <div class="md-inner basic-hover">
                    <img loading="lazy" class="fig" src="{{ asset('image/info/parking/f.webp') }}" alt="">
                    <p class="note">※ 掲載情報は、変更になる場合があります。</p>
                    <img loading="lazy" class="close_btn" src="{{ asset('image/info/close-btn.svg') }}" alt="close">
                </div>
            </div>
        </div>
        <div id="modal7" class="modal">
            <div class="md-overlay md-close basic-hover"></div>
            <div class="md-contents">
                <div class="md-inner basic-hover">
                    <img loading="lazy" class="fig" src="{{ asset('image/info/parking/g.webp') }}" alt="">
                    <p class="note">※ 掲載情報は、変更になる場合があります。</p>
                    <img loading="lazy" class="close_btn" src="{{ asset('image/info/close-btn.svg') }}" alt="close">
                </div>
            </div>
        </div>
        <div id="modal8" class="modal">
            <div class="md-overlay md-close basic-hover"></div>
            <div class="md-contents">
                <div class="md-inner basic-hover">
                    <img loading="lazy" class="fig" src="{{ asset('image/info/parking/h.webp') }}" alt="">
                    <p class="note">※ 掲載情報は、変更になる場合があります。</p>
                    <img loading="lazy" class="close_btn" src="{{ asset('image/info/close-btn.svg') }}" alt="close">
                </div>
            </div>
        </div>
        <div id="modal9" class="modal">
            <div class="md-overlay md-close basic-hover"></div>
            <div class="md-contents">
                <div class="md-inner basic-hover">
                    <img loading="lazy" class="fig" src="{{ asset('image/info/parking/i.webp') }}" alt="">
                    <p class="note">※ 掲載情報は、変更になる場合があります。</p>
                    <img loading="lazy" class="close_btn" src="{{ asset('image/info/close-btn.svg') }}" alt="close">
                </div>
            </div>
        </div>

        <div id="modal10" class="modal">
            <div class="md-overlay md-close basic-hover"></div>
            <div class="md-contents">
                <div class="md-inner basic-hover">
                    <img loading="lazy" class="fig" src="{{ asset('image/info/parking/j.webp') }}" alt="">
                    <p class="note">※ 掲載情報は、変更になる場合があります。</p>
                    <img loading="lazy" class="close_btn" src="{{ asset('image/info/close-btn.svg') }}" alt="close">
                </div>
            </div>
        </div>
        <div id="modal11" class="modal">
            <div class="md-overlay md-close basic-hover"></div>
            <div class="md-contents">
                <div class="md-inner basic-hover">
                    <img loading="lazy" class="fig" src="{{ asset('image/info/parking/k.webp') }}" alt="">
                    <p class="note">※ 掲載情報は、変更になる場合があります。</p>
                    <img loading="lazy" class="close_btn" src="{{ asset('image/info/close-btn.svg') }}" alt="close">
                </div>
            </div>
        </div>
        <div id="modal12" class="modal">
            <div class="md-overlay md-close basic-hover"></div>
            <div class="md-contents">
                <div class="md-inner basic-hover">
                    <img loading="lazy" class="fig" src="{{ asset('image/info/parking/l.webp') }}" alt="">
                    <p class="note">※ 掲載情報は、変更になる場合があります。</p>
                    <img loading="lazy" class="close_btn" src="{{ asset('image/info/close-btn.svg') }}" alt="close">
                </div>
            </div>
        </div>
    </section>


    <section id="gallery">
        <div class="img-box">
            <img src="{{ asset('image/info/scene1.webp') }}" alt="">
            <div class="overlay click-canvas"></div>
        </div>
        <div class="img-box">
            <img src="{{ asset('image/info/scene2.webp') }}" alt="">
            <div class="overlay click-canvas"></div>
        </div>
    </section>
@stop





@section('js')
    @vite('resources/js/info.js')
@stop