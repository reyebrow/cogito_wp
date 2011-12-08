<?php

/**
 * Foundation is what we base our themes on
 *
 * @since Twenty Eleven 1.0
 */

function cogito_wp_admin_enqueue_scripts( $hook_suffix ) {
	wp_enqueue_style( 'foundation-css', get_template_directory_uri() . '/foundation/stylesheets/foundation.css'  );
	wp_enqueue_style( 'twentyeleven-menu', get_template_directory_uri() . '/twentyeleven.css'  );
			
	wp_enqueue_script( 'foundation-js', get_template_directory_uri() . '/foundation/javascripts/foundation.js', array('jquery') );
	//App.js just contains some extra form stuff for now.
	wp_enqueue_script( 'foundation-app', get_template_directory_uri() . '/js/app.js', array('jquery') );

}
add_action( 'wp_enqueue_scripts', 'cogito_wp_admin_enqueue_scripts' );


/**
 * Display navigation to next/previous pages when applicable
 */
function cogito_wp_content_nav( $nav_id ) {
	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $nav_id; ?>">
			<h3 class="assistive-text"><?php _e( 'Post navigation', 'twentyeleven' ); ?></h3>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'cogito_wp' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'cogito_wp' ) ); ?></div>
		</nav><!-- #nav-above -->
	<?php endif;
}


/**
 * Helper function to spell out numbers

 */

function cogito_foundation_sizer($num){
  $nums = Array ("denada", "one","two", "three","four","five", "six", "seven", "eight", "nine", "ten", "eleven", "twelve");
	return $nums[$num];
}

/**
 * Register our sidebars and widgetized areas. Also register the default Epherma widget.
 *
 * @since Twenty Eleven 1.0
 */
function cogito_wp_widgets_init() {


	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Primary Menu', 'twentyeleven' ) );

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


	register_sidebar( array(
		'name' => __( 'Showcase Sidebar', 'cogito_wp' ),
		'id' => 'sidebar-2',
		'description' => __( 'The sidebar for the optional Showcase Template', 'cogito_wp' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Area One', 'cogito_wp' ),
		'id' => 'footer-1',
		'description' => __( 'An optional widget area for your site footer', 'cogito_wp' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Area Two', 'cogito_wp' ),
		'id' => 'footer-2',
		'description' => __( 'An optional widget area for your site footer', 'cogito_wp' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Area Three', 'cogito_wp' ),
		'id' => 'footer-3',
		'description' => __( 'An optional widget area for your site footer', 'cogito_wp' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'cogito_wp_widgets_init' );



/**
 * Sets the post excerpt length to 40 words.
 *
 * To override this length in a child theme, remove the filter and add your own
 * function tied to the excerpt_length filter hook.
 */
function cogito_wp_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'cogito_wp_excerpt_length' );



/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 */
function cogito_wp_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= cogito_wp_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'cogito_wp_custom_excerpt_more' );

/**
 * Returns a "Continue Reading" link for excerpts
 */
function cogito_wp_continue_reading_link() {
	return ' <a href="'. esc_url( get_permalink() ) . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentyeleven' ) . '</a>';
}
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and twentyeleven_continue_reading_link().
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 */
function cogito_wp_auto_excerpt_more( $more ) {
	return ' &hellip;' . cogito_wp_continue_reading_link();
}
add_filter( 'excerpt_more', 'twentyeleven_auto_excerpt_more' );






/**
 * Get Only active Footers
 */
 
 
function cogito_get_footers() {

  //First count the widget areas we have and store active footers in an array
  $foot_counter = Array();
  for ($i=0;$i<4;$i++){
    if (is_active_sidebar( 'footer-' . $i ) ) $foot_counter[] = $i;
  }
  //Now print a block array 
  if ( !empty($foot_counter) ){
    foreach ($foot_counter as $footer_num){
      print '<div class="columns '.cogito_foundation_sizer(12 / sizeof($foot_counter)) .'">'; 
      dynamic_sidebar( 'footer-' . $footer_num ); 
      print '</div>';
    }
  }	
	
}




/**
 * Adds two classes to the array of body classes.
 * The first is if the site has only had one author with published posts.
 * The second is if a singular post being displayed
 *
 * @since Twenty Eleven 1.0
 */
function cogito_wp_body_classes( $classes ) {

	if ( ! is_multi_author() ) {
		$classes[] = 'single-author';
	}

	if ( is_singular() && ! is_home() )
		$classes[] = 'singular';

	return $classes;
}
add_filter( 'body_class', 'cogito_wp_body_classes' );




if ( ! function_exists( 'cogito_wp_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own cogito_wp_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Twenty Eleven 1.0
 */
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
