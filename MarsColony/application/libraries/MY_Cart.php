<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Cart extends CI_Cart {
	
	function MY_Cart()
	{
		parent::__construct();

	    $this->CI =& get_instance(); //this may not be required

	    $this->product_name_rules    = '\.\&\+\-_ a-z0-9\\\(\)\/,';
	}
}
/* End of file */