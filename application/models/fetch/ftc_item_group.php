<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ftc_item_group extends Ftc_root {
	
	public function __construct($Obj=FALSE)
	{
		//Import Needed Model
		$this->load->model(CONSTANT_PATH.'con_item_group');
		$this->load->model(QUERY_PATH.'qry_item_group');
		//End Import
		parent::__construct(new Qry_item_group($Obj), $Obj);
	}
	
}

/* End of file */