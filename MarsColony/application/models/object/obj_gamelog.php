<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Obj_gamelog extends Obj_root {

	public function __construct($Obj=FALSE)
	{
		//Import
		$this->load->model(CONSTANT_PATH.'con_gamelog');
		$this->load->model(FETCH_PATH.'ftc_gamelog');
		//
		parent::__construct($Obj);
		$this->con = new Con_gamelog;
		$this->ftc = new Ftc_gamelog($this);
	}
}

/* End of file */