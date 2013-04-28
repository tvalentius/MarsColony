<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Con_score extends Con_root {
	
	var $table				=		"roulette_score";
	var $pk					=		"score_id_pk";
	var $fk_player			=		"score_player_id_fk";
    var $fk_log             =		"score_log_id_fk";
    var $type               =		"score_type";
    var $point              =		"score_point";
    var $create_date        =		"score_create_date";
	
	public function __construct()
	{
		parent::__construct();
	}
}

/* End of file */