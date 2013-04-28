<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends Backend_Controller {
	
	public function __construct()
	{
		parent::__construct();
		//Import Main Source
		//Auth
		if($this->is_user_login==FALSE):	redirect('','parent');	endif;
	}
	
	public function index()
	{
		//Import
		$this->load->library('chenx_form');
		$this->load->model(OBJECT_PATH.'obj_user');
		$this->load->model(REQUEST_PATH.'req_profile');
		//Class and Variable
		$Req = new Req_profile;
		$User = new Obj_user;
		//First Action
		$this->_load_template();
		$this->tpl_root->backend_plain();
		//
		$User->join_usergroup();
		$data = $User->fetch()->query_by_pk($this->userpk)->data_row();
		if($_POST==TRUE):
			$data = array_merge($data, $Req->form_update_post());
			if($Req->form_update_rules()==TRUE):
				$this->_do_update($Req->form_update_post());
			else:
				$this->tpl_message->error = validation_errors();
			endif;
		endif;
		//View
		$content = $this->current_path.'home';
		$this->viewdata['Form'] = new Chenx_form;
		$this->viewdata['Req'] = $Req;
		$this->viewdata['data'] = $data;
		//View!
		$this->tpl_root->view($content, $this->viewdata);
	}

	private function _do_update($data)
	{
		//Import
		$this->load->model(SERVICE_PATH.'svc_user');
		//Class
		$Svc = New Svc_user;
		//
		$do = $Svc->update_by_pk($this->userpk, $data);
		if($do==TRUE):
			$this->session->success($Svc->message);
			redirect('box_message');
		else:
			$this->session->error($Svc->message);
			redirect($this->current_path);
		endif;
	}

	public function update_pass()
	{
		//Import
		$this->load->library('chenx_form');
		$this->load->model(OBJECT_PATH.'obj_user');
		$this->load->model(REQUEST_PATH.'req_profile');
		//Class and Variable
		$Req = new Req_profile;
		$User = new Obj_user;
		//First Action
		$this->_load_template();	
		$this->tpl_root->backend_plain();	
		//
		$userdata = $this->userdata;
		if($_POST==TRUE):
			$data = $Req->form_update_pass_post();
			if($Req->form_update_pass_rules()==TRUE):
				$this->_do_update_pass($data);
			else:
				$this->tpl_message->error = validation_errors();
			endif;
		endif;
		//View
		$content = $this->current_path.'update_pass';
		$this->viewdata['Form'] = new Chenx_form;
		$this->viewdata['Req'] = $Req;
		$this->viewdata['userdata'] = $userdata;
		$this->tpl_root->view($content, $this->viewdata);
	}

	private function _do_update_pass($data)
	{
		//Import
		$this->load->model(SERVICE_PATH.'svc_user');
		//Class
		$Svc = New Svc_user;
		//
		$do = $Svc->update_pass_by_pk($this->userpk, $data);
		if($do==TRUE):
			$this->session->success($Svc->message);
			redirect($this->current_path);
		else:
			$this->session->error($Svc->message);
			redirect($this->current_path.'update_pass');
		endif;
	}
}

/* End of file */