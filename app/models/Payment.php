<?php

class Payment extends EntityModel
{
	private $fv_id;
        private $fv_invoiceId;
        private $fv_accountId;
        private $fv_clientId;
        private $fv_contactId;
        private $fv_invitationId;
        private $fv_userId;
        private $fv_paymentTypeId;
        private $fv_amount;
        private $fv_paymentDate;
        private $fv_transactionReference;
        private $fv_payerId;
        private $publicId;
        public function account()
	{
		return $this->belongsTo('Account');
	}

	public function invoice()
	{
		return $this->belongsTo('Invoice');
	}

	public function invitation()
	{
		return $this->belongsTo('Invitation');
	}

	public function client()
	{
		return $this->belongsTo('Client');
	}
        public function getId()
        {
            return $this->id;
        }
        public function getPublicId(){
            return $this->public_id;
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
       
       public function setInvoiceId($invoiceId)
       {
           if(is_null($invoiceId))
            {			
                    $this->fv_invoiceId = "Factura ".ERROR_NULL."<br>";
                    return;	
            }
            $this->fv_invoiceId=null;
            $this->invoice_id=$invoiceId;
            return $this;
       }
       public function getInvoiceId()
       {
           return $this->invoice_id;
       }
       
       public function setClientId($clientId)
       {
           if(is_null($clientId))
           {
                    $this->fv_clientId = "Cliente ".ERROR_NULL."<br>";
                    return;	
            }
            $this->fv_clientId=null;
            $this->client_id=$clientId;
            return $this;
       }
       public function getClientId()
       {
           return $this->client_id;
       }        
       
       public function setContactId($contactId)
       {
           if(is_null($contactId))
            {			
                    $this->fv_contactId = "Contacto ".ERROR_NULL."<br>";
                    return;	
            }
            $this->fv_contactId=null;
            $this->contact_id=$contactId;
            return $this;
       }
       public function getContactId()
       {
           return $this->contact_id;
       }
       
       public function setInvitationId($invitationId)
       {
           if(is_null($invitationId))
            {			
                    $this->fv_invitationId = "Factura ".ERROR_NULL."<br>";
                    return;	
            }
            $this->fv_invitationId=null;
            $this->invitation_id=$invitationId;
            return $this;
       }
       public function getInvitationId()
       {
           return $this->invitation_id;
       }
       
       public function setUserId($userId)
       {
           if(is_null($userId))
            {			
                    $this->fv_userId = "Factura ".ERROR_NULL."<br>";
                    return;	
            }
            $this->fv_userId=null;
            $this->user_id=$userId;
            return $this;
       }
       public function getUserId()
       {
           return $this->user_id;
       }
       
       public function setPaymentTypeId($paymentTypeId)
       {
           if(is_null($paymentTypeId))
            {			
                    $this->fv_paymentTypeId = "Tipo de pago ".ERROR_NULL."<br>";
                    return;	
            }
            $this->fv_paymentTypeId=null;
            $this->payment_type_id=$paymentTypeId;
            return $this;
       }
       public function getPaymentTypeId()
       {
           return $this->payment_type_id;
       }
       
       public function setAmount($amount)
       {
           if(is_null($amount))
            {			
                    $this->fv_amount = "Factura ".ERROR_NULL."<br>";
                    return;	
            }
            
            $credit = Credit::where('account_id',$this->getAccountId())->where('client_id',$this->getClientId())->get();
            $invoice = Invoice::where('id',$this->getInvoiceId())->first();
            $credito = 0;
            foreach ($credit as $cre)           
                $credito+=$cre->balance;      
            
            //echo $amount." - ".$credito;            
            if($credito<$amount && $this->getPaymentTypeId()==2){
                $this->fv_amount="No tiene suficiente crédito para realizar este pago.";                
                return;
            }
            if($invoice->balance<$amount){
                $this->fv_amount="No es posible pagar mas de lo adeudado.";                
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
       public function getAmount()
       {
           return $this->amount;
       }
       
       public function setPaymentDate($paymentDate)
       {
        
           if(is_null($paymentDate))
            {			
                    $this->fv_paymentDate = "Factura ".ERROR_NULL."<br>";
                    return;	
            }
            $dateHoy =  date('Y-m-d');
            if($paymentDate < $dateHoy){
              $this->fv_paymentDate = "La fecha no es válida";
              return;
            }
            
            $this->fv_paymentDate=null;
            $this->payment_date=$paymentDate;
            return $this;
       }
       public function getPaymentDate()
       {
           return $this->payment_date;
       }
       
       public function setTransactionReference($transactionReference)
       {
           if(is_null($transactionReference))
            {			
                    $this->fv_transactionReference = "Factura ".ERROR_NULL."<br>";
                    return;	
            }
            $this->fv_transactionReference=null;
            $this->transaction_reference=$transactionReference;
            return $this;
       }
       public function getTransactionReference()
       {
           return $this->transaction_reference;
       }
       
       
       private function validate(){
		
	$error_messge = "";
        if($this->fv_invoiceId){
            $error_messge = $error_messge.$this->fv_invoiceId;
        }
        if($this->fv_accountId){            
            $error_messge = $error_messge.$this->fv_accountId;
        }        
        if($this->fv_clientId){            
            $error_messge = $error_messge.$this->fv_clientId;
        }        
        if($this->fv_contactId){
            $error_messge = $error_messge.$this->fv_contactId;
        }
        if($this->fv_invitationId){
            $error_messge = $error_messge.$this->fv_invitationId;
        }
        if($this->fv_userId){
            $error_messge = $error_messge.$this->fv_userId;
        }
        if($this->fv_paymentTypeId){
            $error_messge = $error_messge.$this->fv_paymentTypeId;
        }
        if($this->fv_amount){
            $error_messge = $error_messge.$this->fv_amount;
        }
        if($this->fv_paymentDate){
            $error_messge = $error_messge.$this->fv_paymentDate;
        }   
        if($this->fv_transactionReference){
            $error_messge = $error_messge.$this->fv_transactionReference;
        }
        if($this->fv_asd){
            $error_messge = $error_messge.$this->fv_asd;
        }   
        return $error_messge;
      }
      
      public function guardar(){
            $error = $this->validate();                                    
            //echo $error."asdf";
            return $error==""?false:$error;
	}
       
       
}

// Payment::created(function($payment)
// {
// 	Activity::createPayment($payment);
// });

// Payment::deleting(function($payment)
// {
// 	Activity::deletePayment($payment);
// });