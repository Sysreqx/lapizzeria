	<footer>
		<?php 
		$args = array(
			'theme-location' => 'header-menu',
			'container' => 'nav',
			'after' => '<span class="separator"> | </span>'
		);
		wp_nav_menu($args);
		?>

		<div class="location">
			<p><?php echo esc_html(get_option('lapizzeria_location')); ?></p>
			<p>Phone Number: <?php echo esc_html(get_option('lapizzeria_phone_number')); ?></p>
		</div>

		<div class="copyright">All rights reserved <?php echo date('Y'); ?></div>

	</footer>

	<?php wp_footer(); ?>
</body>
</html>