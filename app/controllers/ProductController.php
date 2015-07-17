<?php

class ProductController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$table = Datatable::table()
	      ->addColumn('Código','Nombre','Precio','Categoría')
	      ->setUrl(route('api.productos'))
	      ->noScript();

	    return View::make('productos.view', array('table' => $table));
	}

	public function getDatatable()
	{	
		$products =  Product::join('categories', 'categories.id', '=', 'products.category_id')
				->where('products.account_id', '=', \Auth::user()->account_id)
				->where('categories.deleted_at', '=', null)
				->select('products.public_id', 'products.product_key', 'products.notes', 'products.cost','categories.name as category_name');

	    return Datatable::query($products)
        ->addColumn('product_key', function($model) { return link_to('productos/' . $model->public_id, $model->product_key); })
        ->addColumn('notes', function($model) { return nl2br(Str::limit($model->notes, 50)); })
        ->addColumn('cost', function($model) { return $model->cost; })
        ->addColumn('name', function($model) { return $model->category_name; })
	    ->searchColumns('product_key', 'name')
	    ->orderColumns('product_key', 'name')
	    ->make();
	}

	// public function getDatatable2()
 // 	{     
 //      $products = $this->ProductRepo->find(Input::get('sSearch'));

 //        return Datatable::query($products)
 //          ->addColumn('checkbox', function($model) { return '<input type="checkbox" name="ids[]" value="' . $model->public_id . '">'; })
 //          ->addColumn('product_key', function($model) { return link_to('products/' . $model->public_id, $model->product_key); })
 //          ->addColumn('notes', function($model) { return nl2br(Str::limit($model->notes, 50)); })
 //          ->addColumn('cost', function($model) { return Utils::formatMoney($model->cost, 1); })
 //          ->addColumn('name', function($model) { return nl2br($model->category_name); })


 //          ->addColumn('dropdown', function($model) 
 //          { 
 //            $str = '<div class="btn-group tr-action" style="visibility:hidden;">
 //                <button type="button" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">
 //                  '.trans('texts.select').' <span class="caret"></span>
 //                </button>
 //                <ul class="dropdown-menu" role="menu">';
 //                if (!$model->deleted_at || $model->deleted_at == '0000-00-00') {               
 //                $str .= '<li><a href="' . URL::to('products/'.$model->public_id) . '/edit">'.uctrans('texts.edit_product').'</a></li>                
 //                         <li class="divider"></li>
 //                         <li><a href="javascript:archiveEntity(' . $model->public_id. ')">'.trans('texts.delete_product').'</a></li>';
 //                        }else {
 //                           $str .= '<li><a href="javascript:restoreEntity(' . $model->public_id. ')">'.trans('texts.restore_product').'</a></li>';
 //                            }
 //                        $str .= '</ul></div>';
 //                      return $str;
 //          })        
 //          ->make();         
 //    }


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
	    $data = [
	      	'product' => null,
	      	'method' => 'POST',
	      	'url' => 'productos', 
	      	'title' => 'Nuevo Producto'
	    ];

		    $data = array_merge($data, self::getViewModel()); 
		    return View::make('productos.edit', $data);      
	}

	private static function getViewModel()
	  {
	    return [   

	      'categories' => Category::where('account_id',Auth::user()->account_id)->orderBy('public_id')->get()
	      
	    ];
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		return $this->save();
	}

	private function save($publicId = null)
  	{
     	$productId =  $publicId ? Product::getPrivateId($publicId) : null;
	    $rules = ['product_key' => 'unique:products,product_key,' . $productId . ',id,account_id,' . Auth::user()->account_id];     

	    $validator = Validator::make(Input::all(), $rules);

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

	        if ($publicId) 
	        {	
	        	// Activity::editProduct($product);
	          	Session::flash('message', 'Producto actualizado con éxito');
	        } 
	        else 
	        {
	          	// Activity::createProduct($product);
	          	Session::flash('message', 'Producto creado con éxito');
	        }

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
		$product = Product::scope($publicId)->firstOrFail();
	    $category = Category::where('account_id',Auth::user()->account_id)->where('id',$product->category_id)->orderBy('public_id')->firstOrFail();
	    $product->category_name = $category->name;

	    $data = array(
	      'showBreadcrumbs' => false,
	      'product' => $product,
	      'title' => 'Ver Producto'
	    );

	    $data = array_merge($data, self::getViewModel()); 
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
	public function update($id)
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
		$action = Input::get('action');
		$ids = Input::get('id') ? Input::get('id') : Input::get('ids'); 

		$products = Product::scope($ids)->get();
		foreach ($products as $product) 
		{     
		        if ($action == 'restore')
		        {
		            $product->restore();
		            $product->save();
		        }
		        else
		        {
		            if ($action == 'archive')
		            {
						// $product->delete();
		            }
		            
		        }     
		}

		$field = count($products) == 1 ? '' : 's';   
		$message = "Producto" . $field . " actualizado " . $field . "con éxito";

		Session::flash('message', $message);

		return Redirect::to('productos');
	}



}
