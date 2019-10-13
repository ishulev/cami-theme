<?php
/**
 * Displays content for front page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<article id="post-<?php the_ID(); ?>">

	<?php
	if ( has_post_thumbnail() ) :
		?>
		<div class="hvrbox">
			<img src="<?php the_post_thumbnail_url() ?>" class="img-fluid hvrbox-layer_bottom" alt="">
			<div class="hvrbox-layer_top">
				<div class="hvrbox-text"><?php the_title( '<h2 class="entry-title">', '</h2>' ); ?></div>
			</div>
		</div>

	<?php endif; ?>

	<div class="panel-content">
		<div class="wrap">
			<header class="entry-header">
				<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>


			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php
					/* translators: %s: Name of current post */
					the_content(
						sprintf(
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
							get_the_title()
						)
					);
					?>
			</div><!-- .entry-content -->

		</div><!-- .wrap -->
	</div><!-- .panel-content -->

</article><!-- #post-<?php the_ID(); ?> -->
