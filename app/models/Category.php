<?php

class Category extends EntityModel
{	
        private $fv_id;
        private $fv_accountId;
        private $fv_name;
        private $fv_description;
        
        public function account()
	{
		return $this->belongsTo('Account');
	}
	
	public function products()
	{
		return $this->hasMany('Product');
	}
       
       public function getId()
       {
           return $this->id;
       }
       public function getPublicId()
       {
           return $this->public_id;
       }
       
       public function setAccountId($accountId)
       {
           if(is_null($accountId))
            {			
                    $this->fv_accountId = "Cuenta ".ERROR_NULL."<br>";
                    return;	
            }
            $this->fv_accountId=null;
            $this->account_id=$accountId;
            return $this;
       }
       public function getAccountId()
       {
           return $this->account_id;
       }
       
       public function setName($name)
       {
           if(is_null($name))
            {			
                $this->fv_name = "Nombre ".ERROR_NULL."<br>";
                return;	
            }
            $categories = Category::where('account_id',$this->getAccountId())->get();
            foreach ($categories as $cat)            
                if($cat->getName()==$name)
                    $this->fv_name = "La categoría ya existe";
            if($this->fv_name)
                    return;            
            $this->fv_name=null;
            $this->name=$name;
            return $this;
       }
       public function getName()
       {
           return $this->name;
       }
       
       public function setDescription($description)
       {
           if(is_null($description))
            {			
                    $this->fv_description = "Descripción ".ERROR_NULL."<br>";
                    return;	
            }
            $this->fv_description=null;
            $this->description=$description;
            return $this;
       }
       public function getDescription()
       {
           return $this->description;
       }
       private function validate(){
		
	$error_messge = "";
        if($this->fv_accountId){
           $error_messge = $error_messge.$this->fv_accountId;                   
        }
        if($this->fv_name){
           $error_messge = $error_messge.$this->fv_name;        
        }
        if($this->fv_description){
           $error_messge = $error_messge.$this->fv_description;                   
        }
         
        return $error_messge;
       }
       public function guardar(){
            $error = $this->validate();                                                
            if($error=="")
            {
                $this->save();
                return false;
            }
            return $error;
	}
}