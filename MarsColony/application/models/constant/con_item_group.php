<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Con_item_group extends Con_root {
	
	var $table				=		"citemplate_item_group";
	var $pk					=		"item_group_id_pk";	// PK
	var $fk_parent			=		"item_group_parent_id_fk"; // FK
	var $name				=		"item_group_name";
	var $desc				=		"item_group_desc";
	var $depth				=		"item_group_depth";
	var $status				=		"item_group_status";

	public function __construct()
	{
		parent::__construct();
	}
}

/* End of file */