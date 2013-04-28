<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Qry_relation_images extends Qry_root {
	
	public function __construct($Obj=FALSE)
	{
		//Import
		$this->load->model(CONSTANT_PATH.'con_relation_images');
		//End
		parent::__construct($Obj);
	}

	public function pk_typename($value = TRUE,$method = FALSE, $option=FALSE)
	{
		return array($this->con->alias.".".$this->con->pk_typename, $value, $method, $option);
	}

	public function pk_typeid($value = TRUE,$method = FALSE, $option=FALSE)
	{
		return array($this->con->alias.".".$this->con->pk_typeid, $value, $method, $option);
	}

	public function pk_images($value = TRUE,$method = FALSE, $option=FALSE)
	{
		return array($this->con->alias.".".$this->con->pk_images, $value, $method, $option);
	}
	
	/* Update	*/
	public function update_by_pk($pk_article, $pk_images, $data, $log=FALSE)
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
			if(isset($this->con->update_by)):
			 	if(isset($data[$this->con->update_by])==FALSE):
				 		$data[$this->con->update_by] = $this->userdata[$this->con_user->pk];
				endif;
			endif;
		endif;
		//Execute
		$this->db->where($this->con->pk_article, $pk_article);
		$this->db->where($this->con->pk_images, $pk_images);
		return $this->update_query($this->con->table, $data, $message, $log);
	}

	/*	Delete	*/
	public function delete_by_pk($pk_article, $pk_images, $log=FALSE)
	{
		//Message
		$message = "Basic Delete by PK from table ".$this->con->table;
		//Execute
		$this->db->where($this->con->pk_article, $pk_article);
		$this->db->where($this->con->pk_images, $pk_images);
		return $this->delete_query($this->con->table, $message, $log);
	}
}

/* End of file */