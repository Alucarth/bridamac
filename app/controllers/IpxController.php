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

		$account->setDomain(Input::get('domain'));
		$account->setNit(Input::get('nit'));
		$account->setName(Input::get('name'));
		$account->setEmail(Input::get('email'));
		// return $account->getErrorMessage();
		if($account->Guardar())
		{	
			//redireccionar con el mensaje a la siguiente vista 
			
			Session::flash('mensaje',$account->getErrorMessage());
			$direccion = "http://".$account->domain.".localhost/bridamac/public/";
			// $direccion = "/crear/sucursal";
			return Redirect::to($direccion);
		}

		Session::flash('error',$account->getErrorMessage());
		return Redirect::to('crear');
		
	}
	public function dashboard()
	{
		return View::make('cuentas.dashboard');
	}
}