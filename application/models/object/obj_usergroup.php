<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Obj_usergroup extends Obj_root {
	
	public function __construct($Obj=FALSE)
	{
		//Import
		$this->load->model(CONSTANT_PATH.'con_usergroup');
		$this->load->model(FETCH_PATH.'ftc_usergroup');
		//
		parent::__construct($Obj);
		$this->con = new Con_usergroup;
		$this->ftc = new Ftc_usergroup($this);
	}
}

/* End of file */