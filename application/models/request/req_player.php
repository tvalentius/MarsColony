<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Req_player extends Req_root {	
	
	
	public function __construct()
	{
        //Load
        $this->load->model(CONSTANT_PATH.'con_player');
        //
		parent::__construct();
		$this->con = new Con_player;
	}

	public function form_filter_post($save=FALSE)
 	{
		$data = array(
			$this->con->name		=> $this->input->post($this->form_name),
			$this->con->status		=> default_post($this->form_status,1)
		);
		return $this->process_search_value($data);
	}
}

/* End of file */