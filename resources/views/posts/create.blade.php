@extends('layout')

@section('content')
<h1>Create new post</h1>
<form action="/posts" method="POST">
	{{ csrf_field() }}

	<label for="title">Title:</label><br>
	<input type="text" name="title" id="title" required>
	<br>
	<br>

	<label for="content_md">Content:</label><br>
	<textarea name="content_md" id="content_md" cols="80" rows="20"></textarea>
	<br>
	<br>

	<label for="categories">Categories:</label><br>
	<input type="text" name="categories" id="categories" required>
	<br>
	<br>

	<button type="submit">Submit</button>
</form>
@endsection