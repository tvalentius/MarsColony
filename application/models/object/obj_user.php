<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Obj_user extends Obj_root {

	public function __construct($Obj=FALSE)
	{
		//Import
		$this->load->model(CONSTANT_PATH.'con_user');
		$this->load->model(FETCH_PATH.'ftc_user');
		//
		parent::__construct($Obj);
		$this->con = new Con_user;
		$this->ftc = new Ftc_user($this);
	}
	
	public function join_usergroup()
	{
		$parameter = array(
			"object"=>"usergroup",
			"fk"=>$this->con->fk_group,
			"select"=>"name"
		);
		return $this->join_object($parameter);
	}
}

/* End of file */