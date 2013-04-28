<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Svc_news extends Svc_root {
	
	public function __construct()
	{
		//Import
		$this->load->model(CONSTANT_PATH.'con_news');
		$this->load->model(OBJECT_PATH.'obj_news');
		//End
		parent::__construct();
	}

	public function insert($data)
	{
		//Class Variable
		$News = new Obj_news;
		//End
		$data[$News->con->status] = 1;
		$service = $News->fetch()->service()->insert_single($data);
		if($service):
			$this->pk_insert = $News->data_last_pk();
			//Audittrail
			$this->audittrail("news","insert", $this->audit_value($this->pk_insert));
			//
			$this->message = "Input Berita Berhasil";
		else:
			$this->message = "Input Berita Gagal";
		endif;
		return $service;
	}
	
	public function update_by_pk($pk, $data)
	{
		//Class Variable
		$News = new Obj_news;
		//End
		$service = $News->fetch()->service()->update_by_pk($pk, $data);
		$news_row = $News->fetch()->query_by_pk($pk)->data_row();
		if($service):
			//Audittrail
			$this->audittrail("news","update", $this->audit_value($pk));
			//
			$this->message = "Ubah Berita :".$news_row[$News->con->name]." Berhasil";
		else:
			$this->message = "Ubah Berita :".$news_row[$News->con->name]." Gagal";
		endif;
		return $service;
	}

	public function update_status_by_pk($pk)
	{
		//Import
		$this->load->model(OBJECT_PATH.'obj_news');
		//Class Variable
		$News = new Obj_news;
		//
		$row = $News->fetch()->query_by_pk($pk)->data_row();
		if($row[$News->con->status]==0):
			$data[$News->con->status]=1;	$audit_action = "restore";
		else:
			$data[$News->con->status]=0;	$audit_action = "unactivate";	
		endif;
		$result = $News->fetch()->service()->update_by_pk($pk, $data);	
		if($result == TRUE):
			//Audittrail
			$this->audittrail("news",$audit_action, $this->audit_value($pk));
			//
			$this->message = "Ganti Status Berhasil";
		else:
			$this->message = "Ganti Status Gagal";
		endif;
		return $result;
	}

	public function update_is_hot_by_pk($pk)
	{
		//Import
		$this->load->model(OBJECT_PATH.'obj_news');
		//Class Variable
		$News = new Obj_news;
		//
		$row = $News->fetch()->query_by_pk($pk)->data_row();
		if($row[$News->con->status]==FALSE):
			$this->message = "Status Hot hanya untuk News yang Aktif";
			return FALSE;
		endif;
		$data[$News->con->is_hot]=1;
		$reset[$News->con->is_hot] = 0;
		$News->fetch()->service()->update_all($reset);	
		$result = $News->fetch()->service()->update_by_pk($pk, $data);	
		if($result == TRUE):
			//Audittrail
			$this->audittrail("news","update", $this->audit_value($pk)." set to Hot");
			//
			$this->message = "Ganti Status Hot Berhasil";
		else:
			$this->message = "Ganti Status Hot Gagal";
		endif;
		return $result;
	}
	
	public function upload_image_by_pk($pk)
	{
		//Import
		$this->load->library('image_lib');
		$this->load->library('upload');
		$this->load->model(OBJECT_PATH.'obj_news');
		$this->load->model(REQUEST_PATH.'req_news');
		//Class
		$News = new Obj_news;
		$Req = new Req_news;
		//Var
		$image_name = $pk."_news.jpg";
		$image_path = $News->con->image_path;

		$config['upload_path'] = $image_path;
		$config['allowed_types'] = 'jpg';
		$config['max_size']	= '2048';
		$config['max_width']  = '2048';
		$config['max_height']  = '2048';
		$config['file_name'] = $image_name;
		$config['overwrite'] = TRUE;
			
		$this->upload->initialize($config);
		
		if($this->upload->do_upload($Req->form_image)):
			//Create the rezised image
			$image = new CI_Image_lib;
			$config['image_library'] = 'gd2';
			$config['source_image']	= $image_path.$image_name;
			$config['maintain_ratio'] = TRUE;
			$config['quality'] = "100%";
			$config['width']	 = 640;
			$config['height']	 = 480;
			$image->initialize($config);
			if($image->resize() == FALSE):
				$this->message .= br().$image->display_errors();
			endif;
			
			//Create the thumbnail image
			$thumb = new CI_Image_lib;
			$config['image_library'] = 'gd2';
			$config['source_image']	= $image_path.$image_name;
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['width']	 = 200;
			$config['height']	= 150;
			$thumb->initialize($config);
			if($thumb->resize() == FALSE):
				$this->message .= br().$thumb->display_errors();
			endif;
			//End
		else:
			$this->message .= br().$this->upload->display_errors();
		endif;
	}

	private function audit_value($pk_news)
	{
		//Class Variable
		$News = new Obj_news;
		//Get Data
		$data = $News->fetch()->query_by_pk($pk_news)->data_row();
		//Set Value
		$value =
			"Title : ".$data[$News->con->name]."\n"
		;
		return $value;
	}
}

/* End of file */