@extends('layout')

@section('content')
	<section class="center-container">
		<div class="center-container-item">
			<div class="logo-wrapper">
				<img src="img/logo.svg" alt="Logo">
			</div>
			<h1>Set up your account</h1>
			<div class="form-wrapper">
				<form class="registration-form" method="POST" action="/register">
					{{ csrf_field() }}

					<div class="form-input-group">
						<label for="name">Name:</label>
						<input type="text" name="name" id="name" required>
					</div>

					<div class="form-input-group">
						<label for="password">Password:</label>
						<input type="password" name="password" id="password" required>
					</div>

					<div class="form-input-group">
						<label for="password_confirmation">Password confirmation:</label>
						<input type="password" name="password_confirmation" id="password_confirmation" required>
					</div>

					<button type="submit">Submit</button>
				</form>
			</div>
		</div>
	</section>
@endsection