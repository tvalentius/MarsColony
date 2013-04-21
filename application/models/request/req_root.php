<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Req_root extends Root_model {	
	
	var $con;
	var $form			= FALSE;
	var $search_value	= FALSE;
	var $search_encode 	= FALSE;

	/*	Common Form Name */
	var $form_name = 'name';
	var $form_desc = 'desc';
	var $form_pass = 'pass';
	var $form_status = 'status';
	var $form_type = 'type';
	var $form_order_object = 'orderby';
	var $form_order_sort = 'sortby';
	var $form_captcha = 'captcha';
	var $form_checkbox = 'checkbox';
	var $form_datestart = 'startdate';
	var $form_dateend = 'enddate';
    
    /* To Support SEO Friendly */
	var $form_keyword	=	"keyword";
	var $form_metadesc	=	"metadesc";    
    

	public function __construct()
	{
		if($this->ajax_src_encode==TRUE):
			$this->search_encode = $this->ajax_src_encode;
			$this->decode_search();
		endif;	
	}

	protected function process_value($data)
	{
		$this->form = $data;
		return $data;
	}

	protected function process_search_value($data)
	{
		if($this->search_value==TRUE):
			$data = $this->search_value;
		else:
			$this->search_value = $data;
			$this->encode_search();
		endif;
		return $data;
	}

	protected function check_post_rules($rules)
	{
		$rules = $this->public_rules($rules);
		$this->set_post_rules($rules);
		return $this->form_validation->run();
	}

	private function public_rules($rules)
	{
		return $rules;
	}

	private function set_post_rules($rules)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules($rules);
	}
	
	public function encode_search()
	{
		$this->load->library('encrypt');
		$this->search_encode = $this->encrypt->encode_array($this->search_value);
	}
	
	public function decode_search()
	{
		$this->load->library('encrypt');
		$this->search_value = $this->encrypt->decode_array($this->search_encode);
	}
}

/* End of file */