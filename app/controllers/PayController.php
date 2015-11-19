<?php

class PayController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		return 'index';
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return View::make('pagos.create');
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
		// $rules = array(
  //           'client' => 'required',
  //           'invoice' => 'required',
  //           'amount' => 'required'
  //       );

  //       if (Input::get('invoice')) {
  //           $invoice = Invoice::scope(Input::get('invoice'))->firstOrFail();
  //           $rules['amount'] .= '|less_than:' . $invoice->balance;
  //       }

  //       if (Input::get('payment_type_id') == PAYMENT_TYPE_CREDIT)
  //       {
  //           $rules['payment_type_id'] = 'has_credit:' . Input::get('client') . ',' . Input::get('amount');
  //       }

  //       $messages = array(
		//     'required' => 'El campo es Requerido',
		//     'positive' => 'El Monto debe ser mayor a cero',
		//     'less_than' => 'El Monto debe ser menor o igual a ' . $invoice->balance,
		//     'has_credit' => 'El Cliente no tiene crédito suficiente'
		// );

  //       $validator = \Validator::make(Input::all(), $rules, $messages);

  //       if ($validator->fails())
  //       {
  //           $url = 'pagos/create';
  //           return Redirect::to($url)
  //               ->withErrors($validator)
  //               ->withInput();
  //       }
  //       else
  //       {

            $payment = Payment::createNew();
	        $paymentTypeId = Input::get('payment_type_id');
	        $clientId = Input::get('client');
	        $amount = floatval(Input::get('amount'));

	        // if ($paymentTypeId == PAYMENT_TYPE_CREDIT)
	        // {
	        //     $credits = Credit::scope()->where('client_id', '=', $clientId)
	        //                 ->where('balance', '>', 0)->orderBy('created_at')->get();
	        //     $applied = 0;

	        //     foreach ($credits as $credit)
	        //     {
	        //         $applied += $credit->apply($amount);

	        //         if ($applied >= $amount)
	        //         {
	        //             break;
	        //         }
	        //     }
	        // }

	        $payment->client_id = $clientId;
	        $payment->invoice_id =Input::get('invoice');
	        $payment->payment_type_id = $paymentTypeId;
	       	$payment->user_id = Auth::user()->id;
	        $payment->payment_date =  date("Y-m-d",strtotime(Input::get('payment_date')));
	        $payment->amount = $amount;
	        $payment->transaction_reference = trim(Input::get('transaction_reference'));

	        $payment->save();

	        $cliente = Client::find($payment->client_id);
                $cliente->balance =$cliente->balance-$payment->amount;
                $cliente->paid_to_date =$cliente->paid_to_date + $payment->amount;
                $cliente->save();
                
                $invoice = Invoice::find($payment->invoice_id);
                $invoice->balance = $invoice->balance - $payment->amount;
                
                if($invoice->balance==0)
                {
                    $invoice->invoice_status_id = INVOICE_STATUS_PAID;
                }
                else
                {
                    $invoice->invoice_status_id = INVOICE_STATUS_PARTIAL;
                }
                $invoice->save();
                
            Session::flash('message', 'Pago creado con éxito');

            return Redirect::to('clientes/' . Input::get('client'));
        // }
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
	}

	/**
	 * Funcion utilizada por ajax
	 *
	 * @param  int  $client_id
	 * @return facturas
	 */
	public function obtenerFacturas($client_id)
	{
		$facturas = Invoice::where('account_id',Auth::user()->account_id)->where('client_id',$client_id)->select('id','invoice_number','importe_total','balance')->get();

		$respuesta = get_object_vars($facturas);

		return Response::json($facturas);
	}
}
