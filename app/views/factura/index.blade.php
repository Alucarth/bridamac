@extends('header')
@section('title')Gestión de Facturas @stop
  @section('head') @stop
@section('encabezado')  FACTURAS @stop
@section('encabezado_descripcion') Gestión de Facturas  @stop
@section('nivel') <li><a href="#"><i class="fa fa-files-o"></i> Facturas</a></li> @stop

@section('content')

<div class="panel panel-default">
  <div class="box-header with-border">
     <h3 class="box-title"><a href="{{ url(Session::get('invoice_link')) }}" class="btn btn-success" role="button">Nueva Factura&nbsp<span class="glyphicon glyphicon-plus-sign"></span></a></h3>
    <div class="box-tools pull-right">
    </div>
  </div>


<!--  <div class="box-body">
  <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row"><div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                </div>
              </div>
              <div class="row">
  <div class="col-sm-12">
		<table id="datatable" class="table table-bordered table-hover dataTable" cellspacing="0" cellpadding="0" width="100%" style="margin-left:24px;">
          <thead>
              <tr>
                  <td rowspan="1" colspan="1"><input placeholder="Número" id="numero" value="{{ $numero }}"></td>
                  <td><input placeholder="Razón" id="name" value="{{ $name }}"></input></td>
                  <td><input placeholder="Fecha" id="fecha" value="{{ $fecha }}"></input></td>
                  <td><input placeholder="Total" id="total" value="{{ $total }}"></input></td>
                  <td><input placeholder="Usuario Facturador" id="user" value="{{ $user }}"></input></td>
                  <td><input placeholder="Estado" id="estado" value="{{ $estado }}"></input></td>
                  <td style = "display:none">Acción</td>

              </tr>
          </thead>
      <thead>
              <tr>

                  <th id="numero2" rowspan="1" colspan="1">Número <button  style="text-decoration:none;color:#000;" id="dnumero"> <i class="glyphicon glyphicon-sort"></i></button></th>
                  <th id="name2">Razón<button  style="text-decoration:none;color:#000;" id="dname"> <i class="glyphicon glyphicon-sort"></i></button></th>
                  <th id="fecha2">Fecha<button  style="text-decoration:none;color:#000;" id="dfecha"> <i class="glyphicon glyphicon-sort"></i></button></th>
                  <th id="total2">Total<button  style="text-decoration:none;color:#000;" id="dtotal"> <i class="glyphicon glyphicon-sort"></i></button></th>
                  <th id="user2">Usuario Facturador<button  style="text-decoration:none;color:#000;" id="duser"> <i class="glyphicon glyphicon-sort"></i></button></th>
                  <th id="estado2">Estado<button  style="text-decoration:none;color:#000;" id="destado"> <i class="glyphicon glyphicon-sort"></i></button></th>
                  <th style = "display:block">&nbsp;Acción</th>

              </tr>
          </thead>
           <tbody>

          @foreach($invoices as $invoice)
              <tr class="active">

                  <td>{{ $invoice->invoice_number }}</td>
                  <td ><a href="{{URL::to('clientes/'.Client::find($invoice->client_id)->id)}}">{{ $invoice->client_name }}</a></td>
                  <td>{{ $invoice->created_at }}</td>
                  <td>{{ $invoice->importe_total }}</td>

                  <td>{{ $invoice->name }}</td>

                  <td>
            <a id="{{$invoice->invoice_number}}" class="btn btn-primary btn-xs jae" data-task="view" href="{{ URL::to("factura/".$invoice->id) }}"  style="text-decoration:none;color:white;"><i class="glyphicon glyphicon-eye-open" title="hola" ></i></a>
            <a class="btn btn-warning btn-xs" data-task="view" data-toggle="tooltip" data-original-title="Default tooltip" href="{{ URL::to("copia/".$invoice->id) }}"  style="text-decoration:none;color:white;"><i class="glyphicon glyphicon-duplicate"></i></a>
                  </td>
              </tr>
          @endforeach
          </tbody>
        </table>
       </div>
      </div>-->

      <div class="table-responsive">
              <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row"><div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                </div>
              </div>
              <div class="row">
                  <div class="col-sm-12">
                  <table id="datatable" class="table table-bordered table-hover dataTable" role="grid">

                <thead>
              <tr>
                  <td rowspan="1" colspan="1"><input placeholder="Número" id="numero" value="{{ $numero }}"></td>
                  <td><input placeholder="Razón" id="name" value="{{ $name }}"></input></td>
                  <td><input placeholder="Fecha" id="fecha" value="{{ $fecha }}"></input></td>
                  <td><input placeholder="Total" id="total" value="{{ $total }}"></input></td>
                  <td><input placeholder="Usuario Facturador" id="user" value="{{ $user }}"></input></td>
                  <td><input placeholder="Estado" id="estado" value="{{ $estado }}"></input></td>
                  <td style = "display:none">Acción</td>

              </tr>
          </thead>
          <thead>
              <tr>

                  <th id="numero2" rowspan="1" colspan="1">Número &nbsp;<button  style="text-decoration:none;color:#000;" id="dnumero"> <i class="glyphicon glyphicon-sort"></i></button></th>
                  <th id="name2">Razón &nbsp;<button  style="text-decoration:none;color:#000;" id="dname"> <i class="glyphicon glyphicon-sort"></i></button></th>
                  <th id="fecha2">Fecha &nbsp;<button  style="text-decoration:none;color:#000;" id="dfecha"> <i class="glyphicon glyphicon-sort"></i></button></th>
                  <th id="total2">Total &nbsp;<button  style="text-decoration:none;color:#000;" id="dtotal"> <i class="glyphicon glyphicon-sort"></i></button></th>
                  <th id="user2">Facturado por &nbsp;<button  style="text-decoration:none;color:#000;" id="duser"> <i class="glyphicon glyphicon-sort"></i></button></th>
                  <th id="estado2">Estado &nbsp;<button  style="text-decoration:none;color:#000;" id="destado"> <i class="glyphicon glyphicon-sort"></i></button></th>
                  <th style = "display:block">&nbsp;Acción</th>

              </tr>
          </thead>


                <tbody>
                  @foreach($invoices as $invoice)
                    <tr class="active">

                        <td>{{ $invoice->invoice_number }}</td>
                        <td ><a href="{{URL::to('clientes/'.Client::find($invoice->client_id)->public_id)}}">{{ $invoice->client_name }}</a></td>
                        <td>{{ $invoice->created_at }}</td>
                        <td>{{ $invoice->importe_neto }}</td>
                        <td>{{ User::find($invoice->user_id)->first_name }}</td>
                        <td>{{ $invoice->name }}</td>

                        <td>
                  <a id="{{$invoice->invoice_number}}" class="btn btn-primary btn-xs jae" data-task="view" href="{{ URL::to("factura/".$invoice->public_id) }}"  style="text-decoration:none;color:white;"><i class="glyphicon glyphicon-eye-open" title="hola" ></i></a>
                  <a class="btn btn-warning btn-xs" data-task="view" data-toggle="tooltip" data-original-title="Default tooltip" href="{{ URL::to("copia/".$invoice->public_id) }}"  style="text-decoration:none;color:white;"><i class="glyphicon glyphicon-duplicate"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
              </table>
              </div>
             </div>
              </div>
            </div>
         @if($numero != "")
        <center><div class="pagination"> {{ $invoices->appends(array('numero' => $numero))->links() }} </div></center>
        @endif
        @if($name != "")
        <center><div class="pagination"> {{ $invoices->appends(array('name' => $name))->links() }} </div></center>
        @endif
        @if($fecha != "")
        <center><div class="pagination"> {{ $invoices->appends(array('fecha' => $fecha))->links() }} </div></center>
        @endif
        @if($total != "")
        <center><div class="pagination"> {{ $invoices->appends(array('total' => $total))->links() }} </div></center>
        @endif
        @if($estado != "")
        <center><div class="pagination"> {{ $invoices->appends(array('estado' => $estado))->links() }} </div></center>
        @endif
        @if($user != "")
        <center><div class="pagination"> {{ $invoices->appends(array('user' => $user))->links() }} </div></center>
        @endif
        @if($numero == "" && $name == "" && $fecha == "" && $total == "" && $estado == "" && $user == "")
        <center><div class="pagination"> {{ $invoices->links() }} </div></center>
        @endif


    </div>
</div>

<script type="text/javascript">

$('#numero').keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
        // alert('You pressed a "enter" key in textbox');
        console.log("Enter");
        numero = $("#numero").val();
        window.open('{{URL::to('factura')}}'+'?numero=' +numero, "_self");
    }
});

$('#name').keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
        // alert('You pressed a "enter" key in textbox');
        console.log("Enter");
        name = $("#name").val();
        window.open('{{URL::to('factura')}}'+'?name=' +name, "_self");
    }
});

$('#fecha').keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
        // alert('You pressed a "enter" key in textbox');
        console.log("Enter");
        fecha = $("#fecha").val();
        window.open('{{URL::to('factura')}}'+'?fecha=' +fecha, "_self");
    }
});

$('#total').keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
        // alert('You pressed a "enter" key in textbox');
        console.log("Enter");
        total = $("#total").val();
        window.open('{{URL::to('factura')}}'+'?total=' +total, "_self");
    }
});
$('#user').keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
        // alert('You pressed a "enter" key in textbox');
        console.log("Enter");
        user = $("#user").val();
        window.open('{{URL::to('factura')}}'+'?user=' +user, "_self");
    }
});

$('#estado').keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
        // alert('You pressed a "enter" key in textbox');
        console.log("Enter");
        estado = $("#estado").val();
        window.open('{{URL::to('factura')}}'+'?estado=' +estado, "_self");
    }
});

$('#dnumero').click(function(){
  numero = $("#numero").val();
  var sw = '{{Session::get('sw')}}';
  console.log(sw);
  if(sw==="DESC")
  {
    sw="ASC";
  }
  else if(sw==="ASC")
  {
    sw="DESC";
  }
  console.log(sw);
  if(sw ==="DESC")
  {
      window.open('{{URL::to('factura')}}'+'?numero='+numero, "_self");
  }
  else if(sw==="ASC")
  {
      window.open('{{URL::to('facturaDown')}}'+'?numero='+numero, "_self");
  }

});
$('#dname').click(function(){
  name = $("#name").val();
  var sw = '{{Session::get('sw')}}';
   console.log(sw);
  if(sw==="DESC")
  {
    sw="ASC";
  }
  else if(sw==="ASC")
  {
    sw="DESC";
  }
  console.log(sw);
  if(sw ==="DESC")
  {
    window.open('{{URL::to('factura')}}'+'?name='+name, "_self");
  }
  else if(sw==="ASC")
  {
    window.open('{{URL::to('facturaDown')}}'+'?name='+name, "_self");
  }
});
$('#dfecha').click(function(){
  fecha = $("#fecha").val();
  var sw = '{{Session::get('sw')}}';
  console.log(sw);
  if(sw==="DESC")
  {
    sw="ASC";
  }
  else if(sw==="ASC")
  {
    sw="DESC";
  }
  if(sw ==="DESC")
  {
     window.open('{{URL::to('factura')}}'+'?fecha='+fecha, "_self");
  }
  else if(sw==="ASC")
  {
     window.open('{{URL::to('facturaDown')}}'+'?fecha='+fecha, "_self");
  }

});
$('#dtotal').click(function(){
  total = $("#total").val();
  var sw = '{{Session::get('sw')}}';

   console.log(sw);
  if(sw==="DESC")
  {
    sw="ASC";
  }
  else if(sw==="ASC")
  {
    sw="DESC";
  }
  if(sw ==="DESC")
  {
     window.open('{{URL::to('factura')}}'+'?total='+total, "_self");
  }
  else if(sw==="ASC")
  {
     window.open('{{URL::to('facturaDown')}}'+'?total='+total, "_self");
  }


});

$('#duser').click(function(){
  user = $("#user").val();
  var sw = '{{Session::get('sw')}}';

   console.log(sw);
  if(sw==="DESC")
  {
    sw="ASC";
  }
  else if(sw==="ASC")
  {
    sw="DESC";
  }
  if(sw ==="DESC")
  {
     window.open('{{URL::to('factura')}}'+'?user='+user, "_self");
  }
  else if(sw==="ASC")
  {
     window.open('{{URL::to('facturaDown')}}'+'?user='+user, "_self");
  }


});

$('#destado').click(function(){
  estado = $("#estado").val();
  var sw = '{{Session::get('sw')}}';

   console.log(sw);
  if(sw==="DESC")
  {
    sw="ASC";
  }
  else if(sw==="ASC")
  {
    sw="DESC";
  }
  if(sw ==="DESC")
  {
     window.open('{{URL::to('factura')}}'+'?estado='+estado, "_self");
  }
  else if(sw==="ASC")
  {
     window.open('{{URL::to('facturaDown')}}'+'?estado='+estado, "_self");
  }


});


</script>

@stop
