<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Qry_usergroup extends Qry_root {
	
	public function __construct($Obj=FALSE)
	{
		//Import
		$this->load->model(CONSTANT_PATH.'con_usergroup');
		//End
		parent::__construct($Obj);
	}
}

/* End of file */