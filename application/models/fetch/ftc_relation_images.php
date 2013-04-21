<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ftc_relation_images extends Ftc_root {
	
	public function __construct($Obj=FALSE)
	{
		//Import Needed Model
		$this->load->model(QUERY_PATH.'qry_relation_images');
		//End Import
		parent::__construct(new Qry_relation_images($Obj), $Obj);
	}
	
	//Filter
	public function query_by_pk_type($type, $pk, $log=FALSE)
	{
		$this->qry->where[] = $this->qry->pk_typename($type);
		$this->qry->where[] = $this->qry->pk_typeid($pk);
		return $this->query($log);
	}
	
	public function query_by_pk($type, $pk, $pk_images,$log=FALSE)
	{
		$this->qry->order[] = array($this->con->order, 'ASC');
		$this->qry->where[] = $this->qry->pk_typename($type);
		$this->qry->where[] = $this->qry->pk_typeid($pk);
		$this->qry->where[] = $this->qry->pk_images($pk_images);
		return $this->query($log);
	}
}

/* End of file */