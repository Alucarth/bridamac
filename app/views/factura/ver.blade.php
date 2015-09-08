
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

		<script src="{{ asset('built.js') }}" type="text/javascript"></script>
		<script src="{{ asset('vendor/jspdf/dist/pdf_viewer.js')}}" type="text/javascript"></script>
		<script src="{{ asset('vendor/jspdf/dist/compatibility.js')}}" type="text/javascript"></script>
		<script src="{{ asset('vendor/jspdf/dist/png.js')}}" type="text/javascript"></script>
		<script src="{{ asset('vendor/jspdf/dist/zlib.js')}}" type="text/javascript"></script>
		
		<script src="{{ asset('vendor/jspdf/dist/addimage.js')}}" type="text/javascript"></script>
		


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



@include('factura.pdf', ['account' => Auth::user()->account])


<script type="text/javascript">	
	
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

  window.logoImages = {};

  logoImages.logofooter = "./images/logofooter.jpg'";
  logoImages.imageLogoWidthf =100;
  logoImages.imageLogoHeightf = 13;
  
  logoImages.imageLogo1 = "./images/report_logo1.jpg'";
  logoImages.imageLogoWidth1 =120;
  logoImages.imageLogoHeight1 = 40;

  
  ///console.log(cuenta);
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
    self.account = 
            {
account_key:    
    "3fpyPCmTWOuKeHcvPUM1p4IunQRL35ab",
address1:    
    "av. obando",
address2:
    "irpavi",    
billing_deadline:    
    "2015-10-14",
city:    
    "",
confirmed:    
    1,
created_at:    
    "2015-07-13 23:00:42",
credit_counter:    
    297,
currency_id:
    1,
custom_client_label1:   
    null,
custom_client_label10:  
    null,
custom_client_label11:   
    null,
custom_client_label12:  
    null,
custom_client_label2:
    null,
custom_client_label3:   
    null,
custom_client_label4: 
    null,
custom_client_label5:   
    null,
custom_client_label6:  
    null,
custom_client_label7:
    null,
custom_client_label8:    
    null,
custom_client_label9:    
    null,
date_format_id:    
    null,
datetime_format_id:    
    null,
deleted_at:    
    null,
fill_products:    
    1,
id:    
    1,
ip:    
    "127.0.0.1",
is_uniper:    
    1,
language_id:    
    1,
last_login:    
    "2015-07-13 23:06:20",
name:    
    "vrian7",
nit:    
    "12345",
op1:    
    1,
op2:    
    1,
op3:    
    1,
state:    
    "",
timezone_id:
    null,
uniper:    
    "Brian Barrera",
update_products:    
    1,
updated_at:    
    "2015-07-14 00:08:56",
work_phone:    
    "4333234"
};    
    self.branches = 

           { 
account_id:    
    1,
address1:    
    "calle2",
address2:    
    "obrajes",    
branch_type_id:    
    2,
city:    
    "La PAz",
created_at:    
    "2015-07-13 23:02:54",
deadline:    
    "2019-10-16",
deleted_at:    
    null,
economic_activity:    
    "venta de cosas",
invoice_number_counter:    
    4,
key_dosage:    
    "archivo con la llave",
law:    
    "",
name:    
    "Brian",
number_autho:    
    "84784764747",
number_process:    
    "7575637387",
public_id:    
    1,
quote_number_counter:    
    0,
quote_number_prefix:    
    null,
state:    
    "La Paz",
type_third:    
    0,
updated_at:    
    "2015-07-14 00:08:55",
work_phone:    
    "27182373",
};
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
    		symbol="Bs";
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

  var products = [    {
cost:    
    "0.40",
notes:    
    "bread",
product_key:
    "1-A",
qty:    
    1},
    {
cost:    
    "12.34",
notes:    
    "milk",
product_key:
    "2",
qty:    
    1},
    ];
  var clients = [

            {
account_id:
    
    1,
address1:
    
    "californa",
address2:
    
    "colorado",
balance:    
    "205.66",
business_name:    
    "ninguna",
city:    
    "",
contacts:
    
    [ { 

            
account_id:
    
    1,
client_id:    
    2,
created_at:    
    "2015-07-13 23:08:26",
deleted_at:    
    null,
email:
    
    "",
first_name:
    
    "",
invitation_link:
    
    "http://localhost/fvdev/public/view/1um8sgz3Wj2YjKgwLeKwyXOMzjYWMlrj",
is_primary:
    
    1,
last_name:
    
    "",
phone:
    
    "",
public_id:
    
    1,
send_invoice:
    
    true,
updated_at:
    
    "2015-07-14 00:08:55",
user_id:
    
    1
    }],
created_at:    
    "2015-07-13 23:08:25",
custom_value1:
    
    "",
custom_value10:
    
    "",
custom_value11:
    
    "",
custom_value12:
    
    "",
custom_value2:
    
    "",
custom_value3:
    
    "",
custom_value4:
    
    "",
custom_value5:
    
    "",
custom_value6:
    
    "",
custom_value7:
    
    "",
custom_value8:
    
    "",
custom_value9:
    
    "",
deleted_at:
    
    null,
is_deleted:
    
    0,
last_login:
    
    null,
name:
    
    "kyle broflowsky",
nit:
    
    "7474364633",
paid_to_date:
    
    "39.60",
private_notes:
    
    "",
public_id:
    
    1,
state:
    
    "",
updated_at:    
    "2015-07-14 00:20:23",
user_id:    
    1,
work_phone:    
    "757578494"}
  ];
  
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
  for (var i=0; i<clients.length; i++) {
    var client = clients[i];
    for (var j=0; j<client.contacts.length; j++) {
      var contact = client.contacts[j];
      if (contact.is_primary) {
        contact.send_invoice = true;
      }
    }
    clientMap[client.public_id] = client;
    $clientSelect.append(new Option(client.name, client.public_id));
  }

  
    window.model = new ViewModel();
    model.addTaxRate();
    
    if (true)    
      var invoice = {

            
account:
               {
account_key:    
    "3fpyPCmTWOuKeHcvPUM1p4IunQRL35ab",
address1:    
    "av. obando",
address2:
    "irpavi",
billing_deadline:    
    "2015-10-14",
city:    
    "",
confirmed:    
    1,
created_at:    
    "2015-07-13 23:00:42",
credit_counter:    
    297,
currency_id:
    1,
custom_client_label1:   
    null,
custom_client_label10:  
    null,
custom_client_label11:   
    null,
custom_client_label12:  
    null,
custom_client_label2:
    null,
custom_client_label3:   
    null,
custom_client_label4: 
    null,
custom_client_label5:   
    null,
custom_client_label6:  
    null,
custom_client_label7:
    null,
custom_client_label8:    
    null,
custom_client_label9:    
    null,
date_format_id:    
    null,
datetime_format_id:    
    null,
deleted_at:    
    null,
fill_products:    
    1,
id:    
    1,
ip:    
    "127.0.0.1",
is_uniper:    
    1,
language_id:    
    1,
last_login:    
    "2015-07-13 23:06:20",
name:    
    "vrian7",
nit:    
    "12345",
op1:    
    1,
op2:    
    1,
op3:    
    1,
state:    
    "",
timezone_id:
    null,
uniper:    
    "Brian Barrera",
update_products:    
    1,
updated_at:    
    "2015-07-14 00:08:56",
work_phone:    
    "4333234"
},
    
account_id:
    
    1,
account_name:
    
    "vrian7123",
account_nit:
    
    "12345",
account_uniper:
    
    "",
address1:
    
    "calle2",    
address2:
    
    "obrajes",
amount:12,
balance:
    
    "25.08",
branch_id:
    
    1,
branch_name:
    
    "Brian",
branch_type_id:
    
    1,
city:
    
    "La PAz",
client:
    
    [

            {
account_id:
    
    1,
address1:
    
    "californa",
address2:
    
    "colorado",
balance:    
    "205.66",
business_name:    
    "ninguna",
city:    
    "",
contacts:
    
    [ { 

            
account_id:
    
    1,
client_id:    
    2,
created_at:    
    "2015-07-13 23:08:26",
deleted_at:    
    null,
email:
    
    "",
first_name:
    
    "",
invitation_link:
    
    "http://localhost/fvdev/public/view/1um8sgz3Wj2YjKgwLeKwyXOMzjYWMlrj",
is_primary:
    
    1,
last_name:
    
    "",
phone:
    
    "",
public_id:
    
    1,
send_invoice:
    
    true,
updated_at:
    
    "2015-07-14 00:08:55",
user_id:
    
    1
    }],
created_at:    
    "2015-07-13 23:08:25",
custom_value1:
    
    "",
custom_value10:
    
    "",
custom_value11:
    
    "",
custom_value12:
    
    "",
custom_value2:
    
    "",
custom_value3:
    
    "",
custom_value4:
    
    "",
custom_value5:
    
    "",
custom_value6:
    
    "",
custom_value7:
    
    "",
custom_value8:
    
    "",
custom_value9:
    
    "",
deleted_at:
    
    null,
is_deleted:
    
    0,
last_login:
    
    null,
name:
    
    "kyle broflowsky",
nit:
    
    "7474364633",
paid_to_date:
    
    "39.60",
private_notes:
    
    "",
public_id:
    
    1,
state:
    
    "",
updated_at:    
    "2015-07-14 00:20:23",
user_id:    
    1,
work_phone:    
    "757578494"}
  ],
client_id:
    
    2,
client_name:
    
    "kyle broflowsky",
client_nit:
    
    "7474364633",
control_code:
    
    "55-39-A5-99",
created_at:
    
    "2015-07-14 00:07:19",
deadline:
    
    "2019-10-16",
deleted_at:
    
    null,
discount:
    
    0,
discount_amount:
    
    0,
due_date:
    
    "14 Ago 2015",
economic_activity:
    
    "actividad economico",
end_date:
    
    "",
fiscal:
    
    "0.00",
frequency_id:
    
    0,
has_taxes:
    
    false,
ice:
    
    "0.00",
invitations:
    
 null,
invoice_date:
    
    "13 Jul 2015",
invoice_design_id:
    
    1,
invoice_items:
    
   [    {
cost:    
    "0.40",
notes:    
    "bread",
product_key:
    "1-A",
qty:    
    1},
    {
cost:    
    "12.34",
notes:    
    "milk",
product_key:
    "2",
qty:    
    1},
    ],
invoice_number:
    
    "2",
invoice_status_id:
    
    1,
is_deleted:
    
    0,
is_quote:
    
    0,
is_recurring:
    
    0,
key_dosage:
    
    "archivo con la llave",
last_sent_date:
    
    null,
law:
    
    "",
number_autho:
    
    "84784764747",
phone:
    
    "27182373",
po_number:
    
    "",
public_id:
    
    2,
public_notes:
    
    "",
qr:
    
    "data:image/png;base64,iV...TeWhtCPAAAAAElFTkSuQmCC",
quote_id:
    
    null,
quote_invoice_id:
    
    null,
recurring_invoice_id:
    
    null,
start_date:
    
    "",
state:
    
    "La Paz",
status:
    1,
subtotal:    
    "25.08",    
subtotal_amount:    
    25.08,
tax_amount:    
    0,
terms:    
    "",
type_third:    
    0,
updated_at:    
    "2015-07-14 00:07:19",
user_id:    
    1,
      };
      //ko.mapping.fromJS(invoice, model.invoice().mapping, model.invoice);     
      if (model.invoice.is_recurring === '0') {
        model.invoice.is_recurring=false;
      }
      var invitationContactIds = [1];
      var client = clientMap[invoice.client.public_id];
      if (client) { 
        for (var i=0; i<client.contacts.length; i++) {
          var contact = client.contacts[i];
          contact.send_invoice = invitationContactIds.indexOf(contact.public_id) >= 0;
        }     
      }
      model.invoice.addItem();      
    
 
  onItemChange();
refreshPDF();
doc.addImage(qrinside, 'JPEG', layout.marginRight-8-80, y+18+qry, 80, 80);


</script>
