<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Svc_gamelog extends Svc_root {
	
	public function __construct()
	{
		//Import
		$this->load->model(CONSTANT_PATH.'con_gamelog');
		$this->load->model(OBJECT_PATH.'obj_gamelog');
		//End
		parent::__construct();
	}
    
    public function insert($data)
    {
		//Class Variable
		$Gamelog = new Obj_gamelog;
        //Insert by data submitted
        $result = $Gamelog->fetch()->service()->insert_single($data);
        if($result):
            $this->pk_insert = $Gamelog->data_last_pk();
            $this->message = "Tambah Gamelog berhasil";
        else:
            $this->message = "Tambah Gamelog gagal";
        endif;
        return $result;
    }
		
	public function update_by_pk($pk, $data)
	{
		//Class Variable
		$Gamelog = new Obj_gamelog;
		$service = $Gamelog->fetch()->service()->update_by_pk($pk, $data);
		if($service):
			$this->message = "Ubah Gamelog Berhasil";
		else:
			$this->message = "Ubah Gamelog Gagal";
		endif;
		return $service;
	}

	public function delete_by_pk($pk)
	{
		//Class Variable
		$Gamelog = new Obj_gamelog;
		$result = $Gamelog->fetch()->service()->delete_by_pk($pk);
		if($result == TRUE):
			$this->message = "Hapus Gamelog berhasil";
		else:
			$this->message = "Hapus Gamelog gagal";
		endif;
		return $result;
	}
    
    public function delete_pending_log_by_fk_player($fk)
    {
		//Class Variable
		$Gamelog = new Obj_gamelog;
        $result = $Gamelog->fetch()->service()->delete_pending_log_by_fk_player($fk);
		if($result == TRUE):
			$this->message = "Hapus Gamelog berhasil";
		else:
			$this->message = "Hapus Gamelog gagal";
		endif;
		return $result;
    }
}

/* End of file */