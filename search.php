<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 */

get_header(); ?>

  <?php // Main Content  ?>
  <div id="content" class="<?php print cogito_wp_col_class( 'content' ); ?>" role="main">

    <?php cogito_content_top(); cogito_content_top_search(); ?>

		<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'cogito_wp' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</header>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to overload this in a child theme then include a file
					 * called loop-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'loop', get_post_type() );
				?>

			<?php endwhile; ?>

			 <?php if (function_exists( 'emm_paginate' )) { emm_paginate(); } ?>

		<?php else : ?>

      <?php get_template_part( 'loop','noresult' ); ?>

		<?php endif; ?>

    <?php cogito_content_bottom(); cogito_content_bottom_search(); ?>

	</div><?php // #content  ?>

  <?php // Get the Left Sidebar (if there is one) ?>
  <?php get_sidebar( 'left' ); ?>
  <?php // Right Sidebar (if there is one) ?>
  <?php get_sidebar( 'right' ); ?>


<?php get_footer(); ?>