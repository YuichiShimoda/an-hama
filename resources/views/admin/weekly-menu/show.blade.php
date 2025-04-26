@extends('adminlte::page')

@section('title', '週替り管理｜詳細')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/adminlte/weekly-menu.css') }}">
@stop

@section('content_header')
    <div class="tit-box">
        <h1>週替り管理｜詳細</h1>
<!--         <a href="{{ route('admin.weekly-menu.index') }}" class="back-btn">
            <p>一覧に戻る</p>
        </a> -->
    </div>
    <div class="desc-box">
        <p>説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。</p>
        <p>説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。</p>
        <p>説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。</p>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header text-white">
            <h3 class="card-title">{{ $weekly_menu->menu }}</h3>
        </div>
        <div class="card-body">
            <p><strong>提供開始日：</strong> {{ $weekly_menu->start_day }}</p>
            <p><strong>提供終了日：</strong> {{ $weekly_menu->end_day }}</p>
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