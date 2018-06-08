<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Laravel Blog</title>
	<link rel="stylesheet" href="/css/app.css">
</head>
<body @isset($homePage)class="homepage"@endisset>
	@auth
		@include('layouts.header')
	@endauth
	
	<main>
		@yield('content')
	</main>

	@auth
		@include('layouts.footer')
	@endauth

	<script src="/js/app.js"></script>
</body>
</html>