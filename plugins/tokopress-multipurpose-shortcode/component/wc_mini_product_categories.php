<?php
/**
 * Tokopress WooCommerce Mini Product
 *
 * @package WooCommerce Mini Product
 * @author Tokopress
 */

add_shortcode( 'tokopress_mini_product_categories', 'tpvc_wc_mini_product_categories_shortcode' );

function tpvc_wc_mini_product_categories_shortcode( $atts ) {
	if ( ! class_exists('woocommerce') )
		return;

	extract( shortcode_atts( array(
		'tpvc_wc_cat_title'		=> 'Product Category',
		'tpvc_wc_cat_title_color'		=> '',
		'tpvc_wc_cat_title_bg'			=> '',
		'tpvc_wc_cat_title_icon'		=> '',
		'tpvc_wc_cat_title_icon_color'	=> '',
		'tpvc_wc_cat_numbers' 	=> 36,
		'tpvc_wc_cat_columns' 	=> 12,
		'tpvc_wc_cat_columns_tablet' 		=> 9,
		'tpvc_wc_cat_columns_mobile' 		=> 4,
		'tpvc_wc_cat_orderby' 	=> 'none',
		'tpvc_wc_cat_order' 	=> 'asc',
		'tpvc_wc_cat_hide_title'=> '',
		'tpvc_wc_cat_class'		=> ''
	), $atts ) );

	$meta_query = WC()->query->get_meta_query();

	if ( intval( $tpvc_wc_cat_numbers ) < 1 ) {
		$tpvc_wc_cat_numbers = 36;
	}
	if ( intval( $tpvc_wc_cat_columns ) < 1 ) {
		$tpvc_wc_cat_columns = 12;
	}
	if ( intval( $tpvc_wc_cat_columns_tablet ) < 1 ) {
		$tpvc_wc_cat_columns_tablet = 9;
	}
	if ( intval( $tpvc_wc_cat_columns_mobile ) < 1 ) {
		$tpvc_wc_cat_columns_mobile = 4;
	}

	$tpvc_wc_cat_class .= ' tpvc-mini-product-col-md-'.$tpvc_wc_cat_columns;
	$tpvc_wc_cat_class .= ' tpvc-mini-product-col-sm-'.$tpvc_wc_cat_columns_tablet;
	$tpvc_wc_cat_class .= ' tpvc-mini-product-col-xs-'.$tpvc_wc_cat_columns_mobile;

	$args = array(
		'orderby'    => $tpvc_wc_cat_orderby,
		'order'      => $tpvc_wc_cat_order,
		'hide_empty' => false,
		// 'include'    => $tpvc_wc_cat_ids,
		'pad_counts' => true,
	);

	ob_start();

	$product_categories = get_terms( 'product_cat', $args );

	if ( $tpvc_wc_cat_numbers ) {
		$product_categories = array_slice( $product_categories, 0, $tpvc_wc_cat_numbers );
	}

	add_filter( 'subcategory_archive_thumbnail_size', 'tpvc_wc_mini_product_categories_thumb_size' );

	if ( $product_categories ) : ?>

	<div class="tpvc-mini-product tpvc-mini-product-categories woocommerce <?php echo $tpvc_wc_cat_class; ?>">

		<?php if( "hide" != $tpvc_wc_cat_hide_title ) : ?>
			<div class="tpvc-title" <?php if( "" !== $tpvc_wc_cat_title_bg ) echo 'style="background-color:' . $tpvc_wc_cat_title_bg . '"'; ?>>
				<h2 <?php if( "" !== $tpvc_wc_cat_title_color ) echo 'style="color:' . $tpvc_wc_cat_title_color . '"'; ?>>
					<?php if( "" != $tpvc_wc_cat_title_icon ) echo '<i class="' . tpvc_icon( $tpvc_wc_cat_title_icon ) . '" ' . ( $tpvc_wc_cat_title_icon_color ? 'style="color:'.$tpvc_wc_cat_title_icon_color.'"' : '' ). '></i>'; ?>
					<?php echo $tpvc_wc_cat_title; ?>
				</h2>
			</div>
		<?php endif; ?>

		<ul class="products product-category">

			<?php foreach ( $product_categories as $category ) { ?>

				<li <?php wc_product_cat_class( '', $category ); ?>>

					<?php woocommerce_subcategory_thumbnail( $category ); ?>

					<div class="mini-icon-view">
						<a href="<?php echo get_term_link( $category->slug, 'product_cat' ); ?>" title="<?php echo $category->name; ?>">
							<i class="fa fa-search"></i>
						</a>
					</div>

				</li>

			<?php } ?>

		</ul>

	</div>

	<?php endif;

	remove_filter( 'subcategory_archive_thumbnail_size', 'tpvc_wc_mini_product_categories_thumb_size' );

	return ob_get_clean();
}

function tpvc_wc_mini_product_categories_thumb_size( $size ) {
	return 'shop_thumbnail';
}

add_action( 'vc_before_init', 'tpvc_wc_mini_product_categories_vcmap' );
function tpvc_wc_mini_product_categories_vcmap() {
	if ( ! class_exists('woocommerce') )
		return;

	vc_map( array(
	   'name'				=> __( 'WooCommerce - Mini Product Categories Thumbnail', 'tokopress' ),
	   'base'				=> 'tokopress_mini_product_categories',
	   'class'				=> '',
	   'icon'				=> 'woocommerce_icon',
	   'category'			=> 'Tokopress - Marketica',
	   // 'admin_enqueue_css' 	=> array( SHORTCODE_URL . '/css/component.css' ),
	   'params'				=> array(
								array(
									'type'			=> 'textfield',
									'heading'		=> __( 'Title', 'tokopress' ),
									'param_name'	=> 'tpvc_wc_cat_title',
									'value'			=> __( 'Product Category', 'tokopress' )
								),
								array(
									'type'			=> 'colorpicker',
									'heading'		=> __( 'Title Color', 'tokopress' ),
									'param_name'	=> 'tpvc_wc_cat_title_color'
								),
								array(
									'type'			=> 'colorpicker',
									'heading'		=> __( 'Title Background Color', 'tokopress' ),
									'param_name'	=> 'tpvc_wc_cat_title_bg',
								),
								array(
									'type' => 'iconpicker',
									'heading' => __( 'Title Icon', 'tokopress' ),
									'param_name' => 'tpvc_wc_cat_title_icon',
									'settings' 		=> array(
										'emptyIcon' 	=> false, 
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
									'heading'		=> __( 'Title Icon Color', 'tokopress' ),
									'param_name'	=> 'tpvc_wc_cat_title_icon_color',
								),
								array(
									'type' 			=> 'checkbox',
									'heading' 		=> __( 'Hide Title', 'tokopress' ),
									'param_name' 	=> 'tpvc_wc_cat_hide_title',
									'value' 		=> array( __( 'Hide Title', 'tokopress' ) => 'hide' )
								),

								array(
									'type'			=> 'dropdown',
									'heading'		=> __( 'Number of Categories To Show', 'tokopress' ),
									'param_name'	=> 'tpvc_wc_cat_numbers',
									'value'			=> array(
															'' => '',
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
															'12' => '12',
															'13' => '13',
															'14' => '14',
															'15' => '15',
															'16' => '16',
															'17' => '17',
															'18' => '18',
															'19' => '19',
															'20' => '20',
															'21' => '21',
															'22' => '22',
															'23' => '23',
															'24' => '24',
															'25' => '25',
															'26' => '26',
															'27' => '27',
															'28' => '28',
															'29' => '29',
															'30' => '30',
															'31' => '31',
															'32' => '32',
															'33' => '33',
															'34' => '34',
															'35' => '35',
															'36' => '36',
														),
									'std'			=> ''
								),
								array(
									'type'			=> 'dropdown',
									'heading'		=> __( 'Number of Columns Per Row (Desktop)', 'tokopress' ),
									'description'	=> __( 'For device width > 992px', 'tokopress' ),
									'param_name'	=> 'tpvc_wc_cat_columns',
									'value'			=> array(
															'' => '',
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
									'std'			=> ''
								),
								array(
									'type'			=> 'dropdown',
									'heading'		=> __( 'Number of Columns Per Row (Tablet)', 'tokopress' ),
									'description'	=> __( 'For device width > 768px and <= 992px', 'tokopress' ),
									'param_name'	=> 'tpvc_wc_cat_columns_tablet',
									'value'			=> array(
															'' => '',
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
									'std'			=> ''
								),
								array(
									'type'			=> 'dropdown',
									'heading'		=> __( 'Number of Columns Per Row (Mobile)', 'tokopress' ),
									'description'	=> __( 'For device width <= 768px', 'tokopress' ),
									'param_name'	=> 'tpvc_wc_cat_columns_mobile',
									'value'			=> array(
															'' => '',
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
									'std'			=> ''
								),
								array(
									'type'			=> 'dropdown',
									'heading'		=> __( 'Product Order Type', 'tokopress' ),
									'param_name'	=> 'tpvc_wc_cat_order',
									'value'			=> array(
															'' 	=> '',
															'Ascending'		=> 'asc',
															'Descending' 	=> 'desc'
														),
									'std'			=> 'asc'
								),
								array(
									'type'			=> 'dropdown',
									'heading'		=> __( 'Product Order By', 'tokopress' ),
									'param_name'	=> 'tpvc_wc_cat_orderby',
									'value'			=> array(
														'' 	=> '',
														__( 'None', 'tokopress' )		=> 'none',
														__( 'Name', 'tokopress' )		=> 'name',
														__( 'Count', 'tokopress' )		=> 'count',
														__( 'Slug', 'tokopress' )		=> 'slug',
														__( 'ID', 'tokopress' )			=> 'id'
													),
									'std'			=> 'none'

								),

								array(
									'type'			=> 'textfield',
									'heading'		=> __( 'Extra Class', 'tokopress' ),
									'description'	=> __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'tokopress' ),
									'param_name'	=> 'tpvc_wc_cat_class',
									'value'			=> '',
								)
							)
		)
	);
}
