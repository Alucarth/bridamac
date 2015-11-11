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
      
    <legend>Logo</legend>

<form action="{{asset('excel')}}" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
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