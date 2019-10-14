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
        'category_name'  => 'design-playground',
        'posts_per_page' => 4
    )); ?>
    <?php if (have_posts()) : ?>
        <h2>Design playground</h2>
        <div class="row">
            <div class="col-4">
                <p>Chocolate soufflé biscuit. Wafer croissant tart toffee pudding ice cream. Wafer chupa chups gingerbread topping sweet roll bonbon. Toffee marshmallow bear claw chocolate bar macaroon.</p>
                <?php
                    // Get the ID of a given category
                    $category_id = get_cat_ID('Playground');

                    // Get the URL of this category
                    $category_link = get_category_link($category_id);
                    ?>
                <a href="<?php echo esc_url($category_link); ?>" title="Playground">Back to main playground</a>
            </div>
            <div class="col-8">
                <div class="row">
                    <?php
                        $i = 0;
                        /* Start the Loop */
                        while (have_posts()) : ?>
                        <?php if ($i === 2) : ?>
                            </div>
                            <div class="row">
                        <?php endif; ?>
                        <div class="col-6">
                            <?php the_post();
                            get_template_part('template-parts/page/content', 'front-page');
                            $i++; ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    <?php else :

        get_template_part('template-parts/content', 'none');

    endif;
    ?>

</main><!-- #main -->

<?php
get_footer();
