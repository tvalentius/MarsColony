<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Obj_lookup extends Obj_root {

	public function __construct($Obj=FALSE)
	{
		//Import
		$this->load->model(CONSTANT_PATH.'con_lookup');
		$this->load->model(FETCH_PATH.'ftc_lookup');
		//
		parent::__construct($Obj);
		$this->con = new Con_lookup;
		$this->ftc = new Ftc_lookup($this);
	}
	
	public function join_lookupgroup()
	{
		$parameter = array(
			"object"=>"lookupgroup",
			"fk"=>$this->con->fk_group,
			"select"=>"name"
		);
		return $this->join_object($parameter);
	}
}

/* End of file */