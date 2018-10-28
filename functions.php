<?php
/**
 * Intensiv functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Intensiv
 */

if ( ! function_exists( 'intensiv_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function intensiv_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Intensiv, use a find and replace
		 * to change 'intensiv' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'intensiv', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'intensiv' ),
			'footerfirst' => esc_html__( 'Support Menu', 'intensiv' ),
			'footersecond' => esc_html__( 'Footer Menu', 'intensiv' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'intensiv_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'intensiv_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function intensiv_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'intensiv_content_width', 640 );
}
add_action( 'after_setup_theme', 'intensiv_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function intensiv_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'intensiv' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'intensiv' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'intensiv_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function intensiv_scripts() {
	wp_enqueue_script('jquery');
	wp_enqueue_style( 'intensiv-style', get_stylesheet_uri() );
	wp_enqueue_style('intensiv-components', get_template_directory_uri() . '/layouts/component.css');
	wp_enqueue_style('flexslider', get_template_directory_uri() . '/layouts/flexslider.css');
	wp_enqueue_style('prettyPhoto', get_template_directory_uri() . '/layouts/prettyPhoto.css');
	wp_enqueue_style('intensiv-main', get_template_directory_uri() . '/layouts/style.css');


	wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/js/libs/jquery.flexslider.js', array(), '', false );
	wp_enqueue_script( 'prettyPhoto', get_template_directory_uri() . '/js/libs/jquery.prettyPhoto.js', array(), '', false );
	wp_enqueue_script( 'responsiveTabs', get_template_directory_uri() . '/js/libs/jquery.responsiveTabs.js', array(), '', false );
	wp_enqueue_script( 'modernizr.custom', get_template_directory_uri() . '/js/libs/modernizr.custom.js', array(), '', false );
	wp_enqueue_script( 'isotope', get_template_directory_uri() . '/js/libs/isotope.pkgd.min.js', array(), '', false );
	wp_enqueue_script( 'jquery.imagesloaded.min', get_template_directory_uri() . '/js/libs/jquery.imagesloaded.min.js', array(), '', false );


	wp_enqueue_script( 'intensiv-script', get_template_directory_uri() . '/js/script.js', array(), '', false );

	wp_enqueue_script( 'intensiv-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'intensiv_scripts' );


function ale_add_scripts($hook) {
	if ( $hook == 'post.php' || $hook == 'post-new.php' || $hook == 'page-new.php' || $hook == 'page.php' ) {
		wp_enqueue_script( 'aletheme_metaboxes',
			get_template_directory_uri() . '/inc/js/metaboxes.js',
			array( 'jquery', 'jquery-ui-core', 'jquery-ui-datepicker', 'media-upload', 'thickbox' ) );
	}
}
add_action( 'admin_enqueue_scripts', 'ale_add_scripts', 10 );

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
 * Register Post Type.
 */
require get_template_directory() . '/inc/post-type.php';

/**
 * Redux Options Panel.
 */
require get_template_directory() . '/inc/sample-config.php';

/**
 * Breadcrumbs function.
 */
require get_template_directory() . '/inc/breadcrumbs.php';

/**
 * Metabox function.
 */
require get_template_directory() . '/inc/metaboxes.php';

/**
 * Filter function.
 */
require get_template_directory() . '/inc/filter.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}



