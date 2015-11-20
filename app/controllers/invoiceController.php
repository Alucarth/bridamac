<?php

class InvoiceController extends \BaseController {

	public function __construct()
	{
		

	}	

	public function index()
	{				
            $invoices = Invoice::where('account_id',Auth::user()->account_id)->orderBy('public_id', 'DESC')->get();		
	    return View::make('factura.index', array('invoices' => $invoices));
	}


		
	public function create()
	{	

		$client = null;
		$account = Account::findOrFail(Auth::user()->account_id);
		// if ($clientPublicId) 
		// {
		// 	$client = Client::scope($clientPublicId)->firstOrFail();
  //  		}
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
				);
		$data = array_merge($data, self::getViewModel());				

		return View::make('factura.new', $data);
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
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
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
			 $codigoControl = Utils::getControlCode($numfactura,$nit,$fechaEmision,$total,$numAuth,$llave);
			$invoice->setControlCode($codigoControl);
			$invoice->setJavascript($type_document->javascript_web);
			$invoice->sfc = $branch->sfc;
			$invoice->qr =$invoice->account_nit.'|'.$invoice->invoice_number.'|'.$invoice->number_autho.'|'.$invoice->invoice_date.'|'.$invoice->importe_neto.'|'.$invoice->importe_total.'|'.$invoice->client_nit.'|'.$invoice->importe_ice.'|0|0|'.$invoice->descuento_total;	
			if($account->is_uniper)
			{
				$invoice->account_uniper = $account->uniper;
			}
			
			$invoice->logo = $type_document->logo;

	       
	  //       require_once(app_path().'/includes/control_code.php');
			// $codigo_de_control = codigoControl($invoice->invoice_number, $invoice->nit, $invoice->due_date, $total, $number_autho, $key_dosage);	        
			$invoice->save();



			//print_r(Input::get('productos'));
			//return 0;
			//

			foreach (Input::get('productos') as $producto)
                        {    	
	    		$prod = $producto;
	    		// return Response::json($prod);	    		    		       	
	    		//print_r($prod["'cost'"]);
	    		//return 0;
	    		//echo $producto["'product_key'"];
	    		$product = Product::where('account_id',Auth::user()->account_id)->where('product_key',$producto["'product_key'"])->first();
		    	// $product = DB::table('products')->where('account_id',Auth::user()->account_id)->where('products.product_key',"=",$producto["'product_key'"])->first();

		    	//print_r($product);
		    	//return 0;
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
			
//	    	if(Input::get('mail') == "1" && false) //50dias
//			{
//				$client_id = Input::get('client');
//				$client = DB::table('clients')->where('id','=', $client_id)->first();
//				$contacts = DB::table('contacts')->where('client_id','=',$client->id)->get(array('id','is_primary','first_name','last_name','email'));
//				
//				
//				$mails = array();
//				foreach ($contacts as $key => $contact) {
//					foreach (Input::get('contactos') as $key => $con) {
//						if(($con['id'] == $contact->id) && (isset($con['checked'])))
//							array_push($mails, "dtorrez@ipxserver.com");				
//					}
//					
//				}			
//				$this->sendInvoiceToContact($invoice->getId(),$invoice->getInvoiceDate(),$invoice->getClientNit(),$mails,$invoice);				
//			}                
                $newInvoice=Invoice::where('id','=',$invoice->getId())->first();
                                
                return Redirect::to("factura/".$newInvoice->getPublicId());
                }
                Session::flash('error','por favor ingrese cliente');
                return Redirect::to('factura/create');
		}	
		Session::flash('error','por favor ingrese productos');
		return Redirect::to('factura/create');			
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
            $invoices = Invoice::where('account_id',Auth::user()->account_id)->orderBy('public_id', 'DESC')->get();
            $this->sendInvoiceToContact(Input::get('id'),Input::get('date'),Input::get('nit'),$mails);
            $this->addNote(Input::get('id'), "<b> ".Auth::user()->first_name." ".Auth::user()->last_name.":</b> La factura ah sido enviada exitosamente a: ".$contactos,2);
            return View::make('factura.index', array('invoices' => $invoices));
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
			Mail::send('emails.wellcome', array('link' => 'http://facturacion.ipx/clientefactura/'.$idnew,'cliente'=>$invoice->client_name,'nit'=>$invoice->client_nit,'monto'=>$invoice->importe_total,'numero_factura'=>$invoice->invoice_number), function($message)
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
					$errorMessage = trans('El cliente no tiene Correo Electrónico.');
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
		$errorS = "Expiró la fecha límite de " . $branch->name;
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
					$errorMessage = trans('El cliente no tiene Correo Electrónico.');
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
                'phone')
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
                if($invoice->note=="")
                    $nota = [];
                else
                    $nota = json_decode($invoice['note']);
                //return $nota;
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
            $invoice['logo'] = $invoice->getLogo();		

            $client_id = $invoice->getClient();
            $client = DB::table('clients')->where('id','=', $client_id)->first();
            $contacts = Contact::where('client_id',$client->id)->get(array('id','is_primary','first_name','last_name','email'));
            $this->addNote($invoice->id, "<b>Cliente ".$invoice->client_name.": </b> Visto",3);
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
                    'copia' => 1,//Input::get('copia'),
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
                $branchDocument = TypeDocumentBranch::where('branch_id','=',$branch->id)->firstOrFail();
		$type_document =TypeDocument::where('id','=',$branchDocument->type_document_id)->firstOrFail();                
				//die($type_document);
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
                         'sfc'=>$branch->sfc,
                        'type_third'=>$branch->type_third,
                        'branch_id'=>$branch->id,
                        'state'=>$branch->state,
                        'law'=>$branch->law,
              'javascript'=> $type_document->javascript_web,
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
                //return 0;
		$data = array(
			'invoice' => $invoice,
			'account'=> $account,
			'products' => $products,
                        'copia'     =>0,
                        'matriz'   => $matriz,
		);		
                
		return View::make('factura.ver',$data);	                                                
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
                        'matriz'    => Branch::scope(1)->first()
		);
		// return Response::json($data);
		return View::make('factura.show',$data);
        
    }
    public function anular($publicId){
        $invoice = Invoice::where('account_id','=', Auth::user()->account_id)->where('public_id','=',$publicId)->first();
        $invoice->invoice_status_id = 6;
        $invoice->save();
        $invoices = Invoice::where('account_id',Auth::user()->account_id)->orderBy('public_id', 'DESC')->get();
	return View::make('factura.index', array('invoices' => $invoices));
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
                            'nit'=>$groups[0][0],
                            'nota'=>$groups[0][3]
                        ];
                    $products=array();;
                    foreach ($groups as $gru)
                    {
                        $pro['product_key']=$gru[1];
                        $pro['qty']=$gru[2];
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
                    'nit'=>$groups[0][0],
                    'nota'=>$groups[0][3]
                ];
            $products=array();;
            foreach ($groups as $gru)
            {
                $pro['product_key']=$gru[1];
                $pro['qty']=$gru[2];
                array_push($products, $pro);
            }
            $bbr['products']=$products;                        
            array_push($factura, $bbr);  
        }                      
        foreach ($factura as $fac){
            $this->saveLote($fac);
            ///echo "<br><br>";
        }
        
        return 0;                              
    }
    
    private function saveLote($factura){
        $account = DB::table('accounts')->where('id','=', Auth::user()->account_id)->first();
        $branch = Branch::find(Session::get('branch_id'));
       // return $factura['nit'];
        $client=  Client::where('account_id','=', Auth::user()->account_id)->where('nit','=',$factura['nit'])->first();
        //if(!$client)
         //   return $factura['nit'];
                
        $invoice = Invoice::createNew();				
        $invoice->setPublicNotes($factura['nota']);
        $invoice->setBranch(Session::get('branch_id'));        
        $invoice->setInvoiceDate(date("Y-m-d"));
        $invoice->setClient($client->id);
        $invoice->setEconomicActivity($branch->economic_activity);        
        $invoice->setDiscount(0);
        $invoice->setClientName($client->name);
        $invoice->setClientNit($client->nit);

        $invoice->setUser(Auth::user()->id);	
        //$date=date("Y-m-d",strtotime(Input::get('invoice_date')));
        //$invoice->setInvoiceDate($date);
        $total_cost = 0;
        foreach ($factura['products'] as $producto)
        {    	            
            $pr = Product::where('account_id',Auth::user()->account_id)->where('product_key',$producto['product_key'])->first();
            $total_cost+= $pr->cost*$producto['qty'];
        }
        
        
        $invoice->importe_neto = trim($total_cost);
        $invoice->importe_total=trim($total_cost);
        
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
         $codigoControl = Utils::getControlCode($numfactura,$nit,$fechaEmision,$total,$numAuth,$llave);
        $invoice->setControlCode($codigoControl);
        $invoice->setJavascript($type_document->javascript_web);
        $invoice->sfc = $branch->sfc;
        //$invoice->qr =$invoice->account_nit.'|'.$invoice->invoice_number.'|'.$invoice->number_autho.'|'.$invoice->invoice_date.'|'.$invoice->importe_neto.'|'.$invoice->importe_total.'|'.$invoice->client_nit.'|'.$invoice->importe_ice.'|0|0|'.$invoice->descuento_total;	
        if($account->is_uniper)
        {
                $invoice->account_uniper = $account->uniper;
        }

        $invoice->logo = $type_document->logo;	     
        $invoice->save();
        
        foreach ($factura['products']  as $producto)
        {    	                              
            $product = Product::where('account_id',Auth::user()->account_id)->where('product_key',$producto['product_key'])->first();
            if($product!=null){

                    $invoiceItem = InvoiceItem::createNew();
                    $invoiceItem->setInvoice($invoice->id); 
                    $invoiceItem->setProduct($product->id);
                    $invoiceItem->setProductKey($product->product_key);                    
                    $invoiceItem->setNotes($product->notes);
                    $invoiceItem->setCost($product->cost);
                    $invoiceItem->setQty($producto['qty']);	      		      
                    $invoiceItem->save();		  
            }
        }                
    }    
    public function controlCode(){                
        $numAuth = Input::get('cc_auth');
        $numfactura = Input::get('cc_invo');
        $nit = Input::get('cc_nit');
        $fechaEmision = date("Ymd",strtotime(Input::get('cc_date')));        
        $total = Input::get('cc_tota');
        $llave = Input::get('cc_key');
        //return json_encode(Input::all());
        $codigoControl = Utils::getControlCode($numfactura,$nit,$fechaEmision,$total,$numAuth,$llave);
        return $codigoControl;
    }
	
}	