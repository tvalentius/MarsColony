<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends MY_Controller {

	var $module = 'logout';

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		//Import
		$this->load->model(SERVICE_PATH.'svc_login');
		//Class
		$Svc = New Svc_login();
		//First Action
		//
		
		$do = $Svc->logout();
		redirect();
	}
}
/* End of file */