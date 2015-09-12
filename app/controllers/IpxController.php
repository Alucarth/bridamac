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
<<<<<<< HEAD
			$direccion = "http://".$account->domain.".localhost/bridamac/public/";
=======
			$direccion = "http://".$account->domain.".localhost/public/";
>>>>>>> b08b3e44e67d4691980ba541758b328d352885a8
			// $direccion = "/crear/sucursal";
			return Redirect::to($direccion);
		}

		Session::flash('error',$account->getErrorMessage());
		return Redirect::to('crear');
		
	}
	public function dashboard()
	{	
		$sucursales = Branch::where('account_id',Auth::user()->account_id)->get();
		$usuarios = Account::find(Auth::user()->account_id)->users;
		$clientes = Account::find(Auth::user()->account_id)->clients;
		$productos = Account::find(Auth::user()->account_id)->products;	

		$informacionCuenta = array('sucursales' =>sizeof($sucursales),'usuarios' => sizeof($usuarios),'clientes' => sizeof($clientes),'productos' => sizeof($productos)  );
		// return Response::json($informacionCuenta);
		return View::make('cuentas.dashboard')->with('cuenta',$informacionCuenta);
	}
}