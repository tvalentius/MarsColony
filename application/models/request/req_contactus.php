<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Req_contactus extends Req_root {	
	
	var $form_message	=	"message";
	
	public function __construct()
	{
		//Load
		$this->load->model(CONSTANT_PATH.'con_contactus');
		//
		parent::__construct();
		$this->con = new Con_contactus;
	}

	public function form_filter_post($save=FALSE)
 	{
		$data = array(
			$this->con->name				=> $this->input->post($this->form_name),
			$this->con->fk_lookup_status	=> default_post($this->form_status, 0)
		);
		return $this->process_search_value($data);
	}
	
	/*public function form_insert_post($save=FALSE)
 	{
		$data = array(
			$this->con->name		=> $this->input->post($this->form_name)
		);
		return $this->process_value($data);
	}
	
	public function form_insert_rules()
	{
		$rules[]	= array(
			'field' => $this->form_name,'label' => "Judul", 'rules' => 'required'
		);
		$rules[]	= array(
			'field' => $this->form_teaser,'label' => "Teaser", 'rules' => 'required'
		);
		$rules[]	= array(
			'field' => $this->form_content,'label' => "Konten", 'rules' => 'required'
		);
		return $this->check_post_rules($rules);
	}*/

	public function form_update_status_post($save=FALSE)
 	{
		$data = array(
			$this->con->fk_lookup_status		=> $this->input->post($this->form_status)
		);
		return $this->process_value($data);
	}
	
	public function form_update_status_rules()
	{
		//Load
		$this->load->model(CHECK_PATH.'chk_contactus');
		//
		$rules[]	= array(
			'field' => $this->form_status,'label' => "Status",
			'rules' => 'required|external_callbacks[chk_contactus,is_lookup_status_valid]'
		);
		return $this->check_post_rules($rules);
	}
}

/* End of file */