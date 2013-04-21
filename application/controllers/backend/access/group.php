<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Group extends Backend_Controller {
	
	public function __construct()
	{
		parent::__construct();
		//Import Main Source
		//Authentication
		if($this->is_user_login==FALSE):	redirect('','parent');	endif;
		if($this->ChkAuth->is_have_role($this->RoleParam->con->usergroup_view)==FALSE): redirect('','parent'); endif;
		//
	}
	
	public function index()
	{
		//Import
		$this->load->library('chenx_form');
		$this->load->model(REQUEST_PATH.'req_usergroup');
		//First Action
		$this->_load_template();
		$this->tpl_root->backend();
		//Class
		$Req = new Req_usergroup;
		//
		$filter = $Req->form_filter_post();
		$table_group = $this->_table_group();
		//View
		$content = $this->current_path.'list';
		$this->viewdata['Form'] = new Chenx_form;
		$this->viewdata['Req'] = $Req;
		$this->viewdata['filter'] = $filter;
		$this->viewdata['table_group'] = $table_group;
		$this->viewdata['link_insert'] = $this->link_path.$this->current_path."insert";
		//Auth Data
		$this->viewdata['is_insert'] = $this->ChkAuth->is_have_role($this->RoleParam->con->usergroup_insert);
		//View It!
		$this->tpl_root->view($content, $this->viewdata);
	}
	
	protected function _table_group()
	{
		//Import
		$this->load->model(REQUEST_PATH.'req_usergroup');
		$this->load->model(OBJECT_PATH.'obj_usergroup');
		//Class and var
		$Group = new Obj_usergroup;
		$Req = new Req_usergroup;
		$page = $this->ajax_page;
		$limit = 10;
		$search = $Req->form_filter_post();
		$encode = $Req->search_encode;
		//
		$result = $Group->fetch()->filter_search($search)->limit_page($limit, $page)->query()->data_result();
		$ajax_pagination = $this->chenx_ajax->button_pagination('table_group',$Group->total_rows, $page, $limit);
		//View
		$content = $this->current_path.'_table_group';
		$this->ajaxviewdata['Group'] = $Group;
		$this->ajaxviewdata['groups'] = $result;
		$this->ajaxviewdata['ajax_pagination'] = $ajax_pagination;
		$this->ajaxviewdata['ajax_src_encode'] = $encode;
		//Auth Data
		$this->ajaxviewdata['is_update'] = $this->ChkAuth->is_have_role($this->RoleParam->con->usergroup_update);
		$this->ajaxviewdata['is_delete'] = $this->ChkAuth->is_have_role($this->RoleParam->con->usergroup_delete);
		//Show it!
		return $this->load->view($content, $this->ajaxviewdata, TRUE);
	}

	public function insert()
	{
		//Auth
		if($this->ChkAuth->is_have_role($this->RoleParam->con->usergroup_insert)==FALSE): redirect('','parent'); endif;
		//Import
		$this->load->library('chenx_form');
		$this->load->model(REQUEST_PATH.'req_usergroup');
		//Class and Variable
		$Req = new Req_usergroup;
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
		$this->tpl_root->view($content, $this->viewdata);
	}
	
	private function _do_insert($data)
	{
		//Import
		$this->load->model(SERVICE_PATH.'svc_usergroup');
		//Class
		$Svc = New Svc_usergroup;
		//
		$do = $Svc->insert($data);
		if($do==TRUE):
			$this->session->success($Svc->message);
			$this->chenx_ajax->chenx_ajax_refresh("table_group");
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
		if($this->ChkAuth->is_have_role($this->RoleParam->con->usergroup_update)==FALSE): redirect('','parent'); endif;
		//Import
		$this->load->library('chenx_form');
		$this->load->model(OBJECT_PATH.'obj_usergroup');
		$this->load->model(REQUEST_PATH.'req_usergroup');
		//Class and Variable
		$Req = new Req_usergroup;
		$Group = new Obj_usergroup;
		//First Action
		$this->_load_template();	
		$this->tpl_root->backend_plain();	
		//
		$data = $Group->fetch()->query_by_pk($pk)->data_row();
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
		$this->tpl_root->view($content, $this->viewdata);
	}

	private function _do_update($pk, $data)
	{
		//Import
		$this->load->model(SERVICE_PATH.'svc_usergroup');
		//Class
		$Svc = New Svc_usergroup;
		//
		$do = $Svc->update_by_pk($pk, $data);
		if($do==TRUE):
			$this->session->success($Svc->message);
			$this->chenx_ajax->chenx_ajax_refresh("table_group");			
			redirect('box_message');
		else:
			$this->tpl_message->error = $Svc->message;
			return FALSE;
		endif;
	}

	public function delete($pk=FALSE)
	{
		//Auth
		if($pk==FALSE):	redirect();	endif;
		if($this->ChkAuth->is_have_role($this->RoleParam->con->usergroup_delete)==FALSE): redirect('','parent'); endif;
		//Import
		$this->load->model(SERVICE_PATH.'svc_usergroup');
		//Class
		$Svc = New Svc_usergroup();
		$do = $Svc->delete_by_pk($pk);
		$return['message'] = $Svc->message;				
		echo json_encode($return);
	}
	
	public function roles($pk=FALSE)
	{
		//Auth
		if($pk==FALSE): redirect($this->current_path,'parent'); endif;
		if($this->ChkAuth->is_have_role($this->RoleParam->con->usergroup_update)==FALSE): redirect('','parent'); endif;
		//Import
		$this->load->library('chenx_form');
		$this->load->model(OBJECT_PATH.'obj_usergroup');
		$this->load->model(OBJECT_PATH.'obj_relation_group_role');
		$this->load->model(REQUEST_PATH.'req_relation_group_role');
		//Class and Variable
		$Req = new Req_relation_group_role;
		$Rel = new Obj_relation_group_role;
		$Group = new Obj_usergroup;
		//First Action
		$this->_load_template();	
		$this->tpl_root->backend_plain();	
		//Roles Data
		$Rel->right_join_role_param_by_group($pk);
		$Rel->Role_param->join_menu();
		$treecheckbox = $Rel->fetch()
			->select_treecheckbox()->query(TRUE)->data_treecheckbox_array();
		//If Roles submitted
		if($_POST==TRUE):
			$data = $Req->form_treecheckbox_post();
			$this->_do_roles($pk, $data);
		endif;
		//Group Data
		$group_name = $Group->fetch()->query_by_pk($pk)->data_name();
		//View
		$content = $this->current_path.'roles';
		$this->viewdata['Form'] = new Chenx_form;
		$this->viewdata['Req'] = $Req;
		$this->viewdata['treecheckbox'] = $treecheckbox;
		$this->viewdata['group_name'] = $group_name;
		$this->tpl_root->view($content, $this->viewdata);
	}
	
	private function _do_roles($pk, $data)
	{
		//Load
		$this->load->model(SERVICE_PATH.'svc_relation_group_role');
		//Class
		$Svc = new Svc_relation_group_role;
		//Execute!
		$Svc->set_roles($pk, $data);
		$this->session->success($Svc->message);
		redirect($this->current_path.'roles/'.$pk);
	}
}

/* End of file */