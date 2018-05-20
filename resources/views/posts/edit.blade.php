@extends('layout')

@section('content')
<h1>Edit existing post</h1>

<form action="/posts/{{$post->id}}" method="POST">
	{{ csrf_field() }}
	{{ method_field('PATCH') }}

	<label for="title">Title:</label><br>
	<input type="text" name="title" id="title" required value="{{$post->title}}">
	<br>
	<br>

	<label for="content_md">Content:</label><br>
	<textarea name="content_md" id="content_md" cols="80" rows="20">{{$post->content_md}}</textarea>
	<br>
	<br>
	

	<button type="submit">Submit</button>
</form>

@endsection