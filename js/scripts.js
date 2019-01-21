$ = jQuery.noConflict();

$(document).ready(function () {

	// Menu Button
	$('.mobile-menu a').on('click', function() {
		$('nav.site-nav').toggle('slow');
	});

	// Show the Mobile Menu
	var breakpoint = 768;
	$(window).resize(function() {
		boxAdjustment();
		if ($(document).width() >= breakpoint) {
			$('nav.site-nav').show();
		} else {
			$('nav.site-nav').hide();
		}
	});

	boxAdjustment();

	// FluidBox Plugin
	// select gallery a
	jQuery('.gallery a').each(function() {
		// adding data-fluidbox to this element
		jQuery(this).attr({'data-fluidbox': ''});
	});

	// if have data-fluidbox with lenght great than 0
	if (jQuery('[data-fluidbox]').length > 0) {
		// aplying this method
		jQuery('[data-fluidbox]').fluidbox();
	}

});

// Adapt the height of the images to the div
function boxAdjustment() {
	var images = $('.box-image');
	if(images.length > 0 ) {
		var imageHeight = images[0].height;
		var boxes = $('.content-box');
		$(boxes).each(function(i, element) {
			$(element).css({'height': imageHeight + 'px'});
		});
	}
}