@extends('layout')

@section('title') Cuenta @stop

@section('head')
	
@stop

@section('body')
	
   {{Former::framework('TwitterBootstrap3')}}
 




  <p></p>
  <div class="panel panel-default">
  
	  <div class="panel-body">

	  	<legend><h2>Información de {{$cuenta->name}}</h2></legend>
	  	<!--  {{ Former::legend('Informacion de '.$cuenta->name) }} -->
 	
	  	 <div class="row">
		    <div class="col-md-5" >
		    	  <font size=3>
		    	  <p><label>Nombre de la cuenta:  </label>  {{$cuenta->name}} </p> 
		    	  <p> <label>Nit: </label>  {{$cuenta->nit}} </p>
		    	  <p> <label>Subdominio:</label> {{$cuenta->domain}}.localhost/devipx/public/... </p>
		    	  </font>
		    	 <br>
		    	  <p>
				  	 <a class="btn btn-success" href="{{ URL::to('cuentas') }}">Ver Sucursales</a>
			         <a class="btn btn-primary" href="{{ URL::to('cuentas/'.$cuenta->id.'/edit') }}">Editar</a>
			     </p> 		

			</div>
		    <div class="col-md-5">
		    	<legend>Usuarios</legend>
		      <!-- {{ Former::legend('Usuarios') }} -->

              <div class="list-group">
		          @foreach(User::whereAccountId($cuenta->id)->get() as $usuario)
				  <li class="list-group-item">{{$usuario->username}}</li>
				  @endforeach	  
				</div>
		    	    	 	
		    </div>
		    <div class="col-md-4">
		    	<legend>Sucursales</legend>
		    	 <!-- {{ Former::legend('Sucursales') }} -->
                <div class="list-group">
		          @foreach(Branch::where('account_id',$cuenta->id)->get() as $sucursal)
				  <li class="list-group-item">{{$sucursal->name}}</li>
				  @endforeach	  
				</div>
		    </div>

		  </div>
		 
		  <div class="row" >
		   	


	  </div>
	
  </div>


@stop