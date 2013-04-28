<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tpl_footer extends Tpl_root {

	var $data = array();
	
	public function __construct()
	{
	}
		
	function view()
	{
		//View Data
		$this->data["app_version"] = $this->syspar['APP_VERSION'];
		//Return View
		return $this->load->view(folder_path($this->tpl_folder).'backend/footer', $this->data, TRUE);
	}
}

/* End of file */