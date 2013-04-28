<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chk_gamelog extends Chk_root {
	
    var $Gamelog;
    
	public function __construct()
	{
		//Import Needed Model
		$this->load->model(OBJECT_PATH.'obj_gamelog');
		//End Import
        $this->Gamelog = new Obj_gamelog;
	}
	
    public function is_there_pending_log($pk_player)
    {
        //Check if there is pending log for this player
        $check = $this->Gamelog->fetch()->filter_pending_log($pk_player)->query()->count_rows();
        //Return the result
        if($check):
            return TRUE;
        else:
            return FALSE;
        endif;
    }
}

/* End of file */