@extends('layout')

@section('content')
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
<a href="/posts/{{$post->id}}/edit"><button>Edit</button></a>
<form action="/posts/{{$post->id}}" method="POST">
	{{ csrf_field() }}
	{{ method_field('DELETE') }}

	<button type='submit'>Delete</button>
</form>
@endsection