@extends('header')
@section('title')Ver Sucursal @stop
 @section('head') @stop
@section('encabezado') SUCURSALES @stop
@section('encabezado_descripcion') Ver Sucursal @stop 
@section('nivel') <li><a href="{{URL::to('sucursales')}}"><i class="glyphicon glyphicon-home"></i> Sucursales</a></li>
            <li class="active"> Ver </li> @stop
          

@section('content')
	
	{{Former::framework('TwitterBootstrap3')}}
 




  	<p></p>
  <div class="panel panel-default">
  
	  <div class="panel-body">
	  	 
	  	 {{ Former::legend('Informacion de '.$sucursal->name) }}
	  	 <div class="btn-group">
						  <button class="btn btn-info btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						    Opciones <span class="caret"></span>
						  </button>
						  {{-- <ul class="dropdown-menu"> --}}
						   	{{-- <li><a href="#">{{ link_to('/' . $client->public_id . '/edit', 'Editar Cliente') }}</a></li> --}}
							{{-- <li><a href="#" data-toggle="modal" data-target="#formConfirm">Borrar Cliente</a></li> --}}
							{{-- <li role="separator" class="divider"></li> --}}
							{{-- <li><a href="#">{{link_to('facturas/create/' . $client->public_id, 'Emitir Factura' ) }}</a></li> --}}
												{{-- <li><a href="#">{{link_to('pagos/create/' . $client->public_id, 'Agregar pago' ) }}</a></li>
												<li><a href="#">{{link_to('creditos/create/' . $client->public_id, 'Agregar Crédito' ) }}</a></li> --}}
						  {{-- </ul> --}}
						</div>

	  	
	  	 <div class="row">
		    <div class="col-md-6">
		    	  <p>{{ Form::label('Nombre: ') }} {{$sucursal->name}} </p> 
		    	  <p>{{ Form::label('Actividad Economica : ') }} {{$sucursal->economic_activity}} </p>
		    	 
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