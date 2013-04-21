<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ftc_sysparam extends Ftc_root {
	
	public function __construct($Obj=FALSE)
	{
		//Import Needed Model
		$this->load->model(QUERY_PATH.'qry_sysparam');
		//End Import
		parent::__construct(new Qry_sysparam($Obj), $Obj);
	}
	
	//Where
	public function filter_search($data=TRUE)
	{
		$this->qry->where[] = $this->qry->name($data[$this->con->name], "like");
		return $this;
	}

	public function filter_static($var=TRUE)
	{
		$this->qry->where[] = $this->qry->is_static($var);
		return $this;
	}
	
	//Execute Query
	public function query_by_pk($pk,$log=FALSE)
	{
		$this->qry->where[] = $this->qry->name($pk);
		return $this->query($log);
	}
}

/* End of file */