<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Svc_score extends Svc_root {
	
	public function __construct()
	{
		//Import
		$this->load->model(OBJECT_PATH.'obj_score');
		//End
		parent::__construct();
	}

	public function insert($data)
	{
		//Load
		$this->load->model(SERVICE_PATH.'svc_player');
		//Class Variable
		$Score = new Obj_score;
		$Svc_player = new Svc_player;
		//End
		$pk_player = $data[$Score->con->fk_player];
		$service = $Score->fetch()->service()->insert_single($data);
		if($service):
			$this->pk_insert = $Score->data_last_pk();
			$this->message = "Tambah score Berhasil";
		else:
			$this->message = "Tambah score Gagal";
		endif;
		return $service;
	}
}

/* End of file */