<?php

class Category extends EntityModel
{	
	public function account()
	{
		return $this->belongsTo('Account');
	}
	
	public function products()
	{
		return $this->hasMany('Product');
	}
}