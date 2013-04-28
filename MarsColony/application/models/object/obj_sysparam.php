<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Obj_sysparam extends Obj_root {

	public function __construct($Obj=FALSE)
	{
		//Import
		$this->load->model(CONSTANT_PATH.'con_sysparam');
		$this->load->model(FETCH_PATH.'ftc_sysparam');
		//
		parent::__construct($Obj);
		$this->con = new Con_sysparam;
		$this->ftc = new Ftc_sysparam($this);
	}

	//Return the data name
	public function data_value()
	{
		$row = $this->data_query()->row_array();
		return $row[$this->con->value];
	}
}

/* End of file */