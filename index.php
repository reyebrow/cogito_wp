<?php
/**
 * The main template file.

 */

get_header(); ?>


  <!-- Left Sidebar -->
  <div id="secondary left" class="widget-area columns three" role="complementary">
    <?php get_sidebar('left'); ?>
  </div>
  
  
  
  
  <!--   Content -->
  <div id="content" class="columns six" role="main">

    <?php if ( have_posts() ) {
      while ( have_posts() ) {
        the_post();
        get_template_part( 'loop', get_post_format() ); //basically this is just looking for loop-format.php 
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