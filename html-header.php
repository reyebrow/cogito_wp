<!DOCTYPE html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7"<?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
  
    <meta charset="<?php bloginfo( 'charset' ); ?>" />

  	<!-- Set the viewport width to device width for mobile -->
    <meta name="viewport" content="initial-scale=1.6, maximum-scale=1.0, width=device-width"/>

    <!-- Schema.org Description -->
    <meta itemprop="name" content="">
    <meta itemprop="description" content="">    
    
    <!-- Setting favicon and Apple Touch Icon -->
    <?php cogito_get_icons(); ?>

    <!-- Apple Developer Options -->
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    
    <title><?php
    	/*
    	 * Print the <title> tag based on what is being viewed.
    	 * Titles in wordpress can get complex. This is "borrowed"
    	 * from TwentyEleven
    	 */
    	global $page, $paged;
    
    	wp_title( '|', true, 'right' );
    
    	// Add the blog name.
    	bloginfo( 'name' );
    
    	// Add the blog description for the home/front page.
    	$site_description = get_bloginfo( 'description', 'display' );
    	if ( $site_description && ( is_home() || is_front_page() ) )
    		echo " | $site_description";
    
    	// Add a page number if necessary:
    	if ( $paged >= 2 || $page >= 2 )
    		echo ' | ' . sprintf( __( 'Page %s', 'cogito_wp' ), max( $paged, $page ) );
    
    	?></title>
    	
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

  	<!--[if lt IE 9]>
  		<link rel="stylesheet" href="stylesheets/ie.css">
  	<![endif]-->
  
  	<!-- IE Fix for HTML5 Tags -->
  	<!--[if lt IE 9]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  	<![endif]-->
  	
  	<!-- Orbit IE Settings -->
  	<!--[if IE]>
      <style type="text/css">
           .timer { display: none !important; }
           div.caption { background:transparent; filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000,endColorstr=#99000000);zoom: 1; }
      </style>
  	<![endif]-->
    
    <?php
    	/* We add some JavaScript to pages with the comment form
    	 * to support sites with threaded comments (when in use).
    	 */
    	if ( is_singular() && get_option( 'thread_comments' ) )
    		wp_enqueue_script( 'comment-reply' );
    
    	/* Always have wp_head() just before the closing </head>
    	 * tag of your theme, or you will break many plugins, which
    	 * generally use this hook to add elements to <head> such
    	 * as styles, scripts, and meta tags.
    	 *
    	 * NOTE: Style.css is below this so that it has final say
    	 *
    	 */
    	wp_head();
    ?>
     <?php // Most themes put the styles.css earlier but we want it later so it can have final say. ?>
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
  </head>
