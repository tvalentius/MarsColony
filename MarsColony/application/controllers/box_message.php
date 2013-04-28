<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Box_message extends MY_Controller {

	var $module = 'logout';

	public function __construct()
	{
		parent::__construct();
	}

	public function index($message="")
	{
		//First Action
		$this->_load_template();	
		$this->tpl_root->box_message();	
		//
		//View
		$content = 'box_message';
		$data['message'] = $message;
		$this->tpl_root->view($content, $data);
	}
}
/* End of file */