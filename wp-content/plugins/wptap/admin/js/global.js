if(typeof jQuery!="undefined") {
	var $ = jQuery
}

$(document).ready(function(){
	if($('#alwayson').attr('checked') == true) {
		$('.mobiledevice-checkbox').attr('disabled', true).css('backgroundColor', '#F9F9F9').removeAttr('checked');
		$(".redirect").attr('disabled', true).css('backgroundColor', '#F9F9F9').val('');
	}

	$('#alwayson').click(function(){
		if($(this).attr('checked') == true) {
			$('.mobiledevice-checkbox').attr('disabled', true).css('backgroundColor', '#F9F9F9').val('').removeAttr('checked');
			$(".redirect").attr('disabled', true).css('backgroundColor', '#F9F9F9').val('');
		} else {
			$('.mobiledevice-checkbox').css('backgroundColor', '#FFFFFF').removeAttr('disabled');
			$(".redirect").css('backgroundColor', '#FFFFFF').removeAttr('disabled');
		}
	});
});