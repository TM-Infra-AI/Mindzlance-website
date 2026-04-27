<?php
/**
 * Pagination - Show numbered pagination for catalog pages.
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.1
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $wp_query;
?>

<?php if ( version_compare( WC_VERSION, '3.3.0', '>=' ) ) : ?>

	<?php 
	$total   = isset( $total ) ? $total : wc_get_loop_prop( 'total_pages' );
	$current = isset( $current ) ? $current : wc_get_loop_prop( 'current_page' );
	$base    = isset( $base ) ? $base : esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) );
	$format  = isset( $format ) ? $format : '';

	if ( $total <= 1 ) {
		return;
	}
	?>
	<nav class="pagination">
		<?php
			echo paginate_links( apply_filters( 'woocommerce_pagination_args', array( // WPCS: XSS ok.
				'base'         => $base,
				'format'       => $format,
				'add_args'     => false,
				'current'      => max( 1, $current ),
				'total'        => $total,
				'prev_text'    => '&larr;',
				'next_text'    => '&rarr;',
				'type'         => 'list',
				'end_size'     => 3,
				'mid_size'     => 3,
			) ) );
		?>
	</nav>

<?php else : ?>

	<?php 
	if ( $wp_query->max_num_pages <= 1 )
		return;
	?>
	<nav class="pagination">
		<?php
			echo paginate_links( apply_filters( 'woocommerce_pagination_args', array(
				'base'         => esc_url( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) ),
				'format'       => '',
				'current'      => max( 1, get_query_var( 'paged' ) ),
				'total'        => $wp_query->max_num_pages,
				'prev_text'    => __( 'Previous', 'tokopress' ),
				'next_text'    => __( 'Next', 'tokopress' ),
				'type'         => 'plain',
				'end_size'     => 2,
				'mid_size'     => 2
			) ) );
		?>
	</nav>

<?php endif; ?>
