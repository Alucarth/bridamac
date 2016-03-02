@extends('header')
@section('title')Gestión de Facturas @stop
  @section('head') 

 <style type="text/css">

    /* enable absolute positioning */
    .inner-addon { 
        position: relative; 
    }

    /* style icon */
    .inner-addon .glyphicon {
      position: absolute;
      padding: 10px;
      pointer-events: none;
    }

    /* align icon */
    .left-addon .glyphicon  { left:  0px;}
    .right-addon .glyphicon { right: 0px;}

    /* add padding  */
    .left-addon input  { padding-left:  30px; }
    .right-addon input { padding-right: 30px; }
  </style>

  @stop
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
      <div class="table-responsive">
              
        <table id="datatable" class="table table-striped table-hover" cellspacing="0" cellpadding="0" width="100%" style="margin-left:24px;">

          <thead>
              <tr>
                  <td class="col-xs-1">
                    <div class="inner-addon left-addon">
                        <i class="glyphicon glyphicon-search"></i>
                          <input type="text" placeholder="Nro" id="numero" value="{{ $numero }}" class="form-control" />
                    </div>
                  </td>
                  <td class="col-xs-2">
                    <div class="inner-addon left-addon">
                        <i class="glyphicon glyphicon-search"></i>
                        <input type="text" placeholder="Razón" id="name" value="{{ $name }}" class="form-control" />
                  </div>
                  </td>
                  <td class="col-xs-2">
                    <div class="inner-addon left-addon">
                        <i class="glyphicon glyphicon-search"></i>
                          <input type="text" placeholder="Fecha" id="fecha" value="{{ $fecha }}" class="form-control" />
                    </div>
                  </td>
                  <td class="col-xs-2">
                    <div class="inner-addon left-addon">
                        <i class="glyphicon glyphicon-search"></i>
                          <input type="text" placeholder="Total" id="total" value="{{ $total }}" class="form-control" />
                      </div>
                  </td>
                  <td class="col-xs-2">
                    <div class="inner-addon left-addon">
                        <i class="glyphicon glyphicon-search"></i>
                          <input type="text" placeholder="Usuario" id="user" value="{{ $user }}" class="form-control" />
                    </div>
                 </td>
                  <td class="col-xs-2">
                    <div class="inner-addon left-addon">
                        <i class="glyphicon glyphicon-search"></i>
                           <input type="text" placeholder="Estado" id="estado" value="{{ $estado }}" class="form-control" />
                    </div>
                </td>
            
                  <td style = "display:none" class="col-xs-1">Acci&ocute;n</td>

              </tr>
          </thead>
          <thead>
              <tr>

                  <th id="numero2">Nro &nbsp;<button  class ="btn btn-default btn-sm" id="dnumero"> <i class="glyphicon glyphicon-sort"></i></button></th>
                  <th id="name2">Razón &nbsp;<button  class ="btn btn-default btn-sm" id="dname"> <i class="glyphicon glyphicon-sort"></i></button></th>
                  <th id="fecha2">Fecha &nbsp;<button  class ="btn btn-default btn-sm" id="dfecha"> <i class="glyphicon glyphicon-sort"></i></button></th>
                  <th id="total2">Total &nbsp;<button  class ="btn btn-default btn-sm" id="dtotal"> <i class="glyphicon glyphicon-sort"></i></button></th>
                  <th id="user2">Facturado por &nbsp;<button  class ="btn btn-default btn-sm" id="duser"> <i class="glyphicon glyphicon-sort"></i></button></th>
                  <th id="estado2">Estado &nbsp;</th>
                  <th>&nbsp;Acción</th>

              </tr>
          </thead>


                <tbody>
                  @foreach($invoices as $invoice)
                    <tr class="active">

                        <td>{{ $invoice->invoice_number }}</td>
                        <td ><a href="{{URL::to('clientes/'.Client::find($invoice->client_id)->public_id)}}">{{ $invoice->client_name }}</a></td>
                        <td>{{ $invoice->invoice_date }}</td>
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
