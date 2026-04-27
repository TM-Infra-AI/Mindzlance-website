<?php

add_filter( 'tokopress_customize_controls', 'tokopress_customize_controls_colors_woocommerce' );
function tokopress_customize_controls_colors_woocommerce( $controls ) {

	$controls[] = array(
		'type'     => 'section',
		'setting'  => 'tokopress_colors_wc_general',
		'title'    => esc_html__( 'WooCommerce - General', 'tokopress' ),
		'panel'    => 'tokopress_colors',
		'priority' => 10,
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'heading',
		'setting'	=> 'tokopress_wc_colors_buttons_heading', 
		'label'		=> esc_html__( 'Buttons', 'tokopress' ),
		'section'	=> 'tokopress_colors_wc_general',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_wc_button_color',
		'label'		=> esc_html__( 'Default Button Color', 'tokopress' ),
		'section'	=> 'tokopress_colors_wc_general',
		'style'		=> '.woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit, .woocommerce #content input.button, .woocommerce-page a.button, .woocommerce-page button.button, .woocommerce-page input.button, .woocommerce-page #respond input#submit, .woocommerce-page #content input.button { color: [value]; } .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit, .woocommerce #content input.button, .woocommerce-page a.button, .woocommerce-page button.button, .woocommerce-page input.button, .woocommerce-page #respond input#submit, .woocommerce-page #content input.button { box-shadow: [value] 0 0px 0px 2px inset; } .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit:hover, .woocommerce #content input.button:hover, .woocommerce-page a.button:hover, .woocommerce-page button.button:hover, .woocommerce-page input.button:hover, .woocommerce-page #respond input#submit:hover, .woocommerce-page #content input.button:hover { box-shadow: [value] 0 0px 0px 40px inset; } .woocommerce div.product div.woocommerce-tabs ul.tabs li a, .woocommerce #content div.product div.woocommerce-tabs ul.tabs li a, .woocommerce-page div.product div.woocommerce-tabs ul.tabs li a, .woocommerce-page #content div.product div.woocommerce-tabs ul.tabs li a { color: [value]; } .woocommerce div.product div.woocommerce-tabs ul.tabs li, .woocommerce #content div.product div.woocommerce-tabs ul.tabs li, .woocommerce-page div.product div.woocommerce-tabs ul.tabs li, .woocommerce-page #content div.product div.woocommerce-tabs ul.tabs li { color: [value]; box-shadow: [value] 0 0px 0px 2px inset; } .woocommerce div.product div.woocommerce-tabs ul.tabs li:hover, .woocommerce #content div.product div.woocommerce-tabs ul.tabs li:hover, .woocommerce-page div.product div.woocommerce-tabs ul.tabs li:hover, .woocommerce-page #content div.product div.woocommerce-tabs ul.tabs li:hover { box-shadow: [value] 0 0px 0px 40px inset; }',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_wc_button_alt_color',
		'label'		=> esc_html__( 'Alt / Primary Button Color', 'tokopress' ),
		'section'	=> 'tokopress_colors_wc_general',
		'style'		=> '.woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit.alt, .woocommerce #content input.button.alt, .woocommerce-page a.button.alt, .woocommerce-page button.button.alt, .woocommerce-page input.button.alt, .woocommerce-page #respond input#submit.alt, .woocommerce-page #content input.button.alt { color: [value]; } .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit.alt, .woocommerce #content input.button.alt, .woocommerce-page a.button.alt, .woocommerce-page button.button.alt, .woocommerce-page input.button.alt, .woocommerce-page #respond input#submit.alt, .woocommerce-page #content input.button.alt, .wcv-button { box-shadow: [value] 0 0px 0px 2px inset; } .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce #content input.button.alt:hover, .woocommerce-page a.button.alt:hover, .woocommerce-page button.button.alt:hover, .woocommerce-page input.button.alt:hover, .woocommerce-page #respond input#submit.alt:hover, .woocommerce-page #content input.button.alt:hover, .wcv-button:hover { box-shadow: [value] 0 0px 0px 40px inset; } .woocommerce ul.products li.product .add-to-cart-loop-wrap .detail_button_loop, .woocommerce ul.products li.product .add-to-cart-loop-wrap .button[class*="product_type_"], .woocommerce ul.products li.product .add-to-cart-loop-wrap .added_to_cart.wc-forward, .woocommerce-page ul.products li.product .add-to-cart-loop-wrap .detail_button_loop, .woocommerce-page ul.products li.product .add-to-cart-loop-wrap .button[class*="product_type_"], .woocommerce-page ul.products li.product .add-to-cart-loop-wrap .added_to_cart.wc-forward, .woocommerce ul.products li.product .add-to-cart-style-2-loop-wrap .button-style-2-wrapper .added_to_cart.wc-forward, .woocommerce-page ul.products li.product .add-to-cart-style-2-loop-wrap .button-style-2-wrapper .added_to_cart.wc-forward, .woocommerce ul.products li.product .detail-action .added_to_cart.wc-forward, .woocommerce-page ul.products li.product .detail-action .added_to_cart.wc-forward, .tpvc-featured-product.woocommerce ul.products li.product .featured-action .button, .woocommerce ul.products li.product-hover-caption .product-action .button, .woocommerce-page ul.products li.product-hover-caption .product-action .button, .widget_mc4wp_widget_custom form input[type="submit"], .widget_tokopress_widget_subscribe form input[type="submit"], .post_tag-cloud a, .widget_tag_cloud a, .widget_product_tag_cloud a { color: [value]; box-shadow: [value] 0 0px 0px 2px inset; } .woocommerce ul.products li.product .add-to-cart-loop-wrap .detail_button_loop:hover, .woocommerce ul.products li.product .add-to-cart-loop-wrap .button[class*="product_type_"]:hover, .woocommerce ul.products li.product .add-to-cart-loop-wrap .added_to_cart.wc-forward:hover, .woocommerce-page ul.products li.product .add-to-cart-loop-wrap .detail_button_loop:hover, .woocommerce-page ul.products li.product .add-to-cart-loop-wrap .button[class*="product_type_"]:hover, .woocommerce-page ul.products li.product .add-to-cart-loop-wrap .added_to_cart.wc-forward:hover, .woocommerce ul.products li.product .add-to-cart-style-2-loop-wrap .button-style-2-wrapper .added_to_cart.wc-forward:hover, .woocommerce-page ul.products li.product .add-to-cart-style-2-loop-wrap .button-style-2-wrapper .added_to_cart.wc-forward:hover, .woocommerce ul.products li.product .detail-action .added_to_cart.wc-forward:hover, .woocommerce-page ul.products li.product .detail-action .added_to_cart.wc-forward:hover, .tpvc-featured-product.woocommerce ul.products li.product .featured-action .button:hover, .woocommerce ul.products li.product-hover-caption .product-action .button:hover, .woocommerce-page ul.products li.product-hover-caption .product-action .button:hover, .widget_mc4wp_widget_custom form input[type="submit"]:hover, .widget_tokopress_widget_subscribe form input[type="submit"]:hover, .post_tag-cloud a:hover, .widget_tag_cloud a:hover, .widget_product_tag_cloud a:hover { box-shadow: [value] 0 0px 0px 40px inset; } .woocommerce div.product div.woocommerce-tabs ul.tabs li.active a, .woocommerce #content div.product div.woocommerce-tabs ul.tabs li.active a, .woocommerce-page div.product div.woocommerce-tabs ul.tabs li.active a, .woocommerce-page #content div.product div.woocommerce-tabs ul.tabs li.active a { color: [value]; } .woocommerce div.product div.woocommerce-tabs ul.tabs li.active, .woocommerce #content div.product div.woocommerce-tabs ul.tabs li.active, .woocommerce-page div.product div.woocommerce-tabs ul.tabs li.active, .woocommerce-page #content div.product div.woocommerce-tabs ul.tabs li.active { box-shadow: [value] 0 0px 0px 2px inset; } .woocommerce div.product div.woocommerce-tabs ul.tabs li.active:hover, .woocommerce #content div.product div.woocommerce-tabs ul.tabs li.active:hover, .woocommerce-page div.product div.woocommerce-tabs ul.tabs li.active:hover, .woocommerce-page #content div.product div.woocommerce-tabs ul.tabs li.active:hover { box-shadow: [value] 0 0px 0px 40px inset; }',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'heading',
		'setting'	=> 'tokopress_wc_sale_flash_heading', 
		'label'		=> esc_html__( 'Sale Flash', 'tokopress' ),
		'section'	=> 'tokopress_colors_wc_general',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_wc_sale_flash_bg',
		'label'		=> esc_html__( 'Sale Flash - Background Color', 'tokopress' ),
		'section'	=> 'tokopress_colors_wc_general',
		'style'		=> '.woocommerce ul.products li.product span.onsale, .woocommerce-page ul.products li.product span.onsale, .woocommerce #content div.product span.onsale, .woocommerce div.product span.onsale, .woocommerce-page #content div.product span.onsale, .woocommerce-page div.product span.onsale { background-color: [value]; } ',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_wc_sale_flash_color',
		'label'		=> esc_html__( 'Sale Flash - Text Color', 'tokopress' ),
		'section'	=> 'tokopress_colors_wc_general',
		'style'		=> '.woocommerce ul.products li.product span.onsale, .woocommerce-page ul.products li.product span.onsale, .woocommerce #content div.product span.onsale, .woocommerce div.product span.onsale, .woocommerce-page #content div.product span.onsale, .woocommerce-page div.product span.onsale { color: [value]; } ',
	);

	$controls[] = array(
		'type'     => 'section',
		'setting'  => 'tokopress_colors_wc_shop',
		'title'    => esc_html__( 'WooCommerce - Shop Page', 'tokopress' ),
		'panel'    => 'tokopress_colors',
		'priority' => 10,
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'warning',
		'setting'	=> 'tokopress_colors_wc_shop_warning', 
		'label'		=> sprintf( esc_html__( 'You are not in %s', 'tokopress' ), esc_html__( 'Shop Page', 'tokopress' ) ),
		'description' => sprintf( esc_html__( 'These settings only affect %s. Please visit %s to see live preview for these settings.', 'tokopress' ), esc_html__( 'Shop Page', 'tokopress' ) , esc_html__( 'Shop Page', 'tokopress' ) ),
		'section'	=> 'tokopress_colors_wc_shop',
		'active_callback' => 'tokopress_wc_is_not_shop_page',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'heading',
		'setting'	=> 'tokopress_wc_catalog_order_heading', 
		'label'		=> esc_html__( 'Catalog Ordering & Result Count', 'tokopress' ),
		'section'	=> 'tokopress_colors_wc_shop',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_wc_catalog_order_bg',
		'label'		=> esc_html__( 'Background Color', 'tokopress' ),
		'section'	=> 'tokopress_colors_wc_shop',
		'style'		=> '.shop-content-top .container { background-color: [value]; }',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_wc_catalog_order_color',
		'label'		=> esc_html__( 'Result Count - Text Color', 'tokopress' ),
		'section'	=> 'tokopress_colors_wc_shop',
		'style'		=> '.woocommerce .woocommerce-result-count { color: [value]; }',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_wc_catalog_order_dropdown',
		'label'		=> esc_html__( 'Catalog Ordering - Dropdown Color', 'tokopress' ),
		'section'	=> 'tokopress_colors_wc_shop',
		'style'		=> '.woocommerce .woocommerce-ordering select { color: [value]; border-color: [value]; } ',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_wc_catalog_order_dropdown_bg',
		'label'		=> esc_html__( 'Catalog Ordering - Dropdown Background', 'tokopress' ),
		'section'	=> 'tokopress_colors_wc_shop',
		'style'		=> '.woocommerce .woocommerce-ordering select { background-color: [value]; } ',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'heading',
		'setting'	=> 'tokopress_wc_colors_product_catalog_heading', 
		'label'		=> esc_html__( 'Product Catalog / Product Loops', 'tokopress' ),
		'section'	=> 'tokopress_colors_wc_shop',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_wc_product_bg_color',
		'label'		=> esc_html__( 'Product Catalog - Background Color', 'tokopress' ),
		'section'	=> 'tokopress_colors_wc_shop',
		'style'		=> '.woocommerce ul.products li.product, .woocommerce-page ul.products li.product { background-color: [value]; } ',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_wc_product_sep',
		'label'		=> esc_html__( 'Product Catalog - Border Color', 'tokopress' ),
		'section'	=> 'tokopress_colors_wc_shop',
		'style'		=> '.woocommerce ul.products li.product .title-rating-loop-wrap, .woocommerce-page ul.products li.product .title-rating-loop-wrap { border-left-color: [value]; } ',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_wc_product_caption',
		'label'		=> esc_html__( 'Product Catalog - Image Hover Background', 'tokopress' ),
		'section'	=> 'tokopress_colors_wc_shop',
		'style'		=> '.woocommerce ul.products li.product .add-to-cart-loop-wrap, .woocommerce-page ul.products li.product .add-to-cart-loop-wrap, .woocommerce ul.products li.product-hover-caption figure figcaption, .woocommerce-page ul.products li.product-hover-caption figure figcaption { background-color: [value]; } ',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_wc_product_title_color',
		'label'		=> esc_html__( 'Product Catalog - Product Title Color', 'tokopress' ),
		'section'	=> 'tokopress_colors_wc_shop',
		'style'		=> '.woocommerce ul.products li.product h2, .woocommerce ul.products li.product h2 a, .woocommerce-page ul.products li.product h2, .woocommerce-page ul.products li.product h2 a, .woocommerce ul.products li.product h3, .woocommerce ul.products li.product h3 a, .woocommerce-page ul.products li.product h3, .woocommerce-page ul.products li.product h3 a, .woocommerce ul.products li.product-hover-caption .product-title, .woocommerce-page ul.products li.product-hover-caption .product-title { color: [value]; } ',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_wc_product_rating_active',
		'label'		=> esc_html__( 'Product Catalog - Rating Color', 'tokopress' ),
		'section'	=> 'tokopress_colors_wc_shop',
		'style'		=> '.woocommerce ul.products li.product .star-rating { color: [value]; } ',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_wc_product_price_color',
		'label'		=> esc_html__( 'Product Catalog - Price Color', 'tokopress' ),
		'section'	=> 'tokopress_colors_wc_shop',
		'style'		=> '.woocommerce ul.products li.product .price-loop-wrap .price, .woocommerce-page ul.products li.product .price-loop-wrap .price, .woocommerce ul.products li.product-hover-caption span.price, .woocommerce-page ul.products li.product-hover-caption span.price, .tpvc-featured-product.woocommerce ul.products li.product .featured-price .price, .woocommerce ul.products li.product .title-rating-loop-wrap .price, .woocommerce-page ul.products li.product .title-rating-loop-wrap .price { color: [value]; } ',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_wc_product_old_price_color',
		'label'		=> esc_html__( 'Product Catalog - Normal Price Color', 'tokopress' ),
		'section'	=> 'tokopress_colors_wc_shop',
		'style'		=> '.woocommerce ul.products li.product .price del, .woocommerce-page ul.products li.product .price del, .woocommerce ul.products li.product-hover-caption span.price del, .woocommerce-page ul.products li.product-hover-caption span.price del, .tpvc-featured-product.woocommerce ul.products li.product .featured-price .price del { color: [value]; } ',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_wc_product_color',
		'label'		=> esc_html__( 'Product Catalog - Text Color', 'tokopress' ),
		'section'	=> 'tokopress_colors_wc_shop',
		'style'		=> '.woocommerce ul.products li.product, .woocommerce-page ul.products li.product, .woocommerce ul.products li.product p, .woocommerce-page ul.products li.product p { color: [value]; } ',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_wc_product_color',
		'label'		=> esc_html__( 'Product Catalog - Link Color', 'tokopress' ),
		'section'	=> 'tokopress_colors_wc_shop',
		'style'		=> '.woocommerce ul.products li.product a, .woocommerce-page ul.products li.product a, .woocommerce ul.products li.product p a, .woocommerce-page ul.products li.product p a { color: [value]; } ',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'heading',
		'setting'	=> 'tokopress_colors_wc_shop_goto_options', 
		'label'		=> esc_html__( 'More ...', 'tokopress' ),
		'description' => '<p><span class="dashicons dashicons-admin-tools"></span> <a href="javascript:wp.customize.section( \'tokopress_options_wc_shop\' ).focus();">'.esc_html__( 'Go to Theme Options of this section', 'tokopress' ).'</a></p>',
		'section'	=> 'tokopress_colors_wc_shop',
	);

	$controls[] = array(
		'type'     => 'section',
		'setting'  => 'tokopress_colors_wc_product',
		'title'    => esc_html__( 'WooCommerce - Single Product', 'tokopress' ),
		'panel'    => 'tokopress_colors',
		'priority' => 10,
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'warning',
		'setting'	=> 'tokopress_colors_wc_product_warning', 
		'label'		=> sprintf( esc_html__( 'You are not in %s', 'tokopress' ), esc_html__( 'Single Product', 'tokopress' ) ),
		'description' => sprintf( esc_html__( 'These settings only affect %s. Please visit %s to see live preview for these settings.', 'tokopress' ), esc_html__( 'Single Product', 'tokopress' ) , esc_html__( 'Single Product', 'tokopress' ) ),
		'section'	=> 'tokopress_colors_wc_product',
		'active_callback' => 'tokopress_wc_is_not_product_page',
	);

	// $controls[] = array( 
	// 	'type' 		=> 'color',
	// 	'setting'	=> 'tokopress_wc_single_prod_star_active',
	// 	'label'		=> esc_html__( 'Product Rating Color (Filled)', 'tokopress' ),
	// 	'section'	=> 'tokopress_colors_wc_product',
	// 	'style'		=> '.woocommerce .star-rating span, .woocommerce-page .star-rating span { color: [value]; } ',
	// );

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_wc_button_single_addtocart',
		'label'		=> esc_html__( 'Single Product - Add To Cart Button Color', 'tokopress' ),
		'section'	=> 'tokopress_colors_wc_product',
		'style'		=> '.woocommerce div.product .button.alt.single_add_to_cart_button, .woocommerce #content div.product .button.alt.single_add_to_cart_button, .woocommerce-page div.product .button.alt.single_add_to_cart_button, .woocommerce-page #content div.product .button.alt.single_add_to_cart_button { background-color: [value] !important; }',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_wc_single_prod_price',
		'label'		=> esc_html__( 'Single Product - Price Color', 'tokopress' ),
		'section'	=> 'tokopress_colors_wc_product',
		'style'		=> '.woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce #content div.product p.price, .woocommerce #content div.product span.price, .woocommerce-page div.product p.price, .woocommerce-page div.product span.price, .woocommerce-page #content div.product p.price, .woocommerce-page #content div.product span.price { color: [value]; } ',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_wc_single_prod_old_price',
		'label'		=> esc_html__( 'Single Product - Normal Price Color', 'tokopress' ),
		'section'	=> 'tokopress_colors_wc_product',
		'style'		=> '.woocommerce div.product span.price del, .woocommerce div.product p.price del, .woocommerce #content div.product span.price del, .woocommerce #content div.product p.price del, .woocommerce-page div.product span.price del, .woocommerce-page div.product p.price del, .woocommerce-page #content div.product span.price del, .woocommerce-page #content div.product p.price del { color: [value]; } ',
	);

	// $controls[] = array( 
	// 	'type' 		=> 'color',
	// 	'setting'	=> 'tokopress_wc_single_prod_arrow_slider_bg',
	// 	'label'		=> esc_html__( 'Product Gallery Arrow Background Color', 'tokopress' ),
	// 	'section'	=> 'tokopress_colors_wc_product',
	// 	'style'		=> '.woocommerce div.product .product-thumbnail.product-images .owl-controls .owl-prev, .woocommerce div.product .product-thumbnail.product-images .owl-controls .owl-next, .woocommerce #content div.product .product-thumbnail.product-images .owl-controls .owl-prev, .woocommerce #content div.product .product-thumbnail.product-images .owl-controls .owl-next, .woocommerce-page div.product .product-thumbnail.product-images .owl-controls .owl-prev, .woocommerce-page div.product .product-thumbnail.product-images .owl-controls .owl-next, .woocommerce-page #content div.product .product-thumbnail.product-images .owl-controls .owl-prev, .woocommerce-page #content div.product .product-thumbnail.product-images .owl-controls .owl-next { background-color: [value]; } ',
	// );

	// $controls[] = array( 
	// 	'type' 		=> 'color',
	// 	'setting'	=> 'tokopress_wc_single_prod_arrow_slider_color',
	// 	'label'		=> esc_html__( 'Product Gallery Arrow Color', 'tokopress' ),
	// 	'section'	=> 'tokopress_colors_wc_product',
	// 	'style'		=> '.woocommerce div.product .product-thumbnail.product-images .owl-controls .owl-prev, .woocommerce div.product .product-thumbnail.product-images .owl-controls .owl-next, .woocommerce #content div.product .product-thumbnail.product-images .owl-controls .owl-prev, .woocommerce #content div.product .product-thumbnail.product-images .owl-controls .owl-next, .woocommerce-page div.product .product-thumbnail.product-images .owl-controls .owl-prev, .woocommerce-page div.product .product-thumbnail.product-images .owl-controls .owl-next, .woocommerce-page #content div.product .product-thumbnail.product-images .owl-controls .owl-prev, .woocommerce-page #content div.product .product-thumbnail.product-images .owl-controls .owl-next { color: [value]; } ',
	// );

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'heading',
		'setting'	=> 'tokopress_wc_color_related_heading', 
		'label'		=> esc_html__( 'Related Products', 'tokopress' ),
		'section'	=> 'tokopress_colors_wc_product',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_wc_related_bg',
		'label'		=> esc_html__( 'Section Title Background Color', 'tokopress' ),
		'section'	=> 'tokopress_colors_wc_product',
		'style'		=> '.woocommerce .related.products > h2, .woocommerce-page .related.products > h2 { background-color: [value]; } ',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_wc_related_color',
		'label'		=> esc_html__( 'Section Title Text Color', 'tokopress' ),
		'section'	=> 'tokopress_colors_wc_product',
		'style'		=> '.woocommerce .related.products > h2, .woocommerce-page .related.products > h2 { color: [value]; } ',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_wc_related_border_color',
		'label'		=> esc_html__( 'Section Title Border Color', 'tokopress' ),
		'section'	=> 'tokopress_colors_wc_product',
		'style'		=> '.woocommerce .related.products > h2, .woocommerce-page .related.products > h2 { border-color: [value]; } ',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'heading',
		'setting'	=> 'tokopress_wc_color_upsells_heading', 
		'label'		=> esc_html__( 'Up-Sells Products', 'tokopress' ),
		'section'	=> 'tokopress_colors_wc_product',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_wc_upsells_bg',
		'label'		=> esc_html__( 'Section Title Background Color', 'tokopress' ),
		'section'	=> 'tokopress_colors_wc_product',
		'style'		=> '.woocommerce .upsells.products > h2, .woocommerce-page .upsells.products > h2 { background-color: [value]; } ',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_wc_upsells_color',
		'label'		=> esc_html__( 'Section Title Text Color', 'tokopress' ),
		'section'	=> 'tokopress_colors_wc_product',
		'style'		=> '.woocommerce .upsells.products > h2, .woocommerce-page .upsells.products > h2 { color: [value]; } ',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_wc_upsells_border_color',
		'label'		=> esc_html__( 'Section Title Border Color', 'tokopress' ),
		'section'	=> 'tokopress_colors_wc_product',
		'style'		=> '.woocommerce .upsells.products > h2, .woocommerce-page .upsells.products > h2 { border-color: [value]; } ',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'heading',
		'setting'	=> 'tokopress_colors_wc_product_goto_options', 
		'label'		=> esc_html__( 'More ...', 'tokopress' ),
		'description' => '<p><span class="dashicons dashicons-admin-tools"></span> <a href="javascript:wp.customize.section( \'tokopress_options_wc_product\' ).focus();">'.esc_html__( 'Go to Theme Options of this section', 'tokopress' ).'</a></p>',
		'section'	=> 'tokopress_colors_wc_product',
	);

	$controls[] = array(
		'setting_type' => 'option_mod',
		'type'     => 'section',
		'setting'  => 'tokopress_colors_wc_cart',
		'title'    => esc_html__( 'WooCommerce - Cart Page', 'tokopress' ),
		'panel'    => 'tokopress_colors',
		'priority' => 10,
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'warning',
		'setting'	=> 'tokopress_options_wc_cart_warning', 
		'label'		=> sprintf( esc_html__( 'You are not in %s', 'tokopress' ), esc_html__( 'Cart Page', 'tokopress' ) ),
		'description' => sprintf( esc_html__( 'These settings only affect %s. Please visit %s to see live preview for these settings.', 'tokopress' ), esc_html__( 'Cart Page', 'tokopress' ) , esc_html__( 'Cart Page', 'tokopress' ) ),
		'section'	=> 'tokopress_colors_wc_cart',
		'active_callback' => 'tokopress_wc_is_not_cart_page',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_wc_button_cart_checkout',
		'label'		=> esc_html__( 'Checkout - Proceed To Checkout Button Color', 'tokopress' ),
		'section'	=> 'tokopress_colors_wc_cart',
		'style'		=> '.woocommerce-cart .wc-proceed-to-checkout a.checkout-button { background-color: [value] !important; }',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'heading',
		'setting'	=> 'tokopress_wc_color_crosssells_heading', 
		'label'		=> esc_html__( 'Cross-Sells Products', 'tokopress' ),
		'section'	=> 'tokopress_colors_wc_cart',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_wc_crosssells_bg',
		'label'		=> esc_html__( 'Section Title Background Color', 'tokopress' ),
		'section'	=> 'tokopress_colors_wc_cart',
		'style'		=> '.woocommerce .cart-collaterals .cross-sells > h2, .woocommerce-page .cart-collaterals .cross-sells > h2 { background-color: [value]; } ',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_wc_crosssells_color',
		'label'		=> esc_html__( 'Section Title Text Color', 'tokopress' ),
		'section'	=> 'tokopress_colors_wc_cart',
		'style'		=> '.woocommerce .cart-collaterals .cross-sells > h2, .woocommerce-page .cart-collaterals .cross-sells > h2 { color: [value]; } ',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_wc_crosssells_border_color',
		'label'		=> esc_html__( 'Section Title Border Color', 'tokopress' ),
		'section'	=> 'tokopress_colors_wc_cart',
		'style'		=> '.woocommerce .cart-collaterals .cross-sells > h2, .woocommerce-page .cart-collaterals .cross-sells > h2 { border-color: [value]; } ',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'heading',
		'setting'	=> 'tokopress_colors_wc_cart_goto_options', 
		'label'		=> esc_html__( 'More ...', 'tokopress' ),
		'description' => '<p><span class="dashicons dashicons-admin-tools"></span> <a href="javascript:wp.customize.section( \'tokopress_options_wc_cart\' ).focus();">'.esc_html__( 'Go to Theme Options of this section', 'tokopress' ).'</a></p>',
		'section'	=> 'tokopress_colors_wc_cart',
	);

	$controls[] = array(
		'setting_type' => 'option_mod',
		'type'     => 'section',
		'setting'  => 'tokopress_colors_wc_checkout',
		'title'    => esc_html__( 'WooCommerce - Checkout Page', 'tokopress' ),
		'panel'    => 'tokopress_colors',
		'priority' => 10,
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'warning',
		'setting'	=> 'tokopress_options_wc_checkout_warning', 
		'label'		=> sprintf( esc_html__( 'You are not in %s', 'tokopress' ), esc_html__( 'Checkout Page', 'tokopress' ) ),
		'description' => sprintf( esc_html__( 'These settings only affect %s. Please visit %s to see live preview for these settings.', 'tokopress' ), esc_html__( 'Checkout Page', 'tokopress' ) , esc_html__( 'Checkout Page', 'tokopress' ) ),
		'section'	=> 'tokopress_colors_wc_checkout',
		'active_callback' => 'tokopress_wc_is_not_checkout_page',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_wc_button_checkout_payment',
		'label'		=> esc_html__( 'Checkout - Place Order Button Color', 'tokopress' ),
		'section'	=> 'tokopress_colors_wc_checkout',
		'style'		=> '.woocommerce #payment #place_order, .woocommerce-page #payment #place_order { background-color: [value] !important; }',
	);

	return $controls;
}
