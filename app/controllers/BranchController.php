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

		$branches = Account::find(Auth::user()->account_id)->branches;
		return View::make('sucursales.index')->with('sucursales',$branches);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//formulario para guardar sucursalasdas
		 if (Auth::check())
		 {
		 	return View::make('sucursales.create');
		 
		 } else if (Session::has('account_id'))
		 {
			return View::make('sucursales.create');
		 
		 }else
		 {
		 	return Redirect::to('/');
		 }

	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		// $account = find(Input::get('account_id'));
		$branch = Branch::createNew();
		// $branch->account_id = Input::get('account_id');
		$branch->name = trim(Input::get('branch_name'));
        $branch->branch_type_id = trim(Input::get('branch_type_id'));

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

		// return Response::json(Input::all());
		return Redirect::to('sucursales');
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
		$branch = Branch::buscar($public_id);

		return View::make('sucursales.show')->with('sucursal',$branch);
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

		$branch = Branch::buscar($public_id);
		return View::make('sucursales.edit')->with('sucursal',$branch);

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
		$branch = Branch::buscar($public_id);
		$branch->account_id = Input::get('account_id');
		$branch->name = trim(Input::get('name'));
        $branch->branch_type_id = trim(Input::get('branch_type_id'));

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

		return Redirect::to('sucursales');
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
			$branch = Branch::find($id);
		$branch->delete();
		return Redirect::to('sucursales');
	}


}
