<?php

class Client extends EntityModel
{
	public static $fieldName = 'Nombre de Cliente';
	public static $fieldBusinessName = 'Razón Social';
	public static $fieldNit = 'NIT';
	public static $fieldAddress1 = 'Zona/Barrio';
	public static $fieldAddress2 = 'Dirección';
	public static $fieldWorkPhone = 'Teléfono';
	public static $fieldPrivateNotes = 'Antecedentes';
	
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

}