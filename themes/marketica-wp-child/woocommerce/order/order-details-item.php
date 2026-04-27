<?php
/**
 * Order Item Details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details-item.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! apply_filters( 'woocommerce_order_item_visible', true, $item ) ) {
	return;
}
?>
<tr class="<?php echo esc_attr( apply_filters( 'woocommerce_order_item_class', 'woocommerce-table__line-item order_item', $item, $order ) ); ?>">

	<td class="woocommerce-table__product-name product-name">
		<?php
			$is_visible        = $product && $product->is_visible();
			$product_permalink = apply_filters( 'woocommerce_order_item_permalink', $is_visible ? $product->get_permalink( $item ) : '', $item, $order );

			echo apply_filters( 'woocommerce_order_item_name', $product_permalink ? sprintf( '<a href="%s">%s</a>', $product_permalink, $item->get_name() ) : $item->get_name(), $item, $is_visible );
			echo apply_filters( 'woocommerce_order_item_quantity_html', ' <strong class="product-quantity">' . sprintf( '&times; %s', $item->get_quantity() ) . '</strong>', $item );

			do_action( 'woocommerce_order_item_meta_start', $item_id, $item, $order, false );

			wc_display_item_meta( $item );

			do_action( 'woocommerce_order_item_meta_end', $item_id, $item, $order, false );

		$product_id = $item['product_id'];
		?>

	</td>

	<td class="woocommerce-table__product-total product-total">
		<?php echo $order->get_formatted_line_subtotal( $item ); ?>
	</td>
	<td class="woocommerce-table__product-total product-total">
		<p class="order-again">
			<a href="#" class="button" id="show_seller_contact_form"><?php _e( 'Contact Seller', 'woocommerce' ); ?>
			</a>
		</p>
	</td>

</tr>

<?php if ( $show_purchase_note && $purchase_note ) : ?>

<tr class="woocommerce-table__product-purchase-note product-purchase-note">

	<td colspan="3"><?php echo wpautop( do_shortcode( wp_kses_post( $purchase_note ) ) ); ?></td>

</tr>
<?php endif; ?>

<tr class="woocommerce-table__product-purchase-note product-purchase-note">

	<td colspan="3" style="display:none;" class="formss_ds" id="seller_contact_show"><?php 
		$vendor_id = get_post_field( 'post_author', $product_id );
		$vendor_data = get_userdata( $vendor_id );
		$vendor_email = $vendor_data->user_email;
		$pname = $item->get_name();
	?>
        <p class="field-contact-name" id="seller-contact-success">Data Submited Successfully </p>
		<p class="field-contact-name" id="seller-contact-error">Error in form submit </p>

		<form id="seller_contact_form" class="contact-form">
			<fieldset class="forms">
				<div class="left-column">
					<p class="field-contact-name">
						<input type="hidden" name="product_name" value="<?php echo $pname; ?>" id="product_name">
						<input type="hidden" name="seller_email" value="<?php echo $vendor_email; ?>" id="seller_email">
					</p>
					<p class="field-contact-name">
						<input type="text" name="name" id="customer_name" placeholder="Your Name" required>
					</p>
					<p class="field-contact-email">
						<input type="text" name="subject" id="customer_subject" placeholder="Your Subject" required>
					</p>
					<p class="field-contact-email"> 
						<input type="email" name="email" value="" id="customer_email" placeholder="Your Email" required>
					</p>
				</div>
				<div class="right-column">
					<p class="field-contact-message">
						<textarea cols="50" rows="6" id="customer_msg" placeholder="Your Message" required></textarea> 
					</p>
				</div>
				<div class="block-column">
					<p class="buttons">
						<input type="submit" name="submit" id="submit">
					</p>
				</div>
			</fieldset>
		</form>
	</td>
</tr>
