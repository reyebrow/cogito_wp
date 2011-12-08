<?php
/**
 * The Sidebar containing the main widget area.
 */
?>
	<?php if ( ! dynamic_sidebar( 'sidebar-right' ) ) : ?>
    
    <!--  These don't get set unless the dynamic sidebar is missing or empty-->
		<aside id="archives" class="widget">
			<h3 class="widget-title"><?php _e( 'Archives', 'twentyeleven' ); ?></h3>
			<ul>
				<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
			</ul>
		</aside>

		<aside id="meta" class="widget">
			<h3 class="widget-title"><?php _e( 'Meta', 'twentyeleven' ); ?></h3>
			<ul>
				<?php wp_register(); ?>
				<li><?php wp_loginout(); ?></li>
				<?php wp_meta(); ?>
			</ul>
		</aside>

	<?php endif; // end sidebar widget area ?>

