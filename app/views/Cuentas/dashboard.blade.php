@extends('header')
@section('encabezado') INICIO @stop
@section('encabezado_descripcion') informacion @stop 
@section('nivel') <li><a href="#"><i class="fa fa-dashboard"></i> inicio</a></li> @stop

@section('content')
		<div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span>
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
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="ion ion-ios-people-outline"></i></span>
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