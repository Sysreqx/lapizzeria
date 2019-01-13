<?php

function lapizzeria_styles() {
	// adding stylesheets
	wp_register_style('normalize', get_template_directory_uri() . '/css/normalize.css', array(), '6.0.0');
	wp_register_style('style', get_template_directory_uri() . '/style.css', array(), '1.0');

	// Enquee the style
	wp_enqueue_style('normalize');
	wp_enqueue_style('style');
}
add_action('wp_enqueue_scripts', 'lapizzeria_styles');
