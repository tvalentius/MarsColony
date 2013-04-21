<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Obj_root extends Root_model {
	
	var $con			= FALSE;
	var $ftc			= FALSE;
	var $obj			= FALSE;
	var $join			= array();
	
	var $data_query 	= FALSE;
	var $total_rows		= FALSE;
	
	var $data 	  		= FALSE;
	var $form_val 		= FALSE;
	var $alias			= FALSE;
			
	public function __construct($Obj=FALSE)
	{
		if($Obj==FALSE):
			$this->obj = $this;
		else:
			$this->obj = $Obj;
		endif;
	}
	
	/* Join		*/
	protected function join_object($par)
	{
		//Load the model
		$this->load->model(OBJECT_PATH."obj_".$par["object"]);
		$model = ucfirst($par["object"]);
		$object_name = "Obj_".$par["object"];
		isset($par["alias"]) ? $alias=$par["alias"] : $alias=$model;
		$this->obj->$alias = new $object_name($this->obj);
		$this->obj->$alias->con->alias = $par["fk"];
		$this->obj->$alias->alias = $this->con->alias;
		$par["object"] = $this->obj->$alias;
		$this->obj->join[$alias] = $par;
		isset($par["object_join"]) ? $this->obj->$alias->$par["object_join"]() : "";
		return $this->obj;
	}
	
	/*	Fetch	*/
	public function fetch()
	{
		return $this->ftc;
	}
	
	/*	Return fresh Data Query	*/
	public function data_query()
	{
		return $this->data_query;
	}

	/*	Return Data Result with Array */
	public function data_result_array()
	{
		$result = $this->data_query()->result_array();
		if(count($result) < 1):
			return array();
		else:
			return $result;
		endif;
	}

	/*
		Return the data result with Array,
		only Contain PK
	*/
	public function data_result_array_pk()
	{
		$result = $this->data_query()->result_array();
		$pkresult = array();
		if(count($result) > 0):
			foreach($result as $row):
				$pkresult[] = $row[$this->con->pk];
			endforeach;
		endif;
		return $pkresult;
	}

	/*	Return the data result, only single array	*/
	public function data_row()
	{
		return $this->data_query()->row_array();
	}

	/*	Return the data result	*/
	public function data_result()
	{
		return $this->data_query()->result_array();
	}

	/*	Return the data used for dropdown	*/
	public function data_dropdown($column_value=FALSE, $column_title=FALSE)
	{
		if($column_value==FALSE):	$column_value = $this->con->pk;		endif;
		if($column_title==FALSE):	$column_title = $this->con->name;	endif;
		$var = array();
		$result = $this->data_query()->result_array();
		foreach($result as $row):
			$var[$row[$column_value]] = $row[$column_title];
		endforeach;
		return $var;
	}

	/*	Return the data single PK	*/
	public function data_pk()
	{
		$row = $this->data_query()->row_array();
		return $row[$this->con->pk];
	}

	//Return the data name
	public function data_name()
	{
		$row = $this->data_query()->row_array();
		return $row[$this->con->name];
	}
	
	//Return the data total row
	public function count_rows()
	{
		return $this->data_query()->num_rows();
	}
	
	//Return the last inserted PK
	public function data_last_pk()
	{
		return $this->ftc->qry->insert_pk();
	}

	//Return the Object Value
	public function obj_limit()
	{
		return $this->obj->limit;
	}

	public function obj_search_value()
	{
		return $this->obj->search_val;
	}

	public function obj_search_encode()
	{
		return $this->obj->search_encode;
	}
}

/* End of file */