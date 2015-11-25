@extends('header')
@section('title') Gestión de Clientes @stop
@section('head') @stop
@section('encabezado') CLIENTES @stop
@section('encabezado_descripcion') Gestión de Clientes @stop 
@section('nivel') <li><a href="#"><i class="ion-person-stalker"></i> Clientes</a></li> @stop

@section('content')

<div class="panel panel-default">
  <div class="box-header with-border">
    <h3 class="box-title"><a href="{{ url('clientes/create') }}" class="btn btn-success" role="button">Nuevo Cliente &nbsp<span class="glyphicon glyphicon-plus-sign"></span></a></h3>
    <div class="box-tools pull-right">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for datatable -->
       
      
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="table-responsive">
       <table id="datatable" class="table table-striped table-hover" cellspacing="0" cellpadding="0" width="100%" style="margin-left:24px;">
			<thead>
		<tr>
                  <td>Id</td>
                  <td>Nombre</td>
                  <td>Nit</td>
                  <td>Teléfono</td>
                  <td style = "display:none">Acción</td>
              </tr>
		</thead>
		  
		<thead>
              <tr>
                  <th>Id</th>
                  <th>Nombre</th>
                  <th>Nit</th>
                  <th>Teléfono</th>
                  <th style = "display:block">&nbsp;&nbsp;&nbsp;&nbsp;Acción</th>
              </tr>
          </thead>
          <tbody>
		      
          @foreach($clients as $client)
              <tr>
                  <td>{{ $client->public_id }}</td>
                  <td><a href="{{URL::to('clientes/'.$client->public_id)}}">{{ $client->name }}</a></td>
                  <td><a href="{{URL::to('clientes/'.$client->public_id)}}">{{ $client->nit}}</a></td>
                  
                  <td>{{ $client->work_phone ? $client->work_phone : $client->phone }}</td>
            
                  <td>
                      {{ Form::open(['url' => 'clientes/'.$client->public_id, 'method' => 'delete', 'class' => 'deleteForm']) }}
                    <a class="btn btn-primary btn-xs" data-task="view" href="{{ URL::to("clientes/".$client->public_id) }}"  style="text-decoration:none;color:white;"><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a class="btn btn-warning btn-xs" href="{{ URL::to("clientes/".$client->public_id.'/edit') }}" style="text-decoration:none;color:white;"><i class="glyphicon glyphicon-edit"></i></a>
                    <!--<a class="btn btn-danger btn-xs" onclick="$(this).closest('form').submit()" type="submit" style="text-decoration:none;color:white;"><i class="glyphicon glyphicon-remove"></i></a>-->
                    {{ Form::close() }}
                  </td>
                  
              </tr>
              
          @endforeach
		
          </tbody>
        </table>
	  
  </div>
</div>

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
    } );
} );
  
</script>

@stop