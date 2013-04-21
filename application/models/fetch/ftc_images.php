<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ftc_images extends Ftc_root {
	
	public function __construct($Obj=FALSE)
	{
		//Import Needed Model
		$this->load->model(QUERY_PATH.'qry_images');
		//End Import
		parent::__construct(new Qry_images($Obj), $Obj);
	}

	public function filter_search($data)
	{
		$this->qry->where[] = $this->qry->name($data[$this->con->name],"like");
		$this->qry->where[] = $this->qry->fk_lookup_category($data[$this->con->fk_lookup_category], "if");
		$this->qry->where[] = $this->qry->status($data[$this->con->status]);
		$this->qry->order[] = array($this->con->create_date, 'DESC');
		return $this;
	}
	
	public function filter_recent()
	{
		$this->qry->order[] = array($this->con->create_date, 'DESC');
		$this->qry->where[] = $this->qry->status(TRUE);
		return $this;
	}
	public function filter_category($fk_subcat)
	{
		$this->qry->where[] = $this->qry->fk_lookup_category($fk_subcat);
		$this->qry->where[] = $this->qry->status(TRUE);
		$this->qry->order[] = $this->qry->order_create_date();
		return $this;
	}
	
	public function filter_home()
	{
		$this->qry->where[] = $this->qry->status(TRUE);
		$this->qry->order[] = $this->qry->order_create_date();
		return $this;
	}
	
	public function filter_search_keyword($keyword)
	{
		$key = explode(" ",$keyword);
		foreach($key as $key):
			$this->qry->where[] = $this->qry->keyword($key);	
		endforeach;
		$this->qry->where[] = $this->qry->status(TRUE);
		$this->qry->order[] = $this->qry->order_create_date();
		return $this;
	}
}

/* End of file */