<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Input extends CI_Input {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function post($index = NULL, $xss_clean = FALSE)
	{
		if(isset($_POST[$index]) == FALSE):
			return FALSE;
		else:
			return parent::post($index, $xss_clean);
		endif;
	}

}
/* End of file */