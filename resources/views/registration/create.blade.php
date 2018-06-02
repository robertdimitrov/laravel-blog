@extends('layout')

@section('content')
	<section class="center-container">
		<div class="center-container-item">
			<div class="logo-wrapper">
				<img src="img/logo.svg" alt="Logo">
			</div>
			<h1 class="smaller-heading">Set up your account</h1>
			<div class="form-wrapper">
				<form class="registration-form" method="POST" action="/register">
					{{ csrf_field() }}

					<div class="form-input-group">
						<label for="name">Name:</label>
						<input type="text" name="name" id="name" required minlength="2" maxlength="30">
					</div>

					<div class="form-input-group">
						<label for="password">Password:</label>
						<input type="password" name="password" id="password" required minlength="6" maxlength="30">
					</div>

					<div class="form-input-group">
						<label for="password_confirmation">Confirm password:</label>
						<input type="password" name="password_confirmation" id="password_confirmation" required minlength="6" maxlength="30">
					</div>

					<button class="button button-animated button-success full-width" type="submit">Create account</button>
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