<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cash extends Backend_Controller {
	
	public function __construct()
	{
		parent::__construct();
		//Import Main Source
		//Auth
		if($this->is_user_login==FALSE):	redirect('','parent');	endif;
		if($this->ChkAuth->is_have_role($this->RoleParam->con->cash_view)==FALSE): redirect('','parent'); endif;
	}
	
	public function index()
	{
		//Import
		$this->load->library('chenx_form');
		$this->load->model(REQUEST_PATH.'req_cash');
		//First Action
		$this->_load_template();	
		$this->tpl_root->backend();
		//Class
		$Req = new Req_cash;
		//
		$filter = $Req->form_filter_post();
		$table_cash = $this->_table_cash();
		//View
		$content = $this->current_path.'list';
		$this->viewdata['Form'] = new Chenx_form;
		$this->viewdata['Req'] = $Req;
		$this->viewdata['filter'] = $filter;
		$this->viewdata['table_cash'] = $table_cash;
		//View It!
		$this->tpl_root->view($content, $this->viewdata);
	}
	
	protected function _table_cash()
	{
		//Import
		$this->load->model(OBJECT_PATH.'obj_cash');
		$this->load->model(REQUEST_PATH.'req_cash');
		//Class and var
		$Cash = new Obj_cash;
		$Req = new Req_cash;
		$page = $this->ajax_page;
		$limit = 100;
		$search = $Req->form_filter_post();
		$encode = $Req->search_encode;
		//
		$result = $Cash->join_player()->fetch()->filter_search($search)->limit_page($limit, $page)->query()->data_result();
		$ajax_pagination = $this->chenx_ajax->button_pagination('table_cash',$Cash->total_rows, $page, $limit);
		//View
		$content = $this->current_path.'_table_cash';
		$this->ajaxviewdata['Cash'] = $Cash;
		$this->ajaxviewdata['cashs'] = $result;
		$this->ajaxviewdata['ajax_pagination'] = $ajax_pagination;
		$this->ajaxviewdata['ajax_src_encode'] = $encode;
		//Show it!
		return $this->load->view($content, $this->ajaxviewdata, TRUE);
	}
}

/* End of file */