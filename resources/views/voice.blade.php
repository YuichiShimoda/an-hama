@extends('layouts.viewer')
@section('title', 'アンケート｜あんかけハマちゃん')
@section('description', '名古屋の定番グルメ「 あんかけパスタ 」を楽しむなら、あんかけハマちゃんへ！スパイシーさに負けない“コク”のあるマイルドソースがやみつきに。安心・安全な料理をご提供します。')
@section('meta_tags')
    <meta name="robots" content="noindex, nofollow">
@stop

@section('css')
    <link href="{{ asset('/css/loading-other.css') }}" rel='stylesheet' type='text/css' media='all'>
    <link href="{{ asset('/css/mouse.css') }}" rel='stylesheet' type='text/css' media='all'>
    <link href="{{ asset('/css/common.css') }}" rel='stylesheet' type='text/css' media='all'>
    <link href="{{ asset('/css/voice.css') }}" rel='stylesheet' type='text/css' media='all'>
@stop



@section('content_loader')
@stop



@section('content_sidebar')
@stop




@section('content')
    <section id="first-view">
        <h1>アンケート</h1>
        <div class="desc-box">
            <p class="base">“あんかけハマちゃん”では、お客様からのお声を募集しております。</p>
            <p class="base">以下のフォームに必要事項を入力または選択の上、送信してください。</p>
            <p class="base">率直なご意見・ご感想をお待ちしております。</p>
            <p class="note">※ 匿名のアンケートになります。個人情報に関する内容はご入力されないようご注意ください。</p>
            <p class="note">※ このアンケートに対する当店からの回答などはございません。予めご了承ください。</p>
        </div>
    </section>

    @if (session('success'))
        <div class="wpcf7-response-success">送信されました。<br>貴重なご意見ありがとうございます。</div>
    @endif
    <section id="input-form">
        <form action="{{ route('voice.submit') }}" method="POST">
            @csrf

            <div class="input-box">
                <p class="mark-desc"><span class="mark">*</span>は必須項目</p>

                {{-- ニックネーム --}}
                <div class="each-input" style="display: none;">
                    <div class="input-tittle">
                        <div class="input-s-tittle">ニックネーム</div>
                        <div class="required">*</div>
                    </div>
                    <div class="input-part">
                        <input type="text" name="your-name" class="input-name" placeholder="ハマちゃん" value="{{ old('your-name') }}">
                        @error('your-name')
                            <span class="wpcf7-not-valid-tip">入力してください。</span>
                        @enderror
                    </div>
                </div>

                {{-- 性別 --}}
                <div class="each-input">
                    <div class="input-tittle">
                        <div class="input-s-tittle">性別</div>
                        <div class="required">*</div>
                    </div>
                    <div class="input-part">
                        <div class="select-box select-arrow">
                            <select name="your-sex" class="input-sex">
                                <option value="" disabled {{ old('your-sex') == '' ? 'selected' : '' }}></option>
                                @foreach (['男性','女性','その他'] as $sex)
                                    <option value="{{ $sex }}" {{ old('your-sex') == $sex ? 'selected' : '' }}>{{ $sex }}</option>
                                @endforeach
                            </select>
                            @error('your-sex')
                                <span class="wpcf7-not-valid-tip">選択してください。</span>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- 年齢 --}}
                <div class="each-input">
                    <div class="input-tittle">
                        <div class="input-s-tittle">年齢</div>
                        <div class="required">*</div>
                    </div>
                    <div class="input-part">
                        <div class="select-box select-arrow">
                            <select name="your-age" class="input-age">
                                <option value="" disabled {{ old('your-age') == '' ? 'selected' : '' }}></option>
                                @foreach (['10代','20代','30代','40代','50代','60代','70代','80代','90代以上'] as $age)
                                    <option value="{{ $age }}" {{ old('your-age') == $age ? 'selected' : '' }}>{{ $age }}</option>
                                @endforeach
                            </select>
                            @error('your-age')
                                <span class="wpcf7-not-valid-tip">選択してください。</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="line"></div>

                {{-- 来店日 --}}
                <div class="each-input">
                    <div class="input-tittle">
                        <div class="input-s-tittle">来店日</div>
                        <div class="required">*</div>
                    </div>
                    <div class="input-part">
                        <div class="select-box select-arrow">
                            <select name="your-day" class="input-day">
                                <option value="" disabled {{ old('your-day') == '' ? 'selected' : '' }}></option>
                                @foreach (['3日以内', '1週間以内', '1ヶ月以内', '1ヶ月以上'] as $day)
                                    <option value="{{ $day }}" {{ old('your-day') == $day ? 'selected' : '' }}>{{ $day }}</option>
                                @endforeach
                            </select>
                            @error('your-day')
                                <span class="wpcf7-not-valid-tip">選択してください。</span>
                            @enderror
                        </div>
                    </div>
                </div>

<!--                 {{-- 来店人数 --}}
                <div class="each-input">
                    <div class="input-tittle">
                        <div class="input-s-tittle">来店人数</div>
                        <div class="required">*</div>
                    </div>
                    <div class="input-part">
                        <div class="select-box select-arrow">
                            <select name="your-num" class="input-num">
                                <option value="" disabled {{ old('your-num') == '' ? 'selected' : '' }}></option>
                                @foreach (['1人','2人','3人','4人','5人以上'] as $num)
                                    <option value="{{ $num }}" {{ old('your-num') == $num ? 'selected' : '' }}>{{ $num }}</option>
                                @endforeach
                            </select>
                            @error('your-num')
                                <span class="wpcf7-not-valid-tip">選択してください。</span>
                            @enderror
                        </div>
                    </div>
                </div> -->

                {{-- 来店回数 --}}
                <div class="each-input">
                    <div class="input-tittle">
                        <div class="input-s-tittle">来店回数</div>
                        <div class="required">*</div>
                    </div>
                    <div class="input-part">
                        <div class="select-box select-arrow">
                            <select name="your-visit-num" class="input-visit-num">
                                <option value="" disabled {{ old('your-visit-num') == '' ? 'selected' : '' }}></option>
                                @foreach (['1回','2回','3回','それ以上'] as $visitNum)
                                    <option value="{{ $visitNum }}" {{ old('your-visit-num') == $visitNum ? 'selected' : '' }}>{{ $visitNum }}</option>
                                @endforeach
                            </select>
                            @error('your-visit-num')
                                <span class="wpcf7-not-valid-tip">選択してください。</span>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- 来店方法 --}}
                <div class="each-input">
                    <div class="input-tittle">
                        <div class="input-s-tittle">来店方法</div>
                        <div class="required">*</div>
                    </div>
                    <div class="input-part">
                        <div class="select-box select-arrow">
                            <select name="your-visit-how" class="input-visit-how">
                                <option value="" disabled {{ old('your-visit-how') == '' ? 'selected' : '' }}></option>
                                @foreach (['徒歩','自転車','車','電車','その他'] as $how)
                                    <option value="{{ $how }}" {{ old('your-visit-how') == $how ? 'selected' : '' }}>{{ $how }}</option>
                                @endforeach
                            </select>
                            @error('your-visit-how')
                                <span class="wpcf7-not-valid-tip">選択してください。</span>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- 知ったキッカケ --}}
                <div class="each-input">
                    <div class="input-tittle">
                        <div class="input-s-tittle">知ったキッカケ</div>
                        <div class="required">*</div>
                    </div>
                    <div class="input-part">
                        <div class="select-box select-arrow">
                            <select name="your-know" class="input-know">
                                <option value="" disabled {{ old('your-know') == '' ? 'selected' : '' }}></option>
                                @foreach (['紹介','看板','チラシ','ショップカード','WEB検索','WEBサイト（食べログ,ぐるなび等）','SNS（X,Instagram等）','その他'] as $know)
                                    <option value="{{ $know }}" {{ old('your-know') == $know ? 'selected' : '' }}>{{ $know }}</option>
                                @endforeach
                            </select>
                            @error('your-know')
                                <span class="wpcf7-not-valid-tip">選択してください。</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="line"></div>

                {{-- 各評価 --}}
                @foreach (['your-taste' => '味評価', 'your-service' => '接客評価', 'your-clean' => '清潔評価', 'your-interior' => '内装評価', 'your-overall' => '総合評価'] as $name => $label)
                    <div class="each-input">
                        <div class="input-tittle">
                            <div class="input-s-tittle">{{ $label }}</div>
                            <div class="required">*</div>
                        </div>
                        <div class="input-part">
                            <div class="select-box select-arrow">
                                <select name="{{ $name }}" class="input-{{ str_replace('your-', '', $name) }}">
                                    <option value="" disabled {{ old($name) == '' ? 'selected' : '' }}></option>
                                    @foreach (['★☆☆☆☆','★★☆☆☆','★★★☆☆','★★★★☆','★★★★★'] as $rating)
                                        <option value="{{ $rating }}" {{ old($name) == $rating ? 'selected' : '' }}>{{ $rating }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has($name))
                                    <span class="wpcf7-not-valid-tip">選択してください。</span>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- コメント --}}
                <div class="each-input">
                    <div class="input-tittle">
                        <div class="input-s-tittle">コメント</div>
                    </div>
                    <div class="input-part">
                        <textarea name="your-request" class="input-request" placeholder="ご意見・ご感想をご入力ください。"></textarea>
                    </div>
                </div>
            </div>
            {{-- 送信ボタン --}}
            <div class="btn-box">
                <button type="submit" class="contact-button">送信する</button>
            </div>
            @if ($errors->any())
                <div class="wpcf7-response-output">入力内容に問題があります。確認して再度お試しください。</div>
            @endif
        </form>
    </section>
@stop





@section('js')
    @vite('resources/js/voice.js')
@stop