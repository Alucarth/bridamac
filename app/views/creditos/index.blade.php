@extends('header')
@section('title') Gestión de Crédito @stop
@section('head') @stop
@section('encabezado') CRÉDITOS @stop
@section('encabezado_descripcion') Gestión de Crédito @stop 
@section('nivel') <li><a href=""><i class="fa fa-credit-card"></i> Crédito</a></li> @stop
@section('content')

<div class="panel panel-default">
  <div class="box-header with-border">
    <h3 class="box-title"><a href="{{URL::to('creditos/create')}}" class="btn btn-success" role="button">Nuevo Crédito &nbsp<span class="glyphicon glyphicon-plus-sign"></span></a></h3>
   
  </div><!-- /.box-header -->

  <div class="table-responsive">

    <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
              <tr>
                  <td>Código</td>
                  <td>Cliente</td>
                  <td>Monto de Crédito</td>
                  <td>Saldo de Crédito</td>
                  <td>Fecha de Crédito</td>
                  <td>Referencia de Crédito</td>
                  <td style = "display:none">Acción</td>
              </tr>
          </thead>
			<thead>
              <tr>
                  <th>Código</th>
                  <th>Cliente</th>
                  <th>Monto de Crédito</th>
                  <th>Saldo de Crédito</th>
                  <th>Fecha de Crédito</th>
                  <th>Referencia de Crédito</th>
                  <th style = "display:block">&nbsp;Acción</th>
              </tr>
          </thead>
          <tbody>
            @foreach($credits as $credit)
                <tr>
                    <td>{{ $credit->public_id }}</td>
                    <td>{{ $credit->client_name }}</td>
                    <td>{{ $credit->amount }}</td>
                    <td>{{ $credit->balance}}</td>
                    <td>{{ $credit->credit_date}}</td>
                    <td>{{ $credit->private_notes }}</td>
                    <!--<td>
                        <div class="dropdown">
  						            <button class="btn btn-info btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  	                        Opciones
  	                        <span class="caret"></span>
  	                      </button>
  	                      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                          <li><a href="{{ URL::to('clientes/'. $credit->client_public_id) }}">Ver Cliente</a></li>
                          <li role="separator" class="divider"></li>
                          <li><a href="#" data-toggle="modal"  data-target="#formConfirm" data-id="{{ $credit->public_id }}" data-clientname="{{ $credit->client_name }}" data-amount="{{ $credit->amount }}">Borrar Crédito</a></li>
  	                      </ul>
  	                    </div>
                    </td>-->
					  
					  <td>
						<a class="btn btn-warning btn-xs" href="{{ URL::to("clientes/".$credit->client_public_id) }}" style="text-decoration:none;color:white;"><i class="glyphicon glyphicon-user"></i></a>                    
					    <!--<a class="btn btn-danger btn-xs" href="#" data-toggle="modal"  data-target="#formConfirm" data-id="{{ $credit->public_id }}" data-invoicenumber="{{ $credit->client_name }}" data-amount="{{ $credit->amount }}"><i class="glyphicon glyphicon-remove"></i></a>-->
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
        <h4 class="modal-title" id="frm_title">Borrar Crédito</h4>
      </div>
      {{ Form::open(array('url' => 'creditos/bulk','id' => 'formDelete')) }}
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
$(document).ready(function() {
    $('#datatable thead td').each( function () {
        var title = $('#datatable thead td').eq( $(this).index() ).text();
		var tamaño = 10;
		if (title == 'Código') {
		  tamaño = 4;
		  $(this).html('<div class="form-group  has-feedback"><input size="'+tamaño+'" placeholder="'+title+'" type="text" class="form-control" id="place"><span style="text-decoration:none;color:#D3D3D3;" class="glyphicon glyphicon-search form-control-feedback"></span></div>');
		}
		else{
		tamaño = 10;
        $(this).html('<div class="form-group has-feedback"><input size="'+tamaño+'" placeholder="'+title+'" type="text" class="form-control" id="place"><span style="text-decoration:none;color:#D3D3D3;" class="glyphicon glyphicon-search form-control-feedback"></span></div>' );
		}
    } );
 
    // DataTable
	$('#datatable').DataTable(
      {
	  "lengthMenu": [[30, 50, 100, -1], [30, 50, 100, "Todo"]],
      "language": {
		"zeroRecords": "No se encontro el registro",
        "sLengthMenu":    "&nbsp;&nbsp;&nbsp;Mostrar _MENU_ registros",
        "sZeroRecords":   "&nbsp;&nbsp;&nbsp;No se encontraron resultados",
        "sEmptyTable":    "&nbsp;&nbsp;&nbsp;Ningún dato disponible en esta tabla",
        "info": "&nbsp;&nbsp;&nbsp;Mostrando página _PAGE_ de _PAGES_",
        "infoEmpty": "&nbsp;&nbsp;&nbsp;No hay registros disponibles",
        "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
        "sUrl":           "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":    "Último",
            "sNext":    "Siguiente",
            "sPrevious": "Anterior"
        }
        
    }
   });
	
    var table = $('#datatable').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.header() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
		$("#datatable_filter").css("display", "none");
    } );
} );

 $('#formConfirm').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      var public_id = button.data('id');
      var clientname = button.data('clientname');
      var amount = button.data('amount');
      var modal = $(this);
      modal.find('.modal-body').text('¿ Está seguro de borrar el Crédito del cliente ' + clientname + ' por el monto de ' + amount + '?');
      document.getElementById("public_id").value = public_id; 
  });
  
</script>
	
	
	

@stop