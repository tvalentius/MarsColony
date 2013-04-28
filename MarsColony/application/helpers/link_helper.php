<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

define('BUTTON_ADD','icon/add.png');
define('BUTTON_INFO','icon/info.png');
define('BUTTON_EDIT','icon/edit.png');
define('BUTTON_DELETE','icon/delete.png');

function link_button_image($link, $img, $attr='',$image_path=IMAGE_PATH){
	if(is_array($img)):
		$img['src'] = $image_path.$img['src'];
	else:
		$img = $image_path.$img;
	endif;
	return anchor($link,
		img($img),
		$attr
	);
}

function link_button_text($link, $title, $attr=array()){
	
	$default['class'] = 'button';
	$attr = array_merge($default, $attr);
	
	return anchor($link,
	$title,
	$attr
	);
}

function button_text($title, $onclick=''){
	return "<button class='button' onclick='".$onclick."'>".$title."</button>";
}

function button_link($href, $title, $onclick=''){
	return "<a href='".$href."' class='button' onclick='".$onclick."'>".$title."</a>";
}

function name_to_uri($name){
	
	$name = str_replace(' ','.',$name);		//Change space
	$name = str_replace(',','.',$name);		//Change comma
	$name = str_replace('?','',$name);		//Delete '?'
	$name = str_replace('!','',$name);		//Delete '!'
	$name = str_replace('&','.',$name);		//Delete '&'
	$name = str_replace('-','.',$name);		//Delete '-'
	$name = str_replace('+','.',$name);		//Delete '+'
	
	$name = strtolower($name);
	
	return $name;
}

function link_product_detail($id, $name){
	return base_url().'product/detail/'.$id.'/'.name_to_uri($name);
}

/*
End Of File
*/