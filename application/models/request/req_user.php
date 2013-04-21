<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Req_user extends Req_root {	
	
	var $form_pass_old		=	"oldpass";
	var $form_repass		=	"repass";
	var $form_login_name	=	"login_name";
	var $form_group			=	"group";
	
	public function __construct()
	{
		parent::__construct();
		$this->con = new Con_user;
	}

	public function form_filter_post($save=FALSE)
 	{
		$data = array(
			$this->con->name		=> $this->input->post($this->form_name),
			$this->con->fk_group	=> $this->input->post($this->form_group),
			$this->con->status		=> default_post($this->form_status,1)
		);
		return $this->process_search_value($data);
	}
	
	public function form_insert_post($save=FALSE)
 	{
		$data = array(
			$this->con->name		=> $this->input->post($this->form_name),
			$this->con->login_name	=> $this->input->post($this->form_login_name),
			$this->con->pass		=> $this->input->post($this->form_pass),
			$this->con->fk_group	=> $this->input->post($this->form_group)
		);
		return $this->process_value($data);
	}
	
	public function form_insert_rules()
	{
		//Load
		$this->load->model(CHECK_PATH.'chk_user');
		//		
		$rules[]	= array(
			'field' => $this->form_name,'label' => "Nama", 'rules' => 'required'
		);
		$rules[]	= array(
			'field' => $this->form_login_name,'label' => "User",
			'rules' => 'required|external_callbacks[chk_user,is_user_new]'
		);
		$rules[]	= array(
			'field' => $this->form_pass,'label' => "Password", 'rules' => 'required'
		);
		$rules[]	= array(
			'field' => $this->form_repass,'label' => "Ulang Password", 'rules' => 'matches['.$this->form_pass.']'
		);
		return $this->check_post_rules($rules);
	}

	public function form_update_post($save=FALSE)
 	{
		$data = array(
			$this->con->name		=> $this->input->post($this->form_name),
			$this->con->fk_group	=> $this->input->post($this->form_group),
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
		$rules[]	= array(
			'field' => $this->form_pass,'label' => "Password", 'rules' => 'required'
		);
		$rules[]	= array(
			'field' => $this->form_repass,'label' => "Ulang Password", 'rules' => 'matches['.$this->form_pass.']'
		);
		return $this->check_post_rules($rules);
	}
}

/* End of file */