<?php
/**
 * The main template file.

 */

get_header(); ?>


  <!-- Left Sidebar -->
  <div id="sidebar-right" class="columns three">
    <?php if ( ! dynamic_sidebar( 'sidebar-l' ) ) {} ?>
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
  <div id="sidebar-left" class="columns three">
    <?php if ( ! dynamic_sidebar( 'sidebar-r' ) ) {} ?>
  </div>

<?php get_footer(); ?>