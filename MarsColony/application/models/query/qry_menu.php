<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Qry_menu extends Qry_root {
	
	public function __construct($Obj=FALSE)
	{
		parent::__construct($Obj);
	}
	
	/* Where condition */
	public function is_admin($var=TRUE, $cond=FALSE)
	{
		return $this->set_condition(array($this->con->is_admin, $var));
	}
	
	/* Order */
	public function order_depth($sort="asc")
	{
		return $this->set_condition(array($this->con->depth, $sort));
	}
}

/* End of file */