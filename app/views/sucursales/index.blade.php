@extends('header') @stop

@section('title') Gestion de Usuarios @stop

@section('head')

 @extends('header')
@section('title') Gestión de Clientes @stop
@section('head') @stop
@section('encabezado') CLIENTES @stop
@section('encabezado_descripcion') Gestión de Clientes @stop 
@section('nivel') <li><a href="#"><i class="ion-person-stalker"></i> Clientes</a></li> @stop


@stop

@section('content')
	     



  <p></p>
  <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Gestion de Sucursal</h3>
  </div>
  <div class="panel-body">


        <p>  <a class="btn btn-success" href="{{ URL::to('sucursales/create') }}">Crear Sucursal </a></p>                      

        <table id="mitabla" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
              <tr>
                  <td>Codigo</td>
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
                      <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Seleccionar
                        <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="{{ URL::to('sucursales/'. $sucursal->public_id) }}">Ver detalle</a></li>
                        <li><a href="{{ URL::to('sucursales/'. $sucursal->public_id.'/edit') }}">Editar</a></li>

                        
                        <li>

                            <a href="#" data-toggle="modal"  data-target="#formConfirm" data-id="{{$sucursal->public_id}}" data-href="{{ URL::to('sucursales/'. $sucursal->id)}}" data-nombre="{{$sucursal->name.' '.$sucursal->work_phone.' ' }}" > Borrar</a>
                        

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
   
      {{ Form::open(array('url' => 'sucursales/id','id' => 'formBorrar')) }}
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

