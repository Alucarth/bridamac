@extends('header')

@section('content')

{{Former::framework('TwitterBootstrap3')}}

<div class="panel panel-default">
	 <div class="box-header with-border">
	    <h3 class="box-title">Datos del Crédito</h3>
	    <div class="box-tools pull-right">
	      <!-- Buttons, labels, and many other things can be placed here! -->
	      <!-- Here is a label for example -->
	      
	    </div><!-- /.box-tools -->
	  </div><!-- /.box-header -->

	<div class="panel-body">

		{{ Former::open($url)->addClass('col-md-10 col-md-offset-1 warn-on-exit')->method($method)->rules(array(
			'client' => 'required',
	  		'amount' => 'required|Numeric',		
		)); }}

		<div class="row">
			<div class="col-md-10">

				{{ Former::legend('Nuevo Crédito') }}

				{{ Former::select('client')->label('cliente')->addOption('', '')->addGroupClass('client-select') }}
				{{ Former::text('amount')->label('monto') }}
				{{ Former::text('credit_date')->label('fecha de Crédito')->append('<i class="glyphicon glyphicon-calendar"></i>') }}
				{{ Former::textarea('private_notes')->label('referencia de Crédito') }}

			</div>
		</div>

		<center class="buttons">

			<a href="{{ url('creditos/') }}" class="btn btn-default btn-lg"> Cancelar </a>
			<button type="submit" class="btn btn-success btn-lg dropdown-toggle"> Guardar </button>

		</center>

		{{ Former::close() }}

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

		$('#credit_date').datepicker('update', new Date());

	});

</script>


@stop
