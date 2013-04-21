<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Obj_news extends Obj_root {

	public function __construct($Obj=FALSE)
	{
		//Import
		$this->load->model(CONSTANT_PATH.'con_news');
		$this->load->model(FETCH_PATH.'ftc_news');
		//
		parent::__construct($Obj);
		$this->con = new Con_news;
		$this->ftc = new Ftc_news($this);
	}
}

/* End of file */