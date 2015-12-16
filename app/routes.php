<?php


  Route::get('crear', 'IpxController@create');
  Route::post('crear', 'IpxController@store');
  Route::get('clientefactura/{ruta}',"invoiceController@verFacturaCliente");



  Route::get('/session', function()
  {

   // $documento = TypeDocument::where('account_id',Auth::user()->account_id)->first();

 //    $invoice_number = Branch::getInvoiceNumber();
 //    return Response::json($invoice_number);

 //    $branchDocument = TypeDocumentBranch::where('branch_id',Session::get('branch_id'))->firstOrFail();
 //   $type_document =TypeDocument::where('account_id',Auth::user()->account_id)->firstOrFail();
 //   return Response::json($type_document);
 //    return View::make('error');
 // //    $codigoControl = Utils::getControlCode($numfactura,$nit,$fechaEmision,$total,$numAuth,$llave);
 //    // return View::make('emails.wellcome');
 //    // return Response::json(TypeDocument::getDocumento()->logo);
 //     Session::flush();

    // return Session::get('branch_id');


      // $client = new Client();
      // $client->setNit(trim('888888'));
      // $client->setName(trim(Input::get('Happy')));
      // $client->setBussinesName(trim('hope'));
      // $client->save();




    // $clientPOS = array(
    //     'id'=>$client->id,
    //     'public_id'=>$client->public_id,
    //     'name'=>$client->name,
    //     'nit'=>$client->nit,
    //     'business_name'=>$client->business_name
    //     );

    //     $datos = array(
    //       'resultado' => 0,
    //       'cliente' => $clientPOS
    //     );
        $mensaje = array('resultado'=> Utils::usuarioText("david@daviasdas"));
          return Response::json($mensaje);
    // return Response::json(array('codigo de control generado: ' => 'borrado las sessiones'));
  });

// facturacion.ipx



Route::group(array('domain' => '{account}.localhost'), function()


{

  /*Llamadas al controlador Auth*/
  Route::get('login', 'AuthController@showLogin'); // Mostrar login
  Route::post('login', 'AuthController@postLogin'); // Verificar datos
  Route::get('logout', 'AuthController@logOut');   // Finalizar sesión
  Route::post('enviarCorreo', 'invoiceController@sendInvoiceByMail');

  // Route::get('user/{id}', function($account, $id)
  // {
  //      return Response::json(array('cuenta' => $account, 'id' => $id));
  // });
  Route::get('/', function($account)
  {
    if($account == "bolivia")
    {
      Session::put('b_user','facturacion');
      Session::put('b_pass','virtual');
    }

    if($account == "app")
    {
      return Redirect::to("crear");
    }




     $cuenta = Account::where('domain','=',$account)->first();

     if($cuenta)
     {

       // return Session::get('account_id');
       // $usuario = User::whereAccountId($cuenta->id)->where('username','=','temporal@'.$account)->first();

       if(!$cuenta->confirmed)
       {
          // Session::put('u',$usuario->id);
         Session::put('account_id',$cuenta->id);
          return Redirect::to('paso/1');
          // return Response::json($usuario);
       }
       else
       {
           return Redirect::to('sucursal');
       }
     }
     Session::flash('error',ERROR_CUENTA);
     return Redirect::to('crear');
    // return $account;


  });


  Route::get('paso/1','InstallController@paso1');
  Route::post('paso/1','InstallController@postpaso1');

  Route::get('paso/2','InstallController@paso2');
  Route::post('paso/2','InstallController@postpaso2');

  Route::get('paso/3','InstallController@paso3');
  Route::post('paso/3','InstallController@postpaso3');


});

Route::group(array('before' => 'auth.basic'), function()
{
   Route::resource('pos','PosController');

   Route::get('cliente/{nit}','PosController@cliente');
   Route::post('guardarCliente','PosController@guardarCliente');
   Route::post('guardarFactura','PosController@guardarFactura');


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

  //Ruta inicio
  Route::get('inicio','IpxController@dashboard');

  //-----------------------


  Route::resource('usuarios', 'UserController');
  Route::resource('clientes', 'ClientController');

  Route::post('getclients','ClientController@buscar');
  Route::get('getclients','ClientController@buscar2');

  Route::post('getClientContacts','ClientController@getContacts');
  // Route::get('/', function()

  Route::resource('sucursales','BranchController');
  Route::resource('factura','invoiceController');

  Route::get('verFactura/{id}','invoiceController@verFactura');
  Route::get('verFacturaFiscal/{id}','invoiceController@verFacturaFiscal');
  Route::get('factura2','invoiceController@factura2');
  Route::post('nuevanota/{id}','invoiceController@nuevanota');
  Route::get('export','invoiceController@export');
  //Route::post('factura2','invoiceController@factura2');
  Route::get('notaEntrega','invoiceController@newNotaEntrega');

  Route::get('preview','invoiceController@preview');
  // Route::get('verfactura/{id}','invoiceController@verFactura');

  Route::post('excel','invoiceController@excel');
  Route::get('importar','invoiceController@importar');
  Route::get('anular/{publicId}','invoiceController@anular');
  Route::get('copia/{publicId}','invoiceController@copia');

  Route::post('controlCode','invoiceController@controlCode');
  Route::post('notaEntrega','invoiceController@storeNota');

//  Route::post('controlCode','invoiceController@controlCode');


  Route::resource('productos', 'ProductController');
  Route::get('producto/createservice','ProductController@createservice');//esto es para la vista de servicios XD
   Route::get('/productos2', 'ProductController@storage2');
  // revisar estos modulos XD

  Route::resource('categorias', 'CategoryController');
  Route::resource('unidades', 'UnidadController');
  Route::post('categorias/bulk', 'CategoryController@bulk');

  Route::get('editarcuenta','AccountController@editar');
  Route::post('editarcuenta','AccountController@editarpost');

  // Route::post('clientes/bulk', 'ClientController@bulk');

  //configuracion de la cuenta

  Route::get('libroVentas','AccountController@bookSales');
  Route::post('generateBookSales','AccountController@export');



  Route::get('getClients', 'SearchController@getClients');
  Route::get('getProducts', 'SearchController@getProducts');
  Route::get('getInvoices', 'SearchController@getInvoices');

  Route::post('getClients', 'SearchController@getClients');




  //nota todo esta mal hay que revisar para ponerlos funcional
  //codigo de invoice ninja para entender mejor habria que estudiar a invoice ninja
  //pero lo mas seguro es que lo reagamos XD enves de ayudar nos dieron mas trabjo porqueeee :(

  Route::resource('pagos', 'PayController');
  Route::get('pagoCliente/{client}/{invoice}','PayController@pagoCliente');
  Route::get('pago/factura/{client_id}','PayController@obtenerFacturas');
  Route::get('pago/factura/credit/{client_id}','PayController@getMaxCredit');

  // Route::resource('pagos', 'PaymentController');
  // Route::get('pagos/create/{client_id?}/{invoice_id?}', 'PaymentController@create');
  // Route::post('pagos/bulk', 'PaymentController@bulk');

  Route::resource('creditos', 'CreditController');
  Route::get('creditos/create/{client_id?}/{invoice_id?}', 'CreditController@create');
  Route::post('creditos/bulk', 'CreditController@bulk');


//  Route::get('exportar/libro_ventas','ExportController@exportBookSales');
//  Route::post('exportar/libro_ventas','ExportController@doExportBookSales');

   //Route::get('exportar/libro_ventas','ExportController@exportBookSales');
   //Route::post('exportar/libro_ventas','ExportController@doExportBookSales');


  // Route::get('importar/clientes','ImportController@importClients');
  // Route::post('importar/mapa_clientes','ImportController@importClientsMap');
  // Route::post('importar/clientes','ImportController@doImportClients');

  // Route::get('importar/productos','ImportController@importProducts');
  // Route::post('importar/mapa_productos','ImportController@importProductsMap');
  // Route::post('importar/productos','ImportController@doImportProducts');

  // Route::get('configuracion/campos_adicionales','AccountController@additionalFields');
  // Route::post('configuracion/campos_adicionales','AccountController@doAdditionalFields');

  // Route::get('configuracion/actualizacion_productos','AccountController@productSettings');
  // Route::post('configuracion/actualizacion_productos','AccountController@doProductSettings');

  // Route::get('configuracion/notificaciones','AccountController@notifications');
  // Route::post('configuracion/notificaciones','AccountController@doNotifications');

  // Route::get('reportes/graficos', 'ReportController@report');

  // Route::post('reportes/graficos', 'ReportController@report');


});


//definicion de errores
define('ERROR_NULL',' no puede ser nulo ');
define('ERROR_NEGATIVO',' no puede ser negativo ');
define('ERROR_DATO',' no coincide con el tipo dato ');
define('ERROR_DUPLICADO',' ya existe ');
define('ERROR_PASSWORD',' no puede ser menor a 5 caracteres ');
define('ERROR_DATO_NUMERICO',' el campo debe ser numerico ');
define('ERROR_DATO_BOOL',' el campo debe ser verdadero o falso');
define('ERROR_DATO_TEXTO',' el campo debe ser texto ');
define('ERROR_DATO_EMAIL',' correo electronico no valido ');
define('ERROR_NUMERICO_POSITIVO',' Nit no valido ');
define('ERROR_ID',' No existe ');
define('ERROR_ARRAY',' grupo de datos no valido ');
define('ERROR_IMAGEN',' formato no soportado ');
define('ERROR_DATO_FECHA',' formato de fecha no valido ');
define('ERROR_SIZE_PASSWORD', ' el password debe ser mayor a 5 caracteres ');
define('ERROR_PASSWORD_DISTINTO',' el password distinto de confirmacion ');
define('ERROR_CUENTA',' la cuenta no existe por favor registrese ');
define('ERROR_DOCUMENTO',' error del tipo de documento ');
define('ERROR_CREDITO','Cliente con credito no se puede eliminar');
define('ERROR_BALANCE_CLIENTE','Cliente con balance mayor a 0 no se puede eliminar');

// define('ERROR_MESSAGE_NULL',):
// define('ERROR_MESSAGE_NEGATIVO',):


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

// tal vez se pueda utilizar algo de este codigo pero no confio hay que ver XD

// Validator::extend('positive', function($attribute, $value, $parameters)
// {
//     $value = preg_replace('/[^0-9\.\-]/', '', $value);
//     return floatval($value) > 0;
// });

// Validator::extend('has_credit', function($attribute, $value, $parameters)
// {
//   $publicClientId = $parameters[0];
//   $amount = $parameters[1];
//   $client = Client::scope($publicClientId)->firstOrFail();
//   $getTotalCredit = Credit::where('client_id','=',$client->id)->sum('balance');
//   return $getTotalCredit >= $amount;
// });


HTML::macro('image_data', function($imagePath) {
  return 'data:image/jpeg;base64,'.base64_encode(file_get_contents(public_path().'/'.$imagePath));
});
Validator::extend('less_than', function($attribute, $value, $parameters) {
    return floatval($value) <= floatval($parameters[0]);
});
