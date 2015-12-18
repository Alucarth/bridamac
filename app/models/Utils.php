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

					if($nombre=="" && $vApellidos[$i]=="" && $vCorreo[$i] == "" && $vTelefono[$i] =="")
					{
						//$contactosArray[]=array('first_name'=>$nombre,'last_name'=> $vApellidos[$i],'email'=>$vCorreo[$i],'phone'=>$vTelefono[$i] );
					}
					else{
						$contactosArray[]=array('first_name'=>$nombre,'last_name'=> $vApellidos[$i],'email'=>$vCorreo[$i],'phone'=>$vTelefono[$i] );
					}

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

	public static function aviso_renovar(){
		$fecha_i=date('Y-m-d');
    	$fecha_f=Branch::find(Session::get('branch_id'))->deadline;
    	$dias	= (strtotime($fecha_f)-strtotime($fecha_i))/86400;
		if ( ($dias <= 5) && ($dias >= 1) )
		{
			$mensaje = '<span class="label label-warning pull-right">Fecha Límite de Emisión expirará en  '.$dias.' día(s).</span>';
			return $mensaje;
		}
		elseif( $dias == 0 ){
			$mensaje = '<span class="label label-danger pull-right">Su Fecha Límite de Emisión Expira Hoy.</span>';
			return $mensaje;
		}

		return null;
	}





    public static function barra_time(){
    	$dias=180-Utils::calcular_dias();
		$dt=round(($dias*100)/180);
		return $dt;
    }
    public static function usuarioText($username)
    {
    	$vector = explode('@', $username);
    	return $vector[0];

    }
     public static function addNote($id,$note_sent,$status){
            $invoice = Invoice::where('id','=',$id)->first();
            if($invoice->note=="")
            {
                $nota = array();
                    $nota[0] = [
                        'date' => date('d-m-Y H:i:s'),
                        'note' => $note_sent
                    ];
            }
            else{
                $nota = json_decode($invoice->note);

                    $nota_add = [
                        'date' => date('d-m-Y H:i:s'),
                        'note' => $note_sent
                    ];
                array_push($nota, $nota_add);
            }
            $invoice->note = json_encode($nota);
            $invoice->invoice_status_id=$status;
            $invoice->save();
        }
    public static function titulo($cadena)
    {
    	// return $cadena;
    	$vector = explode(' ',$cadena);
    	$linea ="";
    	$array = array();
    	foreach ($vector as $palabra) {
    		# code...
    		$lineatemporal = $linea;
    		$lineatemporal = $lineatemporal.' '.$palabra;
    		if(strlen($lineatemporal)<18)
    		{
    			$linea = $linea.' '.$palabra;
    		}
    		else
    		{
    			array_push($array, $linea);
    			$linea = $palabra;
    		}
    	}
    			array_push($array, $linea);
    	$linea = "";
    	foreach ($array as $p) {
    		# code...

    		$linea = $linea.'<br>'.$p;
    	}

    	return $linea;

    }

		public function logoMenu(){

			$logo = TypeDocument::find(Auth::user()->account_id)->logo;
			return $logo;
		}

		public function mostrarNota(){
			$master = MasterDocument::select('id')->where('name', 'Nota de Entrega')->first();
			$nota = TypeDocument::where('account_id', Auth::user()->account_id)->where('master_id', '=', $master->id)->first();
			return $nota->master_id;
		}

		public function campoExtra(){
			$campo = Account::where('id', Auth::user()->account_id )->first();
			return $campo->nit;
		}
}
