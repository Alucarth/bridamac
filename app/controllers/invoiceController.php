<?php

class InvoiceController extends \BaseController {

	public function __construct()
	{
		

	}	

	public function index()
	{
		
		// $data = [
		// 	'title' => trans('texts.invoices'),
		// 	'entityType'=>ENTITY_INVOICE, 
		// 	'columns'=>[trans('checkbox'),  trans('invoice_num'), trans('name_client'), trans('invoice_date'),trans('branch'), trans('invoice_total'), trans('balance_due'), trans('due_date'), trans('status'), trans('action')],
		// ];

		// if (Invoice::scope()->where('is_recurring', '=', true)->count() > 0)
		// {
		// 	$data['secEntityType'] = ENTITY_RECURRING_INVOICE;
		// 	$data['secColumns'] = [trans('checkbox'), trans('frequency'), trans('name_client'), trans('start_date'),trans('end_date'), trans('invoice_total'), trans('action')];
		// }
		 // $products =  Product::join('categories', 'categories.id', '=', 'products.category_id')
		 // 		->where('products.account_id', '=', \Auth::user()->account_id)
		 // 		->where('categories.deleted_at', '=', null)
		 // 		->select('products.public_id', 'products.product_key', 'products.notes', 'products.cost','categories.name as category_name')->get();

	  //    return View::make('factura.index', array('products' => $products));

		// $invoices = Invoice::all();  //where('public_id',"=",Auth::user()->account_id)->get();
		$invoices = Account::find(Auth::user()->account_id)->invoices;
		// return Response::json($invoices);
		//return View::make('sucursales.index')->with('sucursales',$branches);
	    return View::make('factura.index', array('invoices' => $invoices));

		//return View::make('factura.index', $data);
	}

	// public function getDatatable($clientPublicId = null)
 //  {
 //  	$accountId = Auth::user()->account_id;
 //  	$search = Input::get('sSearch');

 //  	//return $this->invoiceRepo->getDatatable($accountId, $clientPublicId, ENTITY_INVOICE, $search);
 //  }

		
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
				'client' => $client);
		$data = array_merge($data, self::getViewModel());				

		return View::make('factura.new', $data);
	}

	private static function getViewModel()
	{
		return [
			'branches' => Branch::where('account_id', '=', Auth::user()->account_id)->get(),
			'products' => Product::scope()->orderBy('id')->get(array('product_key','notes','cost','qty')),
			//'clients' => Client::scope()->with('contacts')->orderBy('name')->get(),
			'clients' => Client::where('name','like','%' )->with('contacts')->get(),
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
		// print_r(Input::all());			
		// 	return 0;

		 $invoice = Invoice::createNew();


		//$invoice->setBranch(Session::get('branch_id'));
		
		$invoice->setBranch(Session::get('branch_id'));
		$invoice->setTerms(trim(Input::get('terms')));
		$invoice->setPublicNotes(trim(Input::get('public_notes')));		
		$invoice->setInvoiceDate(trim(Input::get('invoice_date')));
		$invoice->setClient(trim(Input::get('client')));
		$invoice->setEconomicActivity(Input::get('razon'));
		$date=date("Y-m-d",strtotime(Input::get('due_date')));
		$invoice->setDueDate($date);
		$invoice->setDiscount(trim(Input::get('discount')));
		$invoice->setClientName(trim(Input::get('nombre')));
		$invoice->setClientNit(trim(Input::get('nit')));
		$invoice->setUser(Auth::user()->id);	
		$date=date("Y-m-d",strtotime(Input::get('invoice_date')));
		$invoice->setInvoiceDate($date);
		$invoice->importe_neto = trim(Input::get('total'));
		$invoice->importe_total=trim(Input::get('subtotal'));


		//ACCOUTN AND BRANCK
		$account = DB::table('accounts')->where('id','=', Auth::user()->account_id)->first();
		$invoice->setAccountName($account->name);	
		$invoice->setAccountNit($account->nit);

		
		$branch = DB::table('branches')->where('id','=', Session::get('branch_id'))->first();
		//echo Session::get('branch_id');

		//$invoice_number = 1111;
		//$codigo_control = Utils::generateControlCode($invoice_number, trim(Input::get('nit')), $amount, $number_autho, $key_dosage,$deadline);
		//print_r($branch->account_id);
		//return 0;
		
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


		$invoice->setControlCode("A1-A2-A3-A4");
		$invoice->setJavascript("<javascript></javascript>");

        $invoice->invoice_number = branch::getInvoiceNumber();
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
	    	$product = DB::table('products')->where('products.product_key',"=",$producto["'product_key'"])->first();

	    	//print_r($product);
	    	//return 0;
	    	if($product!=null){

				$invoiceItem = InvoiceItem::createNew();
			  	$invoiceItem->setInvoice($invoice->id); 
		      	$invoiceItem->setProduct($product->id);
		      	$invoiceItem->setProductKey($producto["'product_key'"]);
		      	$invoiceItem->setNotes($producto["'item'"]);
		      	$invoiceItem->setCost($producto["'cost'"]);
		      	$invoiceItem->setQty($producto["'qty'"]);	      		      
		      	$invoiceItem->save();		  
	      	}
    	}


		
    	if(Input::get('mail') == "1") //50dias
		{
			$client_id = Input::get('client');
			$client = DB::table('clients')->where('id','=', $client_id)->first();
			$contacts = DB::table('contacts')->where('client_id','=',$client->id)->get(array('id','is_primary','first_name','last_name','email'));
			
			
			$mails = array();
			foreach ($contacts as $key => $contact) {
				foreach (Input::get('contactos') as $key => $con) {
					if(($con['id'] == $contact->id) && (isset($con['checked'])))
						array_push($mails, $contact->email);				
				}
				
			}
			//print_r($mails);
			$this->sendInvoiceToContact($invoice->getId(),$invoice->getInvoiceDate(),$invoice->getClientNit(),$mails);	
			//$this->index();
			// return 0;
		}



		//$invoice->set();






//		$invoice->set(trim(Input::get('')));
//		$invoice->set(trim(Input::get('')));		
		//print_r($invoice);
		
		//$invoice = Invoice::all();
		
		//return Response::json(Input::all());
		//$url = "factura/1";
			return Redirect::to("factura/".$invoice->getPublicId());
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
		// print_r($link_object);
		// echo "->".$idnew;
		// print_r($mail_to);
		// foreach ($mail_to as $key => $m_to) {
		// 	echo "<br>".$m_;
		// }
		//  return 0;
		foreach ($mail_to as $key => $m_to) {
			global $ma_to;
			$ma_to = $m_to;
			Mail::send('emails.wellcome', array('link' => 'http://empresa.facturacion.ipx/clientefactura/'.$idnew), function($message)
			{
				global $ma_to;
	    		$message->to($ma_to, 'Brian')->subject('Factura');
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
	public function show($publicId)
	{
		$invoice = Invoice::scope($publicId)->first(
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
			'qr')
			);

		
		$account = Account::find(Auth::user()->account_id);		
		//return $invoice['id'];
		$products = InvoiceItem::where('invoice_id',$invoice->id)->get();

		$invoice['invoice_items']=$products;
		$invoice['third']="1";//$invoice->type_third;
		$invoice['is_uniper'] = $account->is_uniper;
		$invoice['uniper'] = $account->uniper;				
		$invoice['logo'] = $invoice->logo;

		/********generating qr code*/
		require_once(app_path().'/includes/BarcodeQR.php');
		$icef = 0;
	    $descf = 0;

	    $qr = new BarcodeQR();
	    $datosqr = $invoice->account_nit.'|'.$invoice->invoice_number.'|'.$invoice->number_autho.'|'.$invoice->invoice_date.'|'.$invoice->importe_neto.'|'.$invoice->importe_total.'|'.$invoice->client_nit.'|'.$icef.'|0|0|'.$descf;	
	    $qr->text($datosqr); 
	    $qr->draw(300, 'qr/codeqr.png');
	    $input_file = 'qr/codeqr.png';
	    $output_file = 'qr/codeqr.jpg';

	    $inputqr = imagecreatefrompng($input_file);
	    list($width, $height) = getimagesize($input_file);
	    $output = imagecreatetruecolor($width, $height);
	    $white = imagecolorallocate($output,  255, 255, 255);
	    imagefilledrectangle($output, 0, 0, $width, $height, $white);
	    imagecopy($output, $inputqr, 0, 0, 0, 0, $width, $height);
	    imagejpeg($output, $output_file);

	    $invoice['qr_actual']=HTML::image_data('qr/codeqr.jpg');
		$data = array(
			'invoice' => $invoice,
			'account'=> $account,
			'products' => $products,
		);
		return View::make('factura.show',$data);
	}

	public function verFactura($dato = 4){

		//$dato = "eyJpZCI6NywicmFuZG9tX3N0cmluZyI6InRoaUlzQVJhbmRvbVN0cmluZyxZb3VOZWVkVG9DaGFuZ2VJdCIsImRhdGUiOiIyMDE1LTA5LTAxIiwibml0IjoiNzg0NTIxNjU4OSJ9";
		$dato = base64_decode($dato);
		$dato = json_decode($dato);
		

		$invoice = Invoice::scope($dato->id)->first(
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
			'qr')
			);

		
		$account = Account::find(Auth::user()->account_id);		
		//return $invoice['id'];
		$products = InvoiceItem::where('invoice_id',$invoice->id)->get();

		$invoice['invoice_items']=$products;
		$invoice['third']="1";//$invoice->type_third;
		$invoice['is_uniper'] = $account->is_uniper;
		$invoice['uniper'] = $account->uniper;				
		$invoice['logo'] = $invoice->logo;

		/********generating qr code*/
		require_once(app_path().'/includes/BarcodeQR.php');
		$icef = 0;
	    $descf = 0;

	    $qr = new BarcodeQR();
	    $datosqr = $invoice->account_nit.'|'.$invoice->invoice_number.'|'.$invoice->number_autho.'|'.$invoice->invoice_date.'|'.$invoice->importe_neto.'|'.$invoice->importe_total.'|'.$invoice->client_nit.'|'.$icef.'|0|0|'.$descf;	
	    $qr->text($datosqr); 
	    $qr->draw(300, 'qr/codeqr.png');
	    $input_file = 'qr/codeqr.png';
	    $output_file = 'qr/codeqr.jpg';

	    $inputqr = imagecreatefrompng($input_file);
	    list($width, $height) = getimagesize($input_file);
	    $output = imagecreatetruecolor($width, $height);
	    $white = imagecolorallocate($output,  255, 255, 255);
	    imagefilledrectangle($output, 0, 0, $width, $height, $white);
	    imagecopy($output, $inputqr, 0, 0, 0, 0, $width, $height);
	    imagejpeg($output, $output_file);

	    $invoice['qr_actual']=HTML::image_data('qr/codeqr.jpg');
		$data = array(
			'invoice' => $invoice,
			'account'=> $account,
			'products' => $products,
		);		
		return View::make('factura.ver',$data);	
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
    
    
    public function guardarFacturaG()
    {
    	/* David 
    	 Guardando  factura con el siguiente formato:
    	
			{"invoice_items":[{"qty":"2","id":"2"}],"client_id":"1"}
			//nuevo formato para la cascada XD
			{"invoice_items":[{"qty":"2","id":"2","boni":"1","desc":"3"}],"client_id":"1"}

    	*/
		$input = Input::all();
        
		// $invoice_number = Auth::user()->account->getNextInvoiceNumber();
		$invoice_number = Auth::user()->branch->getNextInvoiceNumber();


		$client_id = $input['client_id'];
		$client = DB::table('clients')->select('id','nit','name','public_id','custom_value4')->where('id',$input['client_id'])->first();

		DB::table('clients')
				->where('id',$input['client_id'])
				->update(array('nit' => $input['nit'],'name'=>$input['name']));

		$user_id = Auth::user()->getAuthIdentifier();
		$user  = DB::table('users')->select('account_id','branch_id','public_id')->where('id',$user_id)->first();
		

		$account = DB::table('accounts')->where('id',$user->account_id)->first();
		// //$account_id = $user->account_id;
		// // $account = DB::table('accounts')->select('num_auto','llave_dosi','fecha_limite')->where('id',$user->account_id)->first();
		// //$branch = DB::table('branches')->select('num_auto','llave_dosi','fecha_limite','address1','address2','country_id','industry_id')->where('id',$user['branch_id'])->first();
		// //$branch = DB::table('branches')->select('num_auto','llave_dosi','fecha_limite','address1','address2','country_id','industry_id')->where('id','=',$user->branch_id)->first();	
  //   	// $branch = DB::table('branches')->select('number_autho','key_dosage','deadline','address1','address2','country_id','industry_id','law','activity_pri','activity_sec1','name')->where('id','=',$user->branch_id)->first();	
    	
		

    	$branch = DB::table('branches')->where('id','=',$user->branch_id)->first();	



    	$invoice_design = DB::table('master_documents')->select('id')
							->where('account_id','=',1)//$user->account_id)
							// ->where('branch_id','=',$branch->public_id)
							// ->where('user_id','=',$user->public_id)
							->first();
    		// return Response::json($invoice_design);
    	$items = $input['invoice_items'];



    	// $linea ="";
    	$amount = 0;
    	$subtotal=0;
    	$fiscal=0;
    	$icetotal=0;
    	$bonidesc =0;
    	$productos = array();

    	foreach ($items as $item) 
    	{
    		# code...
    		$product_id = $item['id'];
    		 
    		$pr = DB::table('products')
    							// ->join('prices',"product_id","=",'products.id')
    					
    							// ->select('products.id','products.notes','prices.cost','products.ice','products.units','products.cc')
    						    // ->where('prices.price_type_id','=',$user->price_type_id)
    						    // ->where('products.account_id','=',$user->account_id)
    						    ->where('products.id',"=",$product_id)

    							->first();
    		$pr->amount = $item['amount'];

    		// $pr->xd ='hola';
    		$amount = $amount + $pr->amount;
    		$pr->qty = 1;
    		$productos = $pr;					
    		// $pr = DB::table('products')->select('cost')->where('id',$product_id)->first();
    		
    		// $qty = (int) $item['qty'];
    		// $cost = $pr->cost/$pr->units;
    		// $st = ($cost * $qty);
    		// $subtotal = $subtotal + $st; 
    		// $bd= ($item['boni']*$cost) + $item['desc'];
    		// $bonidesc= $bonidesc +$bd;
    		// $amount = $amount +$st-$bd;
    		
  //   			// $fiscal = $fiscal +$amount;

    			

    	}

  //   	$fiscal = $amount -$bonidesc-$icetotal;

    	$balance= 0;
  //   	/////////////////////////hasta qui esta bien al parecer hacer prueba de que fuciona el join de los productos XD
    	$invoice_dateCC = date("Ymd");
    	$invoice_date = date("Y-m-d");
    
		$invoice_date_limitCC = date("Y-m-d", strtotime($branch->deadline));

		require_once(app_path().'/includes/control_code.php');	
		$cod_control = codigoControl($invoice_number, $client->nit, $invoice_dateCC, $amount, $branch->number_autho, $branch->key_dosage);
	 //     $ice = DB::table('tax_rates')->select('rate')->where('name','=','ice')->first();
	 //     //
	 //     // creando invoice
	     $invoice = Invoice::createNew();
	     $invoice->invoice_number=$invoice_number;
	     $invoice->client_id=$client_id;
	     $invoice->user_id=$user_id;
	     $invoice->account_id = $user->account_id;
	     $invoice->branch_id= $user->branch_id;
	     $invoice->amount =number_format((float)$amount, 2, '.', '');	
	      $invoice->subtotal =number_format((float)$amount, 2, '.', '');	
	     $invoice->invoice_design_id = 1;//$invoice_design->id;




//------------- hasta aqui funciona despues sale error

	     $invoice->law = $branch->law;
	     $invoice->balance=$balance;
	     $invoice->control_code=$cod_control;
	     $invoice->start_date =$invoice_date;
	     $invoice->invoice_date=$invoice_date;

		 $invoice->activity_pri=$branch->activity_pri;
	     $invoice->activity_sec1=$branch->activity_sec1;
	     
	 //     // $invoice->invoice
	     $invoice->end_date=$invoice_date_limitCC;
	 //     //datos de la empresa atra vez de una consulta XD
	 //     /*****************error generado al intentar guardar **/
	 //   	 // $invoice->branch = $branch->name;
	     $invoice->address1=$branch->address1;
	     $invoice->address2=$branch->address2;
	     $invoice->number_autho=$branch->number_autho; 
	     // $invoice->work_phone=$branch->postal_code;
			$invoice->city=$branch->city;
			$invoice->state=$branch->state;
	 //     // $invoice->industry_id=$branch->industry_id;
 	
	     // $invoice->country_id= $branch->country_id;
	     $invoice->key_dosage = $branch->key_dosage;
	     $invoice->deadline = $branch->deadline;
	 //     $invoice->custom_value1 =$icetotal;
	 //     $invoice->ice = $ice->rate;
	 //     //cliente
	 //     $invoice->nit=$client->nit;
	 //     $invoice->name =$client->name;
	     //adicionales de la nueva plataforma
	     $invoice->account_name = $account->name;
	     $invoice->account_nit = $account->nit;

	     $invoice->client_name = $input['name'];
	     $invoice->client_nit = $input['nit'];

	     $invoice->phone = $branch->postal_code;



	     $invoice->save();
	     
	 //     $account = Auth::user()->account;
	  

		// 	$ice = $invoice->amount-$invoice->fiscal;
		// 	$desc = $invoice->subtotal-$invoice->amount;

		// 	$amount = number_format($invoice->amount, 2, '.', '');
		// 	$fiscal = number_format($invoice->fiscal, 2, '.', '');

		// 	$icef = number_format($ice, 2, '.', '');
		// 	$descf = number_format($desc, 2, '.', '');

		// 	if($icef=="0.00"){
		// 		$icef = 0;
		// 	}
		// 	if($descf=="0.00"){
		// 		$descf = 0;
		// 	}
	     	require_once(app_path().'/includes/BarcodeQR.php');
			 $icef = 0;
		    $descf = 0;

		    $qr = new BarcodeQR();
		    $datosqr = $invoice->account_nit.'|'.$invoice->invoice_number.'|'.$invoice->number_autho.'|'.$invoice_date.'|'.$invoice->amount.'|'.$invoice->amount.'|'.$invoice->nit.'|'.$icef.'|0|0|'.$descf;
		    $qr->text($datosqr); 
		    $qr->draw(150, 'qr/' . $account->account_key .'_'. $branch->name .'_'.  $invoice->invoice_number . '.png');
		    $input_file = 'qr/' . $account->account_key .'_'. $branch->name .'_'.  $invoice->invoice_number . '.png';
		    $output_file = 'qr/' . $account->account_key .'_'. $branch->name .'_'.  $invoice->invoice_number . '.jpg';

		    $inputqr = imagecreatefrompng($input_file);
		    list($width, $height) = getimagesize($input_file);
		    $output = imagecreatetruecolor($width, $height);
		    $white = imagecolorallocate($output,  255, 255, 255);
		    imagefilledrectangle($output, 0, 0, $width, $height, $white);
		    imagecopy($output, $inputqr, 0, 0, 0, 0, $width, $height);
		    imagejpeg($output, $output_file);

		    $invoice->qr=HTML::image_data('qr/' . $account->account_key .'_'. $branch->name .'_'. $invoice->invoice_number . '.jpg');
			$invoice->save();				
	     	 DB::table('invoices')
            ->where('id', $invoice->id)
            ->update(array('branch_name' => $branch->name));


            //generando pago

            $payment =Payment::createNew();
            $payment->invoice_id = $invoice->id;
            $payment->account_id = $invoice->account_id;
            $payment->client_id = $invoice->client_id;
            $payment->user_id = $invoice->user_id;
            $payment->payment_type_id = 2;
            $payment->amount = $invoice->amount;
            $payment->payment_date = $invoice->date;
            $payment->save();

            // -------------

            //descontando credito
            $credito = DB::table('credits')
            			->where('client_id',$client->id)->first();

            $monto =(int) ($credito->balance-$invoice->amount);
            DB::table('credits')->where('client_id',$client->id)
            					->update(array('balance'=>$monto));

            // return  Response::json($monto);
           
        

            // --------------------

	     //error verificar

	     // $invoice = DB::table('invoices')->select('id')->where('invoice_number',$invoice_number)->first();

	     //guardadndo los invoice items
	    foreach ($items as $item) 

    	{
    		
    		
    		
    		// $product = DB::table('products')->select('notes')->where('id',$product_id)->first();
    		  $product_id = $item['id'];
	    		 
	    		$product = DB::table('products')
    							// ->join('prices',"product_id","=",'products.id')
    					
    							// ->select('products.id','products.notes','prices.cost','products.ice','products.units','products.cc')
    						    // ->where('prices.price_type_id','=',$user->price_type_id)
    						    // ->where('products.account_id','=',$user->account_id)
    						    ->where('products.id',"=",$product_id)

    							->first();

	    		// $pr = DB::table('products')->select('cost')->where('id',$product_id)->first();
	    		
	    		
	    		// $cost = $product->cost/$product->units;
	    		// $line_total= ((int)$item['qty'])*$cost;

    		
    		  $invoiceItem = InvoiceItem::createNew();
    		  $invoiceItem->invoice_id = $invoice->id; 
		      $invoiceItem->product_id = $product_id;
		      $invoiceItem->product_key = $product->product_key;
		      $invoiceItem->notes = $product->notes;
		      $invoiceItem->cost = $item['amount'];
		      $invoiceItem->qty = 1;
		      // $invoiceItem->line_total=$line_total;
		      $invoiceItem->tax_rate = 0;
		      $invoiceItem->save();
		  
    	}
    	

    	$invoiceItems =DB::table('invoice_items')
    				   ->select('notes','cost','qty')
    				   ->where('invoice_id','=',$invoice->id)
    				   ->get(array('notes','cost','qty'));

    	$date = new DateTime($invoice->deadline);
    	$dateEmision = new DateTime($invoice->invoice_date);
    	$cuenta = array('name' =>$account->name,'nit'=>$account->nit );
    	// $ice = $invoice->amount-$invoice->fiscal;

    		// $factura  = array('invoice_number' => $invoice->invoice_number,
  //   					'control_code'=>$invoice->control_code,
  //   					'invoice_date'=>$dateEmision->format('d-m-Y'),
  //   					'amount'=>number_format((float)$invoice->amount, 2, '.', ''),
  //   					'subtotal'=>number_format((float)$invoice->subtotal, 2, '.', ''),
  //   					'fiscal'=>number_format((float)$invoice->fiscal, 2, '.', ''),
  //   					'client'=>$client,
  //   					// 'id'=>$invoice->id,

  //   					'account'=>$account,
  //   					'law' => $invoice->law,
  //   					'invoice_items'=>$invoiceItems,
  //   					'address1'=>str_replace('+', '°', $invoice->address1),
  //   					// 'address2'=>str_replace('+', '°', $invoice->address2),
  //   					'address2'=>$invoice->address2,
  //   					'num_auto'=>$invoice->number_autho,
  //   					'fecha_limite'=>$date->format('d-m-Y'),
  //   					// 'fecha_emsion'=>,
  //   					'ice'=>number_format((float)$ice, 2, '.', '')	
    					
  //   					);
    	$client->name = $input['name'];
    	$client->nit = $input['nit'];	
    	// $client->public_id = $client->custom_value4;	
    	$factura  = array('invoice_number' => $invoice->invoice_number,
    					'control_code'=>$invoice->control_code,
    					'activity_pri' => $branch->activity_pri,
    					'invoice_date'=>$dateEmision->format('d-m-Y'),
    					'amount'=>number_format((float)$invoice->amount, 2, '.', ''),
    					'subtotal'=>number_format((float)$invoice->subtotal, 2, '.', ''),
    					'fiscal'=>number_format((float)$invoice->fiscal, 2, '.', ''),
    					'client'=>$client,
    					// 'id'=>$invoice->id,

    					'account'=>$account,
    					'law' => $invoice->law,
    					'invoice_items'=>$invoiceItems,
    					'address1'=>str_replace('+', '°', $invoice->address1),
    					// 'address2'=>str_replace('+', '°', $invoice->address2),
    					'address2'=>$invoice->address2,
    					'num_auto'=>$invoice->number_autho,
    					'fecha_limite'=>$date->format('d-m-Y')
    					// 'fecha_emsion'=>,
    					// 'ice'=>number_format((float)$ice, 2, '.', '')	
    					
    					);

    	// $invoic = Invoice::scope($invoice_number)->withTrashed()->with('client.contacts', 'client.country', 'invoice_items')->firstOrFail();
		// $d  = Input::all();
		//en caso de problemas irracionales me refiero a que se jodio  
		// $input = Input::all();
		// $client_id = $input['client_id'];
		// $client = DB::table('clients')->select('id','nit','name')->where('id',$input['client_id'])->first();
		$input = Input::all();
		
		$datos = array('hola ' => 'mundo',
						'user'=>$user,
						'input' => $input,
						'invoice number' => $invoice_number,
						'client' => $client,
						'user' => $user,
						'branch' => $branch,
						'account' => $account,
						'invoice_design' => $invoice_design,
						'productos' => $productos

						);

		// return Response::json($datos);
		return Response::json($factura);
       
    }

     public function guardarFactura()
    {
    	/* David 
    	 Guardando  factura con el siguiente formato:
    	
			{"invoice_items":[{"qty":"2","id":"2"}],"client_id":"1"}
			//nuevo formato para la cascada XD
			{"invoice_items":[{"qty":"2","id":"2","boni":"1","desc":"3"}],"client_id":"1"}
			//para version generica

			{"invoice_items":[{"qty":"6","id":"11"}],"name":"Sin Nombre","nit":"0","client_id":"19"}

    	*/
		$input = Input::all();
        
		// $invoice_number = Auth::user()->account->getNextInvoiceNumber();
		$invoice_number = Auth::user()->branch->getNextInvoiceNumber();


		$client_id = $input['client_id'];

		$clientF = Client::scope($client_id)->firstOrFail();

		$client= (object)array();
		$client->id = $clientF->id;
		$client->name = $clientF->name;
		$client->nit = $clientF->nit;
		$client->public_id = $clientF->public_id;

		DB::table('clients')
				->where('id',$client->id)
				->update(array('nit' => $input['nit'],'name'=>$input['name']));
		//

		$user_id = Auth::user()->getAuthIdentifier();
		$user  = DB::table('users')->select('account_id','branch_id','public_id')->where('id',$user_id)->first();
		

		$account = DB::table('accounts')->where('id',$user->account_id)->first();
		// //$account_id = $user->account_id;
		// // $account = DB::table('accounts')->select('num_auto','llave_dosi','fecha_limite')->where('id',$user->account_id)->first();
		// //$branch = DB::table('branches')->select('num_auto','llave_dosi','fecha_limite','address1','address2','country_id','industry_id')->where('id',$user['branch_id'])->first();
		// //$branch = DB::table('branches')->select('num_auto','llave_dosi','fecha_limite','address1','address2','country_id','industry_id')->where('id','=',$user->branch_id)->first();	
  //   	// $branch = DB::table('branches')->select('number_autho','key_dosage','deadline','address1','address2','country_id','industry_id','law','activity_pri','activity_sec1','name')->where('id','=',$user->branch_id)->first();	
    	
		

    	$branch = DB::table('branches')->where('id','=',$user->branch_id)->first();	



    	$invoice_design = DB::table('master_documents')->select('id')
							->where('account_id','=',1)//$user->account_id)
							// ->where('branch_id','=',$branch->public_id)
							// ->where('user_id','=',$user->public_id)
							->first();
    		// return Response::json($invoice_design);
    	$items = $input['invoice_items'];



    	// $linea ="";
    	$amount = 0;
    	$subtotal=0;
    	$fiscal=0;
    	$icetotal=0;
    	$bonidesc =0;
    	$productos = array();

    	foreach ($items as $item) 
    	{
    		# code...
    		$product_id = $item['id'];
    		 
    		$pr = DB::table('products')
    							// ->join('prices',"product_id","=",'products.id')
    					
    							// ->select('products.id','products.notes','prices.cost','products.ice','products.units','products.cc')
    						    // ->where('prices.price_type_id','=',$user->price_type_id)
    						    // ->where('products.account_id','=',$user->account_id)
    						    ->where('products.id',"=",$product_id)

    							->first();
    	

    		// $pr->xd ='hola';
    		//me quede aqui me llego sueñito XD
    		$amount = $amount +($pr->cost * $item['qty']);
    		// $pr->qty = 1;
    		$productos = $pr;					
    		// $pr = DB::table('products')->select('cost')->where('id',$product_id)->first();
    		
    		// $qty = (int) $item['qty'];
    		// $cost = $pr->cost/$pr->units;
    		// $st = ($cost * $qty);
    		// $subtotal = $subtotal + $st; 
    		// $bd= ($item['boni']*$cost) + $item['desc'];
    		// $bonidesc= $bonidesc +$bd;
    		// $amount = $amount +$st-$bd;
    		
  //   			// $fiscal = $fiscal +$amount;

    			

    	}

  //   	$fiscal = $amount -$bonidesc-$icetotal;

    	$balance= $amount;
    	$subtotal = $amount;
  //   	/////////////////////////hasta qui esta bien al parecer hacer prueba de que fuciona el join de los productos XD
    	$invoice_dateCC = date("Ymd");
    	$invoice_date = date("Y-m-d");
    
		$invoice_date_limitCC = date("Y-m-d", strtotime($branch->deadline));

		require_once(app_path().'/includes/control_code.php');	
		$cod_control = codigoControl($invoice_number, $client->nit, $invoice_dateCC, $amount, $branch->number_autho, $branch->key_dosage);
	 //     $ice = DB::table('tax_rates')->select('rate')->where('name','=','ice')->first();
	 //     //
	 //     // creando invoice
	     $invoice = Invoice::createNew();
	     $invoice->invoice_number=$invoice_number;
	     $invoice->client_id=$client->id;
	     $invoice->user_id=$user_id;
	     $invoice->account_id = $user->account_id;
	     $invoice->branch_id= $user->branch_id;
	     $invoice->amount =number_format((float)$amount, 2, '.', '');	
	     $invoice->invoice_design_id = 1;//invoice_design->id;

//------------- hasta aqui funciona despues sale error

	     $invoice->law = $branch->law;
	     $invoice->balance=$balance;
	     $invoice->subtotal = $subtotal;
	     $invoice->control_code=$cod_control;
	     $invoice->start_date =$invoice_date;
	     $invoice->invoice_date=$invoice_date;

		 $invoice->activity_pri=$branch->activity_pri;
	     $invoice->activity_sec1=$branch->activity_sec1;
	     
	 //     // $invoice->invoice
	     $invoice->end_date=$invoice_date_limitCC;
	 //     //datos de la empresa atra vez de una consulta XD
	 //     /*****************error generado al intentar guardar **/
	 //   	 // $invoice->branch = $branch->name;
	     $invoice->address1=$branch->address1;
	     $invoice->address2=$branch->address2;
	     $invoice->number_autho=$branch->number_autho; 
	     // $invoice->work_phone=$branch->postal_code;
			$invoice->city=$branch->city;
			$invoice->state=$branch->state;
	 //     // $invoice->industry_id=$branch->industry_id;
 	
	     // $invoice->country_id= $branch->country_id;
	     $invoice->key_dosage = $branch->key_dosage;
	     $invoice->deadline = $branch->deadline;
	 //     $invoice->custom_value1 =$icetotal;
	 //     $invoice->ice = $ice->rate;
	 //     //cliente
	 //     $invoice->nit=$client->nit;
	 //     $invoice->name =$client->name;
	     //adicionales de la nueva plataforma
	     $invoice->account_name = $account->name;
	     $invoice->account_nit = $account->nit;

	     $invoice->client_name = $input['name'];
	     $invoice->client_nit = $input['nit'];

	     $invoice->phone = $branch->postal_code;



	     $invoice->save();
	     
	 //     $account = Auth::user()->account;
	  

		// 	$ice = $invoice->amount-$invoice->fiscal;
		// 	$desc = $invoice->subtotal-$invoice->amount;

		// 	$amount = number_format($invoice->amount, 2, '.', '');
		// 	$fiscal = number_format($invoice->fiscal, 2, '.', '');

		// 	$icef = number_format($ice, 2, '.', '');
		// 	$descf = number_format($desc, 2, '.', '');

		// 	if($icef=="0.00"){
		// 		$icef = 0;
		// 	}
		// 	if($descf=="0.00"){
		// 		$descf = 0;
		// 	}
	     	require_once(app_path().'/includes/BarcodeQR.php');
			 $icef = 0;
		    $descf = 0;

		    $qr = new BarcodeQR();
		    $datosqr = $invoice->account_nit.'|'.$invoice->invoice_number.'|'.$invoice->number_autho.'|'.$invoice_date.'|'.$invoice->amount.'|'.$invoice->amount.'|'.$invoice->nit.'|'.$icef.'|0|0|'.$descf;
		    $qr->text($datosqr); 
		    $qr->draw(150, 'qr/' . $account->account_key .'_'. $branch->name .'_'.  $invoice->invoice_number . '.png');
		    $input_file = 'qr/' . $account->account_key .'_'. $branch->name .'_'.  $invoice->invoice_number . '.png';
		    $output_file = 'qr/' . $account->account_key .'_'. $branch->name .'_'.  $invoice->invoice_number . '.jpg';

		    $inputqr = imagecreatefrompng($input_file);
		    list($width, $height) = getimagesize($input_file);
		    $output = imagecreatetruecolor($width, $height);
		    $white = imagecolorallocate($output,  255, 255, 255);
		    imagefilledrectangle($output, 0, 0, $width, $height, $white);
		    imagecopy($output, $inputqr, 0, 0, 0, 0, $width, $height);
		    imagejpeg($output, $output_file);

		    $invoice->qr=HTML::image_data('qr/' . $account->account_key .'_'. $branch->name .'_'. $invoice->invoice_number . '.jpg');
			$invoice->save();				
	     	 DB::table('invoices')
            ->where('id', $invoice->id)
            ->update(array('branch_name' => $branch->name));



	     //error verificar

	     // $invoice = DB::table('invoices')->select('id')->where('invoice_number',$invoice_number)->first();

	     //guardadndo los invoice items
	    foreach ($items as $item) 

    	{
    		
    		
    		
    		// $product = DB::table('products')->select('notes')->where('id',$product_id)->first();
    		  $product_id = $item['id'];
	    		 
	    		$product = DB::table('products')
    							// ->join('prices',"product_id","=",'products.id')
    					
    							// ->select('products.id','products.notes','prices.cost','products.ice','products.units','products.cc')
    						    // ->where('prices.price_type_id','=',$user->price_type_id)
    						    // ->where('products.account_id','=',$user->account_id)
    						    ->where('products.id',"=",$product_id)

    							->first();

	    		// $pr = DB::table('products')->select('cost')->where('id',$product_id)->first();
	    		
	    		
	    		// $cost = $product->cost/$product->units;
	    		// $line_total= ((int)$item['qty'])*$cost;

    		
    		  $invoiceItem = InvoiceItem::createNew();
    		  $invoiceItem->invoice_id = $invoice->id; 
		      $invoiceItem->product_id = $product_id;
		      $invoiceItem->product_key = $product->product_key;
		      $invoiceItem->notes = $product->notes;
		      $invoiceItem->cost = $product->cost;
		      $invoiceItem->qty = $item['qty'];
		      // $invoiceItem->line_total=$line_total;
		      $invoiceItem->tax_rate = 0;
		      $invoiceItem->save();
		  
    	}
    	

    	$invoiceItems =DB::table('invoice_items')
    				   ->select('notes','cost','qty')
    				   ->where('invoice_id','=',$invoice->id)
    				   ->get(array('notes','cost','qty'));

    	$date = new DateTime($invoice->deadline);
    	$dateEmision = new DateTime($invoice->invoice_date);
    	$cuenta = array('name' =>$account->name,'nit'=>$account->nit );
    	// $ice = $invoice->amount-$invoice->fiscal;

    		// $factura  = array('invoice_number' => $invoice->invoice_number,
  //   					'control_code'=>$invoice->control_code,
  //   					'invoice_date'=>$dateEmision->format('d-m-Y'),
  //   					'amount'=>number_format((float)$invoice->amount, 2, '.', ''),
  //   					'subtotal'=>number_format((float)$invoice->subtotal, 2, '.', ''),
  //   					'fiscal'=>number_format((float)$invoice->fiscal, 2, '.', ''),
  //   					'client'=>$client,
  //   					// 'id'=>$invoice->id,

  //   					'account'=>$account,
  //   					'law' => $invoice->law,
  //   					'invoice_items'=>$invoiceItems,
  //   					'address1'=>str_replace('+', '°', $invoice->address1),
  //   					// 'address2'=>str_replace('+', '°', $invoice->address2),
  //   					'address2'=>$invoice->address2,
  //   					'num_auto'=>$invoice->number_autho,
  //   					'fecha_limite'=>$date->format('d-m-Y'),
  //   					// 'fecha_emsion'=>,
  //   					'ice'=>number_format((float)$ice, 2, '.', '')	
    					
  //   					);

    	$client->name = $input['name'];
    	$client->nit = $input['nit'];			
    	$factura  = array('invoice_number' => $invoice->invoice_number,
    					'control_code'=>$invoice->control_code,
    					'invoice_date'=>$dateEmision->format('d-m-Y'),
    					
    					'activity_pri' => $branch->activity_pri,
    					'amount'=>number_format((float)$invoice->amount, 2, '.', ''),
    					'subtotal'=>number_format((float)$invoice->balance, 2, '.', ''),
    					'fiscal'=>number_format((float)$invoice->fiscal, 2, '.', ''),
    					'client'=>$client,
    					// 'id'=>$invoice->id,

    					'account'=>$account,
    					'law' => $invoice->law,
    					'invoice_items'=>$invoiceItems,
    					'address1'=>str_replace('+', '°', $invoice->address1),
    					// 'address2'=>str_replace('+', '°', $invoice->address2),
    					'address2'=>$invoice->address2,
    					'num_auto'=>$invoice->number_autho,
    					'fecha_limite'=>$date->format('d-m-Y')
    					// 'fecha_emsion'=>,
    					// 'ice'=>number_format((float)$ice, 2, '.', '')	
    					
    					);

    	// $invoic = Invoice::scope($invoice_number)->withTrashed()->with('client.contacts', 'client.country', 'invoice_items')->firstOrFail();
		// $d  = Input::all();
		//en caso de problemas irracionales me refiero a que se jodio  
		// $input = Input::all();
		// $client_id = $input['client_id'];
		// $client = DB::table('clients')->select('id','nit','name')->where('id',$input['client_id'])->first();


		return Response::json($factura);
       
    }
	
}	