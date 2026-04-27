<?php
/**
 * Tokopress Image Carousel Shortcode
 *
 * @package Image Carousel Shortcode
 * @author Tokopress
 *
 * Attribute:
 * - images (ID Attachment)
 * - image_url (Insert url target for image, use | for multiple URL. e.g: http://primathemes.com/|http://tokopress.com/)
 * - image_size (thumnail, medium, full)
 * - image_show (default = 5)
 * - extra_class
 */

add_shortcode( 'tokopress_image_carousel', 'tpvc_shortcode_image_carousel' );

function tpvc_shortcode_image_carousel( $atts ) {
	extract( shortcode_atts( array(
		'images'			=> '',
		'image_url'			=> '',
		'image_size'		=> 'medium',
		'image_show'		=> '6',
		'extra_class'		=> ''
	), $atts ) );


	$output = '';
	if( "" != $images ){

		$carousel_id = rand( 1000, 9999 );
		if ( $image_show < 1 ) {
			$image_show = 6;
		}

		$thumb_size = $image_size;

		if ( $image_show == 1 ) {
			$image_show_laptop = 1;
			$image_show_tablet = 1;
			$image_show_mobile = 1;
		}
		elseif ( $image_show == 2 ) {
			$image_show_laptop = 2;
			$image_show_tablet = 1;
			$image_show_mobile = 1;
		}
		elseif ( $image_show == 3 ) {
			$image_show_laptop = 3;
			$image_show_tablet = 2;
			$image_show_mobile = 1;
		}
		else {
			$image_show_laptop = 4;
			$image_show_tablet = 2;
			$image_show_mobile = 1;
		}

		if ( $image_show == 1 ) {
			$autoheight = 'true';
		}
		else {
			$autoheight = 'false';
		}

		$url_data = explode('|', $image_url);
		$url_array = array();
		foreach ($url_data as $url_item) {
			$url_array[] = $url_item;
		}

		$output .= "\t" . '<div class="tpvc-image-carousel-' . $carousel_id . ' tpvc-image-carousel-wrap ' . $extra_class . '">' . "\n";
		$output .= "\t\t" . '<div class="tpvc-image-carousel owl-carousel">' . "\n";

			$images_data = explode( ',', $images );
			$i=0;
			foreach ( $images_data as $image_data ) {
				$link_url = ( isset( $url_array[$i] ) ) ? $url_array[$i] : "#";

				$output .= "\t\t\t" . '<div class="image-carousel">' . "\n";
				$output .= "\t\t\t\t" . '<a href="' . $link_url  . '">' . "\n";
				$output .= "\t\t\t\t\t" . wp_get_attachment_image( $image_data, $thumb_size ) . "\n";
				$output .= "\t\t\t\t" . '</a>' . "\n";
				$output .= "\t\t\t" . '</div>' . "\n";
			$i++;
			}

		$output .= "\t\t" . '</div>' . "\n";
		$output .= "\t" . '</div>' . "\n";

		if ( is_rtl() ) {
			$js_code = '$(".tpvc-image-carousel-' . $carousel_id . ' .tpvc-image-carousel").owlCarousel({
				rtl: true,
			    responsive:{
			        0:{ items:' . $image_show_mobile . ' },
			        500:{ items:' . $image_show_tablet . ' },
			        769:{ items:' . $image_show_laptop . ' },
			        1025:{ items:' . $image_show . ' }
			    },
				autoplay:true,
				autoplayHoverPause: true,
				nav:true,
				navText:[\'<i class="fa fa-chevron-right"></i>\',\'<i class="fa fa-chevron-left"></i>\'],
				loop:true,
				autoheight:' . $autoheight . ',
				lazyLoad:true
			});';
		}
		else {
			$js_code = '$(".tpvc-image-carousel-' . $carousel_id . ' .tpvc-image-carousel").owlCarousel({
			    responsive:{
			        0:{ items:' . $image_show_mobile . ' },
			        500:{ items:' . $image_show_tablet . ' },
			        769:{ items:' . $image_show_laptop . ' },
			        1025:{ items:' . $image_show . ' }
			    },
				autoplay:true,
				autoplayHoverPause: true,
				nav:true,
				navText:[\'<i class="fa fa-chevron-left"></i>\',\'<i class="fa fa-chevron-right"></i>\'],
				loop:true,
				autoheight:' . $autoheight . ',
				lazyLoad:true
			});';
		}
		
		if ( class_exists('woocommerce') ) {
			wc_enqueue_js( $js_code );
		}
		else {
			tokopress_enqueue_js( $js_code );
		}
	}

	return $output;

}

add_action( 'vc_before_init', 'tpvc_image_carousel_vcmap' );
function tpvc_image_carousel_vcmap() {

	vc_map( array(
	   'name'				=> __( 'Tokopress - Image Carousel', 'tokopress' ),
	   'base'				=> 'tokopress_image_carousel',
	   'class'				=> '',
	   'icon'				=> 'tokopress_icon',
	   'category'			=> 'Tokopress - Marketica',
	   // 'admin_enqueue_css' 	=> array( SHORTCODE_URL . '/css/component.css' ),
	   'params'				=> array(
								array(
									'type'			=> 'attach_images',
									'heading'		=> __( 'Images', 'tokopress' ),
									'param_name'	=> 'images'
								),
								array(
									'type'			=> 'textarea',
									'heading'		=> __( 'Image URL', 'tokopress' ),
									'description'	=> __( 'Insert Image URLs, separated by "|"', 'tokopress' ),
									'param_name'	=> 'image_url'
								),
								array(
									'type'			=> 'dropdown',
									'heading'		=> __( 'Number of Images Per Display', 'tokopress' ),
									'param_name'	=> 'image_show',
									'value'			=> array(
														'6' 	=> '6',
														'5' 	=> '5',
														'4' 	=> '4',
														'3' 	=> '3',
														'2' 	=> '2',
														'1' 	=> '1',
													),
									'std'			=> '6'
								),
								array(
									'type'			=> 'dropdown',
									'heading'		=> __( 'Image Size', 'tokopress' ),
									'param_name'	=> 'image_size',
									'value'			=> array(
														''			=> '',
														'Small'		=> 'thumbnail',
														'Medium'	=> 'medium',
														'Large'		=> 'full',
													),
									'std'			=> 'medium',
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