@extends('header')
@section('title') Gestión de Pagos @stop
@section('head') @stop
@section('encabezado') PAGOS @stop
@section('encabezado_descripcion') Gestión de Pagos @stop 
@section('nivel') <li><a href="#"><i class="fa fa-money"></i> Pagos</a></li> @stop

@section('content')

<div class="panel panel-default">
  <div class="box-header with-border">
    <h3 class="box-title"><a href="#" class="btn btn-success" role="button" disabled>Nuevo Pago &nbsp<span class="glyphicon glyphicon-plus-sign"></span></a></h3>
    
  </div><!-- /.box-header -->
  <div class="panel-body">
       
    <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
              <tr>
                  <td>Código</td>
                  <td>No. Factura</td>
                  <td>Cliente</td>
                  <td>Referencia de transacción</td>
                  <td>Tipo de Pago</td>
                  <td>Monto</td>
                  <td>Fecha de Pago</td>
                  <td>Acción</td>
              </tr>
          </thead>
          <tbody>
            @foreach($payments as $payment)
                <tr>
                    <td>{{ $payment->public_id }}</td>
                    <td>{{ $payment->invoice_number }}</td>
                    <td>{{ $payment->client_name }}</td>
                    <td>{{ $payment->transaction_reference ? $payment->transaction_reference : '<i>Pago realizado</i>' }}</td>
                    <td>{{ $payment->payment_type}}</td>
                    <td>{{ $payment->amount}}</td>
                    <td>{{ $payment->payment_date }}</td>
                    <td>
                        <div class="dropdown">
  						            <button class="btn btn-info btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  	                        Opciones
  	                        <span class="caret"></span>
  	                      </button>
  	                      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                          <li><a href="{{ URL::to('facturas/'. $payment->invoice_public_id) }}">Ver Factura</a></li>
                          <li><a href="{{ URL::to('clientes/'. $payment->client_public_id) }}">Ver Cliente</a></li>
                          <li role="separator" class="divider"></li>
                          <li><a href="#" data-toggle="modal"  data-target="#formConfirm" data-id="{{ $payment->public_id }}" data-invoicenumber="{{ $payment->invoice_number }}" data-amount="{{ $payment->amount }}">Borrar Pago</a></li>
  	                      </ul>
  	                    </div>
                    </td>
                </tr>
            @endforeach
          </tbody>
    </table>
  </div>
</div>

<div class="modal fade" id="formConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="frm_title">Borrar Pago</h4>
      </div>
      {{ Form::open(array('url' => 'pagos/bulk','id' => 'formDelete')) }}
      <div style="display:none">
        {{ Former::text('public_id') }}
      </div>
      <div class="modal-body" id="frm_body"></div>
      <div class="modal-footer">
        {{ Form::submit('Si',array('class' => 'btn btn-primary col-sm-2 pull-right','style' => 'margin-left:10px;'))}}
        <button type="button" class="btn btn-danger col-sm-2 pull-right" data-dismiss="modal" id="frm_cancel">No</button>      
      </div>
      {{ Form::close()}}
    </div>
  </div>
</div>

  <script type="text/javascript">

  $(document).ready( function () {
  $('#datatable').DataTable(
      {
      "language": {
          "lengthMenu": "Mostrar _MENU_ registros",
          "zeroRecords": "No se encontro el registro",
          "info": "Mostrando pagina _PAGE_ de _PAGES_",
          "infoEmpty": "No hay registros disponibles",
          "infoFiltered": "(filtered from _MAX_ total records)"
      }
   });
  });

  $('#formConfirm').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      var public_id = button.data('id');
      var invoicenumber = button.data('invoicenumber');
      var amount = button.data('amount');
      var modal = $(this);
      modal.find('.modal-body').text('¿ Está seguro de borrar el pago de la Factura ' + invoicenumber + ' por el monto de ' + amount + '?');
      document.getElementById("public_id").value = public_id; 
  });


  </script>

@stop