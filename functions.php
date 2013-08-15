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

include_once('functions-actions.php');

/********************************************************************************
Here's where you get to set up the widths of your columns. If you change
the number of columns you may need to redefine cogito_wp_get_cols in this
file

ALL SECTIONS MUST ADD UP TO 12 (or not. maybe you like the look of a broken site)
*********************************************************************************/
if (!isset($cogito_init) ){
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
}
update_option( 'cogito_init', $cogito_init );


if ( ! function_exists( 'cogito_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 * Create your own twentyeleven_posted_on to override in a child theme
 *
 * @since Twenty Eleven 1.0
 */
function cogito_posted_on() {

  $data = array(
    'permalink' => esc_url( get_permalink() ),
    'time' => esc_attr( get_the_time() ),
    'date_year' => esc_attr( get_the_date( 'c' ) ),
    'date' => esc_attr( get_the_date() ),
    'author_url' => esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
    'all_posts_by' => esc_attr( sprintf( __( 'View all posts by %s', 'cogito_wp' ), get_the_author() ) ),
    'author' => get_the_author()
  );
  
	$data['output'] = sprintf( __( '<span class="sep">Posted on </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a><span class="by-author"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'cogito_wp' ),
		$data['permalink'],
		$data['time'],
		$data['date_year'],
		$data['date'],
		$data['author_url'],
		$data['all_posts_by'],
		$data['author']
	);
	
	$data = apply_filters('cogito_posted_on', $data );
	
	print $data['output'];
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
Simple Pagination

***********************************************/
function cogito_wp_simple_pagination($pagenum, $numpages=0)
{  
    if ($pagenum < 1) $pagenum  =1;
    
    $paged_formal = "pagenum="; 
  
    $otherfields="";
    foreach($_GET as $key => $getparam){
      if ($key != "pagenum"){
        $otherfields .="&$key=$getparam";
      }
    }

    if($numpages > 0){ ?>
    
        <p class="paginator">
        <?php
          if ($pagenum > 1) { ?>
            <a href="<?php echo '?'.$paged_formal . ($pagenum -1) . $otherfields; ?>">&lt;</a>
                            <?php }
        for($i=1;$i<=$numpages;$i++){?>
            <?php $selected = 'class="selected" style="color:red;"';?>

            <a href="<?php echo '?'.$paged_formal. $i . $otherfields; ?>" <?php ($pagenum==$i)? print $selected : null;?>><?php echo $i;?></a>
        <?php } ?>
       <?php if($pagenum < $numpages){?>
            <a href="<?php echo '?'.$paged_formal. ($pagenum +1) . $otherfields; ?>">&gt;</a>
        <?php } ?>
        </p>
    <?php } 
}



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
  


    $cogito_init = get_option('cogito_init'); 
    $val = false;
  
    $widget_list =  wp_get_sidebars_widgets();

    //Is there a left column?
    if ( isset($widget_list['sidebar-left']) && !empty($widget_list['sidebar-left']) ) {
      $left = true;
    }
    
    //Is there a right column?
    if ( isset($widget_list['sidebar-right']) && !empty($widget_list['sidebar-right']) ) {
      $right = true;  
     }


     
    //It's a 3-column layout with a left and right sidebar.
    if ($left && $right){
      switch ($col) {
          case 'content': $val = cogito_foundation_sizer($cogito_init['three_columns_content']) . " columns push-". cogito_foundation_sizer($cogito_init['three_columns_left']); break;
          case 'left':    $val = cogito_foundation_sizer($cogito_init['three_columns_left']) . " columns pull-" . cogito_foundation_sizer($cogito_init['three_columns_content']); break;
          case 'right':   $val = cogito_foundation_sizer($cogito_init['three_columns_right']) . " columns"; break;
      }
    }
    //It's a 2-column layout with a left sidebar.
    elseif ($left){
      switch ($col) {
          case 'content': $val = cogito_foundation_sizer($cogito_init['two_columns_lsb_content']) . " columns push-" . cogito_foundation_sizer($cogito_init['two_columns_lsb_left']); break;
          case 'left':    $val = cogito_foundation_sizer($cogito_init['two_columns_lsb_left']) . " columns pull-" . cogito_foundation_sizer($cogito_init['two_columns_lsb_content']); break;
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
/*     wp_deregister_script( 'jquery' ); */
/*     wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js'); */
/*     wp_enqueue_script( 'jquery' ); */
  
  
  	wp_enqueue_style( 'foundation-css', get_template_directory_uri() . '/foundation/stylesheets/foundation.css'  );
  	wp_enqueue_script( 'foundation-placeholder', get_template_directory_uri() . '/foundation/javascripts/jquery.placeholder.js', array('jquery') );
  	wp_enqueue_script( 'foundation-reveal', get_template_directory_uri() . '/foundation/javascripts/jquery.foundation.reveal.js', array('jquery') );
  	wp_enqueue_script( 'foundation-tooltips', get_template_directory_uri() . '/foundation/javascripts/jquery.foundation.tooltips.js', array('jquery') );
  	wp_enqueue_script( 'foundation-modernizr', get_template_directory_uri() . '/foundation/javascripts/modernizr.foundation.js', array('jquery') );
  	//App.js just contains some extra form stuff for now.
  	wp_enqueue_script( 'foundation-app', get_template_directory_uri() . '/foundation/javascripts/app.js', array('foundation-js') );
  
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

	//Dynamically gererate footer column widget regions
  $cogito_init = get_option('cogito_init'); 
  $footers = isset($cogito_init) && is_array($cogito_init['footers']) ? $cogito_init['footers'] : array(4,4,4);

  $widget_list =  wp_get_sidebars_widgets();

  $width_sum = 0;
  $last_used = 0;
   
  //First count the widget areas we have and store active footers in an array
  $foot_counter = Array();
  for ($i=0;$i<=4;$i++){

    if ( isset($widget_list['footer-' . ($i+1)]) && !empty($widget_list['footer-' . ($i+1)] ) ){
      //If the footer widths array has something useful in it use it. Otherwise 4 is a good number
      $width = isset($footers[$i]) ? $footers[$i] : 4;
      $foot_counter[$i+1] = $footers[$i];
      $width_sum +=  $footers[$i];
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
  
  	if ( function_exists('is_multi_author') && ! is_multi_author() ) {
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
  		<?php cogito_action_comment_top(); ?>
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
  			<?php cogito_action_comment_bottom(); ?>
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
  
//    print_r($r);
  
  	if (!$page && !$pages) {
  		global $wp_query;
  
  		$page = get_query_var('paged');
  		$page = !empty($page) ? intval($page) : 1;
  
  		$posts_per_page = get_query_var('posts_per_page');

      $posts_per_page = $posts_per_page > 0 ? $posts_per_page : 1;

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

/**
 * Find a file by first looking in the child theme then in the parent
 *
 * @param int $filepath should be relative to the theme directory and include a slash.
 *
 */
function cogito_get_file_uri(array $filepaths){
  
  $root_wp = getcwd();

  // Cache path to theme for duration of this function:
  $cogito_dir = get_template_directory();
  $cogito_uri = get_template_directory_uri();
  
  $child_dir = get_stylesheet_directory();
  $child_uri = get_stylesheet_directory_uri();

  foreach ($filepaths as $filepath){
    if ( is_file( $child_dir . $filepath) ){
      return $child_uri . $filepath;
    }
  }
  //Now do it all again only this time in the parent directory
  foreach ($filepaths as $filepath){
    if( is_file( $cogito_dir . $filepath) ){
      return $cogito_uri . $filepath;
    }
  }
  return false;

}


/**
 * Get and place all the icons necesssary (like favicon and apple-touch icons etc).
 *
 */
function cogito_get_icons(){
  
  $favicon =  cogito_get_file_uri(array('/images/icons/favicon.ico')); 

  $icon57 = cogito_get_file_uri(array('/images/icons/apple-57x57.png')); 
  $icon72 = cogito_get_file_uri(array('/images/icons/apple-72x72.png')); 
  $icon114 = cogito_get_file_uri(array('/images/icons/apple-114x114.png')); 
  

  print $icon57 ? '<link rel="apple-touch-icon" href="'.$icon57.'">' : "";
  print $icon72 ? '<link rel="apple-touch-icon" href="'.$icon72.'">' : "";
  print $icon114 ? '<link rel="apple-touch-icon" href="'.$icon114.'">' : "";

  print $favicon ? '<link rel="shortcut icon" type="image/vnd.microsoft.icon" href="' . $favicon .'">' : "";

}



/**
 * Test for logo.png in the places we expect to find it.
 *
 *
 * @return string $logo path to logo if found. False if otherwise.
 */
function cogito_get_logo(){

  //TODO: work in uploading a logo in the admin interface.
  if ($logo =  cogito_get_file_uri( array('/images/logo.png', '/logo.png') )){
    return $logo;
  }
  else{
    return false;
  }
  
}

/**
 * Little Class to add arrows to menus
 *
 */
class Arrow_Walker_Nav_Menu extends Walker_Nav_Menu {
    function display_element($element, &$children_elements, $max_depth, $depth=0, $args, &$output) {
        $id_field = $this->db_fields['id'];
        if (!empty($children_elements[$element->$id_field])) { 
            $element->classes[] = 'arrow';
            $element->title .= '<span class="arrow-img"> »</span>';
        }
        Walker_Nav_Menu::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }

}