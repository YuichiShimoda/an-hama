@extends('adminlte::page')

@section('title', '週替り管理｜編集')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/adminlte/weekly-menu.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css" />
@stop

@section('content_header')
    <div class="tit-box">
        <h1>週替り管理｜編集</h1>
        <a href="{{ route('admin.weekly-menu.index') }}" class="back-btn">
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
    <form action="{{ route('admin.weekly-menu.update', $weekly_menu->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- メニュー --}}
        <div class="d-block">
            <x-adminlte-input name="menu" label="メニュー" placeholder="ハンバーグ" value="{{ old('menu', $weekly_menu->menu) }}"/>
<!--             <div class="form-note-box">
                <p>※ 30文字以内で入力してください。</p>
            </div> -->
        </div>

        {{-- 提供期間 --}}
        <div class="d-block period-box">
            <x-adminlte-input-date name="start_day" label="提供開始日" :config="['format' => 'YYYY-MM-DD']" value="{{ old('start_day', $weekly_menu->start_day ?? '') }}">
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-info">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                </x-slot>
            </x-adminlte-input-date>
            <x-adminlte-input-date name="end_day" label="提供終了日" :config="['format' => 'YYYY-MM-DD']" value="{{ old('end_day', $weekly_menu->end_day ?? '') }}">
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-info">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                </x-slot>
            </x-adminlte-input-date>
        </div>

        {{-- 更新ボタン --}}
        <x-adminlte-button label="更新する" class="register-btn" type="submit"/>
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