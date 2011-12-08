<?php
/**
 * The Template for Pages.
 *
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>


  <!-- Left Sidebar -->
  <div id="secondary left" class="widget-area columns three" role="complementary">
    <?php get_sidebar('left'); ?>
  </div>
  
  <!--   Content -->
  <div id="content" class="columns six" role="main">
  
    <?php 
      cogito_wp_content_nav( 'nav-above' );
      
      the_post();  //set up $post variable
      get_template_part( 'loop', 'page' );
      comments_template( '', true );
      
      cogito_wp_content_nav( 'nav-below' ); 
    ?>
    
  </div><!-- #content -->
  			
  			
  <!-- Right Sidebar -->
  <div id="secondary right" class="widget-area columns three" role="complementary">
    <?php get_sidebar('right'); ?>
  </div>

<?php get_footer(); ?>