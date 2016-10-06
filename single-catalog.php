<?php

//* Remove the entry meta in the entry header (requires HTML5 theme support)
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );

//* Remove the entry meta in the entry footer (requires HTML5 theme support)
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );

add_action( 'genesis_entry_footer', 'aus_pdf_links' );

function aus_pdf_links() {

	echo '<div class="download-links">';
	echo '<p>Download: <a href="' . CFS()->get('front_pdf') . '">'. CFS()->get( 'link_text_1' ) .'</a></p>';
	echo '<p>Download: <a href="' . CFS()->get('back_pdf') . '">'. CFS()->get( 'link_text_2' ) .'</a></p>';
	echo '</div>';

}

genesis();