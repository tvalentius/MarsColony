<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Qry_audittrail extends Qry_root {
	
	public function __construct($Obj=FALSE)
	{
		parent::__construct($Obj);
	}
		
	/* Where condition */
	public function value($var, $cond=FALSE, $opt="")
	{
		return $this->set_condition(array($this->con->value, $var, $cond, $opt));
	}

	public function module($var, $cond=FALSE, $opt="")
	{
		return $this->set_condition(array($this->con->module, $var, $cond, $opt));
	}

	public function fk_lookup_action($var, $cond=FALSE)
	{
		return $this->set_condition(array($this->con->fk_lookup_action, $var, $cond));
	}
}

/* End of file */