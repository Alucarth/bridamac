@extends('header')
@section('title')Template @stop
 @section('head') @stop
@section('encabezado') Agregar Template @stop

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
      <div class="col-md-12">
        <div class="form-group">

          <form method="POST" action="{{URL::to('templateGuardar')}}">
              <label>ID</label>
              <input type="text" name="id" class="form-control" placeholder="id" aria-describedby="sizing-addon2">
              <br>
              <label>Código</label>
              <textarea name="code" class="form-control" rows="3"  placeholder="Enter ..."></textarea><br>
              <input type="text" name="password" class="form-control" placeholder="password" aria-describedby="sizing-addon2">
              <br>
              <button type="submit" class="btn btn-success dropdown-toggle btn-sm btn-block"> Guardar&nbsp&nbsp&nbsp&nbsp<span class="glyphicon glyphicon-floppy-disk"></span></button>
          </form>
        </div>

			</div>




  </div><!-- /.box-body -->
  <div class="box-footer">

  </div><!-- box-footer -->
</div><!-- /.box -->




@stop
