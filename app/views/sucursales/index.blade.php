@extends('header') 
@section('title') Gestión de Sucursales @stop
@section('head') @stop
@section('encabezado') SUCURSALES @stop
@section('encabezado_descripcion') Gestión de Sucursales @stop 
@section('nivel') <li><a href="#"><i class="glyphicon glyphicon-home"></i> Sucursales</a></li> @stop

@section('content')
	     
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title"><a class="btn btn-success" href="{{ URL::to('sucursales/create') }}">Crear Sucursal </a></h3>
    <div class="box-tools pull-right">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example -->
      {{-- <span class="label label-primary">Label</span> --}}
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
        <table id="mitabla" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
              <tr>
                  <td>Id</td>
                  <td>Nombre</td>
                  <td>Telefono</td>
                  <td>Fecha Limite Emision</td>
                  <td>Ciudad</td>
                  <td>Accion</td>
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
                      <div class="dropdown">
                      <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Opciones
                        <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="{{ URL::to('sucursales/'. $sucursal->public_id) }}">Ver detalle</a></li>
                        <li><a href="{{ URL::to('sucursales/'. $sucursal->public_id.'/edit') }}">Editar</a></li>

                      
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








  <script type="text/javascript">
  
    $(document).ready( function () {
    $('#mitabla').DataTable(
        {
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontro el registro",
            "info": "Mostrando pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtered from _MAX_ total records)"
        }
     }
      );

    } );
    
  
  </script>

 
        
@stop

