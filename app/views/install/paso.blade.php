@extends('layout')


@section('title') Perfil Administrador @stop
@section('head') 
 
@stop

@section('body')
	
	{{Form::open(array('url' => 'comensar', 'method' => 'post'))}}

	<div class="panel panel-default">
       
        <div class="panel-heading">
          
          Por favor completa la siguiente informacion necesaria para poder facturar  
        </div>
       
        <div class="panel-body" > 
        	<div class="row">
			  <div class="col-md-3">
			  	<ul class="nav nav-pills nav-stacked">
			        <li role="presentation" class="active"><a href="#">  <span class="badge">1</span> Perfil de Administrador</a></li>
			        <li role="presentation"><a href="#"><span class="badge">2</span> Casa Matriz</a></li>
			        <li role="presentation"><a href="#"><span class="badge">3</span> Tipo de Documentos</a></li>
			    </ul>

			  </div>
			  


			  <div class="col-md-9">{{--$usuario--}}

			  	<div class="panel panel-default">
			  	  <div class="panel-body" > 	
			  		<h5> Nombre <span class="label label-danger">requerido</span></h5>

			  		<div class="row">
			  			<div class="col-md-3">
			  				<div class="input-group input-group-sm">
							    {{-- <input type="text" class="form-control" placeholder="Apellido Paterno" aria-describedby="basic-addon1"> --}}
							    {{Form::text('first_name','',array('class'=>'form-control','placeholder'=>'Apellido Paterno','aria-describedby'=>'sizing-addon3'))}}
							    
							</div>
			  			</div>
			  			<div class="col-md-3">
			  				<div class="input-group input-group-sm">
			  					{{Form::text('last_name','',array('class'=>'form-control','placeholder'=>'Apellido Paterno'))}}
			  				</div>
			  			</div>
			  		</div>

			  		<h5> Nombre de Usuario <span class="label label-danger">requerido</span></h5>

			  		<div class="row">
			  			<div class="col-md-4">
			  				<div class="input-group input-group-sm">
							    {{-- <input type="text" class="form-control" placeholder="Apellido Paterno" aria-describedby="basic-addon1"> --}}
							    {{Form::text('username','',array('class'=>'form-control','placeholder'=>'Usuario'))}}
							    
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