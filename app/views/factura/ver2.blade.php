<?php
class MYPDF extends TCPDF {
	public function Footer() {
        $this->SetY(-15);
        $this->SetFont('helvetica', '', 8, false);
		$imgdata = base64_decode('/9j/4AAQSkZJRgABAQEBLAEsAAD/4QSIRXhpZgAATU0AKgAAAAgABwESAAMAAAABAAEAAAEaAAUA
AAABAAAAYgEbAAUAAAABAAAAagEoAAMAAAABAAIAAAExAAIAAAAMAAAAcgEyAAIAAAAUAAAAfodp
AAQAAAABAAAAkgAAANQAAAEsAAAAAQAAASwAAAABR0lNUCAyLjguMTAAMjAxNjowMTowNyAxMjox
MDoyNgAABZAAAAcAAAAEMDIyMaAAAAcAAAAEMDEwMKABAAMAAAAB//8AAKACAAQAAAABAAAAKqAD
AAQAAAABAAAAlgAAAAAABgEDAAMAAAABAAYAAAEaAAUAAAABAAABIgEbAAUAAAABAAABKgEoAAMA
AAABAAIAAAIBAAQAAAABAAABMgICAAQAAAABAAADTgAAAAAAAABIAAAAAQAAAEgAAAAB/9j/4AAQ
SkZJRgABAQAAAQABAAD/2wBDAAgGBgcGBQgHBwcJCQgKDBQNDAsLDBkSEw8UHRofHh0aHBwgJC4n
ICIsIxwcKDcpLDAxNDQ0Hyc5PTgyPC4zNDL/2wBDAQkJCQwLDBgNDRgyIRwhMjIyMjIyMjIyMjIy
MjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjL/wAARCAAqAAsDASIAAhEBAxEB
/8QAHwAAAQUBAQEBAQEAAAAAAAAAAAECAwQFBgcICQoL/8QAtRAAAgEDAwIEAwUFBAQAAAF9AQID
AAQRBRIhMUEGE1FhByJxFDKBkaEII0KxwRVS0fAkM2JyggkKFhcYGRolJicoKSo0NTY3ODk6Q0RF
RkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKz
tLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uHi4+Tl5ufo6erx8vP09fb3+Pn6/8QAHwEAAwEBAQEB
AQEBAQAAAAAAAAECAwQFBgcICQoL/8QAtREAAgECBAQDBAcFBAQAAQJ3AAECAxEEBSExBhJBUQdh
cRMiMoEIFEKRobHBCSMzUvAVYnLRChYkNOEl8RcYGRomJygpKjU2Nzg5OkNERUZHSElKU1RVVldY
WVpjZGVmZ2hpanN0dXZ3eHl6goOEhYaHiImKkpOUlZaXmJmaoqOkpaanqKmqsrO0tba3uLm6wsPE
xcbHyMnK0tPU1dbX2Nna4uPk5ebn6Onq8vP09fb3+Pn6/9oADAMBAAIRAxEAPwD1bX9WutN1yL7L
O/l+Un2pHh8yOJC5Cv8AeUgkkjjPA9q6muI8Vi7/ALb86LSEvI7e3iKSbCWRzI3OOjqNoyD0yD61
29AHAeMWRvFllHMIVQQoyu5jUsd54y/XHHA55rv643xIt/N4hsprHVbWGKIbJEkuQvlnncSh+9kE
fTHvmuwSRJUV43V0YZDKcg0AeJXraazeKk1CMGVb5zbODh1kZn/Nfl5FelfD/wD5EbTP91//AEY1
aU+iaTPO8s2l2UkjnLO9uhLH1JIq/BDFbwJDBEkUSjCoihQB7AUAf//Z/+EK2mh0dHA6Ly9ucy5h
ZG9iZS5jb20veGFwLzEuMC8APD94cGFja2V0IGJlZ2luPSfvu78nIGlkPSdXNU0wTXBDZWhpSHpy
ZVN6TlRjemtjOWQnPz4KPHg6eG1wbWV0YSB4bWxuczp4PSdhZG9iZTpuczptZXRhLyc+CjxyZGY6
UkRGIHhtbG5zOnJkZj0naHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5z
Iyc+CgogPHJkZjpEZXNjcmlwdGlvbiB4bWxuczp4bXA9J2h0dHA6Ly9ucy5hZG9iZS5jb20veGFw
LzEuMC8nPgogIDx4bXA6Q3JlYXRvclRvb2w+QWRvYmUgUGhvdG9zaG9wIENTNiAoV2luZG93cyk8
L3htcDpDcmVhdG9yVG9vbD4KICA8eG1wOkNyZWF0ZURhdGU+MjAxNS0xMS0yN1QyMTowNzoxMi0w
NDowMDwveG1wOkNyZWF0ZURhdGU+CiAgPHhtcDpNb2RpZnlEYXRlPjIwMTYtMDEtMDVUMTI6MjQ6
MzUtMDQ6MDA8L3htcDpNb2RpZnlEYXRlPgogIDx4bXA6TWV0YWRhdGFEYXRlPjIwMTYtMDEtMDVU
MTI6MjQ6MzUtMDQ6MDA8L3htcDpNZXRhZGF0YURhdGU+CiA8L3JkZjpEZXNjcmlwdGlvbj4KCiA8
cmRmOkRlc2NyaXB0aW9uIHhtbG5zOmRjPSdodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4x
Lyc+CiAgPGRjOmZvcm1hdD5pbWFnZS9qcGVnPC9kYzpmb3JtYXQ+CiA8L3JkZjpEZXNjcmlwdGlv
bj4KCiA8cmRmOkRlc2NyaXB0aW9uIHhtbG5zOnBob3Rvc2hvcD0naHR0cDovL25zLmFkb2JlLmNv
bS9waG90b3Nob3AvMS4wLyc+CiAgPHBob3Rvc2hvcDpMZWdhY3lJUFRDRGlnZXN0Pjg1RUVEMkVB
MTJFM0ZEQ0M0QkFDRkE2QjgxMUE4RDcwPC9waG90b3Nob3A6TGVnYWN5SVBUQ0RpZ2VzdD4KICA8
cGhvdG9zaG9wOkNvbG9yTW9kZT4zPC9waG90b3Nob3A6Q29sb3JNb2RlPgogIDxwaG90b3Nob3A6
TGVnYWN5SVBUQ0RpZ2VzdD44NUVFRDJFQTEyRTNGRENDNEJBQ0ZBNkI4MTFBOEQ3MDwvcGhvdG9z
aG9wOkxlZ2FjeUlQVENEaWdlc3Q+CiAgPHBob3Rvc2hvcDpDb2xvck1vZGU+MzwvcGhvdG9zaG9w
OkNvbG9yTW9kZT4KIDwvcmRmOkRlc2NyaXB0aW9uPgoKIDxyZGY6RGVzY3JpcHRpb24geG1sbnM6
eG1wTU09J2h0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8nPgogIDx4bXBNTTpJbnN0YW5j
ZUlEPnhtcC5paWQ6QUI2NEY0NEJDOEIzRTUxMTlGOTRCQzlGNTlGMUNCQjY8L3htcE1NOkluc3Rh
bmNlSUQ+CiAgPHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD54bXAuZGlkOjZENjY4RTA1MzhBRkU1
MTFCNDRCRTgwQTBCMEQ4MjEyPC94bXBNTTpPcmlnaW5hbERvY3VtZW50SUQ+CiAgPHhtcE1NOklu
c3RhbmNlSUQ+eG1wLmlpZDpBQjY0RjQ0QkM4QjNFNTExOUY5NEJDOUY1OUYxQ0JCNjwveG1wTU06
SW5zdGFuY2VJRD4KICA8eG1wTU06RG9jdW1lbnRJRCByZGY6cmVzb3VyY2U9J3htcC5kaWQ6NkQ2
NjhFMDUzOEFGRTUxMUI0NEJFODBBMEIwRDgyMTInIC8+CiAgPHhtcE1NOk9yaWdpbmFsRG9jdW1l
bnRJRD54bXAuZGlkOjZENjY4RTA1MzhBRkU1MTFCNDRCRTgwQTBCMEQ4MjEyPC94bXBNTTpPcmln
aW5hbERvY3VtZW50SUQ+CiAgPHhtcE1NOkhpc3Rvcnk+CiAgIDxyZGY6U2VxPgogICA8L3JkZjpT
ZXE+CiAgPC94bXBNTTpIaXN0b3J5PgogPC9yZGY6RGVzY3JpcHRpb24+CgogPHJkZjpEZXNjcmlw
dGlvbiB4bWxuczpleGlmPSdodHRwOi8vbnMuYWRvYmUuY29tL2V4aWYvMS4wLyc+CiAgPGV4aWY6
SW1hZ2VXaWR0aD41OTE8L2V4aWY6SW1hZ2VXaWR0aD4KICA8ZXhpZjpJbWFnZUxlbmd0aD4xNjU8
L2V4aWY6SW1hZ2VMZW5ndGg+CiAgPGV4aWY6Qml0c1BlclNhbXBsZT44LCA4LCA4PC9leGlmOkJp
dHNQZXJTYW1wbGU+CiAgPGV4aWY6UGhvdG9tZXRyaWNJbnRlcnByZXRhdGlvbj5SR0I8L2V4aWY6
UGhvdG9tZXRyaWNJbnRlcnByZXRhdGlvbj4KICA8ZXhpZjpPcmllbnRhdGlvbj5Ub3AtbGVmdDwv
ZXhpZjpPcmllbnRhdGlvbj4KICA8ZXhpZjpTYW1wbGVzUGVyUGl4ZWw+MzwvZXhpZjpTYW1wbGVz
UGVyUGl4ZWw+CiAgPGV4aWY6WFJlc29sdXRpb24+MzAwLDAwMDA8L2V4aWY6WFJlc29sdXRpb24+
CiAgPGV4aWY6WVJlc29sdXRpb24+MzAwLDAwMDA8L2V4aWY6WVJlc29sdXRpb24+CiAgPGV4aWY6
UmVzb2x1dGlvblVuaXQ+SW5jaDwvZXhpZjpSZXNvbHV0aW9uVW5pdD4KICA8ZXhpZjpTb2Z0d2Fy
ZT5BZG9iZSBQaG90b3Nob3AgQ1M2IChXaW5kb3dzKTwvZXhpZjpTb2Z0d2FyZT4KICA8ZXhpZjpE
YXRlVGltZT4yMDE2OjAxOjA1IDEyOjI0OjM1PC9leGlmOkRhdGVUaW1lPgogIDxleGlmOkNvbXBy
ZXNzaW9uPkpQRUcgY29tcHJlc3Npb248L2V4aWY6Q29tcHJlc3Npb24+CiAgPGV4aWY6WFJlc29s
dXRpb24+NzI8L2V4aWY6WFJlc29sdXRpb24+CiAgPGV4aWY6WVJlc29sdXRpb24+NzI8L2V4aWY6
WVJlc29sdXRpb24+CiAgPGV4aWY6UmVzb2x1dGlvblVuaXQ+SW5jaDwvZXhpZjpSZXNvbHV0aW9u
VW5pdD4KICA8ZXhpZjpFeGlmVmVyc2lvbj5FeGlmIFZlcnNpb24gMi4yMTwvZXhpZjpFeGlmVmVy
c2lvbj4KICA8ZXhpZjpGbGFzaFBpeFZlcnNpb24+Rmxhc2hQaXggVmVyc2lvbiAxLjA8L2V4aWY6
Rmxhc2hQaXhWZXJzaW9uPgogIDxleGlmOkNvbG9yU3BhY2U+SW50ZXJuYWwgZXJyb3IgKHVua25v
d24gdmFsdWUgNjU1MzUpPC9leGlmOkNvbG9yU3BhY2U+CiAgPGV4aWY6UGl4ZWxYRGltZW5zaW9u
PjQyPC9leGlmOlBpeGVsWERpbWVuc2lvbj4KICA8ZXhpZjpQaXhlbFlEaW1lbnNpb24+MTUwPC9l
eGlmOlBpeGVsWURpbWVuc2lvbj4KIDwvcmRmOkRlc2NyaXB0aW9uPgoKPC9yZGY6UkRGPgo8L3g6
eG1wbWV0YT4KPD94cGFja2V0IGVuZD0ncic/Pgr/2wBDAAEBAQEBAQEBAQEBAQEBAQEBAQEBAQEB
AQEBAQEBAQEBAQEBAQEBAQEBAQECAgICAgICAgICAgMDAwMDAwMDAwP/2wBDAQEBAQEBAQEBAQEC
AgECAgMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwP/wgAR
CACWACoDAREAAhEBAxEB/8QAGwAAAwEAAwEAAAAAAAAAAAAAAAgJBwMEBgH/xAAUAQEAAAAAAAAA
AAAAAAAAAAAA/9oADAMBAAIQAxAAAAG/grwzB2QABSRFhrx8AAWEnsO8OSAEuDbhYyuoALoYyakM
+AEjjzxyFjgAmWNCJqVdABQBPBkx7wAQoWIaUe0AJZmajUD3AAnwmQ0A9wAJkIOUAHFACbYk40RV
oAOMwQ3M7gE1hHTOzzw85YkkyLmVhIzGxFyCTIjRZIkwawXIJQE2xyhNxvy4R4YwU+ga8aof/8QA
JhAAAQQBBAAGAwAAAAAAAAAABgMEBQcCAAEIEBIUFRc1NxMWIP/aAAgBAQABBQLVgWczAnSSmC6X
8W2ALm0OwObfF2tXm56STPdoWDsCRKUleMgxqWyljZt3yLiXe6kVdIOiMUKycvzDs9MA2CSTogAf
5BBOCee75F/PgJzM1pM01mmraPd7CxBOTBxXUeawtOhhNAHXdqY2Rvt4OQeqxwtjaa7u48lRls3r
y5nSFXCNiQMx3yNVY/mZBt5ZMqvH7Qipnu2q5cG7JIcv1sjV0darSZ7uM/dh8WB4EDGz67tbY4l+
+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
UbBWZ68PrZn9gLzmzJiUefsjmkv7Evf/2Q==');
		 $html = '<hr><table border="0">
			<tr>
			<td align="center">Servicio de Facturación <b>www.emizor.com</b> </td>
			</tr>

			</table>';
        $this->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);
		$this->Image('@'.$imgdata, '7', '128', '4', '12', '', 'www.emizor.com', 'T', false, 300, '', false, false, 0, false, false, false);

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
$pdf->Image('@'.$imgdata, '15', '6', 64, 22, '', '', 'T', false, 300, '', false, false, 0, false, false, false);
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
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='40', $titleFactura, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);
$pdf->SetFont('helvetica', 'B' , 11);
//nombre de la empresa
$business = $invoice->account_name;
$unipersonal = $invoice->account_uniper;
$pdf->SetFont('helvetica', 'B', 11, false);
$NombreEmpresa = '
        <table border = "0">
          <tr>
            <td width="140" align="center"><font color="#333333">'.$business.'</font></td>
          </tr>
        </table>
    ';
//$pdf->writeHTMLCell($w=0, $h=0, $x='18', $y='33', $NombreEmpresa, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);
$pdf->SetFont('helvetica', 'B', 8, false);
if($unipersonal!="")
    $pdf->writeHTMLCell($w=0, $h=0, $x='25', $y='34', 'De: '.$unipersonal, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);
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
$pdf->writeHTMLCell($w=0, $h=0, $x='155', $y='29', $original, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);

//datos de la empresa
$casa = $matriz->name;
$dir_casa = $matriz->address2."  ".$matriz->address1;
$tel_casa = $matriz->work_phone;
$city_casa = $matriz->city." - Bolivia";
$city_casa0 = $matriz->city." - Bolivia";
if($matriz->city == $invoice->city && $invoice->branch_id != $matriz->id)
    $city_casa ="";
else
$city_casa = '<tr style="line-height: 100%"><td width="180" align="center" style="font-size:7px;">&nbsp;'.$city_casa.'</td></tr>';

$pdf->SetFont('helvetica', '',8);

if($invoice->branch_id == $matriz->id || $branch_matriz == 0)
{
	$datoEmpresa = '
    <table border = "0">
        <tr>
        <td width="150" align="center"><b>'.$casa.'</b></td>
        </tr>
        <tr>
        <td width="150" align="center">'.$dir_casa.' </td>
        </tr>
        <tr>
        <td width="150" align="center">Telfs: '.$tel_casa.'</td>
        </tr>
        <tr>
        	<td width="150" align="center">&nbsp;'.$city_casa0.'</td>
        </tr>
    </table>
    ';
}

else{
	$sucursal = $invoice->branch_name;
	$direccion = $invoice->address2."  ".$invoice->address1;
	$ciudad = $invoice->city." - Bolivia";
	$telefonos =$invoice->phone;
	$datoEmpresa = '
    <table border = "0">

        <tr style="line-height: 100%">
        	<td width="180" align="center" style="font-size:7px;"><b>'.$casa.'</b></td>
        </tr>
        <tr style="line-height: 100%">
        	<td width="180" align="center" style="font-size:7px;">'.$dir_casa.'</td>
        </tr>
        <tr style="line-height: 100%">
        	<td width="180" align="center" style="font-size:7px;">Telfs: '.$tel_casa.'</td>
        </tr>
					'.$city_casa.'
					<tr style="line-height: 100%">
        	<td width="180" align="center" style="font-size:7px;"><b>'.$sucursal.'</b></td>
        </tr>
        <tr style="line-height: 100%">
        	<td width="180" align="center" style="font-size:7px;">'.$direccion.'</td>
        </tr>
        <tr style="line-height: 100%">
        <td width="180" align="center" style="font-size:7px;">Telfs: '.$telefonos.'</td>
        </tr>
        <tr style="line-height: 100%">
        <td width="180" align="center" style="font-size:7px;">&nbsp;'.$ciudad.'</td>
        </tr>

    </table>
    ';
}

$pdf->writeHTMLCell($w=0, $h=0, $x='15', $y='26', $datoEmpresa, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);



//actividad economica
$actividad=$invoice->economic_activity;
$pdf->SetFont('helvetica', '', 10);
$actividadEmpresa = '
    <table>
        <tr>
            <td align="center">'.$actividad.'</td>
        </tr>
    </table>';

$pdf->writeHTMLCell($w=0, $h=0, $x='130', $y='35', $actividadEmpresa, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);
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
$id_cliente = $invoice->client->public_id;

$datosCliente = '
<table cellpadding="2" border="0">
    <tr>
				<td width="400"><b>&nbsp;Lugar y fecha :</b>&nbsp;'.$fecha.'</td>
				<td width="120"><b>&nbsp;ID Cliente:</b>&nbsp;'.$id_cliente.'</td>
    </tr>
    <tr>
        <td width="400"><b>&nbsp;Se&ntilde;or(es):</b> &nbsp;'.$senor .'</td>
        <td width="120"><b>NIT/CI :</b>&nbsp;'.$nit.'</td>
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
         <td width="355" align="center" bgcolor="#E6DFDF"><font size="10"><b>DETALLE</b></font></td>
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
$fiscal=number_format((float)$invoice->debito_fiscal, 2, '.', '');
$ice="0";


require_once(app_path().'/includes/numberToString.php');
$nts = new numberToString();
$importe = number_format((float)$invoice->importe_neto, 2, '.', '');
$num = explode(".", $importe);
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

$cuenta_tcambio = Account::find(Auth::user()->account_id)->exchange;

$pdf->SetFont('helvetica', '', 11);
		$texPie .='
		<table border="0.2" cellpadding="3" cellspacing="0">

            <tr>
                <td width="425"  align="left"><b>T/C:&nbsp;&nbsp;'.$cuenta_tcambio.' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TOTAL A PAGAR&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></td>
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
