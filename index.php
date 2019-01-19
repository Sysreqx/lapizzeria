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

<div class="main-content container">
	<main class="text-center content-text">
		<?php while(have_posts()): the_post(); ?>

		<?php endwhile; ?>
	</main>
</div>



<?php get_footer(); ?>