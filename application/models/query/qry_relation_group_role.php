<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Qry_relation_group_role extends Qry_root {
	
	public function __construct($Obj=FALSE)
	{
		//Import
		$this->load->model(CONSTANT_PATH.'con_relation_group_role');
		//End
		parent::__construct($Obj);
	}
	
	public function delete_by_pk_group($pk_group, $log=FALSE)
	{
		//Message
		$message = "Multiple Delete by PK Group from table ".$this->con->table;
		//Execute
		$this->db->where($this->con->pk_group, $pk_group);
		return $this->delete_query($this->con->table, $message, $log);		
	}

	public function pk_group($value = TRUE,$method = FALSE, $option=FALSE)
	{
		return array($this->con->alias.".".$this->con->pk_group, $value, $method, $option);
	}
}

/* End of file */