@extends('header')

@section('content')

{{Former::framework('TwitterBootstrap3')}}

<div class="row">

	{{ Former::open($url)->addClass('col-md-11 col-md-offset-1 warn-on-exit')->method($method)->rules(array(
		'client' => 'required',
  		'amount' => 'required|Numeric',		
	)); }}

	<div class="row">
		<div class="col-md-8">

			{{ Former::legend('Nuevo Crédito') }}

			{{ Former::select('client')->label('cliente')->addOption('', '')->addGroupClass('client-select') }}
			{{ Former::text('amount')->label('monto') }}
			{{ Former::text('credit_date')->label('fecha de Crédito')->append('<i class="glyphicon glyphicon-calendar"></i>') }}
			{{ Former::textarea('private_notes')->label('referencia de Crédito') }}

		</div>
		<div class="col-md-6">

		</div>
	</div>

	<script type="text/javascript">

	
	var clients = {{ $clients }};

	$(function() {

		var $clientSelect = $('select#client');		
		for (var i=0; i<clients.length; i++) {
			var client = clients[i];
			$clientSelect.append(new Option(client.name, client.public_id));
		}	

		if ({{ $clientPublicId ? 'true' : 'false' }}) {
			$clientSelect.val({{ $clientPublicId }});
		}

		$clientSelect.combobox();
		
		$('#currency_id').combobox();
		$('#credit_date').datepicker('update', new Date());

	});

	</script>

	<center class="buttons">

	<a href="{{ url('creditos/' . ($credit ? $credit->public_id : '')) }}" class="btn btn-info" role="button">Cancelar</a>
	{{Former::submit('enviar')}}

	</center>

	{{ Former::close() }}
	
</div>
@stop
