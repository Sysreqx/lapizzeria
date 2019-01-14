$ = jQuery.noConflict();

$(document).ready(function () {
	$('.mobile-menu a').on('click', function() {
		$('nav.site-nav').toggle('slow');
	});

	var breakpoint = 768;
	$(window).resize(function() {
		if ($(document).width() >= breakpoint) {
			$('nav.site-nav').show();
		} else {
			$('nac.site-nav').hide();
		}
	});
});