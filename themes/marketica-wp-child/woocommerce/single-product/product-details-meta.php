<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product;

$cat_terms = get_the_terms( $post->ID, 'product_cat' );
$tag_terms = get_the_terms( $post->ID, 'product_tag' );

$cat_count = !empty( $cat_terms ) && is_array( $cat_terms ) ? count( $cat_terms ) : 0;
$tag_count = !empty( $tag_terms ) && is_array( $tag_terms ) ? count( $tag_terms ) : 0;

if ( $tag_count < 1 && $cat_count < 1 )
	return;
?>
<ul class="list-item-details">
	<?php if ( version_compare( WC_VERSION, '3.0.0', '>=' ) ) : ?>
		<?php echo wc_get_product_category_list( $product->get_id(), ', ', '<li><span class="data-type">' . _n( 'Category', 'Categories', $cat_count, 'tokopress' ) . '</span><span class="value">', '</span></li>' ); ?>
		<?php echo wc_get_product_tag_list( $product->get_id(), ', ', '<li><span class="data-type">' . _n( 'Tag', 'Tags', $tag_count, 'tokopress' ) . '</span><span class="value">', '</span></li>' ); ?>
	<?php else : ?>
		<?php echo $product->get_categories( ', ', '<li><span class="data-type">' . _n( 'Category', 'Categories', $cat_count, 'tokopress' ) . '</span><span class="value">', '</span></li>' ); ?>
		<?php echo $product->get_tags( ', ', '<li><span class="data-type">' . _n( 'Tag', 'Tags', $tag_count, 'tokopress' ) . '</span><span class="value">', '</span></li>' ); ?>
	<?php endif; ?>
</ul>
