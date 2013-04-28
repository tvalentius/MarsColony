<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Qry_contactus extends Qry_root {
	
	public function __construct($Obj=FALSE)
	{
		parent::__construct($Obj);
	}

	//Where
	public function status($value = TRUE, $cond = FALSE)
	{
		return $this->set_condition(array($this->con->fk_lookup_status, $value, $cond));
	}
}

/* End of file */