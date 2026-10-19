@extends('adminlte::page')

@section('title', '営業状態管理｜詳細')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/adminlte/restaurant.css') }}">
@stop

@section('content_header')
    <div class="tit-box">
        <h1>営業状態管理｜詳細</h1>
<!--         <a href="{{ route('admin.restaurant.index') }}" class="back-btn">
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
        <div class="card-header text-white">
            <h3 class="card-title">{{ $restaurant->title }}</h3>
        </div>
        <div class="card-body">
            <p><strong>カテゴリ：</strong> {{ $restaurant->category }}</p>
            @if ($restaurant->reservation_day == null)
                <p><strong>公開日：</strong> {{ $restaurant->created_at->format('Y年 n月 j日') }}</p>
            @else
                <p><strong>公開日：</strong> {{ \Carbon\Carbon::parse($restaurant->reservation_day)->format('Y年 n月 j日') }}</p>
            @endif
            <hr>
            <p><strong>詳細情報：</strong></p>
            <div class="body-box bg-light rounded border">
                {!! nl2br(e($restaurant->body)) !!}
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('admin.restaurant.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> 一覧へ戻る
            </a>
            <a href="{{ route('admin.restaurant.edit', $restaurant->id) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> 編集
            </a>
        </div>
    </div>
@stop