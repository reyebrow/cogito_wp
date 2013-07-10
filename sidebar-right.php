<?php
/**
 * The Sidebar containing the main widget area.
 */

if ( $class = cogito_wp_col_class( 'right' ) ) : ?>

  <div id="sidebar-right" class="widget-area <?php print $class ?>" role="complementary">
    <?php cogito_action_loop_item_top(); ?>
  	<?php if ( ! dynamic_sidebar( 'sidebar-right' ) ) {
  	
  	 /* Here's where you put widgets to display when there are no widgets assigned.
    
    IMPORTANT NOTE: unless you change the way cogito_wp_get_cols() works or the way 
    this file checks for sidebars nothing here will ever be seen. */
      
    } ?>
  
    <?php cogito_action_loop_item_top(); ?>
  </div>

<?php endif; ?>
 

