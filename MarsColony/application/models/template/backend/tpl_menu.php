<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tpl_menu extends Tpl_root {
	
	var $data = array();
	
	public function __construct()
	{
		//Import Needed Source
		$this->load->model(OBJECT_PATH.'obj_menu');
		//End Import
	}
			
	function view()
	{
		$list_menu = array();
		if($this->is_backend==TRUE):
			$list_menu = $this->list_menu_admin();
		endif;
		//View
		$this->data['list_menu']	=	$list_menu;
		return $this->load->view(folder_path($this->tpl_folder).'backend/menu', $this->data, TRUE);
	}
	
	private function list_menu_admin()
	{
		//Class and Variable
		$Menu = new Obj_menu;
		$list = array();
		$flag = 0;
		//Get All Menu
		$result = $Menu->join_parent()->fetch()->filter_admin()->select_name_link()->query()->data_result();
		//Get Authenticated Menu
		$auth_menu = array();
		if($this->is_auth==TRUE):
			foreach($this->userrole as $role):
				$auth_menu[$role[$Menu->con->fk_parent]] = $role[$Menu->con->fk_parent];
				$auth_menu[$role[$this->RoleParam->con->fk_menu]] = $role[$this->RoleParam->con->fk_menu];
			endforeach;
		endif;
		//
		foreach($result as $row):
			if(isset($auth_menu[$row[$Menu->con->pk]]) || $row[$Menu->con->pk]==$Menu->con->home_pk):
				if($row[$Menu->con->link]=="#"):
					$link = $_SERVER['REQUEST_URI']."#";
				else:
					$link = $this->link_path.$row[$Menu->con->link];
				endif;
				if(strpos($this->current_path,$row[$Menu->con->link])!==FALSE):
					$active = TRUE;
				else:
					$active = FALSE;
				endif;
				$content = array(
					"title"=>$row[$Menu->con->name],
					"link" =>$link,
					"active"=>$active
				);
				
				if($row[$Menu->con->fk_parent.".".$Menu->con->name]==FALSE):
					$list[$row[$Menu->con->pk]] = $content;
				else:
					$list[$row[$Menu->con->fk_parent]]["child"][] = $content;
				endif;
			endif;
		endforeach;
		/*	Format Example
		$list[]	=	array("title"=>"Home", "link"=>base_url("backend/home"));
		$list[] =	array(
						"title"=>"Products", "link"=>"#", "child"=>array(
							array("title"=>"Product 1","link"=>"#"),
							array("title"=>"Product 2","link"=>"#")
						)
		);
		$list[] =	array("title"=>"About Us","link"=>"#");
		*/
		return $list;
	}
}

/* End of file */