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
<div id="page" class="hfeed container" role="main">


	<nav class="row outer top">
		<div class="twelve columns hide-on-desktops"><a href="#skipcontent">Skip Content? &darr;</a></div>
	</nav>

	<header id="branding" role="banner" class="row outer">

   <div class="skiplink"><a href="#main">Skip to main content? &darr;</a></div>
	
	 <div class="eleven columns centered"><?php //This just gives a little room on the edges.?>
	
      <!-- TITLE / LOGO and DESCRIPTION -->
			<hgroup class="columns eight">
				<h1 id="site-title">
  				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
  				  <?php bloginfo( 'name' ); ?>
  				</a>
				</h1>
				<h4 id="site-description" class="subheader"><?php bloginfo( 'description' ); ?></h4>
			</hgroup>


      <!-- SEARCH FORM -->
			<div class="columns four">
			 <?php get_search_form(); ?>
			</div>
			
    </div><?php //This just gives a little room on the edges.?>


    <?php //MAIN MENU NAVBAR ?>
		<nav id="access" role="navigation" class="row outer">
		
      <?php //MOBILE MENU NAVBAR: a secondary menu intended for devices with with narrow screens. ?>
      <?php wp_nav_menu( array( 'theme_location' => 'primary-mobile', 'menu_class' => 'hide-on-desktops' ) ); ?>	
      	
			<?php //DESKTOP MAIN MENU ?>
							
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'hide-on-phones' ) ); ?>
		</nav>
		
	</header>


	<div id="main" class="row outer">
