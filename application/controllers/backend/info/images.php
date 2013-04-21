<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Images extends Backend_Controller {
	
	public function __construct()
	{
		parent::__construct();
		//Import Main Source
		//End Import
		if($this->is_user_login==FALSE):	redirect('','parent');	endif;
		if($this->ChkAuth->is_have_role($this->RoleParam->con->images_view)==FALSE): redirect('','parent'); endif;
	}
	
	public function index()
	{
		//Import
		$this->load->library('chenx_form');
		$this->load->model(REQUEST_PATH.'req_images');
		$this->load->model(OBJECT_PATH.'obj_images');
		$this->load->model(OBJECT_PATH.'obj_lookup');
		//First Action
		$this->_load_template();	
		$this->tpl_root->backend();
		//Class
		$Images = new Obj_images;
		$Lookup = new Obj_lookup;
		$Req = new Req_images;
		//
		//Fetch Dropdown Action
		$result_cat = $Lookup->fetch()->column($Lookup->con->fk_group,$Images->con->lookupgroup_action)
			->filter_active()->query()->data_dropdown();
		//
		$filter = $Req->form_filter_post();
		$table_images = $this->_table_images();
		//View
		$content = $this->current_path.'list';
		$this->viewdata['Form'] = new Chenx_form;
		$this->viewdata['Req'] = $Req;
		$this->viewdata['result_cat'] = $result_cat;
		$this->viewdata['filter'] = $filter;
		$this->viewdata['table_images'] = $table_images;
		$this->viewdata['link_insert'] = base_url($this->current_path."insert");
		//Auth Data
		$this->viewdata['is_insert'] = $this->ChkAuth->is_have_role($this->RoleParam->con->images_update);
		//View It!
		$this->tpl_root->view($content, $this->viewdata);
	}

	protected function _table_images()
	{
		//First Action
		$this->_load_template();	
		$this->tpl_root->backend();
		//Import
		$this->load->model(OBJECT_PATH.'obj_images');
		$this->load->model(REQUEST_PATH.'req_images');
		//Class and var
		$Images = new Obj_images;
		$Req = new Req_images;
		$page = $this->ajax_page;
		$limit = 20;
		$search = $Req->form_filter_post();
		$encode = $Req->search_encode;
		//
		$result = $Images->join_lookup_category()->fetch()->filter_search($search)->limit_page($limit, $page)->query()->data_result();
		$ajax_pagination = $this->chenx_ajax->button_pagination('table_images',$Images->total_rows, $page, $limit);
		//View
		$content = $this->current_path.'_table_images';
		$this->ajaxviewdata['Images'] = $Images;
		$this->ajaxviewdata['result'] = $result;
		$this->ajaxviewdata['ajax_pagination'] = $ajax_pagination;
		$this->ajaxviewdata['ajax_src_encode'] = $encode;
		return $this->load->view($content, $this->ajaxviewdata, TRUE);
	}
	
	public function insert()
	{
		//Auth
		if($this->ChkAuth->is_have_role($this->RoleParam->con->images_update)==FALSE): redirect('','parent'); endif;
		//Import
		$this->load->library('chenx_form');
		$this->load->model(OBJECT_PATH.'obj_lookup');
		$this->load->model(OBJECT_PATH.'obj_images');
		$this->load->model(REQUEST_PATH.'req_images');
		//Class and Variable
		$Lookup = new Obj_lookup;
		$Req = new Req_images;
		$Images = new Obj_images;
		//First Action
		$this->_load_template();	
		$this->tpl_root->backend_plain();
		//Fetch Dropdown Action
		$result_cat = $Lookup->fetch()->column($Lookup->con->fk_group,$Images->con->lookupgroup_action)
			->filter_active()->query()->data_dropdown();
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
		$this->viewdata['result_cat'] = $result_cat;
		$this->tpl_root->view($content, $this->viewdata);
	}
	
	private function _do_insert($data)
	{
		//Import
		$this->load->model(SERVICE_PATH.'svc_images');
		//Class
		$Svc = New Svc_images;
		//
		$do = $Svc->insert($data);
		if($do==TRUE):
			$pk = $Svc->pk_insert;
			$Svc->upload_image_by_pk($pk);
			$this->session->success($Svc->message);
			$this->chenx_ajax->chenx_ajax_refresh("table_images");
			$this->chenx_ajax->chenx_ajax_refresh("table_choose_images");
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
		if($this->ChkAuth->is_have_role($this->RoleParam->con->images_update)==FALSE): redirect('','parent'); endif;
		//Import
		$this->load->library('chenx_form');
		$this->load->model(OBJECT_PATH.'obj_lookup');
		$this->load->model(OBJECT_PATH.'obj_images');
		$this->load->model(REQUEST_PATH.'req_images');
		//Class and Variable
		$Lookup = new Obj_lookup;
		$Req = new Req_images;
		$Images = new Obj_images;
		//First Action
		$this->_load_template();	
		$this->tpl_root->backend_plain();	
		//
		//Fetch Dropdown Action
		$result_cat = $Lookup->fetch()->column($Lookup->con->fk_group,$Images->con->lookupgroup_action)
			->filter_active()->query()->data_dropdown();
		//
		$data = $Images->fetch()->query_by_pk($pk)->data_row();
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
		$this->viewdata['result_cat'] = $result_cat;
		$this->tpl_root->view($content, $this->viewdata);
	}

	private function _do_update($pk, $data)
	{
		//Import
		$this->load->model(SERVICE_PATH.'svc_images');
		//Class
		$Svc = New Svc_images;
		//
		$do = $Svc->update_by_pk($pk, $data);
		if($do==TRUE):
			$this->session->success($Svc->message);				
			$this->chenx_ajax->chenx_ajax_refresh("table_images");			
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
		if($this->ChkAuth->is_have_role($this->RoleParam->con->images_update)==FALSE): redirect('','parent'); endif;
		//Import
		$this->load->model(SERVICE_PATH.'svc_images');
		//Class
		$Svc = new Svc_images();
		$do = $Svc->update_status_by_pk($pk);
		$return['message'] = $Svc->message;
		echo json_encode($return);
	}
    
    /* For Other Pages */
	public function gallery($type=FALSE, $pk=FALSE)
	{
		//Auth
		if($type==FALSE ||  $pk==FALSE): redirect($this->current_path,'parent'); endif;
		if($this->ChkAuth->is_have_role($this->RoleParam->con->images_update)==FALSE): redirect('','parent'); endif;
		//Importv
		$this->load->model(OBJECT_PATH.'obj_relation_images');
		//Class and Variable
		$Relation = new Obj_relation_images;
		//First Action
		$this->_load_template();
		$this->tpl_root->backend_plain();	
		//Image Data
		$Relation->join_images();
		$Relation->Images->join_lookup_category();
		$result = $Relation->fetch()->filter_active()->query_by_pk_type($type, $pk)->data_result();
		//View
		$content = $this->current_path.'gallery';
		$this->viewdata['type'] = $type;
		$this->viewdata['pk'] = $pk;
		$this->viewdata['Rel'] = $Relation;
		$this->viewdata['result'] = $result;
		$this->viewdata['link_insert'] = base_url($this->current_path."choose_gallery/".$type."/".$pk);
		$this->tpl_root->view($content, $this->viewdata);		
	}

	public function choose_gallery($type=FALSE, $pk=FALSE)
	{
		//Auth
		if($type==FALSE ||  $pk==FALSE): redirect($this->current_path,'parent'); endif;
		if($this->ChkAuth->is_have_role($this->RoleParam->con->images_update)==FALSE): redirect('','parent'); endif;
 		//Import
		$this->load->library('chenx_form');
		$this->load->model(REQUEST_PATH.'req_images');
		$this->load->model(OBJECT_PATH.'obj_images');
		$this->load->model(OBJECT_PATH.'obj_lookup');
		//First Action
		$this->_load_template();
		$this->tpl_root->backend_plain();
		//Class
		$Images = new Obj_images;
		$Lookup = new Obj_lookup;
		$Req = new Req_images;
		//
		//Fetch Dropdown Action
		$result_cat = $Lookup->fetch()->column($Lookup->con->fk_group,$Images->con->lookupgroup_action)
			->filter_active()->query()->data_dropdown();
		//
		$filter = $Req->form_filter_post();
		$this->_table_typename = $type;
		$this->_table_typeid = $pk;
		$table_images = $this->_table_choose_images();
		//View
		$content = $this->current_path.'choose_gallery';
		$this->viewdata['Form'] = new Chenx_form;
		$this->viewdata['pk'] = $pk;
		$this->viewdata['Req'] = $Req;
		$this->viewdata['result_cat'] = $result_cat;
		$this->viewdata['filter'] = $filter;
		$this->viewdata['table_images'] = $table_images;
		$this->viewdata['link_insert'] = base_url("backend/info/images/insert");
		//Auth Data
		$this->viewdata['is_insert'] = $this->ChkAuth->is_have_role($this->RoleParam->con->images_update);
		//View It!
		$this->tpl_root->view($content, $this->viewdata);
	}

	var $_table_typeid = FALSE;
	var $_table_typename = FALSE;
	protected function _table_choose_images()
	{
		//First Action
		$this->_load_template();
		$this->tpl_root->backend_plain();
		//Import
		$this->load->model(OBJECT_PATH.'obj_images');
		$this->load->model(REQUEST_PATH.'req_images');
		//Class and var
		$Images = new Obj_images;
		$Req = new Req_images;
		$page = $this->ajax_page;
		$limit = 20;
		//Set Variable for Table
		$search = $Req->form_filter_post();
        //Set Type ID and Name
		if(isset($search["typeid"])==FALSE):
			$search["typeid"] = $this->_table_typeid;
		endif;
		if(isset($search["typename"])==FALSE):
			$search["typename"] = $this->_table_typename;
		endif;
        //
		$search[$Images->con->status] = 1;
		$encode = $this->encrypt->encode_array($search);
		//
		$Images->left_join_relation_images($search["typename"], $search["typeid"])->join_lookup_category();
        
		$result = $Images->fetch()->column($Images->Relation_images->con->pk_typeid,"NULL","null",FALSE,FALSE)
			->filter_search($search)->limit_page($limit, $page)->query(TRUE)->data_result();

		$ajax_pagination = $this->chenx_ajax->button_pagination('table_choose_images',$Images->total_rows, $page, $limit);
		//View
		$content = $this->current_path.'_table_choose_images';
		$this->ajaxviewdata['Images'] = $Images;
		$this->ajaxviewdata['result'] = $result;
		$this->ajaxviewdata['ajax_pagination'] = $ajax_pagination;
		$this->ajaxviewdata['ajax_src_encode'] = $encode;
		$this->ajaxviewdata['type'] = $search['typename'];
		$this->ajaxviewdata['pk'] = $search['typeid'];
		return $this->load->view($content, $this->ajaxviewdata, TRUE);
	}

	public function do_choose_gallery($type=FALSE, $pk=FALSE, $pk_images=FALSE)
	{
		//Auth
		if($type==FALSE || $pk==FALSE || $pk_images==FALSE):	redirect();	endif;
		//Import
		$this->load->model(SERVICE_PATH.'svc_relation_images');
		//Class
		$Svc = New Svc_relation_images;
		//
		$do = $Svc->insert($type, $pk, $pk_images);
		if($do==TRUE):
			$this->session->success($Svc->message);
		else:
			$this->session->error($Svc->message);
		endif;
		redirect($this->current_path.'gallery/'.$type.'/'.$pk);
	}
    
} 

/* End of file */