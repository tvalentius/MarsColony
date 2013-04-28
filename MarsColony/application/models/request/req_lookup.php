<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Req_lookup extends Req_root {	
	
	var $form_static		=	"is_static";
	var $form_group			=	"group";
	
	public function __construct()
	{
		//Load
		$this->load->model(CONSTANT_PATH.'con_lookup');
		//
		parent::__construct();
		$this->con = new Con_lookup;
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
			$this->con->desc		=> $this->input->post($this->form_desc),
			$this->con->fk_group	=> $this->input->post($this->form_group)
		);
		return $this->process_value($data);
	}
	
	public function form_insert_rules()
	{
		//Load
		$this->load->model(CHECK_PATH.'chk_lookup');
		//
		$rules[]	= array(
			'field' => $this->form_name,'label' => "Nama", 'rules' => 'required'
		);
		$rules[]	= array(
			'field' => $this->form_group,'label' => "Grup",
			'rules' => 'external_callbacks[chk_lookup,is_group_not_static]'
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