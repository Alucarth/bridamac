<?php

class Product extends EntityModel
{
	public function category()
	{
		return $this->belongsTo('Category');
	}
}