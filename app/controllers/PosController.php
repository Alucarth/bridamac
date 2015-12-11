<?php

class PosController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$cuenta = Account::find(Auth::user()->account_id);
    	// $branch = DB::table('branches')->where('account_id',Auth::user()->account_id)->where('id','=',Auth::user()->branch_id)->first();	
		
		// $user->branch = $branch->name;
   		// $branches =$cuenta->branches;

   		if(Auth::user()->is_admin)
		{
			$branches = Account::find(Auth::user()->account_id)->branches;
			// $sucursales = Branch::find(Auth::user()->account_id);
			$sucursales = array();
			foreach ($branches as $branch) {
				# code...
				$sucursales[] = array('branch_id'=>$branch->id,'name'=>$branch->name);
			}
			// return View::make('users.selectBranch')->with('sucursales',$sucursales);
			// return Response::json($sucursales);
		}
		else
		{
			$sucursales = UserBranch::getSucursales(Auth::user()->id);
		}


   		// return $branches;
   		// $categories = DB::table('categories')->where('account_id',Auth::user()->account_id)->get(array('name'));
   		$categories = $cuenta->categories;
   		// return $categories;
   		$cats = $categories;    	
    	
    	$categories2 = $cuenta->categories;
   		// $categories2 = DB::table('categories')->where('account_id',Auth::user()->account_id)->get();
    	
    	$products2 =$cuenta->products;
    	// $products2 = DB::table('products')->where('account_id','=',Auth::user()->account_id)->get();

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
    			'first_name'=>Auth::user()->first_name,
    			'last_name'=>Auth::user()->last_name,
    			'branch'=>$sucursales,
    			'name'=>$cuenta->name,
    			'subdominio'=>$cuenta->domain
    		);

    	return Response::json($mensaje);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
	public function guardarCliente()
	{
		$client = Client::createNew();
		$client->setNit(trim(Input::get('nit')));
		$client->setName(trim(Input::get('name')));
		$client->setBussinesName(trim(Input::get('name')));
		$client->save();
		//$client = Client::where()->first();
		$client2 = Client::where('id',$client->id)->first();
		$clientPOS = array(
				'id'=>$client2->id,
				'public_id'=>$client2->public_id,
				'name'=>$client2->name,
				'nit'=>$client2->nit,
				'business_name'=>$client2->business_name
				);

				$datos = array(
    			'resultado' => 0,
    			'cliente' => $clientPOS
				);
    			return Response::json($datos);	


	}
	public function cliente($nit)
    {
     	// $cuenta = Account::find(Auth::user()->account_id);
    	// $client =  DB::table('clients')->select('id','public_id','name','nit')->where('account_id',$user->account_id)->where('nit',$public_id)->first();
    	$client = Client::where('account_id',Auth::user()->account_id)->where('nit',$nit)->first();
    	if($client!=null)
    	{

    		$datos = array(
    			'resultado' => 0,
    			'cliente' => $client

    		);
    		return Response::json($datos);	
    	}
    	$datos = array(
    			'resultado' => 1,
    			'mensaje' => 'cliente no encontrado'

    		);
    		return Response::json($datos);	
    	
    }

     public function guardarFactura()
    {
    	/* David 
    	 Guardando  factura con el siguiente formato:
    	
			{"invoice_items":[{"id":"12","qty":"1"},{"id":"16","qty":"1"},{"id":"15","qty":"1"}],"nit":"6047054","name":"keyrus","client_id":"7"}

    	*/
		$input = Input::all();
        $branch_id = Input::get('branch_id');
		// $invoice_number = Auth::user()->account->getNextInvoiceNumber();
		$invoice_number = Branch::getInvoiceNumber($branch_id);

		
		$client_id = $input['client_id'];

		$client = Client::find($client_id);

		// $client= (object)array();
		// $client->id = $clientF->id;
		// $client->name = $clientF->name;
		// $client->nit = $clientF->nit;
		// $client->public_id = $clientF->public_id;

		//if($input['nit']!=$client->nit || $input['name']!=$client->name){
		//	$client->nit = $input['nit'];		
		//	$client->name = $input['name'];
		//	$client->save();
		//}

		DB::table('clients')
				->where('id',$client->id)
				->update(array('nit' => $input['nit'],'name'=>$input['name']));

		
		//

		$user_id = Auth::user()->getAuthIdentifier();
		// $user  = DB::table('users')->select('account_id','branch_id','public_id')->where('id',$user_id)->first();
		

		$account = DB::table('accounts')->where('id',Auth::user()->account_id)->first();
		// //$account_id = $user->account_id;
		// // $account = DB::table('accounts')->select('num_auto','llave_dosi','fecha_limite')->where('id',$user->account_id)->first();
		// //$branch = DB::table('branches')->select('num_auto','llave_dosi','fecha_limite','address1','address2','country_id','industry_id')->where('id',$user['branch_id'])->first();
		// //$branch = DB::table('branches')->select('num_auto','llave_dosi','fecha_limite','address1','address2','country_id','industry_id')->where('id','=',$user->branch_id)->first();	
  //   	// $branch = DB::table('branches')->select('number_autho','key_dosage','deadline','address1','address2','country_id','industry_id','law','activity_pri','activity_sec1','name')->where('id','=',$user->branch_id)->first();	
    	
		

    	$branch = DB::table('branches')->where('id','=',$branch_id)->first();	



    	// $invoice_design = DB::table('invoice_designs')->select('id')
					// 		->where('account_id','=',$account_id)
					// 		// ->where('branch_id','=',$branch->public_id)
					// 		// ->where('user_id','=',$user->public_id)
					// 		->first();
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
	     $invoice->user_id=Auth::user()->id;
	     $invoice->account_id = Auth::user()->account_id;
	     $invoice->branch_id= $branch_id;
	     $invoice->importe_neto =$subtotal;	
	     // $invoice->invoice_design_id = $invoice_design->id;

//------------- hasta aqui funciona despues sale error

	     $invoice->law = $branch->law;
	     // $invoice->=$balance;
	     $invoice->importe_total = number_format((float)$amount, 2, '.', '');
	     $invoice->control_code=$cod_control;
	     $invoice->start_date =$invoice_date;
	     $invoice->invoice_date=$invoice_date;

		 $invoice->economic_activity=$branch->economic_activity;
	     // $invoice->activity_sec1=$branch->activity_sec1;
	     
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
	     $invoice->branch_name = $branch->name;
	    

	    

	     $invoice->phone = $branch->work_phone;

	     	$type_document =TypeDocument::where('account_id',Auth::user()->account_id)->firstOrFail();
	    $invoice->javascript=$type_document->javascript_pos;;
	     	$invoice->sfc = $branch->sfc;
			$invoice->qr =$invoice->account_nit.'|'.$invoice->invoice_number.'|'.$invoice->number_autho.'|'.$invoice->invoice_date.'|'.$invoice->importe_neto.'|'.$invoice->importe_total.'|'.$invoice->client_nit.'|'.$invoice->importe_ice.'|0|0|'.$invoice->descuento_total;	
			if($account->is_uniper)
			{
				$invoice->account_uniper = $account->uniper;
			}
			
			$invoice->logo = $type_document->logo;

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
	  //    	require_once(app_path().'/includes/BarcodeQR.php');
			//  $icef = 0;
		 //    $descf = 0;

		 //    $qr = new BarcodeQR();
		 //    $datosqr = $invoice->account_nit.'|'.$invoice->invoice_number.'|'.$invoice->number_autho.'|'.$invoice_date.'|'.$invoice->amount.'|'.$invoice->amount.'|'.$invoice->nit.'|'.$icef.'|0|0|'.$descf;
		 //    $qr->text($datosqr); 
		 //    $qr->draw(150, 'qr/' . $account->account_key .'_'. $branch->name .'_'.  $invoice->invoice_number . '.png');
		 //    $input_file = 'qr/' . $account->account_key .'_'. $branch->name .'_'.  $invoice->invoice_number . '.png';
		 //    $output_file = 'qr/' . $account->account_key .'_'. $branch->name .'_'.  $invoice->invoice_number . '.jpg';

		 //    $inputqr = imagecreatefrompng($input_file);
		 //    list($width, $height) = getimagesize($input_file);
		 //    $output = imagecreatetruecolor($width, $height);
		 //    $white = imagecolorallocate($output,  255, 255, 255);
		 //    imagefilledrectangle($output, 0, 0, $width, $height, $white);
		 //    imagecopy($output, $inputqr, 0, 0, 0, 0, $width, $height);
		 //    imagejpeg($output, $output_file);

		 //    $invoice->qr=HTML::image_data('qr/' . $account->account_key .'_'. $branch->name .'_'. $invoice->invoice_number . '.jpg');
			// $invoice->save();				
	  //    	 DB::table('invoices')
   //          ->where('id', $invoice->id)
   //          ->update(array('branch_name' => $branch->name));



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
		      // $invoiceItem->tax_rate = 0;
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
    					
    					'activity_pri' => $branch->economic_activity,
    					'amount'=>number_format((float)$invoice->importe_total, 2, '.', ''),
    					'subtotal'=>number_format((float)$invoice->importe_neto, 2, '.', ''),
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
