<?php

class InstallController extends BaseController {

	public function paso3()
	{	//
	
		// $usuario = User::find(Session::get('u'))->first();
		if(Session::has('account_id'))
		{


		$cuenta = Account::find(Session::get('account_id'));
		// return Response::json($cuenta->domain);

		// $usuario = Account::find(Session::get('account_id'))->users->first();
		// $usuario = User::where('account_id',$cuenta->id)->first();
		$usuario = User::where('account_id',Session::get('account_id'))->where('username','=','temporal@'.$cuenta->domain)->firstOrfail();
		// return Response::json($usuario);
		// return $usuario;
		return View::make('install.paso')->with('usuario',$usuario);
		}
		return Redirect::to('/'); 
	}
	public function postpaso3()
	{
		// return Response::json(Input::all());

		//guardar informnacion y seguir con el siguiente paso XD
		//punto delicado con el id --> buscar otro metodo XD podria funcionar con la session ver este tema
		// $usuario = User::find(Session::get(''));
		if(Session::has('account_id'))
		{

			$usuario = User::find(Input::get('id'));
			$usuario->setAccountId(Session::get('account_id'));

			$usuario->setUsername(Input::get('username'));
			$usuario->setPassword(Input::get('password'),Input::get('password_confirm'));

			$usuario->setFirstName(Input::get('first_name'));
		
			$usuario->setLastName(Input::get('last_name'));
			
			$usuario->setEmail(Input::get('email'));
			
			$usuario->setPhone(Input::get('phone'));
			// return var_dump($usuario);

			if($usuario->Guardar())
				{	
					//redireccionar con el mensaje a la siguiente vista 
					
					Session::flash('message',$usuario->getErrorMessage());

					 $account = Account::find(Session::get('account_id'));
					 $account->op3=true;
					 //en caso de hacer una ventana de confirmacion antes de salir de la instalacion solo se tiene que usar el campo confirmed
					 $account->confirmed= true;
					 $account->save();
					 Session::flush();
				
					return Redirect::to('inicio');
				}
				Session::flash('error',$usuario->getErrorMessage());

			return Redirect::to('paso/3');
		}
		return Redirect::to('/'); 

	}
	public function paso2()
	{
		if(Session::has('account_id'))
		{
			// $sucursales = Branch::where('account_id',Auth::user()->account->id);
			$documentos = TypeDocument::getDocumentos();
			return View::make('install.paso1')->with('documentos',$documentos);
		}
		return Redirect::to('/'); 
	}
	public function postpaso2()
	{ 	
		if(Session::has('account_id'))
		{
		// return Response::json(Input::all());
			$branch = Branch::createNew();
			$branch->setAccountId(Session::get('account_id'));

			$branch->setType_documents(Input::get('tipo_documento'));
			
			$branch->setName(Input::get('branch_name'));

			$branch->setNumber_branch(Input::get('number_branch'));
		
			$branch->setAddress1(Input::get('address1'));
			$branch->setAddress2(Input::get('address2'));
			$branch->setWorkphone(Input::get('work_phone'));
			$branch->setCity(Input::get('city'));
			$branch->setState(Input::get('state'));

			$branch->setDeadline(Input::get('deadline'));
			
			$branch->setKey_dosage(Input::get('key_dosage'));
			$branch->setEconomic_activity(Input::get('economic_activity'));
			$branch->setNumber_process(Input::get('number_process'));
			$branch->setNumber_autho(Input::get('number_autho'));
			$branch->setLaw(Input::get('law'));
			$branch->setType_thrird(Input::get('third_view'));
			$branch->sfc = Input::get('sfc');

			// return var_dump($branch);

			if($branch->Guardar())
			{
				if (Input::has('is_uniper'))
				{
				    //
				    $account = Account::find($branch->account_id);
				    $account->is_uniper = Input::get("is_uniper");
				    $account->uniper= Input::get("uniper");
				     $account->op2=true;
				    $account->save();
				}

				Session::flash('message',$branch->getErrorMessage());
				return Redirect::to('paso/3');
			}
				Session::flash('error',$branch->getErrorMessage());

			return Redirect::to('paso/2');
		
		}
		return Redirect::to('/'); 
	}
	public function paso1()
	{
		//validar aqui cual quier cosa respecto a entrar a las rutas
		if(Session::has('account_id'))
		{
			$tiposdedocumentos =  MasterDocument::all();

			return View::make('install.paso2')->with('tipos',$tiposdedocumentos);
		}
		return Redirect::to('/'); 
	}
	public function postpaso1()
	{	
		if(Session::has('account_id'))
		{
			$base64 = null;
			 if ( Input::hasFile('imgInp')) {

	                $file = Input::file('imgInp')->getRealPath();
	                $data = file_get_contents($file);
					$base64 = base64_encode($data);
					// return $file;
					$src = 'data:image/jpg;base64,'.$base64;
	                // return $base64;

	                $td = TypeDocument::createNew();
		            $td->setAccountId(Session::get('account_id'));
		            $td->setLogo($src);
		            $td->setMasterIds(Input::get('documentos'));
		            if($td->Guardar())
					{	
						//redireccionar con el mensaje a la siguiente vista 
						 $account = Account::find(Session::get('account_id'));
						 $account->op1=true;
						 $account->save();

						Session::flash('message',$td->getErrorMessage());
					
						return Redirect::to('paso/2');

					}

					Session::flash('error',$td->getErrorMessage());
					return Redirect::to('paso/1');
	                
	            }

	         	Session::flash('error','Seleccione un logo para la cuenta antes de guardar');

			// foreach (Input::get('documentos') as $document) {
			// 	# code...
			// 	$td = TypeDocument::createNew();
			// 	$td->account_id = Session::get('account_id');
			// 	$td->master_id=$document;
			// 	$td->logo =$base64;
			// 	$td->save();
			// }
			// $td = TypeDocument::createNew();
			// $td->account_id = Session::get('account_id');


			
			return Redirect::to('paso/1');
		// return Response::json(array('Mensaje:'=>'si sale este mensaje es que todo esta ok :)'));
		}
		return Redirect::to('/');	
	}
	

}