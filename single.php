<?php
/**
 * The template file for single posts.
 *
 *
 * You'll notice that the classes and visibility of the sidebars are done programatically here. See the functions.php for 
 * Instructions on how this works. If you want to do manual sidebar entry you can remove the code and put in your own
 * values by hand
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 */

//Programatially get the proper widths of the page colums
get_header(); ?>
  
  <?php // Main Content  ?>
  <div id="content" class="<?php print cogito_wp_col_class( 'content' ); ?>" role="main">

    <?php cogito_content_top(); cogito_content_top_single(); ?>

    <?php 
      if ( have_posts() ) {
        while ( have_posts() ) {
          
          the_post();  //set up $post variable
          get_template_part( 'loop', get_post_type() ); //basically this is just looking for loop-format.php 

          if (function_exists( 'emm_paginate' )) { emm_paginate(); }       
        }
      }
      else {
        get_template_part( 'loop','noresult' );
      }?>
       
      <?php comments_template( '', true ); ?>

    <?php cogito_content_bottom(); cogito_content_bottom_single(); ?>
    
  </div>
		
  <?php // Left Sidebar  ?>
  <?php get_sidebar( 'left' ); ?>  			
  <?php // Right Sidebar  ?>
  <?php get_sidebar( 'right' ); ?>
  

<?php get_footer(); ?>