@extends('header')
@section('title') Dosificaci&oacute;n @stop
@section('head') @stop
@section('encabezado') Dosificaci&oacute;n @stop
@section('encabezado_descripcion') Activaci&oacute;n @stop
@section('nivel') <li><a href="#"><i class="glyphicon glyphicon-home"></i> Sucursales</a></li> @stop

@section('content')


<div class="box">
   <div class="box-header with-border">
    <h3 class="box-title">
      <a href="{{ url('sucursales/create') }}" class="btn btn-success" role="button">Crear dosificaci&oacute;n &nbsp<span class="glyphicon glyphicon-plus-sign"></span></a></h3>
  </div><!-- /.box-header -->

  <div class="box-body">
        <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
              <tr>
                  <td>Id</td>
                  <td>Nombre</td>
                  <td>Teléfono</td>
                  <td>Fecha Limite Emisión</td>
                  <td>Ciudad</td>
                  <td style = "display:none">Acción</td>
              </tr>
          </thead>
			<thead>
              <tr>
                  <th>Id</th>
                  <th>Nombre</th>
                  <th>Teléfono</th>
                  <th>Fecha Limite Emisión</th>
                  <th>Ciudad</th>
                  <th style = "display:block">&nbsp;Acción</th>
              </tr>
          </thead>
          <tbody>

          @foreach($sucursales as $sucursal)
              <tr>
                  <td>{{ $sucursal->public_id}}</td>
                  <td>{{ $sucursal->name }}</td>
                  <td>{{ $sucursal->work_phone }}</td>
                  <td>{{ $sucursal->deadline }}</td>
                  <td>{{ $sucursal->city}}</td>

                  <!-- we will also add show, edit, and delete buttons -->
				  <td>
                    <a class="btn btn-primary btn-xs" data-task="view" href="{{ URL::to("sucursales/".$sucursal->public_id) }}"  style="text-decoration:none;color:white;"><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a class="btn btn-warning btn-xs" href="{{ URL::to("sucursales/".$sucursal->public_id.'/edit') }}" style="text-decoration:none;color:white;"><i class="glyphicon glyphicon-edit"></i></a>
                  </td>

              </tr>
          @endforeach
          </tbody>
        </table>
  </div><!-- /.box-body -->
  <div class="box-footer">

  </div><!-- box-footer -->
</div><!-- /.box -->








  <script type="text/javascript">
$(document).ready(function() {
    $('#datatable thead td').each( function () {
        var title = $('#datatable thead td').eq( $(this).index() ).text();
		var tamaño = 10;
		if (title == 'Nº') {
		  tamaño = 3;
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
      "language": {
		"zeroRecords": "No se encontro el registro",
        "sLengthMenu":    "&nbsp;&nbsp;&nbsp;Mostrar _MENU_ registros",
        "sZeroRecords":   "&nbsp;&nbsp;&nbsp;No se encontraron resultados",
        "sEmptyTable":    "&nbsp;&nbsp;&nbsp;Ningún dato disponible en esta tabla",
        "info": "&nbsp;&nbsp;&nbsp;Mostrando página _PAGE_ de _PAGES_",
        "infoEmpty": "&nbsp;&nbsp;&nbsp;No hay registros disponibles",
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
