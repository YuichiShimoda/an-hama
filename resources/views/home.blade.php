@extends('layouts.viewer')
@section('title', 'あんかけハマちゃん｜名古屋あんかけスパゲティ')
@section('description', '名古屋の定番グルメ「 あんかけパスタ 」を楽しむなら、あんかけハマちゃんへ！スパイシーさに負けない“コク”のあるマイルドソースがやみつきに。安心・安全な料理をご提供します。')
@section('meta_tags')
@stop

@section('css')
    <link href="{{ asset('/css/loading.css') }}" rel='stylesheet' type='text/css' media='all'>
    <link href="{{ asset('/css/mouse.css') }}" rel='stylesheet' type='text/css' media='all'>
    <link href="{{ asset('/css/common.css') }}" rel='stylesheet' type='text/css' media='all'>
    <link href="{{ asset('/css/style-sp.css') }}" rel='stylesheet' type='text/css' media='all and (max-width: 700px)'>
    <link href="{{ asset('/css/style.css') }}" rel='stylesheet' type='text/css' media='all and (min-width: 700px)'>
@stop



@section('content_loader')
    <div id="loader-bg">
        <div class="border"></div>
        <img class="logo" src="{{ asset('image/loading-logo.svg') }}" alt="">
        <div class="overlay-top"></div>
        <div class="overlay-bottom"></div>
    </div>
@stop



@section('content_sidebar')
@stop




@section('content')
    <section id="mv">
        <div class="video-box">
            <video preload="none" autoplay loop muted playsinline disablepictureinpicture>
                <source src="{{ asset('movie/mv-new.mp4') }}" type="video/mp4">
            </video>
        </div>
        <img class="mesh" src="{{ asset('image/top/mesh.png') }}" alt="">
        <!-- <p class="center">キャッチコピーキャッチ<br>キャッチコピーキャッチコピー<br>キャッチコピー</p> -->
        <div class="center-box">
            <div class="inside">
                <img class="circle" src="{{ asset('image/cursor-circle.svg') }}" alt="">
                <img class="pasta-icon" src="{{ asset('image/pasta-icon.svg') }}" alt="">
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
        </div>
    </section>
    <div id="loop-band">
        <ul class="word-box">
            <li><img src="{{ asset('image/top/smile.svg') }}" alt=""></li>
            <li><img src="{{ asset('image/top/smile.svg') }}" alt=""></li>
            <li><img src="{{ asset('image/top/smile.svg') }}" alt=""></li>
        </ul>
        <ul class="word-box">
            <li><img src="{{ asset('image/top/smile.svg') }}" alt=""></li>
            <li><img src="{{ asset('image/top/smile.svg') }}" alt=""></li>
            <li><img src="{{ asset('image/top/smile.svg') }}" alt=""></li>
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
    </div>
    <section id="concept">
        <div class="content-box">
            <div class="img-box">
                <img src="{{ asset('image/top/concept-person.webp') }}" alt="">
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
                    <p>伝統的な“あんかけスパゲティ”を現代的な“あんかけパスタ”へ...</p>
                    <img src="{{ asset('image/top/concept-shop.webp') }}" alt="">
                </div>
                <p class="second-desc-box">原点でもあるイタリアンパスタが浸透した時代だからこそ、新たな“名古屋のソウルフード”を目指して、日々“美味しい”を追求します。</p>
                <p class="second-desc-box">今は、様々なこだわりから一日に提供できる量に限りがありますが“あんハマ”のパスタをソースに絡めて、口に入れた瞬間の芳醇な味わいを得るための、量より質の選択です。</p>
                <p class="second-desc-box">お客様のご来店をスタッフ一同心よりお待ちしております。</p>
                <a class="link-btn" href="{{ route('passion') }}">
                    <p>詳細はこちら</p>
                    <img src="{{ asset('image/top/arrow.svg') }}" alt="">
                </a>
            </div>
        </div>
    </section>
    <!-- <section id="interior"></section> -->
    <section id="back-shot">
        <img src="{{ asset('image/top/back-shot.webp') }}" alt="">
    </section>
    <section id="news">
        <div class="content-box">
            <div class="top-box click-canvas">
                <div class="tit-box">
                    <p class="en">NEWS</p>
                    <p class="jp">お知らせ</p>
                </div>
                <div class="news-box">
                    @foreach($news as $news_ele)
                        <div class="news-ele not-click-canvas">
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
            <div class="bottom-box click-canvas">
                @foreach($news as $index => $news_ele)
                    @if($index == 0)
                        <div class="detail-ele">
                    @else
                        <div class="detail-ele" style="display:none;">
                    @endif
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
                <img class="main" src="{{ asset('image/top/chef-left.webp') }}" alt="">
                <img class="sub1" src="{{ asset('image/top/chef-left-sub1.webp') }}" alt="">
                <img class="sub2" src="{{ asset('image/top/chef-left-sub2.webp') }}" alt="">
                <p class="en">Special<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Moments</p>
            </div>
            <div class="right-box">
                <div class="img-box">
                    <img src="{{ asset('image/top/chef-right-top.webp') }}" alt="">
                    <p class="en">Unique Experience</p>
                </div>
                <div class="txt-box">
                    <p>良い意味での現状維持！良い意味での現状打破！</p>
                    <p>季節に合わせて食材を厳選することから、様々な料理の法則まで、手間を惜しまず一日一日進化し続けること。</p>
                    <p>外食でも各種栄養素を満たすことはお客様への愛情。</p>
                    <p>“あんハマ”でしか味わえない“コク”を一皿に込めます。</p>
                </div>
                <div class="prof-box">
                    <img class="img" src="{{ asset('image/top/chef-right-bottom.webp') }}" alt="">
                    <div class="txt-box">
                        <p class="manager">店長</p>
                        <div class="name-box">
                            <img class="name" src="{{ asset('image/top/chef-name.svg') }}" alt="">
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
                        <img src="{{ asset('image/top/menu1.webp') }}" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('image/top/menu2.webp') }}" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('image/top/menu3.webp') }}" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('image/top/menu4.webp') }}" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('image/top/menu5.webp') }}" alt="">
                    </div>
                </div>
                <div class="swiper-pagination"></div>
                <div class="color-top-layer"></div>
                <div class="color-bottom-layer"></div>
            </div>
            <img class="logo click-canvas" src="{{ asset('image/top/logo-white.svg') }}" alt="">
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
                    <img src="{{ asset('image/top/text-rotation.svg') }}" alt="">
                    <div class="inside-box">
                        <p>Menu</p>
                        <img src="{{ asset('image/top/arrow-white.svg') }}" alt="">
                    </div>
                </div>
            </a>
        </div>
    </section>
    <section id="gallery" class="click-canvas">
        <div class="content-box">
            <div class="slider-box">
                <div class="block">
                    <img src="{{ asset('image/top/top-slider1.webp') }}" alt="">
                    <div class="overlay"></div>
                </div>
                <div class="block">
                    <img src="{{ asset('image/top/top-slider2.webp') }}" alt="">
                    <div class="overlay"></div>
                </div>
                <div class="block">
                    <img src="{{ asset('image/top/top-slider3.webp') }}" alt="">
                    <div class="overlay"></div>
                </div>
                <div class="block">
                    <img src="{{ asset('image/top/top-slider4.webp') }}" alt="">
                    <div class="overlay"></div>
                </div>
                <div class="block">
                    <img src="{{ asset('image/top/top-slider5.webp') }}" alt="">
                    <div class="overlay"></div>
                </div>
                <div class="block">
                    <img src="{{ asset('image/top/top-slider6.webp') }}" alt="">
                    <div class="overlay"></div>
                </div>
                <div class="block">
                    <img src="{{ asset('image/top/top-slider7.webp') }}" alt="">
                    <div class="overlay"></div>
                </div>
                <div class="block">
                    <img src="{{ asset('image/top/top-slider8.webp') }}" alt="">
                    <div class="overlay"></div>
                </div>
            </div>
            <div class="slider-box">
                <div class="block">
                    <img src="{{ asset('image/top/top-slider1.webp') }}" alt="">
                    <div class="overlay"></div>
                </div>
                <div class="block">
                    <img src="{{ asset('image/top/top-slider2.webp') }}" alt="">
                    <div class="overlay"></div>
                </div>
                <div class="block">
                    <img src="{{ asset('image/top/top-slider3.webp') }}" alt="">
                    <div class="overlay"></div>
                </div>
                <div class="block">
                    <img src="{{ asset('image/top/top-slider4.webp') }}" alt="">
                    <div class="overlay"></div>
                </div>
                <div class="block">
                    <img src="{{ asset('image/top/top-slider5.webp') }}" alt="">
                    <div class="overlay"></div>
                </div>
                <div class="block">
                    <img src="{{ asset('image/top/top-slider6.webp') }}" alt="">
                    <div class="overlay"></div>
                </div>
                <div class="block">
                    <img src="{{ asset('image/top/top-slider7.webp') }}" alt="">
                    <div class="overlay"></div>
                </div>
                <div class="block">
                    <img src="{{ asset('image/top/top-slider8.webp') }}" alt="">
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
                <img src="{{ asset('image/top/arrow-white.svg') }}" alt="">
            </a>
            <a class="parking-link-btn" href="{{ route('parking') }}" target="_blank" rel="noopener noreferrer">
                <p>コインパーキングのご案内</p>
                <img class="icon" src="{{ asset('image/external-link-icon.svg') }}" alt="">
            </a>
        </div>
    </section>
@stop





@section('js')
    @vite('resources/js/animation.js')
@stop