@extends('adminlte::page')

@section('title', '動画管理')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/adminlte/video.css') }}">
    <link rel="stylesheet" href="{{ asset('css/adminlte/index-option.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@endsection

@section('classes_body', 'page-index')

@section('content_header')
    @if(session('success'))
        <x-adminlte-alert theme="success" title="{{ session('success') }}"></x-adminlte-alert>
    @endif
    @if(isset($first_video_error))
        <x-adminlte-alert theme="danger" title="{{ $first_video_error }}"></x-adminlte-alert>
    @endif

    <div class="tit-box">
        <h1>動画管理</h1>
        <a href="{{ route('admin.video.create') }}" class="create-btn">
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
    @if ($video->isEmpty())
        <p class="table-empty-msg">表示するデータがありません。</p>
    @else
        <p class="visible-tit">▼ スタンバイ / 表示動画一覧 ▼</p>
        <x-adminlte-datatable id="visibleTable" :heads="['タイトル', '動画', '公開終了日時', '操作']" striped hoverable bordered compressed>
            @foreach($visible_video as $visible_video_ele)
                <tr>
                    <td>{{ $visible_video_ele->title }}</td>
                    <td>
                        <div class="video-box modal__open-btn" data-id="{{ $visible_video_ele->id }}">
                            <img class="video-icon" src="{{ asset('image/adminlte/video/video-icon.svg') }}" alt="">
                        </div>
                    </td>
                    <!-- <td>{{ $visible_video_ele->conversion_type }}</td> -->
                    @if ($visible_video_ele->expired_at)
                        @php
                            $expiredAt = \Carbon\Carbon::parse($visible_video_ele->expired_at);
                            $isExpired = $expiredAt->isPast();
                        @endphp
                        <td class="{{ $isExpired ? 'is-error' : '' }}">{{ $expiredAt->format('Y年 n月 j日 H:i') }}</td>
                    @else
                        <td>---</td>
                    @endif
                    <td>
                        <a href="{{ route('admin.video.edit', $visible_video_ele->id) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        @if($visible_video_ele->first_video)
                            <form action="{{ route('admin.video.firstReset', $visible_video_ele->id) }}" method="POST" class="d-inline first-reset-btn">
                                @csrf
                                <button class="btn btn-xs btn-danger" type="submit">
                                    <p>最初に再生中</p>
                                </button>
                            </form>
                        @else
                            <form action="{{ route('admin.video.firstSet', $visible_video_ele->id) }}" method="POST" class="d-inline first-set-btn">
                                @csrf
                                <button class="btn btn-xs btn-danger" type="submit">
                                    <p>最初に再生</p>
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </x-adminlte-datatable>
        <div class="note">※ 「 最初に再生 」設定が未選択の場合、HP側の動画機能は表示されません。</div>
        <div class="border-line"></div>
        <p class="visible-second-tit">▼ 動画一覧 ▼</p>
        <x-adminlte-datatable id="videoTable" :heads="['タイトル', '動画', '公開終了日時', '操作']" striped hoverable bordered compressed>
            @foreach($video as $video_ele)
                <tr>
                    <td>{{ $video_ele->title }}</td>
                    <td>
                        <div class="video-box modal__open-btn" data-id="{{ $video_ele->id }}">
                            <img class="video-icon" src="{{ asset('image/adminlte/video/video-icon.svg') }}" alt="">
                        </div>
                    </td>
                    <!-- <td>{{ $video_ele->conversion_type }}</td> -->
                    @if ($video_ele->expired_at)
                        @php
                            $expiredAt = \Carbon\Carbon::parse($video_ele->expired_at);
                            $isExpired = $expiredAt->isPast();
                        @endphp
                        <td class="{{ $isExpired ? 'is-error' : '' }}">{{ $expiredAt->format('Y年 n月 j日 H:i') }}</td>
                    @else
                        <td>---</td>
                    @endif
                    <td>
                        <a href="{{ route('admin.video.show', $video_ele->id) }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.video.edit', $video_ele->id) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.video.destroy', $video_ele->id) }}" method="POST" class="d-inline">
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
                    <video class="answer-video" src="" controls></video>
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
                if ($.fn.DataTable.isDataTable('#visibleTable') || $.fn.DataTable.isDataTable('#videoTable')) {
                    $('#visibleTable').DataTable().destroy();
                    $('#videoTable').DataTable().destroy();
                }
                // const visibleTable = $('#visibleTable').DataTable({
                //     paging: false,
                //     searching: false,
                //     info: false,
                //     lengthChange: false,
                //     ordering: false
                // });
                const table = $('#videoTable').DataTable({
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

            $('.first-reset-btn').on('click', function (e) {
                e.preventDefault();
                const $form = $(this).closest('form');
                Swal.fire({
                    title: 'リセットしてよろしいでしょうか？',
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
        const videoDetails = @json($video->keyBy('id'));
        $(".modal__open-btn").each(function() {
            $(this).on('click', function(e) {
                e.preventDefault();
                const videoId = $(this).data('id');
                const video = videoDetails[videoId];
                console.log(videoId);
                console.log(video);
                if (video) {
                    const videoBasePath = "{{ asset('video/uploader') }}/";
                    console.log(videoBasePath + video.filename + '.mp4');
                    $('.answer-video').attr('src', videoBasePath + video.filename + '.mp4');
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