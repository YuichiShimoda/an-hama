@extends('adminlte::page')

@section('title', 'お知らせ管理｜編集')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/adminlte/news.css') }}">
@stop

@section('content_header')
    <div class="tit-box">
        <h1>お知らせ管理｜編集</h1>
        <a href="{{ route('admin.news.index') }}" class="back-btn">
            <p>一覧に戻る</p>
        </a>
    </div>
    <div class="desc-box">
        <p>説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。</p>
        <p>説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。</p>
        <p>説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。</p>
    </div>
@stop

@section('content')
    <form action="{{ route('admin.news.update', $news->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- カテゴリ --}}
        <div class="d-block">
            <x-adminlte-select name="category" label="カテゴリ">
                <option value="" disabled selected hidden>選択してください</option>
                <option value="営業情報" {{ old('category', $news->category) == '営業情報' ? 'selected' : '' }}>営業情報</option>
                <option value="臨時休業" {{ old('category', $news->category) == '臨時休業' ? 'selected' : '' }}>臨時休業</option>
                <option value="お得情報" {{ old('category', $news->category) == 'お得情報' ? 'selected' : '' }}>お得情報</option>
                <option value="イベント" {{ old('category', $news->category) == 'イベント' ? 'selected' : '' }}>イベント</option>
                <option value="新サービス" {{ old('category', $news->category) == '新サービス' ? 'selected' : '' }}>新サービス</option>
                <option value="新メニュー" {{ old('category', $news->category) == '新メニュー' ? 'selected' : '' }}>新メニュー</option>
                <option value="期間限定" {{ old('category', $news->category) == '期間限定' ? 'selected' : '' }}>期間限定</option>
                <option value="お知らせ" {{ old('category', $news->category) == 'お知らせ' ? 'selected' : '' }}>お知らせ</option>
                <option value="その他" {{ old('category', $news->category) == 'その他' ? 'selected' : '' }}>その他</option>
            </x-adminlte-select>
        </div>

        {{-- タイトル --}}
        <div class="d-block">
            <x-adminlte-input name="title" label="タイトル" placeholder="●●●●の営業について" value="{{ old('title', $news->title) }}"/>
            <div class="form-note-box">
                <p>※ 30文字以内で入力してください。</p>
            </div>
        </div>

        {{-- 詳細情報 --}}
        <div class="d-block">
            <x-adminlte-textarea name="body" label="詳細情報" placeholder="お知らせの詳細を入力してください。" rows="7">{{ old('body', $news->body) }}</x-adminlte-textarea>
        </div>

        {{-- 更新ボタン --}}
        <x-adminlte-button label="更新する" class="register-btn" type="submit"/>
    </form>
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection