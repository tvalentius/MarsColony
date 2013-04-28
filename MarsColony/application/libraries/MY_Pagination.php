<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Pagination extends CI_Pagination {
	
	var $my_config = array();
	var $CI;
	var $page_offset;
	var $anchor_class = "button";
	var $anchor_class_selected = "class='button paging_selected'";
	
	public function __construct()
	{
		parent::__construct();
		$this->CI =& get_instance();
	}
		
	public function get_page()
	{
		$page = $this->CI->uri->segment($this->my_config['uri_segment']);

		return $page ? $page : 1;
	}
	
	public function create()
	{
		$this->initialize($this->my_config);
		return $this->create_links();
	}
	
		/**
	 * Generate the custom pagination links
	 *
	 * @access	public
	 * @return	string
	 */
	function create_links()
	{
		$page = $this->get_page();
		$total_row = $this->total_rows;
		$per_page = $this->per_page;
		$show_digit = $this->num_links;
		$view = '';
		@$total_page = ceil( $total_row/$per_page );
		
		if($total_page > 1):
		
			//First
			if($page > 1):
				$first_url = ($this->first_url == '') ? $this->base_url : $this->first_url;
				$first = $this->first_tag_open.'<a '.$this->anchor_class.' href="'.$first_url.'">'.$this->first_link.'</a>'.$this->first_tag_close;
			else:
				$first = '';
			endif;
			
			//Previous
			if($page > 1):
				$prev = $this->prev_tag_open.'<a '.$this->anchor_class.' href="'.$this->base_url.($page-1).'">'.$this->prev_link.'</a>'.$this->prev_tag_close;
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
					$this->num_tag_open.'<a '.$this->anchor_class.' href="'.$this->base_url.($page-$temp).'">'
					.($page-$temp).'</a>'.$this->num_tag_close.$digit_before;	
			endfor;
			//After		
			for( $temp=1, $digit=$show_digit ; ($page+$temp) <= $total_page && $digit > 0 ; $digit--, $temp++):
				$digit_after .= 
					$this->num_tag_open.'<a '.$this->anchor_class.' href="'.$this->base_url.($page+$temp).'">'
					.($page+$temp).'</a>'.$this->num_tag_close;
			endfor;
			//Now
			$digit = $this->cur_tag_open.'<span '.$this->anchor_class_selected.' >'.$page.'</span>'.$this->cur_tag_close;
			//Combine!
			$digit = $digit_before.$digit.$digit_after;
	
			//Next
			if($page < $total_page && $page >= 1):
				$next = 
				$this->next_tag_open.
				'<a '.$this->anchor_class.' href="'.$this->base_url.$this->prefix.($page+1).$this->suffix.'">'
				.$this->next_link.
				'</a>'.$this->next_tag_close;
			else:
				$next = '';
			endif;
	
			//Last
			if($page < $total_page && $page >= 1):
				$last =
				$this->last_tag_open.
				'<a '.$this->anchor_class.' href="'.$this->base_url.$this->prefix.$total_page.$this->suffix.'">'
				.$this->last_link.
				'</a>'.$this->last_tag_close;
			else:
				$last = '';
			endif;
	
			$view = $first.$prev.$digit.$next.$last;

		endif;

		return $view;
	}
	

}
/* End of file */