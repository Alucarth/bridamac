<?php

class Client extends EntityModel
{
	
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
	
	public function getName()
	{
		return $this->getDisplayName();
	}

}