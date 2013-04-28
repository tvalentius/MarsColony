<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Obj_relation_group_role extends Obj_root {
	
	public function __construct($Obj=FALSE)
	{
		//Import
		$this->load->model(CONSTANT_PATH.'con_relation_group_role');
		$this->load->model(FETCH_PATH.'ftc_relation_group_role');
		//
		parent::__construct($Obj);
		$this->con = new Con_relation_group_role;
		$this->ftc = new Ftc_relation_group_role($this);
	}
	
	//Join
	public function join_role_param()
	{
		$parameter = array(
			"object"=>"role_param",
			"fk"=>$this->con->pk_role
		);
		return $this->join_object($parameter);
	}

	public function right_join_role_param_by_group($pk_group)
	{
		$parameter = array(
			"object"=>"role_param",
			"fk"=>$this->con->pk_role,
			"join_on_rule"=>$this->con->pk_group."=".$pk_group,
			"join_method"=>"RIGHT"
		);
		return $this->join_object($parameter);
	}
	
	//Data
	public function data_treecheckbox_array()
	{
		//Get the Result of Query
		$role = $this->data_result();
		//Set the Empty Checkbox Variable
		$arr_checkbox = array();
		//Lets Roll!
		foreach($role as $role):
			//Simplify the variable by saving it to temporary variable
			$pk = $role[$this->con_role_param->pk];
			$fk_submenu = $role[$this->con_role_param->fk_menu];
			$parent = $role[$this->con_role_param->parent];
			$title = $role[$this->con_role_param->name];
			$desc = $role[$this->con_role_param->desc];
			$title = "<span style='cursor:pointer' title='".$desc."'>".$title."</span>";
			//Check it if it's set or not
			$checked = isset($role[$this->con->pk_role]) && !(empty($role[$this->con->pk_role])) ? TRUE : FALSE;
			
			//If This is the Top
			if($parent==0):
				$arr_checkbox[$fk_submenu]["value"] = $pk;
				$arr_checkbox[$fk_submenu]["title"] = $title;
				$arr_checkbox[$fk_submenu]["checked"] = $checked;
			//If Not
			else:
				//If the child has parent
				if(isset($arr_checkbox[$fk_submenu]["child"][$parent])):
					$arr_checkbox[$fk_submenu]["child"][$parent]["child"][$pk]["value"] = $pk;
					$arr_checkbox[$fk_submenu]["child"][$parent]["child"][$pk]["title"] = $title;
					$arr_checkbox[$fk_submenu]["child"][$parent]["child"][$pk]["checked"] = $checked;
				//If not
				else:
					$arr_checkbox[$fk_submenu]["child"][$pk]["value"] = $pk;
					$arr_checkbox[$fk_submenu]["child"][$pk]["title"] = $title;
					$arr_checkbox[$fk_submenu]["child"][$pk]["checked"] = $checked;
				endif;
			endif;
		endforeach;
		return $arr_checkbox;		
	}
}

/* End of file */