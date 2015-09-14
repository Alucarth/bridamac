<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	use SoftDeletingTrait;
	protected $table = 'users';
	 protected $dates = ['deleted_at'];

	private $fv_username;
	private $fv_password;
	
	private $fv_first_name;
	private $fv_last_name;
	private $fv_email;
	private $fv_phone;

	private $fv_account_id;

	private $fv_error_message;



	 
	protected $fillable =  array('id','username','email','password');


	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

	protected $hidden = array('password', 'remember_token');
	
	public function account()
	{
		return $this->belongsTo('Account');
	}

	public function branch()
	{
		return $this->belongsTo('Branch');
	}

	public function userbranch()
	{
		return $this->belongsTo('UserBranch');
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

	public static function buscar($public_id)
	{

		$account_id = null;
		if(Auth::check())
		{
			$account_id = Auth::user()->account_id;
		}
		else
		{
			$account_id = Session::get('account_id');
		}
		$usuarios = User::where('account_id',$account_id)
							->where('public_id',$public_id)->firstOrFail();
		// $usuarios = Account::find($account_id)->users;

		return $usuarios;
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
	
	//validacion  por datos
    /**
     * Gets the value of fv_username.
     *
     * @return mixed
     */
    public function getUsername()
    {
        return $this->fv_username;
    }

    /**
     * Sets the value of fv_username.
     *
     * @param mixed $fv_username the fv_username
     *
     * @return self
     */
    public function setUsername($fv_username)
    {
    	$fv_username  = trim($fv_username);
    	if(!empty($fv_username))
    	{
    		$cuenta = Account::where('id',$this->getAccount_id())->first();
    		if($cuenta)
    		{
    			$usuarioExiste= User::where('username',$fv_username.'@'.$cuenta->domain)->first();
    			if($usuarioExiste)
    			{
    				$this->fv_error_message = $this->fv_error_message.'<br>- Usuario '.ERROR_DUPLICADO;
    				
    				return $this->fv_username = null;
    			}
    			return $this->fv_username = $fv_username.'@'.$cuenta->domain;
    		}

    		$this->fv_error_message = $this->fv_error_message .'<br>- Usuario Identificador Cuenta '.ERROR_ID;
    		return $this->fv_username = null;
    		
    	}
        
    	$this->fv_error_message = $this->fv_error_message.'<br>- Usuario '.ERROR_NULL;
        return $this->fv_username = null;
    }

    /**
     * Gets the value of fv_password.
     *
     * @return mixed
     */
    public function getPassword()
    {
        return $this->fv_password;
    }

    /**
     * Sets the value of fv_password.
     *
     * @param mixed $fv_password the fv_password
     *
     * @return self
     */
    public function setPassword($fv_password,$fv_password_confirm)
    {	
    	$fv_password = trim($fv_password);
    	$fv_password_confirm = trim($fv_password_confirm);

    	if(!empty($fv_password))
    	{
    		if(!empty($fv_password_confirm))
    		{
    			if($fv_password!=$fv_password_confirm)
    			{
    				$this->fv_error_message = $this->fv_error_message.'<br>- Passwor error '.ERROR_PASSWORD_DISTINTO;
    				return $this->fv_password = null;
    			}
    			if(strlen($fv_password)<5)
    			{
    				$this->fv_error_message = $this->fv_error_message.'<br>- password min '.ERROR_SIZE_PASSWORD;
    				return $this->fv_password = null;
    			}
    			
    			return $this->fv_password = $fv_password;
    		}
    		
    		$this->fv_error_message = $this->fv_error_message.'<br>- Debe Confirmar Password '.ERROR_NULL;	
        
        	return $this->fv_password = null;

    	}
    	$this->fv_error_message = $this->fv_error_message.'<br>- Password '.ERROR_NULL;	
        
        return $this->fv_password = null;
    }

   
    /**
     * Gets the value of fv_first_name.
     *
     * @return mixed
     */
    public function getFirstName()
    {

        return $this->fv_first_name;
    }

    /**
     * Sets the value of fv_first_name.
     *
     * @param mixed $fv_first_name the fv_first_name
     *
     * @return self
     */
    public function setFirstName($fv_first_name)
    {	
    	if(!empty($fv_first_name))
    	{
    		 return $this->fv_first_name = $fv_first_name;

    	}
       	$this->fv_error_message = $this->fv_error_message.'<br>- Nombre '.ERROR_NULL;	
        return $this->fv_first_name=null;
    }

    /**
     * Gets the value of fv_last_name.
     *
     * @return mixed
     */
    public function getLastName()
    {
        return $this->fv_last_name;
    }

    /**
     * Sets the value of fv_last_name.
     *
     * @param mixed $fv_last_name the fv_last_name
     *
     * @return self
     */
    public function setLastName($fv_last_name)
    {
       if(!empty($fv_last_name))
    	{
    		return  $this->fv_last_name = $fv_last_name;

    	}
       	$this->fv_error_message = $this->fv_error_message.'<br>- Apellido '.ERROR_NULL;	
        return $this->fv_last_name=null;
    }

    /**
     * Gets the value of fv_email.
     *
     * @return mixed
     */
    public function getEmail()
    {
        return $this->fv_email;
    }

    /**
     * Sets the value of fv_email.
     *
     * @param mixed $fv_email the fv_email
     *
     * @return self
     */
    public function setEmail($email)
    {
        if(!empty($email))
		{
			$email = trim($email);
			if(!filter_var($email, FILTER_VALIDATE_EMAIL))
			{
				$this->fv_error_message = $this->fv_error_message .'<br>- Email '.$email.ERROR_DATO_EMAIL;
				return $this->fv_email = null; 
			}
			return $this->fv_email = $email;
		}
		$this->fv_error_message = $this->fv_error_message.'<br>- Email '.ERROR_NULL;
		return $this->fv_email = null;
    }

    
    /**
     * Gets the value of fv_account_id.
     *
     * @return mixed
     */
    public function getAccount_id()
    {	if(Auth::check())
    	{
    		return $this->account_id;
    	}
        return $this->fv_account_id;
    }

    /**
     * Sets the value of fv_account_id.
     *
     * @param mixed $fv_account_id the fv_account_id
     *
     * @return self
     */
    public function setAccountId($account_id)
	{
		if(!empty($account_id))
		{
			if(!is_numeric($account_id))
			{
				$this->fv_error_message = $this->fv_error_message . '<br>- Identificador Cuenta '.ERROR_DATO_NUMERICO;
				return  $this->fv_account_id=null;
			}
			$account_idExiste = Account::find($account_id);
			if(!$account_idExiste)
			{
				$this->fv_error_message = $this->fv_error_message .'<br>- Identificador Cuenta '.ERROR_ID;
				return  $this->fv_account_id=null;	
			}
			return $this->fv_account_id = $account_id;

		}
		$this->fv_error_message = $this->fv_error_message .'<br>- Identificador Cuenta '.ERROR_NULL;
		return  $this->fv_account_id=null;
	}
	public function setPhone($fv_phone)
	{
		
		if(!empty($fv_phone))
		{
			$fv_phone = trim($fv_phone);
			
			if(!is_numeric($fv_phone))
			{

				$this->fv_error_message = $this->fv_error_message .'<br>- Telefono '.$fv_phone.ERROR_DATO_NUMERICO;
				return  $this->fv_phone =null;
			}
			if($fv_phone<0)
			{
				$this->fv_error_message = $this->fv_error_message .'<br>- Telefono '.$fv_phone.ERROR_NUMERICO_POSITIVO;
				return  $this->fv_phone =null;		
			}
			return  $this->fv_phone = $fv_phone;
		}

		return $this->fv_phone =null;
		
	}
	public function getPhone()
	{
		if($this->fv_phone)
		{
			return $this->fv_phone;
		}
		
	}

    public function getErrorMessage()
	{
		return $this->fv_error_message;
	}

	/* Validacion de Metodos */

	public function Guardar()
  	{
  		if(empty($this->fv_error_message))
		{
			$this->first_name = $this->getFirstName();
			$this->last_name = $this->getLastName();
			$this->email = $this->getEmail();
			$this->password =Hash::make($this->getPassword());
			$this->username =$this->getUsername();
			$this->phone = $this->getPhone();
			$this->save();

			$this->fv_error_message = "Registro Existoso";
			return true;
		}

		return false;
  	}	


}
