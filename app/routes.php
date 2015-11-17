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
Route::get('/', array('uses' => 'HomeController@showHome'))->before('auth');
Route::get('login', array('uses' => 'HomeController@showLogin'))->before('guest');
Route::post('login', array('uses' => 'HomeController@doLogin'));
Route::get('logout', array('uses' => 'HomeController@doLogout'))->before('auth');
Route::post('register', array('uses' => 'HomeController@doRegister'));
Route::get('register', array('uses' => 'HomeController@showRegister'));

Route::get('forgot-password', array('uses' => 'HomeController@showForgotPassword'))->before('guest');
Route::post('forgot-password', array('uses' => 'HomeController@doForgotPassword'))->before('guest');
Route::get('set-password', array('uses' => 'HomeController@showSetPassword'))->before('guest');
Route::post('set-password', array('uses' => 'HomeController@doSetPassword'))->before('guest');
Route::get('confirm-registration', array('uses' => 'HomeController@showConfirmRegistration'))->before('guest');
Route::post('confirm-registration', array('uses' => 'HomeController@doConfirmAccount'))->before('guest');

//Admin
Route::resource('admin', 'AdminController');



Route::get('dashboard', array('uses' => 'DashboardController@showAdmin'));
Route::get('dashboard/{type}', array('uses' => 'DashboardController@showAdminByType'));
Route::resource('bill', 'BillController');
Route::resource('property', 'PropertyController');
Route::get('propertyassign/{type}', array('uses' => 'PropertyController@showAssign'));
Route::post('propertyassign', array('uses' => 'PropertyController@assign'));
Route::get('propertysearch', array('uses' => 'UserController@searchUser'));



//PROFILE
Route::get('profile', array('uses' => 'ProfileController@showProfile'))->before('guest');
Route::resource('profile/payment', 'PaymentOptionController');
Route::resource('billpayment', 'BillPaymentController');

Route::get('billpayment/process/{type}', array('uses' => 'BillPaymentController@showProcess'));
Route::post('profile', array('uses' => 'HomeController@doConfirmAccount'))->before('guest');

Route::match(array('GET', 'POST'),'/ok', function()
{
    return View::make("login");
});
/**
Route::match(array('GET', 'POST'),'/register', function()
{
	return View::make('register');
});

Route::match(array('GET', 'POST'),'/resetpassword', function()
{
	return View::make('forget');
});
Route::match(array('GET', 'POST'),'/forgot-password', function()
{
	return View::make('forget');
});

Route::match(array('GET', 'POST'),'/confirm-registration', function()
{
	return View::make('confirm-registration');
});

Route::match(array('GET', 'POST'),'/resit', function()
{
	return View::make('resit');
});
*/