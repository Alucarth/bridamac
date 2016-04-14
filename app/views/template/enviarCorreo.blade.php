@extends('header')
@section('title')Template @stop
 @section('head') @stop
@section('encabezado') Enviar Facturas Todotix @stop

@section('nivel') <li><a href="{{URL::to('productos')}}"><i class="fa fa-cube"></i> Templates</a></li>
            <li class="active">Ver </li> @stop

@section('content')


<div class="box box-info">
  <div class="box-header with-border">

    <div class="box-tools pull-right">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example -->

    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">


  	<div class="row">
      <div class="col-md-3">
        <div class="form-group">
          
        <br>
        
      <div class="table-responsive">
      <form method="post" action="{{URL::to('enviarCorreoFactura')}}">
        <input class="form-control" type="text" name="min"  placeholder="desde" aria-describedby="sizing-addon2"><br>
        <input class="form-control" type="text" name="max"  placeholder="hasta" aria-describedby="sizing-addon2"><br>
        <button type="submit" class="btn btn-success dropdown-toggle"> Enviar Correo(s) &nbsp&nbsp&nbsp&nbsp<span class="glyphicon glyphicon-find"></span></button>
      </form>

          

      </div><!-- /.box-body -->
      <div class="box-footer">



          
        </div>

			</div>




  </div><!-- /.box-body -->
  <div class="box-footer">

  </div><!-- box-footer -->
</div><!-- /.box -->




@stop
