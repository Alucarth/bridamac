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
		
		$account = new Account;
		$account->ip = Request::getClientIp();
		$account->account_key = str_random(RANDOM_KEY_LENGTH);
		$account->domain = trim(Input::get('domain'));
		$account->nit= trim(Input::get('nit'));
		$account->name = trim(Input::get('name'));
		$account->language_id = 1;

		$account->save();

		$user = new User;
		$username = trim(Input::get('username'));
		$user->username = $username . "@" . $account->domain;
		$user->password = Hash::make(trim(Input::get('password')));
		$user->public_id = 1;
		$user->confirmation_code = '';
		$user->is_admin = true;
		$account->users()->save($user);

		$category = new Category;
		$category->user_id =$user->getId();
		$category->name = "General";
		$category->public_id = 1;
		$account->categories()->save($category);



		
		// Auth::login($user);
		// $data = array('guardado exitoso' => ' se registro correctamente hasta aqui todo blue :)' ,'datos'=>Input::all());
		$direccion = "http://".$account->domain.".localhost/devipx/public/";
		// $direccion = "/crear/sucursal";
		return Redirect::to($direccion);
	}
}