<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Req_relation_group_role extends Req_root {	
	
	var $form_role = "roles";
	
	public function __construct()
	{
		//Import
		$this->load->model(CONSTANT_PATH.'con_relation_group_role');
		//
		parent::__construct();
		$this->con = new Con_relation_group_role;
	}

	public function form_treecheckbox_post($save=FALSE)
 	{
		$data = array(
			$this->con->fk_role		=> $this->input->post($this->form_role)
		);
		return $this->process_value($data);
	}
}

/* End of file */