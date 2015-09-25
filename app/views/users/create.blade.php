@extends('header')

@section('title') Nuevo Usuario @stop

@section('head') @stop
@section('encabezado') USUARIOS @stop
@section('encabezado_descripcion') Nuevo Usuario @stop 
@section('nivel') <li><a href="{{URL::to('usuarios')}}"><i class="fa fa-users"></i> Usuarios</a></li>
            <li class="active">Nuevo</li>@stop
@section('content')
	 
	 
	{{Former::framework('TwitterBootstrap3')}}
  {{ Former::open('usuarios')->rules(array(
      'name' => 'required|min:3',
      'username' => 'required',

      'first_name' => 'required',
      
      'password' => 'required',
      'password_confirm' => 'required'
      
      )) }}


      	<div class="box box-success	">
      		<div class="box-header with-border">
			    <h3 class="box-title">Datos de Usuario</h3>
			</div><!-- /.box-header -->
		  <div class="box-body">
		  	 <div class="row">
			     <div class="col-md-4">
			     	{{-- <legend>Datos del Usuario</legend> --}}
			     	<div class="col-md-9">
				     	
				     	<label>Nombre (s) *</label>
				     	<input type="text" name="first_name" class="form-control" placeholder="Nombre del Usuario" aria-describedby="sizing-addon2" title="Ingrese el nombre del Usuario"pattern="[a-zA-ZÑñÇç. ].{2,}"  required>
				     	<label>Apellido *</label>
				     	<input type="text" name="last_name" class="form-control" placeholder="Apellido del Usuario" aria-describedby="sizing-addon2" title="Ingrese el Apellido del Usuario"pattern="[a-zA-ZÑñÇç. ].{2,}"  required>
				     	<label>Email *</label>
				     	<input type="email" name="email" class="form-control" placeholder="Email" aria-describedby="sizing-addon2" title="Ingrese el nombre del cliente" required>
				     	<label>Télefono/Celular *</label>
				     	<input type="text" name="phone" class="form-control" placeholder="Núm Telefónico del Usuario" aria-describedby="sizing-addon2" title="Ingrese un Núm Telefónico"pattern="([0-9]).{5,11}"  required>
			     	</div>
				 </div>
			    <div class="col-md-5">
			    	<legend>Datos de Ingreso</legend>
			    	<div class="col-md-8">
			    		<label>Usuario *</label>
			    		<input type="text" name="username" class="form-control" placeholder="Nombre de Usuario" aria-describedby="sizing-addon2" title="Ingrese nombre de Usuario" pattern=".{2,}"  required>
			    		<label>Contraseña *</label>
			    		<input type="password" name="password" class="form-control" placeholder="Contraseña del Usuario" aria-describedby="sizing-addon2" title="Ingrese Contraseña mínimo 5 caracteres"pattern=".{4,}"  required>
			    		<label>Repetir Contraseña *</label>
			    		<input type="password" name="password_confirm" class="form-control" placeholder="Contraseña del Usuario" aria-describedby="sizing-addon2" title="Ingrese Contraseña mínimo 5 caracteres"pattern=".{5,}"  required>

		         		
			    </div>
			    <div class="col-md-2"></div>
			    <p></p>
			    <div class="col-md-9">
			    	<legend>Asignación de Sucursal</legend>
			        <div class="list-group">
			          @foreach($sucursales as $sucursal)
					  <li class="list-group-item"><label>{{ Form::checkbox('sucursales[]', $sucursal->id)}}  {{$sucursal->name}}</label></li>
					  @endforeach	  
					</div>
			    </div>
			    

			  </div>
			 {{--  <div class="row">
			  	<div class="col-md-5">
			    	

					  <div class="row" >

					  	<center> {{ Former::submit('Guardar');}}</center>
					   	
			    </div>

			  </div> --}}

			  	<div class="row">
		            <div class="col-md-4"></div>
		            <div class="col-md-2">
		                 <a href="{{ url('usuarios/') }}" class="btn btn-default btn-sm btn-block">Cancelar&nbsp&nbsp&nbsp&nbsp<span class="glyphicon glyphicon-remove">  </span></a>
		            </div>
		            <div class="col-md-1"></div>
		            {{-- <div class="col-md-1"></div> --}}
		            <div class="col-md-2">
		                <button type="submit" class="btn btn-success dropdown-toggle btn-sm btn-block"> Guardar&nbsp&nbsp&nbsp&nbsp<span class="glyphicon glyphicon-floppy-disk"></span></button>
		            </div>
	        	</div>

			  {{ Former::close()  }}
		  </div><!-- /.box-body -->
		  <div class="box-footer">
		
		  </div><!-- box-footer -->
		</div><!-- /.box -->

	<script type="text/javascript">

			$("form").submit(function() {
			    $(this).submit(function() {
			        return false;
			    });
			    return true;
			});
	</script>


  
@stop