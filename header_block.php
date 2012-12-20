<?php
/************************************************************
  Customizing your header:


  (more documentation coming soon)
  logo.png : Put a logo.png file into the root of your child them
  or in the /images folder and it will get picked up by cogito_get_logo
  
  Use foundation classes to set what goes inside the <Header></header> tags

*************************************************************/
?>

<script>
//document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')
</script>
  <div class="row">
    <?php if ( $logo = cogito_get_logo() ) : //Print a logo.png if there is one?>
    <div class="columns two">
      <img src="<?php print $logo; ?>">
    </div>
    <?php endif;?>
    <div class="columns seven">
    
      <div class="skiplink"><a href="#main">Skip to main content? &darr;</a></div>    	 
      
      <?php // TITLE / LOGO and DESCRIPTION  ?>
      <h1 id="site-title">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
          <?php bloginfo( 'name' ); ?>
        </a>
      </h1>
      <h4 id="site-description" class="subheader"><?php bloginfo( 'description' ); ?></h4>
      
    </div>
    
    <div class="columns three">
    
      <?php // SEARCH FORM  ?>
      <?php get_search_form(); ?>
      
    </div>
  
  </div><?php // row  ?>
