@extends('adminlte::page')

@section('title', '営業状態管理')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/adminlte/restaurant.css') }}">
    <link rel="stylesheet" href="{{ asset('css/adminlte/index-option.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@endsection

@section('content_header')
    @if(session('success'))
        <x-adminlte-alert theme="success" title="{{ session('success') }}"></x-adminlte-alert>
    @endif
    <div class="tit-box">
        <h1>営業管理</h1>
        <a href="{{ route('admin.restaurant.create') }}" class="create-btn">
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
    @if ($restaurant->isEmpty())
        <p class="table-empty-msg">表示するデータがありません。</p>
    @else
        <x-adminlte-datatable id="restaurantTable" :heads="['ID', 'カテゴリ', 'タイトル', '公開日', '操作']" striped hoverable bordered compressed>
            @foreach($restaurant as $restaurant_ele)
                <tr>
                    <td>{{ $restaurant_ele->id }}</td>
                    <td>{{ $restaurant_ele->category }}</td>
                    <td>{{ $restaurant_ele->title }}</td>
                    <td>{{ $restaurant_ele->created_at->format('Y年 n月 j日') }}</td>
                    <td>
                        <a href="{{ route('admin.restaurant.show', $restaurant_ele->id) }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.restaurant.edit', $restaurant_ele->id) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.restaurant.destroy', $restaurant_ele->id) }}" method="POST" class="d-inline">
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
                if ($.fn.DataTable.isDataTable('#restaurantTable')) {
                    $('#restaurantTable').DataTable().destroy();
                }
                const table = $('#restaurantTable').DataTable({
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

            // $('#restaurantTable tbody tr:nth-last-child(n+4)').addClass('is-hidden');
            // $('#restaurantTable tbody tr:nth-last-child(1)').addClass('first');
            // $('#restaurantTable tbody tr:nth-last-child(2)').addClass('second');
            // $('#restaurantTable tbody tr:nth-last-child(3)').addClass('third');
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