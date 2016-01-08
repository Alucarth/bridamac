<?php
class MYPDF extends TCPDF {
	public function Footer() {
        $this->SetY(-15);
        $this->SetFont('helvetica', '', 8, false);
		$imgdata = base64_decode('/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAABkAAD/4QNtaHR0cDov
L25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENl
aGlIenJlU3pOVGN6a2M5ZCI/PiA8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4
OnhtcHRrPSJBZG9iZSBYTVAgQ29yZSA1LjUtYzAyMSA3OS4xNTQ5MTEsIDIwMTMvMTAvMjktMTE6
NDc6MTYgICAgICAgICI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5
OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHht
bG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdFJlZj0i
aHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlUmVmIyIgeG1sbnM6eG1w
PSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bXBNTTpPcmlnaW5hbERvY3VtZW50SUQ9
InhtcC5kaWQ6NkQ2NjhFMDUzOEFGRTUxMUI0NEJFODBBMEIwRDgyMTIiIHhtcE1NOkluc3RhbmNl
SUQ9InhtcC5paWQ6NDg5QjcwOUVBRjVDMTFFNTlGM0U5MDc3MDREQjhCQzYiIHhtcDpDcmVhdG9y
VG9vbD0iR0lNUCAyLjguMTAiPiA8eG1wTU06RG9jdW1lbnRJRCByZGY6cmVzb3VyY2U9InhtcC5k
aWQ6NDg5QjcwOUZBRjVDMTFFNTlGM0U5MDc3MDREQjhCQzYiLz4gPHhtcE1NOkRlcml2ZWRGcm9t
IHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6NkU2NjhFMDUzOEFGRTUxMUI0NEJFODBBMEIwRDgy
MTIiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6NkQ2NjhFMDUzOEFGRTUxMUI0NEJFODBBMEIw
RDgyMTIiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBh
Y2tldCBlbmQ9InIiPz7/7gAOQWRvYmUAZMAAAAAB/9sAhAABAQEBAQEBAQEBAQEBAQEBAQEBAQEB
AQEBAQEBAQEBAQEBAQEBAQEBAQEBAgICAgICAgICAgIDAwMDAwMDAwMDAQEBAQEBAQIBAQICAgEC
AgMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwP/wAARCAAk
AAoDAREAAhEBAxEB/8QAagABAQAAAAAAAAAAAAAAAAAACgkBAQAAAAAAAAAAAAAAAAAAAAAQAAED
AgIFCQkBAAAAAAAAAAYEBQcDCAIJABMUFxgBIxU1FjdXGTliM2SlZido2Ck6EQEAAAAAAAAAAAAA
AAAAAAAA/9oADAMBAAIRAxEAPwC+F4t5UnQVmwQZEsfS6bDoVJKC0gTmuKCjHGZSzGCWWpolMFAH
q1+LCx9H5JdnlKqSONKWn8aqK0o4O02hxUJFFRFiwcoII0AzWYK5XCsGavCSARucIo+HZGJ7B2kP
iJbDcvFw0+Bg9ccTPVxi4Hm0Xjx1ZIOPSdiQNTI6JqDv0UWjK9YhIKSenhbVWAEy6AUi/fdMwZ/F
rj0/TEHthQRAFpqFeKFgiQ4UgksYbhztqj1pbzWlFUqNqsymt9kKomaUCdQL4UmJnqVl6+lTrJ1F
MFb6ABO7PNEuwOC68q/sRtbytzotypbvJDtzHXGbolOltxQZFbeZ4RcAkoAkRVMjCzl7rWJ16mms
aKCNKtalqrkWNdPHr1GpC0HnUzz4SRL6BHmxe9MO/Lw6667qvY63+L0AuF73lDbz8wfpLzjd1HHm
U8Re6fhQ3UcSO1TVquhO133B7H7L2u2DbuZ2TV7XzuzaAiH+Uv5cf5ofpb06f2s+R6B//9k=');
		 $html = '<hr><table border="0">
			<tr>
			<td align="center">Servicio de Facturación <b>www.emizor.com</b> </td>
			</tr>

			</table>';
        $this->writeHTMLCell($w=0, $h=0, $x='', $y=155, $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);
		$this->Image('@'.$imgdata, '7', '72', '', '', '', 'www.emizor.com', 'T', false, 300, '', false, false, 0, false, false, false);

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
$pdf->AddPage('P', 'LETTER');
//contenido del recuadro
$html = '
	<table border="0" width="180">
	<tr>
		<td width="75" style="font-size:8px">NIT:</td>
		<td align="left" style="font-size:10px">: '.$nit.'</td>
	</tr>
	<tr>
		<td style="font-size:8px">FACTURA N&ordm;</td>
		<td align="left" style="font-size:10px">: '.$nfac.'</td>
	</tr>
	<tr>
		<td style="font-size:8px">AUTORIZACI&Oacute;N N&ordm;</td>
		<td align="left" style="font-size:10px">: '.$nauto.'</td>
	</tr>
	<tr><td></td></tr>

	</table>
';
//imprime el contenido de la variable html
$pdf->writeHTMLCell($w=0, $h=0, $x='137', $y='13', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);
//dibuja un rectangulo
$pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
$pdf->RoundedRect(135, 11, 64, 18, 2, '1111', null);
$imgdata = base64_decode($invoice->logo);
$pdf->Image('@'.$imgdata, '19', '6', 80, 24, '', '', 'T', false, 300, '', false, false, 0, false, false, false);
///title
$anchoDivFac = 480;
if($invoice->type_third==0)
{
    $factura = "FACTURA";
    $tercero ="";
}
else{
    $factura = "FACTURA POR TERCEROS";
    $tercero = $matriz->name;
	$anchoDivFac = 520;
}
if($invoice->anulado == 1){
	$factura = "FACTURA ANULADA";
	$tercero ="";
}
$titleFactura='<table>
<tr>
<td align="center" width="'.$anchoDivFac.'"><font color="#000">'.$factura.'</font></td>
</tr>
</table>';
$pdf->SetFont('helvetica', 'B' , 20);
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='48', $titleFactura, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);
$pdf->SetFont('helvetica', 'B' , 11);
//nombre de la empresa
$business = $invoice->account_name;
$unipersonal = $invoice->account_uniper;
$pdf->SetFont('helvetica', 'B', 11, false);
$NombreEmpresa = '
    <p style="line-height: 150%">
        <font color="#333333">
            '.$business.'
        </font>
    </p>';
$pdf->writeHTMLCell($w=0, $h=0, $x='10', $y='27', $NombreEmpresa, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);
$pdf->SetFont('helvetica', 'B', 8, false);
if($unipersonal!="")
    $pdf->writeHTMLCell($w=0, $h=0, $x='15', $y='36', 'De: '.$unipersonal, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);
$pdf->writeHTMLCell($w=0, $h=0, $x='15', $y='1', $tercero, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);
if($copia==1)
    $original = "COPIA";
else
$original = "ORIGINAL";


$pdf->SetFont('helvetica', 'B', 12);
    $original = '
        <p style="line-height: 150% ">
            '.$original.'
        </p>';
$pdf->writeHTMLCell($w=0, $h=0, $x='155', $y='36', $original, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);

//datos de la empresa
$casa = $matriz->name;
$dir_casa = $matriz->address2." - ".$matriz->address1;
$tel_casa = $matriz->work_phone;
$city_casa = $matriz->city." - Bolivia";
$city_casa0 = $matriz->city." - Bolivia";
if($matriz->city == $invoice->city && $invoice->branch_id != $matriz->id)
    $city_casa ="";
else
$city_casa = $city_casa;

$pdf->SetFont('helvetica', '', 8);

if($invoice->branch_id == $matriz->id || $branch_matriz == 0)
{
	$datoEmpresa = '
    <table border = "0">
        <tr>
        <td width="250" align="center">'.$casa.'</td>
        </tr>
        <tr>
        <td width="250" align="center">'.$dir_casa.' </td>
        </tr>
        <tr>
        <td width="250" align="center">Telfs: '.$tel_casa.'</td>
        </tr>
        <tr>
        	<td width="250" align="center">&nbsp;'.$city_casa0.'</td>
        </tr>
    </table>
		';
}

else{
	$sucursal = $invoice->branch_name;
	$direccion = $invoice->address2." - ".$invoice->address1;
	$ciudad = $invoice->city." - Bolivia";
	$telefonos =$invoice->phone;
	$datoEmpresa = '
    <table border = "0">
        <tr>
        	<td width="250" align="left" style="font-size:7px;"><b>'.$casa.'</b></td>
        </tr>
        <tr>
        	<td width="250" align="left" style="font-size:7px;">'.$dir_casa.'</td>
        </tr>
        <tr>
        	<td width="250" align="left" style="font-size:7px;">Telfs: '.$tel_casa.'</td>
        </tr>
				<tr>
						<td width="250" align="left" style="font-size:7px; line-height: 80%;">&nbsp;'.$city_casa.'</td>
        </tr>
					<tr>
        	<td width="250" align="left" style="font-size:7px;"><b>'.$sucursal.'</b></td>
        </tr>
        <tr>
        	<td width="250" align="left" style="font-size:7px;">'.$direccion.'</td>
        </tr>
        <tr>
        <td width="250" align="left" style="font-size:7px;">Telfs: '.$telefonos.'</td>
        </tr>
        <tr>
        <td width="250" align="left" style="font-size:7px;">&nbsp;'.$ciudad.'</td>
        </tr>

    </table>
		';
}

$pdf->writeHTMLCell($w=0, $h=0, $x='15', $y='32', $datoEmpresa, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);
//actividad econ�mica
$actividad=$invoice->economic_activity;
$pdf->SetFont('helvetica', '', 10);
$actividadEmpresa = '
    <table>
        <tr>
            <td align="center">'.$actividad.'</td>
        </tr>
    </table>';

$pdf->writeHTMLCell($w=0, $h=0, $x='130', $y='45', $actividadEmpresa, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);
//TABLA datos del cliente

$pdf->SetFont('helvetica', '', 11);

$meses = array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

$lenguage = 'es_ES.UTF-8';
putenv("LANG=$lenguage");
setlocale(LC_ALL, $lenguage);

//$date =date("d/m/Y", strtotime($invoice->invoice_date));
//$date = DateTime::createFromFormat("d/m/Y", $date);
//$fecha=strftime("%d de %B de %Y",$date->getTimestamp());

$date = DateTime::createFromFormat("d/m/Y", $invoice->invoice_date);
if($date== null){
    $date = DateTime::createFromFormat("Y-m-d", $invoice->invoice_date);
    $fecha = strftime("%d de %B de %Y",$date->getTimestamp());
}
else
    $fecha = strftime("%d de %B de %Y",$date->getTimestamp());



$fecha= $invoice->state.", ".$fecha;
$senor = $invoice->client_name;
$nit = $invoice->client_nit;
$matricula = $invoice->extralabel;

$datosCliente = '
<table cellpadding="2" border="0">
    <tr>
        <td width="320"><b>&nbsp;Lugar y fecha :</b>&nbsp;'.$fecha.'</td>
        <td width="200"><b>&nbsp;N&deg; de M&aacute;tricula :</b>&nbsp;'.$matricula.'</td>
    </tr>
    <tr>
        <td width="320"><b>&nbsp;Se&ntilde;or(es):</b> &nbsp;'.$senor .'</td>
        <td width="200"><b>NIT/CI :</b>&nbsp;'.$nit.'</td>
    </tr>

</table>
';
//$datosCliente="asdf";

$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='57', $datosCliente, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);

//dibuja rectangulo datos del cliente
$pdf->SetLineStyle(array('width' => 0.3, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
$pdf->RoundedRect(16, 57, 184, 14, 1, '1111', null);
$textTitulos = "";
$textTitulos .= '<p></p>
<table border="0.2" cellpadding="3" cellspacing="0">
    <thead>
        <tr>
         <td width="70" align="center" bgcolor="#E6DFDF"><font size="10"><b>C&Oacute;DIGO</b></font></td>
         <td width="355" align="center" bgcolor="#E6DFDF"><font size="10"><b>CONCEPTO</b></font></td>
         <td width="97" align="center" bgcolor="#E6DFDF"><font size="10"><b>SUBTOTAL</b></font></td>
        </tr>
    </thead>
</table>
';
$pdf->writeHTMLCell($w=0, $h=0, '', '65', $textTitulos, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);
//
$ini = 0;
$final = "";
$resto = $ini;
//for ($i=0;$i<=10;$i++)
//{
foreach ($products as $key => $product){
		$textContenido ='
        <table border="0.2" cellpadding="3" cellspacing="0">
		<tr>
		<td width="70" align="center"><font size="10">'.$product->product_key.'</font></td>
		<td width="355"><font size="10">'.$product->notes.'</font></td>
		<td width="97" align="center"><font size="10"> '.number_format((float)($product->cost*$product->qty), 2, '.', ',').'</font></td>
		</tr>
         </table>
		';
        $ini = $pdf->GetY(); //punto inicial antes de dibujar la siguiente fila

        if(($ini+$resto)>= 250.46944444444){

			$pdf->AddPage('P', 'LETTER');
            $pdf->writeHTMLCell($w=0, $h=0, '', '', $textContenido, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);
        }
        else{
        $pdf->writeHTMLCell($w=0, $h=0, '', '', $textContenido, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);
        $final = $pdf->GetY();  //punto hasta donde se dibujo la fila
        }
        $resto = $final-$ini; //diferencia entre $ini y $final para sacar el tama�o siguiente a dibujar
//}
}
$texPie = "";
$subtotal = number_format((float)$invoice->importe_total, 2, '.', ',');
$descuento= number_format((float)($invoice->importe_total-$invoice->importe_neto), 2, '.', ',');
$total = number_format((float)$invoice->importe_neto, 2, '.', ',');


$ice="0";


require_once(app_path().'/includes/numberToString.php');
$nts = new numberToString();
$num = explode(".", $invoice->importe_neto);
if(!isset($num[1]))
    $num[1]="00";
$literal= $nts->to_word($num[0]).substr($num[1],0,2);

if( $descuento > 0.00 ){
	$descuentoSi = '
			<table border="0.2" cellpadding="3" cellspacing="0">
				<tr>
                <td width="425" align="right"><b>SUBTOTAL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></td>
                <td  width="97" align="center"><b>'.$subtotal.'</b></td>
            </tr>
            <tr>
                <td width="425"  align="right"><b>Descuentos &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></td>
                <td width="97" align="center"><b>'.$descuento.'</b></td>
            </tr>
            </table>';
   $pdf->writeHTMLCell($w=0, $h=0, '', '', $descuentoSi, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);
}


$pdf->SetFont('helvetica', '', 11);
		$texPie .='
		<table border="0.2" cellpadding="3" cellspacing="0">

            <tr>
                <td width="425"  align="right"><b>TOTAL A PAGAR&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></td>
                <td width="97" align="center"><b>'.$total.'</b></td>
            </tr>

            <tr>
                <td colspan="2" style="font-size:9px"><b>Son: </b>'.$literal.'/100 BOLIVIANOS.</td>
            </tr>
		</table>
		';
        if ($pdf->GetY() >= '210.6375' ){

            $pdf->AddPage('P', 'LETTER');
        }

$pdf->writeHTMLCell($w=0, $h=0, '', '', $texPie, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);
//nota al cliente
$restoQr = 11;
$line=60;
if (!empty($invoice->public_notes)){
$nota = $invoice->public_notes;
$notaCliente = '

		<table style="padding:0px 0px 0px 5px" border="0">
		<tr>
			<td style="line-height: '.$line.'%"> </td>
		</tr>
		<tr>
			<td width="88" align="right" style="font-size:9px;"><b>Nota al Cliente:</b></td>
			<td width="352" align="left" bgcolor="#F2F2F2" style="font-size:9px; border-left: 1px solid #000;">'.$nota.'</td>
		</tr>
		</table>
';
$pdf->writeHTMLCell($w=0, $h=0, '', '', $notaCliente, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);
$restoQr=$restoQr+10;
$line=100;
}
if (!empty($invoice->terms)){
$nota = $invoice->public_notes;
$terminos = $invoice->terms;
$termCliente = '
		<table style="padding:0px 0px 0px 5px">
		<tr><td style="line-height: '.$line.'%"> </td></tr>
		<tr>
			<td width="88" align="right" style="font-size:9px"><b>T&eacute;rminos de Facturaci&oacute;n: </b></td>
			<td width="352" align="left" bgcolor="#F2F2F2" style="font-size:9px; border-left: 1px solid #000; ">'.$terminos.'</td>
		</tr>
		</table>
';
$pdf->writeHTMLCell($w=0, $h=0, '', '', $termCliente, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);
$restoQr=$restoQr+11;
$line=50;
}

$control_code = $invoice->control_code;
$fecha_limite = date("d/m/Y", strtotime($invoice->deadline));
$fecha_limite = \DateTime::createFromFormat('Y-m-d',$invoice->deadline);
if($fecha_limite== null)
    $fecha_limite = $invoice->deadline;
else
    $fecha_limite = $fecha_limite->format('d/m/Y');

$law_gen="ESTA FACTURA CONTRIBUYE AL DESARROLLO DEL PAÍS, EL USO ILÍCITO DE ÉSTA SERÁ SANCIONADO DE ACUERDO A LEY";

$law=$invoice->law;
$datosFactura = '
<table border="0" style="line-height: 160%">
	<tr><td style="line-height: '.$line.'%"> </td></tr>
    <tr>
        <td width="240" align="left"><b>C&Oacute;DIGO DE CONTROL :&nbsp;&nbsp;'.$control_code.'</b></td>
        <td width="210" align="left"><b>Fecha L&iacute;mite de Emisi&oacute;n : &nbsp;'.$fecha_limite.' </b></td>
    </tr>
    <tr>
        <td width="450" align="center" style="font-size:7px"><b>"'.$law_gen.'"</b></td>
    </tr>
    <tr>
        <td width="440" align="center" style="font-size:7px">"'.$law.'"</td>
    </tr>
</table>
';
if ($pdf->GetY() >= '226.6375' ){
		$pdf->AddPage('P', 'LETTER');
		if(!empty($nota) && !empty($terminos)){
			$restoQr = $restoQr - 18;
		}
    }

$subtotal = number_format((float)$invoice->importe_total, 2, '.', '');
$descuento= number_format((float)($invoice->importe_total-$invoice->importe_neto), 2, '.', '');
$total = number_format((float)$invoice->importe_neto, 2, '.', '');
$fiscal=$total;
$pdf->writeHTMLCell($w=0, $h=0, '', '', $datosFactura, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);

$date_qr = date("d/m/Y", strtotime($invoice->invoice_date));
$date_qr = \DateTime::createFromFormat('Y-m-d',$invoice->invoice_date);
if($date_qr== null)
    $date_qr = $invoice->invoice_date;
else
    $date_qr = $date_qr->format('d/m/Y');

if($descuento == '0.00')
    $descuento = 0;
$datosqr = $invoice->account_nit.'|'.$invoice->invoice_number.'|'.$invoice->number_autho.'|'.$date_qr.'|'.$total.'|'.$fiscal.'|'.$invoice->control_code.'|'.$invoice->client_nit.'|'.$ice.'|0|0|'.$descuento;
$pdf->write2DBarcode($datosqr, 'QRCODE,M', '175',
$pdf->GetY()-$restoQr, 25, 25, '', 'N');

//Close and output PDF document
$pdf->Output('factura.pdf', 'I');

die;
?>
