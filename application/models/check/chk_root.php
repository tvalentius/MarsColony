<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chk_root extends Root_model {
	
	public function __construct()
	{
		//Import Needed Model
		//End Import
	}

	public function is_form_has_file($var)
	{
		$data = $_FILES[$var];
		if($data['name']==""):
			return FALSE;
		else:
			return TRUE;		
		endif;
	}
	
	protected function is_lookup_exist($var,$lookupgroup=0)
	{
		//Load
		$this->load->model(OBJECT_PATH.'obj_lookup');
		//Class
		$Lookup = new Obj_lookup;
		//
		$result = $Lookup->fetch()->column($Lookup->con->fk_group,$lookupgroup, "if")->filter_active()
			->query_by_pk($var)->count_rows();
		return $result;		
	}

}

/* End of file */