@extends('adminlte::page')

@section('title', 'お知らせ管理')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/adminlte/news.css') }}">
    <link rel="stylesheet" href="{{ asset('css/adminlte/index-option.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@endsection

@section('content_header')
    @if(session('success'))
        <x-adminlte-alert theme="success" title="{{ session('success') }}"></x-adminlte-alert>
    @endif
    <div class="tit-box">
        <h1>お知らせ管理</h1>
        <a href="{{ route('admin.news.create') }}" class="create-btn">
            <p>新規作成</p>
        </a>
    </div>
    <div class="desc-box">
        <p>ホームページのトップページに、最新のお知らせを3件まで自動で表示します。</p>
        <p>表示対象のお知らせは、ID欄が緑・白・赤に色分けされている行です。</p>
        <p>こちらでは、お知らせの新規作成・編集・確認・削除が可能です。</p>
    </div>
@endsection

@section('content')
    {{-- テーブル表示 --}}
    @if ($news->isEmpty())
        <p class="table-empty-msg">表示するデータがありません。</p>
    @else
        <x-adminlte-datatable id="newsTable" :heads="['ID', 'カテゴリ', 'タイトル', '公開日', '操作']" striped hoverable bordered compressed>
            @foreach($news as $news_ele)
                <tr>
                    <td>{{ $news_ele->id }}</td>
                    <td>{{ $news_ele->category }}</td>
                    <td>{{ $news_ele->title }}</td>
                    <td>{{ $news_ele->created_at->format('Y年 n月 j日') }}</td>
                    <td>
                        <a href="{{ route('admin.news.show', $news_ele->id) }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.news.edit', $news_ele->id) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.news.destroy', $news_ele->id) }}" method="POST" class="d-inline">
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
        @if (!$reservation_news->isEmpty())
            <x-adminlte-datatable id="reservationTable" :heads="['ID', 'カテゴリ', 'タイトル', '公開予定日', '操作']" striped hoverable bordered compressed>
                @foreach($reservation_news as $reservation_news_ele)
                    <tr>
                        <td>{{ $reservation_news_ele->id }}</td>
                        <td>{{ $reservation_news_ele->category }}</td>
                        <td>{{ $reservation_news_ele->title }}</td>
                        <td>{{ \Carbon\Carbon::parse($reservation_news_ele->reservation_day)->format('Y年 n月 j日') }}</td>
                        <td>
                            <a href="{{ route('admin.news.show', $reservation_news_ele->id) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.news.edit', $reservation_news_ele->id) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.news.destroy', $reservation_news_ele->id) }}" method="POST" class="d-inline">
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
        @endif
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
                if ($.fn.DataTable.isDataTable('#newsTable')) {
                    $('#newsTable').DataTable().destroy();
                }
                const table = $('#newsTable').DataTable({
                    "order": [[0, 'desc']],
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/ja.json'
                    },
                    lengthMenu: [[5, 10, 20], [5, 10, 20]]
                });
                table.on('draw', updateRowClasses);
                function updateRowClasses() {
                    const rows = table.rows({ page: 'current' }).nodes();
                    $(rows).removeClass('first second third is-hidden');
                    if (table.page() === 0) {
                        $(rows).each(function (i) {
                            if (i === 0) $(this).addClass('first');
                            else if (i === 1) $(this).addClass('second');
                            else if (i === 2) $(this).addClass('third');
                            else $(this).addClass('is-hidden');
                        });
                    } else {
                        $(rows).addClass('is-hidden');
                    }
                }
            }, 100);
            setTimeout(function() {
                if ($.fn.DataTable.isDataTable('#reservationTable')) {
                    $('#reservationTable').DataTable().destroy();
                }
                const reservationTable = $('#reservationTable').DataTable({
                    "order": [[0, 'desc']],
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/ja.json'
                    },
                    "pageLength": -1,
                    "lengthMenu": [[-1], ["すべて"]],
                    "searching": false,
                    "paging": false,
                });
            }, 100);

            // $('#newsTable tbody tr:nth-last-child(n+4)').addClass('is-hidden');
            // $('#newsTable tbody tr:nth-last-child(1)').addClass('first');
            // $('#newsTable tbody tr:nth-last-child(2)').addClass('second');
            // $('#newsTable tbody tr:nth-last-child(3)').addClass('third');
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
@endsection