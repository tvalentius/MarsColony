<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Obj_lookupgroup extends Obj_root {

	public function __construct($Obj=FALSE)
	{
		//Import
		$this->load->model(CONSTANT_PATH.'con_lookupgroup');
		$this->load->model(FETCH_PATH.'ftc_lookupgroup');
		//
		parent::__construct($Obj);
		$this->con = new Con_lookupgroup;
		$this->ftc = new Ftc_lookupgroup($this);
	}
}

/* End of file */