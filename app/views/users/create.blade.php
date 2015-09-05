@extends('header')

@section('title') Registro de Usuario @stop

@section('head') @stop
@section('encabezado') Usuarios @stop
@section('encabezado_descripcion') creacion de usuario @stop 
@section('nivel') <li><a href="{{URL::to('usuarios')}}"><i class="fa fa-users"></i> Usuarios</a></li>
            <li class="active">crear usuarios</li>@stop
@section('content')
	 
	 
	{{Former::framework('TwitterBootstrap3')}}
  {{ Former::open('usuarios')->rules(array(
      'name' => 'required|min:3',
      'sucursales' => 'required'
      //'nit' => 'required|Numeric|min:5',
      //'username' => 'required|min:4',
      //'password' => 'required',
      //'password_confirmation' => 'required'
      
      )) }}



	<p></p>
  <div class="panel panel-default">
  
	  <div class="panel-body">
	  	 {{ Former::legend('Registro de Usuario') }}

	  	 <div class="row">
		     <div class="col-md-6">
		     	
			      {{ Former::text('first_name')->label('Nombre(s) (*)') }}
			      {{ Former::text('last_name')->label('Apellidos (*)') }}
			      {{ Former::text('email')->label('Email (*)') }}

			      {{ Former::text('phone')->label('Teléfono/Celular (*)') }}

			 </div>
		    <div class="col-md-6">

		      {{ Former::legend('Datos de Ingreso') }}

		      {{ Former::text('username')->label('usuario (*)') }}

		      {{ Former::password('password')->label('contraseña (*)')->pattern('.{4,}')->title('Mínimo cuatro caracteres') }}        
		      {{ Former::password('password_confirmation')->label('Repertir contraseña (*)')->pattern('.{4,}')->title('Mínimo cuatro caracteres') }}      
	         		
		    </div>
		    <div class="col-md-4">
		    	{{ Former::legend('Asignacion de Sucursal') }}	
		          
		        <div class="list-group">
		          @foreach($sucursales as $sucursal)
				  <li class="list-group-item"><label>{{ Form::checkbox('sucursales[]', $sucursal->id)}}  {{$sucursal->name}}</label></li>
				  @endforeach	  
				</div>
		    </div>

		  </div>
		  <div class="row" >

		  	<center> {{ Former::submit('Guardar');}}</center>
		   	


	  </div>
	
	 {{ Former::close()  }} 
  </div>



  
@stop