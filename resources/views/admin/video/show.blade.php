@extends('adminlte::page')

@section('title', '動画管理｜詳細')

@section('css')
	<link rel="stylesheet" href="{{ asset('css/adminlte/video.css') }}">
@stop

@section('classes_body', 'page-show')

@section('content_header')
	<div class="tit-box">
		<h1>動画管理｜詳細</h1>
		<div class="date-show-box">
			<p class="created-at">新規作成日時：{{ $video->created_at->format('Y-m-d H:i') }}</p>
			<p class="updated-at">更新日時：{{ $video->updated_at->format('Y-m-d H:i') }}</p>
		</div>
	</div>
@stop

@section('content')
	<div class="card">
		<div class="card-body">
			<div class="file-box">
				@php
					$filename = $video->filename . '.mp4';
				@endphp
			   <video class="preview-video" src="{{ asset('video/uploader/' . $filename) }}" controls></video>
			   <p class="filename">ファイル名：{{ $video->filename }}</p>
			</div>
			<p><strong>タイトル：</strong>{{ $video->title }}</p>
			<p><strong>管理No,：</strong>{{ sprintf('%04d', $video->id) }}</p>
			<p><strong>ボタンラベル：</strong>{{ $video->btn_title }}</p>
			<p><strong>公開終了日時：</strong>{{ $video->expired_at ? \Carbon\Carbon::parse($video->expired_at)->format('Y年 n月 j日 H:i') : '---' }}</p>
			<p><strong>連続再生する他の動画：</strong></p>
			<div class="next-box">
				<div class="next-ele">
					<p class="order">動画1 ：</p>
					<p class="next-tit">
					@if(isset($video->nextVideo1) && $video->nextVideo1->id)
						{{ sprintf('%04d', $video->nextVideo1->id) }}　{{ $video->nextVideo1->btn_title }}
					@else
						---
					@endif
					</p>
					@if (optional($video->nextVideo1)->expired_at)
						@php
							$expiredAt = \Carbon\Carbon::parse($video->nextVideo1->expired_at);
							$isExpired = $expiredAt->isPast();
						@endphp
						<p class="expired {{ $isExpired ? 'is-error' : '' }}">{{ $video->nextVideo1->expired_at ? \Carbon\Carbon::parse($video->nextVideo1->expired_at)->format('Y年 n月 j日 H:i') : '---' }}</p>
					@endif
				</div>
				<div class="next-ele">
					<p class="order">動画2 ：</p>
					<p class="next-tit">
					@if(isset($video->nextVideo2) && $video->nextVideo2->id)
						{{ sprintf('%04d', $video->nextVideo2->id) }}　{{ $video->nextVideo2->btn_title }}
					@else
						---
					@endif
					</p>
					@if (optional($video->nextVideo2)->expired_at)
						@php
							$expiredAt = \Carbon\Carbon::parse($video->nextVideo2->expired_at);
							$isExpired = $expiredAt->isPast();
						@endphp
						<p class="expired {{ $isExpired ? 'is-error' : '' }}">{{ $video->nextVideo2->expired_at ? \Carbon\Carbon::parse($video->nextVideo2->expired_at)->format('Y年 n月 j日 H:i') : '---' }}</p>
					@endif
				</div>
				<div class="next-ele">
					<p class="order">動画3 ：</p>
					<p class="next-tit">
					@if(isset($video->nextVideo3) && $video->nextVideo3->id)
						{{ sprintf('%04d', $video->nextVideo3->id) }}　{{ $video->nextVideo3->btn_title }}
					@else
						---
					@endif
					</p>
					@if (optional($video->nextVideo3)->expired_at)
						@php
							$expiredAt = \Carbon\Carbon::parse($video->nextVideo3->expired_at);
							$isExpired = $expiredAt->isPast();
						@endphp
						<p class="expired {{ $isExpired ? 'is-error' : '' }}">{{ $video->nextVideo3->expired_at ? \Carbon\Carbon::parse($video->nextVideo3->expired_at)->format('Y年 n月 j日 H:i') : '---' }}</p>
					@endif
				</div>
			</div>
			<div class="memmo-box bg-light rounded border">
				<strong>メモ１【 動画内のセリフなど 】：</strong>
				{!! nl2br(e($video->script)) !!}
			</div>
			<div class="memmo-box bg-light rounded border">
				<strong>メモ２【 管理用の備考 】：</strong>
				{!! nl2br(e($video->memo)) !!}
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