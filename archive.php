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


  <!-- Left Sidebar -->
  <div id="secondary left" class="widget-area columns three" role="complementary">
    <?php get_sidebar('left'); ?>
  </div>
  

  <!-- Main Content -->
	<div id="content" class="columns six" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php if ( is_day() ) : ?>
						<?php printf( __( 'Daily Archives: %s', 'cogito_wp' ), '<span>' . get_the_date() . '</span>' ); ?>
					<?php elseif ( is_month() ) : ?>
						<?php printf( __( 'Monthly Archives: %s', 'cogito_wp' ), '<span>' . get_the_date( 'F Y' ) . '</span>' ); ?>
					<?php elseif ( is_year() ) : ?>
						<?php printf( __( 'Yearly Archives: %s', 'cogito_wp' ), '<span>' . get_the_date( 'Y' ) . '</span>' ); ?>
					<?php else : ?>
						<?php _e( 'Blog Archives', 'cogito_wp' ); ?>
					<?php endif; ?>
				</h1>
			</header>

			<?php cogito_wp_content_nav( 'nav-above' ); ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to overload this in a child theme then include a file
					 * called loop-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'loop', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php cogito_wp_content_nav( 'nav-below' ); ?>

		<?php else : ?>

      <?php get_template_part( 'loop','noresult' ); ?>

		<?php endif; ?>

	</div><!-- #content -->




  <!-- Right Sidebar -->
  <div id="secondary right" class="widget-area columns three" role="complementary">
    <?php get_sidebar('right'); ?>
  </div>
  

<?php get_footer(); ?>