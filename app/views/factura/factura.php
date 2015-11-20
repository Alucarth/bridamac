<?php

class MYPDF extends TCPDF {	
	public function Footer() {		
		$this->SetY(-15);		
		$this->SetFont('helvetica', 'I', 8);		
		$this->Cell(0, 10, 'Pag '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	}
}
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('ipxserver');
$pdf->SetTitle('Factura');
$pdf->SetSubject('Primera Factura');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set margins
$pdf->SetMargins(15, 20, 15);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// borra la linea de arriba en el area del header
$pdf->setPrintHeader(false); 
// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set some language-dependent strings (optional)
if (@file_exists('/includes/tcpdf/examples/lang/spa.php')) {
	require_once('/includes/tcpdf/examples/lang/spa.php');
	$pdf->setLanguageArray($l);
}

$pdf->SetFont('helvetica', 'B' , 11);
$nit = $invoice->account_nit;
$nfac = $invoice->invoice_number;
$nauto = $invoice->number_autho;
$sfc = $invoice->sfc;
// add a page
$pdf->AddPage();
//contenido del recuadro
$html = '<p style="line-height: 175%">
        NIT &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: '.$nit.' <br>
        AUTORIZACI&Oacute;N N&ordm;  &nbsp;: '.$nauto.'  <br>
        FACTURA N&ordm; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: '.$nfac.' <br>
        SFC &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: '.$sfc.' <br>
    </p>';
//$html = $nauto;
//imprime el contenido de la variable html
$pdf->writeHTMLCell($w=0, $h=0, $x='125', $y='5', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);
//dibuja un rectangulo
$pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
$pdf->RoundedRect(126, 5, 75, 28, 2, '1111', null);

$imgdata = base64_decode($invoice->logo);
$pdf->Image('@'.$imgdata, '14', '18', 30, 30, '', '', 'T', false, 300, '', false, false, 0, false, false, false);
///title

if($invoice->type_third==0)
{
    $factura = "FACTURA";
    $tercero ="";
}
else{
    $factura = "FACTURA POR TERCEROS";
    $tercero = $invoice->branch;
}

$titleFactura='<table>
<tr>
<td align="center"><font color="#333333">'.$factura.'</font></td>
</tr>
</table>';
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='50', $titleFactura, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);

//nombre de la empresa
$business = $invoice->account_name;
$pdf->SetFont('helvetica', 'B', 22, false);
$NombreEmpresa = '
    <p style="line-height: 150%">
        <font color="#333333">
            '.$business.'
        </font>
    </p>';
$pdf->writeHTMLCell($w=0, $h=0, $x='4', $y='5', $NombreEmpresa, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);
$pdf->SetFont('helvetica', 'B', 10, false);
$pdf->writeHTMLCell($w=0, $h=0, $x='15', $y='1', $tercero, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);
//original scf-1 roy
$pdf->SetFont('helvetica', 'B', 12);
    $original = '
        <p style="line-height: 150% ">
            ORIGINAL
        </p>';
$pdf->writeHTMLCell($w=0, $h=0, $x='155', $y='34', $original, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);

//datos de la empresa
$casa = $matriz->name;
$dir_casa = $matriz->address2." - ".$matriz->address1;
$tel_casa = $matriz->work_phone;
$city_casa = $matriz->city." - Bolivia";
if($matriz->city == $invoice->city)
    $city_casa ="";
else
$city_casa = '<tr>
        <td width="220" align="left">'.$city_casa.'</td>
        </tr>';
        $pdf->SetFont('helvetica', '', 8);
        
if($invoice->branch_id == 1)
{	
	$datoEmpresa = '
    <table border = "0">
        <tr>
        <td width="220" align="left"><b>'.$casa.'</b></td>
        </tr>
        <tr>
        <td width="220" align="left">'.$dir_casa.'</td>
        </tr>
        <tr>
        <td width="220" align="left">Telfs: '.$tel_casa.'</td>
        </tr>
        '.$city_casa.'        
    </table>				';
}
else{
	$sucursal = $invoice->branch_name;
	$direccion = $invoice->address2." ".$invoice->address1;
	$ciudad = $invoice->city." - Bolivia";
	$telefonos =$invoice->phone;
	$datoEmpresa = '
    <table border = "0">
        <tr>
        <td width="220" align="left"><b>'.$casa.'</b></td>
        </tr>
        <tr>
        <td width="220" align="left">'.$dir_casa.'</td>
        </tr>
        <tr>
        <td width="220" align="left">Telfs: '.$tel_casa.'</td>
        </tr>
        '.$city_casa.'
        <tr>
        <td width="220" align="left"><b>'.$sucursal.'</b></td>
        </tr>
        <tr>
        <td width="220" align="left">'.$direccion.'</td>
        </tr>
        <tr>
        <td width="220" align="left">Telfs: '.$telefonos.'</td>
        </tr>
        <tr>
        <td width="220" align="left">'.$ciudad.'</td>
        </tr>
    </table>				';
} 




$pdf->writeHTMLCell($w=0, $h=0, $x='44', $y='18', $datoEmpresa, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);
//actividad económica
$actividad=$invoice->economic_activity;
$pdf->SetFont('helvetica', '', 10);
$actividadEmpresa = '
    <table>
        <tr>
            <td align="center">'.$actividad.'</td>
        </tr>
    </table>';

$pdf->writeHTMLCell($w=0, $h=0, $x='130', $y='40', $actividadEmpresa, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);
//TABLA datos del cliente

$pdf->SetFont('helvetica', '', 11);
//$date_for =new date($invoice->invoice_date);
setlocale(LC_ALL,"es_ES");
$string = $invoice->invoice_date;
$date =date("d/m/Y", strtotime($invoice->invoice_date));
$date = DateTime::createFromFormat("d/m/Y", $date);

$date_for=strftime("%d de %B de %Y",$date->getTimestamp());
        

//$date_for->format('Y-m-d');
//setlocale(LC_ALL,"es_ES");
//$year = substr($date_for, 1,4);

$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 
$fecha= $invoice->state.", ".$date_for;

//$fecha = $date_for->format('Y-m-d H:i:s');

$senor = $invoice->client_name;
$nit = $invoice->client_nit;

$datosCliente = '
<table cellpadding="2" border="0">
    <tr>
        <td width="300"><b>&nbsp;Lugar y fecha :</b>'.$fecha.'</td>
        <td width="220" align="right"><b>NIT/CI :</b>'.$nit.'</td>
    </tr>
    <tr>
        <td colspan="2"><b>&nbsp;Se&ntilde;or(es):</b> '.$senor .'</td>
    </tr>
    
</table>
';
//$datosCliente="asdf";

$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='62', $datosCliente, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);

//dibuja rectangulo datos del cliente
$pdf->SetLineStyle(array('width' => 0.3, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
$pdf->RoundedRect(16, 62, 184, 14, 1, '1111', null);
$textTitulos = "";
$textTitulos .= '<p></p>
<table border="0.2" cellpadding="3" cellspacing="0">
    <thead>
        <tr>
         <td width="70" align="center" bgcolor="#E6DFDF"><font size="10"><b>CANTIDAD</b></font></td>
         <td width="240" align="center" bgcolor="#E6DFDF"><font size="10"><b>CONCEPTO</b></font></td>
         <td width="115" align="center" bgcolor="#E6DFDF"><font size="10"><b>PRECIO UNITARIO</b></font></td>
         <td width="97" align="center" bgcolor="#E6DFDF"><font size="10"><b>TOTAL</b></font></td>
        </tr>
    </thead>
</table>
';
$pdf->writeHTMLCell($w=0, $h=0, '', '', $textTitulos, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);			
//
$ini = 0;
$final = "";
$resto = $ini;

foreach ($products as $key => $product){
		$textContenido ='
        <table border="0.2" cellpadding="3" cellspacing="0">
		<tr>
		<td width="70" align="center"><font size="10">'.intval($product->qty).'</font></td>
		<td width="240"><font size="10">'.$product->notes.'</font></td>
		<td width="115" align="right"><font size="10">'.number_format((float)$product->cost, 2, '.', '').'</font></td>
		<td width="97" align="right"><font size="10"> '.number_format((float)($product->cost*$product->qty), 2, '.', '').'</font></td>
		</tr>
         </table>
		';
        $ini = $pdf->GetY(); //punto inicial antes de dibujar la siguiente fila
        
        if(($ini+$resto)>= 250.46944444444){
            $pdf->AddPage();
            $pdf->writeHTMLCell($w=0, $h=0, '', '', $textContenido, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);
        }
        else{
        $pdf->writeHTMLCell($w=0, $h=0, '', '', $textContenido, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);
        $final = $pdf->GetY();  //punto hasta donde se dibujo la fila
        }
        $resto = $final-$ini; //diferencia entre $ini y $final para sacar el tamaño siguiente a dibujar
}

$texPie = "";
$subtotal = number_format((float)$invoice->importe_neto, 2, '.', '');
$descuento= number_format((float)$invoice->descuento_total, 2, '.', '');
$total = number_format((float)$invoice->importe_total, 2, '.', '');
$fiscal="0";
$ice="0";


require_once(app_path().'/includes/numberToString.php');
$nts = new numberToString();
$num = explode(".", $invoice->importe_total);

$literal= $nts->to_word($num[0]).substr($num[1],0,2);
            
$pdf->SetFont('helvetica', '', 11);
		$texPie .='
		<table border="0.2" cellpadding="3" cellspacing="0">
            <tr>
                <td width="425" align="right"><b>SUBTOTAL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></td>
                <td  width="97" align="right"><b>'.$subtotal.'</b></td>
            </tr>
            <tr>
                <td width="425"  align="right"><b>Descuentos &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></td>
                <td width="97" align="right"><b>'.$descuento.'</b></td>
            </tr>
            <tr>
                <td width="425"  align="right"><b>TOTAL A PAGAR&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></td>
                <td width="97" align="right"><b>'.$total.'</b></td>
            </tr>            

            <tr>
                <td colspan="2"><b>Son: </b>'.$literal.'/100.....BOLIVIANOS.</td>
            </tr>
		</table>
		';
        if ($pdf->GetY() >= '210.6375' ){

            $pdf->AddPage();
        }
        
$pdf->writeHTMLCell($w=0, $h=0, '', '', $texPie, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);
//salto de pagina	



$control_code = $invoice->control_code;
$fecha_limite = date("d/m/Y", strtotime($invoice->deadline));

$law_gen="ESTA FACTURA CONTRIBUYE AL DESARROLLO DEL PAIS, EL USO ILICITO DE ESTA SERA SANCIONADO DE ACUERDO A LEY";
$law=$invoice->law;
$datosFactura = '
<table border="0">
    <tr><br>
        <td width="460" align="left"><b>C&Oacute;DIGO DE CONTROL :&nbsp;&nbsp;&nbsp;&nbsp; '.$control_code.'</b></td>
        <td width="92" rowspan="6">
    </td>
    </tr>
    <tr>
        <td width="460" align="left" style="line-height: 300%"><b>Fecha L&iacute;mite de Emisi&oacute;n : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$fecha_limite.' </b></td>
    </tr>
    <tr>
        <td width="440" align="center" style="font-size:8px"><b>"'.$law_gen.'"</b></td>
    </tr>
    <tr><td></td></tr>
    
    <tr>
        <td width="440" align="center" style="font-size:7px">"'.$law.'"</td>
    </tr>
</table>
';
if ($pdf->GetY() >= '210.6375' ){
            $pdf->AddPage();
        }
$pdf->writeHTMLCell($w=0, $h=0, '', '', $datosFactura, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);
//qr roy
$date_qr =date("d/m/Y", strtotime($invoice->invoice_date));
if($descuento=="0.00")
    $descuento=0;
$datosqr = $invoice->account_nit.'|'.$invoice->invoice_number.'|'.$invoice->number_autho.'|'.$date_qr.'|'.$total.'|'.$fiscal.'|'.$invoice->control_code.'|'.$invoice->client_nit.'|'.$ice.'|0|0|'.$descuento;
$pdf->write2DBarcode($datosqr, 'QRCODE,L', '175', 
$pdf->GetY()-33, 25, 25, '', 'N');

//Close and output PDF document
$pdf->Output('factura.pdf', 'I');

//============================================================+
// END OF FILE (^_^)
//============================================================+
die;
?>
