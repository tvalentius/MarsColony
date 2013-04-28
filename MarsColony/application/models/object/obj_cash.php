<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Obj_cash extends Obj_root {

	public function __construct($Obj=FALSE)
	{
		//Import
		$this->load->model(CONSTANT_PATH.'con_cash');
		$this->load->model(FETCH_PATH.'ftc_cash');
		//
		parent::__construct($Obj);
		$this->con = new Con_cash;
		$this->ftc = new Ftc_cash($this);
	}
    
	public function join_player()
	{
		$parameter = array(
			"object"=>"player",
			"fk"=>$this->con->fk_player,
			"select"=>"name"
		);
		return $this->join_object($parameter);
	}
}

/* End of file */