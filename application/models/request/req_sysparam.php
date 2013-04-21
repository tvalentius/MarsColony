<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Req_sysparam extends Req_root {	
	
	var $form_static		=	"is_static";
	var $form_value			=	"value";
	
	public function __construct()
	{
		//Load
		$this->load->model(CONSTANT_PATH.'con_sysparam');
		//
		parent::__construct();
		$this->con = new Con_sysparam;
	}

	public function form_filter_post($save=FALSE)
 	{
		$data = array(
			$this->con->name		=> $this->input->post($this->form_name),
		);
		return $this->process_search_value($data);
	}

	public function form_update_post($save=FALSE)
 	{
		$data = array(
			$this->con->value		=> $this->input->post($this->form_value),
		);
		return $this->process_value($data);
	}
	
	public function form_update_rules()
	{
		$rules[]	= array(
			'field' => $this->form_value,'label' => "Value", 'rules' => 'required'
		);
		return $this->check_post_rules($rules);
	}
}

/* End of file */