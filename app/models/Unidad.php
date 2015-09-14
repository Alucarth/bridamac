<?php

class Unidad extends Eloquent
{
	protected $table = 'unidades';
	public $timestamps = false;
	
	public function products()
	{
		return $this->hasMany('Product');
	}
}