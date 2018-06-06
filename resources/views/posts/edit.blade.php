@extends('layout')

@section('content')
<section>
	<h1>Edit post</h1>
	<div class="form-wrapper">
		<form class="post-form" action="/posts/{{$post->id}}" method="POST">
			{{ csrf_field() }}
			{{ method_field('PATCH') }}

			<div class="form-input-group">
				<label for="title">Title:</label>
				<input type="text" name="title" id="title" required value="{{$post->title}}">
			</div>

			<div class="form-input-group">
				<label for="content_md">Content:</label>
				<textarea name="content_md" id="content_md" cols="80" rows="20">{{$post->content_md}}</textarea>
			</div>

			<div class="form-input-group">
				<label for="categories">Categories:</label>
				<input type="text" name="categories" id="categories" value="{{ $categories }}">
			</div>			

			<button class="button button-animated button-success" type="submit">Update post</button>
		</form>
</div>
</section>
@endsection