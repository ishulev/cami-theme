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
			<a href="<?php echo get_permalink() ?>">
				<img src="<?php the_post_thumbnail_url() ?>" class="img-fluid hvrbox-layer_bottom" alt="">
				<div class="hvrbox-layer_top">
					<div class="hvrbox-text"><?php the_title( '<h2 class="entry-title">', '</h2>' ); ?></div>
				</div>
			</a>
		</div>

	<?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->
