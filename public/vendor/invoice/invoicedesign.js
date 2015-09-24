

var invoiceOld;
function generatePDF(invoice, javascript, logo, x, y, force) {

  invoice = calculateAmounts(invoice);  
  var a = copyInvoice(invoice);
  var b = copyInvoice(invoiceOld);
  if (!force && _.isEqual(a, b)) {
    return;
  }
  invoiceOld = invoice;//logo=null;

  doc = GetPdf(invoice, javascript, logo, x, y);
 
  return doc;
}

function copyInvoice(orig) {
  if (!orig) return false;
  var copy = JSON.stringify(orig);
  var copy = JSON.parse(copy);
  return copy;
}


function GetPdf(invoice, javascript, logo, x, y){
  var layout = {
    accountTop: 40,

    marginLeft: 30,
    marginRight: 586,
    headerTop: 60,

    headerLeft: 360,
    headerRight: 555,
    rowHeight: 15,

    tableRowHeight: 6,
    footerLeft: 420,
    tablePadding: 8,
    tableTop: 190,

    descriptionLeft: 162,
    unitCostRight: 410,
    qtyRight: 480,
    taxRight: 480,
    lineTotalRight: 550
  };

  if (invoice.has_taxes)
  {
    layout.descriptionLeft -= 20;
    layout.unitCostRight -= 40;
    layout.qtyRight -= 40;
  }  
  invoice.status = 1;

 	if (!invoice.branch_name)
  	{
		var account = invoice.account;
		var branch = invoice.branches[0];
		var client = invoice.client;


  		invoice.account_name = account.name;
  		invoice.account_nit = account.nit;
  		invoice.account_uniper = account.uniper;
	    invoice.client_name = client.name;
	    invoice.client_nit = client.nit;

		invoice.branch_name = branch.name;
		//invoice.branch_type_id = branch.branch_type_id;
	    invoice.address2 = branch.address2;
	    invoice.address1 = branch.address1;
	    invoice.phone = branch.work_phone;
	    invoice.city = branch.city;
	    invoice.state = branch.state;
	    invoice.number_autho = branch.number_autho;
	    invoice.deadline = branch.deadline;
	    invoice.economic_activity = branch.economic_activity;
		invoice.type_third = branch.type_third;
	    invoice.invoice_number = '0';
	    invoice.control_code = '00-00-00-00';
	    invoice.status = 0;
  	}


  /*
   @param orientation One of "portrait" or "landscape" (or shortcuts "p" (Default), "l")
   @param unit Measurement unit to be used when coordinates are specified. One of "pt" (points), "mm" (Default), "cm", "in"
   @param format One of 'a3', 'a4' (Default),'a5' ,'letter' ,'legal'
   @returns {jsPDF}
   */
  
  var doc = new jsPDF('portrait', 'pt', 'letter');

  //doc.getStringUnitWidth = function(param) { console.log('getStringUnitWidth: %s', param); return 0};

  //Set PDF properities
  doc.setProperties({
      title: 'Factura ' + invoice.invoice_number,
      subject: '',
      author: 'facturavirtual.com',
      keywords: 'pdf, factura',
      creator: 'facturavirtual.com'
  });

  //set default style for report
  doc.setFont('Helvetica','');

if(invoice['logo'])
  	eval("doc.addImage('" + invoice['logo'] + "', 'JPEG', " + 15+ ", " + (y-8) + ", "+120+", "+80+");"); 



	

displaytittle(doc, invoice, layout);

displayHeader(doc, invoice, layout);

doc.setFontSize(11);
doc.setFontType('normal');

var activi = invoice.economic_activity;
var activityX = 565 - (doc.getStringUnitWidth(activi) * doc.internal.getFontSize());
doc.setFontType('bold');
doc.text(activityX-69, layout.headerTop+45, "Actividad Económica: ");
doc.text(activityX-100, layout.headerTop+60, activi);

var literal_date = getInvoiceDate(invoice.invoice_date);

layout.headerTop = 50;
layout.tableTop = 190;
doc.setLineWidth(0.8);  
doc.setFillColor(255, 255, 255);
doc.roundedRect(layout.marginLeft - layout.tablePadding, layout.headerTop+95, 572, 35, 2, 2, 'FD');

var marginLeft1=30;
var marginLeft2=80;
var marginLeft3=180;
var marginLeft4=220;

datos1y = 160;
datos1xy = 15;
doc.setFontSize(11);
doc.setFontType('bold');
doc.text(marginLeft1, datos1y, 'Fecha : ');
doc.setFontType('normal');

doc.text(marginLeft2-5, datos1y,  literal_date);

doc.setFontType('bold');
doc.text(marginLeft1, datos1y+datos1xy, 'Señor(es) :');
doc.setFontType('normal');
doc.text(marginLeft2+15, datos1y+datos1xy, invoice.client_name);

doc.setFontType('bold');
doc.text(marginLeft3+240, datos1y+datos1xy, 'NIT/CI :');
doc.setFontType('normal');
doc.text(marginLeft4+245, datos1y+datos1xy, invoice.client_nit);

doc.setDrawColor(241,241,241);
doc.setFillColor(241,241,241);
doc.rect(layout.marginLeft - layout.tablePadding, layout.headerTop+140, 572, 20, 'FD');

doc.setFontSize(10);
doc.setFontType('bold');

	
    displayInvoiceHeader(doc, invoice, layout);
	var y = displayInvoiceItems(doc, invoice, layout);
	displayQR(doc, layout, invoice, y);
	y += displaySubtotals(doc, layout, invoice, y+15, layout.unitCostRight+35);


y -=10;		
displayNotesAndTerms(doc, layout, invoice, y);


  //eval(javascript);

  return doc;
}


function SetPdfColor(color, doc, role)
{
/*
  if (role === 'primary' && NINJA.primaryColor) {
    return setDocHexColor(doc, NINJA.primaryColor);
  } else if (role === 'secondary' && NINJA.secondaryColor) {
    return setDocHexColor(doc, NINJA.secondaryColor);
  }*/

  if (color=='LightBlue') {
      return doc.setTextColor(41,156, 194);
  }

  if (color=='Black') {
      return doc.setTextColor(46,43,43);//select color black
  }
  if (color=='GrayLogo') {
      return doc.setTextColor(207,241, 241);//select color Custom Report GRAY
  }

  if (color=='GrayBackground') {
      return doc.setTextColor(251,251, 251);//select color Custom Report GRAY
  }

  if (color=='GrayText') {
      return doc.setTextColor(161,160,160);//select color Custom Report GRAY Colour
  }

  if (color=='White') {
      return doc.setTextColor(255,255,255);//select color Custom Report GRAY Colour
  }

  if (color=='SomeGreen') {
      return doc.setTextColor(54,164,152);//select color Custom Report GRAY Colour
  }

  if (color=='LightGrayReport2-gray') {
      return doc.setTextColor(240,240,240);//select color Custom Report GRAY Colour
  }

  if (color=='LightGrayReport2-white') {
      return doc.setTextColor(251,251,251);//select color Custom Report GRAY Colour
  }

  if (color=='orange') {
      return doc.setTextColor(234,121,45);//select color Custom Report GRAY Colour
  }

  if (color=='Green') {
      return doc.setTextColor(55,109,69);
  }
}


/* Handle converting variables in the invoices (ie, MONTH+1) */
function processVariables(str) {
  if (!str) return '';
  var variables = ['MONTH','QUARTER','YEAR'];
  for (var i=0; i<variables.length; i++) {
    var variable = variables[i];        
        var regexp = new RegExp(':' + variable + '[+-]?[\\d]*', 'g');
        var matches = str.match(regexp);        
        if (!matches) {
             continue;  
        }
        for (var j=0; j<matches.length; j++) {
            var match = matches[j];
            var offset = 0;                
            if (match.split('+').length > 1) {
                offset = match.split('+')[1];
            } else if (match.split('-').length > 1) {
                offset = parseInt(match.split('-')[1]) * -1;
            }
            str = str.replace(match, getDatePart(variable, offset));            
        }
  }   
  
  return str;
}

function getDatePart(part, offset) {
    offset = parseInt(offset);
    if (!offset) {
        offset = 0;
    }
  if (part == 'MONTH') {
    return getMonth(offset);
  } else if (part == 'QUARTER') {
    return getQuarter(offset);
  } else if (part == 'YEAR') {
    return getYear(offset);
  }
}

function getMonth(offset) {
  var today = new Date();
  var months = [ "January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December" ];
  var month = today.getMonth();
    month = parseInt(month) + offset;    
    month = month % 12;
    if (month < 0) {
      month += 12;
    }
    return months[month];
}

function getYear(offset) {
  var today = new Date();
  var year = today.getFullYear();
  return parseInt(year) + offset;
}

function getQuarter(offset) {
  var today = new Date();
  var quarter = Math.floor((today.getMonth() + 3) / 3);
  quarter += offset;
    quarter = quarter % 4;
    if (quarter == 0) {
         quarter = 4;   
    }
    return 'Q' + quarter;
}


/* Default class modification */
if ($.fn.dataTableExt) {
  $.extend( $.fn.dataTableExt.oStdClasses, {
    "sWrapper": "dataTables_wrapper form-inline"
  } );


  /* API method to get paging information */
  $.fn.dataTableExt.oApi.fnPagingInfo = function ( oSettings )
  {
    return {
      "iStart":         oSettings._iDisplayStart,
      "iEnd":           oSettings.fnDisplayEnd(),
      "iLength":        oSettings._iDisplayLength,
      "iTotal":         oSettings.fnRecordsTotal(),
      "iFilteredTotal": oSettings.fnRecordsDisplay(),
      "iPage":          oSettings._iDisplayLength === -1 ?
        0 : Math.ceil( oSettings._iDisplayStart / oSettings._iDisplayLength ),
      "iTotalPages":    oSettings._iDisplayLength === -1 ?
        0 : Math.ceil( oSettings.fnRecordsDisplay() / oSettings._iDisplayLength )
    };
  };


  /* Bootstrap style pagination control */
  $.extend( $.fn.dataTableExt.oPagination, {
    "bootstrap": {
      "fnInit": function( oSettings, nPaging, fnDraw ) {
        var oLang = oSettings.oLanguage.oPaginate;
        var fnClickHandler = function ( e ) {
          e.preventDefault();
          if ( oSettings.oApi._fnPageChange(oSettings, e.data.action) ) {
            fnDraw( oSettings );
          }
        };

        $(nPaging).addClass('pagination').append(
          '<ul class="pagination">'+
            '<li class="prev disabled"><a href="#">&laquo;</a></li>'+
            '<li class="next disabled"><a href="#">&raquo;</a></li>'+
          '</ul>'
        );
        var els = $('a', nPaging);
        $(els[0]).bind( 'click.DT', { action: "previous" }, fnClickHandler );
        $(els[1]).bind( 'click.DT', { action: "next" }, fnClickHandler );
      },

      "fnUpdate": function ( oSettings, fnDraw ) {
        var iListLength = 5;
        var oPaging = oSettings.oInstance.fnPagingInfo();
        var an = oSettings.aanFeatures.p;
        var i, ien, j, sClass, iStart, iEnd, iHalf=Math.floor(iListLength/2);

        if ( oPaging.iTotalPages < iListLength) {
          iStart = 1;
          iEnd = oPaging.iTotalPages;
        }
        else if ( oPaging.iPage <= iHalf ) {
          iStart = 1;
          iEnd = iListLength;
        } else if ( oPaging.iPage >= (oPaging.iTotalPages-iHalf) ) {
          iStart = oPaging.iTotalPages - iListLength + 1;
          iEnd = oPaging.iTotalPages;
        } else {
          iStart = oPaging.iPage - iHalf + 1;
          iEnd = iStart + iListLength - 1;
        }

        for ( i=0, ien=an.length ; i<ien ; i++ ) {
          // Remove the middle elements
          $('li:gt(0)', an[i]).filter(':not(:last)').remove();

          // Add the new list items and their event handlers
          for ( j=iStart ; j<=iEnd ; j++ ) {
            sClass = (j==oPaging.iPage+1) ? 'class="active"' : '';
            $('<li '+sClass+'><a href="#">'+j+'</a></li>')
              .insertBefore( $('li:last', an[i])[0] )
              .bind('click', function (e) {
                e.preventDefault();
                oSettings._iDisplayStart = (parseInt($('a', this).text(),10)-1) * oPaging.iLength;
                fnDraw( oSettings );
              } );
          }

          // Add / remove disabled classes from the static elements
          if ( oPaging.iPage === 0 ) {
            $('li:first', an[i]).addClass('disabled');
          } else {
            $('li:first', an[i]).removeClass('disabled');
          }

          if ( oPaging.iPage === oPaging.iTotalPages-1 || oPaging.iTotalPages === 0 ) {
            $('li:last', an[i]).addClass('disabled');
          } else {
            $('li:last', an[i]).removeClass('disabled');
          }
        }
      }
    }
  } );
}


/*
$(document).ready(function() {
  $('#example').dataTable( {
    "sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
    "sPaginationType": "bootstrap",
    "oLanguage": {
      "sLengthMenu": "_MENU_ records per page"
    }
  } );
} );
*/

function isStorageSupported() {
  try {
      return 'localStorage' in window && window['localStorage'] !== null;
  } catch (e) {
      return false;
  }
}

function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
    return pattern.test(emailAddress);
};

$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        }
    });
});


function enableHoverClick($combobox, $entityId, url) {
  /*
  $combobox.mouseleave(function() {
    $combobox.css('text-decoration','none');
  }).on('mouseenter', function(e) {
    setAsLink($combobox, $combobox.closest('.combobox-container').hasClass('combobox-selected'));
  }).on('focusout mouseleave', function(e) {
    setAsLink($combobox, false);
  }).on('click', function() {
    var clientId = $entityId.val();
    if ($(combobox).closest('.combobox-container').hasClass('combobox-selected')) {       
      if (parseInt(clientId) > 0) {
        window.open(url + '/' + clientId, '_blank');
      } else {
        $('#myModal').modal('show');
      }
    };
  });
  */
}

function setAsLink($input, enable) {
  if (enable) {
    $input.css('text-decoration','underline');
    $input.css('cursor','pointer'); 
  } else {
    $input.css('text-decoration','none');
    $input.css('cursor','text');  
  }
}

function setComboboxValue($combobox, id, name) {
  $combobox.find('input').val(id);
  $combobox.find('input.form-control').val(name);
  if (id && name) {
    $combobox.find('select').combobox('setSelected');
    $combobox.find('.combobox-container').addClass('combobox-selected');
  } else {
    $combobox.find('.combobox-container').removeClass('combobox-selected');
  }
}


var BASE64_MARKER = ';base64,';
function convertDataURIToBinary(dataURI) {
  var base64Index = dataURI.indexOf(BASE64_MARKER) + BASE64_MARKER.length;
  var base64 = dataURI.substring(base64Index);
  return base64DecToArr(base64);
}

if (window.ko) {
  ko.bindingHandlers.dropdown = {
      init: function (element, valueAccessor, allBindingsAccessor) {
         var options = allBindingsAccessor().dropdownOptions|| {};
         var value = ko.utils.unwrapObservable(valueAccessor());
         var id = (value && value.public_id) ? value.public_id() : (value && value.id) ? value.id() : value ? value : false;
         if (id) $(element).val(id);
         //console.log("combo-init: %s", id);
         $(element).combobox(options);       

         /*
          ko.utils.registerEventHandler(element, "change", function () {
            console.log("change: %s", $(element).val());          
            //var  
            valueAccessor($(element).val());
              //$(element).combobox('refresh');
          });
          */
      },
      update: function (element, valueAccessor) {     
        var value = ko.utils.unwrapObservable(valueAccessor());
        var id = (value && value.public_id) ? value.public_id() : (value && value.id) ? value.id() : value ? value : false;
          //console.log("combo-update: %s", id);
        if (id) { 
          $(element).val(id);       
          $(element).combobox('refresh');
        } else {
          $(element).combobox('clearTarget');       
          $(element).combobox('clearElement');        
        }       
      }    
  };


  ko.bindingHandlers.datePicker = {
      init: function (element, valueAccessor, allBindingsAccessor) {
         var value = ko.utils.unwrapObservable(valueAccessor());       
         if (value) $(element).datepicker('update', value);
         $(element).change(function() { 
            var value = valueAccessor();
            value($(element).val());
         })
      },
      update: function (element, valueAccessor) {     
         var value = ko.utils.unwrapObservable(valueAccessor());
         if (value) $(element).datepicker('update', value);
      }    
  };
}

function wordWrapText(value, width)
{
  var doc = new jsPDF('p', 'pt');
  doc.setFont('Helvetica','');
  doc.setFontSize(10);

  var lines = value.split("\n");
  for (var i = 0; i < lines.length; i++) {
    var numLines = doc.splitTextToSize(lines[i], width).length;
    if (numLines <= 1) continue;
    var j = 0; space = lines[i].length;
    while (j++ < lines[i].length) {
      if (lines[i].charAt(j) === ' ') space = j;
    }
    if (space == lines[i].length) space = width/6;    
    lines[i + 1] = lines[i].substring(space + 1) + ' ' + (lines[i + 1] || '');
    lines[i] = lines[i].substring(0, space);
  }
  
  var newValue = (lines.join("\n")).trim();

  if (value == newValue) {
    return newValue;
  } else {
    return wordWrapText(newValue, width);
  }
}

function getClientDisplayName(client)
{
  var contact = client.contacts ? client.contacts[0] : false;
  if (client.name) {
    return client.name;
  } else if (contact) {
    if (contact.first_name || contact.last_name) {
      return contact.first_name + ' ' + contact.last_name;
    } else {
      return contact.email;
    }
  }
  return '';
}

function populateInvoiceComboboxes(clientId, invoiceId) {
  var clientMap = {};
  var invoiceMap = {};
  var invoicesForClientMap = {};
  var $clientSelect = $('select#client');   
  
  for (var i=0; i<invoices.length; i++) {
    var invoice = invoices[i];
    var client = invoice.client;      

    if (!invoicesForClientMap.hasOwnProperty(client.public_id)) {
      invoicesForClientMap[client.public_id] = [];        
    }

    invoicesForClientMap[client.public_id].push(invoice);
    invoiceMap[invoice.public_id] = invoice;
  }

  for (var i=0; i<clients.length; i++) {
    var client = clients[i];
    clientMap[client.public_id] = client;
  }

  $clientSelect.append(new Option('', '')); 
  for (var i=0; i<clients.length; i++) {
    var client = clients[i];
    $clientSelect.append(new Option(getClientDisplayName(client), client.public_id));
  } 

  if (clientId) {
    $clientSelect.val(clientId);
  }

  $clientSelect.combobox();
  $clientSelect.on('change', function(e) {            
    var clientId = $('input[name=client]').val();
    var invoiceId = $('input[name=invoice]').val();           
    var invoice = invoiceMap[invoiceId];
    if (invoice && invoice.client.public_id == clientId) {
      e.preventDefault();
      return;
    }
    setComboboxValue($('.invoice-select'), '', '');       
    $invoiceCombobox = $('select#invoice');
    $invoiceCombobox.find('option').remove().end().combobox('refresh');     
    $invoiceCombobox.append(new Option('', ''));
    var list = clientId ? (invoicesForClientMap.hasOwnProperty(clientId) ? invoicesForClientMap[clientId] : []) : invoices;
    for (var i=0; i<list.length; i++) {
      var invoice = list[i];
      var client = clientMap[invoice.client.public_id];
      if (!client) continue; // client is deleted/archived
      $invoiceCombobox.append(new Option(invoice.invoice_number + ' - ' + invoice.invoice_status.name + ' - ' +
                getClientDisplayName(client) + ' - ' + formatMoney(invoice.amount, invoice.currency_id) + ' | ' +
                formatMoney(invoice.balance, invoice.currency_id),  invoice.public_id));
    }
    $('select#invoice').combobox('refresh');
  });

  var $invoiceSelect = $('select#invoice').on('change', function(e) {     
    $clientCombobox = $('select#client');
    var invoiceId = $('input[name=invoice]').val();           
    if (invoiceId) {
      var invoice = invoiceMap[invoiceId];        
      var client = clientMap[invoice.client.public_id];
      setComboboxValue($('.client-select'), client.public_id, getClientDisplayName(client));
      if (!parseFloat($('#amount').val())) {
        $('#amount').val(parseFloat(invoice.balance).toFixed(2));
      }
    }
  });

  $invoiceSelect.combobox();  

  if (invoiceId) {
    var invoice = invoiceMap[invoiceId];
    var client = clientMap[invoice.client.public_id];
    setComboboxValue($('.invoice-select'), invoice.public_id, (invoice.invoice_number + ' - ' +
            invoice.invoice_status.name + ' - ' + getClientDisplayName(client) + ' - ' +
            formatMoney(invoice.amount, invoice.currency_id) + ' | ' + formatMoney(invoice.balance, invoice.currency_id)));
    $invoiceSelect.trigger('change');
  } else if (clientId) {
    var client = clientMap[clientId];
    setComboboxValue($('.client-select'), client.public_id, getClientDisplayName(client));
    $clientSelect.trigger('change');
  } else {
    $clientSelect.trigger('change');
  } 
}


var CONSTS = {};
CONSTS.INVOICE_STATUS_DRAFT = 1;
CONSTS.INVOICE_STATUS_SENT = 2;
CONSTS.INVOICE_STATUS_VIEWED = 3;
CONSTS.INVOICE_STATUS_PARTIAL = 4;
CONSTS.INVOICE_STATUS_PAID = 5;
var qrinside;

$.fn.datepicker.defaults.autoclose = true;
$.fn.datepicker.defaults.todayHighlight = true;

function displayInvoice(doc, invoice, x, y, layout, rightAlignX) {
  if (!invoice) {
    return;
  }

  var data = getInvoiceDetails(invoice);
  var options = {
    hasheader: true,
    rightAlignX: rightAlignX,
  };

  return displayGrid(doc, invoice, data, x, y, layout, options);
}


function displaySubtotals(doc, layout, invoice, y, rightAlignTitleX)
{
  if (!invoice) {
    return;
  }  
  if(invoice.discount_amount == 0.00){
  var data = [
    {'subtotal': formatMoney(invoice.subtotal_amount, 1)}
    ];
  }else{
  	var data = [
  	{'paid_to_date': formatMoney(invoice.subtotal_amount, 1)},
  	{'discount': formatMoney(invoice.discount_amount, 1)},
  	{'subtotal': formatMoney(invoice.amount, 1)},	
    ];
  }

  var options = {
    hasheader: true,
    rightAlignX: 555,
    rightAlignTitleX: rightAlignTitleX    
  };

  return displayGrid(doc, invoice, data, 300, y-18, layout, options) + 12;
}


function displaySubtotals2(doc, layout, invoice, y, rightAlignTitleX)
{
  if (!invoice) {
    return;
  }   
  //console.log(invoice.discount_amount );
  if(invoice.discount_amount == 0.00 || !invoice.discount_amount){
  var data = [
    {'subtotal': formatMoney(invoice.subtotal_amount, 1)},    
    ];
  }else{
  	var data = [
  	{'paid_to_date': formatMoney(invoice.subtotal_amount, 1)},
  	{'discount': formatMoney(invoice.discount_amount, 1)},
  	{'subtotal': formatMoney(invoice.amount, 1)},
  	{'paid_to_date': " "+invoice.subtotal_amount},
  	{'discount': " "+invoice.discount_amount},
  	{'subtotal': " "+invoice.amount},

    ];
  }

  var options = {
    hasheader: true,
    rightAlignX: 555,
    rightAlignTitleX: rightAlignTitleX-20  
  };

  return displayGrid2(doc, invoice, data, 300, y-18, layout, options) + 12;
}

function concatStrings() {
  var concatStr = '';
  var data = [];
  for (var i=0; i<arguments.length; i++) {
    var string = arguments[i];
    if (string) {
      data.push(string);
    }
  }
  for (var i=0; i<data.length; i++) {
    concatStr += data[i];
    if (i == 0 && data.length > 1) {
      concatStr += ', ';
    } else if (i < data.length -1) {
      concatStr += ' ';
    }
  }
  return data.length ? concatStr : false;
}

function displayGrid(doc, invoice, data, x, y, layout, options)  {
  var numLines = 0;
  var origY = y;
  doc.setLineWidth(0.8); 
  doc.setDrawColor(0,0,0);
  doc.line(layout.marginLeft - layout.tablePadding, y-13, layout.marginRight + layout.tablePadding, y-13);

  for (var i=0; i<data.length; i++) {
    doc.setFontType('normal');
      

    var row = data[i];
    if (!row) {
      continue;
    }

    if (options && (options.hasheader && i === 0 && !options.rightAlignTitleX)) {
      doc.setFontType('bold');
    }

    if (typeof row === 'object') {      
      for (var key in row) {
        if (row.hasOwnProperty(key)) {
          var value = row[key] ? row[key] + '' : false;
        }
      }
      if (!value) {
        continue;
      }  

      var marginLeft;
      if (options.rightAlignX) {
        marginLeft = options.rightAlignX - (doc.getStringUnitWidth(value) * doc.internal.getFontSize());          
      } else {
        marginLeft = x + 110;
      }
      doc.setFontType('bold');
      doc.text(marginLeft, y, value);       
      
      doc.setFontType('normal');
      if (invoice.is_quote) {
        if (key == 'invoice_number') {
          key = 'quote_number';
        } else if (key == 'invoice_date') {
          key = 'quote_date';
        } else if (key == 'balance_due') {
          key = 'total';
        }
      }

      if (key.substring(0, 6) === 'custom') {
        key = invoice.account[key];
      } else if (key === 'tax' && invoice.tax_rate) {
        key = invoiceLabels[key] + ' ' + (invoice.tax_rate*1).toString() + '%';
      } else {
        key = invoiceLabels[key];
      }

      if (options.rightAlignTitleX) {
        marginLeft = options.rightAlignTitleX - (doc.getStringUnitWidth(key) * doc.internal.getFontSize());
      } else {
        marginLeft = x;
      }
doc.setFontType('bold');
      doc.text(marginLeft, y, key);      
    } else {
      doc.text(x, y, row);
    }
    doc.setLineWidth(0.5); 
	doc.setDrawColor(0,0,0);
	doc.line(layout.marginLeft - layout.tablePadding, y-14, layout.marginLeft - layout.tablePadding, y+5);
	doc.line(layout.marginLeft - layout.tablePadding+450, y-14, layout.marginLeft - layout.tablePadding+450, y+5);
	doc.line(layout.marginRight + layout.tablePadding, y-14, layout.marginRight + layout.tablePadding, y+5);

    doc.line(layout.marginLeft - layout.tablePadding, y+5, layout.marginRight + layout.tablePadding, y+5);

    numLines++;
    y += layout.rowHeight;
  }

	doc.setFontType('normal');
	doc.setFontSize(9);
	var numliteral = NumeroALetras(invoice.amount); 	
	doc.text(30, y+2, 'Son: '+numliteral);

    doc.setLineWidth(0.5); 
	doc.setDrawColor(0,0,0);
	doc.line(layout.marginLeft - layout.tablePadding, y-10, layout.marginLeft - layout.tablePadding, y+5);
	//linea vertical final monto literal
	doc.line(layout.marginRight + layout.tablePadding, y-10, layout.marginsRight + layout.tablePadding, y+5);
    doc.line(layout.marginLeft - layout.tablePadding, y+5, layout.marginRight + layout.tablePadding, y+5);

    //first horizontal line control code
    doc.line(layout.marginLeft - layout.tablePadding+300, y+10, layout.marginRight + layout.tablePadding-55	, y+10);
    doc.line(layout.marginLeft - layout.tablePadding+300, y+27, layout.marginRight + layout.tablePadding-55, y+27);
    //brianbri
    doc.line(layout.marginLeft - layout.tablePadding+300, y+43, layout.marginRight + layout.tablePadding-55, y+43);
    //doc.line(layout.marginLeft - layout.tablePadding+445, y+10, layout.marginLeft - layout.tablePadding+445, y+43);
    doc.line(layout.marginLeft - layout.tablePadding+300, y+10, layout.marginLeft - layout.tablePadding+300, y+43);   
    
    doc.line(layout.marginRight + layout.tablePadding-55, y+10, layout.marginRight + layout.tablePadding-55, y+43);

	
  return numLines * layout.rowHeight;
}



function displayGrid2(doc, invoice, data, x, y, layout, options)  {
	console.log(invoice);
  var numLines = 0;
  var origY = y;
  doc.setLineWidth(0.8); 
  doc.setDrawColor(0,0,0);
  doc.line(layout.marginLeft - layout.tablePadding, y-13, layout.marginRight + layout.tablePadding, y-13);

  for (var i=0; i<data.length; i++) {
    doc.setFontType('normal');
      

    var row = data[i];
    if (!row) {
      continue;
    }

    if (options && (options.hasheader && i === 0 && !options.rightAlignTitleX)) {
      doc.setFontType('bold');
    }

    if (typeof row === 'object') {      
      for (var key in row) {
        if (row.hasOwnProperty(key)) {
          var value = row[key] ? row[key] + '' : false;
        }
      }
      if (!value) {
        continue;
      }  

      var marginLeft;
      if (options.rightAlignX) {
        marginLeft = options.rightAlignX - (doc.getStringUnitWidth(value) * doc.internal.getFontSize());          
      } else {
        marginLeft = x + 110;
      }
      doc.text(marginLeft, y, value);       
      
      doc.setFontType('normal');
      if (invoice.is_quote) {
        if (key == 'invoice_number') {
          key = 'quote_number';
        } else if (key == 'invoice_date') {
          key = 'quote_date';
        } else if (key == 'balance_due') {
          key = 'total';
        }
      }

      if (key.substring(0, 6) === 'custom') {
        key = invoice.account[key];
      } else if (key === 'tax' && invoice.tax_rate) {
        key = invoiceLabels[key] + ' ' + (invoice.tax_rate*1).toString() + '%';
      } else {
        key = invoiceLabels[key];
      }

      if (options.rightAlignTitleX) {
        marginLeft = options.rightAlignTitleX - (doc.getStringUnitWidth(key) * doc.internal.getFontSize());
      } else {
        marginLeft = x;
      }

      doc.text(marginLeft, y, key);      
    } else {
      doc.text(x, y, row);
    }
    doc.setLineWidth(0.5); 
	doc.setDrawColor(0,0,0);
	doc.line(layout.marginLeft - layout.tablePadding, y-14, layout.marginLeft - layout.tablePadding, y+5);
	doc.line(layout.marginLeft - layout.tablePadding+420, y-14, layout.marginLeft - layout.tablePadding+420, y+5);
	doc.line(layout.marginRight + layout.tablePadding, y-14, layout.marginRight + layout.tablePadding, y+5);
    doc.line(layout.marginLeft - layout.tablePadding, y+5, layout.marginRight + layout.tablePadding, y+5);

    numLines++;
    y += layout.rowHeight;
  }

	doc.setFontType('normal');
	doc.setFontSize(9);
	console.log("this is the amount");
	console.log(invoice.amount);
	var numliteral = NumeroALetras(invoice.amount); 
	doc.text(30, y+2, 'Son: '+numliteral);


    doc.setLineWidth(0.5); 
	doc.setDrawColor(0,0,0);
	doc.line(layout.marginLeft - layout.tablePadding, y-10, layout.marginLeft - layout.tablePadding, y+5);
	doc.line(layout.marginRight + layout.tablePadding, y-10, layout.marginRight + layout.tablePadding, y+5);
    doc.line(layout.marginLeft - layout.tablePadding, y+5, layout.marginRight + layout.tablePadding, y+5);
	
  return numLines * layout.rowHeight;
}




function displayQR(doc, layout, invoice, y)
{
	//var qrcode = new QRCode("qrcode");
	/*var qrcode = new QRCode("qrcode", {
    text: "Brian Barrear",
    width: 80,
    height: 80,
    colorDark : "#000000",
    colorLight : "#ffffff",
    correctLevel : QRCode.CorrectLevel.H
	});*/



	//qr_this = qrcode.makeCode("BRIAN BARRERA");
	//alert("this isi su");
	
	//drawinfqr= qrcode['_oDrawing'];
	
	//while(drawinfqr['_elImage']['src']);
	//console.log(drawinfqr['_elImage']['src']);
	invoice.qr = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIAAAACACAYAAADDPmHLAAAEAUlEQVR4nO2Twa7jMAwD+/8/vXt+RQrL9Mhx2hGQm0RS8uT1er3+3fFdFaVD6KZeI+/OfOEnAAIgAAIgAAIQL9l1iORYqe6sD+l91xsIwEReAYDNqR4BqJcACMA8AMkhKjppYEI39d7llWRJbiUAk94CIAACIAACIAAC0AMA4UPpLhx0OR+Vv6gjAAIgAAIgAAJwHABpT8cM9dhJPgGY7OmYEQABEAABEAAB+DUAqDrpcSs6XV/nDuGOAnClIwDN5mkPMVPREYBm87SHmKno/CwApx9i1FPx6uqhdtr8CYAACADSQ+0kAAKw77tMdHAlYBG6FW0yz646P+FbCQBb5yd8KwFg6/yEbyUAbJ2f8K0EgK0oYbIkMXM1RzxctXY9bmWnSpbSLBFw14wACECpRwAmdIiAu2YEoAGA5MDJEsSSFe/OYxHelC7VIwCLc3ftRPUIwOLcXTtRPQKwOHfXTlSPACzO3bUT1TMEgDoWNTPqSfMneROwqKK8BUAABEAABCDK+5UAdD0UsWQXaFdzXdW5Q6IjAB/mukoAJkoABEAAngBAEmYhcMvjdh2YmEmzFL0FoNqT5CVm0ixFbwGo9iR5iZk0S9FbAKo9SV5iJs1S9BaAak+Sl5hJsxS918Mkc9QhqEfYtdOuH24ijwAIgABs20kAJsJRSyZ5fwaA0RBV1OLJwyW6nQ8z651qlHxGTVQJQH6bVKPkM2qiSgDy26QaJZ9RE1UCkN8m1Sj5jJqoEoD8NqlGyWc2zM5DVBc9KV9HkVAIQHO+jhKAB+XrKAF4UL6OagVgJEwddNfxKCAqc13w7YRcACZ0urwSXQEo+gjA0EsAqjpdXomuABR9BGDgFU8OAhMzyeKnPxxVFCQCIAA9YYgZAVjzEgABGANAHAsMM91DeSdHp6rrxsVPANKHokoAJg4sAAIgAOSXhNu19E6dRJfKO+qhSgDgfAJAhxGAyx6qBADOJwB0GAG47KHqQ+6tZss+d+mmABC6lPeHHgGo6AoAfNCn6QoAfNCn6X4tAPHFGopYnIRipN01M9IgbyMAC/m6ZkYaAiAAAiAAAiAABACp+OqXLp4cmMpDeCc9C49b8RYAARCAUh7CO+kRAAHYB0BX7QKgEz5CJ6n0DkVtAah6C8BCCYAACMATAUgOXNFJFye+Lu/TdihmEQDK+7QdilkEgPI+bYdiFgGgvE/boZhFACjv03YoZjkHAKonPETLY1J5Gj8BEAABEAABEIDbAUiOVclL6FIzSSX3nXhLAUjzCYAACIAACIAAfDMAXUskM5W5nQCc7l3RFYCFfKd7C8ABj3CntwAc8Ah3ekcA7PrurEqenTsQWQRgogTgj7YACIAAlHoEQAC+DoD/JE+bPCWw36MAAAAASUVORK5CYII=';

//console.log(qr);


	if(invoice.discount_amount == 0.00){var qry=0;}else{var qry=30;}
 	if (invoice.status==0 || true && false)
  	{  	  		
	invoice.qr = 'data:image/jpeg;base64,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';
	doc.addImage(invoice.qr_actual, 'JPEG', layout.marginRight-42, y+15+qry, 60, 60);
	}
	else
	{
	doc.addImage(invoice.qr_actual, 'JPEG', layout.marginRight-42, y+15+qry, 60, 60);
	}
}

function displayNotesAndTerms(doc, layout, invoice, y)
{
	doc.setFontType("normal");
	var origY = y;

	doc.setFontType('bold');
    doc.setFontSize(9);
    center_cell = 150;
    doc.text(layout.marginLeft - layout.tablePadding+center_cell+150+10, y+18, 'CÓDIGO DE CONTROL:');
 	
 	doc.text(layout.marginLeft - layout.tablePadding+center_cell+300, y+18, invoice.control_code);

    var anio = invoice.deadline.substr(0,4);
    var mes = invoice.deadline.substr(5,2);
    var dia = invoice.deadline.substr(8,2);
    var fecha_limite1 = dia+'/'+mes+'/'+anio;

    doc.text(layout.marginLeft - layout.tablePadding+0+center_cell+150+10, y+33, 'FECHA LÍMITE DE EMISIÓN:');

    doc.text(layout.marginLeft - layout.tablePadding+center_cell+300, y+33, fecha_limite1);


  	doc.setFontSize(7);
	doc.text(layout.marginLeft - layout.tablePadding+60, y+67, '\"ESTA FACTURA CONTRIBUYE AL DESARROLLO DEL PAÍS. EL USO ILÍCITO DE ÉSTA SERÁ SANCIONADO DE ACUERDO A LEY\"');	
	doc.setFontSize(5);
	doc.text(layout.marginLeft - layout.tablePadding+130, y+75, 'Ley N° 453: Está prohibido importar, distribuir o comercializar productos expirados o prontos a expirar' );	

	


  if (invoice.public_notes) {
  	doc.setFontSize(8);
  	doc.setLineWidth(0.3); 
	doc.setDrawColor(0,0,0);
	doc.setFontType("bold");
	doc.line(layout.marginLeft-8, y+8, layout.marginLeft-8, y+26);
	doc.text(layout.marginLeft-5, y+15, 'Nota al Cliente');
	doc.setFontType("normal");
	doc.text(layout.marginLeft-5, y+25, invoice.public_notes);  
  }
    
  if (invoice.terms) {
  	doc.setLineWidth(0.3); 
    doc.setDrawColor(0,0,0);
    doc.setFontType("bold");
	doc.line(layout.marginLeft-8, y+30, layout.marginLeft-8, y+48);
    doc.text(layout.marginLeft-5, y+37, 'Términos y Condiciones');
    doc.setFontType("normal");
    doc.text(layout.marginLeft-5, y+47, invoice.terms);  
    y +=25;
  }

	//doc.addImage(logoImages.logofooter, 'JPEG', layout.marginLeft+220, y+65, logoImages.imageLogoWidthf, logoImages.imageLogoHeightf);


	doc.line(layout.marginLeft - layout.tablePadding,y+80, layout.marginRight + layout.tablePadding,y+80);

	doc.setFontSize(8);
	doc.setFontType("normal");

	doc.text(layout.marginLeft - layout.tablePadding+135, y+90, 'Sistema de Facturación Virtual brindado por');

	doc.setFontSize(9);
	doc.setFontType("bold");

	doc.text(layout.marginLeft - layout.tablePadding+295, y+90, 'www.facturavirtual.com.bo');

  return y - origY;
}

function calculateAmounts(invoice) {
  var total = 0;
  var hasTaxes = false;

  for (var i=0; i<invoice.invoice_items.length; i++) {
    var item = invoice.invoice_items[i];
    var tax = 0;
    if (item.tax && parseFloat(item.tax.rate)) {
      tax = parseFloat(item.tax.rate);
    } else if (item.tax_rate && parseFloat(item.tax_rate)) {
      tax = parseFloat(item.tax_rate);
    }   

    var lineTotal =parseFloat(item.cost) * parseFloat(item.qty);//NINJA.parseFloat(item.cost) * NINJA.parseFloat(item.qty);
    if (tax) {
      lineTotal += roundToTwo(lineTotal * tax / 100);
    }
    if (lineTotal) {
      total += lineTotal;
    }

    if ((item.tax && item.tax.rate > 0) || (item.tax_rate && parseFloat(item.tax_rate) > 0)) {
      hasTaxes = true;
    }
  }

  invoice.subtotal_amount = total;

  // if (invoice.discount > 0) {
  //   var discount = roundToTwo(total * (invoice.discount/100));
  //   total -= discount;
  // }

  var tax = 0;
  if (invoice.tax && parseFloat(invoice.tax.rate)) {
    tax = parseFloat(invoice.tax.rate);
  } else if (invoice.tax_rate && parseFloat(invoice.tax_rate)) {
    tax = parseFloat(invoice.tax_rate);
  }

  if (tax) {
    var tax = roundToTwo(total * (tax/100));
    total = parseFloat(total) + parseFloat(tax);
  }

  // invoice.balance_amount = roundToTwo(total) - (roundToTwo(invoice.amount) - roundToTwo(invoice.balance));

  // invoice.discount_amount = roundToTwo(invoice.subtotal_amount) - roundToTwo(invoice.amount);
  invoice.discountotal=invoice.discount;
  invoice.discount_amount = invoice.discountotal;
  console.log("invoice.");
  console.log(total+" - "+invoice.discountotal);
  invoice.amount = total - invoice.discountotal;

  invoice.tax_amount = tax;
  invoice.has_taxes = hasTaxes;

  return invoice;
}

function getInvoiceTaxRate(invoice) {
  var tax = 0;
  if (invoice.tax && parseFloat(invoice.tax.rate)) {
    tax = parseFloat(invoice.tax.rate);
  } else if (invoice.tax_rate && parseFloat(invoice.tax_rate)) {
    tax = parseFloat(invoice.tax_rate);
  }   
  return tax;
}

function displaytittle(doc, invoice, layout) {

		var datos1x = 30;
	   	var datos1y = 100;
	    var datos1xy = 13;

	    if(invoice.account_uniper)
	    {
	    	var datos1y = 90;
	    	doc.setFontType('bold');
		    doc.setFontSize(11); 
		    doc.text(datos1x, datos1y, invoice.account_name);  
		    datos1xy -= 2;
		    datos1y += datos1xy;
			
		   	doc.setFontSize(10);
		    doc.text(datos1x, datos1y, 'de ' + invoice.account_uniper);  
		    datos1y += datos1xy;
		    datos1xy -= 2;
		    
	    } 
	    else
	    {
		    doc.setFontType('bold');
		    doc.setFontSize(11); 
		    doc.text(datos1x, datos1y, invoice.account_name);  
		    datos1y += datos1xy;
		    datos1xy -= 4;
	    }

	    doc.setFontType('normal');
	   	doc.setFontSize(10);
	    doc.text(datos1x, datos1y, invoice.branch_name);    
	    datos1y += datos1xy;

	    doc.setFontSize(9);	 
	    doc.text(datos1x, datos1y, invoice.address2);
	    datos1y += datos1xy;

	    var zone = 'Zona/Barrio: ' + invoice.address1;

	    var phone = 'Teléfono: '+invoice.phone;
	    doc.text(datos1x, datos1y, zone+' '+phone);
	    datos1y += datos1xy;

	    var city = invoice.city+' - Bolivia';
	    doc.text(datos1x, datos1y, city);
}

function displayHeader(doc, invoice, layout) {

	    datos1x = 395;
	    datos1y = 15;
	    datos1xy = 16;

	    doc.setFontSize(10);
		doc.setLineWidth(1);  
	    doc.setFillColor(255, 255, 255);
	    doc.roundedRect(datos1x, datos1y, 200, 55, 3, 3, 'FD');

	    datos1x += 10;
	    datos1y += 15;
	    var datos1x1 = 95;
		var datos1x2 = 105;
		
			
		doc.setFontType('bold');
	    doc.text(datos1x, datos1y, 'NIT');
	    doc.text(datos1x+datos1x1, datos1y, ':');
	    doc.text(datos1x+datos1x2, datos1y, invoice.account_nit);
		datos1y += datos1xy;

	    doc.text(datos1x, datos1y, 'Nº FACTURA');
	    doc.text(datos1x+datos1x1, datos1y, ':');
	    doc.text(datos1x+datos1x2, datos1y, invoice.invoice_number);
		datos1y += datos1xy;
//console.log("termina de acer el disenio");
		doc.text(datos1x, datos1y, 'Nº AUTORIZACIÓN');
	    doc.text(datos1x+datos1x1, datos1y, ':');
	    doc.text(datos1x+datos1x2, datos1y, invoice.number_autho);
		datos1y += datos1xy;

	    doc.setFontSize(12);
	    doc.setFontType('bold');
	    doc.text(430, datos1y+10, 'ORIGINAL    SFC-1');

	    

		if(invoice.third == 1)
		{
		    doc.setFontSize(18);
		    doc.setFontType('bold');
			doc.text(258, 65, 'FACTURA');
			doc.setFontSize(18);
		    doc.setFontType('bold');
			doc.text(230, 85, 'POR TERCEROS');
			doc.setFontSize(10);
			//doc.setFontType('bold');
			doc.text(150, 10, 'Sistema de Facturación Brindado por: IpxServer');
		}
		else
		{
		    doc.setFontSize(20);
		    doc.setFontType('bold');
			doc.text(258, 72, 'FACTURA');
		}



}

function getInvoiceDate(date) {	
	var date = date;    
	var month_date=["no_date","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"]; 	
  		fecha = date.split('-');
  		date = fecha[2]+" de "+month_date[parseInt(fecha[1])]+" de "+fecha[0];
  		return date;  		
}

function displayInvoiceHeader(doc, invoice, layout) {

  var costX = layout.unitCostRight - (doc.getStringUnitWidth(invoiceLabels.unit_cost) * doc.internal.getFontSize());
  var qtyX = layout.qtyRight - (doc.getStringUnitWidth(invoiceLabels.quantity) * doc.internal.getFontSize());
  var taxX = layout.taxRight - (doc.getStringUnitWidth(invoiceLabels.tax) * doc.internal.getFontSize());
  var totalX = layout.lineTotalRight - (doc.getStringUnitWidth(invoiceLabels.line_total) * doc.internal.getFontSize());

  doc.text(layout.marginLeft-4, layout.tableTop+15, 'CANTIDAD');
  doc.text(layout.descriptionLeft-60, layout.tableTop+15, 'CONCEPTO');
  doc.text(costX+24, layout.tableTop+15, 'PRECIO UNITARIO');
  doc.text(totalX-20, layout.tableTop+15, 'SUBTOTAL');

	doc.setLineWidth(0.5); 
	doc.setDrawColor(0,0,0);

	doc.line(layout.marginLeft - layout.tablePadding,layout.headerTop+140, layout.marginRight + layout.tablePadding,layout.headerTop+140);
	doc.line(layout.marginLeft - layout.tablePadding,layout.headerTop+160, layout.marginRight + layout.tablePadding,layout.headerTop+160);

	doc.line(layout.marginLeft - layout.tablePadding,layout.headerTop+140, layout.marginLeft - layout.tablePadding, layout.tableTop + 35);
	doc.line(layout.marginRight + layout.tablePadding,layout.headerTop+140, layout.marginRight + layout.tablePadding, layout.tableTop + 35);

	doc.line(layout.marginLeft - layout.tablePadding+60, layout.headerTop+140, layout.marginLeft - layout.tablePadding+60, layout.tableTop + 35);
	doc.line(layout.marginLeft - layout.tablePadding+345, layout.headerTop+140, layout.marginLeft - layout.tablePadding+345, layout.tableTop + 35);
	doc.line(layout.marginLeft - layout.tablePadding+450, layout.headerTop+140, layout.marginLeft - layout.tablePadding+450, layout.tableTop + 35);

}

function displayInvoiceHeader2(doc, invoice, layout) {

	var costX = layout.unitCostRight - (doc.getStringUnitWidth(invoiceLabels.unit_cost) * doc.internal.getFontSize());
	var qtyX = layout.qtyRight - (doc.getStringUnitWidth(invoiceLabels.quantity) * doc.internal.getFontSize());
	var taxX = layout.taxRight - (doc.getStringUnitWidth(invoiceLabels.tax) * doc.internal.getFontSize());
	var totalX = layout.lineTotalRight - (doc.getStringUnitWidth(invoiceLabels.line_total) * doc.internal.getFontSize());

	doc.text(layout.descriptionLeft+40, layout.tableTop+15, 'CONCEPTO');
	doc.text(totalX-20, layout.tableTop+15, 'SUBTOTAL');

	doc.setLineWidth(0.5); 
	doc.setDrawColor(0,0,0);

	doc.line(layout.marginLeft - layout.tablePadding,layout.headerTop+140, layout.marginRight + layout.tablePadding,layout.headerTop+140);
	doc.line(layout.marginLeft - layout.tablePadding,layout.headerTop+160, layout.marginRight + layout.tablePadding,layout.headerTop+160);

	doc.line(layout.marginLeft - layout.tablePadding,layout.headerTop+140, layout.marginLeft - layout.tablePadding, layout.tableTop + 35);
	doc.line(layout.marginRight + layout.tablePadding,layout.headerTop+140, layout.marginRight + layout.tablePadding, layout.tableTop + 35);

	doc.line(layout.marginLeft - layout.tablePadding+420, layout.headerTop+140, layout.marginLeft - layout.tablePadding+420, layout.tableTop + 35);

}

function displayInvoiceItems(doc, invoice, layout) {
  doc.setFontType("normal");

  var line = 1;
  var total = 0;
  var shownItem = false;
  var currencyId = invoice && invoice.client ? invoice.client.currency_id : 1;  
  var tableTop = layout.tableTop+6;
  //var hideQuantity = invoice.account.hide_quantity == '1';  

  doc.setFontSize(10);
  for (var i=0; i<invoice.invoice_items.length; i++) {
    var item = invoice.invoice_items[i];
    var cost = formatMoney(item.cost, currencyId, true);
    var qty = parseFloat(item.qty) ?parseFloat(item.qty) + '' : '';// NINJA.parseFloat(item.qty) ? NINJA.parseFloat(item.qty) + '' : '';
    var notes = item.notes;

    var productKey = item.product_key;
    var tax = 0;
    if (item.tax && parseFloat(item.tax.rate)) {
      tax = parseFloat(item.tax.rate);
    } else if (item.tax_rate && parseFloat(item.tax_rate)) {
      tax = parseFloat(item.tax_rate);
    }   

    // show at most one blank line
    if (shownItem && (!cost || cost == '0.00') && !notes && !productKey) {
      continue;
    }   
    shownItem = true;

    var numLines = doc.splitTextToSize(item.notes, 200).length + 2;
    //console.log('num lines %s', numLines);

    var y = tableTop + (line * layout.tableRowHeight) + (2 * layout.tablePadding);
    var top = y - layout.tablePadding;
    var newTop = top + (numLines * layout.tableRowHeight);

    if (newTop > 770) {
      line = 0;
      tableTop = layout.accountTop + layout.tablePadding;
      y = tableTop;
      top = y - layout.tablePadding;
      newTop = top + (numLines * layout.tableRowHeight);
      doc.addPage();
    }

    var left = layout.marginLeft - layout.tablePadding;
    var width = layout.marginRight + layout.tablePadding;

    // process date variables
    if (invoice.is_recurring) {
      notes = processVariables(notes);
      productKey = processVariables(productKey);
    }

    var lineTotal = parseFloat(item.cost) *parseFloat(item.qty);//NINJA.parseFloat(item.cost) * NINJA.parseFloat(item.qty);
    if (tax) {
      lineTotal += lineTotal * tax / 100;
    }
    if (lineTotal) {
      total += lineTotal;
    }
    lineTotal = formatMoney(lineTotal, 1);


    var costX = layout.unitCostRight - (doc.getStringUnitWidth(cost) * doc.internal.getFontSize());
    var qtyX = layout.qtyRight - (doc.getStringUnitWidth(qty) * doc.internal.getFontSize());
    var taxX = layout.taxRight - (doc.getStringUnitWidth(tax+'%') * doc.internal.getFontSize());
    var totalX = layout.lineTotalRight - (doc.getStringUnitWidth(lineTotal) * doc.internal.getFontSize());
    //if (i==0) y -= 4;

    line += numLines;

  	doc.setDrawColor(0,0,0);
    doc.setLineWidth(0.5); 

	doc.line(left, newTop, width, newTop); 

    doc.line(left, top, left, newTop);

    doc.line(width, top, width, newTop);

    doc.line(left+60, top, left+60, newTop);

    doc.line(left+345, top, left+345, newTop);

	doc.line(left+450, top, left+450, newTop);


    y += 4;

    SetPdfColor('Black', doc);
    doc.setFontType('normal');

    doc.text(layout.marginLeft+15, y+2, qty);
    doc.text(costX+25, y+2, cost);
	doc.text(layout.descriptionLeft-70, y, notes);
    doc.text(totalX+5, y+2, lineTotal);

    // doc.setFontType('normal');
    // SetPdfColor('Black', doc);
    // if (tax) {
    //   doc.text(taxX, y+2, tax+'%');
    // }
  }  	

  y = tableTop + (line * layout.tableRowHeight) + (3 * layout.tablePadding);
  var cutoff = 700;
  if (invoice.terms) {
    cutoff -= 50;
  }
  if (invoice.public_notes) {
    cutoff -= 50;
  }

  if (y > cutoff) {
    doc.addPage();
    return layout.marginLeft;
  }

  return y;
}
function formatMoney(value, currency_id, hide_symbol) {
    value = parseFloat(value);
    //if (!currency_id) currency_id = 1;
    var currency = "Bs. ";//currencyMap[currency_id];
    symbol="";
    precision="2";
    thousand_separator=",";
    decimal_separator=".";
    return accounting.formatMoney(value, hide_symbol ? '' : symbol, precision, thousand_separator, decimal_separator);
  }

function displayInvoiceItems2(doc, invoice, layout) {
  doc.setFontType("normal");

  var line = 1;
  var total = 0;
  var shownItem = false;
  var currencyId = invoice && invoice.client ? invoice.client.currency_id : 1;  
  var tableTop = layout.tableTop+6;
  var hideQuantity = invoice.account.hide_quantity == '1';  

  doc.setFontSize(10);
  for (var i=0; i<invoice.invoice_items.length; i++) {
    var item = invoice.invoice_items[i];
    var cost = formatMoney(item.cost, currencyId, true);
    var qty =parseFloat(item.qty) ? parseFloat(item.qty) + '' : '';//NINJA.parseFloat(item.qty) ? NINJA.parseFloat(item.qty) + '' : '';
    var notes = item.notes;    
    var productKey = item.product_key;
    var tax = 0;
    if (item.tax && parseFloat(item.tax.rate)) {
      tax = parseFloat(item.tax.rate);
    } else if (item.tax_rate && parseFloat(item.tax_rate)) {
      tax = parseFloat(item.tax_rate);
    }   

    // show at most one blank line
    if (shownItem && (!cost || cost == '0.00') && !notes && !productKey) {
      continue;
    }   
    shownItem = true;

    var numLines = doc.splitTextToSize(item.notes, 200).length + 2;
    //console.log('num lines %s', numLines);

    var y = tableTop + (line * layout.tableRowHeight) + (2 * layout.tablePadding);
    var top = y - layout.tablePadding;
    var newTop = top + (numLines * layout.tableRowHeight);

    if (newTop > 770) {
      line = 0;
      tableTop = layout.accountTop + layout.tablePadding;
      y = tableTop;
      top = y - layout.tablePadding;
      newTop = top + (numLines * layout.tableRowHeight);
      doc.addPage();
    }

    var left = layout.marginLeft - layout.tablePadding;
    var width = layout.marginRight + layout.tablePadding;

    // process date variables
    if (invoice.is_recurring) {
      notes = processVariables(notes);
      productKey = processVariables(productKey);
    }

    var lineTotal =parseFloat(item.cost) * parseFloat(item.qty);
    //console.log("line totoal");
    //console.log(parseFloat(item.cost) * parseFloat(item.qty));
    if (tax) {
      lineTotal += lineTotal * tax / 100;
    }
    if (lineTotal) {
      total += lineTotal;
    }
    lineTotal = formatMoney(lineTotal, 1);


    var costX = layout.unitCostRight - (doc.getStringUnitWidth(cost) * doc.internal.getFontSize()); 
    var qtyX = layout.qtyRight - (doc.getStringUnitWidth(qty) * doc.internal.getFontSize());
    var taxX = layout.taxRight - (doc.getStringUnitWidth(tax+'%') * doc.internal.getFontSize());
    var totalX = layout.lineTotalRight - (doc.getStringUnitWidth(lineTotal) * doc.internal.getFontSize());
    //if (i==0) y -= 4;

    line += numLines;

  	doc.setDrawColor(0,0,0);
    doc.setLineWidth(0.5); 

	doc.line(left, newTop, width, newTop); 

    doc.line(left, top, left, newTop);

    doc.line(width, top, width, newTop);

    // doc.line(left+60, top, left+60, newTop);

    // doc.line(left+345, top, left+345, newTop);

	doc.line(left+420, top, left+420, newTop);


    y += 4;

    SetPdfColor('Black', doc);
    doc.setFontType('normal');

    // doc.text(layout.marginLeft+15, y+2, qty);
     //doc.text(costX+25, y+2, cost);
    
	doc.text(layout.descriptionLeft-130, y, notes);
    doc.text(totalX+5, y+2, lineTotal);

    // doc.setFontType('normal');
    // SetPdfColor('Black', doc);
    // if (tax) {
    //   doc.text(taxX, y+2, tax+'%');
    // }
  }  	

  y = tableTop + (line * layout.tableRowHeight) + (3 * layout.tablePadding);
  var cutoff = 700;
  if (invoice.terms) {
    cutoff -= 50;
  }
  if (invoice.public_notes) {
    cutoff -= 50;
  }

  if (y > cutoff) {
    doc.addPage();
    return layout.marginLeft;
  }

  return y;
}


// http://stackoverflow.com/questions/1068834/object-comparison-in-javascript
function objectEquals(x, y) {
    // if both are function
    if (x instanceof Function) {
        if (y instanceof Function) {
            return x.toString() === y.toString();
        }
        return false;
    }
    if (x === null || x === undefined || y === null || y === undefined) { return x === y; }
    if (x === y || x.valueOf() === y.valueOf()) { return true; }

    // if one of them is date, they must had equal valueOf
    if (x instanceof Date) { return false; }
    if (y instanceof Date) { return false; }

    // if they are not function or strictly equal, they both need to be Objects
    if (!(x instanceof Object)) { return false; }
    if (!(y instanceof Object)) { return false; }

    var p = Object.keys(x);
    return Object.keys(y).every(function (i) { return p.indexOf(i) !== -1; }) ?
            p.every(function (i) { return objectEquals(x[i], y[i]); }) : false;
}



/*\
|*|
|*|  Base64 / binary data / UTF-8 strings utilities
|*|
|*|  https://developer.mozilla.org/en-US/docs/Web/JavaScript/Base64_encoding_and_decoding
|*|
\*/

/* Array of bytes to base64 string decoding */

function b64ToUint6 (nChr) {

  return nChr > 64 && nChr < 91 ?
      nChr - 65
    : nChr > 96 && nChr < 123 ?
      nChr - 71
    : nChr > 47 && nChr < 58 ?
      nChr + 4
    : nChr === 43 ?
      62
    : nChr === 47 ?
      63
    :
      0;

}

function base64DecToArr (sBase64, nBlocksSize) {

  var
    sB64Enc = sBase64.replace(/[^A-Za-z0-9\+\/]/g, ""), nInLen = sB64Enc.length,
    nOutLen = nBlocksSize ? Math.ceil((nInLen * 3 + 1 >> 2) / nBlocksSize) * nBlocksSize : nInLen * 3 + 1 >> 2, taBytes = new Uint8Array(nOutLen);

  for (var nMod3, nMod4, nUint24 = 0, nOutIdx = 0, nInIdx = 0; nInIdx < nInLen; nInIdx++) {
    nMod4 = nInIdx & 3;
    nUint24 |= b64ToUint6(sB64Enc.charCodeAt(nInIdx)) << 18 - 6 * nMod4;
    if (nMod4 === 3 || nInLen - nInIdx === 1) {
      for (nMod3 = 0; nMod3 < 3 && nOutIdx < nOutLen; nMod3++, nOutIdx++) {
        taBytes[nOutIdx] = nUint24 >>> (16 >>> nMod3 & 24) & 255;
      }
      nUint24 = 0;

    }
  }

  return taBytes;
}

/* Base64 string to array encoding */

function uint6ToB64 (nUint6) {

  return nUint6 < 26 ?
      nUint6 + 65
    : nUint6 < 52 ?
      nUint6 + 71
    : nUint6 < 62 ?
      nUint6 - 4
    : nUint6 === 62 ?
      43
    : nUint6 === 63 ?
      47
    :
      65;

}

function base64EncArr (aBytes) {

  var nMod3 = 2, sB64Enc = "";

  for (var nLen = aBytes.length, nUint24 = 0, nIdx = 0; nIdx < nLen; nIdx++) {
    nMod3 = nIdx % 3;
    if (nIdx > 0 && (nIdx * 4 / 3) % 76 === 0) { sB64Enc += "\r\n"; }
    nUint24 |= aBytes[nIdx] << (16 >>> nMod3 & 24);
    if (nMod3 === 2 || aBytes.length - nIdx === 1) {
      sB64Enc += String.fromCharCode(uint6ToB64(nUint24 >>> 18 & 63), uint6ToB64(nUint24 >>> 12 & 63), uint6ToB64(nUint24 >>> 6 & 63), uint6ToB64(nUint24 & 63));
      nUint24 = 0;
    }
  }

  return sB64Enc.substr(0, sB64Enc.length - 2 + nMod3) + (nMod3 === 2 ? '' : nMod3 === 1 ? '=' : '==');

}

/* UTF-8 array to DOMString and vice versa */

function UTF8ArrToStr (aBytes) {

  var sView = "";

  for (var nPart, nLen = aBytes.length, nIdx = 0; nIdx < nLen; nIdx++) {
    nPart = aBytes[nIdx];
    sView += String.fromCharCode(
      nPart > 251 && nPart < 254 && nIdx + 5 < nLen ? /* six bytes */
        /* (nPart - 252 << 32) is not possible in ECMAScript! So...: */
        (nPart - 252) * 1073741824 + (aBytes[++nIdx] - 128 << 24) + (aBytes[++nIdx] - 128 << 18) + (aBytes[++nIdx] - 128 << 12) + (aBytes[++nIdx] - 128 << 6) + aBytes[++nIdx] - 128
      : nPart > 247 && nPart < 252 && nIdx + 4 < nLen ? /* five bytes */
        (nPart - 248 << 24) + (aBytes[++nIdx] - 128 << 18) + (aBytes[++nIdx] - 128 << 12) + (aBytes[++nIdx] - 128 << 6) + aBytes[++nIdx] - 128
      : nPart > 239 && nPart < 248 && nIdx + 3 < nLen ? /* four bytes */
        (nPart - 240 << 18) + (aBytes[++nIdx] - 128 << 12) + (aBytes[++nIdx] - 128 << 6) + aBytes[++nIdx] - 128
      : nPart > 223 && nPart < 240 && nIdx + 2 < nLen ? /* three bytes */
        (nPart - 224 << 12) + (aBytes[++nIdx] - 128 << 6) + aBytes[++nIdx] - 128
      : nPart > 191 && nPart < 224 && nIdx + 1 < nLen ? /* two bytes */
        (nPart - 192 << 6) + aBytes[++nIdx] - 128
      : /* nPart < 127 ? */ /* one byte */
        nPart
    );
  }

  return sView;

}

function strToUTF8Arr (sDOMStr) {

  var aBytes, nChr, nStrLen = sDOMStr.length, nArrLen = 0;

  /* mapping... */

  for (var nMapIdx = 0; nMapIdx < nStrLen; nMapIdx++) {
    nChr = sDOMStr.charCodeAt(nMapIdx);
    nArrLen += nChr < 0x80 ? 1 : nChr < 0x800 ? 2 : nChr < 0x10000 ? 3 : nChr < 0x200000 ? 4 : nChr < 0x4000000 ? 5 : 6;
  }

  aBytes = new Uint8Array(nArrLen);

  /* transcription... */

  for (var nIdx = 0, nChrIdx = 0; nIdx < nArrLen; nChrIdx++) {
    nChr = sDOMStr.charCodeAt(nChrIdx);
    if (nChr < 128) {
      /* one byte */
      aBytes[nIdx++] = nChr;
    } else if (nChr < 0x800) {
      /* two bytes */
      aBytes[nIdx++] = 192 + (nChr >>> 6);
      aBytes[nIdx++] = 128 + (nChr & 63);
    } else if (nChr < 0x10000) {
      /* three bytes */
      aBytes[nIdx++] = 224 + (nChr >>> 12);
      aBytes[nIdx++] = 128 + (nChr >>> 6 & 63);
      aBytes[nIdx++] = 128 + (nChr & 63);
    } else if (nChr < 0x200000) {
      /* four bytes */
      aBytes[nIdx++] = 240 + (nChr >>> 18);
      aBytes[nIdx++] = 128 + (nChr >>> 12 & 63);
      aBytes[nIdx++] = 128 + (nChr >>> 6 & 63);
      aBytes[nIdx++] = 128 + (nChr & 63);
    } else if (nChr < 0x4000000) {
      /* five bytes */
      aBytes[nIdx++] = 248 + (nChr >>> 24);
      aBytes[nIdx++] = 128 + (nChr >>> 18 & 63);
      aBytes[nIdx++] = 128 + (nChr >>> 12 & 63);
      aBytes[nIdx++] = 128 + (nChr >>> 6 & 63);
      aBytes[nIdx++] = 128 + (nChr & 63);
    } else /* if (nChr <= 0x7fffffff) */ {
      /* six bytes */
      aBytes[nIdx++] = 252 + /* (nChr >>> 32) is not possible in ECMAScript! So...: */ (nChr / 1073741824);
      aBytes[nIdx++] = 128 + (nChr >>> 24 & 63);
      aBytes[nIdx++] = 128 + (nChr >>> 18 & 63);
      aBytes[nIdx++] = 128 + (nChr >>> 12 & 63);
      aBytes[nIdx++] = 128 + (nChr >>> 6 & 63);
      aBytes[nIdx++] = 128 + (nChr & 63);
    }
  }

  return aBytes;

}



function hexToR(h) {return parseInt((cutHex(h)).substring(0,2),16)}
function hexToG(h) {return parseInt((cutHex(h)).substring(2,4),16)}
function hexToB(h) {return parseInt((cutHex(h)).substring(4,6),16)}
function cutHex(h) {return (h.charAt(0)=="#") ? h.substring(1,7):h}
function setDocHexColor(doc, hex) {
  var r = hexToR(hex);
  var g = hexToG(hex);
  var b = hexToB(hex);
  return doc.setTextColor(r, g, b);
}
function setDocHexFill(doc, hex) {
  var r = hexToR(hex);
  var g = hexToG(hex);
  var b = hexToB(hex);
  return doc.setFillColor(r, g, b);
}
function setDocHexDraw(doc, hex) {
  var r = hexToR(hex);
  var g = hexToG(hex);
  var b = hexToB(hex);
  return doc.setDrawColor(r, g, b);
}

function openUrl(url, track) {
  trackUrl(track ? track : url);
  window.open(url, '_blank');
}

function toggleDatePicker(field) {
  $('#'+field).datepicker('show');
}

function roundToTwo(num, toString) {
  var val = +(Math.round(num + "e+2")  + "e-2");
  return toString ? val.toFixed(2) : val;
}

function truncate(str, length) {  
  return (str && str.length > length) ? (str.substr(0, length-1) + '...') : str;
}

function Unidades(num){

    switch(num)
    {
      case 1: return "UNO";
      case 2: return "DOS";
      case 3: return "TRES";
      case 4: return "CUATRO";
      case 5: return "CINCO";
      case 6: return "SEIS";
      case 7: return "SIETE";
      case 8: return "OCHO";
      case 9: return "NUEVE";
    }

    return "";
  }

  function Decenas(num){

    decena = Math.floor(num/10);
    unidad = num - (decena * 10);

    switch(decena)
    {
      case 1:   
        switch(unidad)
        {
          case 0: return "DIEZ";
          case 1: return "ONCE";
          case 2: return "DOCE";
          case 3: return "TRECE";
          case 4: return "CATORCE";
          case 5: return "QUINCE";
          default: return "DIECI" + Unidades(unidad);
        }
      case 2:
        switch(unidad)
        {
          case 0: return "VEINTE";
          default: return "VEINTI" + Unidades(unidad);
        }
      case 3: return DecenasY("TREINTA", unidad);
      case 4: return DecenasY("CUARENTA", unidad);
      case 5: return DecenasY("CINCUENTA", unidad);
      case 6: return DecenasY("SESENTA", unidad);
      case 7: return DecenasY("SETENTA", unidad);
      case 8: return DecenasY("OCHENTA", unidad);
      case 9: return DecenasY("NOVENTA", unidad);
      case 0: return Unidades(unidad);
    }
  }//Unidades()

  function DecenasY(strSin, numUnidades){
    if (numUnidades > 0)
      return strSin + " Y " + Unidades(numUnidades)

    return strSin;
  }//DecenasY()

  function Centenas(num){

    centenas = Math.floor(num / 100);
    decenas = num - (centenas * 100);

    switch(centenas)
    {
      case 1:
        if (decenas > 0)
          return "CIENTO " + Decenas(decenas);
        return "CIEN";
      case 2: return "DOSCIENTOS " + Decenas(decenas);
      case 3: return "TRESCIENTOS " + Decenas(decenas);
      case 4: return "CUATROCIENTOS " + Decenas(decenas);
      case 5: return "QUINIENTOS " + Decenas(decenas);
      case 6: return "SEISCIENTOS " + Decenas(decenas);
      case 7: return "SETECIENTOS " + Decenas(decenas);
      case 8: return "OCHOCIENTOS " + Decenas(decenas);
      case 9: return "NOVECIENTOS " + Decenas(decenas);
    }

    return Decenas(decenas);
  }//Centenas()

  function Seccion(num, divisor, strSingular, strPlural){
    cientos = Math.floor(num / divisor)
    resto = num - (cientos * divisor)

    letras = "";

    if (cientos > 0)
      if (cientos > 1)
        letras = Centenas(cientos) + " " + strPlural;
      else
        letras = strSingular;

    if (resto > 0)
      letras += "";

    return letras;
  }//Seccion()

  function Miles(num){
    divisor = 1000;
    cientos = Math.floor(num / divisor)
    resto = num - (cientos * divisor)

    strMiles = Seccion(num, divisor, "UN MIL", "MIL");
    strCentenas = Centenas(resto);

    if(strMiles == "")
      return strCentenas;

    return strMiles + " " + strCentenas;

    //return Seccion(num, divisor, "UN MIL", "MIL") + " " + Centenas(resto);
  }//Miles()

  function Millones(num){
    divisor = 1000000;
    cientos = Math.floor(num / divisor)
    resto = num - (cientos * divisor)

    strMillones = Seccion(num, divisor, "UN MILLÓN", "MILLONES");
    strMiles = Miles(resto);

    if(strMillones == "")
      return strMiles;

    return strMillones + " " + strMiles;

    //return Seccion(num, divisor, "UN MILLON", "MILLONES") + " " + Miles(resto);
  }//Millones()

  function NumeroALetras(num){
    var data = {
      numero: num,
      enteros: Math.floor(num),
      centavos: (((Math.round(num * 100)) - (Math.floor(num) * 100))),
      letrasCentavos: "",
      letrasMonedaPlural: "",
      letrasMonedaSingular: ""
    };

    if (data.centavos > 0)
    {
      data.letrasCentavos = " " + data.centavos + "/100......Bolivianos";
    }
    else
    {
      data.letrasCentavos = " 00/100......Bolivianos";
    }

    if(data.enteros == 0)
      return "CERO " + data.letrasMonedaPlural + " " + data.letrasCentavos;
    if (data.enteros == 1)
      return Millones(data.enteros) + " " + data.letrasMonedaSingular + " " + data.letrasCentavos;
    else
      return Millones(data.enteros) + " " + data.letrasMonedaPlural + " " + data.letrasCentavos;
  }

    function NumeroALetrasPOS(num){
    var data = {
      numero: num,
      enteros: Math.floor(num),
      centavos: (((Math.round(num * 100)) - (Math.floor(num) * 100))),
      letrasCentavos: "",
      letrasMonedaPlural: "",
      letrasMonedaSingular: ""
    };

    if (data.centavos > 0)
    {
      data.letrasCentavos = " " + data.centavos + "/100......Bolivianos";
    }
    else
    {
      data.letrasCentavos = "00/100......Bolivianos";
    }

    if(data.enteros == 0)
      return "CERO " + data.letrasMonedaPlural + " " + data.letrasCentavos;
    if (data.enteros == 1)
      return Millones(data.enteros) + " " + data.letrasMonedaSingular + " " + data.letrasCentavos;
    else
      return Millones(data.enteros) + " " + data.letrasMonedaPlural + " " + data.letrasCentavos;
  }