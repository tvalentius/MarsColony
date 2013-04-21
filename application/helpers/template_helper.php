<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

function box_desc($data)
{
	return '<div class="box_desc">'.$data.'</div>';
}

function box_comment($data)
{
	return '<div class="box_comment">'.$data.'</div>';
}

function form_note($data)
{
	return '<span class="font_style1">'.$data.'</span>';
}

function par($data)
{
	return '<p>'.$data.'</p>';
}

function logger($var)
{
	$CI =& get_instance();
	if(is_array($var)):
		$CI->logger->arrays($var);
	elseif(is_object($var)):
		$CI->logger->arrays($var);
	else:
		$CI->logger->message($var);	
	endif;
	return;
}
/*
End Of File
*/