<!DOCTYPE html>
<html>
	<head>
		@hasSection('title')
			<title>@yield('title') | {{ config('app.title') }}</title>
		@else
			<title>{{ config('app.title') }}</title>
		@endif
		@hasSection('description')
			<meta name="description" content="@yield('description')">
		@else
			<meta name="description" content="{{ config('app.description') }}">
		@endif
		@include('inc.head')
	</head>
	<body>
		<header>
			@include('inc.header')
		</header>

		<main>
			@yield('content')
		</main>

		<footer>
			@include('inc.footer')
		</footer>
	</body>
</html>