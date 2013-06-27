<?php

/*
Here's where you get to set up the widths of your columns. If you change
the number of columns you may need to redefine cogito_wp_get_cols in this
file

ALL SECTIONS MUST ADD UP TO total_columns (or not. maybe you like the look of a broken site)

*/
  $cogito_init = array(
    'total_columns'      => 12,
      //Three columns with right and left sidebar
    'three_columns_left'     => 3,
    'three_columns_content'  => 6,
    'three_columns_right'    => 3,
    
    //Two columns with right sidebar
    'two_columns_rsb_right'   => 4,
    'two_columns_rsb_content' => 8,
    
    //Two columns with Left sidebar
    'two_columns_lsb_left'    => 4,
    'two_columns_lsb_content' => 8,
    
    //1 Column. Centered by default
    'one_column_content'      => 10
  );  
  update_option( 'cogito_columns', $cogito_init );
