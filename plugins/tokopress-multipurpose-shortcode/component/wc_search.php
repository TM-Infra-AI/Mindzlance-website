<?php
/**
 * Tokopress WooCommerce Search Shortcode
 *
 * @package WooCommerce Search Shortcode
 * @author Tokopress
 */

add_shortcode( 'tokopress_product_search', 'tpvc_wc_product_search_shortcode' );

function tpvc_wc_product_search_shortcode( $atts ) {
	if ( ! class_exists('woocommerce') )
		return;

	extract( shortcode_atts( array(
		'tpvc_wc_search_title'		=> '',
		'tpvc_wc_search_bg'			=> '',
		'tpvc_wc_search_color'		=> '',
		'tpvc_wc_search_icon_color'	=> ''
	), $atts ) );
	
	$widget_id = rand( 1000, 9999 );

	// if ( class_exists('WeDevs_Dokan') && class_exists('Dokan_Live_Search') ) {
	// 	$form_class = 'ajaxsearchform';
	// 	$input_class = 'dokan-ajax-search-textfield';
	// 	$category_dropdown = wp_dropdown_categories( array(
	//                         'taxonomy' => 'product_cat',
	//                         'show_option_all' => __( 'All', 'tokopress' ),
	//                         'hierarchical' => true,
	//                         'hide_empty' => false,
	//                         'orderby' => 'name',
	//                         'order' => 'ASC',
	//                         'class' => 'orderby dokan-ajax-search-category',
	//                         'echo' => 0,
	//                         'walker' => new Dokan_LS_Walker_CategoryDropdown()
	//                     ) );
	// 	$search_text = __( 'Find your product now, just type here &hellip;', 'tokopress' );
	// }
	// else {
		$form_class = '';
		$input_class = '';
		$category_dropdown = '';
		$search_text = __( 'Find your product now, type here and hit enter', 'tokopress' );
	// }

	if ( !$tpvc_wc_search_title ) {
		$tpvc_wc_search_title = $search_text;
	}

	$output = '';
	if ( $tpvc_wc_search_color ) {
		$output .= '<style>#tpvc-product-search-'.$widget_id.' form input::-webkit-input-placeholder { color: '.$tpvc_wc_search_color.' !important; } #tpvc-product-search-'.$widget_id.' form input::-moz-placeholder { color: '.$tpvc_wc_search_color.' !important; } #tpvc-product-search-'.$widget_id.' form input:-ms-input-placeholder { color: '.$tpvc_wc_search_color.' !important; } </style>';
	}
	$output .= "\t" . '<div id="tpvc-product-search-'.$widget_id.'" class="tpvc-product-search" '.( $tpvc_wc_search_bg ? 'style="background-color:' . $tpvc_wc_search_bg . '"' : '' ).'>' . "\n";
    $output .= "\t\t" . '<div class="container">' . "\n";
	$output .= "\t\t\t" . '<form role="search" method="get" class="'.$form_class.'" id="custom-searchform" action="' . esc_url( home_url( '/'  ) ) . '">' . "\n";
	$output .= "\t\t\t\t" . '<div>' . "\n";
	
	$output .= "\t\t\t\t\t" . '<input type="text" class="'.$input_class.'" value="' . get_search_query() . '" name="s" id="s" placeholder="' . $tpvc_wc_search_title . '" '.( $tpvc_wc_search_color ? 'style="color:' . $tpvc_wc_search_color . '"': '').'/>' . "\n";
	$output .= "\t\t\t\t\t" . '<button type="submit" class="search-submit"><i class="sli sli-magnifier" '.( $tpvc_wc_search_icon_color ? 'style="color:' . $tpvc_wc_search_icon_color . '"': '').'></i></button>' . "\n";
	$output .= "\t\t\t\t\t" . '<input type="hidden" name="post_type" value="product" />' . "\n";
	$output .= $category_dropdown;
	$output .= "\t\t\t\t" . '</div>' . "\n";
	$output .= "\t\t\t" . '</form>' . "\n";

    $output .= "\t\t" . '</div>' . "\n";
    $output .= "\t" . '</div>' . "\n";

	return $output;
}

add_action( 'vc_before_init', 'tpvc_product_search_vcmap' );
function tpvc_product_search_vcmap() {
	if ( ! class_exists('woocommerce') )
		return;

	vc_map( array(
	   'name'				=> __( 'WooCommerce - Search Products', 'tokopress' ),
	   'base'				=> 'tokopress_product_search',
	   'class'				=> '',
	   'icon'				=> 'woocommerce_icon',
	   'category'			=> 'Tokopress - Marketica',
	   // 'admin_enqueue_css' 	=> array( SHORTCODE_URL . '/css/component.css' ),
	   'params'				=> array(
								array(
									'type'			=> 'textfield',
									'heading'		=> __( 'Search Text', 'tokopress' ),
									'param_name'	=> 'tpvc_wc_search_title',
									'value'			=> '',
								),
								array(
									'type'			=> 'colorpicker',
									'heading'		=> __( 'Background Color', 'tokopress' ),
									'param_name'	=> 'tpvc_wc_search_bg',
								),
								array(
									'type'			=> 'colorpicker',
									'heading'		=> __( 'Text Color', 'tokopress' ),
									'param_name'	=> 'tpvc_wc_search_color',
								),
								array(
									'type'			=> 'colorpicker',
									'heading'		=> __( 'Icon Color', 'tokopress' ),
									'param_name'	=> 'tpvc_wc_search_icon_color',
								)
							)
	   	)
	);
}