@extends('layout')


@section('title') Perfil Administrador @stop
@section('head') 
 
@stop

@section('body')
	
	{{Form::open(array('url' => 'comensar/3', 'method' => 'post'))}}

	{{ Form::hidden('id', $usuario->id) }}
	<div class="panel panel-default">
       
        <div class="panel-heading"> 
          Por favor completa la siguiente informacion necesaria para poder facturar  
        </div>
       
        <div class="panel-body" > 
        	<div class="row">
			  <div class="col-md-3">
			  	<ul class="nav nav-pills nav-stacked">
			      <li role="presentation" ><a href="#">  <span class="badge">1</span> Casa Matriz</a></li>
	              <li role="presentation" ><a href="#"><span class="badge">2</span> Tipo de Documentos</a></li>
	              <li role="presentation" class="active"><a href="#"><span class="badge">3</span> Perfil de Administrador</a></li>
			    </ul>

			  </div>
			  


			  <div class="col-md-8">{{--$usuario--}}

			  	<div class="panel panel-default">
			  	  <div class="panel-body" > 	
			  		<h5> Nombre <span class="label label-danger">requerido</span></h5>

			  		<div class="row">
			  			<div class="col-md-3">
			  				<div class="input-group input-group-sm">
							    {{-- <input type="text" class="form-control" placeholder="Apellido Paterno" aria-describedby="basic-addon1"> --}}
							    {{Form::text('first_name','',array('class'=>'form-control','placeholder'=>'Nombres','aria-describedby'=>'sizing-addon3'))}}
							    
							</div>
			  			</div>
			  			<div class="col-md-3">
			  				<div class="input-group input-group-sm">
			  					{{Form::text('last_name','',array('class'=>'form-control','placeholder'=>'Apellidos'))}}
			  				</div>
			  			</div>
			  		</div>

			  		<h5> Email <span class="label label-danger">requerido</span></h5>

			  		<div class="row">
			  			<div class="col-md-5">
			  				<div class="input-group input-group-sm">
							    {{-- <input type="text" class="form-control" placeholder="Apellido Paterno" aria-describedby="basic-addon1"> --}}
							    {{ Form::text('email',$usuario->email,array('class'=>'form-control','placeholder'=>'Correo Electronico'))}}
							    
							</div>
			  			</div>
			  			
			  		</div>

			  		<h5> Telefono </h5>

			  		<div class="row">
			  			<div class="col-md-3">
			  				<div class="input-group input-group-sm">
							    {{-- <input type="text" class="form-control" placeholder="Apellido Paterno" aria-describedby="basic-addon1"> --}}
							    {{Form::text('phone','',array('class'=>'form-control','placeholder'=>'Telefono o Celular'))}}
							    
							</div>
			  			</div>
			  			
			  		</div>

			  		<h5> Usuario <span class="label label-danger">requerido</span></h5>

			  		<div class="row">
			  			<div class="col-md-3">
			  				<div class="input-group input-group-sm">
							    {{-- <input type="text" class="form-control" placeholder="Apellido Paterno" aria-describedby="basic-addon1"> --}}
							    {{Form::text('username','',array('class'=>'form-control','placeholder'=>'Nombre de Usuario'))}}
							    
							</div>
			  			</div>
			  			
			  		</div>

			  		<h5> Password <span class="label label-danger">requerido</span></h5>
			  		<div class="row">
			  			<div class="col-md-3">
			  				<div class="input-group input-group-sm">
							    {{-- <input type="text" class="form-control" placeholder="Apellido Paterno" aria-describedby="basic-addon1"> --}}
							    {{Form::password('password',array('class'=>'form-control','placeholder'=>'Almenos 4 caracteres','aria-describedby'=>'sizing-addon3'))}}
							    
							</div>
			  			</div>
			  			<div class="col-md-3">
			  				<div class="input-group input-group-sm">
			  					{{Form::password('password_confirm',array('class'=>'form-control','placeholder'=>'repetir el password'))}}
			  				</div>
			  			</div>
			  		</div>

			  		<p></p>
						<button type="submit" class="btn btn-success" >
						 Guardar <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						</button>
				  </div>
				</div>	 

			  		
			  </div>
			</div>

	       
		</div>
	</div>
   
@stop