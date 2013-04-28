<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ftc_audittrail extends Ftc_root {
	
	public function __construct($Obj=FALSE)
	{
		//Import Needed Model
		$this->load->model(QUERY_PATH.'qry_audittrail');
		//End Import
		parent::__construct(new Qry_audittrail($Obj), $Obj);
	}

	public function filter_search($data)
	{
		//Load
		$this->load->model(REQUEST_PATH.'req_audittrail');
		//Class
		$Req = new Req_audittrail;
		//
		$this->qry->where[] = $this->qry->module($data[$this->con->module], "if");
		$this->qry->where[] = $this->qry->fk_lookup_action($data[$this->con->fk_lookup_action], "if");
		$this->qry->where[] = $this->qry->value($data[$this->con->value], "like");
		$this->qry->where[] = $this->qry->create_by($data[$this->con->create_by], "if");
		$this->qry->where[] = $this->qry->create_date_start($data[$Req->form_datestart]);
		$this->qry->where[] = $this->qry->create_date_end($data[$Req->form_dateend]);
		$this->qry->order[] = array($this->con->create_date, "DESC");
		return $this;
	}
}

/* End of file */