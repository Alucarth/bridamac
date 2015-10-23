<?php

class PosController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$cuenta = Account::find(Auth::user()->account_id);
    	// $branch = DB::table('branches')->where('account_id',Auth::user()->account_id)->where('id','=',Auth::user()->branch_id)->first();	
		
		// $user->branch = $branch->name;
   		$branches =$cuenta->branches;
   		// return $branches;
   		// $categories = DB::table('categories')->where('account_id',Auth::user()->account_id)->get(array('name'));
   		$categories = $cuenta->categories;
   		// return $categories;
   		$cats = $categories;    	
    	
    	$categories2 = $cuenta->categories;
   		// $categories2 = DB::table('categories')->where('account_id',Auth::user()->account_id)->get();
    	
    	$products2 =$cuenta->products;
    	// $products2 = DB::table('products')->where('account_id','=',Auth::user()->account_id)->get();

		$aux=array();

    	foreach ($categories2 as $category) 
    	{
    		foreach ($products2 as $product) 
	    	{		

				$pts = DB::table('products')->where('category_id',$category->id)->where('account_id','=',Auth::user()->account_id)->get(array('id','product_key','notes','cost'));
				$prod = array($category->name => $pts);	
	    	}
			$aux += $prod;
    	}

    	$mensaje = array(
    			'productos'=> $aux,
    			'categorias' => $categories,
    			'first_name'=>Auth::user()->first_name,
    			'last_name'=>Auth::user()->last_name,
    			'branch'=>$branches
    		);

    	return Response::json($mensaje);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
