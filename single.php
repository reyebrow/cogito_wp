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



<div class="eleven columns centered"><?php //This just gives a little room on the edges.?>

  <!-- Left Sidebar -->
  <?php get_sidebar('left'); ?>
  
  
  <!-- Main Content -->
  <div id="content" class="<?php print cogito_wp_col_class('content'); ?>" role="main">

    <?php 
      if ( have_posts() ) {
        while ( have_posts() ) {
          cogito_wp_content_nav( 'nav-above' ); 
          
          the_post();  //set up $post variable
          get_template_part( 'loop', 'single' ); //basically this is just looking for loop-format.php 
          
          cogito_wp_content_nav( 'nav-below' ); 
        }
      }
      else {
        get_template_part( 'loop','noresult' );
      }?>
      
      
      <?php comments_template( '', true ); ?>
    
  </div>
		
  			
  <!-- Right Sidebar -->
  <?php get_sidebar('right'); ?>


</div><?php //div eleven centered ?>	
  

<?php get_footer(); ?>