<?php 
function lapizzeria_options() {
	 // $page_title, $menu_title, $capability, $menu_slug, $function = '', $icon_url = '', $position = null 
	add_menu_page( 'La Pizzeria', 'La Pizeeria Options', 'administrator', 'lapizzeria_options', 'lapizzeria_adjustments', '', 20 );

	 // $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function = '' 
	add_submenu_page( 'lapizzeria_options', 'Reservations', 'Reservations', 'administrator', 'lapizzeria_reservations', 'lapizzeria_reservations' );
}
add_action('admin_menu', 'lapizzeria_options');

function lapizzeria_adjustments() {
	// Rest of the code
}

function lapizzeria_reservations() {
	// Rest of the code
}