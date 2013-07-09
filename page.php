<?php
/**
 * The Template for Pages.
 *
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>


    <?php // Main Content ?>
    <div id="content" class="<?php print cogito_wp_col_class('content'); ?>" role="main">
  
      <?php cogito_content_top(); cogito_content_top_page(); ?>

      <?php if ( have_posts() ) {
        while ( have_posts() ) {
          
          the_post();  //set up $post variable
          get_template_part( 'loop', 'page' ); //basically this is just looking for loop-format.php 
          
          cogito_wp_content_nav( 'nav-below' ); 
        }
      }
      else {
        get_template_part( 'loop','noresult' );
      } ?>   
      
      <?php if (function_exists( 'emm_paginate' )) { emm_paginate(); } ?>
    
      <?php cogito_content_bottom(); cogito_content_bottom_page(); ?>
    
    </div>

    <?php //Get the Left Sidebar (if there is one) ?>
    <?php get_sidebar( 'left' ); ?>  			
    <?php // Right Sidebar (if there is one) ?>
    <?php get_sidebar( 'right' ); ?>
    

<?php get_footer(); ?>