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
}