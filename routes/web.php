<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	$homePage = true;
    return view('welcome', compact('homePage'));
})->name('home');

Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

Route::get('/signin', 'SessionsController@create');
Route::post('/signin', 'SessionsController@store');
Route::get('/signout', 'SessionsController@destroy');

Route::get('/posts', 'PostsController@index');
Route::get('/posts/new', 'PostsController@create');
Route::post('/posts', 'PostsController@store');
Route::get('/posts/random', 'PostsController@showRandom');
Route::get('/posts/{post}', 'PostsController@show')->name('post');
Route::delete('/posts/{post}', 'PostsController@destroy');
Route::get('/posts/{post}/edit', 'PostsController@edit');
Route::patch('/posts/{post}', 'PostsController@update');