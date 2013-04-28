<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ftc_lookup extends Ftc_root {
	
	public function __construct($Obj=FALSE)
	{
		//Import Needed Model
		$this->load->model(QUERY_PATH.'qry_lookup');
		//End Import
		parent::__construct(new Qry_lookup($Obj), $Obj);
	}

	public function filter_search($data)
	{
		$this->qry->where[] = $this->qry->name($data[$this->con->name],"like");
		$this->qry->where[] = $this->qry->fk_group($data[$this->con->fk_group]);
		$this->qry->where[] = $this->qry->status($data[$this->con->status]);
		return $this;
	}
	
	public function filter_by_group($value)
	{
		$this->qry->where[] = $this->qry->fk_group($value);
		return $this;
	}
}

/* End of file */