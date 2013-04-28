<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Con_contactus extends Con_root {
	
	var $table				=		"citemplate_contactus";
	var $pk					=		"contactus_id_pk";
    var $name               =		"contactus_name";
    var $message            =		"contactus_message";
    var $phone	            =		"contactus_phone";
    var $email	            =		"contactus_email";
    var $fk_lookup_status   =		"contactus_lookup_status_id_fk";
    var $create_date        =		"contactus_create_date";

	//Lookup Group Value
	var $lookupgroup_status = 5200;
	
	//Lookup Action Value
	var $lookup_status_value = array(
		'unread'				=>	5201,
		'read'					=>	5202,
		'reply_email'			=>	5203,
		'reply_phone'			=>	5204
	);
	
	public function __construct()
	{
		parent::__construct();
	}
}

/* End of file */ 