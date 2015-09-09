<?php

class Invoice extends EntityModel
{
	public static $fieldCodClient = 'Código de cliente';
	public static $fieldProduct = 'Descripción';
	public static $fieldAmount = 'Monto a facturar';
	public static $fieldClientNote = 'Nota para el cliente';


	//INVOICE MODELS
/**
     * @var integer
     */
    private $fv_id;

    /**
     * @var integer
     */
    private $fv_frequencyId;

    /**
     * @var \DateTime
     */
    private $fv_createdAt;

    /**
     * @var \DateTime
     */
    private $fv_updatedAt;

    /**
     * @var \DateTime
     */
    private $fv_deletedAt;

    /**
     * @var string
     */
    private $fv_invoiceNumber;

    /**
     * @var \DateTime
     */
    private $fv_invoiceDate;

    /**
     * @var \DateTime
     */
    private $fv_dueDate;

    /**
     * @var float
     */
    private $fv_discount;

    /**
     * @var string
     */
    private $fv_poNumber;

    /**
     * @var string
     */
    private $fv_terms;

    /**
     * @var string
     */
    private $fv_publicNotes;

    /**
     * @var boolean
     */
    private $fv_isRecurring;

    /**
     * @var \DateTime
     */
    private $fv_startDate;

    /**
     * @var \DateTime
     */
    private $fv_endDate;

    /**
     * @var \DateTime
     */
    private $fv_lastSentDate;

    /**
     * @var string
     */
    private $fv_accountName;

    /**
     * @var string
     */
    private $fv_accountNit;

    /**
     * @var string
     */
    private $fv_accountUniper;

    /**
     * @var string
     */
    private $fv_branchName;

    /**
     * @var string
     */
    private $fv_address1;

    /**
     * @var string
     */
    private $fv_address2;

    /**
     * @var string
     */
    private $fv_phone;

    /**
     * @var string
     */
    private $fv_city;

    /**
     * @var string
     */
    private $fv_state;

    /**
     * @var string
     */
    private $fv_numberAutho;

    /**
     * @var \DateTime
     */
    private $fv_deadline;

    /**
     * @var string
     */
    private $fv_keyDosage;

    /**
     * @var boolean
     */
    private $fv_typeThird;

    /**
     * @var string
     */
    private $fv_clientNit;

    /**
     * @var string
     */
    private $fv_clientName;

    /**
     * @var string
     */
    private $fv_economicActivity;

    /**
     * @var string
     */
    private $fv_law;

    /**
     * @var string
     */
    private $fv_controlCode;

    /**
     * @var string
     */
    private $fv_qr;

    /**
     * @var string
     */
    private $fv_subtotal;

    /**
     * @var string
     */
    private $fv_amount;

    /**
     * @var string
     */
    private $fv_balance;

    /**
     * @var string
     */
    private $fv_fiscal;

    /**
     * @var string
     */
    private $fv_ice;

    /**
     * @var boolean
     */
    private $fv_isQuote;

    /**
     * @var string
     */
    private $fv_logo;

    /**
     * @var string
     */
    private $fv_javascript;

    /**
     * @var integer
     */
    private $fv_quoteId;

    /**
     * @var integer
     */
    private $fv_quoteInvoiceId;

    /**
     * @var integer
     */
    private $fv_publicId;

    /**
     * @var Accounts
     */
    private $fv_account;

    /**
     * @var Branches
     */
    private $fv_branch;

    /**
     * @var BranchTypes
     */
    private $fv_branchType;

    /**
     * @var Clients
     */
    private $fv_client;

    /**
     * @var InvoiceStatuses
     */
    private $fv_invoiceStatus;

    /**
     * @var Invoices
     */
    private $fv_recurringInvoice;

    /**
     * @var Users
     */
    private $fv_user;


	//INVOICE MODELS END

	public function account()
	{
		return $this->belongsTo('Account');
	}
	
	public function branch()
	{
		return $this->belongsTo('Branch');
	}

	public function user()
	{
		return $this->belongsTo('User');
	}	

	public function client()
	{
		return $this->belongsTo('Client');
	}

	public function invoice_items()
	{
		return $this->hasMany('InvoiceItem');
	}

	public function invoice_status()
	{
		return $this->belongsTo('InvoiceStatus');
	}

	public function invoice_design()
	{
		return $this->belongsTo('InvoiceDesign');
	}

	public function invitations()
	{
		return $this->hasMany('Invitation');
	}

	public function getName()
	{
		return $this->invoice_number;
	}

	public function getLink()
	{
		return link_to('invoices/' . $this->public_id, $this->invoice_number);
	}

	public function getEntityType()
	{
		return $this->is_quote ? ENTITY_QUOTE : ENTITY_INVOICE;
	}	
	
	public function isSent()
	{
		return $this->invoice_status_id >= INVOICE_STATUS_SENT;
	}

	public function isViewed()
	{
		return $this->invoice_status_id >= INVOICE_STATUS_VIEWED;	
	}	

	public function isPaid()
	{
		return $this->invoice_status_id >= INVOICE_STATUS_PAID;	
	}	

	public function hidePrivateFields()
	{
		$this->setVisible([
			'invoice_number', 
			'account_name',
			'account_name',
			'account_nit',
			'branch_name',
			'address1',
			'address2',
			'phone',
			'city',
			'state',
			'number_autho',
			'deadline',
			'key_dosage',
			'client_nit',
			'client_name',
			'activity_pri',
			'activity_sec1',
			'activity_sec2',
			'law',
			'title',
			'subtitle',
			'control_code',
			'qr',
			'discount', 
			'po_number', 
			'invoice_date', 
			'due_date', 
			'terms', 
			'public_notes', 
			'amount', 
			'balance', 
			'invoice_items', 
			'client', 
			'tax_name', 
			'tax_rate', 
			'account', 
			'invoice_design',
			'invoice_design_id',
			'is_pro',
			'is_quote',
			'custom_value1',
			'custom_value2',
			'custom_taxes1',
			'custom_taxes2']);
		
		$this->client->setVisible([
			'name',
            'vat_number',
			'address1', 
			'address2', 
			'city', 
			'state', 
			'postal_code', 
			'work_phone', 
			'payment_terms', 
			'contacts', 
			'country', 
			'currency_id',
			'custom_value1',
			'custom_value2']);

		$this->account->setVisible([
			'name',
            'vat_number',
			'address1', 
			'address2', 
			'city', 
			'state', 
			'postal_code', 
			'work_phone', 
			'work_email', 
			'country', 
			'currency_id',
			'custom_label1',
			'custom_value1',
			'custom_label2',
			'custom_value2_label1',
			'custom_clien',
			'custom_clientt_label2',
			'primary_color',
			'secondary_color',
			'hide_quantity',
			'hide_paid_to_date',
			'custom_invoice_label1',
			'custom_invoice_label2']);		

		foreach ($this->invoice_items as $invoiceItem) 
		{
			$invoiceItem->setVisible([
				'product_key', 
				'notes', 
				'cost', 
				'qty', 
				'tax_name', 
				'tax_rate']);
		}

		foreach ($this->client->contacts as $contact) 
		{
			$contact->setVisible([
				'first_name', 
				'last_name', 
				'email', 
				'phone']);
		}						

		return $this;
	}

	public function shouldSendToday()
	{
		if (!$this->start_date || strtotime($this->start_date) > strtotime('now'))
		{
			return false;
		}

		if ($this->end_date && strtotime($this->end_date) < strtotime('now'))
		{
			return false;
		}

		$dayOfWeekToday = date('w');
		$dayOfWeekStart = date('w', strtotime($this->start_date));

		$dayOfMonthToday = date('j');
		$dayOfMonthStart = date('j', strtotime($this->start_date));
		
		if (!$this->last_sent_date) 
		{
			return true;
		} 
		else 
		{	
			$date1 = new DateTime($this->last_sent_date);
			$date2 = new DateTime();
			$diff = $date2->diff($date1);
			$daysSinceLastSent = $diff->format("%a");
			$monthsSinceLastSent = ($diff->format('%y') * 12) + $diff->format('%m');

			if ($daysSinceLastSent == 0) 
			{
				return false;
			}
		}

		switch ($this->frequency_id)
		{
			case FREQUENCY_WEEKLY:
				return $daysSinceLastSent >= 7;
			case FREQUENCY_TWO_WEEKS:
				return $daysSinceLastSent >= 14;
			case FREQUENCY_FOUR_WEEKS:
				return $daysSinceLastSent >= 28;
			case FREQUENCY_MONTHLY:
				return $monthsSinceLastSent >= 1;
			case FREQUENCY_THREE_MONTHS:
				return $monthsSinceLastSent >= 3;
			case FREQUENCY_SIX_MONTHS:
				return $monthsSinceLastSent >= 6;
			case FREQUENCY_ANNUALLY:
				return $monthsSinceLastSent >= 12;
			default:
				return false;
		}

		return false;
	}

	/////GETTER AND SETTERS

	/*
	public function setfrequencyId($frequencyId)
	{
	    if(is_null($frequencyId))
		{			
			$this->fv_frequencyId = "frequencyId ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_frequencyId=null;
		$this->o=$frequencyId;
	    return $this;
	}*/

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set frequencyId
     *
     * @param integer $frequencyId
     * @return Invoices
     */
    public function setFrequencyId($frequencyId)
    {
    	
        if(is_null($frequencyId))
		{			
			$this->fv_frequencyId = "frequencyId ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_frequencyId=null;
		$this->frequency_id=$frequencyId;
	    return $this;
    }

    /**
     * Get frequencyId
     *
     * @return integer 
     */
    public function getFrequencyId()
    {
        return $this->frequency_id;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Invoices
     */
    public function setCreatedAt($createdAt)
    {
        if(is_null($createdAt))
		{			
			$this->fv_createdAt = "createdAt ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_createdAt=null;
		$this->created_at=$createdAt;
	    return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Invoices
     */
    public function setUpdatedAt($updatedAt)
    {
        if(is_null($updatedAt))
		{			
			$this->fv_updatedAt = "updatedAt ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_updatedAt=null;
		$this->updated_at=$updatedAt;
	    return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set deletedAt
     *
     * @param \DateTime $deletedAt
     * @return Invoices
     */
    public function setDeletedAt($deletedAt)
    {
        if(is_null($deletedAt))
		{			
			$this->fv_deletedAt = "deletedAt ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_deletedAt=null;
		$this->deleted_at=$deletedAt;
	    return $this;
    }

    /**
     * Get deletedAt
     *
     * @return \DateTime 
     */
    public function getDeletedAt()
    {
        return $this->deleted_at;
    }

    /**
     * Set invoiceNumber
     *
     * @param string $invoiceNumber
     * @return Invoices
     */
    public function setInvoiceNumber($invoiceNumber)
    {
        if(is_null($invoiceNumber))
		{			
			$this->fv_invoiceNumber = "invoiceNumber ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_invoiceNumber=null;
		$this->invoice_number=$invoiceNumber;
	    return $this;
    }

    /**
     * Get invoiceNumber
     *
     * @return string 
     */
    public function getInvoiceNumber()
    {
        return $this->invoice_number;
    }

    /**
     * Set invoiceDate
     *
     * @param \DateTime $invoiceDate
     * @return Invoices
     */
    public function setInvoiceDate($invoiceDate)
    {
        if(is_null($invoiceDate))
		{			
			$this->fv_invoiceDate = "invoiceDate ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_invoiceDate=null;
		$this->invoice_date=$invoiceDate;
	    return $this;
    }

    /**
     * Get invoiceDate
     *
     * @return \DateTime 
     */
    public function getInvoiceDate()
    {
        return $this->invoice_date;
    }

    /**
     * Set dueDate
     *
     * @param \DateTime $dueDate
     * @return Invoices
     */
    public function setDueDate($dueDate)
    {
        if(is_null($dueDate))
		{			
			$this->fv_dueDate = "dueDate ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_dueDate=null;
		$this->due_date=$dueDate;
	    return $this;
    }

    /**
     * Get dueDate
     *
     * @return \DateTime 
     */
    public function getDueDate()
    {
        return $this->due_date;
    }

    /**
     * Set discount
     *
     * @param float $discount
     * @return Invoices
     */
    public function setDiscount($discount)
    {
        if(is_null($discount))
		{			
			$this->fv_discount = "discount ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_discount=null;
		$this->discount=$discount;
	    return $this;
    }

    /**
     * Get discount
     *
     * @return float 
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * Set poNumber
     *
     * @param string $poNumber
     * @return Invoices
     */
    public function setPoNumber($poNumber)
    {
        if(is_null($poNumber))
		{			
			$this->fv_poNumber = "poNumber ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_poNumber=null;
		$this->po_number=$poNumber;
	    return $this;;
    }

    /**
     * Get poNumber
     *
     * @return string 
     */
    public function getPoNumber()
    {
        return $this->po_number;
    }

    /**
     * Set terms
     *
     * @param string $terms
     * @return Invoices
     */
    public function setTerms($terms)
    {
        if(is_null($terms))
		{			
			$this->fv_terms = "terms ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_terms=null;
		$this->terms=$terms;
	    return $this;
    }

    /**
     * Get terms
     *
     * @return string 
     */
    public function getTerms()
    {
        return $this->terms;
    }

    /**
     * Set publicNotes
     *
     * @param string $publicNotes
     * @return Invoices
     */
    public function setPublicNotes($publicNotes)
    {
        if(is_null($publicNotes))
		{			
			$this->fv_publicNotes = "publicNotes ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_publicNotes=null;
		$this->public_notes=$publicNotes;
	    return $this;
    }

    /**
     * Get publicNotes
     *
     * @return string 
     */
    public function getPublicNotes()
    {
        return $this->public_notes;
    }

    /**
     * Set isRecurring
     *
     * @param boolean $isRecurring
     * @return Invoices
     */
    public function setIsRecurring($isRecurring)
    {
        if(is_null($isRecurring))
		{			
			$this->fv_isRecurring = "isRecurring ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_isRecurring=null;
		$this->is_recurring=$isRecurring;
	    return $this;
    }

    /**
     * Get isRecurring
     *
     * @return boolean 
     */
    public function getIsRecurring()
    {
        return $this->is_recurring;
    }

    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     * @return Invoices
     */
    public function setStartDate($startDate)
    {
        if(is_null($startDate))
		{			
			$this->fv_startDate = "startDate ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_startDate=null;
		$this->start_date=$startDate;
	    return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime 
     */
    public function getStartDate()
    {
        return $this->start_date;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     * @return Invoices
     */
    public function setEndDate($endDate)
    {
        if(is_null($endDate))
		{			
			$this->fv_endDate = "endDate ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_endDate=null;
		$this->end_date=$endDate;
	    return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime 
     */
    public function getEndDate()
    {
        return $this->end_date;
    }

    /**
     * Set lastSentDate
     *
     * @param \DateTime $lastSentDate
     * @return Invoices
     */
    public function setLastSentDate($lastSentDate)
    {
        if(is_null($lastSentDate))
		{			
			$this->fv_lastSentDate = "lastSentDate ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_lastSentDate=null;
		$this->last_sent_date=$lastSentDate;
	    return $this;
    }

    /**
     * Get lastSentDate
     *
     * @return \DateTime 
     */
    public function getLastSentDate()
    {
        return $this->last_sent_date;
    }

    /**
     * Set accountName
     *
     * @param string $accountName
     * @return Invoices
     */
    public function setAccountName($accountName)
    {
        if(is_null($accountName))
		{			
			$this->fv_accountName = "accountName ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_accountName=null;
		$this->account_name=$accountName;
	    return $this;
    }

    /**
     * Get accountName
     *
     * @return string 
     */
    public function getAccountName()
    {
        return $this->account_name;
    }

    /**
     * Set accountNit
     *
     * @param string $accountNit
     * @return Invoices
     */
    public function setAccountNit($accountNit)
    {
        if(is_null($accountNit))
		{			
			$this->fv_accountNit = "accountNit ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_accountNit=null;
		$this->account_nit=$accountNit;
	    return $this;
    }

    /**
     * Get accountNit
     *
     * @return string 
     */
    public function getAccountNit()
    {
        return $this->account_nit;
    }

    /**
     * Set accountUniper
     *
     * @param string $accountUniper
     * @return Invoices
     */
    public function setAccountUniper($accountUniper)
    {
        if(is_null($accountUniper))
		{			
			$this->fv_accountUniper = "accountUniper ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_accountUniper=null;
		$this->account_uniper=$accountUniper;
	    return $this;
    }

    /**
     * Get accountUniper
     *
     * @return string 
     */
    public function getAccountUniper()
    {
        return $this->account_uniper;
    }

    /**
     * Set branchName
     *
     * @param string $branchName
     * @return Invoices
     */
    public function setBranchName($branchName)
    {
        if(is_null($branchName))
		{			
			$this->fv_branchName = "BranchName ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_branchName=null;
		$this->branch_name=$branchName;
	    return $this;
    }

    /**
     * Get branchName
     *
     * @return string 
     */
    public function getBranchName()
    {
        return $this->branch_name;
    }

    /**
     * Set address1
     *
     * @param string $address1
     * @return Invoices
     */
    public function setAddress1($address1)
    {
        if(is_null($address1))
		{			
			$this->fv_address1 = "address1 ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_address1=null;
		$this->address1=$address1;
	    return $this;
    }

    /**
     * Get address1
     *
     * @return string 
     */
    public function getAddress1()
    {
        return $this->address1;
    }

    /**
     * Set address2
     *
     * @param string $address2
     * @return Invoices
     */
    public function setAddress2($address2)
    {
        if(is_null($address2))
		{			
			$this->fv_address2 = "address2 ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_address2=null;
		$this->address2=$address2;
	    return $this;
    }

    /**
     * Get address2
     *
     * @return string 
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Invoices
     */
    public function setPhone($phone)
    {
        if(is_null($phone))
		{			
			$this->fv_phone = "phone ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_phone=null;
		$this->phone=$phone;
	    return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Invoices
     */
    public function setCity($city)
    {
        if(is_null($city))
		{			
			$this->fv_city = "city ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_city=null;
		$this->city=$city;
	    return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set state
     *
     * @param string $state
     * @return Invoices
     */
    public function setState($state)
    {
        if(is_null($state))
		{			
			$this->fv_state = "state ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_state=null;
		$this->state=$state;
	    return $this;
    }

    /**
     * Get state
     *
     * @return string 
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set numberAutho
     *
     * @param string $numberAutho
     * @return Invoices
     */
    public function setNumberAutho($numberAutho)
    {
        if(is_null($numberAutho))
		{			
			$this->fv_numberAutho = "numberAutho ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_numberAutho=null;
		$this->number_autho=$numberAutho;
	    return $this;
    }

    /**
     * Get numberAutho
     *
     * @return string 
     */
    public function getNumberAutho()
    {
        return $this->number_autho;
    }

    /**
     * Set deadline
     *
     * @param \DateTime $deadline
     * @return Invoices
     */
    public function setDeadline($deadline)
    {
        if(is_null($deadline))
		{			
			$this->fv_deadline = "deadline ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_deadline=null;
		$this->deadline=$deadline;
	    return $this;
    }

    /**
     * Get deadline
     *
     * @return \DateTime 
     */
    public function getDeadline()
    {
        return $this->deadline;
    }

    /**
     * Set keyDosage
     *
     * @param string $keyDosage
     * @return Invoices
     */
    public function setKeyDosage($keyDosage)
    {
        if(is_null($keyDosage))
		{			
			$this->fv_keyDosage = "keyDosage ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_keyDosage=null;
		$this->key_dosage=$keyDosage;
	    return $this;
    }

    /**
     * Get keyDosage
     *
     * @return string 
     */
    public function getKeyDosage()
    {
        return $this->key_dosage;
    }

    /**
     * Set typeThird
     *
     * @param boolean $typeThird
     * @return Invoices
     */
    public function setTypeThird($typeThird)
    {
        if(is_null($typeThird))
		{			
			$this->fv_typeThird = "typeThird ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_typeThird=null;
		$this->type_third=$typeThird;
	    return $this;
    }

    /**
     * Get typeThird
     *
     * @return boolean 
     */
    public function getTypeThird()
    {
        return $this->type_third;
    }

    /**
     * Set clientNit
     *
     * @param string $clientNit
     * @return Invoices
     */
    public function setClientNit($clientNit)
    {
        if(is_null($clientNit))
		{			
			$this->fv_clientNit = "clientNit ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_clientNit=null;
		$this->client_nit=$clientNit;
	    return $this;
    }

    /**
     * Get clientNit
     *
     * @return string 
     */
    public function getClientNit()
    {
        return $this->client_nit;
    }

    /**
     * Set clientName
     *
     * @param string $clientName
     * @return Invoices
     */
    public function setClientName($clientName)
    {
        if(is_null($clientName))
		{			
			$this->fv_clientName = "clientName ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_clientName=null;
		$this->client_name=$clientName;
	    return $this;
    }

    /**
     * Get clientName
     *
     * @return string 
     */
    public function getClientName()
    {
        return $this->client_name;
    }

    /**
     * Set economicActivity
     *
     * @param string $economicActivity
     * @return Invoices
     */
    public function setEconomicActivity($economicActivity)
    {
        if(is_null($economicActivity))
		{			
			$this->fv_economicActivity = "economicActivity ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_economicActivity=null;
		$this->economic_activity=$economicActivity;
	    return $this;
    }

    /**
     * Get economicActivity
     *
     * @return string 
     */
    public function getEconomicActivity()
    {
        return $this->economic_activity;
    }

    /**
     * Set law
     *
     * @param string $law
     * @return Invoices
     */
    public function setLaw($law)
    {
        if(is_null($law))
		{			
			$this->fv_law = "law ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_law=null;
		$this->law=$law;
	    return $this;
    }

    /**
     * Get law
     *
     * @return string 
     */
    public function getLaw()
    {
        return $this->law;
    }

    /**
     * Set controlCode
     *
     * @param string $controlCode
     * @return Invoices
     */
    public function setControlCode($controlCode)
    {
        if(is_null($controlCode))
		{			
			$this->fv_controlCode = "controlCode ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_controlCode=null;
		$this->control_code=$controlCode;
	    return $this;
    }

    /**
     * Get controlCode
     *
     * @return string 
     */
    public function getControlCode()
    {
        return $this->control_code;
    }

    /**
     * Set qr
     *
     * @param string $qr
     * @return Invoices
     */
    public function setQr($qr)
    {
        if(is_null($qr))
		{			
			$this->fv_qr = "qr ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_qr=null;
		$this->qr=$qr;
	    return $this;
    }

    /**
     * Get qr
     *
     * @return string 
     */
    public function getQr()
    {
        return $this->qr;
    }

    /**
     * Set subtotal
     *
     * @param string $subtotal
     * @return Invoices
     */
    public function setSubtotal($subtotal)
    {
        if(is_null($subtotal))
		{			
			$this->fv_subtotal = "subtotal ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_subtotal=null;
		$this->subtotal=$subtotal;
	    return $this;
    }

    /**
     * Get subtotal
     *
     * @return string 
     */
    public function getSubtotal()
    {
        return $this->subtotal;
    }

    /**
     * Set amount
     *
     * @param string $amount
     * @return Invoices
     */
    public function setAmount($amount)
    {
        if(is_null($amount))
		{			
			$this->fv_amount = "amount ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_amount=null;
		$this->importe_neto=$amount;
	    return $this;
    }

    /**
     * Get importe_total
     *
     * @return string 
     */
    public function getImporteTotal()
    {
        return $this->importe_total;
    }

    public function setImporteTotal($importeTotal)
    {
        if(is_null($importeTotal))
        {           
            $this->fv_importeTotal = "importeTotal ".ERROR_NULL."<br>";
            return; 
        }
        $this->fv_importeTotal=null;
        $this->importe_total=$importeTotal;
        return $this;
    }

    /**
     * Get amount
     *
     * @return string 
     */
    public function getAmount()
    {
        return $this->importe_neto;
    }
    /**
     * Set balance
     *
     * @param string $balance
     * @return Invoices
     */
    public function setBalance($balance)
    {
        if(is_null($balance))
		{			
			$this->fv_balance = "balance ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_balance=null;
		$this->balance=$balance;
	    return $this;
    }

    /**
     * Get balance
     *
     * @return string 
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * Set fiscal
     *
     * @param string $fiscal
     * @return Invoices
     */
    public function setFiscal($fiscal)
    {
        if(is_null($fiscal))
		{			
			$this->fv_fiscal = "fiscal ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_fiscal=null;
		$this->fiscal=$fiscal;
	    return $this;
    }

    /**
     * Get fiscal
     *
     * @return string 
     */
    public function getFiscal()
    {
        return $this->fiscal;
    }

    /**
     * Set ice
     *
     * @param string $ice
     * @return Invoices
     */
    public function setIce($ice)
    {
        if(is_null($ice))
		{			
			$this->fv_ice = "ice ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_ice=null;
		$this->ice=$ice;
	    return $this;
    }

    /**
     * Get ice
     *
     * @return string 
     */
    public function getIce()
    {
        return $this->ice;
    }

    /**
     * Set isQuote
     *
     * @param boolean $isQuote
     * @return Invoices
     */
    public function setIsQuote($isQuote)
    {
        if(is_null($isQuote))
		{			
			$this->fv_isQuote = "isQuote ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_isQuote=null;
		$this->is_quote=$isQuote;
	    return $this;
    }

    /**
     * Get isQuote
     *
     * @return boolean 
     */
    public function getIsQuote()
    {
        return $this->is_quote;
    }

    /**
     * Set logo
     *
     * @param string $logo
     * @return Invoices
     */
    public function setLogo($logo)
    {
        if(is_null($logo))
		{			
			$this->fv_logo = "logo ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_logo=null;
		$this->logo=$logo;
	    return $this;
    }

    /**
     * Get logo
     *
     * @return string 
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set javascript
     *
     * @param string $javascript
     * @return Invoices
     */
    public function setJavascript($javascript)
    {
        if(is_null($javascript))
		{			
			$this->fv_javascript = "javascript ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_javascript=null;
		$this->javascript=$javascript;
	    return $this;
    }

    /**
     * Get javascript
     *
     * @return string 
     */
    public function getJavascript()
    {
        return $this->javascript;
    }

    /**
     * Set quoteId
     *
     * @param integer $quoteId
     * @return Invoices
     */
    public function setQuoteId($quoteId)
    {
        if(is_null($quoteId))
		{			
			$this->fv_quoteId = "quoteId ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_quoteId=null;
		$this->quote_id=$quoteId;
	    return $this;
    }

    /**
     * Get quoteId
     *
     * @return integer 
     */
    public function getQuoteId()
    {
        return $this->quote_id;
    }

    /**
     * Set quoteInvoiceId
     *
     * @param integer $quoteInvoiceId
     * @return Invoices
     */
    public function setQuoteInvoiceId($quoteInvoiceId)
    {
        if(is_null($quoteInvoiceId))
		{			
			$this->fv_quoteInvoiceId = "quoteInvoiceId ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_quoteInvoiceId=null;
		$this->quote_invoice_id=$quoteInvoiceId;
	    return $this;
    }

    /**
     * Get quoteInvoiceId
     *
     * @return integer 
     */
    public function getQuoteInvoiceId()
    {
        return $this->quote_invoice_id;
    }

    /**
     * Set publicId
     *
     * @param integer $publicId
     * @return Invoices
     */
    public function setPublicId($publicId)
    {
        if(is_null($publicId))
		{			
			$this->fv_publicId = "publicId ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_publicId=null;
		$this->public_id=$publicId;
	    return $this;
    }

    /**
     * Get publicId
     *
     * @return integer 
     */
    public function getPublicId()
    {
        return $this->public_id;
    }

    /**
     * Set account
     *
     * @param $account
     * @return Invoices
     */
    public function setAccount($account)
    {
        if(is_null($account))
		{			
			$this->fv_account = "account ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_account=null;
		$this->account=$account;
	    return $this;
    }

    /**
     * Get account
     *
     * @return \FacturaBundle\Entity\Accounts 
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * Set branch
     *
     * @param $branch
     * @return Invoices
     */
    public function setBranch($branch)
    {
        if(is_null($branch))
		{			
			$this->fv_branch = "branch ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_branch=null;
		$this->branch_id=$branch;
	    return $this;
    }

    /**
     * Get branch
     *
     * @return \FacturaBundle\Entity\Branches 
     */
    public function getBranch()
    {
        return $this->branch_id;
    }

    /**
     * Set branchType
     *
     * @param $branchType
     * @return Invoices
     */
    public function setBranchType($branchType)
    {
       if(is_null($branchType))
		{			
			$this->fv_branchType = "branchType ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_branchType=null;
		$this->branch_type=$branchType;
	    return $this;
    }

    /**
     * Get branchType
     *
     * @return BranchTypes 
     */
    public function getBranchType()
    {
        return $this->branch_type;
    }

    /**
     * Set client
     *
     * @param Clients $client
     * @return Invoices
     */
    public function setClient($client)
    {
        if(is_null($client))
		{			
			$this->fv_client = "client ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_client=null;
		$this->client_id=$client;
	    return $this;
    }

    /**
     * Get client
     *
     * @return \FacturaBundle\Entity\Clients 
     */
    public function getClient()
    {
        return $this->client_id;
    }

    /**
     * Set invoiceStatus
     *
     * @param InvoiceStatuses $invoiceStatus
     * @return Invoices
     */
    public function setInvoiceStatus($invoiceStatus)
    {
        if(is_null($invoiceStatus))
		{			
			$this->fv_invoiceStatus = "invoiceStatus ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_invoiceStatus=null;
		$this->invoice_status_id=$invoiceStatus;
	    return $this;
    }

    /**
     * Get invoiceStatus
     *
     * @return InvoiceStatuses 
     */
    public function getInvoiceStatus()
    {
        $status = InvoiceStatus::find($this->invoice_status_id);
        return $status->name;
    }

    /**
     * Set recurringInvoice
     *
     * @param Invoices $recurringInvoice
     * @return Invoices
     */
    public function setRecurringInvoice($recurringInvoice)
    {
       if(is_null($recurringInvoice))
		{			
			$this->fv_recurringInvoice = "recurringInvoice ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_recurringInvoice=null;
		$this->recurring_invoice=$recurringInvoice;
	    return $this;;
    }

    /**
     * Get recurringInvoice
     *
     * @return Invoices 
     */
    public function getRecurringInvoice()
    {
        return $this->recurring_invoice;
    }

    /**
     * Set user
     *
     * @param Users $user
     * @return Invoices
     */
    public function setUser($user)
    {
        if(is_null($user))
		{			
			$this->fv_user = "user ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_user=null;
		$this->user_id=$user;
	    return $this;
    }

    /**
     * Get user
     *
     * @return Users 
     */
    public function getUser()
    {
        return $this->user;
    }

///FIN GETTERS AND SETTERS

     public function validate(){
		//echo $this->fv_user_id;

		$error_messge = "";

        if($this->fv_accountId){
            $error_messge = $error_messge.$this->fv_accountId;
        }
        if($this->fv_branchId){
            $error_messge = $error_messge.$this->fv_branchId;
        }
        if($this->fv_branchType){
            $error_messge = $error_messge.$this->fv_branchType;
        }
        if($this->fv_clientId){
            $error_messge = $error_messge.$this->fv_clientId;
        }
        if($this->fv_userId){
            $error_messge = $error_messge.$this->fv_userId;
        }
        if($this->fv_invoiceStatus){
            $error_messge = $error_messge.$this->fv_invoiceStatus;
        }
        if($this->fv_frequencyId){
            $error_messge = $error_messge.$this->fv_frequencyId;
        }
        if($this->fv_recurringInvoice){
            $error_messge = $error_messge.$this->fv_recurringInvoice;
        }
        if($this->fv_createdAt){
            $error_messge = $error_messge.$this->fv_createdAt;
        }
        if($this->fv_updatedAt){
            $error_messge = $error_messge.$this->fv_updatedAt;
        }
        if($this->fv_deletedAt){
            $error_messge = $error_messge.$this->fv_deletedAt;
        }
        if($this->fv_invoiceNumber){
            $error_messge = $error_messge.$this->fv_invoiceNumber;
        }
        if($this->fv_invoiceDate){
            $error_messge = $error_messge.$this->fv_invoiceDate;
        }
        if($this->fv_discount){
            $error_messge = $error_messge.$this->fv_discount;
        }
        if($this->fv_poNumber){
            $error_messge = $error_messge.$this->fv_poNumber;
        }
        if($this->fv_terms){
            $error_messge = $error_messge.$this->fv_terms;
        }
        if($this->fv_publicNotes){
            $error_messge = $error_messge.$this->fv_publicNotes;
        }
        if($this->fv_isRecurring){
            $error_messge = $error_messge.$this->fv_isRecurring;
        }
        if($this->fv_startDate){
            $error_messge = $error_messge.$this->fv_startDate;
        }
        if($this->fv_endDate){
            $error_messge = $error_messge.$this->fv_endDate;
        }
        if($this->fv_lastSentDate){
            $error_messge = $error_messge.$this->fv_lastSentDate;
        }
        if($this->fv_accountName){
            $error_messge = $error_messge.$this->fv_accountName;
        }
        if($this->fv_accountNit){
            $error_messge = $error_messge.$this->fv_accountNit;
        }
        if($this->fv_accountUniper){
            $error_messge = $error_messge.$this->fv_accountUniper;
        }
        if($this->fv_branchName){
            $error_messge = $error_messge.$this->fv_branchName;
        }
        if($this->fv_address1){
            $error_messge = $error_messge.$this->fv_address1;
        }
        if($this->fv_address2){
            $error_messge = $error_messge.$this->fv_address2;
        }
        if($this->fv_phone){
            $error_messge = $error_messge.$this->fv_phone;
        }
        if($this->fv_city){
            $error_messge = $error_messge.$this->fv_city;
        }
        if($this->fv_state){
            $error_messge = $error_messge.$this->fv_state;
        }
        if($this->fv_numberAutho){
            $error_messge = $error_messge.$this->fv_numberAutho;
        }
        if($this->fv_deadline){
            $error_messge = $error_messge.$this->fv_deadline;
        }
        if($this->fv_keyDosage){
            $error_messge = $error_messge.$this->fv_keyDosage;
        }
        if($this->fv_typeThird){
            $error_messge = $error_messge.$this->fv_typeThird;
        }
        if($this->fv_clientNit){
            $error_messge = $error_messge.$this->fv_clientNit;
        }
        if($this->fv_clientName){
            $error_messge = $error_messge.$this->fv_clientName;
        }
        if($this->fv_economicActivity){
            $error_messge = $error_messge.$this->fv_economicActivity;
        }
        if($this->fv_law){
            $error_messge = $error_messge.$this->fv_law;
        }
        if($this->fv_controlCode){
            $error_messge = $error_messge.$this->fv_controlCode;
        }
        if($this->fv_qr){
            $error_messge = $error_messge.$this->fv_qr;
        }
        if($this->fv_subtotal){
            $error_messge = $error_messge.$this->fv_subtotal;
        }
        if($this->fv_amount){
            $error_messge = $error_messge.$this->fv_amount;
        }
        if($this->fv_balance){
            $error_messge = $error_messge.$this->fv_balance;
        }
        if($this->fv_fiscal){
            $error_messge = $error_messge.$this->fv_fiscal;
        }
        if($this->fv_ice){
            $error_messge = $error_messge.$this->fv_ice;
        }
        if($this->fv_isQuote){
            $error_messge = $error_messge.$this->fv_isQuote;
        }
        if($this->fv_logo){
            $error_messge = $error_messge.$this->fv_logo;
        }
        if($this->fv_javascript){
            $error_messge = $error_messge.$this->fv_javascript;
        }
        if($this->fv_quoteId){
            $error_messge = $error_messge.$this->fv_quoteId;
        }
        if($this->fv_quoteInvoiceId){
            $error_messge = $error_messge.$this->fv_quoteInvoiceId;
        }
        if($this->fv_publicId){
            $error_messge = $error_messge.$this->fv_publicId;
        }

        return $error_messge;
    }

    public function guardar(){
		$error = $this->validate();
		if(!$error)
        {
            //estoy colocando el invoice numero counter
           

            return false;
        }
		else
        {
            return $error;
        }
			
	}

}

// Invoice::created(function($invoice)
// {
	
//     if (!$invoice->is_recurring)
//     {
// 	// $invoice->branch->incrementCounterInvoice($invoice->is_quote);
// 	$invoice->account->decreaseCounterCredit($invoice->is_quote);

// 	}	
// 	Activity::createInvoice($invoice);
// 	BookSale::createBook($invoice);
// });

// Invoice::updating(function($invoice)
// {
// 	Activity::updateInvoice($invoice);
// });

// Invoice::deleting(function($invoice)
// {
// 	Activity::archiveInvoice($invoice);
// });