<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ftc_player extends Ftc_root {
	
	public function __construct($Obj=FALSE)
	{
		//Import Needed Model
		$this->load->model(QUERY_PATH.'qry_player');
		//End Import
		parent::__construct(new Qry_player($Obj), $Obj);
	}

	public function filter_search($data)
	{
		$this->qry->where[] = $this->qry->name($data[$this->con->name],"like");
		$this->qry->where[] = $this->qry->status($data[$this->con->status]);
		return $this;
	}
	
	public function filter_fbid($fbid)
	{
		$this->qry->where[] = $this->qry->fbid($fbid);
		return $this;
	}

	public function filter_email($email)
	{
		$this->qry->where[] = $this->qry->email($email);
		return $this;		
	}
}

/* End of file */