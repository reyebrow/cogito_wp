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
  
  <?php // Main Content  ?>
  <div id="content" class="<?php print cogito_wp_col_class( 'content' ); ?>" role="main">
  <?php cogito_content_top(); ?>

	<?php if ( have_posts() ) : ?>

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
			
			<?php get_template_part( 'loop', get_post_format() ); ?>
			
		<?php endwhile; ?>
			
			<?php /* Display pagination */ ?>
			<?php if ( function_exists( 'emm_paginate' )) :	
				emm_paginate();     
		     endif; ?>

		<?php else: ?>
			
			<?php get_template_part( 'loop', 'noresult' ); ?>

    <?php endif; ?>
 

  <?php cogito_content_bottom(); ?>
  </div>
  			
  <?php // Get the Left Sidebar (if there is one) ?>
  <?php get_sidebar( 'left' ); ?> 			
  <?php // Right Sidebar (if there is one) ?>
  <?php get_sidebar( 'right' ); ?>
  
<?php get_footer(); ?>