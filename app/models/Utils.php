<?php
require_once(app_path().'/includes/control_code.php');	
class Utils 
{
	public static function validarFecha($date, $format = 'Y-m-d H:i:s')
	{
	    $d = DateTime::createFromFormat($format, $date);
	    return $d && $d->format($format) == $date;
	}

	public static function generateControlCode($invoice_number, $nit, $amount, $number_autho, $key_dosage,$deadline)
	{
		$invoice_dateCC = date("Ymd");
    	$invoice_date = date("Y-m-d");
    
		$invoice_date_limitCC = date("Y-m-d", strtotime($deadline));	
		$cod_control = codigoControl($invoice_number, $nit, $invoice_dateCC, $amount, $number_autho, $key_dosage);
		return $cod_control;
	}
	public static function parseContactos($contactos)
	{
		if($contactos)
		{
				$vNombres= $contactos['first_name'];
				$vApellidos= $contactos['last_name'];
				$vCorreo = $contactos['email'];
				$vTelefono = $contactos['phone'];

				$contactosArray = array();

				foreach ($vNombres as $i => $nombre) {
					# code...
					$contactosArray[]=array('first_name'=>$nombre,'last_name'=> $vApellidos[$i],'email'=>$vCorreo[$i],'phone'=>$vTelefono[$i] ); 
				
				}

				return $contactosArray;
		}
		
		return null;
	}
	public static function parseContactosUpdate($contactos)
	{
		if($contactos)
		{		
				$vId = $contactos['id'];
				$vNombres= $contactos['first_name'];
				$vApellidos= $contactos['last_name'];
				$vCorreo = $contactos['email'];
				$vTelefono = $contactos['phone'];

				$contactosArray = array();

				foreach ($vNombres as $i => $nombre) {
					# code...
					$contactosArray[]=array('id' => $vId[$i],'first_name'=>$nombre,'last_name'=> $vApellidos[$i],'email'=>$vCorreo[$i],'phone'=>$vTelefono[$i] ); 
				
				}

				return $contactosArray;
		}
		
		return null;
	}
	public static function getControlCode( $invoice_number,$nit,$fecha,$total,$number_autho,$key_dosage)
	{
		require_once(app_path().'/includes/control_code.php');
		$codigo_de_control = codigoControl($invoice_number, $nit, $fecha, $total, $number_autho, $key_dosage);
		return $codigo_de_control;
	}



    public static function mime_content_type($filename) {

       $finfo    = finfo_open(FILEINFO_MIME);
        $mimetype = finfo_file($finfo, $filename);
        finfo_close($finfo);
        return $mimetype;
    }
    public static function calcular_dias(){
    	$fecha_i=date('Y-m-d');
    	// $fecha_f='2015-09-23';
    	$fecha_f=Branch::find(Session::get('branch_id'))->deadline;
    	$dias	= (strtotime($fecha_f)-strtotime($fecha_i))/86400;
		$dias = floor($dias);
    	return $dias;
    }
    public static function barra_time(){
    	$dias=180-Utils::calcular_dias();
		$dt=round(($dias*100)/180);	
		return $dt;
    }

}