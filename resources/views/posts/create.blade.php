@extends('layout')

@section('content')
<section>
	<h1>Create a new post</h1>
	<div class="form-wrapper">
		<form class="post-form" action="/posts" method="POST">
			{{ csrf_field() }}

			<div class="form-input-group">
				<label for="title">Title:</label>
				<input type="text" name="title" id="title" required>
			</div>

			<div class="form-input-group">
				<label for="content_md">Content:</label>
				<textarea name="content_md" id="content_md" cols="80" rows="20"></textarea>
			</div>

			<div class="form-input-group">
				<label for="categories">Categories:</label>
				<input type="text" name="categories" id="categories">
			</div>

			<button class="button button-animated" type="submit">Create post</button>
		</form>
	</div>
</section>
@endsection