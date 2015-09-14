@extends('header')
@section('title') FACTURA @stop
@section('head') 
    <script src="{{ asset('vendor/select2/dist/js/select2.js')}}" type="text/javascript"></script>
    <script src="{{ asset('vendor/jquery-ui/jquery-ui.min.js')}}" type="text/javascript"></script>
  
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/dist/css/select2.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/jquery-ui/themes/base/autocomplete.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/jquery-ui/themes/base/jquery-ui.css')}}">
@stop
@section('encabezado') FACTURA @stop
@section('encabezado_descripcion') Nueva Factura @stop 
@section('nivel') <li><a href="#"><i class="icon-star"></i> Factura</a></li> @stop

@section('content')
<div class="box box-primary">
  <div class="box-header">
    <h3 class="box-title">FACTURA</h3>
  </div>
  <div class="box-body">
    <!-- Date range -->
    
    <div class="col-md-12">

      <div class="form-group col-md-4">

      <label>Cliente:</label>
      <div class="input-group">     
        <div id="bloodhound" >          
           <select id="client" name="client" onchange="addValuesClient(this)" class="form-control js-data-example-ajax">
                <option value="null" ></option>           
            </select>
        </div>  
        <div class="input-group-addon">          
      <i class='glyphicon' data-toggle="modal" data-target="#newclient">+</i>
      </div>
    </div>

        <br>
        <input id="nombre" type="hidden" name="nombre" >
        <input id="nit" placeholder="NIT"  type="hidden" name="nit" >
        <input id="razon"  placeholder="Razón Social" type="hidden" name="razon">
        
    </div>
    <div class="col-md-2"></div>
    <div class="form-group col-md-4">
      <label>Fecha de Emisi&oacute;n:</label>
      <div class="input-group">              
        <input class="form-control pull-right" id="invoice_date" type="text">
        <div class="input-group-addon">          
        <i class="fa fa-calendar"></i>
        </div>
      </div><!-- /.input group -->
    </div><!-- /.form group -->

    <!-- Date and time range -->
    
    <div class="form-group col-md-2">
      <label>Descuento</label>
      <div class="input-group">
        
        <input class="form-control pull-right" id="discount" type="text">
        <div class="input-group-addon">
          <i class="fa">%</i>
        </div>
      </div><!-- /.input group -->
    </div><!-- /.form group -->
    
    </div>
    <div class="col-md-12">
        <div class="form-group col-md-4">
        </div>  
        <div class="col-md-2"></div>
        <div class="form-group col-md-4">
        <label>Fecha de Vencimiento:</label>
      <div class="input-group">              
        <input class="form-control pull-right" id="due_date" type="text">
        <div class="input-group-addon">          
        <i class="fa fa-calendar"></i>
        </div>
      </div><!-- /.input group -->
        </div>
        <div class="form-group col-md-2">

        </div>

        <!--botones de adicion de productos y servicios-->
        <div class="col-md-12">
        <div class="col-xs-6"></div>
        <div  class="col-xs-2"> <button  type="button" class="btn btn-primary btn-large" data-toggle="modal" data-target="#create_product">Crear Producto</button> </div>
        <div  class="col-xs-2"> <button type="button" class="btn btn-primary btn-large" data-toggle="modal" data-target="#create_service">Crear Servicio</button> </div>
        <div  class="col-xs-2"></div>
        </div>
        <!--ELEMENTOS DE LA FACTURA-->
        <div class="form-group col-md-12">
                        
                <div class="box-body">
                  <table class="table table-bordered">
                    <tbody><tr>
                      <th class="col-md-2">C&oacute;digo</th>
                      <th class="col-md-4">Concepto</th>
                      <th class="col-md-2">Costo Unitario</th>
                      <th class="col-md-2">Cantidad</th>
                      <th class="col-md-1">Subtotal</th>
                      <th class="col-md-1">X</th>
                    </tr>
                    <tr>
                      <td>
                        <input class="form-control" id="code1">
                      </td>
                      <td >
                        <input class="form-control" id="notes1">
                      </td>
                      <td>                      
                      <input class="form-control" id="cost1">
                      </td>
                      <td>
                        <input class="form-control" id="qty1">
                        </td>
                      <td>
                      <label id="subtotal1">0 </label>                        
                      </td>
                      <td>
                      <div for="inputError">
                        <span class="badge bg-red">x</span>
                        </div>
                      </td>
                    </tr>                                                          
                  </tbody></table>
                </div><!-- /.box-body -->                                
        </div>
        <!--Nota para el cliente y, descuentos y total-->
        <div class="form-group col-md-12">
          <div class="col-md-6">
          <textarea class="form-control" placeholder="Nota para el CLiente" rows="2"></textarea>
          </div>
          <div class="col-md-2"></div>
          
          <div class="col-md-1"><b>Total Bs. </b></div>
          <div class="col-md-1"></div>
          <div class="col-md-1"><label id="subtotal">0</label></div>
          


        </div>
        <!--terminos de facturacion y el total a pagar-->
        <div class="form-group col-md-12">
          <div class="col-md-6">
          <textarea class="form-control" placeholder="Términos de Facturación" rows="2"></textarea>
          </div>
          <div class="col-md-2"></div>
          
          <div class="col-md-2"><b>Total a Pagar Bs. </b></div>
          
          <div class="col-md-1"><label id="total">0</label></div>
        </div>
        <div class="form-group"></div>
        <!--BOTONES DE ENVIO-->
        <div class="col-md-12 form-group">
        <button  class="btn btn-large btn-success openbutton" type="submit" name="mail" id="mail" onclick="sendMail()">Emitir Factura</button>   
        <button class="btn btn-large btn-success openbutton" type="submit" name="mail" id="mail" onclick="sendMail()">Enviar Por Correo</button>   
        </div>

    </div>

  </div><!-- /.box-body -->

<!-- This part create the motal to create a new Client -->
<div class="modal modal-primary fade" id="newclient" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">NUEVO CLIENTE</h4>
          </div>
          <div class="modal-body col-xs-12">
            <div id="section" class="col-xs-12">              
              <div class="col-xs-3">Nombre: </div>
              <div class="col-xs-9"><input id="newuser" type="text" class="form-control"></div>  

            <div class="col-xs-3">Raz&oacute;n Social: </div>
            <div class="col-xs-9"><input id="newrazon" type="text" class="form-control"></div>

            <div class="col-xs-3">NIT: </div>
            <div class="col-xs-9"><input id="newnit" type="text" class="form-control"></div>
            
          </div>
           </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="savesection" type="button" class="btn btn-primary" onclick="saveNewClient()" data-dismiss="modal">Guardar Cliente</button>
            </div>
      </div>
     </div>
  </div>
  <!-- end of modal creation-->

    <!-- This part creates the modal to create a new Product -->
  <div class="modal fade" id="create_product" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">CREAR PRODUCTO</h4>
          </div>
          <div class="modal-body col-xs-12">
            <div id="section" class="col-xs-12">              
              <div class="col-xs-2">Descripci&oacute;n</div>
              <div class="col-xs-10"><input id="notes_new" type="text" class="form-control"></div>  

            <div class="col-xs-2">C&oacute;digo</div>
            <div class="col-xs-10"><input id="code_new" type="text" class="form-control"></div>

            <div class="col-xs-2">Unidad</div>
            <div class="col-xs-10">
              <select id="unidad_new" name="unidades" class="select2-input"   data-style="success">
              <option value="empty"></option>       
              <option value="new1">Libras</option>
              <option value="new2">Kilos</option>
              <option value="new3">Cajas</option>
              <option value="new4">Litros</option>
              <option value="new5">Botellas</option>
            </select>
            </div>    

            <div class="col-xs-2">Precio</div>
            <div class="col-xs-10"><input id="cost_new" type="text" class="form-control"></div>

            <div class="col-xs-2">Categor&&iacute;a</div>
            <div class="col-xs-10">
              <select id="categoy_new" name="unidades" class="select2-input"   data-style="success">
              <option value="1">General</option>
            </select>
            </div>
          </div>
           </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="save_product" type="button" class="btn btn-primary"  data-dismiss="modal">Guardar Producto</button>
            </div>
      </div>
     </div>
  </div>
  <!-- end of modal creation-->

  <!-- This part creates the modal to create a new Service -->
  <div class="modal fade" id="create_service" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">CREAR SERVICIO</h4>
          </div>
          <div class="modal-body col-xs-12">
            <div id="section" class="col-xs-12">              
              <div class="col-xs-2">Descripci&oacute;n</div>
              <div class="col-xs-10"><input id="notes_news" type="text" class="form-control"></div>             
            <div class="col-xs-2">C&oacute;digo</div>
            <div class="col-xs-10"><input id="code_news" type="text" class="form-control"></div>            
            <div class="col-xs-2">Precio</div>
            <div class="col-xs-10"><input id="cost_news" type="text" class="form-control"></div>
            <div class="col-xs-2">Categoria</div>
            <div class="col-xs-10">
              <select id="categoy_news" name="unidades" class="select2-input"   data-style="success">
              <option value="1">General</option>
            </select>
            </div>  
          </div>
           </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="save_service" type="button" class="btn btn-primary" data-dismiss="modal">Guardar Servicio</button>
            </div>          
      </div>
     </div>
  </div>
  <!-- end of modal creation-->

</div><!-- /.box -->
<script type="text/javascript">
/*********************SECCION PARA EL MANEJO DINAMICO DE LOS CLIENTES************************/    

/****Inicializacion de variables globales para la factura****/
var products = {{ $products }};
var total = 0;
var subtotal = 0;

    /***buscado de clientes por ajax***/
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
    });

    /*****AGREGA VALORES RAZON Y NIT****/
    function addValuesClient(dato){
  id_client_selected = $(dato).val();
  act_clients.forEach(function(cli) {
    if(id_client_selected == cli['id'])
    {
      $("#nombre").val(cli['name']);
      $("#razon").val(cli['business_name']).show();
      $("#nit").val(cli["nit"]).show();

    }
  });
  $("#sendcontacts").show();
}  
  function saveNewClient()
  {
    user = $("#newuser").val();
    nit = $("#newnit").val();
    razon = $("#newrazon").val();       
  
    
    $.ajax({     
          type: 'POST',
          url:'{{ URL::to('clientes') }}',
          data: 'business_name='+razon+'&nit='+nit+'&name='+user+'&json=1',
          beforeSend: function(){
            console.log("Inicia ajax client register ");
          },
          success: function(result)
          {
            console.log(result);          
          }
      });
  
  }

/*******************FECHAS Y DESCUENTOS*************************/
$("#invoice_date").datepicker(/*"update", new Date()*/);
$("#due_date").datepicker();
$('#invoice_date').on('changeDate', function(ev){
    $(this).datepicker('hide');
});
$('#due_date').on('changeDate', function(ev){
    $(this).datepicker('hide');
});

/*********************MANEJO DE LA TABLA DE PRODUCTOS Y SERVICIOS DE FACTURAICON******************************/
/***Obtencion de valores ****/

function getProductsKey(){
  var keys = [];
  products.forEach(function(prod){
      keys.push(prod['product_key']);  
  });  
  return keys;
}
function getProductsName(){
  var names=[];
  products.forEach(function(prod){
      names.push(prod['notes']);  
  });
  return names;
}
/***drowpdown de los codigos y productos name****/
  $(function() {
     availableTags = getProductsKey();
    $( "#code1" ).autocomplete({
      minLength: 0,
      source: availableTags,  
    });
  });
  $(function() {
     availableTags = getProductsName();
    $( "#notes1" ).autocomplete({
      minLength: 0,
      source: availableTags
    });
  });

$.ui.autocomplete.filter = function (array, term) {
        var matcher = new RegExp("^" + $.ui.autocomplete.escapeRegex(term), "i");
        return $.grep(array, function (value) {
            return matcher.test(value.label || value.value || value);
        });
    };

$("#notes1").click(function(){
  $("#notes1").autocomplete( "search", "" );
});
$("#code1").click(function(){
  $("#code1").autocomplete( "search", "" );
});

function updateRow(code){
  products.forEach(function(prod){
    if(prod['product_key'] == code)
    {
      $("#notes1").val(prod['notes']);
      $("#cost1").val(prod['cost']);
      $("#qty1").val(1);
      $("#subtotal1").text(prod['cost']);

    }
  }); 
}
$("#code1").on("autocompleteclose",function(event,ui){
  code = $("#code1").val();    
  console.log(code);
  updateRow(code);
});
$("#code1").on("change",function(){
  code = $("#code1").val();  
  console.log(code);
  products.forEach(function(prod){
    if(prod['product_key'] == code)
    {
      $("#notes1").val(prod['notes']);
      $("#cost1").val(prod['cost']);
      $("#qty1").val(1);
      $("#subtotal1").text(prod['cost']);
    }
  });  
});

/**agergado de nuevos productos y servicios**/
  $("#save_product").click(function(){
    product_key = $("#code_new").val();
    item = $("#notes_new").val();
    cost = $("#cost_new").val();
    category = $("#categoy_new").val();
    unidad = $("#unidad_new").val();
    $.ajax({     
          type: 'POST',
          url:'{{ URL::to('productos') }}',
          data: 'product_key='+product_key+'&notes='+item+'&cost='+cost+'&category_id=1&json=1&unidad='+unidad,
          beforeSend: function(){
            console.log("Inicia ajax with ");
          },
          success: function(result)
          {
            
            console.log(result);
            addNewProduct(product_key,item,cost);  
          }
      });
  

    console.log(product_key+item+cost+category+unidad);
  });

  $("#save_service").click(function(){
    product_key = $("#code_news").val();
    item = $("#notes_news").val();
    cost = $("#cost_news").val();
    category = $("#categoy_news").val();    
    $.ajax({     
          type: 'POST',
          url:'{{ URL::to('productos') }}',
          data: 'product_key='+product_key+'&notes='+item+'&cost='+cost+'&category_id=1&json=1',
          beforeSend: function(){
            console.log("Inicia ajax with ");
          },
          success: function(result)
          {
            
            console.log(result);          
            addNewProduct(product_key,item,cost);  
          }
      });
  });    
function addNewProduct(newkey,newnotes,newcost)
{
  var newp ={
  'cost' : newcost,
  'notes': newnotes,
  'product_key': newkey,
  'qty': 0
  };
  products.push(newp);
  availableTags = getProductsKey();
    $( "#code1" ).autocomplete({
      minLength: 0,
      source: availableTags,  
    });
}
  $("#qty1").click(function(){
    $("#qty1").select();
  });
  $("#cost1").click(function(){
    $("#cost1").select();
  });
  $("#qty1").keyup(function(){

    costo = $("#cost1").val();
    costo = parseFloat(costo);
    cantidad = $("#qty1").val();
    cantidad = parseFloat(cantidad);

    total_val=$("#total").val();
    total_val = parseFloat(total_val);

    subtotal_val = costo*cantidad;
    $("#subtotal1").text(subtotal_val+"");
    $("#total").text((total+subtotal_val)+"");
    console.log("this is us"+cantidad);

  });

  //$("#cost1").key
</script>
<!-- iCheck -->
@stop