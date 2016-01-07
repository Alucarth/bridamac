@extends('header')
@section('title') Gestión de Usuarios @stop
@section('head')
@stop
@section('encabezado') USUARIOS @stop
@section('encabezado_descripcion') Gestión de Usuarios @stop
@section('nivel')<li><a href="#"><i class="fa fa-users"></i> Usuarios</a></li>
             @stop
@section('content')


<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title"><a href="{{ url('usuarios/create') }}" class="btn btn-success" role="button">Crear Usuarios &nbsp<span class="glyphicon glyphicon-plus-sign"></span></a></h3>
  </div><!-- /.box-header -->
  <div class="table-responsive">


        <table id="datatable" class="table table-bordered table-hover" cellspacing="0" width="100%">
          <thead>
              <tr>
                  <td>Id</td>
                  <td>Usuario</td>
                  <td>Nombres</td>
                  <td>Apellidos</td>
                  <td>Correo</td>
                  <td style = "display:none">Acción</td>
              </tr>
          </thead>
			<thead>
              <tr>
                  <th>Id</th>
                  <th>Usuario</th>
                  <th>Nombres</th>
                  <th>Apellidos</th>
                  <th>Correo</th>
                  <th style = "display:block">&nbsp;Acción</th>
              </tr>
          </thead>
          <tbody>

          @foreach($usuarios as $usuario)
              <tr>
                  <td>{{  $usuario->public_id}}</td>
                  <td><a href="{{URL::to('usuarios/'.$usuario->public_id)}}"><?php $usu2 = explode('@', $usuario->username); echo $usu2[0] ?></a></td>
                  <td><a href="{{URL::to('usuarios/'.$usuario->public_id)}}">{{  $usuario->first_name }}</a></td>
                  <td>{{ $usuario->last_name }}</td>
                  <td>{{ $usuario->email}}</td>
				  <td>
                    <a class="btn btn-primary btn-xs" data-task="view" href="{{ URL::to("usuarios/".$usuario->public_id) }}"  style="text-decoration:none;color:white;"><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a class="btn btn-warning btn-xs" href="{{ URL::to("usuarios/".$usuario->public_id.'/edit') }}" style="text-decoration:none;color:white;"><i class="glyphicon glyphicon-edit"></i></a>
                  </td>

              </tr>
          @endforeach
          </tbody>
        </table>
  </div><!-- /.box-body -->

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
      "lengthMenu": [[30, 50, 100, -1], [30, 50, 100, "Todo"]],
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
