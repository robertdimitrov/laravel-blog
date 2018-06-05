@extends('layout')

@section('content')
<section class="post">
	<form class="button-link-form edit-post" action="/posts/{{$post->id}}/edit" method="GET">
		{{ csrf_field() }}
		<button class="button button-link animated-link" type="submit">Edit</button>
	</form>
	<form class="button-link-form delete-post" action="/posts/{{$post->id}}" method="POST">
		{{ csrf_field() }}
		{{ method_field('DELETE') }}

		<button class="button button-link animated-link" type='submit'>Delete</button>
	</form>
	<h1>{{$post->title}}</h1>
	<p>{!! $post->content_html !!}</p>
	@if (count($post->categories))
		<h6>Categories:</h6>
		<ul>
			@foreach ($post->categories as $category)
				<li>
					{{ $category->name }}
				</li>
			@endforeach
		</ul>
	@endif
</section>
@endsection