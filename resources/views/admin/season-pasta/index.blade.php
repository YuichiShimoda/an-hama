@extends('adminlte::page')

@section('title', '季節のつけかけパスタ管理')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/adminlte/season-pasta.css') }}">
    <link rel="stylesheet" href="{{ asset('css/adminlte/index-option.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@endsection

@section('content_header')
    @if(session('success'))
        <x-adminlte-alert theme="success" title="{{ session('success') }}"></x-adminlte-alert>
    @endif
    <div class="tit-box">
        <h1>季節のつけかけパスタ管理</h1>
        <a href="{{ route('admin.season-pasta.create') }}" class="create-btn">
            <p>新規作成</p>
        </a>
    </div>
    <div class="desc-box">
        <p>黄色はIDがハイライトになります。</p>
        <p>公開日時に重複がある場合、エラーを表示します</p>
    </div>
@endsection

@section('content')
    {{-- テーブル表示 --}}
    @if ($season_pasta->isEmpty())
        <p class="table-empty-msg">表示するデータがありません。</p>
    @else
        <x-adminlte-datatable id="seasonPastaTable" :heads="['ID', '期間', '画像', '新規作成日時', '更新日時', '旬の食材１', '旬の食材２', '公開開始日時', '公開終了日時', '操作']" striped hoverable bordered compressed>
            @foreach($season_pasta as $season_pasta_ele)
                <tr>
                    <td>{{ $season_pasta_ele->id }}</td>
                    @php
                        $periods = [
                            '1-2'   => '1月,2月',
                            '3-4'   => '3月,4月',
                            '5-6'   => '5月,6月',
                            '7-8'   => '7月,8月',
                            '9-10'  => '9月,10月',
                            '11-12' => '11月,12月',
                        ];
                    @endphp
                    <td>{{ $periods[$season_pasta_ele->period] ?? $season_pasta_ele->period }}</td>
                    <td>
                        <div class="img-box modal__open-btn" data-id="{{ $season_pasta_ele->id }}">
                            <img class="img-icon" src="{{ asset('image/adminlte/season-pasta/img-icon.svg') }}" alt="">
                        </div>
                    </td>
                    <td>{{ $season_pasta_ele->created_at->format('Y年 n月 j日 H:i') }}</td>
                    <td>{{ $season_pasta_ele->updated_at->format('Y年 n月 j日 H:i') }}</td>
                    <td>{{ $season_pasta_ele->ingredient1 }}</td>
                    <td>{{ $season_pasta_ele->ingredient2 }}</td>
                    <td>{{ $season_pasta_ele->reservation_at->format('Y年 n月 j日 H:i') }}</td>
                    <td>{{ $season_pasta_ele->expired_at->format('Y年 n月 j日 H:i') }}</td>
                    <td>
                        <a href="{{ route('admin.season-pasta.show', $season_pasta_ele->id) }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.season-pasta.edit', $season_pasta_ele->id) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.season-pasta.destroy', $season_pasta_ele->id) }}" method="POST" class="d-inline">
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
                    <img class="answer-img" src="">
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
                if ($.fn.DataTable.isDataTable('#seasonPastaTable')) {
                    $('#seasonPastaTable').DataTable().destroy();
                }
                $('#seasonPastaTable').DataTable({
                    "order": [[0, 'desc']],
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/ja.json'
                    },
                    lengthMenu: [[5, 10, 20], [5, 10, 20]]
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
        });
    </script>
    <script>
        const imgDetails = @json($season_pasta->keyBy('id'));
        $(".modal__open-btn").each(function() {
            $(this).on('click', function(e) {
                e.preventDefault();
                const imgId = $(this).data('id');
                const img = imgDetails[imgId];
                console.log(imgId);
                console.log(img);
                if (img) {
                    const imgBasePath = "{{ asset('image/season-pasta') }}/";
                    console.log(imgBasePath + img.dish);
                    $('.answer-img').attr('src', imgBasePath + img.dish);
                }
                $("#individual-modal").addClass('is-active');
            });
        });
        function closeModal() {
            $("#individual-modal").removeClass('is-active');
        }
        $(".modal-close-btn").click (function() {
            closeModal();
        });
        $(".md-overlay").click (function() {
            closeModal();
        });
    </script>
@endsection