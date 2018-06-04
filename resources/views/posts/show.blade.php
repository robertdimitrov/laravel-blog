@extends('layout')

@section('content')
<section class="post">
	<h1>{{$post->title}}</h1>
	<p>{!! $post->content_html !!}</p>
	<h6>Categories:</h6>
	@if (count($post->categories))
		<ul>
			@foreach ($post->categories as $category)
				<li>
					{{ $category->name }}
				</li>
			@endforeach
		</ul>
	@endif
	<form action="/posts/{{$post->id}}/edit" method="GET">
		{{ csrf_field() }}
		<button class="button button-animated button-info" type="submit">Edit</button>
	</form>
	<form action="/posts/{{$post->id}}" method="POST">
		{{ csrf_field() }}
		{{ method_field('DELETE') }}

		<button class="button button-animated" type='submit'>Delete</button>
	</form>
</section>
@endsection