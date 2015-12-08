@extends('header')
@section('title')Editar Unidad @stop
  @section('head') @stop
@section('encabezado')  UNIDADES @stop
@section('encabezado_descripcion') Editar Unidad  @stop 
@section('nivel') <li><a href="{{URL::to('productos')}}"><i class="fa fa-cube"></i> Productos y Servicios</a></li><li>Unidad</li>
        <li class="active"> Editar </li> @stop

@section('content')

{{Former::framework('TwitterBootstrap3')}}


<div class="box box-primary">
   <div class="box-header with-border">
      <h3 class="box-title">Datos de la Unidad</h3>
      <div class="box-tools pull-right">
        <!-- Buttons, labels, and many other things can be placed here! -->
        <!-- Here is a label for example -->
        
      </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
  
  <div class="box-body">
     {{ Former::open("unidades/".$unidad->public_id)->method('put')}}

        <div class="row">
            <div class="col-md-8">                
                <div class="col-md-8">
                     <input type="text" name="name" class="form-control" value='{{$unidad->name}}' aria-describedby="sizing-addon2" title="Ingrese el nombre de la Unidad" pattern=".{1,}" required>                     
                </div>
            </div>
               
            </div>
            <br><br>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-2">
                     <a href="{{ url('unidades/') }}" class="btn btn-default btn-sm btn-block">Cancelar<span class="glyphicon glyphicon-remove">  </span></a>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-success dropdown-toggle btn-sm btn-block"> Guardar<span class="glyphicon glyphicon-floppy-disk"></span></button>
                </div>
            </div>
           

        {{ Former::close() }}
  
  <div class="box-footer">
   
  </div><!-- box-footer -->
</div><!-- /.box -->


@stop
