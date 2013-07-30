<?php
/**
 * The template used for displaying page content in page.php
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <?php cogito_action_loop_item_top(); ?>

	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><?php // .entry-header  ?>

	<div class="entry-content">

		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'cogito_wp' ) . '</span>', 'after' => '</div>' ) ); ?>

	</div><?php // .entry-content  ?>

	<?php cogito_action_loop_item_bottom(); ?>

</article><?php // #post-<?php the_ID(); ?>
