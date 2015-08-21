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

  Route::get('crear', 'IpxController@create');
  Route::post('crear', 'IpxController@store');

   Route::post('getclients','ClientController@buscar');
  Route::get('getclients','ClientController@buscar2');

// <<<<<<< HEAD
//   
//   Route::resource('cuentas','AccountController');
// =======
//   // Route::get('crear/sucursal','BranchController@create');
//   // Route::post('crear/sucursal','BranchController@store');

//   // Route::post('getclients','ClientController@buscar');
// >>>>>>> 243d6562414191a002e2927fab8dcc8f2dceea5f

  //gestion de usuarios

  

  // Route::post('usuarios/{id}/borrar','UserController@borrar');
  // Route::get('api/users', array('as'=>'api.users', 'uses'=>'UserController@getDatatable'));
 
  Route::get('/session', function()
  {
    // $account_id = Session::get('account_id');

    // Mail::send('emails.wellcome', array('key' => 'parametro 1'), function($message)
    // {
    //     $message->to('dtorrez@ipxserver.com', 'David Torreaz')->subject('informacion XD');
    // });
    // Session::put('account_id', 1);
    
    //  $public_id = UserBranch::getPublicId();
    
     // $val = Session::get('account_id');
     // $sucursales = Account::find(Session::get('account_id'))->branches; 
        // $val = Account::find(1)->branches;
        // $user = UserBranch::getSucursales(5);
        // $user_id = 6; 
    // $sucursales =  User::find(6)->branches;
    // $users= User::whereAccountId(1)->get();
    // $sucursales =  UserBranch::IsUserBranch(2,3);
    // $users = User::withTrashed()->where('id',19)->firstOrFail();
    // $users->restore();
    // $sucursales =  UserBranch::where('account_id',Session::get('account_id'))->get();
        // $sucursales = UserBranch::all();
    // return ''.$sucursales;
    // $master = new MasterDocument;
    // $master->name ='factura recurrente';
    // $master->javascript= 'codigo java script';
    // $master->save();
    // $t = TypeDocument::createNew();
    // $t->master_id =1;
    // // $t->account_id=1;



   return Response::json(array('session' => Session::get('account_id')));
    // return Response::json(array('mensaje' =>' enviado'));
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
  Route::get('/', function($account)
  {
     $cuenta = Account::where('domain','=',$account)->firstOrFail();
    // return $account;
     Session::put('account_id',$cuenta->id);
     // return Session::get('account_id');
     $usuario = User::whereAccountId($cuenta->id)->where('username','=','temporal@'.$account)->first();
     if($usuario)
     {
        // Session::put('u',$usuario->id);
        return Redirect::to('comensar/1');
        // return Response::json($usuario);
     }
     else
     {
         return Redirect::to('sucursal');  
     }
     
  });

  
  Route::get('comensar/1','InstallController@paso2');
  Route::post('comensar/1','InstallController@postpaso2');

  Route::get('comensar/2','InstallController@paso1');
  Route::post('comensar/2','InstallController@postpaso1');

  Route::get('comensar/3','InstallController@paso');
  Route::post('comensar/3','InstallController@postpaso');


});

Route::group(array('before' => 'auth.basic'), function()
{
    Route::get('/david',function()
    {
        return Response::json('david');
      });
});


Route::group(array('before' => 'auth'), function()
{
 

  Route::get('/ver', function()
  {
    $var = Auth::user()->account->confirmed;
   // return Response::json(array('valor' => $var));
  });
  Route::get('sucursal','UserController@indexSucursal'); 
  Route::post('sucursal','UserController@asignarSucursal'); 

  //rutas para la instalacion de cosas necesarias para la emision de facturas
 
  //-----------------------
 

  Route::resource('usuarios', 'UserController');
  

  // Route::resource('cuentas','AccountController');


  Route::resource('sucursales','BranchController');

  Route::resource('factura','invoiceController');

  // revisar estos modulos XD
  Route::get('account/getSearchData', array('as' => 'getSearchData', 'uses' => 'AccountController@getSearchData'));

  Route::resource('clientes', 'ClientController');
  Route::post('clientes/bulk', 'ClientController@bulk');

  Route::resource('productos', 'ProductController');
  Route::post('productos/bulk', 'ProductController@bulk');

  Route::resource('categorias', 'CategoryController');
  Route::post('categorias/bulk', 'CategoryController@bulk');

  Route::resource('pagos', 'PaymentController');
  Route::get('pagos/create/{client_id?}/{invoice_id?}', 'PaymentController@create');
  Route::post('pagos/bulk', 'PaymentController@bulk');

  Route::resource('creditos', 'CreditController');
  Route::get('creditos/create/{client_id?}/{invoice_id?}', 'CreditController@create');
  Route::post('creditos/bulk', 'CreditController@bulk');

  Route::get('exportar/libro_ventas','ExportController@exportBookSales');
  Route::post('exportar/libro_ventas','ExportController@doExportBookSales');

  Route::get('importar/clientes','ImportController@importClients');
  Route::post('importar/mapa_clientes','ImportController@importClientsMap');
  Route::post('importar/clientes','ImportController@doImportClients');

  Route::get('importar/productos','ImportController@importProducts');
  Route::post('importar/mapa_productos','ImportController@importProductsMap');
  Route::post('importar/productos','ImportController@doImportProducts');

  Route::get('configuracion/campos_adicionales','AccountController@additionalFields');
  Route::post('configuracion/campos_adicionales','AccountController@doAdditionalFields');

  Route::get('configuracion/actualizacion_productos','AccountController@productSettings');
  Route::post('configuracion/actualizacion_productos','AccountController@doProductSettings');

  Route::get('configuracion/notificaciones','AccountController@notifications');
  Route::post('configuracion/notificaciones','AccountController@doNotifications');

  Route::get('reportes/graficos', 'ReportController@report');

  // Route::post('reportes/graficos', 'ReportController@report');


});


define('ENTITY_CLIENT', 'client');
define('ENTITY_INVOICE', 'factura');
define('ENTITY_QUOTE', 'quote');

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

//esto colocar a otro lado esto deberia estar en los lugares que se lo usa si no colocarlos en los controladores no mesclemos los conceptos XD
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


HTML::macro('image_data', function($imagePath) {
  return 'data:image/jpeg;base64,'.base64_encode(file_get_contents(public_path().'/'.$imagePath));
});
Validator::extend('less_than', function($attribute, $value, $parameters) {
    return floatval($value) <= floatval($parameters[0]);
});

