@extends('layout')


@section('title') Creación de Cuenta @stop
@section('head') 
  <style type="text/css">

      .panel-default > .panel-heading-custom {
background: #3b8ab8; color: #fff; }

  </style>
@stop

@section('body')
      
      <div class="col-md-3"></div>
      
      
<div  class="panel panel-default col-md-6">
         
          <div class="panel-heading panel-heading-custom">
            <img style="display:block;margin:0 auto 0 auto;" src="{{ asset('images/logo-emizor_06.png') }}" />
           
          </div>
                    <div class="panel-body">
                        <div class="col-md-12">
                        <label>N&uacute;mero de autorizaci&oacute;n</label>
                      <input type="text" id="cc_auth"  class="form-control cc_form" placeholder="Número de autorización" aria-describedby="sizing-addon2">
                    </div>
                    <div class="col-md-12">
                        <label>N&uacute;mero de factura</label>
                      <input type="text"id="cc_invo" class="form-control cc_form" placeholder="Número de factura" aria-describedby="sizing-addon2">
                    </div>
                    <div class="col-md-12">
                      <label>NIT</label>
                      <input type="text" id="cc_nit" class="form-control cc_form" placeholder="NIT" aria-describedby="sizing-addon2">
                    </div>
                    <div class="col-md-12">
                      <label>Fecha</label>
                      <input type="text" id="cc_date" class="form-control cc_form" placeholder="Fecha" aria-describedby="sizing-addon2">
                    </div>
                    <div class="col-md-12">
                      <label>Total</label>
                      <input type="text" id="cc_tota" class="form-control cc_form" placeholder="Total" aria-describedby="sizing-addon2">
                    </div>
                    <div class="col-md-12">
                      <label>Llave</label>
                      <input type="text" id="cc_key" class="form-control cc_form" placeholder="Llave" aria-describedby="sizing-addon2">
                    </div>

     
                    <div class="col-md-12">
                        <hr>
                        <div class="col-md-12">
                        <label>C&oacute;digo de Control</label>
                        </div>
                        <div class="col-md-10">
                        <input type="text" id="cc_cc" class="form-control" placeholder="Código Generado" aria-describedby="sizing-addon2">
                        </div>
                        <div class="col-md-2">
                        <button id="generar" type="button" class="btn btn-primary">Generar</button>
                        </div>
                    </div>
                        <br>
    
    <div class="col-md-12">
    <hr>    
    </div>
        <div class="col-md-12">
            <center>
        <button id='emizor'  class="btn btn-default">Cerrar</button>
        <button id="clear" type="button" class="btn btn-primary">Nuevo</button>
            </center>
    </div>
                  </div>

</div>
      <script type="text/javascript">
          $("#emizor").click(function(){
              window.open('http://app.emizor.com','_SELF');
          });
          $("#clear").click(function(){
                $("#cc_auth").val('');
                $("#cc_invo").val('');
                $("#cc_nit").val('');
                $("#cc_date").val('');
                $("#cc_tota").val('');
                $("#cc_key").val('');
                $("#cc_cc").val('');
           });
           
        $('#cc_date').on('keypress', function(e) {
        if (e.which == 32)
            return false;
        });
        $("#cc_cc").click(function(){
        $("#cc_cc").select();
        });
           
          $("#generar").click(function(){
            cc_auth = $("#cc_auth").val();
            cc_invo =  $("#cc_invo").val();
            cc_nit =  $("#cc_nit").val();
            cc_date = $("#cc_date").val();
            cc_tota = $("#cc_tota").val();
            cc_key = encodeURIComponent($("#cc_key").val());
            $.ajax({
                  type: 'POST',
                  url:'{{ URL::to('examenimpuestos') }}',
                  data: 'cc_auth='+cc_auth+'&cc_invo='+cc_invo+'&cc_nit='+cc_nit+'&cc_date='+cc_date+'&cc_tota='+cc_tota+'&cc_key='+cc_key,
                  beforeSend: function(){
                    console.log("Generando Codigo de Control...");
                  },
                  success: function(result)
                  {
                      console.log(result);
                      $("#cc_cc").val(result).select();
                  }
            });
        });
      </script>

@stop 
