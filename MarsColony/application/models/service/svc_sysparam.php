<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Svc_sysparam extends Svc_root {
	
	public function __construct()
	{
		//Import
		$this->load->model(CONSTANT_PATH.'con_sysparam');
		$this->load->model(OBJECT_PATH.'obj_sysparam');
		//End
		parent::__construct();
	}

	public function update_by_pk($pk, $data)
	{
		//Class Variable
		$Sysparam = new Obj_sysparam;
		//Let's Validate if The Value is Match with Regex Format
		$Row = $Sysparam->fetch()->query_by_pk($pk)->data_row();
		$regex = $Row[$Sysparam->con->regex];
		if($Row[$Sysparam->con->is_static]==TRUE):
			$this->message = "Parameter ini bersifat Statis, tidak dapat diubah";
			return FALSE;
		elseif($regex):
			if(preg_match($regex, $data[$Sysparam->con->value])==FALSE):
                $this->message= "Value tidak sesuai dengan Format";
    			return FALSE;
            endif;
		endif;
		//
		$service = $Sysparam->fetch()->service()->update_by_pk($pk, $data);
		if($service):
			//Audit Trail
			$this->audittrail("sysparam","update",$this->audit_value($pk));
			//
			$this->message = "Ubah Sistem Parameter ".$sysparam_row[$Sysparam->con->name]." Berhasil";
		else:
			$this->message = "Ubah Sistem Parameter ".$sysparam_row[$Sysparam->con->name]." Gagal";
		endif;
		return $service;
	}

	private function audit_value($pk_sysparam)
	{
		//Class Variable
		$Sysparam = new Obj_sysparam;
		//Get Data
		$data = $Sysparam->fetch()->query_by_pk($pk_sysparam)->data_row();
		//Set Value
		$value =
			"Name : ".$data[$Sysparam->con->name]."\n".
			"Value : ".$data[$Sysparam->con->value]."\n"
		;
		return $value;
	}
}

/* End of file */