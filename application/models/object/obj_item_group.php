<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Obj_item_group extends Obj_root {
	
	public function __construct($Obj=FALSE)
	{
		//Import
		$this->load->model(CONSTANT_PATH.'con_item_group');
		$this->load->model(FETCH_PATH.'ftc_item_group');
		//
		parent::__construct($Obj);
		$this->con = new Con_item_group;
		$this->ftc = new Ftc_item_group($this);
	}

	public function join_parent()
	{
		$parameter = array(
			"object"=>"item_group",
			"fk"=>$this->con->fk_parent,
			"join_method"=>"LEFT",
			"select"=>array("name")
		);
		return $this->join_object($parameter);
	}

}

/* End of file */