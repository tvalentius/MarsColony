<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tpl_head extends Tpl_root {

	var $data = array();
	var $style = array();
	var $js = array();

	var $title = "CokelatSoft CMS Ver 1.0";
	var $meta = array(
		"desc"=>"",
		"keyword"=>"",
		"author"=>"",
		"copyright"=>""
	);

	public function __construct()
	{
		//Style
		//Javascript
		$this->js[] = 'jquery/jquery.min.js';
	}
	
	function view()
	{
		$this->data['title'] = $this->title;
		$this->data['meta'] = $this->meta;
		$this->data['style'] = $this->create_style();
		$this->data['js'] = $this->create_js();
		$this->data['chenx_ajax_refresh'] = $this->chenx_ajax->get_chenx_ajax_refresh();
		return $this->load->view(folder_path($this->tpl_folder).'common/head', $this->data, TRUE);
	}
}

/* End of file */