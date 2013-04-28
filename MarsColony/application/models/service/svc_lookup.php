<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Svc_lookup extends Svc_root {
	
	public function __construct()
	{
		//Import
		$this->load->model(CONSTANT_PATH.'con_lookup');
		$this->load->model(OBJECT_PATH.'obj_lookup');
		//End
		parent::__construct();
	}

	public function insert($data)
	{
		//Class Variable
		$Lookup = new Obj_lookup;
		//End
		$data[$Lookup->con->status] = TRUE;
		$service = $Lookup->fetch()->service()->insert_single($data);
		if($service):
			$pk = $Lookup->data_last_pk();
			//Audit Trail
			$this->audittrail("lookup","insert",$this->audit_value($pk));
			//
			$this->message = "Input Lookup Berhasil";
		else:
			$this->message = "Input Lookup Gagal";
		endif;
		return $service;
	}
	
	public function update_by_pk($pk, $data)
	{
		//Class Variable
		$Lookup = new Obj_lookup;
		//End
		$service = $Lookup->fetch()->service()->update_by_pk($pk, $data);
		$lookup_row = $Lookup->fetch()->query_by_pk($pk)->data_row();
		if($service):
			//Audit Trail
			$this->audittrail("lookup","update",$this->audit_value($pk));
			//
			$this->message = "Ubah Lookup ".$lookup_row[$Lookup->con->name]." Berhasil";
		else:
			$this->message = "Ubah Lookup ".$lookup_row[$Lookup->con->name]." Gagal";
		endif;
		return $service;
	}

	public function delete_by_pk($pk)
	{
		//Class Variable
		$Lookup = new Obj_lookup;
		//
		$row = $Lookup->fetch()->query_by_pk($pk)->data_row();
		if($row[$Lookup->con->status]): $change_stat = FALSE;	$audit_action = "unactivate";
		else: $change_stat = TRUE;								$audit_action = "restore";
		endif;
		$data[$Lookup->con->status] = $change_stat;
		$result = $Lookup->fetch()->service()->update_by_pk($pk, $data);
		if($result == TRUE):
			//Audittrail
			$this->audittrail("lookup",$audit_action, $this->audit_value($pk));
			//
			$this->message = "Ganti Status Lookup ".$row[$Lookup->con->name]." Berhasil";
		else:
			$this->message = "Ganti Status Lookup ".$row[$Lookup->con->name]." Gagal";
		endif;
		return $result;
	}

	private function audit_value($pk_lookup)
	{
		//Class Variable
		$Lookup = new Obj_lookup;
		$Lookup->join_lookupgroup();
		//Get Data
		$data = $Lookup->fetch()->query_by_pk($pk_lookup)->data_row();
		//Set Value
		$value =
			"Name : ".$data[$Lookup->con->name]."\n".
			"Desc : ".$data[$Lookup->con->desc]."\n".
			"Group : ".$data[$Lookup->Lookupgroup->con->name]."\n"
		;
		return $value;
	}
}

/* End of file */