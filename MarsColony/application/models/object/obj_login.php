<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Obj_login extends Obj_root {
		
	public function __construct()
	{
		//Import
		$this->load->model(CONSTANT_PATH.'con_user');
		//
		parent::__construct();
		$this->con = new Con_user();
		$this->ftc = new Ftc_user();
	}
}

/* End of file */