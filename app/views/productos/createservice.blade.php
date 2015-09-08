@extends('header')

@section('content')

{{Former::framework('TwitterBootstrap3')}}

<div class="panel panel-default">
	<div class="panel-heading">
		<div class="row">
			<div class="col-md-10">				
					<h4>Nuevo Servicio</h4>	
								
			</div>
			
		</div>
	</div>


	<div class="panel-body">

		{{ Former::open('productos')->addClass('col-md-12 warn-on-exit')->method('POST')->rules(array(
	  		
	  		'product_key' => 'required|match:/[a-zA-Z0-9.-]+/', 
	  		'notes' => 'required', 
	  		'cost' => 'required|Numeric', 
	  		
	  	)); }}
	  		<input name="is_product" type="hidden" value="0">
	  		<input name="unidad_id" type="hidden" value="2">
		<div class="row">
			<div class="col-md-6">

				{{ Former::legend('datos de Servicio') }}

		      	{{ Former::text('product_key')->label('Código')->title('Solo se acepta Letras, Números y guión(-).') }}
		      	{{ Former::textarea('notes')->label('Nombre') }}

		      	{{ Former::text('cost')->label('Precio')->title('Solo se acepta números. Ejem: 500.00') }}

			</div>
			<div class="col-md-6">

				{{ Former::legend('Categoria') }}
				<div class="row">
					
					<div class="col-md-9">
						 <select class="form-control" name="category_id" id="category_id">
						  	@foreach($categories as $categoria)
						    <option value="{{$categoria->id}}">{{$categoria->name}}</option>
						    
							@endforeach
							
						  </select>	
					</div>
					<div class="col-md-3">
						<a href="{{ url('categorias')}} " class="btn btn-primary" > Categorias </a>	
					</div>
				</div>	
				 
		    	{{-- {{ Former::select('category_id')->label(' ')->fromQuery($categories, 'name', 'id') }} --}}



			</div>
		</div>
		
		<center class="buttons">

		
		<button type="submit" class="btn btn-success dropdown-toggle"> Guardar </button>

		</center>

	{{ Former::close() }}
</div>
@stop