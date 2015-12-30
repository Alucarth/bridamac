@extends('header')
@section('title')Ver Cliente @stop
 @section('head')
 <script src="{{asset('vendor/browser/browser.js')}}" type="text/javascript"></script>
 <script src="{{asset('vendor/print/printElement.js')}}" type="text/javascript"></script>
 @stop
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
    <h3  class="box-title"><strong>  Nombre del Cliente : </strong>{{ $client->name }} </h3>
    <div class="box-tools pull-right">
        {{-- <a id="print_canvas" class="btn btn-success  btn-sm btn-block"> Imprimir&nbsp;<span class="glyphicon glyphicon-print"></span></a> --}}
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
				<h4><strong>Datos de Cliente</strong></h4>

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
				<h4><strong>Contáctos</strong></h4>
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
        		@if ($contact->position)
	  				{{ $contact->position }}<br/>
	 			@endif
			  	@endforeach
			</div>

			<div class="col-md-3">
				<h4><strong>Datos Adicionales</strong></h4>
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
				<h4><strong>Estado</strong>
				<table style="width:250px">
					<tr>
						<td><small>Pagado</small></td>
						<td style="text-align: right">{{ $client->paid_to_date?$client->paid_to_date:0 }}</td>
					</tr>
					<tr>
						<td><small>Por Cobrar</small></td>
						<td style="text-align: right">{{ $client->balance?$client->balance:0 }}</td>
					</tr>

					<tr>
						<td><small>Crédito</small></td>
						<td style="text-align: right">{{ $credit }}</td>
					</tr>

				</table>
				</h4>
			</div>

		</div>


		@if($client->deleted_at==null)

		<div class="row">

			<div class="col-md-2">
				<a href="{{URL::to('clientes/'.$client->public_id.'/edit')}}" class="btn btn-primary btn-sm btn-block"> Editar Cliente &nbsp<span class="glyphicon glyphicon-pencil"></span></a>
			</div>
			<div class="col-md-2">
				 <a href="#" data-toggle="modal"  data-target="#formConfirm" data-id="{{$client->public_id}}" data-href="{{ URL::to('clientes/'. $client->id)}}" data-nombre="{{$client->name.' ' }}" class="btn btn-danger btn-sm btn-block">Borrar Cliente &nbsp<span class="glyphicon glyphicon-trash">  </span></a>
			</div>
		</div>

		@else

		<div class="row">

			<div class="col-md-2">
				<a href="{{URL::to('clientes/'.$client->public_id.'/edit')}}" class="btn btn-warning  btn-sm btn-block"> Activar Cliente &nbsp<span class="glyphicon glyphicon-share"></span></a>
			</div>

		</div>

		@endif
		<br>
		<div id="content">
		    <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
		        <li class="active"><a href="#facturas" data-toggle="tab">Facturas</a></li>
		        <li><a href="#pagos" data-toggle="tab">Pagos</a></li>
                        <li><a href="#creditos" data-toggle="tab">Créditos</a></li>
		    </ul>
		    <div id="my-tab-content" class="tab-content">
		        <div class="tab-pane active" id="facturas">
              <div class="box-header with-border">
                <h3 class="box-title"><a href="{{URL::to('factura/'.$client->public_id.'/client')}}" class="btn btn-success" role="button">Nuevo &nbsp;<span class="glyphicon glyphicon-plus-sign"></span></a></h3>

              </div>

		        	{{-- tabla de pagos --}}
		        	<br>
		        	  <table id="tfacturas" class="table table-bordered table-hover" cellspacing="0" width="100%">
			          <thead>
			              <tr>
			                  <td>Número de Factura</td>
			                  <td>Fecha de Emisión</td>
			                  <td>Importe Total</td>
			                  <td>Saldo</td>
			                  <td>Fecha de Pago</td>
			                  <td>Estado</td>
                        <td>Accion</td>
			              </tr>
			          </thead>
			          <tbody>
                  @foreach($invoices as $invoice)
                  <tr>
                      <td>{{ $invoice->invoice_number}}</td>
                      <td>{{ $invoice->invoice_date }} </td>
                      <td>{{ $invoice->importe_total }} </td>
                      <td>{{ $invoice->balance }}</td>
                      <td>{{ $invoice->due_date}}</td>
                       <td>{{ $invoice->name}}</td>
                       <td>
                              <a class="btn btn-warning btn-xs" data-task="view" data-toggle="tooltip" data-original-title="Default tooltip" href="{{ URL::to("copia/".$invoice->public_id) }}"  style="text-decoration:none;color:white;"><i class="glyphicon glyphicon-duplicate"></i></a>
                       </td>
                  </tr>
                  @endforeach

			          </tbody>
			        </table>

		        </div>
		        <div class="tab-pane" id="pagos">
              <div class="box-header with-border">
                <h3 class="box-title"><a href="{{URL::to('pagos/create'.'?publicId='.$client->public_id)}}" class="btn btn-success" role="button">Nuevo &nbsp;<span class="glyphicon glyphicon-plus-sign"></span></a></h3>

              </div>

		             {{-- tabla pagos --}}
		             <br>
		             <table id="tpagos" class="table table-bordered table-hover" cellspacing="0" width="100%">
			          <thead>
			              <tr>
			                  <td>Número de Factura</td>
			                  <td>Referencia de transacción</td>
			                  <td>Método</td>
			                  <td>Monto Pagado</td>
			                  <td>Fecha de Pago</td>

			              </tr>
			          </thead>
			          <tbody>

			          @foreach($pagos as $pago)
			              <tr>
			                  <td>{{ $pago->invoice_number}}</td>
			                  <td>{{ $pago->transaction_reference }}</td>
			                  <td>{{ $pago->name }}</td>
			                  <td>{{ $pago->amount }}</td>
			                  <td>{{ $pago->payment_date}}</td>


			              </tr>
			          @endforeach
			          </tbody>
			        </table>

		        </div>
		        <div class="tab-pane" id="creditos">
            <div class="box-header with-border">
              <h3 class="box-title"><a href="{{URL::to('creditos/'.$client->public_id.'/client')}}" class="btn btn-success" role="button">Nuevo &nbsp;<span class="glyphicon glyphicon-plus-sign"></span></a></h3>

            </div>
		             {{-- tabla pagos --}}
		             <br>
		             <table id="tcreditos" class="table table-bordered table-hover" cellspacing="0" width="100%">
			          <thead>
			              <tr>
			                  <td>Número</td>
			                  <td>Monto de Cr&eacute;dito</td>
			                  <td>Saldo</td>
			                  <td>Fecha</td>
			                  <td>Notas</td>
			              </tr>
			          </thead>
			          <tbody>

			          @foreach($creditos as $credito)
			              <tr>
			                  <td>{{ $credito->getCreditNumber() }}</td>
			                  <td>{{ $credito->getAmount() }}</td>
			                  <td>{{ $credito->getBalance() }}</td>
			                  <td>{{ $credito->getCreditDate() }}</td>
			                  <td>{{ $credito->getPrivateNotes() }}</td>
			              </tr>
			          @endforeach
			          </tbody>
			        </table>

		        </div>
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
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
        <h4 class="modal-title" id="frm_title">Eliminar</h4>
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

	 jQuery(document).ready(function ($) {
        $('#tabs').tab();
        $('#tfacturas').DataTable(
        {
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "No se encontro el registro",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtered from _MAX_ total records)"
	        }
	     }
	      );
         $('#tpagos').DataTable(
        {
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "No se encontro el registro",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtered from _MAX_ total records)"
	        }
	     }
	      );
        $('#tcreditos').DataTable(
        {
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "No se encontro el registro",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtered from _MAX_ total records)"
	        }
	     }
	  );
$("#tfacturas_length").css("display", "none");
$("#tpagos_length").css("display", "none");
$("#tcreditos_length").css("display", "none");
    });



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


        // $("#print_canvas").click(function(){
        //     $('.content').show().printElement();
        // });



</script>

@stop
