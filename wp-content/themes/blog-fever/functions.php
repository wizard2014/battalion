<?php
/**
 * Blog Fever functions and definitions
 *
 * @package Blog Fever
 */


if ( ! function_exists( 'blog_fever_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */

function blog_fever_setup() {

	/**
	 * Set the content width based on the Blog Fever theme's design and stylesheet.
	 */
	if ( ! isset( $content_width ) ) {
		$content_width = 840; /* pixels */
	}
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Blog Fever, use a find and replace
	 * to change 'blog-fever' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'blog-fever', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size('large-thumb',840,650, true);
	add_image_size('index-thumb',840,250, true);


	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Menu', 'blog-fever' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside'
	) );

	// // Set up the WordPress core custom background feature.
	// add_theme_support( 'custom-background', apply_filters( 'blog_fever_custom_background_args', array(
	// 	'default-color' => 'ffffff',
	// 	'default-image' => '',
	// ) ) );
}
endif; // blog_fever_setup
add_action( 'after_setup_theme', 'blog_fever_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function blog_fever_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'blog-fever' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'blog_fever_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function blog_fever_scripts() {
	wp_enqueue_style( 'blog-fever-style', get_stylesheet_uri() );

	//wp_enqueue_style ('blog-fever-google-fonts', 'http://fonts.googleapis.com/css?family=Droid+Sans:400,700|Cuprum:400,400italic,700');

	// Registering Google fonts

	function blog_fever_fonts_url() {
    $fonts_url = '';
 
	    /* Translators: If there are characters in your language that are not
	    * supported by Droid Sans, translate this to 'off'. Do not translate
	    * into your own language.
	    */
	    $droid_sans = _x( 'on', 'Droid Sans font: on or off', 'theme-slug' );
	 
	    /* Translators: If there are characters in your language that are not
	    * supported by Cuprum, translate this to 'off'. Do not translate
	    * into your own language.
	    */
	    $cuprum = _x( 'on', 'Cuprum font: on or off', 'theme-slug' );
	 
	    if ( 'off' !== $droid_sans || 'off' !== $cuprum ) {
	        $font_families = array();
	 
	        if ( 'off' !== $droid_sans ) {
	            $font_families[] = 'Droid Sans:400,700';
	        }
	 
	        if ( 'off' !== $cuprum ) {
	            $font_families[] = 'Cuprum:400,400italic,700';
	        }
	 
	        $query_args = array(
	            'family' => urlencode( implode( '|', $font_families ) ),
	            'subset' => urlencode( 'latin,latin-ext' ),
	        );
	 
	        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
	    }
	 	
	    return $fonts_url;
	}

	function blog_fever_scripts_styles() {
    wp_enqueue_style( 'theme-slug-fonts', blog_fever_fonts_url(), array(), null );
	}
	
    // End of Google fonts

	wp_enqueue_script( 'blog-fever-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20150102', true );

	wp_enqueue_script( 'blog-fever-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20150102', true );
	
	wp_enqueue_script( 'accordion-mobile', get_template_directory_uri() . '/js/accordion-mobile.js', array(), '20150102', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'blog_fever_scripts' );
	add_action( 'wp_enqueue_scripts', 'blog_fever_scripts_styles' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
