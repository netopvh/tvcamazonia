<?php 
/*
* @packge Errin Extra
* @since 1.0.0
 */
function errin_import() { 
  return array(
  
    array(
      'import_file_name'             => __('Errin Home Main','errin-extra'),
      'page_title'                   => __('Import Demo Data','errin-extra'),
      'local_import_file'            => ERRIN_EXTRA_ROOT_PATH.'/demo/home-main/errin-home-main.xml',
      'local_import_widget_file'     => ERRIN_EXTRA_ROOT_PATH.'/demo/home-main/errin-home-main.wie',
      'local_import_customizer_file' =>  ERRIN_EXTRA_ROOT_PATH.'/demo/home-main/errin-home-main.dat',
	  'import_preview_image_url'     => 'https://codeindeed.com/demo-img/errin-demo-home1.png',
      'import_notice'                => __( 'This import maybe finish on 2-3 minutes', 'errin-extra' ),
	  'preview_url'                  => 'https://codeindeed.com/errin-demo/home-main',

  ),

    array(
      'import_file_name'             => __('Errin Home Two','errin-extra'),
      'page_title'                   => __('Import Demo Data','errin-extra'),
      'local_import_file'            => ERRIN_EXTRA_ROOT_PATH.'/demo/home-two/errin-home-two.xml',
      'local_import_widget_file'     => ERRIN_EXTRA_ROOT_PATH.'/demo/home-two/errin-home-two.wie',
      'local_import_customizer_file' =>  ERRIN_EXTRA_ROOT_PATH.'/demo/home-two/errin-home-two.dat',
	  'import_preview_image_url'     => 'https://codeindeed.com/demo-img/errin-demo-home2.png',
      'import_notice'                => __( 'This import maybe finish on 2-3 minutes', 'errin-extra' ),
	  'preview_url'                  => 'https://codeindeed.com/errin-demo/home-two',

  ),

    array(
      'import_file_name'             => __('Errin Home Three','errin-extra'),
      'page_title'                   => __('Import Demo Data','errin-extra'),
      'local_import_file'            => ERRIN_EXTRA_ROOT_PATH.'/demo/home-three/errin-home-three.xml',
      'local_import_widget_file'     => ERRIN_EXTRA_ROOT_PATH.'/demo/home-three/errin-home-three.wie',
      'local_import_customizer_file' =>  ERRIN_EXTRA_ROOT_PATH.'/demo/home-three/errin-home-three.dat',
	  'import_preview_image_url'     => 'https://codeindeed.com/demo-img/errin-demo-home3.png',
      'import_notice'                => __( 'This import maybe finish on 2-3 minutes', 'errin-extra' ),
	  'preview_url'                  => 'https://codeindeed.com/errin-demo/home-three',

  ),  
  

);
}
add_filter( 'pt-ocdi/import_files', 'errin_import' );


add_action( 'pt-ocdi/after_import',  'errin_after_import' );

if(!function_exists( 'errin_after_import')):

  function errin_after_import($selected_import) {


     // Assign menus to their locations.
     $main_menu   = get_term_by('name', 'Main Menu', 'nav_menu');
     $footer_menu = get_term_by('name', 'Footer Menu', 'nav_menu');
 
     set_theme_mod('nav_menu_locations', array(
         'primary'     => $main_menu->term_id,
         'footermenu' => $footer_menu->term_id,
     )
     );


    if ('Errin Home Main' === $selected_import['import_file_name']) {
      $front_page_id = get_page_by_title('Home');
    } elseif ('Errin Home Two' === $selected_import['import_file_name']) {
        $front_page_id = get_page_by_title('Home');
    } elseif ('Errin Home Three' === $selected_import['import_file_name']) {
      $front_page_id = get_page_by_title('Home');
    }

    $blog_page_id = get_page_by_title('Blog');
    update_option('show_on_front', 'page');
    update_option('page_on_front', $front_page_id->ID);
    update_option('page_for_posts', $blog_page_id->ID);

    // Reset site permalink
    global $wp_rewrite;
    $wp_rewrite->set_permalink_structure('/%postname%/');

    // Flushing rewrite rules
    flush_rewrite_rules();


  }
endif;
