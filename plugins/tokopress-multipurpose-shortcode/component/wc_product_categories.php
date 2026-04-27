<?php
/**
 * Tokopress WooCommerce Product
 *
 * @package WooCommerce Product
 * @author Tokopress
 */

add_shortcode( 'tokopress_product_categories', 'tpvc_wc_cat_categories_shortcode' );

function tpvc_wc_cat_categories_shortcode( $atts ) {
	if ( ! class_exists('woocommerce') )
		return;

	global $woocommerce_loop;

	extract( shortcode_atts( array(
		'tpvc_wc_cat_style'				=> 'alternate',
		'tpvc_wc_cat_title'				=> __( 'Product Category', 'tokopress' ),
		'tpvc_wc_cat_title_color'		=> '',
		'tpvc_wc_cat_title_bg'			=> '',
		'tpvc_wc_cat_title_icon'		=> '',
		'tpvc_wc_cat_title_icon_color'	=> '',
		'tpvc_wc_cat_parent' 		=> '',
		'tpvc_wc_cat_show_empty'	=> '',
		'tpvc_wc_cat_numbers' 		=> '9',
		'tpvc_wc_cat_columns' 		=> '3',
		'tpvc_wc_cat_orderby' 		=> 'none',
		'tpvc_wc_cat_order' 		=> 'asc',
		'tpvc_wc_cat_hide_title'	=> '',
		'tpvc_wc_cat_class'			=> ''
	), $atts ) );

	if ( $tpvc_wc_cat_style == '' ) {
		$tpvc_wc_cat_style = 'alternate';
	}

	if ( isset( $atts[ 'tpvc_wc_cat_include' ] ) ) {
		$tpvc_wc_cat_include_ids = explode( ',', $atts[ 'tpvc_wc_cat_include' ] );
		$tpvc_wc_cat_include_ids = array_map( 'trim', $tpvc_wc_cat_include_ids );
	} 
	else {
		$tpvc_wc_cat_include_ids = array();
	}

	if ( isset( $atts[ 'tpvc_wc_cat_exclude' ] ) ) {
		$tpvc_wc_cat_exclude_ids = explode( ',', $atts[ 'tpvc_wc_cat_exclude' ] );
		$tpvc_wc_cat_exclude_ids = array_map( 'trim', $tpvc_wc_cat_exclude_ids );
	} 
	else {
		$tpvc_wc_cat_exclude_ids = array();
	}

	$tpvc_wc_cat_hide_empty = $tpvc_wc_cat_show_empty ? false : true;

	if ( $tpvc_wc_cat_parent == 'top' ) {
		$tpvc_wc_cat_parent = '0';
	}
	elseif ( $tpvc_wc_cat_parent == 'all' ) {
		$tpvc_wc_cat_parent = '';
	}

	// get terms and workaround WP bug with parents/pad counts
	$args = array(
		'orderby'    => $tpvc_wc_cat_orderby,
		'order'      => $tpvc_wc_cat_order,
		'hide_empty' => $tpvc_wc_cat_hide_empty,
		'pad_counts' => true,
	);
	if ( $tpvc_wc_cat_parent !== '' ) {
		$args['child_of'] = $tpvc_wc_cat_parent;
	}

	if ( !empty( $tpvc_wc_cat_include_ids ) ) {
		$args['include'] = $tpvc_wc_cat_include_ids;
	}

	if ( !empty( $tpvc_wc_cat_exclude_ids ) ) {
		$args['exclude'] = $tpvc_wc_cat_exclude_ids;
	}

	$product_categories = get_terms( 'product_cat', $args );

	if ( $tpvc_wc_cat_parent !== '' ) {
		$product_categories = wp_list_filter( $product_categories, array( 'parent' => $tpvc_wc_cat_parent ) );
	}

	if ( $tpvc_wc_cat_hide_empty ) {
		foreach ( $product_categories as $key => $category ) {
			if ( $category->count == 0 ) {
				unset( $product_categories[ $key ] );
			}
		}
	}

	if ( $tpvc_wc_cat_numbers ) {
		$product_categories = array_slice( $product_categories, 0, $tpvc_wc_cat_numbers );
	}

	ob_start();

	if ( $tpvc_wc_cat_columns < 1 ) $tpvc_wc_cat_columns = 4;
	if ( $tpvc_wc_cat_columns > 5 ) $tpvc_wc_cat_columns = 5;

	$woocommerce_loop['columns'] = $tpvc_wc_cat_columns;

	if ( function_exists('wc_set_loop_prop') ) {
		wc_set_loop_prop( 'loop', 0 );
		wc_set_loop_prop( 'columns', $tpvc_wc_cat_columns );
	}

	if ( $product_categories ) : ?>

	<div class="tpvc-product woocommerce columns-<?php echo $tpvc_wc_cat_columns; ?> <?php echo $tpvc_wc_cat_class; ?>">

		<?php if( "hide" != $tpvc_wc_cat_hide_title ) : ?>
			<div class="tpvc-title" <?php if( "" !== $tpvc_wc_cat_title_bg ) echo 'style="background-color:' . $tpvc_wc_cat_title_bg . '"'; ?>>
				<h2 <?php if( "" !== $tpvc_wc_cat_title_color ) echo 'style="color:' . $tpvc_wc_cat_title_color . '"'; ?>>
					<?php if( "" != $tpvc_wc_cat_title_icon ) echo '<i class="' . tpvc_icon( $tpvc_wc_cat_title_icon ) . '" ' . ( $tpvc_wc_cat_title_icon_color ? 'style="color:'.$tpvc_wc_cat_title_icon_color.'"' : '' ). '></i>'; ?>
					<?php echo $tpvc_wc_cat_title; ?>
				</h2>
			</div>
		<?php endif; ?>

		<ul class="products product-category">

			<?php
			foreach ( $product_categories as $category ) {
				?>
				<li <?php wc_product_cat_class( '', $category ); ?>>
					<div class="product-inner">

					<?php do_action( 'woocommerce_before_subcategory', $category ); ?>

					<div class="thumbnail-loop-wrap">

						<a href="<?php echo get_term_link( $category->slug, 'product_cat' ); ?>">

							<?php
								/**
								 * woocommerce_before_subcategory_title hook
								 *
								 * @hooked woocommerce_subcategory_thumbnail - 10
								 */
								do_action( 'woocommerce_before_subcategory_title', $category );
							?>

						</a>

						<?php if ( $tpvc_wc_cat_style == 'alternate' ) : ?>
							<div class="add-to-cart-loop-wrap">

								<a class="button detail_button_loop" href="<?php echo get_term_link( $category->slug, 'product_cat' ); ?>">
									<?php
									echo $category->name;
									if ( $category->count > 0 ) {
										echo apply_filters( 'woocommerce_subcategory_count_html', ' <span class="count">(' . $category->count . ')</span>', $category );
									}
									?>
								</a>

							</div>
						<?php endif; ?>

						<?php
							/**
							 * woocommerce_after_subcategory_title hook
							 */
							do_action( 'woocommerce_after_subcategory_title', $category );
						?>

					</div>

					<?php if ( $tpvc_wc_cat_style != 'alternate' ) : ?>
						<div class="title-rating-loop-wrap">
							<a href="<?php echo get_term_link( $category->slug, 'product_cat' ); ?>">
								<h3>
								<?php
								echo $category->name;
								if ( $category->count > 0 ) {
									echo apply_filters( 'woocommerce_subcategory_count_html', ' <span class="count">(' . $category->count . ')</span>', $category );
								}
								?>
								</h3>
							</a>
						</div>
					<?php endif; ?>

					<?php do_action( 'woocommerce_after_subcategory', $category ); ?>
					
					</div>
				</li>
				<?php 

			} ?>

		</ul>

	</div>

	<?php endif;

	return ob_get_clean();
}

add_action( 'vc_before_init', 'tpvc_wc_cat_categories_vcmap' );
function tpvc_wc_cat_categories_vcmap() {
	if ( ! class_exists('woocommerce') )
		return;

	$args = array(
		'type' => 'post',
		'child_of' => 0,
		'parent' => '',
		'orderby' => 'name',
		'order' => 'ASC',
		'hide_empty' => false,
		'hierarchical' => 1,
		'exclude' => '',
		'include' => '',
		'number' => '',
		'taxonomy' => 'product_cat',
		'pad_counts' => false,

	);
	$categories = get_categories( $args );

	$product_categories_dropdown = array();
	tpvc_vc_getCategoryChilds( 'id', 0, 0, $categories, 0, $product_categories_dropdown );

	$product_categories_dropdown_begin = array(
									__( '[All Categories]', 'tokopress' )	=> 'all',
									__( '[Top Level Only]', 'tokopress' )	=> 'top',
								);
	$product_categories_dropdown = array_merge( $product_categories_dropdown_begin, $product_categories_dropdown );

	vc_map( array(
	   'name'				=> __( 'WooCommerce - Product Categories', 'tokopress' ),
	   'base'				=> 'tokopress_product_categories',
	   'class'				=> '',
	   'icon'				=> 'woocommerce_icon',
	   'category'			=> 'Tokopress - Marketica',
	   // 'admin_enqueue_css' 	=> array( SHORTCODE_URL . '/css/component.css' ),
	   'params'				=> array(
	   							array(
									'type'			=> 'dropdown',
									'heading'		=> __( 'Product Catalog Style', 'tokopress' ),
									'param_name'	=> 'tpvc_wc_cat_style',
									'value'			=> array(
														'' 	=> '',
														__( 'Alternate Style', 'tokopress' ) => 'alternate',
														__( 'Default Style', 'tokopress' ) => 'default',
														),
									'std'			=> 'alternate'
								),
								array(
									'type'			=> 'textfield',
									'heading'		=> __( 'Title', 'tokopress' ),
									'param_name'	=> 'tpvc_wc_cat_title',
									'value'			=> __( 'Product Categories', 'tokopress' )
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
									'type' 			=> 'iconpicker',
									'heading' 		=> __( 'Title Icon', 'tokopress' ),
									'param_name' 	=> 'tpvc_wc_cat_title_icon',
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
									'type' 			=> 'dropdown',
									'heading' 		=> __( 'Parent Category', 'tokopress' ),
									'value' 		=> $product_categories_dropdown,
									'param_name' 	=> 'tpvc_wc_cat_parent',
									'description' 	=> __( 'Useful to show subcategories', 'tokopress' ),
								),
								array(
									'type'			=> 'textfield',
									'heading'		=> __( 'Numbers', 'tokopress' ),
									'description'	=> __( 'How many categories to show', 'tokopress' ),
									'param_name'	=> 'tpvc_wc_cat_numbers',
									'value'			=> "9",
								),
								array(
									'type'			=> 'dropdown',
									'heading'		=> __( 'Columns', 'tokopress' ),
									'description'	=> __( 'How many columns per row', 'tokopress' ),
									'param_name'	=> 'tpvc_wc_cat_columns',
									'value'			=> array(
															'' 	=> '',
															'1' => '1',
															'2' => '2',
															'3' => '3',
															'4' => '4',
														),
									'std'			=> '3',
								),
								array(
									'type'			=> 'dropdown',
									'heading'		=> __( 'Order By', 'tokopress' ),
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
									'type'			=> 'dropdown',
									'heading'		=> __( 'Order Type', 'tokopress' ),
									'param_name'	=> 'tpvc_wc_cat_order',
									'value'			=> array(
															'' 	=> '',
															'Ascending'		=> 'asc',
															'Descending' 	=> 'desc'
														),
									'std'			=> 'asc'
								),

								array(
									'type' 			=> 'checkbox',
									'heading' 		=> __( 'Show Empty Categories', 'tokopress' ),
									'param_name' 	=> 'tpvc_wc_cat_show_empty',
									'value' 		=> array( __( 'Show Empty Categories', 'tokopress' ) => 'empty' )
								),

								array(
									'type'			=> 'textfield',
									'heading'		=> __( 'Include', 'tokopress' ),
									'description'	=> __( 'put product category IDs, separated by comma', 'tokopress' ),
									'param_name'	=> 'tpvc_wc_cat_include',
									'value'			=> '',
								),

								array(
									'type'			=> 'textfield',
									'heading'		=> __( 'Exclude', 'tokopress' ),
									'description'	=> __( 'put product category IDs, separated by comma', 'tokopress' ),
									'param_name'	=> 'tpvc_wc_cat_exclude',
									'value'			=> '',
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