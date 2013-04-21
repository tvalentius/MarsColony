<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Con_lookup extends Con_root {
	
	var $table				=		"citemplate_lookup";
	var $pk					=		"lookup_id_pk";	//PK
	var $fk_group			=		"lookup_group_id_fk"; //FK
	var $name				=		"lookup_name";
	var $desc				=		"lookup_description";
	var $status				=		"lookup_status";
	var $create_by			=		"lookup_created_by";
	var $create_date		=		"lookup_created_date";
	var $update_by			=		"lookup_updated_by";
	var $update_date		=		"lookup_updated_date";

	public function __construct()
	{
		parent::__construct();
	}
}

/* End of file */