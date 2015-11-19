<?php

class Client extends EntityModel
{
	public static $fieldName = 'Nombre de Cliente';
	public static $fieldBusinessName = 'RazÃ³n Social';
	public static $fieldNit = 'NIT';
	public static $fieldAddress1 = 'Zona/Barrio';
	public static $fieldAddress2 = 'DirecciÃ³n';
	public static $fieldWorkPhone = 'TelÃ©fono';
	public static $fieldPrivateNotes = 'Antecedentes';
        
        //NUEVAS VARIABLES
        /**
     * @var integer
     */
    private $fv_id;

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
    private $fv_name;

    /**
     * @var string
     */
    private $fv_businessName;

    /**
     * @var string
     */
    private $fv_nit;

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
    private $fv_city;

    /**
     * @var string
     */
    private $fv_state;

    /**
     * @var string
     */
    private $fv_workPhone;

    /**
     * @var string
     */
    private $fv_privateNotes;

    /**
     * @var string
     */
    private $fv_balance;

    /**
     * @var string
     */
    private $fv_isDeleted;

    /**
     * @var string
     */
    private $fv_paidToDate;

    /**
     * @var \DateTime
     */
    private $fv_lastLogin;

    /**
     * @var string
     */
    private $fv_customValue1;

    /**
     * @var string
     */
    private $fv_customValue2;

    /**
     * @var string
     */
    private $fv_customValue3;

    /**
     * @var string
     */
    private $fv_customValue4;

    /**
     * @var string
     */
    private $fv_customValue5;

    /**
     * @var string
     */
    private $fv_customValue6;

    /**
     * @var string
     */
    private $fv_customValue7;

    /**
     * @var string
     */
    private $fv_customValue8;

    /**
     * @var string
     */
    private $fv_customValue9;

    /**
     * @var string
     */
    private $fv_customValue10;

    /**
     * @var string
     */
    private $fv_customValue11;

    /**
     * @var string
     */
    private $fv_customValue12;

    /**
     * @var integer
     */
    private $fv_publicId;

    /**
     * @var Accounts
     */
    private $fv_account;

    /**
     * @var Users
     */
    private $fv_user;

    
    
    ///FIN DE NUEVAS VARIABLES
        
	
	public function account()
	{
		return $this->belongsTo('Account');
	}
	
	public function invoices()
	{
		return $this->hasMany('Invoice');
	}

	public function payments()
	{
		return $this->hasMany('Payment');
	}

	public function contacts()
	{
		return $this->hasMany('Contact');
	}


    ///GETTERS AND SETTERS
        
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
     * Set createdAt
     *
     * @param DateTime $createdAt
     * @return Clients
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
     * @return Clients
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
     * @return Clients
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
     * Set name
     *
     * @param string $name
     * @return Clients
     */
    public function setName($name)
	{
	    if(is_null($name))
		{			
			$this->fv_name = "Nombre ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_name=null;
		$this->name=$name;
	    return $this;
	}


    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set businessName
     *
     * @param string $businessName
     * @return Clients
     */
    public function setBussinesName($businessName)
	{
	    if(is_null($businessName))
		{			
			$this->fv_businessName = "Razón Social ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_businessName=null;
		$this->business_name=$businessName;
	    return $this;
	}

    /**
     * Get businessName
     *
     * @return string 
     */
    public function getBusinessName()
    {
        return $this->business_name;
    }

    /**
     * Set nit
     *
     * @param string $nit
     * @return Clients
     */
    public function setNit($nit)
	{
	    if(is_null($nit))
		{						
			$this->fv_nit = "NIT ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_nit=null;
		$this->nit=$nit;
	    return $this;
	}

    /**
     * Get nit
     *
     * @return string 
     */
    public function getNit()
    {
        return $this->nit;
    }

    /**
     * Set address1
     *
     * @param string $address1
     * @return Clients
     */
    public function setAddress1($address1)
	{
	    if(is_null($address1))
		{			
			$this->fv_address1 = "Dirección ".ERROR_NULL."<br>";
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
     * @return Clients
     */
    public function SetAddress2($address2)
	{
	    if(is_null($address2))
		{			
			$this->fv_address2 = "Dirección2 ".ERROR_NULL."<br>";
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
     * Set city
     *
     * @param string $city
     * @return Clients
     */
    public function setCity($city)
	{
	    if(is_null($city))
		{			
			$this->fv_city = "Ciudad ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_city=null;
		$this->original=$city;
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
     * @return Clients
     */
    public function setState($state)
	{
	    if(is_null($state))
		{			
			$this->fv_state = "Pais ".ERROR_NULL."<br>";
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
     * Set workPhone
     *
     * @param string $workPhone
     * @return Clients
     */
    public function setWorkPhone($workPhone)
	{
	    if(is_null($workPhone))
		{			
			$this->fv_workPhone = "Teléfono ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_workPhone=null;
		$this->work_phone=$workPhone;
	    return $this;
	}

    /**
     * Get workPhone
     *
     * @return string 
     */
    public function getWorkPhone()
    {
        return $this->work_phone;
    }

    /**
     * Set privateNotes
     *
     * @param string $privateNotes
     * @return Clients
     */
    public function setPrivateNotes($privateNotes)
	{
	    if(is_null($privateNotes))
		{			
			$this->fv_privateNotes = "Notas ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_privateNotes=null;
		$this->private_notes=$privateNotes;
	    return $this;
	}

    /**
     * Get privateNotes
     *
     * @return string 
     */
    public function getPrivateNotes()
    {
        return $this->private_notes;
    }

    /**
     * Set balance
     *
     * @param string $balance
     * @return Clients
     */
    public function setBalance($balance)
	{
	    if(is_null($balance))
		{			
			$this->fv_balance = "Balance ".ERROR_NULL."<br>";
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
     * Set isDeleted
     *
     * @param string $isDeleted
     * @return Clients
     */
    public function setIsDeleted($isDeleted)
	{
	    if(is_null($isDeleted))
		{			
			$this->fv_isDeleted = "Eliminado ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_isDeleted=null;
		$this->is_deleted=$isDeleted;
	    return $this;
	}

    /**
     * Get isDeleted
     *
     * @return string 
     */
    public function getIsDeleted()
    {
        return $this->is_deleted;
    }

    /**
     * Set paidToDate
     *
     * @param string $paidToDate
     * @return Clients
     */
    public function setPaidToDate($paidToDate)
	{
	    if(is_null($paidToDate))
		{			
			$this->fv_paidToDate = "Campo personalizado ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_paidToDate=null;
		$this->paid_to_date=$paidToDate;
	    return $this;
	}

    /**
     * Get paidToDate
     *
     * @return string 
     */
    public function getPaidToDate()
    {
        return $this->paid_to_date;
    }

    /**
     * Set lastLogin
     *
     * @param \DateTime $lastLogin
     * @return Clients
     */
    public function setLastLogin($lastLogin)
	{
	    if(is_null($lastLogin))
		{			
			$this->fv_lastLogin = "Campo personalizado ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_lastLogin=null;
		$this->last_login=$lastLogin;
	    return $this;
	}

    /**
     * Get lastLogin
     *
     * @return \DateTime 
     */
    public function getLastLogin()
    {
        return $this->last_login;
    }

    /**
     * Set customValue1
     *
     * @param string $customValue1
     * @return Clients
     */    
    public function setCustomValue1($customValue1)
	{
	    if(is_null($customValue1))
		{			
			$this->fv_customValue1 = "Campo personalizado ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_customValue1=null;
		$this->custom_value1=$customValue1;
	    return $this;
	}

    /**
     * Get customValue1
     *
     * @return string 
     */
    public function getCustomValue1()
    {
        return $this->custom_value1;
    }

    /**
     * Set customValue2
     *
     * @param string $customValue2
     * @return Clients
     */
    public function setCustomValue2($customValue2)
	{
	    if(is_null($customValue2))
		{			
			$this->fv_customValue2 = "Campo personalizado ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_customValue2=null;
		$this->custom_value2=$customValue2;
	    return $this;
	}

    /**
     * Get customValue2
     *
     * @return string 
     */
    public function getCustomValue2()
    {
        return $this->custom_value2;
    }

    /**
     * Set customValue3
     *
     * @param string $customValue3
     * @return Clients
     */
    public function setCustomValue3($customValue3)
    {
        if(is_null($customValue3))
		{			
			$this->fv_customValue3 = "Campo personalizado ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_customValue3=null;
		$this->custom_value3=$customValue3;
	    return $this;
    }    

    /**
     * Get customValue3
     *
     * @return string 
     */
    public function getCustomValue3()
    {
        return $this->custom_value3;
    }

    /**
     * Set customValue4
     *
     * @param string $customValue4
     * @return Clients
     */
    public function setCustomValue4($customValue4)
    {
        if(is_null($customValue4))
		{			
			$this->fv_customValue4 = "Campo personalizado ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_customValue4=null;
		$this->custom_value4=$customValue4;
	    return $this;
    }

    /**
     * Get customValue4
     *
     * @return string 
     */
    public function getCustomValue4()
    {
        return $this->custom_value4;
    }

    /**
     * Set customValue5
     *
     * @param string $customValue5
     * @return Clients
     */
    public function setCustomValue5($customValue5)
    {
        if(is_null($customValue5))
		{			
			$this->fv_customValue5 = "Campo personalizado ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_customValue5=null;
		$this->custom_value5=$customValue5;
	    return $this;
    }

    /**
     * Get customValue5
     *
     * @return string 
     */
    public function getCustomValue5()
    {
        return $this->custom_value5;
    }

    /**
     * Set customValue6
     *
     * @param string $customValue6
     * @return Clients
     */
    public function setCustomValue6($customValue6)
    {
        if(is_null($customValue6))
		{			
			$this->fv_customValue6 = "Campo personalizado ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_customValue6=null;
		$this->custom_value6=$customValue6;
	    return $this;
    }

    /**
     * Get customValue6
     *
     * @return string 
     */
    public function getCustomValue6()
    {
        return $this->custom_value6;
    }

    /**
     * Set customValue7
     *
     * @param string $customValue7
     * @return Clients
     */
    public function setCustomValue7($customValue7)
    {
        if(is_null($customValue7))
		{			
			$this->fv_customValue7 = "Campo personalizado ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_customValue7=null;
		$this->custom_value7=$customValue7;
	    return $this;
    }

    /**
     * Get customValue7
     *
     * @return string 
     */
    public function getCustomValue7()
    {
        return $this->custom_value7;
    }

    /**
     * Set customValue8
     *
     * @param string $customValue8
     * @return Clients
     */
    public function setCustomValue8($customValue8)
    {
        if(is_null($customValue8))
		{			
			$this->fv_customValue8 = "Campo personalizado ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_customValue8=null;
		$this->custom_value8=$customValue8;
	    return $this;
    }

    /**
     * Get customValue8
     *
     * @return string 
     */
    public function getCustomValue8()
    {
        return $this->custom_value8;
    }

    /**
     * Set customValue9
     *
     * @param string $customValue9
     * @return Clients
     */
    public function setCustomValue9($customValue9)
    {
        if(is_null($customValue9))
		{			
			$this->fv_customValue9 = "Campo personalizado ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_customValue9=null;
		$this->custom_value9=$customValue9;
	    return $this;
    }

    /**
     * Get customValue9
     *
     * @return string 
     */
    public function getCustomValue9()
    {
        return $this->custom_value9;
    }

    /**
     * Set customValue10
     *
     * @param string $customValue10
     * @return Clients
     */
    public function setCustomValue10($customValue10)
    {
        if(is_null($customValue10))
		{			
			$this->fv_customValue10 = "Campo personalizado ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_customValue10=null;
		$this->custom_value10=$customValue10;
	    return $this;
    }

    /**
     * Get customValue10
     *
     * @return string 
     */
    public function getCustomValue10()
    {
        return $this->custom_value10;
    }

    /**
     * Set customValue11
     *
     * @param string $customValue11
     * @return Clients
     */
    public function setCustomValue11($customValue11)
    {
		if(is_null($customValue11))
		{			
			$this->fv_customValue11 = "Campo personalizado ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_customValue11=null;
		$this->custom_value11=$customValue11;
	    return $this;
    }

    /**
     * Get customValue11
     *
     * @return string 
     */
    public function getCustomValue11()
    {
        return $this->custom_value11;
    }

    /**
     * Set customValue12
     *
     * @param string $customValue12
     * @return Clients
     */
    public function setCustomValue12($customValue12)
    {
        if(is_null($customValue12))
		{			
			$this->fv_customValue12 = "Campo personalizado ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_customValue12=null;
		$this->custom_value12=$customValue12;
	    return $this;
    }

    /**
     * Get customValue12
     *
     * @return string 
     */
    public function getCustomValue12()
    {
        return $this->custom_value12;
    }

    /**
     * Set publicId
     *
     * @param integer $publicId
     * @return Clients
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
        return $this->publicId;
    }

    /**
     * Set account
     *
     * @param Accounts $account
     * @return Clients
     */
    public function setAccount($account)
    {
        if(is_null($account))
		{			
			$this->fv_account = "accountid ".ERROR_NULL."<br>";		
			return;	
		}
		$this->fv_account=null;
		$this->account_id=$datoenviado;

        return $this;
    }

    /**
     * Get account
     *
     * @return Accounts 
     */
    public function getAccount()
    {
        return $this->account_id;
    }

    /**
     * Set user
     *
     * @param Users $user
     * @return Clients
     */
  
    public function setUser($user)
    {

        if(is_null($user)) {               

            $this->fv_user = "UserId ".ERROR_NULL."<br>";
            return;
        }
        $this->user_id = $user;
        $this->fv_user = null;
    }

    /**
     * Get user
     *
     * @return Users 
     */
    public function getUser()
    {
        return $this->user_id;
    }


    public function validate(){
		//echo $this->fv_user_id;

		$error_messge = "";
        if($this->fv_account){
            $error_messge = $error_messge.$this->fv_account;
        }
        if($this->fv_user){
            $error_messge = $error_messge.$this->fv_user;
        }
        if($this->fv_reatedAt){
            $error_messge = $error_messge.$this->fv_createdAt;
        }
        if($this->fv_updatedAt){
            $error_messge = $error_messge.$this->fv_updatedAt;
        }
        if($this->fv_deletedAt){
            $error_messge = $error_messge.$this->fv_deletedAt;
        }
        if($this->fv_name){
            $error_messge = $error_messge.$this->fv_name;
        }
        if($this->fv_businessName){
            $error_messge = $error_messge.$this->fv_businessName;
        }
        if($this->fv_nit){
            $error_messge = $error_messge.$this->fv_nit;
        }
        if($this->fv_address1){
            $error_messge = $error_messge.$this->fv_address1;
        }
        if($this->fv_address2){
            $error_messge = $error_messge.$this->fv_address2;
        }
        if($this->fv_city){
            $error_messge = $error_messge.$this->fv_city;
        }
        if($this->fv_state){
            $error_messge = $error_messge.$this->fv_state;
        }
        if($this->fv_workPhone){
            $error_messge = $error_messge.$this->fv_workPhone;
        }
        if($this->fv_privateNotes){
            $error_messge = $error_messge.$this->fv_privateNotes;
        }
        if($this->fv_balance){
            $error_messge = $error_messge.$this->fv_balance;
        }
        if($this->fv_isDeleted){
            $error_messge = $error_messge.$this->fv_isDeleted;
        }
        if($this->fv_paidToDate){
            $error_messge = $error_messge.$this->fv_paidToDate;
        }
        if($this->fv_lastLogin){
            $error_messge = $error_messge.$this->fv_lastLogin;
        }
        if($this->fv_customValue1){
            $error_messge = $error_messge.$this->fv_customValue1;
        }
        if($this->fv_customValue2){
            $error_messge = $error_messge.$this->fv_customValue2;
        }
        if($this->fv_customValue3){
            $error_messge = $error_messge.$this->fv_customValue3;
        }
        if($this->fv_customValue4){
            $error_messge = $error_messge.$this->fv_customValue4;
        }
        if($this->fv_customValue5){
            $error_messge = $error_messge.$this->fv_customValue5;
        }
        if($this->fv_customValue6){
            $error_messge = $error_messge.$this->fv_customValue6;
        }
        if($this->fv_customValue7){
            $error_messge = $error_messge.$this->fv_customValue7;
        }
        if($this->fv_customValue8){
            $error_messge = $error_messge.$this->fv_customValue8;
        }
        if($this->fv_customValue9){
            $error_messge = $error_messge.$this->fv_customValue9;
        }
        if($this->fv_customValue10){
            $error_messge = $error_messge.$this->fv_customValue10;
        }
        if($this->fv_customValue11){
            $error_messge = $error_messge.$this->fv_customValue11;
        }
        if($this->fv_customValue12){
            $error_messge = $error_messge.$this->fv_customValue12;
        }
        if($this->fv_publicId){
            $error_messge = $error_messge.$this->fv_publicId;
        }
        return $error_messge;
	}
     
     public function guardar(){
		$error = $this->validate();
		echo $error;
		return $error==""?false:$error;
	}
}