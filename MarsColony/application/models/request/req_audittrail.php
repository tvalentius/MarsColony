<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Req_audittrail extends Req_root {	
	
	var $form_module			=	"module";
	var $form_value				=	"value";
	var $form_action			=	"action";
	var $form_user				=	"creator";
	
	public function __construct()
	{
		//Load
		$this->load->model(CONSTANT_PATH.'con_audittrail');
		//
		parent::__construct();
		$this->con = new Con_audittrail;
	}

	public function form_filter_post($save=FALSE)
 	{
		$data = array(
			$this->con->module				=> $this->input->post($this->form_module),
			$this->con->value				=> $this->input->post($this->form_value),
			$this->con->fk_lookup_action	=> $this->input->post($this->form_action),
			$this->form_datestart			=> default_post($this->form_datestart, minus_date(30)),
			$this->form_dateend				=> default_post($this->form_dateend, current_date()),
			$this->con->create_by			=> $this->input->post($this->form_user)
		);
		return $this->process_search_value($data);
	}
}

/* End of file */