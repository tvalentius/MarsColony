<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Obj_score extends Obj_root {

	public function __construct($Obj=FALSE)
	{
		//Import
		$this->load->model(CONSTANT_PATH.'con_score');
		$this->load->model(FETCH_PATH.'ftc_score');
		//
		parent::__construct($Obj);
		$this->con = new Con_score;
		$this->ftc = new Ftc_score($this);
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