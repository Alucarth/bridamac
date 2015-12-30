@extends('header')
@section('title') Gestión de Clientes @stop
@section('head') @stop
@section('encabezado') CLIENTES @stop
@section('encabezado_descripcion') Gestión de Clientes @stop
@section('nivel') <li><a href="#"><i class="ion-person-stalker"></i> Clientes</a></li> @stop

@section('content')

<div class="panel panel-default">
  <div class="box-header with-border">
    <h3 class="box-title"><a href="{{ url('clientes/create') }}" class="btn btn-success" role="button">Nuevo Cliente &nbsp<span class="glyphicon glyphicon-plus-sign"></span></a>  </h3>
    <div class="box-tools pull-right">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for datatable -->
         <!-- {{Session::get('sw') }} -->
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->

  <div class="table-responsive">
       <table   id="datatable" class="table table-striped table-hover " cellspacing="0" cellpadding="0" width="100%" style="margin-left:24px;">
        <thead>
              <tr>
                  <td><input placeholder="Número" id="numero" value="{{ $numero }}"></input></td>
                  @if(Utils::campoExtra() == '131555028')
                  <td><input placeholder="Mátricula" id="matricula" value="{{ $matricula }}"></input></td>
                  @endif
                  <td><input placeholder="Nombre" id="name" value="{{ $name }}"></input></td>
                  <td><input placeholder="Nit" id="nit" value="{{ $nit }}"></input></td>
                  <td><input placeholder="Teléfono" id="telefono" value="{{ $telefono }}"></input></td>

                  <td  style = "display:none">Acción</td>
              </tr>
    </thead>

    <thead>
              <tr>
                  <th id="numero2">Número <button  style="text-decoration:none;color:#6F8BE0;" id="dnumero"> <i class="glyphicon glyphicon-sort"></i></button></th>
                  @if(Utils::campoExtra() == '131555028')
                  <th id="name2">Matrícula <button  style="text-decoration:none;color:#6F8BE0;" id="dmatricula"><i class="glyphicon glyphicon-sort"></i></button></th>
                  @endif
                  <th id="name2">Nombre <button  style="text-decoration:none;color:#6F8BE0;" id="dname"><i class="glyphicon glyphicon-sort"></i></button></th>
                  <th id="nit2">Nit <button style="text-decoration:none;color:#6F8BE0;" id="dnit"><i class="glyphicon glyphicon-sort"></i></button></th>
                  <th id="telefono2">Teléfono <button  style="text-decoration:none;color:#6F8BE0;" id="dtelefono"><i class="glyphicon glyphicon-sort"></i></button></th>
                  <th style = "display:block">&nbsp;&nbsp;&nbsp;&nbsp;Acción</th>
              </tr>
          </thead>
             <tbody>

          @foreach($clients as $client)
              <tr>
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
                    <!-- <a class="btn btn-danger btn-xs" onclick="$(this).closest('form').submit()" type="submit" style="text-decoration:none;color:white;"><i class="glyphicon glyphicon-remove"></i></a> -->
                     {{ Form::close() }}
                  </td>

              </tr>

          @endforeach

          </tbody>
        </table>

        <!-- <center><div class="pagination"> {{ $clients->links() }} </div></center> -->


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
