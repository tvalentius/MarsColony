<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ftc_user extends Ftc_root {
	
	public function __construct($Obj=FALSE)
	{
		//Import Needed Model
		$this->load->model(QUERY_PATH.'qry_user');
		//End Import
		parent::__construct(new Qry_user($Obj), $Obj);
	}

	public function filter_search($data)
	{
		$this->qry->where[] = $this->qry->name($data[$this->con->name],"like");
		$this->qry->where[] = $this->qry->fk_group($data[$this->con->fk_group],"if");
		$this->qry->where[] = $this->qry->status($data[$this->con->status]);
		return $this;
	}

	public function filter_login_name($var)
	{
		$this->qry->where[] = $this->qry->login_name($var);
		return $this;
	}
	
	public function filter_by_group($value)
	{
		$this->qry->where[] = $this->qry->fk_group($value);
		return $this;
	}

	public function filter_login($data)
	{
		$this->qry->where[] = $this->qry->login_name($data[$this->con->login_name]);
		$this->qry->where[] = $this->qry->password(md5($data[$this->con->pass]));
		$this->qry->where[] = $this->qry->status(TRUE);
		return $this;
	}
}

/* End of file */