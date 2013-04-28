<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chk_contactus extends Chk_root {
	
	public function __construct()
	{
		//Import Needed Model
		$this->load->model(OBJECT_PATH.'obj_contactus');
		//End Import
	}
	
	public function is_lookup_status_valid($var="")
	{
		$Contact = new Obj_contactus;
		//
		$check = $this->is_lookup_exist($var, $Contact->con->lookupgroup_status);
		//
		if($check):
			return TRUE;
		else:
			$this->form_validation->set_message('external_callbacks', "Status ".$var." tidak valid");
			return FALSE;
		endif;
	}
}

/* End of file */