<?php
/**
 * @package Errin
 * @sicne 1.0.0
 * */

if (!class_exists('Errin_Extra_Init')){

	class Errin_Extra_Init{

	//instance
	protected static $instance;

	public function __construct() {
		//plugin_assets
		add_action('wp_enqueue_scripts',array($this,'plugin_assets'));
		//plugin admin assets
		add_action('admin_enqueue_scripts',array($this,'plugin_admin_assets'));
		//load plugin dependency files
		self::load_plugin_dependency_files();
	}

	/**
	 * getInstance()
	 * @since 1.0.0
	 * */
	public static function getInstance(){
		if (null == self::$instance){
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * plugin_assets()
	 * @since 1.0.0
	 * */
	public function plugin_assets(){
		self::load_plugin_css();
		self::load_plugin_js();
	}
	/**
	 * plugin_admin_assets()
	 * @since 1.0.0
	 * */
	public function plugin_admin_assets(){
		self::load_plugin_admin_css();
		self::load_plugin_admin_js();
	}

	/**
	 * load plugin css
	 * @since 1.0.0
	 * */
	public function load_plugin_css(){
		wp_enqueue_style( 'errin-elements', ERRIN_EXTRA_CSS.'/custom-elements.css');
		
	}
	/**
	 * load plugin js
	 * @since 1.0.0
	 * */
	public function load_plugin_js(){

		wp_enqueue_script( 'errin-elementor', ERRIN_EXTRA_JS.'/elementor.js', array( 'jquery' ), '20190829', true );
	
	}
	/**
	 * load plugin admin css
	 * @since 1.0.0
	 * */
	public function load_plugin_admin_css(){

	}
	/**
	 * load plugin admin js
	 * @since 1.0.0
	 * */
	public function load_plugin_admin_js(){

	}

	/**
	 * load_plugin_dependency_files()
	 * @since 1.0.0
	 * */
	public function load_plugin_dependency_files(){

		if ( file_exists(ERRIN_EXTRA_LIB.'/codestar-framework/codestar-framework.php') ) {
			require_once  ERRIN_EXTRA_LIB.'/codestar-framework/codestar-framework.php';
		}
		
		if ( file_exists(ERRIN_EXTRA_ELEMENTOR.'/class-elementor-widgets-init.php') ) {
			require_once  ERRIN_EXTRA_ELEMENTOR.'/class-elementor-widgets-init.php';
		}
	
		
		if ( file_exists(ERRIN_EXTRA_WIDGETS.'/recent-posts.php') ) {
			require_once  ERRIN_EXTRA_WIDGETS.'/recent-posts.php';
		}

		if ( file_exists(ERRIN_EXTRA_WIDGETS.'/newsletter.php') ) {
			require_once  ERRIN_EXTRA_WIDGETS.'/newsletter.php';
		}

		if ( file_exists(ERRIN_EXTRA_WIDGETS.'/about-author.php') ) {
			require_once  ERRIN_EXTRA_WIDGETS.'/about-author.php';
		}

		if ( file_exists(ERRIN_EXTRA_WIDGETS.'/footer-socials.php') ) {
			require_once  ERRIN_EXTRA_WIDGETS.'/footer-socials.php';
		}

	}

	}//end class
}

if ( class_exists('Errin_Extra_Init')){
	Errin_Extra_Init::getInstance();
}