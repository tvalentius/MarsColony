<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tpl_head extends Tpl_root {

	var $data = array();
	var $style = array();
	var $js = array();

	public function __construct()
	{
		$this->style[] = 'box_message/main.css';
	}

	function view()
	{
		$this->data['title'] = $this->title;
		$this->data['style'] = $this->create_style();
		$this->data['js'] = $this->create_js();
		$this->data['chenx_ajax_refresh'] = $this->chenx_ajax->get_chenx_ajax_refresh();
		return $this->load->view(folder_path($this->tpl_folder).'box_message/head', $this->data, TRUE);
	}
}

/* End of file */