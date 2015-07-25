<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
	
	protected $fillable =  array('id','username','email','password');

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

	protected $hidden = array('password', 'remember_token');
	
	public function account()
	{
		return $this->hasOne('Account');
	}

	public function branch()
	{
		return $this->belongsTo('Branch');
	}

	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{		
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	/**
	 *
	 * Creacion de usuario bajo logica burbuja public_id
	 * @return User
	 *
	 */
	public static function createNew()
	{
		$user = new User;


		if (Auth::check()) 
		{
			$user->account_id = Auth::user()->account_id;
		}else
		{
			$user->account_id = Session::get('account_id');	
		}

		$last_user = User::PublicId()->orderBy('public_id', 'DESC')->select('public_id')->first();
		$nextPublicId = $last_user->public_id;

		if($nextPublicId)
		{
			$nextPublicId= $nextPublicId + 1;
		}
		else
		{
			$nextPublicId = 1;
		}

		$user->public_id = $nextPublicId;

		return $user;
	}	

	public function isPro()
	{
		return $this->account->isPro();
	}

	public function getDisplayName()
	{
		if ($this->getFullName())
		{
			return $this->getFullName();
		}
		else if ($this->email)
		{
			return $this->email;
		}
		else
		{
			return 'Nombre de Usuario';
		}
	}
	public static function getPublicId()
	{
		$user = User::PublicId()->orderBy('public_id', 'DESC')->select('public_id')->first();
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
	public function getFullName()
	{
		if ($this->first_name || $this->last_name)
		{
			return $this->first_name . ' ' . $this->last_name;
		}
		else
		{
			return '';
		}
	}	


	public function getMaxNumClients()
	{
		return MAX_NUM_CLIENTS;
	}

	public function isAdmin()
	{

        if($this->is_admin == 1)
        {
        	return true;
        }
        else
        {
        	return false;
        }
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
