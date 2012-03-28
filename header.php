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
	
  <?php //MAIN MENU NAVBAR ?>
	<nav id="access" role="navigation" class="row outer">
	
    <?php //MOBILE MENU NAVBAR: a secondary menu intended for devices with with narrow screens. ?>
    <?php wp_nav_menu( array( 'theme_location' => 'primary-mobile', 'menu_class' => 'hide-on-desktops', 'walker' => new Arrow_Walker_Nav_Menu ) ); ?>	
    	
		<?php //DESKTOP MAIN MENU ?>
						
		<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'hide-on-phones', 'walker' => new Arrow_Walker_Nav_Menu) ); ?>
	</nav>

	<div id="main" class="row outer">
