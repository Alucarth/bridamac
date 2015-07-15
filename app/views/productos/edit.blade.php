@extends('header')

@section('content')

{{Former::framework('TwitterBootstrap3')}}

<div class="row">

	{{ Former::open($url)->addClass('col-md-11 warn-on-exit')->method($method)->rules(array(
  		'product_key' => 'required|match:/[a-zA-Z0-9.-]+/', 
  		'notes' => 'required', 
  		'cost' => 'cost|required|Numeric', 
  	)); }}

	@if ($product)
    	{{ Former::populate($product) }}
	@endif
<hr>
	<div class="row">
		<div class="col-md-6">

		{{ Former::legend('datos Producto') }}

      	{{ Former::text('product_key')->label('Código')->title('Solo se acepta Letras, Números y guión(-).') }}
      	{{ Former::textarea('notes')->label('Nombre') }}

      	{{ Former::text('cost')->label('Precio')->title('Solo se acepta números. Ejem: 500.00') }}
      


		</div>
		<div class="col-md-6">

		{{ Former::legend('Categoria') }}
    	{{ Former::select('category_id')->label(' ')->fromQuery($categories, 'name', 'id') }}

		</div>
	</div>
	
<hr>

	<center class="buttons">

	<a href="{{ url('productos/' . ($product ? $product->public_id : '')) }}" class="btn btn-info" role="button">Cancelar</a>
	{{Former::submit('enviar')}}

	</center>

	{{ Former::close() }}
</div>
@stop