<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Req_usergroup extends Req_root {	
	
	public function __construct()
	{
		//Import
		$this->load->model(CONSTANT_PATH.'con_usergroup');
		//
		parent::__construct();
		$this->con = new Con_usergroup;
	}

	public function form_filter_post($save=FALSE)
 	{
		$data = array(
			$this->con->name		=> $this->input->post($this->form_name),
			$this->con->status		=> default_post($this->form_status,1)
		);
		return $this->process_search_value($data);
	}
	
	public function form_insert_post($save=FALSE)
 	{
		$data = array(
			$this->con->name		=> $this->input->post($this->form_name),
			$this->con->desc		=> $this->input->post($this->form_desc)
		);
		return $this->process_value($data);
	}
	
	public function form_insert_rules()
	{
		$rules[]	= array(
			'field' => $this->form_name,'label' => "Nama", 'rules' => 'required'
		);
		return $this->check_post_rules($rules);
	}

	public function form_update_post($save=FALSE)
 	{
		$data = array(
			$this->con->name		=> $this->input->post($this->form_name),
			$this->con->desc		=> $this->input->post($this->form_desc)
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
}

/* End of file */