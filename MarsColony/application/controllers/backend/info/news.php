<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends Backend_Controller {
	
	public function __construct()
	{
		parent::__construct();
		//Import Main Source
		//End Import
		if($this->is_user_login==FALSE):	redirect('','parent');	endif;
		if($this->ChkAuth->is_have_role($this->RoleParam->con->news_view)==FALSE): redirect('','parent'); endif;
	}
	
	public function index()
	{
		//Import
		$this->load->library('chenx_form');
		$this->load->model(REQUEST_PATH.'req_news');
		$this->load->model(OBJECT_PATH.'obj_news');
		//First Action
		$this->_load_template();	
		$this->tpl_root->backend();
		//Class
		$News = new Obj_news;
		$Req = new Req_news;
		//
		$filter = $Req->form_filter_post();
		$table_news = $this->_table_news();
		//View
		$content = $this->current_path.'list';
		$this->viewdata['Form'] = new Chenx_form;
		$this->viewdata['Req'] = $Req;
		$this->viewdata['filter'] = $filter;
		$this->viewdata['table_news'] = $table_news;
		$this->viewdata['link_insert'] = base_url($this->current_path."insert");
		//Auth Data
		$this->viewdata['is_insert'] = $this->ChkAuth->is_have_role($this->RoleParam->con->news_insert);
		//View It!
		$this->tpl_root->view($content, $this->viewdata);
	}
	
	protected function _table_news()
	{
		//First Action
		$this->_load_template();	
		$this->tpl_root->backend();
		//Import
		$this->load->model(OBJECT_PATH.'obj_news');
		$this->load->model(REQUEST_PATH.'req_news');
		//Class and var
		$News = new Obj_news;
		$Req = new Req_news;
		$page = $this->ajax_page;
		$limit = 5;
		$search = $Req->form_filter_post();
		$encode = $Req->search_encode;
		//
		$result = $News->fetch()->filter_search($search)->limit_page($limit, $page)->query()->data_result();
		$ajax_pagination = $this->chenx_ajax->button_pagination('table_news',$News->total_rows, $page, $limit);
		//View
		$content = $this->current_path.'_table_news';
		$this->ajaxviewdata['News'] = $News;
		$this->ajaxviewdata['result'] = $result;
		$this->ajaxviewdata['ajax_pagination'] = $ajax_pagination;
		$this->ajaxviewdata['ajax_src_encode'] = $encode;
		return $this->load->view($content, $this->ajaxviewdata, TRUE);
	}
	
	public function insert()
	{
		//Auth
		if($this->ChkAuth->is_have_role($this->RoleParam->con->news_insert)==FALSE): redirect('','parent'); endif;
		//Import
		$this->load->library('chenx_form');
		$this->load->model(OBJECT_PATH.'obj_news');
		$this->load->model(REQUEST_PATH.'req_news');
		//Class and Variable
		$Req = new Req_news;
		$Usergroup = new Obj_news;
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
		$this->load->model(SERVICE_PATH.'svc_news');
		//Class
		$Svc = New Svc_news;
		//
		$do = $Svc->insert($data);
		if($do==TRUE):
			$pk = $Svc->pk_insert;
			$Svc->upload_image_by_pk($pk);
			$this->session->success($Svc->message);
			$this->chenx_ajax->chenx_ajax_refresh("table_news");
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
		if($this->ChkAuth->is_have_role($this->RoleParam->con->news_update)==FALSE): redirect('','parent'); endif;
		//Import
		$this->load->library('chenx_form');
		$this->load->model(OBJECT_PATH.'obj_news');
		$this->load->model(REQUEST_PATH.'req_news');
		//Class and Variable
		$Req = new Req_news;
		$News = new Obj_news;
		//First Action
		$this->_load_template();	
		$this->tpl_root->backend_plain();	
		//
		$data = $News->fetch()->query_by_pk($pk)->data_row();
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
		$this->load->model(SERVICE_PATH.'svc_news');
		//Class
		$Svc = New Svc_news;
		//
		$do = $Svc->update_by_pk($pk, $data);
		if($do==TRUE):
			$Svc->upload_image_by_pk($pk);
			$this->session->success($Svc->message);				
			$this->chenx_ajax->chenx_ajax_refresh("table_news");			
			redirect('box_message');
		else:
			$this->tpl_message->error = $Svc->message;
			return FALSE;
		endif;
	}

	public function update_status($pk=FALSE)
	{
		//Auth
		if($pk==FALSE):	redirect();	endif;
		if($this->ChkAuth->is_have_role($this->RoleParam->con->news_delete)==FALSE): redirect('','parent'); endif;
		//Import
		$this->load->model(SERVICE_PATH.'svc_news');
		//Class
		$Svc = New Svc_news();
		$do = $Svc->update_status_by_pk($pk);
		$return['message'] = $Svc->message;
		echo json_encode($return);
	}

	public function update_is_hot($pk=FALSE)
	{
		//Auth
		if($pk==FALSE):	redirect();	endif;
		//Import
		$this->load->model(SERVICE_PATH.'svc_news');
		//Class
		$Svc = New Svc_news();
		$do = $Svc->update_is_hot_by_pk($pk);
		$return['message'] = $Svc->message;
		echo json_encode($return);
	}
}

/* End of file */