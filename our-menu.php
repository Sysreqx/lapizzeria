<?php 
/*
* Template Name: Our Specialties
*/
?>

<?php get_header(); ?>

<!-- Checks content on the page -->
<?php while(have_posts()): the_post(); ?>

	<div class="hero" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);">
		<div class="hero-content">
			<div class="hero-text">
				<h2><?php the_title(); ?></h2>
			</div>
		</div>
	</div>

	<div class="main-content container">
		<main class="text-center content-text">
			<?php the_content(); ?>
		</main>
	</div>

<?php endwhile; ?>

<div class="our-specialties container">
	<h3 class="primary-text">Pizzas</h3>
	<div class="container-grid">
		<?php 
		$args = array(
			'post_type' => 'specialties',
			'posts_per_page' => 10,
			'orderby' => 'title',
			'order' => 'ASC'
		);
		$pizzas = new WP_Query($args);
		while ($pizzas->have_posts()) : $pizzas->the_post(); ?>
		
		<h2><?php the_title(); ?></h2>

		<?php endwhile; wp_reset_postdata(); ?>
	</div>
</div>

<?php get_footer(); ?>