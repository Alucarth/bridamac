@extends('header')
@section('title')Nueva Categoría @stop
  @section('head') @stop
@section('encabezado')  CATEGORÍAS @stop
@section('encabezado_descripcion') Nueva Categoría  @stop 
@section('nivel') <li><a href="{{URL::to('productos')}}"><i class="fa fa-cube"></i> Productos y Servicios</a></li><li>Categorías</li>
        <li class="active"> Nuevo </li> @stop

@section('content')

{{Former::framework('TwitterBootstrap3')}}

<div class="box box-success">
  
  <div class="box-body">
      {{ Former::open("categorias")->method('post')->addClass('col-md-8 col-md-offset-2 warn-on-exit')->rules(array( 
        'name' => 'required|match:/[a-zA-Z. ]+/',
    )); }}

        <div class="row">
            <div class="col-md-8">
                <legend>Categoría</legend>
                <div class="col-md-10">
                     <p>
                        <label>Nombre *</label><br>
                        <input type="text" name="name" class="form-control" placeholder="Nombre de la Categoría" aria-describedby="sizing-addon2" title="Ingrese el nombre de la Categoría" pattern=".{1,}" required>
                    {{-- {{ Former::text('name')->label('Nombre') }} --}}
                    </p>{{-- {{ Former::legend('Categoría') }} --}}
                </div>
            </div>

        </div>
        <br>
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
  </div><!-- /.box-body -->
  <div class="box-footer">
    
  </div><!-- box-footer -->
</div><!-- /.box -->


@stop
