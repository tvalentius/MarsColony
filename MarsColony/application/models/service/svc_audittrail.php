<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Svc_audittrail extends Svc_root {
	
	public function __construct()
	{
		//Import
		$this->load->model(CONSTANT_PATH.'con_audittrail');
		$this->load->model(OBJECT_PATH.'obj_audittrail');
		//End
		parent::__construct();
	}
	
	public function insert($data_audit)
	{
		//Import
		$this->load->model(OBJECT_PATH.'obj_audittrail');
		//End
		$Audit = new Obj_audittrail();
		//Execute
		$result_audit_trail = $Audit->fetch()->service()->insert_single($data_audit);
		//Return Execulte Result, TRUE or FALSE
		return $result_audit_trail;
	}
}

/* End of file */