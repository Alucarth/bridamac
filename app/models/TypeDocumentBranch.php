<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class TypeDocumentBranch extends Eloquent
{
	use SoftDeletingTrait;
	protected $table = 'type_documents_branch';
	public $timestamps = false;
	protected $dates = ['deleted_at'];

	public static function hasTypeDocument($type_documents_branch,$branch_id)
	{
		$existeAsignado = TypeDocumentBranch::where('type_document_id',$type_documents_branch)->where('branch_id',$branch_id)->first();
		
		if($existeAsignado)
		{
			return true;
		}
		
		return false;
	}
}