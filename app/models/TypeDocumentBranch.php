<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class TypeDocumentBranch extends Eloquent
{
	use SoftDeletingTrait;
	protected $table = 'type_documents_branch';
	public $timestamps = false;
	 protected $dates = ['deleted_at'];
	
}