@extends('layout')

@section('content')
	<h1>Posts</h1>
	@forelse ($posts as $post)
		<h2><a href='/posts/{{$post->id}}'>{{ $post->title }}</a></h2>
		<p>{{ str_limit($post->content_md, $limit = 150, $end = '...') }}</p>
		<hr>
	@empty
		<p>No posts found</p>
	@endforelse
@endsection