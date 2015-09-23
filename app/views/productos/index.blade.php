@extends('header')
@section('title')Gestión Productos y Servicios @stop
  @section('head') @stop
@section('encabezado') PRODUCTOS Y SERVICIOS @stop
@section('encabezado_descripcion') Gestión de Productos y Servicios @stop 
@section('nivel') <li><a href="#"><i class="fa fa-cube"></i> Productos y Servicios</a></li>
            @stop


@section('content') 



<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">
      <a href="{{ url('productos/create') }}" class="btn btn-success" role="button"><span class="glyphicon glyphicon-compressed" aria-hidden="true"></span> Nuevo Producto</a>
      <a href="{{ url('producto/createservice') }}" class="btn btn-success" role="button"> <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> Nuevo Servicio</a><br></h3>
    <div class="box-tools pull-right">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example -->
      <a href="{{ url('categorias')}} " class="btn btn-primary" > Categorías </a> 
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
    
      <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
              <tr>
                  <td>Código</td>
                  <td>Nombre</td>
                  <td>Precio</td>
                  <td>Tipo</td>
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
                  <td>{{ $product->is_product?'producto':'servicio'}}</td>
                  <td>{{ $product->category_name }}</td>
                  <td>
                      <div class="dropdown">
                          <button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Opciones
                          <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <li><a href="{{ URL::to('productos/'. $product->public_id)}}">Ver </a></li>
                            <li><a href="{{ URL::to('productos/'. $product->public_id.'/edit') }}">Editar</a></li>  
                          
                          </ul>
                      </div>
                  </td>
              </tr>
          @endforeach
          </tbody>
        </table>

  </div><!-- /.box-body -->
  <div class="box-footer">
  
  </div><!-- box-footer -->
</div><!-- /.box -->



<div class="modal fade" id="formConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="frm_title">Borrar Producto</h4>
      </div>
      {{ Form::open(array('url' => 'productos/bulk','id' => 'formDelete')) }}
      <div style="display:none">
        {{ Former::text('public_id') }}
      </div>
      <div class="modal-body" id="frm_body"></div>
      <div class="modal-footer">
        {{ Form::submit('Si',array('class' => 'btn btn-primary col-sm-2 pull-right','style' => 'margin-left:10px;'))}}
        <button type="button" class="btn btn-danger col-sm-2 pull-right" data-dismiss="modal" id="frm_cancel">No</button>      
      </div>
      {{ Form::close()}}
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
   });
  });

  $('#formConfirm').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      var public_id = button.data('id');
      var name = button.data('name');
      var modal = $(this);
      modal.find('.modal-body').text('¿ Está seguro de borrar ' + name + ' ?');
      document.getElementById("public_id").value = public_id; 
  });

  </script>

@stop