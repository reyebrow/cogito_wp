<?php
/************************************************************************

COGITO has action hooks that can be used to insert content without 

************************************************************************/

/***************************************************
//  Container Actions
***************************************************/
function cogito_action_above_container() 	{ do_action('cogito_action_above_container'); 	}
function cogito_action_below_container() 	{ do_action('cogito_action_below_container'); 	}

function cogito_action_container_top() 		{ do_action('cogito_action_container_top'); 		}
function cogito_action_container_bottom() { do_action('cogito_action_container_bottom'); 	}

/***************************************************
//  Region Actions
***************************************************/
// This first one's really useful for injecting things into the header like 
// conditional stylesheet code etc.
function cogito_html_header() 	          { do_action('cogito_html_header'); 	            }
function cogito_action_header_top()				{ do_action('cogito_action_header_top'); 				} 
function cogito_action_header_bottom() 		{ do_action('cogito_action_header_bottom'); 		}

function cogito_action_footer_top() 			{ do_action('cogito_action_footer_top'); 				} 
function cogito_action_footer_bottom() 		{ do_action('cogito_action_footer_bottom'); 		}

/***************************************************
//  Top and bottom of specific post types
***************************************************/
function cogito_above_main()                { do_action('cogito_above_main');                 }

function cogito_content_top() 						{ do_action('cogito_content_top'); 							}
function cogito_content_top_page() 				{ do_action('cogito_content_top_page'); 				}
function cogito_content_top_single() 			{ do_action('cogito_content_top_single'); 			}
function cogito_content_top_search() 			{ do_action('cogito_content_top_search'); 			}
function cogito_content_top_archive() 		{ do_action('cogito_content_top_archive'); 			}
function cogito_content_top_category() 		{ do_action('cogito_content_top_category'); 		}

function cogito_content_bottom()			 		{ do_action('cogito_content_bottom'); 					}
function cogito_content_bottom_page() 		{ do_action('cogito_content_bottom_page'); 			}
function cogito_content_bottom_single() 	{ do_action('cogito_content_bottom_single'); 		}
function cogito_content_bottom_search() 	{ do_action('cogito_content_bottom_search'); 		}
function cogito_content_bottom_archive() 	{ do_action('cogito_content_bottom_archive'); 	}
function cogito_content_bottom_category() { do_action('cogito_content_bottom_category'); 	}

/***************************************************
//  Front pages can be handled differently
***************************************************/
function cogito_content_top_front() 			{ do_action('cogito_content_top_front'); 				}
function cogito_content_bottom_front()		{ do_action('cogito_content_bottom_front'); 		}

/***************************************************
//  Top and bottom of the sidebars
***************************************************/
function cogito_content_sidebar_left_top() 				{ do_action('cogito_content_sidebar_left_top'); 		}
function cogito_content_sidebar_left_bottom() 		{ do_action('cogito_content_sidebar_left_bottom'); 	}

function cogito_content_sidebar_right_top() 			{ do_action('cogito_content_sidebar_right_top'); 		}
function cogito_content_sidebar_right_bottom() 		{ do_action('cogito_content_sidebar_right_bottom'); }

/***************************************************
//  Loop Actions
***************************************************/
function cogito_action_beforeloop() 			{ do_action('cogito_action_before_loop'); 			} 
function cogito_action_loop_item_top() 		{ do_action('cogito_action_loop_item_top'); 		} 
function cogito_action_loop_item_bottom() { do_action('cogito_action_loop_item_bottom'); 	} 
function cogito_action_afterloop() 				{ do_action('cogito_action_after_loop'); 				} 

/***************************************************
//  At the top and bottom of the comments block
***************************************************/
function cogito_action_comments_top()     { do_action('cogito_action_before_comments');	  }
function cogito_action_comments_bottom()  { do_action('cogito_action_after_comments'); 	  }

/***************************************************
//  At the top and bottom of each comment
***************************************************/
function cogito_action_comment_top() 			{ do_action('cogito_action_comment_top');       }
function cogito_action_comment_bottom() 	{ do_action('cogito_action_comment_bottom');    }
