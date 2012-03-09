<?php
/**
 * The 404 error page
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>


  <div class="eleven columns centered"><?php //This just gives a little room on the edges.?>
  
    <?php // Get the Left Sidebar (if there is one) ?>
    <?php get_sidebar('left'); ?>
    
    
    <?php // Main Content  ?>
    <div id="content" class="<?php print cogito_wp_col_class('content'); ?>" role="main">
  
      <h2>Error 404 - Not Found</h2>
      <p>This page could not be found. Sorry you're having trouble. Please use the navigation menu to find what you were looking for.</p>
    </div>
    			  			
    <?php // Right Sidebar (if there is one) ?>
    <?php get_sidebar('right'); ?>
  
  </div><?php //div eleven centered ?>  

<?php get_footer(); ?>