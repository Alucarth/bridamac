
@extends('header')

@section('title') Gestion de Usuarios @stop

@section('head')

    
   


@stop
@section('encabezado') Usuarios @stop
@section('encabezado_descripcion') descripcion de usuarios @stop
@section('nivel')<li><a href="#"><i class="fa fa-users"></i> Usuarios</a></li>
             @stop
@section('content')
	     

<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Gestion Usuarios</h3>
    <div class="box-tools pull-right">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example -->
      <span class="label label-primary">Listado de Usuarios</span>
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
    <p>  <a class="btn btn-success" href="{{ URL::to('usuarios/create') }}">Crear Usuario </a></p>                      

        <table id="mitabla" class="table table-bordered table-hover" cellspacing="0" width="100%">
          <thead>
              <tr>
                  <td>Id</td>
                  <td>Usuario</td>
                  <td>Nombres</td>
                  <td>Apellidos</td>
                  <td>Correo</td>
                  <td>Accion</td>
              </tr>
          </thead>
          <tbody>

          @foreach($usuarios as $usuario)
              <tr>
                  <td>{{ $usuario->public_id}}</td>
                  <td>{{ $usuario->username }}</td>
                  <td>{{ $usuario->first_name }}</td>
                  <td>{{ $usuario->last_name }}</td>
                  <td>{{ $usuario->email}}</td>

                  <!-- we will also add show, edit, and delete buttons -->


                  <td>
                      <div class="dropdown">
                      <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Opciones
                        <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="{{ URL::to('usuarios/'. $usuario->public_id) }}">Ver detalle</a></li>
                        <li><a href="{{ URL::to('usuarios/'. $usuario->public_id.'/edit') }}">Editar</a></li>

                      </ul>
                    </div>
                                

                  </td>
              </tr>
          @endforeach
          </tbody>
        </table>
  </div><!-- /.box-body -->
  
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
     // $(function () {
       
     //    $('#mitabla').DataTable({
     //      "paging": true,
     //      "lengthChange": true,
     //      "searching": true,
     //      "ordering": true,
     //      "info": false,
     //      "autoWidth": true
     //    });
     //  });
    

  </script>

 
        
@stop



