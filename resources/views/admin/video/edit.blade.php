@extends('adminlte::page')

@section('title', '動画管理｜編集')

@section('css')
	<link rel="stylesheet" href="{{ asset('css/adminlte/video.css') }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css" />
@stop

@section('classes_body', 'page-edit')

@section('content_header')
	<div class="tit-box">
		<h1>動画管理｜編集</h1>
		<a href="{{ route('admin.video.index') }}" class="back-btn">
			<p>一覧に戻る</p>
		</a>
	</div>
@stop

@section('content')
	<form action="{{ route('admin.video.update', $video->id) }}" method="POST" enctype="multipart/form-data">
		@csrf
		@method('PUT')

		{{-- タイトル --}}
		<div class="d-block">
			<x-adminlte-input name="title" label="タイトル" label-class="required" placeholder="タイトル" value="{{ old('title', $video->title) }}"/>
			<div class="form-note-box">
				<p>※ 管理用のタイトルです。</p>
				<p>※ このタイトルはHP側には表示されません。</p>
			</div>
		</div>

		@php
			$expiredDate = $video->expired_at ? \Carbon\Carbon::parse($video->expired_at)->format('Y-m-d H:i') : null;
		@endphp
		{{-- 公開終了日時 --}}
		<div class="d-block period-box">
			<x-adminlte-input-date name="expired_at" label="公開終了日時"
				:config="[
					'format' => 'YYYY-MM-DD HH:mm',
					'stepping' => 15,
					'display' => [
						'keepOpen' => false,
						'buttons' => [
							'close' => true
						]
					]
				]"
				value="{{ old('expired_at', $expiredDate) }}">
				<x-slot name="prependSlot">
					<div class="input-group-text bg-gradient-info">
						<i class="fas fa-calendar-alt"></i>
					</div>
				</x-slot>
			</x-adminlte-input-date>
			<div class="form-note-box">
				<p>※ 特別営業などで「 ●/●日まで 」というセリフがある場合、設定してください。</p>
				<p>※ 公開終了日時を過ぎると、動画は視聴できなくなります。</p>
			</div>
		</div>

		{{-- 公開する動画 --}}
		@php
			$videoFileName = old('filename', $video->filename ?? null);
			$initialVideoUrl = $videoFileName ? asset('video/uploader/' . $videoFileName . '.mp4') : null;
		@endphp
		<input type="hidden" name="delete_video" value="0">
		<div id="video" class="d-block">
			<div class="form-group">
				<label class="required">公開する動画</label>
				<div class="file-upload-box">
					<label class="file-upload-label">
						<img v-if="!videoPreview" class="plus-icon" src="{{ asset('image/adminlte/video/plus-icon.svg') }}" alt="">
						<!-- <img v-if="!videoPreview" class="video-icon" src="{{ asset('image/adminlte/video/video-icon.svg') }}" alt=""> -->
						<video v-else class="preview-video" :src="videoPreview" controls></video>
						<input type="file" name="video" accept="video/mp4,video/webm" @change="previewVideo">
					</label>
					<img v-if="videoPreview" class="preview-close-btn" src="{{ asset('image/adminlte/video/preview-close-btn.svg') }}" alt="" @click="resetPreview">
				</div>
			</div>
			<div class="d-block" style="margin-top: 5px;">
				<x-adminlte-input id="filename_display" name="filename_display" value="{{ old('filename', $video->filename) }}" readonly/>
				<input type="hidden" name="filename" value="{{ old('filename', $video->filename) }}">
			</div>
			<div class="form-note-box">
				<p>※ ファイルサイズは10MB以下としてください。</p>
				<p>※ 使用可能な拡張子は「 mp4 / webm 」です。</p>
				<p>※ 以下、推奨値となります。<br>　・アスペクト比　：9 / 16<br>　・フレーム幅　　：1440px<br>　・フレーム高　　：2560px<br>　・フレームレート：60fps</p>
			</div>
			<span v-if="errorMessage" class="invalid-feedback d-block">
				<strong v-text="errorMessage"></strong>
			</span>
			@error('video')
				<span class="invalid-feedback d-block" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>

		{{-- ファイル名 --}}
<!-- 		<div class="d-block">
			<x-adminlte-input name="filename" label="ファイル名" label-class="required" placeholder="ファイル名" value="{{ old('filename', $video->filename) }}"/>
			<div class="form-note-box">
				<p>※ アルファベット、数字、-（ ハイフン ）のみ使用可能です。</p>
			</div>
		</div> -->

		{{-- ボタンラベル --}}
		<div class="d-block">
			<x-adminlte-input name="btn_title" label="ボタンラベル" label-class="required" placeholder="ディナータイム特別営業" value="{{ old('btn_title', $video->btn_title) }}"/>
			<div class="form-note-box">
				<p>※ 上部の「 公開する動画 」の実質的なタイトルです。</p>
				<p>※ 動画内のボタンに表示する文言です。</p>
				<p>※ 11文字以内で入力してください。</p>
			</div>
		</div>

		<script src="https://unpkg.com/vue@3/dist/vue.global.prod.js"></script>
		<script>
			const initialVideoUrl = @json($initialVideoUrl);
			const { createApp, ref } = Vue;
			createApp({
				setup() {
					const videoPreview = ref(initialVideoUrl);
					const errorMessage = ref('');
					const allowedExtensions = ['mp4', 'webm'];

					const previewVideo = (event) => {
						const file = event.target.files[0];
						if (!file) {
							resetFileInput();
							return;
						}
						const extension = file.name.split('.').pop().toLowerCase();
						if (!allowedExtensions.includes(extension)) {
							videoPreview.value = null;
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

						const nameWithoutExtension = file.name.substring(0, file.name.lastIndexOf('.'));
						const displayInput = document.querySelector('#filename_display');
						if (displayInput) displayInput.value = nameWithoutExtension;
						const hiddenInput = document.querySelector('input[type="hidden"][name="filename"]');
						if (hiddenInput) hiddenInput.value = nameWithoutExtension;

						const reader = new FileReader();
						reader.onload = e => {
							videoPreview.value = e.target.result;
							errorMessage.value = '';
						};
						reader.readAsDataURL(file);
					};

					const resetPreview = () => {
						videoPreview.value = null;
						errorMessage.value = '';
						resetFileInput();
						const deleteFlag = document.querySelector('input[name="delete_video"]');
						if (deleteFlag) {
							deleteFlag.value = '1';
						}
						const displayInput = document.querySelector('#filename_display');
						if (displayInput) displayInput.value = '';
						const hiddenInput = document.querySelector('input[type="hidden"][name="filename"]');
						if (hiddenInput) hiddenInput.value = '';
					};
					const resetFileInput = () => {
						const fileInput = document.querySelector('input[name="video"]');
						if (fileInput) {
							fileInput.value = '';
						}
					};

					return {
						videoPreview,
						errorMessage,
						previewVideo,
						resetPreview
					};
				}
			}).mount('#video');
		</script>

		{{-- スタンバイ --}}
        <div class="d-block">
            <div class="form-group">
                <label>スタンバイ</label>
                <div class="toggle-box">
                    <label class="toggle-label" for="is_visible">
						<input type="hidden" name="is_visible" value="0">
                        <input type="checkbox" id="is_visible" name="is_visible" value="1" {{ old('is_visible', $video->is_visible) ? 'checked' : '' }}>
                    </label>
                </div>
            </div>
			<div class="form-note-box">
				<p>※ ONで上部の「 公開する動画 」が「 連続再生する他の動画 」で選択可能になります。OFFだと選択設定に表示されません。</p>
			</div>
            @error('is_visible')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

		@php
			$next_video_fields = ['next_video_id1', 'next_video_id2', 'next_video_id3'];
		@endphp

		{{-- 連続再生する他の動画 --}}
		<div class="d-block">
			<div class="form-group">
				<label>連続再生する他の動画</label>
				@foreach($next_video_fields as $field)
					<x-adminlte-select name="{{ $field }}" fgroup-class="select-box">
						<option value="" selected>選択してください</option>
						{{-- @foreach($next_videos as $id => $title)
							<option value="{{ $id }}" {{ old($field, $video->{$field}) == $id ? 'selected' : '' }}>
								{{ $title }}
							</option>
						@endforeach --}}
						{{-- @foreach($next_videos as $item)
							<option value="{{ $item->id }}" {{ old($field, $video->{$field}) == $item->id ? 'selected' : '' }}>
								{{ $item->title }}
								@if(!empty($item->btn_title))
									- {{ $item->btn_title }}
								@endif
							</option>
						@endforeach --}}
						@foreach($next_videos as $item)
							<option value="{{ $item->id }}" {{ old($field, $video->{$field}) == $item->id ? 'selected' : '' }}>
								{{ $item->title }}　管理No,{{ $item->id }}　{{ $item->expired_at ? \Carbon\Carbon::parse($item->expired_at)->format('Y-m-d H:i') : '---' }}
							</option>
						@endforeach
					</x-adminlte-select>
				@endforeach
			</div>
			<div class="form-note-box">
				<p>※ 事前に選択設定する動画の「 管理No, 」をチェックし、間違えないように選択してください。</p>
				<p>※ ………</p>
			</div>
		</div>

		{{-- メモ１ --}}
		<div class="d-block">
			<x-adminlte-textarea name="script" label="メモ１【 動画内のセリフなど 】" placeholder="動画内のセリフなどを入力してください。" rows="7">{{ old('script', $video->script) }}</x-adminlte-textarea>
		</div>

		{{-- メモ２ --}}
		<div class="d-block">
			<x-adminlte-textarea name="memo" label="メモ２【 管理用の備考 】" placeholder="管理用の備考を入力してください。" rows="7">{{ old('memo', $video->memo) }}</x-adminlte-textarea>
		</div>


		{{-- 更新ボタン --}}
		<x-adminlte-button label="更新する" class="register-btn" type="submit"/>
	</form>
@stop

@section('js')
	@vite('resources/js/admin/video.js')
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.30.1/moment.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.30.1/locale/ja.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js"></script>
	<script>
		moment.locale('ja');

		const selects = $('#next_video_id1, #next_video_id2, #next_video_id3');
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