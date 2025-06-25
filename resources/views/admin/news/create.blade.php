@extends('adminlte::page')

@section('title', 'お知らせ管理｜新規作成')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/adminlte/news.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css" />
@stop

@section('content_header')
    <div class="tit-box">
        <h1>お知らせ管理｜新規作成</h1>
        <a href="{{ route('admin.news.index') }}" class="back-btn">
            <p>一覧に戻る</p>
        </a>
    </div>
<!--     <div class="desc-box">
        <p>説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。</p>
        <p>説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。</p>
        <p>説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。</p>
    </div> -->
@stop

@section('content')
    <form action="{{ route('admin.news.store') }}" method="POST">
        @csrf

        {{-- カテゴリ --}}
        <div class="d-block">
            <x-adminlte-select name="category" label="カテゴリ">
                <option value="" disabled selected hidden>選択してください</option>
                <option value="営業情報" {{ old('category') == '営業情報' ? 'selected' : '' }}>営業情報</option>
                <option value="臨時休業" {{ old('category') == '臨時休業' ? 'selected' : '' }}>臨時休業</option>
                <option value="お得情報" {{ old('category') == 'お得情報' ? 'selected' : '' }}>お得情報</option>
                <option value="イベント" {{ old('category') == 'イベント' ? 'selected' : '' }}>イベント</option>
                <option value="新サービス" {{ old('category') == '新サービス' ? 'selected' : '' }}>新サービス</option>
                <option value="新メニュー" {{ old('category') == '新メニュー' ? 'selected' : '' }}>新メニュー</option>
                <option value="期間限定" {{ old('category') == '期間限定' ? 'selected' : '' }}>期間限定</option>
                <option value="お知らせ" {{ old('category') == 'お知らせ' ? 'selected' : '' }}>お知らせ</option>
                <option value="その他" {{ old('category') == 'その他' ? 'selected' : '' }}>その他</option>
            </x-adminlte-select>
        </div>

        {{-- タイトル --}}
        <div class="d-block">
            <x-adminlte-input name="title" label="タイトル" placeholder="●●●●の営業について" value="{{ old('title') }}"/>
            <div class="form-note-box">
                <p>※ 30文字以内で入力してください。</p>
            </div>
        </div>

        {{-- 詳細情報 --}}
        <div class="d-block">
            <x-adminlte-textarea name="body" label="詳細情報" placeholder="お知らせの詳細を入力してください。" rows="7">{{ old('body') }}</x-adminlte-textarea>
        </div>

        @php
            $tomorrow = \Carbon\Carbon::tomorrow()->format('Y-m-d');
        @endphp
        {{-- 公開予約日 --}}
        <div class="d-block period-box">
            <x-adminlte-input-date name="reservation_day" label="公開予約日" :config="['format' => 'YYYY-MM-DD', 'minDate' => $tomorrow]" value="{{ old('reservation_day') }}">
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-info">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                </x-slot>
            </x-adminlte-input-date>
            <div class="form-note-box">
                <p>※ 公開予定日を設定することで、その日以降にホームページで情報が自動的に公開されます。公開予定日になるまでは、ホームページには表示されません。</p>
            </div>
        </div>

        {{-- 登録ボタン --}}
        <x-adminlte-button label="登録する" class="register-btn" type="submit"/>
    </form>
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/locale/ja.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js"></script>
    <script>
        moment.locale('ja');
    </script>
@endsection