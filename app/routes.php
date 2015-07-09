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
Route::get('crear', 'HomeController@createAccount');
Route::post('get_started', 'AccountController@getStarted');

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('/hola', function()
{
	return View::make('public.hola');
});
