<?php

class UserBranch extends EntityModel
{
	protected $table = 'user_branch';
 
	public static function getSucursales($user_id)
	{
		$sucursalesAsignadas = UserBranch::join('branches','user_branch.branch_id','=','branches.id')
											->where('user_id',$user_id)
											->select('branch_id','name')
											->get();

		return $sucursalesAsignadas;
	}
	public static function getSucursalesObject($user_id)
	{
		$sucursalesAsignadas = UserBranch::where('user_id',$user_id)->get();

		return $sucursalesAsignadas;
	}
	public static function getUserBranch($user_id,$branch_id)
	{

		$sucursal = UserBranch::where('user_id',$user_id)
						 ->where('branch_id',$branch_id)
							->first();
		if($sucursal)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public static function getUsersBranch($branch_id,$account_id)
	{
		$usuarios = UserBranch::where('branch_id',$branch_id)->where('account_id',$account_id)->get();

		return $usuarios;
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
