<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

function array_to_option($array, $value_parameter=TRUE, $all=FALSE, $select=0)
{
	$option = '';
	if($all==TRUE):
		if($all=="") $all = " - All - ";
		$option .= "<option value=0>".$all."</option>";
	endif;
	foreach($array as $key=>$data):
		if(is_array($value_parameter)):
			$opt_value = $data[$value_parameter[0]];
			$opt_title = $data[$value_parameter[1]];
		else:
			$opt_value = $key;
			$opt_title = $data;
		endif;
		if($select==$opt_value):
			$selected = "selected";
		else:
			$selected = "";
		endif;
		$option .= "<option ".$selected." value='".$opt_value."'>".$opt_title."</option>"; 		
	endforeach;	
	return $option;
}

function default_value($value, $then)
{
	if($value === FALSE):
		return $then;
	elseif($value == '0'):
		return '0';
	else:
		return $value;
	endif;
}

function default_post($postname, $then)
{
	if($_POST == TRUE):
		if(isset($_POST[$postname])==FALSE):
			return FALSE;
		else:
			return $_POST[$postname];
		endif;
	else:
		return $then;
	endif;
}
function default_date($value, $then='-Date Undefined-')
{
	if($value === '0000-00-00 00:00:00'):
		return $then;
	elseif($value == '0'):
		return '0';
	else:
		return $value;
	endif;
}

function current_datetime()
{
	return date('Y-m-d H:i:s');
}

function current_date()
{
	return date('Y-m-d');
}

function minus_date($var=FALSE, $tipe="day")
{
	if($var==TRUE):
		switch($tipe):
			case "day"	:
				$date = date('Y-m-d',strtotime('-'.$var.' days'));			
			break;
		endswitch;
		return $date;
	else:
		return current_date();
	endif;
}

function convert_mysql_date_format($date, $format='d F Y')
{
	$timestamp = strtotime($date);
	$date = date($format, $timestamp);
	
	return $date;
}

function convert_mysql_time_format($date, $format='H:i')
{
	$timestamp = strtotime($date);
	$date = date($format, $timestamp);
	
	return $date;
}

/* Works out the time since the entry post, takes a an argument in unix time (seconds) */
function time_since($original) {
	$original = strtotime($original);
    // array of time period chunks
    $chunks = array(
        array(60 * 60 * 24 * 365 , 'year'),
        array(60 * 60 * 24 * 30 , 'month'),
        array(60 * 60 * 24 * 7, 'week'),
        array(60 * 60 * 24 , 'day'),
        array(60 * 60 , 'hour'),
        array(60 , 'minute'),
    );
    
    $today = time(); /* Current unix time  */
    $since = $today - $original;
    
    // $j saves performing the count function each time around the loop
    for ($i = 0, $j = count($chunks); $i < $j; $i++) {
        
        $seconds = $chunks[$i][0];
        $name = $chunks[$i][1];
        
        // finding the biggest chunk (if the chunk fits, break)
        if (($count = floor($since / $seconds)) != 0) {
            // DEBUG print "<!-- It's $name -->\n";
            break;
        }
    }
    
    $print = ($count == 1) ? '1 '.$name : "$count {$name}s";
    
    if ($i + 1 < $j) {
        // now getting the second item
        $seconds2 = $chunks[$i + 1][0];
        $name2 = $chunks[$i + 1][1];
        
        // add second item if it's greater than 0
        if (($count2 = floor(($since - ($seconds * $count)) / $seconds2)) != 0) {
            $print .= ($count2 == 1) ? ', 1 '.$name2 : ", $count2 {$name2}s";
        }
    }
    return $print;
}

function format_money($value, $curr='indonesia')
{
	switch($curr):
		case 'indonesia'	:	return "Rp ".number_format($value,0,',','.');
	endswitch;	
}

function format_weight($value, $case='kg')
{
	switch($case):
		case 'kg'	:	return  $value.' kg';
	endswitch;	
}

function simplify_string($var)
{
	$var = strtolower($var);
	$var = str_replace(" ","",$var);
	return $var;
}

function sluggify($url)
{
    # Prep string with some basic normalization
    $url = strtolower($url);
    $url = strip_tags($url);
    $url = stripslashes($url);
    $url = html_entity_decode($url);

    # Remove quotes (can't, etc.)
    $url = str_replace('\'', '', $url);

    # Replace non-alpha numeric with hyphens
    $match = '/[^a-z0-9]+/';
    $replace = '-';
    $url = preg_replace($match, $replace, $url);

    $url = trim($url, '-');

    return $url;
}

function strip_title($title, $char=25, $alt=TRUE)
{
	$len_title = strlen($title);
	if($len_title>=$char):
		$new_title = substr($title,0,$char). " ...";
	else:
		$new_title = $title;
	endif;
	$title = preg_replace("/[^A-Za-z0-9 ]/", '', $title);
	if($alt==TRUE):
		$new_title = "<span title='".mysql_escape_string($title)."'>".$new_title."</span>";
	endif;
	return $new_title;
}
/*
End Of File
*/