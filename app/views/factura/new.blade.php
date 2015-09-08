@extends('header')
@section('head')

<!--<script src="{{ asset('vendor/jspdf/dist/jspdf.min.js')}}" type="text/javascript"></script>-->

		
		<!--<script src="{{ asset('vendor/jspdf/dist/jspdf.debug.js')}}" type="text/javascript"></script>-->
		
		<script src="{{ asset('vendor/select2/dist/js/select2.js')}}" type="text/javascript"></script>
		<link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/dist/css/select2.css')}}">
		
		<!--<script src="{{ asset('vendor/knockout.js/knockout.js') }}" type="text/javascript"></script>-->

		<!--<script src="{{ asset('vendor/jspdf/dist/underscore.js')}}" type="text/javascript"></script>
		<script src="{{ asset('js/requirejs.js') }}" typeheade="text/javascript"></script>
		
		<script src="{{ asset('vendor/jspdf/dist/invoicedesign.js')}}" type="text/javascript"></script>-->

		
		
				
		<!--<script src="{{ asset('vendor/jspdf/dist/invoicedesign.js')}}" type="text/javascript"></script>-->
	<!--	<script src="{{ asset('vendor/jspdf/dist/jspdf.min.js')}}" type="text/javascript"></script>
		<script src="{{ asset('vendor/jspdf/dist/pdf_viewer.js')}}" type="text/javascript"></script>
		<script src="{{ asset('vendor/jspdf/dist/compatibility.js')}}" type="text/javascript"></script>
		<script src="{{ asset('vendor/jspdf/dist/png.js')}}" type="text/javascript"></script>
		<script src="{{ asset('vendor/jspdf/dist/zlib.js')}}" type="text/javascript"></script>
		
		<script src="{{ asset('vendor/jspdf/dist/addimage.js')}}" type="text/javascript"></script>
		<script src="{{ asset('vendor/jspdf/dist/png_support.js')}}" type="text/javascript"></script>
-->

		<!--<script src="{{ asset('built.js') }}" type="text/javascript"></script>
		<script src="{{ asset('vendor/jspdf/dist/pdf_viewer.js')}}" type="text/javascript"></script>
		<script src="{{ asset('vendor/jspdf/dist/compatibility.js')}}" type="text/javascript"></script>
		<script src="{{ asset('vendor/jspdf/dist/png.js')}}" type="text/javascript"></script>
		<script src="{{ asset('vendor/jspdf/dist/zlib.js')}}" type="text/javascript"></script>
		
		<script src="{{ asset('vendor/jspdf/dist/addimage.js')}}" type="text/javascript"></script>-->
		


<!--<script src="./lib/jspdf.js"></script>
<script type="text/javascript" src="./lib/jspdf.plugin.standard_fonts_metrics.js"></script> 
<script type="text/javascript" src="./lib/jspdf.plugin.split_text_to_size.js"></script>               
<script type="text/javascript" src="./lib/j spdf.plugin.from_html.js"></script>
-->





		<style>
			#section {
    		width:350px;
    		float:left;
    		padding:10px;	 	 
    		background-color:#eeeeee;
			}
			#savesection {
    		width:350px;
    		float:left;
    		padding:10px;	 	 
    		background-color:#5cb85c;
			}
		</style>
		<!--<script src="{{ asset('vendor/select2/dist/js/select2.js')}}" type="text/javascript"></script>-->

		<script src="{{	asset('js/typehead.js')}}" type="text/javascript"></script>

		<!--<script src="{{ asset('js/accounting.js') }}" type="text/javascript"></script>-->

@stop
@section('content')
	<!-- This part creates the breadcrumbs-->
	<ol class="breadcrumb panel-heading">
		<li class='active'>Nueva Factura</li>

		{{-- <li class='active'>{{ Auth::user()->branch->name }}</li> --}}

	</ol> 


		   

	{{Former::framework('TwitterBootstrap3')}}
	<!-- former definition -->
	{{Former::framework('TwitterBootstrap3')}}
	{{ Former::open('factura')->method('POST')->addClass('warn-on-exit')->rules(array(
		'client' => 'required',
		'invoice_date' => 'required',
		'product_key' => 'max:20',
		'discount'	=>	'between:0,100',
	)) }}
	<br/><br/>
	<!--<form action="" method=POST>-->
	<input type="submit" style="display:none" name="submitButton" id="submitButton">
	<div data-bind="with: invoice" class="panel-body">
		<div class="row" style="min-height:10px">
			<div class="col-md-5" id="col_1">
				<div class="control-label col-lg-2 col-sm-2"> 		
					{{ Former::label('cliente') }}
				</div>
				<div id="bloodhound" class="col-lg-8 col-sm-10">
					{{-- Former::text('client')->placeholder('Escriba nombre del cliente...')->raw()->class('typeahead form-control') --}}
					 <select id="client" name="client" onchange="addValuesClient(this)" class="js-data-example-ajax" style="width:200px">
      					<option value="null" ></option>      			
    				</select>

				</div>	
				<input id="nombre" type="hidden" name="nombre" >
				<input id="nit" type="hidden" name="nit" >
				<input id="razon" type="hidden" name="razon">
					
				<br><br>
				<div id="newclient" style="display:none">
					<div id="section">
						<div class="col-md-5">
							Nombre:	
						</div>
						<div class="col-md-5 col-sm-10">
							<input id="newuser" type="text" class="form-control">
						</div>
						<div class="col-md-5">
							Razón Social:
						</div>
						<div class="col-md-5 col-sm-10">
							<input id="newrazon" type="text" class="form-control">
						</div>
						<div class="col-md-5">
								NIT:
						</div>
						<div class="col-md-5 col-sm-10">
							<input id="newnit" type="text" class="form-control">
						</div>
					</div>
					<div id="savesection">					
						<div class="col-md-6">
							Esta creando un nuevo cliente						
						</div>

						<div class="col-md-3 col-sm-5">
							<button type='button' onclick='saveNewClient()'>Guardar</button>					
						</div>
						<div class="col-md-3 col-sm-5">
							<span> <a onclick='quitarClient()' >Cancelar</a></span>
						</div>
					</div>
				</div>

			</div>	
			<div class="col-md-4" id="col_2">
				<div data-bind="visible: !is_recurring()" >					
					{{ Former::text('invoice_date')->label('Fecha de Emisión')
								->data_date_format(DEFAULT_DATE_PICKER_FORMAT)->append('<i class="glyphicon glyphicon-calendar"></i>') }}
					{{ Former::text('due_date')->label('Fecha de Vencimiento')
								->data_date_format(DEFAULT_DATE_PICKER_FORMAT)->append('<i class="glyphicon glyphicon-calendar"></i>') }}	
				</div>	
			</div>
			<div class="col-md-3" id="col_2">
				{{ Former::number('discount')->label('Descuento')->data_bind("value: discount, valueUpdate: 'afterkeydown'")->append('<i>%</i>') }}
			</div>
		</div>
		<div  class="col-xs-2"> <button  type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#create_product">Crear Producto</button> </div>
	<div  class="col-xs-2"> <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#create_service">Crear Servicio</button> </div>
	<div  class="col-xs-2"> <button type="button">Enviar Por Correo</button> </div>
	<div  class="col-xs-6"></div>



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
</div>
	


	



	{{ Former::hidden('data')->data_bind("value: ko.mapping.toJSON(model)") }}	
<div class="col-xs-12">
	<div class="table-responsive">
	<table class="table invoice-table" id="tableb" name="tableb">
		<thead>
			<tr>
				<th  class="hide-bordercol-xs-1"></th>
				<th class="col-xs-2">Código</th>
				<th class="col-xs-3">Concepto</th>
				<th class="col-xs-2">Costo Unitario</th>
				<th class="col-xs-2">Cantidad</th>
				<th class="col-xs-1">Subtotal</th>
				<th  class="hide-border col-xs-1"></th>
			</tr>
		</thead>
		<tbody data-bind="sortable: { data: invoice_items, afterMove: onDragged }">
			<tr id="trid" name="trid" data-bind="event: { mouseover: showActions, mouseout: hideActions }" class="sortable-row">
				<td class="hide-border td-icon">
					<i style="display:none" data-bind="visible: actionsVisible() &amp;&amp; $parent.invoice_items().length > 1" class="fa fa-sort "></i>
				</td>
				<td>	            						
					<select id="product_key0" style='width:200px' name="productos[0]['product_key']" onchange="selectProduct(this)" class="select2-input" data-style="success">
						<option value="empty"></option>
					</select>
				</td>
				<td >
					<select id="item0" style='width:400px' class="select2-input" name="productos[0]['item']" onchange="selectProduct(this)"   data-style="success">
						<option value="empty"></option>											
					</select>
					
					<!--<textarea id="item0" data-bind="value: wrapped_notes, valueUpdate: 'afterkeydown'" rows="1" cols="60" style="resize: none;" class="form-control word-wrap typehead"></textarea>-->
					
				</td>
				<td >
					<input id="cost0" onkeyup="onItemChange()" name="productos[0]['cost']" min="0" step="any" data-bind="value: prettyCost, valueUpdate: 'afterkeydown'" style="text-align: right" class="form-control"//>
				</td>
				<td>
					<input id="qty0" onclick="cleanField(this)" name="productos[0]['qty']" min="0" step="any" data-bind="value: prettyQty, valueUpdate: 'afterkeydown'" style="text-align: right" class="form-control"//>
				</td>

				<td>
					<input id="subtotal0" style="text-align: right" class="form-control"//>
				</td>

				<td style="text-align:right;padding-top:9px !important">
					<div class="line-total" data-bind="text: totals.total"></div>
				</td>
				
			</tr>			

		</tbody>


		<tfoot>
			<tr>
				<td class="hide-border"/>
				<td colspan="2" rowspan="6" style="vertical-align:top">
					<br/>
					{{ Former::textarea('public_notes')->data_bind("value: wrapped_notes, valueUpdate: 'afterkeydown'")
					->label(false)->maxlength('125')->placeholder('Nota para el Cliente')->style('resize: none') }}			
					{{ Former::textarea('terms')->data_bind("value: wrapped_terms, valueUpdate: 'afterkeydown'")
					->label(false)->maxlength('125')->placeholder('Términos de la Facturación')->style('resize: none')
					->addGroupClass('less-space-bottom') }}
				</td>
				<td style="display:none" data-bind="visible: $root.invoice_item_discount.show"/>	        	
				<td colspan="2">Total Bs.</td>
				<td style="text-align: right"><span data-bind="text: totals.subtotal"/></td>
			</tr>

			<tr style="display:none" data-bind="visible: discount() > 0 || $root.invoice_item_discount.show">
				<td class="hide-border" colspan="3"/>
				<td style="display:none" data-bind="visible: $root.invoice_item_discount.show"/>	        	
				<td colspan="2">Descuento</td>
				<td style="text-align: right"><span data-bind="text: totals.discounted"/></td>
			</tr>

			<tr>
				<td class="hide-border" colspan="3"/>
				<td style="display:none" data-bind="visible: $root.invoice_item_discount.show"/>
				<td colspan="2"><b>Total a pagar Bs.</b></td>
				<td style="text-align: right" name="total" id="total"><span>0</span></td>
			</tr>

		</tfoot>


	</table>
	</div>
</div>
	<p>&nbsp;</p>
	{{--@include('factura.pdf', ['account' => Auth::user()->account])--}}
	<div data-bind="visible: !is_recurring()">
				{{Form::submit('Emitir Factura',  ['class' => 'btn btn-large btn-success openbutton'], array('id' => 'saveButton', 'onclick' => 'onSaveClick()')) }}
				&nbsp;&nbsp;&nbsp;
</div>


	
	<!--In this part is defined the script to create the model invoice-->
	<script type="text/javascript">	

	var cuenta =  {{$account }};
	console.log("--asdasdasd --->");
	console.log(cuenta);

var idProducts = 1;
var total = 0;
var subtotal =0;
var productKey = "#product_key0";	
var blocked_to_change=-1;
$("#invoice_date").datepicker();
$("#due_date").datepicker();
function createRow(){
	newtr="<tr id='trid' data-bind=' event: { mouseover: showActions, mouseout: hideActions }' class='sortable-row'>";
	td1="<td class='hide-border td-icon'></td>";
	td2="<td><select id='product_key"+idProducts+"' name=\"productos["+idProducts+"]['product_key']\" onchange='selectProduct(this)' class='select2-input'  style='width:200px'>"
		+"<option value='empty'></option>"
		+"<option value='new'>Nuevo Producto</option>"
		+"</select></td>";	
	td3="<td><select id='item"+idProducts+"' name=\"productos["+idProducts+"]['item']\"class='select2-input' style='width:400px'>"+
		"<option value='empty'></option>"+
		"<option value='new'>Nuevo Producto</option>"+
		+"</select></td>";
	td4="<td><input id='cost"+idProducts+"'name=\"productos["+idProducts+"]['cost']\" min='0' step='any' style='text-align: right' class='form-control'//></td>";								        				
	td5="<td><input id='qty"+idProducts+"'name=\"productos["+idProducts+"]['qty']\" onclick='cleanField(this)' onchange='changeQty(this)' min='0' step='any' style='text-align: right' class='form-control'//></td>";
	td6="<td><input id='subtotal"+idProducts+"' style='text-align: right' class='form-control'//> </td>";
	td7="<td></td></tr>";				
	return newtr+td1+td2+td3+td4+td5+td6+td7;		
}

	


function addValuesClient(dato){
	id_client_selected = $(dato).val();
	act_clients.forEach(function(cli) {
		if(id_client_selected == cli['id'])
		{
			$("#nombre").val(cli['name']);
			$("#razon").val(cli['business_name']);
			$("#nit").val(cli["nit"]);
		}
	});
}

$("#product_key0").select2();
$("#item0").select2();
var products = {{ $products }};
var products_selected = [];
//console.log(products);
addProducts(0);
var act_clients=[];
//this function add a new row then an preview row is modificated
//select2-product_key1-container
/*
$(productKey).change(function(){
	console.log(productKey);
	$('#tableb').append(createRow());
	$("#product_key"+(idProducts)).select2();	
	var productKey = "#product_key"+(idProducts);
	idProducts++;
});
*/

$("#client").after("&nbsp;<i class='glyphicon' onclick='addClient()'>+</i>");
function viewNewProduct(valor){

	//$("#product_key0").hide();
	
	parent = $(valor).parent().closest('tr');

	id=idProducts;	
	parent.css("background-color", "#5cb85c");

	//$("#product_key0").remove();
	empty_val = "<td></td>";
	creating_message = "<td  colspan = '2'><span>Usted esta creando un nuevo re-usable item</span></td>";
	save_item	=	"<td > <button type='button' onclick='saveNewProduct()'>Guardar</button></td>";
	cancel_message	=	"<td><span> <a onclick='quitar()' >Cancelar</a></span></td>";
		parent = $("#tableb");
		parent = $(valor).parent().parent().parent();

		//parent = $("#tableb").closest( "tr" ).after($(valor).parent());
	parent.append("<tr id='trnew'>"+empty_val+creating_message+save_item+cancel_message+empty_val+empty_val+"</tr>");

	$("#trnew").css("background-color", "#5cb85c");
	//console.log("#product_key"+(id-1));
	$("#product_key"+(id-1)).select2("destroy");
	$("#product_key"+(id-1)).replaceWith( "<input id='key_temp' class='form-control'//>");

	$("#item"+(id-1)).select2("destroy");
	$("#item"+(id-1)).replaceWith( "<input id='item_temp' class='form-control'//>");

}

	
	datapassed = "e";
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

	//esta funcion quita la ayuda al momento de crear un nuevo producto

	function quitar()
	{
		$("#trnew").remove();
		parent =	$("#item_temp").parent().parent();
		parent.css("background-color", "#FFFFFF");	
		//console.log("this is tne new one");
		
		//product_key = $("#key_temp").hide();
		//$("#product_key").val('1').change();
		td2="<td><select id='product_key"+(idProducts-2)+"' name=\"productos["+(idProducts-2)+"]['product_key']\" onchange='selectProduct(this)' class='select2-input'  style='width:200px'>"
		+"<option value='empty'></option>"
		+"<option value='new'>Nuevo Producto</option>"
		+"</select></td>";	


		$("#key_temp").hide();
		$("#key_temp").replaceWith(td2);

		td3="<td><select id='item"+(idProducts-2)+"' name=\"productos["+(idProducts-2)+"]['item']\"class='select2-input' style='width:400px'>"+
		"<option value='empty'></option>"+
		"<option value='new'>Nuevo Producto</option>"+
		+"</select></td>";
		$("#itm_temp").hide();
		$("#item_temp").replaceWith(td3);

		$("#item"+(idProducts-2)).select2();
		$("#product_key"+(idProducts-2)).select2();
	}
	function quitarClient()
	{
		$("#newclient").hide();

	}
	function changeQty(dato){
		cantidad = $(dato).val();
		//console.log(cantidad);
	}

	//esta funcion envia el nuevo producto para que sea almacenado
	function saveNewProduct()
	{
		product_key = $("#code_new").val();
		item = $("#notes_new").val();
		cost = $("#cost_new").val();
		category = $("#categoy_new").val();
		unidad = $("#unidad_new").val();
	

		console.log(product_key+item+cost+category+unidad);
		//quitar();

		/*
		$.ajax({     
      		type: 'POST',
      		url:'{{ URL::to('productos') }}',
      		data: 'product_key='+product_key+'&notes='+item+'&cost='+cost+'&category_id=1',
      		beforeSend: function(){
        		console.log("Inicia ajax with ");
      		},
      		success: function(result)
      		{
      			quitar();
        		console.log(result);        	
      		}
    	});
*/
	}

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
      			quitar();
        		console.log(result);        	
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
      			quitar();
        		console.log(result);        	
      		}
    	});
	

		console.log(product_key+item+cost+category);
	});

	function saveNewClient()
	{
		user = $("#newuser").val();
		nit = $("#newnit").val();
		razon = $("#newrazon").val();		
		//console.log(user+nit+name);
		quitarClient();
	/*
		
		$.ajax({     
      		type: 'POST',
      		url:'{{ URL::to('clientes') }}',
      		data: 'business_name='+razon+'&nit='+nit+'&name='+user,
      		beforeSend: function(){
        		console.log("Inicia ajax client register ");
      		},
      		success: function(result)
      		{
      			quitarClient();
        		console.log(result);        	
      		}
    	});
	*/
	}
	function addClient(){
		$("#newclient").show();

	}
	function cleanField(val){
		//console.log(val);
		$(val).select();
	}

	/*$('#client').click(function(){
    console.log("Sale de campo NIT");
     console.log('{{ URL::to('validacion') }}');
    $.ajax({     
      type: 'POST',
      url:'{{ URL::to('validacion') }}',
      data: 'nit='+$("#nit").val(),
      beforeSend: function(){
        console.log("Inicia ajax");
      },
      success: function(result)
      {
        console.log(result);
        //$("#nit").val(result);    
      }
    });
  });*/
	//var products = [];


//for(products )

//this add dinamicaly products to the tale
function isProductSelected(key)
{
	//console.log("Prod selected ");
	//console.log(products_selected);
	vari = 0;	
	products_selected.forEach(function(pro_sel){
		if(pro_sel['product_key'] == key){
			console.log(">>>>"+pro_sel['product_key'] +" - "+ key);
			vari = 1;						
		}
	});
	return vari;
}

function addProducts(id_act)
{	console.log("entra a esta opcion");
	products.forEach(function(prod) {		
		console.log(prod);
		console.log(isProductSelected(prod['product_key'])+"<<<---");
		if( 0 === isProductSelected(prod['product_key']) ){
			//console.log("->"+prod['product_key']);
			$("#item"+id_act).select2({data: [{id: prod['product_key'], text: prod['notes']}]});	
    		$("#product_key"+id_act).select2({data: [{id: prod['product_key'], text: prod['product_key']}]});
    	}
    	else
    		{console.log("this is ");}
	});



//	$("#product_key0").select2({data: [{id: 'asd', text: 'asdasd'}]});	
}

function selectProduct(prodenv)
{	
	//this is to obtain the id from the object in order to change all the row
	act_id = $(prodenv).attr("id");
	//console.log("this is the enw key enteres");

	//console.log("asd");
	act_idv = $(prodenv).val();
	
	if(act_idv == "new")
	{
		viewNewProduct(prodenv);
	}
	{
		//console.log(act_id);
		name_id = "";
		if(act_id.length > 7)
			name_id = "product_key";
		else
			name_id = "item";


		//act_id = act_id.replace("product_key","");		
		act_id = act_id.replace(name_id,"");

		products.forEach(function(prod) {

			//console.log($(prodenv).val() + " " + prod["product_key"]);
			//console.log(prod);
			//console.log(prod);

			//console.log(prod["product_key"]);
			
			if($(prodenv).val() == prod["product_key"] && blocked_to_change != prod["product_key"])
			{
				//console.log(prod['product_key']);
				products_selected.push(prod);
				blocked_to_change = prod["product_key"];
				$("#item"+act_id).val(prod['product_key']).change();//.trigger("change");
				$("#cost"+act_id).val(prod['cost']);
				total = total+parseFloat(prod['cost']);
				$("#total").text(total);
				$("#qty"+act_id).val('1');
				$("#subtotal"+act_id).val(prod['cost']).prop('disabled', true);
			}
			if(blocked_to_change != prod["product_key"])
				blocked_to_change=-1;

		});

	}

	if(1 == (idProducts - act_id))
	{
		
		$('#tableb').append(createRow());
		$("#product_key"+(idProducts)).select2();	
		//var productKey = "#product_key"+(idProducts);
		addProducts(idProducts);
		idProducts++;
	}

}

var  clients = [];
var states = [];//////states2;//{};
var subtotals = 0;




//*********************************DESIGN/////////////////
	
/************************INVOIE MODELS *********************************/
	
	/*Strating init vars*/
	/*Ending init vars*/








	</script>
@stop