@extends('layout')

@section('content')
	@isset($homePage)
		<section class="searchbar-wrapper">
			<h1>What are you looking for?</h1>
			<form action="/posts" method="GET">
				<input type="search" placeholder="Search" name="search">
				<button type="submit">
					<img class="search-icon" src="/img/search.svg">
				</button>
			</form>
		</section>
	@endisset
	<section class="posts-list"> 
		<h1>Latest Posts</h1>
		@forelse ($latestPosts as $post)
			<div class="post-list-item">
				<h2 class="post-title"><a href='/posts/{{$post['id']}}'>{{ $post['title'] }}</a></h2>
				<p class="post-excerpt">{{ str_limit($post['content_md'], $limit = 150, $end = '...') }}</p>
			</div>
		@empty
			<p>There are no posts yet. <a href="/posts/new">Click here</a> to create your first one!</p>
		@endforelse
	</section>
	<section class="categories">
		<h1>Categories</h1>
		@if (count($categories))
			<ul>
				@foreach ($categories as $category)
					<li>
						<a href="/posts?category={{$category->name}}">{{ $category->name }}</a>{{ $loop->last ? '' : ', ' }}
					</li>
				@endforeach
			</ul>
		@else
			<p>There are no categories yet. You can create one by assigning it to a new or existing post.</p>
		@endif
	</section>
@endsection