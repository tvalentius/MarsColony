//Below is Javascript function needed for library Chenx_AJAX
//Any variable could be referenced from the library.
//This function must be supported with jQuery
function chenxAjaxRefreshID(refreshId, ajaxData)
{
	if(ajaxData==undefined) ajaxData = {};
	
	ajaxData.chenx_ajax_function = refreshId;
	ajaxData.chenx_ajax_src = $('#chenx_ajax_src').val();

	$.ajax({
		type : 'POST',
		url : current_path+'/ajax_call',
		dataType : 'json',
		data: ajaxData,
		beforeSend : function() {
			$('#'+refreshId).fadeOut('fast');
		},
		success : function(data){
			$('#'+refreshId).fadeIn('fast');
			$('#'+refreshId).html(data);
		},
		error : function(XMLHttpRequest, textStatus, errorThrown) {
			//alert(XMLHttpRequest.responseText);
			$('#'+refreshId).html(XMLHttpRequest.responseText);
		}
	});
}

function chenxAjaxActionID(e, refreshId,page)
{
	$.ajax({
		type : 'POST',
		url : $(e).attr('href'),
		dataType : 'json',
		data: {
		},
		beforeSend : function() {
		},
		success : function(data){
			console.log(data);
			if(data.message!==null)
				alert(data.message);
			if(page==undefined)
				chenxAjaxRefreshID(refreshId);
			else
				chenxAjaxPageID(refreshId,page);
		},
		error : function(XMLHttpRequest, textStatus, errorThrown) {
			console.log(XMLHttpRequest.responseText);
		}
	});
}

function chenxAjaxPageID(refreshId, page)
{
	var ajaxData = {
		chenx_ajax_page : page	
	};
	return chenxAjaxRefreshID(refreshId, ajaxData);
}

function chenxAjaxOption(refreshId, object, cond, value, key, title)
{
	var ajaxData = {};
	if(key==undefined) key = "pk";
	if(title==undefined) title = "name";
	
	ajaxData.chenx_ajax_function = refreshId;
	ajaxData.chenx_ajax_object = object;
	ajaxData.chenx_ajax_condition = cond;
	ajaxData.chenx_ajax_value = value;
	ajaxData.chenx_ajax_object_key = key;
	ajaxData.chenx_ajax_object_title = title;

	$.ajax({
		type : 'POST',
		url : current_path+'/object_option_call',
		dataType : 'json',
		data: ajaxData,
		beforeSend : function() {
			$('#'+refreshId).fadeOut('fast');
		},
		success : function(data){
			$('#'+refreshId).fadeIn('fast');
			$('#'+refreshId).html(data);
		},
		error : function(XMLHttpRequest, textStatus, errorThrown) {
			//alert(XMLHttpRequest.responseText);
			$('#'+refreshId).html(XMLHttpRequest.responseText);
		}
	});
}