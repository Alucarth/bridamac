<?php

class TypeDocument extends EntityModel
{
	protected $table = 'type_documents';

	public static function getDocumentos()
	{
		$documentos = DB::table('type_documents')->join('master_documents', function($join)
        {
            $join->on('type_documents.master_id', '=', 'master_documents.id')
                 ->where('account_id', '=', Session::get('account_id'));
        })->select('type_documents.id','master_documents.name')
        ->get();

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
}