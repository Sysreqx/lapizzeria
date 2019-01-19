<?php get_header(); ?>

<?php 
//returns id
$blog_page = get_option('page_for_posts');
$image = get_post_thumbnail_id($blog_page);
// return image
$image = wp_get_attachment_image_src($image, 'full');
?>

<!-- Checks content on the page -->
<div class="hero" style="background-image: url(<?php echo $image[0]; ?>);">
	<div class="hero-content">
		<div class="hero-text">
			<h2><?php get_the_title($blog_page); ?></h2>
		</div>
	</div>
</div>

<div class="main-content container clear">
	<div class="container-grid columns2-3">
		
		<main class="content-text">
			<?php while(have_posts()): the_post(); ?>
				<article class="entry">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail('specialties'); ?>
					</a>

					<header class="entry-header clear">
						<div class="date">
							<time>
								<?php echo the_time('d'); ?>
								<span><?php echo the_time('M'); ?></span>
							</time>
						</div> <!-- .date -->
						<div class="entry-title">
							<?php the_title('<h2>', '</h2>'); ?>

							<p class="author">
								<i class="fa fa-user" aria-hidden="true"></i>
								<?php the_author(); ?>
							</p><!-- .author -->
						</div> 
					</header>
					<div class="entry-content">
						<?php the_excerpt();  ?>

						<a href="<?php the_permalink(); ?>" class="button primary">Read More</a>
					</div>
				</article>
			<?php endwhile; ?>
		</main>

	</div>
</div>



<?php get_footer(); ?>