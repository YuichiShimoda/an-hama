@extends('layouts.viewer')
@section('title', '店舗情報｜あんかけハマちゃん')
@section('description', '名古屋の定番グルメ「 あんかけパスタ 」を楽しむなら、あんかけハマちゃんへ！スパイシーさに負けない“コク”のあるマイルドソースがやみつきに。安心・安全な料理をご提供します。')
@section('meta_tags')
@stop

@section('css')
    <link href="{{ asset('/css/loading-other.css') }}" rel='stylesheet' type='text/css' media='all'>
    <link href="{{ asset('/css/mouse.css') }}" rel='stylesheet' type='text/css' media='all'>
    <link href="{{ asset('/css/common.css') }}" rel='stylesheet' type='text/css' media='all'>
    <link href="{{ asset('/css/info-sp.css') }}" rel='stylesheet' type='text/css' media='all and (max-width: 700px)'>
    <link href="{{ asset('/css/info.css') }}" rel='stylesheet' type='text/css' media='all and (min-width: 700px)'>
@stop



@section('content_loader')
    <div id="loader-bg">
        <div class="overlay-circle"></div>
    </div>
@stop



@section('content_sidebar')
    <a class="side-bar" href="{{ route('voice') }}" target="_blank" rel="noopener noreferrer">
        <div class="icon-box">
            <img class="nomal" src="{{ asset('image/questionnaire.png') }}" alt="">
            <img class="move" src="{{ asset('image/questionnaire.png') }}" alt="">
        </div>
        <p>アンケート</p>
    </a>
@stop




@section('content')
    <section id="first-view">
        <h1>店舗情報</h1>
    </section>

    <section id="overview">
        <img class="left-box" src="{{ asset('image/info/exterior.webp') }}" alt="">
        <div class="right-box">
            <div class="content-box">
                <div class="ele">
                    <p class="tit">住所</p>
                    <p class="desc">愛知県 名古屋市 北区 志賀本通 二丁目 48番地　1F 北</p>
                </div>
                <div class="ele">
                    <p class="tit">TEL</p>
                    <a class="desc tel" href="tel:052-938-3392">052 - 938 - 3392</a>
                </div>
                <div class="ele">
                    <p class="tit">営業時間</p>
                    <p class="desc">11:00<span class="from">~</span><span class="end-time">（ ソースがなくなり次第終了 ）</span></p>
                </div>
                <div class="ele">
                    <p class="tit">定休日</p>
                    <p class="desc">第2, 4土曜日、日曜日、祝日</p>
                </div>
                <div class="ele">
                    <p class="tit">決済方法</p>
                    <p class="desc">現金<img class="pay-logo" src="{{ asset('image/info/pay.webp') }}" alt=""></p>
                </div>
                <div class="ele">
                    <p class="tit">最寄り駅</p>
                    <p class="desc">地下鉄 名城線 志賀本通駅 4番出口</p>
                </div>
                <div class="ele">
                    <p class="tit">駐車場</p>
                    <a class="desc" href="{{ route('parking') }}" target="_blank" rel="noopener noreferrer">
                        <span class="parking">※ 近隣のコインパーキングをご利用ください</span>
                        <img class="external-link-icon" src="{{ asset('image/info/external-link-icon.svg') }}" alt="">
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section id="access">
        <h2>アクセス</h2>
        <div class="content-box">
            <div class="train-box">
                <img class="icon" src="{{ asset('image/info/train.svg') }}" alt="">
                <p class="cat">電車でお越しの場合</p>
                <p class="desc">地下鉄 名城線 志賀本通駅<br>4番出口より 徒歩 約2分</p>
            </div>
            <div class="car-box">
                <img class="icon" src="{{ asset('image/info/car.svg') }}" alt="">
                <p class="cat">車でお越しの場合</p>
                <p class="desc">お車を止める際は、近隣のコインパーキングをご利用ください。</p>
            </div>
        </div>
        <div class="google-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d815.0998128093773!2d136.920703069664!3d35.19652289422062!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60037163548e0a55%3A0xd8991aa8f442760a!2z44GC44KT44GL44GR44OP44Oe44Gh44KD44KT!5e0!3m2!1sja!2sjp!4v1740651003193!5m2!1sja!2sjp" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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