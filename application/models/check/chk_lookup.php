<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chk_lookup extends Chk_root {
	
	public function __construct()
	{
		//Import Needed Model
		$this->load->model(OBJECT_PATH.'obj_lookupgroup');
		//End Import
	}
	
	public function is_group_not_static($pk_group="")
	{
		$Group = new Obj_lookupgroup;
		$row = $Group->fetch()->query_by_pk($pk_group)->data_row();
		if($row == TRUE):
			if($row[$Group->con->is_static]==TRUE):
				$this->form_validation->set_message('external_callbacks', "Grup ini bersifat statis");
				return FALSE;
			else:
				return TRUE;
			endif;
		else:
			$this->form_validation->set_message('external_callbacks', "Grup ini tidak ada");
			return FALSE;
		endif;
	}
}

/* End of file */