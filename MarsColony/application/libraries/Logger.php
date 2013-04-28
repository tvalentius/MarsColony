<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logger {
	
	var $CI;
	var $filename = "logs.txt";
	var $logger_on = TRUE;
	
	public function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->helper('file');
		//write_file(logger_path($this->filename), '','w+');
		//$this->message('---------------------------- START --------------------------------------');
	}
	
	public function __destruct()
	{
		//$this->message('---------------------------- FINISH --------------------------------------');	
	}
	
	private function time_get()
	{
		return date('d-m-y h:i:s');
	}
	
	public function db_desc($query,$desc='',$log = TRUE)
	{
		if($query == TRUE):
			$msg = 'Success';
		else:
			$msg = 'Fail';
		endif;
		
		if($log == TRUE):
			$log_msg = '
Database
Desc : '.$desc.'
Result : '.$msg.',
Query :
'.$this->CI->db->last_query().'
'
			;
			$this->write($log_msg);		
		endif;
	}
	
	public function db_get($desc='',$log = FALSE)
	{
		$query = $this->CI->db->get();
		$this->db_desc($query, $desc,$log);
		return $query;
	}
	
	public function db_insert($table, $data, $desc='',$log=FALSE)
	{
		$query = $this->CI->db->insert($table, $data);
		$this->db_desc($query, $desc,$log);
		return $query;
	}

	public function db_update($table, $data, $desc='',$log=FALSE)
	{
		$query = $this->CI->db->update($table,$data);
		$this->db_desc($query, $desc,$log);
		return $query;
	}
	
	public function db_delete($table, $desc='',$log=FALSE)
	{
		$query = $this->CI->db->delete($table);
		$this->db_desc($query, $desc,$log);
		return $query;
	}
	
	public function message($var, $log=TRUE)
	{
		if($log == TRUE):
			$this->write('
'.			'Message : '.$var);
		endif;
	}

	public function arrays($var, $log=TRUE)
	{
		if($log == TRUE):
			$this->write('
'.			'Array : '.print_r($var,TRUE));
		endif;
	}

	public function last_query($var, $log=TRUE)
	{
		if($log == TRUE):
		$this->write('
Message : '.$var.'
Query : '.$this->CI->db->last_query().'
');
		endif;
	}
	
	private function write($var)
	{
		if($this->logger_on == TRUE):
			$var = '
			Time : '.$this->time_get().$var;
			write_file(logger_path($this->filename), $var,'a+');
		endif;
	}
	
}

/* End of file */