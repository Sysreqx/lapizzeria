<?php

function lapizzeria_styles() {
	// adding stylesheets
	wp_register_style('googlefont', 'https://fonts.googleapis.com/css?family=Open+Sans:400,700|Raleway:400,700,900', array(), '1.0.0');
	wp_register_style('normalize', get_template_directory_uri() . '/css/normalize.css', array(), '8.0.1');
	wp_register_style('fontawesome', get_template_directory_uri() . '/css/font-awesome.css', array(), '4.7.0');
	wp_register_style('style', get_template_directory_uri() . '/style.css', array(), '1.0');

	// Enquee the style
	wp_enqueue_style('normalize');
	wp_enqueue_style('fontawesome');
	wp_enqueue_style('googlefont');
	wp_enqueue_style('style');

	wp_register_script('script', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0', true);
	// Add JavaScript files
	wp_enqueue_script('jquery');
	wp_enqueue_script('script');
}
add_action('wp_enqueue_scripts', 'lapizzeria_styles');

// Add Menus
function lapizzeria_menus() {
	register_nav_menus( array(
		'header-menu' => __('Header Menu', 'lapizzeria'),
		'social-menu' => __('Social Menu', 'lapizzeria')
	) );
}
add_action('init', 'lapizzeria_menus');

