@extends('header')
@section('title')Template @stop
 @section('head') @stop
@section('encabezado') Agregar Logo @stop

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
          <form method="post" action="{{URL::to('logoBuscar')}}">
          <input type="text" name="id"  placeholder="buscar" aria-describedby="sizing-addon2">
          <button type="submit" class="btn btn-success dropdown-toggle"> Buscar&nbsp&nbsp&nbsp&nbsp<span class="glyphicon glyphicon-find"></span></button>
        </form>
         <br>
        <form method="post" action="{{URL::to('logoBuscarDominio')}}">
        <input type="text" name="domain"  placeholder="buscar" aria-describedby="sizing-addon2">
        <button type="submit" class="btn btn-success dropdown-toggle"> Buscar Dominio &nbsp&nbsp&nbsp&nbsp<span class="glyphicon glyphicon-find"></span></button>
      </form>
      <div class="table-responsive">

          <table id="datatable" class="table table-striped table-hover" cellspacing="0" cellpadding="0" width="100%">
              <thead>
                  <tr>
                      <td>ID</td>
                      <td>Cuenta</td>
                      <td>Master ID</td>
                  </tr>
              </thead>

               <tbody>

              @foreach($documents as $document)
                  <tr>
                      <td>{{ $document->id }}</td>
                      <td>{{ $document->account_id }}</a></td>
                      <td>{{ $document->master_id }}</td>
                  </tr>
              @endforeach
              </tbody>
            </table>

      </div><!-- /.box-body -->
      
      <div class="box-footer">



          <form method="POST" action="{{URL::to('logoGuardar')}}">
              <label>ID</label>
              <input type="text" name="code" class="form-control" placeholder="id" aria-describedby="sizing-addon2" value="{{ $logo->id }}">

              <br>
              <label>Logo en Base 64</label>
              <textarea name="codigoLogo" class="form-control" rows="10" cols="50"  placeholder="Enter ...">{{ $logo->logo }}</textarea><br>
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
