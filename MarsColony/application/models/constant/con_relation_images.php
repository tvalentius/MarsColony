<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Con_relation_images extends Con_root {
	
	var $table				=		"citemplate_relation_images";
	var $pk_typename		=		"relation_images_type_name_pk";	//PK 1
	var $pk_typeid			=		"relation_images_type_id_pk";	//PK 1
	var $pk_images			=		"relation_images_images_id_pk";	    //PK 2
	var $name				=		"relation_images_name";
	var $desc				=		"relation_images_desc";
	var $order				=		"relation_images_order";
	var $status				=		"relation_images_status";
	var $create_date		=		"relation_images_createdate";
	var $create_by		    =		"relation_images_createby";
	
	public function __construct()
	{
		parent::__construct();
	}
}

/* End of file */