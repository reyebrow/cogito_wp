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

			<?php get_template_part( 'loop', get_post_format() ); ?>

		<?php endwhile; ?>

		<?php if (function_exists( 'emm_paginate' )) { emm_paginate(); } ?>

		<?php else : ?>

      		<article id="post-0" class="post no-results not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Nothing Found', 'cogito_wp' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'cogito_wp' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

		<?php endif; ?>

    <?php cogito_content_bottom(); cogito_content_bottom_search(); ?>

	</div><?php // #content  ?>

  <?php // Get the Left Sidebar (if there is one) ?>
  <?php get_sidebar( 'left' ); ?>
  <?php // Right Sidebar (if there is one) ?>
  <?php get_sidebar( 'right' ); ?>


<?php get_footer(); ?>