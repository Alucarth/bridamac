<?php

class UserBranch extends EntityModel
{
	protected $table = 'users';
	public $timestamps = false;
	protected $softDelete = false;  

  	public function account()
	{
		return $this->belongsTo('Account');
	}

	public function branch()
	{
		return $this->belongsTo('Branch');
	}
	public function user()
	{
		return $this->belongsTo('User');
	}
}
