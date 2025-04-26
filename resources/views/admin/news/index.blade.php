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
        <p>説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。</p>
        <p>説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。</p>
        <p>説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。</p>
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
                    <td>{{ $news_ele->created_at->format('Y-m-d') }}</td>
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
    @endif
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- 削除確認用スクリプト --}}
    <script>
        $(window).on('load', function () {
            $('#newsTable').DataTable().destroy();
            $('#newsTable').DataTable({
                "order": [[0, 'desc']],
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/ja.json'
                },
                lengthMenu: [[5, 10, 20], [5, 10, 20]]
            });
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