<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Qry_lookupgroup extends Qry_root {
	
	public function __construct($Obj=FALSE)
	{
		parent::__construct($Obj);
	}
	
	//Where
	public function is_static($var, $cond=FALSE)
	{
		return $this->set_condition(array($this->con->is_static, $var, $cond));
	}
}

/* End of file */