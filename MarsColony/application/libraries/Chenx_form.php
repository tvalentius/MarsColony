<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
	This Codeigniter Libraries is made and copyright by ChenX
*/
class Chenx_form
{
	var $CI;
	var $attr = array();
	
	var $class_table = 'listing form';
	var $class_input = 'form_input';
	var $class_button = 'button';
	var $class_textarea = 'form_textarea';
	var $class_select = 'form_select';
	var $row_color = FALSE;
	var $form_error = FALSE;
    
    //Flag
    var $flag_tinymce = 0;
    //
	
	var $input = array(
		"title"=>'',
		"form"=>'',
		"tr_attr"=>''
	);
	
	var $form = array(
		"title"=>'',
		"readonly"=>FALSE,
		"value"=>''
	);
	
	var $drop = array(
		"name"=>'',
		"value"=>'',
		"selected"=>'',
		"attr"=>''
	);
	
	
    function __construct()
    {
		$this->CI =& get_instance();
		$this->attr = $this->default_attr();
	}
	
	function default_attr()
	{
		$attr['common'] = array(
		'class' => $this->class_input
		);
		$attr['textarea'] = array(
		'class' => $this->class_textarea
		);
		$attr['button'] = array(
		'class' => $this->class_button
		);
		$attr['add'] = ' class='.$this->class_select.' ';
		return $attr;
	}
	
	function set_default_attr($tipe, $attr)
	{
		if($tipe == 'dropdown'):
			if(isset($attr['attr']) == FALSE):
				$attr['attr'] = $this->attr['add'];
			elseif(strpos($attr['attr'],'class') === FALSE):
				$attr['attr'] .= $this->attr['add'];			
			endif;
		elseif($tipe == 'textarea'):
			if(isset($attr['class']) == FALSE):
				$attr['class'] = $this->attr['textarea']['class'];
			endif;
		elseif($tipe == 'submit' || $tipe == 'button'):
			if(isset($attr['class']) == FALSE):
				$attr['class'] = $this->attr['button']['class'];
			endif;
		elseif($tipe != 'hidden' && $tipe != 'checkbox' && $tipe != 'treecheckbox' && $tipe != 'radio'):
			if(isset($attr['class']) == FALSE):
				$attr['class'] = $this->attr['common']['class'];
			endif;
		endif;
		return $attr;
	}
	
	private function form_error($name,$set="unset")
	{
		if($set=="unset"): $set = $this->form_error; endif;
		if($set): return form_error(); endif;
	}
	
	var $flag_checktree = FALSE;
	function create_input($tipe, $array = '', $readonly=FALSE)
	{
		$array = $this->set_default_attr($tipe, $array);

		switch($tipe):
			case "text" :
				if($readonly==TRUE):
					$array['readonly'] = 1;
				endif;
				return form_input($array).$this->form_error($array['name']);
			//=====================================================================================================//	
			case "number" :
				if($readonly==TRUE):
					$array['readonly'] = 1;
				endif;
				$attribute = "";
				foreach($array as $attr=>$value):
					$attribute .= " ".$attr."='".$value."' ";
				endforeach;
				return "<input type='number' ".$attribute.">".$this->form_error($array['name']);
			//=====================================================================================================//	
			case "date" :
				$array['readonly'] = 1;
				$array['class'] .= ' datepicker';
				return form_input($array).$this->form_error($array['name']);
			//=====================================================================================================//	
			case "time" :
				$array['readonly'] = 1;
				$array['class'] .= ' timepicker';
				return form_input($array).$this->form_error($array['name']);
			//=====================================================================================================//	
			case "datetime" :
				$array['readonly'] = 1;
				$array['class'] .= ' datetimepicker';
				return form_input($array).$this->form_error($array['name']);
			//=====================================================================================================//	
			case "datestart" :
				$array['readonly'] = 1;
				return form_input($array).$this->form_error($array['name']);
			case "dateend" :
				$array['readonly'] = 1;
				$idstart = $array['start'];
				$idend = $array['id'];
				$time = isset($array['time']) ? "true" : "false";
				$timeformat = isset($array['time']) ? "hh:mm:ss" : "";
				$script = '
				<script>
					$(document).ready(function(){
						
						$("#'.$idstart.'").datetimepicker({
							dateFormat: "yy-mm-dd",
							timeFormat: "'.$timeformat.'",
							changeMonth: true,
							changeYear: true,
							yearRange: "1900:2100",
							showTime: '.$time.',
							showHour: '.$time.',
							showMinute: '.$time.',
							onSelect: function (selectedDateTime){
								var start = $(this).datetimepicker("getDate");
								$("#'.$idend.'").datetimepicker("option", "minDate", new Date(start.getTime()) );
							}
						});	
						$("#'.$idend.'").datetimepicker({
							dateFormat: "yy-mm-dd",
							timeFormat: "'.$timeformat.'",
							changeMonth: true,
							changeYear: true,
							yearRange: "1900:2100",
							showTime: '.$time.',
							showHour: '.$time.',
							showMinute: '.$time.',
							onSelect: function (selectedDateTime){
								var end = $(this).datetimepicker("getDate");
								$("#'.$idstart.'").datetimepicker("option", "maxDate", new Date(end.getTime()) );
							}
						});
					});
				</script>
				';
				return $script.form_input($array).$this->form_error($array['name']);
			//=====================================================================================================//	
			case "hidden" :
				$name = 	isset($array['name']) ? $array['name'] : '';
				$id = 		isset($array['id']) ? $array['id'] : $name;
				$value = 	isset($array['value']) ? $array['value'] : '';
				return "<input type='hidden' name='".$name."' id='".$id."' value='".$value."' />";
			//=====================================================================================================//
			case "password" :
				if($readonly==TRUE):
					$array['readonly'] = 1;
				endif;
				return form_password($array).$this->form_error($array['name']);
			//=====================================================================================================//
			case "upload" :
				if($readonly==TRUE):
					$array['readonly'] = 1;
				endif;
				return form_upload($array).$this->form_error($array['name']);
			//=====================================================================================================//	
			case "textarea" :
				if($readonly==TRUE):
					$array['readonly'] = 1;
				endif;
				return form_textarea($array).$this->form_error($array['name']);
			//=====================================================================================================//
			case "ckeditor" :
				$this->CI->load->helper('ckeditor');
				$width = isset($array['width'])?$array['width']:"100%";
				$height = isset($array['height'])?$array['height']:"100px";
				$toolbar = isset($array['toolbar'])?$array['toolbar']:"Basic";
				$data = array(
					//ID of the textarea that will be replaced
					'id' 	=>  $array['id'],
					//Optional values
					'config' => array(
						'width' 	=> 	$width,	//Setting a custom width
						'height' 	=> 	$height,	//Setting a custom height
						'toolbar' 	=> 	$toolbar
					)
				);
				return $this->create_input('textarea',$array,$readonly).display_ckeditor($data);
			//=====================================================================================================//
			case "tiny_mce" :
                $script = "";
				$array['id'] = isset($array['id'])? $array['id'] : "tinymce";
                if($this->flag_tinymce==0):
                    $script .= "<script src='".JS_PATH."tiny_mce/tiny_mce.js' charset='utf-8'></script>";
                    $this->flag_tinymce = 1;
                endif;
				$script .= '
				<script language="javascript" type="text/javascript">
					tinyMCE.init({
						mode : "exact",
						elements : "'.$array['id'].'",
						theme : "advanced",
						plugins : "advimage,advlink,media,contextmenu",
						theme_advanced_buttons1_add_before : "newdocument,separator",
						theme_advanced_buttons1_add : "fontselect,fontsizeselect",
						theme_advanced_buttons2_add : "separator,forecolor,backcolor,liststyle",
						theme_advanced_buttons2_add_before: "cut,copy,separator,",
						theme_advanced_buttons3_add_before : "",
						theme_advanced_buttons3_add : "media",
						theme_advanced_toolbar_location : "top",
						theme_advanced_toolbar_align : "left",
						extended_valid_elements : "hr[class|width|size|noshade]",
						file_browser_callback : "ajaxfilemanager",
						paste_use_dialog : false,
						theme_advanced_resizing : true,
						theme_advanced_resize_horizontal : true,
						apply_source_formatting : true,
						force_br_newlines : true,
						force_p_newlines : false,	
						relative_urls : false
					});
			
					function ajaxfilemanager(field_name, url, type, win) {
						var ajaxfilemanagerurl = "'.JS_PATH.'tiny_mce/plugins/ajaxfilemanager/ajaxfilemanager.php";
						var view = "detail";
						switch (type) {
							case "image":
							view = "thumbnail";
								break;
							case "media":
								break;
							case "flash": 
								break;
							case "file":
								break;
							default:
								return false;
						}
			            tinyMCE.activeEditor.windowManager.open({
			                url: "'.JS_PATH.'tiny_mce/plugins/ajaxfilemanager/ajaxfilemanager.php?view=" + view,
			                width: 782,
			                height: 440,
			                inline : "yes",
			                close_previous : "no"
			            },{
			                window : win,
			                input : field_name
			            });
			            
			/*            return false;			
						var fileBrowserWindow = new Array();
						fileBrowserWindow["file"] = ajaxfilemanagerurl;
						fileBrowserWindow["title"] = "Ajax File Manager";
						fileBrowserWindow["width"] = "782";
						fileBrowserWindow["height"] = "440";
						fileBrowserWindow["close_previous"] = "no";
						tinyMCE.openWindow(fileBrowserWindow, {
						  window : win,
						  input : field_name,
						  resizable : "yes",
						  inline : "yes",
						  editor_id : tinyMCE.getWindowArg("editor_id")
						});
						
						return false;*/
					}
			</script>
				';
				if($readonly==TRUE):
					$array['readonly'] = 1;
				endif;
				return $script.form_textarea($array).$this->form_error($array['name']);
			//=====================================================================================================//	
			case "dropdown" :
				$array = array_merge($this->drop, $array);
				if($readonly==TRUE):
					$array['attr'] .= ' disabled';
				endif;
				if(isset($array['all'])):
					$allname = isset($array['allname'])? $array['allname'] : "All";
					if($array['all']===TRUE):
						$array['value'][0] = $allname;
					elseif($array['all']):
						$array['value'][$array['all']]=$allname;
					endif;
				endif;
				return
					form_dropdown($array['name'], $array['value'],$array['selected'],$array['attr']).
					$this->form_error($array['name'])
				;
			//=====================================================================================================//	
			case "multidrop" :
				$array = array_merge($this->drop, $array);
				if($readonly==TRUE):
					$array['attr'] .= ' disabled';
				endif;
				$name = $array['name'].'[]';
				return 
					form_multiselect($name, $array['value'],$array['selected'],$array['attr']).
					form_error($array['name'])
				;
			//=====================================================================================================//	
			case "checkbox" :
				$checkbox = '';
				$checked = isset($array['checked']) ? $array['checked'] : '';
				$fix_name = isset($array['name']) ? $array['name'] : FALSE;
				unset($array['checked']);
				unset($array['name']);
				foreach($array as $box):
					$box['name'] = isset($box['name']) ? $box['name'] : $fix_name;
					$title = isset($box['title']) ? $box['title'] : FALSE;
					$pos = isset($box['position']) ? $box['position'] : "right";
					if(is_array($checked)==TRUE):
						foreach($checked as $c):
							if($box['value'] == $c):
								$box['checked'] = 1;
							endif;
						endforeach;
					else:
						if($box['value'] == $checked):
							$box['checked'] = 1;
						endif;
					endif;
					if($readonly==TRUE):
						$box['disabled'] = 1;
					endif;
					if($pos=="left"):
						$checkbox .= $title." ".form_checkbox($box);
					else:
						$checkbox .= form_checkbox($box)." ".$title;
					endif;
				endforeach;
				return $checkbox.$this->form_error($box['name']);
			//=====================================================================================================//
			case "treecheckbox" :
				$script = "";
				if($this->flag_checktree==FALSE):
					$script = "
					<style>
						.ultree{list-style-type:none}
					</style>
					<script>
						$(document).ready(function(){
							$('input[id^=tree]').click(function(){
								var treeid = $(this).attr('id');
								var ischeck = $('#'+treeid).is(':checked');
								if(ischeck == true)
								{
									$('input[id^='+treeid+']').attr('checked', true);
									var maintreeid = treeid.split('-');
									var temptreeid = '';
									for(x in maintreeid)
									{
										if(temptreeid=='')
											temptreeid = maintreeid[x];
										else
											temptreeid = temptreeid + '-' + maintreeid[x];
	
										checkParent(temptreeid);
									}
								}
								else
									$('input[id^='+treeid+']').attr('checked', false);
							});
							
							function checkParent(value)
							{
								$('#'+value).attr('checked', true);
							}
						});
					</script>
					";
				endif;
				$fix_name = isset($array['name']) ? $array['name'] :FALSE;
				$fix_checked = isset($array['checked']) ? $array['checked'] : FALSE;
				$checkbox = $script.$this->checkbox_tree($array['value'],FALSE,$fix_name,$fix_checked, $readonly);
				return $checkbox;
			//=====================================================================================================//
			case "radio" :
				$radio = '';
				$checked = isset($array['checked']) ? $array['checked'] : '';
				unset($array['checked']);
				foreach($array as $box):
					if($box['value'] == $checked):
						$box['checked'] = 1;
					endif;
					if($readonly==TRUE):
						$box['disabled'] = 1;
					endif;
					$radio .= $box['title'].form_radio($box);
				endforeach;
				return $radio.$this->form_error($box['name']);
	
			case "submit" : 
				$array['value'] = isset($array['value']) ? $array['value'] : lang('form_submit');
				return form_submit($array);
			
			case "plain" :
				return $array;
			
		endswitch;
	}
	
	private function checkbox_tree($value, $from_parent=FALSE, $fix_name=FALSE, $fix_checked=FALSE, $readonly=FALSE)
	{
		$ulbox = "<ul class='ultree'>";
		$flag_id = 1;
		foreach($value as $row):

			$row['name'] = isset($row['name']) ? $row['name'] : $fix_name;

				if($fix_checked==TRUE):
					if(is_array($fix_checked)):
						$row['checked'] = FALSE;
						foreach($fix_checked as $check):
							if($row['value']==$check):
								$row['checked'] = TRUE;
							endif;
						endforeach;
					else:
						$row['checked'] = FALSE;
						if($row['value']==$fix_checked):
							$row['checked'] = TRUE;
						endif;
					endif;
				endif;

			if($from_parent==TRUE):
				$flag_id_plus = $from_parent."-".$flag_id;
			else:
				$flag_id_plus = $flag_id;
			endif;
			$row['id'] = "tree".$flag_id_plus;			

			if(isset($row['child'])==TRUE):
				$child = $row['child'];
				unset($row['child']);
			endif;
			if($readonly==TRUE):
				$row['disabled'] = TRUE;
			endif;
			$ulbox .= "<li>".form_checkbox($row)." ".$row['title'];
			if(isset($child)):
				$ulbox .= $this->checkbox_tree($child, $flag_id_plus, $row['name'], $fix_checked, $readonly);
				unset($child);
			endif;
			$ulbox .= "</li>";
			$flag_id++;
		endforeach;
		$ulbox .= "</ul>";
		return $ulbox;
	}
	
	function create_form($form_action, $array_input,$legend='',$extra='')
	{
		//First
		$table = $extra.'<table cellpadding=0 cellspacing=0 class="'.$this->class_table.'">';	//Mulai membuat table
		$i=0;
		foreach($array_input as $input):	//Loop
			$i++;
			$input = array_merge($this->input, $input);
			$view_input = '';
			
			if(isset($input['form']) && !(empty($input['form']))):
				
				foreach($input['form'] as $form):
				
					$form = array_merge($this->form, $form);
					$tipe = $form['tipe'];					
					$view_input .= $form['title'].$this->create_input($form['tipe'], $form['value'],$form['readonly']);

				endforeach;
			else:
				$tipe = '';
			endif;
			
			if($this->row_color == TRUE):
				if($i%2==0):
					$color = 'bg';
				else:
					$color = '';
				endif;
			else:
				$color = 'bg';
			endif;
						
			$table .= "<tr class='".$color."'  ".$input['tr_attr'].">";
			
			if($input['title']):
				if(!empty($input['form'])):
					$colspan = 1;
					$table .="<td class='first' colspan=".$colspan.">".$input['title']."</td>";
				else:
					$colspan = 2;
					$table .="<th class='full' colspan=".$colspan.">".$input['title']."</td>";
				endif;
			else:
				$colspan = 2;
			endif;
			
			if($input['form']):
				$table .="<td class='last' colspan=".$colspan.">".$view_input."</td>";
			endif;

			$table .= "</tr>";
		
		endforeach;
		
		$table .= "</table>";
		
		if($legend):
			$table = "<fieldset><legend>".$legend."</legend>".$table."</fieldset>";
		endif;
		
		if(is_array($form_action)):
		
			if(!isset($form_action['hidden'])):
				$form_action['hidden'] = '';
			endif;
			return form_open_multipart($form_action['action'], $form_action['attr'], $form_action['hidden']).$table.form_close();
		
		else:
			return form_open_multipart($form_action).$table.form_close();				
		endif;
		
		return $table;
	}
}
/* End Of File */