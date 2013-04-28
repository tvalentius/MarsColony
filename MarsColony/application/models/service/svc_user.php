<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Svc_user extends Svc_root {
	
	public function __construct()
	{
		//Import
		$this->load->model(CONSTANT_PATH.'con_user');
		$this->load->model(OBJECT_PATH.'obj_user');
		//End
		parent::__construct();
	}

	public function insert($data)
	{
		//Class Variable
		$User = new Obj_user;
		//End
		$data[$User->con->pass] = md5($data[$User->con->pass]);
		$data[$User->con->status] = TRUE;
		$service = $User->fetch()->service()->insert_single($data);
		if($service):
			//Audit Trail
			$pk = $User->data_last_pk();
			$this->audittrail("user","insert", $this->audit_value($pk));
			//
			$this->message = "Input User Berhasil";
		else:
			$this->message = "Input User Gagal";
		endif;
		return $service;
	}
		
	public function update_by_pk($pk, $data)
	{
		//Class Variable
		$User = new Obj_user;
		//Check PK
		if($User->con->admin_pk==$pk): unset($data[$User->con->fk_group]); endif;
		//
		$service = $User->fetch()->service()->update_by_pk($pk, $data);
		$user_row = $User->fetch()->query_by_pk($pk)->data_row();
		if($service):
			//Audit Trail
			$this->audittrail("user","update", $this->audit_value($pk));
			//
			$this->message = "Ubah User ".$user_row[$User->con->login_name]." Berhasil";
		else:
			$this->message = "Ubah User ".$user_row[$User->con->login_name]." Gagal";
		endif;
		return $service;
	}

	public function delete_by_pk($pk)
	{
		//Import
		$this->load->model(OBJECT_PATH.'obj_user');
		//Class Variable
		$User = new Obj_user;
		//Check PK
		if($User->con->admin_pk==$pk): return FALSE; endif;
		//
		$row = $User->fetch()->query_by_pk($pk)->data_row();
		//Set Status to Update, Active or Non-Active
		if($row[$User->con->status]):
			$change_stat = FALSE;	$audit_action = "unactivate";
		else:
			$change_stat = TRUE;	$audit_action = "restore";
		endif;
		$data[$User->con->status] = $change_stat;
		$result = $User->fetch()->service()->update_by_pk($pk, $data);
		if($result == TRUE):
			//Audit Trail
			$this->audittrail("user",$audit_action, $this->audit_value($pk));
			//
			$this->message = "Ganti Status User ".$row[$User->con->login_name]." Berhasil";
		else:
			$this->message = "Ganti Status User ".$row[$User->con->login_name]." Gagal";
		endif;
		return $result;
	}

	public function update_pass_by_pk($pk, $data)
	{
		//Class Variable
		$User = new Obj_user;
		//Check PK
		if($User->con->admin_pk==$pk):
			if($this->userpk!=$pk):
				$this->message = "Hanya Administrator yang boleh mengubah Password Administrator";
				return FALSE;			
			endif;
		endif;
		//
		$data[$User->con->pass] = md5($data[$User->con->pass]);
		$service = $User->fetch()->service()->update_by_pk($pk, $data);
		$user_row = $User->fetch()->query_by_pk($pk)->data_row();
		if($service):
			//Audit Trail
			$this->audittrail("user","update", "Ubah Password ".$user_row[$User->con->login_name]);
			//
			$this->message = "Ubah Password User ".$user_row[$User->con->login_name]." Berhasil";
		else:
			$this->message = "Ubah Password User ".$user_row[$User->con->login_name]." Gagal";
		endif;
		return $service;
	}
	
	public function update_login_date($pk)
	{
		//Class Variable
		$User = new Obj_user;
		//
		$data[$User->con->login_date] = current_datetime();
		$service = $User->fetch()->service()->update_by_pk($pk, $data);
		return $service;		
	}

	private function audit_value($pk_user)
	{
		//Class Variable
		$User = new Obj_user;
		//Get Data
		$data = $User->join_usergroup()->fetch()->query_by_pk($pk_user)->data_row();
		//Set Value
		$value =
			"User : ".$data[$User->con->login_name]."\n".
			"Nama : ".$data[$User->con->name]."\n".
			"Grup : ".$data[$User->Usergroup->con->name]."\n"
		;
		return $value;
	}
}

/* End of file */