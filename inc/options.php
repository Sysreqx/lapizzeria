<?php 
function lapizzeria_options() {
	add_menu_page( 'La Pizzeria', 'La Pizeeria Options', 'administrator', 'lapizzeria_options', 'lapizzeria_adjustments', '', 20 );
}
add_action('admin_menu', 'lapizzeria_options');

function lapizzeria_adjustments() {
	echo 'hello from lapizzeria_adjustments';
}