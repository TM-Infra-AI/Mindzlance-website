<?php
/**
 * Tokopress WooCommerce Mini Vendor
 *
 * @package WooCommerce Mini Vendor
 * @author Tokopress
 */

add_shortcode( 'tokopress_mini_vendors_wcvendors', 'tpvc_wc_mini_wcvendors_shortcode' );

function tpvc_wc_mini_wcvendors_shortcode( $atts ) {

	if ( ! class_exists('woocommerce') )
		return;

	if ( ! class_exists('WC_Vendors') )
		return;

	extract( shortcode_atts( array(
		'tpvc_wc_vendor_title'		=> 'Vendors',
		'tpvc_wc_vendor_title_color'		=> '',
		'tpvc_wc_vendor_title_bg'			=> '',
		'tpvc_wc_vendor_title_icon'	=> '',
		'tpvc_wc_vendor_title_icon_color'	=> '',
		'tpvc_wc_vendor_numbers' 	=> 36,
		'tpvc_wc_vendor_columns' 	=> 12,
		'tpvc_wc_vendor_columns_tablet' => 9,
		'tpvc_wc_vendor_columns_mobile' => 4,
		'tpvc_wc_vendor_orderby' 	=> 'registered',
		'tpvc_wc_vendor_order' 		=> 'asc',
		'tpvc_wc_vendor_hide_title'	=> '',
		'tpvc_wc_vendor_show_products' => 'no',
		'tpvc_wc_vendor_class'		=> ''
	), $atts ) );

	$meta_query = WC()->query->get_meta_query();

	if ( intval( $tpvc_wc_vendor_numbers ) < 1 ) {
		$tpvc_wc_vendor_numbers = 36;
	}
	if ( intval( $tpvc_wc_vendor_columns ) < 1 ) {
		$tpvc_wc_vendor_columns = 12;
	}
	if ( intval( $tpvc_wc_vendor_columns_tablet ) < 1 ) {
		$tpvc_wc_vendor_columns_tablet = 9;
	}
	if ( intval( $tpvc_wc_vendor_columns_mobile ) < 1 ) {
		$tpvc_wc_vendor_columns_mobile = 4;
	}

	$tpvc_wc_vendor_class .= ' tpvc-mini-product-col-md-'.$tpvc_wc_vendor_columns;
	$tpvc_wc_vendor_class .= ' tpvc-mini-product-col-sm-'.$tpvc_wc_vendor_columns_tablet;
	$tpvc_wc_vendor_class .= ' tpvc-mini-product-col-xs-'.$tpvc_wc_vendor_columns_mobile;

  	$paged = 1;
  	$offset = 0;

  	if ($tpvc_wc_vendor_show_products == 'yes') add_action( 'pre_user_query', 'tpvc_wcvendors_with_products' );

  	// Get the paged vendors 
  	$vendor_paged_args = array ( 
  		'role' 				=> 'vendor', 
  		'meta_key' 			=> 'pv_shop_slug', 
		'meta_value'   		=> '',
		'meta_compare' 		=> '>',
		'orderby' 			=> $tpvc_wc_vendor_orderby,
		'order'				=> $tpvc_wc_vendor_order,
  		'offset' 			=> $offset, 
  		'number' 			=> $tpvc_wc_vendor_numbers, 
  	);

  	if ($tpvc_wc_vendor_show_products != 'no' ) $vendor_paged_args['query_id'] = 'tpvc_wcvendors_with_products'; 

  	$vendor_paged_query = New WP_User_Query( $vendor_paged_args ); 
  	$paged_vendors = $vendor_paged_query->get_results(); 

	ob_start();

	if ( !empty( $paged_vendors ) ) : ?>

	<div class="tpvc-mini-product woocommerce <?php echo $tpvc_wc_vendor_class; ?>">

		<?php if( "hide" != $tpvc_wc_vendor_hide_title ) : ?>
			<div class="tpvc-title" <?php if( "" !== $tpvc_wc_vendor_title_bg ) echo 'style="background-color:' . $tpvc_wc_vendor_title_bg . '"'; ?>>
				<h2 <?php if( "" !== $tpvc_wc_vendor_title_color ) echo 'style="color:' . $tpvc_wc_vendor_title_color . '"'; ?>>
					<?php if( "" != $tpvc_wc_vendor_title_icon ) echo '<i class="' . tpvc_icon( $tpvc_wc_vendor_title_icon ) . '" ' . ( $tpvc_wc_vendor_title_icon_color ? 'style="color:'.$tpvc_wc_vendor_title_icon_color.'"' : '' ). '></i>'; ?>
					<?php echo $tpvc_wc_vendor_title; ?>
				</h2>
			</div>
		<?php endif; ?>

		<ul class="products">

			<?php foreach ($paged_vendors as $vendor) : ?>

				<?php $vendor_link = WCV_Vendors::get_vendor_shop_page($vendor->ID); ?>
				<?php $vendor_name = $vendor->pv_shop_name; ?>

				<li class="product">

					<?php 
					$store_icon = '';
					if ( !$store_icon && class_exists('WCVendors_Pro') ) {
					    $store_icon_src = wp_get_attachment_image_src( get_user_meta( $vendor->ID, '_wcv_store_icon_id', true ), 'thumbnail' ); 
					    if ( is_array( $store_icon_src ) ) { 
					        $store_icon = '<img src="'. $store_icon_src[0].'" alt="" class="avatar avatar-150 photo" width="150" height="150" />'; 
					    } 
					}
					if ( !$store_icon ) {
					    $store_icon = get_avatar( $vendor->ID, 150 );
					}
					echo $store_icon;
					?>

					<div class="mini-icon-view">
						<a href="<?php echo esc_url( $vendor_link ); ?>" title="<?php echo esc_attr( $vendor_name ); ?>">
							<i class="fa fa-search"></i>
						</a>
					</div>

				</li>

			<?php endforeach; // end of the loop. ?>

		</ul>

	</div>

	<?php endif;

	return ob_get_clean();
}

function tpvc_wcvendors_with_products( $query ) {
	global $wpdb; 

	// $post_count = $products ? ' AND post_count  > 0 ' : ''; 

    if ( isset( $query->query_vars['query_id'] ) && 'tpvc_wcvendors_with_products' == $query->query_vars['query_id'] ) {  
        $query->query_from = $query->query_from . ' LEFT OUTER JOIN (
                SELECT post_author, COUNT(*) as post_count
                FROM '.$wpdb->prefix.'posts
                WHERE post_type = "product" AND (post_status = "publish" OR post_status = "private")
                GROUP BY post_author
            ) p ON ('.$wpdb->prefix.'users.ID = p.post_author)';
        $query->query_where = $query->query_where . ' AND post_count  > 0 ' ;  
    } 
}

add_action( 'vc_before_init', 'tpvc_wc_mini_wcvendors_vcmap' );
function tpvc_wc_mini_wcvendors_vcmap() {
	if ( ! class_exists('woocommerce') )
		return;

	if ( ! class_exists('WC_Vendors') )
		return;

	vc_map( array(
	   'name'				=> __( 'WooCommerce - Mini Vendors Thumbnail (WCVendors)', 'tokopress' ),
	   'base'				=> 'tokopress_mini_vendors_wcvendors',
	   'class'				=> '',
	   'icon'				=> 'woocommerce_icon',
	   'category'			=> 'Tokopress - Marketica',
	   // 'admin_enqueue_css' 	=> array( SHORTCODE_URL . '/css/component.css' ),
	   'params'				=> array(
								array(
									'type'			=> 'textfield',
									'heading'		=> __( 'Title', 'tokopress' ),
									'param_name'	=> 'tpvc_wc_vendor_title',
									'value'			=> __( 'Vendors', 'tokopress' )
								),
								array(
									'type'			=> 'colorpicker',
									'heading'		=> __( 'Title Color', 'tokopress' ),
									'param_name'	=> 'tpvc_wc_vendor_title_color'
								),
								array(
									'type'			=> 'colorpicker',
									'heading'		=> __( 'Title Background Color', 'tokopress' ),
									'param_name'	=> 'tpvc_wc_vendor_title_bg',
								),
								array(
									'type' => 'iconpicker',
									'heading' => __( 'Title Icon', 'tokopress' ),
									'param_name' => 'tpvc_wc_vendor_title_icon',
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
									'param_name'	=> 'tpvc_wc_vendor_title_icon_color',
								),
								array(
									'type' 			=> 'checkbox',
									'heading' 		=> __( 'Hide Title', 'tokopress' ),
									'param_name' 	=> 'tpvc_wc_vendor_hide_title',
									'value' 		=> array( __( 'Hide Title', 'tokopress' ) => 'hide' )
								),
								array(
									'type'			=> 'dropdown',
									'heading'		=> __( 'Show Vendors', 'tokopress' ),
									'param_name'	=> 'tpvc_wc_vendor_show_products',
									'value'			=> array(
															__( 'All Vendors With/Without Products Listed', 'tokopress' ) => 'no',
															__( 'Vendors With Products Listed', 'tokopress' ) => 'yes',
														),
									'std'			=> 'no'
								),
								array(
									'type'			=> 'textfield',
									'heading'		=> __( 'Number of Vendors To Show', 'tokopress' ),
									'param_name'	=> 'tpvc_wc_vendor_numbers',
									'value'			=> '36',
								),
								array(
									'type'			=> 'dropdown',
									'heading'		=> __( 'Number of Columns Per Row (Desktop)', 'tokopress' ),
									'description'	=> __( 'For device width > 992px', 'tokopress' ),
									'param_name'	=> 'tpvc_wc_vendor_columns',
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
									'param_name'	=> 'tpvc_wc_vendor_columns_tablet',
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
									'param_name'	=> 'tpvc_wc_vendor_columns_mobile',
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
									'heading'		=> __( 'Order', 'tokopress' ),
									'param_name'	=> 'tpvc_wc_vendor_order',
									'value'			=> array(
															'' 	=> '',
															'Ascending'		=> 'asc',
															'Descending' 	=> 'desc'
														),
									'std'			=> 'asc'
								),
								array(
									'type'			=> 'dropdown',
									'heading'		=> __( 'Order By', 'tokopress' ),
									'param_name'	=> 'tpvc_wc_vendor_orderby',
									'value'			=> array(
															'' 	=> '',
															'Registered Date'	=> 'registered',
															'Display Name'		=> 'display_name',
															'Username'			=> 'login',
															'ID'				=> 'ID',
														),
									'std'			=> 'registered'

								),

								array(
									'type'			=> 'textfield',
									'heading'		=> __( 'Extra Class', 'tokopress' ),
									'description'	=> __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'tokopress' ),
									'param_name'	=> 'tpvc_wc_vendor_class',
									'value'			=> '',
								)
							)
		)
	);
}
