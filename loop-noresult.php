<?php
/**
 * The template used for displaying page content in page.php
 *
 */
?>

<article id="post-0" class="post no-results not-found">
	<header class="entry-header">
		<h1 class="entry-title"><?php _e( 'Nothing Found', 'cogito_wp' ); ?></h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'cogito_wp' ); ?></p>
		<?php get_search_form(); ?>
	</div><!-- .entry-content -->
</article><!-- #post-0 -->
