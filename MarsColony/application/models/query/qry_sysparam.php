<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Qry_sysparam extends Qry_root {
	
	public function __construct($Obj=FALSE)
	{
		parent::__construct($Obj);
	}
	
	//Where
	public function is_static($var, $cond=FALSE)
	{
		return $this->set_condition(array($this->con->is_static, $var, $cond));
	}

	/* Update	*/
	public function update_by_pk($pk, $data, $log=FALSE)
	{
		//Message
		$message = "Custom Update by PK (Name) from table ".$this->con->table;
		//
		if(isset($this->con)):
			if(isset($this->con->update_date)):
				if(isset($data[$this->con->update_date])==FALSE):
			 		$data[$this->con->update_date]= current_datetime();
				endif;
			endif;
			if(isset($this->con->update_by)):
			 	if(isset($data[$this->con->update_by])==FALSE):
				 		$data[$this->con->update_by] = $this->userdata[$this->con_user->pk];
				endif;
			endif;
		endif;
		//Execute
		$this->db->where($this->con->name, $pk);
		return $this->update_query($this->con->table, $data, $message, $log);
	}
}

/* End of file */