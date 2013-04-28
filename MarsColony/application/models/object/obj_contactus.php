<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Obj_contactus extends Obj_root {

	public function __construct($Obj=FALSE)
	{
		//Import
		$this->load->model(CONSTANT_PATH.'con_contactus');
		$this->load->model(FETCH_PATH.'ftc_contactus');
		//
		parent::__construct($Obj);
		$this->con = new Con_contactus;
		$this->ftc = new Ftc_contactus($this);
	}

	public function join_lookup_status()
	{
		$parameter = array(
			"object"=>"lookup",
			"fk"=>$this->con->fk_lookup_status,
			"select"=>"name"
		);
		return $this->join_object($parameter);
	}
}

/* End of file */