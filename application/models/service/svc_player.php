<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Svc_player extends Svc_root {
	
	public function __construct()
	{
		//Import
		$this->load->model(CONSTANT_PATH.'con_player');
		$this->load->model(OBJECT_PATH.'obj_player');
		//End
		parent::__construct();
	}
		
	public function update_by_pk($pk, $data)
	{
		//Class Variable
		$Player = new Obj_player;
		$service = $Player->fetch()->service()->update_by_pk($pk, $data);
		$player_row = $Player->fetch()->query_by_pk($pk)->data_row();
		if($service):
			//Audit Trail
			$this->audittrail("player","update", $this->audit_value($pk));
			//
			$this->message = "Ubah Player Berhasil";
		else:
			$this->message = "Ubah Player Gagal";
		endif;
		return $service;
	}

	public function delete_by_pk($pk)
	{
		//Import
		$this->load->model(OBJECT_PATH.'obj_player');
		//Class Variable
		$Player = new Obj_player;
		$row = $Player->fetch()->query_by_pk($pk)->data_row();
		//Set Status to Update, Active or Non-Active
		if($row[$Player->con->status]):
			$change_stat = FALSE;	$audit_action = "unactivate";
		else:
			$change_stat = TRUE;	$audit_action = "restore";
		endif;
		$data[$Player->con->status] = $change_stat;
		$result = $Player->fetch()->service()->update_by_pk($pk, $data);
		if($result == TRUE):
			//Audit Trail
			$this->audittrail("player",$audit_action, $this->audit_value($pk));
			//
			$this->message = "Ganti Status Player ".$row[$Player->con->name]." Berhasil";
		else:
			$this->message = "Ganti Status Player ".$row[$Player->con->name]." Gagal";
		endif;
		return $result;
	}
	
	public function update_login_date($pk)
	{
		//Class Variable
		$Player = new Obj_player;
		//
		$data[$Player->con->login_date] = current_datetime();
		$service = $Player->fetch()->service()->update_by_pk($pk, $data);
		return $service;		
	}
    
	//Facebook
	public function insert_from_fb($fbdata)
	{
		//Class Variable
		$Player = new Obj_player;

        //Facebook ID
		$data[$Player->con->fbid] = $fbdata['id'];
        //Name
		$data[$Player->con->name] = $fbdata['first_name'];
		$data[$Player->con->lastname] = $fbdata['last_name'];
        //City
		$data[$Player->con->city] = $fbdata['location']['name'];
        //Email
		$data[$Player->con->email] = $fbdata['email'];
        //Set status to active
		$data[$Player->con->status] = TRUE;
        //Last login date is now
		$data[$Player->con->login_date] = current_datetime();
		//Insert to database
		$service = $Player->fetch()->service()->insert_single($data);
		if($service):
			$this->pk_insert = $Player->data_last_pk();
			//Audit Trail
			$this->audittrail("player","insert", $this->audit_value($this->pk_insert));
			//
			$this->message = "Pembuatan Player Berhasil";
		else:
			$this->message = "Pembuatan Player Gagal";
		endif;
		return $service;
	}

	private function audit_value($pk_player)
	{
		//Class Variable
		$Player = new Obj_player;
		//Get Data
		$data = $Player->fetch()->query_by_pk($pk_player)->data_row();
		//Set Value
		$value =
			"Player\n".
			"Nama Depan : ".$data[$Player->con->name]."\n".
			"Nama Belakang : ".$data[$Player->con->lastname]."\n"
		;
		return $value;
	}
}

/* End of file */