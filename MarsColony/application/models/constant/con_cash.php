<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Con_cash extends Con_root {
	
	var $table				=		"roulette_cash";
	var $pk					=		"cash_id_pk";
	var $fk_player			=		"cash_player_id_fk";
    var $fk_log             =		"cash_log_id_fk";
    var $type               =		"cash_type";
    var $point              =		"cash_point";
    var $create_date        =		"cash_create_date";
	
	public function __construct()
	{
		parent::__construct();
	}
}

/* End of file */