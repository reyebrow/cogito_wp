<?php
/********************************************************************************
Here's where you get to set up the widths of your columns. If you change
the number of columns you may need to redefine cogito_wp_get_cols in this
file

ALL SECTIONS MUST ADD UP TO 12 (or not. maybe you like the look of a broken site)
*********************************************************************************/
$cogito_init = array(
  //Three columns with right and left sidebar
  'three_columns_left'     => 3,
  'three_columns_content'  => 6,
  'three_columns_right'    => 3,
  
  //Two columns with right sidebar
  'two_columns_rsb_right'   => 4,
  'two_columns_rsb_content' => 8,
  
  //Two columns with Left sidebar
  'two_columns_lsb_left'    => 3,
  'two_columns_lsb_content' => 9,
  
  //1 Column. Centered by default
  'one_column_content'      => 10,

/******************************************************************************************************
 *  Sets an array corresponding to the number and widths of your footers from left to right. 
 *  You can have as many footers as you want but the widths MUST add up to 12 or Foundation columns 
 *  will hate you and stop answering your phone calls.
 * 
 *  Example:  3 columns of equal width  array(4,4,4);
              2 columns of widths 4 and 8 array(4,8);
 *****************************************************************************************************/
  
  'footers' => array( 4,3,5 )
); 
  
  
/*********************************************************************************
  Cogito_wp comes with sidebars but we can remove and extend them
  
  NOTE: We recommend that you don't modify footers here since they are handled 
  dynamically above.
*********************************************************************************/
function cogito_extra_sidebars() {

    //unregister_sidebar( 'sidebar-left' ); //Uncomment this line to remove the left sidebar from your site

    //Uncomment below to get a New widgetized area. NOTE: You will need to add it into your theme using dynamic_sidebar()
   	/*
    register_sidebar( array(
  		'name' => __( 'HOMEPAGE WIDGET', 'cogito_wp' ),
  		'id' => 'homepage-widgets',
  		'before_widget' => '<aside id="%1$s" class="columns six widget %2$s"><div class="widget-inner">',
  		'after_widget' => "</div></aside>",
  		'before_title' => '<h2 class="widget-title">',
  		'after_title' => '</h2>',
  	) );  
    */

}

/*****************************************************************************************************************************/
/*        PUT YOUR CUSTOM THEME FUNCTIONS BELOW HERE                                                                         */
/*****************************************************************************************************************************