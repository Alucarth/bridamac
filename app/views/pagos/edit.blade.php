@extends('header')

@section('content')

{{Former::framework('TwitterBootstrap3')}}

<div class="panel panel-default">
	<div class="panel-heading">
		<div class="row">
			<div class="col-md-6">
				<h4>Nuevo Pago</h4>
			</div>
		</div>
	</div>

	<div class="panel-body">

		{{ Former::open($url)->addClass('col-md-10 col-md-offset-1 warn-on-exit')->method($method)->rules(array(
			'client' => 'required',
			'invoice' => 'required',		
			'amount' => 'required|Numeric',		
		)); }}
	
		<div class="row">
			<div class="col-md-10">

				{{ Former::select('client')->addOption('', '')->label('Cliente')->addGroupClass('client-select') }}
				{{ Former::select('invoice')->addOption('', '')->label('Factura')->addGroupClass('invoice-select') }}
				{{ Former::text('amount')->label('Monto')->title('Solo se acepta números.') }}
				{{ Former::select('payment_type_id')->label('Tipo de Pago')->fromQuery($paymentTypes, 'name', 'id') }}			
				{{ Former::text('payment_date')->label('Fecha de Pago')->append('<i class="glyphicon glyphicon-calendar"></i>') }}
				{{ Former::text('transaction_reference')->label('Referencia de Pago')->placeholder('Pago realizado') }}

			</div>
		</div>

		<center class="buttons">

			<a href="{{ url('pagos/') }}" class="btn btn-default"> Cancelar </a>
	    	<button type="submit" class="btn btn-success dropdown-toggle"> Guardar </button>

		</center>

		{{ Former::close() }}

	</div>
</div>

<script type="text/javascript">

	var invoices = {{ $invoices }};
	var clients = {{ $clients }};

	$(function() {

		populateInvoiceComboboxes({{ $clientPublicId }}, {{ $invoicePublicId }});
		$('#payment_type_id').combobox();
		$('#payment_date').datepicker('update', new Date());

	});

	function populateInvoiceComboboxes(clientId, invoiceId) {

	  var clientMap = {};
	  var invoiceMap = {};
	  var invoicesForClientMap = {};
	  var $clientSelect = $('select#client');   
	  
	  for (var i=0; i<invoices.length; i++) {
	    var invoice = invoices[i];
	    var client = invoice.client;      

	    if (!invoicesForClientMap.hasOwnProperty(client.public_id)) {
	      invoicesForClientMap[client.public_id] = [];        
	    }

	    invoicesForClientMap[client.public_id].push(invoice);
	    invoiceMap[invoice.public_id] = invoice;
	  }

	  for (var i=0; i<clients.length; i++) {
	    var client = clients[i];
	    clientMap[client.public_id] = client;
	  }

	  $clientSelect.append(new Option('', '')); 
	  for (var i=0; i<clients.length; i++) {
	    var client = clients[i];
	    $clientSelect.append(new Option(client.name, client.public_id));
	  } 

	  if (clientId) {
	    $clientSelect.val(clientId);
	  }

	  $clientSelect.combobox();
	  $clientSelect.on('change', function(e) {            
	    var clientId = $('input[name=client]').val();
	    var invoiceId = $('input[name=invoice]').val();           
	    var invoice = invoiceMap[invoiceId];
	    if (invoice && invoice.client.public_id == clientId) {
	      e.preventDefault();
	      return;
	    }
	    setComboboxValue($('.invoice-select'), '', '');       
	    $invoiceCombobox = $('select#invoice');
	    $invoiceCombobox.find('option').remove().end().combobox('refresh');     
	    $invoiceCombobox.append(new Option('', ''));
	    var list = clientId ? (invoicesForClientMap.hasOwnProperty(clientId) ? invoicesForClientMap[clientId] : []) : invoices;
	    for (var i=0; i<list.length; i++) {
	      var invoice = list[i];
	      var client = clientMap[invoice.client.public_id];
	      if (!client) continue;
	      $invoiceCombobox.append(new Option(

	      	'Núm: ' + invoice.invoice_number + ' / ' +
	      	'Suc: ' + invoice.branch.name + ' / ' +
	      	'Cliente: ' + client.name + ' / ' +        
	        'Total: ' + invoice.amount + ' | ' +
	        'Pendiente: ' + invoice.balance, invoice.public_id));
	    }
	    $('select#invoice').combobox('refresh');
	  });

	  var $invoiceSelect = $('select#invoice').on('change', function(e) {     
	    $clientCombobox = $('select#client');
	    var invoiceId = $('input[name=invoice]').val();           
	    if (invoiceId) {
	      var invoice = invoiceMap[invoiceId];        
	      var client = clientMap[invoice.client.public_id];
	      setComboboxValue($('.client-select'), client.public_id, client.name);
	      if (!parseFloat($('#amount').val())) {
	        $('#amount').val(parseFloat(invoice.balance).toFixed(2));
	      }
	    }
	  });

	  $invoiceSelect.combobox();  

	  if (invoiceId) {
	    var invoice = invoiceMap[invoiceId];
	    var client = clientMap[invoice.client.public_id];
	    setComboboxValue($('.invoice-select'), invoice.public_id, (

	      	'Núm: ' + invoice.invoice_number + ' / ' +
	      	'Suc: ' + invoice.branch.name + ' / ' +     
	        'Total: ' + invoice.amount + ' | ' +
	        'Pendiente: ' + invoice.balance ));

	    $invoiceSelect.trigger('change');
	  } else if (clientId) {
	    var client = clientMap[clientId];
	    setComboboxValue($('.client-select'), client.public_id, client.name);
	    $clientSelect.trigger('change');
	  } else {
	    $clientSelect.trigger('change');
	  } 
	}

	function setComboboxValue($combobox, id, name) {
	  $combobox.find('input').val(id);
	  $combobox.find('input.form-control').val(name);
	  if (id && name) {
	    $combobox.find('select').combobox('setSelected');
	    $combobox.find('.combobox-container').addClass('combobox-selected');
	  } else {
	    $combobox.find('.combobox-container').removeClass('combobox-selected');
	  }
	}


</script>


@stop
