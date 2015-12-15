@extends('header')
@section('title') Nueva Nota de Entrega @stop
@section('head') 
    
    <script src="{{ asset('vendor/AdminLTE2/plugins/select2/select2.full.js')}}" type="text/javascript"></script>    
    <script src="{{asset('vendor/AdminLTE2/plugins/select2/i18n/es.js')}}" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/AdminLTE2/plugins/select2/select2.css')}}">
    <script src="{{ asset('customs/bootstrap-switch.js')}}" type="text/javascript"></script>    
    <link rel="stylesheet" type="text/css" href="{{ asset('customs/bootstrap-switch.css')}}">    
      <style type="text/css">
      .centertext{
        text-align:center;
      }
      .derecha{
        text-align:right;
      }
      [class^='select2'] {
        border-radius: 0px !important;               
      } 

      .modal.vista .modal-dialog { width: 70%; }
     
     input[type='number'] {
    -moz-appearance:textfield;
    }
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
    }


      </style>
      <!- mover la parte del stilo se searcher product-->
@stop
@section('encabezado') NOTA DE ENTREGA @stop
@section('encabezado_descripcion') Nueva Nota de Entrega @stop 
@section('nivel') <li><a href="{{URL::to('factura')}}"><i class="fa fa-files-o"></i> Nota de Entrega</a></li>
            <li class="active"> Nuevo </li> @stop
            
@section('content')
<div class="box box-primary">
  <div class="box-header">
    <h3 class="box-title">NOTA DE ENTREGA</h3>
    {{Utils::aviso_renovar()}}
  </div>


  {{ Former::open('notaEntrega')->id('formulario')->method('POST')->addClass('warn-on-exit')->rules(array(
    'client' => 'required',
    'invoice_date' => 'required',
    'product_key' => 'max:20',
    'discount'  =>  'between:0,100',
  )) }}
  
  <div class="box-body">
    <!-- Date range -->
    
    <div class="col-md-12">
      <legend><b>&nbsp;Fechas</b></legend>
      <div class="form-group col-md-4">
        <label>Fecha de Emisi&oacute;n:</label>
        <div class="input-group emision_icon">              
          <input class="form-control pull-right" name="invoice_date" id="invoice_date" type="text">
          <div class="input-group-addon">          
            <i class="fa fa-calendar"></i>
          </div>
        </div><!-- /.input group -->
    </div><!-- /.form group -->
    <div class="col-md-4">
    </div>
    <div class="form-group col-md-4">
<!--      <label>Fecha de Vencimiento:</label>
      <div class="input-group">              
        <input class="form-control pull-right" name="due_date" id="due_date" type="text">
        <div class="input-group-addon vencimiento_icon">          
          <i class="fa fa-calendar"></i>
        </div>
      </div>-->
    </div>

    </div>
       <legend><b>&nbsp;Cliente</b></legend>
       
         <div class="col-md-12"> 
           <label>Cliente:</label>
         </div>
         <div class="col-md-4">    
            <span class="">
               <select id="client" name="client" onchange="addValuesClient(this)" class="form-control js-data-example-ajax">                          
               </select>
            </span>                           
         </div>
         <div class="col-md-1">
            <button type="button" class="btn btn-default btn-sm"  data-toggle="modal" data-target="#newclient">  <span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Crear Cliente               
            </button>
          </div>      
    <input id="printer_type" type="hidden" name="printer_type" value="1">
    <input id="invoice_type" type="hidden" name="invoice_type" value="2">
    <div class="col-md-12">     
      <div class="form-group col-md-6" id="contactos_client">
{{-- seleccion de cliente --}}                   
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

    </div><!-- /.form group -->

    <!-- Date and time range -->
    
    <div class="form-group col-md-2">
      <!-- <label>Descuento</label>
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

        </div>
        <div class="form-group col-md-2">

        </div>

        <!--botones de adicion de productos y servicios-->
        <div class="col-md-12">
          <legend><b>Nota de Entrega</b></legend>

          <div class="col-md-2">              
          </div>
          <div class="col-md-2">
            <label type="hidden" style="color:white">Descuento</label>
            <div class="input-group">                
                  <button  type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#create_product"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Crear Producto</button>
             </div>          
           </div>

        <div class="col-md-1"></div>

        <div class="col-md-2">
          <label style="color:white">Descuento</label>
          <div class="input-group">
            <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#create_service"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Crear Servicio</button> 
          </div>
        </div>

        <div class="col-md-1"></div>

        <div class=" col-md-1">
          <label>Descuento</label>
          <div class="input-group">              
            <input id="discount" class="form-control pull-right" type="text" min="0" value="0" name="discount">                                      
          </div><!-- /.input group -->
        </div><!-- /.form group -->
        <div class=" col-md-1">
        <label type="hidden" style="color:white">Descuento</label>
        <!--<input class="form-control" id="desc" checked data-toggle="toggle" data-on="%" data-off="Bs." data-onstyle="primary" data-offstyle="info" type="checkbox">-->
        <input id="desc" class="desc" data-on-text="%" labelWidth="20%" data-off-text="Bs" type="checkbox" name="my-checkbox" data-off-color="primary" data-label-text="Bs" offColor="primary" handleWidth="100" checked>
        </div>
<!--<input id="desc" checked data-toggle="toggle" data-on="%" data-off="$" data-onstyle="primary" data-offstyle="info" type="checkbox">-->

        <div  class="col-md-2"></div>
      </div>
        
        <!--ELEMENTOS DE LA FACTURA-->
        <div class="form-group col-md-12">
                        
                <div class="box-body">
                  <table id="tableb"> <!--class="table table-bordered">-->
                    <tbody><tr>
                      <th class="col-md-1">C&oacute;digo</th>
                      <th class="col-md-7">Concepto</th>
                      <th class="col-md-1">Costo Unitario</th>
                      <th class="col-md-1">Cantidad</th>
                      <th class="col-md-1">Subtotal</th>
                      <th class="col-md-1" style="display:none;"></th>
                    </tr>
                    <tr class="new_row" id="new_row1">
                      <td>                        
                        <select id="code1"  name="productos[0]['product_key']" class="code select2 select2-input form-control" data-style="success">                          
                          <option></option> 
                        </select>
                      </td>
                      <td >                       
                      <div class="ui-widget">  
                        <input id="notes1" class="form-control notes" name="products[0]['item']">
                      </div>
                      </td>
                      <td>                      
                      <input class="form-control cost centertext" type="number" min="0.01" step="any" disabled id="cost1" name="productos[0]['cost']">
                      </td>
                      <td>
                        <input class="form-control qty centertext" type="number" min="1" step="1" disabled id="qty1" name="productos[0]['qty']">
                        </td>
                      <td>
                      <input class="form-control derecha" disabled value='0' id="subtotal1">                      
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
        <div class="col-md-12">
            
          <div class="col-md-6">          
              
            <div>
              <ul class="nav nav-tabs" data-tabs="tabs" id="tabs">
                <li class="active"><a aria-expanded="true" href="#tab_1" data-toggle="tab">Nota para el cliente</a></li>
                <li class=""><a aria-expanded="false" href="#tab_2" data-toggle="tab">Términos de la nota de entrega</a></li>
                <li class=""><a aria-expanded="false" href="#tab_3" data-toggle="tab">Nota interna</a></li>                       
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                  <textarea rows="2" placeholder="Nota para el Cliente" class="form-control" name="public_notes" maxlength="80" id="public_notes"></textarea>
                </div>          
                <div class="tab-pane" id="tab_2">
                     <textarea id="terms"  name="terms" class="form-control" placeholder="Términos de la nota de entrega" rows="2"></textarea>
                </div>          
                <div class="tab-pane" id="tab_3">
                  <textarea id="nota"  name="nota" class="form-control" placeholder="Nota interna" rows="2"></textarea>
                </div>          
              </div>          
            </div>                        
          </div>
                       
          <div class="col-md-2">                            
          </div>          
          <div class="col-md-2">
            <h4><b>Total</b></h4>
            <br>
            <h4><b>Descuento</b></h4>
            <br>
            <h3><b>Total a pagar</b></h3>
          </div>
<!--          <div class="col-md-1">                         
          </div>-->
          <div class="col-md-1 derecha">
            <h4><label id="subtotal" >0</label></h4>
            <br>
            <h4><label id="descuento_box"  >0</label></h4>
            <br>
            <h3><label id="total">0</label></h3>
              
          </div>
          
          
          

        </div>
        
        <!--terminos de facturacion y el total a pagar-->
<!--        <div class="form-group col-md-12">
          <div class="col-md-6">
          <textarea id="terms" maxlength="80" name="terms" class="form-control" placeholder="Términos de Facturación" rows="2"></textarea>
          </div>
          <h3>
          <div class="col-md-1"></div>
          
          <div class="col-md-3" ><b>Total a Pagar Bs. </b></div>          
          <div class="col-md-1"><label id="total">0</label></div>
          </h3>
        </div>-->
        <div class="form-group"></div>
        <!--BOTONES DE ENVIO-->
        <div class="col-md-12 form-group">
          <div class="col-md-1"></div>
          <button  type="button" class="col-md-2 btn btn-success btn-large" data-toggle="modal" onclick="preview()">Pre-Visualizaci&oacute;n</button>        
          <div class="col-md-1"></div>
          <button  id="sub_boton" class="col-md-2 btn btn-large btn-default openbutton" disabled type="submit">Generar nota de entrega</button>           
        <div class="col-md-1"></div>

        <a type="button"  class="col-md-2 btn btn-large btn-default" href="{{asset('factura')}}" role="button" >Cerrar</a>           

        

    </div>
  
  </div><!-- /.box-body -->
  {{Former::close()}}
<!-- This part create the motal to create a new Client -->

  <div class="modal fade" id="newclient">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">NUEVO CLIENTE</h4>
      </div>
      <div class="modal-body">

       
           <div class="row" >
                <div class="col-md-3">Nombre: </div>
                <div class="col-md-9"><input id="newuser" type="text" class="form-control" ></div><br>
              </div>         
              <p></p>   
              <div class="row">
                 <div class="col-md-3">Raz&oacute;n Social: </div>
                 <div class="col-md-9"><input id="newrazon" type="text" class="form-control" ></div><br>
               </div>    
               <div class="row">
                <p></p>
                <div class="col-md-3">NIT: </div>
                <div class="col-md-4"><input id="newnit" type="text" class="form-control" ></div><br> 
               </div>
               <p></p>
         

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="savesection" onclick="saveNewClient()" data-dismiss="modal">Guardar Cliente</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


  <!-- end of modal creation-->

    <!-- This part creates the modal to create a new Product -->
  <div class="modal fade" id="create_product" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">CREAR PRODUCTO</h4>
          </div>
          <div class="modal-body col-md-12">
          
              {{-- cuerpo del formulario --}}
              <div class="row">
                <div class="col-md-7">
                  
                  <div class="row">
                    <div class="col-md-5">
                      <p >
                        <label>Código*</label>
                        <input type="text" id="code_new" class="form-control" placeholder="Código" aria-describedby="sizing-addon2" title="Ingrese Código del Producto" pattern="^[a-zA-Z0-9-].{1,}">
                      </p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-10">
                    
                          <p>
                            <label>Nombre *</label><br>
                            <textarea id="notes_new" placeholder="Nombre del producto" class="form-control" rows="3" title="Ingrese descripcion del Producto" pattern=".{1,}"></textarea>
                         </p>
                      
                  
                  
                  <p>
                    <label>Unidad</label>
                    <select class="form-control" id="categoy_new" name="cotegory" >
                          @foreach(Unidad::all() as $u)
                          <option  value="{{$u->id}}"  >{{$u->nombre}}</option>
                          
                        @endforeach
                        
                     </select>  

                    

                  </p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-5">
                      <label>Precio *</label>
                        <input class="form-control" type="text" id="cost_new" placeholder="Precio" aria-describedby="sizing-addon2"  title="Solo se acepta números. Ejem: 500.00" pattern="[0-9]+(\.[0-9][0-9]?)?" >
                        
                    </div>
                  </div>
                  
                    
                </div>
              
                <div class="col-md-5">
                  <legend>Categoría</legend>
                  
                  <div class="row">
                    
                    <div class="col-md-9">
                       <select class="form-control" name="category_id" id="category_id">
                          @foreach(Category::where('account_id',Auth::user()->account_id)->get() as $categoria)
                          <option value="{{$categoria->id}}">{{$categoria->name}}</option>
                          
                        @endforeach
                        
                        </select> 
                    </div>
                    
                  </div>  
                   
                  

                </div>
              </div>
              <br><br>
          
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
                    {{-- servicio --}}
             <div class="row">
                <div class="col-md-6">                  
                  <div class="col-md-6">
                    <label>Código *</label>
                    <input type="text" id="code_news"  class="form-control" placeholder="Código" aria-describedby="sizing-addon2"  title="Solo se acepta Letras, Números y guión(-)." pattern="^[a-zA-Z0-9-].{1,}"  >
                  </div>
                  <div class="col-md-10">
                    <label>Nombre *</label>
                    <input type="text"id="notes_news" class="form-control" placeholder="Nombre del Servicio" aria-describedby="sizing-addon2"  title="Introduzca el nombre del Nuevo Servicio." pattern=".{1,}"  >
                  </div>
                  <div class="col-md-5">
                    <label>Precio *</label>
                    <input type="text" id="cost_news" class="form-control" placeholder="Precio" aria-describedby="sizing-addon2"  title="Solo se acepta números. Ejem: 500.00" pattern="[0-9]+(\.[0-9][0-9]?)?"  >
                  </div>        

                </div>
                {{-- <div class="col-md-1"></div> --}}
                <div class="col-md-4">
                  <legend>Categoría</legend>
                  {{-- {{ Former::legend('Categoria') }} --}}
                  <div class="row">

                    <div class="col-md-8">
                       <select class="form-control" id="categoy_news" name="category_id" id="category_id">
                          @foreach(Category::where('account_id',Auth::user()->account_id)->get() as $categoria)
                            <option value="{{$categoria->id}}">{{$categoria->name}}</option>
                          @endforeach
                        </select> 
                    </div>          
                  </div>                  
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

   <div class="modal vista fade" id="preview" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Vista Previa Factura</h4>
          </div>
          <div class="modal-body col-md-12">                  
          

        <iframe id="theFrame2" type="text/html" src="{{asset('factura2?dato=1')}}" frameborder="1" width="100%" height="800"></iframe>

        <!--<iframe id="theFrame2" type="text/html" src="{{asset('preview?dato=1')}}" frameborder="1" width="100%" height="800"></iframe>-->

          </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>              
            </div>
      </div>
     </div>
  </div>

  <div class="modal modal-danger verify_deadline" id="verify" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
            
            <h4 class="modal-title" id="myModalLabel">Llave de Doscificaci&oacute;n Vencida</h4>
          </div>
          <div class="modal-body col-md-12">                                  
              Porfavor carge una nueva doscificaci&oacute;n a la sucursal
          </div>
            <div class="modal-footer center">
                <br>
              <a type="button"  class="btn btn-large btn-default" href="{{asset('sucursales')}}" role="button" >Cargar</a>                        
            </div>
      </div>
     </div>
  </div>
</div>
<script type="text/javascript">  
    $('#tabs').tab();
    //**********VALIDACION DE DESCUENTO    
    $("#discount").keyup(function(){
        number = $("#discount").val();
        if(isNaN(number)){
            $("#discount").val(number.substr(0,number.length-1));                    
        }
        else{
            if($("#desc").prop('checked'))    
                if(number>=100)
                    $("#discount").val(99);                    
            else
                console.log("descuento"+number);
        }
    });
    //********************
    
    
    vencido = '{{$vencido}}';
  if(vencido==1)
    $('#verify').modal('show');
    
$("#desc").bootstrapSwitch();    
     
$("#desc").on('switchChange.bootstrapSwitch',function(e, data){
    calculateAllTotal( $("#desc").prop('checked'));
    if($("#desc").prop('checked'))
        $("#desc").siblings(".bootstrap-switch-label").text("Bs");
    else
        $("#desc").siblings(".bootstrap-switch-label").text("%");
    //console.log(data);
    
});


$("#desc").change(function(){
    calculateAllTotal( $("#desc").prop('checked'));
});    

//$("#model_invoice").change(function(){
//    console.log("jasfsasdjk");
////    if($("#model_invoice").prop('checked')){
////        console.log("yes");
////     $("#printer_type").val("1");
////    }
////    else
////    {
////        console.log("no");
////    
////        $("#printer_type").val("0");
////    }
//});
function fillInvoice(){
    return "dato=1";
}

//$('#switch').bootstrapToggle();
function preview()
{ 
    var datos = $('#formulario').serialize();
    $('#theFrame2').attr('src', '{{asset("factura2?'+datos+'")}}' );   
    $('#preview').modal('show');
       
}
/*********************SECCION PARA EL MANEJO DINAMICO DE LOS CLIENTES************************/    


$('#killit1').css('cursor', 'pointer');
$("#cost1").val('').prop('disabled', true);
$("#qty1").val('').prop('disabled', true);
$('#discount').val("0");
$("#due_date").val('');
$("#public_notes").val('');
$("#terms").val('');
$('#subtotal1').val('').prop('disabled', true);
$('#notes1').val('');
$('#nota').val('');
//$(document).css('cursor','.notes');

// function verr(){
  
// }
$("#client").change(function(){
  if($("#client").val()+"" == "null")
    $("#sub_boton").prop('disabled', false);
  else 
    $("#sub_boton").prop('disabled', true);
});

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
var changing_code = false;
var changing_note = false;



// $(".code").select2();
// $(".notes1").select2();
addProducts(1);
function addProducts(id_act)
{ 
  console.log("entra a esta opcion");
  prod_to_add=[];
  products.forEach(function(prod) {           
    //if( 0 === isProductSelected(prod['product_key']) ){      
        prod_to_add.push(prod['notes']);   
        $("#code"+id_act).select2({data: [{id: prod['product_key'], text: prod['product_key']}]});
      //}  
  });
  $( "#notes"+id_act).autocomplete({
        minLength: 0,
        source: prod_to_add,      
      select: function(event, ui) {                  
        completeItem(id_act,ui.item.value);
   },
   change: function(event, ui)
   {
    try
    {
        if(event.originalEvent.type != "menuselected")
        {             
            console.log("menuselected");
        }
    }
    catch(err){         
        console.log("Fucking error");
    }
   }
  });
  
  $.ui.autocomplete.filter = function (array, term) {
        var matcher = new RegExp("^" + $.ui.autocomplete.escapeRegex(term), "i");
        return $.grep(array, function (value) {
            return matcher.test(value.label || value.value || value);
        });
    };
}    
function matchStart (term, text) {
  if (text.toUpperCase().indexOf(term.toUpperCase()) == 0) {
    return true;
  }
 
  return false;
}
$.fn.select2.amd.require(['select2/compat/matcher'], function (oldMatcher) {
//  $(".notes").select2({
//    matcher: oldMatcher(matchStart)
//  }),
  $(".code").select2({
    matcher: oldMatcher(matchStart)
  })
});

$(".code").select2({
  placeholder: "Código"
});
//$(".notes").select2({
//  placeholder: "Concepto",
//
//  //minimumInputLength: 3,  
//});
$(document).on('focus', '.select2', function() {
    $(this).siblings('select').select2('open');
});
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
  placeholder: "NIT o Nombre",
  allowClear: true,  
  language: "es",
});

$('#client').select2('data', {id:103, label:'ENABLED_FROM_JS'});
    // $("#client").change(function(){
    //   console.log("this is us");
    // });

    /*****AGREGA VALORES RAZON Y NIT****/
    function addValuesClient(dato){
      $(".contact_add").hide();
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

    $("#sub_boton").prop('disabled', false);
  //$("#sendcontacts").show();
}  
  function emptyRows(){
    cont = 0;
    $( ".new_row" ).each(function( index ) {  
      act_id = this.id.substring(7);       
      valor = $("#code"+act_id).val();  
      if(valor == "")
        cont++;      
    });  
    return cont;
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
    initSelection : function (element, callback) {
        var data = {id: nit, text: user};
        callback(data);
    }});

      //'data', {id:nit, text:nit+' - '+user});
    
    //$("#client").val(nit).trigger("change");

  
  }

/*******************FECHAS Y DESCUENTOS*************************/
///$("#invoice_date").datepicker(/*"update", new Date()*/);
//$("#invoice_date").datepicker({  endDate: '+2d' });
    //$("#dp3").bootstrapDP();  
last_invoice_date = {{$last_invoice_date}};
//$( "#invoice_date" ).datepicker({ minDate: last_invoice_date, maxDate: "+0D" }).datepicker({ dateFormat: 'dd-mm-yy' }).datepicker("setDate", new Date());
$( "#invoice_date" ).datepicker({ dateFormat: 'dd/mm/yy' }).datepicker("setDate", new Date());
$("#due_date").datepicker();
$('#invoice_date').on('changeDate', function(ev){
    $(this).datepicker('hide');
});
$('#due_date').on('changeDate', function(ev){
    $(this).datepicker('hide');
});
$(".emision_icon").click(function(){
    $("#invoice_date").datepicker('show');
});
$(".vencimiento_icon").click(function(){
    $("#due_date").datepicker('show');
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

  // $(function() {
  //    availableTags = getProductsName();
  //   $( "#notes1" ).autocomplete({
  //     minLength: 0,
  //     source: availableTags
  //   });
  // });

// $.ui.autocomplete.filter = function (array, term) {
//         var matcher = new RegExp("^" + $.ui.autocomplete.escapeRegex(term), "i");
//         return $.grep(array, function (value) {
//             return matcher.test(value.label || value.value || value);
//         });
//     };

// $(document).on('click','.notes', function(){
//   $("#"+this.id).autocomplete( "search", "" );
// });
$(document).on('mouseover','.new_row',function(){  
  val = this.id.substring(7);    
  $("#killit"+val).show();
});
$(document).on('mouseout','.new_row',function(){
  val = this.id.substring(7);  
  $("#killit"+val).hide();
});


function calculateTotal()
{
  sum = 0;  
  // //se optimiza solo tomando los valores de subtotal
  $( ".cost" ).each(function( index ) {  
  valor = $("#"+this.id).val();
  ind= this.id.substring(4);
  canti = $("#qty"+ind).val();
  console.log(ind);
  if(valor){    
    valor = canti * valor;
    sum = parseFloat(valor)+sum;
  }

  });
  //sum = parseFloat($("#subtotal").text());
  console.log(sum);
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
  ind= this.id.substring(4);
  canti = $("#qty"+ind).val();
  console.log(ind);
  if(valor){    
    valor = canti * valor;
    sum = parseFloat(valor)+sum;
  }
  });
  
  $("#subtotal").text(parseFloat(sum).toFixed(2)+"");
  $("#subtotal_send").val(sum);
}
function calculateAllTotal(){
    sum = 0;  
  $( ".cost" ).each(function( index ) {  
    valor = $("#"+this.id).val();    
    ind= this.id.substring(4);
    canti = $("#qty"+ind).val();    
    
    if(valor && canti){    
      console.log("calculando el total");    
      valor = canti * valor;
      sum = parseFloat(valor)+sum;
    }
  });
  $("#subtotal").text(parseFloat(sum).toFixed(2)+"");
  $("#subtotal_send").val(sum);
  dis= $("#discount").val();
  if($("#desc").prop('checked'))
    dis = (parseFloat(dis)*sum)/100;  
    else
        dis=parseFloat(dis);
  sum = sum - dis;
  $("#descuento_box").text(dis.toFixed(2));
  if(sum<0)sum=0;
  $("#total").text(sum.toFixed(2));
  $("#total_send").val(sum);
}

function addContactToSend2(id,name,mail,ind_con,tel){  
  div ="<div class='form-group .contact_add'>";// "<div class='col-md-12' id='sendcontacts'>";
  ide = "<input type='hidden' id='contact_id' value='"+id+"' name='contactos["+ind_con+"][id]'>";
  nombre = "<input  disabled id='contact_name' value='"+name+"'name='contactos["+ind_con+"][name]'>";
  correo = "<input   disabled id='contact_mail' value='"+mail+"'name='contactos["+ind_con+"][cmail]'>";
  tel = "<input   disabled id='contact_tel' value='"+tel+"'name='contactos["+ind_con+"][tel]'>";
  //send = "<input  type='checkbox' name='contactos["+ind_con+"][checked]'>";
  findiv = "</div>";
  $("#contactos_client").append(div+ide+nombre+correo+tel+findiv);

}

function addContactToSend(id,name,mail,ind_con,tel){
  div ="<div class='form-group contact_add'>";// "<div class='col-md-12' id='sendcontacts'>";
  ide = "";//<input type='hidden' id='contact_id' value='"+id+"' name='contactos["+ind_con+"][id]'>";
  nombre = "<div class='col-md-1'></div><label><i class='fa fa-user'></i>&nbsp;<b>"+name+"</b></label><br>";
  correo = "<div class='col-md-1'></div><i class='fa fa-envelope'></i>&nbsp;<a  href='mailto:"+mail+"'>"+mail+"</a><br>";
  tel = "<div class='col-md-1'></div><i class='fa fa-phone'></i>&nbsp;<a href='tel:"+tel+"'>"+tel+"</a><br>";
  //correo = "<input   disabled id='contact_mail' value='"+mail+"'name='contactos["+ind_con+"][cmail]'>";
  //tel = "<input   disabled id='contact_tel' value='"+tel+"'name='contactos["+ind_con+"][tel]'>";
  //send = "<input  type='checkbox' name='contactos["+ind_con+"][checked]'>";
  findiv = "</div><hr class='contact_add'>";
  $("#contactos_client").append(div+ide+nombre+correo+tel+findiv);
  $(".ui-tooltip").hide();
}
// $(document).on("autocompleteclose",'.notes',function(event,ui){
//   code = $("#"+this.id).val(); 
//   console.log(code);
//   updateRowName(code,this.id.substring(5));

//   $('#tableb').append(addNewRow());

//   addProducts(id_products);

// $("#code"+id_products).select2({
//   placeholder: "Código"
// });
// $("#notes"+id_products).select2({
//   placeholder: "Concepto"
// });

//     //var productKey = "#product_key"+(idProducts);
//     //addProducts(idProducts);
//     $('.killit').css('cursor', 'pointer');
//     id_products++;
// });


$(document).on("change",'.code',function(){

  if(changing_note)
  {
    changing_note = false;
    return 0;
  }
  code = $("#"+this.id).val();  
  ind_act = this.id.substring(4);

  changing_code = true; 
  products.forEach(function(prod){
    if(prod['product_key'] == code)
    {
      //$("#notes"+ind_act).val(prod['product_key']).trigger("change");
      $("#notes"+ind_act).val(prod['notes']);
      $("#cost"+ind_act).val(prod['cost']).prop('disabled', false);
      $("#qty"+ind_act).val(1).prop('disabled', false);
      $("#subtotal"+ind_act).val(prod['cost']);
      //$("input").prop('disabled', false);
    }
  });  
  calculateAllTotal();
  if(emptyRows()<1){
  $('#tableb').append(addNewRow());  
  $('#killit'+id_products).css('cursor', 'pointer');
  addProducts(id_products);
  
  $("#code"+id_products).select2({
    placeholder: "Código"
  });
//  $("#notes"+id_products).select2({
//    placeholder: "Concepto"
//  });
  id_products++;
  }
});
$("#sub_boton").mouseover(function(){
  cli=$("#client").val();
  val = 1;
  if(cli==""){
    $("#sub_boton").prop('disabled', false);
    return 0;
  }

  num =0;

  $(".new_row").each(function( index ) {      
    act = this.id.substring(7);                    
    code = $("#code"+act).val();    
    num++;
  });  
  if(num == 1)
  {
    console.log("solo1");
    if(code == "")
      $("#sub_boton").prop('disabled', true);
    else
      $("#sub_boton").prop('disabled', false);
  }
  else
    $("#sub_boton").prop('disabled', false);
});
function completeItem(ind_act,item_send){
    products.forEach(function(prod){
    if(prod['notes'] == item_send)
    {
      $("#code"+ind_act).val(prod['product_key']).trigger("change");
      $("#cost"+ind_act).val(prod['cost']).prop('disabled', false);
      $("#qty"+ind_act).val(1).prop('disabled', false);
      $("#subtotal"+ind_act).val(prod['cost']);
    }
  });   
}
$(document).on("change",'.notes',function(){

  if(changing_code)
  {
    changing_code = false;
    return 0;
  }
  code = $("#"+this.id).val();  
  ind_act = this.id.substring(5);
  console.log(code+"<<>>");
  changing_note = true; 

  products.forEach(function(prod){
    if(prod['product_key'] == code)
    {
      $("#code"+ind_act).val(prod['product_key']).trigger("change");
      $("#cost"+ind_act).val(prod['cost']).prop('disabled', false);
      $("#qty"+ind_act).val(1).prop('disabled', false);
      $("#subtotal"+ind_act).val(prod['cost']);
    }
  });    
  calculateAllTotal();
  if(emptyRows()<1){
  $('#tableb').append(addNewRow());
  //console.log(id_products+"--<<<<");
  addProducts(id_products);
  console.log(ind_act+"bbbb"+id_products);
  $("#code"+id_products).select2({
    placeholder: "Código"
  });
//  $("#notes"+id_products).select2({
//    placeholder: "Concepto"
//  });
  id_products++;
  }
});

// $("#notes1").change(function(){
//   if(!changing)
//   console.log("this is changed");
// changing= false;
// });




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
          data: 'product_key='+product_key+'&notes='+item+'&cost='+cost+'&category_id='+category+'&json=1&unidad='+unidad,
          beforeSend: function(){
            console.log("Inicia ajax with ");
          },
          success: function(result)
          {
            
            console.log(result);
            if(result!=0){
            addNewProduct(product_key,item,cost);  
            prod_to_add.push(item);
            $(".new_row").each(function( index ) {      
              act = this.id.substring(7);              
              //valor = $("#"+this.id).val();
              //$("#notes"+act).select2({data: [{id:product_key, text: item}]}); 
              $( "#notes"+act ).autocomplete('option', 'source', prod_to_add);
              $("#code"+act).select2({data: [{id:product_key, text: product_key}]});
            });
            }
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
              addContactToSend(res['id'],res['first_name']+" "+res['last_name'],res['email'],ind_con,res['phone']) ;
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
          data: 'product_key='+product_key+'&notes='+item+'&cost='+cost+'&category_id=1&json=2',
          beforeSend: function(){
            console.log("Inicia ajax with ");
          },
          success: function(result)
          {            
            console.log(result);          
            if(result!=0){
            addNewProduct(product_key,item,cost);  
            prod_to_add.push(item);
            $(".new_row").each(function( index ) {      
              act = this.id.substring(7);              
              //valor = $("#"+this.id).val();
              //$("#notes"+act).select2({data: [{id:product_key, text: item}]}); 
              $( "#notes"+act ).autocomplete('option', 'source', prod_to_add);
              $("#code"+act).select2({data: [{id:product_key, text: product_key}]});
            });
            }
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
    // $( "#code1" ).autocomplete({
    //   minLength: 0,
    //   source: availableTags,  
    // });
}  

  $(document).on('click','.qty', function(){
    $("#"+this.id).select();
  });
  $("#discount").click(function(){
    $("#discount").select();
  });
  $("#discount").keyup(function(){
    calculateAllTotal();
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

    if(cont!=1 && $("#code"+act).val()!="" ){
    $("#new_row"+act).remove();

    // if(emp == 0 )
    //   addNewRow();
    calculateAllTotal();
  }
});


  $(document).on('keyup','.qty',function(){
    ind = this.id.substring(3);
    costo = $("#cost"+ind).val();
    if(costo=='')
        costo=0;
    costo = parseFloat(costo).toFixed(2);
    cantidad = $("#qty"+ind).val();
    if(cantidad=='')
        cantidad= 0;
    cantidad = parseFloat(cantidad).toFixed(2);

    total_val=$("#total").val();
    
    total_val = parseFloat(total_val).toFixed(2);
            
    subtotal_val = costo*cantidad;
    $("#subtotal"+ind).val(subtotal_val.toFixed(2));        
    calculateAllTotal();
  });
  $(document).on('keyup','.cost',function(){
    ind = this.id.substring(4);
    costo = $("#cost"+ind).val();
    if(costo=='')
        costo=0;
    costo = parseFloat(costo).toFixed(2);
    cantidad = $("#qty"+ind).val();
    if(cantidad=='')
        cantidad= 0;
    cantidad = parseFloat(cantidad).toFixed(2);

    total_val=$("#total").val();
    total_val = parseFloat(total_val).toFixed(2);

    subtotal_val = costo*cantidad;
    $("#subtotal"+ind).val(subtotal_val.toFixed(2));
    $("#total").text((total+subtotal_val)+"");
    calculateAllTotal();
  });

$("#code1").select2().on("select2-focus", function(e) {
          console.log("focus");
        });


function addNewRow(){
  tr=  "<tr class='new_row' id='new_row"+id_products+"'>";
  tdcode="<td><input class='form-control code' id='code"+id_products+"' name=\"productos["+id_products+"]['product_key']\""+"</td>";
  tdcode="<td><select id='code"+id_products+"' name=\"productos["+id_products+"]['product_key']\" class='form-control code select2-input' data-style='success'><option></option> </select></td>";  
  //tdnotes = "<td><input class='form-control notes' id='notes"+id_products+"' name=\"productos["+id_products+"]['item']\""+"</td>";
  tdnotes= "<td><div class='ui-widget'> <input id='notes"+id_products+"' class='form-control notes' name=\"productos["+id_products+"]['item']\"></div></td>";
  
 // tdnotes ="<td><select id='notes"+id_products+"' name=\"productos["+id_products+"]['item']\"class='select2-input notes form-control' data-style='success'><option></option> </select></td>";
  tdcost = "<td ><input disabled class='form-control cost centertext' type='number' min='0.01' step='any' id='cost"+id_products+"' name=\"productos["+id_products+"]['cost']\""+"</td>";
  tdqty = "<td><input disabled class='form-control qty centertext' type='number' min='1' step='1' id='qty"+id_products+"' name=\"productos["+id_products+"]['qty']\""+"</td>";
  //tdsubtotal ="<td><label class='subtotal' id='subtotal"+id_products+"'>0 </label></td>";
  tdsubtotal = "<td><input disabled class='form-control derecha' value='0' id='subtotal"+id_products+"'></td>";
  tdkill= "<td><div for='inputError'><span class='killit' style='color:red' id='killit"+id_products+"'><i class='fa fa-minus-circle redlink'></i></span></div></td>";
  fintr="</tr>";
  return tr+tdcode+tdnotes+tdcost+tdqty+tdsubtotal+tdkill+fintr;
}

// $( "form" ).submit(function( event ) {
//   if ( $( "input:first" ).val() != "" ) {
//     $( "span" ).text( "Validado..." ).show();
//     return;
//   }
 
//   $( "span" ).text( "Ingrese Cliente!" ).show().fadeOut( 1000 );
//   event.preventDefault();
// });

$("form").submit(function() {
    $(this).submit(function() {
        return false;
    });
    return true;
});

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

$(document).ready(function(){
  $('a.back').click(function(){
    parent.history.back();
    return false;
  });
});
</script>
<!-- iCheck -->
@stop