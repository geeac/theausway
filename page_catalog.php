<?php
/**
 * This file adds the Landing template to the Beautiful Pro Theme.
 *
 * @author StudioPress
 * @package Beautiful Pro
 * @subpackage Customizations
*/

/*
Template Name: Catalog Page
*/


//* Remove site header banner
//remove_action( 'genesis_after_header', 'beautiful_site_header_banner' );

//* Remove page title
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );

//* Add Shop menu
add_action( 'genesis_after_header', 'genesis_do_nav' );

//* Hook Rooms widget area after content
add_action( 'genesis_after_loop', 'aus_rooms' );
function aus_rooms() {
  	genesis_widget_area( 'featured-rooms', array(
		'before' => '<h2 class="widget-area-heading">Shop Rooms:</h2><div class="featured-rooms" class="widget-area">',
		'after'  => '</div>'
	));
}

//* Run the Genesis loop
genesis();