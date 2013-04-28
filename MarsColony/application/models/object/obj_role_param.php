<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Obj_role_param extends Obj_root {
	
	public function __construct($Obj=FALSE)
	{
		//Import
		$this->load->model(CONSTANT_PATH.'con_role_param');
		$this->load->model(FETCH_PATH.'ftc_role_param');
		//
		parent::__construct($Obj);
		$this->con = new Con_role_param;
		$this->ftc = new Ftc_role_param($this);
	}

	//Join
	public function join_menu()
	{
		//Load
		$this->load->model(OBJECT_PATH.'obj_menu');
		//Class
		$Menu = new Obj_menu;
		//
		$parameter = array(
			"object"=>"menu",
			"fk"=>$this->con->fk_menu,
			"join_on_rule"=>$Menu->con->status."=1"
		);
		return $this->join_object($parameter);
	}
}

/* End of file */