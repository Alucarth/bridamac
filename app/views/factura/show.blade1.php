@extends('header')
 @section('title')Ver Factura @stop
@section('head')


		
		<!--<script src="{{ asset('vendor/select2/dist/js/select2.js')}}" type="text/javascript"></script>
		<!-- <link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/dist/css/select2.css')}}"> 
		<script src="{{ asset('vendor/AdminLTE2/plugins/select2/select2.js')}}" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/AdminLTE2/plugins/select2/select2.css')}}">-->

    <script src="{{ asset('vendor/jspdf/dist/jspdf.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('vendor/invoice/invoicedesign.js')}}" type="text/javascript"></script>
		
    <script src="{{ asset('vendor/accounting/accounting.js')}}" type="text/javascript"></script>
    <script src="{{ asset('vendor/underscore/underscore.js')}}" type="text/javascript"></script>
		<script src="{{ asset('vendor/jspdf/dist/pdf_viewer.js')}}" type="text/javascript"></script>
		<script src="{{ asset('vendor/jspdf/dist/compatibility.js')}}" type="text/javascript"></script>
		<script src="{{ asset('vendor/jspdf/dist/png.js')}}" type="text/javascript"></script>
		<script src="{{ asset('vendor/jspdf/dist/zlib.js')}}" type="text/javascript"></script>
		
		<script src="{{ asset('vendor/jspdf/dist/addimage.js')}}" type="text/javascript"></script>
    

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
    

@stop
@section('encabezado') FACTURAS @stop
@section('encabezado_descripcion') Ver Factura @stop 
@section('nivel') <li><a href="{{URL::to('factura')}}"><i class="fa fa-files-o"></i> Facturas</a></li>
            <li class="active">Ver</li> @stop

@section('content')
  {{ Former::open('enviarCorreo')->method('POST')->addClass('warn-on-exit')->rules(array(    
  )) }}
<br><br>
<div class="col-xs-12">
<input type="hidden" name="id" value="{{ $invoice->id }}">
<input type="hidden"  name="client" value="{{ $invoice->client_id }}">
<input type="hidden"  name="date" value="{{ $invoice->invoice_date }}">
<input type="hidden"  name="nit" value="{{ $invoice->client_nit }}">

<div class="col-xs-3"></div>
<div  class="col-xs-2"> <button  type="button" class="btn btn-primary btn-lg" onclick="printCanvas()" >Imprimir&nbsp;&nbsp;</button> </div>
<div  class="col-xs-2"> <button type="button" class="btn btn-primary btn-lg"  onclick="descargarPDF()" >Descargar PDF</button> </div>
<div  class="col-xs-2"> <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#contacts">Enviar por Correo</button> </div>
<div class="col-xs-3"></div>
</div>
<br><br>
<!-- <div class="col-xs-12">

</div> -->
<!-- <legend>Contactos</legend>
<br><br> -->
<br><br>
<div class="col-xs-12">
@include('factura.pdf', ['account' => Auth::user()->account])
</div>

  <div class="modal fade" id="contacts" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">ENVIAR A LOS SIGUIENTES CORREOS</h4>
          </div>
          <div class="modal-body col-xs-12">
            <div id="contacts_row">  
              <input type='hidden' id='contact_id' value='' name='contactos[0][id]'>
              <input  id='contact_name' placeholder="Nombre" value=''name='contactos[0][name]'>
              <input  id='contact_mail' placeholder="Correo" value=''name='contactos[0][mail]'>
              <input type='checkbox' name='contactos[0][checked]'>
              <br><br>
            </div>            
           </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="send" type="button" class="btn btn-primary" type="submit" data-dismiss="modal">Enviar</button>
            </div>          
      </div>
     </div>
  </div>
<script type="text/javascript">	
contacts = {{ $contacts }};
console.log("this is adding a contact");
console.log(contacts);
ind_con = 1;            
            contacts.forEach(function(res){
              console.log("this is us");
              addContactToSend(res['id'],res['first_name']+" "+res['last_name'],res['email'],ind_con) ;
              ind_con++;
            });



function addContactToSend(id,name,mail,ind_con){  
  div ="";// "<div class='col-md-12' id='sendcontacts'>";
  ide = "<input type='hidden' id='contact_id' value='"+id+"' name='contactos["+ind_con+"][id]'>";
  nombre = "<input   id='contact_name' value='"+name+"'name='contactos["+ind_con+"][name]'>&nbsp;";
  correo = "<input    id='contact_mail' value='"+mail+"'name='contactos["+ind_con+"][mail]'>";
  send = "<input  type='checkbox' name='contactos["+ind_con+"][checked]'>";
  findiv = "<br><br>";//</div>";
  $("#contacts_row").append(div+ide+nombre+correo+send+findiv);

}
$("#send").click(function(){
  $( "form" ).submit();
});
var qr64;
///0-------------------------------------------------------
function printCanvas() {  
    var dataUrl = document.getElementById("theCanvas").toDataURL();
    var printWin = window.open('','','width=600,height=500');
    printWin.document.open();
    printWin.document.write("<img width='99.5%'  src='"+dataUrl+"'/>");
    printWin.document.close();
    printWin.focus();
    printWin.print();
    printWin.close();
}
function descargarPDF()
{
  doc.save("factura.pdf");
}
  window.logoImages = {};

  logoImages.logofooter = "./images/logofooter.jpg'";
  logoImages.imageLogoWidthf =100;
  logoImages.imageLogoHeightf = 13;
  
  logoImages.imageLogo1 = "./images/report_logo1.jpg'";
  logoImages.imageLogoWidth1 =120;
  logoImages.imageLogoHeight1 = 40


  var isRefreshing = false;
  var needsRefresh = false;
//printCanvas();

  function refreshPDF2() {
    if (true) {
      var string = getPDFString();
      if (!string) return;
      $('#theFrame').attr('src', string).show();    
    } 
  }


function refreshPDF() {
         
      
      if (isRefreshing) {
        needsRefresh = true;
        return;
      }
      var string = getPDFString();
      if (!string) return;
      isRefreshing = true;
      var pdfAsArray = convertDataURIToBinary(string);  
      PDFJS.getDocument(pdfAsArray).then(function getPdfHelloWorld(pdf) {

        pdf.getPage(1).then(function getPageHelloWorld(page) {
          var scale = 6;
          var viewport = page.getViewport(scale);

          var canvas = document.getElementById('theCanvas');
          var context = canvas.getContext('2d');
          canvas.height = viewport.height;
          canvas.width = viewport.width;

          page.render({canvasContext: context, viewport: viewport});
          $('#theCanvas').show();
          isRefreshing = false;
          if (needsRefresh) {
            needsRefresh = false;
            refreshPDF();
          }
        });
      }); 
    
  }



  function callkeydownhandler(evnt) {
    refreshPDF();
  }


  document.oncontextmenu = function(){return false;}


  $(function() {    
    var $input = $('select#client');
    
    applyComboboxListeners();
      
  }); 

  function applyComboboxListeners() {
    var selectorStr = '.invoice-table input, .invoice-table select, .invoice-table textarea';   
    $(selectorStr).off('blur').on('blur', function() {
      refreshPDF();
    });
    var newkey;    

  }

  function createInvoiceModel() {
    //console.log("a invoice model is created "+invoice.is_quote);
    //var invoice = ko.toJS(model).invoice;   
    invoice.is_quote = 0;
      return invoice;
  }

  function getPDFString() {
  	console.log("before this rendering al is ok");
    var invoice = createInvoiceModel();
    var design  = getDesignJavascript();

    var doc = generatePDF(invoice, design, getLogoJavascript(), getLogoXJavascript(), getLogoYJavascript());
    return doc.output('datauristring');
  }

  function getDesignJavascript() {
    return invoiceDesigns[0].javascript;
  }

  function getLogoJavascript() {
      return invoiceDesigns[0].logo; 
    }

    function getLogoXJavascript() {
        return invoiceDesigns[0].x;
      }

    function getLogoYJavascript() {
        return invoiceDesigns[0].y;
      }

  function onDownloadClick() {
    trackUrl('/download_pdf');
    var invoice = createInvoiceModel();
    var design  = getDesignJavascript();
    if (!design) return;
    var doc = generatePDF(invoice, design, getLogoJavascript(), getLogoXJavascript(), getLogoYJavascript());
    doc.save('Factura Num: ' + invoice.invoice_number +', '+ invoice.invoice_date + '.pdf');
  }

  function onSaveEmailClick() {
    if (confirm('confirmar guardar mail')) {   
      submitAction('email');
    }
  }
  function onEmailClick() {
    if (confirm('confirmar enviar mail')) {    
      submitAction('email');
    }
  }

  function onsavepayClick() {
    if (confirm('confirma ghuardar pago')) {    
      submitAction('savepay');
    }
  }
  function onsavepaycreditClick() {
    if (confirm('confirmar guardar credito')) {   
      submitAction('savepaycredit');
    }
  }

  function onSaveClick() {
    if (model.invoice.is_recurring()) {
      if (confirm('confirma guardar factura recurrente')) {    
        submitAction('');
      }     
    } else {
      submitAction('save');
    }
  }

  function submitAction(value) {
    $('#action').val(value);
    $('#submitButton').click();   
  }

  function onConvertClick() {
    submitAction('convert');    
  }


  function ViewModel(data) {
    //data=null;
    var self = this;
    
    //self.invoice = ko.observable(data ? false : new InvoiceModel());
    self.invoice = new InvoiceModel();    
    
    self.tax_rates =[];// ko.observableArray();
    
    self.loadClient = function(client) {
      
    //  ko.mapping.fromJS(client, model.invoice().client().mapping, model.invoice().client);
    }

    self.invoice_item_taxes = false;//''ko.observable(false);
    self.invoice_item_discount = false;//ko.observable(false);

    self.invoice_item_discount2 = true;//ko.observable(true);

    self.mapping = {
        'invoice': {
            create: function(options) {
                return new InvoiceModel(options.data);
            }
        },
        'tax_rates': {
          create: function(options) {
            return new TaxRateModel(options.data);
          }
        },
    }   

    if (data) {
      ko.mapping.fromJS(data, self.mapping, self);
    }

    self.removeTaxRate = function(taxRate) {
      self.tax_rates.remove(taxRate);
      //refreshPDF();
    }

    self.addTaxRate = function(data) {
      var itemModel = new TaxRateModel(data);
      self.tax_rates.push(itemModel); 
      applyComboboxListeners();
    }   


    self.getTaxRate = function(name, rate) {
      for (var i=0; i<self.tax_rates().length; i++) {
        var taxRate = self.tax_rates()[i];
        if (taxRate.name() == name && taxRate.rate() == parseFloat(rate)) {
          return taxRate;
        }     
      }     

      var taxRate = new TaxRateModel();
      taxRate.name(name);
      taxRate.rate(parseFloat(rate));
      if (parseFloat(rate) > 0) taxRate.is_deleted(true);
      self.tax_rates.push(taxRate);
      return taxRate;     
    }   

    self.showClientForm = function() {
      trackUrl('/view_client_form');
      //self.clientBackup = ko.mapping.toJS(self.invoice().client);

      $('#clientModal').modal('show');      
    }

    self.clientFormComplete = function() {
      trackUrl('/save_client_form');

      var isValid = true;

      var firstName = $('#first_name').val();
      var lastName = $('#last_name').val();
      var business_name = $('#business_name').val();

      if (self.invoice().client().public_id() == 0) {
        self.invoice().client().public_id(-1);
      }

      refreshPDF();
      model.clientBackup = false;
      $('#clientModal').modal('hide');            
    } 
  }

  function InvoiceModel(data) {
    var self = this;    
    //this.client = ko.observable(data ? false : new ClientModel());    
    this.clients=new ClientModel();
    
    this.id = '';//ko.observable('');
    self.discount = '';//ko.observable('');
    self.frequency_id = '';//ko.observable('');
    self.terms = '';//ko.observable('');
    self.public_notes = '';//ko.observable('');   
    self.invoice_date = 'Aug 21, 2015';
    self.invoice_number = '';
    self.due_date = '';
    self.start_date = 'Aug 21, 2015';
    self.end_date = '';//ko.observable('');
    self.tax_name = '';//ko.observable();
    self.tax_rate = '';//ko.observable();
    self.is_recurring = false;//ko.observable(false);
    self.invoice_status_id = 0;//ko.observable(0);
    self.invoice_items = [];//ko.observableArray();
    self.amount = 0;//ko.observable(0);
    self.balance = 0;//ko.observable(0);

    self.branch_id = '';//ko.observable('');

    self.custom_value1 = 0;//ko.observable(0);
    self.custom_value2 = 0;//ko.observable(0);
    self.custom_taxes1 = false;//ko.observable(false);
    self.custom_taxes2 = false;//ko.observable(false);
    self.discount_item = 0;//ko.observable(0);


    self.mapping = {
      'client': {
            create: function(options) {
                return new ClientModel(options.data);
            }
      },
        'invoice_items': {
            create: function(options) {
                return new ItemModel(options.data);
            }
        },
        'tax': {
          create: function(options) {
            return new TaxRateModel(options.data);
          }
        },
    }

    self.addItem = function() {
      var itemModel = new ItemModel();
      self.invoice_items.push(itemModel); 
      applyComboboxListeners();     
    }

    if (data) {
      
      //ko.mapping.fromJS(data, self.mapping, self);      
      self.is_recurring(parseInt(data.is_recurring));
    } else {
      
      self.addItem();
    }

    self._tax = 0;//ko.observable();
    self.removeItem = function(item) {
      self.invoice_items.remove(item);
      refreshPDF();
    }


    this.totals = 0;//ko.observable();
    self.onDragged = function(item) {
      refreshPDF();
    } 
  }

  function ClientModel(data) {
    var self = this;
    console.log("this is the result-->");    
    self.public_id=0;//ko.observable(0);
    self.nit ='';//ko.observable('');
    self.business_name = '';//ko.observable('');
        self.name = '';//ko.observable('');
    self.contacts ='';// ko.observableArray();

    self.mapping = {
        'contacts': {
            create: function(options) {
                return new ContactModel(options.data);
            }
        }
    }

//es enviado vacio
    if (data) {
      console.log("this has data");
      //ko.mapping.fromJS(data, {}, this);
    }   
  }
  function TaxRateModel(data) {
    var self = this;
    self.public_id ='';// ko.observable('');
    self.rate = 0;//ko.observable(0);
    self.name = '';//ko.observable('');
    self.is_deleted =false;// ko.observable(false);
    self.is_blank = false;//ko.observable(false);
    self.actionsVisible = false;//ko.observable(false);
  
      self.hideActions = function() {
      self.actionsVisible(false);
      }

      self.showActions = function() {
      self.actionsVisible(true);
      }   

      self.isEmpty = function() {
        return !self.rate() && !self.name();
      }     
  }

  function ItemModel(data) {
    var self = this;    
    this.product_key ='';// ko.observable('');
    this.notes ='';// ko.observable('');
    this.cost =0;// ko.observable(0);
    this.disc = 0;//ko.observable(0);
    this.qty = 0;//ko.observable(0);
    self.tax_name ='';// ko.observable('');
    self.tax_rate = 0;//ko.observable(0);
    this.actionsVisible =false;// ko.observable(false);
    
    self._tax = 0;//ko.observable();
   
    self.mapping = {
        'tax': {
          create: function(options) {
            return new TaxRateModel(options.data);
          }
        }
    }

    if (data) {
      ko.mapping.fromJS(data, self.mapping, this);      
    }

    this.totals = 0;//ko.observable();
    this.hideActions = function() {
    this.actionsVisible(false);
    }

    this.showActions = function() {
    this.actionsVisible(true);
    }

    this.isEmpty = function() {
      return !self.product_key() && !self.notes() && !self.cost() && (!self.qty());
    }

    this.onSelect = function(){              
    }
  }

	function formatMoney(value, currency_id, hide_symbol) {
   		value = parseFloat(value);
    	if (!currency_id) currency_id = {{ Session::get(SESSION_CURRENCY, DEFAULT_CURRENCY); }};
    		//var currency = currencyMap[currency_id];
    		symbol="";
    		precision="2";
    		thousand_separator=",";
    		decimal_separator=".";

    		return accounting.formatMoney(value, hide_symbol ? '' : symbol, precision, thousand_separator, decimal_separator);
  	}

  function onItemChange()
  {
  
return false;
  }

  milogo2 = "";
  milogo="data:image/jpeg;base64,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";
  milogo="data:image/png;base64,/9j/4AAQSkZJRgABAQEASABIAAD/7SUSUGhvdG9zaG9wIDMuMAA4QklNA+0AAAAAABAAlgAAAAEAAgCWAAAAAQACOEJJTQPyAAAAAAAKAAD///////8AADhCSU0D8wAAAAAACQAAAAAAAAAAAQA4QklNA/UAAAAAAEgAL2ZmAAEAbGZmAAYAAAAAAAEAL2ZmAAEAoZmaAAYAAAAAAAEAMgAAAAEAWgAAAAYAAAAAAAEANQAAAAEALQAAAAYAAAAAAAE4QklNA/gAAAAAAHAAAP////////////////////////////8D6AAAAAD/////////////////////////////A+gAAAAA/////////////////////////////wPoAAAAAP////////////////////////////8D6AAAOEJJTQQAAAAAAAACAAA4QklNBAIAAAAAAAQAAAAAOEJJTQQEAAAAAAEVHAFaAAMbJUccAgAAAgAEHAIFABdCdXNpbmVzcyBsb2dvIGRlc2lnbiAzRBwCGQACM2QcAhkACGJ1c2luZXNzHAIZAAxjb21wYW55IGxvZ28cAhkAC2NvcnBvcmF0aW9uHAIZAAZkZXNpZ24cAhkACGdlb21ldHJ5HAIZAAhpbmR1c3RyeRwCGQAEbG9nbxwCGQAJbG9nbyBuYW1lHAIZAAxvcmdhbml6YXRpb24cAhkAEXByb2Zlc3Npb25hbCBsb2dvHAIZAARzaWduHAIZAAdzcGluaW5nHAIZAAZzeW1ib2wcAhkABXRyYWRlHAIZAAp0cmFkZSBtYXJrHAJ4ABRCdXNpbmVzcyBsb2dvIGRlc2lnbgA4QklNBAYAAAAAAAcACAEBAAEBADhCSU0ECAAAAAAAEAAAAAEAAAJAAAACQAAAAAA4QklNBAwAAAAAG7UAAAABAAAAoAAAAJMAAAHgAAEToAAAG5kAGAAB/9j/7QAMQWRvYmVfQ00AAv/uAA5BZG9iZQBkgAAAAAH/2wCEAAwICAgJCAwJCQwRCwoLERUPDAwPFRgTExUTExgRDAwMDAwMEQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwBDQsLDQ4NEA4OEBQODg4UFA4ODg4UEQwMDAwMEREMDAwMDAwRDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDP/AABEIAJMA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MS4wLwA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/PiA8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJBZG9iZSBYTVAgQ29yZSA1LjMtYzAwNyAxLjEzNjg4MSwgMjAxMC8wNi8xMC0xODoxMTozNSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6ZGM9Imh0dHA6Ly9wdXJsLm9yZy9kYy9lbGVtZW50cy8xLjEvIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdFJlZj0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlUmVmIyIgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIgeG1sbnM6aWxsdXN0cmF0b3I9Imh0dHA6Ly9ucy5hZG9iZS5jb20vaWxsdXN0cmF0b3IvMS4wLyIgeG1sbnM6cGRmPSJodHRwOi8vbnMuYWRvYmUuY29tL3BkZi8xLjMvIiB4bWxuczpscj0iaHR0cDovL25zLmFkb2JlLmNvbS9saWdodHJvb20vMS4wLyIgeG1sbnM6Y3JzPSJodHRwOi8vbnMuYWRvYmUuY29tL2NhbWVyYS1yYXctc2V0dGluZ3MvMS4wLyIgZGM6Zm9ybWF0PSJpbWFnZS9qcGVnIiB4bXA6TWV0YWRhdGFEYXRlPSIyMDEyLTAyLTE2VDE5OjQ5OjQwKzA0OjAwIiB4bXA6TW9kaWZ5RGF0ZT0iMjAxMi0wMi0xNlQxODo0NDozMyswNDowMCIgeG1wOkNyZWF0ZURhdGU9IjIwMTItMDItMTZUMTg6NDE6MTIrMDQ6MDAiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNS4xIE1hY2ludG9zaCIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDpGNzdGMTE3NDA3MjA2ODExODA4M0FCRjk3Q0RDOURDMiIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDpGRTdGMTE3NDA3MjA2ODExODA4M0E1N0U4NUJDMzZENSIgeG1wTU06T3JpZ2luYWxEb2N1bWVudElEPSJ1dWlkOjVEMjA4OTI0OTNCRkRCMTE5MTRBODU5MEQzMTUwOEM4IiB4bXBNTTpSZW5kaXRpb25DbGFzcz0icHJvb2Y6cGRmIiBpbGx1c3RyYXRvcjpTdGFydHVwUHJvZmlsZT0iUHJpbnQiIHBkZjpQcm9kdWNlcj0iQWRvYmUgUERGIGxpYnJhcnkgOS45MCIgY3JzOlJhd0ZpbGVOYW1lPSIzRCBHZW9tZXRyeSBsb2dvLmpwZyI+IDxkYzp0aXRsZT4gPHJkZjpBbHQ+IDxyZGY6bGkgeG1sOmxhbmc9IngtZGVmYXVsdCI+QnVzaW5lc3MgbG9nbyBkZXNpZ24gM0Q8L3JkZjpsaT4gPC9yZGY6QWx0PiA8L2RjOnRpdGxlPiA8ZGM6c3ViamVjdD4gPHJkZjpCYWc+IDxyZGY6bGk+M2Q8L3JkZjpsaT4gPHJkZjpsaT5idXNpbmVzczwvcmRmOmxpPiA8cmRmOmxpPmNvbXBhbnkgbG9nbzwvcmRmOmxpPiA8cmRmOmxpPmNvcnBvcmF0aW9uPC9yZGY6bGk+IDxyZGY6bGk+ZGVzaWduPC9yZGY6bGk+IDxyZGY6bGk+Z2VvbWV0cnk8L3JkZjpsaT4gPHJkZjpsaT5pbmR1c3RyeTwvcmRmOmxpPiA8cmRmOmxpPmxvZ288L3JkZjpsaT4gPHJkZjpsaT5sb2dvIG5hbWU8L3JkZjpsaT4gPHJkZjpsaT5vcmdhbml6YXRpb248L3JkZjpsaT4gPHJkZjpsaT5wcm9mZXNzaW9uYWwgbG9nbzwvcmRmOmxpPiA8cmRmOmxpPnNpZ248L3JkZjpsaT4gPHJkZjpsaT5zcGluaW5nPC9yZGY6bGk+IDxyZGY6bGk+c3ltYm9sPC9yZGY6bGk+IDxyZGY6bGk+dHJhZGU8L3JkZjpsaT4gPHJkZjpsaT50cmFkZSBtYXJrPC9yZGY6bGk+IDwvcmRmOkJhZz4gPC9kYzpzdWJqZWN0PiA8ZGM6ZGVzY3JpcHRpb24+IDxyZGY6QWx0PiA8cmRmOmxpIHhtbDpsYW5nPSJ4LWRlZmF1bHQiPkJ1c2luZXNzIGxvZ28gZGVzaWduPC9yZGY6bGk+IDwvcmRmOkFsdD4gPC9kYzpkZXNjcmlwdGlvbj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6QzY0RDY0QzMxMjIwNjgxMThGNjI5QzgzREM0NThGRDMiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6RkU3RjExNzQwNzIwNjgxMTgwODNBNTdFODVCQzM2RDUiIHN0UmVmOm9yaWdpbmFsRG9jdW1lbnRJRD0idXVpZDo1RDIwODkyNDkzQkZEQjExOTE0QTg1OTBEMzE1MDhDOCIgc3RSZWY6cmVuZGl0aW9uQ2xhc3M9InByb29mOnBkZiIvPiA8eG1wTU06SGlzdG9yeT4gPHJkZjpTZXE+IDxyZGY6bGkgc3RFdnQ6YWN0aW9uPSJzYXZlZCIgc3RFdnQ6aW5zdGFuY2VJRD0ieG1wLmlpZDpGQjdGMTE3NDA3MjA2ODExODA4M0E1N0U4NUJDMzZENSIgc3RFdnQ6d2hlbj0iMjAxMi0wMi0xNlQxODo0MDozMSswNDowMCIgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWRvYmUgSWxsdXN0cmF0b3IgQ1M1IiBzdEV2dDpjaGFuZ2VkPSIvIi8+IDxyZGY6bGkgc3RFdnQ6YWN0aW9uPSJzYXZlZCIgc3RFdnQ6aW5zdGFuY2VJRD0ieG1wLmlpZDpGRDdGMTE3NDA3MjA2ODExODA4M0E1N0U4NUJDMzZENSIgc3RFdnQ6d2hlbj0iMjAxMi0wMi0xNlQxODo0MToxMiswNDowMCIgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWRvYmUgSWxsdXN0cmF0b3IgQ1M1IiBzdEV2dDpjaGFuZ2VkPSIvIi8+IDxyZGY6bGkgc3RFdnQ6YWN0aW9uPSJjb252ZXJ0ZWQiIHN0RXZ0OnBhcmFtZXRlcnM9ImZyb20gYXBwbGljYXRpb24veC1waG90b3Nob3AgdG8gYXBwbGljYXRpb24vdm5kLmFkb2JlLnBob3Rvc2hvcCIvPiA8cmRmOmxpIHN0RXZ0OmFjdGlvbj0ic2F2ZWQiIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6RkU3RjExNzQwNzIwNjgxMTgwODNBNTdFODVCQzM2RDUiIHN0RXZ0OndoZW49IjIwMTItMDItMTZUMTg6NDE6MzYrMDQ6MDAiIHN0RXZ0OnNvZnR3YXJlQWdlbnQ9IkFkb2JlIElsbHVzdHJhdG9yIENTNSIgc3RFdnQ6Y2hhbmdlZD0iLyIvPiA8cmRmOmxpIHN0RXZ0OmFjdGlvbj0iY29udmVydGVkIiBzdEV2dDpwYXJhbWV0ZXJzPSJmcm9tIGFwcGxpY2F0aW9uL3gtcGhvdG9zaG9wIHRvIGFwcGxpY2F0aW9uL3ZuZC5hZG9iZS5waG90b3Nob3AiLz4gPHJkZjpsaSBzdEV2dDphY3Rpb249InNhdmVkIiBzdEV2dDppbnN0YW5jZUlEPSJ4bXAuaWlkOkZGN0YxMTc0MDcyMDY4MTE4MDgzQTU3RTg1QkMzNkQ1IiBzdEV2dDp3aGVuPSIyMDEyLTAyLTE2VDE4OjQxOjM2KzA0OjAwIiBzdEV2dDpzb2Z0d2FyZUFnZW50PSJBZG9iZSBJbGx1c3RyYXRvciBDUzUiIHN0RXZ0OmNoYW5nZWQ9Ii8iLz4gPHJkZjpsaSBzdEV2dDphY3Rpb249InNhdmVkIiBzdEV2dDppbnN0YW5jZUlEPSJ4bXAuaWlkOkM2NEQ2NEMzMTIyMDY4MTE4RjYyOUM4M0RDNDU4RkQzIiBzdEV2dDp3aGVuPSIyMDEyLTAyLTE2VDE4OjQ0OjMzKzA0OjAwIiBzdEV2dDpzb2Z0d2FyZUFnZW50PSJBZG9iZSBQaG90b3Nob3AgQ1M1LjEgTWFjaW50b3NoIiBzdEV2dDpjaGFuZ2VkPSIvIi8+IDxyZGY6bGkgc3RFdnQ6YWN0aW9uPSJjb252ZXJ0ZWQiIHN0RXZ0OnBhcmFtZXRlcnM9ImZyb20gYXBwbGljYXRpb24vdm5kLmFkb2JlLnBob3Rvc2hvcCB0byBpbWFnZS9qcGVnIi8+IDxyZGY6bGkgc3RFdnQ6YWN0aW9uPSJkZXJpdmVkIiBzdEV2dDpwYXJhbWV0ZXJzPSJjb252ZXJ0ZWQgZnJvbSBhcHBsaWNhdGlvbi92bmQuYWRvYmUucGhvdG9zaG9wIHRvIGltYWdlL2pwZWciLz4gPHJkZjpsaSBzdEV2dDphY3Rpb249InNhdmVkIiBzdEV2dDppbnN0YW5jZUlEPSJ4bXAuaWlkOjA0OTc1NUU2MTcyMDY4MTE4RjYyOUM4M0RDNDU4RkQzIiBzdEV2dDp3aGVuPSIyMDEyLTAyLTE2VDE4OjQ0OjMzKzA0OjAwIiBzdEV2dDpzb2Z0d2FyZUFnZW50PSJBZG9iZSBQaG90b3Nob3AgQ1M1LjEgTWFjaW50b3NoIiBzdEV2dDpjaGFuZ2VkPSIvIi8+IDxyZGY6bGkgc3RFdnQ6YWN0aW9uPSJzYXZlZCIgc3RFdnQ6aW5zdGFuY2VJRD0ieG1wLmlpZDpGNzdGMTE3NDA3MjA2ODExODA4M0FCRjk3Q0RDOURDMiIgc3RFdnQ6d2hlbj0iMjAxMi0wMi0xNlQxOTo0OTo0MCswNDowMCIgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWRvYmUgUGhvdG9zaG9wIExpZ2h0cm9vbSAzLjYgKE1hY2ludG9zaCkiIHN0RXZ0OmNoYW5nZWQ9Ii9tZXRhZGF0YSIvPiA8L3JkZjpTZXE+IDwveG1wTU06SGlzdG9yeT4gPGxyOmhpZXJhcmNoaWNhbFN1YmplY3Q+IDxyZGY6QmFnPiA8cmRmOmxpPjNkPC9yZGY6bGk+IDxyZGY6bGk+YnVzaW5lc3M8L3JkZjpsaT4gPHJkZjpsaT5jb21wYW55IGxvZ288L3JkZjpsaT4gPHJkZjpsaT5jb3Jwb3JhdGlvbjwvcmRmOmxpPiA8cmRmOmxpPmRlc2lnbjwvcmRmOmxpPiA8cmRmOmxpPmdlb21ldHJ5PC9yZGY6bGk+IDxyZGY6bGk+aW5kdXN0cnk8L3JkZjpsaT4gPHJkZjpsaT5sb2dvPC9yZGY6bGk+IDxyZGY6bGk+bG9nbyBuYW1lPC9yZGY6bGk+IDxyZGY6bGk+b3JnYW5pemF0aW9uPC9yZGY6bGk+IDxyZGY6bGk+cHJvZmVzc2lvbmFsIGxvZ288L3JkZjpsaT4gPHJkZjpsaT5zaWduPC9yZGY6bGk+IDxyZGY6bGk+c3BpbmluZzwvcmRmOmxpPiA8cmRmOmxpPnN5bWJvbDwvcmRmOmxpPiA8cmRmOmxpPnRyYWRlPC9yZGY6bGk+IDxyZGY6bGk+dHJhZGUgbWFyazwvcmRmOmxpPiA8L3JkZjpCYWc+IDwvbHI6aGllcmFyY2hpY2FsU3ViamVjdD4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+ICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPD94cGFja2V0IGVuZD0idyI/Pv/bAEMAAwICAwICAwMDAwQDAwQFCAUFBAQFCgcHBggMCgwMCwoLCw0OEhANDhEOCwsQFhARExQVFRUMDxcYFhQYEhQVFP/bAEMBAwQEBQQFCQUFCRQNCw0UFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFP/AABEIA6oD/wMBEQACEQEDEQH/xAAdAAEAAAcBAQAAAAAAAAAAAAAAAgMEBQYHCAEJ/8QAXRAAAQMDAQUFBQQHBQQGBwERAQACAwQFEQYHEiExQQgTUWFxFCIygZEVQlKhIzNicoKxwQkWQ5KiJGOy4RdEU3PC8CU0NVaDk9HSlbMYJjZFVJSj02V0dYS0w/H/xAAcAQEAAQUBAQAAAAAAAAAAAAAABgIDBAUHAQj/xABCEQACAQIDBAgEBQMDAwQDAQEAAQIDBAURIRIxQVEGYXGBkaGx0RMiweEUIzJS8DNCYhVTknLS8RYkgqJDssI04v/aAAwDAQACEQMRAD8A+qaAIAgCAIAgCAIAgCAIAgCAIAgCAIAgCAIAgCAIAgCAIAgCAIAgCAIAgCAIAgCAIAgCAIAgCAIAgCAIAgCAIAgCAIAgCAIAgCAIAgCAIAgCAIAgCAIAgCAIAgCAIAgCAIAgCAIAgCAIAgCAIAgCAIAgCAIAgCAIAgCAIAgC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";
  
  
  var clientMap = {};
  var $clientSelect = $('select#client');
  var invoiceDesigns =[
{

            
account_id:
    
    1,
javascript:
    
    "displaytittle(doc, invoice, layout);"+
"displayHeader(doc, invoice, layout);"+
"doc.setFontSize(11);"+
"doc.setFontType('normal');"+
"var activi = invoice.economic_activity;"+
"var activityX = 565 - (doc.getStringUnitWidth(activi) * doc.internal.getFontSize());"+
"doc.text(activityX, layout.headerTop+45, activi);"+
"var aleguisf_date = getInvoiceDate(invoice);"+
"layout.headerTop = 50;"+
"layout.tableTop = 190;"+
"doc.setLineWidth(0.8);"+      
"doc.setFillColor(255, 255, 255);"+
"doc.roundedRect(layout.marginLeft - layout.tablePadding, layout.headerTop+95, 572, 35, 2, 2, 'FD');"+
"var marginLeft1=30;"+
"var marginLeft2=80;"+
"var marginLeft3=180;"+
"var marginLeft4=220;"+
"datos1y = 160;"+
"datos1xy = 15;"+
"doc.setFontSize(11);"+
"doc.setFontType('bold');"+
"doc.text(marginLeft1, datos1y, 'Fecha : ');"+
"doc.setFontType('normal');"+
"doc.text(marginLeft2-5, datos1y, aleguisf_date);"+
"doc.setFontType('bold');"+
"doc.text(marginLeft1, datos1y+datos1xy, 'Señor(es) :');"+
"doc.setFontType('normal');"+
"doc.text(marginLeft2+15, datos1y+datos1xy, invoice.client_name);"+
"doc.setFontType('bold');"+
"doc.text(marginLeft3+240, datos1y+datos1xy, 'NIT/CI :');"+
"doc.setFontType('normal');"+
"doc.text(marginLeft4+245, datos1y+datos1xy, invoice.client_nit);"+
"doc.setDrawColor(241,241,241);"+
"doc.setFillColor(241,241,241);"+
"doc.rect(layout.marginLeft - layout.tablePadding, layout.headerTop+140, 572, 20, 'FD');"+
"doc.setFontSize(10);"+
"doc.setFontType('bold');"+
"console.log('maybe by here');"+
"if(invoice.branch_type_id==1)"+
"{"+
"    displayInvoiceHeader(doc, invoice, layout);"+
"    var y = displayInvoiceItems(doc, invoice, layout);"+
"    displayQR(doc, layout, invoice, y);"+
"    y += displaySubtotals(doc, layout, invoice, y+15, layout.unitCostRight+35);"+
"}"+
"if(invoice.branch_type_id==2)"+
"{"+
 "   displayInvoiceHeader2(doc, invoice, layout);"+
 "   var y = displayInvoiceItems2(doc, invoice, layout);"+
 "   displayQR(doc, layout, invoice, y);"+
 "   y += displaySubtotals2(doc, layout, invoice, y+15, layout.unitCostRight+35);"+
"}"+
"y -=10;"+
"displayNotesAndTerms(doc, layout, invoice, y); ",
logo:
    milogo,
    
public_id:
    
    0,
user_id:
    
    1,
x:
    
    "15",
y:
    
    "9"
}];

  
    window.model = new ViewModel();
    model.addTaxRate();
    
    if (true)    
       var invoice = {{ $invoice }};
       console.log("thi is the result-->>");
       console.log(invoice);
       console.log("at this part ends the result");

      //ko.mapping.fromJS(invoice, model.invoice().mapping, model.invoice);     
      if (model.invoice.is_recurring === '0') {
        model.invoice.is_recurring=false;
      }
      // 
    
 
  onItemChange();
refreshPDF();
//doc.addImage(qrinside, 'JPEG', layout.marginRight-8-80, y+18+qry, 80, 80);


</script>
@stop