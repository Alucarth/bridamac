@extends('header')
@section('title') Gestión de Clientes @stop
@section('head') @stop
@section('encabezado') CLIENTES @stop
@section('encabezado_descripcion') Gestión de Clientes @stop 
@section('nivel') <li><a href="#"><i class="ion-person-stalker"></i> Clientes</a></li> @stop

@section('content')

<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title"><a href="{{ url('clientes/create') }}" class="btn btn-success" role="button">Nuevo Cliente &nbsp<span class="glyphicon glyphicon-plus-sign"></span></a></h3>
    <div class="box-tools pull-right">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example -->
       
      
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
       <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
              <tr>
                  <td>Id</td>
                  <td>Nombre</td>
                  <td>Nit</td>
                  <td>Teléfono</td>
                  <td>Acción</td>
               
                  
              </tr>
          </thead>
          <tbody>

          @foreach($clients as $client)
              <tr>
                  <td>{{ $client->public_id }}</td>
                  <td>{{ $client->name }}</td>
                  <td>{{ $client->nit}}</td>
                  
                  <td>{{ $client->work_phone ? $client->work_phone : $client->phone }}</td>
            
                  <td>
                    <div class="dropdown">
                      <button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Opciones
                          <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                          <li><a href="{{ URL::to('clientes/'. $client->public_id) }}">Ver Cliente</a></li>
                          {{-- <li><a href="{{ URL::to('clientes/'. $client->public_id) }}">Ver Cliente</a></li> --}}
                          <li><a href="{{ URL::to('clientes/'. $client->public_id.'/edit') }}">Editar Cliente</a></li>
                      
                        </ul>
                    </div>
                  </td>
              </tr>
          @endforeach
          </tbody>
        </table>
  </div><!-- /.box-body -->
{{--   <div class="box-footer">
    The footer of the box
  </div><!-- box-footer --> --}}
</div><!-- /.box -->



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


</script>

@stop