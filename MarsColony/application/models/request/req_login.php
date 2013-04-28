<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Req_login extends Req_root {	
	
	public function __construct()
	{
		//Load
		$this->load->model(OBJECT_PATH.'obj_user');
		//
		parent::__construct();
		$this->con = new Con_user;
	}
	
	public function form_login_post($save=FALSE)
 	{
		$data = array(
			$this->con->login_name	=> $this->input->post($this->form_name),
			$this->con->pass		=> $this->input->post($this->form_pass)
		);
		return $this->process_value($data);
	}
	
	public function form_login_rules()
	{
		$rules[]	= array(
			'field' => $this->form_name,'label' => "User", 'rules' => 'required'
		);
		$rules[]	= array(
			'field' => $this->form_pass,'label' => "Password", 'rules' => 'required'
		);
		return $this->check_post_rules($rules);
	}
}

/* End of file */