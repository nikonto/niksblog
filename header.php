
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php bloginfo('name'); ?></title>
	<?php wp_head(); ?>
</head>
<body  <?php body_class(); ?>>

	<div class="contain">
		<header class="site-header">
			<!--header search-->
			<div class="hd-search">
				<?php get_search_form()?>
			</div><!--header search-->
			<h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
			<h5><?php bloginfo('description'); ?>
				<?php if(is_page('data-structure')) {?>
					-Where data organazation begins...
				<?php } ?>

				<?php if(is_page('algorithm')) {?>
					-All maters computation speed...
				<?php } ?>

				<?php if(is_page('networking')) {?>
					-World is connected via it...
				<?php } ?>
			</h5>
			
			<nav class="site-nav">
				<?php
					$args = array(
					'theme_location' => 'primary'
					);
				?>
				<?php wp_nav_menu( $args ); ?>
			</nav>
		</header>
		
	

