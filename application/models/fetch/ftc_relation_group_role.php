<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ftc_relation_group_role extends Ftc_root {
	
	public function __construct($Obj=FALSE)
	{
		//Import Needed Model
		$this->load->model(QUERY_PATH.'qry_relation_group_role');
		//End Import
		parent::__construct(new Qry_relation_group_role($Obj), $Obj);
	}
	
	public function select_treecheckbox()
	{
		$this->qry->select_distinct = TRUE;
		$this->qry->order[] = array($this->obj->Role_param->con->fk_menu,'ASC');
		$this->qry->order[] = array($this->obj->Role_param->con->order,'ASC');
		return $this;
	}

	public function query_by_pk_group($pk,$log=FALSE)
	{
		$this->qry->where[] = $this->qry->pk_group($pk);
		return $this->query($log);
	}
}

/* End of file */