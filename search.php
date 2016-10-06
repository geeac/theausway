<?php

//* Reposition the primary navigation menu
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_before_header', 'genesis_do_nav' );

//* Remove the entry meta in the entry header (requires HTML5 theme support)
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );


//* Remove the post content
remove_action( 'genesis_entry_content', 'genesis_do_post_content' );

add_action('genesis_entry_footer', 'aus_search_entry_footer' );
function aus_search_entry_footer() {
//	echo '<pre>';
//	var_dump($GLOBALS['post']);
//	echo '</pre>';
	global $post;
	echo '<a class="more-link" href="'. get_permalink( $post->ID) .'">View Product</a>';
}

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
	$classes[] = 'search-results one-third';
	global $wp_query;
	if( 0 == $wp_query->current_post || 0 == $wp_query->current_post % 3 )
		$classes[] = 'first';
	return $classes;
}
add_filter( 'post_class', 'aus_archive_post_class' );

//* Modify the WordPress read more link
add_filter( 'the_content_more_link', 'sp_read_more_link' );
function sp_read_more_link() {
	return '<a class="more-link" href="' . get_permalink() . '">[Continue Reading]</a>';
}



//* Run the Genesis loop
genesis();