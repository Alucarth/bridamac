@extends('header')

@section('title') Registro de Usuario @stop

@section('head') @stop

@section('encabezado') Usuarios @stop
@section('encabezado_descripcion') creacion de usuario @stop 
@section('nivel') <li><a href="{{URL::to('usuarios')}}"><i class="fa fa-users"></i> Usuarios</a></li>
            <li class="active">editar usuario</li>@stop

@section('content')
	
	{{Former::framework('TwitterBootstrap3')}}
  {{ Former::open('usuarios/'.$usuario->public_id)->method('put')->rules(array(
      'name' => 'required|min:3',
      'sucursales' => 'required'
      //'nit' => 'required|Numeric|min:5',
      //'username' => 'required|min:4',
      //'password' => 'required',
      //'password_confirmation' => 'required'
      
      )) }}



	<div class="box box-primary">
	  <div class="box-header with-border">
	    <h3 class="box-title">Informacion de Usuario</h3>
	    <div class="box-tools pull-right">
	      <!-- Buttons, labels, and many other things can be placed here! -->
	      <!-- Here is a label for example -->
	      
	    </div><!-- /.box-tools -->
	  </div><!-- /.box-header -->
	  <div class="box-body">
	      {{Former::populate($usuario)}}
	  	 {{ Former::legend('') }}
	  	 {{-- {{$usuario}} --}}
	  	 <div class="row">
		    <div class="col-md-6">
			      {{ Former::text('first_name')->label('Nombre(s)') }}
			      {{ Former::text('last_name')->label('Apellidos') }}
			      {{ Former::text('email')->label('Email') }}

			      {{ Former::text('phone')->label('Teléfono/Celular') }}

			</div>
		    <div class="col-md-6">

		     {{--  {{ Former::legend('Datos de Ingreso') }}

		      {{ Former::text('username')->label('usuario (*)') }}

		      {{ Former::password('password')->label('contraseña (*)')->pattern('.{4,}')->title('Mínimo cuatro caracteres') }}        
		      {{ Former::password('password_confirmation')->label('Repertir contraseña (*)')->pattern('.{4,}')->title('Mínimo cuatro caracteres') }}      
	         		 --}}
		    </div>

		    @if(!Auth::user()->is_admin)

		    <div class="col-md-4">
		    	{{ Former::legend('Asignacion de Sucursal') }}	
		          
		        <div class="list-group">
		          @foreach(Account::find($usuario->account_id)->branches as $sucursal)
				  <li class="list-group-item"><label>{{ Form::checkbox('sucursales[]', $sucursal->id,UserBranch::getUserBranch($usuario->id,$sucursal->id))}}  {{$sucursal->name}}</label></li>
				  @endforeach	  
				</div>
		    </div>
		    @endif

		  </div>
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
	    The footer of the box
	  </div><!-- box-footer -->
	</div><!-- /.box -->



  
@stop
