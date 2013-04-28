<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Obj_relation_images extends Obj_root {
	
	public function __construct($Obj=FALSE)
	{
		//Import
		$this->load->model(CONSTANT_PATH.'con_relation_images');
		$this->load->model(FETCH_PATH.'ftc_relation_images');
		//
		parent::__construct($Obj);
		$this->con = new Con_relation_images;
		$this->ftc = new Ftc_relation_images($this);
	}
	
	//Join	
	public function join_images()
	{
		$parameter = array(
			"object"=>"images",
			"fk"=>$this->con->pk_images
		);
		return $this->join_object($parameter);
	}
	
}

/* End of file */