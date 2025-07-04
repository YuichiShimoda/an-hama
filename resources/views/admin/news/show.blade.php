@extends('adminlte::page')

@section('title', 'お知らせ管理｜詳細')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/adminlte/news.css') }}">
@stop

@section('content_header')
    <div class="tit-box">
        <h1>お知らせ管理｜詳細</h1>
<!--         <a href="{{ route('admin.news.index') }}" class="back-btn">
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
            <h3 class="card-title">{{ $news->title }}</h3>
        </div>
        <div class="card-body">
            <p><strong>カテゴリ：</strong> {{ $news->category }}</p>
            @if ($news->reservation_day == null)
                <p><strong>公開日：</strong> {{ $news->created_at->format('Y年 n月 j日') }}</p>
            @else
                <p><strong>公開日：</strong> {{ \Carbon\Carbon::parse($news->reservation_day)->format('Y年 n月 j日') }}</p>
            @endif
            <hr>
            <p><strong>詳細情報：</strong></p>
            <div class="body-box bg-light rounded border">
                {!! nl2br(e($news->body)) !!}
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> 一覧へ戻る
            </a>
            <a href="{{ route('admin.news.edit', $news->id) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> 編集
            </a>
        </div>
    </div>
@stop