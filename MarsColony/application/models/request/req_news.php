<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Req_news extends Req_root {	
	
	var $form_content	=	"content";
	var $form_teaser	=	"teaser";
	var $form_image		=	"image";
	
	public function __construct()
	{
		//Load
		$this->load->model(CONSTANT_PATH.'con_news');
		//
		parent::__construct();
		$this->con = new Con_news;
	}

	public function form_filter_post($save=FALSE)
 	{
		$data = array(
			$this->con->name		=> $this->input->post($this->form_name),
			$this->con->status		=> default_post($this->form_status,1)
		);
		return $this->process_search_value($data);
	}
	
	public function form_insert_post($save=FALSE)
 	{
		$data = array(
			$this->con->name		=> $this->input->post($this->form_name),
			$this->con->metadesc	=> $this->input->post($this->form_metadesc),
			$this->con->teaser		=> $this->input->post($this->form_teaser),
			$this->con->keyword		=> $this->input->post($this->form_keyword),
			$this->con->content		=> $this->input->post($this->form_content)
		);
		return $this->process_value($data);
	}
	
	public function form_insert_rules()
	{
		$rules[]	= array(
			'field' => $this->form_name,'label' => "Judul", 'rules' => 'required'
		);
		$rules[]	= array(
			'field' => $this->form_teaser,'label' => "Teaser", 'rules' => 'required'
		);
		$rules[]	= array(
			'field' => $this->form_content,'label' => "Konten", 'rules' => 'required'
		);
		return $this->check_post_rules($rules);
	}

	public function form_update_post($save=FALSE)
 	{
		$data = array(
			$this->con->name		=> $this->input->post($this->form_name),
			$this->con->metadesc	=> $this->input->post($this->form_metadesc),
			$this->con->teaser		=> $this->input->post($this->form_teaser),
			$this->con->keyword		=> $this->input->post($this->form_keyword),
			$this->con->content		=> $this->input->post($this->form_content)
		);
		return $this->process_value($data);
	}
	
	public function form_update_rules()
	{
		$rules[]	= array(
			'field' => $this->form_name,'label' => "Judul", 'rules' => 'required'
		);
		$rules[]	= array(
			'field' => $this->form_teaser,'label' => "Teaser", 'rules' => 'required'
		);
		$rules[]	= array(
			'field' => $this->form_content,'label' => "Konten", 'rules' => 'required'
		);
		return $this->check_post_rules($rules);
	}
}

/* End of file */