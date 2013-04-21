<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Con_relation_group_role extends Con_root {
	
	var $table				=		"citemplate_relation_group_role";
	var $pk_group			=		"relation_group_role_group_id_pk";	//PK 1
	var $pk_role			=		"relation_group_role_role_id_pk";	//PK 2
	var $create_date		=		"relation_group_role_create_date";
	
	public function __construct()
	{
		parent::__construct();
	}
}

/* End of file */