@extends('header')

@section('content') 

<div class="row">

	<div class="col-md-10 col-md-offset-1">
<br>	
	<div class="pull-right">
		{{ Former::open('productos/bulk')->addClass('mainForm') }}
		<div style="display:none">
			{{ Former::text('action') }}
			{{ Former::text('id')->value($product->public_id) }}
		</div>
<br>
		<div class="btn-group">
		  <button class="btn btn-default btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		    Opciones <span class="caret"></span>
		  </button>
		  <ul class="dropdown-menu">
		   	<li><a href="#">{{ link_to('productos/' . $product->public_id . '/edit', 'Editar Producto') }}</a></li>
			<!-- <li><a href="javascript:onArchiveClick()">Archivar Producto</a></li> -->
		  </ul>
		</div>

	    {{ Former::close() }}	

	</div>

	<div class="row">

		<div class="col-md-8">
			<table class="table" style="width:100%">
				<tr>
					<td><h3>{{ $product->notes }}</h3></td>				
				</tr>
			</table>

			
		</div>

	</div>

	<div class="row">

		<div class="col-md-3">
			<h4><br>
			<p><strong>Código Nº </strong> : {{ $product->product_key }}</p>
			<p><strong>Costo </strong> : {{ $product->cost }}</p>
			<p><strong>Categoría </strong> : {{ $product->category->name }}</p>

</h4>
		</div>

	</div>

	</div>

</div>

	
	<script type="text/javascript">

	// function onArchiveClick() {
	// 	$('#action').val('archive');
	// 	$('.mainForm').submit();
	// }

	</script>

@stop