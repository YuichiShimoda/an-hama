@extends('adminlte::page')

@section('title', '動画管理｜詳細')

@section('css')
	<link rel="stylesheet" href="{{ asset('css/adminlte/video.css') }}">
@stop

@section('classes_body', 'page-show')

@section('content_header')
	<div class="tit-box">
		<h1>動画管理｜詳細</h1>
	</div>
@stop

@section('content')
	<div class="card">
		<div class="card-body">
			<div class="file-box">
				@php
					$filename = $video->filename . '.mp4';10
				@endphp
			   <video class="preview-video" src="{{ asset('video/uploader/' . $filename) }}" controls></video>
			   <p class="filename">ファイル名：{{ $video->filename }}</p>
			</div>
			<p><strong>タイトル：</strong>{{ $video->title }}</p>
			<p><strong>公開終了日時：</strong>{{ $video->expired_at ? \Carbon\Carbon::parse($video->expired_at)->format('Y年 n月 j日 H:i') : '---' }}</p>
			<p><strong>ボタンラベル：</strong>{{ $video->btn_title }}</p>
			<div class="memmo-box bg-light rounded border">
				<strong>メモ１【 動画内のセリフなど 】：</strong>
				{!! nl2br(e($video->script)) !!}
			</div>
			<div class="memmo-box bg-light rounded border">
				<strong>メモ２【 管理用の備考 】：</strong>
				{!! nl2br(e($video->memo)) !!}
			</div>
			<p><strong>連続再生する動画：</strong></p>
			<div class="next-box">
				<div class="next-ele">
					<p class="order">動画1 ：</p>
					<p class="next-tit">{{ $video->nextVideo1->title ?? '---' }}</p>
					@if (optional($video->nextVideo1)->expired_at)
						@php
							$expiredAt = \Carbon\Carbon::parse($video->nextVideo1->expired_at);
							$isExpired = $expiredAt->isPast();
						@endphp
						<p class="expired {{ $isExpired ? 'is-error' : '' }}">公開終了日時 {{ $video->nextVideo1->expired_at ? \Carbon\Carbon::parse($video->nextVideo1->expired_at)->format('Y年 n月 j日 H:i') : '---' }}</p>
					@endif
				</div>
				<div class="next-ele">
					<p class="order">動画2 ：</p>
					<p class="next-tit">{{ $video->nextVideo2->title ?? '---' }}</p>
					@if (optional($video->nextVideo2)->expired_at)
						@php
							$expiredAt = \Carbon\Carbon::parse($video->nextVideo2->expired_at);
							$isExpired = $expiredAt->isPast();
						@endphp
						<p class="expired {{ $isExpired ? 'is-error' : '' }}">公開終了日時 {{ $video->nextVideo2->expired_at ? \Carbon\Carbon::parse($video->nextVideo2->expired_at)->format('Y年 n月 j日 H:i') : '---' }}</p>
					@endif
				</div>
				<div class="next-ele">
					<p class="order">動画3 ：</p>
					<p class="next-tit">{{ $video->nextVideo3->title ?? '---' }}</p>
					@if (optional($video->nextVideo3)->expired_at)
						@php
							$expiredAt = \Carbon\Carbon::parse($video->nextVideo3->expired_at);
							$isExpired = $expiredAt->isPast();
						@endphp
						<p class="expired {{ $isExpired ? 'is-error' : '' }}">公開終了日時 {{ $video->nextVideo3->expired_at ? \Carbon\Carbon::parse($video->nextVideo3->expired_at)->format('Y年 n月 j日 H:i') : '---' }}</p>
					@endif
				</div>
			</div>
		</div>
		<div class="card-footer">
			<a href="{{ route('admin.video.index') }}" class="btn btn-secondary">
				<i class="fas fa-arrow-left"></i> 一覧へ戻る
			</a>
			<a href="{{ route('admin.video.edit', $video->id) }}" class="btn btn-warning">
				<i class="fas fa-edit"></i> 編集
			</a>
		</div>
	</div>
@stop