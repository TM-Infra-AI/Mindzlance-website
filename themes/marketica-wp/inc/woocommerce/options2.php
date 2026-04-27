<?php

add_filter( 'tokopress_customize_controls', 'tokopress_customize_controls_options_woocommerce' );
function tokopress_customize_controls_options_woocommerce( $controls ) {

	// $controls[] = array(
	// 	'setting_type' => 'option_mod',
	// 	'type'     => 'panel',
	// 	'setting'  => 'tokopress_options_woocommerce',
	// 	'title'    => esc_html__( 'TP - WooCommerce', 'tokopress' ),
	// 	'priority' => 24,
	// );

	$controls[] = array(
		'setting_type' => 'option_mod',
		'type'     => 'section',
		'setting'  => 'tokopress_options_wc_shop',
		'title'    => esc_html__( 'WooCommerce - Shop Page', 'tokopress' ),
		'panel'    => 'tokopress_options',
		'priority' => 10,
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'warning',
		'setting'	=> 'tokopress_options_wc_shop_warning', 
		'label'		=> sprintf( esc_html__( 'You are not in %s', 'tokopress' ), esc_html__( 'Shop Page', 'tokopress' ) ),
		'description' => sprintf( esc_html__( 'These settings only affect %s. Please visit %s to see live preview for these settings.', 'tokopress' ), esc_html__( 'Shop Page', 'tokopress' ) , esc_html__( 'Shop Page', 'tokopress' ) ),
		'section'	=> 'tokopress_options_wc_shop',
		'active_callback' => 'tokopress_wc_is_not_shop_page',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'heading',
		'setting'	=> 'tokopress_wc_products_header_heading', 
		'label'		=> esc_html__( 'Page Header', 'tokopress' ),
		'section'	=> 'tokopress_options_wc_shop',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'checkbox',
		'setting'	=> 'tokopress_wc_hide_products_header',
		'label'		=> esc_html__( 'DISABLE page header on the main shop page', 'tokopress' ),
		'section'	=> 'tokopress_options_wc_shop',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'heading',
		'setting'	=> 'tokopress_wc_products_sidebar_heading', 
		'label'		=> esc_html__( 'Sidebar', 'tokopress' ),
		'section'	=> 'tokopress_options_wc_shop',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'checkbox',
		'setting'	=> 'tokopress_wc_hide_products_sidebar',
		'label'		=> esc_html__( 'DISABLE sidebar on shop page.', 'tokopress' ),
		'section'	=> 'tokopress_options_wc_shop',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'heading',
		'setting'	=> 'tokopress_wc_products_elements_heading', 
		'label'		=> esc_html__( 'Product Loop Elements', 'tokopress' ),
		'section'	=> 'tokopress_options_wc_shop',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'radio-buttonset',
		'setting'	=> 'tokopress_wc_products_gap',
		'label'		=> esc_html__( 'Product Catalog Columns Gap', 'tokopress' ),
		'section'	=> 'tokopress_options_wc_shop',
		'default'	=> 'nogap',
	    'choices' => array(
		    'nogap' => esc_html__( 'No Gap', 'tokopress' ),
		    'gap' => esc_html__( 'With Gap', 'tokopress' ),
		),
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'radio-buttonset',
		'setting'	=> 'tokopress_wc_products_style',
		'label'		=> esc_html__( 'Product Catalog Style', 'tokopress' ),
		'section'	=> 'tokopress_options_wc_shop',
		'default'	=> 'default',
	    'choices' => array(
		    'default' => esc_html__( 'Default Style', 'tokopress' ),
		    'alt' => esc_html__( 'Alternate Style', 'tokopress' ),
		),
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'radio-buttonset',
		'setting'	=> 'tokopress_wc_products_category_style',
		'label'		=> esc_html__( 'Product Category Style', 'tokopress' ),
		'section'	=> 'tokopress_options_wc_shop',
		'default'	=> 'default',
	    'choices' => array(
		    'default' => esc_html__( 'Default Style', 'tokopress' ),
		    'alt' => esc_html__( 'Alternate Style', 'tokopress' ),
		),
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'checkbox',
		'setting'	=> 'tokopress_wc_hide_result_count',
		'label'		=> esc_html__( 'DISABLE product result count', 'tokopress' ),
		'section'	=> 'tokopress_options_wc_shop',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'checkbox',
		'setting'	=> 'tokopress_wc_hide_catalog_ordering',
		'label'		=> esc_html__( 'DISABLE catalog ordering dropdown', 'tokopress' ),
		'section'	=> 'tokopress_options_wc_shop',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'number',
		'setting'	=> 'tokopress_wc_products_per_page',
		'label'		=> esc_html__( 'Products Per Page', 'tokopress' ),
		'section'	=> 'tokopress_options_wc_shop',
		'default'	=> '12',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'select',
		'default'   => '3',
		'setting'	=> 'tokopress_wc_products_column_per_row',
		'label'		=> esc_html__( 'Products Column Per Row', 'tokopress' ),
		'section'	=> 'tokopress_options_wc_shop',
		'choices' 	=> array(
				'1' => '1',
				'2' => '2',
				'3' => '3',
				'4' => '4',
				'5' => '5',
			),
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'checkbox',
		'setting'	=> 'tokopress_wc_hide_products_sale_flash',
		'label'		=> esc_html__( 'DISABLE products sale flash', 'tokopress' ),
		'section'	=> 'tokopress_options_wc_shop',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'checkbox',
		'setting'	=> 'tokopress_wc_hide_products_title',
		'label'		=> esc_html__( 'DISABLE products title', 'tokopress' ),
		'section'	=> 'tokopress_options_wc_shop',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'checkbox',
		'setting'	=> 'tokopress_wc_shorten_products_title',
		'label'		=> esc_html__( 'Shorten Product Title', 'tokopress' ),
		'description' => esc_html__( 'Truncate long product title into one line', 'tokopress' ),
		'section'	=> 'tokopress_options_wc_shop',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'checkbox',
		'setting'	=> 'tokopress_wc_hide_products_rating',
		'label'		=> esc_html__( 'DISABLE products rating', 'tokopress' ),
		'section'	=> 'tokopress_options_wc_shop',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'checkbox',
		'setting'	=> 'tokopress_wc_hide_products_price',
		'label'		=> esc_html__( 'DISABLE products price', 'tokopress' ),
		'section'	=> 'tokopress_options_wc_shop',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'checkbox',
		'setting'	=> 'tokopress_wc_hide_products_cart_button',
		'label'		=> esc_html__( 'DISABLE products "add to cart" button', 'tokopress' ),
		'section'	=> 'tokopress_options_wc_shop',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'checkbox',
		'setting'	=> 'tokopress_wc_hide_products_detail_button',
		'label'		=> esc_html__( 'DISABLE products "detail" button', 'tokopress' ),
		'section'	=> 'tokopress_options_wc_shop',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'text',
		'setting'	=> 'tokopress_wc_products_detail_button_text',
		'label'		=> esc_html__( 'Products "Detail" Button Text', 'tokopress' ),
		'section'	=> 'tokopress_options_wc_shop',
		'default'	=> '',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'heading',
		'setting'	=> 'tokopress_options_wc_shop_goto_colors', 
		'label'		=> esc_html__( 'More ...', 'tokopress' ),
		'description' => '<p><span class="dashicons dashicons-admin-appearance"></span> <a href="javascript:wp.customize.section( \'tokopress_colors_wc_shop\' ).focus();">'.esc_html__( 'Go to Theme Colors of this section', 'tokopress' ).'</a></p>',
		'section'	=> 'tokopress_options_wc_shop',
	);

	$controls[] = array(
		'setting_type' => 'option_mod',
		'type'     => 'section',
		'setting'  => 'tokopress_options_wc_product',
		'title'    => esc_html__( 'WooCommerce - Single Product', 'tokopress' ),
		'panel'    => 'tokopress_options',
		'priority' => 10,
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'warning',
		'setting'	=> 'tokopress_options_wc_product_warning', 
		'label'		=> sprintf( esc_html__( 'You are not in %s', 'tokopress' ), esc_html__( 'Single Product', 'tokopress' ) ),
		'description' => sprintf( esc_html__( 'These settings only affect %s. Please visit %s to see live preview for these settings.', 'tokopress' ), esc_html__( 'Single Product', 'tokopress' ) , esc_html__( 'Single Product', 'tokopress' ) ),
		'section'	=> 'tokopress_options_wc_product',
		'active_callback' => 'tokopress_wc_is_not_product_page',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'heading',
		'setting'	=> 'tokopress_wc_product_header_heading', 
		'label'		=> esc_html__( 'Page Header', 'tokopress' ),
		'section'	=> 'tokopress_options_wc_product',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'checkbox',
		'setting'	=> 'tokopress_wc_hide_product_header',
		'label'		=> esc_html__( 'DISABLE page header', 'tokopress' ),
		'section'	=> 'tokopress_options_wc_product',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'heading',
		'setting'	=> 'tokopress_wc_product_elements_heading', 
		'label'		=> esc_html__( 'Single Product Elements', 'tokopress' ),
		'section'	=> 'tokopress_options_wc_product',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'radio-buttonset',
		'setting'	=> 'tokopress_wc_product_image_style',
		'label'		=> esc_html__( 'Product Image Style', 'tokopress' ),
		'section'	=> 'tokopress_options_wc_product',
		'default'	=> 'slider',
		'choices' 	=> array(
				'slider' => esc_html__( 'Slider Style', 'tokopress' ),
				'default' => esc_html__( 'Default Style', 'tokopress' ),
			),
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'checkbox',
		'setting'	=> 'tokopress_wc_show_product_lightbox',
		'label'		=> esc_html__( 'ENABLE product image lightbox', 'tokopress' ),
		'section'	=> 'tokopress_options_wc_product',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'checkbox',
		'setting'	=> 'tokopress_wc_hide_product_sale_flash',
		'label'		=> esc_html__( 'DISABLE product sale flash', 'tokopress' ),
		'section'	=> 'tokopress_options_wc_product',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'checkbox',
		'setting'	=> 'tokopress_wc_hide_product_rating',
		'label'		=> esc_html__( 'DISABLE product rating', 'tokopress' ),
		'section'	=> 'tokopress_options_wc_product',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'checkbox',
		'setting'	=> 'tokopress_wc_hide_product_price',
		'label'		=> esc_html__( 'DISABLE product price', 'tokopress' ),
		'section'	=> 'tokopress_options_wc_product',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'checkbox',
		'setting'	=> 'tokopress_wc_hide_product_summary',
		'label'		=> esc_html__( 'DISABLE product short description', 'tokopress' ),
		'section'	=> 'tokopress_options_wc_product',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'checkbox',
		'setting'	=> 'tokopress_wc_hide_product_cart_button',
		'label'		=> esc_html__( 'DISABLE product "add to cart" button', 'tokopress' ),
		'section'	=> 'tokopress_options_wc_product',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'heading',
		'setting'	=> 'tokopress_wc_itemdetails_heading', 
		'label'		=> esc_html__( 'Single Product Item Details', 'tokopress' ),
		'section'	=> 'tokopress_options_wc_product',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'checkbox',
		'setting'	=> 'tokopress_wc_hide_product_sku',
		'label'		=> esc_html__( 'DISABLE product sku', 'tokopress' ),
		'section'	=> 'tokopress_options_wc_product',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'checkbox',
		'setting'	=> 'tokopress_wc_hide_product_attributes',
		'label'		=> esc_html__( 'DISABLE product attributes', 'tokopress' ),
		'section'	=> 'tokopress_options_wc_product',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'checkbox',
		'setting'	=> 'tokopress_wc_hide_product_meta_tags',
		'label'		=> esc_html__( 'DISABLE product meta (categories/tags)', 'tokopress' ),
		'section'	=> 'tokopress_options_wc_product',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'heading',
		'setting'	=> 'tokopress_wc_license_heading', 
		'label'		=> esc_html__( 'License Information', 'tokopress' ),
		'description' => esc_html__( 'This is an old feature from the early version of Marketica. We keep it here for backward compatibility.', 'tokopress' ),
		'section'	=> 'tokopress_options_wc_product',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'checkbox',
		'setting'	=> 'tokopress_wc_license_show',
		'label'		=> esc_html__( 'SHOW license information on single product page', 'tokopress' ),
		'section'	=> 'tokopress_options_wc_product',
	);

	$controls[] = array(
		'setting_type' => 'option_mod',
		'type'		=> 'textarea-html',
		'setting'	=> 'tokopress_wc_license_info',
		'label'		=> esc_html__( 'License Information Summary', 'tokopress' ),
		'section'	=> 'tokopress_options_wc_product',
		'default'	=> esc_html__( 'Use, by you or one client, in a single end product which end users are not charged for. The total price includes the item price and a buyer fee.', 'tokopress' ),
	);

	$controls[] = array(
		'setting_type' => 'option_mod',
		'type'		=> 'text',
		'setting'	=> 'tokopress_wc_license_text1',
		'label'		=> esc_html__( 'License Link Text #1', 'tokopress' ),
		'section'	=> 'tokopress_options_wc_product',
		'default'	=> esc_html__( 'More Details', 'tokopress' ),
	);

	$controls[] = array(
		'setting_type' => 'option_mod',
		'type'		=> 'text',
		'setting'	=> 'tokopress_wc_license_url1',
		'label'		=> esc_html__( 'License Link URL #1', 'tokopress' ),
		'section'	=> 'tokopress_options_wc_product',
		'default'	=> '',
	);

	$controls[] = array(
		'setting_type' => 'option_mod',
		'type'		=> 'text',
		'setting'	=> 'tokopress_wc_license_text2',
		'label'		=> esc_html__( 'License Link Text #2', 'tokopress' ),
		'section'	=> 'tokopress_options_wc_product',
		'default'	=> '',
	);

	$controls[] = array(
		'setting_type' => 'option_mod',
		'type'		=> 'text',
		'setting'	=> 'tokopress_wc_license_url2',
		'label'		=> esc_html__( 'License Link URL #2', 'tokopress' ),
		'section'	=> 'tokopress_options_wc_product',
		'default'	=> '',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'heading',
		'setting'	=> 'tokopress_wc_related_heading', 
		'label'		=> esc_html__( 'Related Products', 'tokopress' ),
		'section'	=> 'tokopress_options_wc_product',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'checkbox',
		'setting'	=> 'tokopress_wc_hide_related_products',
		'label'		=> esc_html__( 'DISABLE related products on single product page', 'tokopress' ),
		'section'	=> 'tokopress_options_wc_product',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'select',
		'setting'	=> 'tokopress_wc_products_related_number',
		'label'		=> esc_html__( 'Number of Related Products', 'tokopress' ),
		'section'	=> 'tokopress_options_wc_product',
		'default' 	=> '4',
		'choices' 	=> array(
				'1' => '1',
				'2' => '2',
				'3' => '3',
				'4' => '4',
				'5' => '5',
				'6' => '6',
				'7' => '7',
				'8' => '8',
				'9' => '9',
				'10' => '10',
				'11' => '11',
				'12' => '12'
			),
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'heading',
		'setting'	=> 'tokopress_wc_upsells_heading', 
		'label'		=> esc_html__( 'Up-Sells Products', 'tokopress' ),
		'section'	=> 'tokopress_options_wc_product',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'checkbox',
		'setting'	=> 'tokopress_wc_hide_upsells_products',
		'label'		=> esc_html__( 'DISABLE up-sells products on single product page', 'tokopress' ),
		'section'	=> 'tokopress_options_wc_product',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'select',
		'setting'	=> 'tokopress_wc_products_upsells_number',
		'label'		=> esc_html__( 'Number of Up-Sells Products', 'tokopress' ),
		'section'	=> 'tokopress_options_wc_product',
		'default' 	=> '4',
		'choices' 	=> array(
				'1' => '1',
				'2' => '2',
				'3' => '3',
				'4' => '4',
				'5' => '5',
				'6' => '6',
				'7' => '7',
				'8' => '8',
				'9' => '9',
				'10' => '10',
				'11' => '11',
				'12' => '12'
			),
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'heading',
		'setting'	=> 'tokopress_options_wc_product_goto_colors', 
		'label'		=> esc_html__( 'More ...', 'tokopress' ),
		'description' => '<p><span class="dashicons dashicons-admin-appearance"></span> <a href="javascript:wp.customize.section( \'tokopress_colors_wc_product\' ).focus();">'.esc_html__( 'Go to Theme Colors of this section', 'tokopress' ).'</a></p>',
		'section'	=> 'tokopress_options_wc_product',
	);

	$controls[] = array(
		'setting_type' => 'option_mod',
		'type'     => 'section',
		'setting'  => 'tokopress_options_wc_cart',
		'title'    => esc_html__( 'WooCommerce - Cart Page', 'tokopress' ),
		'panel'    => 'tokopress_options',
		'priority' => 10,
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'warning',
		'setting'	=> 'tokopress_options_wc_cart_warning', 
		'label'		=> sprintf( esc_html__( 'You are not in %s', 'tokopress' ), esc_html__( 'Cart Page', 'tokopress' ) ),
		'description' => sprintf( esc_html__( 'These settings only affect %s. Please visit %s to see live preview for these settings.', 'tokopress' ), esc_html__( 'Cart Page', 'tokopress' ) , esc_html__( 'Cart Page', 'tokopress' ) ),
		'section'	=> 'tokopress_options_wc_cart',
		'active_callback' => 'tokopress_wc_is_not_cart_page',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'heading',
		'setting'	=> 'tokopress_wc_crosssells_heading', 
		'label'		=> esc_html__( 'Cross-Sells Products', 'tokopress' ),
		'section'	=> 'tokopress_options_wc_cart',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'checkbox',
		'setting'	=> 'tokopress_wc_hide_crosssells_products',
		'label'		=> esc_html__( 'DISABLE Cross-sells products on cart page', 'tokopress' ),
		'section'	=> 'tokopress_options_wc_cart',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'heading',
		'setting'	=> 'tokopress_options_wc_cart_goto_colors', 
		'label'		=> esc_html__( 'More ...', 'tokopress' ),
		'description' => '<p><span class="dashicons dashicons-admin-appearance"></span> <a href="javascript:wp.customize.section( \'tokopress_colors_wc_cart\' ).focus();">'.esc_html__( 'Go to Theme Colors of this section', 'tokopress' ).'</a></p>',
		'section'	=> 'tokopress_options_wc_cart',
	);

	$controls[] = array(
		'setting_type' => 'option_mod',
		'type'     => 'section',
		'setting'  => 'tokopress_options_wc_account',
		'title'    => esc_html__( 'WooCommerce - Account Page', 'tokopress' ),
		'panel'    => 'tokopress_options',
		'priority' => 10,
	);

	$controls[] = array(
		'setting_type' => 'option_mod',
		'type'		=> 'text',
		'setting'	=> 'tokopress_wc_red_cus_login',
		'label'		=> esc_html__( 'Redirect URL After Customer Login', 'tokopress' ),
		'section'	=> 'tokopress_options_wc_account',
	);

	return $controls;
}
