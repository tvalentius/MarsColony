<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tpl_footer extends Tpl_root {

	var $data = array();
	
	public function __construct()
	{
	}
		
	function view()
	{
		return $this->load->view(folder_path($this->tpl_folder).'common/footer', $this->data, TRUE);
	}
}

/* End of file */