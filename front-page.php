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
		<div class="container-grid">
			<div class="columns2-4">
				<div id="map">
					<a class="dg-widget-link" href="http://2gis.kz/almaty/firm/70000001030771720/center/76.777349,
					43.232979/zoom/16?utm_medium=widget-source&utm_campaign=firmsonmap&utm_source=bigMap">Посмотреть на карте Алматы</a>
					<div class="dg-widget-link">
						<a href="http://2gis.kz/almaty/center/76.777349,
						43.232979/zoom/16/routeTab/rsType/bus/to/76.777349,
						43.232979╎La pizza & burger`s,
						кафе быстрого питания?utm_medium=widget-source&utm_campaign=firmsonmap&utm_source=route">Найти проезд до La pizza & burger`s,
					кафе быстрого питания</a>
				</div>
				<script charset="utf-8" src="https://widgets.2gis.com/js/DGWidgetLoader.js"></script>
				<script charset="utf-8">
					new DGWidgetLoader({
						"width": 400,
						"height": 600,
						"borderColor": "#a3a3a3",
						"pos": {
							"lat": 43.232979,
							"lon": 76.777349,
							"zoom": 16
						},
						"opt": { "city": "almaty" },
						"org": [{
							"id": "70000001030771720"
						}]
					});
				</script>
				<noscript style="color:#c00;font-size:16px;font-weight:bold;">Виджет карты использует JavaScript. Включите его в настройках вашего браузера.</noscript>
			</div>
		</div>

		<div class="columns2-4">
			<?php get_template_part('templates/reservation', 'form'); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>