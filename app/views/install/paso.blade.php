@extends('layout')


@section('title') Perfil Administrador @stop
@section('head') 
 
@stop

@section('body')
	
	{{Form::open(array('url' => 'paso/3', 'method' => 'post'))}}

	{{ Form::hidden('id', $usuario->id) }}
	<p> </p>
	<div class="col-md-2"></div>
  <div class="col-md-8">
	<div class="panel panel-default">
       
        <div class="panel-heading"> 
         <h3>Por favor completa la siguiente información necesaria para poder facturar  </h3>
        </div>
       
        <div class="panel-body" > 
        	 @if (Session::has('message'))
              <div class="box box-success box-solid">
                <div class="box-header with-border">
                  {{ Session::get('message') }}
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="remove">
                      <i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
              </div>    
            @endif

            @if (Session::has('error'))
              <div class="box box-danger box-solid">
                <div class="box-header with-border">
                  {{ Session::get('error') }}
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="remove">
                      <i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
              </div>
            @endif
        	<div class="row">
			  <div class="col-md-4">
			  	<ul class="nav nav-pills nav-stacked">
			      <li role="presentation" ><a href="#">  <span class="badge">1</span> Casa Matriz</a></li>
	              <li role="presentation" ><a href="#"><span class="badge">2</span> Tipo de Documentos</a></li>
	              <li role="presentation" class="active"><a href="#"><span class="badge">3</span> Perfil de Administrador</a></li>
			    </ul>
			  </div>
			  
			  <div class="col-md-8">{{--$usuario--}}
			  	<div class="panel panel-default">
			  	  <div class="panel-body" > 
				  	  	<legend>Datos del Administrador</legend>
				  	  	<label> Nombre Completo *</label>

			  		  	<div class="row">
			  			 	<div class="col-md-5">
			  				    {{-- <label>Nombre*</label> --}}
			  				    {{-- <input type="text" class="form-control" placeholder="Apellido Paterno" aria-describedby="basic-addon1"> --}}
							    {{-- {{Form::text('first_name','',array('class'=>'form-control','placeholder'=>'Nombres','aria-describedby'=>'sizing-addon3'))}} --}}
							    <input type="text" name="first_name" class="form-control" placeholder="Nombres" aria-describedby="sizing-addon3" title="Ingrese su Nombre" pattern=".{3,}" required/>
			  			    </div>
				  			<div class="col-md-5">
				  					{{-- <div class="input-group input-group-sm"> --}}
				  					{{-- {{Form::text('last_name','',array('class'=>'form-control','placeholder'=>'Apellidos'))}} --}}
				  					<input type="text" name="last_name" class="form-control" placeholder="Apellidos" aria-describedby="sizing-addon3" title="Ingrese su Apellido" pattern=".{3,}" required/ >
				  			</div>
			  			</div>
			  			<p></p>
			  			<div class="row">
				  			<div class="col-md-5">
				  				<label> E-mail *</label>
				  				{{-- <div class="input-group input-group-sm"> --}}
								{{-- <input type="text" class="form-control" placeholder="Apellido Paterno" aria-describedby="basic-addon1"> --}}
								{{-- {{ Form::text('email',$usuario->email,array('class'=>'form-control','placeholder'=>'Correo Electronico'))}} --}}
							    <input type="email" name="email" class="form-control" value='{{$usuario->email}}' placeholder='Correo Electrónico'aria-describedby="sizing-addon3" title="Ingrese su correo"  required/ >
							</div>
			  			</div> 
			  			<p></p>
			  			<div class="row">
			  				<div class="col-md-5">
			  					<label>Teléfono *</label>
			  					{{-- <div class="input-group input-group-sm"> --}}
							    {{-- <input type="text" class="form-control" placeholder="Apellido Paterno" aria-describedby="basic-addon1"> --}}
							    <input type="text" id="phone" name="phone" class="form-control" placeholder="Teléfono o Celular" aria-describedby="sizing-addon2"  title="Ingrese el Número Telefónico (Solo Números)" pattern="([0-9]).{6,11}" required/>
							    {{-- {{Form::text('phone','',array('class'=>'form-control','placeholder'=>'Telefono o Celular','requiered'))}} --}}
							</div>
			  			</div>
				  		<br>
				  		<legend>Datos para Ingreso</legend> 
				  		<div class="row">
				  			<div class="col-md-5">
				  				<label>Usuario*</label>
			  					{{-- <div class="input-group input-group-sm"> --}}
							    {{-- <input type="text" class="form-control" placeholder="Apellido Paterno" aria-describedby="basic-addon1"> --}}
							    {{-- {{Form::text('username','',array('class'=>'form-control','placeholder'=>'Nombre de Usuario'))}} --}}
							    <input type="text" class="form-control" name="username" placeholder="Nombre de Usuario" aria-describedby="sizing-addon2"  title="Ingrese el Nombre de Usuario" pattern=".{3,}" required/>
				  			</div>
				  		</div>
				  		<p></p>
						<label>Password*</label>
				  		<div class="row">
				  			<div class="col-md-5">
				  				{{-- <div class="input-group input-group-sm"> --}}
								{{-- <input type="text" class="form-control" placeholder="Apellido Paterno" aria-describedby="basic-addon1"> --}}
							    {{-- {{Form::password('password',array('class'=>'form-control','placeholder'=>'Almenos 4 caracteres','aria-describedby'=>'sizing-addon3'))}} --}}
							    <input type="password" class="form-control" name="password" placeholder="Al menos 5 caracteres" aria-describedby="sizing-addon2"  title="Ingrese su password" pattern=".{4,}" required/>
			  				</div>
				  			<div class="col-md-5">
				  				{{-- <div class="input-group input-group-sm"> --}}
			  					{{-- {{Form::password('password_confirm',array('class'=>'form-control','placeholder'=>'repetir el password'))}} --}}
			  					<input type="password" class="form-control" name="password_confirm" placeholder="Repita Password" aria-describedby="sizing-addon2"  title="Re-escriba su password" pattern=".{4,}" required/>
				  				{{-- </div> --}}
				  			</div>
			  			</div>
				  		<p></p>
				  		<center>
				  				<button type="submit" class="btn btn-success" >
									Guardar <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
								</button>
				  		</center>
						
				    </div>
				</div>	 
			  </div>
			</div>

		</div>
		<div class="panel-footer"><b>Factura Virtual - IPX Server 2015</b></div>
	</div>
  </div>
   
@stop