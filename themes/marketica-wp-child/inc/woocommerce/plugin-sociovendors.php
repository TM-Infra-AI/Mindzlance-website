<?php

add_filter( 'tokopress_customize_controls', 'tokopress_customize_controls_options_woocommerce_sociovendors' );
function tokopress_customize_controls_options_woocommerce_sociovendors( $controls ) {

    $controls[] = array(
        'setting_type' => 'option_mod',
        'type'     => 'section',
        'setting'  => 'tokopress_options_sociovendors',
        'title'    => esc_html__( 'Socio Multi Vendor', 'tokopress' ),
        'panel'    => 'tokopress_options',
        'priority' => 10,
    );

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'heading',
		'setting'	=> 'tokopress_sociovendors_storeheader_heading', 
		'label'		=> esc_html__( 'SocioVendors - Vendor Store', 'tokopress' ),
		'section'	=> 'tokopress_options_sociovendors',
	);

    $controls[] = array( 
        'setting_type' => 'option_mod',
        'type'      => 'radio-buttonset',
        'setting'   => 'tokopress_sociovendors_shop_description',
        'label'     => esc_html__( 'SHOW Store Header on Vendor Store Page', 'tokopress' ),
        'section'   => 'tokopress_options_sociovendors',
        'default'   => 'yes',
        'choices'   => array(
                'yes' => __( 'Yes', 'tokopress' ),
                'no' => __( 'No', 'tokopress' ),
            ),
    );

    $controls[] = array( 
        'setting_type' => 'option_mod',
        'type'      => 'heading',
        'setting'   => 'tokopress_sociovendors_shop_heading', 
        'label'     => esc_html__( 'SocioVendors - Shop Page', 'tokopress' ),
        'section'   => 'tokopress_options_sociovendors',
    );

    $controls[] = array( 
        'setting_type' => 'option_mod',
        'type'      => 'radio-buttonset',
        'setting'   => 'tokopress_sociovendors_shop_soldby',
        'label'     => esc_html__( 'SHOW "Sold by" at Product List', 'tokopress' ),
        'section'   => 'tokopress_options_sociovendors',
        'default'   => 'yes',
        'choices'   => array(
                'yes' => __( 'Yes', 'tokopress' ),
                'no' => __( 'No', 'tokopress' ),
            ),
    );

    $controls[] = array( 
        'setting_type' => 'option_mod',
        'type'      => 'heading',
        'setting'   => 'tokopress_sociovendors_product_heading', 
        'label'     => esc_html__( 'SocioVendors - Single Product', 'tokopress' ),
        'section'   => 'tokopress_options_sociovendors',
    );

    $controls[] = array( 
        'setting_type' => 'option_mod',
        'type'      => 'radio-buttonset',
        'setting'   => 'tokopress_sociovendors_product_moreproducts',
        'label'     => esc_html__( 'SHOW "More From This Seller" Products', 'tokopress' ),
        'section'   => 'tokopress_options_sociovendors',
        'default'   => 'yes',
        'choices'   => array(
                'yes' => __( 'Yes', 'tokopress' ),
                'no' => __( 'No', 'tokopress' ),
            ),
    );

    $controls[] = array( 
        'setting_type' => 'option_mod',
        'type'      => 'radio-buttonset',
        'setting'   => 'tokopress_sociovendors_product_soldby',
        'label'     => esc_html__( 'SHOW "Sold by" at Item Details', 'tokopress' ),
        'section'   => 'tokopress_options_sociovendors',
        'default'   => 'yes',
        'choices'   => array(
                'yes' => __( 'Yes', 'tokopress' ),
                'no' => __( 'No', 'tokopress' ),
            ),
    );

    $controls[] = array( 
        'setting_type' => 'option_mod',
        'type'      => 'heading',
        'setting'   => 'tokopress_sociovendors_cart_heading', 
        'label'     => esc_html__( 'SocioVendors - Cart Page', 'tokopress' ),
        'section'   => 'tokopress_options_sociovendors',
    );

    $controls[] = array( 
        'setting_type' => 'option_mod',
        'type'      => 'radio-buttonset',
        'setting'   => 'tokopress_sociovendors_cart_soldby',
        'label'     => esc_html__( 'SHOW "Sold by" at Cart page', 'tokopress' ),
        'section'   => 'tokopress_options_sociovendors',
        'default'   => 'yes',
        'choices'   => array(
                'yes' => __( 'Yes', 'tokopress' ),
                'no' => __( 'No', 'tokopress' ),
            ),
    );

    return $controls;
}

function tokopress_sociovendors_settings( $options ) {
    $options[] = array(
        'name'  => __( 'SocioVendors', 'tokopress' ),
        'type'  => 'heading'
    );

    $options[] = array(
        'name' => __( 'SocioVendors - Vendor Store', 'tokopress' ),
        'type' => 'info'
    );

        $options[] = array(
            'name' => __( 'SHOW Store Header on Vendor Store Page', 'tokopress' ),
            'desc' => '',
            'id' => 'tokopress_sociovendors_shop_description',
            'std' => '',
            'type' => 'select',
            'options' => array(
                    'yes' => __( 'Yes', 'tokopress' ),
                    'no' => __( 'No', 'tokopress' ),
                )
        );

    $options[] = array(
        'name' => __( 'SocioVendors - Shop Page', 'tokopress' ),
        'type' => 'info'
    );

        $options[] = array(
            'name' => __( 'SHOW "Sold by" at Product List', 'tokopress' ),
            'desc' => '',
            'id' => 'tokopress_sociovendors_shop_soldby',
            'std' => '',
            'type' => 'select',
            'options' => array(
                    'yes' => __( 'Yes', 'tokopress' ),
                    'no' => __( 'No', 'tokopress' ),
                )
        );

    $options[] = array(
        'name' => __( 'SocioVendors - Single Product Page', 'tokopress' ),
        'type' => 'info'
    );

        $options[] = array(
            'name' => __( 'SHOW "More From This Seller" Products', 'tokopress' ),
            'desc' => '',
            'id' => 'tokopress_sociovendors_product_moreproducts',
            'std' => '',
            'type' => 'select',
            'options' => array(
                    'yes' => __( 'Yes', 'tokopress' ),
                    'no' => __( 'No', 'tokopress' ),
                )
        );

        $options[] = array(
            'name' => __( 'SHOW "Sold by" at Product Meta', 'tokopress' ),
            'desc' => '',
            'id' => 'tokopress_sociovendors_product_soldby',
            'std' => '',
            'type' => 'select',
            'options' => array(
                    'yes' => __( 'Yes', 'tokopress' ),
                    'no' => __( 'No', 'tokopress' ),
                )
        );

    $options[] = array(
        'name' => __( 'SocioVendors - Cart Page', 'tokopress' ),
        'type' => 'info'
    );

        $options[] = array(
            'name' => __( 'SHOW "Sold by" at Cart page', 'tokopress' ),
            'desc' => '',
            'id' => 'tokopress_sociovendors_cart_soldby',
            'std' => '',
            'type' => 'select',
            'options' => array(
                    'yes' => __( 'Yes', 'tokopress' ),
                    'no' => __( 'No', 'tokopress' ),
                )
        );

    return $options;
}
add_filter( 'of_options', 'tokopress_sociovendors_settings', 20 );

add_action( 'tokopress_quicknav_account', 'tokopress_sociovendors_quicknav_account' );
function tokopress_sociovendors_quicknav_account() {
    // printf( '<li><a rel="nofollow" href="%s">%s %s</a></li>', $item['url'], $item['title'], $item['icon'] );
}

add_action( 'tokopress_before_inner_content', 'tokopress_sociovendors_store_header', 5 );
function tokopress_sociovendors_store_header() {
	if( of_get_option( 'tokopress_sociovendors_shop_description' ) == 'no' ) {
		return;
	}
    get_template_part( 'sociovendors/store-header' );
}

add_action( 'woocommerce_after_shop_loop_item', 'tokopress_sociovendors_product_seller_name', 9 );
function tokopress_sociovendors_product_seller_name() {
	if( of_get_option( 'tokopress_sociovendors_shop_soldby' ) == 'no' ) {
		return;
	}
    echo tokopress_get_the_term_list( get_the_ID(), 'multi_vendor', '<p class="product-seller-name">'.__( 'sold by', 'tokopress' ).' ', ', ', '</p>' );
}

add_action( 'tokopress_wc_after_single_product', 'tokopress_sociovendors_more_products', 5 );
function tokopress_sociovendors_more_products() {
	if( of_get_option( 'tokopress_sociovendors_product_moreproducts' ) == 'no' ) {
		return;
	}
	get_template_part( 'sociovendors/block-more-products' );
}

add_action( 'tokopress_wc_main_content_right', 'tokopress_sociovendors_sold_by_meta', 25, 2 );
function tokopress_sociovendors_sold_by_meta() {
	if( of_get_option( 'tokopress_sociovendors_product_soldby' ) == 'no' ) {
		return;
	}
    echo tokopress_get_the_term_list( get_the_ID(), 'multi_vendor', '<ul class="list-item-details"><li><span class="data-type">'.__( 'sold by', 'tokopress' ).'</span><span class="value">', ', ', '</span></li></ul>' );
}

add_filter( 'woocommerce_get_item_data', 'sociovendors_product_seller_info', 10, 2 );
function sociovendors_product_seller_info( $item_data, $cart_item ) {
	if( of_get_option( 'tokopress_sociovendors_cart_soldby' ) == 'no' ) {
		return;
	}
    $sold_by = tokopress_get_the_term_list( $cart_item['data']->post->ID, 'multi_vendor', '', ', ', '' );
    if ( $sold_by ) {
        $item_data[] = array(
            'name'  => __( 'sold by', 'tokopress' ),
            'value' => tokopress_get_the_term_list( $cart_item['data']->post->ID, 'multi_vendor', '', ', ', '' )
        );
    }
    return $item_data;
}
