<?php

/**
 * Mecami functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Mecami
 */

if (!function_exists('cami_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function cami_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Mecami, use a find and replace
		 * to change 'cami' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('cami', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(array(
			'menu-1' => esc_html__('Primary', 'cami'),
		));

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support('html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		));

		// Set up the WordPress core custom background feature.
		add_theme_support('custom-background', apply_filters('cami_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		)));

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support('custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		));
	}
endif;
add_action('after_setup_theme', 'cami_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cami_content_width()
{
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters('cami_content_width', 640);
}
add_action('after_setup_theme', 'cami_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cami_widgets_init()
{
	register_sidebar(array(
		'name'          => esc_html__('Sidebar', 'cami'),
		'id'            => 'sidebar-1',
		'description'   => esc_html__('Add widgets here.', 'cami'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));
}
add_action('widgets_init', 'cami_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function cami_scripts()
{
	wp_enqueue_style('cami-style', get_stylesheet_uri());

	wp_enqueue_script('cami-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true);

	wp_enqueue_script('cami-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);

	wp_enqueue_script('cami-bs-util', get_template_directory_uri() . '/js/util.js', array('jquery'), '20151214', true);
	wp_enqueue_script('cami-bs-collapse', get_template_directory_uri() . '/js/collapse.js', array('jquery', 'cami-bs-util'), '20151215', true);
	wp_enqueue_script('cami-bs-carousel', get_template_directory_uri() . '/js/carousel.js', array('jquery', 'cami-bs-util'), '20151216', true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'cami_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

function cami_menu_li_add_class($classes, $item, $args)
{
	if ($args->theme_location == 'menu-1') {
		if (in_array('current-menu-item', $classes)) {
			$classes[] = 'active ';
		}
		$classes[] = 'nav-item';
	}
	return $classes;
}
add_filter('nav_menu_css_class', 'cami_menu_li_add_class', 1, 3);

function cami_menu_anchor_add_class($atts, $item, $args)
{
	$atts['class'] = 'nav-link';
	return $atts;
}
add_filter('nav_menu_link_attributes', 'cami_menu_anchor_add_class', 10, 3);
function cami_add_google_fonts()
{
	wp_enqueue_style('cami-google-fonts', 'https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap', false);
}

add_action('wp_enqueue_scripts', 'cami_add_google_fonts');

function sidebar_plugin_register()
{
	wp_register_script(
		'plugin-sidebar-js',
		get_template_directory_uri() . '/js/dist/plugin.js',
		array(
			'wp-plugins',
			'wp-edit-post',
			'wp-element',
			'wp-components',
			'wp-data',
			'wp-polyfill',
		)
	);
}
add_action('init', 'sidebar_plugin_register');

function sidebar_plugin_script_enqueue()
{
	wp_enqueue_script('plugin-sidebar-js');
}
add_action('enqueue_block_editor_assets', 'sidebar_plugin_script_enqueue');

register_post_meta('post', 'sidebar_plugin_meta_block_field', array(
	'show_in_rest' => true,
	'type' => 'string',
	'single' => false
));
