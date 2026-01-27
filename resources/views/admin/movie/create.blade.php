@extends('adminlte::page')

@section('title', '動画管理｜新規作成')

@section('css')
	<link rel="stylesheet" href="{{ asset('css/adminlte/movie.css') }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css" />
@stop

@section('classes_body', 'page-create')

@section('content_header')
	<div class="tit-box">
		<h1>動画管理｜新規作成</h1>
		<a href="{{ route('admin.movie.index') }}" class="back-btn">
			<p>一覧に戻る</p>
		</a>
	</div>
@stop

@section('content')
	<form action="{{ route('admin.movie.store') }}" method="POST" enctype="multipart/form-data">
		@csrf

		{{-- タイトル --}}
		<div class="d-block">
			<x-adminlte-input name="title" label="タイトル" label-class="required" placeholder="タイトル" value="{{ old('title') }}"/>
			<div class="form-note-box">
				<p>※ 15文字以内で入力してください。</p>
			</div>
		</div>

		{{-- 動画 --}}
		<div id="movie" class="d-block">
			<div class="form-group">
				<label class="required">動画</label>
				<div class="file-upload-box">
					<label class="file-upload-label">
						<img v-if="!moviePreview" class="plus-icon" src="{{ asset('image/adminlte/movie/plus-icon.svg') }}" alt="">
						<!-- <img v-if="!moviePreview" class="movie-icon" src="{{ asset('image/adminlte/movie/movie-icon.svg') }}" alt=""> -->
						<video v-else class="preview-movie" :src="moviePreview" controls></video>
						<input type="file" name="movie" accept="video/mp4,video/webm" @change="previewMovie">
					</label>
					<img v-if="moviePreview" class="preview-close-btn" src="{{ asset('image/adminlte/movie/preview-close-btn.svg') }}" alt="" @click="resetPreview">
				</div>
			</div>
			<div class="form-note-box">
				<p>※ ファイルサイズは10MB以下としてください。</p>
				<p>※ 使用可能な拡張子は「 mp4 / webm 」です。</p>
				<p>※ 以下、推奨値となります。<br>　・アスペクト比　：9 / 16<br>　・フレーム幅　　：1440px<br>　・フレーム高　　：2560px<br>　・フレームレート：60fps</p>
			</div>
			<span v-if="errorMessage" class="invalid-feedback d-block">
				<strong v-text="errorMessage"></strong>
			</span>
			@error('movie')
				<span class="invalid-feedback d-block" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>

		<script src="https://unpkg.com/vue@3/dist/vue.global.prod.js"></script>
		<script>
			const { createApp, ref } = Vue;
			createApp({
				setup() {
					const moviePreview = ref(null);
					const errorMessage = ref('');
					const allowedExtensions = ['mp4', 'webm'];

					const previewMovie = (event) => {
						const file = event.target.files[0];
						console.log(file);
						if (!file) {
							resetFileInput();
							return;
						}
						const extension = file.name.split('.').pop().toLowerCase();
						if (!allowedExtensions.includes(extension)) {
							moviePreview.value = null;
							errorMessage.value = '対応している動画形式は「 mp4 / webm 」のいずれかです。';
							resetFileInput();
							return;
						}
						if (file.size > 10 * 1024 * 1024) {
							errorMessage.value = 'ファイルサイズが10MBを超えています。';
							resetFileInput();
							return;
						}
						errorMessage.value = '';

						const reader = new FileReader();
						reader.onload = e => {
							moviePreview.value = e.target.result;
							errorMessage.value = '';
						};
						reader.readAsDataURL(file);
					};

					const resetPreview = () => {
						moviePreview.value = null;
						errorMessage.value = '';
						resetFileInput();
					};
					const resetFileInput = () => {
						const fileInput = document.querySelector('input[name="movie"]');
						if (fileInput) {
							fileInput.value = '';
						}
					};

					return {
						moviePreview,
						errorMessage,
						previewMovie,
						resetPreview
					};
				}
			}).mount('#movie');
		</script>

		{{-- ファイル名 --}}
		<div class="d-block">
			<x-adminlte-input name="filename" label="ファイル名" label-class="required" placeholder="ファイル名" value="{{ old('filename') }}"/>
			<div class="form-note-box">
				<p>※ アルファベット、数字、-（ ハイフン ）のみ使用可能です。</p>
			</div>
		</div>

		@php
			$next_movie_fields = ['next_movie_id1', 'next_movie_id2', 'next_movie_id3'];
		@endphp

		{{-- 次の動画 --}}
		<div class="d-block">
			<div class="form-group">
				<label>次の動画</label>
				@foreach($next_movie_fields as $field)
					<x-adminlte-select name="{{ $field }}" fgroup-class="select-box">
						<option value="" selected>選択してください</option>
						@foreach($next_movies as $id => $title)
							<option value="{{ $id }}" {{ old($field) == $id ? 'selected' : '' }}>
								{{ $title }}
							</option>
						@endforeach
					</x-adminlte-select>
				@endforeach
			</div>
		</div>

		@php
			$conversion_types = [
				'電話',
				'リンク（ ラクラク査定 ）',
			];
		@endphp

		{{-- コンバージョン種別 --}}
<!-- 		<div class="d-block">
			<div class="form-group">
				<label class="required">コンバージョン種別</label>
				<div class="radio-box">
					@foreach($conversion_types as $conversion_type)
						<div class="radio-ele">
							<input type="radio" id="conversion_type_{{ $loop->iteration }}" name="conversion_type" value="{{ $conversion_type }}" {{ old('conversion_type') == $conversion_type ? 'checked' : '' }}>
							<label for="conversion_type_{{ $loop->iteration }}">
								{{ $conversion_type }}
							</label>
						</div>
					@endforeach
				</div>
				@error('conversion_type')
					<span class="invalid-feedback d-block" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
		</div> -->

		{{-- 表示フラグ --}}
		<input type="hidden" name="is_visible" value="0">

		@php
			$today = \Carbon\Carbon::today()->format('Y-m-d');
		@endphp
		{{-- 有効期限 --}}
		<div class="d-block period-box">
			<x-adminlte-input-date name="expired_at" label="有効期限" :config="['format' => 'YYYY-MM-DD', 'minDate' => $today]" value="{{ old('expired_at') }}">
				<x-slot name="prependSlot">
					<div class="input-group-text bg-gradient-info">
						<i class="fas fa-calendar-alt"></i>
					</div>
				</x-slot>
			</x-adminlte-input-date>
			<div class="form-note-box">
				<p>※ キャンペーン情報などで「 ●/●日まで 」というセリフがある場合、設定してください。</p>
				<p>※ 有効期限を過ぎると、動画は視聴できなくなります。</p>
			</div>
		</div>

		{{-- 台本 --}}
		<div class="d-block">
			<x-adminlte-textarea name="script" label="台本" placeholder="台本を入力してください。" rows="7">{{ old('script') }}</x-adminlte-textarea>
		</div>

		{{-- メモ --}}
		<div class="d-block">
			<x-adminlte-textarea name="memo" label="メモ" placeholder="公開期間や再生回数などを自由に入力してください。" rows="7">{{ old('memo') }}</x-adminlte-textarea>
		</div>


		{{-- 登録ボタン --}}
		<x-adminlte-button label="登録する" class="register-btn" type="submit"/>
	</form>
@stop

@section('js')
	@vite('resources/js/admin/movie.js')
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.30.1/moment.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.30.1/locale/ja.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js"></script>
	<script>
		moment.locale('ja');

		const selects = $('#next_movie_id1, #next_movie_id2, #next_movie_id3');
		function updateColor(select) {
			if (select.selectedIndex === 0) {
				$(select).css('color', '#888');
			} else {
				$(select).css('color', '#495057');
			}
		};
		selects.each(function() {
			updateColor(this);
		});
		selects.on('change', function() {
			updateColor(this);
		});
	</script>
@endsection