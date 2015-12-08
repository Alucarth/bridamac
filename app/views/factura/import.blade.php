@extends('header')
@section('title')Importar Lote de Facturas @stop
@section('head') @stop
@section('encabezado')  Facturas @stop
@section('encabezado_descripcion') Importar Factura  @stop 
@section('nivel') <li><a href="{{URL::to('factura')}}"><i class="fa fa-cube"></i> Faturas</a></li>
        <li class="active"> Importar </li> @stop

@section('content')

{{Former::framework('TwitterBootstrap3')}}
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Subir archivo Excel</h3>
            <div class="box-tools pull-right">
            </div>
          </div>
          <div class="box-body">
      
    <legend>Archivo excel</legend>

<form action="{{asset('excel')}}" method="post" enctype="multipart/form-data">
    
    <div class="col-md-12">
    <div class="col-md-5"></div>
    <div class="col-md-2 center">
        <span class="btn btn-primary btn-file btn-large">
        Seleccionar Archivo CSV<input type="file" accept=".csv" name="excel" id="fileToUpload" >    
        </span>
    </div>
   <div class="col-md-5"></div>
    </div>
   <br><br><br>
   <div class="col-md-12">
   <div class="col-md-5"></div>
    <div class="col-md-2 center">
    <!--<input type="submit" class="btn btn-success btn-large " value="Subir Archivo" name="submit">-->
    <button type="submit" class="btn btn-success">
      <span class="glyphicon glyphicon-upload"></span> Subir Archivo
    </button>
    </div>
   <div class="col-md-5"></div>
   </div>
</form>
          </div><!-- /.box-body -->
          <div class="box-footer">

          </div><!-- box-footer -->
        </div><!-- /.box -->
        <script type="text/javascript">

                $("form").submit(function() {
                    $(this).submit(function() {
                        return false;
                    });
                    return true;
                });
        </script>



@stop