<!DOCTYPE html>
@extends('layout')

@section('title') Gestion de Usuarios @stop

@section('head')

    {{-- cdn --}}
    <!-- DataTables CSS -->
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('vendor/DataTables-1.10.7/media/css/jquery.dataTables.css')}}"> --}}

    <!-- jQuery -->
    <script type="text/javascript" charset="utf8" src="{{ asset('vendor/DataTables-1.10.7/media/js/jquery.js')}} "></script>
      
    <!-- DataTables -->
    <script type="text/javascript" charset="utf8" src="{{ asset('vendor/DataTables-1.10.7/media/js/jquery.dataTables.js')}}"></script>

    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/Plugins-master/integration/bootstrap/3/dataTables.bootstrap.css')}}">

    <script type="text/javascript" charset="utf8" src="{{ asset('vendor/Plugins-master/integration/bootstrap/3/dataTables.bootstrap.js')}}"></script>


@stop

@section('body')
	     



  <p></p>
  <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Gestion Usuarios</h3>
  </div>
  <div class="panel-body">


        <p>  <a class="btn btn-success" href="{{ URL::to('usuarios/create') }}">Crear Usuario </a></p>
        <table id="mitabla" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
              <tr>
                  <td>Codigo</td>
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
                      <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Seleccionar
                        <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="{{ URL::to('usuarios/'. $usuario->public_id) }}">Ver detalle</a></li>
                        <li><a href="{{ URL::to('usuarios/'. $usuario->public_id.'/edit') }}">Editar</a></li>

                        <li>
                       
                          {{ Form::open(array('url' => 'usuarios/' . $usuario->id, 'class' => 'pull-right')) }}
                              {{ Form::hidden('_method', 'DELETE') }}
                              {{ Form::submit('Borrar', array('class' => 'btn btn-warning')) }}
                          {{ Form::close() }}

                         </li>
                      </ul>
                    </div>
                    <div class="dropdown">                

                  </td>
              </tr>
          @endforeach
          </tbody>
        </table>
     </div>
  </div>



  <!-- Modal Dialog -->
 <div class="modal fade" id="formConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="frm_title">Delete</h4>
      </div>
      <div class="modal-body" id="frm_body"></div>
      <div class="modal-footer">
        <button style='margin-left:10px;' type="button" class="btn btn-primary col-sm-2 pull-right" id="frm_submit">Yes</button>
        <button type="button" class="btn btn-danger col-sm-2 pull-right" data-dismiss="modal" id="frm_cancel">No</button>
      </div>
    </div>
  </div>
</div>

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

      $('.formConfirm').on('click', function(e) {
        e.preventDefault();
        var el = $(this).parent();
        var title = el.attr('data-title');
        var msg = el.attr('data-message');
        var dataForm = el.attr('data-form');
        
        $('#formConfirm')
        .find('#frm_body').html(msg)
        .end().find('#frm_title').html(title)
        .end().modal('show');
        
        $('#formConfirm').find('#frm_submit').attr('data-form', dataForm);
      });

      $('#formConfirm').on('click', '#frm_submit', function(e) {
            var id = $(this).attr('data-form');
            $(id).submit();
      });
  </script>

 
        
@stop



