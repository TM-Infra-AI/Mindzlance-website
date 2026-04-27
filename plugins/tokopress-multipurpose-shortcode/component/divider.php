<?php
/**
 * Tokopress Divider With Icon
 *
 * @package Divider With Icon
 * @author tokopress
 */

add_shortcode( 'tokopress_divider', 'tpvc_divider_shortcode' );

function tpvc_divider_shortcode( $atts ) {
	extract( shortcode_atts( array(
		'tpvc_divider_line_color'	=> '',
		'tpvc_divider_title_option'	=> 'no',
		'tpvc_divider_text'			=> '',
		'tpvc_divider_text_color'	=> '',
		'tpvc_divider_heading'		=> 'span',
		'tpvc_divider_icon_option'	=> 'no',
		'tpvc_divider_icon'			=> 'fa-check-square-o',
		'tpvc_divider_icon_color'	=> '',
		'extra_class'				=> ''
	), $atts ) );

	if ( !$tpvc_divider_text ) {
		$tpvc_divider_heading = 'span';
	}
	/* backward, we no longer allow h1 here for SEO */
	if ( $tpvc_divider_heading == 'h1' ) {
		$tpvc_divider_heading = 'h2';
	}

	$output = '<div class="tpvc-divider ' . $extra_class . '">';
	$output .= '<div class="divider-box">';
	$output .= '<div class="break-line" ' . ( $tpvc_divider_line_color ? 'style="border-color:'.$tpvc_divider_line_color.'"' : '' ). '></div>';

	if( "no" == $tpvc_divider_title_option ) {
		$output .= '<div class="divider-text">';
		$output .= '<' . $tpvc_divider_heading . ' class="divider-heading" ' . ( $tpvc_divider_text_color ? 'style="color:'.$tpvc_divider_text_color.'"' : '' ). '>';
		if( $tpvc_divider_icon_option == "no" )
			$output .= '<i class="' . tpvc_icon( $tpvc_divider_icon ) . '" ' . ( $tpvc_divider_icon_color ? 'style="color:'.$tpvc_divider_icon_color.'"' : '' ). '></i>';
		$output .= $tpvc_divider_text;
		$output .= '</' . $tpvc_divider_heading . '>';
		$output .= '</div>';
	}
	
	$output .= '</div>';
	$output .= '</div>';

	return $output;
}

add_action( 'vc_before_init', 'tpvc_divider_vcmap' );
function tpvc_divider_vcmap() {

	vc_map( array(
	   'name'				=> __( 'Tokopress - Divider', 'tokopress' ),
	   'base'				=> 'tokopress_divider',
	   'class'				=> '',
	   'icon'				=> 'tokopress_icon',
	   'category'			=> 'Tokopress - Marketica',
	   // 'admin_enqueue_css' 	=> array( SHORTCODE_URL . '/css/component.css' ),
	   'params'				=> array(
								array(
									'type'			=> 'colorpicker',
									'heading'		=> __( 'Divider Line Color', 'tokopress' ),
									'param_name'	=> 'tpvc_divider_line_color'
								),

	   							array(
									'type'			=> 'dropdown',
									'heading'		=> __( 'DISABLE Divider Text', 'tokopress' ),
									'param_name'	=> 'tpvc_divider_title_option',
									'value'			=> array(
														'' 	=> '',
														'No'		=> 'no',
														'Yes'		=> 'yes',
													),
									'std'			=> 'no'
								),

								array(
									'type'			=> 'textfield',
									'heading'		=> __( 'Divider Text', 'tokopress' ),
									'param_name'	=> 'tpvc_divider_text',
									'value'			=> ''
								),

								array(
									'type'			=> 'colorpicker',
									'heading'		=> __( 'Divider Text Color', 'tokopress' ),
									'param_name'	=> 'tpvc_divider_text_color'
								),

								array(
									'type'			=> 'dropdown',
									'heading'		=> __( 'Divider Text Markup', 'tokopress' ),
									'param_name'	=> 'tpvc_divider_heading',
									'value'			=> array(
														'' 	=> '',
														'Span' => 'span',
														'H2' => 'h2',
														'H3' => 'h3',
														'H4' => 'h4',
														'H5' => 'h5',
														'H6' => 'h6'
													),
									'std'			=> 'span'
								),

								array(
									'type'			=> 'dropdown',
									'heading'		=> __( 'DISABLE Divider Icon', 'tokopress' ),
									'param_name'	=> 'tpvc_divider_icon_option',
									'value'			=> array(
														'' 	=> '',
														'No'		=> 'no',
														'Yes'		=> 'yes',
													),
									'std'			=> 'no'
								),

								array(
									'type' => 'iconpicker',
									'heading' => __( 'Divider Icon', 'tokopress' ),
									'param_name' => 'tpvc_divider_icon',
									'settings' 		=> array(
										'emptyIcon' 	=> true, 
										'iconsPerPage' 	=> 4000, 
										'type'			=> 'fontawesome',
									),
									// 'dependency' 	=> array(
									// 	'element' 		=> 'type',
									// 	'value' 		=> 'fontawesome',
									// ),
								),
								
								array(
									'type'			=> 'colorpicker',
									'heading'		=> __( 'Divider Icon Color', 'tokopress' ),
									'param_name'	=> 'tpvc_divider_icon_color'
								),

								array(
									'type'			=> 'textfield',
									'heading'		=> __( 'Extra Class', 'tokopress' ),
									'description'	=> __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'tokopress' ),
									'param_name'	=> 'extra_class',
									'value'			=> ''
								)
							)
	   )
	);
}