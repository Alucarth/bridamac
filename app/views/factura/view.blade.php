@extends('header')
@section('head')

<!--<script src="{{ asset('vendor/jspdf/dist/jspdf.min.js')}}" type="text/javascript"></script>-->

		
		<!--<script src="{{ asset('vendor/jspdf/dist/jspdf.debug.js')}}" type="text/javascript"></script>-->
		
		<script src="{{ asset('vendor/select2/dist/js/select2.js')}}" type="text/javascript"></script>
		<link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/dist/css/select2.css')}}">
		<script src="{{ asset('vendor/bootstrap-datepicker/js/bootstrap-datepicker.js') }}" type="text/javascript"></script>
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


		   
	@include('factura.pdf', ['account' => Auth::user()->account])



	<!--In this part is defined the script to create the model invoice-->
	<script type="text/javascript">	

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
		product_key = $("#key_temp").val();
		item = $("#item").val();
		cost = $("#cost").val();
		qty = $("#qty").val();
		//console.log(product_key+item+cost+qty);
		quitar();

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