<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tpl_head extends Tpl_root {

	var $data = array();
	var $style = array();
	var $js = array();

	var $title = "Codeigniter ChenX Design Development Page";

	public function __construct()
	{
		$this->style[] = 'design/main.css';
		$this->style[] = 'jquery/parallax/jquery.parallax.css';

		$this->js[] = 'jquery/jquery.min.js';
		$this->js[] = 'jquery/parallax/jquery.event.frame.js';
		$this->js[] = 'jquery/parallax/jquery.parallax.js';
		//$this->js[] = 'jquery/jquery.ui.min.js';
	}

	function view()
	{
		$this->data['title'] = $this->title;
		$this->data['style'] = $this->create_style();
		$this->data['js'] = $this->create_js();
		$this->data['chenx_ajax_refresh'] = $this->chenx_ajax->get_chenx_ajax_refresh();
		return $this->load->view(folder_path($this->tpl_folder).'design/head', $this->data, TRUE);
	}
}

/* End of file */