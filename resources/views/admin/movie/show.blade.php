@extends('adminlte::page')

@section('title', '動画管理｜詳細')

@section('css')
	<link rel="stylesheet" href="{{ asset('css/adminlte/movie.css') }}">
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
					$filename = $movie->filename . '.mp4';10
				@endphp
			   <video class="preview-movie" src="{{ asset('movie/uploader/' . $filename) }}" controls></video>
			</div>
			<p><strong>タイトル：</strong>{{ $movie->title }}</p>
			<p><strong>次の動画：</strong></p>
			<div class="next-box">
				<div class="next-ele">
					<p class="order">動画1 ：</p>
					<p class="next-tit">{{ $movie->nextMovie1->title ?? '---' }}</p>
					@if (optional($movie->nextMovie1)->expired_at)
						@php
							$expiredAt = \Carbon\Carbon::parse($movie->nextMovie1->expired_at);
							$isExpired = $expiredAt->isPast();
						@endphp
						<p class="expired {{ $isExpired ? 'is-error' : '' }}">（ 有効期限 {{ $expiredAt->format('Y年 n月 j日') }} ）</p>
					@endif
				</div>
				<div class="next-ele">
					<p class="order">動画2 ：</p>
					<p class="next-tit">{{ $movie->nextMovie2->title ?? '---' }}</p>
					@if (optional($movie->nextMovie2)->expired_at)
						@php
							$expiredAt = \Carbon\Carbon::parse($movie->nextMovie2->expired_at);
							$isExpired = $expiredAt->isPast();
						@endphp
						<p class="expired {{ $isExpired ? 'is-error' : '' }}">（ 有効期限 {{ $expiredAt->format('Y年 n月 j日') }} ）</p>
					@endif
				</div>
				<div class="next-ele">
					<p class="order">動画3 ：</p>
					<p class="next-tit">{{ $movie->nextMovie3->title ?? '---' }}</p>
					@if (optional($movie->nextMovie3)->expired_at)
						@php
							$expiredAt = \Carbon\Carbon::parse($movie->nextMovie3->expired_at);
							$isExpired = $expiredAt->isPast();
						@endphp
						<p class="expired {{ $isExpired ? 'is-error' : '' }}">（ 有効期限 {{ $expiredAt->format('Y年 n月 j日') }} ）</p>
					@endif
				</div>
			</div>
			<!-- <p><strong>コンバージョン種別：</strong>{{ $movie->conversion_type }}</p> -->
			<p><strong>有効期限：</strong>{{ $movie->expired_at ? \Carbon\Carbon::parse($movie->expired_at)->format('Y年 n月 j日') : '---' }}</p>
			<div class="memmo-box bg-light rounded border">
				<strong>台本：</strong>
				{!! nl2br(e($movie->script)) !!}
			</div>
			<div class="memmo-box bg-light rounded border">
				<strong>メモ：</strong>
				{!! nl2br(e($movie->memo)) !!}
			</div>
		</div>
		<div class="card-footer">
			<a href="{{ route('admin.movie.index') }}" class="btn btn-secondary">
				<i class="fas fa-arrow-left"></i> 一覧へ戻る
			</a>
			<a href="{{ route('admin.movie.edit', $movie->id) }}" class="btn btn-warning">
				<i class="fas fa-edit"></i> 編集
			</a>
		</div>
	</div>
@stop