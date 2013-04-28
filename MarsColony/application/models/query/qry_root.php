<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Qry_root extends Root_model {
	
	//Select
	var $select = array();
	var $select_all = TRUE;
	var $select_distinct = FALSE;
	
	//Join
	var $join = array();
	
	//Where ( key, value, condition, except(if) or position(like) )
	var $where = array();
	
	//Group
	var $group = array();
	
	//Order
	var $order = array();
	
	//Limit
	var $limit = FALSE;
	var $limit_from = 0;
	
	public function __construct($Obj=FALSE)
	{
		if($Obj)	$this->con = $Obj->con;
	}
	
	/* Set Alias Condition */
	protected function set_condition($var=array())
	{
		$var[0] = $this->con->alias.".".$var[0];
		return $var;
	}
	
	/* Common Filter Function */
	public function column($column_name, $value = TRUE, $method = FALSE, $option = FALSE, $alias = FALSE)
	{
		if($alias==TRUE):
			return $this->set_condition(array($column_name, $value, $method, $option));
		else:
			return array($column_name, $value, $method, $option);
		endif;
	}

	public function pk($value, $type=FALSE)
	{
		if(is_array($value)):
			if($type==FALSE):	$type="in"; endif;
		endif;
		return $this->set_condition(array($this->con->pk, $value,$type));
	}
	
	public function name($value = TRUE,$method = "in", $option = FALSE)
	{
		return $this->set_condition(array($this->con->name, $value, $method, $option));
	}
	
	public function status($value = TRUE)
	{
		if($value===TRUE):	$value=1; elseif($value===FALSE): $value=0; endif;
		return $this->set_condition(array($this->con->status, $value));
	}
	
	public function create_date_start($value=FALSE)
	{
		if($value==FALSE): return FALSE;
		else:
			return $this->set_condition(array($this->con->create_date." >=", $value));
		endif;
	}

	public function create_date_end($value=FALSE)
	{
		if($value==FALSE): return FALSE;
		else:
			return $this->set_condition(array($this->con->create_date." <=", $value." 23:59:59"));
		endif;
	}
	
	public function create_by($value = TRUE,$method = "in", $option = FALSE)
	{
		return $this->set_condition(array($this->con->create_by, $value, $method, $option));
	}	
	
	/* Common Order Function */
	public function order_order($sort="asc")
	{
		return array($this->con->alias.".".$this->con->order, $sort);
	}
	
	public function order_create_date($sort="desc")
	{
		return array($this->con->alias.".".$this->con->create_date, $sort);
	}
	
	/* Get Query */
	public function get($log=FALSE)
	{
		//Message
		$message = "Basic Get from table ".$this->con->table;
		//From
		$this->db->from($this->con->table." AS ".$this->con->alias);
		//Execute
		$result = $this->get_query($message,$log);
		return $result;
	}
	
	/* Direct Query */
	public function execute_query($query="",$log=FALSE)
	{
		//Message
		$message = "Execute Normal Query";
		//Execute
		$result = $this->db->query($query);
		//Create Log
		$this->logger->db_desc($query, $message, $log);
		return $result;
	}
	
	/* Return Last PK Inserted */
	public function insert_pk()
	{
		return $this->db->insert_id();
	}
	
	public function total_rows()
	{
		$query = $this->db->query('SELECT FOUND_ROWS() AS `Count`');
		return $query->row()->Count;
	}

	/* Insert */
	public function insert_single($data, $log=FALSE)
	{
		//Message
		$message = "Basic Insert from table ".$this->con->table;
		//
		if(isset($this->con)):
			if(isset($this->con->create_date)):
				if(isset($data[$this->con->create_date])==FALSE):
			 		$data[$this->con->create_date]= current_datetime();
				endif;
			endif;
			if(isset($this->con->create_by) && $this->is_backend==TRUE):
			 	if(isset($data[$this->con->create_by])==FALSE):
				 		$data[$this->con->create_by] = $this->userdata[$this->con_user->pk];
				endif;
			endif;
		endif;
		//Execute
		return $this->insert_query($this->con->table, $data, $message,$log);
	}
	
	public function insert_multi($data, $log=FALSE)
	{
		//Message
		$message = "Multiple Insert from table ".$this->con->table;
		//Execute
		return $this->multi_insert_query($this->con->table, $data, $message, $log);
	}
	
	/* Update	*/
	public function update_by_pk($pk, $data, $log=FALSE)
	{
		//Message
		$message = "Basic Update by PK from table ".$this->con->table;
		//
		if(isset($this->con)):
			if(isset($this->con->update_date)):
				if(isset($data[$this->con->update_date])==FALSE):
			 		$data[$this->con->update_date]= current_datetime();
				endif;
			endif;
			if(isset($this->con->update_by) && $this->is_backend==TRUE):
			 	if(isset($data[$this->con->update_by])==FALSE):
				 		$data[$this->con->update_by] = $this->userdata[$this->con_user->pk];
				endif;
			endif;
		endif;
		//Execute
		$this->db->where($this->con->pk, $pk);
		return $this->update_query($this->con->table, $data, $message, $log);
	}

	public function update_multi($data, $log=FALSE)
	{
		//Message
		$message = "Multiple Update from table ".$this->con->table;
		//Execute
		return $this->update_multi_query($this->con->table, $data, $message, $log);
	}

	public function update_all($data, $log=FALSE)
	{
		//Message
		$message = "Basic Update All from table ".$this->con->table;
		//Execute
		return $this->update_query($this->con->table, $data, $message, $log);
	}
	
	/*	Delete	*/
	public function delete_by_pk($pk, $log=FALSE)
	{
		//Message
		$message = "Basic Delete by PK from table ".$this->con->table;
		//Execute
		$this->db->where($this->con->pk, $pk);
		return $this->delete_query($this->con->table, $message, $log);
	}

	public function delete_multi_by_pk($pk, $log=FALSE)
	{
		//Message
		$message = "Basic Multiple Delete by PK from table ".$this->con->table;
		//Execute
		$this->db->where_in($this->con->pk, $pk);
		return $this->delete_query($this->con->table, $message, $log);
	}
		
	/* Custom Execute Function */
	protected function get_query($desc="", $log=FALSE)
	{
		$this->select();
		$this->join();
		$this->where();
		$this->order_by();
		$this->limit();
		$query = $this->db->get();
		$this->logger->db_desc($query, $desc, $log);
		return $query;
	}

	/* Custom Select Function */
	private function select()
	{
		if($this->select_all == TRUE):
			$this->db->select("SQL_CALC_FOUND_ROWS *",FALSE);
		endif;

		if($this->select_distinct == TRUE):
			$this->db->distinct();
		endif;

		if($this->select == TRUE):
			foreach($this->select as $select):
			//If there is condition
				if(isset($select[1]) && $select[1] == TRUE):
					/*$select[1] = isset($select[2]) ? $select[2] : 0 ;*/
			//If condition is optional
					if($select[1] == 'escape'):
						$this->db->select($select[0], FALSE);
			//If condition is max
					elseif($select[1] == 'max'):
						$this->db->select_max($select[0]);
			//If condition is min
					elseif($select[1] == 'min'):
						$this->db->select_min($select[0]);
			//If condition is average
					elseif($select[1] == 'avg'):
						$this->db->select_avg($select[0]);
			//If condition is sum
					elseif($select[1] == 'sum'):
						$this->db->select_sum($select[0]);
					endif;
				elseif($select[0]):
					$this->db->select($select[0]);
				endif;
			endforeach;
		endif;
		$this->select = array();
	}

	/* Custom Join Function
	Rules :
		create an array that contains the "join" object to be executed,
		arrays contains 3 subvalue,
		1st is the Table, (Must)
		2nd is the On Condition, (Must)
		3rd is the Type of join, such as left, right, outer, inner, left outer, and right outer. (Optional)
	*/
	private function join()
	{
		if(is_array($this->join)):			
			foreach($this->join as $join):
				if(isset($join[2]) && $join[2] == TRUE):
					$cond= $join[2];
				else:
					$cond = FALSE;
				endif;
				$this->db->join($join[0], $join[1], $cond);
			endforeach;
		endif;
		$this->join = array();
	}
	
	function join_by_object($vars)
	{
		foreach($vars as $var):
			$Con = $var[0];
			$fk = $var[1];
			$pk = isset($var[2]) ? $var[2] : $Con->pk;
			$method = isset($var[3]) ? $var[3] : FALSE;
			$this->join[] = array($Con->table, $fk."=".$pk, $method);
		endforeach;
	}
	/* Custom Where Function
	Rules :
		create an array that contains the "where" object to be executed,
		arrays contains 4 subvalue,
		1st is the Key, (Must)
		2nd is the Value, (Must)
		3rd is the Condition, such as "if", "like", "in", "not in", and "null", if empty then it's "must" (Optional)
		4th is the Parameter for Condition (Optional)
	*/
	private function where()
	{
		if(is_array($this->where)):
			foreach($this->where as $where):
			//If there is condition
				if($where==TRUE):
					if(isset($where[2]) && $where[2] == TRUE):
						$where[3] = isset($where[3]) ? $where[3] : 0 ;
				//If condition is optional
						if($where[2] == 'if'):
							$this->where_if($where[0], $where[1], $where[3]);
				//If condition is like, third parameter is to determine the like
						elseif($where[2] == 'like'):
							$this->where_like($where[0], $where[1], $where[3]);
				//If condition is null
						elseif($where[2] == 'null'):
							$this->where_null($where[0], $where[1]);
				//If condition is in
						elseif($where[2] == 'in'):
							$this->db->where_in($where[0], $where[1]);
				//If condition is not in
						elseif($where[2] == 'not in'):
							$this->db->where_not_in($where[0], $where[1]);
				//If condition is or
						elseif($where[2] == 'or'):
							$this->db->or_where($where[0], $where[1], $where[3]);
				//If condition is or like
						elseif($where[2] == 'or_like'):
							$this->db->or_like($where[0], $where[1], $where[3]);
						endif;
				//If no condition
					elseif($where[0]):
						if(isset($where[1])):
							$where[3] = isset($where[3]) && $where[3]==TRUE ? $where[3] : TRUE;
							$this->where_must($where[0],$where[1],$where[3]);
						else:
							$this->db->where($where[0]);
						endif;
					endif;
				endif;
			endforeach;
		endif;
		$this->where = array();
	}
	
	private function where_like($key, $value,$position='both')
	{
		if(empty($position)): $position='both';	endif;
		$this->db->like($key, $value,$position);
	}
	
	private function where_if($key, $value, $except = FALSE)
	{
		if($value == TRUE):
            if($except==FALSE):
       			$this->db->where($key, $value);
            else:
                if($value != $except):
       			    $this->db->where($key, $value);
                endif;
            endif;
		endif;
	}
	
	private function where_must($key, $value, $esc=TRUE)
	{
		$this->db->where($key, $value, $esc);
	}
	
	private function where_null($key, $value)
	{
		$this->db->where($key.' is '.$value,NULL,FALSE);
	}	

	/* Custom Order Function */
	private function group_by()
	{
		$this->db->group_by($this->group);
		$this->group = array();
	}
	
	/* Custom Order Function */
	private function order_by()
	{
		foreach($this->order as $order):
			$var = $order[1]?$order[1]:FALSE;
			$this->db->order_by($order[0], $var);
		endforeach;
		$this->order = array();
	}
	
	/* Custom Limit Function */
	private function limit()
	{
		if($this->limit == TRUE):
			$this->db->limit($this->limit, $this->limit_from);
		endif;
		
		$this->limit = FALSE;
	}
	
	/*Every Query about INSERT, UPDATE, and DELETE is below */
	
	/* Insert */
	protected function insert_query($table, $data, $desc="", $log=FALSE)
	{
		$query = $this->db->insert($table, $data);
		$this->logger->db_desc($query, $desc,$log);
		
		return $query;
	}

	protected function multi_insert_query($table, $data, $desc="", $log=FALSE)
	{
		$query = $this->db->insert_batch($table, $data);
		$this->logger->db_desc($query, $desc,$log);		
		return $query;
	}

	protected function update_query($table, $data, $desc="", $log=FALSE)
	{
		$query = $this->db->update($table, $data);
		$this->logger->db_desc($query, $desc,$log);		
		return $query;
	}

	protected function multi_update_query($table, $data, $key, $desc="", $log=FALSE)
	{
		$query = $this->db->update_batch($table, $data, $key);
		$this->logger->db_desc($query, $desc,$log);		
		return $query;
	}
		
	protected function delete_query($table, $desc="", $log=FALSE)
	{
		$query = $this->db->delete($table);
		$this->logger->db_desc($query, $desc,$log);
		
		return $query;
	}
}

/* End of file */