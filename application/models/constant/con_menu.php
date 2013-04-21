<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Con_menu extends Con_root {
	
	var $table				=		"citemplate_menu";
	var $pk					=		"menu_id_pk";	// PK
	var $fk_parent			=		"menu_parent_id_fk";	// PK
	var $depth				=		"menu_depth";
	var $name				=		"menu_name";
	var $link				=		"menu_link";
	var $order				=		"menu_order";
	var $status				=		"menu_status";
	var $is_admin			=		"menu_is_admin";

	//Fixed Value
	var $home_pk			=		1;

	public function __construct()
	{
		parent::__construct();
	}
}

/* End of file */