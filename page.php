<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 */

get_header(); ?>


  <!-- Left Sidebar -->
  <div id="secondary left" class="widget-area columns three" role="complementary">
    <?php get_sidebar('left'); ?>
  </div>
  
  <!--   Content -->
  <div id="content" class="columns six" role="main">

    <?php  the_post();  
    get_template_part( 'content', 'page' );
    comments_template( '', true );?>
    
  </div><!-- #content -->
  			
  			
  <!-- Right Sidebar -->
  <div id="secondary right" class="widget-area columns three" role="complementary">
    <?php get_sidebar('right'); ?>
  </div>

<?php get_footer(); ?>