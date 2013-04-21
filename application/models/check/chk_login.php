<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chk_login extends Chk_root {
	
	public function __construct()
	{
		//Import Needed Model
		//End Import
	}
	
	public function is_login_valid($data)
	{
		//Import
		$this->load->model(CONSTANT_PATH.'con_user');
		$this->load->model(FETCH_PATH.'ftc_user');
		//End
		$Con = new Con_user();
		$Ftc = new Ftc_user();
		//
		if($count > 0):
			return TRUE;
		else:
			return FALSE;
		endif;
	}
}

/* End of file */