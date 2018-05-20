@extends('layout')

@section('content')
	<h1>Login</h1>
	<form method="POST" action="/login">
		{{ csrf_field() }}

		<label for="name">Name:</label>
		<input type="text" name="name" id="name" required>
		<br>
		<br>

		<label for="password">Password:</label>
		<input type="password" name="password" id="password" required>
		<br>
		<br>

		<button type="submit">Submit</button>
	</form>	
@endsection