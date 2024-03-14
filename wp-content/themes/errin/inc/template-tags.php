<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * Custom Template Tags which enhance the theme by hooking into WordPress
 *
 * @package errin
 */

if ( ! function_exists( 'errin_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function errin_posted_on() {

        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
        }

        $time_string = sprintf( $time_string,
            esc_attr( get_the_date( DATE_W3C ) ),
            esc_html( get_the_date() )
        );

        $posted_on = sprintf(
        /* translators: %s: post date. */
            esc_html_x( '%s', 'post date', 'errin' ),
            '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
        );

        echo '<span class="posted-on"> ' . $posted_on . '</span>'; // WPCS: XSS OK.

    };
endif;

if ( ! function_exists( 'errin_posted_in' ) ) :
    /**
     * Prints HTML with meta information for the current author.
     */
    function errin_posted_in() {
        $categories_list = get_the_category_list( esc_html__( ' ', 'errin' ) );
        if ( $categories_list ) {
            /* translators: 1: list of categories. */
            $posted_in = sprintf( esc_html__( '%1$s', 'errin' ), $categories_list ); // WPCS: XSS OK.
        }

        echo '<div class="post-cat"><span class="posted-in">' . $posted_in . '</span></div>'; // WPCS: XSS OK.

    };
endif;

if ( ! function_exists( 'errin_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function errin_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( '%s', 'post author', 'errin' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline">_ ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'errin_theme_post_meta' ) ) :
    /**
     * Prints HTML with meta information for the current author.
     */
    function errin_theme_post_meta() {
		
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
        }

        $time_string = sprintf( $time_string,
            esc_attr( get_the_date( DATE_W3C ) ),
            esc_html( get_the_date() )
        );

        $posted_on = sprintf(
        /* translators: %s: post date. */
            esc_html_x( '%s', 'post date', 'errin' ),
            '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
        );

        $byline = sprintf(
        /* translators: %s: post author. */
            esc_html_x( '%s', 'post author', 'errin' ),
            '<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>'
        );

        $categories_list = get_the_category_list( esc_html__( ', ', 'errin' ) );
        if ( $categories_list ) {
            /* translators: 1: list of categories. */
            $posted_in = sprintf( esc_html__( '%1$s', 'errin' ), $categories_list ); // WPCS: XSS OK.
        }

        $comment_num = sprintf(
            /* translators: %s: post author. */
            esc_html_x( '%s', 'post comment', 'errin' ),
            '<a href="' .get_comments_link(). '">'. get_comments_number_text( esc_html__('0 Comments', 'errin'), esc_html__('1 Comment', 'errin'), esc_html__(  '% Comments', 'errin') ). '</a>' );

        /* translators: used between list items, there is a space after the comma */
		
        $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'errin' ) );
		
        if ( $tags_list ) {
            /* translators: 1: list of tags. */
            $tag_with = sprintf( '<span class="tags-links">' . esc_html__( '%1$s', 'errin' ) . '</span>', $tags_list ); // WPCS: XSS OK.
        }
		?>
		<div class="errin-blog-meta-info">
		<?php	
			echo '<span class="posted-on">_ ' . $posted_on . '</span>';
			echo '<span class="byline">_ ' . $byline . '</span>';
			echo '<span class="comment-num">_ ' . $comment_num . '</span>';
			?>
		</div> 
<?Php

    }
endif;


/** Category Posts Meta **/

function errin_category_post_meta() {
   ?>
    <div class="post-meta blog_post_list_Meta">
        <?php 
         
		printf('<span class="post-author blogpost_list_author_Thumbnail">%1$s<a href="%2$s">%3$s</a></span>', get_avatar( get_the_author_meta( 'ID' ), 55 ), 
			  esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), 
			  get_the_author()
		);       
            
		if ( get_post_type() === 'post') {
		   echo '<span class="post-meta-date post_post_item_Date">
		   	<i class="ri-time-line"></i>
				 '. esc_html( get_the_date( 'F j, Y' ) ) . 
			  '</span>';
		} 
           
         ?>
      </div>
   <?php }
   
   
/** Comment Walker **/

function errin_comment_style( $comment, $args, $depth ) {
	if ( 'div' === $args[ 'style' ] ) {
		$tag		 = 'div';
		$add_below	 = 'comment';
	} else {
		$tag		 = 'li ';
		$add_below	 = 'div-comment';
	}
	?>
	
	<<?php
	echo esc_html($tag);
	comment_class( empty( $args[ 'has_children' ] ) ? '' : 'parent'  );
	?> id="comment-<?php comment_ID() ?>"><?php if ( 'div' != $args[ 'style' ] ) { ?>
		<div id="div-comment-<?php comment_ID() ?>" class="comment-body"><?php }
	?>	

<?php
	if ( $args[ 'avatar_size' ] != 0 ) {
		echo get_avatar( $comment, $args[ 'avatar_size' ], '', '', array( 'class' => 'comment-avatar pull-left' ) );
	}
	?>
	
	<div class="comment__content">
		<div class="meta-data">

			<span class="comment-author vcard"><?php
				printf( '<cite class="fn">%s</cite> <span class="says">%s</span>', 'errin', get_comment_author_link(), esc_html__( 'says:', 'errin' ) );
				?>
			</span>
			<?php if ( $comment->comment_approved == '0' ) { ?>
				<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'errin' ); ?></em><br/><?php }
			?>

			<div class="comment-meta commentmetadata comment-date">
				<?php
				// translators: 1: date, 2: time
				printf(
				esc_html__( '%1$s at %2$s', 'errin' ), get_comment_date(), get_comment_time()
				);
				?>
				<?php edit_comment_link( esc_html__( '(Edit)', 'errin' ), '  ', '' ); ?>
			</div>
		</div>	
		<div class="comment-content">
			<?php comment_text(); ?>
		</div>
		<?php if ( 'div' != $args[ 'style' ] ) : ?>

		<div class="reply"><?php
			comment_reply_link(
			array_merge(
			$args, array(
				'add_below'	 => $add_below,
				'depth'		 => $depth,
				'max_depth'	 => $args[ 'max_depth' ]
			) ) );
			?>
		</div>
		</div>
		</div><?php
	endif;
}

/** Pagination **/

function errin_link_pages() {
  
  
	$args = array(
		'before'			 => '<div class="page-links"><span class="page-link-text">' . esc_html__( 'More pages: ', 'errin' ) . '</span>',
		'after'				 => '</div>',
		'link_before'		 => '<span class="page-link">',
		'link_after'		 => '</span>',
		'next_or_number'	 => 'number',
		'separator'			 => '  ',
		'nextpagelink'		 => esc_html__( 'Next ', 'errin' ) . '<i class="ri-arrow-right-s-line"></i>',
		'previouspagelink'	 => '<i class="ri-arrow-left-s-line"></i>' . esc_html__( ' Previous', 'errin' ),
	);
	wp_link_pages( $args );
}



/** Change textarea position in comment form **/

function errin_move_comment_textarea_to_bottom( $fields ) {
	$comment_field		 = $fields[ 'comment' ];
	unset( $fields[ 'comment' ] );
	$fields[ 'comment' ] = $comment_field;
	return $fields;
}
add_filter( 'comment_form_fields', 'errin_move_comment_textarea_to_bottom' );


/** Search Form **/

function errin_search_form( $form ) {
    $form = '
        <form  method="get" action="' . esc_url( home_url( '/' ) ) . '" class="errin-serach xs-search-group">
            <div class="input-group">
                <input type="search" class="form-control" name="s" placeholder="' .esc_attr__( 'Search Keyword', 'errin' ) . '" value="' . get_search_query() . '" required >
                <button class="input-group-btn search-button"><i class="icon icon-search1"></i></button>
            </div>
        </form>';
	return $form;
}
add_filter( 'get_search_form', 'errin_search_form' );

function errin_body_classes( $classes ) {

    if ( is_active_sidebar( 'sidebar-1' ) ) {
        $classes[] = 'sidebar-active';
    }else{
        $classes[] = 'sidebar-inactive';
    }
 
    return $classes;
 }
 
 add_filter( 'body_class','errin_body_classes' );



if ( ! function_exists( 'wp_body_open' ) ) {
   function wp_body_open() {
           do_action( 'wp_body_open' );
   }
}


/** Add span to category post count **/
function errin_cat_count_span($links) {
    $links = str_replace('</a> (', '</a> <span class="posts-count">', $links);
    $links = str_replace(')', '</span>', $links);
    return $links;	
}
add_filter('wp_list_categories', 'errin_cat_count_span');



/** Add span to tag count **/
function errin_tag_count_span ($variable) {
$variable = str_replace('<span class="tag-link-count"> (', ' <span class="post_count"> ', $variable);
$variable = str_replace(')</span>', '</span>', $variable);
return $variable;
}
add_filter('wp_tag_cloud','errin_tag_count_span');



/** Add span to archive post count **/


function errin_archive_count_span($links) {
    $links = str_replace('</a>&nbsp;(', '</a> <span class="posts-count">', $links);
    $links = str_replace(')', '</span>', $links);
    return $links;

}
add_filter('get_archives_link', 'errin_archive_count_span');


/** Single Post Tag List **/
if ( ! function_exists( 'errin_single_post_tags' ) ) :

    function errin_single_post_tags(){
		
	$tags_list = get_the_tag_list( '', esc_html_x( ' ', 'list item separator', 'errin' ) );
	
	if ( $tags_list ) {
		
		printf( '<div class="theme-tags__wrapper tag-lists"><h4>' . esc_html__( 'Tags:', 'errin' ) . '</h4>' . esc_html__( '%1$s', 'errin' ) . '</div>', $tags_list ); // 
	}
	
    };
endif;

if (!is_admin()) {
    function errin_search_filter($query) {
        if ($query->is_search) {
            $query->set('post_type', 'post');
        }
        return $query;
    }
    add_filter('pre_get_posts','errin_search_filter');
}







