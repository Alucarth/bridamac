@extends('header')
@section('title') Gestión de Clientes @stop
@section('head') @stop
@section('encabezado') CLIENTES @stop
@section('encabezado_descripcion') Gestión de Clientes @stop 
@section('nivel') <li><a href="#"><i class="ion-person-stalker"></i> Clientes</a></li> @stop

@section('content')

<div class="panel panel-default">
   	<div class="panel-body">
        <div class="row">
            <div class="col-md-8">
              {{-- <h4>Gestión de Clientes</h4> --}}
            </div>
            <div class="col-md-4">
              <div class="pull-right">
                <a href="{{ url('clientes/create') }}" class="btn btn-success" role="button">Nuevo Cliente</a>
              </div>
            </div>
        </div>
		    <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
              <tr>
                  <td>Id</td>
                  <td>Nombre</td>
                  <td>Contacto</td>
                  <td>Teléfono</td>
                  <td>Balance</td>
                  <td>Pagos</td>
                  <td>Acción</td>
                  
              </tr>
          </thead>
          <tbody>

          @foreach($clients as $client)
              <tr>
                  <td>{{ $client->public_id }}</td>
                  <td>{{ $client->name }}</td>
                  <td>{{ $client->first_name . ' ' . $client->last_name }}</td>
                  <td>{{ $client->work_phone ? $client->work_phone : $client->phone }}</td>
                  <td>{{ $client->balance}}</td>
                  <td>{{ $client->paid_to_date }}</td>
                  <td>
	                  <div class="dropdown">
						          <button class="btn btn-info btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                        Opciones
	                        <span class="caret"></span>
	                      </button>
	                      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
	                        <li><a href="{{ URL::to('clientes/'. $client->public_id) }}">Ver Cliente</a></li>
	                        <li><a href="{{ URL::to('clientes/'. $client->public_id.'/edit') }}">Editar Cliente</a></li>
                          <li role="separator" class="divider"></li>
                          <li><a href="#" data-toggle="modal"  data-target="#formConfirm" data-id="{{ $client->public_id }}" data-name="{{ $client->name }}" >Borrar Cliente</a></li>
	                      </ul>
	                  </div>
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
        <h4 class="modal-title" id="frm_title">Borrar Cliente</h4>
      </div>
      {{ Form::open(array('url' => 'clientes/bulk','id' => 'formDelete')) }}
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
      modal.find('.modal-body').text('¿ Está seguro de borrar a ' + name + ' ?');
      document.getElementById("public_id").value = public_id; 
  });

</script>

@stop