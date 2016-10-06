<?php

//* Remove the entry meta in the entry header (requires HTML5 theme support)
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );

remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );

remove_action( 'genesis_entry_content', 'genesis_do_post_content' );

/**
 * Archive Post Class
 * @since 1.0.0
 *
 * Breaks the posts into three columns
 * @link http://www.billerickson.net/code/grid-loop-using-post-class
 * @link http://www.billerickson.net/a-better-and-easier-grid-loop/
 *
 * @param array $classes
 * @return array
 */
function aus_archive_post_class( $classes ) {
	$classes[] = 'taxonomy-states one-third';
	global $wp_query;
	if( 0 == $wp_query->current_post || 0 == $wp_query->current_post % 3 )
		$classes[] = 'first';
	return $classes;
}
add_filter( 'post_class', 'aus_archive_post_class' );

genesis();