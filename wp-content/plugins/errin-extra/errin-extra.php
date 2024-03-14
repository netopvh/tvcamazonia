<?php
/*
Plugin Name: Errin Extra
Plugin URI: https://codeindeed.com/plugins/errin-extra
Description: This is a helper plugin for Errin Theme.
Author: CodeIndeed
Version: 1.0.5
Author URI: https://codeindeed.com
*/

/**  Related Theme Type */

global $related_theme_type;
$related_theme_type = array('Errin','Errin Child');
//define current theme name
$current_theme = !empty( wp_get_theme() ) ? wp_get_theme()->get('Name') : '';
define('CURRENT_THEME_NAME',$current_theme);


/*
 * Define Plugin Dir Path
 * @since 1.0.0
 * */
define('ERRIN_EXTRA_SELF_PATH','errin-extra/errin-extra.php');
define('ERRIN_EXTRA_ROOT_PATH',plugin_dir_path(__FILE__));
define('ERRIN_EXTRA_ROOT_URL',plugin_dir_url(__FILE__));
define('ERRIN_EXTRA_LIB',ERRIN_EXTRA_ROOT_PATH.'/lib');
define('ERRIN_EXTRA_INC',ERRIN_EXTRA_ROOT_PATH .'/inc');
define('ERRIN_EXTRA_ADMIN',ERRIN_EXTRA_INC .'/admin');
define('ERRIN_EXTRA_ADMIN_ASSETS',ERRIN_EXTRA_ROOT_URL .'inc/admin/assets');
define('ERRIN_EXTRA_CSS',ERRIN_EXTRA_ROOT_URL .'assets/css');
define('ERRIN_EXTRA_JS',ERRIN_EXTRA_ROOT_URL .'assets/js');
define('ERRIN_EXTRA_IMG',ERRIN_EXTRA_ROOT_URL .'assets/images');
define('ERRIN_EXTRA_ELEMENTOR',ERRIN_EXTRA_INC .'/elementor');
define('ERRIN_EXTRA_SHORTCODES',ERRIN_EXTRA_INC .'/shortcodes');
define('ERRIN_EXTRA_WIDGETS',ERRIN_EXTRA_INC .'/widgets');

/** Plugin version **/
define('ERRIN_CORE_VERSION','1.0.0');

//initial file
include_once ABSPATH .'wp-admin/includes/plugin.php';

if ( is_plugin_active(ERRIN_EXTRA_SELF_PATH) ) {

	if ( !in_array(CURRENT_THEME_NAME,$GLOBALS['related_theme_type']) && file_exists(ERRIN_EXTRA_INC .'/cs-framework-functions.php') ) {
		
		require_once ERRIN_EXTRA_INC .'/cs-framework-functions.php';
		
	}

	//plugin core file include
	
	if ( file_exists(ERRIN_EXTRA_INC .'/class-errin-extra-init.php') ) {
		require_once ERRIN_EXTRA_INC .'/class-errin-extra-init.php';
	}
	
	//Demo data import 
	
	if (file_exists(ERRIN_EXTRA_INC .'/demo-import.php')){
		require_once ERRIN_EXTRA_INC .'/demo-import.php';
	}
	
	
}

/** Add Contact Methods in the User Profile **/
function errin_user_contact_methods( $user_contact ) {
	
    $user_contact['facebook']   = esc_html__( 'Facebook Profile Link', 'errin' );
    $user_contact['twitter']    = esc_html__( 'Twitter Profile', 'errin' );
    $user_contact['instagram']  = esc_html__( 'Instagram', 'errin' ); 
	$user_contact['pinterest']  = esc_html__( 'Pinterest', 'errin' );
	$user_contact['youtube']    = esc_html__( 'Youtube Profile', 'errin' );
	
    return $user_contact; 
};
add_filter( 'user_contactmethods', 'errin_user_contact_methods' );


function errin_enable_svg_upload( $upload_mimes ) {
    $upload_mimes['svg'] = 'image/svg+xml';
    $upload_mimes['svgz'] = 'image/svg+xml';
    return $upload_mimes;
}
add_filter( 'upload_mimes', 'errin_enable_svg_upload', 10, 1 );


remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
