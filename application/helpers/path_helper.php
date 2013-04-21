<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

define('CSS_PATH',base_url().'assets/css/');
define('IMAGE_PATH',base_url().'assets/images/');
define('JS_PATH',base_url().'assets/js/');

define('APP_PATH','./application/');
define('FILE_PATH','assets/files/');

define('CONSTANT_PATH','constant/');
define('REQUEST_PATH','request/');
define('OBJECT_PATH','object/');
define('QUERY_PATH','query/');
define('TABLE_PATH','table/');
define('FORM_PATH','form/');
define('SERVICE_PATH','service/');
define('FETCH_PATH','fetch/');
define('CHECK_PATH','check/');
define('TEMPLATE_PATH','template/');

function full_url()
{
    $s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : "";
    $sp = strtolower($_SERVER["SERVER_PROTOCOL"]);
    $protocol = substr($sp, 0, strpos($sp, "/")) . $s;
    $port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]);
    $host = (isset($_SERVER['HTTP_HOST']) && !empty($_SERVER['HTTP_HOST']))? $_SERVER['HTTP_HOST']:$_SERVER['SERVER_NAME'];
    return $protocol . "://" . $host . $port . $_SERVER['REQUEST_URI'];
}

function style($file) {
	$path = CSS_PATH;
	return '<link rel="stylesheet" href="'. $path . $file .'" type="text/css" media="screen" />';
}

function script($file) {
	$path = JS_PATH;
	return '<script src="'. $path . $file .'" type="text/javascript" charset="utf-8"></script>';
}

function image($name, $path='', $attr='') {
	$attr['src'] = $path.$name;
	return img($attr);
}

function files_path($file,$base=FALSE) {
	if($base == FALSE):
		$path = './'.FILE_PATH;
	else:
		$path = base_url().FILE_PATH;
	endif;
	return $path.$file;
}

function logger_path($file) {
	$path = APP_PATH.'logs/';
	return $path.$file;
}

function folder_path($folder, $module='') {
	$path = '';
	foreach($folder as $folder):
		$path .= $folder.'/';
	endforeach;
	
	if($module):
		return $path.$module.'/';
	else:
		return $path;
	endif;
}

/*
End Of File
*/