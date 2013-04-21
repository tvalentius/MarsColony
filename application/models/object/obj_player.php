<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Obj_player extends Obj_root {

	public function __construct($Obj=FALSE)
	{
		//Import
		$this->load->model(CONSTANT_PATH.'con_player');
		$this->load->model(FETCH_PATH.'ftc_player');
		//
		parent::__construct($Obj);
		$this->con = new Con_player;
		$this->ftc = new Ftc_player($this);
	}
}

/* End of file */