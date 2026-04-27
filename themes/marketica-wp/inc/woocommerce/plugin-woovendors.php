<?php

add_filter( 'tokopress_customize_controls', 'tokopress_customize_controls_options_woocommerce_woovendors' );
function tokopress_customize_controls_options_woocommerce_woovendors( $controls ) {

	$controls[] = array(
		'setting_type' => 'option_mod',
		'type'     => 'section',
		'setting'  => 'tokopress_options_woovendors',
		'title'    => esc_html__( 'WooCommerce Product Vendors', 'tokopress' ),
		'panel'    => 'tokopress_options',
		'priority' => 10,
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'heading',
		'setting'	=> 'tokopress_woovendors_storeheader_heading', 
		'label'		=> esc_html__( 'WooVendors - Vendor Store', 'tokopress' ),
		'section'	=> 'tokopress_options_woovendors',
	);

    $controls[] = array( 
        'setting_type' => 'option_mod',
        'type'      => 'warning',
        'setting'   => 'tokopress_options_woovendors_store_warning', 
        'label'     => sprintf( esc_html__( 'You are not in %s', 'tokopress' ), esc_html__( 'Vendor Store Page', 'tokopress' ) ),
        'description' => sprintf( esc_html__( 'These settings only affect %s. Please visit %s to see live preview for these settings.', 'tokopress' ), esc_html__( 'Vendor Store Page', 'tokopress' ) , esc_html__( 'Vendor Store Page', 'tokopress' ) ),
        'section'   => 'tokopress_options_woovendors',
        'active_callback' => 'tokopress_woovendors_is_not_store_page',
    );

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'radio-buttonset',
		'setting'	=> 'tokopress_woovendors_shop_description',
		'label'		=> esc_html__( 'SHOW Store Header on Vendor Store Page', 'tokopress' ),
		'section'	=> 'tokopress_options_woovendors',
		'default'	=> 'yes',
		'choices' 	=> array(
				'yes' => __( 'Yes', 'tokopress' ),
				'no' => __( 'No', 'tokopress' ),
			),
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'radio-buttonset',
		'setting'	=> 'tokopress_woovendors_logo',
		'label'		=> esc_html__( 'SHOW Vendor Logo (If Available) on Store Header', 'tokopress' ),
		'section'	=> 'tokopress_options_woovendors',
		'default'	=> 'yes',
		'choices' 	=> array(
				'yes' => __( 'Yes', 'tokopress' ),
				'no' => __( 'No', 'tokopress' ),
			),
        'active_callback' => 'tokopress_woovendors_vendor_store_on',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'radio-buttonset',
		'setting'	=> 'tokopress_woovendors_profile',
		'label'		=> esc_html__( 'SHOW Vendor Profile (If Available) on Store Header', 'tokopress' ),
		'section'	=> 'tokopress_options_woovendors',
		'default'	=> 'yes',
		'choices' 	=> array(
				'yes' => __( 'Yes', 'tokopress' ),
				'no' => __( 'No', 'tokopress' ),
			),
        'active_callback' => 'tokopress_woovendors_vendor_store_on',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'radio-buttonset',
		'setting'	=> 'tokopress_woovendors_review',
		'label'		=> esc_html__( 'SHOW Average Vendor Rating on Store Header', 'tokopress' ),
		'section'	=> 'tokopress_options_woovendors',
		'default'	=> 'yes',
		'choices' 	=> array(
				'yes' => __( 'Yes', 'tokopress' ),
				'no' => __( 'No', 'tokopress' ),
			),
        'active_callback' => 'tokopress_woovendors_vendor_store_on',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'heading',
		'setting'	=> 'tokopress_woovendors_shop_heading', 
		'label'		=> esc_html__( 'WooVendors - Shop Page', 'tokopress' ),
		'section'	=> 'tokopress_options_woovendors',
	);

    $controls[] = array( 
        'setting_type' => 'option_mod',
        'type'      => 'warning',
        'setting'   => 'tokopress_options_woovendors_shop_warning', 
        'label'     => sprintf( esc_html__( 'You are not in %s', 'tokopress' ), esc_html__( 'Shop Page', 'tokopress' ) ),
        'description' => sprintf( esc_html__( 'These settings only affect %s. Please visit %s to see live preview for these settings.', 'tokopress' ), esc_html__( 'Shop Page', 'tokopress' ) , esc_html__( 'Shop Page', 'tokopress' ) ),
        'section'   => 'tokopress_options_woovendors',
        'active_callback' => 'tokopress_wc_is_not_shop_page',
    );

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'radio-buttonset',
		'setting'	=> 'tokopress_woovendors_shop_soldby',
		'label'		=> esc_html__( 'SHOW "Sold by" at Product List', 'tokopress' ),
		'section'	=> 'tokopress_options_woovendors',
		'default'	=> 'yes',
		'choices' 	=> array(
				'yes' => __( 'Yes', 'tokopress' ),
				'no' => __( 'No', 'tokopress' ),
			),
	);

	$controls[] = array(
		'setting_type' => 'option_mod',
		'type'		=> 'text',
		'setting'	=> 'tokopress_woovendors_shop_soldby_text',
		'label'		=> esc_html__( 'Custom "Sold by" text', 'tokopress' ),
		'section'	=> 'tokopress_options_woovendors',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'heading',
		'setting'	=> 'tokopress_woovendors_product_heading', 
		'label'		=> esc_html__( 'WooVendors - Single Product', 'tokopress' ),
		'section'	=> 'tokopress_options_woovendors',
	);

    $controls[] = array( 
        'setting_type' => 'option_mod',
        'type'      => 'warning',
        'setting'   => 'tokopress_options_woovendors_product_warning', 
        'label'     => sprintf( esc_html__( 'You are not in %s', 'tokopress' ), esc_html__( 'Single Product', 'tokopress' ) ),
        'description' => sprintf( esc_html__( 'These settings only affect %s. Please visit %s to see live preview for these settings.', 'tokopress' ), esc_html__( 'Single Product', 'tokopress' ) , esc_html__( 'Single Product', 'tokopress' ) ),
        'section'   => 'tokopress_options_woovendors',
        'active_callback' => 'tokopress_wc_is_not_product_page',
    );

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'radio-buttonset',
		'setting'	=> 'tokopress_woovendors_product_tab',
		'label'		=> esc_html__( 'SHOW "Seller Info" at Product Tab', 'tokopress' ),
		'section'	=> 'tokopress_options_woovendors',
		'default'	=> 'no',
		'choices' 	=> array(
				'no' => __( 'No', 'tokopress' ),
				'yes' => __( 'Yes', 'tokopress' ),
			),
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'radio-buttonset',
		'setting'	=> 'tokopress_woovendors_product_viewstorelink',
		'label'		=> esc_html__( 'SHOW "View Store" link at the end of Product Tab', 'tokopress' ),
		'section'	=> 'tokopress_options_woovendors',
		'default'	=> 'no',
		'choices' 	=> array(
				'no' => __( 'No', 'tokopress' ),
				'yes' => __( 'Yes', 'tokopress' ),
			),
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'radio-buttonset',
		'setting'	=> 'tokopress_woovendors_product_moreproducts',
		'label'		=> esc_html__( 'SHOW "More From This Seller" Products', 'tokopress' ),
		'section'	=> 'tokopress_options_woovendors',
		'default'	=> 'yes',
		'choices' 	=> array(
				'yes' => __( 'Yes', 'tokopress' ),
				'no' => __( 'No', 'tokopress' ),
			),
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'radio-buttonset',
		'setting'	=> 'tokopress_woovendors_product_vendordetails',
		'label'		=> esc_html__( 'SHOW Vendor Details at Product Sidebar', 'tokopress' ),
		'section'	=> 'tokopress_options_woovendors',
		'default'	=> 'no',
		'choices' 	=> array(
				'no' => __( 'No', 'tokopress' ),
				'yes' => __( 'Yes', 'tokopress' ),
			),
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'radio-buttonset',
		'setting'	=> 'tokopress_woovendors_product_soldby',
		'label'		=> esc_html__( 'SHOW "Sold by" at Item Details', 'tokopress' ),
		'section'	=> 'tokopress_options_woovendors',
		'default'	=> 'yes',
		'choices' 	=> array(
				'yes' => __( 'Yes', 'tokopress' ),
				'no' => __( 'No', 'tokopress' ),
			),
	);

	$controls[] = array(
		'setting_type' => 'option_mod',
		'type'		=> 'text',
		'setting'	=> 'tokopress_woovendors_product_soldby_text',
		'label'		=> esc_html__( 'Custom "Sold by" text', 'tokopress' ),
		'section'	=> 'tokopress_options_woovendors',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'heading',
		'setting'	=> 'tokopress_woovendors_cart_heading', 
		'label'		=> esc_html__( 'WooVendors - Cart Page', 'tokopress' ),
		'section'	=> 'tokopress_options_woovendors',
	);

    $controls[] = array( 
        'setting_type' => 'option_mod',
        'type'      => 'warning',
        'setting'   => 'tokopress_options_woovendors_cart_warning', 
        'label'     => sprintf( esc_html__( 'You are not in %s', 'tokopress' ), esc_html__( 'Cart Page', 'tokopress' ) ),
        'description' => sprintf( esc_html__( 'These settings only affect %s. Please visit %s to see live preview for these settings.', 'tokopress' ), esc_html__( 'Cart Page', 'tokopress' ) , esc_html__( 'Cart Page', 'tokopress' ) ),
        'section'   => 'tokopress_options_woovendors',
        'active_callback' => 'tokopress_wc_is_not_cart_page',
    );

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'radio-buttonset',
		'setting'	=> 'tokopress_woovendors_cart_soldby',
		'label'		=> esc_html__( 'SHOW "Sold by" at Cart page', 'tokopress' ),
		'section'	=> 'tokopress_options_woovendors',
		'default'	=> 'yes',
		'choices' 	=> array(
				'yes' => __( 'Yes', 'tokopress' ),
				'no' => __( 'No', 'tokopress' ),
			),
	);

	$controls[] = array(
		'setting_type' => 'option_mod',
		'type'		=> 'text',
		'setting'	=> 'tokopress_woovendors_cart_soldby_text',
		'label'		=> esc_html__( 'Custom "Sold by" text', 'tokopress' ),
		'section'	=> 'tokopress_options_woovendors',
	);

    $controls[] = array( 
        'setting_type' => 'option_mod',
        'type'      => 'heading',
        'setting'   => 'tokopress_options_woovendors_goto_colors', 
        'label'     => esc_html__( 'More ...', 'tokopress' ),
        'description' => '<p><span class="dashicons dashicons-admin-appearance"></span> <a href="javascript:wp.customize.section( \'tokopress_colors_wc_woovendors\' ).focus();">'.esc_html__( 'Go to Theme Colors of this section', 'tokopress' ).'</a></p>',
        'section'   => 'tokopress_options_woovendors',
    );

	return $controls;
}

function tokopress_woovendors_settings( $options ) {
    $options[] = array(
        'name'  => __( 'WooVendors', 'tokopress' ),
        'type'  => 'heading'
    );

    $options[] = array(
        'name' => __( 'WooVendors - Vendor Store', 'tokopress' ),
        'type' => 'info'
    );

        $options[] = array(
            'name' => __( 'SHOW Store Header on Vendor Store Page', 'tokopress' ),
            'desc' => '',
            'id' => 'tokopress_woovendors_shop_description',
            'std' => '',
            'type' => 'select',
            'options' => array(
                    'yes' => __( 'Yes', 'tokopress' ),
                    'no' => __( 'No', 'tokopress' ),
                )
        );

        $options[] = array(
            'name' => __( 'SHOW Vendor Logo (If Available) on Store Header', 'tokopress' ),
            'desc' => '',
            'id' => 'tokopress_woovendors_logo',
            'std' => '',
            'type' => 'select',
            'options' => array(
                    'yes' => __( 'Yes', 'tokopress' ),
                    'no' => __( 'No', 'tokopress' ),
                )
        );

        $options[] = array(
            'name' => __( 'SHOW Vendor Profile (If Available) on Store Header', 'tokopress' ),
            'desc' => '',
            'id' => 'tokopress_woovendors_profile',
            'std' => '',
            'type' => 'select',
            'options' => array(
                    'yes' => __( 'Yes', 'tokopress' ),
                    'no' => __( 'No', 'tokopress' ),
                )
        );

        $options[] = array(
            'name' => __( 'SHOW Average Vendor Rating on Store Header', 'tokopress' ),
            'desc' => '',
            'id' => 'tokopress_woovendors_review',
            'std' => '',
            'type' => 'select',
            'options' => array(
                    'yes' => __( 'Yes', 'tokopress' ),
                    'no' => __( 'No', 'tokopress' ),
                )
        );

    $options[] = array(
        'name' => __( 'WooVendors - Shop Page', 'tokopress' ),
        'type' => 'info'
    );

        $options[] = array(
            'name' => __( 'SHOW "Sold by" at Product List', 'tokopress' ),
            'desc' => '',
            'id' => 'tokopress_woovendors_shop_soldby',
            'std' => '',
            'type' => 'select',
            'options' => array(
                    'yes' => __( 'Yes', 'tokopress' ),
                    'no' => __( 'No', 'tokopress' ),
                )
        );

        $options[] = array(
            'name' => __( 'Custom "Sold by" text', 'tokopress' ),
            'desc' => '',
            'id' => 'tokopress_woovendors_shop_soldby_text',
            'std' => '',
            'type' => 'text',
        );

    $options[] = array(
        'name' => __( 'WooVendors - Single Product Page', 'tokopress' ),
        'type' => 'info'
    );

		$options[] = array(
			'name' => __( 'SHOW "Seller Info" at Product Tab', 'tokopress' ),
			'desc' => '',
			'id' => 'tokopress_woovendors_product_tab',
			'std' => '',
			'type' => 'select',
			'options' => array(
					'no' => __( 'No', 'tokopress' ),
					'yes' => __( 'Yes', 'tokopress' ),
				)
		);

        $options[] = array(
            'name' => __( 'SHOW "View Store" link at the end of Product Tab', 'tokopress' ),
            'desc' => '',
            'id' => 'tokopress_woovendors_product_viewstorelink',
            'std' => '',
            'type' => 'select',
            'options' => array(
                    'no' => __( 'No', 'tokopress' ),
                    'yes' => __( 'Yes', 'tokopress' ),
                )
        );

        $options[] = array(
            'name' => __( 'SHOW "More From This Seller" Products', 'tokopress' ),
            'desc' => '',
            'id' => 'tokopress_woovendors_product_moreproducts',
            'std' => '',
            'type' => 'select',
            'options' => array(
                    'yes' => __( 'Yes', 'tokopress' ),
                    'no' => __( 'No', 'tokopress' ),
                )
        );

        $options[] = array(
            'name' => __( 'SHOW Vendor Details at Product Sidebar', 'tokopress' ),
            'desc' => '',
            'id' => 'tokopress_woovendors_product_vendordetails',
            'std' => '',
            'type' => 'select',
            'options' => array(
                    'no' => __( 'No', 'tokopress' ),
                    'yes' => __( 'Yes', 'tokopress' ),
                )
        );

        $options[] = array(
            'name' => __( 'SHOW "Sold by" at Item Details', 'tokopress' ),
            'desc' => '',
            'id' => 'tokopress_woovendors_product_soldby',
            'std' => '',
            'type' => 'select',
            'options' => array(
                    'yes' => __( 'Yes', 'tokopress' ),
                    'no' => __( 'No', 'tokopress' ),
                )
        );

        $options[] = array(
            'name' => __( 'Custom "Sold by" text', 'tokopress' ),
            'desc' => '',
            'id' => 'tokopress_woovendors_product_soldby_text',
            'std' => '',
            'type' => 'text',
        );

    $options[] = array(
        'name' => __( 'WooVendors - Cart Page', 'tokopress' ),
        'type' => 'info'
    );

        $options[] = array(
            'name' => __( 'SHOW "Sold by" at Cart page', 'tokopress' ),
            'desc' => '',
            'id' => 'tokopress_woovendors_cart_soldby',
            'std' => '',
            'type' => 'select',
            'options' => array(
                    'yes' => __( 'Yes', 'tokopress' ),
                    'no' => __( 'No', 'tokopress' ),
                )
        );

        $options[] = array(
            'name' => __( 'Custom "Sold by" text', 'tokopress' ),
            'desc' => '',
            'id' => 'tokopress_woovendors_cart_soldby_text',
            'std' => '',
            'type' => 'text',
        );

    return $options;
}
add_filter( 'of_options', 'tokopress_woovendors_settings', 20 );

add_filter( 'tokopress_customize_controls', 'tokopress_customize_controls_colors_woocommerce_woovendors' );
function tokopress_customize_controls_colors_woocommerce_woovendors( $controls ) {

    $controls[] = array(
        'type'     => 'section',
        'setting'  => 'tokopress_colors_wc_woovendors',
        'title'    => esc_html__( 'WC Vendors', 'tokopress' ),
        'panel'    => 'tokopress_colors',
        'priority' => 10,
    );

    $controls[] = array( 
        'setting_type' => 'option_mod',
        'type'      => 'heading',
        'setting'   => 'tokopress_colors_woovendors_store_heading', 
        'label'     => esc_html__( 'Vendor Store', 'tokopress' ),
        'section'   => 'tokopress_colors_wc_woovendors',
    );

    $controls[] = array( 
        'type'      => 'color',
        'setting'   => 'tokopress_wc_store_header_bg',
        'label'     => esc_html__( 'Vendor Store Header Background Color', 'tokopress' ),
        'description' => esc_html__( 'If vendor store banner image is not available', 'tokopress' ),
        'section'   => 'tokopress_colors_wc_woovendors',
        'style'     => '.store-profile { background-color: [value] !important; }',
    );

    $controls[] = array( 
        'setting_type' => 'option_mod',
        'type'      => 'heading',
        'setting'   => 'tokopress_colors_woovendors_goto_options', 
        'label'     => esc_html__( 'More ...', 'tokopress' ),
        'description' => '<p><span class="dashicons dashicons-admin-tools"></span> <a href="javascript:wp.customize.section( \'tokopress_options_woovendors\' ).focus();">'.esc_html__( 'Go to Theme Options of this section', 'tokopress' ).'</a></p>',
        'section'   => 'tokopress_colors_wc_woovendors',
    );

    return $controls;

}

tokopress_remove_filter_class( 'woocommerce_after_shop_loop_item','WC_Product_Vendors_Vendor_Frontend', 'add_sold_by_loop', 9 );
tokopress_remove_filter_class( 'woocommerce_single_product_summary','WC_Product_Vendors_Vendor_Frontend', 'add_sold_by_single', 39 );
tokopress_remove_filter_class( 'woocommerce_get_item_data','WC_Product_Vendors_Vendor_Frontend', 'add_sold_by_cart', 10 );

add_action( 'tokopress_quicknav_account', 'tokopress_woovendors_quicknav_account' );
function tokopress_woovendors_quicknav_account() {
    // printf( '<li><a rel="nofollow" href="%s">%s %s</a></li>', $item['url'], $item['title'], $item['icon'] );
}

add_action( 'tokopress_before_inner_content', 'tokopress_woovendors_store_header', 5 );
function tokopress_woovendors_store_header() {
	if( of_get_option( 'tokopress_woovendors_shop_description' ) == 'no' ) {
		return;
	}
    get_template_part( 'woovendors/store-header' );
}

add_action( 'woocommerce_after_shop_loop_item', 'tokopress_woovendors_product_seller_name', 9 );
function tokopress_woovendors_product_seller_name() {
	if( of_get_option( 'tokopress_woovendors_shop_soldby' ) == 'no' ) {
		return;
	}
	$soldby_text = of_get_option( 'tokopress_woovendors_shop_soldby_text' );
    if ( $soldby_text && $soldby_text != '.' ) {
        $soldby_text = __( $soldby_text, 'tokopress' ); /* support qTranslateX */
    }
	if ( !$soldby_text ) {
		$soldby_text = __( 'sold by', 'tokopress' );
	}
	if ( trim( $soldby_text ) == '.' ) {
		$soldby_text = '';
	}
    echo tokopress_get_the_term_list( get_the_ID(), 'wcpv_product_vendors', '<p class="product-seller-name">'.$soldby_text.' ', ', ', '</p>' );
}

add_action( 'tokopress_wc_after_single_product', 'tokopress_woovendors_more_products', 5 );
function tokopress_woovendors_more_products() {
	if( of_get_option( 'tokopress_woovendors_product_moreproducts' ) == 'no' ) {
		return;
	}
    get_template_part( 'woovendors/block-more-products' );
}

add_action( 'tokopress_wc_main_content_right', 'tokopress_woovendors_sold_by_meta', 25, 2 );
function tokopress_woovendors_sold_by_meta() {
	if( of_get_option( 'tokopress_woovendors_product_soldby' ) == 'no' ) {
		return;
	}
	$soldby_text = of_get_option( 'tokopress_woovendors_product_soldby_text' );
    if ( $soldby_text && $soldby_text != '.' ) {
        $soldby_text = __( $soldby_text, 'tokopress' ); /* support qTranslateX */
    }
	if ( !$soldby_text ) {
		$soldby_text = __( 'sold by', 'tokopress' );
	}
    echo tokopress_get_the_term_list( get_the_ID(), 'wcpv_product_vendors', '<ul class="list-item-details"><li><span class="data-type">'.$soldby_text.'</span><span class="value">', ', ', '</span></li></ul>' );
}

add_filter( 'woocommerce_get_item_data', 'woovendors_product_seller_info', 10, 2 );
function woovendors_product_seller_info( $item_data, $cart_item ) {
	if( of_get_option( 'tokopress_woovendors_cart_soldby' ) == 'no' ) {
		return;
	}
	$soldby_text = of_get_option( 'tokopress_woovendors_cart_soldby_text' );
    if ( $soldby_text && $soldby_text != '.' ) {
        $soldby_text = __( $soldby_text, 'tokopress' ); /* support qTranslateX */
    }
	if ( !$soldby_text ) {
		$soldby_text = __( 'sold by', 'tokopress' );
	}
	$product_id = is_callable( array( $cart_item['data'], 'get_id' ) ) ? $cart_item['data']->get_id() : $cart_item['data']->post->ID;
    $soldby = tokopress_get_the_term_list( $product_id, 'wcpv_product_vendors', '', ', ', '' );
    if ( $soldby ) {
        $item_data[] = array(
            'name'  => $soldby_text,
            'value' => tokopress_get_the_term_list( $product_id, 'wcpv_product_vendors', '', ', ', '' )
        );
    }
    return $item_data;
}

add_filter( 'woocommerce_product_tabs', 'tokopress_woovendors_seller_info_tab' );
function tokopress_woovendors_seller_info_tab( $tabs ) {
	if( of_get_option( 'tokopress_woovendors_product_tab' ) != 'yes' ) {
		return $tabs;
	}
	global $post;
	$vendor = WC_Product_Vendors_Utils::is_vendor_product( $post->ID );
	if ( $vendor ) {
		$tabs[ 'seller_info' ] = array(
			'title'    => apply_filters( 'woovendors_seller_info_label', __( 'Seller info', 'tokopress' ) ),
			'priority' => 50,
			'callback' => 'tokopress_woovendors_seller_info_tab_panel',
		);
	}
	return $tabs;
}

function tokopress_woovendors_seller_info_tab_panel() {
	global $post;
	$vendor = WC_Product_Vendors_Utils::is_vendor_product( $post->ID );
	if ( $vendor ) {
		$vendor = WC_Product_Vendors_Utils::get_vendor_data_by_id( $vendor[0]->term_id );
		if ( !empty($vendor) ) {
			echo '<h2>'.$vendor['name'].'</h2>';
			echo '<div class="pv_seller_info">';
			if ( isset( $vendor['profile'] ) && $vendor['profile'] ) {
				$allowed_html = array(
					'a' => array(
						'href'  => array(),
						'title' => array(),
					),
					'br'     => array(),
					'em'     => array(),
					'strong' => array(),
				);
				echo '<p>' . wp_kses( $vendor['profile'], $allowed_html ) . '</p>';
			}
			$link = get_term_link( $vendor['term_id'], WC_PRODUCT_VENDORS_TAXONOMY );
			echo '<a href="'.esc_url( $link ).'" class="button alt">'.__( 'View Store', 'tokopress' ).'</a>';
			echo '</div>';
		}
	}
}

add_action( 'tokopress_wc_main_content_right', 'tokopress_woovendors_product_sidebar_vendor', 15 );
function tokopress_woovendors_product_sidebar_vendor() {
	if( of_get_option( 'tokopress_woovendors_product_vendordetails' ) != 'yes' ) {
		return;
	}
	global $post;
	$vendor = WC_Product_Vendors_Utils::is_vendor_product( $post->ID );
	if ( $vendor ) {
		$vendor = WC_Product_Vendors_Utils::get_vendor_data_by_id( $vendor[0]->term_id );
		if ( !empty($vendor) ) {
			echo '<div class="widget vendor-details">';
			if ( isset( $vendor['logo'] ) && $vendor['logo'] ) {
				echo wp_get_attachment_image( absint( $vendor['logo'] ), array('60', '60') );
			}
			echo '<h3 class="widget-title">'.esc_html( $vendor['name'] ).'</h3>';
			if ( isset( $vendor['profile'] ) && $vendor['profile'] ) {
				$allowed_html = array(
					'a' => array(
						'href'  => array(),
						'title' => array(),
					),
					'br'     => array(),
					'em'     => array(),
					'strong' => array(),
				);
				echo '<span class="text">' . wp_kses( $vendor['profile'], $allowed_html ) . '</span>';
			}
			$link = get_term_link( $vendor['term_id'], WC_PRODUCT_VENDORS_TAXONOMY );
			echo '<a href="'.esc_url( $link ).'" class="button">'.__( 'View Store', 'tokopress' ).'</a>';
			echo '</div>';
		}
	}
}

add_action( 'tokopress_wc_main_content_right', 'tokopress_woovendors_product_viewstorelink', 99 );
function tokopress_woovendors_product_viewstorelink() {
	if( of_get_option( 'tokopress_woovendors_product_viewstorelink' ) != 'yes' ) {
		return;
	}
    global $post;
    $vendor = WC_Product_Vendors_Utils::is_vendor_product( $post->ID );
    if ( $vendor ) {
        $vendor = WC_Product_Vendors_Utils::get_vendor_data_by_id( $vendor[0]->term_id );
        if ( !empty($vendor) ) {
            $link = get_term_link( $vendor['term_id'], WC_PRODUCT_VENDORS_TAXONOMY );
            echo '<div class="view-store-link">';
            echo '<a href="'.esc_url( $link ).'" class="button">'.__( 'View Store', 'tokopress' ).'</a>';
            echo '</div>';
        }
    }
}

add_action( 'woocommerce_before_main_content', 'tokopress_woovendors_page_header_inner' );
function tokopress_woovendors_page_header_inner() {
	if ( of_get_option( 'tokopress_woovendors_shop_description' ) != 'no' ) {
		return;
	}
?>
	<div class="page-header page-header-inner">
		<h1 class="page-title"><?php woocommerce_page_title(); ?></h1>
		<?php woocommerce_breadcrumb(); ?>
	</div>
<?php 	
}

function tokopress_woovendors_is_not_store_page() {
    return is_tax( 'wcpv_product_vendors' ) ? false : true;
}

function tokopress_woovendors_vendor_store_on() {
    return of_get_option( 'tokopress_woovendors_shop_description' ) != 'no' ? true : false;
}
