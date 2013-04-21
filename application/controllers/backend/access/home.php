<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends Backend_Controller {

	public function __construct()
	{
		parent::__construct();
		//Import Main Source needed for this module
		//End Import
		if($this->is_user_login==FALSE): redirect('','parent');	endif;
	}

	public function index()
	{
		//First Action
		$this->_load_template();	
		$this->tpl_root->backend();	
		//View
		$content = $this->current_path.'home';
		$this->tpl_root->view($content, $this->viewdata);
	}
}

/* End of file */