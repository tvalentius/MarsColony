<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Svc_contactus extends Svc_root {
	
	public function __construct()
	{
		//Import
		$this->load->model(CONSTANT_PATH.'con_contactus');
		$this->load->model(OBJECT_PATH.'obj_contactus');
		//End
		parent::__construct();
	}

	public function update_by_pk($pk, $data)
	{
		//Class Variable
		$Contact = new Obj_contactus;
		//End
		$service = $Contact->fetch()->service()->update_by_pk($pk, $data);
		$contactus_row = $Contact->fetch()->query_by_pk($pk)->data_row();
		if($service):
			//Audittrail
			$this->audittrail("contactus","update", $this->audit_value($pk));
			//
			$this->message = "Ubah Status Contact Us :".$contactus_row[$Contact->con->name]." Berhasil";
		else:
			$this->message = "Ubah Status Contact Us :".$contactus_row[$Contact->con->name]." Gagal";
		endif;
		return $service;
	}

	private function audit_value($pk_contactus)
	{
		//Class Variable
		$Contact = new Obj_contactus;
		$Contact->join_lookup_status();
		//Get Data
		$data = $Contact->fetch()->query_by_pk($pk_contactus)->data_row();
		//Set Value
		$value =
			"Nama : ".$data[$Contact->con->name]."\n".
			"Pesan : ".$data[$Contact->con->message]."\n".
			"Status : ".$data[$Contact->Lookup->con->name]."\n"
		;
		return $value;
	}
}

/* End of file */