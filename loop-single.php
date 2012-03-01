<?php
/**
 * The template used for displaying page content in page.php
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); sticky_class(); ?>>

  <?php cogito_action_loop_item_top(); ?>

	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
				<?php cogito_posted_on(); ?>
	</header><?php // .entry-header  ?>

	<div class="entry-content">

		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'twentyeleven' ) . '</span>', 'after' => '</div>' ) ); ?>

	</div><?php // .entry-content  ?>
	
	<footer class="entry-meta">

	</footer><?php // .entry-meta  ?>
	
  <?php cogito_action_loop_item_bottom(); ?>
	
</article><!-- #post-<?php the_ID(); ?> -->
