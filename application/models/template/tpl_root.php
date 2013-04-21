<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tpl_root extends Root_model {
	
	var $data = array();
	var $tpl_folder = array('template');
	
	// Boolean to set if the template have to shown or not
	var $is_head=FALSE;
	var $is_header=FALSE;
	var $is_menu=FALSE;
	var $is_message=FALSE;
	var $is_left=FALSE;
	var $is_right=FALSE;
	var $is_footer=FALSE;
	
	// Boolean to set the template format
	var $is_plain = FALSE;
	var $is_blank = FALSE;
	
	// Main View Files
	var $view = "template";
	
	// Head Variable
	var $style = array();
	var $js = array();
	var $title = "CokelatSoft CMS Ver 1.0";	

	public function __construct()
	{
		//Import
		//End
	}
	
//Function that sets the Template Requirements
	//Custom Requirements
	function roulette()
	{
		//Import
		$this->load->model(TEMPLATE_PATH.'roulette/tpl_head');	$this->is_head = TRUE;
		$this->load->model(TEMPLATE_PATH.'common/tpl_message');	$this->is_message = TRUE;
		//
		$this->view = "roulette/template";
	}
	
	
	//Common Requirements
	function common()
	{
		//Import
		$this->load->model(TEMPLATE_PATH.'common/tpl_head');	$this->is_head = TRUE;
		$this->load->model(TEMPLATE_PATH.'common/tpl_header');	$this->is_header = TRUE;
		$this->load->model(TEMPLATE_PATH.'common/tpl_menu');	$this->is_menu = TRUE;
		$this->load->model(TEMPLATE_PATH.'common/tpl_message');	$this->is_message = TRUE;
		$this->load->model(TEMPLATE_PATH.'common/tpl_left');	$this->is_left = TRUE;
		$this->load->model(TEMPLATE_PATH.'common/tpl_right');	$this->is_right = TRUE;
		$this->load->model(TEMPLATE_PATH.'common/tpl_footer');	$this->is_footer = TRUE;
		//
		$this->view = "common/template";
	}

	function plain()
	{
		//Import
		$this->load->model(TEMPLATE_PATH.'common/tpl_head');	$this->is_head = TRUE;
		$this->load->model(TEMPLATE_PATH.'common/tpl_message');	$this->is_message = TRUE;
		//
		$this->is_plain = TRUE;
		$this->view = "plain/template";
	}

	function design()
	{
		//Import
		$this->load->model(TEMPLATE_PATH.'design/tpl_head');	$this->is_head = TRUE;
		//
		$this->is_plain = TRUE;
		define('DESIGN_IMAGE_PATH',base_url().'assets/css/design/images/');
		$this->view = "design/template";
	}

	function blank()
	{
		$this->is_blank = TRUE;
		$this->view = "blank/template";
	}

	function box_message()
	{
		//Import
		$this->load->model(TEMPLATE_PATH.'box_message/tpl_head');		$this->is_head = TRUE;
		$this->load->model(TEMPLATE_PATH.'box_message/tpl_message');	$this->is_message = TRUE;
		//
		$this->is_plain = TRUE;
		$this->view = "box_message/template";
	}	
	//Backend Requirements
	function backend()
	{
		//Import
		$this->load->model(TEMPLATE_PATH.'backend/tpl_head');	$this->is_head = TRUE;
		$this->load->model(TEMPLATE_PATH.'backend/tpl_header');	$this->is_header = TRUE;
		$this->load->model(TEMPLATE_PATH.'backend/tpl_menu');	$this->is_menu = TRUE;
		$this->load->model(TEMPLATE_PATH.'backend/tpl_message');$this->is_message = TRUE;
		$this->load->model(TEMPLATE_PATH.'backend/tpl_left');	$this->is_left = FALSE;
		$this->load->model(TEMPLATE_PATH.'backend/tpl_footer');	$this->is_footer = TRUE;
		//Path
		if(!defined('BACKEND_IMAGE_PATH')): define('BACKEND_IMAGE_PATH', CSS_PATH.'backend/images/'); endif;
		//View File
		$this->view = "backend/template";
	}

	function backend_login()
	{
		//Import
		$this->load->model(TEMPLATE_PATH.'backend/tpl_head');	$this->is_head = TRUE;
		$this->load->model(TEMPLATE_PATH.'backend/tpl_header');	$this->is_header = TRUE;
		$this->load->model(TEMPLATE_PATH.'backend/tpl_message');$this->is_message = TRUE;
		$this->load->model(TEMPLATE_PATH.'backend/tpl_footer');	$this->is_footer = TRUE;
		//Path
		if(!defined('BACKEND_IMAGE_PATH')): define('BACKEND_IMAGE_PATH', CSS_PATH.'backend/images/'); endif;
		$this->view = "backend/template";
	}

	function backend_plain()
	{
		//Import
		$this->load->model(TEMPLATE_PATH.'backend/plain/tpl_head');	$this->is_head = TRUE;
		$this->load->model(TEMPLATE_PATH.'backend/plain/tpl_message');$this->is_message = TRUE;
		//Path
		if(!defined('BACKEND_IMAGE_PATH')): define('BACKEND_IMAGE_PATH', CSS_PATH.'backend/images/'); endif;
		$this->is_plain = TRUE;
		$this->view = "backend/plain";
	}
	
	// View
	function view($content=FALSE, $data=FALSE, $is_return=FALSE)
	{
		//Top Header is required for HTML Header, CSS and JS
		$this->is_head==TRUE ?
			$this->data['head'] = $this->tpl_head->view() : $this->data['head'] = "";
				
		//Header Page
		$this->is_header==TRUE ?
			$this->data['header'] = $this->tpl_header->view() : $this->data['header'] = "";
		
		//Menu or Navigation Page
		$this->is_menu == TRUE ?
			$this->data['menu'] = $this->tpl_menu->view() : $this->data['menu'] = '';

		//Message Page
		$this->is_message == TRUE ?
			$this->data['message'] = $this->tpl_message->view() : $this->data['message'] = '';
		
		//Left Page
		$this->is_left == TRUE ?
			$this->data['left'] = $this->tpl_left->view() : $this->data['left'] = '';
		
		//Right
		$this->is_right == TRUE ?
			$this->data['right'] = $this->tpl_right->view() : $this->data['right'] = '';
		
		//Footer
		$this->is_footer == TRUE ?
			$this->data['footer'] = $this->tpl_footer->view() : $this->data['footer'] = '';
		
		//Show The Content of each page called
		$content == TRUE ?
			$this->data['content'] = $this->load->view($content,$data,TRUE) : $this->data['content'] = '';
		
		//Finally, Generate It !!
		$this->load->view(folder_path($this->tpl_folder).$this->view,$this->data, $is_return);
	}
	
	//Custom Function
	public function add_style($name)
	{
		foreach($this->style as $style):
			if($style == $name):
				return;
			endif;
		endforeach;
		$this->style[] = $name;
		return;
	}

	public function add_js($name)
	{
		foreach($this->js as $js):
			if($js == $name):
				return;
			endif;
		endforeach;
		$this->js[] = $name;
		return;
	}

	public function title($title = '')
	{
		$default = $this->title;
		if($title):
			$title = $title." - ".$default;
		endif;

		$this->title = $title;
	}

	protected function create_style()
	{
		$var = "";
		if($this->style):
			foreach($this->style as $style):
				$var .= style($style)."
				";
			endforeach;
		endif;
		return $var;
	}

	protected function create_js()
	{
		$var = "";
		if($this->js):
			foreach($this->js as $js):
				$var .= script($js)."
				";
			endforeach;
		endif;
		return $var;
	}
}

/* End of file */