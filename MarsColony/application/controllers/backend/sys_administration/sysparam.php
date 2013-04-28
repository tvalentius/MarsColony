<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sysparam extends Backend_Controller {
	
	public function __construct()
	{
		parent::__construct();
		//Import Main Source
		//End Import
		if($this->is_user_login==FALSE):	redirect();	endif;
		if($this->ChkAuth->is_have_role($this->RoleParam->con->sysparam_view)==FALSE): redirect('','parent'); endif;
	}
	
	public function index()
	{
		//Import
		$this->load->library('chenx_form');
		$this->load->model(REQUEST_PATH.'req_sysparam');
		$this->load->model(OBJECT_PATH.'obj_sysparam');
		//First Action
		$this->_load_template();
		$this->tpl_root->backend();
		//Class
		$Sysparam = new Obj_sysparam;
		$Req = new Req_sysparam;
		//
		$filter = $Req->form_filter_post();
		$table_sysparam = $this->_table_sysparam();
		//View
		$content = $this->current_path.'list';
		$this->viewdata['Form'] = new Chenx_form;
		$this->viewdata['Req'] = $Req;
		$this->viewdata['filter'] = $filter;
		$this->viewdata['table_sysparam'] = $table_sysparam;
		//View It!
		$this->tpl_root->view($content, $this->viewdata);
	}
	
	protected function _table_sysparam()
	{
		//Import
		$this->load->model(OBJECT_PATH.'obj_sysparam');
		$this->load->model(REQUEST_PATH.'req_sysparam');
		//Class and var
		$Sysparam = new Obj_sysparam;
		$Req = new Req_sysparam;
		$page = $this->ajax_page;
		$limit = 10;
		$search = $Req->form_filter_post();
		$encode = $Req->search_encode;
		//
		$result = $Sysparam->fetch()->filter_search($search)
			->limit_page($limit, $page)->query()->data_result();
		$ajax_pagination = $this->chenx_ajax->button_pagination('table_sysparam',$Sysparam->total_rows, $page, $limit);
		//View
		$content = $this->current_path.'_table_sysparam';
		$this->ajaxviewdata['Sysparam'] = $Sysparam;
		$this->ajaxviewdata['sysparams'] = $result;
		$this->ajaxviewdata['ajax_pagination'] = $ajax_pagination;
		$this->ajaxviewdata['ajax_src_encode'] = $encode;
		//Auth Data
		$this->ajaxviewdata['is_update'] = $this->ChkAuth->is_have_role($this->RoleParam->con->sysparam_update);
		//Show it!
		return $this->load->view($content, $this->ajaxviewdata, TRUE);
	}

	public function update($pk=FALSE)
	{
		if($this->ChkAuth->is_have_role($this->RoleParam->con->sysparam_update)==FALSE): redirect('','parent'); endif;
		//Auth
		if($pk==FALSE): redirect($this->current_path,'parent'); endif;
		//Import
		$this->load->library('chenx_form');
		$this->load->model(OBJECT_PATH.'obj_sysparam');
		$this->load->model(REQUEST_PATH.'req_sysparam');
		//Class and Variable
		$Req = new Req_sysparam;
		$Sysparam = new Obj_sysparam;
		//First Action
		$this->_load_template();	
		$this->tpl_root->backend_plain();	
		//
		$data = $Sysparam->fetch()->query_by_pk($pk)->data_row();
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
		$this->load->model(SERVICE_PATH.'svc_sysparam');
		//Class
		$Svc = New Svc_sysparam;
		//
		$do = $Svc->update_by_pk($pk, $data);
		if($do==TRUE):
			$this->session->success($Svc->message);				
			$this->chenx_ajax->chenx_ajax_refresh("table_sysparam");			
			redirect('box_message');
		else:
			$this->tpl_message->error = $Svc->message;
			return FALSE;
		endif;
	}
}

/* End of file */