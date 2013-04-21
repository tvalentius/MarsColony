<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tpl_head extends Tpl_root {

	var $data = array();
	var $style = array();
	var $js = array();
	var $title = "CokelatSoft CMS Ver 1.0";


	public function __construct()
	{
		$this->style[] = 'backend/main.css';
		$this->style[] = 'table/table_default.css';
		$this->style[] = 'jquery/colorbox.css';
		$this->style[] = 'jquery/jquery.ui.css';
		$this->style[] = 'jquery/jquery.lightbox-0.5.css';
		$this->style[] = 'menu/apple/styles.css';

		$this->js[] = 'other/modernizr-1.5.min.js';
		$this->js[] = 'jquery/jquery.min.js';
		$this->js[] = 'jquery/jquery.ui.min.js';
		$this->js[] = 'jquery/jquery.lightbox-0.5.min.js';
		$this->js[] = 'jquery/jquery.datetimepicker.js';
		$this->js[] = 'jquery/jquery.deftext.js';
		$this->js[] = 'jquery/jquery.colorbox-min.js';
		$this->js[] = 'other/chenx-ajax.js';
		$this->js[] = 'common.js';
	}

	function view()
	{
		$this->data['title'] = $this->title;
		$this->data['style'] = $this->create_style();
		$this->data['js'] = $this->create_js();
		$this->data['chenx_ajax_refresh'] = $this->chenx_ajax->get_chenx_ajax_refresh();
		return $this->load->view(folder_path($this->tpl_folder).'backend/head', $this->data, TRUE);
	}
}

/* End of file */