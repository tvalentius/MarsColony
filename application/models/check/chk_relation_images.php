<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chk_relation_images extends Chk_root {
	
	public function __construct()
	{
		//Import Needed Model
		//End Import
	}
	
	public function is_data_exist($type, $pk, $pk_images)
	{
		//Import
		$this->load->model(OBJECT_PATH.'obj_relation_images');
		//Class
		$Obj = new Obj_relation_images;
		//
		$count = $Obj->fetch()->query_by_pk($type, $pk, $pk_images)->count_rows();
		return $count;
	}
}

/* End of file */