@extends('adminlte::page')

@section('title', 'アナリティクス')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/adminlte/analytics.css') }}">
@stop

@section('content_header')
    <div class="tit-box">
        <h1>アナリティクス</h1>
<!--         <a href="{{ route('admin.news.index') }}" class="back-btn">
            <p>一覧に戻る</p>
        </a> -->
    </div>
    <div class="desc-box">
<!--         <p>説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。</p>
        <p>説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。</p>
        <p>説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。</p> -->
    </div>
@stop

@section('content')
    <iframe id=report_box src=https://lookerstudio.google.com/embed/reporting/a1da9941-bcc2-430b-b3f1-b398ecc2ec2f/page/p_h3abvhwb9c frameborder=0 style=display:block;width:100%;border:0; allowfullscreen></iframe>
@stop