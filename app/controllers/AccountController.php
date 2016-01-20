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
			//revisar esto hacer que funcione los campos adicionales

		if(Auth::user()->is_admin)
		{
                    $base64 = null;
                    $cuenta = Account::find(Auth::user()->account_id);
                    if($cuenta->custom_client_label1 && Input::get('l1')=="")
                        $cuenta->custom_client_label1="Dato Adicional";
                    else
                        $cuenta->custom_client_label1 = Input::get('l1');

                    if($cuenta->custom_client_label2 && Input::get('l2')=="")
                        $cuenta->custom_client_label2="Dato Adicional";
                    else
                        $cuenta->custom_client_label2 = Input::get('l2');

                    if($cuenta->custom_client_label3 && Input::get('l3')=="")
                        $cuenta->custom_client_label3="Dato Adicional";
                    else
                        $cuenta->custom_client_label3 = Input::get('l3');

                    if($cuenta->custom_client_label4 && Input::get('l4')=="")
                        $cuenta->custom_client_label4="Dato Adicional";
                    else
                        $cuenta->custom_client_label4 = Input::get('l4');

                    if($cuenta->custom_client_label5 && Input::get('l5')=="")
                        $cuenta->custom_client_label5="Dato Adicional";
                    else
                        $cuenta->custom_client_label5 = Input::get('l5');

                    if($cuenta->custom_client_label6 && Input::get('l6')=="")
                        $cuenta->custom_client_label6="Dato Adicional";
                    else
                        $cuenta->custom_client_label6 = Input::get('l6');
                                        if($cuenta->custom_client_label7 && Input::get('l7')=="")
                        $cuenta->custom_client_label7="Dato Adicional";
                    else
                        $cuenta->custom_client_label7 = Input::get('l7');

                    if($cuenta->custom_client_label8 && Input::get('l8')=="")
                        $cuenta->custom_client_label8="Dato Adicional";
                    else
                        $cuenta->custom_client_label8 = Input::get('l8');

                    if($cuenta->custom_client_label9 && Input::get('l9')=="")
                        $cuenta->custom_client_label9="Dato Adicional";
                    else
                        $cuenta->custom_client_label9 = Input::get('l9');

                    if($cuenta->custom_client_label10 && Input::get('l10')=="")
                        $cuenta->custom_client_label10="Dato Adicional";
                    else
                        $cuenta->custom_client_label10 = Input::get('l10');

                    if($cuenta->custom_client_label11 && Input::get('l11')=="")
                        $cuenta->custom_client_label11="Dato Adicional";
                    else
                        $cuenta->custom_client_label11 = Input::get('l11');

                    if($cuenta->custom_client_label12 && Input::get('l12')=="")
                        $cuenta->custom_client_label12="Dato Adicional";
                    else
                        $cuenta->custom_client_label12 = Input::get('l12');

												$dolar = Input::get('cambio');
										if(is_numeric($dolar)){
											$cuenta->exchange = $dolar;
											}
                    $cuenta->save();
                    if ( Input::hasFile('imgInp')) {
                        $file = Input::file('imgInp')->getRealPath();
                        $data = file_get_contents($file);
                        $base64 = base64_encode($data);
                        if (!function_exists('mime_content_type ')) {
                            $finfo  = finfo_open(FILEINFO_MIME);
			    $mime = finfo_file($finfo, $file);
			    finfo_close($finfo);
                        }
                        else
                        {
                                $mime = mime_content_type($file);
                        }
                        // $src = 'data:image/jpg;base64,'.$base64;
                        $src = $base64;
                        $td = TypeDocument::getDocumento();
                        $td->logo=$src;
                        //this part is to update a logo for a document


//
//                        $masters=  MasterDocument::get();
//                        foreach ($masters as $master)
//                        {
//                            $typeDocument = TypeDocument::where("account_id",Auth::user()->account_id)->where("master_id",$master->id)->orderBy("id")->first();
//                            if(isset($typeDocument))
//                            {
//                                $newType =  TypeDocument::createNew();
//                                $newType->account_id = $typeDocument->id;
//                                $newType->master_id = $typeDocument->master_id;
//                                $newType->logo=$src;
//                                $newType->javascript_web = $typeDocument->javascript_web;
//                                $newType->javascript_pos = $typeDocument->javascript_pos;
//                                $newType->save();
//                            }
//                        }
//

//return 0;
	             $td->setMasterIds(Input::get('documentos'));
                        if($td->Actualizar())
                        {
                            //redireccionar con el mensaje a la siguiente vista
                            Session::flash('message',$td->getErrorMessage());
                            return Redirect::to('editarcuenta');
                        }
                }
			//Session::flash('error',"Seleccione una imagen antes de guardar.  ");
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
        public function bookSales(){
            return View::make('exportar.bookSales');
        }
        public function export(){

//            $date = new DateTime(Input::get('date'));
//            echo $date->format('m-Y');
            $fecha = explode(" ",Input::get('date'));
            //print_r($fecha);
            $vec = [
                "Ene"=>1,
                "Feb"=>2,
                "Mar"=>3,
                "Abr"=>4,
                "May"=>5,
                "Jun"=>6,
                "Jul"=>7,
                "Ago"=>8,
                "Sep"=>9,
                "Oct"=>10,
                "Nov"=>11,
                "Dic"=>12,
            ];
//            echo substr($fecha[0],0,3);
//            echo $vec[substr($fecha[0],0,3)];
//            return 0;
//           $date = Input::get('date');
//echo date('m/Y', strtotime($date));
//
//            echo $newformat;
//            //print_r(Input::get('date'));
//            return 0;
            $date=$fecha[1]."-".$vec[substr($fecha[0],0,3)];
            $output = fopen('php://output','w') or Utils::fatalError();
            header('Content-Type:application/txt');
            header('Content-Disposition:attachment;filename=export.txt');
            $invoices=Invoice::select('client_nit','client_name','invoice_number','account_nit','invoice_date','importe_total','importe_ice','importe_exento','importe_neto','debito_fiscal','invoice_status_id','control_code')->where('account_id',Auth::user()->account_id)->where("invoice_number","!=","")->where('invoice_date','LIKE',$date.'%')->get();
            $p="|";
            $sw=true;
            foreach ($invoices as $i){
                $sw=false;
                if($i->invoice_status_id==6)$status="A";
                else $status="V";
                $datos = $i->client_nit.$p.$i->client_name.$p.$i->invoice_number.$p.$i->account_nit.$p.$i->invoice_date.$p.$i->importe_total.$p.$i->importe_ice.$p.$i->importe_exento.$p.$i->importe_neto.$p.$i->debito_fiscal.$p.$status.$p.$i->control_code."\r\n";
                fputs($output,$datos);
            }
            if($sw)
                fputs($output,"No se encontraron ventas en este periodo: ".Input::get('date'));
            fclose($output);
		exit;
        }

}
