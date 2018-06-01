<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Laravel Blog</title>
	<link rel="stylesheet" href="css/app.css">
	<script src="js/app.js"></script>
</head>
<body>
	
	<main>
	@yield('content')
	</main>

	{{-- @include('layouts.errors') --}}
</body>
</html>