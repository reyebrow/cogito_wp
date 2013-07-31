<?php
/************************************************************
  Customizing your header:


  (more documentation coming soon)
  logo.png : Put a logo.png file into the root of your child them
  or in the /images folder and it will get picked up by cogito_get_logo
  
  Use foundation classes to set what goes inside the <Header></header> tags

*************************************************************/
?>

  <?php //MOBILE MENU NAVBAR: a secondary menu intended for devices with with narrow screens. ?>

  <nav id="mobile-nav" class="reveal-modal">
    <?php wp_nav_menu( array( 'theme_location' => 'primary-mobile', 'menu_class' => '' ) ); ?>  
    <a class="close-reveal-modal" href="#">X</a>
  </nav>   

  <nav class="top-bar show-for-small">
    <ul class="title-area">
      <!-- Title Area -->
      <li class="name">
        <h1>
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
            <?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>
          </a>
        </h1>
      </li>
      <li class="toggle-topbar menu-icon"><a href="#" data-reveal-id="mobile-nav"><span>Menu</span></a></li>
    </ul>
  </nav>



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

