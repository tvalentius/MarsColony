<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chk_auth extends Chk_root {
	
	public function __construct()
	{
		//Import Needed Model
		//End Import
	}
	
	//Here, we check if User is Logged in or Not,
	//We check if the Session "User" have a right value or not
	public function is_user_login()
	{
		//Get User Session
		$session = $this->session->user();
		//Get Data Session, actually we only need the "session_id"
		$sess_data = $this->session->all_userdata();
		if($session==TRUE):
			if($session["id"]==TRUE):
				return TRUE;
			else:
				return FALSE;
			endif;
		else:
			return FALSE;
		endif;
	}
	
	// Check if Logged In User have the Role of the Parameter passed
	// If not, return FALSE
	public function is_have_role($param=FALSE)
	{
		$userrole = $this->userrole;
		$value = FALSE;
		if($userrole==FALSE):
			return FALSE;
		endif;
		foreach($userrole as $role):
			if($role[$this->RoleParam->con->pk]==$param):
				$value = TRUE;
			endif;
		endforeach;
		return $value;
	}
    
	//Here, we check if player is Logged in or Not,
	//We check if the Session "player" have a right value or not
	public function is_player_login()
	{
        //Load
        $this->load->model(OBJECT_PATH.'obj_player');
        //
        $Player = new Obj_player;
        //Player must login from Facebook first
        if($this->FB->is_fb_login==FALSE):
            return FALSE;
        else:
            return TRUE;
        endif;
		//Get Member Session
		/*$session = $this->session->player();
		//Get Data Session, actually we only need the "session_id"
		$sess_data = $this->session->all_userdata();
		if($session==TRUE):
			if($session["id"]==TRUE):
				return TRUE;
			else:
				return FALSE;
			endif;
		else:
			return FALSE;
		endif;*/
	}
}

/* End of file */