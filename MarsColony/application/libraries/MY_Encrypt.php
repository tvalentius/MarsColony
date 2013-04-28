<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Encrypt extends CI_Encrypt {
	
	var $CI;
	
	public function __construct()
	{
		parent::__construct();
		$this->CI =& get_instance();
	}
	
	public function array_to_string($var)
	{
		$var = json_encode($var);
		return $var;
	}
	
	public function string_to_array($var)
	{
		$var = json_decode($var, TRUE);
		return $var;
	}

	public function encode_array($variable)
	{
		//$this->CI->logger->message("Array to encode : ".print_r($variable,TRUE));
		$variable = $this->array_to_string($variable);
		$variable = $this->encode($variable);
		//$this->CI->logger->message("Encode to : ".$variable);
		$variable = urlencode($variable);
		//$this->CI->logger->message("Encode string : ".$variable);
		
		return $variable;		
	}
	
	public function decode_array($variable)
	{
		//$this->CI->logger->message("Decode String : ".$variable);
		//$variable = urldecode($variable);
		$variable = $this->decode($variable);
		$variable = $this->string_to_array($variable);
		//$this->CI->logger->message("String to Array : ".print_r($variable,TRUE));
		
		return $variable;		
	
	}
}
/* End of file */