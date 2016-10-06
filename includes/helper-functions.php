<?php
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {

unset( $tabs['additional_information'] );  	// Remove the additional information tab

return $tabs;

}

function add_product_dimensions() {
	global $product;
	$dimensions = $product->get_dimensions();

	if ( ! empty( $dimensions ) ) {
		echo '<span class="dimensions">Dimensions: ' . $dimensions . '</span>';
	}
}
add_action( 'woocommerce_single_product_summary', 'add_product_dimensions', 6 );

/** add featured image to archive **/
add_action( 'genesis_entry_header', 'aus_add_feats_archive' );
function aus_add_feats_archive () {
	if ( is_post_type_archive( 'catalog' ) || is_tax( 'states' ) ) {
		if ( has_post_thumbnail() ) { ?>
			<a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail( 'catalog-archive' ); ?>
			</a>
		<?php }
	}
}

function aus_catalog_sort( $query ) {
	if ( is_admin() || ! $query->is_main_query() )
		return;

	if ( is_post_type_archive( 'catalog' ) ) {
		$query->set( 'orderby', 'title' );
		$query->set( 'order', 'ASC' );
		return;
	}
}
add_action( 'pre_get_posts', 'aus_catalog_sort', 1 );