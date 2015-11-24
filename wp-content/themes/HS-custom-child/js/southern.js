jQuery(document).ready(function() {
	var bgheight = jQuery('.background-image').height()-200;
	var contentheight = jQuery('.site-content').height();
	
	if(bgheight>contentheight) {
		jQuery('.site-content').css({ height: bgheight});
	}
	var resizeTimer;
	jQuery(window).on('resize', function(e) {
	  clearTimeout(resizeTimer);
	  resizeTimer = setTimeout(function() {
		  jQuery('.site-content').css('height','');
		  	var bgheight = jQuery('.background-image').height()-200;
			var contentheight = jQuery('.site-content').height();
			
			if(bgheight>contentheight) {
				jQuery('.site-content').css({ height: bgheight});
			} 
	  }, 250)
	});

});