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
		// Get the ID of a given category
		$category_id = get_cat_ID('Playground');

		// Get the URL of this category
		$category_link = get_category_link($category_id);
		?>

		<!-- Print a link to this category -->
		<div class="row align-items-center">
			<h2 class="mr-3">Playground</h2>
			<a  href="<?php echo esc_url($category_link); ?>" title="Playground">View all</a>
		</div>
		<?php
		// Show the selected front page content.
		query_posts(array(
			'category_name'  => 'playground',
			'posts_per_page' => 3
		));
		if (have_posts()) : ?>
			<div class="row">
				<?php while (have_posts()) : ?>
					<div class="col">
						<?php
								the_post();
								get_template_part('template-parts/page/content', 'front-page');
								?>
					</div>
				<?php endwhile; ?>
			</div>
		<?php else :
			get_template_part('template-parts/post/content', 'none');
		endif;
		?>

		<?php
		// Get the ID of a given category
		$category_id = get_cat_ID('Insights');

		// Get the URL of this category
		$category_link = get_category_link($category_id);
		?>

		<!-- Print a link to this category -->
		<div class="row align-items-center">
			<h2 class="mr-3">Insights</h2>
			<a  href="<?php echo esc_url($category_link); ?>" title="Insights">View all</a>
		</div>
		<?php
		// Show the selected front page content.
		query_posts(array(
			'category_name'  => 'insights',
			'posts_per_page' => 3
		));
		if (have_posts()) : ?>
			<div class="row">
				<?php while (have_posts()) : ?>
					<div class="col">
						<?php
								the_post();
								get_template_part('template-parts/page/content', 'front-page');
								?>
					</div>
				<?php endwhile; ?>
			</div>
		<?php else :
			get_template_part('template-parts/post/content', 'none');
		endif;
		?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
