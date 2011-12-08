<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
 
/* The header code is a little messy so now it lives in its own file. 
You'll find a lot of the HTML5 boilerplate stuff here: */
require_once('html-header.php');  ?>

<body <?php body_class(); ?>>
<div id="page" class="hfeed container">



	<header id="branding" role="banner" class="row">
			<hgroup class="columns six">
				<h1 id="site-title"><span><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span></h1>
				<h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>
			</hgroup>

		
				<div class="columns six">
				<?php get_search_form(); ?>
				</div>


			<nav id="access" role="navigation" class="row">
				<h3 class="assistive-text hide-on-desktops"><?php _e( 'Main menu', 'cogito_wp' ); ?></h3>
				<?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff. */ ?>
				<div class="skip-link hide-on-desktops"><a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to primary content', 'cogito_wp' ); ?>"><?php _e( 'Skip to primary content', 'twentyeleven' ); ?></a></div>
				<div class="skip-link hide-on-desktops"><a class="assistive-text" href="#secondary" title="<?php esc_attr_e( 'Skip to secondary content', 'cogito_wp' ); ?>"><?php _e( 'Skip to secondary content', 'twentyeleven' ); ?></a></div>
				
				
				<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu. The menu assiged to the primary position is the one used. If none is assigned, the menu with the lowest ID is used. */ ?>
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</nav><!-- #access -->
	</header><!-- #branding -->

  


	<div id="main" class="row">