<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**

*/
class MY_Controller extends CI_Controller
{
	//Connect to Database?
	var $connect_db = TRUE;
	
	//Required Variable For File Location, Module chosen, and Menu chosen
	var $folder = array();
	var $module = '';
	var $method = '';
	var $current_url = '';
	var $current_path = '';
	var $link_path = '';
	var $menu_page = '';
	var $submenu_page = '';
	var $pk_menu_page;
	var $is_template = FALSE;
	var $ajax_page = FALSE;
	var $is_backend = FALSE;
	var $is_lang_url = FALSE;
	var $lang_abbr = FALSE;
	
	//User Authentication
	var $is_auth = FALSE;
	var $ChkAuth = FALSE;
	var $RoleParam = FALSE;
	
    //System Parameter
    var $syspar = array();
    
	//Variable that save session data of user that log in.
	var $is_user_login = FALSE;
	var $user_session = FALSE;
	var $userpk = FALSE;
	var $userdata = FALSE;
	var $userrole = FALSE;
	var $UserLogin = FALSE;
	
	//Variable for view
	var $viewdata;
	var $ajaxviewdata;
	
	//Variable for AJAX
	var $is_from_ajax;
	var $ajax_src_encode;
			
    function __construct()
    {
    	parent::__construct();
		//Constructor
		//Connect to Database?
		if($this->connect_db==TRUE): $this->load->database(); endif;
		//Load Common Language
		$this->lang->load('custom/common');
		$this->lang_abbr = $this->lang->lang_abbr;
		//Set Current Path
		$this->_set_current_path(); 
        //Set System Parameter Variable
        $this->_set_sysparam();
		//Post AJAX Data
		$this->_chenx_ajax();
		//Do you need authentication?
		if($this->is_auth==TRUE): $this->_setting_auth(); endif;
		//Set Default View Data
		$this->_set_viewdata();
	}
    
    private function _set_sysparam()
    {
		//Load
		$this->load->model(OBJECT_PATH.'obj_sysparam');
		//Class
		$Sysparam = new Obj_sysparam;
        //
		//View Data
		$result = $Sysparam->fetch()->query()->data_result();
        foreach($result as $row):
            $this->syspar[$row[$Sysparam->con->name]] = $row[$Sysparam->con->value];
        endforeach;
    }
	
	private function _setting_auth()
	{
		//Load
		$this->load->model(OBJECT_PATH.'obj_user');
		$this->load->model(OBJECT_PATH.'obj_relation_group_role');
		$this->load->model(OBJECT_PATH.'obj_role_param');
		$this->load->model(CHECK_PATH.'chk_auth');
		//Class
		$this->ChkAuth = new Chk_auth;
		$this->RoleParam = new Obj_role_param;
		$this->UserLogin = new Obj_user;
		$Relation = new Obj_relation_group_role;
		//Check if User is Logged In
		$this->is_user_login = $this->ChkAuth->is_user_login();
		if($this->is_user_login===TRUE):
			//Get Session Data
			$this->user_session = $this->session->user();
			//Set Global Class Variable
			//Set Logged In User Data
			$this->userpk = $this->user_session["id"];
			$this->userdata = $this->UserLogin->join_usergroup()->fetch()->query_by_pk($this->userpk)->data_row();
			//Get Role
			$Relation->join_role_param();
			$Relation->Role_param->join_menu();
			$this->userrole = $Relation->fetch()
				->query_by_pk_group($this->userdata[$this->UserLogin->con->fk_group])->data_result();
		endif;
	}
		
	//Basic Function to load template
	protected function _load_template()
	{
	 	$this->is_template = TRUE;
		$this->load->model(TEMPLATE_PATH.'tpl_root');
	}
	 	 
	//Checking function for CI Validation, to check captcha
	protected function _check_captcha()
	{
	 	$this->load->library('captcha');
		return $this->captcha->check();
	}
	
	//Set Current Path
	private function _set_current_path()
	{
		$this->current_url = full_url();
		$this->is_lang_url = $this->config->config['lang_ignore'];
		//Check if Language URL is needed
		if($this->is_lang_url==FALSE):
			$lang_abbr = $this->config->config['language_abbr'];
			$this->link_path = base_url().$lang_abbr.'/';
		else:
			$this->link_path = base_url();
		endif;
		//Menu and Submenu
		$this->menu_page = $this->uri->segment(1) == "0" ? "" :  $this->uri->segment(1);
		$this->submenu_page = $this->uri->segment(2) == "0" ? "" :  $this->uri->segment(2);
		//Module and Method
		$this->module = $this->router->class;
		$this->method = $this->router->method;
		//Folder Path
		$segment_array = $this->uri->segment_array();
		$flag = 1;
		foreach($segment_array as $segs):
			if($flag==1):
				if($this->is_lang_url==TRUE || strlen($segs)>2):
					if($segs!=$this->module):
						$this->folder[] = $segs;
					else:
						$flag=2;
					endif;
				endif;
			endif;
		endforeach;
		$this->current_path = folder_path($this->folder, $this->module);
		//
	}
	
	//Set Default View Data
	private function _set_viewdata()
	{	
		$this->viewdata['path'] = $this->current_path;
		$this->ajaxviewdata['path'] = $this->current_path;
	}
	
	//Function to Process AJAX value, if exist
	public function ajax_call()
	{
		$function = "_".$this->input->post(CHENX_AJAX_FUNCTION);
		$view = $this->$function();
		echo json_encode($view);		
	}
	
	//Function to Process Object value that called by AJAX to result HTML Option
	public function object_option_call()
	{
		$object = $this->input->post(CHENX_AJAX_OBJECT);
		$obj_name = "Obj_".$object;
		$this->load->model(OBJECT_PATH.$obj_name);
		$cond   = $this->input->post(CHENX_AJAX_CONDITION);
		$value = $this->input->post(CHENX_AJAX_VALUE);
		$key = $this->input->post(CHENX_AJAX_OBJECT_KEY)?$this->input->post(CHENX_AJAX_OBJECT_KEY) : "pk" ;
		$title = $this->input->post(CHENX_AJAX_OBJECT_TITLE)?$this->input->post(CHENX_AJAX_OBJECT_TITLE) : "name" ;
		$Obj = new $obj_name;
		$result = $Obj->fetch()->$cond($value)->query()->data_result();
		$option = array_to_option($result, $Obj->con->$key, $Obj->con->name);
		echo json_encode($option);
	}
	
	private function _chenx_ajax()
	{
		//Load Library
		$this->load->library('chenx_AJAX');
		//Check if this Request from AJAX
		$this->is_from_ajax		= isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
								  strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'
		;
		//Post AJAX FROM value
		$this->ajax_from		= $this->input->post(CHENX_AJAX_FROM);
		//Post AJAX page, return 1 if no AJAX Call.
		$this->ajax_page		= $this->input->post(CHENX_AJAX_PAGE)?$this->input->post(CHENX_AJAX_PAGE):1;
		//Post AJAX encoded search variable.
		$this->ajax_src_encode	= $this->input->post(CHENX_AJAX_SEARCH);
		//Post AJAX function to be called
		$this->ajax_function	= $this->input->post(CHENX_AJAX_FUNCTION);
	}
}

class Backend_Controller extends MY_Controller
{
	var $is_backend = TRUE;	
	var $is_auth = TRUE;
	var $connect_db = TRUE;
	
    function __construct()
    {
    	parent::__construct();
	}
}


class Front_Controller extends MY_Controller
{
	var $is_auth = FALSE;
	var $connect_db = TRUE;
	
	var $is_player_login = FALSE;
	var $player_session = FALSE;
    var $player_id = FALSE;
	var $playerdata = FALSE;
	var $playername = FALSE;
	var $player_method = FALSE;
    
    var $Player;
    var $FB;
	
	
	var $message_error = "";
	var $message_success = "";
	var $message_general = "";
	
    function __construct()
    {
    	parent::__construct();
		//Load
		$this->load->model(OBJECT_PATH.'obj_player');
		$this->load->model(OBJECT_PATH.'obj_facebook_user');
		//Class
        $this->Player = new Obj_player;
        //Set Facebook Data
        $this->FB = $this->obj_facebook_user;
		//Check Player Auth
		$this->_get_player_auth();
		//View Data (None for now)
	}
	
	private function _get_player_auth()
	{
		//Load
		$this->load->model(CHECK_PATH.'chk_auth');
		$this->load->model(OBJECT_PATH.'obj_player');
		//Class
		$Chk_auth = new Chk_auth;
		$Player = new Obj_player;
		//
		$this->is_player_login = $Chk_auth->is_player_login();
		if($this->is_player_login):
            $this->playerdata = $Player->fetch()->filter_fbid($this->FB->fbid)->query()->data_row();
            if($this->playerdata):
                $this->player_id = $this->playerdata[$Player->con->pk];
    			$this->playername = $this->playerdata[$Player->con->name];
    			$this->playerstatus = $this->playerdata[$Player->con->status];
            endif;
            /*
			$this->player_session = $this->session->player();
            $this->player_id = $this->player_session['id'];
			$this->playerdata = $Player->fetch()->query_by_pk($this->player_session['id'])->data_row();
			$this->playername = $this->playerdata[$Player->con->name];
            */
        else:
            if($this->FB->is_fb_login):
                $this->_clean_fb_auth();
                redirect();
            endif;
		endif;
		//
	}
    
    public function do_login_fb()
    {
        //Load
        $this->load->model(OBJECT_PATH.'obj_player');
        $this->load->model(CHECK_PATH.'chk_player');
        $this->load->model(SERVICE_PATH.'svc_player');
        $this->load->model(SERVICE_PATH.'svc_auth');
        
        $this->load->model(OBJECT_PATH.'obj_gamelog');
        $this->load->model(CHECK_PATH.'chk_gamelog');
        $this->load->model(SERVICE_PATH.'svc_gamelog');
        
        $this->load->model(OBJECT_PATH.'obj_cash');
        $this->load->model(SERVICE_PATH.'svc_cash');
        //Class
		$Obj = new Obj_player;
		$Chk = new Chk_player;
		$Svc = new Svc_player;
		$Svc_auth = new Svc_auth;
        
        $Gamelog = new Obj_gamelog;
        $Chk_log = new Chk_gamelog;
        $Svc_log = new Svc_gamelog;
        
        $Cash = new Obj_cash;
        $Svc_cash = new Svc_cash;
		//
        if($this->FB->is_fb_login):
            
            //Here, we authenticate if user has login with facebook but doesn't count as logged in,
			//then we save the user facebook data to table and create the session
			//But first, we must check if the user has already register or not
			if($Chk->is_player_fb_already_register($this->FB->fbid)==FALSE):

				$result = $Svc->insert_from_fb($this->FB->fbdata);

                //View Success if succeed, and Error if not.
                if($result):
                    $this->session->success($Svc->message);
                    //Insert Log
                    $insertdata[$Gamelog->con->fk_player] = $Svc->pk_insert;
                    $insertdata[$Gamelog->con->type] = "register";
                    $insertdata[$Gamelog->con->note] = "Registrasi pertama kali";
                    $insertdata[$Gamelog->con->status] = 0;
                    $do_insert = $Svc_log->insert($insertdata);
                    //Add First Cash
                    $insertcash[$Cash->con->fk_player] = $Svc->pk_insert;
                    $insertcash[$Cash->con->fk_log] = $Svc_log->pk_insert;
                    $insertcash[$Cash->con->type] = "win";
                    $insertcash[$Cash->con->point] = 1000;
                    //Insert Cash
                    $result = $Svc_cash->insert($insertcash);
                    if($result):
                        //Update Cash Player
                        $this->_update_cash_player($Svc->pk_insert);
                        //Update Pending Log to Success
                        $updatelog[$Gamelog->con->status] = 1;
                        $Svc_log->update_by_pk($Svc_log->pk_insert, $updatelog);
                    endif;
                
                else:    $this->session->error($Svc->message);
                endif;
				//
			endif;
            
			//Set The Player Session from Facebook
			/*$row = $this->Player->fetch()->filter_fbid($this->FB->fbid)->query()->data_row();
			$this->player_id = $row[$this->Player->con->pk];
			$this->is_player_login = TRUE;
			$this->player_method = 'fb';
			$Svc->update_login_date($this->player_id);
			$Svc_auth->set_player_auth($row);*/
            
        endif;
        redirect();
    }
        
    private function _update_cash_player($pk_player)
    {
        //Import
        $this->load->model(OBJECT_PATH.'obj_cash');
        $this->load->model(OBJECT_PATH.'obj_player');
        $this->load->model(SERVICE_PATH.'svc_player');
        
        //Class
        $Cash = new Obj_cash;
        $Player = new Obj_player;
        $Svc_player = new Svc_player;
        
    	//Get total cash of Player
    	$totalcasharray = $Cash->fetch()->select_player_total_point($pk_player)->query()->data_row();
    	$totalcashwinarray = $Cash->fetch()->select_player_total_point($pk_player, 'win')->query()->data_row();
    	$totalcashlosearray = $Cash->fetch()->select_player_total_point($pk_player, 'lose')->query()->data_row();
    	$totalcashrewardarray = $Cash->fetch()->select_player_total_point($pk_player, 'fbwall')->query()->data_row();
    	//Update total cash of Player
    	$updatecashplayer[$Player->con->cash] = $totalcasharray[$Cash->con->point];
    	$updatecashplayer[$Player->con->cashwin] = $totalcashwinarray[$Cash->con->point];
    	$updatecashplayer[$Player->con->cashlose] = $totalcashlosearray[$Cash->con->point];
    	$updatecashplayer[$Player->con->cashreward] = $totalcashrewardarray[$Cash->con->point];
    	$Svc_player->update_by_pk($pk_player, $updatecashplayer);
    }
    
	protected function _clean_auth()
	{
		//Load
		$this->load->model(SERVICE_PATH.'svc_login');
		//
		$Svc_login = new Svc_login;
		//
		$Svc_login->logout();
        $this->_clean_fb_auth();
		//
	}
    
    protected function _clean_fb_auth()
    {
        $this->facebook->destroySession();
    }
}
/* End of file */