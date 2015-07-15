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
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//formulario para guardar sucursal
	    return View::make('sucursales.edit');

	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		// $branch = Branch::createNew();
		// $branch->name = trim(Input::get('branch_name'));
  //       $branch->branch_type_id = trim(Input::get('branch_type_id'));

		// $branch->address2 = trim(Input::get('address2'));
  //       $branch->address1 = trim(Input::get('address1'));
  //       $branch->work_phone = trim(Input::get('work_phone'));
		// $branch->city = trim(Input::get('city'));
		// $branch->state = trim(Input::get('state'));

  //       $branch->deadline = Input::get('deadline');
        
  //       $branch->key_dosage = trim(Input::get('dosage'));

  //       $branch->economic_activity = trim(Input::get('economic_activity'));

  //       $branch->number_process = trim(Input::get('number_process'));
  //       $branch->number_autho = trim(Input::get('number_autho'));
  //       $branch->key_dosage = trim(Input::get('key_dosage'));   
           
	 //    $branch->law = trim(Input::get('law'));
  //       $branch->type_third = trim(Input::get('third_view'));
  //       $branch->invoice_number_counter = 1;
		// $branch->save();



		return Response::json(Input::all());
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


}
