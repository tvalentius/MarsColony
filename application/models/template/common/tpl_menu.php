<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tpl_menu extends Tpl_root {
	
	var $data = array();
	
	public function __construct()
	{
		//Import Needed Source
		$this->load->model(OBJECT_PATH.'obj_menu');
		//End Import
	}
			
	function view()
	{
		$list_menu = array();
		//View
		$this->data['list_menu']	=	"(Menu Disini)";
		return $this->load->view(folder_path($this->tpl_folder).'common/menu', $this->data, TRUE);
	}
}

/* End of file */