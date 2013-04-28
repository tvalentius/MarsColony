<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ftc_contactus extends Ftc_root {
	
	public function __construct($Obj=FALSE)
	{
		//Import Needed Model
		$this->load->model(QUERY_PATH.'qry_contactus');
		//End Import
		parent::__construct(new Qry_contactus($Obj), $Obj);
	}

	public function filter_search($data)
	{
		$this->qry->where[] = $this->qry->name($data[$this->con->name],"like");
		$this->qry->where[] = $this->qry->status($data[$this->con->fk_lookup_status], "if");
		return $this;
	}
	
	public function filter_home()
	{
		$this->qry->where[] = $this->qry->status(TRUE);
		$this->qry->order[] = $this->qry->order_create_date();
		return $this;
	}
}

/* End of file */