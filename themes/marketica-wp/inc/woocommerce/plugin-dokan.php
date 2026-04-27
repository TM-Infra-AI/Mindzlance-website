<?php

add_filter( 'tokopress_customize_controls', 'tokopress_customize_controls_options_woocommerce_dokan' );
function tokopress_customize_controls_options_woocommerce_dokan( $controls ) {

    $controls[] = array(
        'setting_type' => 'option_mod',
        'type'     => 'section',
        'setting'  => 'tokopress_options_dokan',
        'title'    => esc_html__( 'Dokan', 'tokopress' ),
        'panel'    => 'tokopress_options',
        'priority' => 10,
    );

    $controls[] = array( 
        'setting_type' => 'option_mod',
        'type'      => 'heading',
        'setting'   => 'tokopress_dokan_storeheader_heading', 
        'label'     => esc_html__( 'Dokan - Vendor Store', 'tokopress' ),
        'section'   => 'tokopress_options_dokan',
    );

    $controls[] = array( 
        'setting_type' => 'option_mod',
        'type'      => 'warning',
        'setting'   => 'tokopress_options_dokan_store_warning', 
        'label'     => sprintf( esc_html__( 'You are not in %s', 'tokopress' ), esc_html__( 'Vendor Store Page', 'tokopress' ) ),
        'description' => sprintf( esc_html__( 'These settings only affect %s. Please visit %s to see live preview for these settings.', 'tokopress' ), esc_html__( 'Vendor Store Page', 'tokopress' ) , esc_html__( 'Vendor Store Page', 'tokopress' ) ),
        'section'   => 'tokopress_options_dokan',
        'active_callback' => 'tokopress_dokan_is_not_store_page',
    );

    $controls[] = array( 
        'setting_type' => 'option_mod',
        'type'      => 'radio-buttonset',
        'setting'   => 'tokopress_dokan_shop_description',
        'label'     => esc_html__( 'SHOW Store Header on Vendor Store Page', 'tokopress' ),
        'section'   => 'tokopress_options_dokan',
        'default'   => 'yes',
        'choices'   => array(
                'yes' => __( 'Yes', 'tokopress' ),
                'no' => __( 'No', 'tokopress' ),
            ),
    );

    $controls[] = array( 
        'setting_type' => 'option_mod',
        'type'      => 'radio-image',
        'setting'   => 'store_header_template',
        'setting_db' => 'dokan_appearance',
        'label'     => esc_html__( '[Dokan Setting] Store Header Template', 'tokopress' ),
        'section'   => 'tokopress_options_dokan',
        'default'   => '',
        'active_callback' => 'tokopress_dokan_vendor_store_on',
        'choices'   => array(
                'default' => THEME_URI . '/img/store-header.jpg',
                'layout0' => DOKAN_PLUGIN_ASSEST . '/images/store-header-templates/default.png',
                'layout1' => DOKAN_PLUGIN_ASSEST . '/images/store-header-templates/layout1.png',
                'layout2' => DOKAN_PLUGIN_ASSEST . '/images/store-header-templates/layout2.png',
                'layout3' => DOKAN_PLUGIN_ASSEST . '/images/store-header-templates/layout3.png'
            ),
    );

    $controls[] = array( 
        'setting_type' => 'option_mod',
        'type'      => 'radio-buttonset',
        'setting'   => 'tokopress_dokan_store_header_style',
        'label'     => esc_html__( 'Store Header Style / Position', 'tokopress' ),
        'description' => esc_html__( 'If you use Dokan Live Search extension, it is better to use "Inner (Content)" for store header style.', 'tokopress' ),
        'section'   => 'tokopress_options_dokan',
        'default'   => 'outer',
        'active_callback' => 'tokopress_dokan_vendor_store_default',
        'choices'   => array(
                'outer' => esc_html__( 'Outer / Header', 'tokopress' ),
                'inner' => esc_html__( 'Inner / Content', 'tokopress' ),
            ),
    );

    // $controls[] = array( 
    //     'setting_type' => 'option_mod',
    //     'type'      => 'number',
    //     'setting'   => 'store_banner_width',
    //     'setting_db' => 'dokan_general',
    //     'label'     => esc_html__( '[Dokan Setting] Store Banner Image Width (px)', 'tokopress' ),
    //     'section'   => 'tokopress_options_dokan',
    //     'active_callback' => 'tokopress_dokan_vendor_store_on',
    // );

    // $controls[] = array( 
    //     'setting_type' => 'option_mod',
    //     'type'      => 'number',
    //     'setting'   => 'store_banner_height',
    //     'setting_db' => 'dokan_general',
    //     'label'     => esc_html__( '[Dokan Setting] Store Banner Image Height (px)', 'tokopress' ),
    //     'section'   => 'tokopress_options_dokan',
    //     'active_callback' => 'tokopress_dokan_vendor_store_on',
    // );

    $controls[] = array( 
        'setting_type' => 'option_mod',
        'type'      => 'radio-buttonset',
        'setting'   => 'seller_enable_terms_and_conditions',
        'setting_db' => 'dokan_general',
        'label'     => esc_html__( '[Dokan Setting] Enable Terms and Conditions for vendor stores', 'tokopress' ),
        'section'   => 'tokopress_options_dokan',
        'default'   => '',
        'choices'   => array(
                'on' => __( 'Yes', 'tokopress' ),
                'off' => __( 'No', 'tokopress' ),
            ),
    );

    $controls[] = array( 
        'setting_type' => 'option_mod',
        'type'      => 'radio-buttonset',
        'setting'   => 'enable_theme_store_sidebar',
        'setting_db' => 'dokan_general',
        'label'     => esc_html__( '[Dokan Setting] Enable showing Store Sidebar From Your Theme', 'tokopress' ),
        'description' => esc_html__( 'By default, Dokan will show custom sidebar from Dokan. You can use this option to show shop sidebar (if active) from your theme.', 'tokopress' ),
        'section'   => 'tokopress_options_dokan',
        'default'   => '',
        'choices'   => array(
                'off' => __( 'No', 'tokopress' ),
                'on' => __( 'Yes', 'tokopress' ),
            ),
    );

    $controls[] = array( 
        'setting_type' => 'option_mod',
        'type'      => 'radio-buttonset',
        'setting'   => 'store_map',
        'setting_db' => 'dokan_general',
        'label'     => esc_html__( '[Dokan Setting] Enable a Google Map of the Store Location in the Dokan store sidebar', 'tokopress' ),
        'section'   => 'tokopress_options_dokan',
        'default'   => '',
        'active_callback' => 'tokopress_dokan_theme_store_sidebar_off',
        'choices'   => array(
                'on' => __( 'Yes', 'tokopress' ),
                'off' => __( 'No', 'tokopress' ),
            ),
    );

    $controls[] = array( 
        'setting_type' => 'option_mod',
        'type'      => 'text',
        'setting'   => 'gmap_api_key',
        'setting_db' => 'dokan_general',
        'label'     => esc_html__( '[Dokan Setting] Google Maps API Key for Google Map of the Store Location (recommended)', 'tokopress' ),
        'description' => esc_html__( 'Usage of the Google Maps APIs now requires a key if your domain was not active prior to June 22nd, 2016.', 'tokopress' ).' <br/><a href="https://developers.google.com/maps/documentation/javascript/get-api-key#get-an-api-key">'.esc_html__( 'Click here to get your Google Maps API key', 'tokopress' ).'</a>',
        'section'   => 'tokopress_options_dokan',
        'default'   => '',
    );

    $controls[] = array( 
        'setting_type' => 'option_mod',
        'type'      => 'radio-buttonset',
        'setting'   => 'contact_seller',
        'setting_db' => 'dokan_general',
        'label'     => esc_html__( '[Dokan Setting] Enable Vendor Contact Form in the Dokan store sidebar', 'tokopress' ),
        'section'   => 'tokopress_options_dokan',
        'default'   => '',
        'active_callback' => 'tokopress_dokan_theme_store_sidebar_off',
        'choices'   => array(
                'on' => __( 'Yes', 'tokopress' ),
                'off' => __( 'No', 'tokopress' ),
            ),
    );

    $controls[] = array( 
        'setting_type' => 'option_mod',
        'type'      => 'heading',
        'setting'   => 'tokopress_dokan_shop_heading', 
        'label'     => esc_html__( 'Dokan - Shop Page', 'tokopress' ),
        'section'   => 'tokopress_options_dokan',
    );

    $controls[] = array( 
        'setting_type' => 'option_mod',
        'type'      => 'warning',
        'setting'   => 'tokopress_options_dokan_shop_warning', 
        'label'     => sprintf( esc_html__( 'You are not in %s', 'tokopress' ), esc_html__( 'Shop Page', 'tokopress' ) ),
        'description' => sprintf( esc_html__( 'These settings only affect %s. Please visit %s to see live preview for these settings.', 'tokopress' ), esc_html__( 'Shop Page', 'tokopress' ) , esc_html__( 'Shop Page', 'tokopress' ) ),
        'section'   => 'tokopress_options_dokan',
        'active_callback' => 'tokopress_wc_is_not_shop_page',
    );

    $controls[] = array( 
        'setting_type' => 'option_mod',
        'type'      => 'radio-buttonset',
        'setting'   => 'tokopress_dokan_shop_soldby',
        'label'     => esc_html__( 'SHOW "Sold by" at Product List', 'tokopress' ),
        'section'   => 'tokopress_options_dokan',
        'default'   => 'yes',
        'choices'   => array(
                'yes' => __( 'Yes', 'tokopress' ),
                'no' => __( 'No', 'tokopress' ),
            ),
    );

    $controls[] = array(
        'setting_type' => 'option_mod',
        'type'      => 'text',
        'setting'   => 'tokopress_dokan_shop_soldby_text',
        'label'     => esc_html__( 'Custom "Sold by" text', 'tokopress' ),
        'section'   => 'tokopress_options_dokan',
    );

    $controls[] = array( 
        'setting_type' => 'option_mod',
        'type'      => 'heading',
        'setting'   => 'tokopress_dokan_product_heading', 
        'label'     => esc_html__( 'Dokan - Single Product', 'tokopress' ),
        'section'   => 'tokopress_options_dokan',
    );

    $controls[] = array( 
        'setting_type' => 'option_mod',
        'type'      => 'warning',
        'setting'   => 'tokopress_options_dokan_product_warning', 
        'label'     => sprintf( esc_html__( 'You are not in %s', 'tokopress' ), esc_html__( 'Single Product', 'tokopress' ) ),
        'description' => sprintf( esc_html__( 'These settings only affect %s. Please visit %s to see live preview for these settings.', 'tokopress' ), esc_html__( 'Single Product', 'tokopress' ) , esc_html__( 'Single Product', 'tokopress' ) ),
        'section'   => 'tokopress_options_dokan',
        'active_callback' => 'tokopress_wc_is_not_product_page',
    );

    $controls[] = array( 
        'setting_type' => 'option_mod',
        'type'      => 'radio-buttonset',
        'setting'   => 'tokopress_dokan_product_tab',
        'label'     => esc_html__( 'SHOW "Seller Info" at Product Tab', 'tokopress' ),
        'section'   => 'tokopress_options_dokan',
        'default'   => 'no',
        'choices'   => array(
                'no' => __( 'No', 'tokopress' ),
                'yes' => __( 'Yes', 'tokopress' ),
            ),
    );

    $controls[] = array( 
        'setting_type' => 'option_mod',
        'type'      => 'radio-buttonset',
        'setting'   => 'tokopress_dokan_product_viewstorelink',
        'label'     => esc_html__( 'SHOW "View Store" link at the end of Product Tab', 'tokopress' ),
        'section'   => 'tokopress_options_dokan',
        'default'   => 'no',
        'choices'   => array(
                'no' => __( 'No', 'tokopress' ),
                'yes' => __( 'Yes', 'tokopress' ),
            ),
    );

    $controls[] = array( 
        'setting_type' => 'option_mod',
        'type'      => 'radio-buttonset',
        'setting'   => 'tokopress_dokan_product_moreproducts',
        'label'     => esc_html__( 'SHOW "More From This Seller" Products', 'tokopress' ),
        'section'   => 'tokopress_options_dokan',
        'default'   => 'yes',
        'choices'   => array(
                'yes' => __( 'Vendor Setting', 'tokopress' ),
                'yes_all' => __( 'Yes For All', 'tokopress' ),
                'no' => __( 'No', 'tokopress' ),
            ),
    );

    $controls[] = array( 
        'setting_type' => 'option_mod',
        'type'      => 'radio-buttonset',
        'setting'   => 'tokopress_dokan_product_vendordetails',
        'label'     => esc_html__( 'SHOW Vendor Details at Product Sidebar', 'tokopress' ),
        'section'   => 'tokopress_options_dokan',
        'default'   => 'no',
        'choices'   => array(
                'no' => __( 'No', 'tokopress' ),
                'yes' => __( 'Yes', 'tokopress' ),
            ),
    );

    $controls[] = array( 
        'setting_type' => 'option_mod',
        'type'      => 'radio-buttonset',
        'setting'   => 'tokopress_dokan_product_soldby',
        'label'     => esc_html__( 'SHOW "Sold by" at Item Details', 'tokopress' ),
        'section'   => 'tokopress_options_dokan',
        'default'   => 'yes',
        'choices'   => array(
                'yes' => __( 'Yes', 'tokopress' ),
                'no' => __( 'No', 'tokopress' ),
            ),
    );

    $controls[] = array(
        'setting_type' => 'option_mod',
        'type'      => 'text',
        'setting'   => 'tokopress_dokan_product_soldby_text',
        'label'     => esc_html__( 'Custom "Sold by" text', 'tokopress' ),
        'section'   => 'tokopress_options_dokan',
    );

    $controls[] = array( 
        'setting_type' => 'option_mod',
        'type'      => 'heading',
        'setting'   => 'tokopress_dokan_cart_heading', 
        'label'     => esc_html__( 'Dokan - Cart Page', 'tokopress' ),
        'section'   => 'tokopress_options_dokan',
    );

    $controls[] = array( 
        'setting_type' => 'option_mod',
        'type'      => 'warning',
        'setting'   => 'tokopress_options_dokan_cart_warning', 
        'label'     => sprintf( esc_html__( 'You are not in %s', 'tokopress' ), esc_html__( 'Cart Page', 'tokopress' ) ),
        'description' => sprintf( esc_html__( 'These settings only affect %s. Please visit %s to see live preview for these settings.', 'tokopress' ), esc_html__( 'Cart Page', 'tokopress' ) , esc_html__( 'Cart Page', 'tokopress' ) ),
        'section'   => 'tokopress_options_dokan',
        'active_callback' => 'tokopress_wc_is_not_cart_page',
    );

    $controls[] = array( 
        'setting_type' => 'option_mod',
        'type'      => 'radio-buttonset',
        'setting'   => 'tokopress_dokan_cart_soldby',
        'label'     => esc_html__( 'SHOW "Sold by" at Cart page', 'tokopress' ),
        'section'   => 'tokopress_options_dokan',
        'default'   => 'yes',
        'choices'   => array(
                'yes' => __( 'Yes', 'tokopress' ),
                'no' => __( 'No', 'tokopress' ),
            ),
    );

    $controls[] = array(
        'setting_type' => 'option_mod',
        'type'      => 'text',
        'setting'   => 'tokopress_dokan_cart_soldby_text',
        'label'     => esc_html__( 'Custom "Sold by" text', 'tokopress' ),
        'section'   => 'tokopress_options_dokan',
    );

    if ( class_exists('Dokan_Live_Search') ) {
        $controls[] = array( 
            'setting_type' => 'option_mod',
            'type'      => 'heading',
            'setting'   => 'tokopress_dokan_livesearch_heading', 
            'label'     => esc_html__( 'Dokan Live Search', 'tokopress' ),
            'section'   => 'tokopress_options_dokan',
        );

        $controls[] = array( 
            'type'      => 'checkbox',
            'setting'   => 'tokopress_dokan_livesearch_header',
            'label'     => esc_html__( 'ENABLE Dokan Live Search on header', 'tokopress' ),
            'section'   => 'tokopress_options_dokan',
        );
    }

    $controls[] = array( 
        'setting_type' => 'option_mod',
        'type'      => 'heading',
        'setting'   => 'tokopress_options_dokan_goto_colors', 
        'label'     => esc_html__( 'More ...', 'tokopress' ),
        'description' => '<p><span class="dashicons dashicons-admin-appearance"></span> <a href="javascript:wp.customize.section( \'tokopress_colors_wc_dokan\' ).focus();">'.esc_html__( 'Go to Theme Colors of this section', 'tokopress' ).'</a></p>',
        'section'   => 'tokopress_options_dokan',
    );

    return $controls;
}

function tokopress_dokan_settings( $options ) {
    $options[] = array(
        'name'  => __( 'Dokan', 'tokopress' ),
        'type'  => 'heading'
    );

        // $options[] = array(
        //     'name' => __( '"Sold by" Vendor Name', 'tokopress' ),
        //     'desc' => '',
        //     'id' => 'tokopress_dokan_soldby_name',
        //     'std' => '',
        //     'type' => 'select',
        //     'options' => array(
        //             'display_name' => __( 'Display Name', 'tokopress' ),
        //             'shop_name' => __( 'Shop Name', 'tokopress' ),
        //         )
        // );

    $options[] = array(
        'name' => __( 'Dokan - Vendor Store', 'tokopress' ),
        'type' => 'info'
    );

        $options[] = array(
            'name' => __( 'SHOW Store Header on Vendor Store Page', 'tokopress' ),
            'desc' => '',
            'id' => 'tokopress_dokan_shop_description',
            'std' => '',
            'type' => 'select',
            'options' => array(
                    'yes' => __( 'Yes', 'tokopress' ),
                    'no' => __( 'No', 'tokopress' ),
                )
        );

    $options[] = array(
        'name' => __( 'Dokan - Shop Page', 'tokopress' ),
        'type' => 'info'
    );

        $options[] = array(
            'name' => __( 'SHOW "Sold by" at Product List', 'tokopress' ),
            'desc' => '',
            'id' => 'tokopress_dokan_shop_soldby',
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
            'id' => 'tokopress_dokan_shop_soldby_text',
            'std' => '',
            'type' => 'text',
        );

    $options[] = array(
        'name' => __( 'Dokan - Single Product Page', 'tokopress' ),
        'type' => 'info'
    );

        $options[] = array(
            'name' => __( 'SHOW "Seller Info" at Product Tab', 'tokopress' ),
            'desc' => '',
            'id' => 'tokopress_dokan_product_tab',
            'std' => '',
            'type' => 'select',
            'options' => array(
                    'yes' => __( 'Yes', 'tokopress' ),
                    'no' => __( 'No', 'tokopress' ),
                )
        );

        $options[] = array(
            'name' => __( 'SHOW "View Store" link at the end of Product Tab', 'tokopress' ),
            'desc' => '',
            'id' => 'tokopress_dokan_product_viewstorelink',
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
            'id' => 'tokopress_dokan_product_moreproducts',
            'std' => '',
            'type' => 'select',
            'options' => array(
                    'yes' => __( 'Vendor Setting', 'tokopress' ),
                    'yes_all' => __( 'Yes For All', 'tokopress' ),
                    'no' => __( 'No', 'tokopress' ),
                )
        );

        $options[] = array(
            'name' => __( 'SHOW Vendor Details at Product Sidebar', 'tokopress' ),
            'desc' => '',
            'id' => 'tokopress_dokan_product_vendordetails',
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
            'id' => 'tokopress_dokan_product_soldby',
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
            'id' => 'tokopress_dokan_product_soldby_text',
            'std' => '',
            'type' => 'text',
        );

    $options[] = array(
        'name' => __( 'Dokan - Cart Page', 'tokopress' ),
        'type' => 'info'
    );

        $options[] = array(
            'name' => __( 'SHOW "Sold by" at Cart page', 'tokopress' ),
            'desc' => '',
            'id' => 'tokopress_dokan_cart_soldby',
            'std' => '',
            'type' => 'select',
            'options' => array(
                    'yes' => __( 'Yes', 'tokopress' ),
                    'no' => __( 'No', 'tokopress' ),
                )
        );

    return $options;
}
add_filter( 'of_options', 'tokopress_dokan_settings', 20 );

add_filter( 'tokopress_customize_controls', 'tokopress_customize_controls_colors_woocommerce_dokan' );
function tokopress_customize_controls_colors_woocommerce_dokan( $controls ) {

    $controls[] = array(
        'type'     => 'section',
        'setting'  => 'tokopress_colors_wc_dokan',
        'title'    => esc_html__( 'Dokan', 'tokopress' ),
        'panel'    => 'tokopress_colors',
        'priority' => 10,
    );

    $controls[] = array( 
        'setting_type' => 'option_mod',
        'type'      => 'heading',
        'setting'   => 'tokopress_colors_dokan_store_heading', 
        'label'     => esc_html__( 'Vendor Store', 'tokopress' ),
        'section'   => 'tokopress_colors_wc_dokan',
    );

    $controls[] = array( 
        'type'      => 'color',
        'setting'   => 'tokopress_wc_store_header_bg',
        'label'     => esc_html__( 'Vendor Store Header Background Color', 'tokopress' ),
        'description' => esc_html__( 'If vendor store banner image is not available', 'tokopress' ),
        'section'   => 'tokopress_colors_wc_dokan',
        'style'     => '.store-profile { background-color: [value] !important; }',
    );

    $controls[] = array( 
        'setting_type' => 'option_mod',
        'type'      => 'heading',
        'setting'   => 'tokopress_colors_dokan_menu_heading', 
        'label'     => esc_html__( 'Dokan Dashboard', 'tokopress' ),
        'section'   => 'tokopress_colors_wc_dokan',
    );

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_dokan_menu_active',
		'label'		=> esc_html__( 'Dokan Dashboard - Menu Background (Active)', 'tokopress' ),
		'section'	=> 'tokopress_colors_wc_dokan',
		'style'		=> '.dokan-dashboard .dokan-dash-sidebar ul.dokan-dashboard-menu li.active { background: [value]; }',
	);

    $controls[] = array( 
        'type'      => 'color',
        'setting'   => 'tokopress_dokan_menu_hover',
        'label'     => esc_html__( 'Dokan Dashboard - Menu Background (Hover)', 'tokopress' ),
        'section'   => 'tokopress_colors_wc_dokan',
        'style'     => '.dokan-dashboard .dokan-dash-sidebar ul.dokan-dashboard-menu li:hover, .dokan-dashboard .dokan-dash-sidebar ul.dokan-dashboard-menu li.dokan-common-links a:hover { background: [value]; }',
    );

    $controls[] = array( 
        'type'      => 'color',
        'setting'   => 'tokopress_dokan_link',
        'label'     => esc_html__( 'Dokan Dashboard - Link Color', 'tokopress' ),
        'section'   => 'tokopress_colors_wc_dokan',
        'style'     => '.dokan-dashboard .dokan-dashboard-content a, .dokan-add-new-product-popup a { color: [value]; }',
    );

    $controls[] = array( 
        'setting_type' => 'option_mod',
        'type'      => 'heading',
        'setting'   => 'tokopress_colors_dokan_button_heading', 
        'label'     => esc_html__( 'Dokan Button', 'tokopress' ),
        'section'   => 'tokopress_colors_wc_dokan',
    );

    $controls[] = array( 
        'type'      => 'color',
        'setting'   => 'tokopress_dokan_button',
        'label'     => esc_html__( 'Dokan Button Background', 'tokopress' ),
        'section'   => 'tokopress_colors_wc_dokan',
        'style'     => 'input[type="submit"].dokan-btn-theme, a.dokan-btn-theme, .dokan-btn-theme, .dokan-support-reply-form #respond input#submit { background: [value] !important; border-color: [value] !important; }',
    );

    $controls[] = array( 
        'type'      => 'color',
        'setting'   => 'tokopress_dokan_button_hover',
        'label'     => esc_html__( 'Dokan Button Background (Hover)', 'tokopress' ),
        'section'   => 'tokopress_colors_wc_dokan',
        'style'     => 'input[type="submit"].dokan-btn-theme:hover, a.dokan-btn-theme:hover, .dokan-btn-theme:hover, input[type="submit"].dokan-btn-theme:focus, a.dokan-btn-theme:focus, .dokan-btn-theme:focus, input[type="submit"].dokan-btn-theme:active, a.dokan-btn-theme:active, .dokan-btn-theme:active, input[type="submit"].dokan-btn-theme.active, a.dokan-btn-theme.active, .dokan-btn-theme.active, .open .dropdown-toggleinput[type="submit"].dokan-btn-theme, .open .dropdown-togglea.dokan-btn-theme, .open .dropdown-toggle.dokan-btn-theme, .dokan-support-reply-form #respond input#submit:hover { background: [value] !important; border-color: [value] !important; }',
    );

    $controls[] = array( 
        'setting_type' => 'option_mod',
        'type'      => 'heading',
        'setting'   => 'tokopress_colors_dokan_goto_options', 
        'label'     => esc_html__( 'More ...', 'tokopress' ),
        'description' => '<p><span class="dashicons dashicons-admin-tools"></span> <a href="javascript:wp.customize.section( \'tokopress_options_dokan\' ).focus();">'.esc_html__( 'Go to Theme Options of this section', 'tokopress' ).'</a></p>',
        'section'   => 'tokopress_colors_wc_dokan',
    );

    return $controls;

}

add_filter( 'tokopress_layout_class', 'tokopress_dokan_layout_class' );
function tokopress_dokan_layout_class( $layout ) {
    if ( dokan_is_store_page () ) {
    	if ( class_exists( 'Dokan_Store_Location' ) && dokan_get_option( 'enable_theme_store_sidebar', 'dokan_general', 'off' ) == 'off' ) {
			$layout = 'layout-2c-l';
    	}
    	else {
        	if ( ! of_get_option( 'tokopress_wc_hide_products_sidebar' ) ) {
				$layout = 'layout-2c-l';
        	}
        	else {
				$layout = 'layout-1c-full';
        	}
    	}
    }
	return $layout;
}

add_action( 'tokopress_quicknav_account', 'tokopress_dokan_quicknav_account' );
function tokopress_dokan_quicknav_account() {
	if ( ! is_user_logged_in() )
		return;

    global $current_user;

    $user_id = $current_user->ID;
    if ( ! dokan_is_user_seller( $user_id ) )
		return;

    $nav_urls = dokan_get_dashboard_nav();

    foreach ($nav_urls as $key => $item) {
        printf( '<li><a href="%s">%s %s</a></li>', $item['url'], $item['title'], $item['icon'] );
    }
    echo '<li class="quicknav-separator"></li>';

    add_filter( 'tokopress_wc_quicknav_account_submenus', '__return_false' );
}

add_action( 'woocommerce_after_shop_loop_item', 'tokopress_dokan_product_seller_name', 9 );
function tokopress_dokan_product_seller_name() {
	if( of_get_option( 'tokopress_dokan_shop_soldby' ) == 'no' ) {
		return;
	}
	global $product;
	$product_id = is_callable( array( $product, 'get_id' ) ) ? $product->get_id() : $product->ID;
	$user_id = get_post_field( 'post_author', $product_id );
	if ( ! dokan_is_user_seller( $user_id ) )
		return;
	$store_info = dokan_get_store_info( $user_id );
	if ( isset( $store_info['store_name'] ) && $store_info['store_name'] ) {
		$author_name = $store_info['store_name'];
	}
	else {
		$author = get_user_by( 'id', $user_id );
		$author_name = $author->display_name;
	}
	$soldby_text = of_get_option( 'tokopress_dokan_shop_soldby_text' );
    if ( $soldby_text && $soldby_text != '.' ) {
        $soldby_text = __( $soldby_text, 'tokopress' ); /* support qTranslateX */
    }
	if ( !$soldby_text ) {
		$soldby_text = __( 'sold by', 'tokopress' );
	}
	if ( trim( $soldby_text ) == '.' ) {
		$soldby_text = '';
	}
    printf( '<p class="product-seller-name">%s <a href="%s">%s</a></p>', $soldby_text, dokan_get_store_url( $user_id ), $author_name );
}

remove_action( 'woocommerce_product_tabs', 'dokan_more_from_seller_tab', 10 );
add_action( 'tokopress_wc_after_single_product', 'tokopress_dokan_more_products', 5 );
function tokopress_dokan_more_products() {
	if( of_get_option( 'tokopress_dokan_product_moreproducts' ) == 'no' ) {
		return;
	}
	get_template_part( 'dokan/block-more-products' );
}

add_action( 'tokopress_wc_main_content_right', 'tokopress_dokan_sold_by_meta', 25, 2 );
function tokopress_dokan_sold_by_meta() {
	if( of_get_option( 'tokopress_dokan_product_soldby' ) == 'no' ) {
		return;
	}
	global $product;
	$product_id = is_callable( array( $product, 'get_id' ) ) ? $product->get_id() : $product->ID;
	$user_id = get_post_field( 'post_author', $product_id );
	if ( ! dokan_is_user_seller( $user_id ) )
		return;
	$store_info = dokan_get_store_info( $user_id );
	if ( isset( $store_info['store_name'] ) && $store_info['store_name'] ) {
		$author_name = $store_info['store_name'];
	}
	else {
		$author = get_user_by( 'id', $user_id );
		$author_name = $author->display_name;
	}
	$soldby_text = of_get_option( 'tokopress_dokan_product_soldby_text' );
    if ( $soldby_text && $soldby_text != '.' ) {
        $soldby_text = __( $soldby_text, 'tokopress' ); /* support qTranslateX */
    }
	if ( !$soldby_text ) {
		$soldby_text = __( 'sold by', 'tokopress' );
	}
    $soldby = sprintf( '<a href="%s">%s</a>', dokan_get_store_url( $user_id ), $author_name );
	echo '<ul class="list-item-details"><li><span class="data-type">'.$soldby_text.'</span><span class="value">'.$soldby.'</span></li></ul>';
}

add_action( 'wp', 'tokopress_dokan_wp_options' );
function tokopress_dokan_wp_options() {

	if( of_get_option( 'tokopress_dokan_product_tab' ) == 'no' ) {
	remove_filter( 'woocommerce_product_tabs', 'dokan_seller_product_tab' );
	}

	if( of_get_option( 'tokopress_dokan_cart_soldby' ) == 'no' ) {
		remove_filter( 'woocommerce_get_item_data', 'dokan_product_seller_info', 10, 2 );
	}

}

add_filter( 'body_class', 'toko_dokan_body_class_product_columns' );
function toko_dokan_body_class_product_columns( $classes ) {
    $columns = 0;
    if ( function_exists('dokan_is_store_page') && dokan_is_store_page() ) {
        $columns = apply_filters( 'loop_shop_columns', 3 );
        if ( $columns < 1 ) $columns = 3;
        if ( $columns > 5 ) $columns = 5;
    }
    if ( $columns ) {
        $classes[] = 'woocommerce';
        $classes[] = 'columns-' . $columns;
    }
    return $classes;
}

if ( class_exists('Dokan_WC_Product_Zoom') ) {
    add_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
    remove_action( 'woocommerce_before_single_product_summary', 'tokopress_wc_single_product_image_slider', 10 );
}

add_filter( 'document_title_parts', 'tokopress_dokan_document_title_parts' );
function tokopress_dokan_document_title_parts( $title ) {
	if ( dokan_is_store_page() ) {
		$store_user = get_userdata( get_query_var( 'author' ) );
		$store_info = dokan_get_store_info( $store_user->ID );
        $title['title'] = $store_info['store_name'];
    }
    return $title;
}

add_filter( 'dokan_settings_fields', 'tokopress_dokan_settings_fields' );
function tokopress_dokan_settings_fields( $settings_fields ) {
    if ( isset( $settings_fields['dokan_appearance']['store_header_template']['options'] ) ) {
        $options = $settings_fields['dokan_appearance']['store_header_template']['options'];
        $options2 = array( 'default' => THEME_URI . '/img/store-header.jpg' );
        if ( isset( $options['default'] ) ) {
            $options2['layout0'] = $options['default'];
            unset( $options['default'] );
        }
        $options = array_merge( $options2, $options );
        $settings_fields['dokan_appearance']['store_header_template']['options'] = $options;
        $settings_fields['dokan_appearance']['store_header_template']['default'] = 'marketica';
    }
    return $settings_fields;
}

add_filter( 'dokan_get_seller_review_url', 'tokopress_dokan_get_seller_review_url' );
function tokopress_dokan_get_seller_review_url( $url ) {
	if ( !class_exists('Dokan_Pro_Store') ) {
		$url = 'javascript:void(0)';
	}
	return $url;
}

add_action( 'tokopress_wc_main_content_right', 'tokopress_dokan_product_sidebar_vendor', 15 );
function tokopress_dokan_product_sidebar_vendor() {
	if( of_get_option( 'tokopress_dokan_product_vendordetails' ) != 'yes' ) {
		return;
	}
	global $product;
	$product_id = is_callable( array( $product, 'get_id' ) ) ? $product->get_id() : $product->ID;
	$user_id = get_post_field( 'post_author', $product_id );
    if ( ! dokan_is_user_seller( $user_id ) )
		return;
	$store_user = get_user_by( 'id', $user_id );
	$store_info = dokan_get_store_info( $store_user->ID );
	echo '<div class="widget vendor-details">';
	echo get_avatar( $store_user->ID, 60 );
	echo '<h3 class="widget-title">'.esc_html( $store_info['store_name'] ).'</h3>';
    $rating = dokan_get_seller_rating( $store_user->ID );
    if ( isset( $rating['count'] ) && $rating['count'] ) {
        dokan_get_readable_seller_rating( $store_user->ID );
    }
    
    if ( isset( $store_info['seller_info'] ) && !empty( $store_info['seller_info'] ) ) { ?>
        <p class="widget_seller_info"><?php echo esc_html( $store_info['seller_info'] ); ?></p>
    <?php } 
        
	echo '<a href="'.dokan_get_store_url( $store_user->ID ).'" class="button">'.__( 'View Store', 'tokopress' ).'</a>';
	echo '</div>';
}

if( of_get_option( 'tokopress_dokan_product_viewstorelink' ) == 'yes' ) {
    add_action( 'tokopress_wc_main_content_right', 'tokopress_dokan_product_viewstorelink', 99 );
}
function tokopress_dokan_product_viewstorelink() {
	global $product;
	$product_id = is_callable( array( $product, 'get_id' ) ) ? $product->get_id() : $product->ID;
	$user_id = get_post_field( 'post_author', $product_id );
    if ( ! dokan_is_user_seller( $user_id ) )
		return;
	echo '<div class="view-store-link">';
	echo '<a href="'.dokan_get_store_url( $user_id ).'" class="button">'.__( 'View Store', 'tokopress' ).'</a>';
	echo '</div>';
}

add_filter('woocommerce_login_redirect', 'tokopress_dokan_login_redirect', 20, 2);
function tokopress_dokan_login_redirect( $redirect_to, $user ) {
	if ( dokan_is_user_seller( $user->ID ) ) {
		$seller_dashboard = dokan_get_option( 'dashboard', 'dokan_pages' );
		if ( $seller_dashboard > 0 ) {
			$redirect_to = get_permalink( $seller_dashboard );
		}
	}
	return $redirect_to;
}

add_filter( 'tokopress_header_searchform', 'tokopress_header_seachform_dokanlivesearch' );
function tokopress_header_seachform_dokanlivesearch( $form ) {
    if ( class_exists('Dokan_Live_Search') && get_theme_mod('tokopress_dokan_livesearch_header') ) {
        $form = 'block-search-dokanlivesearch';
    }
    return $form;
}

add_action( 'dokan_after_store_tabs', 'tokopress_dokan_fix_store_support_enqueue' );
function tokopress_dokan_fix_store_support_enqueue() {
    if ( class_exists('Dokan_Store_Support') ) {
        wp_enqueue_style( 'dokan-magnific-popup' );
        wp_enqueue_script( 'dokan-popup' );
    }
}

function tokopress_dokan_is_not_store_page() {
    return dokan_is_store_page() ? false : true;
}

function tokopress_dokan_theme_store_sidebar_off() {
    return dokan_get_option( 'enable_theme_store_sidebar', 'dokan_general', 'off' ) == 'off' ? true : false;
}

function tokopress_dokan_vendor_store_on() {
    return of_get_option( 'tokopress_dokan_shop_description' ) != 'no' ? true : false;
}

function tokopress_dokan_vendor_store_default() {
    return dokan_get_option( 'store_header_template', 'dokan_appearance', 'default' ) == 'default' && of_get_option( 'tokopress_dokan_shop_description' ) != 'no' ? true : false;
}

add_filter( 'pre_get_posts', 'tokopress_dokan_store_query_filter' );
function tokopress_dokan_store_query_filter( $q ) {
    global $wp_query;
    $custom_store_url = dokan_get_option( 'custom_store_url', 'dokan_general', 'store' );
    $author = get_query_var( $custom_store_url );
    if ( !is_admin() && $q->is_main_query() && !empty( $author ) ) {
        $q->set( 'wc_query', 'dokan_store' );
        if ( ! is_feed() ) {
            $ordering  = WC()->query->get_catalog_ordering_args();
            $q->set( 'orderby', $ordering['orderby'] );
            $q->set( 'order', $ordering['order'] );
            if ( isset( $ordering['meta_key'] ) ) {
                $q->set( 'meta_key', $ordering['meta_key'] );
            }
        }
    }
}

add_filter( 'dokan_store_widget_args', 'tokopress_dokan_store_widget_args' );
function tokopress_dokan_store_widget_args( $args ) {
    $args['class'] = 'primary-widget';
    $args['before_widget'] = '<div id="%1$s" class="widget main-widget %2$s">';
    $args['after_widget'] = '</div>';
    $args['before_title'] = '<h3 class="widget-title">';
    $args['after_title'] = '</h3>';
    return $args;
}

add_action( 'after_setup_theme', 'tokopress_dokan_setup' );
function tokopress_dokan_setup() {
    unregister_sidebar( 'sidebar-store' );
    register_sidebar( array(
        'name'          => __( 'Dokan Store Sidebar', 'tokopress' ),
        'id'            => 'sidebar-store',
        'before_widget' => '<div id="%1$s" class="widget main-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>'
    ) );
}
