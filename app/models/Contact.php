<?php

class Contact extends EntityModel
{
	public static $fieldFirstName = 'Contacto - Nombre(s)';
	public static $fieldLastName = 'Contacto - Apellidos';
	public static $fieldEmail = 'Contacto - Correo electrónico';
	public static $fieldPhone = 'Contacto - Celular';

	//GETTERS AND GETTERS
	/**
     * @var integer
     */
    private $fv_id;

    /**
     * @var integer
     */
    private $fv_accountId;

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
     * @var boolean
     */
    private $fv_isPrimary;

    /**
     * @var boolean
     */
    private $fv_sendInvoice;

    /**
     * @var string
     */
    private $fv_firstName;

    /**
     * @var string
     */
    private $fv_lastName;

    /**
     * @var string
     */
    private $fv_email;

    /**
     * @var string
     */
    private $fv_phone;

    /**
     * @var integer
     */
    private $fv_publicId;

    /**
     * @var \FacturaBundle\Entity\Clients
     */
    private $fv_client;

    /**
     * @var \FacturaBundle\Entity\Users
     */
    private $user;
	//END GETTERS AND SETTERS

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
     * Set accountId
     *
     * @param integer $accountId
     * @return Contacts
     */
    public function setAccountId($accountId)
    {
        if(is_null($accountId))
		{			
			$this->fv_accountId = "accountId ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_accountId=null;
		$this->account_id=$accountId;
	    return $this;
    }

    /**
     * Get accountId
     *
     * @return integer 
     */
    public function getAccountId()
    {
        return $this->account_id;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Contacts
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
     * @return Contacts
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
     * @return Contacts
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
     * Set isPrimary
     *
     * @param boolean $isPrimary
     * @return Contacts
     */
    public function setIsPrimary($isPrimary)
    {
        if(is_null($isPrimary))
		{			
			$this->fv_isPrimary = "isPrimary ".ERROR_NULL."<br>";
			return;	
		}
		if(!is_bool($isPrimary))
		{
			$this->fv_isPrimary = "isPrimary ".ERROR_DATO_BOOL."<br>";;
			return;
		}
		$this->fv_isPrimary=null;
		$this->is_primary=$isPrimary;
	    return $this;
    }

    /**
     * Get isPrimary
     *
     * @return boolean 
     */
    public function getIsPrimary()
    {
        return $this->is_primary;
    }

    /**
     * Set sendInvoice
     *
     * @param boolean $sendInvoice
     * @return Contacts
     */
    public function setSendInvoice($sendInvoice)
    {
        if(is_null($sendInvoice))
		{			
			$this->fv_sendInvoice = "sendInvoice ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_sendInvoice=null;
		$this->send_invoice=$sendInvoice;
	    return $this;
    }

    /**
     * Get sendInvoice
     *
     * @return boolean 
     */
    public function getSendInvoice()
    {
        return $this->send_invoice;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return Contacts
     */
    public function setFirstName($firstName)
    {
        if(is_null($firstName))
		{			
			$this->fv_firstName = "Nombre ".ERROR_NULL."<br>";
			return;	
		}
        if(preg_match('#[0-9]#',$firstName))
        {
            $this->fv_firstName = "Nombre ".ERROR_DATO_TEXTO."<br>";
            return;     
        }
		$this->fv_firstName=null;
		$this->first_name=$firstName;
	    return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return Contacts
     */
    public function setLastName($lastName)
    {
        if(is_null($lastName))
		{			
			$this->fv_lastName = "Apellido ".ERROR_NULL."<br>";
			return;	
		}
        if(preg_match('#[0-9]#',$lastName))
        {
            $this->fv_lastName = "Apellido ".ERROR_DATO_TEXTO."<br>";
            return;     
        }
		$this->fv_lastName=null;
		$this->last_name=$lastName;
	    return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Contacts
     */
    public function setEmail($email)
    {
        if(is_null($email))
		{			
			$this->fv_email = "email ".ERROR_NULL."<br>";
			return;	
		}

        if(!strpos($email,"@")  || !strpos($email,"."))
        {
            $this->fv_email = "email ".ERROR_DATO_EMAIL."<br>";
            return;     
        }

		$this->fv_email=null;
		$this->email=$email;
	    return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Contacts
     */
    public function setPhone($phone)
    {
        if(is_null($phone))
		{			
			$this->fv_phone = "Teléfono ".ERROR_NULL."<br>";
			return;	
		}
        if(!ctype_digit($phone))
        {
            $this->fv_phone = "Teléfono ".ERROR_DATO_NUMERICO."<br>";
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
     * Set publicId
     *
     * @param integer $publicId
     * @return Contacts
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
     * Set client
     *
     * @param Clients $client
     * @return Contacts
     */
    public function setClient($client)
    {
        if(is_null($client))
		{			
			$this->fv_client = "client ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_client=null;
		$this->client=$client;
	    return $this;
    }

    /**
     * Get client
     *
     * @return Clients 
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set user
     *
     * @param Users $user
     * @return Contacts
     */
    public function setUser($user)
    {
        if(is_null($user))
		{			
			$this->fv_user = "user ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_user=null;
		$this->user=$user;
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


	public function client()
	{
		return $this->belongsTo('Client');
	}


 	private function validate(){
		//echo $this->fv_user_id;

		$error_messge = "";
        if($this->fv_accountId){
            $error_messge = $error_messge.$this->fv_accountId;
        }
        if($this->fv_user){
            $error_messge = $error_messge.$this->fv_user;
        }
        if($this->fv_client){
            $error_messge = $error_messge.$this->fv_client;
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
        if($this->fv_isPrimary){
            $error_messge = $error_messge.$this->fv_isPrimary;
        }
        if($this->fv_sendInvoice){
            $error_messge = $error_messge.$this->fv_sendInvoice;
        }
        if($this->fv_firstName){
            $error_messge = $error_messge.$this->fv_firstName;
        }
        if($this->fv_lastName){
            $error_messge = $error_messge.$this->fv_lastName;
        }
        if($this->fv_email){
            $error_messge = $error_messge.$this->fv_email;
        }
        if($this->fv_phone){
            $error_messge = $error_messge.$this->fv_phone;
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