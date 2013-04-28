<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alias {

	var $CI;
		

	function __construct(){
		$this->CI =& get_instance();
	}
	
	function status($var) {
		switch($var):
		
			case 0	: return lang('status_inactive');
			case 1	: return lang('status_active');
		
		endswitch;
	}

	function yes_or_no($var) {
		switch($var):
		
			case 0	: return lang('no');
			case 1	: return lang('yes');
		
		endswitch;
	}

}

/* End of file */