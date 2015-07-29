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
		$usuarios  = Account::find(Session::get('account_id'))->users;
		// return Response::json(array('usuarios'=>$usuarios));
		return View::make('users.index')->with('usuarios',$usuarios);
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
		$sucursales = Account::find(Session::get('account_id'))->branches;
					// ->select('id','name')	
					// ->get();
		// return Response::json(array('sucursales'=>$sucursales));
		return View::make('users.create')->withSucursales($sucursales);
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
		

		$user = User::createNew();
		$username = trim(Input::get('username'));
		$user->username = $username . "@" . $account->domain;
		$user->password = Hash::make(trim(Input::get('password')));
		$user->first_name = trim(Input::get('first_name'));
		$user->last_name = trim(Input::get('last_name'));
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
				$userbranch= UserBranch::createNew();
				$userbranch->account_id = $account->id;
				$userbranch->user_id = $user->id;
				$userbranch->branch_id = $branch_id;
				// $userbranch->branch_id = UserBranch::getPublicId(); 
				$userbranch->save();

			}
		}
		// return Response::json(array('contenido'=> Input::all()));
		return Redirect::to('usuarios');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($public_id)
	{
		//
		$usuario = User::buscar($public_id);

	

		return View::make('users.show')->with('usuario',$usuario);
		// return Response::json(array('mostrando id' => $id ));

	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($public_id)
	{
		//
		$usuario = User::buscar($public_id);


		// return Response::json(array('editando id' => $usuario ));
		return View::make('users.edit')->with('usuario',$usuario);
	}



	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($public_id)
	{
		//
		$usuario = User::buscar($public_id);
		$usuario->first_name = trim(Input::get('first_name'));
		$usuario->last_name = trim(Input::get('last_name'));
		$usuario->save();


		foreach (UserBranch::getSucursalesObject($usuario->id) as $sucursal) {
			# code...
			$sucursal->delete();
		}
		if(Input::get('sucursales'))
		{
			foreach (Input::get('sucursales') as $branch_id) {
				# code...
				$existeAsignado = UserBranch::withTrashed()->where('user_id',$usuario->id)
							 				->where('branch_id',$branch_id)
											->first();
				// $existeAsignado = UserBranch::where('user_id',$usuario->id)
				// 			 				->where('branch_id',$branch_id)
				// 							->first();


				if($existeAsignado)
				{
					$existeAsignado->restore();
				}
				else
				{

				// 	if(!$existeAsignado)
				// {
					$branch = Branch::find($branch_id);
					$userbranch= UserBranch::createNew();
					$userbranch->account_id = $usuario->account_id;
					$userbranch->user_id = $usuario->id;
					$userbranch->branch_id = $branch->id;
					$userbranch->save();
				}
			}

		}
		return Redirect::to('usuarios');
		// return Response::json(array('contenido'=>Input::all()));
		
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
		$usuario = User::find($id);
		$usuario->delete();
		return Redirect::to('usuarios');
	}

	// //Datatable para usuario
	// public function getDatatable()
 //    {
 //        return Datatable::collection(User::all(array('id','username')))
 //        ->showColumns('id', 'username')
 //        ->searchColumns('username')
 //        ->orderColumns('id','username')
 //        ->make();
 //    }



}
