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
				->select('products.public_id', 'products.product_key', 'products.notes', 'products.cost','categories.name as category_name')->get();

	    return View::make('productos.index', array('products' => $products));
	}



	/**
	 * Show the form for creating a new resource.
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
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//return $this->save();
		$product = Product::createNew();

		$product -> setProductKey(trim(Input::get('product_key')));
		$product -> setNotes(trim(Input::get('notes')));
		$product -> setCost(trim(Input::get('cost')));
		$product -> setQty(trim(Input::get('qty')));  
		$product -> setCategory(null);
		//$product -> setPublicId(trim(Input::get('')));
		//$product->setAccount(trim(Input::get('')));
		//$product->setUser(trim(Input::get('')));
		$resultado = $product->guardar();

		if(!$resultado){
			$message = "Producto creado con éxito";
		}
		else
		{
			$url = 'productos/create';
			Session::flash('error',	$resultado);
	        return Redirect::to($url)	        
	          ->withInput();	
		}


		// $product ->	product_key =	;
		// $product ->	notes		=	trim(Input::get('notes'));
		// $product -> cost 		=	trim(Input::get(''));
		// $product ->	category_id =	trim(Input::get('category_id'));

		// $product ->	save();
		if(null!=Input::get('json'));
			return Response::json(array());

		

		Session::flash('message',	$message);
		return Redirect::to('productos/' . $product -> public_id);

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
	          $product = Product::scope($publicId)->firstOrFail();
	        }
	        else
	        {
	          $product = Product::createNew();
	        }

	        $product->product_key = trim(Input::get('product_key'));
	        $product->notes = trim(Input::get('notes'));
	        $product->cost = trim(Input::get('cost'));
	        $product->category_id = trim(Input::get('category_id'));
	        $product->save();


			$message = $publicId ? 'Producto actualizado con éxito' : 'Producto creado con éxito';	

			Session::flash('message', $message);

	        return Redirect::to('productos/' . $product->public_id);
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
		$data = [
		'product' => $product,
		'method' => 'PUT', 
		'url' => 'productos/' . $publicId, 
		'title' => 'Editar Producto'
		];

		$data = array_merge($data, self::getViewModel()); 
		return View::make('productos.edit', $data);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($publicId)
	{
		return $this->save($publicId);
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
