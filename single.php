<?php
/**
 * The template file for single posts.
 *
 *
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>


  <!-- Left Sidebar -->
  <div id="secondary left" class="widget-area columns three" role="complementary">
    <?php get_sidebar('left'); ?>
  </div>
  
  
  <div id="content" class="columns six" role="main">
    <?php 
      cogito_wp_content_nav( 'nav-above' );
      
      get_template_part( 'loop', 'single' );
      comments_template( '', true );
      
      cogito_wp_content_nav( 'nav-below' ); 
    ?>
  </div><!-- #content -->
  			
  			
  <!-- Right Sidebar -->
  <div id="secondary right" class="widget-area columns three" role="complementary">
    <?php get_sidebar('right'); ?>
  </div>

<?php get_footer(); ?>