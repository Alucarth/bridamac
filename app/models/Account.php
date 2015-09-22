<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;
class Account extends Eloquent
{
	 use SoftDeletingTrait;

    protected $dates = ['deleted_at'];
    
	protected $softDelete = true;
	/*
	* Autor: Ing. L. David Torrez Salinas 
	*/

	//variables de control  para este modelo
	private $fv_domain;
	private $fv_nit;
	private $fv_name;
	private $fv_email;
	// private $fv_username;
	// private $fv_password;
	private $fv_error_message;



	//relaciones de la cuenta 
	public function branches()
	{
		return $this->hasMany('Branch');
	}
		
	public function users()
	{
		return $this->hasMany('User');
	}

	public function clients()
	{
		return $this->hasMany('Client');
	}

	public function products()
	{
		return $this->hasMany('Product');
	}

	public function invoices()
	{
		return $this->hasMany('Invoice');
	}

	public function tax_rates()
	{
		return $this->hasMany('TaxRate');
	}

	public function timezone()
	{
		return $this->belongsTo('Timezone');
	}


	public function date_format()
	{
		return $this->belongsTo('DateFormat');	
	}

	public function datetime_format()
	{
		return $this->belongsTo('DatetimeFormat');	
	}

	public function categories()
	{
		return $this->hasMany('Category');
	}
	public function userbranch()
	{
		return $this->hasMany('UserBranch');
	}

	
	
	//hasta aqui todo lo que es con relacion al modelo
	//CONTROL DE DATOS 
	public function setName($nombre)
	{
		 
		 if(!empty($nombre))
		 {

		 	$name = trim($nombre);
		 	$nameExiste=Account::where('name',$name)->first();
		 	if($nameExiste)
		 	{
		 		$this->fv_error_message = $this->fv_error_message . '<br> - Nombre '.$name.ERROR_DUPLICADO;
		 		return $this->fv_name=null;
		 	}
		 	return $this->fv_name = $name;
		 }
		 	// return null;
		 	$this->fv_error_message = $this->fv_error_message .'<br> - Nombre '.ERROR_NULL;
		 	return $this->fv_name = null;
		 
	}
	public function setDomain($subdominio)
	{
		

		if(!empty($subdominio))
		{
			$dominio = trim($subdominio);

			$dominioExiste= Account::where('domain',$dominio)->first();	
			if($dominioExiste)
			{
				$this->fv_error_message = $this->fv_error_message . '<br> - Dominio '.$dominio.ERROR_DUPLICADO;

				return $this->fv_domain = null;
			}

			return $this->fv_domain= $dominio;
		}
		$this->fv_error_message = $this->fv_error_message.'<br> - Dominio '.ERROR_NULL;
		return $this->fv_domain=null;
	}
	public function setNit($nit)
	{

		if(!empty($nit))
		{

			$nit = trim($nit);
			$nitExiste = Account::where('nit',$nit)->first();
			if($nitExiste)
			{
				$this->fv_error_message = $this->fv_error_message . '<br>- Nit '.$nit.ERROR_DUPLICADO;
				return $this->fv_nit = null;
			}
			if(!is_numeric($nit))
			{

				$this->fv_error_message = $this->fv_error_message . '<br>- Nit '.$nit.ERROR_DATO_NUMERICO;
				return  $this->fv_nit =null;
			}
			if($nit<1000)
			{
				$this->fv_error_message = $this->fv_error_message . '<br>- Nit '.$nit.ERROR_NUMERICO_POSITIVO;
				return  $this->fv_nit =null;		
			}
			return  $this->fv_nit = $nit;
		}
		$this->fv_error_message = $this->fv_error_message .'<br>- Nit '.ERROR_NULL;
		return  $this->fv_nit=null;
	}
	public function setEmail($email)
	{
		if(!empty($email))
		{
			$email = trim($email);
			if(!filter_var($email, FILTER_VALIDATE_EMAIL))
			{
				$this->fv_error_message = $this->fv_error_message .'<br>- Email '.$email.ERROR_DATO_EMAIL;
				return $this->fv_email = null; 
			}
			return $this->fv_email = $email;
		}
		$this->fv_error_message = $this->fv_error_message.'<br>- Email '.ERROR_NULL;
		return $this->fv_email = null;
	}
	// public function setUserName($username)
	// {
	// 	if(!empty($username))
	// 	{
	// 		return $this->fv_username=$username;
	// 	}
	// 	$this->fv_error_message = $this->fv_error_message .'- Nombre de Usuario '.ERROR_NULL;
	// 	return $this->fv_username= null;
	// }
	// public function setPasswor($password)
	// {
	// 	if(!epty($password))
	// 	{	
	// 		return $this->fv_password=$password;
	// 	}
	// 	$this->fv_error_message = $this->fv_error_message .'- Passwor '.ERROR_NULL;
	// 	return $this->fv_password= null;

	// }


	public function getName()
	{
		if ($this->fv_name) 
		{
			return $this->fv_name;
		}
	}

	public function getNit()
	{
		if ($this->fv_nit) 
		{
			return $this->fv_nit;
		}
	}
	public function getDomain()
	{
		if($this->fv_domain)
		{
			return $this->fv_domain;
		}

	}
	public function getEmail()
	{
		if($this->fv_email)
		{
			return $this->fv_email;
		}
	}
	public function getErrorMessage()
	{
		return $this->fv_error_message;
	}
	//Validador
	
	//CONTROL DE METEDOS
	//implementando logica de negocio en este punto XD
	public function Guardar()
	{	
		
		if(empty($this->fv_error_message))
		{
			$this->account_key = str_random(RANDOM_KEY_LENGTH);
			$this->ip = Request::getClientIp(); 
		
			$this->domain = $this->getDomain();
			$this->name = $this->getName();
			$this->nit =$this->getNit();
			$this->save();

			$user = new User;
			$user->username =  "temporal@" . $this->getDomain();
			$user->password = Hash::make('temporal');
			$user->email= $this->getEmail(); 
			$user->public_id = 1;
			//enviar confimacion de contraseña
			$user->confirmation_code = '';
			// //addicionar a gpo de administradores XD 
			$user->is_admin = true;
			$this->users()->save($user);


			$category = new Category;
			
			$category->name = "General";
			$category->public_id = 1;
			$this->categories()->save($category);

			$this->fv_error_message = "Registro Existoso";
			return true;
		}

		return false;
	}

	

	// public function getUniper()
	// {
	// 	if ($this->uniper) 
	// 	{
	// 		return $this->uniper;
	// 	}
	// }

	public function getOp1()
	{
		if ($this->op1) 
		{
			return true;
		}
	}
	
	public function getOp2()
	{
		if ($this->op2) 
		{
			return true;
		}
	}

	public function getOp3()
	{
		if ($this->op3) 
		{
			return true;
		}
	}

	public function getDisplayName()
	{
		if ($this->name) 
		{
			return $this->name;
		}

		$this->load('users');
		$user = $this->users()->first();
		
		return $user->getDisplayName();
	}

	public function getCreditCounter()
	{
		return $this->credit_counter;
	}

	public function getTimezone()
	{
		if ($this->timezone)
		{
			return $this->timezone->name;
		}
		else
		{
			return 'America/La_Paz';
		}
	}

	public function getLocale() 
	{
		$language = Language::remember(DEFAULT_QUERY_CACHE)->where('id', '=', $this->account->language_id)->first();		
		return $language->locale;		
	}

	public function loadLocalizationSettings()
	{
		$this->load('timezone', 'date_format', 'datetime_format', 'language');

		Session::put(SESSION_TIMEZONE, $this->timezone ? $this->timezone->name : DEFAULT_TIMEZONE);
		Session::put(SESSION_DATE_FORMAT, $this->date_format ? $this->date_format->format : DEFAULT_DATE_FORMAT);
		Session::put(SESSION_DATE_PICKER_FORMAT, $this->date_format ? $this->date_format->picker_format : DEFAULT_DATE_PICKER_FORMAT);
		Session::put(SESSION_DATETIME_FORMAT, $this->datetime_format ? $this->datetime_format->format : DEFAULT_DATETIME_FORMAT);			
		Session::put(SESSION_CURRENCY, $this->currency_id ? $this->currency_id : DEFAULT_CURRENCY);		
		Session::put(SESSION_LOCALE, $this->language_id ? $this->language->locale : DEFAULT_LOCALE);
	}

	public function getInvoiceLabels()
	{
		$data = [];
		$fields = [ 
			'invoice',  		
  		'invoice_date',
  		'due_date',
  		'invoice_number',
		  'po_number',
		  'discount',
  		'taxes',
  		'tax',
  		'item',
  		'description',
  		'unit_cost',
  		'quantity',
  		'line_total',
  		'subtotal',
  		'paid_to_date',
  		'balance_due',
  		'terms',
  		'your_invoice',
  		'quote',
  		'your_quote',
  		'quote_date',
  		'quote_number',
  		'total',
  		'invoice_issued_to',
		];

		$data = [ 
		'invoice'	=>	'factura',  		
  		'invoice_date'	=>	'fecha de factura',
  		'due_date'	=>	'due date',
  		'invoice_number'	=>	'número de factura',
		  'po_number'=>'número',
		  'discount'=>'Descuento',
  		'taxes'=>'inpuestos',
  		'tax'=>'impuesto',
  		'item'=>'producto',
  		'description'=>'descipcion',
  		'unit_cost'=>'costo unitario',
  		'quantity'=>'cantidad',
  		'line_total'=>'Subtotal',
  		'subtotal'=>'Total Bs.',
  		'paid_to_date'=>'Subtotal',
  		'balance_due'=>'balance',
  		'terms'=>'términos',
  		'your_invoice'=>'tu factura',
  		'quote'=>'cita',
  		'your_quote'=>'tu cita',
  		'quote_date'=>'fecha de cita',
  		'quote_number'=>'número de cita',
  		'total'=>'total',
  		'invoice_issued_to'=>'factura ',
		];

		/*foreach ($fields as $field)
		{
			$data[$field] = $field;//trans("texts.$field");
		}*/

		return $data;
	}

	// public function isRegistered()
	// {

	// 	if ($this->account_key == IPX_ACCOUNT_KEY)
	// 	{
	// 		return true;
	// 	}

	// 	$datePaid = $this->pro_plan_paid;
	// 	if (!$datePaid == '0000-00-00')
	// 	{
	// 		return true;
	// 	}
	// 	else
	// 	{
	// 		return false;
	// 	}
	// }

	// public function isPro()
	// {

	// 	if ($this->account_key == IPX_ACCOUNT_KEY)
	// 	{
	// 		return true;
	// 	}
		
	// 	$datePaid = $this->pro_plan_paid;
	// 	if (!$datePaid || $datePaid == '0000-00-00')
	// 	{
	// 		return false;
	// 	}

	// 	$today = new DateTime('now');
	// 	$datePaid = DateTime::createFromFormat('Y-m-d', $datePaid);		
	// 	if($datePaid >= $today)
	// 	{
	// 		return true;
	// 	}
	// 	else
	// 	{
	// 		return false;
	// 	}

	// 	if ($this->credit_counter > 0)
	// 	{
	// 		return true;
	// 	}
	// 	else
	// 	{	
	// 		return false;
	// 	}
	// }

	// public function hideFieldsForViz()
	// {
	// 	foreach ($this->clients as $client)
	// 	{
	// 		$client->setVisible([
	// 			'public_id',
	// 			'name', 
	// 			'balance',
	// 			'paid_to_date',
	// 			'invoices',
	// 			'contacts',
	// 		]);
			
	// 		foreach ($client->invoices as $invoice) 
	// 		{
	// 			$invoice->setVisible([
	// 				'public_id',
	// 				'invoice_number',
	// 				'amount',
	// 				'balance',
	// 				'invoice_status_id',
	// 				'invoice_items',
	// 				'created_at',
	// 			]);

	// 			foreach ($invoice->invoice_items as $invoiceItem) 
	// 			{
	// 				$invoiceItem->setVisible([
	// 					'product_key',
	// 					'cost', 
	// 					'qty',
	// 				]);
	// 			}			
	// 		}

	// 		foreach ($client->contacts as $contact) 
	// 		{
	// 			$contact->setVisible([
	// 				'public_id',
	// 				'first_name',
	// 				'last_name',
	// 				'email']);
	// 		}						
	// 	}

	// 	return $this;
	// }

}