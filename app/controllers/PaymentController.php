<?php

class PaymentController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
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

	private function save()
    {
        $rules = array(
            'client' => 'required',
            'invoice' => 'required',
            'amount' => 'required|positive'
        );

        if (Input::get('invoice')) {
            $invoice = Invoice::scope(Input::get('invoice'))->firstOrFail();
            $rules['amount'] .= '|less_than:' . $invoice->balance;
        }

        if (Input::get('payment_type_id') == PAYMENT_TYPE_CREDIT)
        {
            $rules['payment_type_id'] = 'has_credit:' . Input::get('client') . ',' . Input::get('amount');
        }

        $messages = array(
		    'required' => 'El campo es Requerido',
		    'positive' => 'El Monto debe ser mayor a cero',
		    'less_than' => 'El Monto debe ser menor o igual a ' . $invoice->balance,
		    'has_credit' => 'El Cliente no tiene crédito suficiente'
		);

        $validator = \Validator::make(Input::all(), $rules, $messages);

        if ($validator->fails())
        {
            $url = 'pagos/create';
            return Redirect::to($url)
                ->withErrors($validator)
                ->withInput();
        }
        else
        {

            $payment = Payment::createNew();
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
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function bulk()
	{
		$public_id = Input::get('public_id');

		$payment = Payment::scope($public_id)->first();
		$payment->delete();

		$message = "Pago eliminado con éxito";
		Session::flash('message', $message);
		return Redirect::to('pagos');
	}

}
