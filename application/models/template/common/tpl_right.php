 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tpl_right extends Tpl_root {

	var $data = array();
	var $info = "";
	
	public function __construct()
	{
	}
		
	function view()
	{
		return $this->load->view(folder_path($this->tpl_folder).'common/right', $this->data, TRUE);
	}
}

/* End of file */