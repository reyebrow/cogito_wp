<?php
/**
 * The Template for Pages.
 *
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>


  <div class="eleven columns centered"><?php //This just gives a little room on the edges.?>
  
  
    <!-- Get the Left Sidebar (if there is one)-->
    <?php get_sidebar('left'); ?>
    
    <!-- Main Content -->
    <div id="content" class="columns six" role="main">
  
      <?php if ( have_posts() ) {
        while ( have_posts() ) {
          cogito_wp_content_nav( 'nav-above' ); 
          
          the_post();  //set up $post variable
          get_template_part( 'loop', 'page' ); //basically this is just looking for loop-format.php 
          
          cogito_wp_content_nav( 'nav-below' ); 
        }
      }
      else {
        get_template_part( 'loop','noresult' );
      } ?>   
      
       <?php comments_template( '', true ); ?> 
    
    </div>
  			
    <!-- Right Sidebar (if there is one)-->
    <?php get_sidebar('right'); ?>
    

  </div><?php //div eleven centered ?>

<?php get_footer(); ?>