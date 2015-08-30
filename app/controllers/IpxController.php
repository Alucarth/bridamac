<?php

class IpxController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */




	public function index()
	{
		//
		// return Response::json(array('index' => 'cuentas 2'));
		// $accounts = Account::all();

		// return View::make('cuentas.index')->with('cuentas',$accounts);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
			return View::make('cuentas.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// return Response::json(Input::all());
		// $domain =strtolower(str_replace(' ','',Input::get('name')));
		// return Response::json($domain);

		$account = new Account;
		// $account->ip = Request::getClientIp();
		// $account->account_key = str_random(RANDOM_KEY_LENGTH);
		$account->setDomain(Input::get('domain'));
		$account->setNit(Input::get('nit'));
		$account->setName(Input::get('name'));
		$account->setEmail(Input::get('email'));
		// return $account->getErrorMessage();
		if($account->Guardar())
		{	
			//redireccionar con el mensaje a la siguiente vista 
			
			Session::flash('mensaje',$account->getErrorMessage());
			$direccion = "http://".$account->domain.".localhost/devipx/public/";
			// $direccion = "/crear/sucursal";
			return Redirect::to($direccion);
		}
		Session::flash('error',$account->getErrorMessage());
		return Redirect::to('crear');
		// return "Error :".$account->getErrorMessage();
		// if($account->Guardar())
		// {
		// 	$direccion = "http://".$account->domain.".localhost/devipx/public/";
		// // $direccion = "/crear/sucursal";
		// 	return Redirect::to($direccion);
		// $array = array('domain'=>$account->getDomain(),'nit'=>$account->getNit(),'name'=>$account->getName());
		// }
		// return Response::json($array);
		// $account = new Account;
		// $account->ip = Request::getClientIp();
		// $account->account_key = str_random(RANDOM_KEY_LENGTH);
		// $account->domain = trim(Input::get('domain'));
		// $account->nit= trim(Input::get('nit'));
		// // $account->email= trim(Input::get('email'));
		// $account->name = trim(Input::get('name'));
		// $account->language_id = 1;
		// $account->save();


		// $user = new User;
		// $username = 'temporal';
		// $user->username = $username . "@" . $account->domain;
		// $user->password = Hash::make(trim(Input::get('temporal')));
		// $user->email= trim(Input::get('email'));
		// $user->public_id = 1;
		// //enviar confimacion de contraseña
		// $user->confirmation_code = '';

		// //addicionar a grupo de administradores XD 
		// $user->is_admin = true;
		// $account->users()->save($user);

		// $category = new Category;
		// $category->user_id =$user->getId();
		// $category->name = "General";
		// $category->public_id = 1;
		// $account->categories()->save($category);

		// // Auth::login($user);
		
		// $direccion = "http://".$account->domain.".localhost/devipx/public/";
		// // $direccion = "/crear/sucursal";
		// return Redirect::to($direccion);
	}
	public function dashboard()
	{
		return View::make('cuentas.dashboard');
	}
}