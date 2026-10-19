@extends('adminlte::page')

@section('title', '営業状態管理｜新規作成')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/adminlte/restaurant.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css" />
@stop

@section('content_header')
    <div class="tit-box">
        <h1>営業状態管理｜新規作成</h1>
        <a href="{{ route('admin.restaurant.index') }}" class="back-btn">
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
    <form action="{{ route('admin.restaurant.store') }}" method="POST">
        @csrf

        {{-- タイトル --}}
        <div class="d-block">
            <x-adminlte-input name="title" label="タイトル" placeholder="●●●●の営業について" value="{{ old('title') }}"/>
            <div class="form-note-box">
                <p>※ 30文字以内で入力してください。</p>
            </div>
        </div>

        {{-- 状態 --}}
        <div class="d-block">
            <x-adminlte-select name="category" label="状態">
                <option value="" disabled selected hidden>選択してください</option>
                <option value="準備中" {{ old('category') == '準備中' ? 'selected' : '' }}>準備中</option>
                <option value="営業中" {{ old('category') == '営業中' ? 'selected' : '' }}>営業中</option>
                <option value="営業終了" {{ old('category') == '営業終了' ? 'selected' : '' }}>営業終了</option>
                <option value="臨時休業" {{ old('category') == '臨時休業' ? 'selected' : '' }}>臨時休業</option>
                <option value="定休日" {{ old('category') == '定休日' ? 'selected' : '' }}>定休日</option>
                <option value="貸切" {{ old('category') == '貸切' ? 'selected' : '' }}>貸切</option>
            </x-adminlte-select>
        </div>

        @php
            $current_time = \Carbon\Carbon::now()->format('Y-m-d H:i');
            $default_end_time = \Carbon\Carbon::now()->endOfDay()->format('Y-m-d H:i');
        @endphp
        {{-- ラストオーダー --}}
        <div class="d-block period-box">
            <x-adminlte-input-date name="last_order_at" label="ラストオーダー"
                :config="[
                    'format' => 'YYYY-MM-DD HH:mm',
                    'minDate' => $current_time,
                    'defaultDate' => $default_end_time,
                    'display' => [
                        'keepOpen' => false,
                        'buttons' => [
                            'close' => true
                        ]
                    ]
                ]"
                value="{{ old('last_order_at', $data->last_order_at ?? '') }}">
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-info">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                </x-slot>
            </x-adminlte-input-date>
            <div class="form-note-box">
                <p>※ ーーーー</p>
                <p>※ ーーーー</p>
                <p>※ ーーーー</p>
            </div>
        </div>

        {{-- 閉店時間 --}}
        <div class="d-block period-box">
            <x-adminlte-input-date name="expired_at" label="閉店時間"
                :config="[
                    'format' => 'YYYY-MM-DD HH:mm',
                    'minDate' => $current_time,
                    'defaultDate' => $default_end_time,
                    'display' => [
                        'keepOpen' => false,
                        'buttons' => [
                            'close' => true
                        ]
                    ]
                ]"
                value="{{ old('expired_at', $data->expired_at ?? '') }}">
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-info">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                </x-slot>
            </x-adminlte-input-date>
            <div class="form-note-box">
                <p>※ ーーーー</p>
                <p>※ ーーーー</p>
                <p>※ ーーーー</p>
            </div>
        </div>


        {{-- メモ --}}
        <div class="d-block">
            <x-adminlte-textarea name="memo" label="メモ" placeholder="お知らせの詳細を入力してください。" rows="7">{{ old('memo') }}</x-adminlte-textarea>
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