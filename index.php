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

  <div class="eleven columns centered"><?php //This just gives a little room on the edges.?>

  <?php // Get the Left Sidebar (if there is one) ?>
  <?php get_sidebar('left'); ?>
  
  <?php // Main Content  ?>
  <div id="content" class="<?php print cogito_wp_col_class('content'); ?>" role="main">

    <?php 
      if ( have_posts() ) {
        while ( have_posts() ) {
          
          the_post();  //set up $post variable
          get_template_part( 'loop', get_post_format() ); //basically this is just looking for loop-format.php 
           
        }
      }
      else {
        get_template_part( 'loop','noresult' );
      }
    ?>   
    <?php // Begin Pagination ?>
    <?php if (function_exists("emm_paginate")) {
      emm_paginate();
    } ?>	 

  </div>
  			
  			
  <?php // Right Sidebar (if there is one) ?>
  <?php get_sidebar('right'); ?>
  
  </div><?php //div eleven centered ?>
<?php get_footer(); ?>