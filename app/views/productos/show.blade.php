@extends('header')
@section('title')Ver Producto @stop
 @section('head') @stop
@section('encabezado') PRODUCTOS Y SERVICIOS @stop
@section('encabezado_descripcion') Ver Producto/Servicio @stop 
@section('nivel') <li><a href="{{URL::to('productos')}}"><i class="fa fa-cube"></i>Productos y Servicios</a></li>
            <li class="active">Ver </li> @stop
          
@section('content') 

<div class="panel panel-default">
	<div class="panel-body">
				<div class="row">

			<div class="col-md-10">
  				<legend>{{ $product->notes }}</legend>
  			</div>

			<div class="col-md-1">
				<div class="pull-right">
					{{ Former::open('productos/bulk')->addClass('mainForm') }}
						<div style="display:none">
							{{ Former::text('id')->value($product->public_id) }}
						</div>

						<div class="btn-group">
							<button class="btn btn-info btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						    Opciones <span class="caret"></span>
						  </button>
						  <ul class="dropdown-menu">
						   	<li><a href="#">{{ link_to('productos/' . $product->public_id . '/edit', 'Editar Producto') }}</a></li>
							<li><a href="#" data-toggle="modal" data-target="#formConfirm">Borrar Producto</a></li>
						  </ul>
						</div>
				    {{ Former::close() }}	
				</div>
			</div>
		</div>

		<div class="row">

			<div class="col-md-8">
				<h4>
				<p><strong>Código Nº </strong> : {{ $product->product_key }}</p>
				<p><strong>Costo </strong> : {{ $product->cost }}</p>
				<p><strong>Categoría </strong> : {{ $product->category->name }}</p>

			</div>

		</div>

	</div>
</div>

<div class="modal fade" id="formConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="frm_title">Mensaje</h4>
      </div>
      <div class="modal-body" id="frm_body">
      	
      	<p>¿Está seguro de borrar al Producto?</p>

      </div>
      <div class="modal-footer">
        <button style='margin-left:10px;' type="button" class="btn btn-primary col-sm-2 pull-right" id="frm_submit">Si</button>
        <button type="button" class="btn btn-danger col-sm-2 pull-right" data-dismiss="modal" id="frm_cancel">No</button>
      </div>
    </div>
  </div>
</div>
	
<script type="text/javascript">

	$('#formConfirm').on('click', '#frm_submit', function(e) {
		$('.mainForm').submit();
	});

</script>

@stop