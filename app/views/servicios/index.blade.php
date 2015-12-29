@extends('header')
@section('title')Gestión de Servicios @stop
  @section('head') @stop
@section('encabezado') SERVICIOS @stop
@section('encabezado_descripcion') Gestión de Servicios @stop
@section('nivel') <li><a href="#"><i class="fa fa-cube"></i> Servicios</a></li>
            @stop

@section('content')

<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">
      <a href="{{ url('servicios/create') }}" class="btn btn-success" role="button"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span>&nbsp;Nuevo Servicio</a>
      <!-- <a href="{{ url('producto/createservice') }}" class="btn btn-success" role="button"> <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> Nuevo Servicio</a><br></h3>

      <a href="{{ url('categorias')}}" class="btn btn-primary" > Categorías </a>
      <a href="{{ url('unidades')}}" class="btn btn-primary" > Unidades </a> -->
    <!-- </div> -->
  </div>

  <div class="table-responsive">

      <table id="datatable" class="table table-striped table-hover" cellspacing="0" cellpadding="0" width="100%">
          <thead>
              <tr>
                  <td>Código</td>
                  <td>Nombre</td>
                  <td>Precio</td>
                  <td>Categoría</td>
                  <td style="display:none;">Acción</td>
              </tr>
          </thead>
            <thead>
              <tr>
                  <th>Código</th>
                  <th>Nombre</th>
                  <th>Precio</th>
                  <th>Categoría</th>
                  <th style="display:block;">&nbsp;&nbsp;&nbsp;&nbsp;Acción</th>
              </tr>
          </thead>
          <!-- <tbody>

          @foreach($products as $product)
              <tr>
                  <td>{{ $product->product_key }}</td>
                  <td><a href="{{URL::to('productos/'.$product->public_id)}}">{{ $product->notes }}</a></td>
                  <td>{{ $product->cost }}</td>
                  <td>{{ $product->is_product?'producto':'servicio'}}</td>
                  <td><a href="{{URL::to('categorias/'.$product->category_id.'/edit')}}">{{ $product->category_name }}</a></td>

                  <td>
                  {{ Form::open(['url' => 'productos/'.$product->public_id, 'method' => 'delete', 'class' => 'deleteForm']) }}
                      <a class="btn btn-primary btn-xs" data-task="view" href="{{ URL::to("productos/".$product->public_id) }}"  style="text-decoration:none;color:white;"><i class="glyphicon glyphicon-eye-open"></i></a>
                      <a class="btn btn-warning btn-xs" href="{{ URL::to("productos/".$product->public_id.'/edit') }}" style="text-decoration:none;color:white;"><i class="glyphicon glyphicon-edit"></i></a>
                  {{ Form::close() }}
                  </td>

              </tr>
          @endforeach
          </tbody> -->
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
$(document).ready(function() {
     //Setup - add a text input to each footer cell
    $('#datatable thead td').each( function () {
        var title = $('#datatable thead td').eq( $(this).index() ).text();
		//alert(title);
		var tamaño = 10;
		if (title == 'Código') {
		  tamaño = 5;
		  $(this).html('<div class="form-group  has-feedback"><input size="'+tamaño+'" placeholder="'+title+'" type="text" class="form-control" id="place"><span style="text-decoration:none;color:#D3D3D3;" class="glyphicon glyphicon-search form-control-feedback"></span></div>');
		}

		else{
		tamaño = 10;
        $(this).html('<div class="form-group has-feedback"><input size="'+tamaño+'" placeholder="'+title+'" type="text" class="form-control" id="place"><span style="text-decoration:none;color:#D3D3D3;" class="glyphicon glyphicon-search form-control-feedback"></span></div>' );
		}
    } );

    // DataTable
	$('#datatable').DataTable(
      {
        ajax: {
      url: '{{ URL::to('getServicios') }}',
      dataSrc: 'data'
  },
  columns: [
        { data: 'product_key' },
        { data: 'notes' },
        { data: 'cost' },
        { data: 'category_name' },
        { data: 'accion' }
      ],
      "deferRender": true,
      "lengthMenu": [[30, 50, 100, -1], [30, 50, 100, "Todo"]],
      "language": {
		"zeroRecords": "&nbsp;&nbsp;&nbsp;No se encontro el registro",
        "sLengthMenu":    "&nbsp;&nbsp;&nbsp;Mostrar _MENU_ registros",
        "sZeroRecords":   "&nbsp;&nbsp;&nbsp;No se encontraron resultados",
        "sEmptyTable":    "&nbsp;&nbsp;&nbsp;Ningún dato disponible en esta tabla",
        "info": "&nbsp;&nbsp;&nbsp;Mostrando página _PAGE_ de _PAGES_",
        "infoEmpty": "No hay registros disponibles",
        "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
        "sUrl":           "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":    "Último",
            "sNext":    "Siguiente",
            "sPrevious": "Anterior"
        }

    }
   });
   $('#formConfirm').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      var public_id = button.data('id');
      var name = button.data('name');
      var modal = $(this);
      modal.find('.modal-body').text('¿ Está seguro de borrar ' + name + ' ?');
      document.getElementById("public_id").value = public_id;
  });

  var table = $('#datatable').DataTable();

   // Apply the search
   table.columns().every( function () {
       var that = this;

       $( 'input', this.header() ).on( 'keyup change', function () {
           if ( that.search() !== this.value ) {
               that
                   .search( this.value )
                   .draw();
           }
       } );
   $("#datatable_filter").css("display", "none");
   $("#datatable_length").css("display", "none");
   } );
} );

</script>

@stop
