<?php

class CategoryController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$table = Datatable::table()
	      ->addColumn('Código','Nombre')
	      ->setUrl(route('api.categorias'))
	      ->noScript();

	    return View::make('categorias.view', array('table' => $table));
	}

	public function getDatatable()
	{	
		$categories =  Category::where('categories.account_id', '=', Auth::user()->account_id)
				       			->select('public_id', 'name' );

	    return Datatable::query($categories)
        ->addColumn('public_id', function($model) {  return $model->public_id; })
	    ->addColumn('name', function($model) { return link_to('categorias/' . $model->public_id . '/edit', $model->name); })
	  	->searchColumns('public_id', 'name')
	    ->orderColumns('public_id', 'name')
	    ->make();
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$data = [
	      'category' => null,
	      'method' => 'POST',
	      'url' => 'categorias', 
	      'title' => 'Nueva Categoría'
	    ];
	    return View::make('categorias.edit', $data); 
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

	    $validator = Validator::make(Input::all(), $rules);

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

		    if ($publicId) 
			{
				// Activity::editCategory($category);
				Session::flash('message', 'Categoría actualizada con éxito');
			} 
			else 
			{
				// Activity::createCategory($category);
				Session::flash('message', 'Categoría creada con éxito');
			}

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
		$category = Category::scope($publicId)->firstOrFail();
	    $data = [
	      'category' => $category,
	      'method' => 'PUT', 
	      'url' => 'categorias/' . $publicId, 
	      'title' => 'Editar Categoría'
	    ];
  
	    return View::make('categorias.edit', $data); 
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

		$categories = Category::scope($ids)->get();
		foreach ($categories as $category) 
		{			
            if ($action == 'restore')
            {
                $category->restore();
                $category->is_deleted = false;
                $category->save();
            }
            else
            {
                if ($action == 'archive')
                {
                    $category->is_deleted = true;
                    $category->save();
                }
            }			
		}

		$field = count($categories) == 1 ? '' : 's';		
		$message = "Categoría" . $field . " actualizada " . $field . "con éxito";

		Session::flash('message', $message);

		return Redirect::to('categorias');
	}


}
