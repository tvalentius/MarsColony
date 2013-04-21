<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


// ------------------------------------------------------------------------

/**
 * Header Redirect Edited by Albert
 * This function is based on default CI function redirect(), with some new method.
 * Header redirect in two flavors
 * For very fine grained control over headers, you could use the Output
 * Library's set_header() function.
 *
 * @access	public
 * @param	string	the URL
 * @param	string	the method: location or redirect
 * @return	string
 */
if ( ! function_exists('redirect'))
{
	function redirect($uri = '', $method = 'location', $ext= '', $http_response_code = 302)
	{
		if ( ! preg_match('#^https?://#i', $uri))
		{
			$uri = site_url($uri);
		}
		
		switch($method)
		{
			case 'refresh'	: header("Refresh:0;url=".$uri.$ext);
				break;
			case 'back'		: echo '<script> history.go(-1); </script>';
				break;
			case 'previous'	: redirect($_SERVER['HTTP_REFERER']);
				break;
			case 'parent'	: 		if(strpos($ext,"#") !== false)
									{ $reload= 'self.parent.location.reload(true);';
									}else{ $reload ='';
									}echo "<script>self.parent.location.href = '".$uri.$ext."';
									".$reload."</script>";
				break;
			case 'self'		: echo "<script>self.parent.location.reload(true);</script>";
				break;
			default			: header("Location: ".$uri.$ext, TRUE, $http_response_code);
				break;
		}
		exit;
	}
}

// ------------------------------------------------------------------------

/**
 * Parse out the attributes
 *
 * Some of the functions use this
 *
 * @access	private
 * @param	array
 * @param	bool
 * @return	string
 */
if ( ! function_exists('_parse_attributes'))
{
	function _parse_attributes($attributes, $javascript = FALSE)
	{
		if (is_string($attributes))
		{
			return ($attributes != '') ? ' '.$attributes : '';
		}

		$att = '';
		foreach ($attributes as $key => $val)
		{
			if ($javascript == TRUE)
			{
				$att .= $key . '=' . $val . ',';
			}
			else
			{
				$att .= ' ' . $key . '="' . $val . '"';
			}
		}

		if ($javascript == TRUE AND $att != '')
		{
			$att = substr($att, 0, -1);
		}

		return $att;
	}
}


/* End of file  */