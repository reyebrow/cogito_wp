<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 */
 
/*************************************************/

/* The header code is a little messy so now it lives in its own file. 
You'll find a lot of the HTML5 boilerplate stuff here: */
require_once( get_template_directory() . '/html-header.php');  

/*************************************************/?>

<body <?php body_class(); ?>>

  <?php cogito_action_above_container(); ?>
  
  <div id="page" class="hfeed container" role="main">
  
  <?php cogito_action_container_top(); ?>

	<nav class="skiplink"><a href="#skipcontent">Skip Content? &darr;</a></nav>

	<header id="branding" role="banner" class="row outer">
	
  <?php cogito_action_header_top(); ?>
  
   <div class="skiplink"><a href="#main">Skip to main content? &darr;</a></div>
	
	 <div class="eleven columns centered"><?php //This just gives a little room on the edges.?>
  	 <div class="row">
    	 <div class="columns eight">
    	 
    	     	 <?php // TITLE / LOGO and DESCRIPTION  ?>
    				<h1 id="site-title">
      				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
      				  <?php bloginfo( 'name' ); ?>
      				</a>
    				</h1>
    				<h4 id="site-description" class="subheader"><?php bloginfo( 'description' ); ?></h4>
    	 </div>

    	 <div class="columns four">
    	 
    	     	 <?php // SEARCH FORM  ?>
    	     	 
    	  <?php get_search_form(); ?>
    	 </div>
  		</div><?php // row  ?>


   </div><?php //This just gives a little room on the edges.?>
   
  <?php cogito_action_header_bottom(); ?>
  
	</header>
	
    <?php //MAIN MENU NAVBAR ?>
		<nav id="access" role="navigation" class="row outer">
		
      <?php //MOBILE MENU NAVBAR: a secondary menu intended for devices with with narrow screens. ?>
      <?php wp_nav_menu( array( 'theme_location' => 'primary-mobile', 'menu_class' => 'hide-on-desktops' ) ); ?>	
      	
			<?php //DESKTOP MAIN MENU ?>
							
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'hide-on-phones' ) ); ?>
		</nav>

	<div id="main" class="row outer">
