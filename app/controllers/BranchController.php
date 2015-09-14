 <?php

class BranchController extends \BaseController {

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

			$branches = Account::find(Auth::user()->account_id)->branches;
			return View::make('sucursales.index')->with('sucursales',$branches);
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
		//formulario para guardar sucursalasdas
		 if (Auth::user()->is_admin)
		 {
		 	$documentos = TypeDocument::getDocumentos();

		 	return View::make('sucursales.create')->with('documentos',$documentos);
		 
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
			
		 if (Auth::user()->is_admin)
		 {

			$branch = Branch::createNew();
			// $branch->setAccountId(Session::get('account_id'));

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
				Session::flash('message',$branch->getErrorMessage());
				return Redirect::to('sucursales');
			}
				Session::flash('error',$branch->getErrorMessage());

			return Redirect::to('sucursales/create');		
		} 
		 return Redirect::to('/inicio');
	
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
			$branch = Branch::buscar($public_id);
			// $documentos = TypeDocument::getDocumentos();	
			return View::make('sucursales.show')->with('sucursal',$branch);
		} 
		return Redirect::to('/inicio');
		// return Response::json(array('branches'=> $branches));
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
			$branch = Branch::buscar($public_id);
			return View::make('sucursales.edit')->with('sucursal',$branch);
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
			// return Response::json(Input::all());
			$branch = Branch::buscar($public_id);

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

				// return var_dump($branch);

			if($branch->Actualizar())
			{
				Session::flash('message',$branch->getErrorMessage());
				return Redirect::to('sucursales');
			}
				Session::flash('error',$branch->getErrorMessage());

			return Redirect::to('sucursales');
		}
		return Redirect::to('inicio');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if (Auth::user()->is_admin)
		{
			$branch = Branch::find($id);
			if($branch->number_branch!=0)
			{
				$branch->delete();
				Session::flash('message','Se elimino satisfactoriamente a la sucursal');
			}
			else
			{
				Session::flash('error','No se puede eliminar a la casa matriz ');
			}
			
			return Redirect::to('sucursales');
		}
		return Redirect::to('inicio');
	}


}
