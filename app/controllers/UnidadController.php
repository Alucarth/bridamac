<?php

class UnidadController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
            $unidades =  Unidad::where('account_id', '=', Auth::user()->account_id)->select('public_id', 'name' )->get();
	    return View::make('unidades.index', array('unidades' => $unidades));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
	    return View::make('unidades.create'); 
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$unidad = Unidad::createNew();
                $unidad->setAccountId(Auth::user()->account_id);
                $unidad->setName(trim(Input::get('name')));
                $error = $unidad->guardar();
                if($error==""){
                    Session::flash('message','Unidad creada con éxito');
                    return Redirect::to('unidades');
                }
                else {
                    Session::flash('error', $error);                
                    return Redirect::to('unidades/create');
                }
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($publicId)
	{
            $unidad = Unidad::where('account_id', '=', Auth::user()->account_id)->where('public_id',$publicId)->first();	      
	    return View::make('unidades.edit')->with('unidad',$unidad); 
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($public_id)
	{	
            $unidad = Unidad::where('account_id', '=', Auth::user()->account_id)->where('public_id',$public_id)->first();	                  
            $unidad->setName(trim(Input::get('name')));
            $error = $unidad->guardar();
            if($error==""){
                Session::flash('message','Unidad actualizada con éxito');
                return Redirect::to('unidades');
            }
            else {
                Session::flash('error', $error);                
                return Redirect::to('unidades/edit/'.$publicId);
            }
	}
        
        	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function  destroy($public_id)
	{					
                $unidad = Unidad::where('account_id', '=', Auth::user()->account_id)->where('public_id',$public_id)->first();
		$unidad->delete();
		$message = "Unidad eliminada con éxito";
		Session::flash('message', $message);
		return Redirect::to('unidades');
	}
}
