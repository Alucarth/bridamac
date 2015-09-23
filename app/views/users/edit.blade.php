@extends('header')

@section('title') Editar Usuario @stop

@section('head') @stop

@section('encabezado') USUARIOS @stop
@section('encabezado_descripcion') Editar Usuario: {{$usuario->first_name}} @stop 
@section('nivel') <li><a href="{{URL::to('usuarios')}}"><i class="fa fa-users"></i> Usuarios</a></li>
            <li class="active">Editar</li>@stop

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
	    <h3 class="box-title">Información de Usuario</h3>
	    <div class="box-tools pull-right">
	      <!-- Buttons, labels, and many other things can be placed here! -->
	      <!-- Here is a label for example -->
	      
	    </div><!-- /.box-tools -->
	  </div><!-- /.box-header -->
	  <div class="box-body">
	    
	  	 <div class="row">
		    <div class="col-md-6">
			      <div class="col-md-7">
				     	
				     	<label>Nombre (s) *</label>
				     	<input type="text" name="first_name" class="form-control" placeholder="Nombre del Usuario" aria-describedby="sizing-addon2" title="Ingrese el nombre del Usuario"pattern="[a-zA-ZÑñÇç. ].{2,}" value="{{$usuario->first_name}}" required>
				     	<label>Apellido *</label>
				     	<input type="text" name="last_name" class="form-control" placeholder="Apellido del Usuario" aria-describedby="sizing-addon2" title="Ingrese el Apellido del Usuario"pattern="[a-zA-ZÑñÇç. ].{2,}"  value="{{$usuario->last_name}}" required>
				     	<label>Email *</label>
				     	<input type="email" name="email" class="form-control" placeholder="Email" aria-describedby="sizing-addon2" title="Ingrese el nombre del cliente" value="{{$usuario->email}}" required>
				     	<label>Télefono/Celular *</label>
				     	<input type="text" name="phone" class="form-control" placeholder="Núm Telefónico del Usuario" aria-describedby="sizing-addon2" title="Ingrese un Núm Telefónico"pattern="([0-9]).{6,11}"  value="{{$usuario->phone}}" required>
			     	</div>
			</div>
		   

	

		    @if(Auth::user()->is_admin)

		    <div class="col-md-4">
		    	<legend>Asignación de Sucursal</legend>
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
	    {{-- The footer of the box --}}
	  </div><!-- box-footer -->
	</div><!-- /.box -->

  
@stop
