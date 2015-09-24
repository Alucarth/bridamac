<?php

class ClientController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// $clients =  Client::join('contacts', 'contacts.client_id', '=', 'clients.id')
		// 		->where('clients.account_id', '=', Auth::user()->account_id)
		// 		->where('contacts.is_primary', '=', true)
		// 		->where('contacts.deleted_at', '=', null)
		// 		->select('clients.public_id', 'clients.name','clients.nit', 'contacts.first_name', 'contacts.last_name', 'contacts.phone', 'clients.balance', 'clients.paid_to_date', 'clients.work_phone')->get();

		$clientes = Account::find(Auth::user()->account_id)->clients;
	    return View::make('clientes.index', array('clients' => $clientes));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('clientes.create',self::getViewModel());
	}

	private static function getViewModel()
	{
		return [
			'customLabel1' => Auth::user()->account->custom_client_label1,
			'customLabel2' => Auth::user()->account->custom_client_label2,
			'customLabel3' => Auth::user()->account->custom_client_label3,
			'customLabel4' => Auth::user()->account->custom_client_label4,
			'customLabel5' => Auth::user()->account->custom_client_label5,
			'customLabel6' => Auth::user()->account->custom_client_label6,
			'customLabel7' => Auth::user()->account->custom_client_label7,
			'customLabel8' => Auth::user()->account->custom_client_label8,
			'customLabel9' => Auth::user()->account->custom_client_label9,
			'customLabel10' => Auth::user()->account->custom_client_label10,
			'customLabel11' => Auth::user()->account->custom_client_label11,
			'customLabel12' => Auth::user()->account->custom_client_label12
		];
	}

	// public function buscar($cadena="")
	// {
	// 	$cadena = Input::get('name');
	// 	$clients = Client::where('name','like',$cadena."%")->select('id','name')->get();
 //    	return Response::json($clients);
	// }
	public function getContacts(){		
		$id = Input::get('id');
		//return Response::json($id);
		$contacts = DB::table('contacts')->where('client_id','=', $id )->whereNull('deleted_at')->select('id','first_name','last_name','email','phone')->get();		
		return Response::json($contacts);
	}
	public function buscar2($cadena="")
	{		
		$cadena = Input::get('name');
		$clients = DB::table('clients')->where('name','like',$cadena."%")->where('account_id','=', Auth::user()->account_id)->select('id','name','nit','business_name','public_id')->get();
		if(!$clients)
			$clients = DB::table('clients')->where('nit','like',$cadena."%")->where('account_id','=', Auth::user()->account_id)->select('id','name','nit','business_name','public_id')->get();
		return Response::json($clients);
		$newclients = array();
/*
		$nuevo = Client::createNew();
		$nuevo->id ="0";
		$nuevo->name="Nuevo Cliente";

		$newclients[0] = $nuevo;
		$ind = 1;
		foreach ($clients as $client ) {
			# code...
			$newclients[$ind++] = $client;

		}*/
		$newclients[0]=array('name'=> 'Nuevo', 'id'=>'0');//['name'] = $cli['name'];
		$ind =1;
		foreach ($clients as $key => $cli) {
			$newclients[$ind]=array('name'=> $cli->name, 'id'=>$cli->id);//['name'] = $cli['name'];
			//$newclients[$ind]['id'] = $cli['id'];
			$ind++;
		}
		//$newclients[$ind]['name'] = "nuevo";
		//$newclients[$ind]['id'] = "new";
		// $clients = Client::where('name','like',$cadena."%")->select('id','account_id','name')->get();
		//array_unshift($clients,array('id':'1','name':'dadsf','account_id':'1'));

		 // $myarray['blah'] = json_decode('[
   //      {"label":"foo","name":"baz"},
   //      {"label":"boop","name":"beep"}
   //  ]',true);
    	return Response::json($newclients);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
		// return Response::json(Input::all());
		$client = Client::createNew();
		//$client -> setNit(null); 
		$client->setNit(trim(Input::get('nit')));
		$client->setName(trim(Input::get('name')));
		$client->setBussinesName(trim(Input::get('business_name')));



        $client->setWorkPhone(trim(Input::get('work_phone')));
    
		$client->setCustomValue1(trim(Input::get('custom_value1')));
		$client->setCustomValue2(trim(Input::get('custom_value2')));
		$client->setCustomValue3(trim(Input::get('custom_value3')));
		$client->setCustomValue4(trim(Input::get('custom_value4')));
		$client->setCustomValue5(trim(Input::get('custom_value5')));
		$client->setCustomValue6(trim(Input::get('custom_value6')));
		$client->setCustomValue7(trim(Input::get('custom_value7')));
		$client->setCustomValue8(trim(Input::get('custom_value8')));
		$client->setCustomValue9(trim(Input::get('custom_value9')));
		$client->setCustomValue10(trim(Input::get('custom_value10')));
		$client->setCustomValue11(trim(Input::get('custom_value11')));
		$client->setCustomValue12(trim(Input::get('custom_value12')));

		$client->setAddress1(trim(Input::get('address1')));
		$client->setAddress2(trim(Input::get('address2')));
		$client->setPrivateNotes(trim(Input::get('private_notes')));

		$resultado = $client->guardar();
					
		// $new_contacts = json_decode(Input::get('data'));
			
		if(!$resultado){			
			$message = "Cliente creado con éxito";
//			echo "producto salvado";
			$client->save();
		}
		else
		{
			$url = 'clientes/create';
			Session::flash('error',	$resultado);
	        return Redirect::to($url)	        
	          ->withInput();	
		}
		$isPrimary = true;		
		

		$contactos = Utils::parseContactos(Input::get('contactos'));
		if($contactos)
		{
			foreach ($contactos as $contacto) {
			# code...
			// $contador++;
				$contact_new = Contact::createNew();
				$contact_new->client_id=$client->getId();
											
				$contact_new->setFirstName(trim($contacto['first_name']));				
				$contact_new->setLastName(trim($contacto['last_name']));				
				$contact_new->setEmail(trim(strtolower($contacto['email'])));				
				$contact_new->setPhone(trim(strtolower($contacto['phone'])));
				$contact_new->setIsPrimary($isPrimary);
				$isPrimary = false;

				$resultado = $contact_new->guardar();
				//print_r($resultado);
				$client->contacts()->save($contact_new);
			}	
		}
		

		Session::flash('message',	$message);
		return Redirect::to('clientes');
	}



	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($publicId)
	{
		$client = Client::scope($publicId)->with('contacts')->firstOrFail();
		$getTotalCredit = Credit::scope()->where('client_id', '=', $client->id)->whereNull('deleted_at')->where('balance', '>', 0)->sum('balance');

		$data = array(
			'title' => 'Ver Cliente',
			'client' => $client,
			'credit' => $getTotalCredit
		);

		return View::make('clientes.show', $data);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($publicId)
	{
		$client = Client::scope($publicId)->with('contacts')->firstOrFail();
		$contacts = $client->contacts;
		$contactos =array();
		foreach ($contacts as $contact) {

			# code...
			$contactos [] = array('id'=>$contact->id,'nombres'=> $contact->first_name,'apellidos' => $contact->last_name,'email'=> $contact->email,'phone'=>$contact->phone);
// 
		}
		$data = [
			'client' => $client,	
			'contactos' => $contactos,		
			'url' => 'clientes/' . $publicId,
			'title' => 'Editar Cliente'
		];
				
		$data = array_merge($data, self::getViewModel());
		// return Response::json($data);
		return View::make('clientes.edit', $data);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($publicId)
	{

		
		// return Response::json($contactos);
		$client = Client::scope($publicId)->firstOrFail();
		$client->setNit(trim(Input::get('nit')));
		$client->setName(trim(Input::get('name')));
		$client->setBussinesName(trim(Input::get('business_name')));
        $client->setWorkPhone(trim(Input::get('work_phone')));
      
		$client->setCustomValue1(trim(Input::get('custom_value1')));
		$client->setCustomValue2(trim(Input::get('custom_value2')));
		$client->setCustomValue3(trim(Input::get('custom_value3')));
		$client->setCustomValue4(trim(Input::get('custom_value4')));
		$client->setCustomValue5(trim(Input::get('custom_value5')));
		$client->setCustomValue6(trim(Input::get('custom_value6')));
		$client->setCustomValue7(trim(Input::get('custom_value7')));
		$client->setCustomValue8(trim(Input::get('custom_value8')));
		$client->setCustomValue9(trim(Input::get('custom_value9')));
		$client->setCustomValue10(trim(Input::get('custom_value10')));
		$client->setCustomValue11(trim(Input::get('custom_value11')));
		$client->setCustomValue12(trim(Input::get('custom_value12')));

		$client->setAddress1(trim(Input::get('address1')));
		$client->setAddress2(trim(Input::get('address2')));
		$client->setPrivateNotes(trim(Input::get('private_notes')));

		$resultado = $client->guardar();

		if(!$resultado){			
			$message = "Cliente actualizado con éxito";
			$client->save();
		}
		else
		{
			$url = 'clientes/create';
			Session::flash('error',	$resultado);
	        return Redirect::to($url)	        
	          ->withInput();	
		}
		

		if(Input::has('contactos'))
		{
			// Actualizando contactos si existe


			$contactos = Utils::parseContactosUpdate(Input::get('contactos'));
			$contactosBorrar= array();

		 	foreach ($contactos as $contacto) {

		 		if(!empty($contacto['id']))
		 		{
		 			$contactosBorrar[]= $contacto['id'];
		 		}
		 		
		 	}

			foreach ($client->contacts as $contact)
			{	
				$sw =true;

				foreach ($contactos as $contacto) {
					# code...

					if(!empty($contacto['id']))
					{
						if($contact->id==$contacto['id'])
						{
							$contact->setFirstName(trim($contacto['first_name']));				
							$contact->setLastName(trim($contacto['last_name']));				
							$contact->setEmail(trim(strtolower($contacto['email'])));				
							$contact->setPhone(trim(strtolower($contacto['phone'])));
							$contact->save();
						}

					}
					
				}
				
			}	

			$primario = true;
			foreach ($contactos as $contacto) {
				# code...
				if(empty($contacto['id']))
				{
					$contact_new = Contact::createNew();
					$contact_new->client_id=$client->getId();
												
					$contact_new->setFirstName(trim($contacto['first_name']));				
					$contact_new->setLastName(trim($contacto['last_name']));				
					$contact_new->setEmail(trim(strtolower($contacto['email'])));				
					$contact_new->setPhone(trim(strtolower($contacto['phone'])));
					$contact_new->setIsPrimary($primario);
					$primario = false;

					$resultado = $contact_new->guardar();
					//print_r($resultado);
					$client->contacts()->save($contact_new);
				}
			}

			foreach ($client->contacts as $contact) {
				# code...
				if(!in_array($contact->id, $contactosBorrar))
				{
					$contact->delete();
				}
			}
		}
		else
		{
			if($client->contacts)
			{
				foreach ($client->contacts as $contacto) {
					$contacto->delete();
					# code...
				}
			}
		

		}


		
		// return Response::json($contactosBorrar);
		Session::flash('message', $message);

		return Redirect::to('clientes/' . $client->getPublicId());		
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($public_id)
	{
	
		$client = Client::scope($public_id)->first();
		$client->delete();
		$message = "Cliente eliminado con éxito";
		return Redirect::to('clientes');
		// return Response::json(array('XD'=>'Ooooo'));

		// $getTotalBalance = $client->balance;
		// $getTotalCredit = Credit::scope()->where('client_id', '=', $client->id)->whereNull('deleted_at')->where('balance', '>', 0)->sum('balance');

		// if ($getTotalBalance > 0) {	
		// 	$message = "El cliente " . $client->name . " tiene " . $getTotalBalance . " pendiente de pago.";
		// 	Session::flash('error', $message);
		// 	return Redirect::to('clientes');
		// }else if ($getTotalCredit > 0) {
		// 	$message = "El cliente " . $client->name . " tiene " . $getTotalCredit . " de Crédito disponible.";
		// 	Session::flash('error', $message);
		// 	return Redirect::to('clientes');
		// }else{
		// 	return Response::json($client);
		// 	$client->delete();
		// 	$message = "Cliente eliminado con éxito";
		// 	Session::flash('message', $message);
		// 	return Redirect::to('clientes');
		// }

	}

}
