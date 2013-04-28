<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Con_audittrail extends Con_root {
	
	var $table				=		"citemplate_audit_trail";
	var $pk					=		"audit_trail_id_pk";	//PK
	var $module				=		"audit_trail_module";
	var $fk_lookup_action	=		"audit_trail_action_lookup_id_fk";
	var $create_by			=		"audit_trail_create_by_id_fk"; //FK
	var $create_date		=		"audit_trail_create_date";
	var $value				=		"audit_trail_value";
	
	//Lookup Group Value
	var $lookupgroup_action = 5100;
	
	//Lookup Action Value
	var $lookup_action_value = array(
		'login'					=>	5101,
		'insert'				=>	5102,
		'update'				=>	5103,
		'delete'				=>	5104,
		'unactivate'			=>	5105,
		'restore'				=>	5106,
	);
	
	//Module Name
	var $module_value	= array(
		'user'					=>	'USER',
		'usergroup'				=>	'USERGROUP',
		'role'					=>	'ROLE',
		'news'					=>	'NEWS',
		'contactus'				=>	'CONTACT US',
		'images'				=>	'IMAGES',
		'lookup'				=>	'LOOKUP',
		'sysparam'				=>	'SYSPARAM',
		'player'				=>	'PLAYER',
	);
}

/* End of file */