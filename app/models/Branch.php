<?php

class Branch extends EntityModel
{

	private $fv_name;
	private $fv_address1;
	private $fv_address2;
	private $fv_state;
	private $fv_city;
	private $fv_workphone;
	private $fv_number_branch;
	private $fv_number_process;
	private $fv_nummber_autho;
	private $fv_deadline;
	private $fv_key_dossage;
	private $fv_economic_activity;
	private $fv_law;
	private $fv_type_thrird;
	private $fv_invoice_counter;
	private $fv_account_id;

	private $fv_type_documents_branch;
	// private $fv_type_branch;


	private $fv_error_message;
	

	protected $fillable = array('name');

	public function account()
	{
		return $this->belongsTo('Account');
	}

	public function invoices()
	{
		return $this->hasMany('Invoice');
	}

	public function getId()
	{
		return $this->id;
	}
	public function name()
	{
		return $this->name;
	}

	public static function buscar($public_id)
	{
		if(Auth::check())
		{
			 $account_id = Auth::user()->account_id;	
		
		}
		else
		{
			 $account_id = Session::get('account_id');
		}
		$branch = Branch::where('public_id',$public_id)->scope(false, $account_id)->first();
		return $branch;
	}


	
	// public function getNextInvoiceNumber($isQuote = false)
	// {
	// 	$counter = $isQuote ? $this->quote_number_counter : $this->invoice_number_counter;
	// 	$prefix = $isQuote ? $this->quote_number_prefix : $this->invoice_number_prefix;

	// 	return $prefix . $counter;
	// }

	// public function incrementCounter($isQuote = false) 
	// {
	// 	if ($isQuote) {
	// 		$this->quote_number_counter += 1;
	// 	} else {
	// 		$this->invoice_number_counter += 1;
	// 	}

	// 	$this->save();
	// }

	// public function isValid1()
	// {


	// 	if (is_null($this->deadline))
	// 	{
	// 		return false;
	// 	}
	// 	else
	// 	{
	// 		if ($this->deadline == '0000-00-00')
	// 		{
	// 			return true;
	// 		}
	// 		else
	// 		{
	// 			$datelimit1 = $this->deadline;	
	// 			$today = new DateTime('now');

	// 			$today = $today->format('Y-m-d');
	// 			$datelimit = DateTime::createFromFormat('Y-m-d', $datelimit1);	
	// 			$datelimit = $datelimit->format('Y-m-d');

	// 			$valoresPrimera = explode ("-", $datelimit); 
	// 			$valoresSegunda = explode ("-", $today); 

	// 			$diaPrimera    = $valoresPrimera[2];  
	// 			$mesPrimera  = $valoresPrimera[1];  
	// 			$anyoPrimera   = $valoresPrimera[0]; 

	// 			$diaSegunda   = $valoresSegunda[2];  
	// 			$mesSegunda = $valoresSegunda[1];  
	// 			$anyoSegunda  = $valoresSegunda[0];

	// 			$diasPrimeraJuliano = gregoriantojd($mesPrimera, $diaPrimera, $anyoPrimera);  
	// 			$diasSegundaJuliano = gregoriantojd($mesSegunda, $diaSegunda, $anyoSegunda);     

	// 			return  $diasPrimeraJuliano - $diasSegundaJuliano < 0;
	// 		}
	// 	}
	// }

	// public function isValid()
	// {	

	// 	$datelimit1 = $this->deadline;	

	// 	if (!$datelimit1)
	// 	{
	// 		return false;
	// 	}
	// 	else
	// 	{

	// 	$today = new DateTime('now');

	// 	$today = $today->format('Y-m-d');
	// 	$datelimit = DateTime::createFromFormat('Y-m-d', $datelimit1);	
	// 	$datelimit = $datelimit->format('Y-m-d');

	// 	$valoresPrimera = explode ("-", $datelimit); 
	// 	$valoresSegunda = explode ("-", $today); 

	// 	$diaPrimera    = $valoresPrimera[2];  
	// 	$mesPrimera  = $valoresPrimera[1];  
	// 	$anyoPrimera   = $valoresPrimera[0]; 

	// 	$diaSegunda   = $valoresSegunda[2];  
	// 	$mesSegunda = $valoresSegunda[1];  
	// 	$anyoSegunda  = $valoresSegunda[0];

	// 	$diasPrimeraJuliano = gregoriantojd($mesPrimera, $diaPrimera, $anyoPrimera);  
	// 	$diasSegundaJuliano = gregoriantojd($mesSegunda, $diaSegunda, $anyoSegunda);     

	// 	return  $diasPrimeraJuliano - $diasSegundaJuliano < 0;

	// 	}

	// }

	// public function getInvoiceLabels()
	// {
	// 	$data = [];
	// 	$fields = [ 
	// 		'invoice',  		
 //  		'invoice_date',
 //  		'due_date',
 //  		'invoice_number',
	// 	  'po_number',
	// 	  'discount',
 //  		'taxes',
 //  		'tax',
 //  		'item',
 //  		'description',
 //  		'unit_cost',
 //  		'quantity',
 //  		'line_total',
 //  		'subtotal',
 //  		'paid_to_date',
 //  		'balance_due',
 //  		'terms',
 //  		'your_invoice',
 //  		'quote',
 //  		'your_quote',
 //  		'quote_date',
 //  		'quote_number',
 //  		'total',
 //  		'invoice_issued_to',
	// 	];

	// 	foreach ($fields as $field)
	// 	{
	// 		$data[$field] = trans("texts.$field");
	// 	}

	// 	return $data;
	// }
	

	/* Validacion de datos */

  

    /**
     * Gets the value of fv_name.
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->fv_name;
    }

    /**
     * Sets the value of fv_name.
     *
     * @param mixed $fv_name the fv_name
     *
     * @return self
     */
   public function setName($nombre)
	{
		 
		 if(!empty($nombre))
		 {

		 	$name = trim($nombre);
            if(Auth::check())
            {
                $nameExiste=Account::find($this->account_id)->where('name',$name)->first();

            }else{

                $nameExiste=Account::find($this->getAccount_id())->where('name',$name)->first();
            }    
		 	
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

    /**
     * Gets the value of fv_address1.
     *
     * @return mixed
     */
    public function getAddress1()
    {
        return $this->fv_address1;
    }

    /**
     * Sets the value of fv_address1.
     *
     * @param mixed $fv_address1 the fv_address1
     *
     * @return self
     */
    public function setAddress1($fv_address1)
    {
    	if(!empty($fv_address1))
    	{
    		return $this->fv_address1 = $fv_address1;
    	}
        $this->fv_error_message = $this->fv_error_message .'<br> - Direccion 1 '.ERROR_NULL;

        return $this->fv_address1 = null;
    }

    /**
     * Gets the value of fv_address2.
     *
     * @return mixed
     */
    public function getAddress2()
    {

        return $this->fv_address2;
    }

    /**
     * Sets the value of fv_address2.
     *
     * @param mixed $fv_address2 the fv_address2
     *
     * @return self
     */
    public function setAddress2($fv_address2)
    {
    	if(!empty($fv_address2))
    	{
        	return $this->fv_address2 = $fv_address2;
    	}
    	$this->fv_error_message = $this->fv_error_message .'<br> - Direccion 2 '.ERROR_NULL;
        return $this->fv_address2=null;
    }

    /**
     * Gets the value of fv_state.
     *
     * @return mixed
     */
    public function getState()
    {
        return $this->fv_state;
    }

    /**
     * Sets the value of fv_state.
     *
     * @param mixed $fv_state the fv_state
     *
     * @return self
     */
    public function setState($fv_state)
    {
    	if(!empty($fv_state))
    	{

    		return  $this->fv_state = $fv_state;
    	}
	       
    	$this->fv_error_message = $this->fv_error_message .'<br> - Estado '.ERROR_NULL;
        return  $this->fv_state = null;
    }

    /**
     * Gets the value of fv_city.
     *
     * @return mixed
     */
    public function getCity()
    {

        return $this->fv_city;
    }

    /**
     * Sets the value of fv_city.
     *
     * @param mixed $fv_city the fv_city
     *
     * @return self
     */
    public function setCity($fv_city)
    {
    	if(!empty($fv_city))
    	{
    		return $this->fv_city = $fv_city;	
    	}
        $this->fv_error_message = $this->fv_error_message .'<br> - Ciudad '.ERROR_NULL;
        return $this->fv_city = null;
    }

    /**
     * Gets the value of fv_workphone.
     *
     * @return mixed
     */
    public function getWorkphone()
    {
        return $this->fv_workphone;
    }

    /**
     * Sets the value of fv_workphone.
     *
     * @param mixed $fv_workphone the fv_workphone
     *
     * @return self
     */
    public function setWorkphone($fv_workphone)
    {

    	if(!empty($fv_workphone))
    	{

			$fv_workphone = trim($fv_workphone);
			
			if(!is_numeric($fv_workphone))
			{

				$this->fv_error_message = $this->fv_error_message . '<br>- Telefono '.$fv_workphone.ERROR_DATO_NUMERICO;
				return  $this->fv_workphone =null;
			}
			if($fv_workphone<0)
			{
				$this->fv_error_message = $this->fv_error_message . '<br>- Telefono '.$fv_workphone.ERROR_NUMERICO_POSITIVO;
				return  $this->fv_workphone =null;		
			}
			return  $this->fv_workphone = $fv_workphone;
		}
		$this->fv_error_message = $this->fv_error_message .'<br>- Telefono '.ERROR_NULL;
		return  $this->fv_workphone=null;
    }

    /**
     * Gets the value of fv_number_branch.
     *
     * @return mixed
     */
    public function getNumber_branch()
    {
        return $this->fv_number_branch;
    }

    /**
     * Sets the value of fv_number_branch.
     *
     * @param mixed $fv_number_branch the fv_number_branch
     *
     * @return self
     */
    public function setNumber_branch($fv_number_branch)
    {

    	// if($fv_number_branch)
    	// {

			$fv_number_branch = trim($fv_number_branch);
			
			if(!is_numeric($fv_number_branch))
			{

				$this->fv_error_message = $this->fv_error_message . '<br>- Numero de Sucursal '.$fv_number_branch.ERROR_DATO_NUMERICO;
				return  $this->fv_number_branch =null;
			}
			if($fv_number_branch<0)
			{
				$this->fv_error_message = $this->fv_error_message . '<br>- Numero de Sucursal '.$fv_number_branch.ERROR_NUMERICO_POSITIVO;
				return  $this->fv_number_branch =null;		
			}
			return  $this->fv_number_branch = $fv_number_branch;
		// }
		// $this->fv_error_message = $this->fv_error_message .'<br>- Numero de Sucursal '.ERROR_NULL;
		// return  $this->fv_number_branch=null;

      
    }

    /**
     * Gets the value of fv_number_process.
     *
     * @return mixed
     */
    public function getNumber_process()
    {
        return $this->fv_number_process;
    }

    /**
     * Sets the value of fv_number_process.
     *
     * @param mixed $fv_number_process the fv_number_process
     *
     * @return self
     */
    public function setNumber_process($fv_number_process)
    {

    	if(!empty($fv_number_process))
    	{

			$fv_number_process = trim($fv_number_process);
			
			if(!is_numeric($fv_number_process))
			{

				$this->fv_error_message = $this->fv_error_message . '<br>- Numero de Proceso '.$fv_number_process.ERROR_DATO_NUMERICO;
				return  $this->fv_number_process =null;
			}
			if($fv_number_process<0)
			{
				$this->fv_error_message = $this->fv_error_message . '<br>- Numero de Proceso '.$fv_number_process.ERROR_NUMERICO_POSITIVO;
				return  $this->fv_number_process =null;		
			}
			return  $this->fv_number_process = $fv_number_process;
		}
		$this->fv_error_message = $this->fv_error_message .'<br>- Numero de Proceso '.ERROR_NULL;
		return  $this->fv_number_process=null;

      
    }

    /**
     * Gets the value of fv_nummber_autho.
     *
     * @return mixed
     */
    public function getNummber_autho()
    {
        return $this->fv_nummber_autho;
    }

    /**
     * Sets the value of fv_nummber_autho.
     *
     * @param mixed $fv_nummber_autho the fv_nummber_autho
     *
     * @return self
     */
    public function setNumber_autho($fv_nummber_autho)
    {
    	if(!empty($fv_nummber_autho))
    	{

			$fv_nummber_autho = trim($fv_nummber_autho);
			
			if(!is_numeric($fv_nummber_autho))
			{

				$this->fv_error_message = $this->fv_error_message . '<br>- Numero de Autorizacion '.$fv_nummber_autho.ERROR_DATO_NUMERICO;
				return  $this->fv_nummber_autho =null;
			}
			if($fv_nummber_autho<0)
			{
				$this->fv_error_message = $this->fv_error_message . '<br>- Numero de Autorizacion '.$fv_nummber_autho.ERROR_NUMERICO_POSITIVO;
				return  $this->fv_nummber_autho =null;		
			}
			return  $this->fv_nummber_autho = $fv_nummber_autho;
		}
		$this->fv_error_message = $this->fv_error_message .'<br>- Numero de Autorizacion '.ERROR_NULL;
		return  $this->fv_nummber_autho=null;

       
    }

    /**
     * Gets the value of fv_deadline.
     *
     * @return mixed
     */
    public function getDeadline()
    {

        return $this->fv_deadline;
    }

    /**
     * Sets the value of fv_deadline.
     *
     * @param mixed $fv_deadline the fv_deadline
     *
     * @return self
     */
    public function setDeadline($fv_deadline)
    {
    	if(!empty($fv_deadline))
    	{
    		// if(!Utils::validarFecha($fv_deadline,'d-m-Y'))
    		// {
    		// 	$this->fv_error_message = $this->fv_error_message . '<br>- Fecha Limite'.$fv_deadline.ERROR_DATO_FECHA;
    		// 	return $this->fv_deadline = null;
    		// }

    		return $this->fv_deadline =date("Y-m-d", strtotime($fv_deadline)) ;	
    	}

        $this->fv_error_message = $this->fv_error_message .'<br> - Fecha Limite '.ERROR_NULL;
        return $this->fv_deadline = null;

    }

    /**
     * Gets the value of fv_key_dossage.
     *
     * @return mixed
     */
    public function getKey_dosage()
    {
        return $this->fv_key_dossage;
    }

    /**
     * Sets the value of fv_key_dossage.
     *
     * @param mixed $fv_key_dossage the fv_key_dossage
     *
     * @return self
     */
    public function setKey_dosage($fv_key_dossage)
    {
    	if(!empty($fv_key_dossage))
    	{
    		return $this->fv_key_dossage = $fv_key_dossage;	
    	}
        $this->fv_error_message = $this->fv_error_message .'<br> - Llave de Dosificacion '.ERROR_NULL;
        return $this->fv_key_dossage = null;
    }

    /**
     * Gets the value of fv_economic_activity.
     *
     * @return mixed
     */
    public function getEconomic_activity()
    {
        return $this->fv_economic_activity;
    }

    /**
     * Sets the value of fv_economic_activity.
     *
     * @param mixed $fv_economic_activity the fv_economic_activity
     *
     * @return self
     */
    public function setEconomic_activity($fv_economic_activity)
    {
      if(!empty($fv_economic_activity))
    	{
    		return $this->fv_economic_activity = $fv_economic_activity;	
    	}
        $this->fv_error_message = $this->fv_error_message .'<br> - Actividad Economica '.ERROR_NULL;
        return $this->fv_economic_activity = null;
    }

    /**
     * Gets the value of fv_law.
     *
     * @return mixed
     */
    public function getLaw()
    {
        return $this->fv_law;
    }

    /**
     * Sets the value of fv_law.
     *
     * @param mixed $fv_law the fv_law
     *
     * @return self
     */
    public function setLaw($fv_law)
    {
       if(!empty($fv_law))
    	{
    		return $this->fv_law = $fv_law;	
    	}
        $this->fv_error_message = $this->fv_error_message .'<br> - Leyenda '.ERROR_NULL;
        return $this->fv_law = null;
    }

    /**
     * Gets the value of fv_type_thrird.
     *
     * @return mixed
     */
    public function getType_thrird()
    {   if($this->fv_type_thrird)
        {
            return true;    
        }
        return false;
    }

    /**
     * Sets the value of fv_type_thrird.
     *
     * @param mixed $fv_type_thrird the fv_type_thrird
     *
     * @return self
     */
    public function setType_thrird($fv_type_thrird)
    {
        $this->fv_type_thrird = $fv_type_thrird;

        return $this;
    }

    /**
     * Gets the value of fv_invoice_counter.
     *
     * @return mixed
     */
    public function getInvoice_counter()
    {
        return $this->fv_invoice_counter;
    }

    /**
     * Sets the value of fv_invoice_counter.
     *
     * @param mixed $fv_invoice_counter the fv_invoice_counter
     *
     * @return self
     */
    public function setInvoice_counter($fv_invoice_counter)
    {
       if(!empty($fv_invoice_counter))
    	{

			$fv_invoice_counter = trim($fv_invoice_counter);
			
			if(!is_numeric($fv_invoice_counter))
			{

				$this->fv_error_message = $this->fv_error_message . '<br>- Contador de Factura '.$fv_invoice_counter.ERROR_DATO_NUMERICO;
				return  $this->fv_invoice_counter =null;
			}
			if($fv_invoice_counter<0)
			{
				$this->fv_error_message = $this->fv_error_message . '<br>- Contador de Factura '.$fv_invoice_counter.ERROR_NUMERICO_POSITIVO;
				return  $this->fv_invoice_counter =null;		
			}
			return  $this->fv_invoice_counter = $fv_invoice_counter;
		}
		$this->fv_error_message = $this->fv_error_message .'<br>- Contador de Factura '.ERROR_NULL;
		return  $this->fv_invoice_counter=null;
    }

    /**
     * Gets the value of fv_account_id.
     *
     * @return mixed
     */
    public function getAccount_id()
    {
        return $this->fv_account_id;
    }

    /**
     * Sets the value of fv_account_id.
     *
     * @param mixed $fv_account_id the fv_account_id
     *
     * @return self
     */
    public function setAccountId($account_id)
	{
		if(!empty($account_id))
		{
			if(!is_numeric($account_id))
			{
				$this->fv_error_message = $this->fv_error_message . '<br>- Identificador Cuenta '.ERROR_DATO_NUMERICO;
				return  $this->fv_account_id=null;
			}
			$account_idExiste = Account::find($account_id)->first();
			if(!$account_idExiste)
			{
				$this->fv_error_message = $this->fv_error_message .'<br>- Identificador Cuenta '.ERROR_ID;
				return  $this->fv_account_id=null;	
			}
			return $this->fv_account_id = $account_id;

		}
		$this->fv_error_message = $this->fv_error_message .'<br>- Identificador Cuenta '.ERROR_NULL;
		return  $this->fv_account_id=null;
	}


    /**
     * Gets the value of fv_type_documents.
     *
     * @return mixed
     */
    public function getType_documents()
    {
        return $this->fv_type_documents_branch;
    }

    /**
     * Sets the value of fv_type_documents.
     *
     * @param mixed $fv_type_documents the fv_type_documents
     *
     * @return self
     */
    public function setType_documents($fv_type_documents_branch)
    {
    	if(!empty($fv_type_documents_branch))
		{
			if(!is_array($fv_type_documents_branch))
			{
				$this->fv_error_message = $this->fv_error_message .'<br>- Identificadores '.ERROR_ARRAY;	
				return  $this->fv_type_documents_branch=null;
			}
			foreach ($fv_type_documents_branch as $type_document) {
				# code...
                if(Auth::check())
                {
                    $type_documentExiste = TypeDocument::find($type_document)->where('account_id',$this->account_id)->first();
                }else{
                    $type_documentExiste = TypeDocument::find($type_document)->where('account_id',$this->getAccount_id())->first();
                }
				
				
                if(!$type_documentExiste)
				{
					$this->fv_error_message = $this->fv_error_message .'<br>- Identificador '.ERROR_ID;
					return  $this->fv_type_documents_branch=null;	
				}
			}
			return $this->fv_type_documents_branch =$fv_type_documents_branch;
		}
		$this->fv_error_message = $this->fv_error_message .'<br>- Identificadores '.ERROR_NULL;
		return  $this->fv_type_documents_branch=null;

      
    }
    
  //   public function setBranch_type_id($branch_type_id)
  //   {
  //   	if(!empty($branch_type_id))
		// {
		// 	if(!is_numeric($branch_type_id))
		// 	{
		// 		$this->fv_error_message = $this->fv_error_message . '<br>- Identificador Sucursal '.ERROR_DATO_NUMERICO;
		// 		return  $this->branch_type_id=null;
		// 	}
		// 	$branch_type_idExiste = BranchType::find($branch_type_id)->first();
		// 	if(!$branch_type_idExiste)
		// 	{
		// 		$this->fv_error_message = $this->fv_error_message .'<br>- Identificador Sucursal '.ERROR_ID;
		// 		return  $this->fv_branch_type_id=null;	
		// 	}
		// 	return $this->fv_branch_type_id = $branch_type_id;

		// }
		// $this->fv_error_message = $this->fv_error_message .'<br>- Identificador Sucursal '.ERROR_NULL;
		// return  $this->fv_branch_type_id=null;
  //   }

    public function getErrorMessage()
	{
		return $this->fv_error_message;
	}


  	//Control de logica en metodos
  	public function Guardar()
  	{
        if(!$this->id)
        {

        
      		if(empty($this->fv_error_message))
    		{

                $this->account_id = $this->account_id?$this->account->id:$this->fv_account_id;
                $this->name =$this->fv_name;

                $this->number_branch= $this->fv_number_branch;
                $this->address2 = $this->fv_address2;
                $this->address1 = $this->fv_address1;
                $this->work_phone = $this->fv_workphone;
                $this->city = $this->fv_city;
                $this->state = $this->fv_state;
                $this->deadline = $this->fv_deadline;
                $this->key_dosage = $this->fv_key_dossage;
                $this->economic_activity = $this->fv_economic_activity;
                $this->number_process = $this->fv_number_process;
                $this->number_autho = $this->fv_nummber_autho;
               
                $this->law = $this->fv_law;
                $this->type_third = $this->getType_thrird();
                $this->invoice_number_counter = 1;
                $this->save();

                foreach ($this->fv_type_documents_branch as $documento) {
                 # code...
                 $tipo = new TypeDocumentBranch();
                 $tipo->branch_id = $this->id;
                 $tipo->type_document_id = $documento;
                 $tipo->save();
                }

        			$this->fv_error_message = "Registro Existoso";
        			return true;
        	}
        }
        $this->fv_error_message = $this->fv_error_message . ' Sucursal '.ERROR_DUPLICADO .'<br>' ;
		return false;
  	}	
    public function Actualizar()
    {
        if($this->id)
        {

        
            if(empty($this->fv_error_message))
            {

                $facturas = Invoice::where('branch_id',$this->id)->where('account_id',$this->account_id)->first();

                //si no tienen facturas seguir
                if(!$facturas)
                {
                    $usuarios = UserBranch::getUsersBranch($this->id,$this->account_id);

                    // si no tiene usuarios asignados y no tiene facturas puede hacer los cambios --esto es para de baja necesito descansar XD 
                    // if(!$usuarios)
                    // {
                        $this->account_id = $this->account_id?$this->account->id:$this->fv_account_id;
                        $this->name =$this->fv_name;

                        $this->number_branch= $this->fv_number_branch;
                        $this->address2 = $this->fv_address2;
                        $this->address1 = $this->fv_address1;
                        $this->work_phone = $this->fv_workphone;
                        $this->city = $this->fv_city;
                        $this->state = $this->fv_state;
                        $this->deadline = $this->fv_deadline;
                        $this->key_dosage = $this->fv_key_dossage;
                        $this->economic_activity = $this->fv_economic_activity;
                        $this->number_process = $this->fv_number_process;
                        $this->number_autho = $this->fv_nummber_autho;
                       
                        $this->law = $this->fv_law;
                        $this->type_third = $this->getType_thrird();
                        $this->invoice_number_counter = 1;
                        $this->save();

                        //verificar los nuevos asignados
                        //aplicando algorimo de asignacion

                        foreach (TypeDocumentBranch::where('branch_id',$this->id)->get() as $type_document_branch) {
                            # code...
                            $type_document_branch->delete();
                        }
                                                  
                        foreach ($this->fv_type_documents_branch as $type_document_nuevos) 
                        {
                            # code...
                            //TODO: acabar esta parte de la consulta me falta la asignacion  XD ...... :()
                            $existeAsignado = TypeDocumentBranch::withTrashed()->where('branch_id',$this->id)
                                                                                ->where('type_document_id',$type_document_nuevos)->first();
                         
                            if($existeAsignado)
                            {
                                $existeAsignado->restore();
                            }
                            else
                            {

                                $tipo = new TypeDocumentBranch();
                                $tipo->branch_id = $this->id;
                                $tipo->type_document_id = $type_document_nuevos;
                                $tipo->save();    
                        
                            }
                        }
                       

                        $this->fv_error_message = "Registro Actualizado";
                        return true;

                    // }
                    
                    // $this->fv_error_message = $this->fv_error_message . ' debe reasignar a los usuarios de esta sucursal <br>';
                    // return false;
                }

                //si tiene facturas hay que verificar la  fecha actual sea mayor a la fecha limite
               
           
                $this->name =$this->fv_name;
             
                $this->address2 = $this->fv_address2;
                $this->address1 = $this->fv_address1;
                $this->work_phone = $this->fv_workphone;
                $this->city = $this->fv_city;
                $this->state = $this->fv_state;

                $fecha_actual = new Date("now");
                $fecha_limite = new Date($this->deadline);
                if($fecha_actual >$fecha_limite)
                {
                   

                    $this->number_branch= $this->fv_number_branch;
                    //docificaciones y numero de invoicce nada masXD
                    $this->deadline = $this->fv_deadline;
                    $this->key_dosage = $this->fv_key_dossage;
                    $this->economic_activity = $this->fv_economic_activity;
                    $this->number_process = $this->fv_number_process;
                    $this->number_autho = $this->fv_nummber_autho;
                    $this->law = $this->fv_law;
                    $this->type_third = $this->getType_thrird();
                    //colocamos la sucursal en 1 de nuevo 
                    $this->invoice_number_counter = 1;
                }              
                
                $this->save();
                //modificacion  
                foreach (TypeDocumentBranch::where('branch_id',$this->id) as $type_document_branch) {
                            # code...
                            $type_document_branch->delete();
                        }
                                                  
                                foreach ($this->fv_type_documents_branch as $type_document_nuevos) 
                                {
                                    # code...
                                    //TODO: acabar esta parte de la consulta me falta la asignacion  XD ...... :()
                                    $existeAsignado = TypeDocumentBranch::withTrashed()->where('branch_id',$this->id)
                                                                                       ->where('account_id',$this->account_id)->first();
                                 
                                    if($existeAsignado)
                                    {
                                        $existeAsignado->restore();
                                    }
                                    else
                                    {

                                        $tipo = new TypeDocumentBranch();
                                        $tipo->branch_id = $this->id;
                                        $tipo->type_document_id = $type_document_nuevos;
                                        $tipo->save();    
                                
                                    }
                                }

                    $this->fv_error_message = "Registro Actualizado";
                    return true;
            }
        }
        $this->fv_error_message = $this->fv_error_message . ' Sucursal '.ERROR_NULL .'<br>' ;
        return false;
    }   

    //atributo especial para el counter del invoice number
    public static function getInvoiceNumber()
    {
        $sucursal = Branch::find(Session::get('branch_id'));
        $numeroFacturado = $sucursal->invoice_number_counter;
        $sucursal->invoice_number_counter=  $sucursal->invoice_number_counter+1;
        $sucursal->save();
        return $numeroFacturado;
    }

    //para el dashboard

    

}