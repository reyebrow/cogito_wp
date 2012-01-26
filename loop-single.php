<?php
/**
 * The template used for displaying page content in page.php
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); sticky_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
				<?php cogito_posted_on(); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'twentyeleven' ) . '</span>', 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	
	<footer class="entry-meta">

	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
