@extends('adminlte::page')

@section('title', '週替りトッピング管理｜詳細')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/adminlte/weekly-menu.css') }}">
@stop

@section('content_header')
    <div class="tit-box">
        <h1>週替りトッピング管理<span>｜</span>詳細</h1>
<!--         <a href="{{ route('admin.weekly-menu.index') }}" class="back-btn">
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
            <h3 class="card-title">{{ $weekly_menu->menu }}</h3>
        </div>
        <div class="card-body">
            <div class="period-box">
                <p class="tit">ハマちゃん週替りトッピング情報公開期間</p>
                <p class="detail">{{ \Carbon\Carbon::parse($weekly_menu->start_day)->subWeek()->format('Y年 n月 j日') }} ~ {{ \Carbon\Carbon::parse($weekly_menu->end_day)->format('Y年 n月 j日') }}</p>
            </div>
            <div class="period-box">
                <p class="tit">ハマちゃん週替りトッピング提供期間</p>
                <p class="detail">{{ \Carbon\Carbon::parse($weekly_menu->start_day)->format('Y年 n月 j日') }} ~ {{ \Carbon\Carbon::parse($weekly_menu->end_day)->format('Y年 n月 j日') }}</p>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('admin.weekly-menu.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> 一覧へ戻る
            </a>
            <a href="{{ route('admin.weekly-menu.edit', $weekly_menu->id) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> 編集
            </a>
        </div>
    </div>
@stop