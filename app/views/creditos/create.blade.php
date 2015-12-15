@extends('header')
@section('title')Nuevo Credito @stop
@section('head') 
    <script src="{{ asset('vendor/AdminLTE2/plugins/select2/select2.full.js')}}" type="text/javascript"></script>
    <script src="{{asset('vendor/AdminLTE2/plugins/select2/i18n/es.js')}}" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/AdminLTE2/plugins/select2/select2.css')}}">
    <style type="text/css">
    [class^='select2'] {
        border-radius: 0px !important;               
      } 
      </style>
@stop
@section('encabezado') CREDITOS @stop
@section('encabezado_descripcion') Nuevo Credito @stop 
@section('nivel') <li><a href="{{URL::to('productos')}}"><i class="fa fa-cube"></i> Creditos</a></li>
            <li class="active"> Nuevo </li> @stop

@section('content')

{{Former::framework('TwitterBootstrap3')}}
	<div class="box box-success">
	  <div class="box-header with-border">
	    <h3 class="box-title">Datos del Credito</h3>
	    <div class="box-tools pull-right">	      
	    </div><!-- /.box-tools -->
	  </div><!-- /.box-header -->
	  <div class="box-body">
	    
	  		{{ Former::open('creditos')->addClass('col-md-12 warn-on-exit')->method('POST') }}
	  	<input name="is_product" type="hidden" value="1">
		<div class="row">
                    <div class="col-md-6">	
                        <div class="row">
                            <div class="col-md-5">
                                <p>
                                    <label>Cliente*</label>
                                    <span class="">
                                        <select id="client" name="client" onchange="addValuesClient(this)" class="form-control js-data-example-ajax">                          
                                        </select>
                                     </span>                           
                                    <!--<input type="text" name="client" class="form-control" placeholder="Código" aria-describedby="sizing-addon2" required >-->
                                </p>
                            </div>
                        </div>
<!--                        <input id="mail" type="hidden" name="mail" >
                        <input id="nombre" type="hidden" name="nombre" >
                        <input id="nit" placeholder="NIT"  type="hidden" name="nit" >-->
                        <div class="row">
                                <div class="col-md-5">
                                    <p>
                                    <label>Monto*</label>
                                    <div class="input-group">              
                                    <input class="form-control" type="number" name="amount" placeholder="Monto" aria-describedby="sizing-addon2" required pattern="[0-9]+(\.[0-9][0-9]?)?" >
                                    <div class="input-group-addon">          
                                          <i class="fa fa-money "></i>
                                        </div>
                                    </div>
                                    </p>
                                </div>
                        </div>
                        <div class="row">
                                <div class="col-md-5">
                                    <p>
                                    <label>Fecha de Cr&eacute;dito*</label>                                    
                                    <div class="input-group">              
                                        <input class="form-control pull-right" name="credit_date" id="credit_date" type="text">
                                        <div class="input-group-addon">          
                                          <i class="fa fa-calendar"></i>
                                        </div>
                                      </div>
                                    </p>
                                </div>
                        </div>
                        <div class="row">
                                <div class="col-md-10">					
                                <p>
                                    <label>Referencia de Cr&eacute;dito</label><br>
                                    <textarea name="private_notes" placeholder="Descripci&oacute;n" class="form-control" rows="3" title="Ingrese descripcion del Producto" pattern=".{1,}"></textarea>
                                 </p>		     	 							    				
                                </div>
                        </div>
                    </div>		
		</div>
		<br><br>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-2">
                 <a href="{{ url('creditos/') }}" class="btn btn-default btn-sm btn-block">Cancelar&nbsp&nbsp&nbsp&nbsp<span class="glyphicon glyphicon-remove">  </span></a>
            </div>            
            <div class="col-md-2">
                <button type="submit" class="btn btn-success dropdown-toggle btn-sm btn-block"> Guardar&nbsp&nbsp&nbsp&nbsp<span class="glyphicon glyphicon-floppy-disk"></span></button>
            </div>
        </div>

		{{ Former::close() }}
		Nota: (*) Campos requeridos

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
    
    //$("#credit_date").datepicker();
    $( "#credit_date" ).datepicker({ dateFormat: 'dd/mm/yy' }).datepicker("setDate", new Date());
    
    $("#client").select2({
  ajax: {
    Type: 'POST',
    url: "{{ URL::to('getclients') }}",        
    data: function (params) {
      return {
        name: params.term, // search term
        page: params.page
      };
  },                       
    processResults: function (data, page) { 
    act_clients = data;   
      return {
        results: $.map(data, function (item) {
                return {
                    text: item.nit+" - "+item.name,
                    title: item.business_name,
                    id: item.id//account_id
                }
            })
      };
    },
    cache: true
    },      
  escapeMarkup: function (markup) { return markup; },
  minimumInputLength: 3,  
  placeholder: "NIT o Nombre",
  allowClear: true,  
  language: "es",
});

    function addValuesClient(dato){
      $(".contact_add").hide();
    id_client_selected = $(dato).val();
    act_clients.forEach(function(cli) {
//      if(id_client_selected == cli['id'])
//      {
//        $("#nombre").val(cli['name']);
//        $("#razon").val(cli['business_name']).show();
//        $("#nit").val(cli["nit"]).show();        
//      }
    });

    $("#sub_boton").prop('disabled', false);
  //$("#sendcontacts").show();
    }
    
</script>

@stop