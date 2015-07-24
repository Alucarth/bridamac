<?php

class CreditController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$table = Datatable::table()
	      ->addColumn('Código', 'Cliente', 'Cantidad de Crédito', 'Balance de Crédito', 'Fecha de Crédito', 'Referencia de Crédito')
	      ->setUrl(route('api.creditos'))
	      ->noScript();

	    return View::make('creditos.view', array('table' => $table));
	}

	public function getDatatable()
	{	
		$credits =  Credit::join('clients', 'clients.id', '=','credits.client_id')
	            ->where('credits.account_id', '=', \Auth::user()->account_id)
	            ->where('clients.deleted_at', '=', null)
	            ->select('credits.public_id', 'clients.name as client_name', 'clients.public_id as client_public_id', 'credits.amount', 'credits.balance', 'credits.credit_date', 'credits.private_notes');        

	    return Datatable::query($credits)
        ->addColumn('public_id', function($model) {  return $model->public_id; })
        ->addColumn('client_name', function($model) { return link_to('clientes/' . $model->client_public_id, $model->client_name); })
		->addColumn('amount', function($model){ return $model->amount; })
        ->addColumn('balance', function($model){ return $model->balance; })
        ->addColumn('credit_date', function($model) { return $model->credit_date; })
        ->addColumn('private_notes', function($model) { return $model->private_notes; })
	    ->searchColumns('public_id', 'name')
	    ->orderColumns('public_id', 'name')
	    ->make();
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($clientPublicId = 0)
	{
		$data = array(
            'clientPublicId' => Input::old('client') ? Input::old('client') : $clientPublicId,
            'credit' => null, 
            'method' => 'POST', 
            'url' => 'creditos', 
            'title' => 'Nuevo Crédito',
            'clients' => Client::scope()->with('contacts')->orderBy('name')->get());

        return View::make('creditos.edit', $data);
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


 	private function save()
    {
        $rules = array(
            'client' => 'required',
            'amount' => 'required|positive',
        );

        $messages = array(
		    'required' => 'El campo es Requerido',
		    'positive' => 'El Monto debe ser positivo',
		);

        $validator = Validator::make(Input::all(), $rules, $messages);

        if ($validator->fails()) 
        {
            $url = 'creditos/create';
            return Redirect::to($url)
                ->withErrors($validator)
                ->withInput();
        } 
        else 
        {            
	        $credit = Credit::createNew();
	        $credit->client_id = Client::getPrivateId(Input::get('client'));
	        $credit->credit_date = date("Y-m-d",strtotime(Input::get('credit_date')));
	        $credit->amount = Input::get('amount');
	        $credit->balance = Input::get('amount');
	        $credit->private_notes = trim(Input::get('private_notes'));
	        $credit->save();

            Session::flash('message', 'Crédito creado con éxito');
            return Redirect::to('clientes/' . Input::get('client'));
        }
    }


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	// public function update($id)
	// {
	// 	//
	// }


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

		$credits = Credit::scope($ids)->get();
		foreach ($credits as $credit) 
		{     
		        if ($action == 'restore')
		        {
		            $credit->restore();
		            $credit->save();
		        }
		        else
		        {
		            if ($action == 'archive')
		            {
						// $credit->delete();
		            }
		            
		        }     
		}

		$field = count($credits) == 1 ? '' : 's';   
		$message = "Crédito" . $field . " actualizado " . $field . "con éxito";

		Session::flash('message', $message);

		return Redirect::to('productos');
	}



}
