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
	
    <!-- See http://foundation.zurb.com/docs/components/top-bar.html for how this works -->
    <nav id="access" role="navigation" class="row top-bar hide-for-small">
<!--         <ul class="title-area">
            <li class="name">
                <h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
            </li>          
            <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
        </ul> -->
        <section class="top-bar-section">
            <?php desktop_nav(); ?>
        </section>
    </nav>



  <?php cogito_above_main(); ?>
	<div id="main" class="row outer">
  