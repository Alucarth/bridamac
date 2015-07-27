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

  Route::get('crear', 'AccountController@create');
  Route::post('crear', 'AccountController@store');

  Route::get('crear/sucursal','BranchController@create');
  Route::post('crear/sucursal','BranchController@store');

  //gestion de usuarios
  Route::resource('usuarios', 'UserController');


  // Route::get('api/users', array('as'=>'api.users', 'uses'=>'UserController@getDatatable'));
  
  Route::get('/session', function()
  {
    // $account_id = Session::get('account_id');
    Session::put('account_id','1');
    //  $public_id = UserBranch::getPublicId();
    
     // $val = Session::get('account_id');
      // $sucursales = Account::find(Session::get('account_id'))->branches; 
           // $val = Account::find(1)->branches;
        // $user = UserBranch::getSucursales(5);
        // $user_id = 6; 
     // $sucursales =  User::find(6)->branches;
    $sucursales =  UserBranch::getSucursales(9);
    // $sucursales =  UserBranch::where('account_id',Session::get('account_id'))->get();
        // $sucursales = UserBranch::all();
   return Response::json(array('session' => $sucursales));
  });


Route::group(array('domain' => '{account}.localhost'), function()
{

  /*Llamadas al controlador Auth*/
  Route::get('login', 'AuthController@showLogin'); // Mostrar login
  Route::post('login', 'AuthController@postLogin'); // Verificar datos
  Route::get('logout', 'AuthController@logOut');   // Finalizar sesión
  // Route::get('user/{id}', function($account, $id)
  // {
  //      return Response::json(array('cuenta' => $account, 'id' => $id));
  // });

});

Route::group(array('before' => 'auth'), function()
{
    Route::get('/', function()
  {
    return View::make('public/hola');
  });

  Route::get('account/getSearchData', array('as' => 'getSearchData', 'uses' => 'AccountController@getSearchData'));

  Route::resource('clientes', 'ClientController');
  Route::get('api/clientes', array('as'=>'api.clientes', 'uses'=>'ClientController@getDatatable'));
  // Route::post('clientes/bulk', 'ClientController@bulk');

  Route::resource('productos', 'ProductController');
  Route::get('api/productos', array('as'=>'api.productos', 'uses'=>'ProductController@getDatatable'));
  // Route::post('productos/bulk', 'ProductController@bulk');

  Route::resource('categorias', 'CategoryController');
  Route::get('api/categorias', array('as'=>'api.categorias', 'uses'=>'CategoryController@getDatatable'));
  // Route::get('categorias/bulk', 'CategoryController@bulk');


  Route::resource('pagos', 'PaymentController');
  Route::get('pagos/create/{client_id?}/{invoice_id?}', 'PaymentController@create');
  Route::get('api/pagos', array('as'=>'api.pagos', 'uses'=>'PaymentController@getDatatable'));
  // Route::get('pagos/bulk', 'PaymentController@bulk');

  Route::resource('creditos', 'CreditController');
  Route::get('creditos/create/{client_id?}/{invoice_id?}', 'CreditController@create');
  Route::get('api/creditos', array('as'=>'api.creditos', 'uses'=>'CreditController@getDatatable'));
  // Route::get('creditos/bulk', 'CreditController@bulk');



  Route::get('exportar/libro_ventas','ExportController@exportBookSales');
  Route::post('exportar/libro_ventas','ExportController@doExportBookSales');

  Route::get('importar/clientes','ImportController@importClients');
  Route::post('importar/mapa_clientes','ImportController@importClientsMap');
  Route::post('importar/clientes','ImportController@doImportClients');

  Route::get('importar/productos','ImportController@importProducts');
  Route::post('importar/mapa_productos','ImportController@importProductsMap');
  Route::post('importar/productos','ImportController@doImportProducts');




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


define('PAYMENT_TYPE_CREDIT', 2);

define('INVOICE_STATUS_DRAFT', 1);
define('INVOICE_STATUS_SENT', 2);
define('INVOICE_STATUS_VIEWED', 3);
define('INVOICE_STATUS_PARTIAL', 4);
define('INVOICE_STATUS_PAID', 5);


Validator::extend('positive', function($attribute, $value, $parameters)
{ 
    $value = preg_replace('/[^0-9\.\-]/', '', $value);
    return floatval($value) > 0;
});

Validator::extend('has_credit', function($attribute, $value, $parameters)
{
  $publicClientId = $parameters[0];
  $amount = $parameters[1];
  $client = Client::scope($publicClientId)->firstOrFail();
  $getTotalCredit = Credit::where('client_id','=',$client->id)->sum('balance');  
  return $getTotalCredit >= $amount;
});
