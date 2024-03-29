<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Mecami
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="site container">
		<a hidden class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'cami'); ?></a>

		<header id="masthead" class="site-header">
			<div class="site-branding">
				<nav class="navbar navbar-light navbar-expand-lg">
					<a class="navbar-brand" href="<?php echo home_url() ?>">
						<?php
						$custom_logo_id = get_theme_mod('custom_logo');
						$logo = wp_get_attachment_image_src($custom_logo_id, 'full'); ?>
						<?php if (has_custom_logo()) :
							echo '<img width="200px" src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '">';
						else :
							echo '<h1>' . get_bloginfo('name') . '</h1>';
						endif
						?>
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<?php
					wp_nav_menu(array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
						'container_class' => 'collapse navbar-collapse',
						'container_id'	 => 'navbarNavDropdown',
						'menu_class'	 => 'navbar-nav ml-auto'
					));
					?>
				</nav>
			</div><!-- .site-branding -->

		</header><!-- #masthead -->

		<div id="content" class="site-content">