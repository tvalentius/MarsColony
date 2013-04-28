<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Svc_images extends Svc_root {
	
	public function __construct()
	{
		//Import
		$this->load->model(CONSTANT_PATH.'con_images');
		$this->load->model(OBJECT_PATH.'obj_images');
		//End
		parent::__construct();
	}

	public function insert($data)
	{
		//Class Variable
		$Images = new Obj_images;
		//End
		$data[$Images->con->status] = 1;
		$service = $Images->fetch()->service()->insert_single($data);
		if($service):
			$this->pk_insert = $Images->data_last_pk();
			//Audittrail
			$this->audittrail("images","insert", $this->audit_value($this->pk_insert));
			//
			$this->message = "Input Gambar Berhasil";
		else:
			$this->message = "Input Gambar Gagal";
		endif;
		return $service;
	}
	
	public function update_by_pk($pk, $data)
	{
		//Class Variable
		$Images = new Obj_images;
		//End
		$service = $Images->fetch()->service()->update_by_pk($pk, $data);
		$images_row = $Images->fetch()->query_by_pk($pk)->data_row();
		if($service):
			//Audittrail
			$this->audittrail("images","update", $this->audit_value($pk));
			//
			$this->message = "Ubah Berita :".$images_row[$Images->con->name]." Berhasil";
		else:
			$this->message = "Ubah Berita :".$images_row[$Images->con->name]." Gagal";
		endif;
		return $service;
	}

	public function update_status_by_pk($pk)
	{
		//Import
		$this->load->model(OBJECT_PATH.'obj_images');
		//Class Variable
		$Images = new Obj_images;
		//
		$row = $Images->fetch()->query_by_pk($pk)->data_row();
		if($row[$Images->con->status]==0):
			$data[$Images->con->status]=1;	$audit_action = "restore";
		else:
			$data[$Images->con->status]=0;	$audit_action = "unactivate";	
		endif;
		$result = $Images->fetch()->service()->update_by_pk($pk, $data);	
		if($result == TRUE):
			//Audittrail
			$this->audittrail("images",$audit_action, $this->audit_value($pk));
			//
			$this->message = "Ganti Status Berhasil";
		else:
			$this->message = "Ganti Status Gagal";
		endif;
		return $result;
	}
	
	public function upload_image_by_pk($pk)
	{
		//Import
		$this->load->library('image_lib');
		$this->load->library('upload');
		$this->load->model(OBJECT_PATH.'obj_images');
		$this->load->model(REQUEST_PATH.'req_images');
		//Class
		$Images = new Obj_images;
		$Req = new Req_images;
		//Var
		$data = $Images->join_lookup_category()->fetch()->query_by_pk($pk)->data_row();
		$image_path = $Images->con->image_path;
		//Check if directory exists
		if( is_dir($image_path.$data[$Images->Lookup->con->name]) === FALSE):
			mkdir($image_path.$data[$Images->Lookup->con->name]);
		endif;
		$image_path = $image_path.$data[$Images->Lookup->con->name]."/";
		//Get Filename
		$filetype = pathinfo($_FILES[$Req->form_image]['name']);
		$image_name = $pk."_images.".$filetype['extension'];
		
		//Upload Configuration
		$config['upload_path'] = $image_path;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '4096';
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
			
			//Update Images Data
			$update[$Images->con->type] = $filetype['extension'];
			$Images->fetch()->service()->update_by_pk($pk, $update);
			
		else:
			$this->message .= br().$this->upload->display_errors();
		endif;
	}

	private function audit_value($pk_images)
	{
		//Class Variable
		$Images = new Obj_images;
		//Get Data
		$data = $Images->fetch()->query_by_pk($pk_images)->data_row();
		//Set Value
		$value =
			"Title : ".$data[$Images->con->name]."\n"
		;
		return $value;
	}
}

/* End of file */