<?php

class InstallController extends BaseController {

	public function paso1 ()
	{
		// $sucursales = Branch::where('account_id',Auth::user()->account->id);
		return View::make('install.paso1');
	}
	public function postpaso1()
	{
		$branch = Branch::createNew();
		$branch->account_id = Input::get('account_id');
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
		return Redirect::to('comensar/2');
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
		return Response::json(Input::all());
	}
	public function paso3()
	{

	}
	public function postpaso3()
	{

	}

}