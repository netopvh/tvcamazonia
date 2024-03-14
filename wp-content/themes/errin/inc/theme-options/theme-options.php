<?php
/*
 * Theme Options
 * @package Errin
 * @since 1.0.0
 * */

if ( !defined('ABSPATH') ){
    exit(); // exit if access directly
}

if( class_exists( 'CSF' ) ) {

  //
  // Set a unique slug-like ID
  $prefix = 'errin';

  //
  // Create options
  CSF::createOptions( $prefix.'_theme_options', array(
    'menu_title' => esc_html__('Theme Option','errin'),
    'menu_slug'  => 'errin-theme-option',
    'menu_type' => 'menu',
    'enqueue_webfont'         => true,
    'show_footer' => false,
    'framework_title'      => esc_html__('Errin Theme Options','errin'),
  ) );

  //
  // Create a section
  CSF::createSection( $prefix.'_theme_options', array(
    'title'  => esc_html__('General','errin'),
    'icon'  => 'fa fa-wrench',
    'fields' => array(

		array(
			'type' => 'subheading',
			'content' => '<h3>' . esc_html__('Site Logo', 'errin') . '</h3>',
		) ,
			
		array(
			'id' => 'theme_logo',
			'title' => esc_html__('Main Logo','errin'),
			'type' => 'media',
			'library' => 'image',
			'desc' => esc_html__('Upload Your Static Logo Image on Header Static', 'errin')
		), 
		
		
		array(
			'id' => 'logo_width',
			'type' => 'slider',
			'title' => esc_html__('Set Logo Width','errin'),
			'min' => 0,
			'max' => 300,
			'step' => 1,
			'unit' => 'px',
			'default' => 145,
			'desc' => esc_html__('Set Logo Width in px. Default Width 184px.', 'errin') ,
      'output' => array(".theme-logo img"),
		) ,
		
	  
      array(
        'type' => 'subheading',
        'content' =>'<h3>'.esc_html__('Preloader','errin').'</h3>'
      ),
	  
	  
      array(
        'id' => 'preloader_enable',
        'title' => esc_html__('Enable Preloader','errin'),
        'type' => 'switcher',
        'desc' => esc_html__('Enable or Disable Preloader', 'errin') ,
        'default' => true,
      ),
	  
      array(
        'type' => 'subheading',
        'content' =>'<h3>'.esc_html__('Back Top Options','errin').'</h3>'
      ),
	  
	  
      array(
        'id' => 'back_top_enable',
        'title' => esc_html__('Scroll Top Button','errin'),
        'type' => 'switcher',
        'desc' => esc_html__('Enable or Disable scroll button', 'errin') ,
        'default' => true,
      ),

    )
  ) );

  /*-------------------------------------------------------
     ** Entire Site Header  Options
   --------------------------------------------------------*/
  
    CSF::createSection( $prefix.'_theme_options', array(
    'title'  => esc_html__('Header','errin'),
    'id' => 'header_options',
    'icon' => 'fa fa-header',
    'fields' => array(
      array(
        'type' => 'subheading',
        'content' =>'<h3>'.esc_html__('Header Layout','errin').'</h3>'
      ),
        //
        // nav select
       array(
            'id' => 'nav_menu',
            'type' => 'image_select',
            'title' => esc_html__('Select Header Navigation Style','errin'),
            'options' => array(
                'nav-style-one' => ERRIN_IMG . '/admin/header-style/style1.png',
                'nav-style-two' => ERRIN_IMG . '/admin/header-style/style2.png',
            ),
			
            'default' => 'nav-style-two'
        ),
	
	
        array(
            'id' => 'theme_header_sticky',
            'title' => esc_html__('Sticky Header', 'errin') ,
            'type' => 'switcher',
            'desc' => esc_html__('Enable Sticky Header', 'errin') ,
            'default' => true,
        ) ,
	  
	  
	array(
        'type' => 'subheading',
        'content' =>'<h3>'.esc_html__('Header Bar','errin').'</h3>'
      ),
	  
		
		array(
			'id' => 'search_bar_enable',
			'title' => esc_html__('Show Header Search Button', 'errin') ,
			'type' => 'switcher',
			'desc' => esc_html__('Enable Header Search Button', 'errin') ,
			'default' => true,
		) ,
		
		array(
			'id' => 'nesletter_enable',
			'title' => esc_html__('Show Header Newsletter Button', 'errin') ,
			'type' => 'switcher',
			'desc' => esc_html__('Enable Header Newsletter Button', 'errin') ,
			'default' => false,
		) ,
			
		array(
		'id'         => 'nesletter_short_code',
		'type'       => 'text',
		'title'      => esc_html__('Newsletter Form Shortcode', 'errin') ,
		'desc'       => esc_html__('Enter you newsletter form shortcode', 'errin') ,
		'dependency' => array( 'nesletter_enable', '==', 'true' ),
	),
	
	array(
        'type' => 'subheading',
        'content' =>'<h3>'.esc_html__('Social Options','errin').'</h3>'
     ),	
	
      array(
        'id' => 'header_social_enable',
        'title' => esc_html__('Do You want to Show Header Social Icons','errin'),
        'type' => 'switcher',
		    'desc' => esc_html__('Enable or Disable Social Bar', 'errin') ,
        'default' => true,
      ),
	  
		
	array(
        'id'     => 'social-icon',
        'type'   => 'repeater',
        'title'  => esc_html__('Repeater','errin'),
        'dependency' => array('header_social_enable','==','true'),
        'fields' => array(
          array(
            'id'    => 'icon',
            'type'  => 'icon',
            'title' => esc_html__('Pick Up Your Social Icon','errin'),
          ),
          array(
            'id'    => 'link',
            'type'  => 'text',
            'title' => esc_html__('Inter Social Url','errin'),
          ),

        ),
      ),	
		
		

    )
  ));
  
   

  /*-------------------------------------------------------
     ** Pages and Template
   --------------------------------------------------------*/

   // blog optoins
    CSF::createSection( $prefix.'_theme_options', array(
    'title'  => esc_html__('Blog','errin'),
    'id' => 'blog_page',
    'icon' => 'fa fa-bookmark',
    'fields' => array(
      array(
        'type' => 'subheading',
        'content' =>'<h3>'.esc_html__('Blog Options','errin').'</h3>'
      ),
	  
	  	array(
			'id'         => 'blog_title',
			'type'       => 'text',
			'title'      => esc_html__('Blog Page Title','errin'),
			'default'    => esc_html__('Blog Page','errin'),
			'desc'       => esc_html__('Type Blog Page Title','errin'),
		),

    array(
			'id' => 'errin_blog_layout',
            'type' => 'image_select',
            'title' => esc_html__('Select Blog Archive Layout','errin'),
            'options' => array(
                'layout-one' => ERRIN_IMG . '/admin/page/style1.png',
                'layout-two' => ERRIN_IMG . '/admin/page/style2.png',
            ),
            'default' => 'catt-two'
        ),
		
		array(
			'id' => 'page-spacing-blog',
			'type' => 'spacing',
			'title' => esc_html__('Blog Page Spacing','errin'),
			'output' => '.main-container.blog-spacing',
			'output_mode' => 'padding', // or margin, relative
			'default' => array(
				'top' => '80',
				'right' => '0',
				'bottom' => '80',
				'left' => '0',
				'unit' => 'px',
			) ,
		) ,
		
		array(
			'id' => 'blog_breadcrumb_enable',
			'title' => esc_html__('Breadcrumb', 'errin') ,
			'type' => 'switcher',
			'desc' => esc_html__('Enable Breadcrumb', 'errin') ,
			'default' => true,
		) ,
			
		

	 
    )
  ));
  
  
    // category 
	
  CSF::createSection( $prefix.'_theme_options', array(
    'title'  => esc_html__('Category','errin'),
    'id' => 'cat_page',
    'icon' => 'fa fa-list-ul',
    'fields' => array(
      array(
        'type' => 'subheading',
        'content' => '<h3>' . esc_html__('Theme Category Options. You can Customize Each Catgeory by Editing Individually.', 'errin') . '</h3>'
      ),
       array(
			'id' => 'errin_cat_layout',
            'type' => 'image_select',
            'title' => esc_html__('Select Category Layout','errin'),
            'options' => array(
                'catt-one' => ERRIN_IMG . '/admin/page/style1.png',
                'catt-two' => ERRIN_IMG . '/admin/page/style2.png',
            ),
            'default' => 'catt-two'
        ),
		
		array(
			'id' => 'page-spacing-category',
			'type' => 'spacing',
			'title' => esc_html__('Category Page Spacing','errin'),
			'output' => '.main-container.cat-page-spacing',
			'output_mode' => 'padding', // or margin, relative
			'default' => array(
				'top' => '80',
				'right' => '0',
				'bottom' => '80',
				'left' => '0',
				'unit' => 'px',
			) ,
		) ,


    )
  ));
  
  

  // blog single optoins
    CSF::createSection( $prefix.'_theme_options', array(
    'title'  => esc_html__('Single','errin'),
    'id' => 'single_page',
    'icon' => 'fa fa-pencil-square-o',
    'fields' => array(
      array(
        'type' => 'subheading',
        'content' =>'<h3>'.esc_html__('Blog Single Page Option','errin').'</h3>'
      ),
	  
       array(
            'id' => 'errin_single_blog_layout',
            'type' => 'image_select',
            'title' => esc_html__('Select Single Blog Style','errin'),
            'options' => array(
                'single-one' => ERRIN_IMG . '/admin/page/blog-1.png',
                'single-two' => ERRIN_IMG . '/admin/page/blog-2.png',
            ),
            'default' => 'single-one'
        ),
		
		array(
			'id' => 'page-spacing-single',
			'type' => 'spacing',
			'title' => esc_html__('Single Blog Spacing','errin'),
			'output' => '.single-one-bwrap',
			'output_mode' => 'padding', // or margin, relative
			'default' => array(
				'top' => '40',
				'right' => '0',
				'bottom' => '80',
				'left' => '0',
				'unit' => 'px',
			) ,
		) ,
		
		array(
			'id'         => 'blog_prev_title',
			'type'       => 'text',
			'title'      => esc_html__('Previous Post Text','errin'),
			'default'    => esc_html__('Previous Post','errin'),
			'desc'       => esc_html__('Type Previous Post Link Title','errin'),
		),
		
		array(
			'id'         => 'blog_next_title',
			'type'       => 'text',
			'title'      => esc_html__('Next Post Text','errin'),
			'default'    => esc_html__('Next Post','errin'),
			'desc'       => esc_html__('Type Next Post Link Title','errin'),
		),
			
		array(
			'id' => 'blog_single_cat',
			'title' => esc_html__('Show Catgeory','errin'),
			'type' => 'switcher',
			'desc' => esc_html__('Show Category Name','errin'),
			'default' => true,
		),
		
		array(
			'id' => 'blog_single_author',
			'title' => esc_html__('Show Author','errin'),
			'type' => 'switcher',
			'desc' => esc_html__('Single Post Author','errin'),
			'default' => true,
		),

		array(
			'id' => 'blog_nav',
			'title' => esc_html__('Show Navigation','errin'),
			'type' => 'switcher',
			'desc' => esc_html__('Post Navigation','errin'),
			'default' => true,
		),
		
		array(
			'id' => 'blog_tags',
			'title' => esc_html__('Show Tags','errin'),
			'type' => 'switcher',
			'desc' => esc_html__('Show Post Tags','errin'),
			'default' => true,
		),
		
		array(
			'id' => 'blog_related',
			'title' => esc_html__('Show Related Posts','errin'),
			'type' => 'switcher',
			'desc' => esc_html__('Related Posts','errin'),
			'default' => true,
		),
		
		array(
			'id' => 'blog_views',
			'title' => esc_html__('Show Post Views','errin'),
			'type' => 'switcher',
			'desc' => esc_html__('Post views','errin'),
			'default' => false,
		),


    )
  ));


  /*-------------------------------------------------------
       ** Footer  Options
  --------------------------------------------------------*/
  CSF::createSection( $prefix.'_theme_options', array(
    'title'  => esc_html__('Footer','errin'),
    'id' => 'footer_options',
    'icon' => 'fa fa-copyright',
    'fields' => array(
      array(
        'type' => 'subheading',
        'content' =>'<h3>'.esc_html__('Footer Options','errin').'</h3>'
      ),
	  
	array(
        'id' => 'footer_nav',
        'title' => esc_html__('Footer Right Menu','errin'),
        'type' => 'switcher',
		'desc' => esc_html__('You can set Yes or No to show Footer menu','errin'),
        'default' => false,
      ),
	  
	  
      array(
        'type' => 'subheading',
        'content' =>'<h3>'.esc_html__('Footer Copyright Area Options','errin').'</h3>'
      ),

      array(
        'id' => 'copyright_text',
        'title' => esc_html__('Copyright Area Text','errin'),
        'type' => 'textarea',
        'desc' => esc_html__('Footer Copyright Text','errin'),
      ),


	  
    )
  ));


  // Backup section
  CSF::createSection( $prefix.'_theme_options', array(
    'title'  => esc_html__('Backup','errin'),
    'id'    => 'backup_options',
    'icon'  => 'fa fa-window-restore',
    'fields' => array(
        array(
            'type' => 'backup',
        ),   
    )
  ) );
  

}