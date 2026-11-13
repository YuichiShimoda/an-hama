@extends('adminlte::page')

@section('title', '季節のつけかけパスタ管理｜詳細')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/adminlte/season-pasta.css') }}">
@stop

@section('content_header')
    <div class="tit-box show-page" style="position: relative;">
        <h1>季節のつけかけパスタ管理<span>｜</span>詳細</h1>
        <div class="date-box">
            <p class="created-at">新規作成日時：{{ $season_pasta->created_at->format('Y-m-d H:i') }}</p>
            <p class="updated-at">更新日時：{{ $season_pasta->updated_at->format('Y-m-d H:i') }}</p>
        </div>
<!--         <a href="{{ route('admin.season-pasta.index') }}" class="back-btn">
            <p>一覧に戻る</p>
        </a> -->
    </div>
<!--     <div class="desc-box">
        <p>説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。</p>
        <p>説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。</p>
        <p>説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。</p>
    </div> -->
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="period-box">
                <p class="tit">公開日時：</p>
                <p class="detail">{{ \Carbon\Carbon::parse($season_pasta->reservation_at)->format('Y年 n月 j日 H:i') }} ~ {{ \Carbon\Carbon::parse($season_pasta->expired_at)->format('Y年 n月 j日 H:i') }}</p>
            </div>

            <div id="season-show" style="background-image: url('{{ asset('image/adminlte/season-pasta/season-bg_' . $season_pasta->period . '.webp') }}');">
                <div class="content-box">
                    <div class="main-box">
                        <div class="left-box">
                            <img class="pasta-line" src="{{ asset('image/season/pasta-line.svg') }}" alt="">
                            <img class="board" src="{{ asset('image/season/board.svg') }}" alt="">
                            <div class="illust-box">
                                <img class="plate-icon" src="{{ asset('image/season/plate-icon.svg') }}" alt="">
                                <img class="en-msg" src="{{ asset('image/season/en-msg.svg') }}" alt="">
                            </div>
                            <div class="label-box">
                                <img class="two-month" src="{{ asset('image/season/period' . $season_pasta->period . '.svg') }}" alt="">
                            </div>
                            <img class="label-bg" src="{{ asset('image/season/label-bg.webp') }}" alt="">
                        </div>
                        <div class="right-box">
                            <div class="img-show-box">
                                <img class="dish" src="{{ asset('image/season-pasta/' . $season_pasta->dish) }}" alt="">
                            </div>
                        </div>
                        <img class="jp-msg" src="{{ asset('image/season/jp-msg.svg') }}" alt="">
                    </div>
                    <div class="desc-box">
                        <h2 class="ingredient">旬の食材　：　「 {{ $season_pasta->ingredient1 }} 」「 {{ $season_pasta->ingredient2 }} 」</h2>
                        <p v-if="comment" class="comment">{!! nl2br(e($season_pasta->comment)) !!}</p>
                        <div class="info-admin-box">
                            <div class="tit-box">
                                <div class="period-box">
                                    @php
                                        $periods = [
                                            '1-2'   => '1月,2月',
                                            '3-4'   => '3月,4月',
                                            '5-6'   => '5月,6月',
                                            '7-8'   => '7月,8月',
                                            '9-10'  => '9月,10月',
                                            '11-12' => '11月,12月',
                                        ];
                                    @endphp
                                    <p>{{ $periods[$season_pasta->period] ?? '' }}月限定</p>
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
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('admin.season-pasta.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> 一覧へ戻る
            </a>
            <a href="{{ route('admin.season-pasta.edit', $season_pasta->id) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> 編集
            </a>
        </div>
    </div>
@stop