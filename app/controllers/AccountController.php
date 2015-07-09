<?php 
class AccountController extends BaseController
{

	public function getStarted()
	{
		return Response::json(Input::all());
	}
}