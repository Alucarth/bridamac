<?php 
class AccountController extends BaseController
{

	public function getStarted()
	{
		// if (Auth::check())
		// {
		// 	return Redirect::to('hello');	
		// }

  //   	$account = DB::table('accounts')->select('pro_plan_paid')->orderBy('id', 'desc')->first();
  //   	if($account)
  //   	{
		// 	$datePaid = $account->pro_plan_paid;
		// 	if (!$datePaid || $datePaid == '0000-00-00')
		// 	{
		// 		return 'Vuelva a intentarlo mas tarde';
		// 	}
		// }

		$account = new Account;
		$account->ip = Request::getClientIp();
		$account->account_key = str_random(RANDOM_KEY_LENGTH);
		$account->domain = trim(Input::get('domain'));
		$account->nit= trim(Input::get('nit'));
		$account->name = trim(Input::get('name'));
		$account->language_id = 1;

		$account->save();
		
		$user = new User;
		$username = trim(Input::get('username'));
		$user->username = $username . "@" . $account->domain;
		$user->password = trim(Input::get('password'));
		
		$user->confirmation_code = '';
		$user->is_admin = true;
		$account->users()->save($user);

		$data = array('guardado exitoso' => ' se registro correctamente hasta aqui todo blue :)' ,'datos'=>Input::all());
		$direccion = 'http://'.$account->domain.'.localhost/ipxdev/public/user/5';
		return Redirect::to($direccion);
		return Response::json($data);
	}
}