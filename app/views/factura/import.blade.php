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



<form action="{{asset('excel')}}" method="post" enctype="multipart/form-data">

    <div class="col-md-12">
        <div class="col-md-3"></div>
        <div class="col-md-2 center">
            <a type="button"  class="btn btn-large btn-primary" href="{{asset('files/example/importar_excel_emizor.xlsx')}}" download="Plantilla_excel_emizor.xlsx"role="button" >Descargar Plantilla Excel</a>                         
        </div>
        <div class="col-md-2 center"></div>
        <div class="col-md-2 center">
            <span class="btn btn-primary btn-file btn-large">
            Subir Archivo Excel<input type="file" accept=".xlsx" name="excel" id="fileToUpload" required>    
            </span>
            <br>
            <span class="label label-warning glyphicon glyphicon-alert " id='submited_file'>&nbsp;Vac&iacute;o</span>
            
        </div>
        <div class="col-md-3"></div>
    </div>
    <br><br><br>
    <hr>
   <div class="col-md-12">
        <div class="col-md-5"></div>
        <div class="col-md-2 center">
        <!--<input type="submit" class="btn btn-success btn-large " value="Subir Archivo" name="submit">-->
        <button id='btn_import' type="submit" class="btn btn-success" disabled>
        <span class="glyphicon glyphicon-upload"></span> Importar Facturas
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
    
   //var control = document.getElementById("fileToUpload");
   $('#fileToUpload').change(function(){
    var file = $('#fileToUpload')[0].files[0]
    if(file){
    console.log(file.name);
    
    $("#submited_file").removeClass("label-warning glyphicon-alert");
    $("#submited_file").addClass("label-success glyphicon-check");
    $("#submited_file").text(" "+file.name);
    $("#btn_import").prop('disabled', false);;
    } 
   });

</script>



@stop
