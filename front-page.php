<?php get_header(); ?>

<!-- Checks content on the page -->
<?php while(have_posts()): the_post(); ?>

	<div class="hero" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);">
		<div class="hero-content">
			<div class="hero-text">
				<h2><?php bloginfo('description'); ?></h2>
				<?php the_content(); ?>
				<?php $url = get_page_by_title('About Us'); ?>
				<a class="button secondary" href="<?php echo get_permalink($url->ID); ?>">more info</a>
			</div>
		</div>
	</div>
<?php endwhile; ?>

<div class="main-content container">
	<main class="container-grid clear">
		<h2 class="primary-text text-center">Our Specialties</h2>
		<?php 
		$args = array(
			'posts_per_page'	=> 3,
			'post_type'				=> 'specialties',
			'category_name'		=> 'pizzas',
			'orderby'					=> 'rand'
		);

		$query = new WP_Query( $args ); ?>

		<?php if ( $query->have_posts() ) : ?>

			<?php while ( $query->have_posts() ) : $query->the_post(); ?>
				
				<div class="specialty columns1-3">
					<div class="specialty-content">
						<?php the_post_thumbnail('specialty-portrait'); ?>
						<div class="information">
							<?php the_title('<h3>', '</h3>') ?>
							<?php the_content(); ?>
							<p class="price">$<?php the_field('price'); ?></p>
							<a href="<?php the_permalink(); ?>" class="button primary">read more</a>
						</div>
					</div>
				</div>

			<?php endwhile; ?>

			<?php wp_reset_postdata(); ?>

			<?php else : ?>
				<p><?php esc_html_e( 'Нет постов по вашим критериям.' ); ?></p>
			<?php endif; ?>

		</main>
	</div>

	<section class="ingredients">
		<div class="container">
			<div class="container-grid">
				<?php while(have_posts()): the_post(); ?>

					<div class="columns2-4">
						<h3><?php the_field('ingredients'); ?></h3>
						<?php the_field('ingredients_text'); ?>
						<?php $url = get_page_by_title('About Us'); ?>
						<a class="button primary" href="<?php echo get_permalink($url->ID); ?>">read more</a>
					</div>

					<div class="columns2-4">
						<img src="<?php the_field('image'); ?>" alt="fresh ingredients">
					</div>

				<?php endwhile; ?>
			</div>
		</div>
	</section>

	<section class="container clear">
		<h2 class="primary-text text-center">Gallery</h2>
		<?php 
		$url = get_page_by_title('Gallery');
		echo get_post_gallery($url->ID);
		?>
	</section>

	<div class="location-reservation clear container">
		<div class="container-grid parent">
			<div class="columns2-4 child-l">
				<!-- MAP -->
				<div id="map" class="" style="width: 100%; min-height: 300px; height: 100%"></div>
				<script>
					DG.then(function () {
						// add map
						var map = DG.map('map', {
							center: [parseFloat(options.latitude), parseFloat(options.longtitude)],
							zoom: parseInt(options.latitude)
						});

						// latitude longtitude
						var latlng = DG.latLng(43.239982, 76.904287);
						// offset value
						var point = DG.point(-100, 5);
						// marker
						var marker = DG.marker(latlng).addTo(map);
						// popup
						var popup = DG.popup()
						.setLatLng(latlng)
						.setContent(options.popup_text)
						// label
						marker.bindLabel(options.label_text,
							{ static: false,
								offset: point
							} ).bindPopup(popup);
					});
				</script>
			</div>

			<div class="columns2-4 child-r">
				<?php get_template_part('templates/reservation', 'form'); ?>
			</div>
		</div>
	</div>

	<!-- 2is map -->
	<script>

	</script>

	<?php get_footer(); ?>