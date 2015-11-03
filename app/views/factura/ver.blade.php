<?php

class MYPDF extends TCPDF {	
	public function Footer() {	
        
		$this->SetY(-20);		
        //$this->SetFont('helvetica', 'B', 10, false);    
        $this->writeHTMLCell($w=0, $h=0, $x='20', $y='285', "<hr>", $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);
        $html = "Sistema de facturaci&oacute;n brindado por <a href='www.emizor.com'>www.emizor.com</a>";
        //$this->writeHTMLCell($w=0, $h=0, $x='0', $y='2', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);
		$this->SetFont('helvetica', 'I', 8);		
        //if($this->getAliasNbPages()!=1)
		//$this->Cell(0, 10, 'Pag '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
        $this->SetFont('helvetica', 'B', 8, false);    
        //$html = "<a href='www.emizor.com'>www.emizor.com</a>";
        //$this->writeHTMLCell($w=0, $h=0, $x='70', $y='285', $html2, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);
        $this->writeHTMLCell($w=0, $h=0, $x='70', $y='285', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);
        
        //$imgdata = "/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAAA8AAD/4QMyaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/PiA8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJBZG9iZSBYTVAgQ29yZSA1LjUtYzAyMSA3OS4xNTQ5MTEsIDIwMTMvMTAvMjktMTE6NDc6MTYgICAgICAgICI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdFJlZj0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlUmVmIyIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjkzQTIyNjc1Nzk4QTExRTVCMkY2QUJGQkRENEU0QTgzIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjkzQTIyNjc0Nzk4QTExRTVCMkY2QUJGQkRENEU0QTgzIiB4bXA6Q3JlYXRvclRvb2w9IkFkb2JlIFBob3Rvc2hvcCBDQyAoV2luZG93cykiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmRpZDo5YjlkOWNhNC03NDQxLWE1NGItODQwNi1iNGNjOWQyZGEzYTEiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6OWI5ZDljYTQtNzQ0MS1hNTRiLTg0MDYtYjRjYzlkMmRhM2ExIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+/+4ADkFkb2JlAGTAAAAAAf/bAIQABgQEBAUEBgUFBgkG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";
        //$this->Image('@'.$imgdata, '', '', 7, 5, '', '', 'T', false, 300, '', false, false, 0, false, false, false);
        //$this->Image('@'.$imgdata, '', '', 5, 5, '', '', 'T', false, 300, '', false, false, 0, false, false, false);
        
        //$this->Image('http://key4design.co.uk/chandlers/images/chandlers_footer.jpg', 100, 350);
// reset pointer to the last page

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
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.$sfc.' <br>
    </p>';
//$html = $nauto;
//imprime el contenido de la variable html
$pdf->writeHTMLCell($w=0, $h=0, $x='123', $y='5', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);
//dibuja un rectangulo
$pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
$pdf->RoundedRect(124, 5, 75, 28, 2, '1111', null);

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
$unipersonal = $invoice->account_uniper;
$pdf->SetFont('helvetica', 'B', 22, false);
$NombreEmpresa = '
    <p style="line-height: 150%">
        <font color="#333333">
            '.$business.'
        </font>
    </p>';
$pdf->writeHTMLCell($w=0, $h=0, $x='4', $y='5', $NombreEmpresa, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);
$pdf->SetFont('helvetica', 'B', 8, false);
if($unipersonal!="")
    $pdf->writeHTMLCell($w=0, $h=0, $x='15', $y='15', 'De: '.$unipersonal, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);
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
$dir_casa = $matriz->address1." - ".$matriz->address2;
$tel_casa = $matriz->work_phone;
$city_casa = $matriz->city." - Bolivia";
if($matriz->city == $invoice->city && $invoice->branch_id != $matriz->id)
    $city_casa ="";
else
$city_casa = '<tr>
        <td width="220" align="left">'.$city_casa.'</td>
        </tr>';
        $pdf->SetFont('helvetica', '', 8);
        
if($invoice->branch_id == $matriz->id)
{	
	$datoEmpresa = '
    <table border = "0">
        <tr>
        <td width="220" align="left"><b>'.$casa.'</b></td>
        </tr>
        <tr>
        <td width="220" align="left">'.$dir_casa.' </td>
        </tr>
        <tr>
        <td width="220" align="left">Telfs: '.$tel_casa.'</td>
        </tr>
        '.$city_casa.'        
    </table>				';
}
else{
	$sucursal = $invoice->branch_name;
	$direccion = $invoice->address1." - ".$invoice->address2;
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
//actividad econÃ³mica
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
//setlocale(LC_ALL,"es_ES");
//$lenguage = 'es_ES.UTF-8';
//putenv("LANG=$lenguage");
//setlocale(LC_ALL, $lenguage);

$string = $invoice->invoice_date;
$date =date("d/m/Y", strtotime($invoice->invoice_date));
$meses = array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
$mss= intval(substr($date, 3,2));
$date = DateTime::createFromFormat("d/m/Y", $date);

$date_for=strftime("%d de ".$meses[$mss]." de %Y",$date->getTimestamp());
//$date_for= $date;

//$date_for->format('Y-m-d');
//setlocale(LC_ALL,"es_ES");
//$year = substr($date_for, 1,4);



 
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
        $resto = $final-$ini; //diferencia entre $ini y $final para sacar el tamaÃ±o siguiente a dibujar
}

$texPie = "";
$subtotal = number_format((float)$invoice->importe_neto, 2, '.', '');
$descuento= number_format((float)$invoice->descuento_total, 2, '.', '');
$total = number_format((float)$invoice->importe_total, 2, '.', '');
$fiscal="0";
$ice="0";


require_once(app_path().'/includes/numberToString.php');
$nts = new numberToString();
$num = explode(".", $total);

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
