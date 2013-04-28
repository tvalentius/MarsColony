<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Con_images extends Con_root {
	
	var $table				=		"citemplate_images";
	var $pk					=		"images_id_pk";
    var $name               =		"images_name";
    var $desc             	=		"images_desc";
    var $type            	=		"images_filetype";
    var $status 	        =		"images_status";
    var $fk_lookup_category =		"images_category_lookup_id_fk";
    var $create_date        =		"images_createdate";
    var $create_by          =		"images_createby";
	var $image_path			=		"";
	
	//Lookup Group Value
	var $lookupgroup_action = 3002;
	
	
	public function __construct()
	{
		parent::__construct();
		$this->image_path = files_path('images/');
	}
}

/* End of file */