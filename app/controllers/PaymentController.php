<?php

class PaymentController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$table = Datatable::table()
	      ->addColumn('Código','Factura','Cliente','Referencia de transacción','Tipo de Pago','Monto','Fecha de Pago')
	      ->setUrl(route('api.pagos'))
	      ->noScript();

	    return View::make('pagos.view', array('table' => $table));
	}

	public function getDatatable()
	{	
		$payments =  Payment::join('clients', 'clients.id', '=','payments.client_id')
                ->join('invoices', 'invoices.id', '=','payments.invoice_id')
                ->leftJoin('payment_types', 'payment_types.id', '=', 'payments.payment_type_id')
	            ->where('payments.account_id', '=', \Auth::user()->account_id)
	            ->where('clients.deleted_at', '=', null)
	            ->select('payments.public_id', 'payments.transaction_reference', 'clients.name as client_name', 'clients.public_id as client_public_id', 'payments.amount', 'payments.payment_date', 'invoices.public_id as invoice_public_id', 'invoices.invoice_number', 'payment_types.name as payment_type');        


	    return Datatable::query($payments)
        ->addColumn('public_id', function($model) {  return $model->public_id; })
        ->addColumn('invoice_number', function($model) { return link_to('facturas/' . $model->invoice_public_id . '/edit', $model->invoice_number); })
        ->addColumn('client_name', function($model) { return link_to('clientes/' . $model->client_public_id, $model->client_name); })
        ->addColumn('transaction_reference', function($model) { return $model->transaction_reference ? $model->transaction_reference : '<i>Pagado</i>'; })
        ->addColumn('payment_type', function($model) { return $model->payment_type; })
        ->addColumn('amount', function($model) { return $model->amount; })
        ->addColumn('payment_date', function($model) { return $model->payment_date; }) 
	    ->searchColumns('public_id', 'name')
	    ->orderColumns('public_id', 'name')
	    ->make();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($clientPublicId = 0, $invoicePublicId = 0)
	{
		$data = [

            'clientPublicId' => Input::old('client') ? Input::old('client') : $clientPublicId,
            'invoicePublicId' => Input::old('invoice') ? Input::old('invoice') : $invoicePublicId,
            'invoices' => Invoice::scope()->where('is_recurring', '=', false)->where('is_quote', '=', false)->where('invoice_status_id', '<', '5')->where('balance', '>', 0)->with('client', 'invoice_status', 'branch')->orderBy('invoice_number')->get(),
            'paymentTypes' => PaymentType::orderBy('id')->get(),
            'clients' => Client::scope()->with('contacts')->orderBy('name')->get(),
			'payment' => null, 
			'method' => 'POST', 
			'url' => 'pagos', 
			'title' => 'Nuevo pago'
		];

		return View::make('pagos.edit', $data);
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
            'client' => 'required',
            'invoice' => 'required',  
            'amount' => 'required|positive'
        );
        
        if (Input::get('payment_type_id') == PAYMENT_TYPE_CREDIT)
        {
            $rules['payment_type_id'] = 'has_credit:' . Input::get('client') . ',' . Input::get('amount');
        }

        $validator = \Validator::make(Input::all(), $rules);

        if ($validator->fails())
        {
            $url = $publicId ? 'pagos/' . $publicId . '/edit' : 'pagos/create';
            return Redirect::to($url)
                ->withErrors($errors)
                ->withInput();
        }
        else 
        {    

        if ($publicId) 
        {
            $payment = Payment::scope($publicId)->firstOrFail();
        } 
        else 
        {
            $payment = Payment::createNew();
        }

	        $paymentTypeId = Input::get('payment_type_id') ? Input::get('payment_type_id') : null;
	        $clientId = Client::getPrivateId(Input::get('client'));
	        $amount = floatval(Input::get('amount'));

	        if ($paymentTypeId == PAYMENT_TYPE_CREDIT)
	        {
	            $credits = Credit::scope()->where('client_id', '=', $clientId)
	                        ->where('balance', '>', 0)->orderBy('created_at')->get();            
	            $applied = 0;

	            foreach ($credits as $credit)
	            {
	                $applied += $credit->apply($amount);

	                if ($applied >= $amount)
	                {
	                    break;
	                }
	            }
	        }

	        $payment->client_id = $clientId;
	        $payment->invoice_id = Invoice::getPrivateId(Input::get('invoice')) ;
	        $payment->payment_type_id = $paymentTypeId;
	        $payment->payment_date =  date("Y-m-d",strtotime(Input::get('payment_date')));
	        $payment->amount = $amount;
	        $payment->transaction_reference = trim(Input::get('transaction_reference'));
	        $payment->save();

            Session::flash('message', 'Pago creado con éxito');
            return Redirect::to('clientes/' . Input::get('client'));
        }
    }


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	// public function show($id)
	// {
	// 	//
	// }


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	// public function edit($id)
	// {
	// 	//
	// }


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
	// public function destroy($id)
	// {
	// 	//
	// }


}
