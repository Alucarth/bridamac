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
                  <td>Número</td>
                  @if(Utils::campoExtra() == '131555028')
                  <td>Mátricula</td>
                  @endif
                  <td>Nombre</td>
                  <td>Nit</td>
                  <td>Teléfono</td>

                  <td style = "display:none">Acción</td>
              </tr>
		</thead>

		<thead>
              <tr>
                  <th>Número</th>
                  @if(Utils::campoExtra() == '131555028')
                    <th>Mátricula</th>
                  @endif
                  <th>Nombre</th>
                  <th>Nit</th>
                  <th>Teléfono</th>
                  <th style = "display:block">&nbsp;&nbsp;&nbsp;&nbsp;Acción</th>
              </tr>
          </thead>
             <!-- <tbody>

          @foreach($clients as $client)
              <tr>
                  <td>{{ $contador++ }}</td>
                  <td><a href="{{URL::to('clientes/'.$client->public_id)}}">{{ $client->name }}</a></td>
                  <td><a href="{{URL::to('clientes/'.$client->public_id)}}">{{ $client->nit}}</a></td>

                  <td>{{ $client->work_phone ? $client->work_phone : $client->phone }}</td>

                  <td>
                      {{ Form::open(['url' => 'clientes/'.$client->public_id, 'method' => 'delete', 'class' => 'deleteForm']) }}
                    <a class="btn btn-primary btn-xs" data-task="view" href="{{ URL::to("clientes/".$client->public_id) }}"  style="text-decoration:none;color:white;"><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a class="btn btn-warning btn-xs" href="{{ URL::to("clientes/".$client->public_id.'/edit') }}" style="text-decoration:none;color:white;"><i class="glyphicon glyphicon-edit"></i></a>
                    <a class="btn btn-danger btn-xs" onclick="$(this).closest('form').submit()" type="submit" style="text-decoration:none;color:white;"><i class="glyphicon glyphicon-remove"></i></a>
                     {{ Form::close() }}
                  </td>

              </tr>

          @endforeach

          </tbody> -->
        </table>
  </div>
</div>

@if(false)
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
            contentType: 'application/json',
            dataType: 'json',
            url: '{{ URL::to('getClients') }}',
            dataSrc: 'data'
        },
        columns: [
              { data: 'public_id' },
              { data: 'campo'},
              { data: 'name2' },
              { data: 'nit2' },
              { data: 'work_phone' },
              { data: 'button' }
            ],
            "deferRender": true,
            "order": [[ 1, "asc" ]],
            "lengthMenu": [[30, 50, 100], [30, 50, 100]],
            "language": {
      		"zeroRecords": "&nbsp;&nbsp;&nbsp;No se encontro el registro",
              "sLengthMenu":    "&nbsp;&nbsp;&nbsp;Mostrar _MENU_ &nbsp;registros",
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
         } );
       } );
</script>
@else
<script type="text/javascript">
$(document).ready(function() {
     //Setup - add a text input to each footer cell
          $('#datatable thead td').each( function () {
              var title = $('#datatable thead td').eq( $(this).index() ).text();
      		//alert(title);
      		var tamaño = 10;
      		if (title == 'Número') {
      		  tamaño = 2;
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
            contentType: 'application/json',
            dataType: 'json',
            url: '{{ URL::to('getClients') }}',
            dataSrc: 'data'
        },
        columns: [
              { data: 'public_id' },
              { data: 'name2' },
              { data: 'nit2' },
              { data: 'work_phone' },
              { data: 'button' }
            ],
            "deferRender": true,
            "order": [[ 1, "asc" ]],
            "lengthMenu": [[30, 50, 100], [30, 50, 100]],
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
         } );
       } );
</script>
@endif


@stop
