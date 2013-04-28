function doConfirm(message)
{
	if(message == null)
		message = "WARNING!\nAre You sure to Continue?";
	return confirm(message);
}

function goToID(id){
   	$('html,body').animate({scrollTop: $("#"+id).offset().top},'slow');
}

$(document).ready(function(){	
	
	$.defaultText();
	
	$('.datepicker').datepicker({
		dateFormat: 'yy-mm-dd', changeMonth: true, changeYear: true,yearRange: '1900:2100'
	});

	$('.datetimepicker').datetimepicker({
		dateFormat: 'yy-mm-dd', changeMonth: true, changeYear: true,yearRange: '1900:2100',
		timeFormat: 'hh:mm:ss'
	});

	$('.timepicker').timepicker({});
	
	$('form').submit(function(){
		$(':submit', this).attr('disabled', 'true');
	    $(':submit', this).click(function() {
	        return false;
	    });
	});
	
	$('a.lightbox').lightBox(); // Select all links with lightbox class
		
});

//Colorbox
function boxFrame(e, setw, seth)
{
	if(setw==undefined) setw = "50%";
	if(seth==undefined) seth = "80%";

	$(e).colorbox({iframe:true, width:setw, height:seth, overlayClose:false});
	return false;
}