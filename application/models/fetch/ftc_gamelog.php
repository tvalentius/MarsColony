<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ftc_gamelog extends Ftc_root {
	
	public function __construct($Obj=FALSE)
	{
		//Import Needed Model
		$this->load->model(QUERY_PATH.'qry_gamelog');
		//End Import
		parent::__construct(new Qry_gamelog($Obj), $Obj);
	}

	public function filter_pending_log($fk_player)
	{
		$this->qry->where[] = $this->qry->fk_player($fk_player);
		$this->qry->where[] = $this->qry->status(0);
		return $this;
	}
}

/* End of file */