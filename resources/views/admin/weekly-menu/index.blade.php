@extends('adminlte::page')

@section('title', '週替りトッピング管理')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/adminlte/weekly-menu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/adminlte/index-option.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@endsection

@section('content_header')
    @if(session('success'))
        <x-adminlte-alert theme="success" title="{{ session('success') }}"></x-adminlte-alert>
    @endif
    <div class="tit-box">
        <h1>週替りトッピング管理</h1>
        <a href="{{ route('admin.weekly-menu.create') }}" class="create-btn">
            <p>新規作成</p>
        </a>
    </div>
    <div class="desc-box">
        <p>ハマちゃん週替りトッピング情報を新規作成・編集・確認・削除できます。</p>
        <p>登録されたトッピング具材は、条件を満たした場合にホームページ上でポップアップ表示されます。</p>
    </div>
@endsection

@section('content')
    {{-- テーブル表示 --}}
    @if ($weekly_menu->isEmpty())
        <p class="table-empty-msg">表示するデータがありません。</p>
    @else
        <x-adminlte-datatable id="weeklyMenuTable" :heads="['ID', 'ハマちゃんトッピング具材', '提供開始日', '提供終了日', '操作']" striped hoverable bordered compressed>
            @foreach($weekly_menu as $weekly_menu_ele)
                <tr>
                    <td>{{ $weekly_menu_ele->id }}</td>
                    <td>{{ $weekly_menu_ele->menu }}</td>
                    <td>{{ \Carbon\Carbon::parse($weekly_menu_ele->start_day)->format('Y年 n月 j日') }}</td>
                    <td>{{ \Carbon\Carbon::parse($weekly_menu_ele->end_day)->format('Y年 n月 j日') }}</td>
                    <td>
                        <a href="{{ route('admin.weekly-menu.show', $weekly_menu_ele->id) }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.weekly-menu.edit', $weekly_menu_ele->id) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.weekly-menu.destroy', $weekly_menu_ele->id) }}" method="POST" class="d-inline">
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
                if ($.fn.DataTable.isDataTable('#weeklyMenuTable')) {
                    $('#weeklyMenuTable').DataTable().destroy();
                }
                $('#weeklyMenuTable').DataTable({
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