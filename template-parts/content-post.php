<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Mecami
 */

?>
<?php $associatedMedia = get_post_meta(get_the_ID(), 'sidebar_plugin_meta_block_field'); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if (is_singular()) :
			the_title('<h1 class="entry-title">', '</h1>');
		else :
			the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
		endif; ?>
	</header><!-- .entry-header -->

	<?php
	// cami_post_thumbnail();
	?>

	<div class="entry-content">
		<div class="row">
			<div class="col-4">
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
			</div>
			<div class="col">
				<div id="project-images_carousel" style="background-color: burlywood" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#project-images_carousel" data-slide-to="0" class="active"></li>
						<li data-target="#project-images_carousel" data-slide-to="1"></li>
						<li data-target="#project-images_carousel" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner">
						<?php foreach ($associatedMedia as $key => $med) { ?>
							<div class="carousel-item<?php echo !$key ? ' active' : '' ?>">
								<img src="<?php echo wp_get_attachment_image_src($med, 'original')[0]; ?>" class="d-block w-100 img-fluid" alt="...">
							</div>
						<?php } ?>
					</div>
					<a class="carousel-control-prev" href="#project-images_carousel" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					</a>
					<a class="carousel-control-next" href="#project-images_carousel" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
					</a>
				</div>
			</div>
		</div>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->