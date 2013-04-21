<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Con_user extends Con_root {
	
	var $table				=		"citemplate_user";
	var $pk					=		"user_id_pk";	//PK
	var $fk_group			=		"user_usergroup_id_fk";	//FK
	var $login_name			=		"user_login_name";
	var $name				=		"user_name";
	var $pass				=		"user_pass";
	var $login_date			=		"user_last_login_date";
	var $create_date		=		"user_create_date";
	var $create_by			=		"user_create_user_id_fk";	//FK
	var $update_date		=		"user_update_date";
	var $update_by			=		"user_update_user_id_fk";	//FK
	var $status				=		"user_status";
	
	//Fixed Value
	var $admin_pk			=		1;
	
	public function __construct()
	{
		parent::__construct();
	}
}

/* End of file */