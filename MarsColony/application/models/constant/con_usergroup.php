<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Con_usergroup extends Con_root {
	
	var $table				=		"citemplate_usergroup";
	var $pk					=		"usergroup_id_pk";	//PK
	var $name				=		"usergroup_name";
	var $desc				=		"usergroup_desc";
	var $status				=		"usergroup_status";
	var $create_date		=		"usergroup_create_date";
	var $create_by			=		"usergroup_create_by_id_fk";//FK
	var $update_date		=		"usergroup_update_date";
	var $update_by			=		"usergroup_update_by_id_fk";//fk

	//Fixed Value
	var $admin_pk		=		1;

	public function __construct()
	{
		parent::__construct();
	}
}

/* End of file */