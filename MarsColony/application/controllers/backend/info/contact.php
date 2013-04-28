<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends Backend_Controller {
	
	public function __construct()
	{
		parent::__construct();
		//Import Main Source
		//End Import
		if($this->is_user_login==FALSE):	redirect('','parent');	endif;
		if($this->ChkAuth->is_have_role($this->RoleParam->con->contactus_view)==FALSE): redirect('','parent'); endif;
	}
	
	public function index()
	{
		//Import
		$this->load->library('chenx_form');
		$this->load->model(REQUEST_PATH.'req_contactus');
		$this->load->model(OBJECT_PATH.'obj_contactus');
		$this->load->model(OBJECT_PATH.'obj_lookup');
		//First Action
		$this->_load_template();	
		$this->tpl_root->backend();
		//Class
		$Contact = new Obj_contactus;
		$Lookup = new Obj_lookup;
		$Req = new Req_contactus;
		//
		$filter = $Req->form_filter_post();
		$table_contactus = $this->_table_contactus();
		//Fetch Dropdown Status
		$drop_status = $Lookup->fetch()->column($Lookup->con->fk_group,$Contact->con->lookupgroup_status)
			->filter_active()->query()->data_dropdown();
		//View
		$content = $this->current_path.'list';
		$this->viewdata['Form'] = new Chenx_form;
		$this->viewdata['Req'] = $Req;
		$this->viewdata['filter'] = $filter;
		$this->viewdata['table_contactus'] = $table_contactus;
		$this->viewdata['drop_status'] = $drop_status;
		//View It!
		$this->tpl_root->view($content, $this->viewdata);
	}
	
	protected function _table_contactus()
	{
		//Import
		$this->load->model(OBJECT_PATH.'obj_contactus');
		$this->load->model(REQUEST_PATH.'req_contactus');
		//Class and var
		$Contact = new Obj_contactus;
		$Req = new Req_contactus;
		$page = $this->ajax_page;
		$limit = 5;
		$search = $Req->form_filter_post();
		$encode = $Req->search_encode;
		//
		$result = $Contact->join_lookup_status()->fetch()->filter_search($search)
			->limit_page($limit, $page)->query()->data_result();
		$ajax_pagination = $this->chenx_ajax->button_pagination('table_contactus',$Contact->total_rows, $page, $limit);
		//View
		$content = $this->current_path.'_table_contactus';
		$this->ajaxviewdata['Contact'] = $Contact;
		$this->ajaxviewdata['result'] = $result;
		$this->ajaxviewdata['ajax_pagination'] = $ajax_pagination;
		$this->ajaxviewdata['ajax_src_encode'] = $encode;
		return $this->load->view($content, $this->ajaxviewdata, TRUE);
	}

	public function update($pk=FALSE)
	{
		//Auth
		if($pk==FALSE): redirect($this->current_path,'parent'); endif;
		if($this->ChkAuth->is_have_role($this->RoleParam->con->contactus_update)==FALSE): redirect('','parent'); endif;
		//Import
		$this->load->library('chenx_form');
		$this->load->model(OBJECT_PATH.'obj_lookup');
		$this->load->model(OBJECT_PATH.'obj_contactus');
		$this->load->model(REQUEST_PATH.'req_contactus');
		//Class and Variable
		$Req = new Req_contactus;
		$Contact = new Obj_contactus;
		$Lookup = new Obj_lookup;
		//First Action
		$this->_load_template();	
		$this->tpl_root->backend_plain();	
		//
		$data = $Contact->fetch()->query_by_pk($pk)->data_row();
		if($_POST==TRUE):
			$data = array_merge($data, $Req->form_update_status_post());
			if($Req->form_update_status_rules()==TRUE):
				$this->_do_update($pk, $Req->form_update_status_post());
			else:
				$this->tpl_message->error = validation_errors();
			endif;
		endif;
		//Fetch Dropdown Status
		$drop_status = $Lookup->fetch()->column($Lookup->con->fk_group,$Contact->con->lookupgroup_status)
			->filter_active()->query()->data_dropdown();
		//View
		$content = $this->current_path.'update';
		$this->viewdata['Form'] = new Chenx_form;
		$this->viewdata['Req'] = $Req;
		$this->viewdata['drop_status'] = $drop_status;
		$this->viewdata['data'] = $data;
		$this->tpl_root->view($content, $this->viewdata);
	}

	private function _do_update($pk, $data)
	{
		//Import
		$this->load->model(SERVICE_PATH.'svc_contactus');
		//Class
		$Svc = New Svc_contactus;
		//
		$do = $Svc->update_by_pk($pk, $data);
		if($do==TRUE):
			$this->session->success($Svc->message);				
			$this->chenx_ajax->chenx_ajax_refresh("table_contactus");			
			redirect('box_message');
		else:
			$this->tpl_message->error = $Svc->message;
			return FALSE;
		endif;
	}
}

/* End of file */