@extends('adminlte::auth.auth-page', ['authType' => 'login'])

@section('title', 'パスワードリセット｜あんかけハマちゃん管理画面')

@php
    $passEmailUrl = View::getSection('password_email_url') ?? config('adminlte.password_email_url', 'password/email');

    if (config('adminlte.use_route_url', false)) {
        $passEmailUrl = $passEmailUrl ? route($passEmailUrl) : '';
    } else {
        $passEmailUrl = $passEmailUrl ? url($passEmailUrl) : '';
    }
@endphp

@section('auth_header', 'パスワードリセット')

@section('auth_body')

    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form class="pw-reset" action="{{ $passEmailUrl }}" method="post">
        @csrf

        {{-- Email field --}}
        <div class="input-group mb-3">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email') }}" placeholder="{{ __('adminlte::adminlte.email') }}" autofocus>

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    @if(Str::contains($message, 'required'))
                        <strong>必ず入力してください。</strong>
                    @else
                        <strong>正しいメールアドレスを入力してください。</strong>
                    @endif
                </span>
            @enderror
        </div>

        {{-- Send reset link button --}}
        <button type="submit" class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
            <span class="fas fa-share-square"></span>送信する</button>
    </form>

@stop



@section('auth_footer')
    <p class="my-0">
        <a href="{{ route('login') }}">ログインする</a>
    </p>
    <p class="my-0">
        <a href="{{ route('register') }}">
            {{ __('adminlte::adminlte.register_a_new_membership') }}
        </a>
    </p>
@stop