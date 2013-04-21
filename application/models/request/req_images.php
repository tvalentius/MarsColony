<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Req_images extends Req_root {	
	
	var $form_ishot		=	"ishot";
	var $form_content	=	"content";
	var $form_keyword	=	"keyword";
	var $form_teaser	=	"teaser";
	var $form_category	=	"Category";
	var $form_image		=	"image";
	
	public function __construct()
	{
		//Load
		$this->load->model(CONSTANT_PATH.'con_images');
		//
		parent::__construct();
		$this->con = new Con_images;
	}

	public function form_filter_post($save=FALSE)
 	{
		$data = array(
			$this->con->name				=> $this->input->post($this->form_name),
			$this->con->fk_lookup_category	=> default_post($this->form_category,0),
			$this->con->status				=> default_post($this->form_status,1),
		);
		return $this->process_search_value($data);
	}
	
	public function form_insert_post($save=FALSE)
 	{
		$data = array(
			$this->con->name		=> $this->input->post($this->form_name),
			$this->con->desc		=> $this->input->post($this->form_desc),
			$this->con->fk_lookup_category	=> $this->input->post($this->form_category)
		);
		return $this->process_value($data);
	}
	
	public function form_insert_rules()
	{
		$rules[]	= array(
			'field' => $this->form_name,'label' => "Judul", 'rules' => 'required'
		);
		return $this->check_post_rules($rules);
	}

	public function form_update_post($save=FALSE)
 	{
		$data = array(
			$this->con->name		=> $this->input->post($this->form_name),
			$this->con->desc		=> $this->input->post($this->form_desc),
		);
		return $this->process_value($data);
	}
	
	public function form_update_rules()
	{
		$rules[]	= array(
			'field' => $this->form_name,'label' => "Judul", 'rules' => 'required'
		);
		return $this->check_post_rules($rules);
	}
}

/* End of file */