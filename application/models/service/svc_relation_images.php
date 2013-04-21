<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Svc_relation_images extends Svc_root {
	
	public function __construct()
	{
		//Import
		$this->load->model(CONSTANT_PATH.'con_relation_images');
		$this->load->model(OBJECT_PATH.'obj_relation_images');
		//End
		parent::__construct();
	}
	
	public function insert($type, $pk, $pk_images)
	{
		$this->load->model(OBJECT_PATH.'obj_images');
		$this->load->model(CHECK_PATH.'chk_relation_images');
		//Class Variable
		$Con = new Con_relation_images;
		$Obj = new Obj_relation_images;
		$Chk = new Chk_relation_images;
		$Images = new Obj_images;
		//
		if($Chk->is_data_exist($type, $pk, $pk_images)==TRUE):
			$this->message = "Anda sudah memilih Gambar ini";
			return FALSE;
		endif;
        
        //Get Desc
        $imagedata = $Images->fetch()->query_by_pk($pk_images)->data_row();
		
		$data[$Con->pk_typename] = $type;
		$data[$Con->pk_typeid] = $pk;
		$data[$Con->pk_images] = $pk_images;
		$data[$Con->name] = $imagedata[$Images->con->name];
		$data[$Con->desc] = $imagedata[$Images->con->desc];
		$data[$Con->status] = 1;
		$data[$Con->order] = 1;
		$service = $Obj->fetch()->service()->insert_single($data);
		if($service):
			$this->message = "Pilih Gambar Berhasil";
		else:
			$this->message = "Pilih Gambar Gagal";
		endif;
		return $service;
	}
	
	public function update_by_pk($pk_article, $pk_images, $data)
	{
		//Class Variable
		$Obj = new Obj_relation_images;
		//End
		$service = $Obj->fetch()->service()->update_by_pk($pk_article, $pk_images, $data);
		if($service):
			$this->message = "Ubah Info Gambar Berhasil";
		else:
			$this->message = "Ubah Info Gambar Gagal";
		endif;
		return $service;
	}

	public function delete_by_pk($pk_article, $pk_images)
	{
		//Class Variable
		$Obj = new Obj_relation_images;
		//End
		$service = $Obj->fetch()->service()->delete_by_pk($pk_article, $pk_images);
		if($service):
			$this->message = "Hapus Gambar Berhasil";
		else:
			$this->message = "Hapus Gambar Gagal";
		endif;
		return $service;
	}
}

/* End of file */