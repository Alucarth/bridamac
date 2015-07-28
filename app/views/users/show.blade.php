@extends('layout')

@section('title') Registro de Usuario @stop

@section('head')
	
@stop

@section('body')
	
	{{Former::framework('TwitterBootstrap3')}}
 



	<p></p>
  <div class="panel panel-default">
  
	  <div class="panel-body">
	  	 
	  	 {{ Former::legend('Informacion de '.$usuario->first_name) }}
	  	
	  	 <div class="row">
		    <div class="col-md-6">
		    	  <p>{{ Form::label('Nombres : ') }} {{$usuario->first_name}} </p> 
		    	  <p>{{ Form::label('Apellidos : ') }} {{$usuario->last_name}} </p>
		    	  <p>{{ Form::label('Correo: ') }} {{$usuario->email}} </p>
		    	  <p>{{ Form::label('Telefono: ') }} {{$usuario->phone}} </p>

		    	  <p><a class="btn btn-success" href="{{ URL::to('usuarios') }}">Ver todos los Usuarios</a>
	         		<a class="btn btn-primary" href="{{ URL::to('usuarios/'.$usuario->public_id.'/edit') }}">Editar</a></p>		

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
		  <div class="row" >
		   	


	  </div>
	
  </div>


  
@stop