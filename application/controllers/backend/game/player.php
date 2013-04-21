<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Player extends Backend_Controller {
	
	public function __construct()
	{
		parent::__construct();
		//Import Main Source
		//Auth
		if($this->is_user_login==FALSE):	redirect('','parent');	endif;
		if($this->ChkAuth->is_have_role($this->RoleParam->con->player_view)==FALSE): redirect('','parent'); endif;
	}
	
	public function index()
	{
		//Import
		$this->load->library('chenx_form');
		$this->load->model(REQUEST_PATH.'req_player');
		//First Action
		$this->_load_template();	
		$this->tpl_root->backend();
		//Class
		$Req = new Req_player;
		//
		$filter = $Req->form_filter_post();
		$table_player = $this->_table_player();
		//View
		$content = $this->current_path.'list';
		$this->viewdata['Form'] = new Chenx_form;
		$this->viewdata['Req'] = $Req;
		$this->viewdata['filter'] = $filter;
		$this->viewdata['table_player'] = $table_player;
		//View It!
		$this->tpl_root->view($content, $this->viewdata);
	}
	
	protected function _table_player()
	{
		//Import
		$this->load->model(OBJECT_PATH.'obj_player');
		$this->load->model(REQUEST_PATH.'req_player');
		//Class and var
		$Player = new Obj_player;
		$Req = new Req_player;
		$page = $this->ajax_page;
		$limit = 10;
		$search = $Req->form_filter_post();
		$encode = $Req->search_encode;
		//
		$result = $Player->fetch()->filter_search($search)->limit_page($limit, $page)->query()->data_result();
		$ajax_pagination = $this->chenx_ajax->button_pagination('table_player',$Player->total_rows, $page, $limit);
		//View
		$content = $this->current_path.'_table_player';
		$this->ajaxviewdata['Player'] = $Player;
		$this->ajaxviewdata['players'] = $result;
		$this->ajaxviewdata['ajax_pagination'] = $ajax_pagination;
		$this->ajaxviewdata['ajax_src_encode'] = $encode;
		//Show it!
		return $this->load->view($content, $this->ajaxviewdata, TRUE);
	}
    
	public function detail($pk=FALSE)
	{
		//Auth
		if($pk==FALSE): redirect($this->current_path,'parent'); endif;
		//Import
		$this->load->library('chenx_form');
		$this->load->model(OBJECT_PATH.'obj_player');
		$this->load->model(REQUEST_PATH.'req_player');
		//Class and Variable
		$Req = new Req_player;
		$Player = new Obj_player;
		//First Action
		$this->_load_template();	
		$this->tpl_root->backend_plain();	
		//
		$data = $Player->fetch()->query_by_pk($pk)->data_row();
		//View
		$content = $this->current_path.'detail';
		$this->viewdata['Req'] = $Req;
		$this->viewdata['data'] = $data;
		//View!
		$this->tpl_root->view($content, $this->viewdata);
	}
    
	public function delete($pk=FALSE)
	{
		//Auth
		if($pk==FALSE):	redirect();	endif;
		//Import
		$this->load->model(SERVICE_PATH.'svc_player');
		//Class
		$Svc = New Svc_player();
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