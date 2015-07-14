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


Route::group(array('domain' => '{account}.factvirt.com'), function()
{

	/*Llamadas al controlador Auth*/
	Route::get('login', 'AuthController@showLogin'); // Mostrar login
	Route::post('login', 'AuthController@postLogin'); // Verificar datos
	Route::get('logout', 'AuthController@logOut'); // Finalizar sesión
  Route::get('user/{id}', function($account, $id)
  {
       return Response::json(array('cuenta' => $account, 'id' => $id));
  });

});

Route::group(array('before' => 'auth'), function()
{
    Route::get('/', function()
  {
    return View::make('public/hola');
  });

  Route::get('account/getSearchData', array('as' => 'getSearchData', 'uses' => 'AccountController@getSearchData'));
  Route::resource('clientes', 'ClientController');
  // Route::get('api/clients', array('as'=>'api.clients', 'uses'=>'ClientController@getDatatable'));
});


define('ENTITY_CLIENT', 'client');

//constantes utilizadas por account account
define('SESSION_TIMEZONE', 'timezone');
define('SESSION_CURRENCY', 'currency');
define('SESSION_DATE_FORMAT', 'dateFormat');
define('SESSION_DATE_PICKER_FORMAT', 'datePickerFormat');
define('SESSION_DATETIME_FORMAT', 'datetimeFormat');
define('SESSION_COUNTER', 'sessionCounter');
define('SESSION_LOCALE', 'sessionLocale');

define('DEFAULT_TIMEZONE', 'America/La_Paz');
define('DEFAULT_CURRENCY', 1);
define('DEFAULT_DATE_FORMAT', 'M j, Y');
define('DEFAULT_DATE_PICKER_FORMAT', 'M d, yyyy');
define('DEFAULT_DATETIME_FORMAT', 'F j, Y, g:i a');
define('DEFAULT_QUERY_CACHE', 120); // minutes
define('DEFAULT_LOCALE', 'es');

define('IPX_ACCOUNT_KEY', 'nGN0MGAljj16ANu5EE7x7VwoDJEg3Gxu');

//usado para el registro de la cuenta al momento de la creacion
define('RANDOM_KEY_LENGTH', 32);

define('RECENTLY_VIEWED', 'RECENTLY_VIEWED');