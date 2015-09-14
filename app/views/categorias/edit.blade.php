@extends('header')
@section('title')Editar Categoría @stop
  @section('head') @stop
@section('encabezado')  CATEGORÍAS @stop
@section('encabezado_descripcion') Editar Categoría  @stop 
@section('nivel') <li><a href="{{URL::to('productos')}}"><i class="fa fa-cube"></i> Productos y Servicios</a></li><li>Categorías</li>
        <li class="active"> Editar </li> @stop

@section('content')

{{Former::framework('TwitterBootstrap3')}}


<div class="box box-primary">
  
  <div class="box-body">
     {{ Former::open("categorias/".$categoria->public_id)->method('put')}}

        <div class="row">
            <div class="col-md-8">
                <legend>Categoría</legend>
                {{-- {{ Former::legend('Categoría') }} --}}
                {{-- {{ Former::populate($categoria)}} --}}
                <div class="col-md-8">
                     <input type="text" name="name" class="form-control" value='{{$categoria->name}}' aria-describedby="sizing-addon2" title="Ingrese el nombre de la Categoría" pattern=".{1,}" required>
                     {{-- {{ Former::text('name')->label('Nombre') }} --}}
                </div>
            </div>
               
            </div>
            <br><br>
            <div class="row">
                {{-- <div class="col-md-1"></div> --}}
                <div class="col-md-3">
                     <a href="{{ url('categorias/') }}" class="btn btn-default btn-sm btn-block">Cancelar</a>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-success dropdown-toggle btn-sm btn-block"> Guardar</button>
                </div>
            </div>

        {{ Former::close() }}
  
  <div class="box-footer">
   
  </div><!-- box-footer -->
</div><!-- /.box -->


@stop
