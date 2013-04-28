<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Svc_cash extends Svc_root {
	
	public function __construct()
	{
		//Import
		$this->load->model(OBJECT_PATH.'obj_cash');
		//End
		parent::__construct();
	}

	public function insert($data)
	{
		//Load
		$this->load->model(SERVICE_PATH.'svc_player');
		//Class Variable
		$Cash = new Obj_cash;
		$Svc_player = new Svc_player;
		//End
		$pk_player = $data[$Cash->con->fk_player];
		$service = $Cash->fetch()->service()->insert_single($data);
		if($service):
			$this->pk_insert = $Cash->data_last_pk();
			$this->message = "Tambah cash Berhasil";
		else:
			$this->message = "Tambah cash Gagal";
		endif;
		return $service;
	}
}

/* End of file */