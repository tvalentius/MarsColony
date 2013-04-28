<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Qry_gamelog extends Qry_root {
	
	public function __construct($Obj=FALSE)
	{
		parent::__construct($Obj);
	}

	/* Where condition */
	public function fk_player($var, $cond=FALSE)
	{
		return $this->set_condition(array($this->con->fk_player, $var));
	}
    
    /* Delete */
    public function delete_pending_log_by_fk_player($fk, $log=FALSE)
	{
		//Message
		$message = "Delete pending log by FK Player from table ".$this->con->table;
		//Execute
		$this->db->where($this->con->fk_player, $fk);
		$this->db->where($this->con->status, 0);
		return $this->delete_query($this->con->table, $message, $log);
	}
}

/* End of file */  