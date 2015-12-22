@extends('header')
@section('title')Gestión de Notas de Entrega @stop
  @section('head') @stop
@section('encabezado')  Notas de Entrega @stop
@section('encabezado_descripcion') Gestión de Notas   @stop
@section('nivel') <li><a href="#"><i class="fa fa-files-o"></i> Facturas</a></li> @stop

@section('content')

<div class="panel panel-default">
  <div class="box-header with-border">
     <h3 class="box-title"><a href="{{ url('notaEntrega') }}" class="btn btn-success" role="button">Nueva Nota &nbsp<span class="glyphicon glyphicon-plus-sign"></span></a></h3>
    <div class="box-tools pull-right">
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->


  <div class="table-responsive">
		<table id="datatable" class="table table-striped table-hover" cellspacing="0" cellpadding="0" width="100%" style="margin-left:24px;">
          <thead>
              <tr>
                  <!--<td><input class="selectAll" type="checkbox"></td>-->
                  <td>Nº</td>
                  <td>Raz&oacute;n</td>
                  <td>Fecha</td>
                  <td>Total</td>

                   <td>Sucursal</td>

                  <td>Estado</td>
                  <td style = "display:none">Acción</td>

              </tr>
          </thead>
			<thead>
              <tr>
                  <!--<td><input class="selectAll" type="checkbox"></td>-->
                  <th>Nº</th>
                  <th>Raz&oacute;n</th>
                  <th>Fecha</th>
                  <th>Total</th>

                   <th>Sucursal</th>

                  <th>Estado</th>
                  <th style = "display:block">&nbsp;Acción</th>

              </tr>
          </thead>
          <!-- <tbody>

          @foreach($invoices as $invoice)
              <tr class="active">

                  <td>{{ $invoice->invoice_number}}</td>
                  <td ><a href="{{URL::to('clientes/'.Client::find($invoice->client_id)->public_id)}}">{{ $invoice->getClientName() }}</a></td>
                  <td>{{ $invoice->getInvoiceDate() }}</td>
                  <td>{{ $invoice->getImporteTotal() }}</td>

                  <td>{{ $invoice->getBranchName()}}</td>

                  <td>{{ $invoice->getInvoiceStatus() }}</td>

                  <td>
        		<a id="{{$invoice->invoice_number}}" class="btn btn-primary btn-xs jae" data-task="view" href="{{ URL::to("factura/".$invoice->public_id) }}"  style="text-decoration:none;color:white;"><i class="glyphicon glyphicon-eye-open" title="hola" ></i></a>
  		    	<a class="btn btn-warning btn-xs" data-task="view" data-toggle="tooltip" data-original-title="Default tooltip" href="{{ URL::to("copia/".$invoice->public_id) }}"  style="text-decoration:none;color:white;"><i class="glyphicon glyphicon-duplicate"></i></a>
                  </td>
              </tr>
          @endforeach
          </tbody> -->
        </table>

    </div>
</div>

<div class="modal fade" id="formConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="frm_title">Borrar Producto</h4>
      </div>
      {{ Form::open(array('url' => 'productos/bulk','id' => 'formDelete')) }}
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

$("#jae2").change(function (){
    console.log("i founf a place so safe not a single tear");

    });

    $('#datatable thead td').each( function () {
      var title = $('#datatable thead td').eq( $(this).index() ).text();

		//alert(title);
		var tamaño = 10;
		if (title == 'Nº') {
		  tamaño = 3;
		  //$(this).html('<div class="left-inner-addon form-group has-feedback has-feedback-left"><input type="text" size="2"class="form-control" placeholder="'+title+'" /><i class="glyphicon glyphicon-search form-control-feedback"></i></div>');
		  $(this).html('<div class="form-group  has-feedback"><input size="'+tamaño+'" placeholder="'+title+'" type="text" class="form-control" id="place"><span style="text-decoration:none;color:#D3D3D3;" class="glyphicon glyphicon-search form-control-feedback "></span></div>');

		}
		else{
		tamaño = 5;
        $(this).html('<div class="form-group has-feedback"><input size="'+tamaño+'" placeholder="'+title+'" type="text" class="form-control" id="place"><span style="text-decoration:none;color:#D3D3D3;" class="glyphicon glyphicon-search form-control-feedback"></span></div>' );
		}
    } );

	$('#datatable').DataTable(
      {
        ajax: {
      url: '{{ URL::to('getNotas') }}',
      dataSrc: 'data'
  },
  columns: [
        { data: 'document_number' },
        { data: 'razon' },
        { data: 'invoice_date' },
        { data: 'importe_total' },
        { data: 'branch_name' },
        { data: 'estado' },
        { data: 'accion' }
        //{ data: 'category_name' },
        //{ data: 'accion' }
      ],
      "deferRender": true,
	  "lengthMenu": [[30, 50, 100, -1], [30, 50, 100, "Todo"]],
    "order": [[ 0, "desc" ]],
      "language": {
		"zeroRecords": "&nbsp;&nbsp;&nbsp;No se encontro el registro",
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
        },
    }
   });

	$('#formConfirm').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      var public_id = button.data('id');
      var name = button.data('name');
      var modal = $(this);
      modal.find('.modal-body').text('¿ Está seguro de borrar ' + name + ' ?');
      document.getElementById("public_id").value = public_id;
  });

    var table = $('#datatable').DataTable(); //mediante esta linea busca

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



</script>

@stop
