@extends('layout')

@section('content')
	<section class="center-container">
		<div class="center-container-item">
			<div class="logo-wrapper">
				<img src="/img/logo.svg" alt="Logo">
			</div>
			<h1 class="smaller-heading">Sign in</h1>
			<div class="form-wrapper">
				<form class="signin-form" method="POST" action="/signin">
					{{ csrf_field() }}

					<div class="form-input-group">
						<label for="name">Name:</label>
						<input type="text" name="name" id="name" required>
					</div>

					<div class="form-input-group">
						<label for="password">Password:</label>
						<input type="password" name="password" id="password" required>
					</div>

					<button class="button button-animated button-success full-width" type="submit">Sign in</button>
				</form>
			</div>
			<div class="feedback">
				@foreach ($errors->all() as $error)
					<p>{{ $error }}</p>
				@endforeach
			</div>
		</div>
	</section>
@endsection