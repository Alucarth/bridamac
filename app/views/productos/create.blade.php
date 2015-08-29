@extends('header')

@section('content')

{{Former::framework('TwitterBootstrap3')}}

<div class="panel panel-default">
	<div class="panel-heading">
		<div class="row">
			<div class="col-md-6">				
					<h4>Nuevo Producto</h4>				
			</div>
		</div>
	</div>


	<div class="panel-body">

		{{ Former::open('productos')->addClass('col-md-12 warn-on-exit')->method('POST')->rules(array(
	  		
	  		'product_key' => 'required|match:/[a-zA-Z0-9.-]+/', 
	  		'notes' => 'required', 
	  		'cost' => 'required|Numeric', 
	  		
	  	)); }}

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

		<a href="{{ url('productos/')}}" class="btn btn-default"> Cancelar </a>
		<button type="submit" class="btn btn-success dropdown-toggle"> Guardar </button>

		</center>

	{{ Former::close() }}
</div>
@stop