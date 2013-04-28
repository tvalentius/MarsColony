<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Con_sysparam extends Con_root {
	
	var $table				=		"citemplate_sysparam";
	var $name				=		"sysparam_name";	//PK
	var $desc				=		"sysparam_desc";
	var $value				=		"sysparam_value";
	var $regex				=		"sysparam_regex_format";
	var $is_static			=		"sysparam_is_static";
	var $update_by			=		"sysparam_update_by";
	var $update_date		=		"sysparam_update_date";

	public function __construct()
	{
		parent::__construct();
	}
}

/* End of file */