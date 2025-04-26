@extends('adminlte::master')

@php
    $authType = $authType ?? 'login';
    $dashboardUrl = View::getSection('dashboard_url') ?? config('adminlte.dashboard_url', 'home');

    if (config('adminlte.use_route_url', false)) {
        $dashboardUrl = $dashboardUrl ? route($dashboardUrl) : '';
    } else {
        $dashboardUrl = $dashboardUrl ? url($dashboardUrl) : '';
    }

    $bodyClasses = "{$authType}-page";

    if (! empty(config('adminlte.layout_dark_mode', null))) {
        $bodyClasses .= ' dark-mode';
    }
@endphp

@section('adminlte_css')
    @stack('css')
    @yield('css')
    <link href="{{ asset('/css/adminlte/base.css') }}" rel='stylesheet' type='text/css' media='all'>
@stop

@section('classes_body'){{ $bodyClasses }}@stop

@section('body')
    <div class="{{ $authType }}-box">

        {{-- Logo --}}
        <div class="{{ $authType }}-logo">
            <a href="{{ $dashboardUrl }}">
                <img class="logo" src="{{ asset('image/top/logo.svg') }}" alt="">
            </a>
        </div>

        {{-- Card Box --}}
        <div class="card {{ config('adminlte.classes_auth_card', 'card-outline card-primary') }}">

            {{-- Card Header --}}
            @hasSection('auth_header')
                <div class="card-header {{ config('adminlte.classes_auth_header', '') }}">
                    <h3 class="card-title float-none text-center">
                        @yield('auth_header')
                    </h3>
                </div>
            @endif

            {{-- Card Body --}}
            <div class="card-body {{ $authType }}-card-body {{ config('adminlte.classes_auth_body', '') }}">
                @yield('auth_body')
            </div>

            {{-- Card Footer --}}
            @hasSection('auth_footer')
                <div class="card-footer {{ config('adminlte.classes_auth_footer', '') }}">
                    @yield('auth_footer')
                </div>
            @endif

        </div>

    </div>
    <footer class="footer-box">
        <div class="copyright-box">
            <div class="corporate-box">
                <a class="link-box" href="https://grow-no1.com" target="_blank" rel="noopener noreferrer">
                    <img class="logo" src="{{ asset('image/corporate-logo.svg') }}" alt="">
                </a>
                <div class="invoice-box">
                    <p class="tit">登録番号：</p>
                    <p class="num">T2180001104004</p>
                </div>
            </div>
            <p class="copyright">
                <span>©</span>
                <?php
                    $currentYear = date('Y');
                    if ($currentYear == 2025) {
                        echo "2025 - grow KK. All rights reserved.";
                    } else {
                        echo "2025 - $currentYear grow KK. All rights reserved.";
                    }
                ?>
            </p>
        </div>
    </footer>
@stop

@section('adminlte_js')
    @stack('js')
    @yield('js')
@stop
