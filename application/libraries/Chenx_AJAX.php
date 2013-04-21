<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chenx_AJAX {
	
	var $ajax_refresh_value = array();
	var $function_ajax_refresh = "chenxAjaxRefreshID";
	var $function_ajax_action = "chenxAjaxActionID";
	var $function_ajax_page = "chenxAjaxPageID";
	
	public function __construct()
	{
		//Set Constant
		define('CHENX_AJAX_PAGE','chenx_ajax_page');
		define('CHENX_AJAX_FROM','chenx_ajax_from');
		define('CHENX_AJAX_FLAG','chenx_ajax_flag');
		define('CHENX_AJAX_SEARCH','chenx_ajax_src');
		define('CHENX_AJAX_FUNCTION','chenx_ajax_function');
		define('CHENX_AJAX_CONDITION','chenx_ajax_condition');
		define('CHENX_AJAX_OBJECT','chenx_ajax_object');
		define('CHENX_AJAX_OBJECT_KEY','chenx_ajax_object_key');
		define('CHENX_AJAX_OBJECT_TITLE','chenx_ajax_object_title');
		define('CHENX_AJAX_VALUE','chenx_ajax_value');
		define('CHENX_AJAX_SESS_REFRESH','chenxajaxrefreshdata');
	}
	
	function button_pagination($refreshId,$total_rows, $page=1, $per_page=5)
	{
		$anchor_class = "chenx_ajax_paging";
		$anchor_class_selected = "chenx_ajax_paging_selected";
		$page = $page==FALSE?1:$page;
		$show_digit = 2;
		$view = '';
		@$total_page = ceil(($total_rows/$per_page));
		//Refresh
		$ref = "";
		/*'<a class="paging" id="ajax_page_refresh"
		onclick="'.$this->get_ajax_function_refresh().'()">Refresh</a>';*/
		if($total_page >= 1):
			//First
			if($page > 1):
				$first = '<a class="'.$anchor_class.'" onclick="'.$this->function_ajax_page.'('."'$refreshId'".',1)">First</a>';
			else:
				$first = '';
			endif;
			//Previous
			if($page > 1):
				$prev = '<a class="'.$anchor_class.'" onclick="'.$this->function_ajax_page.'('."'$refreshId'".','.($page-1).')">'.
				' &lsaquo; </a>';		
			else:
				$prev = '';
			endif;
			//Digits
			$digit = '';
			$digit_before = '';
			$digit_after = '';
			//Before
			for( $temp=1, $digit=$show_digit ; ($page-$temp) > 0 && $digit > 0 ; $digit--, $temp++):
				$digit_before = 
					'<a class="'.$anchor_class.'" onclick="'.$this->function_ajax_page.'('."'$refreshId'".','.($page-$temp).')">
						'.($page-$temp).'
					</a>'.$digit_before;
					
			endfor;
			//After		
			for( $temp=1, $digit=$show_digit ; ($page+$temp) <= $total_page && $digit > 0 ; $digit--, $temp++):
				$digit_after .= 
					'<a class="'.$anchor_class.'" onclick="'.$this->function_ajax_page.'('."'$refreshId'".','.($page+$temp).')">
						'.($page+$temp).'
					</a>';
			endfor;
			//Now
			$digit = '<a class="'.$anchor_class_selected.'" disabled>'.$page.'</a>';	
			//Combine!
			$digit = $digit_before.$digit.$digit_after;
			//Next
			if($page < $total_page && $page >= 1):
				$next = '<a class="'.$anchor_class.'" onclick="'.$this->function_ajax_page.'('."'$refreshId'".','.($page+1).')">'.
				' &rsaquo; </a>';
			else:
				$next = '';
			endif;
			//Last
			if($page < $total_page && $page >= 1):
				$last = '<a class="'.$anchor_class.'" onclick="'.$this->function_ajax_page.'('."'$refreshId'".','.$total_page.')">
				Last</a>';
			else:
				$last = '';
			endif;
			$view = $first.$prev.$digit.$next.$last.$ref;
		else:
			$view = $ref;
		endif;
		return $view;
	}
	
	public function button_action($link, $title, $refreshId, $doConfirm=FALSE, $page=1, $attr=array())
	{
		//Prepare Script
		$script = "";
		$attribute = "";
		if($doConfirm==TRUE):
			$script .= "if(doConfirm()==false)return false; ";
		endif;
		$script .= $this->function_ajax_action."(this,'".$refreshId."', ".$page."); return false;";
		//Prepare Attribute
		$default_attribute = array(
			"class"=>"chenx_ajax_action",
			"onclick"=>$script
		);
		$attribute = array_merge($default_attribute, $attr);
		return anchor($link, $title, $attribute);
	}

	private function get_search_hidden()
	{
		return "<input type='hidden' id='".$this->ajax_search_id."' ".
			   "name='".$this->ajax_search_id."' value='".$this->ajax_search_val."'/>";
	}
	
	//This Function Requires Libraries Session from Codeigniter
	public function chenx_ajax_refresh($value="ajaxtable")
	{
		$CI =& get_instance();
		$this->ajax_refresh_value[] = $value;
		$CI->session->set_flashdata(CHENX_AJAX_SESS_REFRESH, $this->ajax_refresh_value);
	}
	
	public function get_chenx_ajax_refresh()
	{
		$CI =& get_instance();
		return $CI->session->flashdata(CHENX_AJAX_SESS_REFRESH);
	}
	///////////////////////////////////////////////////////////

}

/* End of file */ 