<?php

class CreditController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$credits =  Credit::join('clients', 'clients.id', '=','credits.client_id')
	            ->where('credits.account_id', '=', \Auth::user()->account_id)
	            ->where('clients.deleted_at', '=', null)
	            ->select('credits.public_id', 'clients.name as client_name', 'clients.public_id as client_public_id', 'credits.amount', 'credits.balance', 'credits.credit_date', 'credits.private_notes')->get();

	    return View::make('creditos.index', array('credits' => $credits));
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
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function bulk()
	{
		$public_id = Input::get('public_id');
		$credit = Credit::scope($public_id)->first();

		if ($credit->balance < $credit->amount) {	
			$message = "El Crédito ya fue utilizado en pagos.";
			Session::flash('error', $message);
			return Redirect::to('clientes');
		}else{
			$credit->delete();
			$message = "Crédito eliminado con éxito";
			Session::flash('message', $message);
			return Redirect::to('creditos');
		}
	}

}
