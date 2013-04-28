<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Con_role_param extends Con_root {
	
	var $table				=		"citemplate_role_param";
	var $pk					=		"role_param_id_pk";	//PK
	var $fk_menu			=		"role_param_menu_id_fk";	//FK
	var $name				=		"role_param_name";
	var $desc				=		"role_param_desc";
	var $order				=		"role_param_order";
	var $parent				=		"role_param_parent";
	
	//Parameter Value

	//Access
	var $user_view			=		"101-1";
	var $user_insert		=		"101-2";
	var $user_update		=		"101-3";
	var $user_delete		=		"101-4";
	var $user_update_pass	=		"101-5";

	var $usergroup_view		=		"102-1";
	var $usergroup_insert	=		"102-2";
	var $usergroup_update	=		"102-3";
	var $usergroup_delete	=		"102-4";
	
	//System Administration
	var $lookup_view		=		"301-1";
	var $lookup_insert		=		"301-2";
	var $lookup_update		=		"301-3";
	var $lookup_delete		=		"301-4";

	var $audittrail_view	=		"302-1";

	var $sysparam_view		=		"303-1";
	var $sysparam_update	=		"303-2";

	//Information
	var $news_view			=		"201-1";
	var $news_insert		=		"201-2";
	var $news_update		=		"201-3";
	var $news_delete		=		"201-4";

	var $contactus_view		=		"202-1";
	var $contactus_update	=		"202-2";
    
	var $images_view	=		"203-1";
	var $images_update	=		"203-2";
    
    //Game
    var $player_view    =        "401-1";
    
    var $score_view    =        "402-1";

    var $cash_view    =        "403-1";

	public function __construct()
	{
		parent::__construct();
	}
}

/* End of file */