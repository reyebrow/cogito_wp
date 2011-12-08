<?php

/**
 * Foundation is what we base our themes on
 *
 * @since Twenty Eleven 1.0
 */

function cogito_wp_admin_enqueue_scripts( $hook_suffix ) {
	wp_enqueue_style( 'foundation-css', get_template_directory_uri() . '/foundation/stylesheets/foundation.css'  );
		
	wp_enqueue_script( 'foundation-js', get_template_directory_uri() . '/foundation/javascripts/foundation.js', array('jquery') );
	//App.js just contains some extra form stuff for now.
	wp_enqueue_script( 'foundation-app', get_template_directory_uri() . '/js/app.js', array('jquery') );

}
add_action( 'wp_enqueue_scripts', 'cogito_wp_admin_enqueue_scripts' );



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

	//register_widget( 'Twenty_Eleven_Ephemera_Widget' );

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