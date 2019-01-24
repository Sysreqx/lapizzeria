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
	fillDateTimeInput();

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

/*	// Adatp map to the Height of an element 
	var map = $('#map');
	if(map.length > 0) {
		if ($(document).width() >= breakpoint) {
			displayMap(0);
		} else {
			displayMap(300);
		}
	}
	$(window).resize(function(){
		if ($(document).width() >= breakpoint) {
			displayMap(0);
		} else {
			displayMap(300);
		}
	});
});*/

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

// Autofill datetime at current date
function fillDateTimeInput() {
	window.addEventListener("load", function() {
		var now = new Date();
		var utcString = now.toISOString().substring(0,19);
		var year = now.getFullYear();
		var month = now.getMonth() + 1;
		var day = now.getDate();
		var hour = now.getHours();
		var minute = now.getMinutes();
		var second = now.getSeconds();
		var localDatetime = year + "-" +
		(month < 10 ? "0" + month.toString() : month) + "-" +
		(day < 10 ? "0" + day.toString() : day) + "T" +
		(hour < 10 ? "0" + hour.toString() : hour) + ":" +
		(minute < 10 ? "0" + minute.toString() : minute) +
		utcString.substring(16,19);
		var datetimeField = document.getElementById("myDatetimeField");
		datetimeField.value = localDatetime;
	});
}

/*function displayMap(value) {
	if(value == 0) {
		var locationSection = $('.location-reservation');
		var locationHeight = locationSection.height();
		$('#map').css({'height': locationHeight});
	} else {

	}
}*/

/*// Doesn't work
function init_map() {
	var map;

	DG.then(function () {
		map = DG.map('map', {
			center: [43.239982, 76.904287],
			zoom: 13
		});
	});
}*/

});