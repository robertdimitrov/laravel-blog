<header @isset($homePage)class="homepage-header"@endisset>
	<div class="logo-wrapper">
		<a href="/">
			<img src="/img/logo.svg" alt="Logo">
		</a>
	</div>

	@empty($homePage)
		<div class="searchbar-wrapper">
			<p>Search bar comes here</p>
		</div>
	@endempty

	<div class="buttons-wrapper">
		<ul>
			<li>
				<a href="/posts/random">Random</a>
			</li>
			<li>
				<a href="/posts/new">New Post</a>
			</li>
		</ul>
	</div>
</header>