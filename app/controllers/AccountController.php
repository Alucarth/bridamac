<?php

class AccountController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */




	public function index()
	{		
		//
		// return Response::json(array('index' => 'cuentas 2'));
		$accounts = Account::all();

		return View::make('cuentas.index')->with('cuentas',$accounts);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		// if (Auth::check())
		// {
		// 	return Redirect::to('dashboard');				
		// }
		// else
		// {
			return View::make('cuentas.create');
		// }

	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		// return Response::json(Input::all());

		$account = new Account;
		// $account->ip = Request::getClientIp();
		// $account->account_key = str_random(RANDOM_KEY_LENGTH);
		$account->setDomain(Input::get('domain'));
		$account->setNit(Input::get('nit'));
		$account->setName(Input::get('name'));
		if($account->Guardar())
		{
			$direccion = "http://".$account->domain.".localhost/devipx/public/";
		// $direccion = "/crear/sucursal";
			return Redirect::to($direccion);
		}
		return Response::json(Input::all());
		// Session::put('error',$account->getErrorMessage());
		// return Redirect::('crear');
		// $account->language_id = 1;

		// $account->save();

		// $user = new User;
		// $username = trim(Input::get('username'));
		// $user->username = $username . "@" . $account->domain;
		// $user->password = Hash::make(trim(Input::get('password')));
		// $user->public_id = 1;
		// $user->confirmation_code = '';
		// $user->is_admin = true;
		// $account->users()->save($user);

		// $category = new Category;
		// $category->user_id =$user->getId();
		// $category->name = "General";
		// $category->public_id = 1;
		// $account->categories()->save($category);

		// $InvoiceDesign = new InvoiceDesign;
		// $InvoiceDesign->user_id =$user->getId();
		// $InvoiceDesign->logo = "";
		// $InvoiceDesign->x = "5";
		// $InvoiceDesign->y = "5";
		// $InvoiceDesign->javascript = "";

		// $account->invoice_designs()->save($InvoiceDesign);

		// $admin = User::find($user->id);

		// Auth::login($admin);
		// $data = array('guardado exitoso' => ' se registro correctamente hasta aqui todo blue :)' ,'datos'=>Input::all());
		



		// Session::put('account_id',$user->account_id);
		// // return View::make('sucursales.edit')->with(array('account_id' => $user->account_id));
		// return Redirect::to('cuentas');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		$account =Account::find($id);
		// return Response::json($account);
		return View::make('cuentas.show')->with('cuenta',$account);

	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		$account = Account::find($id);

		return View::make('cuentas.edit')->with('cuenta',$account);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
		$account = Account::find($id);
		$account->name= Input::get('name');
		$account->nit = Input::get('nit');
		//$account->domain =Input::get('domain');
		//actualizar a los usuarios mas en caso de habilitar update del domain
		$account->save();

		return Redirect::to('cuentas');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		$account = Account::find($id);
		$account->delete();
		return  Redirect::to('cuentas');
	}

	public function editar()
	{
		//edicion de la cuenta

		if(Auth::user()->is_admin)
		{
			$account = Account::find(Auth::user()->account_id);
			return View::make('cuentas.edit')->with('cuenta',$account);
		}
		
			return Redirect::to('inicio');
	}
	public function editarpost()
	{
		// return Response::json(Input::all());
		if(Auth::user()->is_admin)
		{
			$base64 = null;
		 if ( Input::hasFile('imgInp')) {

                $file = Input::file('imgInp')->getRealPath();
                $data = file_get_contents($file);
				$base64 = base64_encode($data);
				// return $file;
				if (!function_exists('mime_content_type ')) {
					
					 $finfo  = finfo_open(FILEINFO_MIME);
			        $mime = finfo_file($finfo, $file);
			        finfo_close($finfo);

				}
				else
				{
					$mime = mime_content_type($file);
				}
				$src = 'data:image/jpg;base64,'.$base64;

				$td = TypeDocument::getDocumento();

            // $td->setAccountId(Session::get('account_id'));
	            $td->logo=$src;
	            // $td->setMasterIds(Input::get('documentos'));
	            if($td->Actualizar())
				{	
					//redireccionar con el mensaje a la siguiente vista 
					
					Session::flash('message',$td->getErrorMessage());
				
					return Redirect::to('editarcuenta');
				}
                // return $base64;
                
            }

            
			Session::flash('error',"Seleccione una imagen antes de guardar.  ");
		}
		return Redirect::to('editarcuenta');
	}

	//hasta aqui las rutas de recurso

	// public function getSearchData()
	// {
	// 	$clients = \DB::table('clients')
	// 		->where('clients.deleted_at', '=', null)
	// 		->where('clients.account_id', '=', \Auth::user()->account_id)
	// 		->whereRaw("clients.name <> ''")
	// 		->select(\DB::raw("'Clients' as type, clients.public_id, clients.name, '' as token"));

	// 	$contacts = \DB::table('clients')
	// 		->join('contacts', 'contacts.client_id', '=', 'clients.id')
	// 		->where('clients.deleted_at', '=', null)
	// 		->where('clients.account_id', '=', \Auth::user()->account_id)
	// 		->whereRaw("CONCAT(contacts.first_name, contacts.last_name, contacts.email) <> ''")
	// 		->select(\DB::raw("'Contacts' as type, clients.public_id, CONCAT(contacts.first_name, ' ', contacts.last_name, ' ', contacts.email) as name, '' as token"));

	// 	$invoices = \DB::table('clients')
	// 		->join('invoices', 'invoices.client_id', '=', 'clients.id')
	// 		->where('clients.account_id', '=', \Auth::user()->account_id)
	// 		->where('clients.deleted_at', '=', null)
	// 		->where('invoices.deleted_at', '=', null)
	// 		->select(\DB::raw("'Invoices' as type, invoices.public_id, CONCAT(invoices.invoice_number, ': ', clients.name) as name, invoices.invoice_number as token"));

	// 	$data = [];

	// 	foreach ($clients->union($contacts)->union($invoices)->get() as $row)
	// 	{
	// 		$type = $row->type;

	// 		if (!isset($data[$type]))
	// 		{
	// 			$data[$type] = [];
	// 		}

	// 		$tokens = explode(' ', $row->name);
	// 		$tokens[] = $type;

	// 		if ($type == 'Invoices')
	// 		{
	// 			$tokens[] = intVal($row->token) . '';
	// 		}

	// 		$data[$type][] = [
	// 			'value' => $row->name,
	// 			'public_id' => $row->public_id,
	// 			'tokens' => $tokens
	// 		];
	// 	}
	// 	return Response::json($data);
	// }

	// public function additionalFields()
	// {
	// 	$data = [
	// 		'account' => Auth::user()->account
	// 	];
	// 	return View::make('configuracion.additional_fields', $data);
	// }

	// public function doAdditionalFields()
	// {
	// 	$account = Auth::user()->account;

	// 	$account->custom_client_label1 = trim(Input::get('custom_client_label1'));
	// 	$account->custom_client_label2 = trim(Input::get('custom_client_label2'));	
	// 	$account->custom_client_label3 = trim(Input::get('custom_client_label3'));	
	// 	$account->custom_client_label4 = trim(Input::get('custom_client_label4'));	
	// 	$account->custom_client_label5 = trim(Input::get('custom_client_label5'));	
	// 	$account->custom_client_label6 = trim(Input::get('custom_client_label6'));	
	// 	$account->custom_client_label7 = trim(Input::get('custom_client_label7'));	
	// 	$account->custom_client_label8 = trim(Input::get('custom_client_label8'));	
	// 	$account->custom_client_label9 = trim(Input::get('custom_client_label9'));	
	// 	$account->custom_client_label10 = trim(Input::get('custom_client_label10'));	
	// 	$account->custom_client_label11 = trim(Input::get('custom_client_label11'));
	// 	$account->custom_client_label12 = trim(Input::get('custom_client_label12'));

	// 	$account->save();

	// 	Session::flash('message', 'Configuración actualizada con éxito');

	// 	return Redirect::to('configuracion/campos_adicionales');
	// }

	// public function productSettings()
	// {
	// 	$data = [
	// 		'account' => Auth::user()->account
	// 	];
	// 	return View::make('configuracion.product_settings', $data);
	// }

	// public function doProductSettings()
	// {
	// 	$account = Auth::user()->account;

	// 	$account->update_products = Input::get('update_products') ? true : false;
	// 	$account->save();

	// 	Session::flash('message', 'Configuración actualizada con éxito');

	// 	return Redirect::to('configuracion/productos');
	// }

	// public function notifications()
	// {
	// 	return View::make('configuracion.notifications');
	// }

	// public function doNotifications()
	// {
	// 	$user = Auth::user();
	// 	$user->notify_sent = Input::get('notify_sent');
	// 	$user->notify_viewed = Input::get('notify_viewed');
	// 	$user->notify_paid = Input::get('notify_paid');
	// 	$user->save();
		
	// 	Session::flash('message', 'Configuración actualizada con éxito');
	// 	return Redirect::to('configuracion/notificaciones');
	// }


}
