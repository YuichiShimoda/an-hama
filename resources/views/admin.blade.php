@extends('adminlte::page')

@section('title', '管理画面TOP')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/adminlte/top.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css" />
@stop

@section('content_header')
    @if(session('success'))
        <x-adminlte-alert theme="success" title="{{ session('success') }}"></x-adminlte-alert>
    @endif
    <div class="tit-box">
        <h1>管理画面TOP</h1>
    </div>
<!--     <div class="desc-box">
        <p>説明が入ります。説明が入ります。</p>
        <p>説明が入ります。説明が入ります。説明が入ります。</p>
    </div> -->
@stop

@section('content')
    <div id='calendar'></div>
    <form action="{{ route('admin.task.store') }}" method="POST">
        @csrf

        {{-- タスク --}}
        <div class="d-block">
            <x-adminlte-input name="title" label="タスク" placeholder="タイトル" value="{{ old('title') }}"/>
        </div>

        {{-- 詳細 --}}
        <div class="d-block">
            <x-adminlte-textarea name="description" label="詳細" placeholder="詳細を入力してください。" rows="4">{{ old('description') }}</x-adminlte-textarea>
        </div>

        {{-- 期間 --}}
        <div class="d-block period-box">
            <x-adminlte-input-date name="start" label="期間" :config="['format' => 'YYYY-MM-DD HH:MM']" value="{{ old('start') }}">
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-info">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                </x-slot>
            </x-adminlte-input-date>
            <div class="wavy-line">～</div>
            <x-adminlte-input-date name="end" label="終了日" :config="['format' => 'YYYY-MM-DD HH:MM']" value="{{ old('end') }}">
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-info">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                </x-slot>
            </x-adminlte-input-date>
        </div>

        {{-- 色 --}}
        <div class="d-block">
            <x-adminlte-select name="background_color" label="色">
                <option value="#d81b60" {{ old('background_color') == '#d81b60' ? 'selected' : '' }}><span>■</span>ラズベリー</option>
                <option value="#ffc107" {{ old('background_color') == '#ffc107' ? 'selected' : '' }}><span>■</span>バナナ</option>
                <option value="#fd7e14" {{ old('background_color') == '#fd7e14' ? 'selected' : '' }}><span>■</span>オレンジ</option>
                <option value="#28a745" {{ old('background_color') == '#28a745' ? 'selected' : '' }}><span>■</span>グリーン</option>
                <option value="#17a2b8" {{ old('background_color') == '#17a2b8' ? 'selected' : '' }}><span>■</span>フレッシュブルー</option>
                <option value="#20c997" {{ old('background_color') == '#20c997' ? 'selected' : '' }}><span>■</span>ミントグリーン</option>
                <option value="#007bff" {{ old('background_color') == '#007bff' ? 'selected' : '' }}><span>■</span>ブルー</option>
                <option value="#6f42c1" {{ old('background_color') == '#6f42c1' ? 'selected' : '' }}><span>■</span>パープル</option>
            </x-adminlte-select>
        </div>


        {{-- 登録ボタン --}}
        <x-adminlte-button label="登録する" class="register-btn" type="submit"/>
    </form>
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/locale/ja.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        moment.locale('ja');
        $('#start').datetimepicker({
            format: 'YYYY-MM-DD HH:mm',
            locale: 'ja',
            defaultDate: moment().startOf('day'),
            stepping: 5,
            icons: {
                time: 'fa fa-clock',
                date: 'fa fa-calendar',
                up: 'fa fa-chevron-up',
                down: 'fa fa-chevron-down',
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-calendar-check',
                clear: 'fa fa-trash',
                close: 'fa fa-times'
            }
        });
        $('#end').datetimepicker({
            format: 'YYYY-MM-DD HH:mm',
            locale: 'ja',
            defaultDate: moment().startOf('day'),
            stepping: 5,
            icons: {
                time: 'fa fa-clock',
                date: 'fa fa-calendar',
                up: 'fa fa-chevron-up',
                down: 'fa fa-chevron-down',
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-calendar-check',
                clear: 'fa fa-trash',
                close: 'fa fa-times'
            }
        });
        $(document).on('mousedown', function (e) {
            const picker = $('.datetimepicker');
            const widget = picker.data("datetimepicker").widget;
            const isInput = $(e.target).closest(picker).length > 0;
            const isWidget = $(e.target).closest(widget).length > 0;

            if (!isInput && !isWidget) {
                picker.datetimepicker('hide');
            }
        });
    </script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar/index.global.min.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const calendarEl = document.getElementById('calendar');
            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'multiMonthFourMonth',
                locale: 'ja',
                height: 'auto',
                firstDay: 1,
                multiMonthMaxColumns: 2,
                multiMonthMinWidth: 500,
                dayCellContent: function(arg) {
                    return {
                        html: arg.dayNumberText.replace('日', '')
                    };
                },
                dayHeaderContent: function(arg) {
                    const viewType = arg.view.type;
                    if (viewType === 'timeGridWeek') {
                        const date = arg.date;
                        const day = date.getDay();
                        const youbi = ['日', '月', '火', '水', '木', '金', '土'][day];
                        const month = date.getMonth() + 1;
                        const dayOfMonth = date.getDate();
                        return {
                            html: `${month}/${dayOfMonth}<br><span class="fc-weekday">( ${youbi} )</span>`
                        };
                    }
                    return arg.text;
                },
                allDayText: '終日',
                showNonCurrentDates: true,
                views: {
                    multiMonthFourMonth: {
                        type: 'multiMonth',
                        duration: { months: 4 },
                    }
                },
                headerToolbar: {
                    left: "multiMonthFourMonth,dayGridMonth,timeGridWeek,timeGridDay",
                    center: "title",
                    right: "today prev,next"
                },
                buttonText: {
                    multiMonthFourMonth: '4ヶ月',
                    month: '1ヶ月',
                    week: '週',
                    day: '日',
                    today: '今日',
                },
                noEventsContent: 'タスクはありません',
                eventSources: [
                    {
                        url: '/task',
                    },
                    {
                        url: '/holiday',
                    }
                ],
                navLinks: true,
                datesSet: function() {
                    $('.fc-daygrid-day-number').removeAttr('title');
                    $('.fc-col-header-cell-cushion').removeAttr('title');
                },
                eventClick: function(info) {
                    const event = info.event;

                    const start_show_day = new Date(event.start);
                    const start_all_day = moment(start_show_day).format('YYYY年M月D日');
                    const start_show_formatted_day = moment(start_show_day).format('YYYY年M月D日 H:mm');
                    const end_show_day = new Date(event.end);
                    const end_show_formatted_day = moment(end_show_day).format('YYYY年M月D日 H:mm');
                    Swal.fire({
                        title: event.title,
                        html: `
                            ${
                                event.allDay
                                ? `<div class="item-ele">期間：${start_all_day} 終日</div>`
                                : `<div class="item-ele">期間：${start_show_formatted_day} ~ ${end_show_formatted_day}</div>`
                            }
                            ${event.extendedProps.description ? `<div class="item-ele">詳細：${event.extendedProps.description.replace(/\n/g, '<br>')}</div>` : ''}
                        `,
                        showCancelButton: true,
                        showDenyButton: true,
                        confirmButtonColor: '#007bff',
                        cancelButtonColor: '#aaa',
                        confirmButtonText: '編集する',
                        cancelButtonText: '閉じる',
                        denyButtonText: '削除する',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            const start_edit_day = new Date(event.start);
                            const start_edit_formatted_day = moment(start_edit_day).format('YYYY-MM-DD HH:mm');
                            const end_edit_day = new Date(event.end);
                            const end_edit_formatted_day = moment(end_edit_day).format('YYYY-MM-DD HH:mm');
                            Swal.fire({
                                title: "編集",
                                customClass: {
                                    popup: 'edit-modal-box'
                                },
                                html: `
                                    <input type="hidden" id="id-modal" name="id" value="${event.id}">
                                    <div class="d-block">
                                        <div class="form-group">
                                            <label for="title">タスク</label>
                                            <div class="input-group">
                                                <input id="title-modal" name="title" value="${event.title}" class="form-control" placeholder="タイトル">
                                            </div>
                                            <span class="invalid-feedback d-block">
                                                <strong id="title-error" class="error-message"></strong>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="d-block">
                                        <div class="form-group">
                                            <label for="description">詳細</label>
                                            <div class="input-group">
                                                <textarea id="description-modal" name="description" class="form-control" placeholder="詳細を入力してください。" rows="4">${event.extendedProps.description && event.extendedProps.description !== "null" ? `${event.extendedProps.description}` : ''}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-block period-box">
                                        <div class="form-group">
                                            <label for="start">期間</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text bg-gradient-info">
                                                        <i class="fas fa-calendar-alt"></i>
                                                    </div>
                                                </div>
                                                <input id="start-modal" name="start" data-target="#start-modal" data-toggle="datetimepicker" class="form-control datetimepicker" value="${start_edit_formatted_day}">
                                            </div>
                                            <span class="invalid-feedback d-block">
                                                <strong id="start-error" class="error-message"></strong>
                                            </span>
                                        </div>
                                        <div class="wavy-line">～</div>
                                        <div class="form-group">
                                            <label for="end">終了日</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text bg-gradient-info">
                                                        <i class="fas fa-calendar-alt"></i>
                                                    </div>
                                                </div>
                                                <input id="end-modal" name="end" data-target="#end-modal" data-toggle="datetimepicker" class="form-control datetimepicker" value="${end_edit_formatted_day}">
                                            </div>
                                            <span class="invalid-feedback d-block">
                                                <strong id="end-error" class="error-message"></strong>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="d-block">
                                        <div class="form-group">
                                            <label for="background_color">色</label>
                                            <div class="input-group">
                                                <select id="background_color-modal" name="background_color" class="form-control">
                                                    <option value="#d81b60"${event.backgroundColor == "#d81b60" ? " selected" : ''}><span>■</span>ラズベリー</option>
                                                    <option value="#ffc107"${event.backgroundColor == "#ffc107" ? " selected" : ''}><span>■</span>バナナ</option>
                                                    <option value="#fd7e14"${event.backgroundColor == "#fd7e14" ? " selected" : ''}><span>■</span>オレンジ</option>
                                                    <option value="#28a745"${event.backgroundColor == "#28a745" ? " selected" : ''}><span>■</span>グリーン</option>
                                                    <option value="#17a2b8"${event.backgroundColor == "#17a2b8" ? " selected" : ''}><span>■</span>フレッシュブルー</option>
                                                    <option value="#20c997"${event.backgroundColor == "#20c997" ? " selected" : ''}><span>■</span>ミントグリーン</option>
                                                    <option value="#007bff"${event.backgroundColor == "#007bff" ? " selected" : ''}><span>■</span>ブルー</option>
                                                    <option value="#6f42c1"${event.backgroundColor == "#6f42c1" ? " selected" : ''}><span>■</span>パープル</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                `,
                                didOpen: () => {
                                    $('#start-modal').datetimepicker({
                                        format: 'YYYY-MM-DD HH:mm',
                                        locale: 'ja',
                                        stepping: 5,
                                        defaultDate: moment(start_edit_formatted_day || undefined) || moment().startOf('day'),
                                        icons: {
                                            time: 'fa fa-clock',
                                            date: 'fa fa-calendar',
                                            up: 'fa fa-chevron-up',
                                            down: 'fa fa-chevron-down',
                                            previous: 'fa fa-chevron-left',
                                            next: 'fa fa-chevron-right',
                                            today: 'fa fa-calendar-check',
                                            clear: 'fa fa-trash',
                                            close: 'fa fa-times'
                                        }
                                    });
                                    $('#end-modal').datetimepicker({
                                        format: 'YYYY-MM-DD HH:mm',
                                        locale: 'ja',
                                        stepping: 5,
                                        defaultDate: moment(end_edit_formatted_day || undefined) || moment().startOf('day'),
                                        icons: {
                                            time: 'fa fa-clock',
                                            date: 'fa fa-calendar',
                                            up: 'fa fa-chevron-up',
                                            down: 'fa fa-chevron-down',
                                            previous: 'fa fa-chevron-left',
                                            next: 'fa fa-chevron-right',
                                            today: 'fa fa-calendar-check',
                                            clear: 'fa fa-trash',
                                            close: 'fa fa-times'
                                        }
                                    });
                                },
                                preConfirm: () => {
                                    const title = $('#title-modal').val();
                                    const description = $('#description-modal').val();
                                    const start = $('#start-modal').val();
                                    const end = $('#end-modal').val();
                                    const backgroundColor = $('#background_color-modal').val();
                                    $('.error-message').text('');
                                    var isValid = true;

                                    if (!title) {
                                        $('#title-error').text('必ず入力してください。');
                                        isValid = false;
                                    }
                                    if (!start) {
                                        $('#start-error').text('必ず入力してください。');
                                        isValid = false;
                                    } else if (!moment(start, 'YYYY-MM-DD HH:mm', true).isValid()) {
                                        $('#start-error').text('「 YYYY-MM-DD HH:MM 」の形式で入力してください。');
                                        isValid = false;
                                    }
                                    if (!end) {
                                        $('#end-error').text('必ず入力してください。');
                                        isValid = false;
                                    } else if (!moment(end, 'YYYY-MM-DD HH:mm', true).isValid()) {
                                        $('#end-error').text('「 YYYY-MM-DD HH:MM 」の形式で入力してください。');
                                        isValid = false;
                                    }
                                    if (!backgroundColor) {
                                        $('#bgcolor-error').text('必ず入力してください。');
                                        isValid = false;
                                    }
                                    if (moment(start).isAfter(moment(end))) {
                                        $('#end-error').text('開始日時よりも後の日時を入力してください。');
                                        isValid = false;
                                    }
                                    if (isValid) {
                                        return {
                                            title: title,
                                            description: description,
                                            start: start,
                                            end: end,
                                            backgroundColor: backgroundColor
                                        };
                                    } else {
                                        return false;
                                    }
                                },
                                showCancelButton: true,
                                confirmButtonColor: '#007bff',
                                cancelButtonColor: '#aaa',
                                confirmButtonText: '更新する',
                                cancelButtonText: '閉じる',
                            }).then((resultEdit) => {
                                if (resultEdit.isConfirmed) {
                                    const form = document.createElement('form');
                                    form.method = 'post';
                                    form.action = './../task/update';
                                    form.innerHTML = `
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="id" value="${$('#id-modal').val()}">
                                        <input type="hidden" name="title" value="${$('#title-modal').val()}">
                                        <input type="hidden" name="description" value="${$('#description-modal').val()}">
                                        <input type="hidden" name="start" value="${$('#start-modal').val()}">
                                        <input type="hidden" name="end" value="${$('#end-modal').val()}">
                                        <input type="hidden" name="background_color" value="${$('#background_color-modal').val()}">
                                    `;
                                    $('body').append(form);
                                    form.submit();
                                }
                            });
                        } else if (result.isDenied) {
                            Swal.fire({
                                title: "タスクを削除してよろしいでしょうか？",
                                customClass: {
                                    popup: 'delete-modal-box'
                                },
                                html: `
                                    <input type="hidden" id="id-modal" name="id" value="${event.id}">
                                `,
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#007bff',
                                cancelButtonColor: '#999',
                                confirmButtonText: 'はい',
                                cancelButtonText: 'いいえ',
                            }).then((resultDelete) => {
                                if (resultDelete.isConfirmed) {
                                    const form = document.createElement('form');
                                    form.method = 'post';
                                    form.action = './../task/delete';
                                    form.innerHTML = `
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="id" value="${$('#id-modal').val()}">
                                    `;
                                    $('body').append(form);
                                    form.submit();
                                }
                            })
                        } else {
                            // alert('--------');
                        }
                    });
                },
                eventDidMount: function(info) {
                },
                eventSourceFailure () {
                    console.error('task関連でエラーが発生');
                },
            })
            calendar.render();
        })
    </script>
@endsection