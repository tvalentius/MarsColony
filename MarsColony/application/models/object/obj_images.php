<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Obj_images extends Obj_root {

	public function __construct($Obj=FALSE)
	{
		//Import
		$this->load->model(CONSTANT_PATH.'con_images');
		$this->load->model(FETCH_PATH.'ftc_images');
		//
		parent::__construct($Obj);
		$this->con = new Con_images;
		$this->ftc = new Ftc_images($this);
	}
	
	public function join_lookup_category()
	{
		$parameter = array(
			"object"=>"lookup",
			"fk"=>$this->con->fk_lookup_category,
			"select"=>"name"
		);
		return $this->join_object($parameter);
	}
	
	public function join_user()
	{
		$parameter = array(
			"object"=>"user",
			"fk"=>$this->con->create_by,
			"select"=>"name"
		);
		return $this->join_object($parameter);		
	}
	
	public function left_join_relation_images($type, $pk)
	{
		//Load
		$this->load->model(CONSTANT_PATH.'con_relation_images');
		//
		$parameter = array(
			"object"=>"relation_images",
			"fk"=>$this->con->pk,
			"join_on_rule"=> 
                "( ".$this->con_relation_images->pk_typename." IN ('".$type."') AND ".
                $this->con_relation_images->pk_typeid." IN (".$pk.") )"
            ,
			"join_column"=>$this->con_relation_images->pk_images,
			"join_method"=>"LEFT"
		);
		return $this->join_object($parameter);
	}
	
	
	//View Image By Data
	public function view_image($data, $is_thumb=FALSE)
	{
		//Load
		$this->load->model(CONSTANT_PATH.'con_lookup');
		//
		$thumb = "";
		if($is_thumb==TRUE):
			$thumb = "_thumb";
		endif;
		$view = base_url().$this->con->image_path.$data[$this->con_lookup->name]."/".$data[$this->con->pk]."_images".$thumb.".jpg";
		
		return $view;
	}
	
	
}

/* End of file */