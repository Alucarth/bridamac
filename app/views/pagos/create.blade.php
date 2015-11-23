@extends('header')
@section('head') @stop
@section('encabezado') PAGOS @stop
@section('encabezado_descripcion') Nuevo pago @stop 
@section('nivel') <li><a href="{{URL::to('pagos')}}"><i class="fa fa-money"></i> pagos</a></li>
            <li class="active">Nuevo</li>@stop
@section('content')

{{Former::framework('TwitterBootstrap3')}}


<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Nuevo Pago</h3>
    <div class="box-tools pull-right">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example -->
      <span class="label label-primary"></span>
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
   		{{ Former::open('pagos')->addClass('col-md-10 col-md-offset-1 warn-on-exit')->method('post')->rules(array(
			'client' => 'required',
			'invoice' => 'required',		
			'amount' => 'required|Numeric',		
		)); }}
	
		<div class="row">
			<div class="col-md-10">

				{{ Former::select('client')->addOption('', '')->label('Cliente')->fromQuery(Client::where('account_id',Auth::user()->account_id)->get(),'name')->id('client_id') }}
				{{ Former::select('invoice')->addOption('', '')->label('Factura')->id('invoice_select') }}
				{{ Former::text('amount')->label('Monto')->title('Solo se acepta números.')->id('amount')}}
				{{ Former::select('payment_type_id')->label('Tipo de Pago')->fromQuery(PaymentType::all(), 'name', 'id') }}			
				{{ Former::text('payment_date')->label('Fecha de Pago')->append('<i class="glyphicon glyphicon-calendar"></i>')->id('date') }}
				 {{-- <input class="form-control pull-right" name="payment_date" id="date" type="text" placeholder="Fecha de Pago"  required> --}}
				{{ Former::text('transaction_reference')->label('Referencia de Pago')->placeholder('Pago realizado') }}

			</div>
		</div>

		<center class="buttons">

			<a href="{{ url('pagos/') }}" class="btn btn-default"> Cancelar </a>
	    	<button type="submit" class="btn btn-success dropdown-toggle"> Guardar </button>

		</center>

		{{ Former::close() }}
  </div><!-- /.box-body -->
  <div class="box-footer">
    
  </div><!-- box-footer -->
</div><!-- /.box -->

<script type="text/javascript">

	// window.facturas;
	window.facturas=null;
	
	$("#date").datepicker();
	$('#date').on('changeDate', function(ev){
            $(this).datepicker('hide');
        });
	$('#client_id').change(function(){
		// console.log('entro aqui');
		if(this.value)
		{
			$.ajax({url: '{{URL::to("pago/factura/'+this.value+'")}}', success: function(result){
		        
		        facturas = result;
		        console.log(facturas);
		        //limpiando
		        $('#invoice_select')
				    .empty()
				    .append('<option selected="selected" value=""></option>');
				 $('#amount').val('');
				//poblando
		        for (var i = 0; i< result.length; i++) {
		        	$('#invoice_select').append('<option value='+result[i].id+'> Factura #'+result[i].invoice_number+' Importe Total '+result[i].importe_total+' ('+result[i].balance+')</option>');
		        	// console.log("Imprimiendo elemento"+i);
		        	// console.log(result[i].id);	
		        };
		        // console.log(result);

   			 }});
		}
		 console.log(facturas);
				// console.log(facturas);

	});
	$('#invoice_select').change(function(){
		// console.log('entro aqui');
		if(this.value)
		{
			 for (var i = 0; i< facturas.length; i++) {
			 	console.log('comparando '+this.value+' con '+facturas[i].id);
			 	if(this.value==facturas[i].id)
			 	{
			 		console.log('elemento encontrado'+facturas[i].balance);
			 		
			 		$('#amount').val(facturas[i].balance);
			 		i=facturas.length;
			 	}
			 }
		}
		 console.log(facturas);
				// console.log(facturas);

	});
	
</script>


@stop