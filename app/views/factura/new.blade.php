@extends('header')
@section('head');

<!--<script src="{{ asset('vendor/jspdf/dist/jspdf.min.js')}}" type="text/javascript"></script>-->

		<script src="{{	asset('built.js')}}" type="text/javascript"></script>
		<!--<script src="{{ asset('vendor/jspdf/dist/jspdf.debug.js')}}" type="text/javascript"></script>-->
		<script src="{{ asset('vendor/select2/dist/js/select2.js')}}" type="text/javascript"></script>
		<link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/dist/css/select2.css')}}">
		<!--<script src="{{ asset('vendor/knockout.js/knockout.js') }}" type="text/javascript"></script>-->

		<!--<script src="{{ asset('vendor/jspdf/dist/underscore.js')}}" type="text/javascript"></script>
		<script src="{{ asset('js/requirejs.js') }}" typeheade="text/javascript"></script>
		
		<script src="{{ asset('vendor/jspdf/dist/invoicedesign.js')}}" type="text/javascript"></script>-->

		
		
				

		<script src="{{ asset('vendor/jspdf/dist/pdf_viewer.js')}}" type="text/javascript"></script>
		<script src="{{ asset('vendor/jspdf/dist/compatibility.js')}}" type="text/javascript"></script>
		<script src="{{ asset('vendor/jspdf/dist/png.js')}}" type="text/javascript"></script>
		<script src="{{ asset('vendor/jspdf/dist/zlib.js')}}" type="text/javascript"></script>
		
		<script src="{{ asset('vendor/jspdf/dist/addimage.js')}}" type="text/javascript"></script>
		<script src="{{ asset('vendor/jspdf/dist/png_support.js')}}" type="text/javascript"></script>

		
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
	{{ Former::open($url)->method($method)->addClass('warn-on-exit')->rules(array(
		'client' => 'required',
		'invoice_date' => 'required',
		'product_key' => 'max:20',
		'discount'	=>	'between:0,100',
	)) }}
	<br/><br/>
	<input type="submit" style="display:none" name="submitButton" id="submitButton">
	<div data-bind="with: invoice" class="panel-body">
		<div class="row" style="min-height:10px">
			<div class="col-md-5" id="col_1">
				<div class="control-label col-lg-2 col-sm-2"> 		
					{{ Former::label('cliente') }}
				</div>
				<div id="bloodhound" class="col-lg-10 col-sm-10">
					{{ Former::text('client')->placeholder('Escriba nombre del cliente...')->raw()->class('typeahead form-control') }}
				</div>
			</div>	
			<div class="col-md-4" id="col_2">
				<div data-bind="visible: !is_recurring()" >					
					{{ Former::text('invoice_date')->data_bind("datePicker: invoice_date, valueUpdate: 'afterkeydown'")->label('Fecha de Emisión')
								->data_date_format(DEFAULT_DATE_PICKER_FORMAT)->append('<i class="glyphicon glyphicon-calendar" onclick="toggleDatePicker(\'invoice_date\')"></i>') }}
					{{ Former::text('due_date')->data_bind("datePicker: due_date, valueUpdate: 'afterkeydown'")->label('Fecha de Vencimiento')
								->data_date_format(DEFAULT_DATE_PICKER_FORMAT)->append('<i class="glyphicon glyphicon-calendar" onclick="toggleDatePicker(\'due_date\')"></i>') }}	
				</div>	
			</div>
			<div class="col-md-3" id="col_2">
				{{ Former::number('discount')->label('Descuento')->data_bind("value: discount, valueUpdate: 'afterkeydown'")->append('<i>%</i>') }}
			</div>
		</div>
	</div>
	
	{{ Former::hidden('data')->data_bind("value: ko.mapping.toJSON(model)") }}	

	<div class="table-responsive">
	<table class="table invoice-table" id="tableb">
		<thead>
			<tr>
				<th style="min-width:32px;" class="hide-border"></th>
				<th style="min-width:160px">Código</th>
				<th style="width:100%">Concepto</th>
				<th style="min-width:120px">Costo Unitario</th>
				<th style="min-width:120px">Cantidad</th>
				<th style="min-width:120px;">Subtotal</th>
				<th style="min-width:32px;" class="hide-border"></th>
			</tr>
		</thead>
		<tbody data-bind="sortable: { data: invoice_items, afterMove: onDragged }">
			<tr data-bind="event: { mouseover: showActions, mouseout: hideActions }" class="sortable-row">
				<td class="hide-border td-icon">
					<i style="display:none" data-bind="visible: actionsVisible() &amp;&amp; $parent.invoice_items().length > 1" class="fa fa-sort"></i>
				</td>
				<td>	            	
					{{-- Former::text('product_key')->useDatalist($products->toArray(), 'product_key','cost')->onkeyup('onItemChange()')
					->raw()->data_bind("value: product_key, valueUpdate: 'afterkeydown'")->addClass('select2-input') --}}
				<select id="product_key"  class="select2-input"  style="width:200px"  data-style="success">
					<option></option>				
					<option value="new">Nuevo Producto</option>
					<option value="100">100</option>
					<option value="103">103</option>
					<option value="200">200</option>
					<option value="201">201</option>					
				</select>
				</td>
				<td >
					<div id="itemtype">
					<textarea data-bind="value: wrapped_notes, valueUpdate: 'afterkeydown'" rows="1" cols="60" style="resize: none;" class="form-control word-wrap typehead"></textarea>
					</div>
				</td>
				<td >
					<input onkeyup="onItemChange()"  min="0" step="any" data-bind="value: prettyCost, valueUpdate: 'afterkeydown'" style="text-align: right" class="form-control"//>
				</td>
				<td>
					<input onclick="cleanField(this)" onkeyup="onItemChange()"  min="0" step="any" data-bind="value: prettyQty, valueUpdate: 'afterkeydown'" style="text-align: right" class="form-control"//>
				</td>

				<td data-bind="visible: $root.invoice_item_discount.show">
					<input  data-bind="value: prettyDisc, valueUpdate: 'afterkeydown'" style="text-align: right" class="form-control"//>
				</td>

				<td style="text-align:right;padding-top:9px !important">
					<div class="line-total" data-bind="text: totals.total"></div>
				</td>
				<td style="cursor:pointer" class="hide-border td-icon">
					&nbsp;<i style="display:none" data-bind="click: $parent.removeItem, visible: actionsVisible() &amp;&amp; $parent.invoice_items().length > 1" class="fa fa-minus-circle redlink" title="Remove item"/>
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
				<td style="text-align: right"><span data-bind="text: totals.total"/></td>
			</tr>

		</tfoot>


	</table>
	</div>
	<p>&nbsp;</p>
	@include('factura.pdf', ['account' => Auth::user()->account])
	<div data-bind="visible: !is_recurring()">
				{{Form::submit('Emitir Factura',  ['class' => 'btn btn-large btn-success openbutton'], array('id' => 'saveButton', 'onclick' => 'onSaveClick()')) }}
				&nbsp;&nbsp;&nbsp;
				<!--<div id="primaryActions" style="text-align:left" class="btn-group">
						{{ Form::submit(trans("texts.save_pay_{$entityType}"), ['class' => 'btn btn-large btn-primary openbutton'], array('id' => 'save_pay_button', 'onclick' => 'onsavepayClick()')); }}		
					<button class="btn-primary btn dropdown-toggle" type="button" data-toggle="dropdown"> 
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu">
						<li><a href="javascript:onsavepaycreditClick()" id="saveButton">{{ trans("texts.save_pay_credit_{$entityType}")}}</a></li>
					</ul> 
				</div>
				{{ Form::submit(trans("texts.save_email_{$entityType}"), ['class' => 'btn btn-large btn-default openbutton'], array('id' => 'email_button', 'onclick' => 'onSaveEmailClick()')); }}		
--></div>


{{-- 
<iframe id="theFrame" style="display:none" frameborder="1" width="100%" height="{{ isset($pdfHeight) ? $pdfHeight : 792 }}px"></iframe>
<div   style=" display: block; margin-left: 64px;margin-right: 64px;">
  <canvas id="theCanvas" style="width:85%;border:solid 1px #CCCCCC;"></canvas>
</div>

 --}}


	<!--In this part is defined the script to create the model invoice-->
	<script type="text/javascript">	

//$("table#tableb tr:even").css("background-color", "#F4F4F8");
//$("table#tableb tr:odd").css("background-color", "#EFF1F1");


$("#product_key").select2();
$("#product_key").change(function(){

	valor = $("#product_key").val();
	if(valor=="new")
	{
			parent = $(this).parent().parent();
	console.log(parent);
	parent.css("background-color", "#5EFF45");

	parent.append("<p id='screenshot'><span><this is appeded</span></p>");

	}
	else
	{
	parent = $(this).parent().parent();
	console.log(parent);
	parent.css("background-color", "#FFFFFF");	
	}

	//onItemChange();
});
	document.onkeypress=function(e){
	var esIE=(document.all);
	var esNS=(document.layers);
	tecla=(esIE) ? event.keyCode : e.which;
	if(tecla==13){
		return false;
	  }	  
	}
	//$(".client_select").addClass('form-control');
	function callkeydownhandler(evnt) {
		refreshPDF();
	}
	if (window.document.addEventListener) {
	   window.document.addEventListener("keydown", callkeydownhandler, false);
	} else {
	   window.document.attachEvent("onkeydown", callkeydownhandler);
	}

	document.oncontextmenu = function(){return false;}

	$("#client").focus(function(){
		$("#saveButton").prop('disabled', false);	
	});
	$(function() {

		$('[rel=tooltip]').tooltip();		
		$('#invoice_date, #due_date, #start_date, #end_date').datepicker({ altFormat: 'yy-mm-dd' });		
		@if ($client && !$invoice)
			$('input[name=client]').val({{ $client->public_id }});
		@endif
		
		var $input = $('select#client');
		$input.combobox().on('change', function(e) {
			var clientId = parseInt($('input[name=client]').val(), 10);		
			if (clientId > 0) { 
				model.loadClient(clientMap[clientId]);
			} else {
				model.loadClient($.parseJSON(ko.toJSON(new ClientModel())));
			}			
			refreshPDF();
		});		

		$('#terms, #public_notes, #invoice_date, #due_date, #discount, #recurring').change(function() {
			setTimeout(function() {
				refreshPDF();
			}, 1);
		});

		$('.client_select input.form-control').focus();
		
		$('#clientModal').on('shown.bs.modal', function () {
			$('#nit').focus();			
		}).on('hidden.bs.modal', function () {
			if (model.clientBackup) {
				model.loadClient(model.clientBackup);
				refreshPDF();
			}
		})

		$('#relatedActions > button:first').click(function() {
			onPaymentClick();
		});

		$('#primaryActions > button:first').click(function() {
			onSaveClick();
		});

		$('label.radio').addClass('radio-inline');

		applyComboboxListeners();
		
		@if ($client)
			$input.trigger('change');
		@else 
			refreshPDF();
		@endif

		var client = model.invoice().client();
		setComboboxValue($('.client_select'), 
			client.public_id(), 
			client.business_name.display());
		
	});	
	var item_row=  [];
	function applyComboboxListeners() {
		var selectorStr = '.invoice-table input, .invoice-table select, .invoice-table textarea';		
		$(selectorStr).off('blur').on('blur', function() {
			refreshPDF();
		});
		var newkey;
		@if (Auth::user()->account->fill_products)
			$('.datalist').on('input', function() {			
				var key = $(this).val();

				
				//console.log(chooser);
				console.log("sadfadfasf");
				console.log(products);

				for (var i=0; i<products.length; i++) {
					var product = products[i];
					newkey = key.toUpperCase();						
					if (product.product_key == newkey) {						

					item_actual = null;
					for (chooser = 0,index = 0; index < item_row.length; ++index) {
					    if(item_row[index].val()==key){
					    	if($(this)==item_row)
					    		console.log("repeted row");
					    	chooser++;
					    	item_actual=item_row[index];
					    }
					}
					console.log(key+" "+chooser);

					if(chooser<2){
						item_row.push($(this));
												var model = ko.dataFor(this);
						model.notes(product.notes);
						model.cost(accounting.formatMoney(product.cost, " ", 1, ",", "."));
						model.qty(1);	
					}
					else
					{
						$(this).val("");
						$(item_actual).focus();						
					}

							break;

						}
					}
				onItemChange();
				refreshPDF();
			});
		@endif

	}

	function onItemChange()
	{
		var hasEmpty = false;
		//console.log("these are the result gotten");
		//console.log(model.invoice().invoice_items());
		console.log("items of products");
		console.log(model.invoice().invoice_items().length);
		for(var i=0; i<model.invoice().invoice_items().length; i++) {
			var item = model.invoice().invoice_items()[i];			
			if (item.isEmpty()) {
				hasEmpty = true;
			}
		}		
		if (!hasEmpty) {
			model.invoice().addItem();
		}

		$('.word-wrap').each(function(index, input) {
			$(input).height($(input).val().split('\n').length * 20);
		});		
	}
	function createInvoiceModel() {
		var invoice = ko.toJS(model).invoice;		
		invoice.is_quote = {{ $entityType == ENTITY_QUOTE ? 'true' : 'false' }};
    	return invoice;
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
	function getPDFString() {
		var invoice = createInvoiceModel();
		var design  = getDesignJavascript();
		var doc = generatePDF(invoice, design, getLogoJavascript(), getLogoXJavascript(), getLogoYJavascript());
		return doc.output('datauristring');
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
		if (confirm('{{ trans("texts.confirm_save_email_$entityType") }}')) {		
			submitAction('email');
		}
	}
	function onEmailClick() {
		if (confirm('{{ trans("texts.confirm_email_$entityType") }}')) {		
			submitAction('email');
		}
	}

	function onsavepayClick() {
		if (confirm('{{ trans("texts.confirm_savepay_$entityType") }}')) {		
			submitAction('savepay');
		}
	}
	function onsavepaycreditClick() {
		if (confirm('{{ trans("texts.confirm_savepay_credit_$entityType") }}')) {		
			submitAction('savepaycredit');
		}
	}

	function onSaveClick() {		
		if (model.invoice().is_recurring()) {
			if (confirm('{{ trans("texts.confirm_recurring_email_$entityType") }}')) {		
				submitAction('');
			}			
		} else {
			submitAction('save');
		}
	}

	function submitAction(value) {
		$('#action').val(value);
		$('#submitButton').click();
		$("#saveButton").prop('disabled', true);	
	}

	function onConvertClick() {
		submitAction('convert');		
	}

	@if ($client && $invoice)
	function onPaymentClick() {
		window.location = '{{ URL::to('payments/create/' . $client->public_id . '/' . $invoice->public_id ) }}';
	}
	@endif


	function ContactModel(data) {
		var self = this;
		self.public_id = ko.observable('');
		self.first_name = ko.observable('');
		self.last_name = ko.observable('');
		self.email = ko.observable('');
		self.phone = ko.observable('');		
		self.send_invoice = ko.observable(false);
		self.invitation_link = ko.observable('');		

		self.email.display = ko.computed(function() {
			var str = '';
			if (self.email()) {
				if (self.first_name() || self.last_name()) {
				str += self.first_name() + ' ' + self.last_name() + ' - ';
				}
				str += self.email();

			}			
//if (Utils::isConfirmed())
			@if(true)
				if (self.invitation_link()) {
					str += '<br/><a href="' + self.invitation_link() + '" target="_blank">{{ trans('texts.view_as_recipient') }}</a>';
				}
			@endif
			
			return str;
		});		
		
		if (data) {
			ko.mapping.fromJS(data, {}, this);		
		}		
	}
	function ClientModel(data) {
		var self = this;
		self.public_id = ko.observable(0);
		self.nit = ko.observable('');
		self.business_name = ko.observable('');
        self.name = ko.observable('');
		self.contacts = ko.observableArray();

		self.mapping = {
	    	'contacts': {
	        	create: function(options) {
	            	return new ContactModel(options.data);
	        	}
	    	}
		}


		self.business_name.display = ko.computed(function() {
			if (self.name()) {
				return self.name();
			}
		});				
	
		self.business_name.placeholder = ko.computed(function() {
			if (self.business_name()) {
				return self.business_name();
			}
		});	

		self.nit.placeholder = ko.computed(function() {
			if (self.nit()) {
				return self.nit();
			}
			
		});	

		if (data) {
			ko.mapping.fromJS(data, {}, this);
		} 	
	}
	function roundToTwo(num, toString) {
 	 	var val = +(Math.round(num + "e+2")  + "e-2");
  		return toString ? val.toFixed(2) : val;
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
  	function TaxRateModel(data) {
		var self = this;
		self.public_id = ko.observable('');
		self.rate = ko.observable(0);
		self.name = ko.observable('');
		self.is_deleted = ko.observable(false);
		self.is_blank = ko.observable(false);
		self.actionsVisible = ko.observable(false);

		if (data) {
			ko.mapping.fromJS(data, {}, this);		
		}		

		this.prettyRate = ko.computed({
	        read: function () {
	            return this.rate() ? parseFloat(this.rate()) : '';
	        },
	        write: function (value) {
	            this.rate(value);
	        },
	        owner: this
	    });				


		self.displayName = ko.computed({
			read: function () {
				var name = self.name() ? self.name() : '';
				var rate = self.rate() ? parseFloat(self.rate()) + '% ' : '';
				return rate + name;
			},
	        write: function (value) {
	        },
	        owner: this			
		});	

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


	function invoiceModel(data){
		var self = this;
		this.client = ko.observable(data ? false : new ClientModel());
		self.account = {{ $account }};	
		self.branches = {{ $branches }};	
		this.id = ko.observable('');
		self.discount = ko.observable('');
		self.frequency_id = ko.observable('');
		self.terms = ko.observable('');
		self.public_notes = ko.observable('');	
		self.invoice_date = ko.observable('Jul 24, 2015');
		self.invoice_number = ko.observable('');
		self.due_date = ko.observable('');
		self.start_date = ko.observable('Jul 24, 2015');
		self.end_date = ko.observable('');
		self.tax_name = ko.observable();
		self.tax_rate = ko.observable();
		self.is_recurring = ko.observable(false);
		self.invoice_status_id = ko.observable(0);
		self.invoice_items = ko.observableArray();
		self.amount = ko.observable(0);
		self.balance = ko.observable(0);		
		self.branch_id = ko.observable('');
		self.custom_value1 = ko.observable(0);
		self.custom_value2 = ko.observable(0);
		self.custom_taxes1 = ko.observable(false);
		self.custom_taxes2 = ko.observable(false);
		self.discount_item = ko.observable(0);

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
			ko.mapping.fromJS(data, self.mapping, self);			
			self.is_recurring(parseInt(data.is_recurring));
		} else {
			self.addItem();
		}
		

		self._tax = ko.observable();
		this.tax = ko.computed({
			read: function () {
				return self._tax();
			},
			write: function(value) {
				if (value) {
					self._tax(value);								
					self.tax_name(value.name());
					self.tax_rate(value.rate());
				} else {
					self._tax(false);								
					self.tax_name('');
					self.tax_rate(0);
				}
			}
		})

		self.wrapped_terms = ko.computed({
			read: function() {
				$('#terms').height(this.terms().split('\n').length * 30);
				return this.terms();
			},
			write: function(value) {
				value = wordWrapText(value, 300);
				self.terms(value);
				$('#terms').height(value.split('\n').length * 30);
			},
			owner: this
		});


		self.wrapped_notes = ko.computed({
			read: function() {
				$('#public_notes').height(this.public_notes().split('\n').length * 30);
				return this.public_notes();
			},
			write: function(value) {
				value = wordWrapText(value, 300);
				self.public_notes(value);
				$('#public_notes').height(value.split('\n').length * 30);
			},
			owner: this
		});


		self.removeItem = function(item) {
			self.invoice_items.remove(item);
			refreshPDF();
		}


		this.totals = ko.observable();

		this.totals.rawSubtotal = ko.computed(function() {
		    var total = 0;
		    console.log(self.invoice_items);
		    for(var p=0; p < self.invoice_items().length; ++p) {
		    	var item = self.invoice_items()[p];
	        total += item.totals.rawTotal();
		    }
		    return total;
		});

		this.totals.subtotal = ko.computed(function() {			
		    var total = self.totals.rawSubtotal();
		    return total > 0 ? formatMoney(total, 1) : '';
		});
		
		this.totals.discSubtotal = ko.computed(function() {
		    var total = 0;
		    for(var p=0; p < self.invoice_items().length; ++p) {
		    	var item = self.invoice_items()[p];
	        total += item.totals.discTotal();
		    }
		    return total;
		});

		this.totals.rawDiscounted = ko.computed(function() {
			return roundToTwo(self.totals.rawSubtotal() * (self.discount()/100));			
		});


		this.discount_item = ko.computed(function() {
			return formatMoney(self.totals.discSubtotal(), 1);
		});

		this.totals.rawDiscountedFinal = ko.computed(function() {
			var a = self.totals.rawDiscounted();
			var b = self.totals.discSubtotal();
			//var c = NINJA.parseFloat(a) + NINJA.parseFloat(b);
			var c = parseFloat(a) + parseFloat(b);

			return roundToTwo(c);			
		});

		this.discountotal = ko.computed(function() {
			return self.totals.rawDiscountedFinal();
		});

		this.totals.discounted = ko.computed(function() {
			return formatMoney(self.totals.rawDiscountedFinal(), 1);
		});

		self.totals.taxAmount = ko.computed(function() {
	    var total = self.totals.rawSubtotal();

	    var discount = parseFloat(self.discount());
	    if (discount > 0) {
	    	total = roundToTwo(total * ((100 - discount)/100));
	    }

	    var customValue1 = roundToTwo(self.custom_value1());
	    var customValue2 = roundToTwo(self.custom_value2());
	    var customTaxes1 = self.custom_taxes1() == 1;
	    var customTaxes2 = self.custom_taxes2() == 1;
	    
	    if (customValue1 && customTaxes1) {
	    	///total = NINJA.parseFloat(total) + customValue1;
	    	total = parseFloat(total) + customValue1;
	    }
	    if (customValue2 && customTaxes2) {
	    	//total = NINJA.parseFloat(total) + customValue2;
	    	total = parseFloat(total) + customValue2;
	    }

			var taxRate = parseFloat(self.tax_rate());
			if (taxRate > 0) {
				var tax = roundToTwo(total * (taxRate/100));			
        		return formatMoney(tax, 1);
        	} else {
        		return formatMoney(0);
        	}
    	});

		this.totals.rawPaidToDate = ko.computed(function() {
			return accounting.toFixed(self.amount(),1) - accounting.toFixed(self.balance(),1);
		});

		this.totals.paidToDate = ko.computed(function() {
			var total = self.totals.rawPaidToDate();
		    return total > 0 ? formatMoney(total, 1) : '';			
		});

		this.totals.total = ko.computed(function() {
	    var total = accounting.toFixed(self.totals.rawSubtotal(),1);	    

	    var discount = parseFloat(self.discount());

	    var discount_item = parseFloat(self.totals.discSubtotal());

	    if (discount > 0) {
	    	total = roundToTwo(total * ((100 - discount)/100));
	    }

	    if (discount_item > 0) {
	    	total = roundToTwo(total - discount_item);
	    }

	    var customValue1 = roundToTwo(self.custom_value1());
	    var customValue2 = roundToTwo(self.custom_value2());
	    var customTaxes1 = self.custom_taxes1() == 1;
	    var customTaxes2 = self.custom_taxes2() == 1;
	    
	    if (customValue1 && customTaxes1) {
	    	total = NINJA.parseFloat(total) + customValue1;
	    }
	    if (customValue2 && customTaxes2) {
	    	//total = NINJA.parseFloat(total) + customValue2;
	    	total = parseFloat(total) + customValue2;

	    }

			var taxRate = parseFloat(self.tax_rate());
			if (taxRate > 0) {
    		//total = NINJA.parseFloat(total) + roundToTwo((total * (taxRate/100)));
    		total = parseFloat(total) + roundToTwo((total * (taxRate/100)));
    	}        	

	    if (customValue1 && !customTaxes1) {
	    	//total = NINJA.parseFloat(total) + customValue1;
	    	total = parseFloat(total) + customValue1;
	    }
	    if (customValue2 && !customTaxes2) {
	    	//total = NINJA.parseFloat(total) + customValue2;
	    	total = parseFloat(total) + customValue2;
	    }
	    
    	var paid = self.totals.rawPaidToDate();
    	if (paid > 0) {
    		total -= paid;
    	}

	    return total != 0 ? formatMoney(total, 1) : '';
	  	});

	  	self.onDragged = function(item) {
	  		refreshPDF();
	  	}	

	}
	function ItemModel(data) {		
		var self = this;		
		this.product_key = ko.observable('');
		this.notes = ko.observable('');
		this.cost = ko.observable(0);
		this.disc = ko.observable(0);
		this.qty = ko.observable(0);
		self.tax_name = ko.observable('');
		self.tax_rate = ko.observable(0);
		this.actionsVisible = ko.observable(false);
		
		self._tax = ko.observable();
		this.tax = ko.computed({
			read: function () {
				return self._tax();
			},
			write: function(value) {				
				self._tax(value);								
				self.tax_name(value.name());
				self.tax_rate(value.rate());
			}
		})

		this.prettyQty = ko.computed({
	        read: function () {	        				
	           //return NINJA.parseFloat(this.qty()) ? NINJA.parseFloat(this.qty()) : '';
	           return parseFloat(this.qty()) ? parseFloat(this.qty()) : '';
	        },
	        write: function (value) {
	            this.qty(value);
	        },
	        owner: this
	    });				

		this.prettyCost = ko.computed({
	        read: function () {
	            return this.cost() ? this.cost() : '';
	        },
	        write: function (value) {
	            this.cost(value);
	        },
	        owner: this
	    });	

	    this.prettyDisc = ko.computed({
	        read: function () {
	            return this.disc() ? this.disc() : '';
	        },
	        write: function (value) {
	            this.disc(value);
	        },
	        owner: this
	    });				

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

		self.wrapped_notes = ko.computed({
			read: function() {
				return this.notes();
			},
			write: function(value) {
				value = wordWrapText(value, 250);
				self.notes(value);
				onItemChange();				
			},
			owner: this
		});

		this.totals = ko.observable();

		this.totals.discTotal = ko.computed(function() {
			/*var cost = NINJA.parseFloat(self.cost());
			var qty = NINJA.parseFloat(self.qty());
			var disc = NINJA.parseFloat(self.disc());*/
			var cost = parseFloat(self.cost());
			var qty = parseFloat(self.qty());
			var disc = parseFloat(self.disc());
    		var value = 0;  
	    	if (disc > 0) {
    			value = cost * qty * (disc/100);
	    	}    	 

  	  	return value ? roundToTwo(value) : '';
  		});


		this.totals.rawTotal = ko.computed(function() {
			/*var cost = NINJA.parseFloat(self.cost());
			var qty = NINJA.parseFloat(self.qty());
			var taxRate = NINJA.parseFloat(self.tax_rate());*/
			var cost = parseFloat(self.cost());
			var qty = parseFloat(self.qty());
			var taxRate = parseFloat(self.tax_rate());

    		var value = cost * qty;  
    	
    	if (taxRate > 0) {
    		value += value * (taxRate/100);
    	}    	
    	return value ? roundToTwo(value) : '';
  		});		

		this.totals.total = ko.computed(function() {
			var total = self.totals.rawTotal();
			if (window.hasOwnProperty('model') && model.invoice && model.invoice() && model.invoice().client()) {
				return total ? formatMoney(total, 1) : '';
			} else {
				return total ? formatMoney(total, 1) : '';
			}
  		});

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
	//invoiceModel();
	function ViewModel(data) {
		var self = this;		
		self.invoice = ko.observable(data ? false : new invoiceModel());
		self.tax_rates = ko.observableArray();

		self.loadClient = function(client) {
			ko.mapping.fromJS(client, model.invoice().client().mapping, model.invoice().client);
		}

		self.invoice_item_taxes = ko.observable(false);
		self.invoice_item_discount = ko.observable(false);

		self.invoice_item_discount2 = ko.observable(true);

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


		self.invoice_item_discount.show = ko.computed(function() {
			if (self.invoice_item_discount()) {

				self.invoice_item_discount2(false);
				return true;
			}
			self.invoice_item_discount2(true);
			return false;
		});


		self.invoice_item_taxes.show = ko.computed(function() {
			if (self.tax_rates().length > 2 && self.invoice_item_taxes()) {
				return true;
			}
			for (var i=0; i<self.invoice().invoice_items().length; i++) {
				var item = self.invoice().invoice_items()[i];
				if (item.tax_rate() > 0) {
					return true;
				}
			}
			return false;
		});

		self.tax_rates.filtered = ko.computed(function() {
			var i = 0;
			for (i; i<self.tax_rates().length; i++) {
				var taxRate = self.tax_rates()[i];
				if (taxRate.isEmpty()) {
					break;
				}
			}

			var rates = self.tax_rates().concat();
			rates.splice(i, 1);
			return rates;
		});
		

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
			self.clientBackup = ko.mapping.toJS(self.invoice().client);

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

    	self.emailtittle = ko.computed(function() {
			if (self.invoice().client().public_id())
			{
				var client = self.invoice().client();
				for (var i=0; i<client.contacts().length; i++) {
					var contact = client.contacts()[i];        		
					if (contact.email()) {
						return "Enviar a";
					} 
				}
			}
			else
			{
				return "";
			}
    	});

    	self.clientLinkTextEdit = ko.computed(function() {
			if (self.invoice().client().public_id())
			{
				return "(Editar)";
			}
			else
			{
				return "";
			}
    	});

		self.clientLinkTextNit = ko.computed(function() {
			if (self.invoice().client().public_id())
			{
				return "NIT";
			}
			else
			{
				return "";
			}
    	});

    	self.clientLinkTextRz = ko.computed(function() {
			if (self.invoice().client().public_id())
			{
				return "Razón Social";
			}
			else
			{
				return "";
			}
    	});

		self.clientLinkText = ko.computed(function() {
			if (self.invoice().client().public_id())
			{

				var datos= self.invoice().client().nit();
				return datos;
			}
			else
			{
				return "";
			}
    	});

    	self.clientLinkTextrz = ko.computed(function() {
			if (self.invoice().client().public_id())
			{

				var datos= self.invoice().client().business_name();
				return datos;
			}
			else
			{
				return "";
			}
    	});
	}


	var products = {{ $products }};	
	console.log(products);
	var clients = {{ $clients }};	
	console.log("this are the clientes");
	var client_name = [];
	for (var i=0; i<clients.length; i++) {					
		client_name [i] = clients[i]['business_name'];					
	}
	//console.log("this is client");
	console.log(client_name);
	var clientMap = {};
	var $clientSelect = $('select#client');
	var invoiceDesigns = {{ $invoiceDesigns }};

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

	@if ($data)
		window.model = new ViewModel({{ $data }});				
	@else 
		window.model = new ViewModel();
		console.log("adsfasdf");
	console.log(model);
		model.addTaxRate();
		@foreach ($taxRates as $taxRate)
			model.addTaxRate({{ $taxRate }});
		@endforeach
		@if ($invoice)
			var invoice = {{ $invoice }};
			ko.mapping.fromJS(invoice, model.invoice().mapping, model.invoice);			
			if (model.invoice().is_recurring() === '0') {
				model.invoice().is_recurring(false);
			}
			var invitationContactIds = {{ json_encode($invitationContactIds) }};		
			var client = clientMap[invoice.client.public_id];
			if (client) { 
				for (var i=0; i<client.contacts.length; i++) {
					var contact = client.contacts[i];
					contact.send_invoice = invitationContactIds.indexOf(contact.public_id) >= 0;
				}			
			}
			model.invoice().addItem();			

		@endif
	@endif
	model.invoice().tax(model.getTaxRate(model.invoice().tax_name(), model.invoice().tax_rate()));			
	for (var i=0; i<model.invoice().invoice_items().length; i++) {
		var item = model.invoice().invoice_items()[i];
		item.tax(model.getTaxRate(item.tax_name(), item.tax_rate()));
		//item.cost(NINJA.parseFloat(item.cost()) > 0 ? roundToTwo(item.cost(), true) : '');
		item.cost(parseFloat(item.cost()) > 0 ? roundToTwo(item.cost(), true) : '');
	}

	if (!model.invoice().discount()) model.invoice().discount('');
	ko.applyBindings(model);	
	onItemChange();
	refreshPDF();
	function cleanField(val){
		console.log(val);
		$(val).select();
	}

	$('#client').click(function(){
    console.log("Sale de campo NIT");
    /* console.log('{{ URL::to('validacion') }}');
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
    });*/
  });


var states2 = ['Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California',
  'Colorado', 'Connecticut', 'Delaware', 'Florida', 'Georgia', 'Hawaii',
  'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana',
  'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota',
  'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire',
  'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota',
  'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island',
  'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont',
  'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming'
];

var states = client_name;



var states2 = new Bloodhound({
  datumTokenizer: Bloodhound.tokenizers.whitespace,
  queryTokenizer: Bloodhound.tokenizers.whitespace,
  // `states` is an array of state names defined in "The Basics"
  local: states2
});

$('#itemtype .typeahead').typeahead({
  hint: true,
  highlight: true,
  minLength: 1
},
{
  name: 'states2',
  source: states2
});

//console.log(states);
// constructs the suggestion engine




//var = "hola";
function changeArray(datapassed)
{
//	console.log(hola);
console.log(datapassed);

$('.typeahead').typeahead('destroy');
var states = ['Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California',
  'Colorado', 'Connecticut', 'Delaware', 'Florida', 'Georgia', 'Hawaii',
  'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana',
  'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota',
  'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire',
  'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota',
  'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island',
  'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont',
  'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming'
];


  //$("select#client").click(function(){
    //console.log("Sale de campo NIT");
    // console.log('{{ URL::to('validacion') }}');
    $.ajax({     
      type: 'POST',
      url:'{{ URL::to('getclients') }}',
      data: 'name='+datapassed,
      beforeSend: function(){
        console.log("Inicia ajax");
      },
      success: function(result)
      {
        console.log(result);

        //$("#nit").val(result);    
      }
    });
    var client_name = [];
	for (var i=0; i<clients.length; i++) {					
		client_name [i] = clients[i]['name'];					
	}
	states = client_name;
  //});

//console.log(states);
// constructs the suggestion engine
var states = new Bloodhound({
  datumTokenizer: Bloodhound.tokenizers.whitespace,
  queryTokenizer: Bloodhound.tokenizers.whitespace,
  // `states` is an array of state names defined in "The Basics"
  local: states
});

$('#bloodhound .typeahead').typeahead({
  hint: true,
  highlight: true,
  minLength: 3
},
{
  name: 'states',
  source: states
});
$('#client').focus(); 
}



	</script>
@stop