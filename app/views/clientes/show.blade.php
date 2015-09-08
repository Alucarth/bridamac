@extends('header')

@section('content') 

<?php
  HTML::macro('tab_link', function($url, $text, $active = false) {
      $class = $active ? ' class="active"' : '';
      return '<li'.$class.'><a href="'.URL::to($url).'" data-toggle="tab">'.$text.'</a></li>';
  });
?>

<div class="panel panel-default">
  	<div class="panel-heading">

  		<div class="row">

			<div class="col-md-8">
  				<h4>Nombre de Cliente: {{ $client->name }}</h4>
  			</div>

			<div class="col-md-4">
				<div class="pull-right">
					{{ Former::open('clientes/bulk')->addClass('mainForm') }}
						<div style="display:none">
							{{ Former::text('public_id')->value($client->public_id) }}
						</div>
						<div class="btn-group">
						  <button class="btn btn-info btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						    Opciones <span class="caret"></span>
						  </button>
						  <ul class="dropdown-menu">
						   	<li><a href="#">{{ link_to('clientes/' . $client->public_id . '/edit', 'Editar Cliente') }}</a></li>
							<li><a href="#" data-toggle="modal" data-target="#formConfirm">Borrar Cliente</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="#">{{link_to('facturas/create/' . $client->public_id, 'Emitir Factura' ) }}</a></li>
							{{-- <li><a href="#">{{link_to('pagos/create/' . $client->public_id, 'Agregar pago' ) }}</a></li>
							<li><a href="#">{{link_to('creditos/create/' . $client->public_id, 'Agregar Crédito' ) }}</a></li> --}}
						  </ul>
						</div>
					{{ Former::close() }}
				</div>
			</div>

		</div>

	</div>	
	<div class="panel-body">
		
		<div class="row">
			<div class="col-md-10">
				<table>
					<tr>
						<td></td><br/>				
					</tr>
				</table>

				<table>
					<tr>
						<td><h5><strong>Razón Social</strong> : {{ $client->business_name }}</td>	
						<td><h5>&nbsp;&nbsp;</td>		
						<td><h5><strong>NIT/CI</strong> : {{ $client->nit }}</h5></td>			
					</tr>
				</table>
			</div>
		</div>

		<div class="row">

			<div class="col-md-3">
				<h3>Datos de Cliente</h3>
				
				<p>Código: {{ $client->public_id }}</p>
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

		<p>&nbsp;</p>
		
		{{-- <ul class="nav nav-tabs nav-justified">
			{{ HTML::tab_link('#activity', 'Actividad', true) }}
			{{ HTML::tab_link('#credits', 'Créditos') }}
			{{ HTML::tab_link('#invoices', 'Facturas') }}
			{{ HTML::tab_link('#payments', 'Pagos') }}			
				
		</ul> --}}

	</div>
</div>

 <div class="modal fade" id="formConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="frm_title">Mensaje</h4>
      </div>
      <div class="modal-body" id="frm_body">
      	
      	<p>¿Está seguro de borrar al cliente?</p>

      </div>
      <div class="modal-footer">
        <button style='margin-left:10px;' type="button" class="btn btn-primary col-sm-2 pull-right" id="frm_submit">Si</button>
        <button type="button" class="btn btn-danger col-sm-2 pull-right" data-dismiss="modal" id="frm_cancel">No</button>
      </div>
    </div>
  </div>
</div>	
	
	
<script type="text/javascript">

	$('#formConfirm').on('click', '#frm_submit', function(e) {
		$('.mainForm').submit();
	});

</script>

@stop