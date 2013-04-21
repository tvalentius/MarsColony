<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ftc_usergroup extends Ftc_root {
	
	public function __construct($Obj=FALSE)
	{
		//Import Needed Model
		$this->load->model(QUERY_PATH.'qry_usergroup');
		//End Import
		parent::__construct(new Qry_usergroup($Obj), $Obj);
	}

	public function filter_search($data)
	{
		$this->qry->where[] = $this->qry->name($data[$this->con->name],"like");
		$this->qry->where[] = $this->qry->status($data[$this->con->status]);
		return $this;
	}

	public function filter_active()
	{
		$this->qry->where[] = $this->qry->status(TRUE);
		return $this;
	}
}

/* End of file */