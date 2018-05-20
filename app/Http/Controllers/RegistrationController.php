<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegistrationController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest');
		$this->middleware('auth');
	}

    public function create()
    {
     	return view('registration.create');
    }

    public function store()
    {
    	$this->validate(request(), [
    		'name' => 'required',
    		'password' => 'required|confirmed'
    	]);

    	$user = User::create([
    		'name' => request('name'),
    		'password' => bcrypt(request('password'))
    	]);

    	auth()->login($user);

    	return redirect()->home();
    }
}