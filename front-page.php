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
	<main class="content-text clear">
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

			<!-- pagination -->

			<!-- cycle -->
			<?php while ( $query->have_posts() ) : $query->the_post(); ?>
				<h2><?php the_title(); ?></h2>
			<?php endwhile; ?>
			<!-- end of the cycle -->

			<!-- pagination -->

			<?php wp_reset_postdata(); ?>

			<?php else : ?>
				<p><?php esc_html_e( 'Нет постов по вашим критериям.' ); ?></p>
			<?php endif; ?>

		</main>
	</div>


	<?php get_footer(); ?>