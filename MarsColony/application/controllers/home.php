<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends Front_Controller {

	public function __construct()
	{
		parent::__construct();
		//Import
		//End
	}

	public function index()
	{
		//First Action
		$this->_load_template();
		$this->tpl_root->roulette();

        $this->tpl_head->add_style('marscolony/home.css');

		//View
        if($this->is_player_login == FALSE):
    		$this->tpl_root->view('marscolony/login', $this->viewdata);
        else:
    		$this->tpl_root->view('marscolony/home', $this->viewdata);        
        endif;
	}
    
    public function logout()
    {
        $this->_clean_auth();
        redirect();
    }
    
    public function wall_reward()
    {
        //Auth
        $post_id = $this->input->post('post_id');
        if($post_id=="" || $this->is_from_ajax==FALSE): redirect(); endif;
        //Import
        $this->load->model(OBJECT_PATH.'obj_cash');
        $this->load->model(SERVICE_PATH.'svc_cash');
        $this->load->model(OBJECT_PATH.'obj_player');
        $this->load->model(SERVICE_PATH.'svc_player');
        $this->load->model(OBJECT_PATH.'obj_gamelog');
        $this->load->model(SERVICE_PATH.'svc_gamelog');
        //Class
        $Cash = new Obj_cash;
        $Svc_cash = new Svc_cash;
        
        $Player = new Obj_player;
        $Svc_player = new Svc_player;
        
        $Gamelog = new Obj_gamelog;
        $Svc_gamelog = new Svc_gamelog;
        //VariableX
        $max_reward_per_day = $this->syspar['WALL_REWARD_PER_DAY'];
        $reward_point = $this->syspar['WALL_REWARD_POINT'];
        //Check Maximum limit of reward
        $count_reward = $Cash->fetch()->filter_wall_reward()->query()->count_rows();
        if($count_reward >= $max_reward_per_day):
            //Nothing Happens if exceed
            echo json_encode("Maaf sudah kelewatan batas");
        else:
            //Insert Wall Reward Log
            $insertgamelog[$Gamelog->con->fk_player] = $this->player_id;
            $insertgamelog[$Gamelog->con->type] = "fbwall";
            $insertgamelog[$Gamelog->con->note] = "POSTID: ".$post_id;
            $insertgamelog[$Gamelog->con->status] = 1;
            $do_insert = $Svc_gamelog->insert($insertgamelog);
            if($do_insert):
                //Get PK of new pending log
                $pk_log = $Svc_gamelog->pk_insert;
                
                //Set Cash Data
                $insertcash[$Cash->con->fk_player] = $this->player_id;
                $insertcash[$Cash->con->fk_log] = $pk_log;
                $insertcash[$Cash->con->type] = "fbwall";
                $insertcash[$Cash->con->point] = $reward_point;
                //Insert Cash
                $result = $Svc_cash->insert($insertcash);
                if($result):
                
                    //Get total cash of Player
                    $totalcasharray = $Cash->fetch()->select_player_total_point($this->player_id)->query()->data_row();
                    $totalcashrewardarray = $Cash->fetch()->select_player_total_point($this->player_id, 'fbwall')->query()->data_row();
                    //Update total cash of Player
                    $updatecashplayer[$Player->con->cash] = $totalcasharray[$Cash->con->point];
                    $updatecashplayer[$Player->con->cashreward] = $totalcashrewardarray[$Cash->con->point];
                    $Svc_player->update_by_pk($this->player_id, $updatecashplayer);
                    
                    $msg = "Terimakasih Anda telah Post Wall";
                else:
                    $msg = "Terjadi Kesalahan Aplikasi. Reward Anda belum masuk";
                endif;
            else:
                $msg = "Terjadi Kesalahan Aplikasi. Reward Anda belum masuk";
            endif;
            echo json_encode($msg);
        endif;
    }
}

/* End of file */