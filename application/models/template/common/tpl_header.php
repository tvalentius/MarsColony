<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tpl_header extends Tpl_root {

	var $data = array();
	
	public function __construct()
	{
		parent::__construct();
	}
		
	function view()
	{
		if($this->is_backend==TRUE):
			$this->data['message'] = "Backend Header";
		else:
			$this->data['message'] = "Public Header";
		endif;
		$this->data['name'] = $this->user_name();
		return $this->load->view(folder_path($this->tpl_folder).'common/header', $this->data, TRUE);
	}
	
	private function user_name()
	{
		if($this->is_user_login):
			$name = $this->userdata[$this->UserLogin->con->name]." (".$this->userdata[$this->UserLogin->Usergroup->con->name].")";
		else:
			$name = "Guest";
		endif;
		return $name;
	}
}

/* End of file */