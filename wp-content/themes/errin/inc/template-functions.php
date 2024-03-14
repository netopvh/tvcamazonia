<?php if (! defined('ABSPATH'))
  die('Direct access forbidden.');

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package errin
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */


/** Echo Variable **/

function errin_return($s)
{
  return $s;
}


/** Get Tag List **/

if (! function_exists('errin_post_tags')) {

  function errin_post_tags()
  {
    $terms = get_terms(array(
      'taxonomy' => 'post_tag',
      'hide_empty' => false,
      'posts_per_page' => -1,
    ));
    $cat_list = [];
    foreach ($terms as $post) {
      $cat_list[$post->term_id] = [$post->name];
    }
    return $cat_list;
  }
}

/** Post Read Time **/

function errin_reading_time()
{

  global $post;

  $content = get_post_field('post_content', $post->ID);
  $word_count = str_word_count(strip_tags($content));
  $readingtime = ceil($word_count / 200);
  if ($readingtime == 1) {
    $timer = " min read";
  } else {
    $timer = " min read";
  }
  $totalreadingtime = $readingtime . $timer;
  return $totalreadingtime;
}


/** Post View **/

function errin_get_post_view()
{

  $count = get_post_meta(get_the_ID(), 'post_views_count', true);
  $view_count = $count > 1 ? $count : 0;

  return $view_count;
}


function errin_set_post_view()
{

  $key = 'post_views_count';
  $post_id = get_the_ID();
  $count = (int) get_post_meta($post_id, $key, true);
  $count++;

  update_post_meta($post_id, $key, $count);

}


// return embed code video url
// ----------------------------------------------------------------------------------------
function errin_video_embed($url)
{
  //This is a general function for generating an embed link of an FB/Vimeo/Youtube Video.
  $embed_url = '';
  if (strpos($url, 'facebook.com/') !== false) {

    //it is FB video
    $embed_url = esc_url('https://www.facebook.com/plugins/video.php?href=' . rawurlencode($url) . '&show_text=1&width=200');

  } else if (strpos($url, 'vimeo.com/') !== false) {
    //it is Vimeo video
    $video_id = explode("vimeo.com/", $url)[1];
    if (strpos($video_id, '&') !== false) {
      $video_id = explode("&", $video_id)[0];
    }

    $embed_url = esc_url('https://player.vimeo.com/video/' . $video_id);

  } else if (strpos($url, 'youtube.com/') !== false) {
    //it is Youtube video
    $video_id = explode("v=", $url)[1];
    if (strpos($video_id, '&') !== false) {
      $video_id = explode("&", $video_id)[0];
    }
    $embed_url = esc_url('https://www.youtube.com/embed/' . $video_id);

  } else if (strpos($url, 'youtu.be/') !== false) {
    //it is Youtube video
    $video_id = explode("youtu.be/", $url)[1];
    if (strpos($video_id, '&') !== false) {
      $video_id = explode("&", $video_id)[0];
    }
    $embed_url = esc_url('https://www.youtube.com/embed/' . $video_id);
  } else {
    //for new valid video URL
  }
  return $embed_url;
}


//*** Prev Next Post ***//

if (! function_exists('errin_theme_post_navigation')) {
  function errin_theme_post_navigation()
  {

    $previous_post = get_previous_post();
    $prev_thumbnail = (is_object($previous_post) && ! empty($previous_post)) ? get_the_post_thumbnail($previous_post->ID) : '';
    $next_post = get_next_post();
    $next_post_thumbnail = (is_object($next_post) && ! empty($next_post)) ? get_the_post_thumbnail($next_post->ID) : '';
    $col_class = ($previous_post && $next_post) ? 'col-sm-6' : 'col-sm-12';
    if ($previous_post || $next_post) :
      ?>

      <div class="theme_blog_navigation__Wrap">
        <div class="row">

          <?php if ($previous_post) : ?>
            <div class="<?php echo esc_attr($col_class); ?>">
              <div class="theme_blog_Nav post_nav_Left <?php echo (empty($prev_thumbnail)) ? 'no-thumb' : ''; ?>">
                <?php if (! empty($prev_thumbnail)) : ?>
                  <div class="theme_blog_nav_Img prev_nav_left_Img">
                    <?php echo wp_kses_post($prev_thumbnail); ?>
                  </div>
                <?php endif; ?>
                <div class="theme_blog_nav_Inner">
                  <div class="theme_blog_nav_Label">

                    <?php $blog_prev_title = errin_get_option('blog_prev_title'); ?>
                    <?php echo esc_html($blog_prev_title); ?>

                  </div>
                  <h3 class="theme_blog_nav_Title">
                    <?php previous_post_link('%link', '%title'); ?>
                  </h3>
                </div>
              </div>

            </div>

          <?php endif; ?>
          <?php if ($next_post) : ?>

            <div class="<?php echo esc_attr($col_class); ?>">

              <div class="theme_blog_Nav post_nav_Right <?php echo (empty($next_post_thumbnail)) ? 'no-thumb' : ''; ?>">
                <?php if (! empty($next_post_thumbnail)) : ?>
                  <div class="theme_blog_nav_Img prev_nav_Right_Img">
                    <?php echo wp_kses_post($next_post_thumbnail); ?>
                  </div>
                <?php endif; ?>
                <div class="theme_blog_Inner">
                  <div class="theme_blog_nav_Label">

                    <?php $blog_next_title = errin_get_option('blog_next_title'); ?>
                    <?php echo esc_html($blog_next_title); ?>

                  </div>
                  <h3 class="theme_blog_nav_Title">
                    <?php next_post_link('%link', '%title'); ?>
                  </h3>
                </div>
              </div>
            </div>
          <?php endif; ?>


        </div>
      </div>

    <?php endif;
  }
}



// Custom Query Post Pagination
if (! function_exists('errin_post_pagination')) {
  function errin_post_pagination($paged = '', $max_page = '')
  {
    if (! $paged) {
      $paged = (get_query_var('paged')) ? get_query_var('paged') : ((get_query_var('page')) ? get_query_var('page') : 1);
    }
    if (! $max_page) {
      global $wp_query;
      $max_page = isset($wp_query->max_num_pages) ? $wp_query->max_num_pages : 1;
    }
    $big = 999999999; // need an unlikely integer

    $html = paginate_links(array(
      'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
      'format' => '?paged=%#%',
      'current' => max(1, $paged),
      'total' => $max_page,
      'mid_size' => 1,
      'prev_text' => '<i class="icofont-long-arrow-left"></i>',
      'next_text' => '<i class="icofont-long-arrow-right"></i>',
      'type' => 'list'
    ));

    echo "<div class='posts-pagination-style nav-links'>" . $html . "</div>";
  }
}


function errin_theme_author_box()
{

  global $post;

  $theme_author_markup = '';
  // Get author's display name - NB! changed display_name to first_name. Error in code.
  $display_name = get_the_author_meta('display_name', $post->post_author);

  // If display name is not available then use nickname as display name
  if (empty($display_name))
    $display_name = get_the_author_meta('nickname', $post->post_author);

  // Get author's biographical information or description
  $user_description = get_the_author_meta('user_description', $post->post_author);

  $user_facebook = get_the_author_meta('facebook', $post->post_author);
  $user_twitter = get_the_author_meta('twitter', $post->post_author);
  $user_instagram = get_the_author_meta('instagram', $post->post_author);
  $user_pinterest = get_the_author_meta('pinterest', $post->post_author);
  $user_youtube = get_the_author_meta('youtube', $post->post_author);

  // Get link to the author archive page
  $user_posts = get_author_posts_url(get_the_author_meta('ID', $post->post_author));
  if (! empty($display_name))
    // Author avatar - - the number 90 is the px size of the image.
    $theme_author_markup .= '<div class="author-thumb">' . get_avatar(get_the_author_meta('ID'), 200) . '</div>';
  $theme_author_markup .= '<div class="theme_author_Info">';
  $theme_author_markup .= '<h6 class="theme_author_Title">' . esc_html__('Sobre o autor', 'errin') . '</h6>';
  $theme_author_markup .= '<h4 class="theme_author__Name">' . $display_name . '</h4>';
  $theme_author_markup .= '<p class="theme_author__Description">' . get_the_author_meta('description') . '</p>';
  $theme_author_markup .= '<div class="theme_author_Socials">';


  // Check if author has Twitter in their profile

  if (! empty($user_facebook)) {
    $theme_author_markup .= ' <a href="' . $user_facebook . '" target="_blank" rel="nofollow" title="Facebook"><i class="ri-facebook-fill"></i> </a>';
  }


  if (! empty($user_twitter)) {
    $theme_author_markup .= ' <a href="' . $user_twitter . '" target="_blank" rel="nofollow" title="Twitter"><i class="ri-twitter-fill"></i> </a>';
  }

  if (! empty($user_instagram)) {
    $theme_author_markup .= ' <a href="' . $user_instagram . '" target="_blank" rel="nofollow" title="Instagram"><i class="ri-instagram-line"></i> </a>';
  }

  if (! empty($user_pinterest)) {
    $theme_author_markup .= ' <a href="' . $user_pinterest . '" target="_blank" rel="nofollow" title="Pinterest"><i class="ri-pinterest-fill"></i> </a>';
  }

  if (! empty($user_youtube)) {
    $theme_author_markup .= ' <a href="' . $user_youtube . '" target="_blank" rel="nofollow" title="Youtube"><i class="ri-youtube-fill"></i> </a>';
  }

  $theme_author_markup .= '</div></div>';

  // Pass all this info to post content 
  echo '<div class="author_bio__Wrapper" >' . $theme_author_markup . '</div>';
}



// Text base author Social
function errin_single_author_social()
{

  global $post;
  $post_author_social = '';

  $user_facebook = get_the_author_meta('facebook', $post->post_author);
  $user_twitter = get_the_author_meta('twitter', $post->post_author);
  $user_instagram = get_the_author_meta('instagram', $post->post_author);
  $user_pinterest = get_the_author_meta('pinterest', $post->post_author);
  $user_youtube = get_the_author_meta('youtube', $post->post_author);

  // Check if author has Twitter in their profile

  if (! empty($user_facebook)) {
    $post_author_social .= ' <a href="' . esc_url($user_facebook) . '" target="_blank" rel="nofollow" title="Facebook"><i class="icofont-facebook"></i> </a>';
  }

  if (! empty($user_twitter)) {
    $post_author_social .= ' <a href="' . esc_url($user_twitter) . '" target="_blank" rel="nofollow" title="Twitter"><i class="icofont-twitter"></i> </a>';
  }

  if (! empty($user_instagram)) {
    $post_author_social .= ' <a href="' . esc_url($user_instagram) . '" target="_blank" rel="nofollow" title="Instagram"><i class="icofont-instagram"></i> </a>';
  }

  if (! empty($user_pinterest)) {
    $post_author_social .= ' <a href="' . esc_url($user_pinterest) . '" target="_blank" rel="nofollow" title="Pinterest"><i class="icofont-pinterest"></i> </a>';
  }

  if (! empty($user_youtube)) {
    $post_author_social .= ' <a href="' . esc_url($user_youtube) . '" target="_blank" rel="nofollow" title="Youtube"><i class="icofont-youtube-play"></i> </a>';
  }

  // Pass all this info to post content 
  return '<div class="post_box_socials">' . $post_author_social . '</div>';
}


if (! function_exists('errin_is_activated')) {

  function errin_is_activated()
  {

    if (in_array('errin-extra/errin-extra.php', apply_filters('active_plugins', get_option('active_plugins')))) {
      return true;
    } else {
      return false;
    }

  }

}
