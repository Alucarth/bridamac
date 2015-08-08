<!DOCTYPE html>
@extends('layout')

@section('title') Gestion de Usuarios @stop

@section('head')

    
      
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

                            <a href="#" data-toggle="modal"  data-target="#formConfirm" data-id="{{$usuario->public_id}}" data-href="{{ URL::to('usuarios/'. $usuario->id)}}" data-nombre="{{$usuario->first_name.' '.$usuario->last_name.' ' }}" > Borrar</a>

                         </li>
                      </ul>
                    </div>
                                

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
   
      {{ Form::open(array('url' => 'usuarios/id','id' => 'formBorrar')) }}
      {{ Form::hidden('_method', 'DELETE') }}
      <div class="modal-body" id="frm_body">
      </div>
      <div class="modal-footer">
        
        {{ Form::submit('Si',array('class' => 'btn btn-primary col-sm-2 pull-right','style' => 'margin-left:10px;'))}}
        <button type="button" class="btn btn-danger col-sm-2 pull-right" data-dismiss="modal" id="frm_cancel">No</button>
        
        {{ Form::close()}}

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
    
    $('#formConfirm').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Recibiendo informacion del link o button
          // Obteniendo informacion sobre las variables asignadas en el ling atravez de atributos jquery
          var id = button.data('id') 
          var href= button.data('href')
          var nombre = button.data('nombre')
          
          var modal = $(this)
          modal.find('.modal-title').text('Borrar usuario ' + id)
          modal.find('.modal-body').text(nombre)
           $('#formBorrar').attr('action',href);
          

        });

  </script>

 
        
@stop



