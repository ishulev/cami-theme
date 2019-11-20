<?php

/**
 * The template for displaying playground items
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Mecami
 */

get_header();
?>

<main id="main" class="site-main">
    <?php query_posts(array(
        'category_name'  => 'playground',
        'posts_per_page' => 2
    )); ?>
    <?php if (have_posts()) : ?>
        <h2>Design playground</h2>
        <div class="row">
            <div class="col-4">
                <p>Icing donut fruitcake icing powder pastry cake pudding croissant. Brownie sugar plum apple pie. Soufflé donut biscuit apple pie toffee apple pie chocolate bar pudding chocolate.</p>
                <?php
                    // Get the ID of a given category
                    $category_id = get_cat_ID('Design playground');

                    // Get the URL of this category
                    $category_link = get_category_link($category_id);
                    ?>
                <a  href="<?php echo esc_url($category_link); ?>" title="Design playground">View all design work</a>
            </div>
            <?php
                /* Start the Loop */
                while (have_posts()) : ?>
                <div class="col-4">
                    <?php the_post();
                            /*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
                            get_template_part('template-parts/page/content', 'front-page'); ?>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else :

        get_template_part('template-parts/content', 'none');

    endif;
    ?>

<?php query_posts(array(
        'category_name'  => 'development-playground',
        'posts_per_page' => 2
    )); ?>
    <?php if (have_posts()) : ?>
        <h2>Development playground</h2>
        <div class="row">
            <div class="col-4">
                <p>Icing donut fruitcake icing powder pastry cake pudding croissant. Brownie sugar plum apple pie. Soufflé donut biscuit apple pie toffee apple pie chocolate bar pudding chocolate.</p>
                <?php
                    // Get the ID of a given category
                    $category_id = get_cat_ID('Development playground');

                    // Get the URL of this category
                    $category_link = get_category_link($category_id);
                    ?>
                <a  href="<?php echo esc_url($category_link); ?>" title="Development playground">View all development work</a>
            </div>
            <?php
                /* Start the Loop */
                while (have_posts()) : ?>
                <div class="col-4">
                    <?php the_post();
                            /*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
                            get_template_part('template-parts/page/content', 'front-page'); ?>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else :

        get_template_part('template-parts/content', 'none');

    endif;
    ?>

</main><!-- #main -->

<?php
get_footer();
