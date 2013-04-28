<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chk_user extends Chk_root {
	
	public function __construct()
	{
		//Import Needed Model
		$this->load->model(OBJECT_PATH.'obj_user');
		//End Import
	}
	
	public function is_user_new($var="")
	{
		$User = new Obj_user;
		$row = $User->fetch()->column($User->con->login_name,$var)->query()->count_rows();
		if($row == TRUE):
			$this->form_validation->set_message('external_callbacks', "User ".$var." sudah ada");
			return FALSE;
		else:
			return TRUE;
		endif;
	}

	public function is_logged_in_user_pass_match($var="")
	{
		$User = new Obj_user;
		$encoded = md5($var);
		$row = $User->fetch()->column($User->con->pass,$encoded)->query_by_pk($this->userpk)->count_rows();
		if($row == TRUE):
			return TRUE;
		else:
			$this->form_validation->set_message('external_callbacks', "Password Salah");
			return FALSE;
		endif;
	}
}

/* End of file */