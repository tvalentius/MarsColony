<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Svc_auth extends Svc_root {
	
	public function __construct()
	{
		//Import
		//End
		parent::__construct();
	}
	
	//To set User Authentication, we need the User's Data
	public function set_user_auth($data)
	{
		//Import
		$this->load->model(OBJECT_PATH.'obj_user');
		//Class Variable
		$User = new Obj_user;
		//Set User Session Variable
		$data_sess = $this->session->all_userdata();
		//The Primary Data for User Session is the User's Primary Key,
		//"sessid" and "baseurl" is needed for security authorization
		$session = array(
			"id" => $data[$User->con->pk],
			"sessid" => $data_sess["session_id"]
		);
		//Save User Session
		return $this->session->user($session);
	}
    
	public function set_player_auth($data)
	{
		//Import
		$this->load->model(OBJECT_PATH.'obj_player');
		//Class Variable
		$Player = new Obj_player;
		//Set User Session Variable
		$data_sess = $this->session->all_userdata();
		//The Primary Data for Player Session is the Player's Primary Key,
		//"sessid" and "baseurl" is needed for security authorization
		$session = array(
			"id" => $data[$Player->con->pk],
			"sessid" => $data_sess["session_id"],
			"fbid" => $data[$Player->con->fbid]
		);
		//Save User Session
		return $this->session->player($session);
	}
}

/* End of file */