<?php

class ProductController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$products =  Product::join('categories', 'categories.id', '=', 'products.category_id')
				->where('products.account_id', '=', \Auth::user()->account_id)
				->where('categories.deleted_at', '=', null)
				->select('products.public_id', 'products.product_key', 'products.notes','products.is_product', 'products.cost','categories.name as category_name')->get();
		
	    return View::make('productos.index', array('products' => $products));
	}



	/**
	 * Show the form for creating a new product.
	 *
	 * @return Response
	 */
	public function create()
	{	       
	    if(Auth::check() || Session::has('account_id')){	    	
	    	$categories = Category::where('account_id',Auth::user()->account_id)->orderBy('public_id')->get();
			return View::make('productos.create')->with('categories',$categories);	    	
	    }
	    else{
	    	return Redirect::to('/');
	    }
	}
	
	/**
	 * Show the form for creating a new service 
	 *
	 * @return Response
	 */
	public function createservice()
	{
		// return "entro a servicios";
	    if(Auth::check() || Session::has('account_id')){	    	
	    	$categories = Category::where('account_id',Auth::user()->account_id)->orderBy('public_id')->get();
			return View::make('productos.createservice')->with('categories',$categories);	    	
	    }
	    else{
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
		return Response::json(Input::all());
		$product = Product::createNew();
		
		$product -> setProductKey(trim(Input::get('product_key')));
		$product -> setNotes(trim(Input::get('notes')));
		$product -> setCost(trim(Input::get('cost')));
		$product -> setQty(trim(Input::get('qty')));  
		$product -> setCategory(trim(Input::get('category_id')));
		$product->is_product =trim(Input::get('is_product'));
		$product->unidad_id =trim(Input::get('unidad_id')); 

			
		//$product -> setPublicId(trim(Input::get('')));
		//$product->setAccount(trim(Input::get('')));
		//$product->setUser(trim(Input::get('')));
		$resultado = $product->guardar();		

		if(!$resultado){
			$message = $product->is_product?"Producto creado con éxito":"Servicio creado con éxito";
			$product->save();						
		}
		else
		{
			$url = 'productos/create';
			Session::flash('error',	$resultado);
	        return Redirect::to($url)	        
	          ->withInput();	
		}
		if(Input::get('json')=="1")
			return json_encode($resultado);


		// $product ->	product_key =	;
		// $product ->	notes		=	trim(Input::get('notes'));
		// $product -> cost 		=	trim(Input::get(''));
		// $product ->	category_id =	trim(Input::get('category_id'));

		// $product ->	save();
		//if(null!=Input::get('json'));
	//		return Response::json(array());

		

		Session::flash('message',	$message);
		return Redirect::to('productos');

	}
	public function storage2()
	{
		//return "brian";
		//return $this->save();
		$productId = null;
		$product = Product::createNew();
		$product -> setProductKey(null);
		$product -> setNotes(null);
		$product -> setCost(null);
		$product -> setQty(null);
		$product -> setCategory(null);
		$product -> setPublicId(null);
		$product->setAccount(null);
		$product->setUser(null);
		$resultado = $product->guardar();
		print_r($product);echo "<br><br>";
		return $resultado;
		// $product ->	setProduct_key =	trim(Input::get('product_key'));
		// $product ->	notes		=	trim(Input::get('notes'));
		// $product -> cost 		=	trim(Input::get('cost'));
		// $product ->	category_id =	trim(Input::get('category_id'));

		$product ->	save();
		if(null!=Input::get('json'));
			return Response::json(array());

		$message = "Producto creado con éxito";

		Session::flash('message',	$message);
		return Redirect::to('productos/' . $product -> public_id);

	}


	private function save($publicId = null)
  	{
     	$productId =  $publicId ? Product::getPrivateId($publicId) : null;
	    $rules = ['product_key' => 'unique:products,product_key,' . $productId . ',id,account_id,' . Auth::user()->account_id. ',deleted_at,NULL'];     

		$messages = array(
		    'unique' => 'El Código de Producto ya existe.',
		);

	    $validator = Validator::make(Input::all(), $rules, $messages);

	    if ($validator->fails()) 
	    {
	        $url = $publicId ? 'productos/' . $publicId . '/edit' : 'productos/create';
	        return Redirect::to($url)
	        ->withErrors($validator)
	          ->withInput();
	    } 
	    else 
	    {
	        if ($publicId)
	        {
	         
	        }
	        else
	        {
	          $product = Product::createNew();
	        }

	      

			$message = $publicId ? 'Producto actualizado con éxito' : 'Producto creado con éxito';	

			Session::flash('message', $message);

	        return Redirect::to('productos');
	    }
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($publicId)
	{
		$product = Product::scope($publicId)->with('category')->firstOrFail();

	    $data = array(
	    	'title' => 'Ver Producto',
	    	'product' => $product
	    );

	    return View::make('productos.show', $data);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($publicId)
	{
		$product = Product::scope($publicId)->firstOrFail();
		$categories = Category::where('account_id',Auth::user()->account_id)->orderBy('public_id')->get();
		$data = [
		'product' => $product,
		'method' => 'PUT', 
		'url' => 'productos/' . $publicId, 
		'title' => 'Editar Producto',
		'categories' => $categories
		];
		// return Response::json($data);
		if($product->is_product)
		{

			return View::make('productos.edit', $data);
 
		}
 		return View::make('productos.editservice',$data);
		
	}

	public function getViewModel(){
		return 0;
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($publicId)
	{
		// return Response::json(Input::all());

		$product = Product::scope($publicId)->firstOrFail();
		$product->product_key = trim(Input::get('product_key'));
        $product->notes = trim(Input::get('notes'));
        $product->cost = trim(Input::get('cost'));
        $product->category_id = trim(Input::get('category_id'));
        $product->unidad_id =trim(Input::get('unidad_id'));
        
        $product->save();

		return Redirect::to('productos');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function bulk()
	{	
		$public_id = Input::get('public_id');	

		$product = Product::scope($public_id)->first();
		$product->delete();

		$message = "Producto eliminado con éxito";
		Session::flash('message', $message);
		return Redirect::to('productos');
	}



}
