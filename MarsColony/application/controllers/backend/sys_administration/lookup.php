<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lookup extends Backend_Controller {
	
	public function __construct()
	{
		parent::__construct();
		//Import Main Source
		//End Import
		if($this->is_user_login==FALSE):	redirect();	endif;
		if($this->ChkAuth->is_have_role($this->RoleParam->con->lookup_view)==FALSE): redirect('','parent'); endif;
	}
	
	public function index()
	{
		//Import
		$this->load->library('chenx_form');
		$this->load->model(REQUEST_PATH.'req_lookup');
		$this->load->model(OBJECT_PATH.'obj_lookup');
		$this->load->model(OBJECT_PATH.'obj_lookupgroup');
		//First Action
		$this->_load_template();	
		$this->tpl_root->backend();
		//Class
		$Lookup = new Obj_lookup;
		$Group = new Obj_lookupgroup;
		$Req = new Req_lookup;
		//
		$filter = $Req->form_filter_post();
		$table_lookup = $this->_table_lookup();
		//View
		$content = $this->current_path.'list';
		$this->viewdata['Form'] = new Chenx_form;
		$this->viewdata['Req'] = $Req;
		$this->viewdata['filter'] = $filter;
		$this->viewdata['drop_group'] = $Group->fetch()->select_dropdown()->query()->data_dropdown();
		$this->viewdata['table_lookup'] = $table_lookup;
		$this->viewdata['link_insert'] = $this->link_path.$this->current_path."insert";
		//Auth Data
		$this->viewdata['is_insert'] = $this->ChkAuth->is_have_role($this->RoleParam->con->lookup_insert);
		//View It!
		$this->tpl_root->view($content, $this->viewdata);
	}
	
	protected function _table_lookup()
	{
		//Import
		$this->load->model(OBJECT_PATH.'obj_lookup');
		$this->load->model(REQUEST_PATH.'req_lookup');
		//Class and var
		$lookup = new Obj_lookup;
		$Req = new Req_lookup;
		$page = $this->ajax_page;
		$limit = 10;
		$search = $Req->form_filter_post();
		$encode = $Req->search_encode;
		//
		$result = $lookup->join_lookupgroup()->fetch()->filter_search($search)
			->limit_page($limit, $page)->query()->data_result();
		$ajax_pagination = $this->chenx_ajax->button_pagination('table_lookup',$lookup->total_rows, $page, $limit);
		//View
		$content = $this->current_path.'_table_lookup';
		$this->ajaxviewdata['lookup'] = $lookup;
		$this->ajaxviewdata['lookups'] = $result;
		$this->ajaxviewdata['ajax_pagination'] = $ajax_pagination;
		$this->ajaxviewdata['ajax_src_encode'] = $encode;
		//Auth Data
		$this->ajaxviewdata['is_update'] = $this->ChkAuth->is_have_role($this->RoleParam->con->lookup_update);
		$this->ajaxviewdata['is_delete'] = $this->ChkAuth->is_have_role($this->RoleParam->con->lookup_delete);
		//Show it!
		return $this->load->view($content, $this->ajaxviewdata, TRUE);
	}
	
	public function insert()
	{
		if($this->ChkAuth->is_have_role($this->RoleParam->con->lookup_insert)==FALSE): redirect('','parent'); endif;
		//Import
		$this->load->library('chenx_form');
		$this->load->model(OBJECT_PATH.'obj_lookup');
		$this->load->model(OBJECT_PATH.'obj_lookupgroup');
		$this->load->model(REQUEST_PATH.'req_lookup');
		//Class and Variable
		$Req = new Req_lookup;
		$lookupgroup = new Obj_lookupgroup;
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
		$this->viewdata['drop_group'] = $lookupgroup->fetch()->filter_static(FALSE)->select_dropdown()
			->query()->data_dropdown();
		$this->tpl_root->view($content, $this->viewdata);
	}
	
	private function _do_insert($data)
	{
		//Import
		$this->load->model(SERVICE_PATH.'svc_lookup');
		//Class
		$Svc = New Svc_lookup;
		//
		$do = $Svc->insert($data);
		if($do==TRUE):
			$this->session->success($Svc->message);
			$this->chenx_ajax->chenx_ajax_refresh("table_lookup");
			redirect('box_message');
		else:
			$this->tpl_message->error = $Svc->message;
			return FALSE;
		endif;
	}

	public function update($pk=FALSE)
	{
		if($this->ChkAuth->is_have_role($this->RoleParam->con->lookup_update)==FALSE): redirect('','parent'); endif;
		//Auth
		if($pk==FALSE): redirect($this->current_path,'parent'); endif;
		//Import
		$this->load->library('chenx_form');
		$this->load->model(OBJECT_PATH.'obj_lookup');
		$this->load->model(REQUEST_PATH.'req_lookup');
		//Class and Variable
		$Req = new Req_lookup;
		$lookup = new Obj_lookup;
		//First Action
		$this->_load_template();	
		$this->tpl_root->backend_plain();	
		//
		$lookup->join_lookupgroup();
		$data = $lookup->fetch()->query_by_pk($pk)->data_row();
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
		$this->viewdata['drop_group'] = $lookup->Lookupgroup->fetch()->select_dropdown()->query()->data_dropdown();
		$this->tpl_root->view($content, $this->viewdata);
	}

	private function _do_update($pk, $data)
	{
		//Import
		$this->load->model(SERVICE_PATH.'svc_lookup');
		//Class
		$Svc = New Svc_lookup;
		//
		$do = $Svc->update_by_pk($pk, $data);
		if($do==TRUE):
			$this->session->success($Svc->message);				
			$this->chenx_ajax->chenx_ajax_refresh("table_lookup");			
			redirect('box_message');
		else:
			$this->tpl_message->error = $Svc->message;
			return FALSE;
		endif;
	}

	public function delete($pk=FALSE)
	{
		if($this->ChkAuth->is_have_role($this->RoleParam->con->lookup_delete)==FALSE): redirect('','parent'); endif;
		//Auth
		if($pk==FALSE):	redirect();	endif;
		//Import
		$this->load->model(SERVICE_PATH.'svc_lookup');
		//Class
		$Svc = New Svc_lookup();
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