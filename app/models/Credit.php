<?php

class Credit extends EntityModel
{		
	public static $fieldamount = 'Monto de Crédito';
        private $fv_id;
        private $fv_accountId;
        private $fv_client;
        private $fv_user;
        private $fv_amount;
        private $fv_balance;
        private $fv_creditDate;
        private $fv_creditNumber;
        private $fv_privateNotes;
        private $fv_publicId;

	public function invoice()
	{
		return $this->belongsTo('Invoice');
	}

	public function client()
	{
		return $this->belongsTo('Client');
	}
		
	public function apply($amount)
	{
		if ($amount > $this->balance)
		{
			$applied = $this->balance;
			$this->balance = 0;
		}
		else
		{
			$applied = $amount;
			$this->balance = $this->balance - $amount;			
		}

		$this->save();

		return $applied;
	}
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
                   $this->client_id=$client;
               return $this;
       }
       
        public function setAmount($amount){

            if(is_null($amount))
            {
                $this->fv_amount = "Monto ".ERROR_NULL."<br>";                
                return;
            }

            if($amount <= 0){
              $this->fv_amount = "El monto no puede ser menor o igual a 0";
              return;
            }
            $this->fv_amount=null;
            $this->amount=$amount;
            return $this;
            
        }
        public function getAmount(){
            return $this->amount;
        }
        
        public function setBalance($balance){
            if(is_null($balance))
            {
                $this->fv_balance = "Balance ".ERROR_NULL."<br>";                
                return;
            }
            $this->fv_balance=null;
            $this->balance=$balance;       
        }
        public function getBalance(){
            return $this->balance;
        }
        
        public function setCreditDate($creditDate){
            if(is_null($creditDate))
            {
                $this->fv_creditDate = "Fecha del credito ".ERROR_NULL."<br>";                
                return;
            }
            $this->fv_creditDate=null;
            $this->credit_date=$creditDate;       
        }
        public function getCreditDate(){
            return $this->credit_date;
        }
        
        public function setCreditNumber($creditNumber){
            if(is_null($creditNumber))
            {
                $this->fv_creditNumber = "Numero de credito ".ERROR_NULL."<br>";                
                return;
            }
            $this->fv_creditNumber=null;
            $this->credit_number=$creditNumber;       
        }
        public function getCreditNumber(){
            return $this->credit_number;
        }
        
        public function setPrivateNotes($privateNotes){
            if(is_null($privateNotes))
            {
                $this->fv_privateNotes = "Notas ".ERROR_NULL."<br>";                
                return;
            }
            $this->fv_privateNotes=null;
            $this->private_notes=$privateNotes;       
        }
        public function getPrivateNotes(){
            return $this->private_notes;
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
        * Get client
        *
        * @return Clients 
        */
       public function getClient()
       {
           return $this->client_id;
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
       
       
       	private function validate(){
		
	       $error_messge = "";
        if($this->fv_accountId){
            $error_messge = $error_messge.$this->fv_accountId;
        }
        if($this->fv_client){
            $error_messge = $error_messge.$this->fv_client;
        }
        if($this->fv_user){
            $error_messge = $error_messge.$this->fv_user;
        }
        if($this->fv_amount){
            $error_messge = $error_messge.$this->fv_amount;
        }
        if($this->fv_balance){
            $error_messge = $error_messge.$this->fv_balance;
        }
        if($this->fv_creditDate){
            $error_messge = $error_messge.$this->fv_creditDate;
        }
        if($this->fv_creditNumber){
            $error_messge = $error_messge.$this->fv_creditNumber;
        }
        if($this->fv_privateNotes){
            $error_messge = $error_messge.$this->fv_privateNotes;
        }
        if($this->fv_publicId){
            $error_messge = $error_messge.$this->fv_publicId;
        }
        return $error_messge;
       
    }
     public function guardar(){
	   	$error = $this->validate();
      return $error==""?false:$error;
	   }
}
Credit::created(function($credit)
{
	Activity::createCredit($credit);
});

Credit::deleting(function($credit)
{
	Activity::deleteCredit($credit);
});