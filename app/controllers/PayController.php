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
		$payments =  Payment::join('clients', 'clients.id', '=','payments.client_id')
                ->join('invoices', 'invoices.id', '=','payments.invoice_id')
                ->leftJoin('payment_types', 'payment_types.id', '=', 'payments.payment_type_id')
	            ->where('payments.account_id', '=', \Auth::user()->account_id)
	            ->select('payments.public_id', 'payments.transaction_reference', 'clients.name as client_name', 'clients.public_id as client_public_id', 'payments.amount', 'payments.payment_date', 'invoices.public_id as invoice_public_id', 'invoices.invoice_number', 'payment_types.name as payment_type')->get();

	    return View::make('pagos.index', array('payments' => $payments));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$dato =[
		'now'=>date('d/m/Y'),
		'cliente_id'=>0,
		'factura_id'=>0,
		];
		return View::make('pagos.create',$dato);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//return 0;
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

//                $payment->client_id = $clientId;
//	        $payment->invoice_id =Input::get('invoice');
//	        $payment->payment_type_id = $paymentTypeId;
//	       	$payment->user_id = Auth::user()->id;
//	        $payment->payment_date =  date("Y-m-d",strtotime(Input::get('payment_date')));
//	        $payment->amount = $amount;
//	        $payment->transaction_reference = trim(Input::get('transaction_reference'));
                
	        $payment->setClientId($clientId);
	        $payment->setInvoiceId(Input::get('invoice'));
	        $payment->setPaymentTypeId($paymentTypeId);
	       	$payment->setUserId(Auth::user()->id);
	       	$dateparser = explode("/",Input::get('payment_date'));
	    	$date = $dateparser[2].'-'.$dateparser[1].'-'.$dateparser[0];    

	        $payment->setPaymentDate($date);
	        $payment->setAmount($amount);
	        $payment->setTransactionReference(trim(Input::get('transaction_reference')));
                $error=$payment->guardar();
                if($error)
                {
                    Session::flash('error', $error);                    
                    return Redirect::to('pagos/create');
                }                                
	        $payment->save();


                $cliente = Client::find($payment->client_id);
                $cliente->balance =$cliente->balance-$payment->amount;
                $cliente->paid_to_date =$cliente->paid_to_date + $payment->amount;
                $cliente->save();
                
                $invoice = Invoice::find($payment->invoice_id);
                $invoice->balance = $invoice->balance - $payment->amount;

                $invoice->save();
                
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
                $paymentName = PaymentType::where('id','=',$paymentTypeId)->first();

                if($invoice->balance==0)
                {
                    // $invoice->invoice_status_id = INVOICE_STATUS_PAID;

                	Utils::addNote($invoice->id, '<b>'.$invoice->getClientName().': </b>Totalmente pagada;&nbsp;&nbsp; se pagó:<b>'.$payment->amount.'</b>Bs, con <b>'.$paymentName->name.'</b>',INVOICE_STATUS_PAID);
                }
                else
                {
                    // $invoice->invoice_status_id = INVOICE_STATUS_PARTIAL;
                    Utils::addNote($invoice->id, '<b>'.$invoice->getClientName().': </b>Parcialmente pagado;&nbsp;&nbsp; se pagó:<b>'.$payment->amount.'</b> Bs, con <b>'.$paymentName->name.'</b>',INVOICE_STATUS_PARTIAL);
                }
                
                

            Session::flash('message', 'Pago creado con éxito');
            $client = Client::where('id','=',Input::get('client'))->first();
            return Redirect::to('clientes/' . $client->public_id);
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
		$facturas = Invoice::where('account_id',Auth::user()->account_id)->where('client_id',$client_id)->where('balance','>','0')->select('id','invoice_number','importe_total','balance')->get();
                
		$respuesta = get_object_vars($facturas);

		return Response::json($facturas);
	}
        
        public function getMaxCredit($client_id){
            $credit = Credit::where('account_id',Auth::user()->account_id)->where('client_id',$client_id)->get();
            $credito = 0;
            foreach ($credit as $cre)           
                $credito+=$cre->balance;            
            return $credito;
        }

    public function pagoCliente($client,$invoice){
    	$dato=[
    		'now'=>date('d/m/Y'),
    		'cliente_id'=>$client,
    		'factura_id'=>$invoice,
    	];
    	return View::make('pagos.create',$dato);

    }
}
