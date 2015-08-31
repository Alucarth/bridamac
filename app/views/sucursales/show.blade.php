@extends('header')

@section('title') Sucursal @stop

@section('head')
	
@stop

@section('content')
	
	{{Former::framework('TwitterBootstrap3')}}
 




  	<p></p>
  <div class="panel panel-default">
  
	  <div class="panel-body">
	  	 
	  	 {{ Former::legend('Informacion de '.$sucursal->name) }}
	  	
	  	 <div class="row">
		    <div class="col-md-6">
		    	  <p>{{ Form::label('Nombre: ') }} {{$sucursal->name}} </p> 
		    	  <p>{{ Form::label('Actividad Economica : ') }} {{$sucursal->economic_activity}} </p>
		    	  <p>{{ Form::label('Tipo: ') }} {{$sucursal->branch_type_id}} </p>
		    	  <p>{{ Form::label('Facturas Emitidas: ') }} {{$sucursal->invoice_number_counter}} </p>
		    	  

		    	  <p><a class="btn btn-success" href="{{ URL::to('sucursales') }}">Ver Sucursales</a>
	         		<a class="btn btn-primary" href="{{ URL::to('sucursales/'.$sucursal->public_id.'/edit') }}">Editar</a></p>		

			</div>
		    <div class="col-md-6">

		      {{ Former::legend('Direccion') }}

	          <p>{{ Form::label('Dirección: ') }} {{$sucursal->address2}} </p> 	
              <p>{{ Form::label('Zona/Barrio: ') }} {{$sucursal->address1}} </p>
		      <p>{{ Form::label('Telefono: ') }} {{$sucursal->work_phone}} </p>
		      <p>{{ Form::label('Ciudad: ') }} {{$sucursal->city}} </p>
		      <p>{{ Form::label('Municipio: ') }} {{$sucursal->state}} </p>
		    	    	 	
		    </div>
		    <div class="col-md-4">
		    	 {{ Former::legend('Dosificación') }}

                <p>{{ Form::label('Numero de Autorizacion: ') }} {{$sucursal->number_autho}} </p>
                <p>{{ Form::label('Fecha Limite de Emision: ') }} {{$sucursal->deadline}} </p>
                <p>{{ Form::label('LLave de Dosificación: ') }} {{$sucursal->key_dosage}} </p>
              
		    </div>

		  </div>
		  <div class="row" >
		   	


	  </div>
	
  </div>


@stop