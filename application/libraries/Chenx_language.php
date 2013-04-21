<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
	This Library must be used with Codeigniter's default library,
	"routes", "cookies", "languages", "config", "form"
	Creator : ChenX
*/
class Chenx_language
{
	//(Do not Change this variable)
	var $selected;
	var $CI;
	var $lang = array();
	var $post_name = 'language';
	var $lang_cookie_name = 'cichenxlanguagecookie';
	
	//Default Language
	var $default_lang = 'id';	
	//Language Fetch Method, by 'url' or 'cookie'
	var $lang_method = 'url';

    function __construct()
    {
		$this->CI =& get_instance();
    	//$this->lang = $this->language_list();
		//$this->selected = $this->fetch_lang();
		//$this->set_language();
		$this->CI->lang->load('custom/common');
	}
	
	private function language_list()
	{
		// Default Value is set above
		// You must set the language to config/routes.php too
		//
		$var = array(
			'id' => 'indonesia',
			'en' => 'english'
		);
		return $var;
	}

	private function set_language()
	{
		$selected = $this->selected;
		if(isset($this->lang[$selected]) === FALSE):
			$this->CI->config->set_item('language',$this->lang[$this->default_lang]);
			$this->selected = $this->default_lang;
		else:
			$this->CI->config->set_item('language',$this->lang[$selected]);
			$this->selected = $this->lang[$selected];
		endif;
	}
	
	private function fetch_lang()
	{
		if($this->lang_method=='url'):
			return $this->language_url();
		elseif($this->lang_method=='session'):
			return $this->language_cookie();		
		endif;
	}
	
	private function language_url()
	{
		$lang = $this->CI->uri->segment(1);
		return $lang;
	}

	private function language_cookie($value = FALSE)
	{
		if($value != FALSE):
			delete_cookie($this->lang_cookie_name);
			$cookie = array(
					   'name'   => $this->lang_cookie_name,
					   'value'  => $value,
					   'expire' => 0
			);
			set_cookie($cookie);
			return;
		else:
			return get_cookie($this->lang_cookie_name);
		endif;
	}
	
	//This function will help you to generate dropdown of Language Function
	public function language_form()
	{
		$form = '';
		$form .= form_open('lang');
		$form .= lang('language');
		$form .= $this->CI->form->create_input(
			'dropdown',
			array(
				'name'=>$this->post_name,
				'value'=>$this->lang,
				'selected'=>$this->selected,
				'attr'=>'onchange="this.form.submit();"'
			)
		);
		$form .= form_close();
		return $form;
	}
}
/* End Of File */