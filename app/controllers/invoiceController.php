<?php

class InvoiceController extends \BaseController {

	public function __construct()
	{


	}

	// public function index()
	// {
  //           $invoices = Invoice::where('account_id',Auth::user()->account_id)->where('branch_id',Session::get('branch_id'))->orderBy('public_id', 'DESC')->get();
	//     return View::make('factura.index', array('invoices' => $invoices));
	// }

	public function indexNota(){
		return View::make('factura.indexNota');
	}

	public function create()
	{

		$client = null;
		$account = Account::findOrFail(Auth::user()->account_id);		
        $branch = Branch::where('id','=',Session::get('branch_id'))->first();
        $today = date("Y-m-d");
        $expire = $branch->deadline;
        $today_time = strtotime($today);
        $expire_time = strtotime($expire);

        if ($expire_time < $today_time)
        {
            Session::flash('error','La fecha límite de emisión caducó, porfavor actualice su Dosificación');
            return Redirect::to('sucursales/'.$branch->public_id.'/edit');
        }
        $last_invoice= Invoice::where('account_id',Auth::user()->account_id)->where('branch_id',Session::get('branch_id'))->max('invoice_date');
        $last_date=  strtotime($last_invoice);
        $secs = $today_time - $last_date;// == <seconds between the two times>
        $days = $secs / 86400;
   		$invoiceDesigns = TypeDocument::where('account_id',\Auth::user()->account_id)->orderBy('public_id', 'desc')->get();
		$data = array(
				'entityType' => ENTITY_INVOICE,
				'account' => $account,
				'invoice' => null,
				'showBreadcrumbs' => false,
				'data' => Input::old('data'),
				'invoiceDesigns' => $invoiceDesigns,
				'method' => 'POST',
				'url' => 'factura',
				'title' => trans('texts.new_invoice'),
                                'vencido'=>0,//$vencido,
                                'last_invoice_date'=>$days,
				);
		$data = array_merge($data, self::getViewModel());
		return View::make('factura.new', $data);
	}

        public function createCustom($publicId)
	{

		$client = Client::where('account_id',Auth::user()->account_id)->where('public_id',$publicId)->first();
		$account = Account::findOrFail(Auth::user()->account_id);
		// if ($clientPublicId)
		// {
		// 	$client = Client::scope($clientPublicId)->firstOrFail();
  //  		}
                $branch = Branch::where('id','=',Session::get('branch_id'))->first();
                $today = date("Y-m-d");
                $expire = $branch->deadline;
                $today_time = strtotime($today);
                $expire_time = strtotime($expire);

                if ($expire_time < $today_time)
                {
                    Session::flash('error','La fecha límite de emisión caducó, porfavor actualice su Dosificación');
                    return Redirect::to('sucursales/'.$branch->public_id.'/edit');
                }
                $last_invoice= Invoice::where('account_id',Auth::user()->account_id)->where('branch_id',Session::get('branch_id'))->max('invoice_date');
                $last_date=  strtotime($last_invoice);
                $secs = $today_time - $last_date;// == <seconds between the two times>
                $days = $secs / 86400;

   		$invoiceDesigns = TypeDocument::where('account_id',\Auth::user()->account_id)->orderBy('public_id', 'desc')->get();
		$data = array(
				'entityType' => ENTITY_INVOICE,
				'account' => $account,
				'invoice' => null,
				'showBreadcrumbs' => false,
				'data' => Input::old('data'),
				'invoiceDesigns' => $invoiceDesigns,
				'method' => 'POST',
				'url' => 'factura',
				'title' => trans('texts.new_invoice'),
                                'vencido'=>0,//$vencido,
                                'last_invoice_date'=>$days,
                                'client'    => $client
				);
		$data = array_merge($data, self::getViewModel());

		return View::make('factura.newCustom', $data);
	}


	public function newNotaEntrega()
	{

		$client = null;
		$account = Account::findOrFail(Auth::user()->account_id);
		// if ($clientPublicId)
		// {
		// 	$client = Client::scope($clientPublicId)->firstOrFail();
  //  		}
                $branch = Branch::where('id','=',Session::get('branch_id'))->first();

                $last_invoice= Invoice::where('account_id',Auth::user()->account_id)->where('branch_id',Session::get('branch_id'))->max('invoice_date');
                $last_date=  strtotime($last_invoice);
                $secs = $today_time - $last_date;// == <seconds between the two times>
                $days = $secs / 86400;

   		$invoiceDesigns = TypeDocument::where('account_id',\Auth::user()->account_id)->orderBy('public_id', 'desc')->get();
		$data = array(
				'entityType' => ENTITY_INVOICE,
				'account' => $account,
				'invoice' => null,
				'showBreadcrumbs' => false,
				'data' => Input::old('data'),
				'invoiceDesigns' => $invoiceDesigns,
				'method' => 'POST',
				'url' => 'factura',
				'title' => trans('texts.new_invoice'),
                                'vencido'=>0,//$vencido,
                                'last_invoice_date'=>$days,
				);
		$data = array_merge($data, self::getViewModel());

		return View::make('factura.newNotaEntrega', $data);
	}

       public function newSinCreditoFiscal(){
            $client = null;
            $account = Account::findOrFail(Auth::user()->account_id);
            // if ($clientPublicId)
            // {
            // 	$client = Client::scope($clientPublicId)->firstOrFail();
    //  		}
            $branch = Branch::where('id','=',Session::get('branch_id'))->first();
            $today = date("Y-m-d");
            $expire = $branch->deadline;
            $today_time = strtotime($today);
            $expire_time = strtotime($expire);

            if ($expire_time < $today_time)
            {
                Session::flash('error','La fecha límite de emisión caducó, porfavor actualice su Dosificación');
                return Redirect::to('sucursales/'.$branch->public_id.'/edit');
            }
            $last_invoice= Invoice::where('account_id',Auth::user()->account_id)->where('branch_id',Session::get('branch_id'))->max('invoice_date');
            $last_date=  strtotime($last_invoice);
            $secs = $today_time - $last_date;// == <seconds between the two times>
            $days = $secs / 86400;

            $invoiceDesigns = TypeDocument::where('account_id',\Auth::user()->account_id)->orderBy('public_id', 'desc')->get();
            $data = array(
                            'entityType' => ENTITY_INVOICE,
                            'account' => $account,
                            'invoice' => null,
                            'showBreadcrumbs' => false,
                            'data' => Input::old('data'),
                            'invoiceDesigns' => $invoiceDesigns,
                            'method' => 'POST',
                            'url' => 'factura',
                            'title' => trans('texts.new_invoice'),
                            'vencido'=>0,//$vencido,
                            'last_invoice_date'=>$days,
                            );
            $data = array_merge($data, self::getViewModel());

            return View::make('factura.newSinCreditoFiscal', $data);

       }

	private static function getViewModel()
	{
		return [
			'branches' => Branch::where('account_id', '=', Auth::user()->account_id)->get(),
			'products' => Product::scope()->orderBy('id')->get(array('product_key','notes','cost','qty')),
			//'clients' => Client::scope()->with('contacts')->orderBy('name')->get(),
			//'client' => Client::where('id','=',$id )->first(),
			'taxRates' => TaxRate::scope()->orderBy('name')->get(),
			'frequencies' => array(
				1 => 'Semanal',
				2 => 'Cada 2 semanas',
				3 => 'Cada 4 semanas',
				4 => 'Mensual',
				5 => 'Trimestral',
				6 => 'Semestral',
				7 => 'Anual'
			)
		];
	}

       private function newMatricula($mat){
            $r = explode('-',$mat);
            if($r[1])
                $num = $r[1]."";
            else
                $num = $r[0]."";
            $num = "0000".$num;
            //echo $num."<br>";
            return "LP-".substr($num,-4);
        }
	public function sql(){
            /*MODIFYING FUCKING CONTACTS*/

            // $clients = Client::where('account_id',2)->get();
            // foreach($clients as $client){
            //     $cli = Client::where('id',$client->id)->first();
            //     $cli->custom_value4 = $this->newMatricula($client->custom_value4);
            //     $cli->save();
            // }
						die("No hagas eso bit...");
            echo "clientes modificados con exito<br><br><br><br>";
		//$users = DB::connection('mysql2')->table('users')->get();
                     /// ADDING FUCKING CONTACTS
            //return "dont try to update this";
            $branch_id_golden= 2;
            $account_id_golden = 2;
            $user_id_golden = 2;
            //return "brian";
            $clients=DB::connection('mysql2')->table('clients')->where('account_id',4)->get();
            foreach ($clients as $client)
            {
                $contacts = DB::connection('mysql2')->table('contacts')->where('account_id',4)->where('client_id',$client->id)->get();

                foreach ($contacts as $contact)
                {

                    $cont = Contact::createNew();

                    $cont->account_id = $account_id_golden;
                    //$cont->branch_id = $branch_id_golden;
                    //$cont->user_id = $user_id_golden;

                    $cli = Client::where('account_id',$account_id_golden)->where('public_id',$client->public_id)->first();

                    $cont->client_id = $cli->id;
                    //return "jae3".$cli->id;
                    $cont->created_at = $contact->created_at;
                    $cont->updated_at = $contact->updated_at;
                    $cont->deleted_at = $contact->deleted_at;
                    $cont->first_name=$contact->first_name;
                    $cont->last_name = $contact->last_name;
                    $cont->email = $contact->email;
                    $cont->phone = $contact->phone;
                    $cont->is_primary = $contact->is_primary;
                    $cont->send_invoice = $contact->send_invoice;
                    $cont->save();
                    //print_r($contact);echo "<br><br>";
                    //echo "-".$cont->first_name."<BR>";
                }
                //return 0;
            }
            echo "contactos agregados con exito";

            return 0;

		//return "Updated dont try to do it again";
		$branch_id_golden= 2;
		$account_id_golden = 2;
		$user_id_golden = 2;
		$client_id_ini = 38;
		$client_id_step = 37;
		$invoice_id_golden=596;
		$invoice_id_step = 595;

		$clients=DB::connection('mysql2')->table('clients')->where('account_id',4)->get();
		// foreach ($clients as $key => $client) {
		// 	$idd=$client->public_id+$client_id_step;
		// 	echo $idd." - ".$client->name." <br>";
		// }
		$product_id_ini = 27;
		$product_id_step = 26;


		/* THIS SCRIPT ITS TO ADD LOGO AND DESIGN*/
//		 $type_document =TypeDocument::where('account_id',10)->firstOrFail();
//		 $invoices=Invoice::where("account_id",10)->get();
//		 foreach ($invoices as $key => $invoice) {
//		 	$invoice->logo=$type_document->logo;
//		 	$invoice->javascript=$type_document->javascript_web;
//		 	$invoice->save();
//		 }

	//	foreach ($products as $key => $product) {
	//		$idd=$product->public_id+$product_id_step;
		//	echo $idd." - ".$product->notes." <br>";
		//}
	 	$invoices = DB::connection('mysql2')->table('invoices')->where('account_id',4)->get();
	 	foreach ($invoices as $key => $invoice) {

	 	$factura = Invoice::createNew();
	 	$factura->account_id = $account_id_golden;
	 	$factura->branch_id = $branch_id_golden;
	 	$client=DB::connection('mysql2')->table('clients')->where('id',$invoice->client_id)->first();
	 	$factura->client_id = $client->public_id;//+$client_id_step;
	 	$factura->user_id = $user_id_golden;
	 	$factura->invoice_status_id = $invoice->invoice_status_id;
	 	$factura->created_at = $invoice->created_at;
	 	$factura->updated_at = $invoice->updated_at;
	 	$factura->deleted_at = $invoice->deleted_at;
	 	$factura->invoice_number = $invoice->invoice_number;
	 	$factura->invoice_date = $invoice->invoice_date;
	 	$factura->due_date = $invoice->due_date;
	 	$factura->discount = $invoice->discount;
	 	$factura->po_number = $invoice->po_number;
	 	$factura->terms = $invoice->terms;
	 	$factura->public_notes = $invoice->public_notes;
	 	//$factura->note = $invoice->acc;
	 	$factura->account_name = $invoice->account_name;
	 	$factura->account_nit = $invoice->account_nit;
	 	//$factura->account_uniper = $invoice->;
	 	$factura->sfc = "SFC-1";
	 	$factura->branch_name =$invoice->branch_name;
	 	$factura->address1 = $invoice->address1;
	 	$factura->address2 = $invoice->address2;
	 	$factura->phone = $invoice->phone;
	 	$factura->city = $invoice->city;
	 	$factura->state =$invoice->state;
	 	$factura->number_autho = $invoice->number_autho;
	 	$factura->deadline = $invoice->deadline;
	 	$factura->key_dosage = $invoice->key_dosage;
	 	//$factura->type_third = $invoice->;
	 	$factura->client_nit = $invoice->client_nit;
	 	$factura->client_name = $invoice->client_name;
	 	$factura->economic_activity = $invoice->activity_pri;
	 	$factura->law = $invoice->law;
	 	$factura->control_code = $invoice->control_code;
	 	//$factura->qr = $invoice->;
	 	$factura->debito_fiscal = $invoice->fiscal;
	 	$factura->importe_neto = $invoice->amount;
	 	$factura->importe_total = $invoice->subtotal;
	 	$factura->importe_ice = $invoice->ice;
	 	//$factura->importe_exento = $invoice->;
	 	$factura->descuento_total =$invoice->discount;
	 	$factura->balance = $invoice->balance;
	 	$factura->logo = 1;
	 	$factura->javascript = 3;
	 	//$factura->public_id = $invoice->;
	 	$factura->save();
	// 	print_r($factura);
	 	echo $factura->account_id." ".$factura->branch_id."<br><br>";
	 }


echo "facturas agregadas<br><br><br><br><br>";

		$products=DB::connection('mysql2')->table('products')->where('account_id',4)->get();


		$items = DB::connection('mysql2')->table('invoice_items')->where('account_id',4)->get();
		foreach ($items as $key => $item) {
			$it = InvoiceItem::createNew();
			$it->account_id = $account_id_golden;
			$invoice=DB::connection('mysql2')->table('invoices')->where('id',$item->invoice_id)->first();
			$it->invoice_id = $invoice->public_id;//+$invoice_id_step;
			$product=DB::connection('mysql2')->table('products')->where('id',$item->product_id)->first();
			$it->product_id = $product->public_id;//+$product_id_step;
			$it->created_at = $item->created_at;
			$it->updated_at = $item->updated_at;
			$it->deleted_at = $item->deleted_at;
			$it->product_key = $item->product_key;
			$it->notes = $item->notes;
			$it->cost = $item ->cost;
			$it->qty = $item->qty;
			$it->discount = 0;
			//$it->unidad =
			$it->save();
			//print_r($it);
			echo $item->notes."<br><br>";
		}
		//$invoices=DB::connection('mysql2')->table('invoices')->where('account_id',4)->get();
		//foreach ($invoices as $key => $invoice) {
		//	echo $invoice->invoice_number."<br>";
		//}
		return 0;
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// return Response::json(Input::all());
		
		$this->backup(Input::all(),Auth::user()->account_id,Session::get('branch_id'));

		if(sizeof(Input::get('productos'))>1)
		{
			if(Input::has('client')||Input::has('client_id2'))
			{
			 $account = DB::table('accounts')->where('id','=', Auth::user()->account_id)->first();
			 $branch = Branch::find(Session::get('branch_id'));
			 $invoice = Invoice::createNew();


			//$invoice->setBranch(Session::get('branch_id'));

			$invoice->setBranch(Session::get('branch_id'));
			$invoice->setTerms(trim(Input::get('terms')));
			$invoice->setPublicNotes(trim(Input::get('public_notes')));
			$invoice->setInvoiceDate(trim(Input::get('invoice_date')));
			if(Input::has('client'))
			{
				$invoice->setClient(Input::get('client'));
			}
			else
			{
				$invoice->setClient(Input::get('client_id2'));
			}

			$invoice->setEconomicActivity($branch->economic_activity);

			// $date=date("Y-m-d",strtotime(Input::get('due_date')));
			 // $date = new DateTime(strtotime(Input::get('due_date')));
			$dateparser = explode("/",Input::get('due_date'));
                        if(Input::get('due_date')){
                            $date = $dateparser[2].'-'.$dateparser[1].'-'.$dateparser[0];
                            $invoice->setDueDate($date);
                        }
			$invoice->setDiscount(trim(Input::get('descuento_send')));

			$invoice->setClientName(trim(Input::get('razon')));
			$invoice->setClientNit(trim(Input::get('nit')));

			$invoice->setUser(Auth::user()->id);
			// $date=date("Y-m-d",strtotime(Input::get('invoice_date')));
			$dateparser = explode("/",Input::get('invoice_date'));
                        $date = $dateparser[2].'-'.$dateparser[1].'-'.$dateparser[0];
			 // $date = new DateTime(strtotime(Input::get('invoice_date')));
			$invoice->setInvoiceDate($date);
			$invoice->importe_neto = trim(Input::get('total'));
                        $invoice->debito_fiscal =trim(Input::get('total'));
			$invoice->importe_total=trim(Input::get('subtotal'));
                        //$invoice->note = trim(Input::get('nota'));
                        if(Input::get('nota')){
                        $nota = array();
                        $nota[0] = [
                            'date' => date('d-m-Y H:i:s'),
                            'note' => '<b>'.Auth::user()->first_name." ".Auth::user()->last_name."</b>: ".trim(Input::get('nota'))
                        ];
                        $invoice->note = json_encode($nota);
                        }
			//ACCOUTN AND BRANCK
			$invoice->balance =trim(Input::get('total'));

                        $invoice->setAccountName($account->name);
			$invoice->setAccountNit($account->nit);
			$invoice->setBranchName($branch->name);
			$invoice->setAddress1($branch->address1);
			$invoice->setAddress2($branch->address2);
			$invoice->setPhone($branch->work_phone);
			$invoice->setCity($branch->city);
			$invoice->setState($branch->state);
			$invoice->setNumberAutho($branch->number_autho);
			$invoice->setKeyDosage($branch->key_dosage);
			$invoice->setTypeThird($branch->type_third);
			$invoice->setDeadline($branch->deadline);
			$invoice->setLaw($branch->law);
			$type_document =TypeDocument::where('account_id',Auth::user()->account_id)->firstOrFail();
			$invoice->invoice_number = branch::getInvoiceNumber();

			 $numAuth = $invoice->number_autho;
			 $numfactura = $invoice->invoice_number;
			 $nit = $invoice->client_nit;
			 $fechaEmision =date("Ymd",strtotime($invoice->invoice_date));
			 $total = $invoice->importe_total;
			 $llave = $branch->key_dosage;
			 $totalc = number_format((float)$total, 2, '.', '');
			if($account->currency_id == 2){

				$totalc = $total * $account->exchange;
				$totalc = number_format((float)$totalc, 2, '.', '');
			}
			 $codigoControl = Utils::getControlCode($numfactura,$nit,$fechaEmision,$totalc,$numAuth,$llave);
			$invoice->setControlCode($codigoControl);

                        //$actual_document = TypeDocument::where('account_id',Auth::user()->account_id)->where('master_id',1)->orderBy('id','DESC')->first();
                        //$actual_master = $actual_document->id;
			

			
			$todotix = Branch::find(Session::get('branch_id'));
                //return $todotix->id;


                        $documents = TypeDocumentBranch::where('branch_id',$invoice->branch_id)->orderBy('id','ASC')->get();
                        foreach ($documents as $document)
                        {
                            $actual_document = TypeDocument::where('id',$document->type_document_id)->first();
                            if($actual_document->master_id==1)
                            $id_documento = $actual_document->id;


                        }

                        if( $todotix->id == 22){
                				$id_documento = 49;
			               	 }


                        $invoice->setJavascript($id_documento);
                        //if(Input::get('printer_type')==1)
                        if(Session::get('printer')==1)
                            $invoice->logo = 1;
                        else
                            $invoice->logo = 0;


			//$invoice->sfc = $branch->sfc;
            if($account->currency_id==1)
            	   $invoice->sfc = 1;
        	else
               		$invoice->sfc = $account->exchange;
			$invoice->qr =$invoice->account_nit.'|'.$invoice->invoice_number.'|'.$invoice->number_autho.'|'.$invoice->invoice_date.'|'.$invoice->importe_neto.'|'.$invoice->importe_total.'|'.$invoice->client_nit.'|'.$invoice->importe_ice.'|0|0|'.$invoice->descuento_total;
			if($account->is_uniper)
			{
				$invoice->account_uniper = $account->uniper;
			}
			$invoice->save();
			foreach (Input::get('productos') as $producto)
                        {
                            $prod = $producto;
                            $product = Product::where('account_id',Auth::user()->account_id)->where('product_key',$producto["'product_key'"])->first();
                            if($product!=null){

                                            $invoiceItem = InvoiceItem::createNew();
                                            $invoiceItem->setInvoice($invoice->id);
                                    $invoiceItem->setProduct($product->id);
                                    $invoiceItem->setProductKey($producto["'product_key'"]);
                                    //$proo = DB::table('products')->where('product_key','=',$producto["'product_key'"])->first();
                                    $proo = Product::where('account_id',Auth::user()->account_id)->where('product_key',$producto["'product_key'"])->first();
                                    $invoiceItem->setNotes($producto["'item'"]);
                                    $invoiceItem->setCost($producto["'cost'"]);
                                    $invoiceItem->setQty($producto["'qty'"]);
                                    $invoiceItem->save();
                            }
                        }

                //adicionando cargo al cliente
                $cliente = Client::find($invoice->client_id);
                $cliente->balance =$cliente->balance+$invoice->balance;
                $cliente->save();
                $newInvoice=Invoice::where('id','=',$invoice->getId())->first();

                return Redirect::to("factura/".$newInvoice->getPublicId());
                }
                Session::flash('error','por favor ingrese cliente');
                return Redirect::to('factura/create');
		}
		Session::flash('error','por favor ingrese productos');
		return Redirect::to('factura/create');
	}

        public function storeSinCreditoFiscal()
	{
		if(sizeof(Input::get('productos'))>1)
		{
			if(Input::has('client'))
			{
			 $account = DB::table('accounts')->where('id','=', Auth::user()->account_id)->first();
			 $branch = Branch::find(Session::get('branch_id'));
			 $invoice = Invoice::createNew();


			//$invoice->setBranch(Session::get('branch_id'));

			$invoice->setBranch(Session::get('branch_id'));
			$invoice->setTerms(trim(Input::get('terms')));
			$invoice->setPublicNotes(trim(Input::get('public_notes')));
			$invoice->setInvoiceDate(trim(Input::get('invoice_date')));
			$invoice->setClient(trim(Input::get('client')));
			$invoice->setEconomicActivity($branch->economic_activity);

			// $date=date("Y-m-d",strtotime(Input::get('due_date')));
			 // $date = new DateTime(strtotime(Input::get('due_date')));
			$dateparser = explode("/",Input::get('due_date'));
                        if(Input::get('due_date')){
                            $date = $dateparser[2].'-'.$dateparser[1].'-'.$dateparser[0];
                            $invoice->setDueDate($date);
                        }
			$invoice->setDiscount(trim(Input::get('discount')));

			$invoice->setClientName(trim(Input::get('razon')));
			$invoice->setClientNit(trim(Input::get('nit')));

			$invoice->setUser(Auth::user()->id);
			// $date=date("Y-m-d",strtotime(Input::get('invoice_date')));
			$dateparser = explode("/",Input::get('invoice_date'));
                        $date = $dateparser[2].'-'.$dateparser[1].'-'.$dateparser[0];
			 // $date = new DateTime(strtotime(Input::get('invoice_date')));
			$invoice->setInvoiceDate($date);
			$invoice->importe_neto = trim(Input::get('total'));
			$invoice->importe_total=trim(Input::get('subtotal'));
                        $invoice->debito_fiscal = 0;

                        //$invoice->note = trim(Input::get('nota'));
                        if(Input::get('nota')){
                        $nota = array();
                        $nota[0] = [
                            'date' => date('d-m-Y H:i:s'),
                            'note' => '<b>'.Auth::user()->first_name." ".Auth::user()->last_name."</b>: ".trim(Input::get('nota'))
                        ];
                        $invoice->note = json_encode($nota);
                        }
			//ACCOUTN AND BRANCK
			$invoice->balance =trim(Input::get('total'));

                        $invoice->setAccountName($account->name);
			$invoice->setAccountNit($account->nit);
			$invoice->setBranchName($branch->name);
			$invoice->setAddress1($branch->address1);
			$invoice->setAddress2($branch->address2);
			$invoice->setPhone($branch->work_phone);
			$invoice->setCity($branch->city);
			$invoice->setState($branch->state);
			$invoice->setNumberAutho($branch->number_autho);
			$invoice->setKeyDosage($branch->key_dosage);
			$invoice->setTypeThird($branch->type_third);
			$invoice->setDeadline($branch->deadline);
			$invoice->setLaw($branch->law);
			$type_document =TypeDocument::where('account_id',Auth::user()->account_id)->firstOrFail();
			$invoice->invoice_number = branch::getInvoiceNumber();

			 $numAuth = $invoice->number_autho;
			 $numfactura = $invoice->invoice_number;
			 $nit = $invoice->client_nit;
			 $fechaEmision =date("Ymd",strtotime($invoice->invoice_date));
			 $total = $invoice->importe_total;
			 $llave = $branch->key_dosage;

			$totalc = number_format((float)$total, 2, '.', '');
			if($account->currency_id == 2){

				$totalc = $total * $account->exchange;
				$totalc = number_format((float)$totalc, 2, '.', '');
			}
			 $codigoControl = Utils::getControlCode($numfactura,$nit,$fechaEmision,$totalc,$numAuth,$llave);
			$invoice->setControlCode($codigoControl);

                        //$actual_document = TypeDocument::where('account_id',Auth::user()->account_id)->where('master_id',1)->orderBy('id','DESC')->first();
                        //$actual_master = $actual_document->id;

                        $documents = TypeDocumentBranch::where('branch_id',$invoice->branch_id)->orderBy('id','ASC')->get();
                        foreach ($documents as $document)
                        {
                            $actual_document = TypeDocument::where('id',$document->type_document_id)->first();
                            if($actual_document->master_id==3)
                            $id_documento = $actual_document->id;
                        }
                        $invoice->setJavascript($id_documento);
                        //if(Input::get('printer_type')==1)
                        if(Session::get('printer')==1)
                            $invoice->logo = 1;
                        else
                            $invoice->logo = 0;


			$invoice->sfc = $branch->sfc;
			$invoice->qr =$invoice->account_nit.'|'.$invoice->invoice_number.'|'.$invoice->number_autho.'|'.$invoice->invoice_date.'|'.$invoice->importe_neto.'|'.$invoice->importe_total.'|'.$invoice->client_nit.'|'.$invoice->importe_ice.'|0|0|'.$invoice->descuento_total;
			if($account->is_uniper)
			{
				$invoice->account_uniper = $account->uniper;
			}
			$invoice->save();
			foreach (Input::get('productos') as $producto)
                        {
                            $prod = $producto;
                            $product = Product::where('account_id',Auth::user()->account_id)->where('product_key',$producto["'product_key'"])->first();
                            if($product!=null){

                                            $invoiceItem = InvoiceItem::createNew();
                                            $invoiceItem->setInvoice($invoice->id);
                                    $invoiceItem->setProduct($product->id);
                                    $invoiceItem->setProductKey($producto["'product_key'"]);
                                    //$proo = DB::table('products')->where('product_key','=',$producto["'product_key'"])->first();
                                    $proo = Product::where('account_id',Auth::user()->account_id)->where('product_key',$producto["'product_key'"])->first();
                                    $invoiceItem->setNotes($producto["'item'"]);
                                    $invoiceItem->setCost($producto["'cost'"]);
                                    $invoiceItem->setQty($producto["'qty'"]);
                                    $invoiceItem->save();
                            }
                        }

                //adicionando cargo al cliente
                $cliente = Client::find($invoice->client_id);
                $cliente->balance =$cliente->balance+$invoice->balance;
                $cliente->save();
                $newInvoice=Invoice::where('id','=',$invoice->getId())->first();

                return Redirect::to("factura/".$newInvoice->getPublicId());
                }
                Session::flash('error','por favor ingrese cliente');
                return Redirect::to('factura/create');
		}
		Session::flash('error','por favor ingrese productos');
		return Redirect::to('newSinCreditoFiscal/create');
	}

        public function storeNota(){
            $account = DB::table('accounts')->where('id','=', Auth::user()->account_id)->first();
            $branch = Branch::where("id",Session::get('branch_id'))->first();
            $invoice = Invoice::createNew();
            $invoice->setBranch(Session::get('branch_id'));
            $invoice->setTerms(trim(Input::get('terms')));
            $invoice->setPublicNotes(trim(Input::get('public_notes')));
            $invoice->setInvoiceDate(trim(Input::get('invoice_date')));
            $invoice->setClient(trim(Input::get('client')));
            $invoice->setEconomicActivity($branch->economic_activity);
            $dateparser = explode("/",Input::get('due_date'));
            if(Input::get('due_date')){
                $date = $dateparser[2].'-'.$dateparser[1].'-'.$dateparser[0];
                $invoice->setDueDate($date);
            }
            $invoice->setDiscount(trim(Input::get('discount')));
            $invoice->setClientName(trim(Input::get('razon')));
            $invoice->setClientNit(trim(Input::get('nit')));

            $invoice->setUser(Auth::user()->id);
            $dateparser = explode("/",Input::get('invoice_date'));
            $date = $dateparser[2].'-'.$dateparser[1].'-'.$dateparser[0];
            $invoice->setInvoiceDate($date);
            $invoice->importe_neto = trim(Input::get('total'));
            $invoice->importe_total=trim(Input::get('subtotal'));
            //$invoice->note = trim(Input::get('nota'));
            if(Input::get('nota')){
                $nota = array();
                $nota[0] = [
                    'date' => date('d-m-Y H:i:s'),
                    'note' => '<b>'.Auth::user()->first_name." ".Auth::user()->last_name."</b>: ".trim(Input::get('nota'))
                ];
                $invoice->note = json_encode($nota);
            }
            //ACCOUTN AND BRANCK
            $invoice->balance =trim(Input::get('total'));

            $invoice->setAccountName($account->name);
            //$invoice->setAccountNit($account->nit);
            $invoice->setBranchName($branch->name);
            $invoice->setAddress1($branch->address1);
            $invoice->setAddress2($branch->address2);
            $invoice->setPhone($branch->work_phone);
            //$invoice->setCity($branch->city);
            //$invoice->setState($branch->state);
            //$invoice->setNumberAutho($branch->number_autho);
            //$invoice->setKeyDosage($branch->key_dosage);
            //$invoice->setTypeThird($branch->type_third);
            //$invoice->setDeadline($branch->deadline);
            //$invoice->setLaw($branch->law);
            $type_document =TypeDocument::where('account_id',Auth::user()->account_id)->firstOrFail();


            //$invoice->invoice_number = branch::getInvoiceNumber();
            $number=1;
            $the_last = Invoice::where('account_id',Auth::user()->account_id)->where('branch_id',Session::get('branch_id'))->whereNotNull('document_number')->orderBy('document_number','DESC')->first();
            if(isset($the_last->document_number))
                $number=$the_last->document_number+1;
            $invoice->document_number = $number;
            //echo Session::get('branch_id')." ".$number." ".$the_last->document_number." -";

//            if(Input::get('printer_type')==1)
//                $invoice->setJavascript($type_document->javascript_web);
//            else
//                $invoice->setJavascript($type_document->javascript_pos);
//            $document = TypeDocumentBranch::where('branch_id',$invoice->branch_id)->orderBy('type_document_id','DESC')->first();
//            $type_document =TypeDocument::where('id',$document->type_document_id)->first();
//            $invoice->setJavascript($type_document->javascript_web);
//            $invoice->logo = $type_document->logo;

            $documents = TypeDocumentBranch::where('branch_id',$invoice->branch_id)->orderBy('id','ASC')->get();
            foreach ($documents as $document)
            {
                $actual_document = TypeDocument::where('id',$document->type_document_id)->first();
                if($actual_document->master_id==2)
                $id_documento = $actual_document->id;
            }
            $invoice->setJavascript($id_documento);

            //$type_document =TypeDocument::where('id',$document->type_document_id)->first();
            //$invoice->setJavascript($type_document->javascript_web);

            if(Input::get('printer_type')==1)
                $invoice->logo = 1;
            else
                $invoice->logo = 0;


            $invoice->save();
            foreach (Input::get('productos') as $producto)
            {
                $prod = $producto;
                $product = Product::where('account_id',Auth::user()->account_id)->where('product_key',$producto["'product_key'"])->first();
                if($product!=null){

                        $invoiceItem = InvoiceItem::createNew();
                        $invoiceItem->setInvoice($invoice->id);
                        $invoiceItem->setProduct($product->id);
                        $invoiceItem->setProductKey($producto["'product_key'"]);

                        $proo = DB::table('products')->where('product_key','=',$producto["'product_key'"])->first();

                        $invoiceItem->setNotes($proo->notes);
                        $invoiceItem->setCost($producto["'cost'"]);
                        $invoiceItem->setQty($producto["'qty'"]);
                        $invoiceItem->save();
                }
            }

           //adicionando cargo al cliente
           $cliente = Client::find($invoice->client_id);
           $cliente->balance =$cliente->balance+$invoice->balance;
           $cliente->save();
           $newInvoice=Invoice::where('id','=',$invoice->getId())->first();

           return Redirect::to("factura/".$newInvoice->getPublicId());

        }
        //My function to send mail
	public function sendInvoiceByMail()
	{
            $mails = array();
            $contactos = "";
            foreach (Input::get('contactos') as $key => $con) {
                    if(isset($con['checked'])){
                            array_push($mails, $con['mail']);
                            $contactos.= "<br><b>".$con['name']."</b> - ".$con['mail'];
                    }
            }
            //return 0;
            $invoices = Invoice::where('account_id',Auth::user()->account_id)->orderBy('public_id', 'DESC')->get();
            $this->sendInvoiceToContact(Input::get('id'),Input::get('date'),Input::get('nit'),$mails);
            if($contactos!=""){
            $this->addNote(Input::get('id'), "<b>Enviada</b> - ".Auth::user()->first_name." ".Auth::user()->last_name.": La factura ah sido enviada exitosamente a: ".$contactos,2);
        	//Session::flash('message',"Enviado corréctamente");
        	}
        	//else
        //		Session::flash('error',"No ingresó el mail del remitente");
            return Redirect::to('factura');
	}

	private function sendInvoiceToContact($id,$date,$nit,$mail_to){

		$link_object = array(
			'id' => $id,
			'random_string' => "thiIsARandomString,YouNeedToChangeIt",
			'date' => $date,
			'nit' => $nit
		);
		$link_object = json_encode($link_object);
		$idnew = base64_encode($link_object);//base64_encode(1);

		$invoice = Invoice::find($id);

		foreach ($mail_to as $key => $m_to) {
			global $ma_to;
			$ma_to = $m_to;
			Mail::send('emails.wellcome', array('link' => 'http://app.emizor.com/clientefactura/'.$idnew,'cliente'=>$invoice->client_name,'nit'=>$invoice->client_nit,'monto'=>$invoice->importe_total,'numero_factura'=>$invoice->invoice_number), function($message)
			{
				global $ma_to;
	    		$message->to($ma_to, '')->subject('Factura');
			});
		}
		return 0;
	}
	private function sendByMail(){
				$aux = 0;
				foreach ($client->contacts as $contact)
				{
					if ($contact->email)
					{
						$aux = 1;
					}
				}
				if($aux == 0)
				{
					$errorMessage = trans('El cliente no tiene Correo ElectrÃ³nico.');
					Session::flash('error', $errorMessage);
				}
				else
				{
					if (Auth::user()->confirmed && !Auth::user()->isDemo())
					{
						$message = trans("texts.emailed_{$entityType}");
						$this->mailer->sendInvoice($invoice);
						Session::flash('message', $message);
					}
					else
					{
						$errorMessage = trans(Auth::user()->registered ? 'texts.confirmation_required' : 'texts.registration_required');
						Session::flash('error', $errorMessage);
						Session::flash('message', $message);
					}
				}
	}

	private function save($publicId = null)
	{
		$action = Input::get('action');
		$entityType = Input::get('entityType');

		if ($action == 'archive' || $action == 'delete' || $action == 'mark')
		{

			return InvoiceController::bulk($entityType);
		}

		$input = json_decode(Input::get('data'));
		//echo "this is the result";
		$invoice = $input->invoice;
		//print_r($invoice);exit();


	    $branch = Branch::where('account_id', '=', Auth::user()->account_id)->where('id',Auth::user()->branch_id)->first();
		$today = new DateTime('now');
		$today = $today->format('Y-m-d');
		$datelimit = DateTime::createFromFormat('Y-m-d', $branch->deadline);
		$datelimit = $datelimit->format('Y-m-d');
		$first = explode ("-", $datelimit);
		$second = explode ("-", $today);
		$first_day    = $first[2];
		$first_month  = $first[1];
		$first_year   = $first[0];
		$second_day   = $second[2];
		$second_month = $second[1];
		$second_year  = $second[0];
		$a = gregoriantojd($first_month, $first_day, $first_year);
		$b = gregoriantojd($second_month, $second_day, $second_year);
		$errorS = "ExpirÃ³ la fecha lÃ­mite de " . $branch->name;
		if($a - $b < 0)
		{
			Session::flash('error', $errorS);
			return Redirect::to("{$entityType}s/create")
				->withInput();
		}
		else
		{

		$last_invoice = Invoice::where('account_id', '=', Auth::user()->account_id)->first();
		if ($last_invoice)
		{
			$yesterday = $last_invoice->invoice_date;
			$today = date("Y-m-d", strtotime($invoice->invoice_date));
			$errorD = "La fecha de la factura es incorrecta";
			$yesterday = new DateTime($yesterday);
			$today = new DateTime($today);

			if($yesterday > $today)
			{
				Session::flash('error', $errorD);
				return Redirect::to("{$entityType}s/create")
					->withInput();

			}
		}

		if (false && $errors = $this->invoiceRepo->getErrors($invoice))
		{
			Session::flash('error', trans('texts.invoice_error'));

			return Redirect::to("{$entityType}s/create")
				->withInput()->withErrors($errors);
		}
		else
		{
			//$this->taxRateRepo->save($input->tax_rates);

			$clientData = (array) $invoice->client;
			$clientData['branch'] = $branch->id;
			$client = $this->saveClient($invoice->client->public_id, $clientData);

			$invoiceData = (array) $invoice;
			$invoiceData['branch_id'] = $branch->id;
			$invoiceData['client_id'] = $client->id;
			$invoiceData['client_nit'] = $client->nit;
			$invoiceData['client_name'] = $client->name;
			$invoiceData['action'] = $action;

			//$invoice = $this->invoiceRepo->save($publicId, $invoiceData, $entityType);

			$account = Auth::user()->account;

			$client->load('contacts');
			$sendInvoiceIds = [];

			foreach ($client->contacts as $contact)
			{
				if ($contact->send_invoice || count($client->contacts) == 1)
				{
					$sendInvoiceIds[] = $contact->id;
				}
			}

			/*foreach ($client->contacts as $contact)
			{
				$invitation = Invitation::scope()->whereContactId($contact->id)->whereInvoiceId($invoice->id)->first();

				if (in_array($contact->id, $sendInvoiceIds) && !$invitation)
				{
					$invitation = Invitation::createNew();
					$invitation->invoice_id = $invoice->id;
					$invitation->contact_id = $contact->id;
					$invitation->invitation_key = str_random(RANDOM_KEY_LENGTH);
					$invitation->save();
				}
				else if (!in_array($contact->id, $sendInvoiceIds) && $invitation)
				{
					$invitation->delete();
				}
			}*/

			$message = trans($publicId ? "texts.updated_{$entityType}" : "texts.created_{$entityType}");
			if ($input->invoice->client->public_id == '-1')
			{
				$message = $message . ' ' . trans('texts.and_created_client');

				$url = URL::to('clients/' . $client->public_id);
				Utils::trackViewed($client->getDisplayName(), ENTITY_CLIENT, $url);
			}


			if ($action == 'email')
			{
				$aux = 0;
				foreach ($client->contacts as $contact)
				{
					if ($contact->email)
					{
						$aux = 1;
					}
				}
				if($aux == 0)
				{
					$errorMessage = trans('El cliente no tiene Correo ElectrÃ³nico.');
					Session::flash('error', $errorMessage);
				}
				else
				{
					if (Auth::user()->confirmed && !Auth::user()->isDemo())
					{
						$message = trans("texts.emailed_{$entityType}");
						$this->mailer->sendInvoice($invoice);
						Session::flash('message', $message);
					}
					else
					{
						$errorMessage = trans(Auth::user()->registered ? 'texts.confirmation_required' : 'texts.registration_required');
						Session::flash('error', $errorMessage);
						Session::flash('message', $message);
					}
				}


			}
			else if ($action == 'savepay')
			{

		        $payment = Payment::createNew();
		        $payment->client_id = $client->id;
		        $payment->invoice_id = $invoice->id;
		        $payment->payment_type_id = 1;
		        $payment->payment_date = $invoice->invoice_date;
		        $payment->amount = $invoice->amount;
		        $payment->save();
				$message = trans("texts.savepay_{$entityType}");
				Session::flash('message', $message);


			}
			else if ($action == 'savepaycredit')
			{

		        $payment = Payment::createNew();

	            $credits = Credit::scope()->where('client_id', '=', $client->id)
	            			->where('balance', '>', 0)->orderBy('created_at')->get();
	            $applied = 0;

	            foreach ($credits as $credit)
	            {
	                $applied += $credit->apply($invoice->amount);

	                if ($applied >= $invoice->amount)
	                {
	                    break;
	                }
	            }

		        $payment->client_id = $client->id;
		        $payment->invoice_id = $invoice->id;
		        $payment->payment_type_id = 2;
		        $payment->payment_date = $invoice->invoice_date;
		        $payment->amount = $invoice->amount;
		        $payment->save();
				$message = trans("texts.savepay_{$entityType}");
				Session::flash('message', $message);


			}
			else
			{
				Session::flash('message', $message);
			}

			//$url = "factura/" . $invoice->public_id . '/show';
			$url = "factura/1";
			return Redirect::to($url);
		}
		}
	}

	public function saveClient($publicId, $data, $notify = true)
	{
		if (!$publicId || $publicId == "-1")
		{
			$client = Client::createNew();
			$client->currency_id = 1;
			$contact = Contact::createNew();
			$contact->is_primary = true;
			$contact->send_invoice = true;
		}
		else
		{
			$client = Client::scope($publicId)->with('contacts')->firstOrFail();
			$contact = $client->contacts()->where('is_primary', '=', true)->firstOrFail();
		}


		if (isset($data['nit'])) {
			$client->nit = trim($data['nit']);
		}

		if (isset($data['name'])) {
			$client->name = trim($data['name']);
		}
        if (isset($data['business_name'])) {
			$client->business_name = trim($data['business_name']);
		}
		if (isset($data['work_phone'])) {
			$client->work_phone = trim($data['work_phone']);
		}
		if (isset($data['custom_value1'])) {
			$client->custom_value1 = trim($data['custom_value1']);
		}
		if (isset($data['custom_value2'])) {
			$client->custom_value2 = trim($data['custom_value2']);
		}
		if (isset($data['address1'])) {
			$client->address1 = trim($data['address1']);
		}
		if (isset($data['address2'])) {
			$client->address2 = trim($data['address2']);
		}
		if (isset($data['city'])) {
			$client->city = trim($data['city']);
		}
		if (isset($data['state'])) {
			$client->state = trim($data['state']);
		}
		if (isset($data['private_notes'])) {
			$client->private_notes = trim($data['private_notes']);
		}
		$client->save();

		$isPrimary = true;
		$contactIds = [];

		if (isset($data['contact']))
		{
			$info = $data['contact'];
			if (isset($info['email'])) {
				$contact->email = trim(strtolower($info['email']));
			}
			if (isset($info['first_name'])) {
				$contact->first_name = trim($info['first_name']);
			}
			if (isset($info['last_name'])) {
				$contact->last_name = trim($info['last_name']);
			}
			if (isset($info['phone'])) {
				$contact->phone = trim($info['phone']);
			}
			$contact->is_primary = true;
			$contact->send_invoice = true;
			$client->contacts()->save($contact);
		}
		else
		{
			foreach ($data['contacts'] as $record)
			{
				$record = (array) $record;

				if ($publicId != "-1" && isset($record['public_id']) && $record['public_id'])
				{
					$contact = Contact::scope($record['public_id'])->firstOrFail();
				}
				else
				{
					$contact = Contact::createNew();
				}

				if (isset($record['email'])) {
					$contact->email = trim(strtolower($record['email']));
				}
				if (isset($record['first_name'])) {
					$contact->first_name = trim($record['first_name']);
				}
				if (isset($record['last_name'])) {
					$contact->last_name = trim($record['last_name']);
				}
				if (isset($record['phone'])) {
					$contact->phone = trim($record['phone']);
				}
				$contact->is_primary = $isPrimary;
				$contact->send_invoice = isset($record['send_invoice']) ? $record['send_invoice'] : true;
				$isPrimary = false;

				$client->contacts()->save($contact);
				$contactIds[] = $contact->public_id;
			}

			foreach ($client->contacts as $contact)
			{
				if (!in_array($contact->public_id, $contactIds))
				{
					$contact->delete();
				}
			}
		}

		$client->save();

		if (!$publicId || $publicId == "-1")
		{
			\Activity::createClient($client, $notify);
		}

		return $client;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($publicId=0)
	{
             $invoice = Invoice::where('account_id','=',Auth::user()->account_id)->where('public_id','=',$publicId)->first(
                array(
                'id',
                'user_id',
                'account_name',
                'account_nit',
                'account_uniper',
                'account_uniper',
                'address1',
                'address2',
                'terms',
                'importe_neto',
                'importe_total',
                'branch_name',
                'city',
                'client_id',
                'client_name',
                'client_nit',
                'control_code',
                'deadline',
                'discount',
                'economic_activity',
                'end_date',
                'invoice_date',
                'invoice_status_id',
                'invoice_number',
                'number_autho',
                'phone',
                'public_notes',
                'qr',
                'logo',
                'public_id',
                'note',
                'sfc',
                'type_third',
                'branch_id',
                'state',
                'law',
                'phone',
                'document_number')
                );


		$account = Account::find(Auth::user()->account_id);
		//return $invoice['id'];
		$products = InvoiceItem::where('invoice_id',$invoice->id)->get();

		$invoice['invoice_items']=$products;
		$invoice['third']=$invoice->type_third;
		$invoice['is_uniper'] = $account->is_uniper;
		$invoice['uniper'] = $account->uniper;
		$invoice['logo'] = $invoice->getLogo();

		$client_id = $invoice->getClient();
		$client = DB::table('clients')->where('id','=', $client_id)->first();
		$contacts = Contact::where('client_id',$client->id)->get(array('id','is_primary','first_name','last_name','email'));
                $status=  InvoiceStatus::where('id',$invoice->invoice_status_id)->first();
		//echo $client_id;
		//print_r($contacts);
	//	return 0;
                if($invoice->note=="")
                    $nota = [];
                else
                    $nota = json_decode($invoice['note']);
                $matriz = Branch::where('account_id','=',$invoice->account_id)->where('number_branch','=','0')->first();
                //return $nota;
                $user = User::where('id',$invoice->user_id)->first();
               // echo $user->username;
               // return 0;
		$data = array(
			'invoice' => $invoice,
			'account'=> $account,
			'products' => $products,
			'contacts' => $contacts,
                        'nota'      => $nota,
                        'copia'     => 0,
                        'matriz'    => $matriz,
                        'user'      => $user,
                        'status'    => $status->name=="Parcial"?"Parcialmente Pagado":$status->name,
		);

		// return Response::json($data);

		return View::make('factura.show',$data);
	}


	//public function verFactura($publicId){

	//	$invoice = Invoice::where('account_id','=',Auth::user()->account_id)->where('public_id','=',$publicId)->first(


        public function preview()
        {
                 return  Response::json(Input::all());
                $account = DB::table('accounts')->where('id','=', Auth::user()->account_id)->first();
                $matriz = Branch::where('account_id','=',Auth::user()->account_id)->where('number_branch','=',0)->first();
                $branch = Branch::where('id','=',Session::get('branch_id'))->first();
                $branchDocument = TypeDocumentBranch::where('branch_id','=',$branch->id)->firstOrFail();
		$type_document =TypeDocument::where('id','=',$branchDocument->type_document_id)->firstOrFail();

                $invoice =(object) [
			'id'=>'0',
			'account_name'=>$account->name,
			'account_nit'=>$account->nit,
			'account_uniper'=>$account->uniper,
			'address1'=>$branch->address1,
			'address2'=>$branch->address2,
			'terms'=>Input::get('terms'),
			'importe_neto'=>Input::get('subtotal'),
			'importe_total'=>Input::get('total'),
			'branch_name'=>$branch->name,
			'city'=>$branch->city,
			'client_id'=>Input::get('client'),
			'client_name'=>Input::get('nombre'),
			'client_nit'=>Input::get('nit'),
			'control_code'=>'00-00-00-00',
			'deadline'=>Input::get('due_date'),
			'descuento_total'=>Input::get('discount'),
			'economic_activity'=>$branch->economic_activity,
			'end_date'=>Input::get('due_date'),
			'invoice_date'=>Input::get('invoice_date'),
			'invoice_number'=>0,
			'number_autho'=>$branch->number_autho,
			'phone'=>$branch->work_phone,
			'public_notes'=>Input::get('public_notes'),
			'logo'=>$type_document->logo,
                         'sfc'=>$branch->sfc,
                        'type_third'=>$branch->type_third,
                        'branch_id'=>$branch->id,
                        'state'=>$branch->state,
                        'law'=>$branch->law,
                ];


                $products = array();

                foreach (Input::get('productos') as $producto)
                {
	    		$product = Product::where('account_id',Auth::user()->account_id)->where('product_key',$producto["'product_key'"])->first();
		    	if($product!=null){
                            $prod=(object) [
                                'product_key'=>$producto["'product_key'"],
                                'notes'=>$product->notes,
                                'cost'=>$producto["'cost'"],
                                'qty'=>$producto["'qty'"],
                            ];
                            array_push($products, $prod);
		      	}
                  }
               // $invoice = Input::all();


		$data = array(
			'invoice' => $invoice,
			'account'=> $account,
			'products' => $products,
      'matriz'   => $matriz,


		);

		return View::make('factura.ver',$data);
        }






	public function verFactura($publicId){

           $invoice = Invoice::where('account_id','=',Auth::user()->account_id)->where('public_id','=',$publicId)->first(
                    array(
                    'id',
                    'user_id',
                    'account_name',
                    'account_id',
                    'account_nit',
                    'account_uniper',
                    'account_uniper',
                    'address1',
                    'address2',
                    'terms',
                    'importe_neto',
                    'importe_total',
                    'debito_fiscal',
                    'branch_name',
                    'city',
                    'client_id',
                    'client_name',
                    'client_nit',
                    'control_code',
                    'deadline',
                    'discount',
                    'economic_activity',
                    'end_date',
                    'invoice_date',
                    'invoice_status_id',
                    'invoice_number',
                    'number_autho',
                    'phone',
                    'public_notes',
                    'qr',
                    'logo',
                     'sfc',
                    'type_third',
                    'branch_id',
                    'state',
                    'law',
                    'phone',
                    'javascript',
                    'document_number'    )
                    );
            $account = Account::find(Auth::user()->account_id);
            //return $invoice['id'];

            $products = InvoiceItem::where('invoice_id',$invoice->id)->get();






//return $invoice->logo;
            $invoice['invoice_items']=$products;
            $invoice['third']=$invoice->type_third;
            $invoice['is_uniper'] = $account->is_uniper;
            $invoice['uniper'] = $account->uniper;
            $document=  TypeDocument::where("id",$invoice->javascript)->first();



            if($invoice->logo=="1")
            $invoice->javascript = $document->javascript_web;
            else
            $invoice->javascript=  $document->javascript_pos;
            $invoice->logo = $document->logo;
            //echo $invoice->javascript." ";
            //return 0;
            $client_id = $invoice->getClient();
            $client = DB::table('clients')->where('id','=', $client_id)->first();
            $contacts = Contact::where('client_id',$client->id)->get(array('id','is_primary','first_name','last_name','email'));
            //echo $client_id;
            //print_r($contacts);
    //	return 0;
            if(Input::get('copia'))
                $copia=Input::get('copia');
            else
                $copia = 0;
            $matriz = Branch::where('account_id','=',$invoice->account_id)->where('number_branch','=','0')->first();
            $user = User::where('id',$invoice->user_id)->first();
            $invoice->extralabel=$client->custom_value4;
            ///return 0;
						$invoice->anulado = 0;
            if($invoice->invoice_status_id==6)
            	$invoice->anulado = 1;
            $data = array(
                    'invoice' => $invoice,
                    'account'=> $account,
                    'products' => $products,
                    'contacts' => $contacts,
                    'matriz'    => $matriz,
                    'copia' => $copia,
                    'publicId' => $invoice->public_id,
                    'user'      => $user
            );
//             echo $invoice->javascript;
//            return 0;
            return View::make('factura.ver',$data);
	}

        public function verFacturaFiscal($publicId){
            $invoice = Invoice::where('account_id','=',Auth::user()->account_id)->where('public_id','=',$publicId)->first(
                    array(
                    'id',
                    'account_name',
                    'account_id',
                    'account_nit',
                    'account_uniper',
                    'account_uniper',
                    'address1',
                    'address2',
                    'terms',
                    'importe_neto',
                    'importe_total',
                    'branch_name',
                    'city',
                    'client_id',
                    'client_name',
                    'client_nit',
                    'control_code',
                    'deadline',
                    'discount',
                    'economic_activity',
                    'end_date',
                    'invoice_date',
                    'invoice_status_id',
                    'invoice_number',
                    'number_autho',
                    'phone',
                    'public_notes',
                    'qr',
                    'logo',
                     'sfc',
                    'type_third',
                    'branch_id',
                    'state',
                    'law',
                    'phone',
                    'javascript')
                    );
            $account = Account::find(Auth::user()->account_id);
            //return $invoice['id'];
            $products = InvoiceItem::where('invoice_id',$invoice->id)->get();

            $invoice['invoice_items']=$products;
            $invoice['third']=$invoice->type_third;
            $invoice['is_uniper'] = $account->is_uniper;
            $invoice['uniper'] = $account->uniper;
            $invoice['logo'] = $invoice->getLogo();

            $client_id = $invoice->getClient();
            $client = DB::table('clients')->where('id','=', $client_id)->first();
            $contacts = Contact::where('client_id',$client->id)->get(array('id','is_primary','first_name','last_name','email'));
            //echo $client_id;
            //print_r($contacts);
    //	return 0;

            $matriz = Branch::where('account_id','=',$invoice->account_id)->where('number_branch','=','0')->first();
            $data = array(
                    'invoice' => $invoice,
                    'account'=> $account,
                    'products' => $products,
                    'contacts' => $contacts,
                    'matriz'    => $matriz,
                    'copia' => 0,
                    'publicId' => $invoice->public_id,
            );
            return View::make('factura.ver',$data);

        }

        public function verFacturaCliente($correo){
            $sent = base64_decode($correo);
            $array = json_decode($sent);
            $id_inv = $array->id;
            $invoice = Invoice::where('id','=',$id_inv)->first(
                    array(
                    'id',
                    'account_name',
                    'account_id',
                    'account_nit',
                    'account_uniper',
                    'account_uniper',
                    'address1',
                    'address2',
                    'terms',
                    'importe_neto',
                    'importe_total',
                    'debito_fiscal',
                    'branch_name',
                    'city',
                    'client_id',
                    'client_name',
                    'client_nit',
                    'control_code',
                    'deadline',
                    'discount',
                    'economic_activity',
                    'end_date',
                    'invoice_date',
                    'invoice_status_id',
                    'invoice_number',
                    'number_autho',
                    'phone',
                    'public_notes',
                    'qr',
                    'logo',
                     'sfc',
                    'type_third',
                    'branch_id',
                    'state',
                    'law',
                    'phone',
                    'javascript')
                    );


           // $account = Account::find(Auth::user()->account_id);
            //return $invoice['id'];
            $products = InvoiceItem::where('invoice_id',$invoice->id)->get();

            $invoice['invoice_items']=$products;
            $invoice['third']=$invoice->type_third;
            $invoice['is_uniper'] = false;//$account->is_uniper;
            //$invoice['uniper'] = $account->uniper;
            //$invoice['logo'] = $invoice->getLogo();
            $document=  TypeDocument::where("id",$invoice->javascript)->first();

            if($invoice->logo=="1")
            $invoice->javascript = $document->javascript_web;
            else
            $invoice->javascript=  $document->javascript_pos;
            $invoice->logo = $document->logo;

            $client_id = $invoice->getClient();
            $client = DB::table('clients')->where('id','=', $client_id)->first();
            $contacts = Contact::where('client_id',$client->id)->get(array('id','is_primary','first_name','last_name','email'));
            $this->addNote($invoice->id, "<b> Visto: </b> Cliente ".$invoice->client_name,3);
            //echo $client_id;
            //print_r($contacts);
    //	return 0;
            $matriz = Branch::where('account_id','=',$invoice->account_id)->where('number_branch','=','0')->first();
            $data = array(
                    'invoice' => $invoice,
                    //'account'=> $account,
                    'products' => $products,
                    'contacts' => $contacts,
                    'matriz'    => $matriz,
                    'copia' => 0,//Input::get('copia'),
                    'publicId' => $invoice->public_id,
            );
            return View::make('factura.ver',$data);
        }
        public function factura2()
        {
        	// return  Response::json(Input::all());
                $account = DB::table('accounts')->where('id','=', Auth::user()->account_id)->first();
                $matriz = Branch::where('account_id','=',Auth::user()->account_id)->where('number_branch','=',0)->first();
                $branch = Branch::where('id','=',Session::get('branch_id'))->first();
                $cambio = Account::where('id', Auth::user()->account_id)->select('exchange')->first();

                //$branchDocument = TypeDocumentBranch::where('branch_id','=',$branch->id)->firstOrFail();
                $todotix = Branch::find(Session::get('branch_id'));
                //return $todotix->id;
                if( $todotix->id == 22){
                	$type_document =TypeDocument::where('account_id',Auth::user()->account_id)->where('master_id', 4)->orderBy('id','DESC')->first();
                }
                else{
                	$type_document =TypeDocument::where('account_id',Auth::user()->account_id)->where('master_id',Input::get('invoice_type'))->orderBy('id','DESC')->first();
                }


                if(Session::get('printer')==1)
                    $js=$type_document->javascript_web;
                else
                    $js=$type_document->javascript_pos;
                $client = Client::where('id',Input::get('client'))->first();
                $invoice =(object) [
			'id'=>'0',
			'account_name'=>$account->name,
			'account_nit'=>$account->nit,
			'account_uniper'=>$account->uniper,
			'address1'=>$branch->address1,
			'address2'=>$branch->address2,
			'terms'=>Input::get('terms'),
			'importe_neto'=>Input::get('total'),
			'importe_total'=>Input::get('subtotal'),
                        'importe_ice'=>0,
                        'debito_fiscal'=>0,
			'branch_name'=>$branch->name,
			'city'=>$branch->city,
			'client_id'=>Input::get('client'),
			'client_name'=>$client->business_name,//Input::get('nombre'),
			'client_nit'=>Input::get('nit'),
			'control_code'=>'00-00-00-00',
			//'deadline'=>Input::get('due_date'),LOL
                        'deadline'=>$branch->deadline,
			'descuento_total'=>Input::get('discount'),
			'economic_activity'=>$branch->economic_activity,
			'end_date'=>Input::get('due_date'),
			'invoice_date'=>Input::get('invoice_date'),
			'invoice_number'=>0,
			'number_autho'=>$branch->number_autho,
			'phone'=>$branch->work_phone,
			'public_notes'=>Input::get('public_notes'),
			'logo'=>$type_document->logo,
                         'sfc'=>$cambio->exchange,
                        'type_third'=>$branch->type_third,
                        'branch_id'=>$branch->id,
                        'state'=>$branch->state,
                        'law'=>$branch->law,
                        'javascript'=> $js,
                        'document_number'=>0,
                        'extralabel'=>$client->custom_value4
                ];

//                $document=  TypeDocument::where("id",$invoice->javascript)->first();
//                $invoice->logo = $document->logo;
//                $invoice->javascript = $invoice->logo?$document->javascript_web:$document->javascript_pos;

                $user = Auth::user();


                $products = array();

                foreach (Input::get('productos') as $producto)
                {
	    		$product = Product::where('account_id',Auth::user()->account_id)->where('product_key',$producto["'product_key'"])->first();


		    	if($product!=null){
                            $prod=(object) [
                                'product_key'=>$producto["'product_key'"],
                                'notes'=>$producto["'item'"],
                                //'notes'=>$product->notes,
                                'cost'=>$producto["'cost'"],
                                'qty'=>$producto["'qty'"]


                                   ];
                            array_push($products, $prod);
		      	}
                  }
               // $client = Client::where('id',Input::get('client'))->first();
               // $invoice = Input::all();
                //return 0;
		$data = array(
			'invoice' => $invoice,
			'account'=> $account,
			'products' => $products,
                        'copia'     =>0,
                        'matriz'   => $matriz,
                        'user'  => $user,
                        'branch_matriz' => $branch->number_branch,
                 //       'client' => $client
		);
//                if(Input::get('printer_type')==0)
                  // return View::make('factura.ver2',$data); //para templates ver2
                    return View::make('factura.ver',$data);
            // return View::make('factura.ver',$data);
						// return View::make('factura.verGolden', $data);
        }

        public function addNote($id,$note_sent,$status){
            $invoice = Invoice::where('id','=',$id)->first();
            if($invoice->note=="")
            {
                $nota = array();
                    $nota[0] = [
                        'date' => date('d-m-Y H:i:s'),
                        'note' => $note_sent
                    ];
            }
            else{
                $nota = json_decode($invoice->note);

                    $nota_add = [
                        'date' => date('d-m-Y H:i:s'),
                        'note' => $note_sent
                    ];
                array_push($nota, $nota_add);
            }
            $invoice->note = json_encode($nota);
            $invoice->invoice_status_id=$status;
            $invoice->save();
        }

        public function nuevanota($publicId){

            $invoice = Invoice::where('account_id','=',Auth::user()->account_id)->where('public_id','=',$publicId)->first();
                //[{"date":"04-11-2015 12:23:30","note":"kdfkjdjd ew we we ksdklsdl sklsd sdklsdsd"},{"date":"04-11-2015 12:23:30","note":"adfadf"}]

                //return $invoice->note;
                if($invoice->note=="")
                {
                    $nota = array();
                        $nota[0] = [
                            'date' => date('d-m-Y H:i:s'),
                            'note' => "<b>".Auth::user()->first_name." ".Auth::user()->last_name."</b>: ".trim(Input::get('nota'))
                        ];
                }
                else{
                    $nota = json_decode($invoice->note);

                        $nota_add = [
                            'date' => date('d-m-Y H:i:s'),
                            'note' => "<b>".Auth::user()->first_name." ".Auth::user()->last_name."</b>: ".trim(Input::get('nota'))
                        ];
                    array_push($nota, $nota_add);
                }
                $invoice->note = json_encode($nota);
                //print_r($invoice->note);
                //return 0;
                $invoice->save();

		$account = Account::find(Auth::user()->account_id);
		//return $invoice['id'];
		$products = InvoiceItem::where('invoice_id',$invoice->id)->get();

		$invoice['invoice_items']=$products;
		$invoice['third']=$invoice->type_third;
		$invoice['is_uniper'] = $account->is_uniper;
		$invoice['uniper'] = $account->uniper;
		$invoice['logo'] = $invoice->getLogo();

		$client_id = $invoice->getClient();
		$client = DB::table('clients')->where('id','=', $client_id)->first();
		$contacts = Contact::where('client_id',$client->id)->get(array('id','is_primary','first_name','last_name','email'));
                $nota = json_decode($invoice['note']);
		$data = array(
			'invoice' => $invoice,
			'account'=> $account,
			'products' => $products,
			'contacts' => $contacts,
                        'nota'      => $nota,
                        'copia'     => 0,
                        'matriz'    => Branch::scope(1)->first()
		);
		// return Response::json($data);
		return View::make('factura.show',$data);
        }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($publicId)
	{
		return InvoiceController::save($publicId);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function bulk($entityType = ENTITY_INVOICE)
	{
		$action = Input::get('action');
		$statusId = Input::get('statusId');
		$ids = Input::get('id') ? Input::get('id') : Input::get('ids');
		if($action == 'delete')
		{
			$invoices = Invoice::withTrashed()->scope($ids)->get();
			foreach ($invoices as $invoice)
			{
				BookSale::deleteBook($invoice);
			}
		}
		//$count = $this->invoiceRepo->bulk($ids, $action, $statusId);

 		if ($count > 0)
 		{
 			$key = $action == 'mark' ? "updated_{$entityType}" : "{$action}d_{$entityType}";
			$message = Utils::pluralize($key, $count);
			Session::flash('message', $message);
		}

		return Redirect::to("{$entityType}");
	}






	public function listasCuenta()
        {
            $user_id = Auth::user()->getAuthIdentifier();

            $user = DB::table('users')->select('first_name','last_name')->where('id',$user_id)->first();

            $branch = DB::table('branches')->where('account_id',Auth::user()->account_id)->where('id','=',Auth::user()->branch_id)->first();

            $user->branch = $branch->name;

            $categories = DB::table('categories')->where('account_id',Auth::user()->account_id)->get(array('name'));

            $cats = $categories;

            $categories2 = DB::table('categories')->where('account_id',Auth::user()->account_id)->get();
            $products2 = DB::table('products')->where('account_id','=',Auth::user()->account_id)->get();

                    $aux=array();

            foreach ($categories2 as $category)
            {
                    foreach ($products2 as $product)
                    {

                                    $pts = DB::table('products')->where('category_id',$category->id)->where('account_id','=',Auth::user()->account_id)->get(array('id','product_key','notes','cost'));
                                    $prod = array($category->name => $pts);
                    }
                            $aux += $prod;
            }

            $mensaje = array(
                            'productos'=> $aux,
                            'categorias' => $categories,
                            'first_name'=>$user->first_name,
                            'last_name'=>$user->last_name,
                            'branch'=>$user->branch
                    );

            return Response::json($mensaje);

    }
    public function copia($publicId){
              $invoice = Invoice::where('account_id','=',Auth::user()->account_id)->where('public_id','=',$publicId)->first(
                array(
                'id',
                'account_name',
                'account_nit',
                'account_uniper',
                'account_uniper',
                'address1',
                'address2',
                'terms',
                'importe_neto',
                'importe_total',
                'branch_name',
                'city',
                'client_id',
                'client_name',
                'client_nit',
                'control_code',
                'deadline',
                'discount',
                'economic_activity',
                'end_date',
                'invoice_date',
                'invoice_status_id',
                'invoice_number',
                'number_autho',
                'phone',
                'public_notes',
                'qr',
                'logo',
                'public_id',
                'note',
                'sfc',
                'type_third',
                'branch_id',
                'state',
                'law',
                'phone',
                'javascript')
                );


		$account = Account::find(Auth::user()->account_id);
		//return $invoice['id'];
		$products = InvoiceItem::where('invoice_id',$invoice->id)->get();

		$invoice['invoice_items']=$products;
		$invoice['third']=$invoice->type_third;
		$invoice['is_uniper'] = $account->is_uniper;
		$invoice['uniper'] = $account->uniper;
		$invoice['logo'] = $invoice->getLogo();

		$client_id = $invoice->getClient();
		$client = DB::table('clients')->where('id','=', $client_id)->first();
		$contacts = Contact::where('client_id',$client->id)->get(array('id','is_primary','first_name','last_name','email'));
                $status=  InvoiceStatus::where('id',$invoice->invoice_status_id)->first();
		//echo $client_id;
		//print_r($contacts);
	//	return 0;
                if($invoice->note=="")
                    $nota = [];
                else
                    $nota = json_decode($invoice['note']);

		$data = array(
			'invoice' => $invoice,
			'account'=> $account,
			'products' => $products,
			'contacts' => $contacts,
                        'nota'      => $nota,
                        'copia'     => 1,
                        'matriz'    => Branch::scope(1)->first(),
                        'status'    => $status->name=="Parcial"?"Parcialmente Pagado":$status->name
		);
		// return Response::json($data);
		return View::make('factura.show',$data);

    }
    public function anular($publicId){
        $invoice = Invoice::where('account_id','=', Auth::user()->account_id)->where('public_id','=',$publicId)->first();
        $invoice->invoice_status_id = 6;
        $invoice->save();
				return Redirect::to('factura');
        //$invoices = Invoice::where('account_id',Auth::user()->account_id)->orderBy('public_id', 'DESC')->get();
	//return View::make('factura.index', array('invoices' => $invoices));
    }

    public function importar(){
        return View::make('factura.import');
    }

    public function excel(){
        //print_r(Input::get('excel'));
        //return 0;
        //return View::make('factura.import');
        $dir = "files/excel/";
        $fecha = base64_encode("excel".date('d/m/Y-H:m:i'));
        $file_name = $fecha;
        //return $file_name;



        $file = Input::file('excel');
        $destinationPath = 'files/excel/';
        // If the uploads fail due to file system, you can try doing public_path().'/uploads'
        $filename = $file_name;//str_random(12);
        //$filename = $file->getClientOriginalName();
        //$extension =$file->getClientOriginalExtension();
        $upload_success = Input::file('excel')->move($destinationPath, $filename);

//        if( $upload_success ) {
//           return Response::json('success', 200);
//        } else {
//           return Response::json('error', 400);
//        }


//        return 0;
        $results = Excel::selectSheetsByIndex(0)->load($dir.$file_name)->get();
        $factura = array();
        $groups = array();
        //shattering file gotten
        $nit="";
       foreach ($results as $key => $res){
          $dato=[];
          //$nit = "";
          foreach ($res as $r){
              if($r!="")
                array_push($dato, $r);
          }
          //$nit = $dato[0];
          if($dato){

            if($nit == $dato[0]){
                array_push ($groups, $dato);
            }
            else{
                if($groups)
                {
                    $bbr = [
                            'id'=>$groups[0][0],
                            'nit'=>$groups[0][1],
                            'nota'=>$groups[0][5]
                        ];
                    $products=array();;
                    foreach ($groups as $gru)
                    {
                        $pro['product_key']=$gru[2];
                        $pro['description']=$gru[3];
                        $pro['cost']=$gru[4];
                        array_push($products, $pro);
                    }
                    $bbr['products']=$products;
                    array_push($factura, $bbr);
                }
                $groups = array();
                $nit = $dato[0];
                array_push ($groups, $dato);
            }
          }
        }
        if($groups)
        {
            $bbr = [
                    'id'=>$groups[0][0],
                    'nit'=>$groups[0][1],
                    'nota'=>$groups[0][5]
                ];
            $products=array();;
            foreach ($groups as $gru)
            {
                $pro['product_key']=$gru[2];
                $pro['description']=$gru[3];
                $pro['cost']=$gru[4];
                array_push($products, $pro);
            }
            $bbr['products']=$products;
            array_push($factura, $bbr);
        }
        $returnable = $this->validateShatterExcel($factura);
        if($returnable!=""){
            Session::flash('error',$returnable);
            return View::make('factura.import');
        }
        $cont = 0;
        foreach ($factura as $fac){
            $this->saveLote($fac);
            $cont ++;
        }


        Session::flash('message','Se importaron '.$cont.' facturas exitósamente');
        //$invoices = Invoice::where('account_id',Auth::user()->account_id)->where('branch_id',Session::get('branch_id'))->orderBy('public_id', 'DESC')->get();
        //return View::make('factura.index', array('invoices' => $invoices));
        return Redirect::to('factura');
        
    }

    private function saveLote($factura){
        $account = DB::table('accounts')->where('id','=', Auth::user()->account_id)->first();
        $branch = Branch::find(Session::get('branch_id'));
       // return $factura['nit'];
        $client=  Client::where('account_id','=', Auth::user()->account_id)->where('public_id',$factura['id'])->first();
        //if(!$client)
         //   return $factura['nit'];

        $invoice = Invoice::createNew();
        $invoice->setPublicNotes($factura['nota']);
        $invoice->setBranch(Session::get('branch_id'));
        $invoice->setInvoiceDate(date("Y-m-d"));
        $invoice->setClient($client->id);
        $invoice->setEconomicActivity($branch->economic_activity);
        $invoice->setDiscount(0);
        $invoice->setClientName($client->business_name);
        $invoice->setClientNit($client->nit);

        $invoice->setUser(Auth::user()->id);
        //$date=date("Y-m-d",strtotime(Input::get('invoice_date')));
        //$invoice->setInvoiceDate($date);
        $total_cost = 0;
        foreach ($factura['products'] as $producto)
        {
            //$pr = Product::where('account_id',Auth::user()->account_id)->where('product_key',$producto['product_key'])->first();
            //$total_cost+= $pr->cost*$producto['qty'];
            $total_cost+= $producto['cost'];
        }


        $invoice->importe_neto = trim($total_cost);
        $invoice->importe_total=trim($total_cost);
				$invoice->debito_fiscal=trim($total_cost);

        //$invoice->note = trim(Input::get('nota'));


        $invoice->setAccountName($account->name);
        $invoice->setAccountNit($account->nit);
        $invoice->setBranchName($branch->name);
        $invoice->setAddress1($branch->address1);
        $invoice->setAddress2($branch->address2);
        $invoice->setPhone($branch->work_phone);
        $invoice->setCity($branch->city);
        $invoice->setState($branch->state);
        $invoice->setNumberAutho($branch->number_autho);
        $invoice->setKeyDosage($branch->key_dosage);
        $invoice->setTypeThird($branch->type_third);
        $invoice->setDeadline($branch->deadline);
        $invoice->setLaw($branch->law);

        $type_document =TypeDocument::where('account_id',Auth::user()->account_id)->firstOrFail();
        $invoice->invoice_number = branch::getInvoiceNumber();

         $numAuth = $invoice->number_autho;
         $numfactura = $invoice->invoice_number;
         $nit = $invoice->client_nit;
         $fechaEmision =date("Ymd",strtotime($invoice->invoice_date));
         $total = $invoice->importe_total;
         $llave = $branch->key_dosage;
         $totalc = number_format((float)$total, 2, '.', '');
			if($account->currency_id == 2){

				$totalc = $total * $account->exchange;
				$totalc = number_format((float)$totalc, 2, '.', '');
			}
         $codigoControl = Utils::getControlCode($numfactura,$nit,$fechaEmision,$totalc,$numAuth,$llave);
        $invoice->setControlCode($codigoControl);
         $documents = TypeDocumentBranch::where('branch_id',$invoice->branch_id)->orderBy('id','ASC')->get();
        foreach ($documents as $document)
        {
            $actual_document = TypeDocument::where('id',$document->type_document_id)->first();
            if($actual_document->master_id==1)
            $id_documento = $actual_document->id;
        }
        $invoice->setJavascript($id_documento);
        $invoice->logo = 1;


        //$invoice->sfc = $branch->sfc;
        if($account->currency_id==1)
               $invoice->sfc = 1;
        else
               $invoice->sfc = $account->exchange;

        $invoice->qr =$invoice->account_nit.'|'.$invoice->invoice_number.'|'.$invoice->number_autho.'|'.$invoice->invoice_date.'|'.$invoice->importe_neto.'|'.$invoice->importe_total.'|'.$invoice->client_nit.'|'.$invoice->importe_ice.'|0|0|'.$invoice->descuento_total;
        if($account->is_uniper)
        {
                $invoice->account_uniper = $account->uniper;
        }

        //$invoice->logo = $type_document->logo;
        $invoice->save();

        foreach ($factura['products']  as $producto)
        {
            $product = Product::where('account_id',Auth::user()->account_id)->where('product_key',$producto['product_key'])->first();
            if($product!=null){

                    $invoiceItem = InvoiceItem::createNew();
                    $invoiceItem->setInvoice($invoice->id);
                    $invoiceItem->setProduct($product->id);
                    $invoiceItem->setProductKey($product->product_key);
                    $invoiceItem->setNotes($product->notes." ".$producto['description']);
                    $invoiceItem->setCost($producto['cost']);
                    $invoiceItem->setQty(1);
                    $invoiceItem->save();
            }
        }
    }
    public function controlCode(){
        $numAuth = Input::get('cc_auth');
        $numfactura = Input::get('cc_invo');
        $nit = Input::get('cc_nit');
        //$fechaEmision = date("Ymd",strtotime(Input::get('cc_date')));
                $fecha = Input::get('cc_date');
        $fecha=  explode("/",$fecha);
        //$fecha=

//        $fechaEmision = date("Ymd",strtotime($fecha));
        $fechaEmision=$fecha[2].$fecha[1].$fecha[0];

        //return json_encode($fechaEmision);
        $total = str_replace(',','.',Input::get('cc_tota'));
        $llave = Input::get('cc_key');
        //return json_encode(Input::all());
        $totalc = number_format((float)$total, 2, '.', '');
			if($account->currency_id == 2){

				$totalc = $total * $account->exchange;
				$totalc = number_format((float)$totalc, 2, '.', '');
			}
        $codigoControl = Utils::getControlCode($numfactura,$nit,$fechaEmision,$totalc,$numAuth,$llave);
        return $codigoControl;
    }

    public function export(){
        $date="11";
        $output = fopen('php://output','w') or Utils::fatalError();
        header('Content-Type:application/txt');
        header('Content-Disposition:attachment;filename=export.txt');
        $invoices=Invoice::select('client_nit','client_name','invoice_number','account_nit','invoice_date','importe_total','importe_ice','importe_exento','importe_neto','debito_fiscal','invoice_status_id','control_code')->where('account_id',Auth::user()->account_id)->where('invoice_date','LIKE','%'.$date.'%')->get();
        $p="|";

        foreach ($invoices as $i){
            if($i->invoice_status_id==6)$status="A";
        else $status="V";
            $datos = $i->client_nit.$p.$i->client_name.$p.$i->invoice_number.$p.$i->account_nit.$p.$i->invoice_date.$p.$i->importe_total.$p.$i->importe_ice.$p.$i->importe_exento.$p.$i->importe_neto.$p.$i->debito_fiscal.$p.$status.$p.$i->control_code."\r\n";
            fputs($output,$datos);
        }
        fclose($output);
		exit;
    }
    private function validateShatterExcel($invoices){
        $stackAstray = "";
        foreach($invoices as $invoice){
            $client = Client::where('account_id',Auth::user()->account_id)->where('public_id',$invoice['id'])->where('nit',$invoice['nit'])->first();
            if(!$client)
                $stackAstray.="El cliente ".$invoice['id']." con NIT: ".$invoice['nit']." no existe<br>";
            foreach ($invoice['products'] as $pro)
            {

                $product= Product::where('account_id',Auth::user()->account_id)->where('product_key',$pro['product_key'])->first();
                if(!$product)
                    $stackAstray.="El producto con codigo: ".$pro['product_key']." no existe<br>";
//                else
//                    echo $product->name;
            }
        }
        if($stackAstray !="")
            $stackAstray.="Revise el documento y vuelva a intentar.";
        return $stackAstray;
    }

		public function importar2(){
        return View::make('factura.import2');
    }

	public function excel2(){
        //print_r(Input::get('excel'));
        //return 0;
        //return View::make('factura.import');

        $dir = "files/excel/";
        $fecha = base64_encode("excel".date('d/m/Y-H:m:i'));
        $file_name = $fecha;
        //return $file_name;



        $file = Input::file('excel');
        $destinationPath = 'files/excel/';
        // If the uploads fail due to file system, you can try doing public_path().'/uploads'
        $filename = $file_name;//str_random(12);
        //$filename = $file->getClientOriginalName();
        //$extension =$file->getClientOriginalExtension();
        $upload_success = Input::file('excel')->move($destinationPath, $filename);

//        if( $upload_success ) {
//           return Response::json('success', 200);
//        } else {
//           return Response::json('error', 400);
//        }


//        return 0;
        $results = Excel::selectSheetsByIndex(0)->load($dir.$file_name)->get();
        $factura = array();
        $groups = array();
        //shattering file gotten
        $nit="";
       foreach ($results as $key => $res){
          $dato=[];
          //$nit = "";
          foreach ($res as $r){
              if($r!="")
                array_push($dato, $r);
          }


          //$nit = $dato[0];
          $bbr['name'] = $dato[0];
          $bbr['nit'] = $dato[1];
			//		if($bbr['nit']="123")
          	//$bbr['nit']=0;
          $bbr['code'] = $dato[2];
          $bbr['razon'] = $dato[3];
          $bbr['total'] = $dato[4];
          $bbr['qty'] = $dato[5];
          array_push($factura, $bbr);

        }
/*        print_r($bbr);
        return 0;

        $returnable = $this->validateShatterExcel($factura);
        if($returnable!=""){
            Session::flash('error',$returnable);
            return View::make('factura.import');
        }
        */$cont = 0;
        foreach ($factura as $fac){
            $this->saveLote2($fac);
            $cont ++;
        }

        //return 0;
        Session::flash('message','Se importaron '.$cont.' facturas exitósamente');
        $invoices = Invoice::where('account_id',Auth::user()->account_id)->where('branch_id',Session::get('branch_id'))->orderBy('public_id', 'DESC')->get();

        //return View::make('factura.index', array('invoices' => $invoices));
        return $cont;
    }

	private function saveLote2($factura){
    	//print_r($factura);
    	//return;
        $account = DB::table('accounts')->where('id','=', Auth::user()->account_id)->first();
        $branch = Branch::find(Session::get('branch_id'));
        $client=  Client::where('account_id','=', Auth::user()->account_id)->where('name',$factura['name'])->where('nit',$factura['nit'])->first();

        if(!$client){
        	///echo "creo";
		  $client = Client::createNew();
		  $client->setNit(trim($factura['nit']));
		  $client->setName(trim($factura['name']));
		  $client->setBussinesName(trim($factura['razon']));
		 $alt= $client->guardar();
		 $client->save();		 
		}	

        $invoice = Invoice::createNew();
        $invoice->setPublicNotes("");
        $invoice->setBranch(Session::get('branch_id'));
        $invoice->setInvoiceDate("2016-02-29");
        $invoice->setClient($client->id);
        $invoice->setEconomicActivity($branch->economic_activity);
        $invoice->setDiscount(0);
        $invoice->setClientName($client->business_name);
        $invoice->setClientNit($client->nit);

        $invoice->setUser(Auth::user()->id);
        $total_cost = 0;
        /*foreach ($factura['products'] as $producto)
        {
            $total_cost+= $producto['cost'];
        }*/
        $invoice->importe_neto = trim($factura['total']);
        $invoice->importe_total=trim($factura['total']);
        $invoice->debito_fiscal=trim($factura['total']);

        //$invoice->note = trim(Input::get('nota'));


        $invoice->setAccountName($account->name);
        $invoice->setAccountNit($account->nit);
        $invoice->setBranchName($branch->name);
        $invoice->setAddress1($branch->address1);
        $invoice->setAddress2($branch->address2);
        $invoice->setPhone($branch->work_phone);
        $invoice->setCity($branch->city);
        $invoice->setState($branch->state);
        $invoice->setNumberAutho($branch->number_autho);
        $invoice->setKeyDosage($branch->key_dosage);
        $invoice->setTypeThird($branch->type_third);
        $invoice->setDeadline($branch->deadline);
        $invoice->setLaw($branch->law);

        $type_document =TypeDocument::where('account_id',Auth::user()->account_id)->firstOrFail();
        $invoice->invoice_number = branch::getInvoiceNumber();

         $numAuth = $invoice->number_autho;
         $numfactura = $invoice->invoice_number;
         $nit = $invoice->client_nit;
         $fechaEmision =date("Ymd",strtotime($invoice->invoice_date));
         $total = $invoice->importe_total;
         $llave = $branch->key_dosage;
         $totalc = number_format((float)$total, 2, '.', '');
			if($account->currency_id == 2){

				$totalc = $total * $account->exchange;
				$totalc = number_format((float)$totalc, 2, '.', '');
			}
         $codigoControl = Utils::getControlCode($numfactura,$nit,$fechaEmision,$totalc,$numAuth,$llave);
        $invoice->setControlCode($codigoControl);
         $documents = TypeDocumentBranch::where('branch_id',$invoice->branch_id)->orderBy('id','ASC')->get();
        foreach ($documents as $document)
        {
            $actual_document = TypeDocument::where('id',$document->type_document_id)->first();
            if($actual_document->master_id==1)
            $id_documento = $actual_document->id;
        }
        $invoice->setJavascript($id_documento);
        $invoice->logo = 1;


        //$invoice->sfc = $branch->sfc;
        if($account->currency_id==1)
               $invoice->sfc = 1;
        else
               $invoice->sfc = $account->exchange;

        $invoice->qr =$invoice->account_nit.'|'.$invoice->invoice_number.'|'.$invoice->number_autho.'|'.$invoice->invoice_date.'|'.$invoice->importe_neto.'|'.$invoice->importe_total.'|'.$invoice->client_nit.'|'.$invoice->importe_ice.'|0|0|'.$invoice->descuento_total;
        if($account->is_uniper)
        {
                $invoice->account_uniper = $account->uniper;
        }

        //$invoice->logo = $type_document->logo;
        $invoice->save();

        //foreach ($factura['products']  as $producto)
        //{
            $product = Product::where('account_id',Auth::user()->account_id)->where('product_key',$factura['code'])->first();
            if($product!=null){

                    $invoiceItem = InvoiceItem::createNew();
                    $invoiceItem->setInvoice($invoice->id);
                    $invoiceItem->setProduct($product->id);
                    $invoiceItem->setProductKey($product->product_key);
                    $invoiceItem->setNotes($product->notes);
                    //$invoiceItem->setCost($factura['total']);
                    $invoiceItem->setCost($factura['total']);
                    $invoiceItem->setQty($factura['qty']);
                    $invoiceItem->save();
            }
         // $this->sendInvoiceByMailLocal($client->name,$client->business_name,$invoice->id,$invoice->invoice_date,$client->nit);
        //}
    }

    public function enviarFacturaTodoTix(){
    	return View::make('template.enviarCorreo');
    }

   public function enviarCorreoFactura($min = 0, $max = 0){ //todotix http
	    
	    $min = Input::get('min');
	    $max = Input::get('max');
	    $branch = 1;
	    $cuenta = Account::where('domain', 'roy')->where('id', 1)->first();
	    $invoices = Invoice::where('account_id', $cuenta->id)->where('branch_id', $branch)->where('public_id', '>=', $min)->where('public_id', '<=', $max)->get();
	    
	    $count = 1;
	    foreach ($invoices as $key => $invoice) {
	      $client = Client::where('id', $invoice->client_id)->select('name', 'business_name', 'nit')->first();

	      if (filter_var($client->name, FILTER_VALIDATE_EMAIL)) {
	         $this->sendInvoiceByMailLocal($client->name,$client->business_name,$invoice->id,$invoice->invoice_date,$client->nit);
	         echo $count." ".$client->name." ".$invoice->control_code." ".$invoice->invoice_number."<br>";
	         sleep(0.2);
	         $count = $count +1;
	      }
    	}
  	}



		public function sendInvoiceByMailLocal($mail,$name,$invoice_id,$invoice_date,$invoice_nit)
				{
			            $mails = array();
			            $contactos = "";
			            //$client = Client::where('id',$client_id)->first();
			            array_push($mails, $mail);
			            $contactos.= "<br><b>".$name."</b> - ".$mail;
			            //$invoices = Invoice::where('account_id',Auth::user()->account_id)->orderBy('public_id', 'DESC')->get();
			            $this->sendInvoiceToContact($invoice_id,$invoice_date,$invoice_nit,$mails);
			            //if($contactos!=""){
			            //$this->addNote(Input::get('id'), "<b>Enviada</b> - ".Auth::user()->first_name." ".Auth::user()->last_name.": La factura ah sido enviada exitosamente a: ".$contactos,2);
			        	//Session::flash('message',"Enviado corréctamente");
			        	//}
			        	return 0;
			        	//else
			        //		Session::flash('error',"No ingresó el mail del remitente");
			            //return View::make('factura.index', array('invoices' => $invoices));
				}

				//buscador
					public function index($name = null, $numero = null, $fecha = null, $total = null, $estado = null, $usuario = null)
					{

					 $name = Input::get('name');
					 $numero = Input::get('numero');
					 $fecha = Input::get('fecha');
					 $total = Input::get('total');
					 $estado = Input::get('estado');
					 $user = Input::get('user');


					Session::put('sw','DESC');

						 if(!$numero && !$name && !$fecha && !$total && !$estado && !$user)
						 {
							$invoices= Invoice::join('invoice_statuses', 'invoices.invoice_status_id', '=', 'invoice_statuses.id')
																	->select('invoices.client_id','invoices.invoice_number','invoices.id', 'invoices.client_name', 'invoices.invoice_date', 'invoices.importe_neto', 'invoice_statuses.name', 'invoices.user_id', 'invoices.public_id')
																	->where('invoices.document_number', '=', '0')
																	->where('invoices.branch_id',Session::get('branch_id'))
																	->orderBy('invoices.id', 'DESC')
																	->simplePaginate(30);
							return View::make('factura.index', array('invoices' => $invoices, 'sw'=>'ASC'));
						 }
						 if ($numero) {

							 $invoices= Invoice::join('invoice_statuses', 'invoices.invoice_status_id', '=', 'invoice_statuses.id')
					 												->select('invoices.client_id','invoices.invoice_number','invoices.id', 'invoices.client_name', 'invoices.invoice_date', 'invoices.importe_neto', 'invoice_statuses.name', 'invoices.user_id', 'invoices.public_id')
					 												->where('invoices.document_number', '=', '0')
																	->where('invoices.branch_id',Session::get('branch_id'))
																	->where('invoices.invoice_number','like', $numero."%")
					 												->orderBy('invoices.id', 'DESC')
					 												->simplePaginate(30);

							$data = [
								'invoices' => $invoices,
								'numero' => $numero
							];
							return View::make('factura.index', $data, array('sw'=>'ASC'));
						}

						 if ($name) {

							 $invoices= Invoice::join('invoice_statuses', 'invoices.invoice_status_id', '=', 'invoice_statuses.id')
					 											 ->select('invoices.client_id','invoices.invoice_number','invoices.id', 'invoices.client_name', 'invoices.invoice_date', 'invoices.importe_neto', 'invoice_statuses.name', 'invoices.user_id', 'invoices.public_id')
					 											 ->where('invoices.document_number', '=', '0')
																 ->where('invoices.branch_id',Session::get('branch_id'))
					 											 ->where('invoices.client_name','like', $name."%")
					 											 ->orderBy('invoices.client_name', 'DESC')
					 											 ->simplePaginate(30);

							 	 $data = [
							 		 'invoices' => $invoices,
							 		 'name' => $name
							 	 ];
							 	 return View::make('factura.index', $data, array('sw'=>'ASC'));
							}

							if ($fecha) {
								$invoices= Invoice::join('invoice_statuses', 'invoices.invoice_status_id', '=', 'invoice_statuses.id')
																	->select('invoices.client_id','invoices.invoice_number','invoices.id', 'invoices.client_name', 'invoices.invoice_date', 'invoices.importe_neto', 'invoice_statuses.name', 'invoices.user_id', 'invoices.public_id')
																	->where('invoices.document_number', '=', '0')
																	->where('invoices.branch_id',Session::get('branch_id'))
																	->where('invoices.invoice_date','like', $fecha."%")
																	->orderBy('invoices.invoice_date', 'DESC')
																	->simplePaginate(30);

									$data = [
										'invoices' => $invoices,
										'fecha' => $fecha
									];
									return View::make('factura.index', $data, array('sw'=>'ASC'));
							}

							if ($total) {
								$invoices= Invoice::join('invoice_statuses', 'invoices.invoice_status_id', '=', 'invoice_statuses.id')
																	->select('invoices.client_id','invoices.invoice_number','invoices.id', 'invoices.client_name', 'invoices.invoice_date', 'invoices.importe_neto', 'invoice_statuses.name', 'invoices.user_id', 'invoices.public_id')
																	->where('invoices.document_number', '=', '0')
																	->where('invoices.branch_id',Session::get('branch_id'))
																	->where('invoices.importe_neto','like', $total."%")
																	->orderBy('invoices.importe_neto', 'DESC')
																	->simplePaginate(30);

									$data = [
										'invoices' => $invoices,
										'total' => $total
									];
									return View::make('factura.index', $data, array('sw'=>'ASC'));
							}

							if ($user) {
								$invoices= Invoice::join('invoice_statuses', 'invoices.invoice_status_id', '=', 'invoice_statuses.id')
													->join('users', 'invoices.user_id', '=', 'users.id')

													->select('invoices.client_id','invoices.invoice_number','invoices.id', 'invoices.client_name', 'invoices.invoice_date', 'invoices.importe_neto', 'invoice_statuses.name', 'invoices.user_id', 'invoices.public_id')
													->where('invoices.document_number', '=', '0')
													->where('invoices.branch_id',Session::get('branch_id'))
													->where('users.first_name','like', $user."%")
													->orderBy('users.first_name', 'DESC')
													->simplePaginate(30);
									$data = [
										'invoices' => $invoices,
										'user' => $user
									];
									return View::make('factura.index', $data, array('sw'=>'ASC'));
							}

							if ($estado) {
								$invoices= Invoice::join('invoice_statuses', 'invoices.invoice_status_id', '=', 'invoice_statuses.id')
																	->select('invoices.client_id','invoices.invoice_number','invoices.id', 'invoices.client_name', 'invoices.invoice_date', 'invoices.importe_neto', 'invoice_statuses.name', 'invoices.user_id', 'invoices.public_id')
																	->where('invoices.document_number', '=', '0')
																	->where('invoices.branch_id',Session::get('branch_id'))
																	->where('invoice_statuses.name','like', $estado."%")
																	->orderBy('invoice_statuses.name', 'DESC')
																	->simplePaginate(30);
									$data = [
										'invoices' => $invoices,
										'estado' => $estado
									];
									return View::make('factura.index', $data, array('sw'=>'ASC'));
							}
				 	}

					 public function indexDown($name = null, $numero = null, $fecha = null, $total = null, $estado = null, $user = null)
					{

						$name = Input::get('name');
						$numero = Input::get('numero');
						$fecha = Input::get('fecha');
						$total = Input::get('total');
						$estado = Input::get('estado');
						$user = Input::get('user');

						Session::put('sw','ASC');
						// if(Session::get('sw')=='DESC')
						// {
						// 	Session::put('sw','ASC');
						// }
						// else {
						// 	Session::put('sw','DESC');
						// }
						$sw = Session::get('sw');

						if(!$numero && !$name && !$fecha && !$total && !$estado && !$user)
				 	 {
				 		$invoices= Invoice::join('invoice_statuses', 'invoices.invoice_status_id', '=', 'invoice_statuses.id')
				 												->select('invoices.client_id','invoices.invoice_number','invoices.id', 'invoices.client_name', 'invoices.invoice_date', 'invoices.importe_neto', 'invoice_statuses.name', 'invoices.user_id', 'invoices.public_id')
																->where('invoices.document_number', '=', '0')
																->where('invoices.branch_id',Session::get('branch_id'))
				 												->orderBy('invoices.id', $sw)
				 												->simplePaginate(30);
				 		return View::make('factura.index', array('invoices' => $invoices, 'sw'=>'ASC'));
				 	 }
				 	 if ($numero) {

				 		 $invoices= Invoice::join('invoice_statuses', 'invoices.invoice_status_id', '=', 'invoice_statuses.id')
				  												->select('invoices.client_id','invoices.invoice_number','invoices.id', 'invoices.client_name', 'invoices.invoice_date', 'invoices.importe_neto', 'invoice_statuses.name', 'invoices.user_id', 'invoices.public_id')
																->where('invoices.document_number', '=', '0')
																	->where('invoices.branch_id',Session::get('branch_id'))
				 											  	->where('invoices.invoice_number','like', $numero."%")
				  												->orderBy('invoices.id', $sw)
				  												->simplePaginate(30);

				 		$data = [
				 			'invoices' => $invoices,
				 			'numero' => $numero
				 		];
				 		return View::make('factura.index', $data);
				 	}

				 	 if ($name) {

				 		 $invoices= Invoice::join('invoice_statuses', 'invoices.invoice_status_id', '=', 'invoice_statuses.id')
				  											 ->select('invoices.client_id','invoices.invoice_number','invoices.id', 'invoices.client_name', 'invoices.invoice_date', 'invoices.importe_neto', 'invoice_statuses.name', 'invoices.user_id', 'invoices.public_id')
																->where('invoices.document_number', '=', '0')
																 ->where('invoices.branch_id',Session::get('branch_id'))
				  											 ->where('invoices.client_name','like', $name."%")
				  											 ->orderBy('invoices.client_name', $sw)
				  											 ->simplePaginate(30);

				 		 	 $data = [
				 		 		 'invoices' => $invoices,
				 		 		 'name' => $name
				 		 	 ];
				 		 	 return View::make('factura.index', $data);
				 		}

				 		if ($fecha) {
				 			$invoices= Invoice::join('invoice_statuses', 'invoices.invoice_status_id', '=', 'invoice_statuses.id')
				 												->select('invoices.client_id','invoices.invoice_number','invoices.id', 'invoices.client_name', 'invoices.invoice_date', 'invoices.importe_neto', 'invoice_statuses.name', 'invoices.user_id', 'invoices.public_id')
																->where('invoices.document_number', '=', '0')
																->where('invoices.branch_id',Session::get('branch_id'))
				 												->where('invoices.invoice_date','like', $fecha."%")
				 												->orderBy('invoices.invoice_date', $sw)
				 												->simplePaginate(30);

				 				$data = [
				 					'invoices' => $invoices,
				 					'fecha' => $fecha
				 				];
				 				return View::make('factura.index', $data);
				 		}

				 		if ($total) {
				 			$invoices= Invoice::join('invoice_statuses', 'invoices.invoice_status_id', '=', 'invoice_statuses.id')
				 												->select('invoices.client_id','invoices.invoice_number','invoices.id', 'invoices.client_name', 'invoices.invoice_date', 'invoices.importe_neto', 'invoice_statuses.name', 'invoices.user_id', 'invoices.public_id')
																->where('invoices.document_number', '=', '0')
																->where('invoices.branch_id',Session::get('branch_id'))
				 												->where('invoices.importe_neto','like', $total."%")
				 												->orderBy('invoices.importe_neto', $sw)
				 												->simplePaginate(30);

				 				$data = [
				 					'invoices' => $invoices,
				 					'total' => $total
				 				];
				 				return View::make('factura.index', $data);
				 		}

				 		if ($user) {
				 			$invoices= Invoice::join('invoice_statuses', 'invoices.invoice_status_id', '=', 'invoice_statuses.id')
				 								->join('users', 'invoices.user_id', '=', 'users.id')
				 												->select('invoices.client_id','invoices.invoice_number','invoices.id', 'invoices.client_name', 'invoices.invoice_date', 'invoices.importe_neto', 'invoice_statuses.name', 'invoices.user_id', 'invoices.public_id')
																->where('invoices.document_number', '=', '0')
																->where('invoices.branch_id',Session::get('branch_id'))
				 												->where('users.first_name','like', $user."%")
				 												->orderBy('users.first_name', $sw)
				 												->simplePaginate(30);

				 				$data = [
				 					'invoices' => $invoices,
				 					'user' => $user
				 				];
				 				return View::make('factura.index', $data);
				 		}

				 		if ($estado) {
				 			$invoices= Invoice::join('invoice_statuses', 'invoices.invoice_status_id', '=', 'invoice_statuses.id')
				 												->select('invoices.client_id','invoices.invoice_number','invoices.id', 'invoices.client_name', 'invoices.invoice_date', 'invoices.importe_neto', 'invoice_statuses.name', 'invoices.user_id', 'invoices.public_id')
																->where('invoices.document_number', '=', '0')
																->where('invoices.branch_id',Session::get('branch_id'))
				 												->where('invoice_statuses.name','like', $estado."%")
				 												->orderBy('invoice_statuses.name', $sw)
				 												->simplePaginate(30);
				 				$data = [
				 					'invoices' => $invoices,
				 					'estado' => $estado
				 				];
				 				return View::make('factura.index', $data);
				 		}
					}
					//fin buscador

	public function backup($backup,$account,$branch){			
    	extract($_POST);
        $username='admin';
		$password='12345';
		$URL='http://backups.emizor.com/invoice';		
		$fields= array(
			'json'=>urlencode(json_encode($backup)),			
			'branch_id'=>urlencode($branch),
			'account_id'=>urlencode($account),						
		);		
		$fields_string="";
		foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
		rtrim($fields_string, '&');		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$URL);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30); //timeout after 30 seconds
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch,CURLOPT_POST, count($fields));
		curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
		curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
		$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);   //get status code
		$response = curl_exec($ch);
		if(!$response){
    		die('Error: "' . curl_error($ch) . '" - Code: ' . curl_errno($ch));
		}						
		curl_close ($ch);
		return $response;    
	}

	public function exportCreate(){
		$client = null;
		$account = Account::findOrFail(Auth::user()->account_id);		
        $branch = Branch::where('id','=',Session::get('branch_id'))->first();
        $today = date("Y-m-d");
        $expire = $branch->deadline;
        $today_time = strtotime($today);
        $expire_time = strtotime($expire);

        if ($expire_time < $today_time)
        {
            Session::flash('error','La fecha límite de emisión caducó, porfavor actualice su Dosificación');
            return Redirect::to('sucursales/'.$branch->public_id.'/edit');
        }
        $last_invoice= Invoice::where('account_id',Auth::user()->account_id)->where('branch_id',Session::get('branch_id'))->max('invoice_date');
        $last_date=  strtotime($last_invoice);
        $secs = $today_time - $last_date;// == <seconds between the two times>
        $days = $secs / 86400;
   		$invoiceDesigns = TypeDocument::where('account_id',\Auth::user()->account_id)->orderBy('public_id', 'desc')->get();
		$data = array(
				'entityType' => ENTITY_INVOICE,
				'account' => $account,
				'invoice' => null,
				'showBreadcrumbs' => false,
				'data' => Input::old('data'),
				'invoiceDesigns' => $invoiceDesigns,
				'method' => 'POST',
				'url' => 'factura',
				'title' => trans('texts.new_invoice'),
                                'vencido'=>0,//$vencido,
                                'last_invoice_date'=>$days,
                'branch'=> $branch,
				);
		$data = array_merge($data, self::getViewModel());
		return View::make('factura.newExportInvoice', $data);
	}
	public function previewExport(){
		print_r(Input::get('concept'));
	}


}
