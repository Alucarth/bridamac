<?php

class ClientController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$clients =  Client::join('contacts', 'contacts.client_id', '=', 'clients.id')
				->where('clients.account_id', '=', Auth::user()->account_id)
				->where('contacts.is_primary', '=', true)
				->where('contacts.deleted_at', '=', null)
				->select('clients.public_id', 'clients.name','clients.nit', 'contacts.first_name', 'contacts.last_name', 'contacts.phone', 'clients.balance', 'clients.paid_to_date', 'clients.work_phone')->get();

	    return View::make('clientes.index', array('clients' => $clients));
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

	public function buscar($cadena="")
	{
		$cadena = Input::get('name');
		$clients = Client::where('name','like',$cadena."%")->select('id','name')->get();
    	return Response::json($clients);
	}
	public function buscar2($cadena="")
	{
		$cadena = Input::get('name');
		$clients = DB::table('clients')->where('name','like',$cadena."%")->where('account_id','=', Auth::user()->account_id)->select('id','name','nit','business_name','public_id')->get();

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
		// return 0;
		// return Response::json(Input::all());
		// $contador=0;

		//con esto se recupera la informacion de los contactos de la tabla
		
		//conversion
		// $vNombres= $contactos['first_name'];
		// $vApellidos= $contactos['last_name'];
		// $vCorreo = $contactos['email'];
		// $vTelefono = $contactos['phone'];

		// foreach ($vNombres as $i => $nombre) {
		// 	# code...
		// 	$contactosArray[]=array('first_name'=>$nombre,'last_name'=> $vApellidos[$i],'email'=>$vCorreo[$i],'phone'=>$vTelefono[$i] ); 
		
		// }



		// return Response::json(array('resultado: ' => $contactos,'size' => $contador));
	

		
		// $contactosArray = array();

		// foreach ($vNobres as $i => $nombre) {
		// 	# code...
		// 	$contactosArray[]=array('first_name'=>$nombre,'last_name'=> $vApellidos[$i],'email'=>$vCorreo[$i],'phone'=>$vTelefono[] ); 
		// 	// $vector['id'][] = $vectorId[$i];
		// 	// $vector['name'][]= 	$name;
		// 	// $contador++;
		// }
		// $foreach ($variable as $key => $value) {
		// 	# code...
		// }
		// $foreach ($contactos['id'] as $i => $contacto) {
		// 	# code...
		// 	// $vector[]['c'] =$contacto['id']; 
		// 	$contactor++;
		// }
		// for ($i = 0; $i<Input::get('contacto').length ; $i++) {
		    

		//     $contador++;
		// }


		// $contact = Contact::createNew();		

		// return Response::json(array('contenido'=>Input::all(),'resultado: ' => $vector ,'contador' => $contador ));
	//	return $this->save();
		$client = Client::createNew();
		//$client -> setNit(null); 
		$client->setNit(trim(Input::get('nit')));
		$client->setName(trim(Input::get('name')));
		$client->setBussinesName(trim(Input::get('business_name')));

		if(Input::get('nit')=="1")
			return json_encode(0);

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
		


		// foreach ($new_contacts->contacts as $contact)
		// {				
		// 		$contact_new = Contact::createNew();
		// 		$contact_new->client_id=$client->getId();
											
		// 		$contact_new->setFirstName(trim($contact->first_name));				
		// 		$contact_new->setLastName(trim($contact->last_name));				
		// 		$contact_new->setEmail(trim(strtolower($contact->email)));				
		// 		$contact_new->setPhone(trim(strtolower($contact->phone)));
		// 		$contact_new->setIsPrimary($isPrimary);
		// 		$isPrimary = false;

		// 		$resultado = $contact_new->guardar();
		// 		//print_r($resultado);
		// 		$client->contacts()->save($contact_new);
		// 		//$contactIds[] = $contact_new->public_id;
		// }

		//if(null!=Input::get('json'));
	//		return Response::json(array());
				
		Session::flash('message',	$message);
		return Redirect::to('clientes');
	}



	private function save($publicId = null)
	{
		$rules = array(
			'nit' => 'required',
			'name' => 'required',
			'business_name' => 'required'
		);

		$messages = array(
		    'required' => 'El campo es Requerido',
		);

	    $validator = Validator::make(Input::all(), $rules, $messages);

		if ($validator->fails())
		{
			 $url = $publicId ? 'clientes/' . $publicId . '/edit' : 'clientes/create';
			return Redirect::to($url)
				->withErrors($validator)
				->withInput();
		}
		else
		{
			if ($publicId)
			{
				$client = Client::scope($publicId)->firstOrFail();
			}
			else
			{
				$client = Client::createNew();
			}

			$client->nit = trim(Input::get('nit'));
			$client->name = trim(Input::get('name'));
			$client->business_name = trim(Input::get('business_name'));
            $client->work_phone = trim(Input::get('work_phone'));

			$client->custom_value1 = trim(Input::get('custom_value1'));
			$client->custom_value2 = trim(Input::get('custom_value2'));
			$client->custom_value3 = trim(Input::get('custom_value3'));
			$client->custom_value4 = trim(Input::get('custom_value4'));
			$client->custom_value5 = trim(Input::get('custom_value5'));
			$client->custom_value6 = trim(Input::get('custom_value6'));
			$client->custom_value7 = trim(Input::get('custom_value7'));
			$client->custom_value8 = trim(Input::get('custom_value8'));
			$client->custom_value9 = trim(Input::get('custom_value9'));
			$client->custom_value10 = trim(Input::get('custom_value10'));
			$client->custom_value11 = trim(Input::get('custom_value11'));
			$client->custom_value12 = trim(Input::get('custom_value12'));

			$client->address1 = trim(Input::get('address1'));
			$client->address2 = trim(Input::get('address2'));
			$client->private_notes = trim(Input::get('private_notes'));

			$client->save();

			$data = json_decode(Input::get('data'));
			$contactIds = [];
			$isPrimary = true;

			foreach ($data->contacts as $contact)
			{
				if (isset($contact->public_id) && $contact->public_id)
				{
					$record = Contact::scope($contact->public_id)->firstOrFail();
				}
				else
				{
					$record = Contact::createNew();
				}

				$record->email = trim(strtolower($contact->email));
				$record->first_name = trim($contact->first_name);
				$record->last_name = trim($contact->last_name);
				$record->phone = trim($contact->phone);
				$record->is_primary = $isPrimary;
				$isPrimary = false;

				$client->contacts()->save($record);
				$contactIds[] = $record->public_id;
			}

			foreach ($client->contacts as $contact)
			{
				if (!in_array($contact->public_id, $contactIds))
				{
					$contact->delete();
				}
			}

			$message = $publicId ? 'Cliente actualizado con éxito' : 'Cliente creado con éxito';

			Session::flash('message', $message);

			return Redirect::to('clientes/' . $client->getPublicId());
		}
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
		$data = [
			'client' => $client,			
			'url' => 'clientes/' . $publicId,
			'title' => 'Editar Cliente'
		];
				
		$data = array_merge($data, self::getViewModel());
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
					
		$new_contacts = json_decode(Input::get('data'));
			
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
		$isPrimary = true;		
	
		foreach ($new_contacts->contacts as $contact)
		{				
				$contact_new = Contact::createNew();
				$contact_new->client_id=$client->getId();
									
				$contact_new->setFirstName(trim($contact->first_name));				
				$contact_new->setLastName(trim($contact->last_name));				
				$contact_new->setEmail(trim(strtolower($contact->email)));				
				$contact_new->setPhone(trim(strtolower($contact->phone)));
				$contact_new->setIsPrimary($isPrimary);
				$isPrimary = false;

				$resultado = $contact_new->guardar();
				//print_r($resultado);
				$client->contacts()->save($contact_new);
				$contactIds[] = $contact_new->public_id;
		}


			
		foreach ($client->contacts as $contact)
		{
			if (!in_array($contact->public_id, $contactIds))
			{
				$contact->delete();
			}
		}		

		Session::flash('message', $message);

		return Redirect::to('clientes/' . $client->getPublicId());		
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function bulk()
	{
		$public_id = Input::get('public_id');
		$client = Client::scope($public_id)->first();

		$getTotalBalance = $client->balance;
		$getTotalCredit = Credit::scope()->where('client_id', '=', $client->id)->whereNull('deleted_at')->where('balance', '>', 0)->sum('balance');

		if ($getTotalBalance > 0) {	
			$message = "El cliente " . $client->name . " tiene " . $getTotalBalance . " pendiente de pago.";
			Session::flash('error', $message);
			return Redirect::to('clientes');
		}else if ($getTotalCredit > 0) {
			$message = "El cliente " . $client->name . " tiene " . $getTotalCredit . " de Crédito disponible.";
			Session::flash('error', $message);
			return Redirect::to('clientes');
		}else{
			$client->delete();
			$message = "Cliente eliminado con éxito";
			Session::flash('message', $message);
			return Redirect::to('clientes');
		}

	}

}
