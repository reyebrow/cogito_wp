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
  
  <?php //MOBILE MENU NAVBAR: a secondary menu intended for devices with with narrow screens. ?>
  <div id="mobile-nav-trigger" class="show-for-small row">
    <div class="columns phone-two">
      <a id="menu-link" data-reveal-id="mobile-nav" href="#">Menu</a>
    </div>
  </div>
  <nav id="mobile-nav" class="reveal-modal">
    <?php wp_nav_menu( array( 'theme_location' => 'primary-mobile', 'menu_class' => '' ) ); ?>  
    <a class="close-reveal-modal" href="#">X</a>
  </nav>   


  <div id="page" class="hfeed container" role="main">
  
  <?php cogito_action_container_top(); ?>

	<nav class="skiplink"><a href="#skipcontent">Skip Content? &darr;</a></nav>

  <?php //HEADER BLOCK ?>
	<header id="branding" role="banner" class="row outer">
	
  <?php cogito_action_header_top(); ?>
  
<?php /****************************************************************
	 
	 Note: people generally have very different headers so there's a separate file called header_block.php
	 
	 Your options are :
	       1) Preferred solution: create a new header_block.php file or duplicate the one in cogito_wp and put it 
	           in your child theme. Then put your header in there 

	       2) Less ideal: duplicate header.php in your child theme and replace all of this <?php tag with your header code      
	       
	       */
	 get_template_part( 'header_block'); 
    
    
    /****************************************************************/ ?>
   
  <?php cogito_action_header_bottom(); ?>
  
	</header>
	
	<nav id="access" role="navigation" class="row outer"><?php desktop_nav(); ?></nav>
  <?php cogito_above_main(); ?>
	<div id="main" class="row outer">
  