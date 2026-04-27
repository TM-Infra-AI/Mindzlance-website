<?php 

add_filter( 'tokopress_customize_google_fonts', 'tokopress_customize_google_fonts_filter' );
function tokopress_customize_google_fonts_filter( $value ) {
	$value['Merriweather Sans'] = 'Merriweather Sans';
	$value['Maven Pro'] = 'Maven Pro';
	return $value;
}

add_action( 'customize_register', 'tokopress_customize_reposition_colors', 20 );
function tokopress_customize_reposition_colors( $wp_customize ) {
	$wp_customize->get_section( 'colors' )->panel = 'tokopress_colors';	
	$wp_customize->get_section( 'colors' )->priority = 7;
	$wp_customize->get_section( 'colors' )->title = esc_html__( 'Basic Colors', 'tokopress' );

	$wp_customize->get_section( 'background_image' )->title = __( 'Background', 'tokopress' );
	$wp_customize->get_control( 'background_color' )->section = 'background_image';

	$wp_customize->remove_control('header_textcolor');
}

add_filter( 'tokopress_customize_controls', 'tokopress_customize_controls_colors_panel' );
function tokopress_customize_controls_colors_panel( $controls ) {

	$controls[] = array(
		'type'     => 'panel',
		'setting'  => 'tokopress_colors',
		'title'    => esc_html__( 'TP - Fonts & Colors', 'tokopress' ),
		'priority' => 21,
	);

	return $controls;
}

add_filter( 'tokopress_customize_controls', 'tokopress_customize_controls_colors_fonts' );
function tokopress_customize_controls_colors_fonts( $controls ) {

	$controls[] = array(
		'type'     => 'section',
		'setting'  => 'tokopress_fonts',
		'title'    => esc_html__( 'Basic Fonts', 'tokopress' ),
		'description' => '',
		'panel'    => 'tokopress_colors',
		'priority' => 5,
	);

	$controls[] = array(
		'type'     => 'font',
		'setting'  => 'tokopress_font_body', 
		'default'  => '', 
		'label'    => esc_html__( 'Primary Font', 'tokopress' ),
		'section'  => 'tokopress_fonts',
		'selector' => 'body,input[type=text],input[type=password],input[type=email],textarea,.blog-list .entry-content .blog-title a,.blog-single .entry-content .blog-title a,.page .entry-content .blog-title a,.widget .widget-title,.woocommerce ul.products li.product h3,.woocommerce-page ul.products li.product h3,.tpvc-feature .feature-title,.tpvc-call-to-action .call-wrapper .call-paragraf .call-title, .widget .sub-category .sub-block h3',
	);

	$controls[] = array(
		'type'     => 'font',
		'setting'  => 'tokopress_font_heading', 
		'default'  => '', 
		'label'    => esc_html__( 'Secondary Font', 'tokopress' ),
		'section'  => 'tokopress_fonts',
		'selector' => 'h1,h2,h3,h4,h5,.button,#submit,.site-header .site-logo .logo-text,.site-header .header-menu li a,.site-navigation ul li a,.post_tag-cloud a,.widget_tag_cloud a,.widget_product_tag_cloud a,.woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit, .woocommerce #content input.button,.woocommerce-page a.button,.woocommerce-page button.button,.woocommerce-page input.button,.woocommerce-page #respond input#submit,.woocommerce-page #content input.button,.woocommerce ul.products li.product-hover-caption .product-title,.woocommerce-page ul.products li.product-hover-caption .product-title,.woocommerce div.product .wc-main-content-right ul.list-item-details, .woocommerce #content div.product .wc-main-content-right ul.list-item-details,.woocommerce-page div.product .wc-main-content-right ul.list-item-details,.woocommerce-page #content div.product .wc-main-content-right ul.list-item-details,.woocommerce div.product .wc-main-content-right .product_meta, .woocommerce #content div.product .wc-main-content-right .product_meta,.woocommerce-page div.product .wc-main-content-right .product_meta,.woocommerce-page #content div.product .wc-main-content-right .product_meta,.woocommerce div.product div.woocommerce-tabs ul.tabs li, .woocommerce #content div.product div.woocommerce-tabs ul.tabs li,.woocommerce-page div.product div.woocommerce-tabs ul.tabs li,.woocommerce-page #content div.product div.woocommerce-tabs ul.tabs li,.mv_submit,.mv_delete_app',
	);

	return $controls;
}

add_filter( 'tokopress_customize_controls', 'tokopress_customize_controls_colors_basic' );
function tokopress_customize_controls_colors_basic( $controls ) {

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_body_color',
		'label'		=> esc_html__( 'Body Text Color', 'tokopress' ),
		'section'	=> 'colors',
		'style'		=> 'body { color: [value]; }',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_link_color',
		'label'		=> esc_html__( 'Link Color', 'tokopress' ),
		'section'	=> 'colors',
		'style'		=> 'a { color: [value]; }',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'heading',
		'setting'	=> 'tokopress_colors_blog_heading', 
		'label'		=> esc_html__( 'Blog', 'tokopress' ),
		'section'	=> 'colors',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_blog_title_color',
		'label'		=> esc_html__( 'Blog - Post Title Color', 'tokopress' ),
		'section'	=> 'colors',
		'style'		=> '.blog-list .entry-content .blog-title a, .blog-list .entry-content .blog-title:before { color: [value]; }',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_blog_meta_color',
		'label'		=> esc_html__( 'Blog - Post Meta Text Color', 'tokopress' ),
		'section'	=> 'colors',
		'style'		=> '.blog-list .entry-meta { color: [value]; }',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_blog_meta_link color',
		'label'		=> esc_html__( 'Blog - Post Meta Link Color', 'tokopress' ),
		'section'	=> 'colors',
		'style'		=> '.blog-list .entry-meta a { color: [value]; }',
	);

	// $controls[] = array( 
	// 	'setting_type' => 'option_mod',
	// 	'type' 		=> 'heading',
	// 	'setting'	=> 'tokopress_colors_section_title_heading', 
	// 	'label'		=> esc_html__( 'Section Title', 'tokopress' ),
	// 	'section'	=> 'colors',
	// );

	// $controls[] = array( 
	// 	'type' 		=> 'color',
	// 	'setting'	=> 'tokopress_section_title_color',
	// 	'label'		=> esc_html__( 'Section Title - Text Color', 'tokopress' ),
	// 	'section'	=> 'colors',
	// 	'style'		=> '.section-title, .blog-single #respond #reply-title, #respond #reply-title, .woocommerce .cart-collaterals .cross-sells > h2, .woocommerce-page .cart-collaterals .cross-sells > h2, .woocommerce .checkout .woocommerce-billing-fields h3, .woocommerce-page .checkout .woocommerce-billing-fields h3, .woocommerce .checkout .woocommerce-shipping-fields h3, .woocommerce-page .checkout .woocommerce-shipping-fields h3, .woocommerce .checkout #order_review_heading, .woocommerce-page .checkout #order_review_heading, .woocommerce .upsells.products > h2, .woocommerce .related.products > h2, .woocommerce-page .upsells.products > h2, .woocommerce-page .related.products > h2, .woocommerce div.product div.woocommerce-tabs .panel h2, .woocommerce div.product div.woocommerce-tabs .panel h3, .woocommerce #content div.product div.woocommerce-tabs .panel h2, .woocommerce #content div.product div.woocommerce-tabs .panel h3, .woocommerce-page div.product div.woocommerce-tabs .panel h2, .woocommerce-page div.product div.woocommerce-tabs .panel h3, .woocommerce-page #content div.product div.woocommerce-tabs .panel h2, .woocommerce-page #content div.product div.woocommerce-tabs .panel h3, .tpvc-mini-product.woocommerce .tpvc-title h1, .tpvc-mini-product.woocommerce .tpvc-title h2, .tpvc-heading .heading-title { color: [value]; }',
	// );

	// $controls[] = array( 
	// 	'type' 		=> 'color',
	// 	'setting'	=> 'tokopress_section_title_icon_color',
	// 	'label'		=> esc_html__( 'Section Title - Icon Color', 'tokopress' ),
	// 	'section'	=> 'colors',
	// 	'style'		=> '.commentlist .section-title:before, .commentlist #respond #reply-title:before, #respond .commentlist #reply-title:before, .woocommerce .checkout .woocommerce-billing-fields h3:before, .woocommerce-page .checkout .woocommerce-billing-fields h3:before, .woocommerce .checkout .woocommerce-shipping-fields h3:before, .woocommerce-page .checkout .woocommerce-shipping-fields h3:before, .woocommerce .checkout #order_review_heading:before, .woocommerce-page .checkout #order_review_heading:before, #respond .section-title:before, .blog-single #respond #reply-title:before, #respond #reply-title:before, .tpvc-mini-product.woocommerce .tpvc-title h1 i, .tpvc-mini-product.woocommerce .tpvc-title h2 i, .tpvc-heading .heading-title i { color: [value]; }',
	// );

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'heading',
		'setting'	=> 'tokopress_colors_pagination_heading', 
		'label'		=> esc_html__( 'Pagination', 'tokopress' ),
		'section'	=> 'colors',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_pagination_link_color',
		'label'		=> esc_html__( 'Pagination - Link Color', 'tokopress' ),
		'section'	=> 'colors',
		'style'		=> '.pagination a.page-numbers { color: [value] !important; } .pagination a.page-numbers { box-shadow: [value] 0 0px 0px 2px inset; } .pagination a.page-numbers:hover { box-shadow: [value] 0 0px 0px 40px inset; }',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_pagination_active_color',
		'label'		=> esc_html__( 'Pagination - Active Color', 'tokopress' ),
		'section'	=> 'colors',
		'style'		=> '.pagination .current { color: [value]; } .pagination .current { box-shadow: [value] 0 0px 0px 2px inset; }',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'heading',
		'setting'	=> 'tokopress_colors_table_heading', 
		'label'		=> esc_html__( 'Table', 'tokopress' ),
		'section'	=> 'colors',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_table_thead_bg',
		'label'		=> esc_html__( 'Table - Heading Background Color', 'tokopress' ),
		'section'	=> 'colors',
		'style'		=> 'table thead, .woocommerce .shop_table thead, .woocommerce-page .shop_table thead, .woocommerce .checkout #order_review .shop_table .order-total, .woocommerce-page .checkout #order_review .shop_table .order-total { background: [value]; }',
	);

	return $controls;
}


add_filter( 'tokopress_customize_controls', 'tokopress_customize_controls_colors_headertop' );
function tokopress_customize_controls_colors_headertop( $controls ) {

	$controls[] = array(
		'type'     => 'section',
		'setting'  => 'tokopress_colors_headertop',
		'title'    => esc_html__( 'Header - Top (Logo & Menu)', 'tokopress' ),
		'panel'    => 'tokopress_colors',
		'priority' => 10
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_head_bg',
		'label'		=> esc_html__( 'Header - Background Color', 'tokopress' ),
		'section'	=> 'tokopress_colors_headertop',
		'style'		=> '.site-header, .site-header .header-right, .site-header .header-menu li .sub-menu, .site-header .quicknav-account .account-menu, .site-header .quicknav-lang #lang-menu-chooser { background-color: [value]; }',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'heading',
		'setting'	=> 'tokopress_colors_site_logo_heading', 
		'label'		=> esc_html__( 'Site Logo', 'tokopress' ),
		'section'	=> 'tokopress_colors_headertop',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_head_logo_bg',
		'label'		=> esc_html__( 'Logo - Background Color', 'tokopress' ),
		'section'	=> 'tokopress_colors_headertop',
		'style'		=> '.site-header .site-logo { background-color: [value]; }',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_head_logo_text_color',
		'label'		=> esc_html__( 'Logo - Text Color', 'tokopress' ),
		'section'	=> 'tokopress_colors_headertop',
		'style'		=> '.site-header .site-logo a { color: [value] !important; }',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'heading',
		'setting'	=> 'tokopress_colors_primary_menu_heading', 
		'label'		=> esc_html__( 'Primary Menu / Header Menu', 'tokopress' ),
		'section'	=> 'tokopress_colors_headertop',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_head_primary_color',
		'label'		=> esc_html__( 'Primary Menu - Text Color', 'tokopress' ),
		'section'	=> 'tokopress_colors_headertop',
		'style'		=> '.site-header .header-menu li a, .site-header .header-right a, .site-header .header-right-search a, .site-header .search-form .search-field, .site-header .quicknav-account .account-menu li a, .site-header .quicknav-lang #lang-menu-chooser li a { color: [value]; } .site-header .search-form .search-field::-webkit-input-placeholder { color: [value]; } .site-header .search-form .search-field::-moz-placeholder { color: [value]; } .site-header .search-form .search-field:-ms-input-placeholder { color: [value]; }',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_head_primary_color_hover',
		'label'		=> esc_html__( 'Primary Menu - Text Color (Hover)', 'tokopress' ),
		'section'	=> 'tokopress_colors_headertop',
		'style'		=> '.site-header .header-menu li a:hover, .site-header .header-right a:hover, .site-header .header-right-search a:hover, .site-header .quicknav-account .account-menu li a:hover, .site-header .quicknav-lang #lang-menu-chooser li a:hover { color: [value]; }',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'heading',
		'setting'	=> 'tokopress_colors_minicart_heading', 
		'label'		=> esc_html__( 'Minicart Quicknav', 'tokopress' ),
		'section'	=> 'tokopress_colors_headertop',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_head_cart_bg',
		'label'		=> esc_html__( 'Minicart Quicknav - Background', 'tokopress' ),
		'section'	=> 'tokopress_colors_headertop',
		'style'		=> '.site-header .quicknav-cart { background-color: [value]; }',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_head_cart_color_icon',
		'label'		=> esc_html__( 'Minicart Quicknav - Icon Color', 'tokopress' ),
		'section'	=> 'tokopress_colors_headertop',
		'style'		=> '.site-header .quicknav-cart .quicknav-icon { color: [value]; }',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_head_cart_color_text',
		'label'		=> esc_html__( 'Minicart Quicknav - Text Color', 'tokopress' ),
		'section'	=> 'tokopress_colors_headertop',
		'style'		=> '.site-header .quicknav-cart .cart-subtotal { color: [value]; }',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'heading',
		'setting'	=> 'tokopress_colors_secondary_menu_heading', 
		'label'		=> esc_html__( 'Secondary Menu / Below Header Menu', 'tokopress' ),
		'section'	=> 'tokopress_colors_headertop',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_head_secondary_bg',
		'label'		=> esc_html__( 'Secondary Menu - Background', 'tokopress' ),
		'section'	=> 'tokopress_colors_headertop',
		'style'		=> '.site-navigation-wrap, .site-navigation-megamenu-wrap, .site-navigation, .site-navigation ul li .sub-menu li a, .hideshow ul { background-color: [value]; } .site-navigation .site-navigation-menu > li, .hideshow ul { border-color: [value]; }',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_head_secondary_color',
		'label'		=> esc_html__( 'Secondary Menu - Text Color', 'tokopress' ),
		'section'	=> 'tokopress_colors_headertop',
		'style'		=> '.site-navigation ul li a { color: [value]; }',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_head_secondary_border',
		'label'		=> esc_html__( 'Secondary Menu - Border Color', 'tokopress' ),
		'section'	=> 'tokopress_colors_headertop',
		'style'		=> '.site-navigation ul li .sub-menu, .site-navigation ul li .sub-menu li ul, .site-navigation .site-navigation-menu > li:hover, .site-navigation .site-navigation-menu > li.current-menu-item { border-color: [value]; }',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_head_secondary_bg_submenu_hover',
		'label'		=> esc_html__( 'Secondary Menu - Submenu Background (Hover)', 'tokopress' ),
		'section'	=> 'tokopress_colors_headertop',
		'style'		=> '.site-navigation ul li .sub-menu li:hover a { background-color: [value]; }',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'heading',
		'setting'	=> 'tokopress_colors_headertop_goto_options', 
		'label'		=> esc_html__( 'More ...', 'tokopress' ),
		'description' => '<p><span class="dashicons dashicons-admin-tools"></span> <a href="javascript:wp.customize.section( \'tokopress_options_headertop\' ).focus();">'.esc_html__( 'Go to Theme Options of this section', 'tokopress' ).'</a></p>',
		'section'	=> 'tokopress_colors_headertop',
	);

	return $controls;
}

add_filter( 'tokopress_customize_controls', 'tokopress_customize_controls_colors_pageheader' );
function tokopress_customize_controls_colors_pageheader( $controls ) {

	$controls[] = array(
		'type'     => 'section',
		'setting'  => 'tokopress_colors_pageheader',
		'title'    => esc_html__( 'Header - Page Header', 'tokopress' ),
		'panel'    => 'tokopress_colors',
		'priority' => 10,
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'heading',
		'setting'	=> 'tokopress_colors_page_title_heading', 
		'label'		=> esc_html__( 'Page Title', 'tokopress' ),
		'section'	=> 'tokopress_colors_pageheader',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_page_title_bg',
		'label'		=> esc_html__( 'Page Title - Background Color', 'tokopress' ),
		'section'	=> 'tokopress_colors_pageheader',
		'style'		=> '.page-header { background-color: [value]; }',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_page_title_color',
		'label'		=> esc_html__( 'Page Title - Text Color', 'tokopress' ),
		'section'	=> 'tokopress_colors_pageheader',
		'style'		=> '.page-header .page-title { color: [value]; }',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'heading',
		'setting'	=> 'tokopress_colors_breadcrumb_heading', 
		'label'		=> esc_html__( 'Breadcrumb', 'tokopress' ),
		'section'	=> 'tokopress_colors_pageheader',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_breadcrumb_color',
		'label'		=> esc_html__( 'Breadcrumb - Text Color', 'tokopress' ),
		'section'	=> 'tokopress_colors_pageheader',
		'style'		=> '.breadcrumbs { color: [value]; }',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_breadcrumb_link_color',
		'label'		=> esc_html__( 'Breadcrumb - Link Color', 'tokopress' ),
		'section'	=> 'tokopress_colors_pageheader',
		'style'		=> '.breadcrumbs a { color: [value]; }',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_breadcrumb_sep_color',
		'label'		=> esc_html__( 'Breadcrumb - Separator Color', 'tokopress' ),
		'section'	=> 'tokopress_colors_pageheader',
		'style'		=> '.breadcrumbs i { color: [value]; }',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'heading',
		'setting'	=> 'tokopress_colors_pageheader_goto_options', 
		'label'		=> esc_html__( 'More ...', 'tokopress' ),
		'description' => '<p><span class="dashicons dashicons-admin-tools"></span> <a href="javascript:wp.customize.section( \'header_image\' ).focus();">'.esc_html__( 'Go to Theme Options of this section', 'tokopress' ).'</a></p>',
		'section'	=> 'tokopress_colors_pageheader',
	);

	return $controls;
}

add_filter( 'tokopress_customize_controls', 'tokopress_customize_controls_colors_sidebar' );
function tokopress_customize_controls_colors_sidebar( $controls ) {

	$controls[] = array(
		'setting_type' => 'option_mod',
		'type'     => 'section',
		'setting'  => 'tokopress_colors_sidebar',
		'title'    => esc_html__( 'Sidebar', 'tokopress' ),
		'panel'    => 'tokopress_colors',
		'priority' => 10,
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'warning',
		'setting'	=> 'tokopress_colors_sidebar_warning', 
		'label'		=> '',
		'description' => sprintf( esc_html__( 'These settings only affect %s. Please visit %s to see live preview for these settings.', 'tokopress' ), esc_html__( 'a page with sidebar', 'tokopress' ) , esc_html__( 'a page with sidebar', 'tokopress' ) ),
		'section'	=> 'tokopress_colors_sidebar',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_sidebar_bg',
		'label'		=> esc_html__( 'Sidebar - Background Color', 'tokopress' ),
		'section'	=> 'tokopress_colors_sidebar',
		'style'		=> '#sidebar { background-color: [value]; }',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'heading',
		'setting'	=> 'tokopress_colors_sidebar_widgets_heading', 
		'label'		=> esc_html__( 'Sidebar Widgets', 'tokopress' ),
		'section'	=> 'tokopress_colors_sidebar',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_widget_title_color',
		'label'		=> esc_html__( 'Sidebar Widgets - Title Color', 'tokopress' ),
		'section'	=> 'tokopress_colors_sidebar',
		'style'		=> '#sidebar .widget .widget-title { color: [value]; }',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_widget_color',
		'label'		=> esc_html__( 'Sidebar Widgets - Text Color', 'tokopress' ),
		'section'	=> 'tokopress_colors_sidebar',
		'style'		=> '#sidebar, #sidebar p { color: [value]; }',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_widget_link_color',
		'label'		=> esc_html__( 'Sidebar Widgets - Link Color', 'tokopress' ),
		'section'	=> 'tokopress_colors_sidebar',
		'style'		=> '#sidebar a { color: [value]; }',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_widget_line_color',
		'label'		=> esc_html__( 'Sidebar Widgets - List Line Separator Color', 'tokopress' ),
		'section'	=> 'tokopress_colors_sidebar',
		'style'		=> '#sidebar .widget ul, #sidebar .widget ul li { border-color: [value] !important; }',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'heading',
		'setting'	=> 'tokopress_colors_statistic_widget_heading', 
		'label'		=> esc_html__( 'Statistisc Widget', 'tokopress' ),
		'section'	=> 'tokopress_colors_sidebar',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_widget_stat_number_color',
		'label'		=> esc_html__( 'Statistic Widget - Number Color', 'tokopress' ),
		'section'	=> 'tokopress_colors_sidebar',
		'style'		=> '.widget_widget_statistic .widget-statistic .market-members .statistic, .widget_widget_statistic .widget-statistic .market-sellers .statistic, .widget_widget_statistic .widget-statistic .market-items .statistic, .widget_tokopress_widget_statistics .widget-statistic .market-members .statistic, .widget_tokopress_widget_statistics .widget-statistic .market-sellers .statistic, .widget_tokopress_widget_statistics .widget-statistic .market-items .statistic { color: [value] !important; }',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'heading',
		'setting'	=> 'tokopress_colors_sidebar_goto_options', 
		'label'		=> esc_html__( 'More ...', 'tokopress' ),
		'description' => '<p><span class="dashicons dashicons-admin-tools"></span> <a href="javascript:wp.customize.section( \'tokopress_options_sidebar\' ).focus();">'.esc_html__( 'Go to Theme Options of this section', 'tokopress' ).'</a></p>',
		'section'	=> 'tokopress_colors_sidebar',
	);

	return $controls;
}

add_filter( 'tokopress_customize_controls', 'tokopress_customize_controls_colors_footerwidgets' );
function tokopress_customize_controls_colors_footerwidgets( $controls ) {

	$controls[] = array(
		'type'     => 'section',
		'setting'  => 'tokopress_colors_footerwidgets',
		'title'    => esc_html__( 'Footer - Widgets', 'tokopress' ),
		'panel'    => 'tokopress_colors',
		'priority' => 10,
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_footer_widget_bg',
		'label'		=> esc_html__( 'Footer Widgets - Background Color', 'tokopress' ),
		'section'	=> 'tokopress_colors_footerwidgets',
		'style'		=> '#footer { background-color: [value]; }',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_footer_widget_title_color',
		'label'		=> esc_html__( 'Footer Widgets - Title Color', 'tokopress' ),
		'section'	=> 'tokopress_colors_footerwidgets',
		'style'		=> '#footer .widget .widget-title { color: [value]; }',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_footer_widget_color',
		'label'		=> esc_html__( 'Footer Widgets - Text Color', 'tokopress' ),
		'section'	=> 'tokopress_colors_footerwidgets',
		'style'		=> '#footer, #footer p { color: [value] !important; }',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_footer_widget_link_color',
		'label'		=> esc_html__( 'Footer Widgets - Link Color', 'tokopress' ),
		'section'	=> 'tokopress_colors_footerwidgets',
		'style'		=> '#footer a { color: [value]; }',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_footer_widget_line_color',
		'label'		=> esc_html__( 'Footer Widgets - List Line Separator Color', 'tokopress' ),
		'section'	=> 'tokopress_colors_footerwidgets',
		'style'		=> '#footer .widget ul, #footer .widget ul li { border-color: [value] !important; }',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_footer_widget_border_sep_color',
		'label'		=> esc_html__( 'Footer Widgets - Border Separator Color', 'tokopress' ),
		'section'	=> 'tokopress_colors_footerwidgets',
		'style'		=> '.footer-widgets { border-right-color: [value]; }',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_footer_widget_border_top_color',
		'label'		=> esc_html__( 'Footer Widgets - Border Top Color', 'tokopress' ),
		'section'	=> 'tokopress_colors_footerwidgets',
		'style'		=> '.footer-widgets { border-top: 1px solid [value]; }',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'heading',
		'setting'	=> 'tokopress_colors_footerwidgets_goto_options', 
		'label'		=> esc_html__( 'More ...', 'tokopress' ),
		'description' => '<p><span class="dashicons dashicons-admin-tools"></span> <a href="javascript:wp.customize.section( \'tokopress_options_footerwidgets\' ).focus();">'.esc_html__( 'Go to Theme Options of this section', 'tokopress' ).'</a></p><p><span class="dashicons dashicons-admin-generic"></span> <a href="javascript:wp.customize.panel( \'widgets\' ).focus();">'.esc_html__( 'Setup Footer Widgets', 'tokopress' ).'</a></p>',
		'section'	=> 'tokopress_colors_footerwidgets',
	);

	return $controls;
}

add_filter( 'tokopress_customize_controls', 'tokopress_customize_controls_colors_footercredits' );
function tokopress_customize_controls_colors_footercredits( $controls ) {

	$controls[] = array(
		'type'     => 'section',
		'setting'  => 'tokopress_colors_footercredits',
		'title'    => esc_html__( 'Footer - Credits', 'tokopress' ),
		'panel'    => 'tokopress_colors',
		'priority' => 10,
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_footer_credit_bg',
		'label'		=> esc_html__( 'Footer Credits - Background Color', 'tokopress' ),
		'section'	=> 'tokopress_colors_footercredits',
		'style'		=> '.footer-credits { background-color: [value]; }',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_footer_credit_color',
		'label'		=> esc_html__( 'Footer Credits - Text Color', 'tokopress' ),
		'section'	=> 'tokopress_colors_footercredits',
		'style'		=> '.footer-credits .copyright { color: [value]; }',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_footer_credit_link_color',
		'label'		=> esc_html__( 'Footer Credits - Link Color', 'tokopress' ),
		'section'	=> 'tokopress_colors_footercredits',
		'style'		=> '.footer-credits .copyright a { color: [value]; }',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'heading',
		'setting'	=> 'tokopress_colors_footercredits_goto_options', 
		'label'		=> esc_html__( 'More ...', 'tokopress' ),
		'description' => '<p><span class="dashicons dashicons-admin-tools"></span> <a href="javascript:wp.customize.section( \'tokopress_options_footercredits\' ).focus();">'.esc_html__( 'Go to Theme Options of this section', 'tokopress' ).'</a></p>',
		'section'	=> 'tokopress_colors_footercredits',
	);

	return $controls;
}

add_filter( 'tokopress_customize_controls', 'tokopress_customize_controls_colors_backtotop' );
function tokopress_customize_controls_colors_backtotop( $controls ) {

	$controls[] = array(
		'type'     => 'section',
		'setting'  => 'tokopress_colors_backtotop',
		'title'    => esc_html__( 'Footer - Back To Top', 'tokopress' ),
		'panel'    => 'tokopress_colors',
		'priority' => 10,
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_footer_backtotop_bg',
		'label'		=> esc_html__( 'Back To Top - Background Color', 'tokopress' ),
		'section'	=> 'tokopress_colors_backtotop',
		'style'		=> '#back-top { background-color: [value]; }',
	);

	$controls[] = array( 
		'type' 		=> 'color',
		'setting'	=> 'tokopress_footer_backtotop_color',
		'label'		=> esc_html__( 'Back To Top - Icon Color', 'tokopress' ),
		'section'	=> 'tokopress_colors_backtotop',
		'style'		=> '#back-top { color: [value]; }',
	);

	return $controls;
}
