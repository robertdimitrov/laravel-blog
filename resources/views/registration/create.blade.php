@extends('layout')

@section('content')
	<h1>Register</h1>
	<form method="POST" action="/register">
		{{ csrf_field() }}

		<label for="name">Name:</label>
		<input type="text" name="name" id="name" required>
		<br>
		<br>

		<label for="password">Password:</label>
		<input type="password" name="password" id="password" required>
		<br>
		<br>

		<label for="password_confirmation">Password confirmation:</label>
		<input type="password" name="password_confirmation" id="password_confirmation" required>
		<br>
		<br>

		<button type="submit">Submit</button>
	</form>	
@endsection