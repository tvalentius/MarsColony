<?php

class Flashcontroller extends Front_Controller {
	
    var $password = "roulettemaniabymikhalbert";
    var $appversion = "1.0";
    
    //Message
    var $msg_errorapps    = "Maaf terjadi kesalahan pada Aplikasi, silahkan coba refresh halaman Anda";
    var $msg_wrongpass    = "Versi Aplikasi Anda masih yang lama, silahkan refresh ulang game Anda";
    var $msg_wrongversion = "Versi Aplikasi Anda masih yang lama, silahkan refresh ulang game Anda";
    var $msg_notlogin     = "Session Login Anda telah habis. Silahkan refresh ulang halaman Anda";
    var $msg_notactive     = "User Anda tidak aktif, silahkan hubungi Administrator";
    var $msg_lognotexist  = "Anda hanya boleh memainkan game ini di satu komputer / browser";
    var $msg_wrongtimerange = "Jeda permainan terlalu singkat, silahkan refresh ulang game anda";
    
	public function __construct()
	{
		parent::__construct();
        //Data
        $this->password = $this->syspar['APP_FLASH_PASSWORD'];
        $this->appversion = $this->syspar['APP_VERSION'];
        //Auth
        //if($data[0]!=$this->password): return $this->msg_wrongpass; endif;
        //if($data[1]!=$this->appversion): return $this->msg_wrongversion; endif;
		if($this->is_player_login==FALSE): return $this->msg_notlogin; endif;
		if($this->playerstatus==FALSE): return $this->msg_notactive; endif;
		//Import
		//End
	}

	/*
        Fetch The Userdata 


		Data to returned will be :
		
		'user_id'			: 	The current user's id
		'user_pic'			:	Picture of User
		'user_name'			:	Name of User
		'user_score'		:	Current Score of User
        'user_cash'        :   Current Cash of User
		'user_method'		:	User Method Login
		'user_ranking'	 	:	Ranking of User on LeaderBoard
		'user_position' 	:	Stage Position of User
		'session_id'		:	Current Session ID
		'current_date'		:	Current Date
	*/
	public function get_userdata($data="")
    {
		//Import
		$this->load->model(OBJECT_PATH.'obj_score');
        $this->load->model(OBJECT_PATH.'obj_cash');
		//Class
		$Score = new Obj_score;
        $Cash = new Obj_cash;

        //logger($data);
		//Check if User is Logged in
		if($this->is_player_login==FALSE):
			 return $this->msg_notlogin;
		else:
			//Fetch Total Score
			$scores = $Score->fetch()->select_player_total_point($this->player_id)->query()->data_row();
			if($scores):
				$totalscore = $scores[$Score->con->point];
			else:
				$totalscore = 0;
			endif;
            //Fetch Total Cash
            $cashes = $Cash->fetch()->select_player_total_point($this->player_id)->query()->data_row();
            if($scores):
                $totalcash = $cashes[$Cash->con->point];
            else:
                $totalcash = 0;
            endif;
			//Fetch Profile Picture
			$userpic = $this->FB->fbpropic;

			//Wrap it to Return Data Variable
			$data['user_id']		=	$this->player_id;
			$data['user_name']		=	$this->playername;
			$data['user_status']	=	$this->playerdata[$this->Player->con->status];
			$data['user_pic']		=	$userpic;
			$data['user_score'] 	=	$totalscore;
            $data['user_cash']     =   $totalcash;
			$data['curdate']		=	current_date();
			$data['timestamp']		=	strtotime(date('d-m-Y H:i:s'));
            logger($data);
			return $data;
			//
		endif;
    }


    /*
        
        Expected data
        $data[]
    */
    public function set_betlog($data="")
    {
        return "The data sent is : ".$data;
    }
	
    /*
        Data must sent to check
        $data[2] : Log Type
    */
    public function set_gamelog($data="")
    {
        //Dummy Data
        //$data[2] = 'game';
        //logger($data);
        //Import
        $this->load->model(OBJECT_PATH.'obj_gamelog');
        $this->load->model(CHECK_PATH.'chk_gamelog');
        $this->load->model(SERVICE_PATH.'svc_gamelog');
        //Class
        $Gamelog = new Obj_gamelog;
        $Chk = new Chk_gamelog;
        $Svc = new Svc_gamelog;
        //Check if there is pending log
        if($Chk->is_there_pending_log($this->player_id)):
            //Delete the existing pending log
            $Svc->delete_pending_log_by_fk_player($this->player_id);
        endif;
        
        //Create new log
        $insertdata[$Gamelog->con->fk_player] = $this->player_id;
        $insertdata[$Gamelog->con->type] = $data[2];
        $insertdata[$Gamelog->con->status] = 0;
        $do_insert = $Svc->insert($insertdata);
        if($do_insert):
            //Get PK of new pending log
            $pk = $Svc->pk_insert;

    		//Wrap it to Return Data Variable
            $data["pk_log"]    =    $pk;
            return $data;
        else:
            return "FALSE";
        endif;
    }
    
    /*
        Data must sent to check
        $data[2] : PK Gamelog
        $data[3] : Bet String

        Data to returned will be :
        
        'roulette_result'           :   result of the roulette
        'pk_log'           :   pk log of the result
    */
    public function get_roulette_result($data="")
    {
        //Set gamelog
        //logger($data);
        $temp_array = array();
        $temp_array[2] = "game";
        $gamelog_pk = $this->set_gamelog($temp_array);
        if(!$gamelog_pk) {
            return $this->msg_lognotexist;
        } else {
            $data[2] = $gamelog_pk["pk_log"];
        }

        //Load
        $this->load->model(OBJECT_PATH.'obj_gamelog');
        $this->load->model(SERVICE_PATH.'svc_gamelog');
        $this->load->model(CHECK_PATH.'chk_gamelog');
        
        $Gamelog = new Obj_gamelog;
        $Svc_gamelog = new Svc_gamelog;
        $Chk_gamelog = new Chk_gamelog;
        
        //Check if there is pending log
        if($Chk_gamelog->is_there_pending_log($this->player_id)===FALSE):
            return $this->msg_lognotexist;
        else:
            //Check if pending log ID match with game log
            $pk_log = $Gamelog->fetch()->filter_pending_log($this->player_id)->query()->data_pk();
            if($data[2] != $pk_log):
                return $this->msg_lognotexist;
            endif;
            
            $roulette_result = rand(1, 36);
            
            //Update to pending log
            $data_log[$Gamelog->con->note] = $data[3]."|result:".$roulette_result;
            $Gamelog->fetch()->service()->update_by_pk($pk_log, $data_log);
            
            //
            $data['pk_log']    =    $pk_log;
            $data['roulette_result'] = $roulette_result;
            
            return $data;
            
        endif;
    }
    
    /*
        Data must sent to check
        $data[2] : PK gamelog
        $data[3] : Result Type (Win or Lose)
        $data[4] : Score
        $data[5] : Cash
        $data[6] : Roulette Result
    */
    public function save_score_and_chip($data="")
    {
        //Dummy Data
        /*
        $data[2] = 22;
        $data[3] = 'lose';
        $data[4] = 300;
        $data[5] = 1000;
        */

        //Import
        $this->load->model(OBJECT_PATH.'obj_score');
        $this->load->model(SERVICE_PATH.'svc_score');
        $this->load->model(OBJECT_PATH.'obj_cash');
        $this->load->model(SERVICE_PATH.'svc_cash');
        $this->load->model(OBJECT_PATH.'obj_player');
        $this->load->model(SERVICE_PATH.'svc_player');
        $this->load->model(CHECK_PATH.'chk_player');
        $this->load->model(OBJECT_PATH.'obj_gamelog');
        $this->load->model(SERVICE_PATH.'svc_gamelog');
        $this->load->model(CHECK_PATH.'chk_gamelog');
        //Class
        $Score = new Obj_score;
        $Svc_score = new Svc_score;
        
        $Cash = new Obj_cash;
        $Svc_cash = new Svc_cash;
        
        $Player = new Obj_player;
        $Svc_player = new Svc_player;
        $Chk_player = new Chk_player;
        
        $Gamelog = new Obj_gamelog;
        $Svc_gamelog = new Svc_gamelog;
        $Chk_gamelog = new Chk_gamelog;
        
        //Check if there is pending log
        if($Chk_gamelog->is_there_pending_log($this->player_id)===FALSE):
            return $this->msg_lognotexist;
        else:
            
            //Check if pending log ID match with game log
            $pk_log = $Gamelog->fetch()->filter_pending_log($this->player_id)->query()->data_pk();
            if($data[2] != $pk_log):
                return $this->msg_lognotexist;
            endif;
            
            //Check if there is acceptable time range of submitting score between 10 seconds
            if($Chk_player->is_time_range_of_play_below($this->playerdata[$Player->con->play_date], 10)==FALSE):
                return $this->msg_wrongtimerange;
            endif;
            
            //Set Score Data
            $insertscore[$Score->con->fk_player] = $this->player_id;
            $insertscore[$Score->con->fk_log] = $pk_log;
            $insertscore[$Score->con->type] = $data[3];
            $insertscore[$Score->con->point] = $data[4];
            //Insert Score
            $result = $Svc_score->insert($insertscore);
            if($result):
            
                //Get total score of Player
                $totalscorearray = $Score->fetch()->select_player_total_point($this->player_id)->query()->data_row();
                $totalscore = $totalscorearray[$Score->con->point];
                //Update total score and lastplay of Player
                $updatescoreplayer[$Player->con->play_date] = current_datetime();
                $updatescoreplayer[$Player->con->score] = $totalscore;
                $Svc_player->update_by_pk($this->player_id, $updatescoreplayer);
                
            else:
                return $this->msg_errorapps;
            endif;
            
            //Set Cash Data
            $insertcash[$Cash->con->fk_player] = $this->player_id;
            $insertcash[$Cash->con->fk_log] = $pk_log;
            $insertcash[$Cash->con->type] = $data[3];
            //If lose, the point is minus
            if($data[3]=='lose'):
                $insertcash[$Cash->con->point] = "-".$data[5];
            else:
                $insertcash[$Cash->con->point] = $data[5];
            endif;
            //Insert Cash
            $result = $Svc_cash->insert($insertcash);
            if($result):
            
                $this->_update_cash_player($this->player_id);
                
            else:
                return $this->msg_errorapps;
            endif;
            
            //Update Pending Log to Success
            $updatelog[$Gamelog->con->status] = 1;
            $Svc_gamelog->update_by_pk($pk_log, $updatelog);
            
            return "SUCCESS";
            
        endif;
    }
}

/* End of File */