<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Con_news extends Con_root {
	
	var $table				=		"citemplate_news";
	var $pk					=		"news_id_pk";
    var $name               =		"news_title";
    var $teaser             =		"news_teaser";
    var $keyword            =		"news_keyword";
    var $metadesc           =		"news_metadesc";
    var $content            =		"news_content";
    var $is_hot             =		"news_is_hot";
    var $status             =		"news_status";
    var $create_date        =		"news_create_date";
    var $create_by          =		"news_create_by";
	var $image_path			=		"";
	
	public function __construct()
	{
		parent::__construct();
		$this->image_path = files_path('news/');
	}
}

/* End of file */