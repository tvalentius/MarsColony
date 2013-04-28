<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Root_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(CONSTANT_PATH.'con_root');
		$this->load->model(REQUEST_PATH.'req_root');
		$this->load->model(OBJECT_PATH.'obj_root');
		$this->load->model(QUERY_PATH.'qry_root');
		$this->load->model(CHECK_PATH.'chk_root');
		$this->load->model(FETCH_PATH.'ftc_root');
		$this->load->model(SERVICE_PATH.'svc_root');
	}
}

/* End of file */