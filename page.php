<?php
/**
 * The Template for Pages.
 *
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>

    <?php // Main Content ?>
    <div id="content" class="<?php print cogito_wp_col_class( 'content' ); ?>" role="main">
  
      <?php cogito_content_top(); cogito_content_top_page(); ?>

      <?php while ( have_posts() ) : the_post(); ?>

          <?php get_template_part( 'loop', 'page' ); ?>
       
      <?php endwhile;   // end of the loop. ?>
    
      <?php cogito_content_bottom(); cogito_content_bottom_page(); ?>
    
    </div>

    <?php //Get the Left Sidebar (if there is one) ?>
    <?php get_sidebar( 'left' ); ?>  			
    <?php // Right Sidebar (if there is one) ?>
    <?php get_sidebar( 'right' ); ?>  

<?php get_footer(); ?>