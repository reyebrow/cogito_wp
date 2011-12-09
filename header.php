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
require_once('html-header.php');  
/*************************************************/?>

<body <?php body_class(); ?>>
<div id="page" class="hfeed container" role="main">


	<nav class="row">
		<div class="twelve columns hide-on-desktops"><a href="#skipcontent">Skip Content? &darr;</a></div>
	</nav>

	<header id="branding" role="banner" class="row">
	
	 <div class="eleven columns centered"><?php //This just gives a little room on the edges.?>
	
      <!-- TITLE / LOGO and DESCRIPTION -->
			<hgroup class="columns eight">
				<h1 id="site-title">
  				<span>
    				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
    				  <?php bloginfo( 'name' ); ?>
    				</a>
  				</span>
				</h1>
				<h4 id="site-description" class="subheader"><?php bloginfo( 'description' ); ?></h4>
			</hgroup>


      <!-- SEARCH FORM -->
			<div class="columns four">
			 <?php get_search_form(); ?>
			</div>
			
			
    </div><?php //This just gives a little room on the edges.?>


    <!--MAIN MENU NAVBAR -->
		<nav id="access" role="navigation" class="row">
		
			<h3 class="assistive-text hide-on-desktops"><?php _e( 'Main menu', 'cogito_wp' ); ?></h3>			
			<?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff. */ ?>
							
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav>
		
		
	</header>


	<div id="main" class="row">