@extends('header')
@section('encabezado') INICIO @stop
@section('encabezado_descripcion') Información @stop 
@section('nivel') <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li> @stop

@section('content')
		<div class="row">
          @if(Auth::user()->is_admin)
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="glyphicon glyphicon-home"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Sucursales</span>
                  <span class="info-box-number">{{$cuenta['sucursales']}}</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->

            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Usuarios</span>
                  <span class="info-box-number">{{$cuenta['usuarios']}}</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
          @endif
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="ion-person-stalker"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Clientes</span>
                  <span class="info-box-number">{{$cuenta['clientes']}}</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-orange"><i class="fa fa-cube"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Productos</span>
                  <span class="info-box-number">{{$cuenta['productos']}}</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
@stop