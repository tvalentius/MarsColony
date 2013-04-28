<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tpl_header extends Tpl_root {

	var $data = array();
	
	public function __construct()
	{
		parent::__construct();
	}
		
	function view()
	{
		$this->data['name'] = $this->user_name();
		return $this->load->view(folder_path($this->tpl_folder).'backend/header', $this->data, TRUE);
	}
	
	private function user_name()
	{
		if($this->is_user_login):
			$name = $this->userdata[$this->UserLogin->con->name];
		else:
			$name = "Guest";
		endif;
		return $name;
	}
}

/* End of file */