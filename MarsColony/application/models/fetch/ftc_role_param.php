<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ftc_role_param extends Ftc_root {
	
	public function __construct($Obj=FALSE)
	{
		//Import Needed Model
		$this->load->model(QUERY_PATH.'qry_role_param');
		//End Import
		parent::__construct(new Qry_role_param($Obj), $Obj);
	}

	public function filter_search($data)
	{
		return $this;
	}
}

/* End of file */