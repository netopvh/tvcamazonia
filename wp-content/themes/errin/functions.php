<?php
/**
 * Errin functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package errin
 */


/**
 * define theme info
 * @since 1.0.0
 * */
 
 if (is_child_theme()){
	$theme = wp_get_theme();
	$parent_theme = $theme->Template;
	$theme_info = wp_get_theme($parent_theme);
}else{
	$theme_info = wp_get_theme();
}

define('ERRIN_DEV_MODE',true);
$errin_version = ERRIN_DEV_MODE ? time() : $theme_info->get('Version');
define('ERRIN_NAME',$theme_info->get('Name'));
define('ERRIN_VERSION',$errin_version);
define('ERRIN_AUTHOR',$theme_info->get('Author'));
define('ERRIN_AUTHOR_URI',$theme_info->get('AuthorURI'));


/**
 * Define Const for theme Dir
 * @since 1.0.0
 * */

define('ERRIN_THEME_URI', get_template_directory_uri());
define('ERRIN_IMG', ERRIN_THEME_URI . '/assets/images');
define('ERRIN_CSS', ERRIN_THEME_URI . '/assets/css');
define('ERRIN_JS', ERRIN_THEME_URI . '/assets/js');
define('ERRIN_THEME_DIR', get_template_directory());
define('ERRIN_IMG_DIR', ERRIN_THEME_DIR . '/assets/images');
define('ERRIN_CSS_DIR', ERRIN_THEME_DIR . '/assets/css');
define('ERRIN_JS_DIR', ERRIN_THEME_DIR . '/assets/js');
define('ERRIN_INC', ERRIN_THEME_DIR . '/inc');
define('ERRIN_THEME_OPTIONS',ERRIN_INC .'/theme-options');
define('ERRIN_THEME_OPTIONS_IMG',ERRIN_THEME_OPTIONS .'/img');

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
*/
	 
function errin_setup(){
	
	// make the theme available for translation
	load_theme_textdomain( 'errin', get_template_directory() . '/languages' );
	
	// add support for post formats
    add_theme_support('post-formats', [
        'standard', 'image', 'video', 'audio','gallery'
    ]);

    // add support for automatic feed links
    add_theme_support('automatic-feed-links');

    // let WordPress manage the document title
    add_theme_support('title-tag');
	
	// add editor style theme support
	function errin_theme_add_editor_styles() {
		add_editor_style( 'custom-style.css' );
	}
	add_action( 'admin_init', 'errin_theme_add_editor_styles' );

    // add support for post thumbnails
    add_theme_support('post-thumbnails');
	
	// hard crop center center
    set_post_thumbnail_size(872, 547, ['center', 'center']);
	add_image_size( 'errin-gallery-thumbnail', 450, 350, true );
	
	
	// register navigation menus
    register_nav_menus(
        [
            'primary' => esc_html__('Primary Menu', 'errin'),
            'footermenu' => esc_html__('Footer Menu', 'errin'),
        ]
    );
	
	
	// HTML5 markup support for search form, comment form, and comments
    add_theme_support('html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ));
	
	
	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 150,
		'width'       => 300,
		'flex-width'  => true,
		'flex-height' => true,
	) );
	
	
	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
	
	
	/*
     * Enable support for wide alignment class for Gutenberg blocks.
     */
    add_theme_support( 'align-wide' );
    add_theme_support( 'editor-styles' );
    add_theme_support( 'wp-block-styles' );
		
}

add_action('after_setup_theme', 'errin_setup');

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
*/
 
function errin_widget_init() {
	

        register_sidebar( array (
			'name' => esc_html__('Blog widget area', 'errin'),
			'id' => 'sidebar-1',
			'description' => esc_html__('Blog Sidebar Widget.', 'errin'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title wp-block-heading">',
			'after_title' => '</h2>',
			
		) );
		
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Widget Area One', 'errin' ),
			'id'            => 'footer-widget-1',
			'description'   => esc_html__( 'Add Footer  widgets here.', 'errin' ),
			'before_widget' => '<div id="%1$s" class="footer-widget widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="f_widget_title">',
			'after_title'   => '</h3>',
		) );			

		register_sidebar( array(
			'name'          => esc_html__( 'Footer Widget Area Two', 'errin' ),
			'id'            => 'footer-widget-2',
			'description'   => esc_html__( 'Add Footer widgets here.', 'errin' ),
			'before_widget' => '<div id="%1$s" class="footer-widget widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="f_widget_title">',
			'after_title'   => '</h3>',
		) );			

		register_sidebar( array(
			'name'          => esc_html__( 'Footer Widget Area Three', 'errin' ),
			'id'            => 'footer-widget-3',
			'description'   => esc_html__( 'Add Footer widgets here.', 'errin' ),
			'before_widget' => '<div id="%1$s" class="footer-widget widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="f_widget_title">',
			'after_title'   => '</h3>',
		) );			

		register_sidebar( array(
			'name'          => esc_html__( 'Footer Widget Area Four', 'errin' ),
			'id'            => 'footer-widget-4',
			'description'   => esc_html__( 'Add Footer widgets here.', 'errin' ),
			'before_widget' => '<div id="%1$s" class="footer-widget widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="f_widget_title">',
			'after_title'   => '</h3>',
		) );
		

					
}

add_action('widgets_init', 'errin_widget_init');


/**
 * Enqueue scripts and styles.
 */
function errin_scripts() {
	wp_enqueue_style( 'icomoon-font',  ERRIN_CSS . '/icomoon-font.css' );
	wp_enqueue_style( 'remix-icon-font',  ERRIN_CSS . '/remixicon.css' );
	wp_enqueue_style( 'animate',  ERRIN_CSS . '/animate.css' );
	wp_enqueue_style( 'magnific-popup',  ERRIN_CSS . '/magnific-popup.css' );
	wp_enqueue_style( 'slick',  ERRIN_CSS . '/slick.css' );
	wp_enqueue_style( 'slicknav',  ERRIN_CSS . '/slicknav.css' );
	wp_enqueue_style( 'swiper',  ERRIN_CSS . '/swiper.min.css' );

   // theme css
	

	if (is_rtl()) {
		wp_enqueue_style( 'bootstrap', ERRIN_CSS . '/bootstrap.min.css', array(), '4.0', 'all');
		wp_enqueue_style( 'errin-main',  ERRIN_CSS . '/main.css' );
		wp_enqueue_style( 'errin-rtl',  ERRIN_CSS . '/rtl.css' );
		wp_enqueue_style( 'errin-responsive',  ERRIN_CSS . '/responsive.css' );
		
	} else {
		wp_enqueue_style( 'bootstrap', ERRIN_CSS . '/bootstrap.min.css', array(), '4.0', 'all');
		wp_enqueue_style( 'errin-main',  ERRIN_CSS . '/main.css' );
		wp_enqueue_style( 'errin-responsive',  ERRIN_CSS . '/responsive.css' );	
	}
	
	wp_enqueue_style( 'errin-style', get_stylesheet_uri() );

	
	wp_enqueue_script( 'bootstrap',  ERRIN_JS . '/bootstrap.min.js', array( 'jquery' ),  '4.0', true );
	wp_enqueue_script( 'popper',  ERRIN_JS . '/popper.min.js', array( 'jquery' ),  '1.0', true );
	wp_enqueue_script( 'jquery-magnific-popup',  ERRIN_JS . '/jquery.magnific-popup.min.js', array( 'jquery' ),  '1.0', true );
	wp_enqueue_script( 'jquery-appear',  ERRIN_JS . '/jquery.appear.min.js', array( 'jquery' ),  '1.0', true );
	wp_enqueue_script( 'jquery-easypiechart', ERRIN_JS . '/jquery.easypiechart.min.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'slick', ERRIN_JS . '/slick.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'swiper', ERRIN_JS . '/swiper.min.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'jquery-slicknav', ERRIN_JS . '/jquery.slicknav.min.js', array( 'jquery' ), '1.0', true );
	
	// Custom JS Scripts
	
	wp_enqueue_script( 'errin-scripts',  ERRIN_JS . '/scripts.js', array( 'jquery' ),  '1.0', true );
	
	wp_localize_script( 'errin-scripts', 'errin_ajax', array(
   
	'ajax_url' => admin_url( 'admin-ajax.php' ),

	) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	

}

add_action( 'wp_enqueue_scripts', 'errin_scripts' );


// Google Fonts Load

function errin_google_fonts_url()
{
    $fonts_url = '';

    /* Translators: If there are characters in your language that are not
	* supported the font, translate this to 'off'. Do not translate
	* into your own language.
	*/

    $googlefonts = _x('on', 'GoogleFonts: on or off', 'errin');

    if ('off' !== $googlefonts) {
        $font_families = array();

        if ('off' !== $googlefonts) {
			$font_families[] = 'Encode Sans Condensed:100,200,300,400,500,600,700,800,900';
            $font_families[] = 'Oxygen:300,400,700';
        }

        $query_args = array(
            'family' => urlencode(implode('|', $font_families)),
            'subset' => urlencode('latin,latin-ext'),
        );
        $fonts_url = add_query_arg($query_args, 'https://fonts.googleapis.com/css');
    }
    return esc_url_raw($fonts_url);
}

function errin_google_fonts_enqueue()
{
    wp_enqueue_style('errin-google-fonts', errin_google_fonts_url(), array(), null);
}
add_action('wp_enqueue_scripts', 'errin_google_fonts_enqueue');


/*
* Include codester helper functions
* @since 1.0.0
*/

if ( file_exists( ERRIN_INC.'/cs-framework-functions.php' ) ) {
	require_once  ERRIN_INC.'/cs-framework-functions.php';
}

/**
 * Theme option panel & Metaboxes.
*/
 if ( file_exists( ERRIN_THEME_OPTIONS.'/theme-options.php' ) ) {
	require_once  ERRIN_THEME_OPTIONS.'/theme-options.php';
}

if ( file_exists( ERRIN_THEME_OPTIONS.'/theme-metabox.php' ) ) {
	require_once  ERRIN_THEME_OPTIONS.'/theme-metabox.php';
}

if ( file_exists( ERRIN_THEME_OPTIONS.'/theme-customizer.php' ) ) {
	require_once  ERRIN_THEME_OPTIONS.'/theme-customizer.php';
}


if ( file_exists( ERRIN_THEME_OPTIONS.'/theme-inline-styles.php' ) ) {
	require_once  ERRIN_THEME_OPTIONS.'/theme-inline-styles.php';
}


/**
 * Required plugin installer 
*/
require get_template_directory() . '/inc/required-plugins.php';


/**
 * Custom template tags & functions for this theme.
*/
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/template-functions.php';

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
*/
function errin_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'errin_content_width', 640 );
}

add_action( 'after_setup_theme', 'errin_content_width', 0 );

/**
 * Nav menu fallback function
*/

function errin_fallback_menu() {
	get_template_part( 'template-parts/default', 'menu' );
}



/**
 * Post Views Count function
*/

function errin_get_views_count($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}
function errin_set_views_count($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}





