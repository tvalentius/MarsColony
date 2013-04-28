<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ftc_score extends Ftc_root {
	
	public function __construct($Obj=FALSE)
	{
		//Import Needed Model
		$this->load->model(QUERY_PATH.'qry_score');
		//End Import
		parent::__construct(new Qry_score($Obj), $Obj);
	}

	public function filter_search($data)
	{
		//Load
		$this->load->model(REQUEST_PATH.'req_audittrail');
		//Class
		$Req = new Req_audittrail;
		//
		$this->qry->where[] = $this->obj->Player->ftc->qry->fbid($data["fbid"], "if");
		$this->qry->where[] = $this->qry->type($data[$this->con->type], "if");
		$this->qry->where[] = $this->qry->create_date_start($data[$Req->form_datestart]);
		$this->qry->where[] = $this->qry->create_date_end($data[$Req->form_dateend]);
		$this->qry->order[] = array($this->con->create_date, 'desc');
		return $this;
	}
    
	public function filter_player($pk)
	{
		$this->qry->where[] = $this->qry->fk_player($pk_player);
		return $this;
	}
    
    public function select_player_total_point($pk_player=FALSE, $type=FALSE)
	{
		$this->qry->select_all = FALSE;
		$this->qry->select[] = array($this->con->fk_player);
		$this->qry->select[] = array($this->con->point,'sum');
		if($pk_player==TRUE):
			$this->qry->where[] = $this->qry->fk_player($pk_player);
		endif;
        if($type==TRUE):
			$this->qry->where[] = $this->qry->type($type);        
        endif;
		$this->qry->group = array($this->con->fk_player);
		return $this;
	}
}

/* End of file */