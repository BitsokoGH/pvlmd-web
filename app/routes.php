<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('login');
});

Route::get('/login', function()
{
	return View::make('login');
});
Route::get('/register', function()
{
	return View::make('register');
});

Route::get('/resetpassword', function()
{
	return View::make('forget');
});
Route::get('/forgot-password', function()
{
	return View::make('forget');
});

Route::get('/confirm-registration', function()
{
	return View::make('confirm-registration');
});

Route::get('/resit', function()
{
	return View::make('resit');
});
