<?php
/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Default Header and Footer
 * @author Ivan Aroa
 * @since 2015-11-13
 */
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('ipxserver');
$pdf->SetTitle('Factura');
$pdf->SetSubject('Primera Factura');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
// set margins
$pdf->SetMargins(0.5, 0.5, 0.5);
$pdf->setPrintHeader(false); 
$pdf->setPrintFooter(false); 
// set auto page breaks
// set some language-dependent strings (optional)
//if (@file_exists('/includes/tcpdf/examples/lang/spa.php')) {
//	require_once('/includes/tcpdf/examples/lang/spa.php');
//	$pdf->setLanguageArray($l);
//}
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

$pdf->SetFont('times', 'B' , 10);
$fact = '<br><br><table>
<tr>
	<td align="center">
		FACTURA
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
$nit = $invoice->account_nit;
$nfac = $invoice->invoice_number;
$nauto = $invoice->number_autho;

$datosfac = '
	<table border="0">
		<tr>
			<td align="left">NIT : </td>
			<td align="left">'.$nit.'</td>
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
$fecha = $date->format('d/m/Y');
$senor = $invoice->client_name;
$nit = $invoice->client_nit;
$hora = $date->format('H:i:s');

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
$law_gen='"'."ESTA FACTURA CONTRIBUYE AL DESARROLLO DEL PAIS, EL USO ILICITO DE ESTA SERA SANCIONADO DE ACUERDO A LEY".'"';
$law=$invoice->law;

 $htmlControl = '
 	<table>
 		<tr>
 			<td>CODIGO DE CONTROL : '.$control_code.'</td>
 		</tr>
 		<tr>
 			<td>FECHA LIMITE EMISION : '.$fecha_limite.'</td>
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
//////pdf adaptado a nuevo tamaÃ±o//////////////////////////////////////////////////////////////////
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
	<td align="center">
		FACTURA
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
			<td align="left">'.$nit.'</td>
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
			<td align="left">'.$nit.'</td>
		</tr>
		<tr>
			<td align="left" width="40">Nombre :   </td>
			<td align="left">'.$senor.'</td>
		</tr>
	</table>
';
$pdf2->writeHTMLCell($w=0, $h=0, $x='9', $y='', $datosCli, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);

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
$pdf2->writeHTMLCell($w=0, $h=0, $x='', $y='', $htmlDatosExtra, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);

//linea
$pdf2->SetFont('helvetica', ' ' , 8);
$pdf2->writeHTMLCell($w=0, $h=0, $x='', $y='', $lin, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);


//CODIGO DE CONTROL
 
 $htmlControl = '
 	<table>
 		<tr>
 			<td>CODIGO DE CONTROL : '.$control_code.'</td>
 		</tr>
 		<tr>
 			<td>FECHA LIMITE EMISION : '.$fecha_limite.'</td>
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

$pdf2->Output('factura.pdf', 'I');
die();
?>
