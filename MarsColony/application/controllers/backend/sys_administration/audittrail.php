<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Audittrail extends Backend_Controller {
	
	public function __construct()
	{
		parent::__construct();
		//Import Main Source
		//End Import
		if($this->is_user_login==FALSE):	redirect();	endif;
		if($this->ChkAuth->is_have_role($this->RoleParam->con->audittrail_view)==FALSE): redirect('','parent'); endif;
	}
	
	public function index()
	{
		//Import
		$this->load->library('chenx_form');
		$this->load->model(REQUEST_PATH.'req_audittrail');
		$this->load->model(OBJECT_PATH.'obj_audittrail');
		$this->load->model(OBJECT_PATH.'obj_lookup');
		//First Action
		$this->_load_template();	
		$this->tpl_root->backend();
		//Class
		$Audit = new Obj_audittrail;
		$Lookup = new Obj_lookup;
		$Req = new Req_audittrail;
		//Fetch Dropdown Action
		$drop_action = $Lookup->fetch()->column($Lookup->con->fk_group,$Audit->con->lookupgroup_action)
			->filter_active()->query()->data_dropdown();
		//Fetch Dropdown Creator
		$drop_creator = $Audit->join_user()->fetch()->query()
			->data_dropdown($Audit->con->create_by, $Audit->User->con->login_name);
		//Fetch Filter Post Value
		$filter = $Req->form_filter_post();
		//Get Audit Trail Table List
		$table_audittrail = $this->_table_audittrail();
		//View Data
		$content = $this->current_path.'list';
		$this->viewdata['Form'] = new Chenx_form;
		$this->viewdata['Req'] = $Req;
		$this->viewdata['filter'] = $filter;
		$this->viewdata['drop_action'] = $drop_action;
		$this->viewdata['drop_creator'] = $drop_creator;
		$this->viewdata['table_audittrail'] = $table_audittrail;
		//View It!
		$this->tpl_root->view($content, $this->viewdata);
	}
	
	protected function _table_audittrail()
	{
		//Import
		$this->load->model(OBJECT_PATH.'obj_audittrail');
		$this->load->model(REQUEST_PATH.'req_audittrail');
		//Class and var
		$Audit = new Obj_audittrail;
		$Req = new Req_audittrail;
		$page = $this->ajax_page;
		$limit = 10;
		$search = $Req->form_filter_post();
		$encode = $Req->search_encode;
		//
		$result = $Audit->join_lookup_action()->join_user()->fetch()->filter_search($search)
			->limit_page($limit, $page)->query()->data_result();
		$ajax_pagination = $this->chenx_ajax->button_pagination('table_audittrail',$Audit->total_rows, $page, $limit);
		//View
		$content = $this->current_path.'_table_audittrail';
		$this->ajaxviewdata['Audit'] = $Audit;
		$this->ajaxviewdata['audittrails'] = $result;
		$this->ajaxviewdata['ajax_pagination'] = $ajax_pagination;
		$this->ajaxviewdata['ajax_src_encode'] = $encode;
		//Show it!
		return $this->load->view($content, $this->ajaxviewdata, TRUE);
	}
}

/* End of file */