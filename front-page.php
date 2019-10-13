<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php
		// Show the selected front page content.
		if ( have_posts() ) : ?>
			<div class="container">
				<div class="row">
					<?php while ( have_posts() ) : ?>
						<div class="col">
							<?php
								the_post();
								get_template_part( 'template-parts/page/content', 'front-page' );
							?>
						</div>
					<?php endwhile; ?>
				</div>
			</div>
		<?php else :
			get_template_part( 'template-parts/post/content', 'none' );
		endif;
		?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
