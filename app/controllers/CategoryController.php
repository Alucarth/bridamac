<?php

class CategoryController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$categories =  Category::where('categories.account_id', '=', Auth::user()->account_id)
				       			->select('public_id', 'name' )->get();

	    return View::make('categorias.index', array('categories' => $categories));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
	    return View::make('categorias.create'); 
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

	private function save($publicId = false)
	{
	    $categoryId =  $publicId ? Category::getPrivateId($publicId) : null;
	    $rules = ['name' => 'unique:categories,name,' . $categoryId . ',id,account_id,' . Auth::user()->account_id];     

	   	$messages = array(
		    'unique' => 'El Nombre de Categoría ya existe.',
		);

	    $validator = Validator::make(Input::all(), $rules, $messages);

	    if ($validator->fails()) 
	    {
	        $url = $publicId ? 'categorias/' . $publicId . '/edit' : 'categorias/create';
	        return Redirect::to($url)
	          ->withErrors($validator)
	          ->withInput();
	    } 
	    else 
	    {
		    if ($publicId)
		    {
		      $category = Category::scope($publicId)->firstOrFail();
		    }
		    else
		    {
		      $category = Category::createNew();
		    }

		    $category->name = trim(Input::get('name'));
		    $category->save();

		    $message = $publicId ? 'Categoría actualizada con éxito' : 'Categoría creada con éxito';	

		    Session::flash('message', $message);

		    return Redirect::to('categorias');  
	    }
	}



	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($publicId)
	{
		$categoria = Category::scope($publicId)->first();
	    // $data = [
	    //   'category' => $category,
	    //   'method' => 'PUT', 
	    //   'url' => 'categorias/' . $publicId, 
	    //   'title' => 'Editar Categoría'
	    // ];
  
	    return View::make('categorias.edit')->with('categoria',$categoria); 
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($public_id)
	{	

		return $this->save($public_id);
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
		$category = Category::scope($public_id)->first();

		$getProductCount = Product::scope()->where('category_id', '=', $category->id)->count();
		// return  Response::json($getProductCount);
		if ($getProductCount > 0) {	

			$field = count($getProductCount) == 1 ? '' : 's';
			$field2 = count($getProductCount) == 1 ? ' esta' : ' estan';		
		
			$message = $getProductCount. " producto " . $field . $field2 . " categorizado" . $field . " como " . $category->name;

			Session::flash('error', $message);
			return Redirect::to('categorias');
		}
		else{
			$category->delete();
			$message = "Categoría eliminada con éxito";
			Session::flash('message', $message);
			return Redirect::to('categorias');
		}
	}


}
