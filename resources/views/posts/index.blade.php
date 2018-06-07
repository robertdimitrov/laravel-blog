@extends('layout')

@section('content')
	<section class="posts-list">

		@if (!empty($search))
			@if(!empty($category))
				<h1>Results for &quot;<span class="search-query">{{ $search }}</span>&quot; in category <a href="/posts?category={{ $category }}">{{ $category }}</a></h1> 
			@else
				<h1>Results for: <span class="search-query">{{ $search }}</h1>
			@endif
		@else
			@if(!empty($category))
				<h1>Posts in category <a href="/posts?category={{ $category }}">{{ $category }}</a></h1>
			@else
				<h1>All Posts</h1>
			@endif
		@endif

		@forelse ($posts as $post)
			<div class="post-list-item">
				<h2><a href='/posts/{{$post['id']}}'>{{ $post['title'] }}</a></h2>
				<p>{{ str_limit($post['content_md'], $limit = 150, $end = '...') }}</p>
			</div>
		@empty
			<p>No posts found.</p>
		@endforelse

		<div class="pagination">
			{{ $postsCount }}
		</div>
	</section>
@endsection