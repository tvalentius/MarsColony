<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ftc_root extends Root_model {
	
	var $obj;
	var $con;
	var $qry;
	
	var $join = array();
	
	public function __construct($qry=FALSE, $obj=FALSE)
	{
		//Import Needed Model
		//End Import
		if($obj)	$this->con = $obj->con;
		$this->qry = $qry;
		$this->obj = $obj;
	}
	
	//Get Query Service Class
	public function service()
	{
		return $this->qry;
	}
	
	//Filter Select
	public function select_dropdown()
	{
		$this->qry->select_all = FALSE;
		$this->qry->select[] = array($this->con->alias.".".$this->con->pk);
		$this->qry->select[] = array($this->con->alias.".".$this->con->name);
		return $this;
	}
	
	//Filter Where
	public function column($col_name, $var, $method=FALSE, $option=FALSE, $alias=TRUE)
	{
		$this->qry->where[] = $this->qry->column($col_name, $var, $method, $option, $alias);
		return $this;
	}
	
	public function filter_pk($pk, $type=FALSE)
	{
		$this->qry->where[] = $this->qry->pk($pk, $type);
		return $this;
	}
	
	public function filter_createby($pk)
	{
		$this->qry->where[] = $this->qry->create_by($pk);
		return $this;
	}
	
	public function filter_active($active=TRUE)
	{
		$this->qry->where[] = $this->qry->status($active);
		return $this;
	}
	
	//Order
	public function order_createdate($order="DESC")
	{
		$this->qry->order[] = $this->qry->order_create_date();
		return $this;
	}
	
	//Limit
	public function limit($limit=6, $from=0)
	{
		$this->qry->limit = $limit;
		$this->qry->limit_from = $from;
		return $this;
	}
	
	public function limit_page($limit=6, $page=FALSE)
	{
		$page = $page==FALSE?1:$page;
		$flag_from = $page-1;
		$from = $flag_from*$limit;
		return $this->limit($limit, $from);
	}
	
	//Get the result
	public function query($log=FALSE)
	{
		$this->join_table();
		$this->obj->data_query = $this->qry->get($log);
		$this->obj->total_rows = $this->qry->total_rows();
		return $this->obj;
	}

	public function query_by_pk($pk,$log=FALSE)
	{
		$this->qry->where[] = $this->qry->pk($pk);
		return $this->query($log);
	}
	
	//Join Table
	private function join_table()
	{
		foreach($this->obj->join as $join):
			$object = $join["object"];
			$method = isset($join["join_method"]) ? $join["join_method"] : FALSE;
			$on_rule = isset($join["join_on_rule"]) ? $join["join_on_rule"] : FALSE;
			$join_column = isset($join["join_column"]) ? $join["join_column"] : $object->con->pk;
			if($join["fk"]):
				$join_fk = $join["fk"].".".$join_column."=".$object->alias.".".$join["fk"];
				if($on_rule):
					$on_rule = $join_fk." AND ".$on_rule;
				else:
					$on_rule = $join_fk;
				endif;
			endif;
			$this->qry->join[] = array(
				$object->con->table." ".$join["fk"],
				$on_rule,
				$method
			);
			if(isset($join["select"])):
				if(is_array($join["select"])):
					foreach($join["select"] as $select):
						$this->qry->select[] = array(
							$join["fk"].".".$object->con->$select." AS '".
							$join["fk"].".".$object->con->$select."'"
						);					
					endforeach;
				else:
					$this->qry->select[] = array(
						$join["fk"].".".$object->con->$join["select"]." AS '".
						$join["fk"].".".$object->con->$join["select"]."'"
					);
				endif;
			endif;
		endforeach;
	}
}

/* End of file */