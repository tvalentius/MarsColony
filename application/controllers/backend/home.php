<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends Backend_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if($this->is_user_login===TRUE):
			$this->_home();
		else:
			$this->_login();
		endif;
	}

	private function _home()
	{
		//First Action
		$this->_load_template();
		$this->tpl_root->backend();
		//View
		$content = $this->current_path.'home';
		$this->tpl_root->view($content,$this->viewdata);
	}

	private function _login()
	{
		//Import
		$this->load->library('chenx_form');
		$this->load->model(REQUEST_PATH.'req_login');
		//Class
		$Req = new Req_login;
		//First Action
		$this->_load_template();
		$this->tpl_root->backend_login();
		//
		$data = $Req->form_login_post();
		if($_POST==TRUE):
			if($Req->form_login_rules()==TRUE):
				$this->_do_login($data);
			else:
				$this->tpl_message->error = validation_errors();
			endif;
		endif;
		//View
		$content = $this->current_path."login";
		$this->viewdata['Form'] = new Chenx_form;
		$this->viewdata['Req'] = $Req;
		$this->viewdata['data']= $data;
		$this->tpl_root->view($content, $this->viewdata);
	}

	private function _do_login($data)
	{
		//Import
		$this->load->model(SERVICE_PATH.'svc_login');
		//Class
		$Svc = new Svc_login;
		//
		$do = $Svc->user_login($data);
		if($do==TRUE):
			$this->session->success($Svc->message);
			redirect($this->current_path);
		else:
			$this->tpl_message->error = $Svc->message;
			return FALSE;
		endif;
	}
	
	public function logout()
	{
		//Import
		$this->load->model(SERVICE_PATH.'svc_login');
		//Class
		$Svc = New Svc_login();
		//
		$do = $Svc->logout();
		redirect($this->current_path);		
	}
}

/* End of file */