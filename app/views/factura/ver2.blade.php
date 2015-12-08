<?php

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('ipxserver');
$pdf->SetTitle('Factura');
$pdf->SetSubject('Primera Factura');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
$pdf->SetMargins(0.5, 0.5, 0.5);
$pdf->setPrintHeader(false); 
$pdf->setPrintFooter(false); 
$pdf->SetFont('helvetica', '' , 7);
$page_format = array(
    'MediaBox' => array ('llx' => 0, 'lly' => 0, 'urx' => 72, 'ury' => 1000),
    'Dur' => 3,   
);
$business = $invoice->account_name;
if($invoice->account_uniper !='')
    $unipersonal = '<tr><td align="center">De: '.$invoice->account_uniper.'</td></tr>';
else
    $unipersonal="";
// Check the example n. 29 for viewer preferences
$pdf->AddPage('P', $page_format, false, false);
$sucursal = $invoice->branch_name;
$direccion = $invoice->address1." - ".$invoice->address2;
$ciudad = $invoice->city." - Bolivia";
$telefonos =$invoice->phone;

$html = '
<table>
	<tr>
		<td align="center" style="font-size:10px; "><b>'.$business.'</b></td>
	</tr>
        '.$unipersonal.'
        <tr>
		<td align="center">'.$sucursal.'</td>
	</tr><tr>
		<td align="center">'.$direccion.'</td>
	</tr><tr>
		<td align="center">Telefono: '.$telefonos.'</td>
	</tr><tr>
		<td align="center">'.$ciudad.'</td>
	</tr>
</table>
';
//imprime el contenido de la variable html
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);
if($copia==1)
    $original = "COPIA";
else
$original = "ORIGINAL";
$pdf->SetFont('times', 'B' , 10);
$fact = '<br><br><table>
<tr>
    <td align="center" style="font-size:11px;">
		FACTURA
	</td>
</tr>
<tr>
	<td align="center">
		'.$original.'
	</td>
</tr>
</table>
'
;
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $fact, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);
$lin = " ";

$pdf->SetFont('helvetica', ' ' , 8);
for ($i=0;$i<72;$i++)$lin .= '-';
	
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $lin, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);
//DATOS FACTURA
$pdf->SetFont('helvetica', ' ' , 8);
$nitEmpresa = $invoice->account_nit; 
$nfac = $invoice->invoice_number;
$nauto = $invoice->number_autho;

$datosfac = '
	<table border="0">
		<tr>
			<td align="left">NIT : </td>
			<td align="left">'.$nitEmpresa.'</td>
		</tr>
		<tr>
			<td align="left">FACTURA No : </td>
			<td align="left">'.$nfac.'</td>
		</tr>
		<tr>
			<td align="left">AUTORIZACION No :   </td>
			<td align="left">'.$nauto.'</td>
		</tr>
	</table>
';
$pdf->writeHTMLCell($w=0, $h=0, $x='10', $y='', $datosfac, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);
//linea
$pdf->SetFont('helvetica', ' ' , 8);
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $lin, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);

//actividad economica
$pdf->SetFont('times', 'B' , 9);
$actividad=$invoice->economic_activity;
$acti = '
	<table align="center">
		<tr>
			<td>ACTIVIDAD ECON&Oacute;MICA</td>
		</tr>
		<tr>
			<td>'.$actividad.'</td>
		</tr>
	</table>
';
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $acti, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);
$pdf->SetFont('helvetica', '' , 8);
$date = DateTime::createFromFormat("Y-m-d", $invoice->invoice_date);
if($date==null)
    $date = DateTime::createFromFormat("d/m/Y", $invoice->invoice_date);
$fecha = $date->format('d/m/Y');
$senor = $invoice->client_name;
$nit = $invoice->client_nit;
$hora = $date->format('H:i:s');

$datosCli = '<br>
	<table border="1">
		<tr>
			<td align="left" width="40">Fecha : </td>
			<td align="left">'.$fecha.'</td>
			<td align="right" width="30">Hora : </td>
			<td align="left">'.$hora.'</td>
		</tr>
		<tr>
			<td align="left" width="40">NIT/CI : </td>
			<td align="left">'.$nit.'</td>
		</tr>
		<tr>
			<td align="left" width="40">Nombre :   </td>
			<td align="left">'.$senor.'</td>
		</tr>
	</table>
';
$pdf->writeHTMLCell($w=0, $h=0, $x='9', $y='', $datosCli, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);
//tabla
$htmlTabla = '
	<table border="1">
		<tr>
			<td align="center">Cantidad</td>
			<td align="center">Precio</td>
			<td align="center">Importe</td>
		</tr>
	</table>
<p style="line-height: 30%">
    </p>';
	
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $htmlTabla, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);


foreach ($products as $key => $product){
	$htmlTabla2 = '
		<table border="0">
			<tr>
				<td colspan="3">'.$product->notes.'</td>
			</tr>
			<tr>
				<td align="center">'.intval($product->qty).'</td>
				<td align="center">'.number_format((float)$product->cost, 2, '.', ',').'</td>
				<td align="center">'.number_format((float)($product->cost*$product->qty), 2, '.', ',').'</td>
			</tr>
		</table>
	';
	$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $htmlTabla2, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);
}
//total
$total = number_format((float)$invoice->importe_neto, 2, '.', ',');
$htmlTotal = '<hr>
	<table>
		<tr>
			<td align="right" width="173"><b>TOTAL: Bs '.$total.'</b></td>
		</tr>
	</table>
';
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $htmlTotal, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);
//TOTALES
$ice = number_format((float)($invoice->importe_ice), 2, '.', ',');
$descuento= number_format((float)($invoice->importe_total-$invoice->importe_neto), 2, '.', ',');
$importeCreditoFiscal = number_format((float)($invoice->debito_fiscal), 2, '.', ',');
$fiscal =$importeCreditoFiscal;
$montoPagar = number_format((float)$invoice->importe_neto, 2, '.', ',');
require_once(app_path().'/includes/numberToString.php');
$nts = new numberToString();
$num = explode(".", $invoice->importe_neto);
if(!isset($num[1]))
    $num[1]="00";
$literal= $nts->to_word($num[0]).substr($num[1],0,2);



$htmlDatosExtra = '
	<table>
		<tr>
			<td>ICE: '.$ice.'</td>
		</tr>
		<tr>
			<td>DESCUENTOS/BONIFICACION: '.$descuento.'</td>
		</tr>
		<tr>
			<td>IMPORTE BASE CREDITO FISCAL: '.$importeCreditoFiscal.'</td>
		</tr>
		<tr>
			<td>MONTO A PAGAR: Bs '.$montoPagar.'</td>
		</tr>
		<tr>
			<td>SON: '.$literal.'/100 BOLIVIANOS</td>
		</tr>
	</table>
';
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $htmlDatosExtra, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);

//linea
$pdf->SetFont('helvetica', ' ' , 8);
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $lin, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);
//CODIGO DE CONTROL
 
$control_code = $invoice->control_code;
$fecha_limite = date("d/m/Y", strtotime($invoice->deadline));
$fecha_limite = \DateTime::createFromFormat('Y-m-d',$invoice->deadline);
if($fecha_limite== null)
    $fecha_limite = $invoice->deadline;
else
    $fecha_limite = $fecha_limite->format('d/m/Y');
$law_gen='"'."ESTA FACTURA CONTRIBUYE AL DESARROLLO DEL PAÃ?S, EL USO ILÃ?CITO DE Ã‰STA SERÃ? SANCIONADO DE ACUERDO A LEY".'"';
$law=$invoice->law;

 $htmlControl = '
 	<table>
 		<tr>
 			<td>CODIGO DE CONTROL : '.$control_code.'</td>
 		</tr>
 		<tr>
 			<td>FECHA LÃ?MITE EMISIÃ“N : '.$fecha_limite.'</td>
 		</tr>

 	</table>
 	<br>

 ';
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $htmlControl, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);
//qr
$subtotal = number_format((float)$invoice->importe_total, 2, '.', '');
$descuento= number_format((float)($invoice->importe_total-$invoice->importe_neto), 2, '.', '');
$total = number_format((float)$invoice->importe_neto, 2, '.', '');
$date_qr = date("d/m/Y", strtotime($invoice->invoice_date));
$date_qr = \DateTime::createFromFormat('Y-m-d',$invoice->invoice_date);
if($date_qr== null)
    $date_qr = $invoice->invoice_date;
else
    $date_qr = $date_qr->format('d/m/Y');
if($descuento=="0.00")
    $descuento=0;
if($fiscal==0) $fiscal="0";
if($ice==0) $ice ="0";
if($descuento==0)$descuento="0";
$datosqr = $invoice->account_nit.'|'.$invoice->invoice_number.'|'.$invoice->number_autho.'|'.$date_qr.'|'.$total.'|'.$fiscal.'|'.$invoice->control_code.'|'.$invoice->client_nit.'|'.$ice.'|0|0|'.$descuento;
$pdf->write2DBarcode($datosqr, 'QRCODE,M', '24', '' , 25, 25, '', 'N');

$htmlLeyenda = '<br><br>
		<table>
			<tr>
				<td align="center"><b>'.$law_gen.'</b></td>
			</tr>
		</table>
';
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $htmlLeyenda, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);
$pdf->SetFont('times', ' ' , 9);
$emizor = '<br><br>
		<table>
			<tr>
				<td align="center">www.emizor.com</td>
			</tr>
		</table>
';
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $emizor, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);

$y = $pdf->GetY();
$y2 = intval($y) + 8;
//////pdf adaptado a nuevo tamaÃƒÂ±o//////////////////////////////////////////////////////////////////
$page_format2 = array(
    'MediaBox' => array ('llx' => 0, 'lly' => 0, 'urx' => 72, 'ury' => $y2),
    'Dur' => 3,
);
// add first page ---
$pdf2 = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
//Close and output PDF document
$pdf2->SetCreator(PDF_CREATOR);
$pdf2->SetAuthor('ipxserver');
$pdf2->SetTitle('Factura');
$pdf2->SetSubject('Primera Factura');
$pdf2->SetKeywords('TCPDF, PDF, example, test, guide');
// set margins
$pdf2->SetMargins(0.5, 0.5, 0.5);
// set auto page breaks
$pdf2->SetAutoPageBreak(TRUE, 0.5);
// borra la linea de arriba en el area del header
$pdf2->setPrintHeader(false); 
$pdf2->setPrintFooter(false); 
// set some language-dependent strings (optional)
if (@file_exists('/includes/tcpdf/examples/lang/spa.php')) {
	require_once('/includes/tcpdf/examples/lang/spa.php');
	$pdf->setLanguageArray($l);
}
$pdf2->SetFont('helvetica', '' , 7);
// add second page ---
$pdf2->AddPage('P', $page_format2, false, false);

$html = '
<table>
	<tr>
		<td align="center" style="font-size:10px; "><b>'.$business.'</b></td>
	</tr>
        '.$unipersonal.'
        <tr>
		<td align="center">'.$sucursal.'</td>
	</tr><tr>
		<td align="center">'.$direccion.'</td>
	</tr><tr>
		<td align="center">Telefono: '.$telefonos.'</td>
	</tr><tr>
		<td align="center">'.$ciudad.'</td>
	</tr>
</table>
';
//imprime el contenido de la variable html
$pdf2->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);

$pdf2->SetFont('times', 'B' , 10);
$fact = '<br><br><table>
<tr>
    <td align="center" style="font-size:11px;">
		FACTURA
	</td>
</tr>
<tr>
	<td align="center">
		'.$original.'
	</td>
</tr>
</table>
'
;
$pdf2->writeHTMLCell($w=0, $h=0, $x='', $y='', $fact, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);
$lin = " ";

$pdf2->SetFont('helvetica', ' ' , 8);
for ($i=0;$i<72;$i++)
{
	$lin .= '-';
	
}
$pdf2->writeHTMLCell($w=0, $h=0, $x='', $y='', $lin, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);
//DATOS FACTURA
$pdf2->SetFont('helvetica', ' ' , 8);


$datosfac = '
	<table border="0">
		<tr>
			<td align="left">NIT : </td>
			<td align="left">'.$nitEmpresa.'</td>
		</tr>
		<tr>
			<td align="left">FACTURA No : </td>
			<td align="left">'.$nfac.'</td>
		</tr>
		<tr>
			<td align="left">AUTORIZACION No :   </td>
			<td align="left">'.$nauto.'</td>
		</tr>
	</table>
';
$pdf2->writeHTMLCell($w=0, $h=0, $x='10', $y='', $datosfac, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);
//linea
$pdf2->SetFont('helvetica', ' ' , 8);
$pdf2->writeHTMLCell($w=0, $h=0, $x='', $y='', $lin, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);

//actividad economica
$pdf2->SetFont('times', 'B' , 9);

$acti = '
	<table align="center">
		<tr>
			<td>ACTIVIDAD ECON&Oacute;MICA</td>
		</tr>
		<tr>
			<td>'.$actividad.'</td>
		</tr>
	</table>
';
$pdf2->writeHTMLCell($w=0, $h=0, $x='', $y='', $acti, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);
//datos cliente
$pdf2->SetFont('helvetica', '' , 8);


$datosCli = '<br>
	<table border="0">
		<tr>
			<td align="left" width="40">Fecha : </td>
			<td align="left">'.$fecha.'</td>
			<td align="right" width="30">Hora : </td>
			<td align="left">'.$hora.'</td>
		</tr>
		<tr>
			<td align="left" width="40">NIT/CI : </td>
			<td colspan="3" align="left">'.$nit.'</td>
		</tr>
		<tr>
			<td align="left" width="40">Nombre :   </td>
			<td colspan="3" align="left">'.$senor.'</td>
		</tr>
	</table>
';
$pdf2->writeHTMLCell($w=0, $h=0, $x='9', $y='', $datosCli, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);

//tabla
$htmlTabla = '
	<table border="0">
		<tr>
			<td align="center">Cantidad</td>
			<td align="center">Precio</td>
			<td align="center">Subtotal</td>
		</tr>
	</table>
<p style="line-height: 30%">
    </p>';
	
$pdf2->writeHTMLCell($w=0, $h=0, $x='', $y='', $htmlTabla, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);

foreach ($products as $key => $product){
	$htmlTabla2 = '
		<table border="0">
			<tr>
				<td colspan="3">'.$product->notes.'</td>
			</tr>
			<tr>
				<td align="center">'.intval($product->qty).'</td>
				<td align="center">'.number_format((float)$product->cost, 2, '.', ',').'</td>
				<td align="center">'.number_format((float)($product->cost*$product->qty), 2, '.', ',').'</td>
			</tr>
		</table>
	';
	$pdf2->writeHTMLCell($w=0, $h=0, $x='', $y='', $htmlTabla2, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);
}

//total
$htmlTotal = '<hr>
	<table>
		<tr>
			<td align="right" width="173"><b>TOTAL: Bs '.$total.'</b></td>
		</tr>
	</table>
';
$pdf2->writeHTMLCell($w=0, $h=0, $x='', $y='', $htmlTotal, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);




$htmlDatosExtra = '
	<table>
		<tr>
			<td>ICE: '.$ice.'</td>
		</tr>
		<tr>
			<td>DESCUENTOS/BONIFICACIÃ“N: '.$descuento.'</td>
		</tr>
		<tr>
			<td>IMPORTE BASE CREDITO FISCAL: '.$importeCreditoFiscal.'</td>
		</tr>
		<tr>
			<td>MONTO A PAGAR: Bs '.$montoPagar.'</td>
		</tr>
		<tr>
			<td>SON: '.$literal.'/100 BOLIVIANOS</td>
		</tr>
	</table>
';
$pdf2->writeHTMLCell($w=0, $h=0, $x='', $y='', $htmlDatosExtra, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);

//linea
$pdf2->SetFont('helvetica', ' ' , 8);
$pdf2->writeHTMLCell($w=0, $h=0, $x='', $y='', $lin, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);


//CODIGO DE CONTROL
 
 $htmlControl = '
 	<table>
 		<tr>
 			<td><b>CÃ“DIGO DE CONTROL : '.$control_code.'</b></td>
 		</tr>
 		<tr>
 			<td><b>FECHA LÃ?MITE EMISIÃ“N : '.$fecha_limite.'</b></td>
 		</tr> 		
 	</table>
 	<br>

 ';
$pdf2->writeHTMLCell($w=0, $h=0, $x='', $y='', $htmlControl, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);

//qr
$pdf2->write2DBarcode($datosqr, 'QRCODE,M', '24', '' , 25, 25, '', 'N');

$htmlLeyenda = '<br><br>
		<table>
			<tr>
				<td align="center"><b>'.$law_gen.'</b></td>
			</tr>
		</table>
';
$pdf2->writeHTMLCell($w=0, $h=0, $x='', $y='', $htmlLeyenda, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);
$pdf2->SetFont('times', ' ' , 9);
$emizor = '<br><br>
		<table>
			<tr>
				<td align="center">www.emizor.com</td>
			</tr>
		</table>
';
$pdf2->writeHTMLCell($w=0, $h=0, $x='', $y='', $emizor, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);
$imgdata2 = base64_decode('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Ai0AAAAQAAAAAQAAAAAAEnByaW50T3V0cHV0T3B0aW9ucwAAABcAAAAAQ3B0bmJvb2wAAAAAAENsYnJib29sAAAAAABSZ3NNYm9vbAAAAAAAQ3JuQ2Jvb2wAAAAAAENudENib29sAAAAAABMYmxzYm9vbAAAAAAATmd0dmJvb2wAAAAAAEVtbERib29sAAAAAABJbnRyYm9vbAAAAAAAQmNrZ09iamMAAAABAAAAAAAAUkdCQwAAAAMAAAAAUmQgIGRvdWJAb+AAAAAAAAAAAABHcm4gZG91YkBv4AAAAAAAAAAAAEJsICBkb3ViQG/gAAAAAAAAAAAAQnJkVFVudEYjUmx0AAAAAAAAAAAAAAAAQmxkIFVudEYjUmx0AAAAAAAAAAAAAAAAUnNsdFVudEYjUHhsQFIAAAAAAAAAAAAKdmVjdG9yRGF0YWJvb2wBAAAAAFBnUHNlbnVtAAAAAFBnUHMAAAAAUGdQQwAAAABMZWZ0VW50RiNSbHQAAAAAAAAAAAAAAABUb3AgVW50RiNSbHQAAAAAAAAAAAAAAABTY2wgVW50RiNQcmNAWQAAAAAAAAAAABBjcm9wV2hlblByaW50aW5nYm9vbAAAAAAOY3JvcFJlY3RCb3R0b21sb25nAAAAAAAAAAxjcm9wUmVjdExlZnRsb25nAAAAAAAAAA1jcm9wUmVjdFJpZ2h0bG9uZwAAAAAAAAALY3JvcFJlY3RUb3Bsb25nAAAAAAA4QklNA+0AAAAAABAASAAAAAEAAgBIAAAAAQACOEJJTQQmAAAAAAAOAAAAAAAAAAAAAD+AAAA4QklNBA0AAAAAAAQAAAAeOEJJTQQZAAAAAAAEAAAAHjhCSU0D8wAAAAAACQAAAAAAAAAAAQA4QklNJxAAAAAAAAoAAQAAAAAAAAACOEJJTQP1AAAAAABIAC9mZgABAGxmZgAGAAAAAAABAC9mZgABAKGZmgAGAAAAAAABADIAAAABAFoAAAAGAAAAAAABADUAAAABAC0AAAAGAAAAAAABOEJJTQP4AAAAAABwAAD/////////////////////////////A+gAAAAA/////////////////////////////wPoAAAAAP////////////////////////////8D6AAAAAD/////////////////////////////A+gAADhC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SUQ9IjZCRTBCQjM4RjFEMEM0RDdBMEY1OTNENjM3NEMxRkI1IiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOkEzNkU1OTU0OEY5NEU1MTFBQTNGQjkwMzM5NDY2NkM4IiB4bXBNTTpPcmlnaW5hbERvY3VtZW50SUQ9IjZCRTBCQjM4RjFEMEM0RDdBMEY1OTNENjM3NEMxRkI1IiBkYzpmb3JtYXQ9ImltYWdlL2pwZWciIHBob3Rvc2hvcDpDb2xvck1vZGU9IjMiIHhtcDpDcmVhdGVEYXRlPSIyMDE1LTExLTI2VDE5OjUwOjAxLTA0OjAwIiB4bXA6TW9kaWZ5RGF0ZT0iMjAxNS0xMS0yNlQxOTo1NTo0NC0wNDowMCIgeG1wOk1ldGFkYXRhRGF0ZT0iMjAxNS0xMS0yNlQxOTo1NTo0NC0wNDowMCI+IDx4bXBNTTpIaXN0b3J5PiA8cmRmOlNlcT4gPHJkZjpsaSBzdEV2dDphY3Rpb249InNhdmVkIiBzdEV2dDppbnN0YW5jZUlEPSJ4bXAuaWlkOkEzNkU1OTU0OEY5NEU1MTFBQTNGQjkwMzM5NDY2NkM4IiBzdEV2dDp3aGVuPSIyMDE1LTExLTI2VDE5OjU1OjQ0LTA0OjAwIiBzdEV2dDpzb2Z0d2FyZUFnZW50PSJBZG9iZSBQaG90b3Nob3AgQ1M2IChXaW5kb3dzKSIgc3RFdnQ6Y2hhbmdlZD0iLyIvPiA8L3JkZjpTZXE+IDwveG1wTU06SGlzdG9yeT4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+ICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPD94cGFja2V0IGVuZD0idyI/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');
$pdf2->Image('@'.$imgdata2, '33', '', 5, 8, '', 'www.emizor.com', 'T', false, 300, '', false, false, 0, false, false, false);


$pdf2->Output('factura.pdf', 'I');
die();
?>
