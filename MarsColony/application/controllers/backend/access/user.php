<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends Backend_Controller {
	
	public function __construct()
	{
		parent::__construct();
		//Import Main Source
		//Auth
		if($this->is_user_login==FALSE):	redirect('','parent');	endif;
		if($this->ChkAuth->is_have_role($this->RoleParam->con->user_view)==FALSE): redirect('','parent'); endif;
	}
	
	public function index()
	{
		//Import
		$this->load->library('chenx_form');
		$this->load->model(REQUEST_PATH.'req_user');
		$this->load->model(OBJECT_PATH.'obj_usergroup');
		//First Action
		$this->_load_template();	
		$this->tpl_root->backend();
		//Class
		$Usergroup = new Obj_usergroup;
		$Req = new Req_user;
		//
		$filter = $Req->form_filter_post();
		$table_user = $this->_table_user();
		//View
		$content = $this->current_path.'list';
		$this->viewdata['Form'] = new Chenx_form;
		$this->viewdata['Req'] = $Req;
		$this->viewdata['filter'] = $filter;
		$this->viewdata['drop_group'] = $Usergroup->fetch()->filter_active()->select_dropdown()->query()->data_dropdown();
		$this->viewdata['table_user'] = $table_user;
		$this->viewdata['link_insert'] = $this->link_path.$this->current_path."insert";
		//Auth Data
		$this->viewdata['is_insert'] = $this->ChkAuth->is_have_role($this->RoleParam->con->user_insert);
		//View It!
		$this->tpl_root->view($content, $this->viewdata);
	}
	
	protected function _table_user()
	{
		//Import
		$this->load->model(REQUEST_PATH.'req_user');
		//Class and var
		$User = new Obj_user;
		$Req = new Req_user;
		$page = $this->ajax_page;
		$limit = 10;
		$search = $Req->form_filter_post();
		$encode = $Req->search_encode;
		//
		$result = $User->join_usergroup()->fetch()->filter_search($search)
			->limit_page($limit, $page)->query()->data_result();
		$ajax_pagination = $this->chenx_ajax->button_pagination('table_user',$User->total_rows, $page, $limit);
		//View
		$content = $this->current_path.'_table_user';
		$this->ajaxviewdata['User'] = $User;
		$this->ajaxviewdata['users'] = $result;
		$this->ajaxviewdata['ajax_pagination'] = $ajax_pagination;
		$this->ajaxviewdata['ajax_src_encode'] = $encode;
		//Auth Data
		$this->ajaxviewdata['is_update'] = $this->ChkAuth->is_have_role($this->RoleParam->con->user_update);
		$this->ajaxviewdata['is_delete'] = $this->ChkAuth->is_have_role($this->RoleParam->con->user_delete);
		//Show it!
		return $this->load->view($content, $this->ajaxviewdata, TRUE);
	}
	
	public function insert()
	{
		//Auth
		if($this->ChkAuth->is_have_role($this->RoleParam->con->user_insert)==FALSE): redirect('','parent'); endif;
		//Import
		$this->load->library('chenx_form');
		$this->load->model(OBJECT_PATH.'obj_usergroup');
		$this->load->model(REQUEST_PATH.'req_user');
		//Class and Variable
		$Req = new Req_user;
		$Usergroup = new Obj_usergroup;
		//First Action
		$this->_load_template();	
		$this->tpl_root->backend_plain();	
		//
		$data = $Req->form_insert_post();
		if($_POST==TRUE):
			if($Req->form_insert_rules()==TRUE):
				$this->_do_insert($data);
			else:
				$this->tpl_message->error = validation_errors();
			endif;
		endif;
		//View
		$content = $this->current_path.'insert';
		$this->viewdata['Form'] = new Chenx_form;
		$this->viewdata['Req'] = $Req;
		$this->viewdata['data'] = $data;
		$this->viewdata['drop_group'] = $Usergroup->fetch()->filter_active()->select_dropdown()->query()->data_dropdown();
		$this->tpl_root->view($content, $this->viewdata);
	}
	
	private function _do_insert($data)
	{
		//Import
		$this->load->model(SERVICE_PATH.'svc_user');
		//Class
		$Svc = New Svc_user;
		//
		$do = $Svc->insert($data);
		if($do==TRUE):
			$this->session->success($Svc->message);
			$this->chenx_ajax->chenx_ajax_refresh("table_user");
			redirect('box_message');
		else:
			$this->tpl_message->error = $Svc->message;
			return FALSE;
		endif;
	}

	public function update($pk=FALSE)
	{
		//Auth
		if($pk==FALSE): redirect($this->current_path,'parent'); endif;
		if($this->ChkAuth->is_have_role($this->RoleParam->con->user_update)==FALSE): redirect('','parent'); endif;
		//Import
		$this->load->library('chenx_form');
		$this->load->model(OBJECT_PATH.'obj_user');
		$this->load->model(REQUEST_PATH.'req_user');
		//Class and Variable
		$Req = new Req_user;
		$User = new Obj_user;
		//First Action
		$this->_load_template();	
		$this->tpl_root->backend_plain();	
		//
		$User->join_usergroup();
		$data = $User->fetch()->query_by_pk($pk)->data_row();
		if($_POST==TRUE):
			$data = array_merge($data, $Req->form_update_post());
			if($Req->form_update_rules()==TRUE):
				$this->_do_update($pk, $Req->form_update_post());
			else:
				$this->tpl_message->error = validation_errors();
			endif;
		endif;
		//View
		$content = $this->current_path.'update';
		$this->viewdata['Form'] = new Chenx_form;
		$this->viewdata['Req'] = $Req;
		$this->viewdata['data'] = $data;
		$this->viewdata['drop_group'] = $User->Usergroup->fetch()->filter_active()->select_dropdown()
			->query()->data_dropdown();
		//Auth Data
		$this->viewdata['is_update_pass'] = $this->ChkAuth->is_have_role($this->RoleParam->con->user_update_pass);
		//View!
		$this->tpl_root->view($content, $this->viewdata);
	}

	private function _do_update($pk, $data)
	{
		//Import
		$this->load->model(SERVICE_PATH.'svc_user');
		//Class
		$Svc = New Svc_user;
		//
		$do = $Svc->update_by_pk($pk, $data);
		if($do==TRUE):
			$this->session->success($Svc->message);				
			$this->chenx_ajax->chenx_ajax_refresh("table_user");			
			redirect('box_message');
		else:
			$this->tpl_message->error = $Svc->message;
			return FALSE;
		endif;
	}

	public function update_pass($pk=FALSE)
	{
		//Auth
		if($pk==FALSE): redirect($this->current_path,'parent'); endif;
		if($this->ChkAuth->is_have_role($this->RoleParam->con->user_update_pass)==FALSE): redirect('','parent'); endif;
		//Import
		$this->load->library('chenx_form');
		$this->load->model(OBJECT_PATH.'obj_user');
		$this->load->model(REQUEST_PATH.'req_user');
		//Class and Variable
		$Req = new Req_user;
		$User = new Obj_user;
		//First Action
		$this->_load_template();	
		$this->tpl_root->backend_plain();	
		//
		$userdata = $User->fetch()->query_by_pk($pk)->data_row();
		if($_POST==TRUE):
			$data = $Req->form_update_pass_post();
			if($Req->form_update_pass_rules()==TRUE):
				$this->_do_update_pass($pk, $data);
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

	private function _do_update_pass($pk, $data)
	{
		//Import
		$this->load->model(SERVICE_PATH.'svc_user');
		//Class
		$Svc = New Svc_user;
		//
		$do = $Svc->update_pass_by_pk($pk, $data);
		if($do==TRUE):
			$this->session->success($Svc->message);
			$this->chenx_ajax->chenx_ajax_refresh("table_user");			
			redirect($this->current_path.'update/'.$pk);
		else:
			$this->tpl_message->error = $Svc->message;
			return FALSE;
		endif;
	}

	public function delete($pk=FALSE)
	{
		//Auth
		if($pk==FALSE):	redirect();	endif;
		if($this->ChkAuth->is_have_role($this->RoleParam->con->user_delete)==FALSE): redirect('','parent'); endif;
		//Import
		$this->load->model(SERVICE_PATH.'svc_user');
		//Class
		$Svc = New Svc_user();
		$do = $Svc->delete_by_pk($pk);
		if($do==TRUE):
			$data['message'] = $Svc->message;				
		else:
			$data['message'] = $Svc->message;		
		endif;
		echo json_encode($data);
	}
}

/* End of file */