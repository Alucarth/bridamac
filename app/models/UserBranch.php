<?php

class UserBranch extends EntityModel
{
	protected $table = 'user_branch';
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
	public static function getPublicId()
	{
		$user = UserBranch::PublicId()->orderBy('public_id', 'DESC')->select('public_id')->first();
		$nextPublicId = $user->public_id;

		if($nextPublicId)
		{
			$nextPublicId= $nextPublicId + 1;
		}
		else
		{
			$nextPublicId = 1;
		}

		return $nextPublicId;

	}
	public function scopePublicId($query)
    {	
    	// if(Auth::check)
    	// {
    	// 	return $query->where('account_id', Auth::user->id ) 
    	// }
    	//en caso de no estar con session
    	if (Auth::check()) 
		{
			$accountId = Auth::user()->account_id;	
		}
		else
		{
			$accountId =  Session::get('account_id');
		}
		//validar para el caso de que se intente ingresar directo XD
        return $query->where('account_id',$accountId);
    }
}
