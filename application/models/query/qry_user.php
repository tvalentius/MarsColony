<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Qry_user extends Qry_root {
	
	public function __construct($Obj=FALSE)
	{
		parent::__construct($Obj);
	}
		
	/* Where condition */
	public function login_name($var, $cond=FALSE)
	{
		return $this->set_condition(array($this->con->login_name, $var));
	}

	public function password($var, $cond=FALSE)
	{
		return $this->set_condition(array($this->con->pass, $var, $cond));
	}
	
	public function fk_group($var, $cond=FALSE)
	{
		return $this->set_condition(array($this->con->fk_group, $var, $cond));
	}

}

/* End of file */