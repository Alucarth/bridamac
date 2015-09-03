<?php

class AuthController extends BaseController {

    public function showLogin()
    {        
        // Verificamos que el usuario no esté autenticado
        if (Auth::check())
        {
            // Si está autenticado lo mandamos a la raíz donde estara el mensaje de bienvenida.
            return Redirect::to('/');
        }
        // Mostramos la vista login.blade.php (Recordemos que .blade.php se omite.)
        return View::make('users.login');
    }

    public function postLogin($cuenta)
    {
        // Guardamos en un arreglo los datos del usuario
        $userdata = array(
            'username' => Input::get('username').'@'.$cuenta,
            'password'=> Input::get('password')
        );
        // Validamos los datos y además mandamos como un segundo parámetro la opción de recordar el usuario.
        if(Auth::attempt($userdata, Input::get('remember-me')))
        {
            // se valida informacion  sobre la autentificacion y tambien hay que verificar que este sea admin XD
            // if(!Auth::user()->account->confirmed)
            // {
            //     return Redirect::to('/');
            // }
            return Redirect::to('sucursal');


        }
        // En caso de que la autenticación haya fallado manda un mensaje al formulario de login y también regresamos los valores enviados con withInput().
        return Redirect::to('login')
                    ->with('error_login', 'Tus datos son incorrectos')
                    ->withInput();
    }

    public function logOut()
    {
        Auth::logout();
        return Redirect::to('login')
                    ->with('error_login', 'Tu sesión ha sido cerrada.');
    }
}