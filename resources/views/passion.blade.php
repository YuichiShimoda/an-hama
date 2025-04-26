@extends('layouts.viewer')
@section('title', 'こだわり｜あんかけハマちゃん')
@section('description', '名古屋の定番グルメ「 あんかけパスタ 」を楽しむなら、あんかけハマちゃんへ！スパイシーさに負けない“コク”のあるマイルドソースがやみつきに。安心・安全な料理をご提供します。')
@section('meta_tags')
@stop

@section('css')
    <link href="{{ asset('/css/loading-other.css') }}" rel='stylesheet' type='text/css' media='all'>
    <link href="{{ asset('/css/mouse.css') }}" rel='stylesheet' type='text/css' media='all'>
    <link href="{{ asset('/css/common.css') }}" rel='stylesheet' type='text/css' media='all'>
    <link href="{{ asset('/css/passion-sp.css') }}" rel='stylesheet' type='text/css' media='all and (max-width: 700px)'>
    <link href="{{ asset('/css/passion.css') }}" rel='stylesheet' type='text/css' media='all and (min-width: 700px)'>
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
        <h1>こだわり</h1>
        <div class="desc-box">
            <p>あんかけスパゲッティは、とろみのあるコショウの風味が強いスパイシーな“あん”が“極太パスタ”に絡みつく独特の食感が特徴です。</p>
            <p>この風味と食感は「 パスタ ＝ イタリア料理 」という概念も相まって、馴染みの薄い人には好みが分かれやすいのも事実です。</p>
            <p>あんかけハマちゃんは、家庭料理にもパスタが浸透した時代だからこそ、独自の旨味コントロールでスパイシーが際立つ伝統の味をマイルドかつ現代的に再構築し、一般的なパスタ好きも魅了する新たな“あんかけパスタ”を提供いたします。</p>
        </div>
        <div class="nav-box">
            <a href="#sauce">ソース</a>
            <a href="#pasta">パスタ</a>
            <a href="#pepper">コショウ</a>
            <a href="#ingredients">食材</a>
            <a href="#interior">空間</a>
        </div>
    </section>

    <section id="sauce">
        <h2>旨味たっぷり、ほどよい辛さ<br>とろ～りマイルドソース</h2>
        <div class="content-box">
            <div class="bg-img-box">
                <img class="txt" src="{{ asset('image/passion/love-cooking.svg') }}" alt="">
                <img class="img" src="{{ asset('image/passion/cooking-equipment.svg') }}" alt="">
            </div>
            <div class="left-box">
                <div class="main">
                    <img src="{{ asset('image/passion/sauce-left1.webp') }}" alt="">
                    <div class="overlay"></div>
                </div>
                <div class="sub">
                    <img src="{{ asset('image/passion/sauce-left2.webp') }}" alt="">
                    <div class="overlay"></div>
                </div>
            </div>
            <div class="right-box">
                <div class="txt1-box">
                    <p>“あん”となるソースは、甘味・塩味・酸味・苦味・旨味の五味のバランスを食材選定から調理に至るまで時間をかけて丁寧におこない、香辛料に引っ張られてしまう刺激だけの味ではなく、スパイシーさに負けない奥深い“コク”を重視しています。</p>
                    <p>食材の持つ栄養素と旨味を最大限に引き出すことは勿論、栄養学の見地から美容への貢献まで考慮したバランスを独自に調整しています。</p>
                </div>
                <div class="img-box">
                    <div class="left">
                        <img src="{{ asset('image/passion/sauce-right1.webp') }}" alt="">
                        <div class="overlay"></div>
                    </div>
                    <div class="right">
                        <img src="{{ asset('image/passion/sauce-right2.webp') }}" alt="">
                        <div class="overlay"></div>
                    </div>
                </div>
                <div class="txt2-box">
                    <p>たくさんのナチュラルフードで構成されたカラダに優しいソース</p>
                    <p>洗練された“コク”でココロを温めてください</p>
                </div>
            </div>
        </div>
    </section>

    <section id="pasta">
        <h2>もちもち、ぷりぷり<br>心地よい歯ごたえ</h2>
        <div class="content-box">
            <div class="bg-img-box">
                <img src="{{ asset('image/passion/pasta-on-fork.svg') }}" alt="">
            </div>
            <div class="top-box">
                <div class="txt-box">
                    <p>パスタは、デュラム小麦を粗挽きした粉を使用し、柔軟で弾力性のあるコシの強い食感が特徴の極太パスタです。</p>
                    <p>茹でたパスタには、健康と“コク”を意識した独自の下処理をおこない、お客様に提供する直前に油通しをします。</p>
                    <p>脂肪酸にも注意したオリジナルの油調合は、パスタに絡むソースとの乳化で料理の味と食感が大きく向上します。</p>
                </div>
                <div class="img-box">
                    <div class="with-pasta">
                        <img src="{{ asset('image/passion/pasta-right.webp') }}" alt="">
                        <div class="overlay"></div>
                    </div>
                    <div class="v-txt-box">
                        <p>パスタとソースの特性に合わせて</p>
                        <p>しっかり絡むように設計</p>
                    </div>
                </div>
            </div>
            <div class="bottom-box">
                <div class="img-box">
                    <div class="fryer">
                        <img src="{{ asset('image/passion/pasta-left2.webp') }}" alt="">
                        <div class="overlay"></div>
                    </div>
                    <div class="v-txt-box">
                        <p>食感と風味を引き出す油通し</p>
                    </div>
                </div>
                <div class="txt-box">
                    <p>パスタの量は、4サイズ（ 200g / 300g / 400g / 600g ）</p>
                    <p>気分や体調に合わせてお選びください</p>
                </div>
            </div>
        </div>
    </section>

    <section id="pepper">
        <h2>味の邪魔をしない<br>現代的なコショウの配合</h2>
        <div class="content-box">
            <div class="bg-img-box">
                <div class="outside-box">
                    <img src="{{ asset('image/passion/mill-top.svg') }}" alt="">
                    <div class="inside-box">
                        <img src="{{ asset('image/passion/mill-bottom.svg') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="left-img">
                <img src="{{ asset('image/passion/pepper-left.webp') }}" alt="">
                <div class="overlay"></div>
            </div>
            <div class="center-box">
                <div class="txt-box">
                    <p>あんかけスパゲティが開発された1960年代は、現在とは時代背景が異なっており、強いコショウのスパイス感は料理の独創性と当時のお客様のニーズには必要な要素でした。</p>
                    <p>あんかけハマちゃんは、伝統的なスパイス感を数種類のコショウをブレンドし踏襲しつつ、より現代的にコショウの持つ消化促進、血行促進、抗酸化作用などの様々な健康効果をソースに付加するとともに味の奥行き感を意識したマイルドな配合に仕上げました。</p>
                </div>
                <div class="center-img">
                    <img src="{{ asset('image/passion/pepper-center.webp') }}" alt="">
                    <div class="overlay"></div>
                </div>
            </div>
            <div class="right-img">
                <img src="{{ asset('image/passion/pepper-right.webp') }}" alt="">
                <div class="overlay"></div>
            </div>
        </div>
    </section>

    <section id="ingredients">
        <h2>厳選された食材<br>美味しいを支える</h2>
        <div class="content-box">
            <div class="left-box">
                <div class="img-box">
                    <div class="base-box">
                        <div class="green-pepper-box">
                            <img class="green-pepper" src="{{ asset('image/passion/food/green-pepper.webp') }}" alt="">
                            <div class="overlay"></div>
                        </div>
                        <div class="egg-box">
                            <img class="egg" src="{{ asset('image/passion/food/egg.webp') }}" alt="">
                        </div>
                    </div>
                    <div class="tomato-box">
                        <img class="tomato" src="{{ asset('image/passion/food/tomato.webp') }}" alt="">
                    </div>
                    <div class="carrot-box">
                        <img class="carrot" src="{{ asset('image/passion/food/carrot.webp') }}" alt="">
                    </div>
                </div>
                <div class="txt-box">
                    <p>食の安全が叫ばれる昨今、使用する食材は仕入れから保管、調理に至るまで安心と安全を確保することは義務です。</p>
                    <p>あんかけハマちゃんは、オリジナルの味を構成する要素は、すべて食材選定から始まると考え、地元食材から地方食材、独自ルートの特別食材まで“美味しい”の素となる食材を一つ一つ丁寧に厳選しています。</p>
                </div>
            </div>
            <div class="right-box">
                <div class="img-box">
                    <div class="base-box">
                        <div class="corn-box">
                            <img class="corn" src="{{ asset('image/passion/food/corn.webp') }}" alt="">
                        </div>
                        <div class="vegetable-box">
                            <img class="vegetable" src="{{ asset('image/passion/food/vegetable.webp') }}" alt="">
                            <div class="overlay"></div>
                        </div>
                        <div class="spinach-box">
                            <img class="spinach" src="{{ asset('image/passion/food/spinach.webp') }}" alt="">
                            <div class="overlay"></div>
                        </div>
                    </div>
                    <div class="onion-box">
                        <img class="onion" src="{{ asset('image/passion/food/onion.webp') }}" alt="">
                    </div>
                    <div class="wiener-box">
                        <img class="wiener" src="{{ asset('image/passion/food/wiener.webp') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="interior">
        <h2>明るさと美しさに包まれた心地よい空間</h2>
        <div class="content-box">
            <div class="bg-left-img-box">
                <img src="{{ asset('image/passion/restaurant.svg') }}" alt="">
            </div>
            <div class="bg-right-img-box">
                <img src="{{ asset('image/passion/light.svg') }}" alt="">
            </div>
            <div class="left-box">
                <div class="img-box">
                    <div class="v-txt-box">
                        <p>カウンター<span class="v-num5">5</span>席、テーブル<span class="v-num12">12</span>席</p>
                        <p>お一人様でも気軽に入れる小さなお店</p>
                    </div>
                    <div class="interior1-box">
                        <img src="{{ asset('image/passion/shop-center.webp') }}" alt="">
                        <div class="overlay"></div>
                    </div>
                </div>
                <div class="txt-box">
                    <p>店内はソフトな色合いながらも、さまざまな色が絶妙に組み合わさることで、地中海のような温かみある雰囲気を感じさせます。</p>
                    <p>カウンター席もテーブル席もお客様の目に触れる細部に至るまで食事の時間を明るく彩る工夫があります。</p>
                    <p>老若男女、キレイな空間でイマドキの“名古屋を感じるパスタ”をお楽しみください。</p>
                </div>
                <div class="interior2-box">
                    <img src="{{ asset('image/passion/shop-left.webp') }}" alt="">
                    <div class="overlay"></div>
                </div>
            </div>
            <div class="right-box">
                <div class="interior3-box">
                    <img src="{{ asset('image/passion/shop-right1.webp') }}" alt="">
                    <div class="overlay"></div>
                </div>
                <div class="interior4-box">
                    <img src="{{ asset('image/passion/shop-right2.webp') }}" alt="">
                    <div class="overlay"></div>
                </div>
                <div class="interior5-box">
                    <img src="{{ asset('image/passion/shop-right3.webp') }}" alt="">
                    <div class="overlay"></div>
                </div>
            </div>
        </div>
    </section>

    <section id="gallery">
        <div class="img-box">
            <img src="{{ asset('image/passion/scene1.webp') }}" alt="">
            <div class="overlay click-canvas"></div>
        </div>
        <div class="img-box">
            <img src="{{ asset('image/passion/scene2.webp') }}" alt="">
            <div class="overlay click-canvas"></div>
        </div>
    </section>
@stop





@section('js')
    @vite('resources/js/passion.js')
@stop