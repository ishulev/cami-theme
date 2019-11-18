<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Mecami
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1><?php $associatedMedia = get_post_meta(get_the_ID(), 'sidebar_plugin_meta_block_field');
			print_r($associatedMedia); ?></h1>
		<?php foreach ($associatedMedia as $med) {
			echo wp_get_attachment_image_src($med)[0];
		} ?>

		<?php if ( is_singular() ) :
		the_title( '<h1 class="entry-title">', '</h1>' );
		else :
		the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif; ?>
	</header><!-- .entry-header -->

	<?php cami_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content(sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'cami'),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		));

		wp_link_pages(array(
			'before' => '<div class="page-links">' . esc_html__('Pages:', 'cami'),
			'after'  => '</div>',
		));
		?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->