@extends('adminlte::page')

@section('title', '季節のつけかけパスタ管理｜新規作成')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/adminlte/season-pasta.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/@vuepic/vue-datepicker@11.0.3/dist/main.css">

    <style>
        @font-face {
            font-family: 'miniwa-lt-v3';
            src: url("{{ asset('fonts/MinIWA-Lt-V3-Regular.woff2') }}") format('woff2');
            font-weight: 400;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'miniwa-bd-v3';
            src: url("{{ asset('fonts/MinIWA-Bd-V3-Regular.woff2') }}") format('woff2');
            font-weight: 400;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'miniwa-hv-v3';
            src: url("{{ asset('fonts/MinIWA-Hv-V3-Regular.woff2') }}") format('woff2');
            font-weight: 400;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'fgp-soei-pop2';
            src: url("{{ asset('fonts/FGSOEIPP2-Bold.woff2') }}") format('woff2');
            font-weight: 700;
            font-style: normal;
            font-display: swap;
        }
    </style>
@stop

@section('content_header')
    <div class="tit-box">
        <h1>季節のつけかけパスタ管理<span>｜</span>新規作成</h1>
        <a href="{{ route('admin.season-pasta.index') }}" class="back-btn">
            <p>一覧に戻る</p>
        </a>
    </div>
@stop

@section('content')
    <div id="app">
        <form enctype="multipart/form-data" @submit.prevent="submitForm">
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

            {{-- 期間 --}}
            <div class="d-block">
                <div class="form-group">
                    <label class="required">期間</label>
                    <div class="radio-box">
                        @foreach($periods as $value => $label)
                            <div class="radio-ele">
                                <input type="radio" id="period_{{ $loop->iteration }}" name="period" v-model="period" value="{{ $value }}" {{ old('period') == $value ? 'checked' : '' }}>
                                <label for="period_{{ $loop->iteration }}">
                                    {{ $label }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="form-note-box">
                    <p>※ 選択肢を切り替えることによって、以下の要素が変更されます。詳細はプレビュー画面でご確認ください。<br>　・背景画像<br>　・左上の「 月 」<br>　・左下の「 月 」</p>
                </div>
                <p v-if="getErrorMessage('period')" class="invalid-feedback d-block">
                    @{{ getErrorMessage('period') }}
                </p>
            </div>

            {{-- 料理画像 --}}
            <div id="dish" class="d-block">
                <div class="form-group">
                    <label class="required">料理画像</label>
                    <div class="file-upload-box">
                        <label class="file-upload-label">
                            <img v-if="!dishPreview" class="add-icon" src="{{ asset('image/adminlte/season-pasta/plus-icon.svg') }}" alt="">
                            <img v-else class="preview-image" :src="dishPreview">
                            <input type="file" name="dish" accept="image/png,image/webp" @change="handleDish">
                        </label>
                        <img v-if="dishPreview" class="preview-close-btn" src="{{ asset('image/adminlte/season-pasta/preview-close-btn.svg') }}" alt="" @click="resetPreview">
                    </div>
                </div>
                <div class="form-note-box">
                    <p>※ ファイルサイズは100KB以下としてください。</p>
                    <p>※ 使用可能な拡張子は「 png / webp 」です。</p>
                    <p>※ 以下、推奨値となります。<br>　・横幅：800px<br>　・縦幅：637px</p>
                    <p>※ 画像を設定することで、プレビュー画面に反映されます。</p>
                </div>
                <p v-if="getErrorMessage('dish')" class="invalid-feedback d-block">
                    @{{ getErrorMessage('dish') }}
                </p>
            </div>

            {{-- 旬の食材 --}}
            <div class="d-block ingredient-box">
                <div class="form-group">
                    <label class="required">旬の食材</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="ingredient1" v-model="ingredient1" :class="{'is-invalid': getErrorMessage('ingredient1')}" placeholder="1つ目の食材">
                    </div>
                </div>
                <div class="form-group">
                    <label class="required">旬の食材</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="ingredient2" v-model="ingredient2" :class="{'is-invalid': getErrorMessage('ingredient2')}" placeholder="2つ目の食材">
                    </div>
                </div>
                <div class="form-note-box">
                    <p>※ 入力をおこなうことで、プレビュー画面に反映されます。</p>
                </div>
                <p v-if="getErrorMessage('ingredient1')" class="invalid-feedback d-block">
                    @{{ getErrorMessage('ingredient1') }}
                </p>
                <p v-if="getErrorMessage('ingredient2')" class="invalid-feedback d-block">
                    @{{ getErrorMessage('ingredient2') }}
                </p>
            </div>

            {{-- 公開日時 --}}
            <div class="d-block period-box">
                <div class="form-group">
                    <label for="reservation_at" class="required">公開日時</label>
                    <div class="input-group d-block" :class="{'is-invalid': getErrorMessage('reservation_at')}">
                        <vue-date-picker v-model="reservationAt" model-type="yyyy-MM-dd HH:mm" format="yyyy-MM-dd HH:mm" placeholder="開始時間" :enable-time-picker="true" :is-24="true" :enable-seconds="false" :min-date="minDate" :start-time="reservationStartTime" locale="ja" auto-apply/>
                    </div>
                </div>
                <div class="wavy-line">～</div>
                <div class="form-group">
                    <label for="expired_at">公開日時</label>
                    <div class="input-group d-block" :class="{'is-invalid': getErrorMessage('expired_at')}">
                        <vue-date-picker v-model="expiredAt" model-type="yyyy-MM-dd HH:mm" format="yyyy-MM-dd HH:mm" placeholder="終了時間" :enable-time-picker="true" :is-24="true" :enable-seconds="false" :min-date="minDate" :start-time="expiredStartTime" locale="ja" auto-apply/>
                    </div>
                </div>
                <div class="form-note-box">
                    <p>※ 開始時間の初期値は「 00:00 」です。変更する場合は手動で任意の時間に設定してください。</p>
                    <p>※ 終了時間の初期値は「 23:59 」です。変更する場合は手動で任意の時間に設定してください。</p>
                    <p>※ 時間の秒数設定はありませんが、設定した時間（ 分 ）の「 00秒 」時点で開始、終了となります。</p>
                    <p>※ 「 公開日時 」になるとHP側で表示されます。</p>
                </div>
                <p v-if="getErrorMessage('reservation_at')" class="invalid-feedback d-block">
                    @{{ getErrorMessage('reservation_at') }}
                </p>
                <p v-if="getErrorMessage('expired_at')" class="invalid-feedback d-block">
                    @{{ getErrorMessage('expired_at') }}
                </p>
            </div>

            {{-- コメント --}}
            <div class="d-block">
                <div class="form-group">
                    <label>コメント</label>
                    <div class="input-group">
                        <textarea class="form-control" name="comment" v-model="comment" :class="{'is-invalid': getErrorMessage('comment')}" placeholder="コメントを入力してください。" rows="4"></textarea>
                    </div>
                </div>
                <div class="form-note-box">
                    <p>※ 1行あたり25文字以内とし、超える場合は改行してください。</p>
                    <p>※ 入力をおこなうことで、プレビュー画面に反映されます。</p>
                </div>
                <p v-if="getErrorMessage('comment')" class="invalid-feedback d-block">
                    @{{ getErrorMessage('comment') }}
                </p>
            </div>

            {{-- 登録ボタン --}}
            <x-adminlte-button label="登録する" class="register-btn" type="submit"/>

            <div class="toggle-btn-box" @click="isClose = !isClose">
                <p v-show="!isClose">»</p>
                <p v-show="isClose">«</p>
            </div>
            <div class="scale-box" :class="{ 'is-close': isClose }">
                <input type="range" class="scale-slider" v-model.number="scale" min="0.3" max="0.8" step="0.01">
            </div>
            <div id="frame" :class="{ 'is-close': isClose }" :style="{ transform: `scale(${scale})` }">
                <div id="season" :style="period ? { backgroundImage: `url('{{ asset('image/season/season-bg') }}_${period}.webp')` } : {}">
                    <div class="content-box">
                        <div class="main-box">
                            <div class="left-box">
                                <img class="pasta-line" src="{{ asset('image/season/pasta-line.svg') }}" alt="">
                                <img class="board" src="{{ asset('image/season/board.svg') }}" alt="">
                                <div class="illust-box">
                                    <img class="plate-icon" src="{{ asset('image/season/plate-icon.svg') }}" alt="">
                                    <img class="en-msg" src="{{ asset('image/season/en-msg.svg') }}" alt="">
                                </div>
                                <div class="label-box">
                                    <img class="two-month" :src="`{{ asset('image/season/period') }}${period}.svg`" alt="">
                                </div>
                                <img class="label-bg" src="{{ asset('image/season/label-bg.webp') }}" alt="">
                            </div>
                            <div class="right-box">
                                <div class="img-box">
                                    <img v-if="!dishPreview" class="dish" src="{{ asset('image/adminlte/season-pasta/plate.webp') }}" alt="">
                                    <img v-else class="dish" :src="dishPreview" alt="">
                                </div>
                            </div>
                            <img class="jp-msg" src="{{ asset('image/season/jp-msg.svg') }}" alt="">
                        </div>
                        <div class="desc-box">
                            <h2 class="ingredient">旬の食材　：　「 @{{ ingredient1 || 'ーーー' }} 」「 @{{ ingredient2 || 'ーーー' }} 」</h2>
                            <p v-if="comment" class="comment">@{{ comment }}</p>
                            <div class="info-admin-box">
                                <div class="tit-box">
                                    <div class="period-box">
                                        <p>@{{ period ? period.replace('-', '月,') + '月' : 'ーー月, ー' }}月限定</p>
                                    </div>
                                    <h2 class="menu-tit">季節のつけかけパスタ</h2>
                                </div>
                                <div class="price-box">
                                    <div class="above-box">
                                        <p class="size">レギュラー</p>
                                        <p class="unit">300g</p>
                                    </div>
                                    <div class="below-box">
                                        <p class="price">1,300</p>
                                        <p class="yen">円</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://unpkg.com/vue@3/dist/vue.global.prod.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
            <script src="https://unpkg.com/@vuepic/vue-datepicker@11.0.3/dist/vue-datepicker.iife.js"></script>
            <script>
                const { createApp, ref, computed } = Vue;
                createApp({
                    components: {
                        VueDatePicker: window.VueDatePicker
                    },
                    setup() {

                        // ===== CSRF =====
                        axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').content;

                        const period = ref(@json(old('period', '')));
                        const dish = ref(null);
                        const dishPreview = ref(@json(old('dish_preview', null)));
                        const ingredient1 = ref(@json(old('ingredient1', '')));
                        const ingredient2 = ref(@json(old('ingredient2', '')));
                        const reservationAt = ref(@json(old('reservation_at', '')));
                        const expiredAt = ref(@json(old('expired_at', '')));
                        const minDate = computed(() => {
                            const d = new Date();
                            d.setHours(0, 0, 0, 0);
                            return d;
                        });
                        const comment = ref(@json(old('comment', '')));

                        const scale = ref(0.6);
                        const isClose = ref(false);
                        const loading = ref(false);
                        const errors = ref({});

                        // ===== 料理画像 =====
                        const handleDish = (e) => {
                            const file = e.target.files[0];
                            dish.value = file;
                            if (file) {
                                const reader = new FileReader();
                                reader.onload = ev => dishPreview.value = ev.target.result;
                                reader.readAsDataURL(file);
                            }
                        };

                        const resetPreview = () => {
                            dish.value = null;
                            dishPreview.value = null;
                            const input = document.querySelector('input[name="dish"]');
                            if (input) input.value = '';
                        };


                        const reservationStartTime = {hours: 0,minutes: 0};
                        const expiredStartTime = {hours: 23,minutes: 59};


                        // ===== エラー取得 =====
                        const getErrorMessage = (field) => {
                            return errors.value[field] ? errors.value[field][0] : null;
                        };


                        // ===== 送信 =====
                        const submitForm = async () => {
                            if (loading.value) return;
                            loading.value = true;
                            errors.value = {};
                            const formData = new FormData();
                            formData.append('period', period.value);
                            formData.append('dish', dish.value);
                            formData.append('ingredient1', ingredient1.value);
                            formData.append('ingredient2', ingredient2.value);
                            formData.append('reservation_at', reservationAt.value);
                            formData.append('expired_at', expiredAt.value);
                            formData.append('comment', comment.value ?? '');
                            for (const [key, value] of formData.entries()) {
                                console.log(key, value);
                            }
                            axios.post("{{ route('admin.season-pasta.store') }}", formData, {headers: {Accept: 'application/json'}})
                                .then(response => {
                                    // 成功時
                                    window.location.href = "{{ route('admin.season-pasta.index') }}";
                                })
                                .catch(error => {
                                    // 失敗時
                                    errors.value = error.response.data.errors;
                                })
                                .finally(() => {
                                    // 成功・失敗に関わらず実行
                                    loading.value = false;
                                });
                        };

                        return {
                            period,
                            dishPreview,
                            ingredient1,
                            ingredient2,
                            reservationAt,
                            expiredAt,
                            minDate,
                            comment,
                            scale,
                            isClose,
                            errors,
                            handleDish,
                            resetPreview,
                            reservationStartTime,
                            expiredStartTime,
                            getErrorMessage,
                            submitForm
                        };
                    }
                }).mount('#app');
            </script>
        </form>
    </div>
@stop

@section('js')
<!--     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/locale/ja.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js"></script>
    <script>
        moment.locale('ja');
    </script> -->
@endsection