<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Svc_login extends Svc_root {
	
	public function __construct()
	{
		//Import
		//End
		parent::__construct();
	}

	public function user_login($data)
	{
		//Import
		$this->load->model(OBJECT_PATH.'obj_user');
		$this->load->model(SERVICE_PATH.'svc_user');
		$this->load->model(SERVICE_PATH.'svc_auth');
		//Class Variable
		$User = new Obj_user;
		$Svc_user = new Svc_user;
		$Svc_auth = new Svc_auth;
		//
		$User->fetch()->filter_login($data)->query();
		if($User->count_rows() == TRUE):
			$row = $User->data_row();
			$Svc_user->update_login_date($row[$User->con->pk]);
			$Svc_auth->set_user_auth($row);
			//Audit Trail
			$this->audittrail("user","login","User Login: ".$row[$User->con->login_name], $row[$User->con->pk]);
			//
			$this->message = "Sukses Login";
			return TRUE;
		else:
			$this->message = "Gagal Login, Kesalahan Username atau Password, atau User Tidak Aktif.";
			return FALSE;
		endif;
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		return;
	}
}

/* End of file */