<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Con_player extends Con_root {
	
	var $table				=		"roulette_player";
	var $pk					=		"player_id_pk";
	var $fbid				=		"player_fbid";
    var $name               =		"player_firstname";
    var $lastname           =		"player_lastname";
    var $email              =		"player_email";
    var $city               =		"player_city";
    var $score              =		"player_score";
    var $cash               =		"player_cash";
    var $cashwin            =		"player_cashwin";
    var $cashlose           =		"player_cashlose";
    var $cashreward         =		"player_cashreward";
    var $status             =		"player_status";
    var $login_date         =		"player_logindate";
    var $play_date          =		"player_playdate";
    var $create_date        =		"player_joindate";
	
	public function __construct()
	{
		parent::__construct();
	}
}

/* End of file */