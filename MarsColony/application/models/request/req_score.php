<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Req_score extends Req_root {	
	
    var $form_player = "player";
    var $form_type = "type";
	
	public function __construct()
	{
        //Load
        $this->load->model(CONSTANT_PATH.'con_score');
        //
		parent::__construct();
		$this->con = new Con_score;
	}

	public function form_filter_post($save=FALSE)
 	{
		$data = array(
			"fbid"	=> $this->input->post($this->form_player),
			$this->con->type	=> $this->input->post($this->form_type),
			$this->form_datestart			=> default_post($this->form_datestart, minus_date(30)),
			$this->form_dateend				=> default_post($this->form_dateend, current_date()),
		);
		return $this->process_search_value($data);
	}
}

/* End of file */