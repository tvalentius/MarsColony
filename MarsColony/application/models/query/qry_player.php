<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Qry_player extends Qry_root {
	
	public function __construct($Obj=FALSE)
	{
		parent::__construct($Obj);
	}

	public function fbid($var, $cond=FALSE)
	{
		return $this->set_condition(array($this->con->fbid, $var, $cond));
	}

	public function email($var = TRUE,$cond = FALSE)
	{
		return $this->set_condition(array($this->con->email, $var, $cond));
	}	
}

/* End of file */  