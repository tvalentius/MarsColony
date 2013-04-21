<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ftc_lookupgroup extends Ftc_root {
	
	public function __construct($Obj=FALSE)
	{
		//Import Needed Model
		$this->load->model(QUERY_PATH.'qry_lookupgroup');
		//End Import
		parent::__construct(new Qry_lookupgroup($Obj), $Obj);
	}

	public function filter_static($var=TRUE)
	{
		$this->qry->where[] = $this->qry->is_static($var);
		return $this;
	}
}

/* End of file */