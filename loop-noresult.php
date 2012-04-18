<?php
/**
 * The template used for displaying page content in page.php
 *
 */
?>
<?php if (is_single() ) : ?>

<article id="post-0" class="post no-results not-found hentry">

  <?php cogito_action_loop_item_top(); ?>

	<header class="entry-header">
		<h1 class="entry-title"><?php _e( 'Nothing Found', 'cogito_wp' ); ?></h1>
	</header><?php // .entry-header  ?>

	<div class="entry-content">
		<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'cogito_wp' ); ?></p>
		<?php get_search_form(); ?>
	</div><?php // .entry-content  ?>

  <?php cogito_action_loop_item_bottom(); ?>

</article><?php // #post-0  ?>




<?php else : ?>

<article id="post-0" class="post no-results not-found hentry">

  <?php cogito_action_loop_item_top(); ?>

  <div class="entry-content">
    <p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'cogito_wp' ); ?></p>
  </div><?php // .entry-content  ?>

  <?php cogito_action_loop_item_bottom(); ?>

</article><?php // #post-0  ?>

<?php endif; ?>