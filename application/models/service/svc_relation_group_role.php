<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Svc_relation_group_role extends Svc_root {
	
	public function __construct()
	{
		//Import
		$this->load->model(CONSTANT_PATH.'con_relation_group_role');
		$this->load->model(OBJECT_PATH.'obj_relation_group_role');
		//End
		parent::__construct();
	}
	
	//	Function to Set Roles of Group,
	//	First we delete the old roles, then insert the new roles.
	public function set_roles($pk_group, $data)
	{
		//Load
		$this->load->model(OBJECT_PATH.'obj_usergroup');
		//Class Variable
		$Group = new Obj_usergroup;
		$Con = new Con_relation_group_role;
		$Rel = new Obj_relation_group_role;
		//Check PK
		if($Group->con->admin_pk==$pk_group): return FALSE; endif;
		//Execute Delete All Roles by Group
		$Rel->fetch()->service()->delete_by_pk_group($pk_group);
		//Set the Data
		$insertdata = array();
		foreach($data[$Con->fk_role] as $row):
			$insertdata[] = array($Con->pk_group=>$pk_group, $Con->pk_role=>$row);
		endforeach;
		//
		$service = $Rel->fetch()->service()->insert_multi($insertdata);
		if($service):
			$this->message = "Pengaturan Roles Berhasil";
		else:
			$this->message = "Pengaturan Roles Gagal";
		endif;
		return $service;
	}
}

/* End of file */