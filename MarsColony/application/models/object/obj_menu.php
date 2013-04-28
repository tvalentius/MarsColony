<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Obj_menu extends Obj_root {
	
	public function __construct($Obj=FALSE)
	{
		//Import
		$this->load->model(CONSTANT_PATH.'con_menu');
		$this->load->model(FETCH_PATH.'ftc_menu');
		//
		parent::__construct($Obj);
		$this->con = new Con_menu;
		$this->ftc = new Ftc_menu($this);
	}

	public function join_parent()
	{
		$parameter = array(
			"object"=>"menu",
			"fk"=>$this->con->fk_parent,
			"join_method"=>"LEFT",
			"select"=>array("name","link")
		);
		return $this->join_object($parameter);
	}

}

/* End of file */