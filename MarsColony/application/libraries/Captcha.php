<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Captcha {
	
	var $CI;
	var $table = 'captcha';
	
	
	function __construct(){
		$this->CI =& get_instance();
		$this->CI->load->helper('captcha');
	}
	
	function get()
	{
		$vals = array(
		'img_path'	 => files_path('captcha/'),
		'img_url'	 => files_path('captcha/',TRUE)
			);
		
		$cap = create_captcha($vals);
		
		$data = array(
		'captcha_time'	=> $cap['time'],
		'ip_address'	=> $this->CI->input->ip_address(),
		'word'	 => $cap['word']
		);
		
		$query = $this->CI->db->insert_string($this->table, $data);
		$this->CI->db->query($query);
		
		return $cap['image'];
	}
	
	function check()
	{
		// First, delete old captchas
		$expiration = time()-7200; // Two hour limit
		$this->CI->db->query("DELETE FROM captcha WHERE captcha_time < ".$expiration);	
		
		// Then see if a captcha exists:
		$sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
		$binds = array($this->CI->input->post('captcha'), $this->CI->input->ip_address(), $expiration);
		$query = $this->CI->db->query($sql, $binds);
		$row = $query->row();
		
		$this->CI->form_validation->set_message('check_captcha', lang('captcha_false'));

		if ($row->count == 0):
			return FALSE;
		else:
			return TRUE;
		endif;
	}
}

/* End of file */