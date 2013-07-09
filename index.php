<?php
/**
 * The main template file.
 *
 * You'll notice that the classes and visibility of the sidebars are done programatically here. See the functions.php for 
 * Instructions on how this works. If you want to do manual sidebar entry you can remove the code and put in your own
 * values by hand
 *
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 */
 
//Programatially get the proper widths of the page colums
get_header(); ?>
  
  <?php // Main Content  ?>
  <div id="content" class="<?php print cogito_wp_col_class('content'); ?>" role="main">
  <?php cogito_content_top(); ?>
    <?php 
      if ( have_posts() ) {
        while ( have_posts() ) {
          the_post();  //set up $post variable
          get_template_part( 'loop', get_post_type() . "s" ); //basically this is just looking for loop-formats.php 
        }
      }
      else {
        get_template_part( 'loop','noresult' );
      }
    ?>   
    <?php // Begin Pagination ?>
    <?php if (function_exists( 'emm_paginate' )) {
      emm_paginate();
    } ?>	 
  
  <?php cogito_content_bottom(); ?>
  </div>
  			
  <?php // Get the Left Sidebar (if there is one) ?>
  <?php get_sidebar( 'left' ); ?> 			
  <?php // Right Sidebar (if there is one) ?>
  <?php get_sidebar( 'right' ); ?>
  
<?php get_footer(); ?>