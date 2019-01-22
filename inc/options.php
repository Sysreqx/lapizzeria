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
