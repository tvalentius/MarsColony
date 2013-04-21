<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Design extends MY_Controller {

	var $folder = array("");

	public function __construct()
	{
		parent::__construct();
		//Import
		//End
	}

	public function index()
	{
		//First Action
		$this->_load_template();
		$this->tpl_root->design();
		//
		//View
		$this->tpl_root->view('design\home', $this->viewdata);
	}
}

/* End of file */