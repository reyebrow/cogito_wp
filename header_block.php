<?php
/************************************************************
  Customizing your header:


  (more documentation coming soon)
  logo.png : Put a logo.png file into the root of your child them
  or in the /images folder and it will get picked up by cogito_get_logo
  
  Use foundation classes to set what goes inside the <Header></header> tags

*************************************************************/
?>
  <div class="row">
    <?php if ( $logo = cogito_get_logo() ) : //Print a logo.png if there is one?>
    <div class="columns large-2">
      <img src="<?php print $logo; ?>">
    </div>
    <?php endif;?>
    <div class="columns large-7">	 
      
      <?php // TITLE / LOGO and DESCRIPTION  ?>
      <h1 id="site-title">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
          <?php bloginfo( 'name' ); ?>
        </a>
      </h1>
      <h4 id="site-description" class="subheader"><?php bloginfo( 'description' ); ?></h4>
      
    </div>
    
    <div class="columns large-3">
    
      <?php // SEARCH FORM  ?>
      <?php get_search_form(); ?>
      
    </div>
  
  </div><?php // row  ?>
