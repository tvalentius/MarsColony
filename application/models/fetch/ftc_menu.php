<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ftc_menu extends Ftc_root {
	
	public function __construct($Obj=FALSE)
	{
		//Import Needed Model
		$this->load->model(CONSTANT_PATH.'con_menu');
		$this->load->model(QUERY_PATH.'qry_menu');
		//End Import
		parent::__construct(new Qry_menu($Obj), $Obj);
	}
	
	public function filter_admin()
	{
		$this->qry->where[] = $this->qry->status(TRUE);
		$this->qry->where[] = $this->qry->is_admin(TRUE);
		$this->qry->order[] = $this->qry->order_depth();
		$this->qry->order[] = $this->qry->order_order();
		return $this;
	}

	public function select_name_link()
	{
		$this->qry->select_all = FALSE;
		$this->qry->select[] = array($this->con->alias.".".$this->con->pk);
		$this->qry->select[] = array($this->con->alias.".".$this->con->name);
		$this->qry->select[] = array($this->con->alias.".".$this->con->link);
		$this->qry->select[] = array($this->con->alias.".".$this->con->fk_parent);
		return $this;
	}
	
}

/* End of file */