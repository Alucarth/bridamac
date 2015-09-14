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
		 if (Auth::user()->is_admin)
		 {
			// $usuarios  = Account::find(Session::get('account_id'))->users;
			$usuarios =Account::find(Auth::user()->account_id)->users;
			// return Response::json(array('usuarios'=>$usuarios));
			return View::make('users.index')->with('usuarios',$usuarios);
		 }
		return Redirect::to('/inicio');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
	
		if (Auth::user()->is_admin)
		{
			$sucursales =Account::find(Auth::user()->account_id)->branches;
						// ->select('id','name')	
						// ->get();
			// return Response::json(array('sucursales'=>$sucursales));
			return View::make('users.create')->withSucursales($sucursales);
		} 
		return Redirect::to('/inicio');
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
		// return Response::json(Input::all());

		if (Auth::user()->is_admin)
		{


			$usuario = User::createNew();
		

			$usuario->setUsername(Input::get('username'));

			$usuario->setPassword(Input::get('password'),Input::get('password_confirm'));


			$usuario->setFirstName(Input::get('first_name'));
		
			$usuario->setLastName(Input::get('last_name'));
			
			$usuario->setEmail(Input::get('email'));
			
			$usuario->setPhone(Input::get('phone'));
			$usuario->is_admin = false ;
			// return var_dump($usuario);
		

		if($usuario->Guardar())
			{	
				//redireccionar con el mensaje a la siguiente vista 
				
				Session::flash('message',$usuario->getErrorMessage());

				
				if(Input::has('sucursales'))
				{	
					foreach (Input::get('sucursales') as $branch_id) {
						# code...
						// $cantidad = $cantidad +$sucursal;
						$userbranch= UserBranch::createNew();
						$userbranch->account_id = Auth::user()->account_id;
						$userbranch->user_id = $usuario->id;
						$userbranch->branch_id = $branch_id;
						// $userbranch->branch_id = UserBranch::getPublicId(); 
						$userbranch->save();

					}
				}
			
				return Redirect::to('usuarios');
			}
			Session::flash('error',$usuario->getErrorMessage());

		return Redirect::to('usuarios/create');

		}
		return Redirect::to('inicio');

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

		if (Auth::user()->is_admin)
		{

			$usuario = User::buscar($public_id);

			return View::make('users.show')->with('usuario',$usuario);
		}
		return Redirect::to('/inicio');


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
		if (Auth::user()->is_admin)
		{
			$usuario = User::buscar($public_id);


		// return Response::json(array('editando id' => $usuario ));
			return View::make('users.edit')->with('usuario',$usuario);
		}
		return Redirect::to('/inicio');
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
		if (Auth::user()->is_admin)
		{
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
		}
		return Redirect::to('/inicio');
		
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
		if (Auth::user()->is_admin)
		{	

			$usuario = User::find($id);
			if(!$usuario->is_admin)
			{
				$usuario->delete();
				Session::flash('message','Se borro exitosamente al usuario');
			}
			else
			{
				Session::flash('error','No se puede borrar al administrador');
			}

			return Redirect::to('usuarios');
		}
		return Redirect::to('/inicio');

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

	public function asignarSucursal()
	{
		if(Session::has('branch_id'))
		{
			Session::forget('branch_id');
			Session::forget('branch_name');
		}
		// Session::forget('branch_id');
		Session::put('branch_id',Input::get('branch_id'));
		$sucursal= Branch::find(Session::get('branch_id'));
		Session::put('branch_name',$sucursal->name);
		
		// return Response::json(array('info  ' =>$sucursal));
		return Redirect::to('inicio');
	}
	public function indexSucursal()
	{	
		
		if(Auth::user()->is_admin)
		{
			$branches = Account::find(Auth::user()->account_id)->branches;
			// $sucursales = Branch::find(Auth::user()->account_id);
			$sucursales = array();
			foreach ($branches as $branch) {
				# code...
				$sucursales[] = array('branch_id'=>$branch->id,'name'=>$branch->name);
			}
			return View::make('users.selectBranch')->with('sucursales',$sucursales);
			// return Response::json($sucursales);
		}
		else
		{
			$sucursales = UserBranch::getSucursales(Auth::user()->id);
		}
		// return Response::json($sucursales);

		return View::make('users.selectBranch')->with('sucursales',$sucursales);
	}
	public function borrar($id)
	{
		return Response::json(array("borrando id" => $id));
	}



}
