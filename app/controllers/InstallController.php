<?php

class InstallController extends BaseController {

	public function paso1 ()
	{
		$sucursales = Branch::where('account_id',Auth::user()->account->id);
		return View::make('install.paso1')->with('sucursales',$sucursales);
	}
	public function postpaso1()
	{
		return Response::json(Input::all());
	}
	public function paso2()
	{

	}
	public function postpaso2()
	{

	}
	public function paso3()
	{

	}
	public function postpaso3()
	{

	}

}