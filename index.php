<?php
/**
 * The main template file.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>


  <!-- Left Sidebar -->
  <div id="secondary left" class="widget-area columns three" role="complementary">
    <?php get_sidebar('left'); ?>
  </div>
  
  
  
  <!-- Main Content -->
  <div id="content" class="columns six" role="main">

    <?php if ( have_posts() ) {
      while ( have_posts() ) {
        cogito_wp_content_nav( 'nav-above' ); 
        
        the_post();  //set up $post variable
        get_template_part( 'loop', get_post_format() ); //basically this is just looking for loop-format.php 
        
        cogito_wp_content_nav( 'nav-below' ); 
      }
    }
    else {
      get_template_part( 'loop','noresult' );
    }
    
    ?>    

  </div>
  			
  			
  			
  			
  <!-- Right Sidebar -->
  <div id="secondary right" class="widget-area columns three" role="complementary">
    <?php get_sidebar('right'); ?>
  </div>
  

<?php get_footer(); ?>