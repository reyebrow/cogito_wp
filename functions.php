<?php
/****************************************************************************************************************************/
/* WARNING!!!! NEVER CHANGE ANYTHING IN THIS FILE OR FOLDER!!! USE A CHILD THEME INSTEAD!                                   */
/* CHECK OUT "STARTER_CHILD" FOLDER FOR INSTRUCTIONS                                                                        */
/*****************************************************************************************************************************

Many of the functions in this file can be rewritten by creating functions with an identical name in a child theme
Just copy what's inside the 

              if ( ! function_exists()){
              
                    COPY THIS STUFF
              
              }

Then paste it into your child's functions.php and change away.
*/


/********************************************************************************
Here's where you get to set up the widths of your columns. If you change
the number of columns you may need to redefine cogito_wp_get_cols in this
file

ALL SECTIONS MUST ADD UP TO 12 (or not. maybe you like the look of a broken site)
*********************************************************************************/
$cogito_init = array(
  //Three columns with right and left sidebar
  'three_columns_left'     => 3,
  'three_columns_content'  => 6,
  'three_columns_right'    => 3,
  
  //Two columns with right sidebar
  'two_columns_rsb_right'   => 4,
  'two_columns_rsb_content' => 8,
  
  //Two columns with Left sidebar
  'two_columns_lsb_left'    => 3,
  'two_columns_lsb_content' => 9,
  
  //1 Column. Centered by default
  'one_column_content'      => 10,

/******************************************************************************************************
 *  Sets an array corresponding to the number and widths of your footers from left to right. 
 *  You can have as many footers as you want but the widths MUST add up to 12 or Foundation columns 
 *  will hate you and stop answering your phone calls.
 * 
 *  Example:  3 columns of equal width  array(4,4,4);
              2 columns of widths 4 and 8 array(4,8);
 *****************************************************************************************************/
  
  'footers' => array( 4,3,5 )
); 
update_option( 'cogito_columns', $cogito_init );


if ( ! function_exists( 'cogito_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 * Create your own twentyeleven_posted_on to override in a child theme
 *
 * @since Twenty Eleven 1.0
 */
function cogito_posted_on() {
	printf( __( '<span class="sep">Posted on </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a><span class="by-author"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'cogito_wp' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'cogito_wp' ), get_the_author() ) ),
		get_the_author()
	);
}
endif;


//Wrap the video in foundation's video thingy
function cogito_video_wrap($html, $url, $args){
if (preg_match('/^http:\/\/(www\.)?youtube.com\/watch.*/i', $url) || 
    preg_match('/^http:\/\/youtu.be\/*/i', $url) ) {
    $html = "<div class='flex-video'>" . $html . "</div>";
  }
  
  return $html;
}
add_filter( 'embed_oembed_html', 'cogito_video_wrap', 10, 3);


/**********************************************
Do shortcode in WIDGETS. 
(note: THIS=AWESOME )
***********************************************/
add_filter('widget_text', 'do_shortcode'); 

/**
 * This function returns the columns and widths to be populated as classes.
 * It is recommended that you have this in your child's functions.php file 
 * since this is what will let you change the column widths
 */
if ( ! function_exists( 'cogito_wp_col_class' ) ) :
  function cogito_wp_col_class($col = ''){
  
    $cogito_init = get_option('cogito_columns'); 
    $val = false;
    
    //Is there a left column?
    if (is_active_sidebar( 'sidebar-left' ) ) {
      $left = true;
    }
    
    //Is there a right column?
     if (is_active_sidebar( 'sidebar-right' ) ) {
      $right = true;  
     }
     
    //It's a 3-column layout with a left and right sidebar.
    if ($left && $right){
      switch ($col) {
          case 'content': $val = cogito_foundation_sizer($cogito_init['three_columns_content']) . " columns"; break;
          case 'left':    $val = cogito_foundation_sizer($cogito_init['three_columns_left']) . " columns"; break;
          case 'right':   $val = cogito_foundation_sizer($cogito_init['three_columns_right']) . " columns"; break;
      }
    }
    //It's a 2-column layout with a left sidebar.
    elseif ($left){
      switch ($col) {
          case 'content': $val = cogito_foundation_sizer($cogito_init['two_columns_lsb_content']) . " columns"; break;
          case 'left':    $val = cogito_foundation_sizer($cogito_init['two_columns_lsb_left']) . " columns"; break;
      }
    }
    //It's a 2-column layout with a right sidebar.
    elseif ($right){
      switch ($col) {
          case 'content': $val = cogito_foundation_sizer($cogito_init['two_columns_rsb_content']) . " columns"; break;
          case 'right':   $val = cogito_foundation_sizer($cogito_init['two_columns_rsb_right']) . " columns"; break;
      }
    }
    //It's a 1-column layout.
    else {
      switch ($col) {
          case 'content': $val = cogito_foundation_sizer($cogito_init['one_column_content']) . " centered columns"; break;
      }
    }
    //print "<pre>--" .print_r($col,1). " -- $val --</pre>";
    return $val;
  }
endif;


/**
 * Foundation is what we base our themes on
 *
 * Let's add all the necessary javascript and styles
 */
if ( ! function_exists( 'cogito_wp_admin_enqueue_scripts' ) ) :
  function cogito_wp_admin_enqueue_scripts( $hook_suffix ) {
    // Foundation gets its own jquery 
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js');
    wp_enqueue_script( 'jquery' );
  
  
  	wp_enqueue_style( 'foundation-css', get_template_directory_uri() . '/foundation/stylesheets/foundation.css'  );
  			
  	wp_enqueue_script( 'foundation-js', get_template_directory_uri() . '/foundation/javascripts/foundation.js', array('jquery') );
  	//App.js just contains some extra form stuff for now.
  	wp_enqueue_script( 'foundation-app', get_template_directory_uri() . '/foundation/javascripts/app.js', array('jquery') );
  
  }
endif;
add_action( 'wp_enqueue_scripts', 'cogito_wp_admin_enqueue_scripts' );


// Disable WordPress version reporting as a basic protection against automatic attacks
function remove_generators() {
	return '';
}	
add_filter('the_generator','remove_generators');




/**
 * Display navigation to next/previous pages when applicable (borrowed from TwentyEleven)
 */
if ( ! function_exists( 'cogito_wp_content_nav' ) ) :

  function cogito_wp_content_nav( $nav_id ) {
  	global $wp_query;
  
  	if ( $wp_query->max_num_pages > 1 ) : ?>
  		<nav id="<?php echo $nav_id; ?>">
  			<h5 class="assistive-text"><?php _e( 'Post navigation', 'cogito_wp' ); ?></h5>
  			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'cogito_wp' ) ); ?></div>
  			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'cogito_wp' ) ); ?></div>
  		</nav><!-- #nav-above -->
  	<?php endif;
  }
  
endif;


/**
 * Helper function to spell out numbers
 * We use this for Foundation classes
 */

function cogito_foundation_sizer($num){
  $nums = Array ("denada", "one","two", "three","four","five", "six", "seven", "eight", "nine", "ten", "eleven", "twelve");
	return $nums[$num];
}

/**
 * Register menu regions
 *
 */
if ( ! function_exists( 'cogito_wp_menu_init' ) ) :
  function cogito_wp_menu_init() {
  
  	// This theme uses wp_nav_menu() in one location.
  	register_nav_menu( 'primary', __( 'Primary Menu', 'cogito_wp' ) );
  	register_nav_menu( 'primary-mobile', __( 'Primary Menu (mobile)', 'cogito_wp' ) );
  }
  
endif;
add_action( 'after_setup_theme', 'cogito_wp_menu_init' );

/**
 * Register our sidebars and widgetized areas. Also register the main menu as a dynamic menu
 *
 */
if ( ! function_exists( 'cogito_wp_widgets_init' ) ) :

  function cogito_wp_widgets_init() {
  	  
  	register_sidebar( array(
  		'name' => __( 'Left Sidebar', 'cogito_wp' ),
  		'id' => 'sidebar-left',
  		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
  		'after_widget' => "</aside>",
  		'before_title' => '<h3 class="widget-title">',
  		'after_title' => '</h3>',
  	) );
  	register_sidebar( array(
  		'name' => __( 'Right Sidebar', 'cogito_wp' ),
  		'id' => 'sidebar-right',
  		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
  		'after_widget' => "</aside>",
  		'before_title' => '<h3 class="widget-title">',
  		'after_title' => '</h3>',
  	) );
  	
  	//Dynamically gererate footer column widget regions
    $cogito_init = get_option('cogito_init'); 
    $footers = isset($cogito_init) && is_array($cogito_init['footers']) ? $cogito_init['footers'] : array(4,4,4);
    
    if (is_array($footers) && !empty($footers)){
      for ($i = 1; $i<= sizeof($footers); $i++){
      	register_sidebar( array(
      		'name' => __( 'Footer Area '. ucwords(cogito_foundation_sizer($i)) , 'cogito_wp' ),
      		'id' => 'footer-'. $i,
      		'description' => __( 'An optional widget area for your site footer', 'cogito_wp' ),
      		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      		'after_widget' => "</aside>",
      		'before_title' => '<h3 class="widget-title">',
      		'after_title' => '</h3>',
      	) );
    	}
    }
    
    // The following lets us define a function in the child theme
    // That adds/changes or overwrites anything here.
    if ( function_exists('cogito_extra_sidebars') ){
  	 cogito_extra_sidebars();
  	}

  }
  
endif;
add_action( 'widgets_init', 'cogito_wp_widgets_init' );



/**
 * Sets the post excerpt length to 40 words.
 *
 * To override this length in a child theme, remove the filter and add your own
 * function tied to the excerpt_length filter hook.
 */
if ( ! function_exists( 'cogito_wp_excerpt_length' ) ) :
 
  function cogito_wp_excerpt_length( $length ) {
  	return 40;
  }

endif;
add_filter( 'excerpt_length', 'cogito_wp_excerpt_length' );




/**
 * Get Only active Footers 
 *
 * Set the widths of footer regions to space equally. Maximum of 4 regions possible
 *
 */

 
function cogito_get_footers() {

  //Size of the footers from left to right (must add up to 12)
  $footer_widths = get_option('cogito_footers');

  $width_sum = 0;
  $last_used = 0;
   
  //First count the widget areas we have and store active footers in an array
  $foot_counter = Array();
  for ($i=0;$i<=4;$i++){
    if (is_active_sidebar( 'footer-' . ($i+1) ) ) {
      //If the footer widths array has something useful in it use it. Otherwise 4 is a good number
      $width = isset($footer_widths[$i]) ? $footer_widths[$i] : 4;
      $foot_counter[$i+1] = $footer_widths[$i];
      $width_sum +=  $footer_widths[$i];
      $last_used = $i+1;
    }
  }

  //If they don't add up to 12 then add space on the end
  if ($width_sum < 12 && $last_used > 0){
    $foot_counter[$last_used] = 12 - $width_sum + $foot_counter[$last_used];
  }
  
  //Now print a block array 
  if ( $last_used > 0 ){
    foreach ($foot_counter as $key=>$footer_width){
      print '<div id="footer-'.$key.'" class="columns '. cogito_foundation_sizer($footer_width) .'">'; 
      dynamic_sidebar( 'footer-' . $key ); 
      print '</div>';
    }
  }	
	
}  





/**
 * Adds two classes to the array of body classes. (borrowed from twenty_eleven)
 * The first is if the site has only had one author with published posts.
 * The second is if a singular post being displayed
 *
 * @since Twenty Eleven 1.0
 */
if ( ! function_exists( 'cogito_wp_body_classes' ) ) :

  function cogito_wp_body_classes( $classes ) {
  
  	if ( ! is_multi_author() ) {
  		$classes[] = 'single-author';
  	}
  
  	if ( is_singular() && ! is_home() )
  		$classes[] = 'singular';
  
  	return $classes;
  }
  
endif;
add_filter( 'body_class', 'cogito_wp_body_classes' );




/**
 * Adds a pretty "Continue Reading" link to custom post excerpts. (borrowed from twenty_eleven)
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 */
if ( ! function_exists( 'cogito_wp_custom_excerpt_more' ) ) :

  function cogito_wp_custom_excerpt_more( $output ) {
  	if ( has_excerpt() && ! is_attachment() ) {
  		$output .= cogito_wp_continue_reading_link();
  	}
  	return $output;
  }
  
endif;
add_filter( 'get_the_excerpt', 'cogito_wp_custom_excerpt_more' );



/**
 * Returns a "Continue Reading" link for excerpts
 */
if ( ! function_exists( 'cogito_wp_continue_reading_link' ) ) :

  function cogito_wp_continue_reading_link() {
  	return ' <a href="'. esc_url( get_permalink() ) . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentyeleven' ) . '</a>';
  }
  
endif;


/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and twentyeleven_continue_reading_link().
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 */
if ( ! function_exists( 'cogito_wp_auto_excerpt_more' ) ) :

  function cogito_wp_auto_excerpt_more( $more ) {
  	return ' &hellip;' . cogito_wp_continue_reading_link();
  }
  
endif;
add_filter( 'excerpt_more', 'cogito_wp_auto_excerpt_more' );






/**
 * Template for comments and pingbacks. (borrowed from twenty_eleven)
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own cogito_wp_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Twenty Eleven 1.0
 */
if ( ! function_exists( 'cogito_wp_comment' ) ) :
  function cogito_wp_comment( $comment, $args, $depth ) {
  	$GLOBALS['comment'] = $comment;
  	switch ( $comment->comment_type ) :
  		case 'pingback' :
  		case 'trackback' :
  	?>
  	<li class="post pingback">
  		<p><?php _e( 'Pingback:', 'cogito_wp' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'cogito_wp' ), '<span class="edit-link">', '</span>' ); ?></p>
  	<?php
  			break;
  		default :
  	?>
  	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
  		<article id="comment-<?php comment_ID(); ?>" class="comment">
  			<footer class="comment-meta">
  				<div class="comment-author vcard">
  					<?php
  						$avatar_size = 68;
  						if ( '0' != $comment->comment_parent )
  							$avatar_size = 39;
  
  						echo get_avatar( $comment, $avatar_size );
  
  						/* translators: 1: comment author, 2: date and time */
  						printf( __( '%1$s on %2$s <span class="says">said:</span>', 'cogito_wp' ),
  							sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),
  							sprintf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
  								esc_url( get_comment_link( $comment->comment_ID ) ),
  								get_comment_time( 'c' ),
  								/* translators: 1: date, 2: time */
  								sprintf( __( '%1$s at %2$s', 'cogito_wp' ), get_comment_date(), get_comment_time() )
  							)
  						);
  					?>
  
  					<?php edit_comment_link( __( 'Edit', 'cogito_wp' ), '<span class="edit-link">', '</span>' ); ?>
  				</div><!-- .comment-author .vcard -->
  
  				<?php if ( $comment->comment_approved == '0' ) : ?>
  					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'cogito_wp' ); ?></em>
  					<br />
  				<?php endif; ?>
  
  			</footer>
  
  			<div class="comment-content"><?php comment_text(); ?></div>
  
  			<div class="reply">
  				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply <span>&darr;</span>', 'cogito_wp' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
  			</div><!-- .reply -->
  		</article><!-- #comment-## -->
  
  	<?php
  			break;
  	endswitch;
  }
endif; // ends check for twentyeleven_comment()




// Custom Pagination (borrowed from wp_foundation)
/**
 * Retrieve or display pagination code.
 *
 * The defaults for overwriting are:
 * 'page' - Default is null (int). The current page. This function will
 *      automatically determine the value.
 * 'pages' - Default is null (int). The total number of pages. This function will
 *      automatically determine the value.
 * 'range' - Default is 3 (int). The number of page links to show before and after
 *      the current page.
 * 'gap' - Default is 3 (int). The minimum number of pages before a gap is 
 *      replaced with ellipses (...).
 * 'anchor' - Default is 1 (int). The number of links to always show at begining
 *      and end of pagination
 * 'before' - Default is '<div class="emm-paginate">' (string). The html or text 
 *      to add before the pagination links.
 * 'after' - Default is '</div>' (string). The html or text to add after the
 *      pagination links.
 * 'next_page' - Default is '__('&raquo;')' (string). The text to use for the 
 *      next page link.
 * 'previous_page' - Default is '__('&laquo')' (string). The text to use for the 
 *      previous page link.
 * 'echo' - Default is 1 (int). To return the code instead of echo'ing, set this
 *      to 0 (zero).
 *
 * @author Eric Martin <eric@ericmmartin.com>
 * @copyright Copyright (c) 2009, Eric Martin
 * @version 1.0
 *
 * @param array|string $args Optional. Override default arguments.
 * @return string HTML content, if not displaying.
 */
if ( ! function_exists( 'emm_paginate' ) ) :
  function emm_paginate($args = null) {
  	$defaults = array(
  		'page' => null, 'pages' => null, 
  		'range' => 3, 'gap' => 3, 'anchor' => 1,
  		'before' => '<div class="row cogito_paginate"><ul class="pagination">', 'after' => '</ul></div>',
  		'title' => __('<li class="unavailable"></li>'),
  		'nextpage' => __('&raquo;'), 'previouspage' => __('&laquo'),
  		'echo' => 1
  	);
  
  	$r = wp_parse_args($args, $defaults);
  	extract($r, EXTR_SKIP);
  
  	if (!$page && !$pages) {
  		global $wp_query;
  
  		$page = get_query_var('paged');
  		$page = !empty($page) ? intval($page) : 1;
  
  		$posts_per_page = intval(get_query_var('posts_per_page'));
  		$pages = intval(ceil($wp_query->found_posts / $posts_per_page));
  	}
  	
  	$output = "";
  	if ($pages > 1) {	
  		$output .= "$before<li>$title</li>";
  		$ellipsis = "<li class='unavailable'>...</li>";
  
  		if ($page > 1 && !empty($previouspage)) {
  			$output .= "<li><a href='" . get_pagenum_link($page - 1) . "'>$previouspage</a></li>";
  		}
  		
  		$min_links = $range * 2 + 1;
  		$block_min = min($page - $range, $pages - $min_links);
  		$block_high = max($page + $range, $min_links);
  		$left_gap = (($block_min - $anchor - $gap) > 0) ? true : false;
  		$right_gap = (($block_high + $anchor + $gap) < $pages) ? true : false;
  
  		if ($left_gap && !$right_gap) {
  			$output .= sprintf('%s%s%s', 
  				emm_paginate_loop(1, $anchor), 
  				$ellipsis, 
  				emm_paginate_loop($block_min, $pages, $page)
  			);
  		}
  		else if ($left_gap && $right_gap) {
  			$output .= sprintf('%s%s%s%s%s', 
  				emm_paginate_loop(1, $anchor), 
  				$ellipsis, 
  				emm_paginate_loop($block_min, $block_high, $page), 
  				$ellipsis, 
  				emm_paginate_loop(($pages - $anchor + 1), $pages)
  			);
  		}
  		else if ($right_gap && !$left_gap) {
  			$output .= sprintf('%s%s%s', 
  				emm_paginate_loop(1, $block_high, $page),
  				$ellipsis,
  				emm_paginate_loop(($pages - $anchor + 1), $pages)
  			);
  		}
  		else {
  			$output .= emm_paginate_loop(1, $pages, $page);
  		}
  
  		if ($page < $pages && !empty($nextpage)) {
  			$output .= "<li><a href='" . get_pagenum_link($page + 1) . "'>$nextpage</a></li>";
  		}
  
  		$output .= $after;
  	}
  
  	if ($echo) {
  		echo $output;
  	}
  
  	return $output;
  }
endif;

/**
 * Helper function for pagination which builds the page links. (borrowed from wp_foundation)
 *
 * @access private
 *
 * @author Eric Martin <eric@ericmmartin.com>
 * @copyright Copyright (c) 2009, Eric Martin
 * @version 1.0
 *
 * @param int $start The first link page.
 * @param int $max The last link page.
 * @return int $page Optional, default is 0. The current page.
 */
function emm_paginate_loop($start, $max, $page = 0) {
	$output = "";
	for ($i = $start; $i <= $max; $i++) {
		$output .= ($page === intval($i)) 
			? "<li class='current'><a href='#'>$i</a></li>" 
			: "<li><a href='" . get_pagenum_link($i) . "'>$i</a></li>";
	}
	return $output;
} 


