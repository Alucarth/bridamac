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
      'username' => 'required',

      'first_name' => 'required',
      
      'password' => 'required',
      'password_confirm' => 'required'
      
      )) }}


      	<div class="box box-success	">
		  <div class="box-header with-border">
		    <h3 class="box-title">Registro de Usuario</h3>
		    <div class="box-tools pull-right">
		      <!-- Buttons, labels, and many other things can be placed here! -->
		      <!-- Here is a label for example -->
		      {{-- <span class="label label-primary"></span> --}}
		    </div><!-- /.box-tools -->
		  </div><!-- /.box-header -->
		  <div class="box-body">
		    	
		  	 <div class="row">
			     <div class="col-md-5">
			     	
				      {{ Former::text('first_name')->label('Nombre(s)') }}
				      {{ Former::text('last_name')->label('Apellidos') }}
				      {{ Former::text('email')->label('Email') }}

				      {{ Former::text('phone')->label('Teléfono/Celular') }}

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