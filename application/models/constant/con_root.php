<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Con_root extends Root_model {
	
	/*	Database
	*/
	var $db_name = "citemplate";
	var $join_role = array();
	var $alias = "main";
	var $alias_used = array();
		
	public function __construct()
	{
		$this->get_unique_alias();
	}
	
	private function get_unique_alias()
	{
		$random = "a".rand(0,999);
		if(array_search($random, $this->alias_used)==FALSE):
			$this->alias_used[] = $random;
			$this->alias = $random;
		else:
			$this->get_unique_alias();
		endif;		
	}
	
	public function alias($var)
	{
		return $this->alias.".".$this->$var;
	}
}

/* End of file */