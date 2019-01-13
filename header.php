<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>La Pizzeria</title>
	<?php wp_head(); ?>
</head>
<body>

	<header class="site-header">
		<div class="logo"><a href="<?php echo esc_url(home_url('/') ); ?>"><img src="<?php echo get_template_directory_uri() ?>/img/logo.svg" alt="logo" class="logoimage"></a></div>
	</header>
