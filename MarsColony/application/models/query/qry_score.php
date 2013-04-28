<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Qry_score extends Qry_root {
	
	public function __construct($Obj=FALSE)
	{
		parent::__construct($Obj);
	}
    
	/* Where condition */
	public function fk_player($var, $cond=FALSE)
	{
		return $this->set_condition(array($this->con->fk_player, $var, $cond));
	}
    
	public function type($var, $cond=FALSE)
	{
		return $this->set_condition(array($this->con->type, $var, $cond));
	}
}

/* End of file */  