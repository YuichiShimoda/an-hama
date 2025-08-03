@extends('adminlte::page')

@section('title', 'PR管理｜編集')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/adminlte/press-release.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css" />
@stop

@section('content_header')
    <div class="tit-box">
        <h1>PR管理<span>｜</span>編集</h1>
        <a href="{{ route('admin.press-release.index') }}" class="back-btn">
            <p>一覧に戻る</p>
        </a>
    </div>
@stop

@section('content')
    <form action="{{ route('admin.press-release.update', $press_release->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- タイトル --}}
        <div class="d-block">
            <x-adminlte-input name="title" label="タイトル" placeholder="●●のお知らせ" value="{{ old('title', $press_release->title) }}"/>
<!--             <div class="form-note-box">
                <p>※ 30文字以内で入力してください。</p>
            </div> -->
        </div>

        {{-- 詳細情報 --}}
        <div class="d-block">
            <x-adminlte-textarea name="body" label="詳細情報" placeholder="詳細情報を入力してください。" rows="7">{{ old('body', $press_release->body) }}</x-adminlte-textarea>
        </div>

        {{-- 表示期間 --}}
        <div class="d-block period-box">
            <x-adminlte-input-date name="start" label="表示期間" :config="['format' => 'YYYY-MM-DD']" value="{{ old('start', $press_release->start ?? '') }}">
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-info">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                </x-slot>
            </x-adminlte-input-date>
            <div class="wavy-line">～</div>
            <x-adminlte-input-date name="end" label="表示終了日" :config="['format' => 'YYYY-MM-DD']" value="{{ old('end', $press_release->end ?? '') }}">
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