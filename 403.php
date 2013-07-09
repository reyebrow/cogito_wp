<?php
/**
 * The 404 error page
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>
    
    <?php // Main Content  ?>
    <div id="content" class="<?php print cogito_wp_col_class( 'content' ); ?>" role="main">
  
      <h2>Error 403 - Access Denied</h2>
      <p>Whoops. You're not really supposed to be here. Please use the navigation menu to find what you were looking for.</p>
    </div>

    <?php // Get the Left Sidebar (if there is one) ?>
    <?php get_sidebar( 'left' ); ?>    			  			
    <?php // Right Sidebar (if there is one) ?>
    <?php get_sidebar( 'right' ); ?>
  

<?php get_footer(); ?>