@extends('header')

@section('content') 

<div class="panel panel-default">
  	<div class="panel-heading">
		<div class="row">

			<div class="col-md-8">
  				<h4>Gestion de Productos</h4>
  			</div>

			<div class="col-md-4">
		      	<div class="pull-right">
		      		<a href="{{ url('productos/create') }}" class="btn btn-success" role="button">Nuevo Producto</a>
				</div>
			</div>

		</div>	
	</div>

  	<div class="panel-body">

		<table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
              <tr>
                  <td>Código</td>
                  <td>Nombre</td>
                  <td>Precio</td>
                  <td>Categoría</td>
                  <td>Acción</td>
              </tr>
          </thead>
          <tbody>

          @foreach($products as $product)
              <tr>
                  <td>{{ $product->product_key }}</td>
                  <td>{{ $product->notes }}</td>
                  <td>{{ $product->cost }}</td>
                  <td>{{ $product->category_name }}</td>

                  <td>
                    {{ Former::open('productos/bulk')->addClass('mainForm') }}
						<div style="display:none">
							{{ Former::text('id')->value($product->public_id) }}
						</div>
	                    <div class="dropdown">
							<button class="btn btn-info btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                        Opciones
	                        <span class="caret"></span>
	                      	</button>
	                      	<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
	                        	<li><a href="{{ URL::to('productos/'. $product->public_id) }}">Ver producto</a></li>
	                       		<li><a href="{{ URL::to('productos/'. $product->public_id.'/edit') }}">Editar Cleinte</a></li>  
								<li><a href="#" data-toggle="modal" data-target="#formConfirm">Borrar producto</a></li>
	                      	</ul>
	                    </div>
                     {{ Form::close() }}             
                  </td>
              </tr>
          @endforeach
          </tbody>
        </table>

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
      	
      	<p>¿Está seguro de borrar al producto?</p>

      </div>
      <div class="modal-footer">
        <button style='margin-left:10px;' type="button" class="btn btn-primary col-sm-2 pull-right" id="frm_submit">Si</button>
        <button type="button" class="btn btn-danger col-sm-2 pull-right" data-dismiss="modal" id="frm_cancel">No</button>
      </div>
    </div>
  </div>
</div>

  <script type="text/javascript">

    $(document).ready( function () {
    $('#datatable').DataTable(
        {
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontro el registro",
            "info": "Mostrando pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtered from _MAX_ total records)"
        }
     }
      );

    } );

	$('#formConfirm').on('click', '#frm_submit', function(e) {
		$('.mainForm').submit();
	});

  </script>

@stop