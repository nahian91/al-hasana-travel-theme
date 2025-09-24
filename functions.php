<?php
/**
 * alhasanatheme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package alhasanatheme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function alhasanatheme_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on alhasanatheme, use a find and replace
		* to change 'alhasanatheme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'alhasanatheme', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'alhasanatheme' ),
			'footer-1' => esc_html__( 'Footer 1', 'alhasanatheme' ),
			'footer-2' => esc_html__( 'Footer 2', 'alhasanatheme' ),
			'footer-3' => esc_html__( 'Footer 3', 'alhasanatheme' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'alhasanatheme_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'alhasanatheme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function alhasanatheme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'alhasanatheme_content_width', 640 );
}
add_action( 'after_setup_theme', 'alhasanatheme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function alhasanatheme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'alhasanatheme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'alhasanatheme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'alhasanatheme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function alhasanatheme_scripts() {

	wp_enqueue_style('alhasanatheme-bootstrap',get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), _S_VERSION);
	wp_enqueue_style('alhasanatheme-all',get_template_directory_uri() . '/assets/css/all.min.css', array(), _S_VERSION);
	wp_enqueue_style('alhasanatheme-animate',get_template_directory_uri() . '/assets/css/animate.css', array(), _S_VERSION);
	wp_enqueue_style('alhasanatheme-slick',get_template_directory_uri() . '/assets/css/slicknav.min.css', array(), _S_VERSION);
	wp_enqueue_style('alhasanatheme-magnific-popup',get_template_directory_uri() . '/assets/css/magnific-popup.css', array(), _S_VERSION);
	wp_enqueue_style('alhasanatheme-swiper-bundle',get_template_directory_uri() . '/assets/css/swiper-bundle.min.css', array(), _S_VERSION);
	wp_enqueue_style('alhasanatheme-main',get_template_directory_uri() . '/assets/css/main.css', array(), _S_VERSION);
	
	wp_enqueue_script( 'alhasanatheme-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'alhasanatheme-waypoints', get_template_directory_uri() . '/assets/js/jquery.waypoints.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'alhasanatheme-slicknav', get_template_directory_uri() . '/assets/js/jquery.slicknav.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'alhasanatheme-swiper-bundle', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'alhasanatheme-magnific-popup', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'alhasanatheme-wow', get_template_directory_uri() . '/assets/js/wow.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'alhasanatheme-main', get_template_directory_uri() . '/assets/js/main.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'alhasanatheme_scripts' );

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
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Register CPTs: Tour & Visa Services
 */
function alhasana_register_cpts() {

    /**
     * ===== TOUR CPT =====
     */
    $tour_labels = array(
        'name'               => __( 'Tours', 'alhasanatheme' ),
        'singular_name'      => __( 'Tour', 'alhasanatheme' ),
        'menu_name'          => __( 'Tours', 'alhasanatheme' ),
        'add_new'            => __( 'Add New Tour', 'alhasanatheme' ),
        'add_new_item'       => __( 'Add New Tour', 'alhasanatheme' ),
        'edit_item'          => __( 'Edit Tour', 'alhasanatheme' ),
        'new_item'           => __( 'New Tour', 'alhasanatheme' ),
        'all_items'          => __( 'All Tours', 'alhasanatheme' ),
        'view_item'          => __( 'View Tour', 'alhasanatheme' ),
        'search_items'       => __( 'Search Tours', 'alhasanatheme' ),
        'not_found'          => __( 'No Tours found', 'alhasanatheme' ),
        'not_found_in_trash' => __( 'No Tours found in Trash', 'alhasanatheme' ),
    );

    $tour_args = array(
        'labels'             => $tour_labels,
        'public'             => true,
        'menu_icon'          => 'dashicons-palmtree',
        'supports'           => array( 'title', 'thumbnail', 'custom-fields' ),
        'has_archive'        => true,
        'rewrite'            => array( 'slug' => 'tours' ),
        'show_in_rest'       => true,
    );
    register_post_type( 'tour', $tour_args );


    /**
     * ===== VISA SERVICES CPT =====
     */
    $visa_labels = array(
        'name'               => __( 'Visa Services', 'alhasanatheme' ),
        'singular_name'      => __( 'Visa Service', 'alhasanatheme' ),
        'menu_name'          => __( 'Visa Services', 'alhasanatheme' ),
        'add_new'            => __( 'Add New Visa', 'alhasanatheme' ),
        'add_new_item'       => __( 'Add New Visa Service', 'alhasanatheme' ),
        'edit_item'          => __( 'Edit Visa Service', 'alhasanatheme' ),
        'new_item'           => __( 'New Visa Service', 'alhasanatheme' ),
        'all_items'          => __( 'All Visa Services', 'alhasanatheme' ),
        'view_item'          => __( 'View Visa Service', 'alhasanatheme' ),
        'search_items'       => __( 'Search Visa Services', 'alhasanatheme' ),
        'not_found'          => __( 'No Visa Services found', 'alhasanatheme' ),
        'not_found_in_trash' => __( 'No Visa Services found in Trash', 'alhasanatheme' ),
    );

    $visa_args = array(
        'labels'             => $visa_labels,
        'public'             => true,
        'menu_icon'          => 'dashicons-id',
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'has_archive'        => true,
        'rewrite'            => array( 'slug' => 'visas-service' ),
        'show_in_rest'       => true,
    );
    register_post_type( 'visa-service', $visa_args );


    /**
     * ===== TOUR CATEGORY TAXONOMY =====
     */
    $tour_cat_labels = array(
        'name'              => __( 'Tour Categories', 'alhasanatheme' ),
        'singular_name'     => __( 'Tour Category', 'alhasanatheme' ),
        'search_items'      => __( 'Search Tour Categories', 'alhasanatheme' ),
        'all_items'         => __( 'All Tour Categories', 'alhasanatheme' ),
        'edit_item'         => __( 'Edit Tour Category', 'alhasanatheme' ),
        'update_item'       => __( 'Update Tour Category', 'alhasanatheme' ),
        'add_new_item'      => __( 'Add New Tour Category', 'alhasanatheme' ),
        'new_item_name'     => __( 'New Tour Category', 'alhasanatheme' ),
        'menu_name'         => __( 'Tour Categories', 'alhasanatheme' ),
    );
    register_taxonomy( 'tour_category', array( 'tour' ), array(
        'hierarchical'      => true,
        'labels'            => $tour_cat_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'rewrite'           => array( 'slug' => 'tour-category' ),
        'show_in_rest'      => true,
    ) );


    /**
     * ===== VISA CATEGORY TAXONOMY =====
     */
    $visa_cat_labels = array(
        'name'              => __( 'Visa Categories', 'alhasanatheme' ),
        'singular_name'     => __( 'Visa Category', 'alhasanatheme' ),
        'search_items'      => __( 'Search Visa Categories', 'alhasanatheme' ),
        'all_items'         => __( 'All Visa Categories', 'alhasanatheme' ),
        'edit_item'         => __( 'Edit Visa Category', 'alhasanatheme' ),
        'update_item'       => __( 'Update Visa Category', 'alhasanatheme' ),
        'add_new_item'      => __( 'Add New Visa Category', 'alhasanatheme' ),
        'new_item_name'     => __( 'New Visa Category', 'alhasanatheme' ),
        'menu_name'         => __( 'Visa Categories', 'alhasanatheme' ),
    );
    register_taxonomy( 'visa-category', array( 'visa-service' ), array(
        'hierarchical'      => true,
        'labels'            => $visa_cat_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'rewrite'           => array( 'slug' => 'visa-category' ),
        'show_in_rest'      => true,
    ) );

}
add_action( 'init', 'alhasana_register_cpts' );

// Save ACF JSON
add_filter('acf/settings/save_json', function( $path ) {
    return get_stylesheet_directory() . '/acf-json';
});

// Load ACF JSON
add_filter('acf/settings/load_json', function( $paths ) {
    $paths[] = get_stylesheet_directory() . '/acf-json';
    return $paths;
});

/**
 * Allow SVG mime type
 */
add_filter( 'upload_mimes', function( $mimes ) {
    $mimes['svg']  = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    return $mimes;
} );