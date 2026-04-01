@extends('adminlte::page')

@section('title', '動画管理')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/adminlte/movie.css') }}">
    <link rel="stylesheet" href="{{ asset('css/adminlte/index-option.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@endsection

@section('classes_body', 'page-index')

@section('content_header')
    @if(session('success'))
        <x-adminlte-alert theme="success" title="{{ session('success') }}"></x-adminlte-alert>
    @endif
    @if(isset($first_movie_error))
        <x-adminlte-alert theme="danger" title="{{ $first_movie_error }}"></x-adminlte-alert>
    @endif

    <div class="tit-box">
        <h1>動画管理</h1>
        <a href="{{ route('admin.movie.create') }}" class="create-btn">
            <p>新規作成</p>
        </a>
    </div>
<!--     <div class="desc-box">
        <p></p>
        <p></p>
        <p></p>
    </div> -->
@endsection

@section('content')
    {{-- テーブル表示 --}}
    @if ($movie->isEmpty())
        <p class="table-empty-msg">表示するデータがありません。</p>
    @else
        <p class="visible-tit">▼ 表示動画 ▼
        <x-adminlte-datatable id="visibleTable" :heads="['タイトル', '動画', '有効期限', '操作']" striped hoverable bordered compressed>
            @foreach($visible_movie as $visible_movie_ele)
                <tr>
                    <td>{{ $visible_movie_ele->title }}</td>
                    <td>
                        <div class="movie-box modal__open-btn" data-id="{{ $visible_movie_ele->id }}">
                            <img class="movie-icon" src="{{ asset('image/adminlte/movie/movie-icon.svg') }}" alt="">
                        </div>
                    </td>
                    <!-- <td>{{ $visible_movie_ele->conversion_type }}</td> -->
                    @if ($visible_movie_ele->expired_at)
                        @php
                            $expiredAt = \Carbon\Carbon::parse($visible_movie_ele->expired_at);
                            $isExpired = $expiredAt->isPast();
                        @endphp
                        <td class="{{ $isExpired ? 'is-error' : '' }}">{{ $expiredAt->format('Y年 n月 j日') }}</td>
                    @else
                        <td>---</td>
                    @endif
                    <td>
                        <a href="{{ route('admin.movie.edit', $visible_movie_ele->id) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.movie.firstSet', $visible_movie_ele->id) }}" method="POST" @class(['d-inline first-set-btn', 'is-first' => $visible_movie_ele->first_movie])>
                            @csrf
                            <button class="btn btn-xs btn-danger first-set-btn" type="submit">
                                <p>{{ $visible_movie_ele->first_movie ? '最初に再生中' : '最初に再生' }}</p>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </x-adminlte-datatable>
        <div class="note">※ 有効期限を過ぎている動画は、HPで表示されません。</div>
        <div class="border-line"></div>
        <x-adminlte-datatable id="movieTable" :heads="['タイトル', '動画', '有効期限', '操作']" striped hoverable bordered compressed>
            @foreach($movie as $movie_ele)
                <tr>
                    <td>{{ $movie_ele->title }}</td>
                    <td>
                        <div class="movie-box modal__open-btn" data-id="{{ $movie_ele->id }}">
                            <img class="movie-icon" src="{{ asset('image/adminlte/movie/movie-icon.svg') }}" alt="">
                        </div>
                    </td>
                    <!-- <td>{{ $movie_ele->conversion_type }}</td> -->
                    @if ($movie_ele->expired_at)
                        @php
                            $expiredAt = \Carbon\Carbon::parse($movie_ele->expired_at);
                            $isExpired = $expiredAt->isPast();
                        @endphp
                        <td class="{{ $isExpired ? 'is-error' : '' }}">{{ $expiredAt->format('Y年 n月 j日') }}</td>
                    @else
                        <td>---</td>
                    @endif
                    <td>
                        <a href="{{ route('admin.movie.show', $movie_ele->id) }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.movie.edit', $movie_ele->id) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.movie.destroy', $movie_ele->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-xs btn-danger delete-btn" type="submit">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </x-adminlte-datatable>
        <div id="individual-modal" class="modal">
            <div class="md-overlay basic-hover"></div>
            <div class="md-contents">
                <div class="md-inner basic-hover">
                    <video class="answer-movie" src="" controls></video>
                </div>
            </div>
            <button class="modal-close-btn js-close-modal">
                <span>CLOSE</span>
            </button>
        </div>
    @endif
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- 削除確認用スクリプト --}}
    <script>
        $(window).on('load', function () {
            setTimeout(function() {
                if ($.fn.DataTable.isDataTable('#visibleTable') || $.fn.DataTable.isDataTable('#movieTable')) {
                    $('#visibleTable').DataTable().destroy();
                    $('#movieTable').DataTable().destroy();
                }
                // const visibleTable = $('#visibleTable').DataTable({
                //     paging: false,
                //     searching: false,
                //     info: false,
                //     lengthChange: false,
                //     ordering: false
                // });
                const table = $('#movieTable').DataTable({
                    "order": [[0, 'desc']],
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/ja.json'
                    },
                    lengthMenu: [[10, 30, 50], [10, 30, 50]]
                });
            }, 100);

            $('.delete-btn').on('click', function (e) {
                e.preventDefault();
                const $form = $(this).closest('form');
                Swal.fire({
                    title: '削除してよろしいでしょうか？',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#007bff',
                    cancelButtonColor: '#999',
                    confirmButtonText: 'OK',
                    cancelButtonText: 'キャンセル',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $form.submit();
                    }
                });
            });

            $('.first-set-btn').on('click', function (e) {
                e.preventDefault();
                const $form = $(this).closest('form');
                Swal.fire({
                    title: '変更してよろしいでしょうか？',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#007bff',
                    cancelButtonColor: '#999',
                    confirmButtonText: 'OK',
                    cancelButtonText: 'キャンセル',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $form.submit();
                    }
                });
            });
        });
    </script>
    <script>
        const movieDetails = @json($movie->keyBy('id'));
        $(".modal__open-btn").each(function() {
            $(this).on('click', function(e) {
                e.preventDefault();
                const movieId = $(this).data('id');
                const movie = movieDetails[movieId];
                console.log(movieId);
                console.log(movie);
                if (movie) {
                    const movieBasePath = "{{ asset('movie/uploader') }}/";
                    console.log(movieBasePath + movie.filename + '.mp4');
                    $('.answer-movie').attr('src', movieBasePath + movie.filename + '.mp4');
                }
                $("#individual-modal").addClass('is-active');
            });
        });
        $(".modal-close-btn").click (function() {
            $("#individual-modal").removeClass('is-active');
        });
        $(".md-overlay").click (function() {
            $("#individual-modal").removeClass('is-active');
        });
    </script>
@endsection