<?php
/**
 * The template for displaying search forms in Cogito
 */
?>
<form method="get" class="nice" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">

  <!--<label for="s" class="assistive-text"><?php _e( 'Search', 'cogito_wp' ); ?></label> -->

 <div class="row collapse">
    <div class="eight mobile-three columns">
      <input type="text" class="field" name="s" id="s" placeholder="<?php esc_attr_e( 'Search', 'cogito_wp' ); ?>" />
    </div>
    <div class="four mobile-one columns">
      <input type="submit" class="submit button postfix" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Go', 'cogito_wp' ); ?>" />
  
    </div>
  </div>

</form>
