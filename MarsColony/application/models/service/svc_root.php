<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Svc_root extends Root_model {	
	
	var $con;
	var $obj;
	var $ftc;
	var $qry;
	
	//Shared Variable
	var $message;
	var $pk_insert;
	
	public function __construct()
	{
		//Import Needed Model
		//End Import
	}
	
	public function send_email($data)
	{
		//Load
		$this->load->library('email');
		//
		$this->email->from($data['from_email'], $data['from_name']);
		$this->email->to($data['to_email']);
		if(isset($data['cc'])):	$this->email->cc($data['cc']);	endif;
		$this->email->subject($data['subject']);
		$this->email->message($data['message']);
		if(isset($data['attach'])):
			foreach($data['attach'] as $attach):
				$this->email->attach($attach);
			endforeach;
		endif;
		$this->email->send();		
	}
	
	public function audittrail($module, $action, $value, $create_by=FALSE)
	{
		//Load
		$this->load->model(OBJECT_PATH.'obj_audittrail');
		$this->load->model(SERVICE_PATH.'svc_audittrail');
		//Class
		$Audit = new Obj_audittrail;
		$Svc = new Svc_audittrail;
		//Change Data to Fix Value
		$module = $Audit->con->module_value[$module];
		$action = $Audit->con->lookup_action_value[$action];
		//Prepare the Data
		$data_audit[$Audit->con->module] = $module;
		$data_audit[$Audit->con->fk_lookup_action] = $action;
		$data_audit[$Audit->con->value] = $value;
		if($create_by==TRUE):
			$data_audit[$Audit->con->create_by] = $create_by;
		endif;
		//Execute!
		return $Svc->insert($data_audit);
	}
}

/* End of file */