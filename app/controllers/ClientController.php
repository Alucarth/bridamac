<?php

class ClientController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

	    $table = Datatable::table()
	      ->addColumn('Código','Nombre','Contacto','Teléfono','Balance','Pagado')
	      ->setUrl(route('api.clientes'))
	      ->noScript();

	    return View::make('clientes.view', array('table' => $table));

	    // return View::make('clientes.view');

	}

    public function getDatatable()
	{	
		$clients = DB::table('clients')
					->join('contacts', 'contacts.client_id', '=', 'clients.id')
					->where('clients.account_id', '=', Auth::user()->account_id)
    				->where('contacts.is_primary', '=', true)
    				->where('contacts.deleted_at', '=', null)
    				->select('clients.public_id','clients.nit','clients.business_name', 'clients.name','contacts.first_name','contacts.last_name','contacts.phone','clients.balance','clients.paid_to_date', 'clients.work_phone','contacts.email','custom_value1','clients.deleted_at');

	    return Datatable::query($clients)

        ->addColumn('public_id', function($model) {  return $model->public_id; })
	    ->addColumn('name', function($model) { return link_to('clientes/' . $model->public_id, $model->name); })
	    ->addColumn('first_name', function($model) { return $model->first_name . ' ' . $model->last_name; })
	    ->addColumn('work_phone', function($model) { return $model->work_phone ? $model->work_phone : $model->phone; })
	    ->addColumn('balance', function($model) { return $model->balance; })    	    
	    ->addColumn('paid_to_date', function($model) { return $model->paid_to_date; })
	    ->searchColumns('public_id', 'name')
	    ->orderColumns('public_id', 'name')
	    ->make();
	}



	// public function getDatatable2()
 //    {    	
 //    	$filter = Input::get('sSearch');

 //    	$query = DB::table('clients')
 //    				->join('contacts', 'contacts.client_id', '=', 'clients.id')
 //    				->where('clients.account_id', '=', Auth::user()->account_id)
 //    				->where('contacts.is_primary', '=', true)
 //    				->where('contacts.deleted_at', '=', null)
 //    				->select('clients.public_id','clients.nit','clients.business_name', 'clients.name','contacts.first_name','contacts.last_name','contacts.phone','clients.balance','clients.paid_to_date', 'clients.work_phone','contacts.email','custom_value1','clients.deleted_at');
    	
 //    	if (!Session::get('show_trash:client'))
 //    	{
 //    		$query->where('clients.deleted_at', '=', null);
 //    	}

 //    	if ($filter)
 //    	{
 //    		$cod1 = substr($filter,0,3);
	// 		$cod2 = 'cod';
	// 		$cod3 = 'COD';
	// 		$cod4 = 'Cod';

 //    		if(strcmp($cod1, $cod2) == 0 or strcmp($cod1, $cod3) == 0 or strcmp($cod1, $cod4) == 0)
	// 		{
 //    			$filter = substr($filter,3);
 //    			$query->where(function($query) use ($filter)
	//             {
	//             	$query->where('clients.public_id', 'like', $filter.'%');
	//             });
	// 		}
	// 		else
	// 		{
	// 			$query->where(function($query) use ($filter)
	//             {
	//             	$query->where('clients.name', 'like', '%'.$filter.'%')
	//             		  ->orWhere('clients.business_name', 'like', '%'.$filter.'%')
	//             		  ->orWhere('clients.nit', 'like', $filter.'%')
	//             		  ->orWhere('contacts.first_name', 'like', '%'.$filter.'%')
	//             		  ->orWhere('contacts.last_name', 'like', '%'.$filter.'%')
	//             		  ->orWhere('contacts.email', 'like', $filter.'%');
	//             });
	//         }
 //    	}

 //        return Datatable::query($clients)
 //    	    ->addColumn('checkbox', function($model) { return '<input type="checkbox" name="ids[]" value="' . $model->public_id . '">'; })
 //            ->addColumn('public_id', function($model) {  return $model->public_id; })
 //    	    ->addColumn('name', function($model) { return link_to('clients/' . $model->public_id, $model->name); })
 //    	    ->addColumn('first_name', function($model) { return $model->first_name . ' ' . $model->last_name; })
 //    	    ->addColumn('work_phone', function($model) { return $model->work_phone ? $model->work_phone : $model->phone; })
 //    	    ->addColumn('balance', function($model) { return Utils::formatMoney($model->balance, 1); })    	    
 //    	    ->addColumn('paid_to_date', function($model) { return Utils::formatMoney($model->paid_to_date, 1); })    	    
 //    	    ->addColumn('dropdown', function($model) 
 //    	    { 
 //    	    	    $str = '<div class="btn-group tr-action" style="visibility:hidden;">
 //  							<button type="button" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">
 //    							'.trans('texts.select').' <span class="caret"></span>
 //  							</button>
 //  							<ul class="dropdown-menu" role="menu">';
 //                if (!$model->deleted_at || $model->deleted_at == '0000-00-00')
 //                {               
 //  				    $str .= '<li><a href="' . URL::to('clients/'.$model->public_id.'/edit') . '">'.trans('texts.edit_client').'</a></li>
	// 					    <li class="divider"></li>
	// 					    <li><a href="' . URL::to('invoices/create/'.$model->public_id) . '">'.trans('texts.new_invoice').'</a></li>						    
	// 					    <li><a href="' . URL::to('payments/create/'.$model->public_id) . '">'.trans('texts.new_payment').'</a></li>						    
	// 					    <li><a href="' . URL::to('credits/create/'.$model->public_id) . '">'.trans('texts.new_credit').'</a></li>						    
	// 					    <li class="divider"></li>
	// 					    <li><a href="javascript:archiveEntity(' . $model->public_id. ')">'.trans('texts.archive_client').'</a></li>';

 //                }
 //                else
 //                {
 //                    $str .= '<li><a href="javascript:restoreEntity(' . $model->public_id. ')">'.trans('texts.restore_client').'</a></li>';
 //                }
 //                    $str .= '</ul></div>';
				
	// 			return $str;
 //    	    })    	   
 //    	    ->make();

 //    }



	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$data = [
			'client' => null, 
			'method' => 'POST', 
			'url' => 'clientes', 
			'title' => 'Nuevo cliente'
		];

		$data = array_merge($data, self::getViewModel());	
		return View::make('clientes.edit', $data);
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


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		return $this->save();
	}

	private function save($publicId = null)
	{
		$rules = array(	
			'nit' => 'required',
			'name' => 'required',
			'business_name' => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) 
		{
			 $url = $publicId ? 'clientes/' . $publicId . '/edit' : 'clientes/create';
			return Redirect::to($url)
				->withErrors($validator)
				->withInput(Input::except('password'));
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

			if ($publicId) 
			{
				// Activity::editClient($client);
				Session::flash('message', 'Cliente actualizado con éxito');
			} 
			else 
			{
				// Activity::createClient($client);
				Session::flash('message', 'Cliente creado con éxito');
			}

			return Redirect::to('clientes/' . $client->public_id);
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
		$getTotalCredit = DB::table('credits')->where('client_id','=',$client->id)->whereNull('deleted_at')->sum('balance');
		$hasRecurringInvoices = Invoice::scope()->where('is_recurring', '=', true)->whereClientId($client->id)->count() > 0;

		$data = array(
			'showBreadcrumbs' => false,
			'client' => $client,
			'credit' => $getTotalCredit,
			'title' => 'Ver Cliente',
			'hasRecurringInvoices' => $hasRecurringInvoices
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
			'method' => 'PUT', 
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
		return $this->save($publicId);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function bulk()
	{
		$action = Input::get('action');
		$ids = Input::get('id') ? Input::get('id') : Input::get('ids');	

		$clients = Client::scope($ids)->get();
		foreach ($clients as $client) 
		{			
            if ($action == 'restore')
            {
                $client->restore();
                $client->is_deleted = false;
                $client->save();
            }
            else
            {
                if ($action == 'archive')
                {
                    $client->is_deleted = true;
                    $client->save();
                }
                $client->delete();
            }			
		}

		$field = count($clients) == 1 ? '' : 's';		
		$message = "Cliente" . $field . " actualizado " . $field . "con éxito";

		Session::flash('message', $message);

		return Redirect::to('clientes');
	}

}
