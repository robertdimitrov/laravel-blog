<header @isset($homePage)class="homepage-header"@endisset>
	<div class="logo-wrapper">
		<a href="/">
			<img src="/img/logo.svg" alt="Logo">
		</a>
	</div>

	@empty($homePage)
		<div class="searchbar-wrapper">
			<form action="/posts" method="GET">
				<input type="search" placeholder="Search" name="search">
				<button type="submit">
					<img class="search-icon" src="/img/search.svg">
				</button>
			</form>
		</div>
	@endempty

	<div class="buttons-wrapper">
		<ul>
			<li>
				<a class="animated-link" href="/posts/random">Random</a>
			</li>
			<li>
				<a class="animated-link" href="/posts/new">New Post</a>
			</li>
		</ul>
	</div>
</header>