(function(jQuery){
	$ = jQuery
	$.fn.selectIcon = function(icons, siteIcon) {
		var current = this;

		$(icons).each(function(){
			$(this).mouseover(function(){
				$(this).css('cursor', 'pointer');
			});

			$(this).click(function(){
				$(siteIcon).val($(this).attr('alt'));
				current.attr('src', $(this).attr('src'));
			});
		});
	}
})(jQuery);

$(document).ready(function(){
	$('#colorpicker').hide();

	$('#titlecolor').focus(	function(){
			$('#colorpicker').show().fadeIn();
	});
	
	$('#titlecolor').blur( function(){
		$('#colorpicker').hide().fadeOut();
	});

	$('#colorpicker').farbtastic('#titlecolor');

	// Upload
	var logoButton = jQuery('#upload_button');
		new AjaxUpload(logoButton, {
			action: '../?wptap=upload',
			autoSubmit: true,
			name: 'submitted_file',
			data: {'type':'icon'},
			onSubmit: function(file, extension) { 
				jQuery("#upload_progress").show(); 
			},
			onComplete: function(file, response) {
				jQuery("#upload_progress").hide();
				jQuery('#upload_response').hide().html(response).fadeIn(); 
			}
		});

	var iconButton = jQuery('#upload_pages_button');
		new AjaxUpload(iconButton, {
			action: '../?wptap=upload',
			autoSubmit: true,
			name: 'submitted_file',
			data: {'type':'logo'},
			onSubmit: function(file, extension) { 
				jQuery("#upload_pages_progress").show(); 
			},
			onComplete: function(file, response) {
				jQuery("#upload_pages_progress").hide();
				jQuery('#upload_pages_response').hide().html(response).fadeIn(); 
			}
		});

	jQuery('#current_logo_icon').selectIcon("img[id^='icon-']", "#pages_icon");
});