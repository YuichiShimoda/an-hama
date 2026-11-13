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
    @if(isset($overlap_error))
        <x-adminlte-alert theme="danger" title="{{ $overlap_error }}"></x-adminlte-alert>
    @endif
    <div class="tit-box">
        <h1>季節のつけかけパスタ管理</h1>
        <a href="{{ route('admin.season-pasta.create') }}" class="create-btn">
            <p>新規作成</p>
        </a>
    </div>
    <div class="desc-box">
        <p>公開日時が重複しているデータは、ID欄が赤色で表示されます。</p>
    </div>
@endsection

@section('content')
    {{-- テーブル表示 --}}
    @if ($season_pasta->isEmpty())
        <p class="table-empty-msg">表示するデータがありません。</p>
    @else
        <p class="visible-tit">▼ 公開中 ▼</p>
        @if ($published_season_pasta)
            <x-adminlte-datatable id="visibleTable" :heads="['期間', '画像', '新規作成日時', '更新日時', 'ID', '旬の食材', '公開日時', '操作']" striped hoverable bordered compressed>
                <tr>
<!--                     <td>
                        <div class="toggle-box">
                            <div class="circle {{ $published_season_pasta->is_visible == 1 ? 'is-on' : '' }}"></div>
                        </div>
                    </td> -->
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
                    <td>{{ $periods[$published_season_pasta->period] ?? $published_season_pasta->period }}</td>
                    <td>
                        <div class="img-box modal__open-btn" data-id="{{ $published_season_pasta->id }}">
                            <img class="img-icon" src="{{ asset('image/adminlte/season-pasta/img-icon.svg') }}" alt="">
                        </div>
                    </td>
                    <td>{{ $published_season_pasta->created_at->format('Y年 n月 j日 H:i') }}</td>
                    <td>{{ $published_season_pasta->updated_at->format('Y年 n月 j日 H:i') }}</td>
                    <td class="{{ in_array($published_season_pasta->id, $overlap_ids) ? 'is-overlap' : '' }}">{{ sprintf('%04d', $published_season_pasta->id) }}</td>
                    <td>{{ $published_season_pasta->ingredient1 }} ／ {{ $published_season_pasta->ingredient2 }}</td>
                    <td>{{ $published_season_pasta->reservation_at->format('Y年 n月 j日 H:i') }} ~ {{ $published_season_pasta->expired_at->format('Y年 n月 j日 H:i') }}</td>
                    <td>
                        <a href="{{ route('admin.season-pasta.show', $published_season_pasta->id) }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.season-pasta.edit', $published_season_pasta->id) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.season-pasta.destroy', $published_season_pasta->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-xs btn-danger delete-btn" type="submit">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            </x-adminlte-datatable>
            <div class="index-note-box">
                <p>※ 重複があった場合、HP側に表示されません。</p>
            </div>
        @else
            <p class="published-empty-msg">公開中のデータはありません。</p>
        @endif
        <div class="border-line"></div>
        <p class="visible-second-tit">▼ 一覧（ 全てのデータ ） ▼</p>
        <x-adminlte-datatable id="seasonPastaTable" :heads="['期間', '画像', '新規作成日時', '更新日時', 'ID', '旬の食材', '公開日時', '操作']" striped hoverable bordered compressed>
            @foreach($season_pasta as $season_pasta_ele)
                <tr class="{{ $published_season_pasta && $season_pasta_ele->id === $published_season_pasta->id ? 'is-published' : '' }}">
<!--                     <td>
                        <div class="toggle-box">
                            <div class="circle {{ $season_pasta_ele->is_visible == 1 ? 'is-on' : '' }}"></div>
                        </div>
                    </td> -->
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
                    <td class="{{ in_array($season_pasta_ele->id, $overlap_ids) ? 'is-overlap' : '' }}">{{ sprintf('%04d', $season_pasta_ele->id) }}</td>
                    <td>{{ $season_pasta_ele->ingredient1 }} ／ {{ $season_pasta_ele->ingredient2 }}</td>
                    <td>{{ $season_pasta_ele->reservation_at->format('Y年 n月 j日 H:i') }} ~ {{ $season_pasta_ele->expired_at->format('Y年 n月 j日 H:i') }}</td>
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
                if ($.fn.DataTable.isDataTable('#visibleTable') || $.fn.DataTable.isDataTable('#seasonPastaTable')) {
                    $('#visibleTable').DataTable().destroy();
                    $('#seasonPastaTable').DataTable().destroy();
                }
                const table = $('#seasonPastaTable').DataTable({
                    "order": [[4, 'desc']],
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