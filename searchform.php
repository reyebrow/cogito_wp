<?php
/**
 * The template for displaying search forms in Cogito
 */
?>
<form method="get" class="nice" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">

  <!--<label for="s" class="assistive-text"><?php _e( 'Search', 'cogito_wp' ); ?></label> -->
	<input type="submit" class="submit button small nice right" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'cogito_wp' ); ?>" />
	<input type="text" class="field input-text oversize small right" name="s" id="s" placeholder="<?php esc_attr_e( 'Search', 'cogito_wp' ); ?>" />

</form>
