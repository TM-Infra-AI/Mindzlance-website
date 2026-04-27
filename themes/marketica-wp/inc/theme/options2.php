<?php 

add_filter( 'tokopress_customize_setting_db', 'tokopress_customize_setting_db_filter' );
function tokopress_customize_setting_db_filter( $value ) {
	return THEME_NAME;
}

add_filter( 'tokopress_customize_assets_uri', 'tokopress_customize_assets_uri_filter' );
function tokopress_customize_assets_uri_filter( $value ) {
	return get_template_directory_uri();
}

add_action( 'customize_register', 'tokopress_customize_reposition_options', 20 );
function tokopress_customize_reposition_options( $wp_customize ) {
	$title = $wp_customize->get_section( 'title_tagline' )->title;
	$wp_customize->get_section( 'title_tagline' )->title = $title.' &amp; '.esc_html__( 'Favicon', 'tokopress' );

	$site_icon = $wp_customize->get_control( 'site_icon' )->label;
	$wp_customize->get_control( 'site_icon' )->label = $site_icon.' / '.esc_html__( 'Favicon', 'tokopress' );

	$wp_customize->remove_control('display_header_text');

	$wp_customize->get_section( 'header_image' )->panel = 'tokopress_options';	
	$wp_customize->get_section( 'header_image' )->priority = 5;
	$wp_customize->get_section( 'header_image' )->title = esc_html__( 'Header - Page Header', 'tokopress' );
}

add_filter( 'tokopress_customize_controls', 'tokopress_customize_controls_options_panels' );
function tokopress_customize_controls_options_panels( $controls ) {

	$controls[] = array(
		'setting_type' => 'option_mod',
		'type'     => 'panel',
		'setting'  => 'tokopress_options',
		'title'    => esc_html__( 'TP - Theme Options', 'tokopress' ),
		'priority' => 22,
	);

	$controls[] = array(
		'setting_type' => 'option_mod',
		'type'     => 'panel',
		'setting'  => 'tokopress_pagetemplates',
		'title'    => esc_html__( 'TP - Page Templates', 'tokopress' ),
		'priority' => 23,
	);

	return $controls;
}

add_filter( 'tokopress_customize_controls', 'tokopress_customize_controls_options_headertop' );
function tokopress_customize_controls_options_headertop( $controls ) {

	$controls[] = array(
		'setting_type' => 'option_mod',
		'type'     => 'section',
		'setting'  => 'tokopress_options_headertop',
		'title'    => esc_html__( 'Header - Top (Logo & Menu)', 'tokopress' ),
		'panel'    => 'tokopress_options',
		'priority' => 3,
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'heading',
		'setting'	=> 'tokopress_sticky_header_heading', 
		'label'		=> esc_html__( 'Sticky Header', 'tokopress' ),
		'section'	=> 'tokopress_options_headertop',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'checkbox',
		'setting'	=> 'tokopress_sticky_header', 
		'label'		=> esc_html__( 'ENABLE sticky header', 'tokopress' ),
		'section'	=> 'tokopress_options_headertop',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'heading',
		'setting'	=> 'tokopress_site_logo_heading', 
		'label'		=> esc_html__( 'Site Logo', 'tokopress' ),
		'section'	=> 'tokopress_options_headertop',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'image',
		'setting'	=> 'tokopress_site_logo', 
		'label'		=> esc_html__( 'Site Logo', 'tokopress' ),
		'section'	=> 'tokopress_options_headertop',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'radio-buttonset',
		'setting'	=> 'tokopress_site_logo_h',
		'label'		=> esc_html__( 'Site Logo - Height (px)', 'tokopress' ),
		'section'	=> 'tokopress_options_headertop',
		'default'	=> '30',
	    'choices' => array(
		    '30' => '30px',
		    '60' => '60px',
		    '90' => '90px',
		),
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'radio-buttonset',
		'setting'	=> 'tokopress_site_logo_w',
		'label'		=> esc_html__( 'Site Logo - Maximum Width (px)', 'tokopress' ),
		'section'	=> 'tokopress_options_headertop',
		'default'	=> '200',
	    'choices' => array(
		    '200' => '200px',
		    '250' => '250px',
		),
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'heading',
		'setting'	=> 'tokopress_quicknav_heading', 
		'label'		=> esc_html__( 'Quick Navigation', 'tokopress' ),
		'section'	=> 'tokopress_options_headertop',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'checkbox',
		'setting'	=> 'tokopress_wc_disable_search', 
		'label'		=> esc_html__( 'DISABLE search quicknav', 'tokopress' ),
		'section'	=> 'tokopress_options_headertop',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'checkbox',
		'setting'	=> 'tokopress_wc_disable_link_account',
		'label'		=> esc_html__( 'DISABLE account quicknav', 'tokopress' ),
		'section'	=> 'tokopress_options_headertop',
	);

	if ( function_exists( 'qtranxf_generateLanguageSelectCode' ) || function_exists( 'icl_get_languages' ) ) {
		if ( function_exists( 'qtranxf_generateLanguageSelectCode' ) ) {
			$label = esc_html__( 'ENABLE language selector quicknav for QTranslateX', 'tokopress' );
		}
		elseif ( function_exists( 'icl_get_languages' ) ) {
			$label = esc_html__( 'ENABLE language selector quicknav for WPML', 'tokopress' );
		}
		$controls[] = array( 
			'setting_type' => 'option_mod',
			'type' 		=> 'checkbox',
			'setting'	=> 'tokopress_wc_enable_lang_selector',
			'label'		=> $label,
			'section'	=> 'tokopress_options_headertop',
		);
	}

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'checkbox',
		'setting'	=> 'tokopress_wc_disable_mini_cart',
		'label'		=> esc_html__( 'DISABLE minicart quicknav', 'tokopress' ),
		'section'	=> 'tokopress_options_headertop',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'heading',
		'setting'	=> 'tokopress_options_headertop_goto_colors', 
		'label'		=> esc_html__( 'More ...', 'tokopress' ),
		'description' => '<p><span class="dashicons dashicons-admin-appearance"></span> <a href="javascript:wp.customize.section( \'tokopress_colors_headertop\' ).focus();">'.esc_html__( 'Go to Theme Colors of this section', 'tokopress' ).'</a></p>',
		'section'	=> 'tokopress_options_headertop',
	);

	return $controls;
}

add_filter( 'tokopress_customize_controls', 'tokopress_customize_controls_options_headerpagetitle' );
function tokopress_customize_controls_options_headerpagetitle( $controls ) {

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'radio-buttonset',
		'setting'	=> 'tokopress_page_header_style',
		'label'		=> esc_html__( 'Page Header Style', 'tokopress' ),
		'section'	=> 'header_image',
		'default'	=> 'inner',
	    'choices' => array(
		    'inner' => esc_html__( 'Inner / Content', 'tokopress' ),
		    'outer' => esc_html__( 'Outer / Header', 'tokopress' ),
		),
		'priority' => 5,
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'heading',
		'setting'	=> 'tokopress_page_header_heading', 
		'label'		=> esc_html__( 'Header Background', 'tokopress' ),
		'section'	=> 'header_image',
		'priority' => 9,
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'heading',
		'setting'	=> 'tokopress_options_pageheader_goto_colors', 
		'label'		=> esc_html__( 'More ...', 'tokopress' ),
		'description' => '<p><span class="dashicons dashicons-admin-appearance"></span> <a href="javascript:wp.customize.section( \'tokopress_colors_pageheader\' ).focus();">'.esc_html__( 'Go to Theme Colors of this section', 'tokopress' ).'</a></p>',
		'section'	=> 'header_image',
	);

	return $controls;
}

add_filter( 'tokopress_customize_controls', 'tokopress_customize_controls_options_headerscripts' );
function tokopress_customize_controls_options_headerscripts( $controls ) {

	$controls[] = array(
		'setting_type' => 'option_mod',
		'type'     => 'section',
		'setting'  => 'tokopress_options_headerscripts',
		'title'    => esc_html__( 'Header - Scripts', 'tokopress' ),
		'panel'    => 'tokopress_options',
		'priority' => 10,
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'textarea-unfiltered',
		'setting'	=> 'tokopress_header_script', 
		'label'		=> esc_html__( 'Header Scripts', 'tokopress' ),
		'section'	=> 'tokopress_options_headerscripts',
	);

	return $controls;
}

add_filter( 'tokopress_customize_controls', 'tokopress_customize_controls_options_sidebar' );
function tokopress_customize_controls_options_sidebar( $controls ) {

	$controls[] = array(
		'type'     => 'section',
		'setting'  => 'tokopress_options_sidebar',
		'title'    => esc_html__( 'Sidebar', 'tokopress' ),
		'panel'    => 'tokopress_options',
		'priority' => 10,
	);

	$controls[] = array( 
		'type' 		=> 'warning',
		'setting'	=> 'tokopress_options_sidebar_warning', 
		'label'		=> '',
		'description' => sprintf( esc_html__( 'These settings only affect %s. Please visit %s to see live preview for these settings.', 'tokopress' ), esc_html__( 'a page with sidebar', 'tokopress' ) , esc_html__( 'a page with sidebar', 'tokopress' ) ),
		'section'	=> 'tokopress_options_sidebar',
	);

	if ( function_exists('is_rtl') && is_rtl() ) {
		$controls[] = array(
			'type'     => 'radio-buttonset',
			'setting'  => 'tokopress_sidebar_position',
			'label'    => esc_html__( 'Sidebar Position', 'tokopress' ),
			'section'  => 'tokopress_options_sidebar',
			'default'  => 'left',
			'choices'  => array(
				'left' => esc_html__( 'Left', 'tokopress' ),
				'right' => esc_html__( 'Right', 'tokopress' ),
			),
			'style'  => array(
				'left' => '',
				'right' => '@media only screen and (min-width: 993px) { .layout-2c-l .content-area { float:left; } .layout-2c-l .sidebar { float:right; border-right: 0; border-left: 1px solid #f2f0f0; } }',
			),
		);
	}
	else {
		$controls[] = array(
			'type'     => 'radio-buttonset',
			'setting'  => 'tokopress_sidebar_position',
			'label'    => esc_html__( 'Sidebar Position', 'tokopress' ),
			'section'  => 'tokopress_options_sidebar',
			'default'  => 'right',
			'choices'  => array(
				'right' => esc_html__( 'Right', 'tokopress' ),
				'left' => esc_html__( 'Left', 'tokopress' ),
			),
			'style'  => array(
				'right' => '',
				'left' => '@media only screen and (min-width: 993px) { .layout-2c-l .content-area { float:right; } .layout-2c-l .sidebar { float:left; border-left: 0; border-right: 1px solid #f2f0f0; } }',
			),
		);
	}

	$controls[] = array(
		'type'     => 'sidebar-width',
		'setting'  => 'tokopress_sidebar_width',
		'label'    => esc_html__( 'Sidebar Width', 'tokopress' ),
		'section'  => 'tokopress_options_sidebar',
		'choices'  => array(
			'min' => 20,
			'max' => 50,
			'step' => 1,
			'unit' => '%',
		),
		'style'    => '@media only screen and (min-width: 993px) { .layout-2c-l .content-area { width:[100_value]% } .layout-2c-l .sidebar { width:[value]% } }',
	);

	$controls[] = array( 
		'type' 		=> 'heading',
		'setting'	=> 'tokopress_options_sidebar_goto_colors', 
		'label'		=> esc_html__( 'More ...', 'tokopress' ),
		'description' => '<p><span class="dashicons dashicons-admin-appearance"></span> <a href="javascript:wp.customize.section( \'tokopress_colors_sidebar\' ).focus();">'.esc_html__( 'Go to Theme Colors of this section', 'tokopress' ).'</a></p>',
		'section'	=> 'tokopress_options_sidebar',
	);

	return $controls;
}

add_filter( 'tokopress_customize_controls', 'tokopress_customize_controls_options_footerwidgets' );
function tokopress_customize_controls_options_footerwidgets( $controls ) {

	$controls[] = array(
		'setting_type' => 'option_mod',
		'type'     => 'section',
		'setting'  => 'tokopress_options_footerwidgets',
		'title'    => esc_html__( 'Footer - Widgets', 'tokopress' ),
		'panel'    => 'tokopress_options',
		'priority' => 10,
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'checkbox',
		'setting'	=> 'tokopresss_disable_footer_widget',
		'label'		=> esc_html__( 'DISABLE Footer Widgets', 'tokopress' ),
		'section'	=> 'tokopress_options_footerwidgets',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'heading',
		'setting'	=> 'tokopress_options_footerwidgets_goto_colors', 
		'label'		=> esc_html__( 'More ...', 'tokopress' ),
		'description' => '<p><span class="dashicons dashicons-admin-appearance"></span> <a href="javascript:wp.customize.section( \'tokopress_colors_footerwidgets\' ).focus();">'.esc_html__( 'Go to Theme Colors of this section', 'tokopress' ).'</a></p><p><span class="dashicons dashicons-admin-generic"></span> <a href="javascript:wp.customize.panel( \'widgets\' ).focus();">'.esc_html__( 'Setup Footer Widgets', 'tokopress' ).'</a></p>',
		'section'	=> 'tokopress_options_footerwidgets',
	);

	return $controls;
}

add_filter( 'tokopress_customize_controls', 'tokopress_customize_controls_options_footercredits' );
function tokopress_customize_controls_options_footercredits( $controls ) {

	$controls[] = array(
		'setting_type' => 'option_mod',
		'type'     => 'section',
		'setting'  => 'tokopress_options_footercredits',
		'title'    => esc_html__( 'Footer - Credits', 'tokopress' ),
		'panel'    => 'tokopress_options',
		'priority' => 10,
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'checkbox',
		'setting'	=> 'tokopresss_disable_footer_credit',
		'label'		=> esc_html__( 'DISABLE Footer Credits', 'tokopress' ),
		'section'	=> 'tokopress_options_footercredits',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'textarea-html',
		'setting'	=> 'tokopress_footer_text',
		'label'		=> esc_html__( 'Footer Credits Text', 'tokopress' ),
		'section'	=> 'tokopress_options_footercredits',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'heading',
		'setting'	=> 'tokopress_options_footercredits_goto_colors', 
		'label'		=> esc_html__( 'More ...', 'tokopress' ),
		'description' => '<p><span class="dashicons dashicons-admin-appearance"></span> <a href="javascript:wp.customize.section( \'tokopress_colors_footercredits\' ).focus();">'.esc_html__( 'Go to Theme Colors of this section', 'tokopress' ).'</a></p>',
		'section'	=> 'tokopress_options_footercredits',
	);

	return $controls;
}

add_filter( 'tokopress_customize_controls', 'tokopress_customize_controls_options_footerscripts' );
function tokopress_customize_controls_options_footerscripts( $controls ) {

	$controls[] = array(
		'setting_type' => 'option_mod',
		'type'     => 'section',
		'setting'  => 'tokopress_options_footerscripts',
		'title'    => esc_html__( 'Footer - Scripts', 'tokopress' ),
		'panel'    => 'tokopress_options',
		'priority' => 10,
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'textarea-unfiltered',
		'setting'	=> 'tokopress_footer_script',
		'label'		=> esc_html__( 'Footer Scripts', 'tokopress' ),
		'section'	=> 'tokopress_options_footerscripts',
	);

	return $controls;
}

add_filter( 'tokopress_customize_controls', 'tokopress_customize_controls_options_pagetemplates_contact' );
function tokopress_customize_controls_options_pagetemplates_contact( $controls ) {

	$controls[] = array(
		'setting_type' => 'option_mod',
		'type'     => 'section',
		'setting'  => 'tokopress_options_contact_templates',
		'title'    => esc_html__( 'Contact Page Template', 'tokopress' ),
		'panel'    => 'tokopress_pagetemplates',
		'priority' => 10,
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'warning',
		'setting'	=> 'tokopress_contact_warning', 
		'label'		=> sprintf( esc_html__( 'You are not in %s', 'tokopress' ), esc_html__( 'Page with Contact Page Template', 'tokopress' ) ),
		'description' => sprintf( esc_html__( 'These settings only affect %s. Please visit %s to see live preview for these settings.', 'tokopress' ), esc_html__( 'Page with Contact Page Template', 'tokopress' ) , esc_html__( 'Page with Contact Page Template', 'tokopress' ) ),
		'section'	=> 'tokopress_options_contact_templates',
		'active_callback' => 'tokopress_is_not_contact_page',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'heading',
		'setting'	=> 'tokopress_contact_heading_desc', 
		'label'		=> '',
		'description' => esc_html__( 'These options are for everyone who use Contact Page Template. We use simple contact form here. If you need advanced contact form (with more fields and setting), we recommend you to use Contact Form 7, Caldera Forms, Ninja Forms, WP Forms, or Gravity Forms plugin.', 'tokopress' ),
		'section'	=> 'tokopress_options_contact_templates',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'heading',
		'setting'	=> 'tokopress_contact_heading_map', 
		'label'		=> esc_html__( 'Contact Map', 'tokopress' ),
		'section'	=> 'tokopress_options_contact_templates',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'checkbox',
		'setting'	=> 'tokopress_disable_contact_map',
		'label'		=> esc_html__( 'DISABLE Google Map in Contact page template', 'tokopress' ),
		'section'	=> 'tokopress_options_contact_templates',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'text',
		'setting'	=> 'tokopress_contact_apikey',
		'label'		=> esc_html__( 'Google Maps API Key (recommended)', 'tokopress' ),
		'description' => esc_html__( 'Usage of the Google Maps APIs now requires a key if your domain was not active prior to June 22nd, 2016.', 'tokopress' ).' <br/><a href="https://developers.google.com/maps/documentation/javascript/get-api-key#get-an-api-key">'.esc_html__( 'Click here to get your Google Maps API key', 'tokopress' ).'</a>',
		'section'	=> 'tokopress_options_contact_templates',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'text',
		'default'	=> '-6.903932',
		'setting'	=> 'tokopress_contact_lat',
		'label'		=> esc_html__( 'Latitude', 'tokopress' ),
		'description' => esc_html__( 'Insert Latitude coordinate', 'tokopress' ),
		'section'	=> 'tokopress_options_contact_templates',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'text',
		'default'	=> '107.610344',
		'setting'	=> 'tokopress_contact_long',
		'label'		=> esc_html__( 'Longitude', 'tokopress' ),
		'description' => esc_html__( 'Insert Longitude coordinate', 'tokopress' ),
		'section'	=> 'tokopress_options_contact_templates',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'text',
		'default'	=> esc_html__( 'Marker Title', 'tokopress' ),
		'setting'	=> 'tokopress_contact_marker_title',
		'label'		=> esc_html__( 'Marker Title', 'tokopress' ),
		'description' => esc_html__( 'Insert marker title', 'tokopress' ),
		'section'	=> 'tokopress_options_contact_templates',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'text',
		'default'	=> esc_html__( 'Marker Description', 'tokopress' ),
		'setting'	=> 'tokopress_contact_marker_desc',
		'label'		=> esc_html__( 'Marker Description', 'tokopress' ),
		'description' => esc_html__( 'Insert marker description', 'tokopress' ),
		'section'	=> 'tokopress_options_contact_templates',
	);

	return $controls;
}

add_filter( 'tokopress_customize_controls', 'tokopress_customize_controls_options_ocdi' );
function tokopress_customize_controls_options_ocdi( $controls ) {

	$controls[] = array(
		'setting_type' => 'option_mod',
		'type'     => 'section',
		'setting'  => 'tokopress_options_ocdi',
		'title'    => esc_html__( 'One Click Demo Import', 'tokopress' ),
		'panel'    => 'tokopress_options',
		'priority' => 10,
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'checkbox',
		'setting'	=> 'tokopress_disable_ocdi',
		'label'		=> esc_html__( 'DISABLE One Click Demo Import', 'tokopress' ),
		'description' => esc_html__( 'If you have imported demo content or you do not need demo content, then it is better to disable One Click Demo Import feature.', 'tokopress' ),
		'section'	=> 'tokopress_options_ocdi',
	);

	return $controls;
}

add_filter( 'tokopress_customize_controls', 'tokopress_customize_controls_options_visualcomposer' );
function tokopress_customize_controls_options_visualcomposer( $controls ) {

	$controls[] = array(
		'setting_type' => 'option_mod',
		'type'     => 'section',
		'setting'  => 'tokopress_options_visualcomposer',
		'title'    => esc_html__( 'Visual Composer', 'tokopress' ),
		'panel'    => 'tokopress_options',
		'priority' => 10,
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'checkbox',
		'setting'	=> 'tokopress_enable_vc_license',
		'label'		=> esc_html__( 'ENABLE Visual Composer License Page', 'tokopress' ),
		'description' => esc_html__( 'It is useful if you purchase separate Visual Composer license to get direct plugin updates and official support from Visual Composer developer.', 'tokopress' ),
		'section'	=> 'tokopress_options_visualcomposer',
	);

	return $controls;
}

add_filter( 'tokopress_customize_controls', 'tokopress_customize_controls_options_optimization' );
function tokopress_customize_controls_options_optimization( $controls ) {

	$controls[] = array(
		'setting_type' => 'option_mod',
		'type'     => 'section',
		'setting'  => 'tokopress_options_optimization',
		'title'    => esc_html__( 'Optimizations', 'tokopress' ),
		'panel'    => 'tokopress_options',
		'priority' => 90,
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'checkbox',
		'setting'	=> 'tokopress_disable_wordpress_generator',
		'label'		=> esc_html__( 'DISABLE generator meta tag', 'tokopress' ),
		'description' => esc_html__( 'DISABLE generator meta tag from WordPress, WooCommerce, Visual Composer, and Revolution Slider for security purpose.', 'tokopress' ),
		'section'	=> 'tokopress_options_optimization',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'checkbox',
		'setting'	=> 'tokopress_disable_wordpress_emoji',
		'label'		=> esc_html__( 'DISABLE WordPress Emoji', 'tokopress' ),
		'description' => esc_html__( 'DISABLE WordPress Emoji script if you do not need it.', 'tokopress' ),
		'section'	=> 'tokopress_options_optimization',
	);

	$controls[] = array( 
		'setting_type' => 'option_mod',
		'type' 		=> 'checkbox',
		'setting'	=> 'tokopress_disable_wordpress_responsive_images',
		'label'		=> esc_html__( 'DISABLE WordPress Responsive Images', 'tokopress' ),
		'description' => esc_html__( 'DISABLE WordPress Responsive Images srcset if you do not need it.', 'tokopress' ),
		'section'	=> 'tokopress_options_optimization',
	);

	if ( is_child_theme() ) {
		$controls[] = array( 
			'setting_type' => 'option_mod',
			'type' 		=> 'checkbox',
			'setting'	=> 'tokopress_disable_child_theme_style',
			'label'		=> esc_html__( 'DISABLE Child Theme\'s style.css', 'tokopress' ),
			'description' => esc_html__( 'DISABLE Child Theme\'s style.css if you do not use it.', 'tokopress' ),
			'section'	=> 'tokopress_options_optimization',
		);
	}

	if ( class_exists( 'Jetpack' ) ) {
		$controls[] = array( 
			'setting_type' => 'option_mod',
			'type' 		=> 'checkbox',
			'setting'	=> 'tokopress_disable_child_theme_style',
			'label'		=> esc_html__( 'DISABLE Jetpack JS & CSS', 'tokopress' ),
			'description' => esc_html__( 'DISABLE Jetpack JS & CSS if you do not need it.', 'tokopress' ),
			'section'	=> 'tokopress_options_optimization',
		);
	}

	if ( class_exists( 'woocommerce' ) ) {
		$controls[] = array( 
			'setting_type' => 'option_mod',
			'type' 		=> 'checkbox',
			'setting'	=> 'tokopress_custom_woocommerce_smallscreen',
			'label'		=> esc_html__( 'Custom WooCommerce Small Screen CSS', 'tokopress' ),
			'description' => esc_html__( 'Load custom woocommerce small screen CSS file. It is useful when your CSS minify plugin does not work.', 'tokopress' ),
			'section'	=> 'tokopress_options_optimization',
		);
	}

	return $controls;
}

add_action( 'admin_menu', 'tokopress_customize_theme_page_menu', 1 );
function tokopress_customize_theme_page_menu() {
	add_theme_page( esc_html__( 'Theme Options', 'tokopress' ), esc_html__( 'Theme Options', 'tokopress' ), 'edit_theme_options', 'customize.php' );
}
