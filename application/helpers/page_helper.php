<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function count_limit($page, $limit) {
	if($page<1):
		$page = 1;
	endif;
	if($limit==FALSE):
		return FALSE;
	endif;
	return ($page * $limit) - $limit;
}

function total_page($total_row, $per_page)
{
	@$total_page = ceil(($total_row/$per_page));
	return $total_page;
}

/*
End Of File
*/