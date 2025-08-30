@extends('adminlte::page')

@section('title', 'NEWS管理｜詳細')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/adminlte/press-release.css') }}">
@stop

@section('content_header')
    <div class="tit-box">
        <h1>NEWS管理<span>｜</span>詳細</h1>
<!--         <a href="{{ route('admin.press-release.index') }}" class="back-btn">
            <p>一覧に戻る</p>
        </a> -->
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header text-white">
            <h3 class="card-title">{{ $press_release->title }}</h3>
        </div>
        <div class="card-body">
            <div class="period-box">
                <p class="tit">表示期間</p>
                <p class="detail">{{ \Carbon\Carbon::parse($press_release->start)->format('Y年 n月 j日') }} ~ {{ \Carbon\Carbon::parse($press_release->end)->format('Y年 n月 j日') }}</p>
            </div>
            <hr>
            <p><strong>詳細情報：</strong></p>
            <div class="body-box bg-light rounded border">
                {!! nl2br(e($press_release->body)) !!}
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('admin.press-release.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> 一覧へ戻る
            </a>
            <a href="{{ route('admin.press-release.edit', $press_release->id) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> 編集
            </a>
        </div>
    </div>
@stop