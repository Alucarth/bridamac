<?php

class TypeDocument extends EntityModel
{
	protected $table = 'type_documents';

	// private $fv_master_id;
	private $fv_master_ids;
	private $fv_account_id;
	private $fv_logo;
	private $fv_error_message;

	public static function getDocumento()
	{
		$documento =TypeDocument::where('account_id',Auth::user()->account_id)->first();
		return $documento;
	}
	public static function getDocumentos()
	{
		if(Auth::check())
		{
				$documentos = DB::table('type_documents')->join('master_documents', function($join)
		        {
	            	$join->on('type_documents.master_id', '=', 'master_documents.id')
	                 ->where('account_id', '=', Auth::user()->account_id);
			    })->select('type_documents.id','master_documents.name')
			      ->get();
			        return $documentos;
		}
		$documentos = DB::table('type_documents')->join('master_documents', function($join)
        {
            $join->on('type_documents.master_id', '=', 'master_documents.id')
                 ->where('account_id', '=', Session::get('account_id'));
        })->select('type_documents.id','master_documents.name')->get();

		// $documentos = TypeDocument::join('master_documents','type_documents.master_id','=','master_documents.id')
		// 									->where('account_id',Session::get('account_id'))
		// 									->select('type_documents.id','master_documents.name')
		// 									->get();
		// $documentos = TypeDocument::all();
		// foreach ($documentos as $doc) {
		// 	# code...
		// 	$documento = TypeDocument::find(1);
		// }
		// $documento = TypeDocument::find(1);
		return $documentos;
	}
	//validando valores 
	public function setMasterIds($master_ids)
	{
		if(!empty($master_ids))
		{
			if(!is_array($master_ids))
			{
				$this->fv_error_message = $this->fv_error_message .'<br>- Identificadores '.ERROR_ARRAY;	
				return  $this->fv_master_ids=null;
			}
			foreach ($master_ids as $master_id) {
				# code...
				$master_idExiste = MasterDocument::find($master_id)->first();
				if(!$master_idExiste)
				{
					$this->fv_error_message = $this->fv_error_message .'<br>- Identificador '.ERROR_ID;
					return  $this->fv_master_ids=null;	
				}
			}
			return $this->fv_master_ids =$master_ids;
		}
		$this->fv_error_message = $this->fv_error_message .'<br>- Identificadores '.ERROR_NULL;
		return  $this->fv_master_ids=null;
	
	}

	// public function setMasterId($master_id)
	// {
	// 	if(!empty($master_id))
	// 	{
	// 		if(!is_numeric($master_id))
	// 		{
	// 			$this->fv_error_message = $this->fv_error_message . '<br>- Identificador '.ERROR_DATO_NUMERICO;
	// 			return  $this->fv_master_id=null;
	// 		}
	// 		$master_idExiste = MasterDocument::find($master_id)->first();
	// 		if(!$master_idExiste)
	// 		{
	// 			$this->fv_error_message = $this->fv_error_message .'<br>- Identificador '.ERROR_ID;
	// 			return  $this->fv_master_id=null;	
	// 		}
	// 		return $this->fv_master_id = $master_id;

	// 	}
	// 	$this->fv_error_message = $this->fv_error_message .'<br>- Identificador '.ERROR_NULL;
	// 	return  $this->fv_master_id=null;

	// } 

	public function setAccountId($account_id)
	{
		if(!empty($account_id))
		{
			if(!is_numeric($account_id))
			{
				$this->fv_error_message = $this->fv_error_message . '- Identificador '.ERROR_DATO_NUMERICO.'<br>';
				return  $this->fv_account_id=null;
			}
			$account_idExiste = Account::find($account_id)->first();
			if(!$account_idExiste)
			{
				$this->fv_error_message = $this->fv_error_message .'- Identificador '.ERROR_ID.'<br>';
				return  $this->fv_account_id=null;	
			}
			return $this->fv_account_id = $account_id;

		}
		$this->fv_error_message = $this->fv_error_message .'-Al menos seleccione un tipo de documento '.ERROR_NULL.'<br> ';
		return  $this->fv_account_id=null;
	}
	public function setLogo($logo)
	{
		if(!empty($logo))
		{
			return $this->fv_logo = $logo;
		}
		$this->fv_error_message = $this->fv_error_message .'<br>- Imagen '.ERROR_NULL;
		return  $this->fv_logo=null;
	}

	public function getMasterIds()
	{	
		if($this->fv_master_ids)
		{
			return $this->fv_master_ids;	
		}
	}
	public function getLogo()
	{
		if($this->fv_logo)
		{
			return $this->fv_logo;
		}
	}
	public function getAccountId()
	{
		if($this->fv_account_id)
		{
			return $this->fv_account_id;
		}
	}
	public function getErrorMessage()
	{
		return $this->fv_error_message;
	}
	//validacion de metodo

	public function Guardar()
	{	
		
		if(empty($this->fv_error_message))
		{
			foreach ($this->getMasterIds() as $master_id) {
				# code...
				$master = MasterDocument::find($master_id);

				$td = TypeDocument::createNew();
				$td->account_id = $this->getAccountId();
				$td->master_id= $master->id;
				$td->javascript_web= $master->javascript_web;
				$td->javascript_pos=$master->javascript_pos;
				$td->logo =$this->getLogo();
				$td->save();
			}
			

			$this->fv_error_message = "Registro Existoso";
			return true;
		}

		return false;
	}
	public function Actualizar()
	{	
		
		if(empty($this->fv_error_message))
		{
			$this->save();

			$this->fv_error_message = "Registro Existoso";
			return true;
		}

		return false;
	}

}