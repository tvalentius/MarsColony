<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Svc_usergroup extends Svc_root {
	
	public function __construct()
	{
		//Import
		$this->load->model(CONSTANT_PATH.'con_usergroup');
		$this->load->model(OBJECT_PATH.'obj_usergroup');
		//End
		parent::__construct();
	}
	
	public function insert($data)
	{
		//Class Variable
		$Group = new Obj_usergroup;
		//End
		$data[$Group->con->status] = TRUE;
		$service = $Group->fetch()->service()->insert_single($data);
		if($service):
			//Audit Trail
			$this->audittrail("usergroup","insert", $this->audit_value($pk));
			//
			$this->message = "Input Group Berhasil";
		else:
			$this->message = "Input Group Gagal";
		endif;
		return $service;
	}
	
	public function update_by_pk($pk, $data)
	{
		//Class Variable
		$Group = new Obj_usergroup;
		//End
		$service = $Group->fetch()->service()->update_by_pk($pk, $data);
		$usergroup_row = $Group->fetch()->query_by_pk($pk)->data_row();
		if($service):
			//Audit Trail
			$this->audittrail("usergroup","update", $this->audit_value($pk));
			//
			$this->message = "Ubah Group ".$usergroup_row[$Group->con->name]." Berhasil";
		else:
			$this->message = "Ubah Group ".$usergroup_row[$Group->con->name]." Gagal";
		endif;
		return $service;
	}
	
	public function delete_by_pk($pk)
	{
		//Import
		$this->load->model(OBJECT_PATH.'obj_usergroup');
		//Class Variable
		$Group = new Obj_usergroup;
		//Check PK
		if($Group->con->admin_pk==$pk): return FALSE; endif;
		//
		$row = $Group->fetch()->query_by_pk($pk)->data_row();
		//Set Status to Update, Active or Non-Active
		if($row[$Group->con->status]):
			$change_stat = FALSE;	$audit_action = "unactivate";
		else:
			$change_stat = TRUE;	$audit_action = "restore";
		endif;
		$data[$Group->con->status] = $change_stat;
		$result = $Group->fetch()->service()->update_by_pk($pk, $data);
		if($result == TRUE):
			//Audit Trail
			$this->audittrail("usergroup",$audit_action, $this->audit_value($pk));
			//
			$this->message = "Ganti Status Group ".$row[$Group->con->name]." Berhasil";
		else:
			$this->message = "Ganti Status Group ".$row[$Group->con->name]." Gagal";
		endif;
		return $result;
	}

	private function audit_value($pk_group)
	{
		//Class Variable
		$Group = new Obj_usergroup;
		//Get Data
		$data = $Group->fetch()->query_by_pk($pk_group)->data_row();
		//Set Value
		$value =
			"Nama : ".$data[$Group->con->name]."\n".
			"Deskripsi : ".$data[$Group->con->desc]."\n"
		;
		return $value;
	}
}

/* End of file */