<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Obj_audittrail extends Obj_root {

	public function __construct($Obj=FALSE)
	{
		//Import
		$this->load->model(CONSTANT_PATH.'con_audittrail');
		$this->load->model(FETCH_PATH.'ftc_audittrail');
		//
		parent::__construct($Obj);
		$this->con = new Con_audittrail;
		$this->ftc = new Ftc_audittrail($this);
	}
	
	public function join_lookup_action()
	{
		$parameter = array(
			"object"=>"lookup",
			"fk"=>$this->con->fk_lookup_action,
			"select"=>"name"
		);
		return $this->join_object($parameter);
	}

	public function join_user()
	{
		$parameter = array(
			"object"=>"user",
			"fk"=>$this->con->create_by,
			"select"=>"name"
		);
		return $this->join_object($parameter);
	}
}

/* End of file */