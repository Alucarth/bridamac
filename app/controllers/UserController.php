<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$usuarios  = User::all();
		return View::make('users.show')->with('usuarios',$usuarios);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		// return Response::json(array('mensaje'=>'formulario de creacion usuario'));

		//en caso de hacerlo por afuera XD sin autentificacion
		$sucursales = Branch::where('account_id',Session::get('account_id'))
					->select('id','name')	
					->get();
		// return Response::json(array('sucursales'=>$sucursales));
		return View::make('users.form')->withSucursales($sucursales);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		//en caso de no haber sesion

		$account = Account::find(Session::get('account_id'));
		

		$user = new User;
		$username = trim(Input::get('username'));
		$user->username = $username . "@" . $account->domain;
		$user->password = Hash::make(trim(Input::get('password')));
		$user->public_id = User::getPublicId();
		$user->email = trim(Input::get('email'));
		$user->phone = trim(Input::get('phone'));
		$user->confirmation_code = '';
		$user->is_admin = false ;
		$account->users()->save($user);

		$cantidad = 0;
		if(Input::get('sucursales'))
		{	
			foreach (Input::get('sucursales') as $branch_id) {
				# code...
				// $cantidad = $cantidad +$sucursal;
				$userbranch= new UserBranch;
				$userbranch->account_id = $account->id;
				$userbranch->user_id = $user->id;
				$userbranch->branch_id = $branch_id;
				// $userbranch->branch_id = UserBranch::getPublicId();
				$userbranch->save();

			}
		}
		return Response::json(array('contenido'=> Input::all()));
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		return Response::json(array('mostrando id' => $id ));

	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		return Response::json(array('editando id' => $id ));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
		
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	//Datatable para usuario
	public function getDatatable()
    {
        return Datatable::collection(User::all(array('id','username')))
        ->showColumns('id', 'username')
        ->searchColumns('username')
        ->orderColumns('id','username')
        ->make();
    }



}
