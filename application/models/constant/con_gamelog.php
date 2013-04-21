<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Con_gamelog extends Con_root {
	
	var $table				=		"roulette_gamelog";
	var $pk					=		"gamelog_id_pk";
	var $fk_player			=		"gamelog_player_id_fk";
    var $type               =		"gamelog_type";
    var $note               =		"gamelog_note";
    var $status              =		"gamelog_status";
    var $create_date        =		"gamelog_create_date";
	
	public function __construct()
	{
		parent::__construct();
	}
}

/* End of file */