@extends('layout')

@section('content')
<article class="post">
	<form class="button-link-form edit-post" action="/posts/{{$post->id}}/edit" method="GET">
		{{ csrf_field() }}
		<button class="button button-link animated-link" type="submit">Edit</button>
	</form>
	<form class="button-link-form delete-post" action="/posts/{{$post->id}}" method="POST">
		{{ csrf_field() }}
		{{ method_field('DELETE') }}

		<button class="button button-link animated-link" type='submit'>Delete</button>
	</form>
	<h1 class="title">{{$post->title}}</h1>
	<div class="meta">
		<span class="creation-date">{{$post->created_at->toFormattedDateString()}}</span>
		@if (count($post->categories))
			<div class="categories">
				<span class="categories-label">Categories:</span>
				<ul>
					@foreach ($post->categories as $category)
						<li>
							<a href="/posts?category={{$category->name}}">{{ $category->name }}</a>{{ $loop->last ? '' : ', ' }}
						</li>
					@endforeach
				</ul>
			</div>
		@endif
	</div>
	<div class="content-wrapper">
		{!! $post->content_html !!}
	</div>
	
</article>
@endsection