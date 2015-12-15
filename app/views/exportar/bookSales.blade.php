@extends('header')
@section('title') Generar Libro de Ventas @stop
@section('head') <style>
.ui-datepicker-calendar {
    display: none;
    }
</style>@stop
@section('encabezado')  Libro de Ventas @stop
@section('encabezado_descripcion') Generar Libro de Ventas  @stop 
@section('nivel') <li><a href="#"><i class="fa fa-align-justify "></i> Libro de ventas</a></li>
         @stop

@section('content')

{{Former::framework('TwitterBootstrap3')}}
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Generar libro de ventas</h3>
            <div class="box-tools pull-right">
            </div>
          </div>
          <div class="box-body">
      
    <legend>Libro de Ventas</legend>

<form action="{{asset('generateBookSales')}}" method="post" enctype="multipart/form-data">
    
    <div class="col-md-12">
        <div class="col-md-1"></div>
              <div class="form-group col-md-4">
        <label>Selecciones Fecha:</label>
        <div class="input-group emision_icon">              
          <input class="form-control pull-right" name="date" id="date" type="text">
          <div class="input-group-addon">          
            <i class="fa fa-calendar"></i>
          </div>
        </div><!-- /.input group -->
    </div><!-- /.form group -->
        <div class="col-md-2 center"></div>
        <div class="col-md-2 center">
            <button  id="sub_boton" class="btn btn-large btn-primary openbutton" type="submit">Generar Libro de Ventas</button>            
        </div>
        <div class="col-md-3"></div>
    </div>
    
</form>
          </div><!-- /.box-body -->
          <div class="box-footer">

          </div><!-- box-footer -->
        </div><!-- /.box -->
<script type="text/javascript">

//    $("form").submit(function() {
//        $(this).submit(function() {
//            return false;
//        });
//        return true;
//    });
    
$(function() {
    $('#date').datepicker( {
        changeMonth: true,
        changeYear: true,
        showButtonPanel: false,
        dateFormat: 'MM yy',
        onClose: function(dateText, inst) { 
            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
            $(this).datepicker('setDate', new Date(year, month, 1));
        }
    });
});

</script>



@stop