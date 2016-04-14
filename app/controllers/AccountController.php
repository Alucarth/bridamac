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
						$cuenta->currency_id = Input::get('currency');
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
                        $message = "";
                        try{

                        	 $src = $base64;
	                        
	                        $td = TypeDocument::getDocumentosLogo();
	                        foreach ($td as $key => $t) 
	                        {
	                        	$t->logo=$src;
	                        	$t->Actualizar();
	                        	$message = $t->getErrorMessage();
	                        }
                        
	                        //return Redirect::to('editarcuenta');
                        }catch (Exception $e) {
                        	$mensaje = "Ocurrió un problema al guardar";
                        	Session::flash('message',$message);
                        	return Redirect::to('editarcuenta');
                        }
                       
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
	             //$td->setMasterIds(Input::get('documentos'));
                        //if($td->Actualizar())
                       // {
                            //redireccionar con el mensaje a la siguiente vista
                            Session::flash('message',$message);
                            return Redirect::to('editarcuenta');
                      //  }
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
	            $fecha = explode(" ",Input::get('date'));

	            $vec = [
	                "Ene"=>'01',
	                "Feb"=>'02',
	                "Mar"=>'03',
	                "Abr"=>'04',
	                "May"=>'05',
	                "Jun"=>'06',
	                "Jul"=>'07',
	                "Ago"=>'08',
	                "Sep"=>'09',
	                "Oct"=>'10',
	                "Nov"=>'11',
	                "Dic"=>'12',
	            ];
	            $date=$fecha[1]."-".$vec[substr($fecha[0],0,3)];

	            $output = fopen('php://output','w') or Utils::fatalError();

	            header('Content-Type:application/txt');
	            header('Content-Disposition:attachment;filename=export.txt');	            
	            $invoices=Invoice::where('account_id',Auth::user()->account_id)->where("invoice_number","!=","")->where("invoice_number","!=",0)->where('invoice_date','LIKE',$date.'%')->get();
	            $p="|";
	            $sw=true;
	            $num = 1;
	            foreach ($invoices as $i){
	                $sw=false;
	               if($i->invoice_status_id==6){
						$i->client_nit=0;
						$i->client_name="ANULADA";
						$i->importe_total="0.00";
						$i->importe_neto="0.00";	
						//$i->control_code="0";
						$i->discount="0.00";
	                	$status="A";
	                }
	                else $status="V";
	//                $datos = $i->invoice_number.$i->client_nit.$p.$i->client_name.$p.$p.$i->account_nit.$p.$i->invoice_date.$p.$i->importe_total.$p.$i->importe_ice.$p.$i->importe_exento.$p.$i->importe_neto.$p.$i->debito_fiscal.$p.$status.$p.$i->control_code."\r\n";

	                $fecha = date("d/m/Y", strtotime($i->invoice_date));
					$fecha = \DateTime::createFromFormat('Y-m-d',$i->invoice_date);
					if($fecha== null)
					    $fecha = $i->invoice_date;
					else
					    $fecha = $fecha->format('d/m/Y');
					//$doc =TypeDocumentBranch::where('branch_id',$i->branch_id)->orderBy('id','desc')->first();

					
					$tipo = TypeDocument::where('id',$i->javascript)->first();

					//echo $tipo->master_id."<br>";
					$cuenta = Account::where('id', Auth::user()->account_id)->select('currency_id')->first();
					$dolar = Invoice::where('account_id', Auth::user()->account_id)->select('sfc')->where('id',$i->id)->where('branch_id', $i->branch_id)->first();

					if($cuenta->currency_id == 2){
						$i->importe_total = $i->importe_total * $dolar->sfc;
						$i->importe_total = number_format((float)$i->importe_total, 2, '.', '');
						$i->importe_neto = $i->importe_neto * $dolar->sfc;
						$i->importe_neto = number_format((float)$i->importe_neto, 2, '.', '');
						$i->discount = $i->discount * $dolar->sfc;
						$i->discount = number_format((float)$i->discount, 2, '.', '');
					}
					
					
					if($tipo->master_id==1 || $tipo->master_id==4){						
	                	$debito=$i->importe_neto*0.13;
	                	$debito=number_format((float)$debito, 2, '.', '');
	                	$datos = "3".$p.$num.$p.$fecha.$p.$i->invoice_number.$p.$i->number_autho.$p.$status.$p.$i->client_nit.$p.$i->client_name.$p.$i->importe_total.$p.$i->importe_ice.$p.$i->importe_exento.$p."0.00".$p.$i->importe_total.$p.$i->discount.$p.$i->importe_neto.$p.$debito.$p.$i->control_code."\r\n";
	            	}
	            	if($tipo->master_id==3){	            		
						$datos = "3".$p.$num.$p.$fecha.$p.$i->invoice_number.$p.$i->number_autho.$p.$status.$p.$i->client_nit.$p.$i->client_name.$p.$i->importe_total.$p.$i->importe_ice.$p.$i->importe_exento.$p.$i->importe_neto.$p.$i->importe_total.$p.$i->discount.$p."0.00".$p."0.00".$p.$i->control_code."\r\n";
	            	}
	                $num++;
	                //echo $i->invoice_number."<br>";	                
	                fputs($output,$datos);
	                
	                $datos = null;
	            }
	            //return 0;
	            if($sw)
	                fputs($output,"No se encontraron ventas en este periodo: ".Input::get('date'));
	            fclose($output);
			exit;
	        }

}
