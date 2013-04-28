<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation {

	
	public function __construct()
	{
		parent::__construct();
		$this->CI->load->language('form_validation_ext');
	}
	
	/**
	  * Generic callback used to call callback methods for form validation.
	  * 
	  * @param string
	  *        - the value to be validated
	  * @param string
	  *        - a comma separated string that contains the model name, method name
	  *          and any optional values to send to the method as a single parameter.
	  *          First value is the name of the model.
	  *          Second value is the name of the method.
	  *          Any additional values are values to be send in an array to the method. 
	  *
	  *      EXAMPLE RULE:
	  *  external_callbacks[some_model,some_method,some_string,another_string]
	  */
	 public function external_callbacks( $postdata, $param )
	 {
	 	$param_values = explode( ',', $param ); 
	
	 	// Make sure the model is loaded
	 	$model = $param_values[0];
	 	$this->CI->load->model( $model );
	
	 	// Rename the second element in the array for easy usage
	 	$method = $param_values[1];
	
		// Check to see if there are any additional values to send as an array
		if( count( $param_values ) > 2 )
		{
			// Remove the first two elements in the param_values array
			array_shift( $param_values );
			array_shift( $param_values );
			$argument = $param_values;
		}
	
	  	// Do the actual validation in the external callback
	  	if( isset( $argument ) )
	  	{
	   		$callback_result = $this->CI->$model->$method( $postdata, $argument );
	 	}
	 	else
	  	{
	   		$callback_result = $this->CI->$model->$method( $postdata );
	  	}
	
		return $callback_result;
	}
	
	public function dropdown_required($str) {
		
		if ( ! preg_match( '/^[0-9]+$/', $str))
		{
			return FALSE;
		}

		if ($str == 0)
		{
			return FALSE;
		}
		return TRUE;
	}

	public function mysql_datetime($str) {
		
		if (strtotime($str))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	public function from_post($str)
	{
		if($str=="frompost"):
			return TRUE;
		else:
			return FALSE;
		endif;
	}
	
	public function file_required($str)
	{
		$data = $_FILES[$str];
		if($data['name']==""):
			return FALSE;
		else:
			return TRUE;		
		endif;		
	}
}
/* End of file */