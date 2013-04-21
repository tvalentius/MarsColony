<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Req_profile extends Req_root {	
	
	var $form_pass_old		=	"oldpass";
	var $form_repass		=	"repass";
	var $form_login_name	=	"login_name";
	
	public function __construct()
	{
		parent::__construct();
		$this->con = new Con_user;
	}

	public function form_update_post($save=FALSE)
 	{
		$data = array(
			$this->con->name		=> $this->input->post($this->form_name)
		);
		return $this->process_value($data);
	}
	
	public function form_update_rules()
	{
		$rules[]	= array(
			'field' => $this->form_name,'label' => "Nama", 'rules' => 'required'
		);
		return $this->check_post_rules($rules);
	}

	public function form_update_pass_post($save=FALSE)
 	{
		$data = array(
			$this->con->pass		=> $this->input->post($this->form_pass)
		);
		return $this->process_value($data);
	}
	
	public function form_update_pass_rules()
	{
		//Load
		$this->load->model(CHECK_PATH.'chk_user');
		//
		$rules[]	= array(
			'field' => $this->form_pass_old,'label' => "Password Lama",
			'rules' => 'required|external_callbacks[chk_user,is_logged_in_user_pass_match]'
		);
		$rules[]	= array(
			'field' => $this->form_pass,'label' => "Password Baru", 'rules' => 'required'
		);
		$rules[]	= array(
			'field' => $this->form_repass,'label' => "Ulang Password", 'rules' => 'matches['.$this->form_pass.']'
		);
		return $this->check_post_rules($rules);
	}
}

/* End of file */