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
            <p><strong>期間：</strong>{{ $periods[$season_pasta->period] ?? $season_pasta->period }}</p>
            @php
                $thumbPath = asset('image/season-pasta/' . $season_pasta->dish);
            @endphp
            <p><strong>料理写真：</strong></p>
            <div class="img-box">
                <img class="img" src="{{ $thumbPath }}">
            </div>
            <p><strong>旬の食材：</strong>{{ $season_pasta->ingredient1 }} {{ $season_pasta->ingredient2 }}</p>
            <div class="period-box">
                <p class="tit">公開日時：</p>
                <p class="detail">{{ \Carbon\Carbon::parse($season_pasta->reservation_at)->format('Y年 n月 j日 H:i') }} ~ {{ \Carbon\Carbon::parse($season_pasta->expired_at)->format('Y年 n月 j日 H:i') }}</p>
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