@extends('adminlte::page')

@section('title', 'NEWS管理')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/adminlte/press-release.css') }}">
    <link rel="stylesheet" href="{{ asset('css/adminlte/index-option.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@endsection

@section('content_header')
    @if(session('success'))
        <x-adminlte-alert theme="success" title="{{ session('success') }}"></x-adminlte-alert>
    @endif
    <div class="tit-box">
        <h1>NEWS管理</h1>
        <a href="{{ route('admin.press-release.create') }}" class="create-btn">
            <p>新規作成</p>
        </a>
    </div>
    <div class="desc-box">
        <p>NEWS情報を新規作成・編集・確認・削除できます。</p>
        <p>NEWS情報は、条件を満たした場合にホームページ上でポップアップ表示されます。</p>
    </div>
@endsection

@section('content')
    {{-- テーブル表示 --}}
    @if ($press_release->isEmpty())
        <p class="table-empty-msg">表示するデータがありません。</p>
    @else
        <x-adminlte-datatable id="pressReleaseTable" :heads="['No.', 'タイトル', '表示開始日', '表示終了日', '操作']" striped hoverable bordered compressed>
            @foreach($press_release as $press_release_ele)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $press_release_ele->title }}</td>
                    <td>{{ \Carbon\Carbon::parse($press_release_ele->start)->format('Y年 n月 j日') }}</td>
                    <td>{{ \Carbon\Carbon::parse($press_release_ele->end)->format('Y年 n月 j日') }}</td>
                    <td>
                        <a href="{{ route('admin.press-release.show', $press_release_ele->id) }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.press-release.edit', $press_release_ele->id) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.press-release.destroy', $press_release_ele->id) }}" method="POST" class="d-inline">
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
            setTimeout(function() {
                if ($.fn.DataTable.isDataTable('#pressReleaseTable')) {
                    $('#pressReleaseTable').DataTable().destroy();
                }
                $('#pressReleaseTable').DataTable({
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
@endsection