<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tpl_message extends Tpl_root {

	var $data = array();

	/* For Message */
	var $general = FALSE;
	var $error = FALSE;
	var $success = FALSE;
	
	public function __construct()
	{
		parent::__construct();
		//
		$this->general = $this->session->general();
		$this->error = $this->session->error();
		$this->success = $this->session->success();
	}
		
	public function view()
	{
		$this->data['error'] = $this->error;
		$this->data['success'] = $this->success;
		$this->data['general'] = $this->general;
		return $this->load->view(folder_path($this->tpl_folder).'backend/message', $this->data, TRUE);
	}
	
}

/* End of file */