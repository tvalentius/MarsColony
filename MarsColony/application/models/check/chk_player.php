<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chk_player extends Chk_root {
	
	public function __construct()
	{
		//Import Needed Model
		$this->load->model(OBJECT_PATH.'obj_player');
		//End Import
	}
	
	/* Parameter 1 : Facebook ID */
	public function is_player_fb_already_register($fbid="")
	{
		$Player = new Obj_player;
		$row = $Player->fetch()->filter_fbid($fbid)->query()->count_rows();
		if($row == TRUE):
			return TRUE;
		else:
			return FALSE;
		endif;
	}

    /* Check timerange for submitting score */
    public function is_time_range_of_play_below($timeplay, $timerange=10)
    {
        $timestampnow = strtotime(date('d-m-Y H:i:s'));
		$timestamp_lastplay = strtotime($timeplay);
		$timestamp_range = $timestampnow-$timestamp_lastplay;
        echo $timestamp_range;
        if($timestamp_range < $timerange):
            return FALSE;
        else:
            return TRUE;
        endif;
    }
	
	/* Form Validation Rules */
	public function is_email_new($var="")
	{
		$Player = new Obj_player;
		//
		$row = $Player->fetch()->filter_email($var)->query()->count_rows();
		if($row == TRUE):
			$this->form_validation->set_message('external_callbacks', "Email ini sudah dipakai.");
			return FALSE;
		else:
			return TRUE;
		endif;
	}
    
}

/* End of file */