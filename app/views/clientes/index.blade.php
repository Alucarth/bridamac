@extends('header')
@section('title') Gestión de Clientes @stop
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
@section('encabezado') CLIENTES @stop
@section('encabezado_descripcion') Gestión de Clientes @stop
@section('nivel') <li><a href="#"><i class="ion-person-stalker"></i> Clientes</a></li> @stop

@section('content')

<div class="panel panel-default">
  <div class="box-header with-border">
    <h3 class="box-title"><a href="{{ url('clientes/create') }}" class="btn btn-success" role="button">Nuevo Cliente &nbsp<span class="glyphicon glyphicon-plus-sign"></span></a>  </h3>
     <div class="box-tools pull-right">

    </div>
  </div>

  <div class="table-responsive">
      <table id="example2" class="table table-striped table-hover" cellspacing="0" cellpadding="0" width="100%" style="margin-left:24px;">
            <thead>
               <tr>
                 <td class="col-xs-2">
                    <div class="inner-addon left-addon">
                        <i class="glyphicon glyphicon-search"></i>
                          <input type="text" placeholder="Número" id="numero" value="{{ $numero }}" class="form-control" />
                      </div>
                  </td>
                  <?php $a = 4 ?>
                  @if(Utils::campoExtra() == '131555028')
                  <?php $a = 2?>
                  <td class="col-xs-{{$a}}">
                    <div class="inner-addon left-addon">
                        <i class="glyphicon glyphicon-search"></i>
                          <input type="text" placeholder="Mátricula" id="matricula" value="{{ $matricula }}" class="form-control" />
                        </div>
                  </td>
                   @endif
                   <td class="col-xs-{{$a}}">
                    <div class="inner-addon left-addon">
                        <i class="glyphicon glyphicon-search"></i>
                            <input type="text" placeholder="Nombre" id="name" value="{{ $name }}" class="form-control" />
                        </div>
                    </td>
                    <td class="col-xs-2">
                      <div class="inner-addon left-addon">
                        <i class="glyphicon glyphicon-search"></i>
                          <input type="text" placeholder="Nit" id="nit" value="{{ $nit }}" class="form-control" />
                      </div>
                    </td>
                    <td class="col-xs-2">
                      <div class="inner-addon left-addon">
                        <i class="glyphicon glyphicon-search"></i>
                          <input  type="text" placeholder="Teléfono" id="telefono" value="{{ $telefono }}" class="form-control" />
                      </div>
                    </td>
                    <td  class="col-xs-2" style = "display:none">Acción</td>
                  </tr>
                </thead>
                <thead>
                          <tr>
                              <th id="numero2">Número <button  class ="btn btn-default btn-sm" id="dnumero"> <i class="glyphicon glyphicon-sort"></i></button></th>
                              @if(Utils::campoExtra() == '131555028')
                              <th id="name2">Matrícula <button  class ="btn btn-default btn-sm" id="dmatricula"><i class="glyphicon glyphicon-sort"></i></button></th>
                              @endif
                              <th id="name2">Nombre <button  class ="btn btn-default btn-sm" id="dname"><i class="glyphicon glyphicon-sort"></i></button></th>
                              <th id="nit2">Nit <button class ="btn btn-default btn-sm" id="dnit"><i class="glyphicon glyphicon-sort"></i></button></th>
                              <th id="telefono2">Teléfono <button  class ="btn btn-default btn-sm" id="dtelefono"><i class="glyphicon glyphicon-sort"></i></button></th>
                              <th style = "display:block">&nbsp;&nbsp;&nbsp;&nbsp;Acción</th>
                          </tr>
                  </thead>
                <tbody>

                @foreach($clients as $client)
                    <tr role="row">
                        <td>{{ $client->public_id }}</td>
                        @if(Utils::campoExtra() == '131555028')
                        <td>{{ $client->custom_value4 }}</a></td>
                        @endif
                        <td><a href="{{URL::to('clientes/'.$client->public_id)}}">{{ $client->name }}</a></td>

                        <td><a href="{{URL::to('clientes/'.$client->public_id)}}">{{ $client->nit}}</a></td>

                        <td>{{ $client->work_phone ? $client->work_phone : $client->phone }}</td>

                        <td>
                            {{ Form::open(['url' => 'clientes/'.$client->public_id, 'method' => 'delete', 'class' => 'deleteForm']) }}
                          <a class="btn btn-primary btn-xs" data-task="view" href="{{ URL::to("clientes/".$client->public_id) }}"  style="text-decoration:none;color:white;"><i class="glyphicon glyphicon-eye-open"></i></a>
                          <a class="btn btn-warning btn-xs" href="{{ URL::to("clientes/".$client->public_id.'/edit') }}" style="text-decoration:none;color:white;"><i class="glyphicon glyphicon-edit"></i></a>
                          <!--no <a class="btn btn-danger btn-xs" onclick="$(this).closest('form').submit()" type="submit" style="text-decoration:none;color:white;"><i class="glyphicon glyphicon-remove"></i></a> -->
                            {{ Form::close() }}
                        </td>

                    </tr>

                @endforeach

              <!-- </tbody>
                <tfoot>
                <tr><th rowspan="1" colspan="1">Rendering engine</th>
                <th rowspan="1" colspan="1">Browser</th>
                <th rowspan="1" colspan="1">Platform(s)</th>
                <th rowspan="1" colspan="1">Engine version</th>
                <th rowspan="1" colspan="1">CSS grade</th></tr>
                </tfoot> -->
              </table>

              @if($numero != "")
              <center><div class="pagination"> {{ $clients->appends(array('numero' => $numero))->links(); }} </div></center>
              @endif
              @if($name != "")
              <center><div class="pagination"> {{ $clients->appends(array('name' => $name))->links(); }} </div></center>
              @endif
              @if($nit != "")
              <center><div class="pagination"> {{ $clients->appends(array('nit' => $nit))->links(); }} </div></center>
              @endif
              @if($telefono != "")
              <center><div class="pagination"> {{ $clients->appends(array('telefono' => $telefono))->links(); }} </div></center>
              @endif
              @if($numero == "" && $name == "" && $nit == "" && $telefono == "")
              <center><div class="pagination"> {{ $clients->links(); }} </div></center>
              @endif
          


  </div>
</div>


<script>

$('#dnumero').click(function(){
  // console.log("aqui");
  numero = $("#numero").val();
  var sw = '{{Session::get('sw')}}';
  console.log('variable sw '+sw);
  // console.log(numero);
  window.open('{{URL::to('clientesDown')}}'+'?numero='+numero, "_self");
});

$('#dname').click(function(){
  name = $("#name").val();
  var sw = '{{Session::get('sw')}}';
  console.log('variable sw '+sw);
  window.open('{{URL::to('clientesDown')}}'+'?name='+name, "_self");
});


$('#dnit').click(function(){
  nit = $("#nit").val();
  var sw = '{{Session::get('sw')}}';
  console.log('variable sw '+sw);
  window.open('{{URL::to('clientesDown')}}'+'?nit=' +nit, "_self");
});

$('#dtelefono').click(function(){
  telefono = $("#telefono").val();
  var sw = '{{Session::get('sw')}}';
  console.log('variable sw '+sw);
  window.open('{{URL::to('clientesDown')}}'+'?telefono=' +telefono, "_self");
});

$('#dmatricula').click(function(){
  matricula = $("#matricula").val();
  var sw = '{{Session::get('sw')}}';
  console.log('variable sw '+sw);
  window.open('{{URL::to('clientesDown')}}'+'?matricula=' +matricula, "_self");
});



$('#name').keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
        // alert('You pressed a "enter" key in textbox');
        console.log("Enter");
        name = $("#name").val();
        window.open('{{URL::to('clientes')}}'+'?name=' +name, "_self");
    }
});

$('#numero').keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
        // alert('You pressed a "enter" key in textbox');
        console.log("Enter");
        numero = $("#numero").val();
        window.open('{{URL::to('clientes')}}'+'?numero=' +numero, "_self");
    }
});

$('#nit').change(function(){
  nit = $("#nit").val();
  window.open('{{URL::to('clientes')}}'+'?nit=' +nit, "_self");
});
$('#telefono').change(function(){
  telefono = $("#telefono").val();
  window.open('{{URL::to('clientes')}}'+'?telefono=' +telefono, "_self");
});

$('#matricula').change(function(){
  matricula = $("#matricula").val();
  window.open('{{URL::to('clientes')}}'+'?matricula=' +matricula, "_self");
});


</script>


@stop
