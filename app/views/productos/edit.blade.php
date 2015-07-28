@extends('header')

@section('content')

{{Former::framework('TwitterBootstrap3')}}

<div class="panel panel-default">
	<div class="panel-heading">
		<div class="row">
			<div class="col-md-6">
				@if ($product)
					<h4>Editar Producto</h4>
				@else
					<h4>Nuevo Producto</h4>
				@endif
			</div>
		</div>
	</div>

	<div class="panel-body">

		{{ Former::open($url)->addClass('col-md-12 warn-on-exit')->method($method)->rules(array(
	  		
	  		'product_key' => 'required|match:/[a-zA-Z0-9.-]+/', 
	  		'notes' => 'required', 
	  		'cost' => 'required|Numeric', 
	  		
	  	)); }}

		@if ($product)
	    	{{ Former::populate($product) }}
		@endif

		<div class="row">
			<div class="col-md-6">

				{{ Former::legend('datos de Producto') }}

		      	{{ Former::text('product_key')->label('Código')->title('Solo se acepta Letras, Números y guión(-).') }}
		      	{{ Former::textarea('notes')->label('Nombre') }}

		      	{{ Former::text('cost')->label('Precio')->title('Solo se acepta números. Ejem: 500.00') }}

			</div>
			<div class="col-md-6">

				{{ Former::legend('Categoria') }}
		    	{{ Former::select('category_id')->label(' ')->fromQuery($categories, 'name', 'id') }}

			</div>
		</div>
		
		<center class="buttons">

		<a href="{{ url('productos/' . ($product ? $product->public_id : '')) }}" class="btn btn-default btn-lg"> Cancelar </a>
		<button type="submit" class="btn btn-success btn-lg dropdown-toggle"> Guardar </button>

		</center>

	{{ Former::close() }}
</div>
@stop