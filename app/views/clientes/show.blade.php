@extends('header')
@section('title')Ver Cliente @stop
 @section('head') @stop
@section('encabezado') CLIENTES @stop
@section('encabezado_descripcion') Ver Cliente @stop 
@section('nivel') <li><a href="{{URL::to('clientes')}}"><i class="ion-person-stalker"></i> Clientes</a></li>
            <li class="active">Ver </li> @stop

@section('content') 

<?php
  HTML::macro('tab_link', function($url, $text, $active = false) {
      $class = $active ? ' class="active"' : '';
      return '<li'.$class.'><a href="'.URL::to($url).'" data-toggle="tab">'.$text.'</a></li>';
  });
?>

<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Nombre de Cliente: {{ $client->name }}</h3>
    <div class="box-tools pull-right">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example -->
      
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
    
    	<div class="row">
			<div class="col-md-10">
				<strong>Razón Social</strong> : {{$client->business_name }}
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<strong>NIT/CI</strong> : {{ $client->nit }}
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

			</div>
		</div>

		<div class="row">

			<div class="col-md-3">
				<h3>Datos de Cliente</h3>
				
				<p>ID: {{ $client->public_id }}</p>
	            <p>
	            @if ( $client->address2 || $client->address1)
	            <i class="glyphicon glyphicon-home" style="width: 20px"></i>
				@endif	
	            {{ $client->address2 }}<br/>
			  	{{ $client->address1 }}</p>
			  	<p><i>{{ $client->private_notes }}</i></p>


			</div>

			<div class="col-md-3">
				<h3>Contáctos</h3>
			  	@foreach ($client->contacts as $contact)		  	
			  		
			  	@if ($contact->first_name || $contact->last_name)
	  				{{ $contact->first_name.' '.$contact->last_name }}<br/>
	 			@endif	
	 			@if ($contact->email)
	  				{{ $contact->email }}<br/>
	 			@endif	
	 			@if ($contact->phone)
	  				{{ $contact->phone }}<br/>
	 			@endif		  	
			  	@endforeach			
			</div>

			<div class="col-md-3">
				<h3>Datos Adicionales</h3>
				<p>
				@if ($client->account->custom_client_label1 && $client->custom_value1)
	                {{ $client->account->custom_client_label1 . ': ' . $client->custom_value1 }}<br/>
	            @endif
	            @if ($client->account->custom_client_label2 && $client->custom_value2)
	                {{ $client->account->custom_client_label2 . ': ' . $client->custom_value2 }}<br/>
	            @endif
	            @if ($client->account->custom_client_label3 && $client->custom_value3)
	                {{ $client->account->custom_client_label3 . ': ' . $client->custom_value3 }}<br/>
	            @endif
	            @if ($client->account->custom_client_label4 && $client->custom_value4)
	                {{ $client->account->custom_client_label4 . ': ' . $client->custom_value4 }}<br/>
	            @endif
	            @if ($client->account->custom_client_label5 && $client->custom_value5)
	                {{ $client->account->custom_client_label5 . ': ' . $client->custom_value5 }}<br/>
	            @endif
	            @if ($client->account->custom_client_label6 && $client->custom_value6)
	                {{ $client->account->custom_client_label6 . ': ' . $client->custom_value6 }}<br/>
	            @endif

	            @if ($client->account->custom_client_label7 && $client->custom_value7)
	                {{ $client->account->custom_client_label7 . ': ' . $client->custom_value7 }}<br/>
	            @endif
	            @if ($client->account->custom_client_label8 && $client->custom_value8)
	                {{ $client->account->custom_client_label8 . ': ' . $client->custom_value8 }}<br/>
	            @endif
	            @if ($client->account->custom_client_label9 && $client->custom_value9)
	                {{ $client->account->custom_client_label9 . ': ' . $client->custom_value9 }}<br/>
	            @endif
	            @if ($client->account->custom_client_label10 && $client->custom_value10)
	                {{ $client->account->custom_client_label10 . ': ' . $client->custom_value10 }}<br/>
	            @endif
	            @if ($client->account->custom_client_label11 && $client->custom_value11)
	                {{ $client->account->custom_client_label11 . ': ' . $client->custom_value11 }}<br/>
	            @endif
	             @if ($client->account->custom_client_label12 && $client->custom_value12)
	                {{ $client->account->custom_client_label12 . ': ' . $client->custom_value12 }}<br/>
	            @endif
				</p>
			</div>

			<div class="col-md-3">
				<h3>Estado
				<table style="width:250px">
					<tr>
						<td><small>Pagado</small></td>
						<td style="text-align: right">{{ $client->paid_to_date }}</td>
					</tr>
					<tr>
						<td><small>Balance</small></td>
						<td style="text-align: right">{{ $client->balance }}</td>
					</tr>
					@if ($credit > 0)
					<tr>
						<td><small>Crédito</small></td>
						<td style="text-align: right">{{ $credit }}</td>
					</tr>
					@endif
				</table>
				</h3>
			</div>

		</div>

		<p>&nbsp; </p>
		<div class="row">
            
			<div class="col-md-2">
				<a href="{{URL::to('clientes/'.$client->public_id.'/edit')}}" class="btn btn-primary btn-sm btn-block"> Editar Cliente &nbsp<span class="glyphicon glyphicon-pencil"></span></a>
			</div>
			<div class="col-md-2">
				 <a href="#" data-toggle="modal"  data-target="#formConfirm" data-id="{{$client->public_id}}" data-href="{{ URL::to('clientes/'. $client->id)}}" data-nombre="{{$client->name.' ' }}" class="btn btn-danger btn-sm btn-block">Borrar Cliente &nbsp<span class="glyphicon glyphicon-trash">  </span></a>
			</div>
		</div>

  </div><!-- /.box-body -->
  <div class="box-footer">
    
  </div><!-- box-footer -->
</div><!-- /.box -->


{{-- <ul class="nav nav-tabs nav-justified">
			{{ HTML::tab_link('#activity', 'Actividad', true) }}
			{{ HTML::tab_link('#credits', 'Créditos') }}
			{{ HTML::tab_link('#invoices', 'Facturas') }}
			{{ HTML::tab_link('#payments', 'Pagos') }}			
				
		</ul> --}}
<div class="modal fade" id="formConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="frm_title">Delete</h4>
      </div>
   
      {{ Form::open(array('url' => 'clientes/id','id' => 'formBorrar')) }}
      {{ Form::hidden('_method', 'DELETE') }}
      <div class="modal-body" id="frm_body">
      </div>
      <div class="modal-footer">
        
        {{ Form::submit('Si',array('class' => 'btn btn-primary col-sm-2 pull-right','style' => 'margin-left:10px;'))}}
        <button type="button" class="btn btn-danger col-sm-2 pull-right" data-dismiss="modal" id="frm_cancel">No</button>
        
        {{ Form::close()}}

      </div>
    </div>
  </div>
</div>


	
	
<script type="text/javascript">


	 $('#formConfirm').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Recibiendo informacion del link o button
          // Obteniendo informacion sobre las variables asignadas en el ling atravez de atributos jquery
          var id = button.data('id') 
          var href= button.data('href')
          var nombre = button.data('nombre')
          
          var modal = $(this)
          modal.find('.modal-title').text(' Desea eliminar al cliente ' + id+ ' ?')
          modal.find('.modal-body').text(nombre)
           $('#formBorrar').attr('action',href);
          

        });
</script>

@stop