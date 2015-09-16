@extends('header')
@section('title') Nueva Factura @stop
@section('head') 
    <script src="{{ asset('vendor/select2/dist/js/select2.js')}}" type="text/javascript"></script>
    <script src="{{ asset('vendor/jquery-ui/jquery-ui.min.js')}}" type="text/javascript"></script>
  
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/dist/css/select2.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/jquery-ui/themes/base/autocomplete.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/jquery-ui/themes/base/jquery-ui.css')}}">
@stop
@section('encabezado') FACTURAS @stop
@section('encabezado_descripcion') Nueva Factura @stop 
@section('nivel') <li><a href="{{URL::to('factura')}}"><i class="fa fa-files-o"></i> Facturas</a></li>
            <li class="active"> Nuevo </li> @stop

@section('content')
<div class="box box-primary">
  <div class="box-header">
    <h3 class="box-title">FACTURA</h3>
  </div>


  {{ Former::open('factura')->method('POST')->addClass('warn-on-exit')->rules(array(
    'client' => 'required',
    'invoice_date' => 'required',
    'product_key' => 'max:20',
    'discount'  =>  'between:0,100',
  )) }}
  <div class="box-body">
    <!-- Date range -->
    
    <div class="col-md-12">

      <div class="form-group col-md-4" id="contactos_client">

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
        <input id="mail" type="hidden" name="mail" >
        <input id="nombre" type="hidden" name="nombre" >
        <input id="nit" placeholder="NIT"  type="hidden" name="nit" >
        <input id="razon"  placeholder="Razón Social" type="hidden" name="razon">
        <input id="total_send" type="hidden" name="total" >
        <input id="subtotal_send" type="hidden" name="subtotal" >
        
    </div>
    <div class="col-md-2"></div>
    <div class="form-group col-md-4">
      <label>Fecha de Emisi&oacute;n:</label>
      <div class="input-group">              
        <input class="form-control pull-right" name="invoice_date" id="invoice_date" type="text">
        <div class="input-group-addon">          
        <i class="fa fa-calendar"></i>
        </div>
      </div><!-- /.input group -->
    </div><!-- /.form group -->

    <!-- Date and time range -->
    
    <div class="form-group col-md-2">
      <label>Descuento</label>
      <div class="input-group">
        
        <input class="form-control pull-right" id="discount" value="0" name="discount" type="text">
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
        <input class="form-control pull-right" name="due_dte" id="due_date" type="text">
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
                  <table id="tableb" class="table table-bordered">
                    <tbody><tr>
                      <th class="col-md-2">C&oacute;digo</th>
                      <th class="col-md-4">Concepto</th>
                      <th class="col-md-2">Costo Unitario</th>
                      <th class="col-md-2">Cantidad</th>
                      <th class="col-md-1">Subtotal</th>
                      <th class="col-md-1" style="display:none;"></th>
                    </tr>
                    <tr class="new_row" id="new_row1">
                      <td>
                        <input class="form-control code" id="code1" name="productos[0]['product_key']">
                      </td>
                      <td >
                        <input class="form-control notes" id="notes1" name="productos[0]['item']">
                      </td>
                      <td>                      
                      <input class="form-control cost" id="cost1" name="productos[0]['cost']">
                      </td>
                      <td>
                        <input class="form-control qty" id="qty1" name="productos[0]['qty']">
                        </td>
                      <td>
                      <label class="suntotal" id="subtotal1">0 </label>                        
                      </td>
                      <td>
                      <div for="inputError">
                        <span class="killit" id="killit1" style="color:red" >
                          <i class="fa fa-minus-circle redlink"></i>
                        </span>
                        </div>
                      </td>
                    </tr> 
                  </tbody></table>
                </div><!-- /.box-body -->                                
        </div>
        <!--Nota para el cliente y, descuentos y total-->
        <div class="form-group col-md-12">
          <div class="col-md-6">
          <textarea id="public_notes"name="public_notes" class="form-control" placeholder="Nota para el Cliente" rows="2"></textarea>
          </div>
          <div class="col-md-2"></div>
          
          <div class="col-md-1">
            <b>Total. </b>
            <br><br>
            <b>Descuento</b>
          </div>
          <div class="col-md-1"></div>
          <div class="col-md-1">
            <label id="subtotal">0</label>
            <br><br>
            <label id="descuento_box" >0</labrl>
          </div>
          


        </div>
        <!--terminos de facturacion y el total a pagar-->
        <div class="form-group col-md-12">
          <div class="col-md-6">
          <textarea id="terms" name="terms" class="form-control" placeholder="Términos de Facturación" rows="2"></textarea>
          </div>
          <div class="col-md-2"></div>
          
          <div class="col-md-2" ><b>Total a Pagar Bs. </b></div>
          
          <div class="col-md-1"><label id="total">0</label></div>
        </div>
        <div class="form-group"></div>
        <!--BOTONES DE ENVIO-->
        <div class="col-md-12 form-group">
        <button  class="btn btn-large btn-success openbutton" type="submit">Emitir Factura</button>   
        <button class="btn btn-large btn-success openbutton" type="submit" id="email" onclick="sendMail()">Enviar Por Correo</button>   
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
              <option value="new1">Entero</option>
              <option value="new2">Decimal</option>
             
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

// $("#killit1").toggleClass("badge bg-red");
// $("#killit1").mouseover(function(){
//   $("#killit1").removeClass("badge bg-red");
//   $("#killit1").addClass("badge");
// });
// $("#killit1").mouseout(function(){
//   //$("#killit1").removeClass("badge bg-red");
//   $("#killit1").addClass("bg-red");
// });

 // $(".killit").mouseover(function()
 //     {
 //      console.log("this is si");
 //       $(this).css("cursor", "hand");
 //     });

$('.killit').css('cursor', 'pointer');

function sendMail()
{
  $("#mail").val("1");  
}
$("#email").click(function(){
  $("#mail").val("1");  
});
/****Inicializacion de variables globales para la factura****/
var products = {{ $products }};
var selected_products=[];
var total = 0;
var subtotal = 0;
var id_products = 2;

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
      agregarContactos(cli['id']);
    }
  });
  
  //$("#sendcontacts").show();
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
///$("#invoice_date").datepicker(/*"update", new Date()*/);
//$("#invoice_date").datepicker({  endDate: '+2d' });
$( "#invoice_date" ).datepicker({ minDate: -20, maxDate: "+0D" }).datepicker("setDate", new Date());;
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
      change: function (event, ui) {
            if (!ui.item) {
                 $(this).val('');
             }
        }
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

$(document).on('click','.code', function(){
  $("#"+this.id).autocomplete( "search", "" );
});
$(document).on('click','.notes', function(){
  $("#"+this.id).autocomplete( "search", "" );
});
$(document).on('mouseover','.new_row',function(){
  val = this.id.substring(7);  
  $("#killit"+val).show();
});
$(document).on('mouseout','.new_row',function(){
  val = this.id.substring(7);  
  $("#killit"+val).hide();
});
function updateRow(code,act){
  products.forEach(function(prod){
    if(prod['product_key'] == code)
    {
      $("#notes"+act).val(prod['notes']);
      $("#cost"+act).val(prod['cost']);
      $("#qty"+act).val(1);
      $("#subtotal"+act).text(prod['cost']);
      calculateSubTotal();
      calculateTotal();            
    }
  }); 
}

function calculateTotal()
{
  sum = 0;  
  $( ".cost" ).each(function( index ) {  
  valor = $("#"+this.id).val();
  if(valor){    
    sum = parseFloat(valor) +sum;
  }

  });
  dis= $("#discount").val();
  dis = (parseFloat(dis)*sum)/100;

  sum = sum - dis;
  $("#descuento_box").text(dis.toFixed(2));
  $("#total").text(sum.toFixed(2));
  $("#total_send").val(sum);

}
function calculateSubTotal()
{
    sum = 0;  
  $( ".cost" ).each(function( index ) {  
  valor = $("#"+this.id).val();
  if(valor){    
    sum = parseFloat(valor)+sum;
  }

  });
  $("#subtotal").text(parseFloat(sum).toFixed(2)+"");
  $("#subtotal_send").val(sum);
}
function updateRowName(code,act){
  products.forEach(function(prod){
    if(prod['notes'] == code)
    {
      $("#code"+act).val(prod['product_key']);
      $("#cost"+act).val(prod['cost']);
      $("#qty"+act).val(1);
      $("#subtotal"+act).text(prod['cost']);
    }
  }); 
  calculateSubTotal();
  calculateTotal();
}
//$("#code1").on("autocompleteclose",function(event,ui){
$(document).on("autocompleteclose",'.code',function(event,ui){
  code = $("#"+this.id).val();    
  console.log(code);
  updateRow(code,this.id.substring(4));

  /*agregamos nueva fila*/
  $('#tableb').append(addNewRow());
  $(function() {
     availableTags = getProductsKey();
    $( "#code"+id_products).autocomplete({
      minLength: 0,
      source: availableTags,
      change: function (event, ui) {
            if (!ui.item) {
                 $(this).val('');
             }
        }

    });
  });
  $(function() {
     availableTags = getProductsName();
    $( "#notes"+id_products).autocomplete({
      minLength: 0,
      source: availableTags,  
    });
  });  
    //var productKey = "#product_key"+(idProducts);
    //addProducts(idProducts);
    $('.killit').css('cursor', 'pointer');
    id_products++;

});
function addContactToSend(id,name,mail,ind_con){  
  div ="";// "<div class='col-md-12' id='sendcontacts'>";
  ide = "<input type='hidden' id='contact_id' value='"+id+"' name='contactos["+ind_con+"][id]'>";
  nombre = "<input  disabled id='contact_name' value='"+name+"'name='contactos["+ind_con+"][name]'>";
  correo = "<input   disabled id='contact_mail' value='"+mail+"'name='contactos["+ind_con+"][cmail]'>";
  send = "<input  type='checkbox' name='contactos["+ind_con+"][checked]'>";
  findiv = "";//</div>";
  $("#contactos_client").append(div+ide+nombre+correo+send+findiv);

}

$(document).on("autocompleteclose",'.notes',function(event,ui){
  code = $("#"+this.id).val(); 
  console.log(code);
  updateRowName(code,this.id.substring(5));

  $('#tableb').append(addNewRow());
  $(function() {
     availableTags = getProductsName();
    $( "#notes"+id_products).autocomplete({
      minLength: 0,
      source: availableTags,  
    });
  });
  $(function() {
     availableTags = getProductsKey();
    $( "#code"+id_products).autocomplete({
      minLength: 0,
      source: availableTags,
      change: function (event, ui) {
            if (!ui.item) {
                 $(this).val('');
             }
        }
    });
  });  
    //var productKey = "#product_key"+(idProducts);
    //addProducts(idProducts);
    $('.killit').css('cursor', 'pointer');
    id_products++;
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

  function agregarContactos(id){
    $.ajax({     
          type: 'POST',
          url:'{{ URL::to('getClientContacts') }}',
          data: 'id='+id, 
          beforeSend: function(){
            console.log("Inicia ajax with ");
          },
          success: function(result)
          {
            
            console.log(result);
            ind_con = 0;            
            result.forEach(function(res){
              addContactToSend(res['id'],res['first_name']+" "+res['last_name'],res['email'],ind_con) ;
              ind_con++;
            });
            
          }
      });
  }

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
  // $("#qty1").click(function(){
  //   $("#qty1").select();
  // });
  // $("#cost1").click(function(){
  //   $("#cost1").select();
  // });

  $(document).on('click','.qty', function(){
    $("#"+this.id).select();
  });
  $("#discount").click(function(){
    $("#discount").select();
  });
  $("#discount").keyup(function(){
    calculateTotal();
    });
  $(document).on('click','.cost', function(){
    $("#"+this.id).select();
  });
  $(document).on('click','.killit',function(){  
    act = this.id.substring(6);
    
    cont = 0;  
    $(".new_row").each(function( index ) {
      cont++;
    });
    if(cont!=1){
    $("#new_row"+act).remove();
    calculateSubTotal();
    calculateTotal();
  }
});


  $(document).on('keyup','.qty',function(){
    ind = this.id.substring(3);
    costo = $("#cost"+ind).val();
    costo = parseFloat(costo).toFixed(2);
    cantidad = $("#qty"+ind).val();
    cantidad = parseFloat(cantidad).toFixed(2);

    total_val=$("#total").val();
    total_val = parseFloat(total_val).toFixed(2);

    subtotal_val = costo*cantidad;
    $("#subtotal"+ind).text(subtotal_val+"");
    $("#total").text((total+subtotal_val)+"");    
  });
  $(document).on('keyup','.cost',function(){
    ind = this.id.substring(4);
    costo = $("#cost"+ind).val();
    costo = parseFloat(costo).toFixed(2);
    cantidad = $("#qty"+ind).val();
    cantidad = parseFloat(cantidad).toFixed(2);

    total_val=$("#total").val();
    total_val = parseFloat(total_val).toFixed(2);

    subtotal_val = costo*cantidad;
    $("#subtotal"+ind).text(subtotal_val+"");
    $("#total").text((total+subtotal_val)+"");
  
  });


function addNewRow(){
  tr=  "<tr class='new_row' id='new_row"+id_products+"'>";
  tdcode="<td><input class='form-control code' id='code"+id_products+"' name=\"productos["+id_products+"]['product_key']\""+"</td>";
  tdnotes = "<td><input class='form-control notes' id='notes"+id_products+"' name=\"productos["+id_products+"]['item']\""+"</td>";
  tdcost = "<td ><input class='form-control cost' id='cost"+id_products+"' name=\"productos["+id_products+"]['cost']\""+"</td>";
  tdqty = "<td><input class='form-control qty' id='qty"+id_products+"' name=\"productos["+id_products+"]['qty']\""+"</td>";
  tdsubtotal ="<td><label class='subtotal' id='subtotal"+id_products+"'>0 </label></td>";
  tdkill= "<td><div for='inputError'><span class='killit' style='color:red' id='killit"+id_products+"'><i class='fa fa-minus-circle redlink'></i></span></div></td>";
  fintr="</tr>";
  return tr+tdcode+tdnotes+tdcost+tdqty+tdsubtotal+tdkill+fintr;
}

//this is to cancell submit on enter
$(document).on("keypress", 'form', function (e) {
    var code = e.keyCode || e.which;
    if (code == 13) {
        e.preventDefault();
        return false;
    }
});

function addFunctions(){
  //f1 = "function fun1(){console.log('this is the first addFunctions');}";
 
  eval("function fun1(){console.log('this is the first addFunctions');}");
  
}
var f = new Function('name', 'return alert("hello, " + name + "!");');
//f('erick');
</script>
<!-- iCheck -->
@stop