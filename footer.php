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
			<p>8179 Bay Avenue  Mountain View, CA 94043</p>
			<p>Phone Number: +1-92-456-7890</p>
		</div>

		<div class="copyright">All rights reserved <?php echo date('Y'); ?></div>

	</footer>

	<?php wp_footer(); ?>
</body>
</html>