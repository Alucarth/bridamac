<?php

class InstallController extends BaseController {

	public function paso()
	{	//
		
		// $usuario = User::find(Session::get('u'))->first();
		$cuenta = Account::find(Session::get('account_id'));
		// return Response::json($cuenta->domain);

		// $usuario = Account::find(Session::get('account_id'))->users->first();
		// $usuario = User::where('account_id',$cuenta->id)->first();
		$usuario = User::where('account_id',Session::get('account_id'))->where('username','=','temporal@'.$cuenta->domain)->firstOrfail();
		// return Response::json($usuario);
		// return $usuario;
		return View::make('install.paso')->with('usuario',$usuario);
	}
	public function postpaso()
	{
		// return Response::json(Input::all());

		//guardar informnacion y seguir con el siguiente paso XD
		//punto delicado con el id --> buscar otro metodo XD podria funcionar con la session ver este tema
		// $usuario = User::find(Session::get(''));

		$usuario = User::find(Input::get('id'));
		$array = explode('@',$usuario->username);
		$array[0]= trim(Input::get('username'));
		// return Response::json(implode('@', $array));
		$usuario->first_name = trim(Input::get('first_name'));
		$usuario->last_name = trim(Input::get('last_name'));
		$usuario->email = trim(Input::get('email'));
		$usuario->password =Hash::make(trim(Input::get('password')));
		$usuario->username =implode('@', $array);
		$usuario->phone = trim(Input::get('phone'));
		$usuario->save();

		return Redirect::to('productos');
	}
	public function paso1()
	{
		// $sucursales = Branch::where('account_id',Auth::user()->account->id);
		$documentos = TypeDocument::getDocumentos();
		return View::make('install.paso1')->with('documentos',$documentos);
	}
	public function postpaso1()
	{ 	
		// return Response::json(Input::all());
		$branch = Branch::createNew();
		$branch->account_id = Session::get('account_id');
		$branch->name = trim(Input::get('branch_name'));
        $branch->branch_type_id = trim(Input::get('branch_type_id'));
        $branch->number_branch= trim(Input::get('number_branch'));
		$branch->address2 = trim(Input::get('address2'));
        $branch->address1 = trim(Input::get('address1'));
        $branch->work_phone = trim(Input::get('work_phone'));
		$branch->city = trim(Input::get('city'));
		$branch->state = trim(Input::get('state'));
        $branch->deadline = Input::get('deadline');
        $branch->key_dosage = trim(Input::get('dosage'));
        $branch->economic_activity = trim(Input::get('economic_activity'));
        $branch->number_process = trim(Input::get('number_process'));
        $branch->number_autho = trim(Input::get('number_autho'));
        $branch->key_dosage = trim(Input::get('key_dosage'));   
           
	    // $branch->law = trim(Input::get('law'));
        $branch->type_third = trim(Input::get('third_view'));
        $branch->invoice_number_counter = 1;
		$branch->save();

		foreach (Input::get('tipo_documento') as $documento) {
			# code...
			$tipo = new TypeDocumentBranch();
			$tipo->branch_id = $branch->id;
			$tipo->type_document_id = $documento;
			$tipo->save();
		}
		
		// return Response::json($branch);
		return Redirect::to('comensar/3');
		// return Response::json(Input::all());
	}
	public function paso2()
	{
		//validar aqui cual quier cosa respecto a entrar a las rutas
		$tiposdedocumentos =  MasterDocument::all();

		return View::make('install.paso2')->with('tipos',$tiposdedocumentos);
	}
	public function postpaso2()
	{	
		 if ( Input::hasFile('imgInp')) {

                $file = Input::file('imgInp')->getRealPath();
                $data = file_get_contents($file);
				$base64 = 'data:image/png;base64,'.base64_encode($data);

                // return $base64;
                
            }
		foreach (Input::get('documentos') as $document) {
			# code...
			$td = TypeDocument::createNew();
			$td->account_id = Session::get('account_id');
			$td->master_id=$document;
			$td->logo =$base64;
			$td->save();
		}
		// $td = TypeDocument::createNew();
		// $td->account_id = Session::get('account_id');


		
		return Redirect::to('comensar/2');
		// return Response::json(array('Mensaje:'=>'si sale este mensaje es que todo esta ok :)'));
	}
	public function paso3()
	{

	}
	public function postpaso3()
	{

	}

}