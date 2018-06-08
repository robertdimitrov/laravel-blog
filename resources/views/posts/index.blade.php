@extends('layout')

@section('content')
	<section class="posts-list">

		@if (!empty($search))
			@if(!empty($category))
				<h1>Results for &quot;<span class="search-query">{{ $search }}</span>&quot; in category <a href="/posts?category={{ $category }}">{{ $category }}</a></h1> 
			@else
				<h1>Results for &quot;<span class="search-query">{{ $search }}</span>&quot;</h1>
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
				<h2 class="post-title"><a href='/posts/{{$post['id']}}'>{{ $post['title'] }}</a></h2>
				<p class="post-excerpt">{{ str_limit($post['content_md'], $limit = 150, $end = '...') }}</p>
			</div>
		@empty
			<p>No posts found.</p>
		@endforelse

		<div class="pagination">
			@php
				$query = '?';
				if ($search)
				{
					$query = $query . 'search=' . $search;
				}
				if ($category)
				{
					$query = $query . '&category=' . $category;
				}
				$page = (int) $page;
				if ($page < 1) 
				{
					$page = 1;
				}
			@endphp
			@if ($page > 1)
				<a class="previous" href="/posts{{ $query }}page={{ $page - 1 }}"">Previous</a>
			@endif

			@if ($postsCount > $page * 10)
				<a class="next" href="/posts{{ $query }}page={{ $page + 1 }}">Next</a>
			@endif
		</div>
	</section>
@endsection