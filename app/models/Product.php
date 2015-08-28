<?php

class Product extends EntityModel
{
	public static $fieldProductKey = 'Código';
	public static $fieldNotes = 'Nombre';
	public static $fieldCost = 'Precio';
	private $fv_account_id;
	private $fv_category_id;
	private $fv_user_id;
	private $fv_product_key;
	private $fv_notes;
	private $fv_cost;
	private $fv_qty;
	private $fv_public_id;

	public function account()
	{
		return $this->belongsTo('Account');
	}
	
	public function category()
	{
		return $this->belongsTo('Category');
	}

	public function setAccountId($accountid){

		if(is_null($accountid))
		{			
			$this->fv_account_id = "AccoutId ".ERROR_NULL."<br>";		
			return;	
		}
		$this->fv_account_id=null;
		$this->account_id=$accountid;
	}

	public function setUserId($userid)
	{

		if($userid < 0)	{				

			$this->fv_user_id = "UserId ".ERROR_NEGATIVO."<br>";

			return;
		}
		$this->user_id = $userid;
		$this->fv_user_id = null;
	}

	public function validate(){
		//echo $this->fv_user_id;

		$error_messge = "";
		if($this->fv_account_id){			
			$error_messge=$error_messge.$this->fv_account_id;
		}
		if($this->fv_user_id){
			$error_messge=$error_messge.$this->fv_user_id;
		}
		//echo $error_messge;
		return $error_messge==""?false:$error_messge;
	}

	public function guardar(){
		$error = $this->validate();
		if(!$error)
			return "exitoso";
		else
			return $error;
	}
	// public function setProductKey($pk)
	// {
	// 	if($productKey =! "")
	// 	{
	// 		$this->
	// 	}
	// }


}