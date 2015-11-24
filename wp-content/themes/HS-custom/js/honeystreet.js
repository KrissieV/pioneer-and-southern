// Search Toggle
jQuery('.search-btn').click(function(){
	jQuery('.search-box').toggleClass('show');
	jQuery('.search-box').toggleClass('hide');
	jQuery('.search').toggleClass('active');
});

// Mobile Nav Fix
jQuery( document ).ready(function() {
	if (jQuery(window).width() < 951) {
		var WinWidth = 'Mobile';
		jQuery('#menu-main-navigation > .menu-item-has-children').each(function(){
			jQuery(this).children('.sub-menu').prepend('<li class="toplevel"><ul class="sub-menu"><li></li></ul></li>');
			jQuery(jQuery(this).find('> a')).clone().prependTo(jQuery(this).find('.toplevel li'));
			jQuery(jQuery(this).find('.toplevel li a')).append(' Homepage');
			jQuery(jQuery(this).find('> a')).wrap('<span class="dropdown-trigger"></span>');
			jQuery('.dropdown-trigger a').contents().unwrap();
			jQuery(jQuery(this).find('> .dropdown-trigger')).click(function(){
				jQuery(this).siblings('.sub-menu').toggleClass('open');
				jQuery(this).parent().toggleClass('active');
			});
		});
	} else if (jQuery(window).width() > 950) {
		var WinWidth = 'Desktop';
	};
	
	var resizeTimer;
	jQuery(window).on('resize', function(e) {
	  clearTimeout(resizeTimer);
	  resizeTimer = setTimeout(function() {
	  	if (WinWidth == 'Mobile') {
		    if (jQuery(window).width() < 951) {
			    //
			} else if (jQuery(window).width() > 950) {
				location.reload();
			}
		} else if (WinWidth == 'Desktop') {
			if (jQuery(window).width() < 951) {
				WinWidth = 'Mobile';
				jQuery('#menu-main-navigation > .menu-item-has-children').each(function(){
					jQuery(this).children('.sub-menu').prepend('<li class="toplevel"><ul class="sub-menu"><li></li></ul></li>');
					jQuery(jQuery(this).find('> a')).clone().prependTo(jQuery(this).find('.toplevel li'));
					jQuery(jQuery(this).find('.toplevel li a')).append(' Homepage');
					jQuery(jQuery(this).find('> a')).wrap('<span class="dropdown-trigger"></span>');
					jQuery('.dropdown-trigger a').contents().unwrap();
					jQuery(jQuery(this).find('.dropdown-trigger')).click(function(){
						jQuery(this).siblings('.sub-menu').toggleClass('open');
						jQuery(this).parent().toggleClass('active');
					});
				});

			} else if (jQuery(window).width() > 950) {
				//
			}
		}
	            
	  }, 250)
	});
});

