@extends('header')

@section('title') Registro de Usuario @stop

@section('head')
	
@stop

@section('encabezado') Usuarios @stop
@section('encabezado_descripcion') creacion de usuario @stop 
@section('nivel') <li><a href="{{URL::to('usuarios')}}"><i class="fa fa-users"></i> Usuarios</a></li>
            <li class="active">detalle usuario</li>@stop
@section('content')
	
	{{Former::framework('TwitterBootstrap3')}}
 
	<div class="box box-primary">
	  <div class="box-header with-border">
	    <h3 class="box-title">{{'Informacion de '.$usuario->first_name}}</h3>
	    <div class="box-tools pull-right">
	      <!-- Buttons, labels, and many other things can be placed here! -->
	      <!-- Here is a label for example -->
	      
	    </div><!-- /.box-tools -->
	  </div><!-- /.box-header -->
	  <div class="box-body">
	    	<div class="row">
			    <div class="col-md-6">
			    	  <p>{{ Form::label('Nombres : ') }} {{$usuario->first_name}} </p> 
			    	  <p>{{ Form::label('Apellidos : ') }} {{$usuario->last_name}} </p>
			    	  <p>{{ Form::label('Correo: ') }} {{$usuario->email}} </p>
			    	  <p>{{ Form::label('Telefono: ') }} {{$usuario->phone}} </p>



			    	  <div class="dropdown">
	                      <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
	                        Opciones
	                        <span class="caret"></span>
	                      </button>
				    	   <ul class="dropdown-menu">
						   	<li><a href="{{URL::to('usuarios/'.$usuario->public_id.'/edit')}}"> Editar	</a></li>
							<li>

	                            <a href="#" data-toggle="modal"  data-target="#formConfirm" data-id="{{$usuario->public_id}}" data-href="{{ URL::to('usuarios/'. $usuario->id)}}" data-nombre="{{$usuario->first_name.' '.$usuario->last_name.' ' }}" > Borrar</a>

	                         </li>
			
						  </ul>
			    	  </div>

				</div>
			    <div class="col-md-6">

			      {{ Former::legend('Datos de Ingreso') }}
			      {{ Form::label('Nombre de usuario : ')}} {{$usuario->username}}
		    	 	
			    </div>
			    <div class="col-md-4">
			    	{{ Former::legend('Sucursales Asignadas') }}	
			          
			        <div class="list-group">
			          @foreach(UserBranch::getSucursales($usuario->id) as $sucursal)
					  <li class="list-group-item">{{$sucursal->name}}</li>
					  @endforeach	  
					</div>
			    </div>

		  	</div>
	  </div><!-- /.box-body -->
	  <div class="box-footer">
	   
	  </div><!-- box-footer -->
	</div><!-- /.box -->


	
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


	 $('#formConfirm').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Recibiendo informacion del link o button
          // Obteniendo informacion sobre las variables asignadas en el ling atravez de atributos jquery
          var id = button.data('id') 
          var href= button.data('href')
          var nombre = button.data('nombre')
          
          var modal = $(this)
          modal.find('.modal-title').text(' Desea eliminar al usuario ' + id+ ' ?')
          modal.find('.modal-body').text(nombre)
           $('#formBorrar').attr('action',href);
          

        });
</script>


  
@stop