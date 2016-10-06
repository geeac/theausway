<?php
/**
 * This file adds the Frontpage template to the Beautiful Pro Theme.
 *
 * @author StudioPress
 * @package Beautiful Pro
 * @subpackage Customizations
*/


//* Remove site header banner
//remove_action( 'genesis_after_header', 'beautiful_site_header_banner' );

//* Remove primary nav
remove_action( 'genesis_after_header', 'genesis_do_nav' );


//* Remove page title
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );


//* Hook Home widget area after content
add_action( 'genesis_after_loop', 'aus_home_widgets' );
function aus_home_widgets() {
	genesis_widget_area( 'welcome-message', array(
		'before' => '<div class="welcome-message" class="widget-area">',
		'after'  => '</div>',
	) );
  
 	genesis_widget_area( 'testimonials', array(
		'before' => '<h2 class="widget-area-heading">Nationwide Project Installations:</h2><div class="testimonials" class="widget-area">',
		'after'  => '</div>'
	));
}

//* Run the Genesis loop
genesis();