@extends('header')

@section('title') Registro de Usuario @stop

@section('head') @stop
@section('encabezado') Usuarios @stop
@section('encabezado_descripcion') Creación de Usuario @stop 
@section('nivel') <li><a href="{{URL::to('usuarios')}}"><i class="fa fa-users"></i> Usuarios</a></li>
            <li class="active">crear usuarios</li>@stop
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
		  <div class="box-body">
		    	
		  	 <div class="row">
			     <div class="col-md-5">
			     	<legend>Datos del Usuario</legend>
			     	<div class="col-md-7">
				     	
				     	<label>Nombre (s) *</label>
				     	<input type="text" name="first_name" class="form-control" placeholder="Nombre del Usuario" aria-describedby="sizing-addon2" title="Ingrese el nombre del Usuario"pattern="[a-zA-ZÑñÇç. ].{2,}"  required>
				     	<label>Apellido *</label>
				     	<input type="text" name="last_name" class="form-control" placeholder="Apellido del Usuario" aria-describedby="sizing-addon2" title="Ingrese el Apellido del Usuario"pattern="[a-zA-ZÑñÇç. ].{2,}"  required>
				     	<label>Email *</label>
				     	<input type="email" name="email" class="form-control" placeholder="Email" aria-describedby="sizing-addon2" title="Ingrese el nombre del cliente" required>
				     	<label>Télefono/Celular *</label>
				     	<input type="text" name="phone" class="form-control" placeholder="Núm Telefónico del Usuario" aria-describedby="sizing-addon2" title="Ingrese un Núm Telefónico"pattern="([0-9]).{6,11}"  required>
			     	</div>
				 </div>
			    <div class="col-md-5">

			      {{ Former::legend('Datos de Ingreso') }}

			      {{ Former::text('username')->label('usuario') }}

			      {{ Former::password('password')->label('contraseña ')->pattern('.{4,}')->title('Mínimo cuatro caracteres') }}        
			      {{ Former::password('password_confirm')->label('Repertir contraseña')->pattern('.{4,}')->title('Mínimo cuatro caracteres') }}      
		         		
			    </div>
			    
			    <div class="col-md-5">
			    	{{ Former::legend('Asignacion de Sucursal') }}	
			          
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
		                 <a href="{{ url('usuarios/') }}" class="btn btn-default btn-sm btn-block">Cancelar</a>
		            </div>
		            <div class="col-md-1"></div>
		            {{-- <div class="col-md-1"></div> --}}
		            <div class="col-md-2">
		                <button type="submit" class="btn btn-success dropdown-toggle btn-sm btn-block"> Guardar</button>
		            </div>
	        	</div>

			  {{ Former::close()  }}
		  </div><!-- /.box-body -->
		  <div class="box-footer">
		
		  </div><!-- box-footer -->
		</div><!-- /.box -->



  
@stop