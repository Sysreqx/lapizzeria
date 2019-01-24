<?php 
function lapizzeria_options() {
	 // 						$page_title, 	$menu_title, 					$capability, 	$menu_slug, 					$function = '', 	$icon_url = '', $position = null 
	add_menu_page( 'La Pizzeria', 'La Pizeeria Options', 'administrator', 'lapizzeria_options', 'lapizzeria_adjustments', '', 20 );
	 // 							$parent_slug, 					$page_title, 	$menu_title,		 $capability, 			$menu_slug, 							$function = '' 
	add_submenu_page( 'lapizzeria_options', 'Reservations', 'Reservations', 'administrator', 'lapizzeria_reservations', 'lapizzeria_reservations' );
}
add_action('admin_menu', 'lapizzeria_options');

function lapizzeria_settings() {
	// Map Settings Group
	register_setting('lapizzeria_options_gmaps', 'lapizzeria_gmap_latitude');
	register_setting('lapizzeria_options_gmaps', 'lapizzeria_gmap_longtitude');
	register_setting('lapizzeria_options_gmaps', 'lapizzeria_gmap_popup_text');
	register_setting('lapizzeria_options_gmaps', 'lapizzeria_gmap_label_text');
	register_setting('lapizzeria_options_gmaps', 'lapizzeria_gmap_zoom');

	// Information Group
	register_setting('lapizzeria_options_info', 'lapizzeria_location');
	register_setting('lapizzeria_options_info', 'lapizzeria_phone_number');
}
add_action('admin_init', 'lapizzeria_settings');

function lapizzeria_adjustments() { ?>
	<div class="wrap">
		<h1>La Pizzeria Adjustments</h1>
		<form method="POST" action="options.php">

			<?php 
			settings_fields('lapizzeria_options_gmaps');
			do_settings_sections('lapizzeria_options_gmaps')
			?>
			<h2>Google Maps</h2>
			<table class="form-table">
				<tr valign="top">
					<th scope="row">Latitude: </th>
					<td><input type="text" name="lapizzeria_gmap_latitude" value="<?php echo esc_attr(get_option('lapizzeria_gmap_latitude')); ?>"></td>
				</tr>
				<tr valign="top">
					<th scope="row">Longtitude: </th>
					<td><input type="text" name="lapizzeria_gmap_longtitude" value="<?php echo esc_attr(get_option('lapizzeria_gmap_longtitude')); ?>"></td>
				</tr>
				<tr valign="top">
					<th scope="row">PopUp Text: </th>
					<td><input type="text" name="lapizzeria_gmap_popup_text" value="<?php echo esc_attr(get_option('lapizzeria_gmap_popup_text')); ?>"></td>
				</tr>
				<tr valign="top">
					<th scope="row">Label Text: </th>
					<td><input type="text" name="lapizzeria_gmap_label_text" value="<?php echo esc_attr(get_option('lapizzeria_gmap_label_text')); ?>"></td>
				</tr>
				<tr valign="top">
					<th scope="row">Zoom Level: </th>
					<td><input type="text" name="lapizzeria_gmap_zoom" value="<?php echo esc_attr(get_option('lapizzeria_gmap_zoom')); ?>"></td>
				</tr>
			</table>

			<?php 
			settings_fields('lapizzeria_options_info');
			do_settings_sections('lapizzeria_options_info')
			?>
			<h2>Header/Footer Information</h2>
			<table class="form-table">
				<tr valign="top">
					<th scope="row">Address: </th>
					<td><input type="text" name="lapizzeria_location" value="<?php echo esc_attr(get_option('lapizzeria_location')); ?>"></td>
				</tr>
				<tr valign="top">
					<th scope="row">Phone Number: </th>
					<td><input type="text" name="lapizzeria_phone_number" value="<?php echo esc_attr(get_option('lapizzeria_phone_number')); ?>"></td>
				</tr>
			</table>

			<?php submit_button(); ?>

		</form>
	</div>
<?php }

function lapizzeria_reservations() { ?>
	<!-- provided by wordpress class "wrap" -->
	<div class="wrap">
		<h1>Reservations</h1>
		<table class="wp-list-table widefat stripped">
			<thead>
				<tr>
					<th class="manage-column">ID</th>
					<th class="manage-column">Name</th>
					<th class="manage-column">Date of Reservation</th>
					<th class="manage-column">Email</th>
					<th class="manage-column">Phone Number</th>
					<th class="manage-column">Message</th>
				</tr>
			</thead>

			<tbody>
				<?php 
				global $wpdb;
				$table = $wpdb->prefix . 'reservations';
				$reservations = $wpdb->get_results("SELECT * FROM $table", ARRAY_A);

				foreach ($reservations as $reservation) : ?>
					<tr>
						<td><?php echo $reservation['id']; ?></td>
						<td><?php echo $reservation['name']; ?></td>
						<td><?php echo $reservation['date']; ?></td>
						<td><?php echo $reservation['email']; ?></td>
						<td><?php echo $reservation['phone']; ?></td>
						<td><?php echo $reservation['message']; ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

<?php } ?>
