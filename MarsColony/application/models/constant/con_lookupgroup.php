<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Con_lookupgroup extends Con_root {
	
	var $table				=		"citemplate_lookupgroup";
	var $pk					=		"lookup_group_id_pk";	//PK
	var $name				=		"lookup_group_name";
	var $descripion			=		"lookup_group_description";
	var $is_static			=		"lookup_group_is_static";
}

/* End of file */