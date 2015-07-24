<?php

class Product extends EntityModel
{
	public static $fieldProductKey = 'Código';
	public static $fieldNotes = 'Nombre';
	public static $fieldCost = 'Precio';

	public function account()
	{
		return $this->belongsTo('Account');
	}
	
	public function category()
	{
		return $this->belongsTo('Category');
	}
}