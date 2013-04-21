<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Qry_images extends Qry_root {
	
	public function __construct($Obj=FALSE)
	{
		parent::__construct($Obj);
	}
	
	public function fk_lookup_category($var, $cond=FALSE)
	{
		return $this->set_condition(array($this->con->fk_lookup_category, $var, $cond));
	}
	public function keyword($var, $cond="or_like")
	{
		return $this->set_condition(array($this->con->keyword, $var, $cond));
	}
	
	public function hot($value = TRUE)
	{
		if($value===TRUE):	$value=1; elseif($value===FALSE): $value=0; endif;
		return $this->set_condition(array($this->con->is_hot, $value));
	}
}

/* End of file */  